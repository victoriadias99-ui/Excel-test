<?php
/**
 * realizarVentaStripe.php
 * ───────────────────────
 * Crea una Stripe Checkout Session usando STRIPE_SECRET_KEY de cursos_detalle.
 */

// Suprimir deprecated notices del SDK de Stripe (incompatible con PHP 8.1+)
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
require_once dirname(__DIR__) . '/a-includes/logicprecios.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');

$curso     = isset($_GET['curso'])     ? trim($_GET['curso'])     : '';
$pack      = isset($_GET['pack'])      ? trim($_GET['pack'])      : $curso;
$nombre    = isset($_GET['nombre'])    ? trim($_GET['nombre'])    : '';
$apellido  = isset($_GET['apellido'])  ? trim($_GET['apellido'])  : '';
$celular   = isset($_GET['celular'])   ? trim($_GET['celular'])   : '';
$email     = isset($_GET['email'])     ? trim($_GET['email'])     : '';
$descuento = isset($_GET['descuento']) ? trim($_GET['descuento']) : '';
$dir       = isset($_GET['dir'])       ? trim($_GET['dir'])       : '';

// Moneda y país del visitante (enviados desde el form) — fallback ARS/AR
$monedaIn  = isset($_GET['moneda'])  ? strtoupper(trim($_GET['moneda']))  : 'ARS';
$countryIn = isset($_GET['country']) ? strtoupper(trim($_GET['country'])) : 'AR';

if ($pack !== $curso) {
    $curso = $pack;
}

if (empty($curso) || empty($email)) {
    echo 'error:datos_incompletos';
    exit;
}

$urlRoot  = 'https://' . $_SERVER['HTTP_HOST'] . '/';
$urlcurso = !empty($dir) ? $urlRoot . $dir . '/' : $urlRoot;
$dominio  = str_replace('www.', '', $_SERVER['HTTP_HOST']);

