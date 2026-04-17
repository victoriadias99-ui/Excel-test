<?php
error_reporting(0);
ini_set('display_errors', 0);

if (isset($_GET['test'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$__logFile = dirname(__DIR__) . '/log-errores-checkout.txt';
function logCheckout($tipo, $detalle, $extra = []) {
    global $__logFile;
    $line = date('Y-m-d H:i:s') . ' | '
        . str_pad($tipo, 30) . ' | '
        . 'curso=' . ($extra['curso'] ?? ($_GET['curso'] ?? '')) . ' | '
        . 'email=' . ($extra['email'] ?? ($_GET['email'] ?? '')) . ' | '
        . 'detalle=' . $detalle
        . PHP_EOL;
    @file_put_contents($__logFile, $line, FILE_APPEND | LOCK_EX);
}

// SDK de Stripe
require_once dirname(__DIR__) . '/n-libraries/vendor/autoload.php';

include("ApiFacebookEvents.php");
include("../n-includes/conexion.php");
include("../n-includes/class.autonum.php");

// Conversión de precios multi-moneda
require_once dirname(__DIR__) . '/a-includes/logicprecios.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');

$curso  = $_GET['curso'];
$pack   = isset($_GET['pack']) ? $_GET['pack'] : $curso;
if ($curso != $pack) {
    $curso = $pack;
}
$dir      = $_GET['dir'];
$nombre   = $_GET['nombre'];
$apellido = $_GET['apellido'];
$celular  = $_GET['celular'];
$email    = $_GET['email'];
$descuento = $_GET['descuento'];

// Moneda y país del visitante (enviados desde el form) — fallback a ARS/AR
$monedaIn  = isset($_GET['moneda'])  ? strtoupper(trim($_GET['moneda']))  : 'ARS';
$countryIn = isset($_GET['country']) ? strtoupper(trim($_GET['country'])) : 'AR';

$urlcurso = 'https://' . $_SERVER['HTTP_HOST'] . '/' . $dir . '/';
$urlRoot  = 'https://' . $_SERVER['HTTP_HOST'] . '/';

if (isset($_GET['test'])) {
    echo '$urlcurso = '  . $urlcurso  . '<br>';
    echo '$urlRoot = '   . $urlRoot   . '<br>';
    echo '$monedaIn = '  . $monedaIn  . '<br>';
    echo '$countryIn = ' . $countryIn . '<br>';
}

// IP del visitante (compatible con Cloudflare)
if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
} elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$ip = explode(',', str_replace(' ', '', $ip))[0];

try {
    $cnx = OpenCon();

    // Actualizar IP con el email
    $stmt = $cnx->prepare("UPDATE `ip_visita` SET `correo` = ? WHERE `ip` = ? AND `id_producto` = ?");
    $stmt->execute([$email, $ip, $_GET['curso']]);

    // Generar ID de venta
    $auto_num = new auto_num($cnx, $curso);
    $id_venta = $auto_num->get_id();

    // Traer datos del curso (SELECT * para compatibilidad con cualquier esquema de BD)
    $stmt = $cnx->prepare("SELECT * FROM cursos_detalle WHERE CURSO = ?");
    $stmt->bindValue(1, $curso, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($rows)) {
        logCheckout('PHP_CURSO_NO_ENCONTRADO', 'curso=' . $curso);
        echo 'error:curso_no_encontrado';
        exit;
    }

    // Intentar obtener precio actualizado desde la Academia (Railway).
    // Cacheamos la respuesta en disco 5 min para evitar pegarle a Railway en cada checkout
    // (Railway tiene cold starts de 10-30s que bloquean el redirect a Stripe).
    // Timeout agresivo: si no responde en 2s, usamos el precio de la BD local.
    $academiaApiUrl  = getenv('ACADEMIA_API_URL') ?: 'https://academia-production-c4cc.up.railway.app';
    $academiaPrecio  = null;
    $cachePrecios    = sys_get_temp_dir() . '/academia_precios_cache.json';
    $cacheTTL        = 300; // 5 minutos

    $apiData = null;
    if (is_file($cachePrecios) && (time() - filemtime($cachePrecios)) < $cacheTTL) {
        $apiData = json_decode(@file_get_contents($cachePrecios), true);
    }

    if ($apiData === null) {
        $ctxApi = stream_context_create([
            'http'  => ['timeout' => 2, 'ignore_errors' => true],
            'https' => ['timeout' => 2, 'ignore_errors' => true],
        ]);
        $apiRaw = @file_get_contents($academiaApiUrl . '/api/precios', false, $ctxApi);
        if ($apiRaw !== false) {
            $apiData = json_decode($apiRaw, true);
            if (is_array($apiData)) {
                @file_put_contents($cachePrecios, $apiRaw, LOCK_EX);
            }
        }
    }

    if (isset($apiData['precios'][$curso]['precio_ars']) && $apiData['precios'][$curso]['precio_ars'] > 0) {
        $academiaPrecio = intval($apiData['precios'][$curso]['precio_ars']);
    }
    $precioBase = ($academiaPrecio !== null) ? $academiaPrecio : $rows[0]['PRECIO_UNITARIO'];
    $pagoTotal  = $precioBase;

    // ─── Multi-moneda Stripe ──────────────────────────────────────────────
    // Monedas soportadas por Stripe para cobros en cuentas internacionales.
    // Cualquier otra → fallback a USD.
    $stripeSupported = [
        'ARS','BOB','BRL','CLP','COP','CRC','DOP','EUR',
        'GTQ','HNL','MXN','NIO','PAB','PEN','PYG','USD','UYU',
    ];

    // Monedas "zero-decimal" de Stripe: el amount va en unidades enteras, no centavos
    $stripeZeroDecimal = [
        'BIF','CLP','DJF','GNF','ISK','JPY','KMF','KRW','MGA',
        'PYG','RWF','UGX','VND','VUV','XAF','XOF','XPF',
    ];

    if (in_array($monedaIn, $stripeSupported, true)) {
        $monedaStripe  = $monedaIn;
        $precioMonedaStripe = convertirPrecioNumerico($precioBase, $monedaStripe);
    } else {
        // Moneda no soportada (p.ej. VES, CUP) → cobrar en USD
        $monedaStripe  = 'USD';
        $precioMonedaStripe = convertirPrecioNumerico($precioBase, 'USD');
    }

    $isZeroDecimal = in_array($monedaStripe, $stripeZeroDecimal, true);
    $factorStripe  = $isZeroDecimal ? 1 : 100;
    $unitAmount    = intval(round($precioMonedaStripe * $factorStripe));
    $monedaStripeLower = strtolower($monedaStripe);

    if (isset($_GET['test'])) {
        echo '$precioBase (ARS) = '     . $precioBase          . '<br>';
        echo '$monedaStripe = '         . $monedaStripe        . '<br>';
        echo '$precioMonedaStripe = '   . $precioMonedaStripe  . '<br>';
        echo '$unitAmount (Stripe) = '  . $unitAmount          . '<br>';
    }

    // --- Clave Stripe ---
    $stripeSecretRaw = $rows[0]['STRIPE_SECRET_KEY'] ?? '';
    $__url = str_replace('www.', '', $_SERVER['HTTP_HOST']);

    if (empty($stripeSecretRaw)) {
        logCheckout('PHP_STRIPE_KEY_MISSING', 'STRIPE_SECRET_KEY vacio para curso=' . $curso);
        if (isset($_GET['test'])) {
            echo 'Error: STRIPE_SECRET_KEY vacio o columna inexistente en cursos_detalle<br>';
        }
        error_log('realizarVenta: STRIPE_SECRET_KEY vacio para curso ' . $curso);
        echo 'error:stripe_key_missing';
        exit;
    }

    if (strpos($stripeSecretRaw, '{') === false) {
        $stripeSecret = $stripeSecretRaw;
    } else {
        $stripeSecret = get_object_vars(json_decode($stripeSecretRaw))[$__url];
    }

    \Stripe\Stripe::setApiKey($stripeSecret);

    // --- Descuentos ---
    $stmt2 = $cnx->prepare("SELECT DESCRIPCION, PORCENTAJE FROM descuentos WHERE CURSO=? AND CODIGO_DESCUENTO=? AND ESTADO_ACTIVO=TRUE AND FECHA_HASTA>=DATE(NOW())");
    $stmt2->bindValue(1, $curso, PDO::PARAM_STR);
    $stmt2->bindValue(2, $descuento, PDO::PARAM_STR);
    $stmt2->execute();
    $rows_descuento = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    $discounts = [];
    if (count($rows_descuento) > 0) {
        $porcentajeDesc = $rows_descuento[0]['PORCENTAJE'];
        $montoDesc      = intval($precioBase * ($porcentajeDesc / 100));
        $pagoTotal      = $precioBase - $montoDesc;

        // Convertir descuento a la misma moneda que la checkout session
        $montoDescMoneda = convertirPrecioNumerico($montoDesc, $monedaStripe);
        $amountOff       = intval(round($montoDescMoneda * $factorStripe));

        $coupon = \Stripe\Coupon::create([
            'amount_off' => $amountOff,
            'currency'   => $monedaStripeLower,
            'duration'   => 'once',
            'name'       => $rows_descuento[0]['DESCRIPCION'],
        ]);
        $discounts = [['coupon' => $coupon->id]];
    }

    // --- Guardar venta en DB (estado pendiente) ---
    $stmt1 = $cnx->prepare("INSERT INTO ventas (CURSO, ID, NOMBRE, APELLIDO, PREFIJO_CEL, CELULAR, EMAIL, ESTADO_MP, PREFERENCIA_ID_MP, DOMINIO, ACCESS_TOKEN) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $stmt1->bindValue(1,  $curso,    PDO::PARAM_STR);
    $stmt1->bindValue(2,  $id_venta, PDO::PARAM_STR);
    $stmt1->bindValue(3,  $nombre,   PDO::PARAM_STR);
    $stmt1->bindValue(4,  $apellido, PDO::PARAM_STR);
    $stmt1->bindValue(5,  0,         PDO::PARAM_INT);
    $stmt1->bindValue(6,  $celular,  PDO::PARAM_STR);
    $stmt1->bindValue(7,  $email,    PDO::PARAM_STR);
    $stmt1->bindValue(8,  'pending', PDO::PARAM_STR);
    $stmt1->bindValue(9,  '',        PDO::PARAM_STR);
    $stmt1->bindValue(10, $__url,    PDO::PARAM_STR);
    $stmt1->bindValue(11, '',        PDO::PARAM_STR);
    $stmt1->execute();

    // --- Crear Stripe Checkout Session ---
    // IVA solo aplica a visitantes argentinos
    $sufijoIVA = ($countryIn === 'AR') ? ' (Precio + IVA)' : '';
    $lineItems = [
        [
            'price_data' => [
                'currency'     => $monedaStripeLower,
                'unit_amount'  => $unitAmount,
                'product_data' => [
                    'name'        => $rows[0]['TITULO'],
                    'description' => $rows[0]['DESCRIPCION'] . $sufijoIVA,
                    'images'      => [$urlRoot . 'n-img/logo/android-chrome-512x512.png'],
                ],
            ],
            'quantity' => 1,
        ]
    ];

    $sessionParams = [
        'payment_method_types' => ['card'],
        'line_items'           => $lineItems,
        'mode'                 => 'payment',
        'customer_email'       => $email,
        'client_reference_id'  => $curso . '-' . $id_venta,
        'metadata'             => [
            'curso'         => $curso,
            'id_venta'      => $id_venta,
            'nombre'        => $nombre,
            'apellido'      => $apellido,
            'celular'       => $celular,
            'email'         => $email,
            'dominio'       => $__url,
            'country'       => $countryIn,
            'moneda'        => $monedaStripe,
            'precio_ars'    => $precioBase,
        ],
        'success_url' => $urlRoot . 'pago_exitoso.php?idVenta=' . $id_venta,
        'cancel_url'  => $urlcurso . 'checkout.php',
    ];

    if (!empty($discounts)) {
        $sessionParams['discounts'] = $discounts;
    }

    $session = \Stripe\Checkout\Session::create($sessionParams);

    $cnx->prepare("UPDATE ventas SET PREFERENCIA_ID_MP=? WHERE CURSO=? AND ID=?")
        ->execute([$session->id, $curso, $id_venta]);

    // ─── Registrar carrito abandonado (secuencia de recuperación) ───────
    // El registro queda pending; el webhook lo marca 'recovered' al pagar
    // y el cron de procesar.php dispara los emails en 20m / 1h / 24h / 48h.
    try {
        require_once __DIR__ . '/carritos_abandonados/helpers.php';
        ca_registrar_carrito($cnx, [
            'curso'              => $curso,
            'id_venta'           => $id_venta,
            'stripe_session_id'  => $session->id,
            'stripe_session_url' => $session->url ?? '',
            'nombre'             => $nombre,
            'apellido'           => $apellido,
            'celular'            => $celular,
            'email'              => $email,
            'dir'                => $dir,
            'dominio'            => $__url,
            'pack'               => $pack,
            'descuento'          => $descuento,
            'monto_ars'          => $pagoTotal,
            'monto_stripe'       => $precioMonedaStripe,
            'moneda'             => $monedaStripe,
            'country'            => $countryIn,
        ]);
    } catch (\Throwable $e) {
        // No bloquear el checkout si el registro falla
        logCheckout('CARRITO_REG_WARN', $e->getMessage(), ['curso' => $curso, 'email' => $email]);
    }

    // Reportar a Facebook el monto real cobrado (en la moneda Stripe)
    $pagoTotalMoneda = convertirPrecioNumerico($pagoTotal, $monedaStripe);
    ApiFacebookEventsFunciones::initPaymentSendDataInitPaymentFacebook($email, $pagoTotalMoneda, $monedaStripe, $urlcurso);

    echo $session->url;

} catch (PDOException $e) {
    logCheckout('PHP_DB_ERROR', $e->getMessage());
    error_log('DB Error en realizarVenta: ' . $e->getMessage());
    if (isset($_GET['test'])) {
        echo 'DB Error: ' . $e->getMessage();
    } else {
        echo 'error:db';
    }
} catch (\Stripe\Exception\ApiErrorException $e) {
    logCheckout('PHP_STRIPE_ERROR', $e->getMessage());
    error_log('Stripe Error en realizarVenta: ' . $e->getMessage());
    if (isset($_GET['test'])) {
        echo 'Stripe Error: ' . $e->getMessage();
    } else {
        echo 'error:stripe_' . $e->getStripeCode();
    }
} catch (\Exception $e) {
    logCheckout('PHP_GENERAL_ERROR', $e->getMessage());
    error_log('Error general en realizarVenta: ' . $e->getMessage());
    if (isset($_GET['test'])) {
        echo 'Error general: ' . $e->getMessage();
    } else {
        echo 'error:general';
    }
}
?>
