<?php
/**
 * stripe_webhook.php
 * ──────────────────
 * Webhook de Stripe para el evento checkout.session.completed.
 *
 * Flujo:
 *  1. Verifica la firma del webhook de Stripe.
 *  2. Parsea el curso y el ID de venta desde client_reference_id.
 *  3. Actualiza la tabla `ventas` con los datos del pago.
 *  4. Llama al webhook de la Academia para crear/actualizar el usuario.
 *
 * Variables de entorno necesarias en Railway:
 *   STRIPE_WEBHOOK_SECRET  → whsec_xxx  (desde Stripe Dashboard > Webhooks)
 *   ACADEMIA_WEBHOOK_URL   → https://tu-academia.vercel.app/api/webhook/purchase
 *   ACADEMIA_WEBHOOK_SECRET → mismo valor que WEBHOOK_SECRET en Vercel
 *
 * URL a registrar en Stripe Dashboard:
 *   https://tu-dominio.com/a-libraries/stripe_webhook.php
 * Eventos a escuchar: checkout.session.completed
 */

// ── Mapeo de curso slug → cursos en la academia ─────────────────────────────
// Ajustar si el CURSO en `ventas` difiere del slug usado en la Academia.
const CURSO_SLUG_MAP = [
    'excel_inicial'     => 'excel',
    'excel_intermedio'  => 'excel_intermedio',
    'excel_avanzado'    => 'excel_avanzado',
    'excel_promo'       => 'excel_promo',
    // Agrega más mappings si los identificadores de curso en la landing
    // son distintos a los slugs de la academia.
];

header('Content-Type: application/json');

$payload        = file_get_contents('php://input');
$sig_header     = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
$webhook_secret = getenv('STRIPE_WEBHOOK_SECRET') ?: '';

// ── 1. Verificar firma de Stripe ─────────────────────────────────────────────
if (empty($webhook_secret)) {
    http_response_code(500);
    echo json_encode(['error' => 'STRIPE_WEBHOOK_SECRET no configurado']);
    exit;
}

$timestamp  = null;
$received_sig = null;

foreach (explode(',', $sig_header) as $part) {
    $kv = explode('=', trim($part), 2);
    if (count($kv) !== 2) continue;
    if ($kv[0] === 't')  $timestamp    = $kv[1];
    if ($kv[0] === 'v1') $received_sig = $kv[1];
}

if (!$timestamp || !$received_sig) {
    http_response_code(400);
    echo json_encode(['error' => 'Firma invalida: cabecera malformada']);
    exit;
}

// Rechazar si el timestamp tiene mas de 5 minutos
if (abs(time() - intval($timestamp)) > 300) {
    http_response_code(400);
    echo json_encode(['error' => 'Timestamp demasiado antiguo']);
    exit;
}

$signed_payload  = $timestamp . '.' . $payload;
$expected_sig    = hash_hmac('sha256', $signed_payload, $webhook_secret);

if (!hash_equals($expected_sig, $received_sig)) {
    http_response_code(400);
    echo json_encode(['error' => 'Firma invalida']);
    exit;
}

// ── 2. Parsear evento ────────────────────────────────────────────────────────
$event = json_decode($payload, true);
if (!$event || $event['type'] !== 'checkout.session.completed') {
    http_response_code(200);
    echo json_encode(['status' => 'ignored', 'type' => $event['type'] ?? 'unknown']);
    exit;
}

$session = $event['data']['object'];

$buyer_email    = $session['customer_details']['email'] ?? '';
$buyer_name     = $session['customer_details']['name']  ?? '';
$client_ref     = $session['client_reference_id'] ?? '';
$amount_total   = $session['amount_total']   ?? 0;   // en centavos
$currency       = $session['currency']       ?? '';
$payment_intent = $session['payment_intent'] ?? '';
$session_id     = $session['id']             ?? '';

if (empty($buyer_email)) {
    http_response_code(400);
    echo json_encode(['error' => 'Email del comprador no disponible']);
    exit;
}

