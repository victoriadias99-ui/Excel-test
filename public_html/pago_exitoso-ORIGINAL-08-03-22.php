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
$monto = $venta['IMP_RECIBIDO_NETO_MP'];
if (isset($_GET['test'])) {
    echo "<pre>";
    print_r($venta);
    echo "</pre>";
    echo "<pre>";
    print_r($producto);
    echo "</pre>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pago Exitoso</title>
        <?php include('a-pages/header.php') ?>
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
        <!-- Website Sections -->
        <!-- Top Product Banner -->
        <section class="top-product">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5">
                        <div class="product-img">
                            <img src="excel-inicial/img/laptopconlogo.jpg" class="img-fluid" alt="product">
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp;</div>
                    <div class="col-md-6">
                        <div class="section-heading">
                            <h1 class="mt-5 text-dark pt-5"><b>¡Listo!&nbsp;&nbsp;</b>🙌
                                <hr>
                                <p class="lead">Tu pago se acreditó correctamente. ¡Te damos la bienvenida a <?= $producto['TITULO'] ?>! Para ver las instrucciones, clickeá el siguiente botón</p>
                            </h1>
                            <a class="btn btn-block btn-lg py-4 btn-outline-light" style="background-color:#e6007e;" href="unirse.php?idVenta=<?= $_idVenta ?>"><b>Clickeame&nbsp;</b>👉</a>
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
    </body>
</html>