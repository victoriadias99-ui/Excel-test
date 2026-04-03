<?php
$dirpage = '../';
$titulo = 'Acceso ilimitado';
/*
  $idcurso = 'excel';
  include($dirpage . "n-includes/funcionsDB.php");
  include($dirpage . "n-includes/logicparametros.php");
  $curso = getCursoDetalle($idcurso);

  $value = $curso['PRECIO_UNITARIO'];
  $porcentaje = $curso['PORCENTAJE_DES'];
  $precioCursoOficial = '$' . ($value + intval(($value / $porcentaje) * 100));
  $precioCurso = '$' . $value;
  $urlCheckout = './checkout.php';
 * */

$precioSub1Mes = "$1999 ARS";
$precioSub3Mes = "$3999 ARS";
$precioSub6Mes = "$6999 ARS";

$urlCheckout1Mes = 'https://www.mercadopago.com.ar/subscriptions/checkout?preapproval_plan_id=2c9380848383e02f0184113c9ed35abe';
$urlCheckout3Mes = 'https://www.mercadopago.com.ar/subscriptions/checkout?preapproval_plan_id=2c938084840f27fb01841144fb3e01c2';
$urlCheckout6Mes = 'https://www.mercadopago.com.ar/subscriptions/checkout?preapproval_plan_id=2c938084840f27fb01841146374d01c4';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('../n-pages/head.php') ?>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php
        $headerImagen = "assets/img/imagen-header.png";
        include('../n-pages/header.php')
        ?>
        <section>
            <div class="row">
                <div class="col-md-7 px-5 ">
                    <img class="d-block d-md-none img-fluid mb-4" src="img/imagen-subs-3.jpg" width="100%">
                    <h5 class="texto-header">4.9/5&nbsp;<i class="fa fa-star" style="color: #F7AC3B;"></i>&nbsp;Basado en 25.000 estudiantes</h5>
                    <h1 style="font-family: 'Raleway Black'; color:#00173B;">Obtén acceso ilimitado a todos los cursos de Aprende Excel</h1>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Transfórmate en un profesional del siglo 21</h5>



                    <img class="d-none d-md-block img-fluid mt-2" src="img/imagen-subs-3.jpg" width="100%">

                    <p class="d-none d-md-block mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Somos la plataforma de aprendizaje y desarrollo de talento que te ayudará a sumar valor a tu currículum y escalar en tu carrera laboral, con las certificaciones más requeridas por las empresas de hoy.</p>


                    <div class="row mt-3 mb-3">
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">1 Mes</h5>
                                <h3 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><?= $precioSub1Mes ?></h3>
                                <p class="mt-0"  style="font-size: 0.7em;">Acceso a todos los cursos</p>
                                <a onclick="return false" href="<?= $urlCheckout1Mes ?>" class="btn btn-primary btn-subs px-5" style="background: #007A6A;width: 80%;">Inscribirme T</a>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 4px solid red;border-bottom-style: solid;border-radius: 10px;">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';font-family: 'Raleway Bold';
                                    color: white;
                                    background: red;
                                    width: fit-content;
                                    margin: auto;
                                    padding: 10px;
                                    border-radius: 5px;">Popular</h5>
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">3 Meses</h5>
                                <h3 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><?= $precioSub3Mes ?></h3>
                                <p class="mt-0"  style="font-size: 0.7em;">Acceso a todos los cursos</p>
                                <p class="mt-0" style="font-size: 0.7em;">Certificación Internacional</p>
                                <a href="<?= $urlCheckout3Mes ?>" class="btn btn-primary btn-subs px-5" style="background: #007A6A;width: 80%;">Inscribirme</a>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">6 Meses</h5>
                                <h3 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><?= $precioSub6Mes ?></h3>
                                <p class="mt-0" style="font-size: 0.7em;">Acceso a todos los cursos</p>
                                <p class="mt-0"  style="font-size: 0.7em;">Doble Certificación Internacional</p>
                                <a href="<?= $urlCheckout6Mes ?>" class="btn btn-primary btn-subs px-5" style="background: #007A6A;width: 80%;">Inscribirme</a>
                            </div>
                        </div>
                    </div>


                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><b>Alcanza un nuevo nivel en Aprende Excel. Evoluciona a tu versión 2.0 🚀</b>
                    </h5>

                    <img class="img-fluid" src="img/imagen-subs-2.jpg" width="100%">
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">
                        10 cursos a tu disposición exclusivamente seleccionados. Las habilidades que aprenderás <b>son las más valoradas por las empresas del Silgo XXI</b>, e incluso son aptas para trabajo remoto. Inlcuye <b>Certificación Internacional</b> emitida por la reconocida institución <b>EDUCAR</b>,  con avales de <b>IRAM</b> y la <b>Cámara Internacional de Comercio (ICC)</b>
                    </p>
                    <img class="img-fluid" src="img/imagen-subs-1.jpg" width="100%">
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">
                        Adquirir los cursos por separado costaría más de $170 dólares, pero <b>puedes hacer una suscripción y ahorrar mucho dinero</b>.
                    </p>
                    <div class="row mt-3 mb-3">
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">1 Mes</h5>
                                <h3 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><?= $precioSub1Mes ?></h3>
                                <p class="mt-0"  style="font-size: 0.7em;">Acceso a todos los cursos</p>
                                <a href="<?= $urlCheckout1Mes ?>" class="btn btn-primary btn-subs px-5" style="background: #007A6A;width: 80%;">Inscribirme</a>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 4px solid red;border-bottom-style: solid;border-radius: 10px;">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';font-family: 'Raleway Bold';
                                    color: white;
                                    background: red;
                                    width: fit-content;
                                    margin: auto;
                                    padding: 10px;
                                    border-radius: 5px;">Popular</h5>
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">3 Meses</h5>
                                <h3 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><?= $precioSub3Mes ?></h3>
                                <p class="mt-0"  style="font-size: 0.7em;">Acceso a todos los cursos</p>
                                <p class="mt-0" style="font-size: 0.7em;">Certificación Internacional</p>
                                <a href="<?= $urlCheckout3Mes ?>" class="btn btn-primary btn-subs px-5" style="background: #007A6A;width: 80%;">Inscribirme</a>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">6 Meses</h5>
                                <h3 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><?= $precioSub6Mes ?></h3>
                                <p class="mt-0" style="font-size: 0.7em;">Acceso a todos los cursos</p>
                                <p class="mt-0"  style="font-size: 0.7em;">Doble Certificación Internacional</p>
                                <a href="<?= $urlCheckout6Mes ?>" class="btn btn-primary btn-subs px-5" style="background: #007A6A;width: 80%;">Inscribirme</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-bottom-style: solid;border-bottom-color: rgb(225,225,225);">
                        <img src="assets/img/logo-amarillo-calidad.png" style="width: 50px;">
                        <p class="ml-3" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3"><img class="img-fluid" src="assets/img/icono-libro-compu.png" style="width: 50px;">
                        <h3 class="ml-3" style="font-family: 'Raleway SemiBold';color: #00173B;">Aprenderás</h3>
                    </div>
                    <ul class="lista-header pl-3 mt-2" style="list-style-type: none;">
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Excel nivel Inicial.<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Excel nivel Intermedio<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Excel nivel Avanzado (Certificación Internacional)<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;SQL Server - Bases de datos (Certificación Internacional)<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Microsoft Power BI nivel Inicial<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Microsoft Power BI nivel Avanzado (Certificación Internacional)<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Power Point de cero a avanzado<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Word de cero a avanzado<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Programación en C#<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Introducción al Petróleo y Gas<br></li>
                        <li>• Ejercicios para todos los cursos</li>
                    </ul>
                    <div class="p-4 mt-5" style="background: url(&quot;assets/img/banner2.png&quot;) no-repeat;background-size: cover;font-size: 0.8em;border-radius: 10px;">
                        <p style="color: rgb(255,255,255);font-family: 'Raleway Bold';font-size: 1.2em;">Serás el especialista que las empresas están buscando</p>
                        <p style="color: rgb(255,255,255);">Abre tus puertas a nuevas oportunidades. Domina Excel por completo en solo 12 horas y con soporte 24/7&nbsp;</p>
                        <p style="color: rgb(255,255,255);">Más de 25.000 estudiantes recomiendan nuestra academia</p>
                        <p style="font-size: 1.4em;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                    </div>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Aprender excel desde casa nunca ha sido tan simple</h5>
                    <div class="row mt-3">
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="assets/img/icon-certificado.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Certificado</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Podrás solicitar un certificado emitido por <b>Educar</b>. Avalados por <b>IRAM</b> y la <b>Cámara de Comercio Internacional</b></p>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="assets/img/icon-soporte.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Profesores en línea</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Ayuda con tus dudas 24/7 y ejercicios prácticos para todos los cursos</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="assets/img/icon-por-vide.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Sin horarios fijos</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Aprende a tu ritmo y cuando quieras</p>
                            </div>
                        </div>
                    </div>

                    <img class="stop-card-madre img-fluid mt-3" src="img/certificado.webp" width="100%">

                </div>
                <div class="d-none d-md-block col-md-5 position-relative">
                    <div class="card-madre px-3 py-4 mr-5" style="position: fixed; border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div class="col">
                            <h5 style="color: #00173B;font-family: 'Raleway SemiBold';"><img src="assets/img/imagen-porcentaje.png" style="width: 50px;">&nbsp;Oferta limitada</h5>





                            <div class="row mt-3 mb-3">
                                <div class="col-md-12 p-1">
                                    <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                        <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">1 Mes</h5>
                                        <h3 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><?= $precioSub1Mes ?></h3>
                                        <p class="mt-0"  style="font-size: 0.7em;">Acceso a todos los cursos</p>
                                        <a href="<?= $urlCheckout1Mes ?>" class="btn btn-primary btn-subs px-5" style="background: #007A6A;width: 80%;">Inscribirme</a>
                                    </div>
                                </div>
                                <div class="col-md-12 p-1">
                                    <div class="p-3 text-center" style="border: 4px solid red;border-bottom-style: solid;border-radius: 10px;">
                                        <h5 class="mt-4" style="font-family: 'Raleway Bold';font-family: 'Raleway Bold';
                                            color: white;
                                            background: red;
                                            width: fit-content;
                                            margin: auto;
                                            padding: 10px;
                                            border-radius: 5px;">Popular</h5>
                                        <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">3 Meses</h5>
                                        <h3 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><?= $precioSub3Mes ?></h3>
                                        <p class="mt-0"  style="font-size: 0.7em;">Acceso a todos los cursos</p>
                                        <p class="mt-0" style="font-size: 0.7em;">Certificación Internacional</p>
                                        <a href="<?= $urlCheckout3Mes ?>" class="btn btn-primary btn-subs px-5" style="background: #007A6A;width: 80%;">Inscribirme</a>
                                    </div>
                                </div>
                                <div class="col-md-12 p-1">
                                    <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                        <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">6 Meses</h5>
                                        <h3 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><?= $precioSub6Mes ?></h3>
                                        <p class="mt-0" style="font-size: 0.7em;">Acceso a todos los cursos</p>
                                        <p class="mt-0"  style="font-size: 0.7em;">Doble Certificación Internacional</p>
                                        <a href="<?= $urlCheckout6Mes ?>" class="btn btn-primary btn-subs px-5" style="background: #007A6A;width: 80%;">Inscribirme</a>
                                    </div>
                                </div>
                            </div>

                            <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;10 cursos de alta calidad con acceso ilimitado<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;25 horas de video bajo demanda<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Profesores en línea 24/7<br></li>
                            </ul>
                            <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EDF3F4;">
                                <img src="assets/img/logo-verde-calidad.png" style="width: 50px;">
                                <p class="ml-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                            </div>
                        </div>
                    </div>
                    <image class="objeto-flotante-1" src="assets/img/objeto-flotante-1.png">
                    <image class="objeto-flotante-2" src="assets/img/objeto-flotante-2.png">
                    <image class="objeto-flotante-3" src="assets/img/objeto-flotante-3.png">
                </div>
            </div>

            <div class="row mt-5 py-5" style="background: url(&quot;assets/img/seccion-verde.jpg&quot;);background-size: cover;">
                <div class="d-xl-flex align-items-xl-center col-md-3 pt-5 p-md-5">
                    <h3 class="ml-3 text-center text-md-left" style="font-family: 'Raleway Black';color: #ffffff;font-size: 1.5em;">Lo que opinan nuestros estudiantes</h3>
                </div>


                <div class="col-md-9">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4 pb-5 px-5 p-md-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Es muy bueno, me ayudo para ampliar mis conocimientos. El profesor transmite transmite muy bien."</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Adrián Daich</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Explica muy bien y con ejemplos sencillos."  </p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Ernesto Ageitos</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Buen curso para alguien como yo que comienza de cero, les agradezco mucho"</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Candela Ortiz</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4 pb-5 px-5 p-md-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"La información es clara y precisa, el profe es muy bueno para explicar cada una de las funciones."</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Alan Macedo</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Soy una persona grande y no sabia nada de excel, no tengo buen manejo de pc. Aun así el curso valió la pena, aprendi bastante y esta bien explicado."</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Mariano Pintos</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Sin dudas lo recomiendo"</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Julia Vieytes</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            </div>

            <div class="row  mt-3 p-5 px-md-5">
                <div class="col-md-6">
                    <h1 style="font-family: 'Raleway Black';">¿Tienes dudas? Tenemos respuestas</h1>
                    <div class="accordion mt-4" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        #1 ¿Por cuánto tiempo lo tengo?</button></h5>
                            </div>
                            <div id="collapseOne" class="collapse p-2" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                Depende del plan al que te suscribas. Puedes elegir 1 mes, 3 meses o 6 meses.
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        #2 ¿Cuánto tiempo tardo en terminarlo?</button></h5>
                            </div>
                            <div id="collapseTwo" class="collapse p-2" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                                Tienes el tiempo que desees para terminarlo. No tiene horarios fijos asi que podrás elegir tus ratos libres para hacer el curso en el aula virtual.
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header text-center text-md-left" id="headingThree" style="">
                                <h5 class="mb-0 text-center text-md-left" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        #3 ¿Dan soporte?</button></h5>
                            </div>
                            <div id="collapseThree" class="collapse p-2" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                                Sí, damos soporte 24/7 con profesores online
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0" style="">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                        #4 ¿Incluye Certificación o Diploma?</button></h5>
                            </div>
                            <div id="collapseFour" class="collapse p-2" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                                Sí. Incluye un diploma con nuestro aval por cada uno de los cursos que realices. El plan Trimestral incluye un Certificado Internacional (con avales de IRAM y la Cámara Internacional de Comercio), y el plan Semestral incluye 2 certificados internacionales.
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h5 class="mb-0" style="">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                        #5 ¿Qué requisitos tiene?</button></h5>
                            </div>
                            <div id="collapseFive" class="collapse p-2" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                                No requiere conocimientos previos. Los cursos van desde cero y paso a paso para que aprendas de forma dinámica y fácil.
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-0 mt-md-5 px-3">
                <div class="col-md-2 offset-md-1 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-1.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">+25hs de contenido</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-2.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Soporte 24/7</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-3.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Certificado</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-4.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Online</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-5.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Garantía de&nbsp;100% satisfacción</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-md-5" style="background: linear-gradient(90deg, #007a6a, #008c69 71%, #5e892b 100%);">
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5">
                    <div>
                        <p style="color: rgb(255,255,255);">Conviértete en un profesional del Siglo XXI<br></p>
                        <h1 style="font-family: 'Raleway Black';color: rgb(255,255,255);">Únete a la experiencia Aprende Excel y da un salto intelectual y profesional</h1>
                        <div class="row mt-3 mb-3" >
                            <div class="col-md-4 p-1">
                                <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;background: white;
                                     border-radius: 5px;">
                                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">1 Mes</h5>
                                    <h3 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><?= $precioSub1Mes ?></h3>
                                    <p class="mt-0"  style="font-size: 0.7em;">Acceso a todos los cursos</p>
                                    <a href="<?= $urlCheckout1Mes ?>" class="btn btn-primary btn-subs px-5" style="background: #007A6A;width: 80%;">Inscribirme</a>
                                </div>
                            </div>
                            <div class="col-md-4 p-1">
                                <div class="p-3 text-center" style="border: 2px solid red;border-bottom-style: solid;border-radius: 10px;background: white;
                                     border-radius: 5px;">
                                    <h5 class="mt-4" style="font-family: 'Raleway Bold';font-family: 'Raleway Bold';
                                        color: white;
                                        background: red;
                                        width: fit-content;
                                        margin: auto;
                                        padding: 10px;
                                        border-radius: 5px;">Popular</h5>
                                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">3 Meses</h5>
                                    <h3 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><?= $precioSub3Mes ?></h3>
                                    <p class="mt-0"  style="font-size: 0.7em;">Acceso a todos los cursos</p>
                                    <p class="mt-0" style="font-size: 0.7em;">Certificación Internacional</p>
                                    <a href="<?= $urlCheckout3Mes ?>" class="btn btn-primary btn-subs px-5" style="background: #007A6A;width: 80%;">Inscribirme</a>
                                </div>
                            </div>
                            <div class="col-md-4 p-1">
                                <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;background: white;
                                     border-radius: 5px;">
                                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">6 Meses</h5>
                                    <h3 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;"><?= $precioSub6Mes ?></h3>
                                    <p class="mt-0" style="font-size: 0.7em;">Acceso a todos los cursos</p>
                                    <p class="mt-0"  style="font-size: 0.7em;">Doble Certificación Internacional</p>
                                    <a href="<?= $urlCheckout6Mes ?>" class="btn btn-primary btn-subs px-5" style="background: #007A6A;width: 80%;">Inscribirme</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center p-5">
                    <img class="img-fluid" src="img/imagen-subs-3.jpg">
                </div>
            </div>
        </section>
        <?php include('../n-pages/footer-cursos.php') ?>
        <script>
            $(document).ready(function () {
                $(".btn").click(function () {
                    return false;
                });
                $(".btn-subs").click(function () {
                    fbq('track', 'AddToCart');
                    setTimeout(function () {
                        window.location.href = $('.btn-subs').attr('href');
                    }, 500);

                });
            });
        </script>
    </body>
</html>