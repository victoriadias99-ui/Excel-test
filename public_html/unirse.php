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
$urlGrupos = [];
$pos = strpos($producto['URL_FACEBOOK_GROUP'], '{');
if($pos === false){ //Es una url
    $jsonUrlGrupos[$producto['TITULO']] = $producto['URL_FACEBOOK_GROUP'];
} else { // Es un json
    $jsonUrlGrupos = json_decode($producto['URL_FACEBOOK_GROUP'], true);
}
if (isset($_GET['test'])) {
    echo "<pre>";
    print_r($venta);
    echo "</pre>";
    echo "<pre>";
    print_r($producto);
    echo "</pre>";
    echo "<pre>";
    print_r($jsonUrlGrupos);
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
                            <img src="a-img/logojpg.jpg" class="img-fluid" alt="product">
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp;</div>
                    <div class="col-md-6">
                        <div class="section-heading">
                            <h1 class="text-body mt-5 pt-5">Ok... y ahora?</h1>
                            <hr>
                        </div>
                        <p class="lead mt-5" style=""><b>Leer con atención:</b></p>
                        <p class="">📧 En minutos vas a recibir un e-mail. Allí vas a ver las instrucciones para descargar el curso (si no lo encontrás, revisá la sección No Deseados/Spam)<br></p>
                        <h4 class="mt-5">✅ ¡Novedad!</h4>
                        <p class="">Ahora también podés realizar el curso a través  <b>de nuestra Academia Online</b>. Allí se encuentran todos los videos para que puedas cursar :).<br><br></p>
                        <hr>
                        <p class="">Tu usuario es: <b><?= strtolower($venta['EMAIL'])?></b></p>
                        <a class="btn btn-block btn-lg py-4 btn-outline-light mt-3" style="background-color:#1a472a;" href="https://academia-production-c4cc.up.railway.app/" target="_blank"><b>🎓 Ir a la Academia Online &nbsp;</b>👉</a>
                        <div class="mt-4 p-3" style="background:#f8f9fa; border-radius:8px; border:1px solid #dee2e6;">
                            <p class="mb-2"><strong>¿No recibiste el email con tu contraseña?</strong></p>
                            <p class="text-muted small mb-3">Revisá la carpeta de Spam/No deseados. Si aún no lo encontrás, podemos reenviar tus credenciales de acceso.</p>
                            <button id="btn-reenviar" class="btn btn-outline-secondary" type="button">
                                📧 Reenviar credenciales de acceso
                            </button>
                            <div id="reenviar-msg" class="mt-2" style="display:none;"></div>
                        </div>
                        <script>
                        document.getElementById('btn-reenviar').addEventListener('click', function() {
                            var btn = this;
                            btn.disabled = true;
                            btn.textContent = 'Enviando...';
                            var formData = new FormData();
                            formData.append('idVenta', '<?= htmlspecialchars($_idVenta, ENT_QUOTES) ?>');
                            fetch('reenviar_credenciales.php', { method: 'POST', body: formData })
                                .then(function(r){ return r.json(); })
                                .then(function(data) {
                                    var msg = document.getElementById('reenviar-msg');
                                    msg.style.display = 'block';
                                    if (data.ok) {
                                        msg.innerHTML = '<span style="color:green;">✅ ¡Listo! Te enviamos las credenciales a <strong><?= htmlspecialchars(strtolower($venta['EMAIL']), ENT_QUOTES) ?></strong>. Revisá tu bandeja de entrada y spam.</span>';
                                        btn.textContent = '✅ Email enviado';
                                    } else {
                                        msg.innerHTML = '<span style="color:red;">❌ Hubo un problema al enviar el email. Por favor escribinos por WhatsApp.</span>';
                                        btn.disabled = false;
                                        btn.textContent = '📧 Reenviar credenciales de acceso';
                                    }
                                })
                                .catch(function() {
                                    var msg = document.getElementById('reenviar-msg');
                                    msg.style.display = 'block';
                                    msg.innerHTML = '<span style="color:red;">❌ Error de conexión. Intentá nuevamente.</span>';
                                    btn.disabled = false;
                                    btn.textContent = '📧 Reenviar credenciales de acceso';
                                });
                        });
                        </script>
                    </div>
                </div>
            </div>
        </section>
        
        <?php include('a-pages/footer.php') ?>
        
        <!-- Facebook Pixel Code AP.EX -->
        <script>
            !function (f, b, e, v, n, t, s) {
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

            //AE ARG este es el pixel id de aprende excel que usamos en argentina
            fbq('init', '177917573796998');

            //EVENTOS Los eventos solo se agregan una vez, y van a ser trackeados por ambos pixeles
            fbq('track', 'PageView');
            fbq('track', 'ViewContent');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=177917573796998&ev=PageView&noscript=1"
                       /></noscript>
        <!-- End Facebook Pixel Code -->
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
    </body>

</html>