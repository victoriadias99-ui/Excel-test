<?php
// Conexión MySQL (mysqli). Credenciales DEBEN venir de variables de entorno.
// Se dejan fallbacks vacíos a propósito — si el env no está cargado, la conexión falla
// en lugar de exponer un password hardcodeado en el repo.
function OpenCon()
{
    $dbhost = getenv("MYSQL_HOST")     ?: getenv("DB_HOST")     ?: "localhost";
    $dbuser = getenv("MYSQL_USER")     ?: getenv("DB_USER")     ?: "";
    $dbpass = getenv("MYSQL_PASSWORD") ?: getenv("DB_PASSWORD") ?: "";
    $db     = getenv("MYSQL_DATABASE") ?: getenv("DB_NAME")     ?: "";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
    if ($conn->connect_error) {
        // No exponer el error al cliente
        error_log("DB connect failed: " . $conn->connect_error);
        http_response_code(500);
        die("Service unavailable");
    }
    $conn->set_charset("utf8mb4");
    return $conn;
}
function CloseCon($conn)
{
    $conn->close();
}
?>
