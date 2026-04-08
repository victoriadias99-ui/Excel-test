<?php
if (isset($_GET['test'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$dirpage = '';
include("a-includes/funcionsDB.php");
$idCurso = isset($_GET['CURSO']) ? $_GET['CURSO'] : null;
if (empty($idCurso)) {
    http_response_code(400);
    echo 'Curso no especificado';
    exit;
}
$producto = getCursoDetalle($idCurso);
$urlGrupos = [];
$pos = strpos($producto['URL_FACEBOOK_GROUP'], '{');
if($pos === false){ //Es una url
    $jsonUrlGrupos[$producto['TITULO']] = $producto['URL_FACEBOOK_GROUP'];
} else { // Es un json
    $jsonUrlGrupos = json_decode($producto['URL_FACEBOOK_GROUP'], true);
}
if (isset($_GET['test'])) {
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
                        <img src="https://excel-facil.com/n-assets/img/logo-excel.png" alt="logo" class="img-fluid">
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
                            <img src="img/laptopconlogo.jpg" class="img-fluid" alt="product">
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
                        <p class="">Ahora también podés realizar el curso a través de Facebook. Para eso tenés que unirte a nuestro <b>Grupo Privado en Facebook</b>. Allí se encuentran todos los videos para que puedas cursar :).<br><br></p>
                        <hr>
                        <?php
                        foreach ($jsonUrlGrupos as $key => $value){
                            if($key == 'cert'){
                                echo '<h5 class="mt-5">Cuando finalices los 3 cursos, envíanos un correo o Whatsapp para emitir tu certificado internacional</h5>';

                            } else {
                            echo '<a class="btn btn-block btn-lg py-4 btn-outline-light" target="_blank" style="background-color:#e6007e;" href="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '"><b>EMPEZAR EL CURSO "' . htmlspecialchars(strtoupper($key), ENT_QUOTES, 'UTF-8') . '" &nbsp;</b>👉</a>';
                            }
                        }
                        ?>
                        <p class="">Una vez enviada la solicitud de ingreso al grupo, puede tomar hasta 24hs tu aprobación. Para acelerar el proceso respondé el e-mail que te enviamos lo antes posible.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <?php include('n-pages/footer-cursos.php') ?>
        
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