<?php
/**
 * Router para PHP built-in server (Railway)
 * Reemplaza las reglas de mod_rewrite de Apache (.htaccess)
 *
 * ob_start() aquí captura cualquier output prematuro (BOM, espacios)
 * de archivos incluidos, permitiendo que header() funcione desde cualquier
 * parte del código sin generar "headers already sent" warnings.
 */
ob_start();

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Si el archivo/directorio existe físicamente, PHP lo sirve directamente
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    ob_end_clean();
    return false;
}

// Forzar index.php como punto de entrada principal
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/index.php';

ob_end_flush();
