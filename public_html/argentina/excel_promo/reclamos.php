<?php
// SDK de Mercado Pago


include("./includes/conexion.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');

$curso = $_GET['curso'];
$mail = $_GET['mail'];

try {   
	$cnx = OpenCon();
    
    $consulta ="select 'X' as URL from ventas a, cursos_detalle b where a.CURSO=? and a.CURSO=b.CURSO and (a.EMAIL=? OR a.PAGADOR_EMAIL_MP=?) AND a.ESTADO_MP='approved' ";   				
    $stmt = $cnx->prepare($consulta);
    $stmt->bindValue(1, $curso, PDO::PARAM_STR);
	$stmt->bindValue(2, $mail, PDO::PARAM_STR);
	$stmt->bindValue(3, $mail, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}


if ($stmt->rowCount()>0)
{
	echo true;
}
else
{
	echo false;
}


?>