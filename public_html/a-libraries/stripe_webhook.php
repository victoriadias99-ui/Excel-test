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

if (isset($_GET['test_compra'])) {
    ob_start();
    include(__DIR__ . '/../n-includes/conexion.php');
    ob_end_clean();
    $cnx = OpenCon();

    $buyer_email   = 'victoria.pdias99@gmail.com';
    $buyer_name    = 'Victoria Dias';
    $curso_raw     = 'sql';
    $academia_slug = 'sql';
    $id_venta      = 'TEST001';
    $payment_intent = 'pi_test_001';
    $amount_total  = 70000;

    // Borrar usuario de prueba si ya existe
    $cnx->prepare("DELETE FROM academia_usuarios WHERE email=?")->execute([$buyer_email]);

    $password_plain = bin2hex(random_bytes(5));
    $password_hash  = password_hash($password_plain, PASSWORD_BCRYPT);
    $stmtIns = $cnx->prepare(
        "INSERT INTO academia_usuarios (email, password, nombre, apellido, cursos, activo, fecha_creacion) VALUES (?,?,?,?,?,1,NOW())"
    );
    $stmtIns->execute([$buyer_email, $password_hash, 'Victoria', 'Dias', $academia_slug]);

    $resend_key  = $_ENV['RESEND_API_KEY'] ?? getenv('RESEND_API_KEY') ?? '';
    $emailNombre = 'Victoria';
    $htmlEmail = '<!DOCTYPE html><html><head><meta charset="UTF-8"><style>
body{font-family:Poppins,sans-serif;background:#fff;padding:20px 0}
.container{max-width:600px;margin:0 auto;background:#fff;border-radius:12px;overflow:hidden}
.header{background:#1a472a;padding:40px 20px;text-align:center;border-bottom:4px solid #4ecdc4}
.header h1{font-size:28px;color:#fff;margin:0 0 8px}
.header p{font-size:14px;color:#e8f5e9;margin:0}
.main{padding:40px 30px}
.main h2{font-size:22px;color:#1a472a;margin:0 0 16px}
.main p{font-size:15px;color:#555;line-height:1.6;margin:0 0 24px}
.creds{padding:0 30px 30px}
.cred-box{background:#f8f9fa;padding:16px;border-radius:8px;border-left:4px solid #4ecdc4;margin-bottom:12px}
.cred-title{font-size:12px;font-weight:600;color:#888;text-transform:uppercase;margin:0 0 8px}
.cred-value{font-size:16px;font-family:monospace;color:#1a472a;margin:0;font-weight:600;word-break:break-all}
.security{font-size:13px;color:#d32f2f;background:#ffebee;padding:12px 14px;border-radius:6px;margin:16px 0 0}
.cta{padding:30px;text-align:center}
.btn{background:#4ecdc4;color:#fff;border-radius:8px;font-weight:600;font-size:15px;text-decoration:none;display:inline-block;padding:16px 40px}
.footer{padding:30px;background:#fafafa;text-align:center}
.footer p{font-size:12px;color:#999;margin:8px 0}
.footer a{color:#1a472a;text-decoration:none}
</style></head><body>
<div class="container">
  <div class="header"><h1>📊 Aprende Excel</h1><p>Tu acceso está listo</p></div>
  <div class="main">
    <h2>¡Bienvenido, ' . $emailNombre . '! 🎉</h2>
    <p>Gracias por confiar en nosotros. Tu cuenta ha sido activada y ya podés acceder a tus cursos.</p>
  </div>
  <div class="creds">
    <div class="cred-box"><p class="cred-title">📧 Usuario</p><p class="cred-value">' . $buyer_email . '</p></div>
    <div class="cred-box"><p class="cred-title">🔐 Contraseña</p><p class="cred-value">' . $password_plain . '</p></div>
    <p class="security">⚠️ <strong>Importante:</strong> Recomendamos cambiar la contraseña en tu primer acceso.</p>
  </div>
  <div class="cta"><a class="btn" href="https://academia-production-c4cc.up.railway.app/">Inicia Sesión Aquí</a></div>
  <div class="footer">
    <p>¿Necesitás ayuda? <a href="mailto:soporte@aprende-excel.com">soporte@aprende-excel.com</a></p>
    <p>© 2025 Aprende Excel. Todos los derechos reservados.</p>
  </div>
</div></body></html>';

    $chMail = curl_init('https://api.resend.com/emails');
    curl_setopt_array($chMail, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode([
            'from'    => 'Aprende Excel <soporte@aprende-excel.com>',
            'to'      => [$buyer_email],
            'subject' => '¡Tu acceso a Aprende Excel está listo! 🎉',
            'html'    => $htmlEmail,
        ]),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json', 'Authorization: Bearer ' . $resend_key],
    ]);
    $mailResponse = curl_exec($chMail);
    $mailStatus   = curl_getinfo($chMail, CURLINFO_HTTP_CODE);
    curl_close($chMail);

    echo json_encode([
        'usuario_creado' => true,
        'password_plain' => $password_plain,
        'resend_status'  => $mailStatus,
        'resend_body'    => $mailResponse,
    ]);
    exit;
}

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

// ── Determinar academia_slug ─────────────────────────────────────────────────
$academia_slug = !empty($curso_raw)
    ? (CURSO_SLUG_MAP[$curso_raw] ?? $curso_raw)
    : '';

// ── Conexión DB ──────────────────────────────────────────────────────────────
ob_start();
include(__DIR__ . '/../n-includes/conexion.php');
ob_end_clean();

$cnx = null;
try {
    $cnx = OpenCon();
} catch (PDOException $e) {
    error_log('stripe_webhook DB connect error: ' . $e->getMessage());
}

// ── Actualizar tabla ventas ──────────────────────────────────────────────────
if ($cnx && !empty($curso_raw) && !empty($id_venta)) {
    try {
        $stmt = $cnx->prepare(
            "UPDATE ventas SET ESTADO_MP='approved', PAGO_ID_MP=?, PAGADOR_EMAIL_MP=?, PAGADOR_NOMBRE_MP=?, FECHA_COMPRA_MP=NOW(), IMP_RECIBIDO_NETO_MP=? WHERE CURSO=? AND ID=?"
        );
        $stmt->execute([$payment_intent, $buyer_email, $buyer_name, $amount_total / 100, $curso_raw, $id_venta]);
    } catch (PDOException $e) {
        error_log('stripe_webhook ventas error: ' . $e->getMessage());
    }
}

// ── Obtener nombre si está vacío ─────────────────────────────────────────────
if ($cnx && empty($buyer_name) && !empty($curso_raw) && !empty($id_venta)) {
    try {
        $q = $cnx->prepare("SELECT NOMBRE, APELLIDO FROM ventas WHERE CURSO=? AND ID=? LIMIT 1");
        $q->execute([$curso_raw, $id_venta]);
        $row = $q->fetch(PDO::FETCH_ASSOC);
        if ($row) $buyer_name = trim($row['NOMBRE'] . ' ' . $row['APELLIDO']);
    } catch (PDOException $e) {}
}

// ── Crear/actualizar usuario en academia_usuarios ────────────────────────────
$password_plain = '';
if ($cnx && !empty($buyer_email)) {
    try {
        $stmtCheck = $cnx->prepare("SELECT id, cursos FROM academia_usuarios WHERE email=?");
        $stmtCheck->execute([$buyer_email]);
        $userExist = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($userExist) {
            $cursosArray = array_filter(array_map('trim', explode(',', $userExist['cursos'])));
            if (!in_array($academia_slug, $cursosArray)) {
                $cursosArray[] = $academia_slug;
            }
            $stmtUpd = $cnx->prepare("UPDATE academia_usuarios SET cursos=?, activo=1 WHERE email=?");
            $stmtUpd->execute([implode(',', $cursosArray), $buyer_email]);
        } else {
            $password_plain = bin2hex(random_bytes(5));
            $password_hash  = password_hash($password_plain, PASSWORD_BCRYPT);
            $name_parts2    = explode(' ', trim($buyer_name), 2);
            $stmtIns = $cnx->prepare(
                "INSERT INTO academia_usuarios (email, password, nombre, apellido, cursos, activo, fecha_creacion) VALUES (?,?,?,?,?,1,NOW())"
            );
            $stmtIns->execute([
                $buyer_email,
                $password_hash,
                $name_parts2[0] ?? $buyer_name,
                $name_parts2[1] ?? '',
                $academia_slug,
            ]);
        }
    } catch (PDOException $e) {
        error_log('stripe_webhook academia_usuarios error: ' . $e->getMessage());
    }
}

// ── Enviar email por Resend ──────────────────────────────────────────────────
if (!empty($password_plain)) {
    $resend_key  = $_ENV['RESEND_API_KEY'] ?? getenv('RESEND_API_KEY') ?? '';
    $emailNombre = explode(' ', trim($buyer_name))[0] ?? $buyer_name;

    if (!empty($resend_key)) {
        $htmlEmail = '<!DOCTYPE html><html><head><meta charset="UTF-8"><style>
body{font-family:Poppins,sans-serif;background:#fff;padding:20px 0}
.container{max-width:600px;margin:0 auto;background:#fff;border-radius:12px;overflow:hidden}
.header{background:#1a472a;padding:40px 20px;text-align:center;border-bottom:4px solid #4ecdc4}
.header h1{font-size:28px;color:#fff;margin:0 0 8px}
.header p{font-size:14px;color:#e8f5e9;margin:0}
.main{padding:40px 30px}
.main h2{font-size:22px;color:#1a472a;margin:0 0 16px}
.main p{font-size:15px;color:#555;line-height:1.6;margin:0 0 24px}
.creds{padding:0 30px 30px}
.cred-box{background:#f8f9fa;padding:16px;border-radius:8px;border-left:4px solid #4ecdc4;margin-bottom:12px}
.cred-title{font-size:12px;font-weight:600;color:#888;text-transform:uppercase;margin:0 0 8px}
.cred-value{font-size:16px;font-family:monospace;color:#1a472a;margin:0;font-weight:600;word-break:break-all}
.security{font-size:13px;color:#d32f2f;background:#ffebee;padding:12px 14px;border-radius:6px;margin:16px 0 0}
.cta{padding:30px;text-align:center}
.btn{background:#4ecdc4;color:#fff;border-radius:8px;font-weight:600;font-size:15px;text-decoration:none;display:inline-block;padding:16px 40px}
.footer{padding:30px;background:#fafafa;text-align:center}
.footer p{font-size:12px;color:#999;margin:8px 0}
.footer a{color:#1a472a;text-decoration:none}
</style></head><body>
<div class="container">
  <div class="header"><h1>📊 Aprende Excel</h1><p>Tu acceso está listo</p></div>
  <div class="main">
    <h2>¡Bienvenido, ' . htmlspecialchars($emailNombre) . '! 🎉</h2>
    <p>Gracias por confiar en nosotros. Tu cuenta ha sido activada y ya podés acceder a tus cursos.</p>
  </div>
  <div class="creds">
    <div class="cred-box"><p class="cred-title">📧 Usuario</p><p class="cred-value">' . htmlspecialchars($buyer_email) . '</p></div>
    <div class="cred-box"><p class="cred-title">🔐 Contraseña</p><p class="cred-value">' . htmlspecialchars($password_plain) . '</p></div>
    <p class="security">⚠️ <strong>Importante:</strong> Recomendamos cambiar la contraseña en tu primer acceso.</p>
  </div>
  <div class="cta"><a class="btn" href="https://academia-production-c4cc.up.railway.app/">Inicia Sesión Aquí</a></div>
  <div class="footer">
    <p>¿Necesitás ayuda? <a href="mailto:soporte@aprende-excel.com">soporte@aprende-excel.com</a></p>
    <p>© 2025 Aprende Excel. Todos los derechos reservados.</p>
  </div>
</div></body></html>';

        $chMail = curl_init('https://api.resend.com/emails');
        curl_setopt_array($chMail, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode([
                'from'    => 'Aprende Excel <soporte@aprende-excel.com>',
                'to'      => [$buyer_email],
                'subject' => '¡Tu acceso a Aprende Excel está listo! 🎉',
                'html'    => $htmlEmail,
            ]),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $resend_key,
            ],
        ]);
        $mailResponse = curl_exec($chMail);
        $mailStatus   = curl_getinfo($chMail, CURLINFO_HTTP_CODE);
        curl_close($chMail);

        if ($mailStatus >= 400) {
            error_log('stripe_webhook resend error status=' . $mailStatus . ' body=' . $mailResponse);
        }
    }
}

// ── Llamar al webhook de la Academia ────────────────────────────────────────
$academia_url    = $_ENV['ACADEMIA_WEBHOOK_URL']    ?? getenv('ACADEMIA_WEBHOOK_URL')    ?? '';
$academia_secret = $_ENV['ACADEMIA_WEBHOOK_SECRET'] ?? getenv('ACADEMIA_WEBHOOK_SECRET') ?? '';
$http_status     = 0;
$response        = '';

if (!empty($academia_url) && !empty($academia_slug)) {
    $name_parts = explode(' ', trim($buyer_name), 2);
    $body = json_encode([
        'email'    => $buyer_email,
        'nombre'   => $name_parts[0] ?? $buyer_name,
        'apellido' => $name_parts[1] ?? '',
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
    curl_close($ch);
}

http_response_code(200);
echo json_encode(['status' => 'ok', 'academia_status' => $http_status]);
