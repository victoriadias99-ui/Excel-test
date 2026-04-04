<?php
function OpenCon()
{
    $dbhost = getenv("DB_HOST")     ?: "localhost";
    $dbuser = getenv("DB_USER")     ?: "aprendee_admin_argentina";
    $dbpass = getenv("DB_PASSWORD") ?: "";
    $db     = getenv("DB_NAME")     ?: "aprendee_argentina";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
    $conn->set_charset("utf8mb4");
    return $conn;
}
function CloseCon($conn)
{
    $conn -> close();
}
?>
