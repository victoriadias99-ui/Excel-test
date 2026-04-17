<?php
if (isset($_GET['test'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$dirpage = '';
$_idVenta = $_GET['idVenta'];
include("a-includes/funcionsDB.php");
$venta = getVenta($_idVenta);
$producto = getCursoDetalle($venta['CURSO']);

// ─── Valor real de la compra para Meta Pixel (Purchase event) ────────────────
// La fuente de verdad es la sesión de Stripe: amount_total ya refleja
// descuentos y la moneda real con la que cobró (USD/MXN/COP/etc.).
// Fallback al precio de lista en ARS si no se pudo recuperar la sesión.
$monto    = $producto['PRECIO_UNITARIO'];
$moneda   = 'ARS';
$eventId  = $venta['CURSO'] . '_' . $_idVenta;  // para deduplicación Pixel + CAPI

try {
    require_once __DIR__ . '/n-libraries/vendor/autoload.php';

    $stripeSecretRaw = $producto['STRIPE_SECRET_KEY'] ?? '';
    $__url = str_replace('www.', '', $_SERVER['HTTP_HOST']);
    if ($stripeSecretRaw !== '') {
        $stripeSecret = (strpos($stripeSecretRaw, '{') === false)
            ? $stripeSecretRaw
            : (get_object_vars(json_decode($stripeSecretRaw))[$__url] ?? '');

        if ($stripeSecret && !empty($venta['PREFERENCIA_ID_MP']) && strpos($venta['PREFERENCIA_ID_MP'], 'cs_') === 0) {
            \Stripe\Stripe::setApiKey($stripeSecret);
            $session = \Stripe\Checkout\Session::retrieve($venta['PREFERENCIA_ID_MP']);

            // Stripe entrega amount_total en la unidad mínima; para zero-decimal
            // (CLP, PYG, JPY, etc.) el valor ya está en unidades enteras.
            $stripeZeroDecimal = [
                'bif','clp','djf','gnf','isk','jpy','kmf','krw','mga',
                'pyg','rwf','ugx','vnd','vuv','xaf','xof','xpf',
            ];
            $divisor = in_array(strtolower($session->currency), $stripeZeroDecimal, true) ? 1 : 100;
            $monto   = $session->amount_total / $divisor;
            $moneda  = strtoupper($session->currency);
        }
    }
} catch (\Exception $e) {
    // Silencioso: si falla, usamos el fallback con PRECIO_UNITARIO + ARS
    error_log('pago_exitoso stripe retrieve error: ' . $e->getMessage());
}
if (isset($_GET['test'])) {
    echo "<pre>";
    print_r($venta);
    echo "</pre>";
    echo "<pre>";
    print_r($producto);
    echo "</pre>";
}

$data = getCursoDetalleDown($venta['CURSO'] . '_down');
$dataDownsell = [];
if(count($data) > 0)
    $dataDownsell = getCursoDetalle($data[0]['ID_ABRE_PACK']);
if (isset($_GET['test'])) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    echo "<pre>";
    print_r($dataDownsell);
    echo "</pre>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pago Exitoso</title>
        <?php include('a-pages/header.php') ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous">
        
        <script type="text/javascript">
            (function () {
                window.sib = {
                    equeue: [],
                    client_key: "odq97yyhds94d616wrj5mx6i"
                };
                /* OPTIONAL: email for identify request*/
                // window.sib.email_id = 'example@domain.com';
                window.sendinblue = {};
                for (var j = ['track', 'identify', 'trackLink', 'page'], i = 0; i < j.length; i++) {
                    (function (k) {
                        window.sendinblue[k] = function () {
                            var arg = Array.prototype.slice.call(arguments);
                            (window.sib[k] || function () {
                                var t = {};
                                t[k] = arg;
                                window.sib.equeue.push(t);
                            })(arg[0], arg[1], arg[2]);
                        };
                    })(j[i]);
                }
                var n = document.createElement("script"),
                        i = document.getElementsByTagName("script")[0];
                n.type = "text/javascript", n.id = "sendinblue-js", n.async = !0, n.src = "https://sibautomation.com/sa.js?key=" + window.sib.client_key, i.parentNode.insertBefore(n, i), window.sendinblue.page();
            })();
        </script>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-2 col-sm-6 col-6 logo">
                        <img src="a-img/logojpg.jpg" alt="logo" class="img-fluid">
                    </div>
                    <div class="col-md-3 hdphone">
                        <p> </p>
                    </div>
                    <div class="col-md-3 hdphone">
                        <img src="a-img/security.png" alt="security" class="img-fluid">
                    </div>
                    <div class="col-md-1 gr-logo"></div>
                    <div class="col-md-3 cta-button  col-sm-6 col-6">
                    </div>
                </div>
            </div>
        </header>
        
        
        <?php if(count($data) > 0){ ?>
        <div class="col-md-12 text-center bg-danger text-white p-3">
            <h2 class="text-center "><b>Tu compra se realizó con éxito. Sin embargo, no podés perderte esta oferta de último momento!</b></h2>
        </div>
<!--
        <h2 class="text-center font-weight-bold mt-5"><b>Conviértete en un Experto en Power BI con nuestro método dinámico y simple <span class="blink">🤯</span></b></h2>
        <h3 class="text-center font-weight-light mt-3" style="color:#878787;"><b>Aprende Power BI 🚀</b></h3>
        
        <section class="section-video py-3">
            <div class="row">
                <div class="col-md-6 m-auto text-center">
            <ul class="lista-header pl-3" style="list-style-type: none;">
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Metodología para el análisis de datos<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Todas las visualizaciones disponibles en Power BI<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Creación de reportes en Power BI<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Funcionalidades avanzadas de Power BI<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Gráficos dinámicos<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Gráficos Animados<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Rapidez para crear nuestros análisis<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;y muchísimo mas!<br></li>
                        <li>• No requiere conocimientos previos</li>
                    </ul>
                </div>
        </section>-->

        <section>
            <div class="row">
                <div class="offset-md-3 col-md-6 mt-5">
                    <div class="card card-producto mb-5">
                        <div class="card-body text-center m-4 p-4">
                            <img style="width: 100%" class="mx-auto text-center " src="<?= $data[0]['URL_IMAGEN'] ?>" alt="<?= $data[0]['TITULO_1'] ?>">
                            <p class="card-title  text-center mt-3"><?= $data[0]['TITULO_1'] ?>
                            </p>
                            <p class="text-center p-0 m-0"><span style="color:#ffd200"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span></p>
                            <p class="text-center text-danger p-0 m-0"><b><strike>$<?= (($dataDownsell['PRECIO_UNITARIO'] / $dataDownsell['PORCENTAJE_DES']) * 100) ?> ARS</strike></b></p>
                            <p class="card-precio">$<?= $data[0]['PRECIO'] ?> ARS</p>
                            <p class="card-text card-descripcion"></p>

                            <form  id="procederPagoForm">
                                <input type="text" id="curso" maxlength="64" name="curso" value="<?= $venta['CURSO'] . '_down' ?>" hidden>
                                <input type="text" id="pack" value="<?= $dataDownsell['CURSO'] . '|' . $venta['CURSO'] . '_down' ?>" hidden>
                                <input type="text" id="celular" name="celular" hidden>
                                <input type="text" id="amount" name="amount" value="0" hidden>
                                <input type="text" name="nombre" id="nombre" value="<?= $venta['NOMBRE'] ?>" hidden>
                                <input type="text" name="apellido" id="apellido" value="<?= $venta['APELLIDO'] ?>" hidden>
                                <input type="text" name="email" id="email" value="<?= $venta['EMAIL'] ?>" hidden>
                                <input type="text" name="codigo" id="codigo" hidden>
                                <p class="text-center">
                                    <button id="proceder_pago"  type="button" class="py-3 col-12 h2  bg-success text-white " >👉 Aprovechar oferta</button>
                                </p>
                                <p class="text-center">
                                    <a href="unirse.php?idVenta=<?= $_idVenta ?>" class="py-3 pt-4" style="background-color: transparent;">No, gracias. No deseo aprovechar la situación</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php } else { ?>
        <!-- Website Sections -->
        <!-- Top Product Banner -->
        <section class="top-product">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5">
                        <div class="">
                            <img src="a-img/logojpg.jpg" class="img-fluid" alt="product">
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp;</div>
                    <div class="col-md-6">
                        <div class="section-heading">
                            <h1 class="mt-5 text-dark pt-5"><b>¡Listo!&nbsp;&nbsp;</b>🙌
                                <hr>
                                <p class="lead">Tu pago se acreditó correctamente. ¡Te damos la bienvenida a <?= $producto['TITULO'] ?>! Hacé click para acceder a la Academia.</p>
                            </h1>
                            <a class="btn btn-block btn-lg py-4 btn-outline-light" style="background-color:#e6007e;" href="unirse.php?idVenta=<?= $_idVenta ?>"><b>Clickeame&nbsp;</b>👉</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
        <?php include('a-pages/footer.php') ?>
        <script src="../a-libraries/js/mailcheck.js"></script>
    <script src="../a-libraries/js/jquery.validate.min.js"></script>
        <script src="../a-libraries/js/checkoutv3.js?t=2"></script>
        <script>
            !function (f, b, e, v, n, t, s)
            {
                if (f.fbq)
                    return;
                n = f.fbq = function () {
                    n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '177917573796998');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=177917573796998&ev=PageView&noscript=1"
                       /></noscript>
        <!-- End Facebook Pixel Code -->  

        <script>
            fbq('track', 'Purchase', {
                value: <?= json_encode((float) $monto) ?>,
                currency: <?= json_encode($moneda) ?>,
                content_ids: [<?= json_encode($producto['CURSO']) ?>],
                content_name: <?= json_encode($producto['TITULO']) ?>,
                content_type: 'product'
            }, { eventID: <?= json_encode($eventId) ?> });
        </script>
        <script type="text/javascript">
            window.__lo_site_id = 187119;
            (function () {
                var wa = document.createElement('script');
                wa.type = 'text/javascript';
                wa.async = true;
                wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(wa, s);
            })();
        </script>
        <script type="text/javascript">
            (function () {
                window.sib = {
                    equeue: [],
                    client_key: "odq97yyhds94d616wrj5mx6i"
                };
                /* OPTIONAL: email for identify request*/
                // window.sib.email_id = 'example@domain.com';
                window.sendinblue = {};
                for (var j = ['track', 'identify', 'trackLink', 'page'], i = 0; i < j.length; i++) {
                    (function (k) {
                        window.sendinblue[k] = function () {
                            var arg = Array.prototype.slice.call(arguments);
                            (window.sib[k] || function () {
                                var t = {};
                                t[k] = arg;
                                window.sib.equeue.push(t);
                            })(arg[0], arg[1], arg[2], arg[3]);
                        };
                    })(j[i]);
                }
                var n = document.createElement("script"),
                        i = document.getElementsByTagName("script")[0];
                n.type = "text/javascript", n.id = "sendinblue-js", n.async = !0, n.src = "https://sibautomation.com/sa.js?key=" + window.sib.client_key, i.parentNode.insertBefore(n, i), window.sendinblue.page();
            })();
        </script>
        <script> sendinblue.track('order_completed');</script>
		<script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-165632923-1', 'auto');
        ga('send','event', 'cursos', 'comprar', '<?= $producto['CURSO'] ?>', <?= $monto ?>);
    </script>
    </body>
</html>