<?php

include("./excel-inicial/includes/conexion.php");
include("./excel-inicial/includes/class.autonum.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');	
$cnx = OpenCon();


//$token=$_GET["token"];
//$curso=$_GET["curso"];
$token=$_GET["token"];

$consulta ="SELECT `ACCESS_TOKEN_MP` FROM `cursos_detalle` WHERE ACCESS_TOKEN_MP=?";   				
$stmt = $cnx->prepare($consulta);
$stmt->bindValue(1, $token, PDO::PARAM_STR);
$stmt->execute();
$rowsToken = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($token == $rowsToken[0]['ACCESS_TOKEN_MP'])
{
	$consulta ="SELECT `ID`,`CURSO`,`FECHA`,`NOMBRE`,`APELLIDO`,`PREFIJO_CEL`,`CELULAR`,`EMAIL` FROM `ventas` WHERE CURSO IN (SELECT CURSO FROM cursos_abandonados_check) AND `ESTADO_MP`='' AND TIMESTAMPDIFF(MINUTE,FECHA,NOW())>10";   				
	$stmt = $cnx->prepare($consulta);
	$stmt->execute();
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
	$rowsInJson = json_encode($rows);	
	echo $rowsInJson;
	
	$stmt1=$cnx->prepare("UPDATE ventas SET `ESTADO_MP`='abandoned' WHERE `CURSO` IN (SELECT CURSO FROM cursos_abandonados_check) AND `ESTADO_MP`='' AND `ID` IN (SELECT * FROM (SELECT `ID` FROM `ventas` WHERE CURSO IN (SELECT CURSO FROM cursos_abandonados_check) AND `ESTADO_MP`='' AND TIMESTAMPDIFF(MINUTE,FECHA,NOW())>10) AS X)");
	$stmt1->execute();
	
}

?>