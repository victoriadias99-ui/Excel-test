<?php
{
    function OpenCon()
    {
        $host   = getenv("DB_HOST")     ?: "localhost";
        $dbname = getenv("DB_NAME")     ?: "aprendee_argentina_3_6_21";
        $user   = getenv("DB_USER")     ?: "aprendee_admin_argentina";
        $pass   = getenv("DB_PASSWORD") ?: "";
        $cnx = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        return $cnx;
    }
}
?>
