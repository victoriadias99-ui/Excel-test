<?php
// Conexión a la base de Facebook Ads. Credenciales DEBEN venir de variables de entorno.
function OpenCon()
{
    $dbhost = getenv("FB_MYSQL_HOST")     ?: getenv("MYSQL_HOST")     ?: "localhost";
    $dbname = getenv("FB_MYSQL_DATABASE") ?: getenv("MYSQL_DATABASE_FACEBOOK") ?: "aprendee_facebook";
    $dbuser = getenv("FB_MYSQL_USER")     ?: getenv("MYSQL_USER")     ?: "";
    $dbpass = getenv("FB_MYSQL_PASSWORD") ?: getenv("MYSQL_PASSWORD") ?: "";

    try {
        $cnx = new PDO(
            "mysql:host={$dbhost};dbname={$dbname};charset=utf8mb4",
            $dbuser,
            $dbpass,
            [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
        return $cnx;
    } catch (PDOException $e) {
        error_log("DB connect (facebook) failed: " . $e->getMessage());
        http_response_code(500);
        die("Service unavailable");
    }
}
?>
