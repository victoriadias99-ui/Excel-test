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
        $host   = getenv("DB_HOST")     ?: "localhost";
        $dbname = getenv("DB_NAME")     ?: "aprendee_argentina_3_6_21";
        $user   = getenv("DB_USER")     ?: "aprendee_admin_argentina";
        $pass   = getenv("DB_PASSWORD") ?: "";

        $cnx = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
            $user,
            $pass,
            [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]
        );
    }

    return $cnx;
}
?>
