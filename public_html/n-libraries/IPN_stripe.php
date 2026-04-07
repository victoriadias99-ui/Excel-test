<?php
/**
 * IPN_stripe.php
 * Webhook de Stripe — reemplaza IPN_mp.php
 * Registrar esta URL en Stripe Dashboard > Developers > Webhooks:
 *   https://aprende-excel.com/n-libraries/IPN_stripe.php
 * Evento a escuchar: checkout.session.completed
 */

if (isset($_GET['test'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

require_once dirname(__DIR__) . '/n-libraries/vendor/autoload.php';
include("ApiFacebookEvents.php");
include("../n-includes/conexion.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');

$payload    = file_get_contents('php://input');
$sigHeader  = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';

// ---------------------------------------------------------------
// IMPORTANTE: reemplazá este valor con el Webhook Secret que
// te da Stripe al crear el endpoint (empieza con whsec_...)
// ---------------------------------------------------------------
$endpointSecret = 'whsec_9oGEvbW4GY135vj8JFrgxqNtXClYdba3';

// En modo test podés llamar con ?test=1 y pasar el payload manualmente
if (isset($_GET['test'])) {
    // Para pruebas locales sin verificación de firma
    $event = json_decode($payload);
} else {
    try {
        $event = \Stripe\Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
    } catch (\UnexpectedValueException $e) {
        http_response_code(400);
        exit('Payload inválido');
    } catch (\Stripe\Exception\SignatureVerificationException $e) {
        http_response_code(400);
        exit('Firma inválida');
    }
}

// Solo procesamos pagos completados
if ($event->type !== 'checkout.session.completed') {
    http_response_code(200);
    exit('Evento ignorado: ' . $event->type);
}

$session  = $event->data->object;
$metadata = $session->metadata;

$curso    = $metadata->curso;
$id_venta = $metadata->id_venta;
$nombre   = $metadata->nombre;
$apellido = $metadata->apellido;
$celular  = $metadata->celular;
$mail     = $metadata->email;
$__url    = $metadata->dominio;

$payment_intent_id    = $session->payment_intent;
$monto_acreditado     = $session->amount_total / 100; // Stripe devuelve centavos
$payment_status       = $session->payment_status;     // 'paid'
$metodo_de_pago       = 'stripe_card';
$fecha_compra         = date('Y-m-d H:i:s');

try {
    $cnx = OpenCon();

    // 1. Registrar en notificaciones (equivalente a notificaciones_mp)
    $stmt = $cnx->prepare("INSERT INTO notificaciones_mp (TOPIC, ID, PAGO_ID_MP, ESTADO_MP, ESTADO_DETALLE_MP) VALUES (?,?,?,?,?)");
    $stmt->execute([
        'stripe_checkout',
        $id_venta,
        $payment_intent_id,
        $payment_status,
        'accredited'
    ]);

    // 2. Actualizar ventas con todos los datos del pago
    $stmt = $cnx->prepare("
        UPDATE ventas SET
            PAGO_ID_MP           = ?,
            ESTADO_MP            = ?,
            ESTADO_DETALLE_MP    = ?,
            FECHA_COMPRA_MP      = ?,
            FECHA_ACREDITACION_MP= ?,
            PAGO_TIPO_MP         = ?,
            PAGO_DESCR_MP        = ?,
            PAGADOR_EMAIL_MP     = ?,
            PAGADOR_NOMBRE_MP    = ?,
            PAGADOR_APELLIDO_MP  = ?,
            PAGADOR_TIPO_MP      = ?,
            PAGADOR_ID_MP        = ?,
            METODO_PAGO_MP       = ?,
            FEE_MP               = ?,
            IMP_RECIBIDO_NETO_MP = ?,
            DOMINIO_F            = ?,
            ACCESS_TOKEN_F       = ?
        WHERE CURSO = ? AND ID = ?
    ");
    $stmt->execute([
        $payment_intent_id,         // PAGO_ID_MP
        'approved',                 // ESTADO_MP (equivalente al 'approved' de MP)
        'accredited',               // ESTADO_DETALLE_MP
        $fecha_compra,              // FECHA_COMPRA_MP
        $fecha_compra,              // FECHA_ACREDITACION_MP (Stripe acredita al instante)
        'credit_card',              // PAGO_TIPO_MP
        'Pago Stripe',              // PAGO_DESCR_MP
        $mail,                      // PAGADOR_EMAIL_MP
        $nombre,                    // PAGADOR_NOMBRE_MP
        $apellido,                  // PAGADOR_APELLIDO_MP
        'registered',               // PAGADOR_TIPO_MP
        $session->customer ?? '',   // PAGADOR_ID_MP
        $metodo_de_pago,            // METODO_PAGO_MP
        0,                          // FEE_MP (Stripe no lo devuelve aquí, podés calcularlo aparte)
        $monto_acreditado,          // IMP_RECIBIDO_NETO_MP
        $__url,                     // DOMINIO_F
        '',                         // ACCESS_TOKEN_F
        $curso,                     // WHERE CURSO
        $id_venta,                  // WHERE ID
    ]);

    // 3. Disparar webhook externo (igual que en IPN_mp.php)
    $stmt = $cnx->prepare("SELECT WEBHOOK_URL FROM webhooks_config WHERE CURSO=? AND ESTADO_MP=?");
    $stmt->execute([$curso, 'approved']);
    $rowsWH = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($rowsWH)) {
        $webHookUrl = $rowsWH[0]['WEBHOOK_URL'];

        $data = [
            "ID"                  => $id_venta,
            "CURSO"               => $curso,
            "FECHA"               => $fecha_compra,
            "NOMBRE"              => $nombre,
            "APELLIDO"            => $apellido,
            "CELULAR"             => $celular,
            "EMAIL"               => $mail,
            "PAGO_ID"             => $payment_intent_id,
            "ESTADO"              => 'approved',
            "ESTADO_DETALLE"      => 'accredited',
            "FECHA_COMPRA_MP"     => $fecha_compra,
            "FECHA_ACREDITACION_MP" => $fecha_compra,
            "PAGO_TIPO_MP"        => 'credit_card',
            "PAGO_DESCR_MP"       => 'Pago Stripe',
            "PAGADOR_EMAIL_MP"    => $mail,
            "PAGADOR_NOMBRE_MP"   => $nombre,
            "PAGADOR_APELLIDO_MP" => $apellido,
            "PAGADOR_TIPO_MP"     => 'registered',
            "PAGADOR_ID_MP"       => $session->customer ?? '',
            "METODO_PAGO_MP"      => $metodo_de_pago,
            "FEE_MP"              => 0,
            "IMP_RECIBIDO_NETO_MP"=> $monto_acreditado,
        ];

        $data_string = json_encode($data);

        $ch = curl_init($webHookUrl);
        curl_setopt_array($ch, [
            CURLOPT_POST       => true,
            CURLOPT_POSTFIELDS => $data_string,
            CURLOPT_HEADER     => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string)
            ],
            CURLOPT_RETURNTRANSFER => true,
        ]);
        curl_exec($ch);
        curl_close($ch);
    }

    // 4. Crear/actualizar usuario en la Academia y asignar curso
    $academiaUrl    = 'https://academia-production-c4cc.up.railway.app/api/webhook/purchase';
    $academiaSecret = 'wh_landing_academia_2026';

    // Mapeo de curso en ventas → slug en la academia.
    // Si el curso no está en el mapa, se envía el valor original.
    $cursoSlugMap = [
        'excel'              => 'excel',
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

    $academiaSlug = $cursoSlugMap[$curso] ?? $curso;

    $academiaBody = json_encode([
        'email'    => $mail,
        'nombre'   => $nombre,
        'apellido' => $apellido,
        'cursos'   => [$academiaSlug],
    ]);

    $chAcademia = curl_init($academiaUrl);
    curl_setopt_array($chAcademia, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $academiaBody,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 15,
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($academiaBody),
            'x-webhook-secret: ' . $academiaSecret,
        ],
    ]);

    $academiaResponse = curl_exec($chAcademia);
    $academiaHttpCode = curl_getinfo($chAcademia, CURLINFO_HTTP_CODE);
    $academiaCurlErr  = curl_error($chAcademia);
    curl_close($chAcademia);

    if ($academiaCurlErr) {
        error_log('IPN_stripe academia error: ' . $academiaCurlErr);
    } elseif ($academiaHttpCode >= 400) {
        error_log('IPN_stripe academia HTTP ' . $academiaHttpCode . ': ' . $academiaResponse);
    }

    // 5. Facebook Events (igual que en IPN_mp.php)
    $consultaIP = "SELECT * FROM `ip_visita` WHERE `correo` = ?";
    $stmtIP = $cnx->prepare($consultaIP);
    $stmtIP->execute([$mail]);
    $rowsIP = $stmtIP->fetchAll(PDO::FETCH_ASSOC);

    $cache  = null;
    $ipData = null;
    if (!empty($rowsIP)) {
        $cache  = json_decode($rowsIP[0]['cache']  . '');
        $ipData = json_decode($rowsIP[0]['data']   . '');
    }

    ApiFacebookEventsFunciones::initPaymentSendDataDonePaymentFacebook(
        $cache, $ipData, $mail, $monto_acreditado, 'ARS',
        'https://' . $_SERVER['HTTP_HOST'] . '/n-libraries/IPN_stripe.php'
    );

    // 5. SendinBlue tracking (igual que al final del IPN original)
    $nombre_sb   = htmlspecialchars($nombre);
    $apellido_sb = htmlspecialchars($apellido);
    $mail_sb     = htmlspecialchars($mail);
    $monto_sb    = htmlspecialchars($monto_acreditado);

    echo "<input type='text' id='nombre'   value='$nombre_sb'   hidden>";
    echo "<input type='text' id='apellido' value='$apellido_sb' hidden>";
    echo "<input type='text' id='mail'     value='$mail_sb'     hidden>";
    echo "<input type='text' id='monto'    value='$monto_sb'    hidden>";

    http_response_code(200);
    echo 'OK';

} catch (PDOException $e) {
    error_log('Stripe IPN DB Error: ' . $e->getMessage());
    http_response_code(500);
    exit('Error interno');
}
?>

<script type="text/javascript">
(function() {
    window.sib = { equeue: [], client_key: "odq97yyhds94d616wrj5mx6i" };
    window.sendinblue = {};
    for (var j = ['track','identify','trackLink','page'], i = 0; i < j.length; i++) {
        (function(k) {
            window.sendinblue[k] = function() {
                var arg = Array.prototype.slice.call(arguments);
                (window.sib[k] || function() {
                    var t = {}; t[k] = arg; window.sib.equeue.push(t);
                })(arg[0], arg[1], arg[2]);
            };
        })(j[i]);
    }
    var n = document.createElement("script"), i = document.getElementsByTagName("script")[0];
    n.type = "text/javascript"; n.id = "sendinblue-js"; n.async = true;
    n.src = "https://sibautomation.com/sa.js?key=" + window.sib.client_key;
    i.parentNode.insertBefore(n, i);
    window.sendinblue.page();
})();

var nombre   = document.getElementById('nombre');
var apellido = document.getElementById('apellido');
var email    = document.getElementById('mail');
var monto    = document.getElementById('monto');

if (nombre && nombre.value !== '' && email && email.value !== '') {
    sendinblue.track('purchased_completed', {
        "nombre":   nombre.value,
        "email":    email.value,
        "apellido": apellido.value,
        "monto":    monto.value
    });
}
</script>
