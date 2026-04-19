<?php

include("a-includes/conexion.php");
include("a-includes/class.autonum.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');
$cnx = OpenCon();

// Endpoint protegido — debe recibir un token que matchee con la tabla cursos_detalle.
// Antes: la validación estaba comentada y un `true` duro dejaba el endpoint abierto,
// exponiendo PII (nombre, apellido, email, celular, curso) de ventas abandonadas.
$token = isset($_GET['token']) ? trim($_GET['token']) : '';

if ($token === '') {
    http_response_code(401);
    exit('Unauthorized');
}

// Validamos que el token exista en la tabla de cursos (access token)
$consulta = "SELECT `ACCESS_TOKEN_MP` FROM `cursos_detalle` WHERE `ACCESS_TOKEN_MP` = ? LIMIT 1";
$stmt = $cnx->prepare($consulta);
$stmt->bindValue(1, $token, PDO::PARAM_STR);
$stmt->execute();
$rowsToken = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Comparación en tiempo constante para evitar timing attacks
$tokenValido = (count($rowsToken) > 0)
    && hash_equals((string) $rowsToken[0]['ACCESS_TOKEN_MP'], $token);

if (!$tokenValido) {
    http_response_code(403);
    exit('Forbidden');
}

$consulta = "SELECT `ID`,`CURSO`,`FECHA`,`NOMBRE`,`APELLIDO`,`PREFIJO_CEL`,`CELULAR`,`EMAIL`
             FROM `ventas`
             WHERE `CURSO` IN (SELECT `CURSO` FROM `cursos_abandonados_check`)
               AND `ESTADO_MP` = ''
               AND TIMESTAMPDIFF(MINUTE, `FECHA`, NOW()) > 10";
$stmt = $cnx->prepare($consulta);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);

$stmt1 = $cnx->prepare(
    "UPDATE `ventas` SET `ESTADO_MP` = 'abandoned'
     WHERE `CURSO` IN (SELECT `CURSO` FROM `cursos_abandonados_check`)
       AND `ESTADO_MP` = ''
       AND `ID` IN (
           SELECT * FROM (
               SELECT `ID` FROM `ventas`
               WHERE `CURSO` IN (SELECT `CURSO` FROM `cursos_abandonados_check`)
                 AND `ESTADO_MP` = ''
                 AND TIMESTAMPDIFF(MINUTE, `FECHA`, NOW()) > 10
           ) AS X
       )"
);
$stmt1->execute();

?>
