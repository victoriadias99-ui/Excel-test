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

if (isset($_GET['debug'])) {
    echo file_get_contents(__FILE__);
    exit;
}

header('Content-Type: application/json');
if (isset($_GET['debug'])) {
    echo json_encode([
        'env' => getenv('STRIPE_WEBHOOK_SECRET'),
        '_ENV' => $_ENV['STRIPE_WEBHOOK_SECRET'] ?? 'no disponible',
        'all_env_keys' => array_keys($_ENV)
    ]);
    exit;
}

$payload        = file_get_contents('php://input');
$sig_header     = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
$webhook_secret = $_ENV['STRIPE_WEBHOOK_SECRET'] ?? getenv('STRIPE_WEBHOOK_SECRET') ?? '';

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
include(__DIR__ . '/../n-includes/conexion.php');

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
// ── 4b. Crear/actualizar usuario en academia_usuarios ────────────────────────
$password_plain = '';
try {
    // Verificar si el usuario ya existe
    $stmtCheck = $cnx->prepare("SELECT id, cursos FROM academia_usuarios WHERE email = ?");
    $stmtCheck->execute([$buyer_email]);
    $userExist = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if ($userExist) {
        // Usuario existe → agregar el nuevo curso si no lo tiene
        $cursosActuales = $userExist['cursos'];
        $cursosArray = array_filter(array_map('trim', explode(',', $cursosActuales)));
        if (!in_array($academia_slug ?? $curso_raw, $cursosArray)) {
            $cursosArray[] = $academia_slug ?? $curso_raw;
        }
        $nuevosCursos = implode(',', $cursosArray);
        $stmtUpd = $cnx->prepare("UPDATE academia_usuarios SET cursos = ?, activo = 1 WHERE email = ?");
        $stmtUpd->execute([$nuevosCursos, $buyer_email]);
    } else {
        // Usuario nuevo → crear con contraseña aleatoria
        $password_plain = bin2hex(random_bytes(5)); // 10 chars
        $password_hash  = password_hash($password_plain, PASSWORD_BCRYPT);

        $name_parts2 = explode(' ', trim($buyer_name), 2);
        $nom = $name_parts2[0] ?? $buyer_name;
        $ape = $name_parts2[1] ?? '';

        $stmtIns = $cnx->prepare(
            "INSERT INTO academia_usuarios (email, password, nombre, apellido, cursos, activo, fecha_creacion)
             VALUES (?, ?, ?, ?, ?, 1, NOW())"
        );
        $stmtIns->execute([
            $buyer_email,
            $password_hash,
            $nom,
            $ape,
            $academia_slug ?? $curso_raw,
        ]);
    }
} catch (PDOException $e2) {
    error_log('stripe_webhook academia_usuarios error: ' . $e2->getMessage());
}

