<?php
if (isset($_GET['test'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$dirpage = '';
$_idVenta = $_GET['idVenta'];
$dirpage = '../';

include("n-includes/funcionsDB.php");
include("n-includes/logicparametros.php");

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
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Excel facil</title>
        <?php include('./head-main.php') ?>
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php include('./header-main.php') ?>

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

        <?php include('./footer-main.php') ?>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
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