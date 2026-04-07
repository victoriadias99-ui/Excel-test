<?php
/**
 * logCheckoutError.php
 * Recibe errores del checkout (JS y PHP) y los guarda en log-errores-checkout.txt
 */
header('Content-Type: text/plain; charset=utf-8');

$logFile = dirname(__DIR__) . '/log-errores-checkout.txt';

// Aceptar POST con JSON body
$input = json_decode(file_get_contents('php://input'), true);

if (empty($input) || empty($input['tipo'])) {
    http_response_code(400);
    echo 'bad request';
    exit;
}

$line = date('Y-m-d H:i:s') . ' | '
    . str_pad($input['tipo'] ?? '', 30) . ' | '
    . 'curso=' . ($input['curso'] ?? '') . ' | '
    . 'email=' . ($input['email'] ?? '') . ' | '
    . 'detalle=' . ($input['detalle'] ?? '') . ' | '
    . 'url=' . ($input['url'] ?? '') . ' | '
    . 'ua=' . ($input['userAgent'] ?? '')
    . PHP_EOL;

file_put_contents($logFile, $line, FILE_APPEND | LOCK_EX);

echo 'ok';
?>