// ── 4c. Enviar email por Resend ──────────────────────────────────────────────
if (!empty($password_plain)) {
    // Solo enviamos credenciales a usuarios nuevos
    $resend_key = $_ENV['RESEND_API_KEY'] ?? getenv('RESEND_API_KEY') ?? '';

    if (!empty($resend_key)) {
        $name_parts3 = explode(' ', trim($buyer_name), 2);
        $emailNombre = $name_parts3[0] ?? $buyer_name;

        $htmlEmail = '<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
  body { font-family: Poppins, sans-serif; background:#ffffff; padding:20px 0; }
  .container { max-width:600px; margin:0 auto; background:#ffffff; border-radius:12px; overflow:hidden; }
  .header { background:#1a472a; padding:40px 20px; text-align:center; border-bottom:4px solid #4ecdc4; }
  .header h1 { font-size:28px; color:#ffffff; margin:0 0 8px 0; }
  .header p { font-size:14px; color:#e8f5e9; margin:0; }
  .main { padding:40px 30px; }
  .main h2 { font-size:22px; color:#1a472a; margin:0 0 16px 0; }
  .main p { font-size:15px; color:#555; line-height:1.6; margin:0 0 24px 0; }
  .creds { padding:0 30px 30px; }
  .creds-label { font-size:13px; font-weight:600; color:#1a472a; text-transform:uppercase; letter-spacing:.5px; margin:0 0 16px 0; }
  .cred-box { background:#f8f9fa; padding:16px; border-radius:8px; border-left:4px solid #4ecdc4; margin-bottom:12px; }
  .cred-title { font-size:12px; font-weight:600; color:#888; text-transform:uppercase; margin:0 0 8px 0; }
  .cred-value { font-size:16px; font-family:monospace; color:#1a472a; margin:0; font-weight:600; word-break:break-all; }
  .security { font-size:13px; color:#d32f2f; background:#ffebee; padding:12px 14px; border-radius:6px; margin:16px 0 0 0; line-height:1.5; }
  .cta { padding:30px; text-align:center; }
  .btn { background:#4ecdc4; color:#ffffff; border-radius:8px; font-weight:600; font-size:15px; text-decoration:none; display:inline-block; padding:16px 40px; }
  .links { padding:20px 30px; background:#f8f9fa; text-align:center; }
  .links a { color:#1a472a; text-decoration:none; font-size:14px; font-weight:500; margin:0 16px; }
  .footer { padding:30px; background:#fafafa; text-align:center; }
  .footer p { font-size:12px; color:#999; margin:8px 0; line-height:1.5; }
  .footer a { color:#1a472a; text-decoration:none; font-weight:500; }
</style>
</head>
<body>
<div class="container">
  <div class="header">
    <h1>📊 Aprende Excel</h1>
    <p>Tu acceso está listo</p>
  </div>
  <div class="main">
    <h2>¡Bienvenido, ' . htmlspecialchars($emailNombre) . '! 🎉</h2>
    <p>Gracias por confiar en nosotros. Tu cuenta ha sido activada exitosamente y ya podés acceder a todos nuestros cursos.</p>
  </div>
  <div class="creds">
    <p class="creds-label">Tus datos de acceso:</p>
    <div class="cred-box">
      <p class="cred-title">📧 Usuario</p>
      <p class="cred-value">' . htmlspecialchars($buyer_email) . '</p>
    </div>
    <div class="cred-box">
      <p class="cred-title">🔐 Contraseña</p>
      <p class="cred-value">' . htmlspecialchars($password_plain) . '</p>
    </div>
    <p class="security">⚠️ <strong>Importante:</strong> Por tu seguridad, recomendamos cambiar la contraseña en tu primer acceso. No compartas estos datos con nadie.</p>
  </div>
  <div class="cta">
    <a class="btn" href="https://academia-production-c4cc.up.railway.app/">Inicia Sesión Aquí</a>
  </div>
  <div class="links">
    <a href="https://academia-production-c4cc.up.railway.app/">Portal de Cursos</a>
    <a href="https://aprende-excel.com/ayuda">Centro de Ayuda</a>
  </div>
  <div class="footer">
    <p>¿Necesitás ayuda? Contáctanos en <a href="mailto:soporte@aprende-excel.com">soporte@aprende-excel.com</a></p>
    <p>© 2025 Aprende Excel. Todos los derechos reservados.</p>
  </div>
</div>
</body>
</html>';

        $emailPayload = json_encode([
            'from'    => 'Aprende Excel <soporte@aprende-excel.com>',
            'to'      => [$buyer_email],
            'subject' => '¡Tu acceso a Aprende Excel está listo! 🎉',
            'html'    => $htmlEmail,
        ]);

        $chMail = curl_init('https://api.resend.com/emails');
        curl_setopt_array($chMail, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $emailPayload,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $resend_key,
            ],
        ]);
        $mailResponse = curl_exec($chMail);
        $mailStatus   = curl_getinfo($chMail, CURLINFO_HTTP_CODE);
        $mailError    = curl_error($chMail);
        curl_close($chMail);

        if ($mailError || $mailStatus >= 400) {
            error_log('stripe_webhook resend error: ' . $mailError . ' status=' . $mailStatus . ' body=' . $mailResponse);
        }
    }
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
