<?php
$dirpage = '';
$_idVenta = $_GET['idVenta'];
include("a-includes/funcionsDB.php");
$venta = getVenta($_idVenta);
$monto = $venta['IMP_RECIBIDO_NETO_MP'];
if (isset($_GET['test'])) {
    echo "<pre>";
    print_r($venta);
    echo "</pre>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pago Exitoso</title>
        <?php include('a-pages/header.php') ?>
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
        <!-- Website Sections -->
        <!-- Top Product Banner -->
        <section class="top-product">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5">
                        <div class="product-img">
                            <img src="a-excel-inicial/img/laptopconlogo.jpg" class="img-fluid" alt="product">
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp;</div>
                    <div class="col-md-6">
                        <div class="section-heading">
                            <h1 class="mt-5 text-dark pt-5"><b>¡Listo!&nbsp;&nbsp;</b>🙌
                                <hr>
                                <p class="lead">Tu pago se acreditó correctamente. ¡Te damos la bienvenida! Para ver las instrucciones, checa tu correo</p>
                            </h1>
                            <a class="btn btn-block btn-lg py-4 btn-outline-light" style="background-color:#e6007e;" href="../"><b>Ir a la página principal</b>👉</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include('a-pages/footer.php') ?>
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
                value: <?= $monto ?>,
                currency: 'ARS'
            });
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
        <!-- GA4 Enhanced Ecommerce - purchase event (vía GTM GTM-PR68WN3 → G-D1GWD9J906) -->
        <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({ ecommerce: null });
        window.dataLayer.push({
            event: 'purchase',
            ecommerce: {
                transaction_id: <?= json_encode((string)($venta['PAGO_ID_MP'] ?? $venta['ID'] ?? '')) ?>,
                value: <?= floatval($venta['IMP_RECIBIDO_NETO_MP'] ?? $monto ?? 0) ?>,
                currency: <?= json_encode(strtoupper($venta['MONEDA'] ?? 'ARS')) ?>,
                items: [{
                    item_id: <?= json_encode((string)($venta['CURSO'] ?? '')) ?>,
                    item_name: <?= json_encode((string)($venta['CURSO'] ?? '')) ?>,
                    price: <?= floatval($venta['IMP_RECIBIDO_NETO_MP'] ?? $monto ?? 0) ?>,
                    quantity: 1
                }]
            }
        });
        </script>
    </body>
</html>