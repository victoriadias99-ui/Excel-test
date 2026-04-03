<?php
function OpenCon()
{
$dbhost = "localhost";
$dbuser = "aprendee_admin_argentina";
$dbpass = "Xks.2vDnursT";
$db = "aprendee_argentina";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
return $conn;
}
function CloseCon($conn)
{
$conn -> close();
}
?>
