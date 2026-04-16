<?php
/**
 * realizarVentaStripe.php (argentina)
 * Misma lógica que /a-libraries/realizarVentaStripe.php
 */

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ini_set('display_errors', 0);

if (isset($_GET['test'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

header('Content-Type: text/plain; charset=utf-8');

require_once dirname(__DIR__) . '/a-libraries/vendor/autoload.php';

include("../a-includes/conexion.php");
include("../a-includes/class.autonum.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');

$curso     = isset($_GET['curso'])     ? trim($_GET['curso'])     : '';
$pack      = isset($_GET['pack'])      ? trim($_GET['pack'])      : $curso;
$nombre    = isset($_GET['nombre'])    ? trim($_GET['nombre'])    : '';
$apellido  = isset($_GET['apellido'])  ? trim($_GET['apellido'])  : '';
$celular   = isset($_GET['celular'])   ? trim($_GET['celular'])   : '';
$email     = isset($_GET['email'])     ? trim($_GET['email'])     : '';
$descuento = isset($_GET['descuento']) ? trim($_GET['descuento']) : '';
$dir       = isset($_GET['dir'])       ? trim($_GET['dir'])       : '';

if ($pack !== $curso) {
    $curso = $pack;
}

if (empty($curso) || empty($email)) {
    http_response_code(400);
    echo 'error:datos_incompletos';
    exit;
}

$urlRoot  = 'https://' . $_SERVER['HTTP_HOST'] . '/';
$urlcurso = !empty($dir) ? $urlRoot . 'argentina/' . $dir . '/' : $urlRoot;
$dominio  = str_replace('www.', '', $_SERVER['HTTP_HOST']);

try {
    $cnx = OpenCon();

    $stmt = $cnx->prepare("SELECT * FROM cursos_detalle WHERE CURSO = ?");
    $stmt->bindValue(1, $curso, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($rows)) {
        http_response_code(404);
        echo 'error:curso_no_encontrado';
        exit;
    }

    $precioBase = $rows[0]['PRECIO_UNITARIO'];

    $stripeSecretRaw = $rows[0]['STRIPE_SECRET_KEY'] ?? '';
    if (empty($stripeSecretRaw)) {
        error_log('realizarVentaStripe (argentina): STRIPE_SECRET_KEY vacio para ' . $curso);
        echo 'error:stripe_key_missing';
        exit;
    }

    if (strpos($stripeSecretRaw, '{') === false) {
        $stripeSecret = $stripeSecretRaw;
    } else {
        $decoded = json_decode($stripeSecretRaw, true);
        $stripeSecret = $decoded[$dominio] ?? reset($decoded);
    }

    \Stripe\Stripe::setApiKey($stripeSecret);

    $discounts = [];
    if (!empty($descuento)) {
        $stmt2 = $cnx->prepare(
            "SELECT DESCRIPCION, PORCENTAJE FROM descuentos
             WHERE CURSO=? AND CODIGO_DESCUENTO=? AND ESTADO_ACTIVO=TRUE AND FECHA_HASTA>=DATE(NOW())"
        );
        $stmt2->execute([$curso, $descuento]);
        $rows_desc = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($rows_desc)) {
            $montoDesc = intval($precioBase * ($rows_desc[0]['PORCENTAJE'] / 100));
            $coupon = \Stripe\Coupon::create([
                'amount_off' => $montoDesc * 100,
                'currency'   => 'ars',
                'duration'   => 'once',
                'name'       => $rows_desc[0]['DESCRIPCION'],
            ]);
            $discounts = [['coupon' => $coupon->id]];
        }
    }

    $id_venta = uniqid($curso . '_');
    try {
        $auto_num = new auto_num($cnx, $curso);
        $id_venta = $auto_num->get_id();

        $stmt1 = $cnx->prepare(
            "INSERT INTO ventas
                (CURSO, ID, NOMBRE, APELLIDO, PREFIJO_CEL, CELULAR, EMAIL,
                 DOMINIO, ACCESS_TOKEN, PAGO_ID_MP, ESTADO_MP, ESTADO_DETALLE_MP,
                 PREFERENCIA_ID_MP, FEE_MP, IMP_RECIBIDO_NETO_MP, PAGO_TIPO_MP,
                 PAGO_DESCR_MP, PAGADOR_EMAIL_MP, PAGADOR_NOMBRE_MP,
                 PAGADOR_APELLIDO_MP, PAGADOR_TIPO_MP, PAGADOR_ID_MP, METODO_PAGO_MP)
             VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
        );
        $stmt1->execute([
            $curso, $id_venta, $nombre, $apellido, 0, $celular, $email,
            $dominio, '', '', 'STRIPE_PENDING', '',
            '', 0, 0, '',
            '', '', '',
            '', '', '', ''
        ]);
    } catch (Exception $eLead) {
        error_log('realizarVentaStripe (argentina): INSERT falló - ' . $eLead->getMessage());
    }

    $sessionParams = [
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency'     => 'ars',
                'unit_amount'  => intval($precioBase * 100),
                'product_data' => [
                    'name'        => $rows[0]['TITULO'],
                    'description' => $rows[0]['DESCRIPCION'] . ' (Precio + IVA)',
                ],
            ],
            'quantity' => 1,
        ]],
        'mode'                => 'payment',
        'customer_email'      => $email,
        'client_reference_id' => $curso . '-' . $id_venta,
        'metadata'            => [
            'curso'    => $curso,
            'id_venta' => $id_venta,
            'nombre'   => $nombre,
            'apellido' => $apellido,
            'celular'  => $celular,
            'email'    => $email,
            'dominio'  => $dominio,
        ],
        'success_url' => $urlRoot . '?pago=exitoso&idVenta=' . $id_venta,
        'cancel_url'  => $urlcurso . 'checkout2.html',
    ];

    if (!empty($discounts)) {
        $sessionParams['discounts'] = $discounts;
    }

    $session = \Stripe\Checkout\Session::create($sessionParams);

    if (isset($_GET['test'])) {
        echo "OK\nSession: " . $session->id . "\nURL: " . $session->url;
        exit;
    }

    echo $session->url;

} catch (PDOException $e) {
    error_log('DB Error realizarVentaStripe (argentina): ' . $e->getMessage());
    http_response_code(500);
    if (isset($_GET['test'])) echo 'DB Error: ' . $e->getMessage();
    else echo 'error:db_' . $e->getCode();
} catch (\Stripe\Exception\ApiErrorException $e) {
    error_log('Stripe Error realizarVentaStripe (argentina): ' . $e->getMessage());
    if (isset($_GET['test'])) echo 'Stripe Error: ' . $e->getMessage();
    else echo 'error:stripe_' . $e->getStripeCode();
} catch (\Exception $e) {
    error_log('Error realizarVentaStripe (argentina): ' . $e->getMessage());
    if (isset($_GET['test'])) echo 'Error: ' . $e->getMessage();
    else echo 'error:general';
}
?>
