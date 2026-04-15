<?php
/**
 * OpenCon() — Singleton de conexión PDO.
 * FIX BUG-01: en lugar de abrir una nueva conexión MySQL en cada llamada,
 * reutiliza la misma instancia durante toda la request.
 * Antes: ~20 conexiones nuevas por carga de index.php → Ahora: 1 sola.
 */
function OpenCon()
{
    static $cnx = null;

    if ($cnx === null) {
        $host   = getenv("MYSQL_HOST")     ?: getenv("DB_HOST")     ?: "localhost";
        $port   = getenv("MYSQL_PORT")     ?: getenv("DB_PORT")     ?: "3306";
        $dbname = getenv("MYSQL_DATABASE") ?: getenv("DB_NAME")     ?: "aprendee_argentina_3_6_21";
        $user   = getenv("MYSQL_USER")     ?: getenv("DB_USER")     ?: "aprendee_admin_argentina";
        $pass   = getenv("MYSQL_PASSWORD") ?: getenv("DB_PASSWORD") ?: "";

        $cnx = new PDO(
            "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4",
            $user,
            $pass,
            [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::ATTR_TIMEOUT            => 5,
            ]
        );
    }

    return $cnx;
}
?>
