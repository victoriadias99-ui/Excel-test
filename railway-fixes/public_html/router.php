<?php
/**
 * Router para PHP built-in server (Railway)
 * Reemplaza las reglas de mod_rewrite de Apache (.htaccess)
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Si el archivo/directorio existe físicamente, PHP lo sirve directamente
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Forzar index.php como punto de entrada principal
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/index.php';
