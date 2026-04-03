<?php
include("../n-includes/conexion.php");
date_default_timezone_set('America/Argentina/Buenos_Aires');

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$comentario = $_POST['comentario'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$data = [
    'nombre' => $nombre,
    'telefono' => $telefono,
    'email' => $email,
    'comentario' => $comentario,
    'ip' => $ip,
    'origen' => 'formulario-contacto',
    'fechaHoy' => date('y-m-d h:m:i'),
];
    
$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);

$context = stream_context_create($options);
$result = file_get_contents('https://hook.integromat.com/ydbr63nev20i36i373srnac2iu5vwngw', false, $context);

$cnx = OpenCon();
$consulta = "INSERT INTO `contacto`(`nombre`, `telefono`, `email`, `comentario`, `ip`, `origen`, `fecha`) VALUES (?,?,?,?,?,?,?)";
$stmt = $cnx->prepare($consulta);
$stmt->bindValue(1, $nombre, PDO::PARAM_STR);
$stmt->bindValue(2, $telefono, PDO::PARAM_STR);
$stmt->bindValue(3, $email, PDO::PARAM_STR);
$stmt->bindValue(4, $comentario, PDO::PARAM_STR);
$stmt->bindValue(5, $ip, PDO::PARAM_STR);
$stmt->bindValue(6, 'formulario-contacto', PDO::PARAM_STR);
$stmt->bindValue(7, date('y-m-d h:m:i'), PDO::PARAM_STR);
$stmt->execute();

header("Location: index.php?enviado=1&#contacto");
die();
?>