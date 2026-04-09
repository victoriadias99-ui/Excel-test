<?php
const CURSO_SLUG_MAP = [
    'excel'              => 'excel',
    'excel_inicial'      => 'excel',
    'excel_intermedio'   => 'excel_intermedio',
    'excel_avanzado'     => 'excel_avanzado',
    'excel_promo'        => 'excel_promo',
    'excel_en_vivo'      => 'excel_en_vivo',
    'powerbi'            => 'powerbi',
    'pbi_avanzado'       => 'pbi_avanzado',
    'prom_pbi_excel'     => 'prom_pbi_excel',
    'sql'                => 'sql',
    'office'             => 'office',
    'word'               => 'word',
    'powerpoint'         => 'powerpoint',
    'google_sheet'       => 'google_sheet',
    'visualstudio'       => 'visualstudio',
    'windows_server'     => 'windows_server',
    'project_inicial'    => 'project_inicial',
    'project_intermedio' => 'project_intermedio',
    'project_avanzado'   => 'project_avanzado',
    'prom_project_pack'  => 'prom_project_pack',
    'petroleo'           => 'petroleo',
    'Petróleo'           => 'petroleo',
    'metodologia_agil'   => 'metodologia_agil',
    'pantilla_finanzas'  => 'pantilla_finanzas',
];

header('Content-Type: application/json');

$payload        = file_get_contents('php://input');
$sig_header     = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
$webhook_secret = $_ENV['STRIPE_WEBHOOK_SECRET'] ?? getenv('STRIPE_WEBHOOK_SECRET') ?? '';

if (empty($webhook_secret)) {
    http_response_code(500);
    echo json_encode(['error' => 'STRIPE_WEBHOOK_SECRET no configurado']);
    exit;
}

$timestamp    = null;
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

if (abs(time() - intval($timestamp)) > 300) {
    http_response_code(400);
    echo json_encode(['error' => 'Timestamp demasiado antiguo']);
    exit;
}

$signed_payload = $timestamp . '.' . $payload;
$expected_sig   = hash_hmac('sha256', $signed_payload, $webhook_secret);

if (!hash_equals($expected_sig, $received_sig)) {
    http_response_code(400);
    echo json_encode(['error' => 'Firma invalida']);
    exit;
}

$event = json_decode($payload, true);
if (!$event || $event['type'] !== 'checkout.session.completed') {
    http_response_code(200);
    echo json_encode(['status' => 'ignored', 'type' => $event['type'] ?? 'unknown']);
    exit;
}

$session        = $event['data']['object'];
$buyer_email    = $session['customer_details']['email'] ?? '';
$buyer_name     = $session['customer_details']['name']  ?? '';
$client_ref     = $session['client_reference_id'] ?? '';
$amount_total   = $session['amount_total']   ?? 0;
$payment_intent = $session['payment_intent'] ?? '';

if (empty($buyer_email)) {
    http_response_code(400);
    echo json_encode(['error' => 'Email del comprador no disponible']);
    exit;
}

$curso_raw = '';
$id_venta  = '';
if (!empty($client_ref)) {
    $last_dash = strrpos($client_ref, '-');
    if ($last_dash !== false) {
        $curso_raw = substr($client_ref, 0, $last_dash);
        $id_venta  = substr($client_ref, $last_dash + 1);
    } else {
        $curso_raw = $client_ref;
    }
}

// ──
