<?php

$dirpage = '../../';
$idcurso = 'pantilla_finanzas';
include("../../a-includes/funcionsDB.php");
include("../../a-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);


//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$porcentaje = $curso['PORCENTAJE_DES'];
$precioCursoOficial = '$' . intval(($value / $porcentaje) * 100);
$precioCurso = $simbolo . ' ' . convertirPrecio($value, $moneda);
$urlCheckout = './checkout.php';
$titulo = 'Pack de plantillas de finanzas';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <?php include('../../n-pages/head.php')?>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php 
        $headerImagen = "assets/img/imagen-header.png";
        include('../../n-pages/header.php')
        ?>
        <section>
            <div class="row">
                
                <div class="col-md-7 px-5 ">
                    <img class="d-block d-md-none img-fluid mb-4" src="assets/img/finanzas.png" width="100%">
                    <h5 class="texto-header">4.9/5&nbsp;<i class="fa fa-star" style="color: #F7AC3B;"></i>&nbsp;Basado en 15.000 estudiantes</h5>
                    <h1 style="font-family: 'Raleway Black'; color:#00173B;">Pack de plantillas de finanzas</h1>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Conviértete en el profesional que las empresas están buscando</h5>
                    
                    <div class="d-block d-md-none mt-3">
                        <h5 style="color: #00173B;font-family: 'Raleway SemiBold';">
                            <img src="assets/img/imagen-porcentaje.png" style="width: 30px;">&nbsp;Oferta limitada
                        </h5>
                        <p class="d-flex align-items-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?=$precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;"><?=$moneda?><br></span></p>
                        <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?=$precioCursoOficial?> <?=$moneda?></strike></p>
                        <p class="text-center">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #007A6A;width: 100%;">Quiero estas plantillas</a>
                        </p>
                        
                        <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Accede al mundo profesional con nuestras plantillas de finanzas.&nbsp;</p>
                        <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';">Con estas plantillas entras en el mundo profesional. Administra tu empresa o presenta informes agradables visualmente.
                        Desde Control de entrada y salida de dinero, Black and scholes, Presupuesto cascada, Calculadora de fibonacci y muchas mas..</p>
                    
                        <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Accede a las plantillas cuando y donde quieras<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Consulta cualquier duda 24/7<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp; 15 Planillas de finanzas<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Incluye Plantillas Nivel Inicial, Nivel Intermedio&nbsp;y Nivel Avanzado<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Sin requisitos previos<br></li>
                                
                            </ul>
                        <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EDF3F4;">
                                <img src="assets/img/logo-verde-calidad.png" style="width: 50px;">
                                <p class="ml-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                            </div>
                    </div>
                    
                    <img class="d-none d-md-block img-fluid mt-2" src="assets/img/finanzas.png" width="100%">
                    <p class="d-none d-md-block mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Accede a estas plantillas y sé un profesional.&nbsp;</p>
                    <p class="d-none d-md-block" style="color: #555555;font-family: 'Raleway Regular';">Con estas plantillas entras en el mundo profesional. Administra tu empresa o presenta informes agradables visualmente.
                    Desde Control de entrada y salida de dinero, Black and scholes, Presupuesto cascada, Calculadora de fibonacci y muchas más..</p>
                    <a href="<?= $urlCheckout ?>" class="d-none d-md-block btn btn-primary px-5" style="background: #007A6A;">Quiero estas plantillas</a>
                    <p class="my-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>
                    
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Conviértete en un Experto en Excel con nuestras plantillas complementarias</h5>
                            
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Plantillas profesionales, desde plantillas inicial hasta avanzadas. </p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-1.png">&nbsp; 15 planillas de finanzas para practicar </p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-2.png">&nbsp; Acceso a las plantillas de por vida.</p>
                    <img class="d-none d-md-block img-fluid" src="assets/img/banner-2.jpg" width="100%">
                    <img class="d-block d-md-none img-fluid" src="assets/img/banner-2-movil.png" width="100%">
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Este pack de 15 plantillas está valorado en <b><?=$precioCursoOficial?></b> pero puede ser tuyo con esta oferta limitada por sólo:</p>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-radius: 10px;background: #ffffff;border: 1px solid #bcbcbc ;">
                        <div class="col m-0">
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?=$precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;"><?=$moneda?><br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?=$precioCursoOficial?> <?=$moneda?></strike></p>
                        </div>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-bottom-style: solid;border-bottom-color: rgb(225,225,225);">
                        <img src="assets/img/logo-amarillo-calidad.png" style="width: 50px;">
                        <p class="ml-3" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3"><img class="img-fluid" src="assets/img/icono-libro-compu.png" style="width: 50px;">
                        <h3 class="ml-3" style="font-family: 'Raleway SemiBold';color: #00173B;">Plantillas de finanzas</h3>
                    </div>
                    <ul class="lista-header pl-3 mt-2" style="list-style-type: none;">
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Plantilla de excel para el cálculo del tipo de cambio real<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Plantilla de excel para cálculo de costo variable y costo fijo<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Plantilla de excel para deflactar series en valor histórico<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Plantilla de excel para el cálculo de tir y van<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;plantilla de excel para el computo del multiplicador de inversión<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Y muchas mas<br></li>
                        <li>No requiere conocimientos previos</li>
                    </ul>
                    <div class="row mt-3">
                        
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="assets/img/icon-soporte.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Soporte</h5>
                              
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="assets/img/icon-por-vide.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Acceso de por vida</h5>
                            
                            </div>
                        </div>
                    </div>
                    <div class="stop-card-madre row">
                        <div class="col">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 mt-5 ml-0" style="background: #007A6A;">Quiero estas plantillas</a>
                            <p class="mt-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>
                            
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-block col-md-5 position-relative">
                    <div class="card-madre px-3 py-4 mr-5" style="position: fixed; border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div class="col">
                            <h5 style="color: #00173B;font-family: 'Raleway SemiBold';"><img src="assets/img/imagen-porcentaje.png" style="width: 50px;">&nbsp;Oferta limitada</h5>
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;"><?=$moneda?><br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> <?=$moneda?></strike></p>
                            <p class="text-center">
                                <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #007A6A;width: 80%;">Quiero estas plantillas</a>
                            </p>
                            <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Practicá a tu propio ritmo, donde y cuando quieras<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Consulta cualquier duda 24/7<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;15 planillas descargables<br></li>
                            
                               
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Incluye Planillas Nivel Inicial, Nivel Intermedio&nbsp;y Nivel Avanzado<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Sin requisitos previos<br></li>
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
            
            <div class="row mt-5" style="background: url(&quot;assets/img/seccion-verde.jpg&quot;);background-size: cover;">
                <div class="d-xl-flex align-items-xl-center col-md-3 pt-5 p-md-5">
                    <h3 class="ml-3 text-center text-md-left" style="font-family: 'Raleway Black';color: #ffffff;font-size: 1.5em;">Lo que opinan nuestros estudiantes</h3>
                </div>
                <div class="col-md-3 pb-5 px-5 p-md-5">
                    <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid" src="assets/img/persona-1.png">
                            <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                            <p style="font-size: 0.7em;text-align: left;">Lo recomiendo, excelentes planillas. gracias.</p>
                            <h5 style="font-family: 'Raleway Bold';color: #00173B;">Belén</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-5">
                    <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid" src="assets/img/persona-2.png">
                            <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                            <p style="font-size: 0.7em;text-align: left;">Planillas simples y didacticas. Muy satisfecho.</p>
                            <h5 style="font-family: 'Raleway Bold';color: #00173B;">Federico</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-5">
                    <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid" src="assets/img/persona-3.png">
                            <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                            <p style="font-size: 0.7em;text-align: left;">Planillas de finanzas con claridad. Simples</p>
                            <h5 style="font-family: 'Raleway Bold';color: #00173B;">Ramiro</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 p-5 px-md-5">
                <div class="d-xl-flex align-items-xl-center col-md-6 pr-5">
                    <div>
                        <h1 style="font-family: 'Raleway Black';">¿Qué estas esperando?</h1>
                        <p>Pack de plantillas para presentar trabajos y presentaciones.</p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #007A6A;">¡Las quiero ya!</a>
                    </div>
                </div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center mt-5 mt-md-0">
                    <img class="img-fluid" src="assets/img/persona-sonriendo.png">
                </div>
            </div>
            <div class="row mt-0 mt-md-5 px-3">
                <div class="col-md-2 offset-md-1 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-1.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">15 plantillas </h5>
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

                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-4.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Plantillas descargables</h5>
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
            <div class="row mt-3 mb-0">
                <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
                    <img class="img-fluid" src="assets/img/persona-sonriendo-computadora.png">
                </div>
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5 pr-md-5">
                    <div>
                        <h4 style="font-family: 'Raleway Black';">Miles de alumnos de todo el país han adquirido nuestras plantillas  de finanzas para mejorar sus presentaciones y calidad de entrega.</h4>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #007A6A;">Quiero estas plantillas</a>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-md-5" style="background: linear-gradient(90deg, #007a6a, #008c69 71%, #5e892b 100%);">
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5">
                    <div>
                        <h1 style="font-family: 'Raleway Black';color: rgb(255,255,255);">Pack de plantillas de finanzas</h1>
                        <p class="mt-5" style="color: rgb(255,255,255);">Accedé hoy y obtén 15 plantillas de por vida. Pago por única vez (sin suscripciones ni pagos mensuales).<br></p>
                        <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: normal;color: #ffffff;"><?= $precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Black';font-weight: bold;color: #ffffff;"><?=$moneda?><br></span></p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #ffffff;color: #008b69;font-family: 'Raleway Bold';">Quiero estas plantillas</a>
                    </div>
                </div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center p-5">
                    <img class="img-fluid" src="assets/img/laptop.png">
                </div>
            </div>
        </section>
        <?php include('../../n-pages/footer-cursos.php')?>
    </body>
</html>