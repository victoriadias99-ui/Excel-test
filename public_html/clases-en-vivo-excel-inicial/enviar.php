<?php
header('Content-type: application/json');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../a-includes/conexion.php");
date_default_timezone_set('America/Argentina/Buenos_Aires');

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$fechaHoy = date('y-m-d h:m:i');

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$cnx = OpenCon();
$consulta = "INSERT INTO `leads_clases_vivo`(`nombre`, `telefono`, `fecha`) VALUES (?,?,?)";
$stmt = $cnx->prepare($consulta);
$stmt->bindValue(1, $nombre, PDO::PARAM_STR);
$stmt->bindValue(2, $telefono, PDO::PARAM_STR);
$stmt->bindValue(3, $fechaHoy, PDO::PARAM_STR);
$stmt->execute();

echo json_encode(['status' => $stmt->errorInfo()]);
?>