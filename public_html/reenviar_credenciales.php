<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Método no permitido']);
    exit;
}

$idVenta = trim($_POST['idVenta'] ?? '');
if (empty($idVenta)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'idVenta requerido']);
    exit;
}

include('a-includes/funcionsDB.php');

$venta = getVenta($idVenta);
if (!$venta) {
    http_response_code(404);
    echo json_encode(['ok' => false, 'error' => 'Venta no encontrada']);
    exit;
}

$email    = strtolower(trim($venta['EMAIL']));
$nombre   = $venta['NOMBRE'] ?? '';
$apellido = $venta['APELLIDO'] ?? '';
$curso    = $venta['CURSO'] ?? '';

if (empty($email)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Email no disponible en la venta']);
    exit;
}

try {
    $cnx = OpenCon();

    // Generar nueva contraseña
    $password_plain = bin2hex(random_bytes(5));
    $password_hash  = password_hash($password_plain, PASSWORD_BCRYPT);

    // Verificar si el usuario ya existe en academia_usuarios
    $stmt = $cnx->prepare("SELECT id FROM academia_usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Actualizar contraseña existente
        $cnx->prepare("UPDATE academia_usuarios SET password = ? WHERE email = ?")
            ->execute([$password_hash, $email]);
    } else {
        // Crear usuario nuevo
        $cnx->prepare(
            "INSERT INTO academia_usuarios (email, password, nombre, apellido, cursos, activo, fecha_creacion) VALUES (?,?,?,?,?,1,NOW())"
        )->execute([$email, $password_hash, $nombre, $apellido, $curso]);
    }

    // Enviar email con credenciales via Resend
    $resend_key = $_ENV['RESEND_API_KEY'] ?? getenv('RESEND_API_KEY') ?? '';
    if (empty($resend_key)) {
        http_response_code(500);
        echo json_encode(['ok' => false, 'error' => 'Servicio de email no configurado']);
        exit;
    }

    $nombre_display = trim($nombre . ' ' . $apellido) ?: 'Estudiante';
    $html_body = '
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
<body style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
  <div style="text-align: center; margin-bottom: 30px;">
    <img src="https://excel-facil.com/n-assets/img/logo-excel.png" alt="Aprende Excel" style="max-width: 200px;">
  </div>
  <h2 style="color: #333;">Hola, ' . htmlspecialchars($nombre_display) . '!</h2>
  <p>Aquí están tus credenciales de acceso a la Academia Online:</p>
  <div style="background: #f4f4f4; border-left: 4px solid #e6007e; padding: 15px 20px; margin: 20px 0; border-radius: 4px;">
    <p style="margin: 5px 0;"><strong>Usuario:</strong> ' . htmlspecialchars($email) . '</p>
    <p style="margin: 5px 0;"><strong>Contraseña:</strong> ' . htmlspecialchars($password_plain) . '</p>
  </div>
  <p>Si tenés algún problema para ingresar, respondé este email y te ayudamos.</p>
  <p style="color: #888; font-size: 12px;">Si no realizaste esta compra, podés ignorar este mensaje.</p>
</body>
</html>';

    $ch = curl_init('https://api.resend.com/emails');
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode([
            'from'    => 'Aprende Excel <onboarding@resend.dev>',
            'to'      => [$email],
            'subject' => 'Tus credenciales de acceso - Aprende Excel',
            'html'    => $html_body,
        ]),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 15,
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $resend_key,
        ],
    ]);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode >= 200 && $httpCode < 300) {
        echo json_encode(['ok' => true]);
    } else {
        error_log('reenviar_credenciales: Resend error ' . $httpCode . ' - ' . $response);
        http_response_code(502);
        echo json_encode(['ok' => false, 'error' => 'Error al enviar el email']);
    }

} catch (PDOException $e) {
    error_log('reenviar_credenciales DB error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'Error interno']);
}
