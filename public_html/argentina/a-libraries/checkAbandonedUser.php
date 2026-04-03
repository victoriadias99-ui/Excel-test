<?php

require dirname(__DIR__) . '/libraries1/vendor/autoload.php';

include("../includes/conexion.php");
include("../includes/class.autonum.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');
$cnx = OpenCon();

$result = [];

$consulta = "SELECT `ACCESS_TOKEN_MP` FROM `cursos_detalle`";
$stmt = $cnx->prepare($consulta);
$stmt->execute();
$rowsToken = $stmt->fetchAll(PDO::FETCH_ASSOC);

$consulta = "SELECT `ID`,`CURSO`,`FECHA`,`NOMBRE`,`APELLIDO`,`CELULAR`,`EMAIL` FROM `ventas` WHERE `ESTADO_MP`='' AND TIMESTAMPDIFF(MINUTE,FECHA,NOW())>10";
$stmt = $cnx->prepare($consulta);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$result = array_merge($result, $rows);

$rowsInJson = json_encode($result);
echo $rowsInJson;

$stmt1 = $cnx->prepare("UPDATE ventas SET `ESTADO_MP`='abandoned' WHERE `ESTADO_MP`='' AND `ID` IN (SELECT * FROM (SELECT `ID` FROM `ventas` WHERE `ESTADO_MP`='' AND TIMESTAMPDIFF(MINUTE,FECHA,NOW())>10) AS X)");
$stmt1->execute();


?>