// ── 3. Parsear client_reference_id → "{curso}-{id_venta}" ───────────────────
// Formato generado por realizarVentaStripe.php: "{curso}-{id_venta}"
$curso_raw  = '';
$id_venta   = '';

if (!empty($client_ref)) {
    // El ultimo segmento separado por "-" es el id_venta,
    // el resto forma el nombre del curso (que puede contener guiones).
    $last_dash = strrpos($client_ref, '-');
    if ($last_dash !== false) {
        $curso_raw = substr($client_ref, 0, $last_dash);
        $id_venta  = substr($client_ref, $last_dash + 1);
    } else {
        $curso_raw = $client_ref;
    }
}

// ── 4. Actualizar tabla ventas ───────────────────────────────────────────────
include(__DIR__ . '/../a-includes/conexion.php');

try {
    $cnx = OpenCon();

    if (!empty($curso_raw) && !empty($id_venta)) {
        $stmt = $cnx->prepare(
            "UPDATE ventas
                SET ESTADO_MP          = 'approved',
                    PAGO_ID_MP         = ?,
                    PAGADOR_EMAIL_MP   = ?,
                    PAGADOR_NOMBRE_MP  = ?,
                    FECHA_COMPRA_MP    = NOW(),
                    IMP_RECIBIDO_NETO_MP = ?
              WHERE CURSO = ? AND ID = ?"
        );
        $stmt->execute([
            $payment_intent,
            $buyer_email,
            $buyer_name,
            $amount_total / 100,
            $curso_raw,
            $id_venta,
        ]);
    }

    // Intentar obtener nombre/apellido desde ventas si el buyer_name esta vacio
    if (empty($buyer_name) && !empty($curso_raw) && !empty($id_venta)) {
        $q = $cnx->prepare("SELECT NOMBRE, APELLIDO FROM ventas WHERE CURSO = ? AND ID = ? LIMIT 1");
        $q->execute([$curso_raw, $id_venta]);
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $buyer_name = trim($row['NOMBRE'] . ' ' . $row['APELLIDO']);
        }
    }

} catch (PDOException $e) {
    // No abortamos: el pago esta confirmado, continuamos con el webhook
    error_log('stripe_webhook DB error: ' . $e->getMessage());
}

// ── 5. Determinar slugs de cursos para la Academia ───────────────────────────
// Si existe un mapeo explicito, usarlo; sino usar el curso_raw directamente.
$academia_slug = !empty($curso_raw)
    ? (CURSO_SLUG_MAP[$curso_raw] ?? $curso_raw)
    : '';

if (empty($academia_slug)) {
    http_response_code(200);
    echo json_encode(['status' => 'ok', 'academia' => 'skipped (no course slug)']);
    exit;
}

// Separar nombre y apellido
$name_parts = explode(' ', trim($buyer_name), 2);
$nombre     = $name_parts[0] ?? $buyer_name;
$apellido   = $name_parts[1] ?? '';

// ── 6. Llamar al webhook de la Academia ─────────────────────────────────────
$academia_url    = getenv('ACADEMIA_WEBHOOK_URL')    ?: '';
$academia_secret = getenv('ACADEMIA_WEBHOOK_SECRET') ?: '';

if (empty($academia_url)) {
    http_response_code(200);
    echo json_encode(['status' => 'ok', 'academia' => 'skipped (ACADEMIA_WEBHOOK_URL no configurada)']);
    exit;
}

$body = json_encode([
    'email'    => $buyer_email,
    'nombre'   => $nombre,
    'apellido' => $apellido,
    'cursos'   => [$academia_slug],
]);

$ch = curl_init($academia_url);
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $body,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 15,
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($body),
        'x-webhook-secret: ' . $academia_secret,
    ],
]);

$response    = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_error  = curl_error($ch);
curl_close($ch);

if ($curl_error) {
    error_log('stripe_webhook academia call error: ' . $curl_error);
}

http_response_code(200);
echo json_encode([
    'status'          => 'ok',
    'academia_status' => $http_status,
    'academia_body'   => $response,
]);
