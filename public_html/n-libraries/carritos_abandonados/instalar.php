<?php
/**
 * instalar.php — aplica schema.sql en la BD configurada.
 * Ejecutar una sola vez desde CLI o navegador:
 *   php public_html/n-libraries/carritos_abandonados/instalar.php
 *   GET /n-libraries/carritos_abandonados/instalar.php?key=TOKEN_INSTALACION
 *
 * Protegido con el env INSTALL_TOKEN cuando se corre por HTTP.
 */

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/n-includes/conexion.php';

$isCli = (php_sapi_name() === 'cli');
if (!$isCli) {
    $expected = getenv('INSTALL_TOKEN') ?: '';
    $got      = $_GET['key'] ?? '';
    if ($expected === '' || !hash_equals($expected, (string) $got)) {
        http_response_code(403);
        exit('Forbidden');
    }
    header('Content-Type: text/plain; charset=utf-8');
}

$sql = file_get_contents(__DIR__ . '/schema.sql');
if ($sql === false) {
    fwrite(STDERR, "No se pudo leer schema.sql\n");
    exit(1);
}

try {
    $cnx = OpenCon();
    $cnx->exec($sql);
    echo "OK: tabla carritos_abandonados lista.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
