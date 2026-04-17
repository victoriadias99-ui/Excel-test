<?php
/**
 * recuperar_carrito.php
 * ----------------------
 * Endpoint al que apuntan los CTAs de los emails de recuperación.
 * - Busca el carrito por token.
 * - Si ya fue pagado → redirect a pago_exitoso.php.
 * - Si la session original sigue open en Stripe → redirect directo a su URL.
 * - Si expiró → crea una nueva Checkout Session con los mismos datos,
 *   actualiza el carrito y redirige.
 *
 * No crea un nuevo registro en carritos_abandonados (el original permanece
 * y queda marcado 'recovered' vía webhook una vez que el cliente paga).
 */

declare(strict_types=1);

require_once __DIR__ . '/n-libraries/vendor/autoload.php';
require_once __DIR__ . '/n-includes/conexion.php';
require_once __DIR__ . '/n-libraries/carritos_abandonados/helpers.php';
require_once __DIR__ . '/a-includes/logicprecios.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');

$token = isset($_GET['t']) ? trim((string)$_GET['t']) : '';
if ($token === '' || !preg_match('/^[a-f0-9]{32}$/', $token)) {
    http_response_code(400);
    exit('Link inválido');
}

try {
    $cnx = OpenCon();

    $stmt = $cnx->prepare("SELECT * FROM carritos_abandonados WHERE token = ? LIMIT 1");
    $stmt->execute([$token]);
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cart) {
        http_response_code(404);
        exit('Carrito no encontrado');
    }

    // Ya pagado (por webhook o verificación)
    if ($cart['estado'] === 'recovered' || ca_venta_pagada($cnx, $cart['curso'], $cart['id_venta'])) {
        ca_marcar_recuperado($cnx, ['curso' => $cart['curso'], 'id_venta' => $cart['id_venta']]);
        header('Location: /pago_exitoso.php?idVenta=' . urlencode($cart['id_venta']));
        exit;
    }

    // Necesitamos la Stripe secret key del curso
    $stmtCurso = $cnx->prepare("SELECT * FROM cursos_detalle WHERE CURSO = ? LIMIT 1");
    $stmtCurso->execute([$cart['curso']]);
    $curso = $stmtCurso->fetch(PDO::FETCH_ASSOC);
    if (!$curso) {
        http_response_code(500);
        exit('Curso no disponible');
    }

    $__url = $cart['dominio'] ?: str_replace('www.', '', (string)($_SERVER['HTTP_HOST'] ?? ''));
    $stripeSecretRaw = (string)($curso['STRIPE_SECRET_KEY'] ?? '');
    if ($stripeSecretRaw === '') {
        http_response_code(500);
        exit('Pasarela no disponible');
    }
    if (strpos($stripeSecretRaw, '{') === false) {
        $stripeSecret = $stripeSecretRaw;
    } else {
        $stripeSecret = get_object_vars(json_decode($stripeSecretRaw))[$__url] ?? '';
    }
    if ($stripeSecret === '') {
        http_response_code(500);
        exit('Pasarela no configurada para este dominio');
    }
    \Stripe\Stripe::setApiKey($stripeSecret);

    // 1. Si la session original sigue open, reusarla.
    if (!empty($cart['stripe_session_id'])) {
        try {
            $existing = \Stripe\Checkout\Session::retrieve($cart['stripe_session_id']);
            $isPaid = ($existing->payment_status ?? '') === 'paid';
            if ($isPaid) {
                ca_marcar_recuperado($cnx, ['curso' => $cart['curso'], 'id_venta' => $cart['id_venta']]);
                header('Location: /pago_exitoso.php?idVenta=' . urlencode($cart['id_venta']));
                exit;
            }
            $open    = ($existing->status ?? '') === 'open';
            $hasUrl  = !empty($existing->url);
            if ($open && $hasUrl) {
                header('Location: ' . $existing->url);
                exit;
            }
        } catch (\Throwable $e) {
            // Seguimos y creamos una nueva
        }
    }

    // 2. Crear nueva checkout session con los datos guardados
    $monedaStripe      = strtoupper((string)($cart['moneda'] ?: 'ARS'));
    $monedaStripeLower = strtolower($monedaStripe);
    $stripeZeroDecimal = ['BIF','CLP','DJF','GNF','ISK','JPY','KMF','KRW','MGA','PYG','RWF','UGX','VND','VUV','XAF','XOF','XPF'];
    $factorStripe      = in_array($monedaStripe, $stripeZeroDecimal, true) ? 1 : 100;

    // Precio: si guardamos monto_stripe úsalo; si no, convertir monto_ars
    $precioBaseArs = (float)($cart['monto_ars'] ?? 0);
    if (!empty($cart['monto_stripe']) && (float)$cart['monto_stripe'] > 0) {
        $precioMonedaStripe = (float) $cart['monto_stripe'];
    } elseif ($precioBaseArs > 0) {
        $precioMonedaStripe = convertirPrecioNumerico($precioBaseArs, $monedaStripe);
    } else {
        // Fallback: precio actual del curso
        $precioBaseArs     = (float) $curso['PRECIO_UNITARIO'];
        $precioMonedaStripe = convertirPrecioNumerico($precioBaseArs, $monedaStripe);
    }
    $unitAmount = (int) round($precioMonedaStripe * $factorStripe);

    $sufijoIVA = ($cart['country'] === 'AR') ? ' (Precio + IVA)' : '';
    $urlRoot   = 'https://' . $__url . '/';
    $urlcurso  = $urlRoot . $cart['dir'] . '/';

    $sessionParams = [
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency'     => $monedaStripeLower,
                'unit_amount'  => $unitAmount,
                'product_data' => [
                    'name'        => $curso['TITULO'],
                    'description' => ($curso['DESCRIPCION'] ?? '') . $sufijoIVA,
                    'images'      => [$urlRoot . 'n-img/logo/android-chrome-512x512.png'],
                ],
            ],
            'quantity' => 1,
        ]],
        'mode'                => 'payment',
        'customer_email'      => $cart['email'],
        'client_reference_id' => $cart['curso'] . '-' . $cart['id_venta'],
        'metadata' => [
            'curso'      => $cart['curso'],
            'id_venta'   => $cart['id_venta'],
            'nombre'     => (string)$cart['nombre'],
            'apellido'   => (string)$cart['apellido'],
            'celular'    => (string)$cart['celular'],
            'email'      => (string)$cart['email'],
            'dominio'    => $__url,
            'country'    => (string)$cart['country'],
            'moneda'     => $monedaStripe,
            'precio_ars' => (string)$precioBaseArs,
            'recovery'   => '1',
        ],
        'success_url' => $urlRoot . 'pago_exitoso.php?idVenta=' . $cart['id_venta'],
        'cancel_url'  => $urlcurso . 'checkout.php',
    ];

    $newSession = \Stripe\Checkout\Session::create($sessionParams);

    // Actualizar carrito y venta con nueva session
    $cnx->prepare("UPDATE carritos_abandonados
                   SET stripe_session_id = ?, stripe_session_url = ?
                   WHERE id = ?")
        ->execute([$newSession->id, $newSession->url, $cart['id']]);

    $cnx->prepare("UPDATE ventas SET PREFERENCIA_ID_MP = ? WHERE CURSO = ? AND ID = ?")
        ->execute([$newSession->id, $cart['curso'], $cart['id_venta']]);

    header('Location: ' . $newSession->url);
    exit;

} catch (\Throwable $e) {
    error_log('recuperar_carrito error: ' . $e->getMessage());
    http_response_code(500);
    echo 'No pudimos recuperar tu carrito. Por favor, volvé a la landing e intentá desde cero.';
}
