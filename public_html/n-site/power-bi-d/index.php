<?php
$dirpage = '../';
$titulo = 'Aprende Power BI';

$idcurso = 'powerbi';
include($dirpage . "n-includes/funcionsDB.php");
include($dirpage . "n-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);

$value = $curso['PRECIO_UNITARIO'];
$porcentaje = $curso['PORCENTAJE_DES'];
$precioCursoOficial = $simbolo . ' ' . convertirPrecio($value + intval(($value / $porcentaje) * 100), $moneda);
$precioCurso = $simbolo . ' ' . convertirPrecio($value, $moneda);
$urlCheckout = './checkout.php';
/*
$value = 'ddd';
$porcentaje = 'ddd';
$precioCursoOficial = 'ddd';
$precioCurso = 'ddd';
$urlCheckout = 'ddd';
*/
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <?php include('../n-pages/head.php')?>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php 
        $headerImagen = "assets/img/back-imagen-header.png";
        include('../n-pages/header.php')
        ?>
        <section>
            <div class="row">
                <div class="col-md-7 px-5 ">
                    <img class="d-block d-md-none img-fluid mb-4" src="assets/img/imagen-header.png" width="100%">
                    <h5 class="texto-header">4.9/5&nbsp;<i class="fa fa-star" style="color: #F7AC3B;"></i>&nbsp;Basado en 15.000 estudiantes</h5>
                    <h1 style="font-family: 'Raleway Black'; color:#00173B;">Aprende <span style="color: #ffc902;">Power BI</span></h1>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Curso online a distancia</h5>
                    
                    <div class="d-block d-md-none mt-3">
                        <h5 style="color: #00173B;font-family: 'Raleway SemiBold';">
                            <img src="../n-assets/img/imagen-porcentaje.png" style="width: 30px;">&nbsp;Oferta limitada
                        </h5>
                        <p class="d-flex align-items-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #333333;"><?=$precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #333333;"><?=$moneda?><br></span></p>
                        <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?=$precioCursoOficial?> <?=$moneda?></strike></p>
                        <p class="text-center">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #ffc902;width: 100%; color:#000"><b>Lo quiero</b></a>
                        </p>
                        
                        <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';"><b>Microsoft Power BI</b> es una herramienta usada para la Inteligencia Empresarial. Permite unir diferentes fuentes de datos y volcarlos en tableros que pueden ser consultados de forma rápida e intuitiva, facilitando el conocimiento y toma de decisiones dentro de una empresa, ahorrando muchísimas horas de trabajo.</p>
                        <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';">A través de este curso vas a aprender a conocer todas las funciones de Power BI, realizar tableros, análisis de datos y mucho más. Explicado paso a paso en 3 horas de videos por un profesor certificado de la Universidad Tecnológica Nacional (UTN)</p>
                        <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';"><b>Requsitos:</b> Una PC con Power BI instalado (es gratuito).</p>
                    
                        <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;3 hs de video paso a paso<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;+30 Ejercicios Prácticos<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Acceso para siempre al curso<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Otorgamos Certificado Oficial<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Estudialo desde tu PC, notebook, tablet o celular<br></li>
                            </ul>
                        <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EDF3F4;">
                                <img src="../n-assets/img/logo-verde-calidad.png" style="width: 50px;">
                                <p class="ml-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                            </div>
                    </div>
                    
                    <img class="d-none d-md-block img-fluid mt-2" src="assets/img/imagen-header.png" width="100%">
                    
                    <p class="d-none d-md-block mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';"><b>Microsoft Power BI</b> es una herramienta usada para la Inteligencia Empresarial. Permite unir diferentes fuentes de datos y volcarlos en tableros que pueden ser consultados de forma rápida e intuitiva, facilitando el conocimiento y toma de decisiones dentro de una empresa, ahorrando muchísimas horas de trabajo.</p>
                    <p class="d-none d-md-block mb-4" style="color: #555555;font-family: 'Raleway Regular';">A través de este curso vas a aprender a conocer todas las funciones de Power BI, realizar tableros, análisis de datos y mucho más. Explicado paso a paso en 3 horas de videos por un profesor certificado de la Universidad Tecnológica Nacional (UTN)</p>
                    <p class="d-none d-md-block mb-4" style="color: #555555;font-family: 'Raleway Regular';"><b>Requsitos:</b> Una PC con Power BI instalado (es gratuito).</p>
                    
                    <a href="<?= $urlCheckout ?>" class="d-none d-md-block btn btn-primary px-5" style="background: #ffc902; color:#000"><b>Inscribirme</b></a>
                    <p class="my-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>
                    
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Conviértete en un Experto en Power BI con nuestro método dinámico y simple</h5>
                            
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Ejemplos reales, desde un nivel inicial hasta avanzado, soporte cada vez que lo necesites, y sin requisitos previos. </p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-1.png">&nbsp; +12 horas de contenido para verlos donde y cuando quieras.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-2.png">&nbsp; Acceso al curso y al soporte de por vida con un único pago.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-3.png">&nbsp; Certificado y Garantía de 100% de satisfacción.</p>
                    <img class="d-none d-md-block img-fluid" src="assets/img/banner-2.png" width="100%">
                    <img class="d-block d-md-none img-fluid" src="assets/img/banner-2-movil.png" width="100%">
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Este pack de 3 cursos está valorado en <b><?=$precioCursoOficial?></b> pero puede ser tuyo con esta oferta limitada por sólo:</p>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-radius: 10px;background: #ffffff;border: 1px solid #bcbcbc ;">
                        <div class="col m-0">
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #000;"><?=$precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #000;"><?=$moneda?><br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?=$precioCursoOficial?> <?=$moneda?></strike></p>
                        </div>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-bottom-style: solid;border-bottom-color: rgb(225,225,225);">
                        <img src="../n-assets/img/logo-amarillo-calidad.png" style="width: 50px;">
                        <p class="ml-3" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3">
                        <img class="img-fluid" src="assets/img/icono-aprenderas.png" style="width: 50px;">
                        <h3 class="ml-3" style="font-family: 'Raleway SemiBold';color: #00173B;">Aprenderás</h3>
                    </div>
                    <ul class="lista-header pl-3 mt-2" style="list-style-type: none;">
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
                    <div class="p-4 mt-5" style="background: url(&quot;assets/img/banner2.png&quot;) no-repeat;background-size: cover;font-size: 0.8em;border-radius: 10px;">
                        <p style="color: rgb(255,255,255);font-family: 'Raleway Bold';font-size: 1.2em;">Serás el especialista que las empresas están buscando</p>
                        <p style="color: rgb(255,255,255);">Abre tus puertas a nuevas oportunidades. Domina Excel por completo en solo 12 horas y con soporte 24/7&nbsp;</p>
                        <p style="color: rgb(255,255,255);">Más de 15.500 estudiantes recomiendan nuestra academia</p>
                        <p style="font-size: 1.4em;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                    </div>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Aprender excel desde casa nunca ha sido tan simple</h5>
                    <div class="row mt-3">
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                            <img class="icono-csa" src="assets/img/icon-certificado.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Certificado</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Adquiere un Certificado para sumar a tu Currículum</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                            <img class="icono-csa" src="assets/img/icon-soporte.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Soporte</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Obtén soporte siempre que lo necesites</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                            <img class="icono-csa" src="assets/img/icon-por-vide.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Acceso de por vida</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Aprende a tu ritmo y cuando quieras</p>
                            </div>
                        </div>
                    </div>
                    <div class="stop-card-madre row">
                        <div class="col text-center text-md-left">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 mt-5 ml-0" style="background: #000; color:#fff">Quiero este curso</a>
                            <p class="mt-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>
                            <div class="d-xl-flex align-items-xl-center p-3"><img class="img-fluid" src="assets/img/icon-regalo.png" style="width: 50px;">
                                <h3 class="ml-3" style="font-family: 'Raleway SemiBold';color: #00173B;">¡Y aún hay más!</h3>
                            </div>
                            <div class="d-xl-flex text-center text-md-left justify-content-xl-start align-items-xl-start position-relative p-3 mb-2" style="border-radius: 10px; background-image: url(assets/img/banner-bonus-1.png); background-repeat: no-repeat; background-size: cover;background-position: center;"><img class="img-fluid" src="assets/img/ico-bonus-1.png" style="width: 50px;">
                                <div class="ml-md-4">
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">Bonus #1</h5>
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">+ 10 Templates</h5>
                                    <p class="texto-aun-mas" style="font-size: 0.7em;">Te dejamos templates de excel para ver el uso de las herramientas necesarias. (El uso de herramientas también se explica en los videos)</p>
                                </div>
                            </div>
                            <div class="d-xl-flex text-center text-md-left justify-content-xl-start align-items-xl-start position-relative p-3 mb-2" style="border-radius: 10px; background-image: url(assets/img/banner-bonus-2.png); background-repeat: no-repeat; background-size: cover;background-position: center;"><img class="img-fluid" src="assets/img/ico-bonus-2.png" style="width: 50px;">
                                <div class="ml-md-4">
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">Bonus #2</h5>
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">+ 20 Ejercicios</h5>
                                    <p class="texto-aun-mas" style="font-size: 0.7em;">Aprenderás cómo crear un atractivo recibo formal para darle a tus clientes, brindando profesionalismo y confianza</p>
                                </div>
                            </div>
                            <div class="d-xl-flex text-center text-md-left justify-content-xl-start align-items-xl-start position-relative p-3" style="border-radius: 10px; background-image: url(assets/img/banner-bonus-3.png); background-repeat: no-repeat; background-size: cover;background-position: center;"><img class="img-fluid" src="assets/img/ico-bonus-3.png" style="width: 50px;">
                                <div class="ml-md-4">
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">Bonus #3</h5>
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">+ Examen Integrador&nbsp;</h5>
                                    <p class="texto-aun-mas" style="font-size: 0.7em;">Al final podés presentar un examen para poder validar todo lo que aprendiste en el curso.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-block col-md-5 position-relative">
                    <div class="card-madre px-3 py-4 mr-5" style="position: fixed; border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div class="col">
                            <h5 style="color: #00173B;font-family: 'Raleway SemiBold';"><img src="../n-assets/img/imagen-porcentaje.png" style="width: 50px;">&nbsp;Oferta limitada</h5>
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #333333;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #333333;"><?=$moneda?><br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> <?=$moneda?></strike></p>
                            <p class="text-center">
                                <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #ffc902;width: 80%; color:#000"><b>Quiero este curso</b></a>
                            </p>
                            <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Hazlo a tu propio ritmo, donde y cuando quieras<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Consulta cualquier duda 24/7<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;75 videos pre-grabados (12hs) paso a paso<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;+ 100 Ejercicios Prácticos<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;15 Plantillas Gratis<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Incluye curso Nivel Inicial, Nivel Intermedio&nbsp;y Nivel Avanzado<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Sin requisitos previos<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Otorgamos Certificado Oficial<br></li>
                            </ul>
                            <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EDF3F4;">
                                <img src="../n-assets/img/logo-verde-calidad.png" style="width: 50px;">
                                <p class="ml-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5 py-5" style="background: url(&quot;assets/img/seccion-amarillo.png&quot;);background-size: cover;">
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
                                                <p style="font-size: 0.7em;text-align: left;">Lo recomiendo, el profe explica muy bien y es facil ver los videos. gracias.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Belén</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Introduce muchas herramientas en excel. Muy satisfecho.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Federico</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Enseña muy bien, tengo poco manejo de pc y me fue de mucha utilidad.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Ramiro</h5>
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
                                                <p style="font-size: 0.7em;text-align: left;">Muy completo! gracias.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Daniel</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Transmiten muy claro su conocimiento, algunas cosas yo ya las sabia pero me sirvio para profundizar lo que se de excel.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Laura</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Excelente.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Alejandro</h5>
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
                    <h1 style="font-family: 'Raleway Black';">Somos expertos despejando cualquier duda</h1>
                    <div class="accordion mt-4" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo tengo?</button></h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                            <div class="card-body"> ¡De por vida! Una vez que abones vas a tener acceso para siempre. Lo vas a poder descargar en tu PC, notebook, tablet o celular.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto tiempo tardo en terminarlo?</button></h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                            <div class="card-body">3 hs de videos es la duración total del curso.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan Soporte?</button></h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                            <div class="card-body">Sí, damos soporte 24/7. Podés consultar cualquier duda en nuestro e-mail o Whatsapp.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">#4 ¿Incluye Certificación o Diploma?</button></h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                            <div class="card-body">Una vez termines el curso podés solicitarnos gratis la Certificado de Cursado.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">#5 ¿Qué requisitos tiene?</button></h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                            <div class="card-body">Tener instalado el programa Power BI y nada más!</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">#6 ¿Cuál es el temario completo?</button></h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="">
                            <div class="card-body">

                                <ul>
                                    <li>Clase 1 – Introducción: Power BI como herramienta de Reporting, Interfaz y recorrido</li>
                                    <li>Clase 2 – Conexión a fuente de datos (Excel, Web, etc.)</li>
                                    <li>Clase 3 – ETL (Extracción, Transformación y Carga de datos)</li>
                                    <li>Clase 4 – Power Query. Tips y consideraciones</li>
                                    <li>Clase 5 – Proceso de Modelado Relaciones y Direcciones del modelo</li>
                                    <li>Clase 6 – Generación de Relaciones. Direcciones y Cardinalidad</li>
                                    <li>Clase 7 – Calendario Automático. Dimensión Dinámica</li>
                                    <li>Clase 8 – Tablas calculadas y columnas calculadas</li>
                                    <li>Clase 9 – DAX. Generación de métricas rápidas</li>
                                    <li>Clase 10 – Operadores CALCULATE, SUMX</li>
                                    <li>Clase 11 – Inteligencia de Tiempo: YTD, MTD, QTD, SPLY</li>
                                    <li>Clase 12 – Consultas, Glosario en DAX</li>
                                    <li>Clase 13 – Visuales. ¿Como se generan? Asignación de campos y Formatos</li>
                                    <li>Clase 14 – Construcción del Dashboard</li>
                                    <li>Clase 15 – Edicion de interacciones. Revision de Visuales</li>
                                    <li>Clase 16 – Publicacion Dashboard en Power BI Service</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="row mt-3 p-5 px-md-5">
                <div class="d-xl-flex align-items-xl-center col-md-6 pr-5">
                    <div>
                        <h1 style="font-family: 'Raleway Black';">¿Qué estas <span style="color: #ffc902;">esperando</span>?</h1>
                        <p>Suma valor a tu currículum y consigue nuevas y mejores oportunidades. Con un único pago tendrás acceso de por vida.</p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #000;"><b>¡Comenzar ahora!</b></a>
                    </div>
                </div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center mt-5 mt-md-0">
                    <img class="img-fluid" src="assets/img/persona-sonriendo.png">
                </div>
            </div>
            <div class="row mt-0 mt-md-5 px-3">
                <div class="col-md-2 offset-md-1 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;">
                        <img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-1.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">3hs de contenido</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;">
                        <img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-2.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Soporte 24/7</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;">
                        <img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-3.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Certificado de&nbsp;conocimiento</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;">
                        <img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-4.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Online y también descargable</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;">
                        <img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-5.png">
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
                        <h4 style="font-family: 'Raleway Black';">Miles de alumnos de todo el país han aprendido con nuestro Curso Online a utilizar Excel para mejorar sus oportunidades.</h4>
                        <p>Estamos tan seguros de que te va a gustar que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #ffc902; color:#000;"><b>Quiero este curso</b></a>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-md-5" style="background-image: url(assets/img/background-negro.png);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;">
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5">
                    <div>
                        <p style="color: rgb(255,255,255);">Domina Power BI en pocas horas<br></p>
                        <h1 style="font-family: 'Raleway Black';color: rgb(255,255,255);">Curso a <span style="color:#EDBD11">distancia</h1>
                        <p class="mt-5" style="color: rgb(255,255,255);">Accede hoy y obtén este  curso de por vida. Pago por única vez (sin suscripciones ni pagos mensuales).<br></p>
                        <p style="color: rgb(255,255,255);">Garantía de devolución de 7 días<br></p>
                        <p class="d-xl-flex align-items-xl-center m-0">
                            <span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: normal;color: #EDBD11;"><?= $precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Black';font-weight: bold;color: #EDBD11;"><?=$moneda?><br></span></p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #ffffff;color: #333333;font-family: 'Raleway Bold';">Quiero este curso</a>
                    </div>
                </div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center p-5">
                    <img class="img-fluid" src="assets/img/laptop.png">
                </div>
            </div>
        </section>
        <?php include('../n-pages/footer-cursos.php')?>
    </body>
</html>