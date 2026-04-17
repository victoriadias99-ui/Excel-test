<?php
if (!function_exists('OpenCon')) {
    function OpenCon()
    {
        // Singleton por request: reutilizar la misma conexión PDO en toda la página
        // evita pagar el handshake TCP/TLS+auth (~100-300ms) en cada query.
        static $cnx = null;
        if ($cnx instanceof PDO) {
            return $cnx;
        }

        $host   = getenv("MYSQL_HOST")     ?: getenv("DB_HOST")     ?: "localhost";
        $port   = getenv("MYSQL_PORT")     ?: getenv("DB_PORT")     ?: "3306";
        $dbname = getenv("MYSQL_DATABASE") ?: getenv("DB_NAME")     ?: "aprendee_argentina_3_6_21";
        $user   = getenv("MYSQL_USER")     ?: getenv("DB_USER")     ?: "aprendee_admin_argentina";
        $pass   = getenv("MYSQL_PASSWORD") ?: getenv("DB_PASSWORD") ?: "";
        $cnx = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $user, $pass, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT         => true,
        ]);
        return $cnx;
    }
}
?>
