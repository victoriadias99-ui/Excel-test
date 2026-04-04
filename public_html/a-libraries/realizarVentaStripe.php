<?php
/**
 * realizarVentaStripe.php
 * ───────────────────────
 * Reemplaza realizarVenta.php (MercadoPago).
 *
 * Flujo:
 *  1. Recibe los datos del formulario de pago (nombre, email, etc.)
 *  2. Guarda el lead en la tabla `ventas`
 *  3. Devuelve el Stripe Payment Link (URL_CHECKOUT de la BD)
 *     con el email pre-cargado y una referencia única.
 */

if (isset($_GET['test'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

header('Content-Type: text/plain; charset=utf-8');

include("../a-includes/conexion.php");
include("../a-includes/class.autonum.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');

// ── Parámetros del formulario ───────────────────────────────
$curso    = isset($_GET['curso'])    ? trim($_GET['curso'])    : '';
$pack     = isset($_GET['pack'])     ? trim($_GET['pack'])     : $curso;
$nombre   = isset($_GET['nombre'])   ? trim($_GET['nombre'])   : '';
$apellido = isset($_GET['apellido']) ? trim($_GET['apellido']) : '';
$celular  = isset($_GET['celular'])  ? trim($_GET['celular'])  : '';
$email    = isset($_GET['email'])    ? trim($_GET['email'])    : '';

// Si vienen varios cursos en pack, usar el pack como identificador
if ($pack !== $curso) {
    $curso = $pack;
}

// Validación básica
if (empty($curso) || empty($email)) {
    http_response_code(400);
    echo 'error:datos_incompletos';
    exit;
}

$urlRoot = 'https://' . $_SERVER['HTTP_HOST'] . '/';
$dominio = str_replace('www.', '', $_SERVER['HTTP_HOST']);

try {
    $cnx = OpenCon();

    // ── 1. Obtener el Stripe Payment Link del curso ─────────
    $stmt = $cnx->prepare(
        "SELECT URL_CHECKOUT, TITULO FROM cursos_detalle WHERE CURSO = ?"
    );
    $stmt->bindValue(1, $curso, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($rows) || empty($rows[0]['URL_CHECKOUT'])) {
        http_response_code(404);
        echo 'error:curso_no_encontrado';
        exit;
    }

    $stripePaymentLink = $rows[0]['URL_CHECKOUT'];

    // ── 2. Guardar lead en la tabla ventas ──────────────────
    $auto_num = new auto_num($cnx, $curso);
    $id_venta = $auto_num->get_id();

    $stmt1 = $cnx->prepare(
        "INSERT INTO ventas
            (CURSO, ID, NOMBRE, APELLIDO, PREFIJO_CEL, CELULAR, EMAIL, ESTADO_MP, PREFERENCIA_ID_MP, DOMINIO, ACCESS_TOKEN)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt1->execute([
        $curso,
        $id_venta,
        $nombre,
        $apellido,
        0,
        $celular,
        $email,
        'STRIPE_PENDING',   // Estado inicial — se actualiza vía webhook de Stripe
        '',                 // No aplica para Stripe
        $dominio,
        '',
    ]);

    if (isset($_GET['test'])) {
        echo "Lead guardado: $id_venta<br>";
        echo "Stripe URL base: $stripePaymentLink<br>";
    }

    // ── 3. Armar URL de Stripe con datos pre-cargados ───────
    // Stripe Payment Links soportan estos query params:
    //   prefilled_email     → pre-llena el campo email
    //   client_reference_id → referencia interna (curso-idVenta)
    $separator = (strpos($stripePaymentLink, '?') !== false) ? '&' : '?';

    $redirectUrl = $stripePaymentLink
        . $separator . 'prefilled_email='     . urlencode($email)
        . '&client_reference_id='             . urlencode($curso . '-' . $id_venta);

    if (isset($_GET['test'])) {
        echo "Redirect URL: $redirectUrl<br>";
        exit;
    }

    // ── 4. Devolver la URL al JS (igual que hacía realizarVenta.php) ─
    echo $redirectUrl;

} catch (PDOException $e) {
    http_response_code(500);
    echo 'error:db_' . $e->getCode();
}
?>
