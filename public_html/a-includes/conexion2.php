<?php
function OpenCon()
{
    $dbhost = getenv("MYSQL_HOST")     ?: getenv("DB_HOST")     ?: "localhost";
    $dbuser = getenv("MYSQL_USER")     ?: getenv("DB_USER")     ?: "aprendee_admin_argentina";
    $dbpass = getenv("MYSQL_PASSWORD") ?: getenv("DB_PASSWORD") ?: "";
    $db     = getenv("MYSQL_DATABASE") ?: getenv("DB_NAME")     ?: "aprendee_argentina";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
    $conn->set_charset("utf8mb4");
    return $conn;
}
function CloseCon($conn)
{
    $conn -> close();
}
?>
