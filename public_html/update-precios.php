<?php
/**
 * update-precios.php — Endpoint protegido para actualizar precios desde la academia.
 *
 * Body JSON esperado:
 * {
 *   "secret":  "<PRECIOS_SYNC_SECRET>",
 *   "precios": {
 *      "excel":            { "titulo": "Curso Excel Inicial",   "precio_unitario": 9999 },
 *      "certificacion|excel": { "titulo": "...",                "precio_unitario": 14999 },
 *      ...
 *   }
 * }
 *
 * Sólo toca las columnas CURSO, TITULO y PRECIO_UNITARIO de cursos_detalle.
 * Cualquier otra columna queda intacta. Si el CURSO no existe, se inserta.
 *
 * Autenticación: secret compartido con la academia (env PRECIOS_SYNC_SECRET).
 */

header('Content-Type: application/json; charset=utf-8');

$EXPECTED_SECRET = getenv('PRECIOS_SYNC_SECRET') ?: '';

if ($EXPECTED_SECRET === '') {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'PRECIOS_SYNC_SECRET no configurado en el server']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Método no permitido']);
    exit;
}

$raw = file_get_contents('php://input');
$payload = json_decode($raw, true);

if (!is_array($payload)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Payload inválido']);
    exit;
}

// Comparación timing-safe
if (!isset($payload['secret']) || !hash_equals($EXPECTED_SECRET, (string)$payload['secret'])) {
    http_response_code(401);
    echo json_encode(['ok' => false, 'error' => 'No autorizado']);
    exit;
}

$precios = $payload['precios'] ?? null;
if (!is_array($precios) || empty($precios)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Sin precios para actualizar']);
    exit;
}

include __DIR__ . '/n-includes/conexion.php';

try {
    $cnx = OpenCon();

    $sql = "INSERT INTO cursos_detalle (CURSO, TITULO, PRECIO_UNITARIO)
            VALUES (:curso, :titulo, :precio)
            ON DUPLICATE KEY UPDATE
              TITULO = VALUES(TITULO),
              PRECIO_UNITARIO = VALUES(PRECIO_UNITARIO)";
    $stmt = $cnx->prepare($sql);

    $cnx->beginTransaction();
    $count = 0;
    $errores = [];

    foreach ($precios as $slug => $info) {
        if (!is_string($slug) || $slug === '' || strlen($slug) > 255) {
            $errores[] = ['slug' => $slug, 'error' => 'slug inválido'];
            continue;
        }
        if (!is_array($info)) continue;

        $titulo = isset($info['titulo']) ? (string)$info['titulo'] : '';
        $precio = isset($info['precio_unitario']) ? intval($info['precio_unitario']) : 0;
        if ($precio < 0) $precio = 0;

        try {
            $stmt->execute([
                ':curso'  => $slug,
                ':titulo' => $titulo,
                ':precio' => $precio,
            ]);
            $count++;
        } catch (Exception $e) {
            $errores[] = ['slug' => $slug, 'error' => $e->getMessage()];
        }
    }

    if (count($errores) > 0 && $count === 0) {
        $cnx->rollBack();
        http_response_code(500);
        echo json_encode(['ok' => false, 'error' => 'Ningún registro se pudo actualizar', 'detalle' => $errores]);
        exit;
    }

    $cnx->commit();
    echo json_encode([
        'ok'         => true,
        'updated'    => $count,
        'errores'    => $errores,
        'total'      => count($precios),
    ]);
} catch (Exception $e) {
    if (isset($cnx) && $cnx->inTransaction()) $cnx->rollBack();
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => $e->getMessage()]);
}