try {
    $cnx = OpenCon();

    // 1. Datos del curso
    $stmt = $cnx->prepare("SELECT * FROM cursos_detalle WHERE CURSO = ?");
    $stmt->bindValue(1, $curso, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($rows)) {
        // Course not found — try to auto-create it (gemini course) or fail gracefully
        if ($curso === 'gemini') {
            $stmtKey = $cnx->prepare("SELECT STRIPE_SECRET_KEY FROM cursos_detalle WHERE STRIPE_SECRET_KEY != '' AND STRIPE_SECRET_KEY IS NOT NULL LIMIT 1");
            $stmtKey->execute();
            $otherCurso = $stmtKey->fetch(PDO::FETCH_ASSOC);
            $stripeKeyFallback = $otherCurso['STRIPE_SECRET_KEY'] ?? '';
            if (!empty($stripeKeyFallback)) {
                try {
                    $stmtIns = $cnx->prepare("INSERT INTO cursos_detalle (CURSO, TITULO, DESCRIPCION, DIR, IMAGEN, PRECIO_UNITARIO, PORCENTAJE_DES, ESTADO, STRIPE_SECRET_KEY) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE STRIPE_SECRET_KEY=VALUES(STRIPE_SECRET_KEY), TITULO=VALUES(TITULO), PRECIO_UNITARIO=VALUES(PRECIO_UNITARIO), PORCENTAJE_DES=VALUES(PORCENTAJE_DES)");
                    $stmtIns->execute(['gemini', 'Curso de Gemini desde Cero', 'Aprende a usar Google Gemini para potenciar tu productividad con Inteligencia Artificial', '../gemini-mockup/', '../a-img/logo-gemini.png', 12999, 23, 1, $stripeKeyFallback]);
                } catch (\Throwable $eIns) {
                    error_log('realizarVentaStripe: auto-create gemini failed - ' . $eIns->getMessage());
                }
                try {
                    $stmtAuto = $cnx->prepare("INSERT IGNORE INTO auto_num (ID, PREFIJO, ULTIMO_NUM, MAX_LEN) VALUES (?, ?, ?, ?)");
                    $stmtAuto->execute(['gemini', 'GEM', 0, 10]);
                } catch (\Throwable $eAuto) {
                    error_log('realizarVentaStripe: auto-create auto_num gemini failed - ' . $eAuto->getMessage());
                }
                $rows = [['TITULO' => 'Curso de Gemini desde Cero', 'DESCRIPCION' => 'Aprende a usar Google Gemini para potenciar tu productividad con Inteligencia Artificial', 'PRECIO_UNITARIO' => 12999, 'PORCENTAJE_DES' => 23, 'STRIPE_SECRET_KEY' => $stripeKeyFallback]];
            } else {
                echo 'error:curso_no_encontrado';
                exit;
            }
        } else {
            echo 'error:curso_no_encontrado';
            exit;
        }
    }

    $precioBase = $rows[0]['PRECIO_UNITARIO'];

    // ─── Multi-moneda Stripe ──────────────────────────────────────────────
    $stripeSupported = [
        'ARS','BOB','BRL','CLP','COP','CRC','DOP','EUR',
        'GTQ','HNL','MXN','NIO','PAB','PEN','PYG','USD','UYU',
    ];
    $stripeZeroDecimal = [
        'BIF','CLP','DJF','GNF','ISK','JPY','KMF','KRW','MGA',
        'PYG','RWF','UGX','VND','VUV','XAF','XOF','XPF',
    ];

    if (in_array($monedaIn, $stripeSupported, true)) {
        $monedaStripe       = $monedaIn;
        $precioMonedaStripe = convertirPrecioNumerico($precioBase, $monedaStripe);
    } else {
        $monedaStripe       = 'USD';
        $precioMonedaStripe = convertirPrecioNumerico($precioBase, 'USD');
    }
    $isZeroDecimal     = in_array($monedaStripe, $stripeZeroDecimal, true);
    $factorStripe      = $isZeroDecimal ? 1 : 100;
    $unitAmount        = intval(round($precioMonedaStripe * $factorStripe));
    $monedaStripeLower = strtolower($monedaStripe);

    // 2. Clave Stripe
    $stripeSecretRaw = $rows[0]['STRIPE_SECRET_KEY'] ?? '';
    if (empty($stripeSecretRaw)) {
        error_log('realizarVentaStripe: STRIPE_SECRET_KEY vacio para curso ' . $curso);
        echo 'error:stripe_key_missing';
        exit;
    }

    // Soporta clave como JSON por dominio: {"aprende-excel.com":"sk_live_..."}
    if (strpos($stripeSecretRaw, '{') === false) {
        $stripeSecret = $stripeSecretRaw;
    } else {
        $decoded = json_decode($stripeSecretRaw, true);
        $stripeSecret = $decoded[$dominio] ?? reset($decoded);
    }

    \Stripe\Stripe::setApiKey($stripeSecret);

    // 3. Descuentos
    $discounts = [];
    if (!empty($descuento)) {
        $stmt2 = $cnx->prepare(
            "SELECT DESCRIPCION, PORCENTAJE FROM descuentos
             WHERE CURSO=? AND CODIGO_DESCUENTO=? AND ESTADO_ACTIVO=TRUE AND FECHA_HASTA>=DATE(NOW())"
        );
        $stmt2->execute([$curso, $descuento]);
        $rows_desc = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($rows_desc)) {
            $montoDesc       = intval($precioBase * ($rows_desc[0]['PORCENTAJE'] / 100));
            $montoDescMoneda = convertirPrecioNumerico($montoDesc, $monedaStripe);
            $amountOff       = intval(round($montoDescMoneda * $factorStripe));

            $coupon = \Stripe\Coupon::create([
                'amount_off' => $amountOff,
                'currency'   => $monedaStripeLower,
                'duration'   => 'once',
                'name'       => $rows_desc[0]['DESCRIPCION'],
            ]);
            $discounts = [['coupon' => $coupon->id]];
        }
    }

    // 4. Guardar lead en ventas (falla silenciosamente si hay error)
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
    } catch (\Throwable $eLead) {
        error_log('realizarVentaStripe: INSERT ventas falló - ' . $eLead->getMessage());
        $id_venta = uniqid($curso . '_');
    }

    // 5. Crear Stripe Checkout Session
    // IVA solo aplica a visitantes argentinos
    $sufijoIVA = ($countryIn === 'AR') ? ' (Precio + IVA)' : '';
    $sessionParams = [
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency'     => $monedaStripeLower,
                'unit_amount'  => $unitAmount,
                'product_data' => [
                    'name'        => $rows[0]['TITULO'],
                    'description' => $rows[0]['DESCRIPCION'] . $sufijoIVA,
                ],
            ],
            'quantity' => 1,
        ]],
        'mode'                => 'payment',
        'customer_email'      => $email,
        'client_reference_id' => $curso . '-' . $id_venta,
        'metadata'            => [
            'curso'      => $curso,
            'id_venta'   => $id_venta,
            'nombre'     => $nombre,
            'apellido'   => $apellido,
            'celular'    => $celular,
            'email'      => $email,
            'dominio'    => $dominio,
            'country'    => $countryIn,
            'moneda'     => $monedaStripe,
            'precio_ars' => $precioBase,
        ],
        'success_url' => $urlRoot . '?pago=exitoso&idVenta=' . $id_venta,
        'cancel_url'  => $urlcurso . 'checkout.php',
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
    error_log('DB Error en realizarVentaStripe: ' . $e->getMessage());
    if (isset($_GET['test'])) echo 'DB Error: ' . $e->getMessage();
    else echo 'error:db_' . $e->getCode();
} catch (\Stripe\Exception\ApiErrorException $e) {
    error_log('Stripe Error en realizarVentaStripe: ' . $e->getMessage());
    if (isset($_GET['test'])) echo 'Stripe Error: ' . $e->getMessage();
    else echo 'error:stripe_' . $e->getStripeCode();
} catch (\Exception $e) {
    error_log('Error en realizarVentaStripe: ' . $e->getMessage());
    if (isset($_GET['test'])) echo 'Error: ' . $e->getMessage();
    else echo 'error:general';
}
?>
