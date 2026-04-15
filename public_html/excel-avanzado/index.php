<?php
$dirpage = '../';
$titulo = 'Excel Avanzado';

$idcurso = 'excel_avanzado';
include("../n-includes/funcionsDB.php");
include("../n-includes/logicparametros.php");
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

// SEO
$seo_title = 'Curso de Excel Avanzado Online con Certificado | Macros, VBA y Automatización';
$seo_description = 'Curso de Excel Avanzado online. Aprende macros, VBA, funciones avanzadas y automatización. Certificado oficial. Conviértete en experto Excel. Líderes en capacitaciones laborales.';
$seo_keywords = 'curso excel avanzado, excel macros, excel VBA, curso excel online avanzado, excel automatización, funciones avanzadas excel, certificado excel avanzado, capacitaciones laborales';
$seo_slug = 'excel-avanzado';
$seo_og_title = 'Curso de Excel Avanzado Online | Macros y VBA | Aprende Excel';
$seo_image = 'https://aprende-excel.com/n-img/excelavanzado4.jpeg';
$seo_structured_data = json_encode([
    "@context" => "https://schema.org",
    "@type" => "Course",
    "name" => "Excel Nivel Avanzado",
    "description" => "Conviértete en experto en Excel. Macros, VBA, funciones avanzadas y automatización. Certificado oficial.",
    "provider" => ["@type" => "Organization", "name" => "Aprende Excel", "url" => "https://aprende-excel.com"],
    "url" => "https://aprende-excel.com/excel-avanzado/",
    "educationalLevel" => "Advanced",
    "inLanguage" => "es",
    "aggregateRating" => ["@type" => "AggregateRating", "ratingValue" => "4.9", "reviewCount" => "15000", "bestRating" => "5"],
    "offers" => ["@type" => "Offer", "category" => "Paid", "availability" => "https://schema.org/InStock"]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <?php include('../n-pages/head.php')?>
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
                    <img class="d-block d-md-none img-fluid mb-4" src="../n-img/excelavanzado4.jpeg" width="100%">
                    <h5 class="texto-header">4.9/5&nbsp;<i class="fa fa-star" style="color: #F7AC3B;"></i>&nbsp;Basado en 15.000 estudiantes</h5>
                    <h1 style="font-family: 'Raleway Black'; color:#00173B;">Nivel Avanzado Excel</h1>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Convertite en un maestro del Excel</h5>
                    
                    <div class="d-block d-md-none mt-3">
                        <h5 style="color: #00173B;font-family: 'Raleway SemiBold';">
                            <img src="assets/img/imagen-porcentaje.png" style="width: 30px;">&nbsp;Oferta limitada
                        </h5>
                        <p class="d-flex align-items-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?=$precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;"><?=$moneda?><br></span></p>
                        <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?=$precioCursoOficial?> <?=$moneda?></strike></p>
                        <p class="text-center">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #007A6A;width: 100%;"><b>Quiero estos cursos</b></a>
                        </p>
                        
                        <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Saber Excel a nivel avanzado añade un peso importante en tu currículum. Cada día se publican miles de ofertas de trabajo que requieren un Experto/a en Excel.</p>
                        <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Explicado paso a paso en 4.5 horas de videos, con este curso vas a saber dominar las funciones más avanzadas de este software, pudiendo aportar un valor enorme a cualquier empresa.</p>
                    
                        <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;4.5 hs de video paso a paso<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Acceso para siempre al curso<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Otorgamos Certificado Oficial<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Estudialo desde tu PC, notebook, tablet o Celular<br></li>
                            </ul>
                        <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EDF3F4;">
                                <img src="assets/img/logo-verde-calidad.png" style="width: 50px;">
                                <p class="ml-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                            </div>
                    </div>
                    
                    <img class="d-none d-md-block img-fluid mt-2" src="../n-img/excelavanzado4.jpeg" width="100%">
                    
                    <p class="d-none d-md-block mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Saber Excel a nivel avanzado añade un peso importante en tu currículum. Cada día se publican miles de ofertas de trabajo que requieren un Experto/a en Excel.</p>
                    <p class="d-none d-md-block mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Explicado paso a paso en 4.5 horas de videos, con este curso vas a saber dominar las funciones más avanzadas de este software, pudiendo aportar un valor enorme a cualquier empresa.</p>

                    <a href="<?= $urlCheckout ?>" class="d-none d-md-block btn btn-primary px-5" style="background: #007A6A;"><b>Quiero este curso</b></a>
                    <p class="my-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>
                    
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Aprende Excel con nuestro método de manera dinámica y simple
</h5>
                            
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Ejemplos reales, desde un nivel inicial y con soporte cada vez que lo necesites... y sin requisitos previos.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-1.png">&nbsp; 4.5 horas de contenido para verlos donde y cuando quieras.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-2.png">&nbsp; Acceso al curso y al soporte de por vida con un único pago.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-3.png">&nbsp; Certificado y Garantía de 100% de satisfacción.</p>
                    <img class="d-none d-md-block img-fluid" src="assets/img/banner-2.jpg" width="100%">
                    <img class="d-block d-md-none img-fluid" src="assets/img/banner-2-movil.png" width="100%">
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Este curso está valorado en <b><?=$precioCursoOficial?></b> pero puede ser tuyo con esta oferta limitada por sólo:</p>
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
                        <h3 class="ml-3" style="font-family: 'Raleway SemiBold';color: #00173B;">Aprenderás</h3>
                    </div>
                    <ul class="lista-header pl-3 mt-2" style="list-style-type: none;">
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;  Conexión de Bases de datos a traves de Power Pivot<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;  KPI´s<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;  Principales fórmulas utilizadas en las Bases de Datos<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;  Herramientas de análisis de datos, Estadística Descriptiva, Media Móvil y mucho más<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;  Generación de aplicaciones , diseño de formularios, controles,automatización y macros!<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;  Introducción VBA - Programación VBA<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;y muchísimo mas!<br></li>
                        <li>Requsitos: Tener una base de conocimientos en este programa</li>
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
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="assets/img/icon-certificado.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Certificado</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Adquiere un Certificado para sumar a tu Currículum</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="assets/img/icon-soporte.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Soporte</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Obtén soporte siempre que lo necesites</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="assets/img/icon-por-vide.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Acceso de por vida</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Aprende a tu ritmo y cuando quieras</p>
                            </div>
                        </div>
                    </div>
                    <div class="stop-card-madre row">
                        <div class="col">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 mt-5 ml-0" style="background: #007A6A;">Quiero este curso</a>
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
                            <h5 style="color: #00173B;font-family: 'Raleway SemiBold';"><img src="assets/img/imagen-porcentaje.png" style="width: 50px;">&nbsp;Oferta limitada</h5>
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;"><?=$moneda?><br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> <?=$moneda?></strike></p>
                            <p class="text-center">
                                <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #007A6A;width: 80%;">Quiero este curso</a>
                            </p>
                            <ul class="lista-header pl-3" style="list-style-type: none;">
                            <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;4.5 hs de video paso a paso<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Acceso para siempre al curso<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Otorgamos Certificado Oficial<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Estudialo desde tu PC, notebook, tablet o Celular<br></li>
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
                                                <p style="font-size: 0.7em;text-align: left;">"Lo recomiendo. Muy profesional."</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Alejandro Azad</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Hicimos el curso con un compañero de trabajo y nos resultó muy bien"</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Manuel Garabal</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Explicación clara y concisa. Lo recomiendo 100% a quien quiera tener conocimientos muy avanzados"</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Emiliano Goya</h5>
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
                                                <p style="font-size: 0.7em;text-align: left;">"Adquirimos varios cursos para la empresa y lo aprendieron correctamente"</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Roberto Malabia</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Soy analista financiero y este curso me sirvió para afianzar conocimientos. Habían varias cosas que no sabía."</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Analía Muscari</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"El mejor curso de excel avanzado que realicé. Sin dudas volvería a comprarles"</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Victoria Defeudi</h5>
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
                            <div class="card-body"> De por vida. Una vez que abones vas a tener acceso para siempre. Lo vas a poder descargar en tu PC, notebook, tablet o celular.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto tiempo tardo en terminarlo?</button></h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                            <div class="card-body">4.5 hs de videos es la duración total del curso.</div>
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
                            <div class="card-body">Necesitás conocimientos de Excel. Si no los tenés te recomendamos ver primero nuestro Curso nivel Inicial o Curso nivel Intermedio</div>
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
                                    <li>Clase 1 - Construcción Bases de datos</li>
                                    <li>Clase 2 - Filtros y limpieza de datos</li>
                                    <li>Clase 3 - Columnas primarias y formuladas</li>
                                    <li>Clase 4 - Principales fórmulas utilizadas en las Bases de Datos</li>
                                    <li>Clase 5 - Buscarv</li>
                                    <li>Clase 6 - Buscarh</li>
                                    <li>Clase 7 - Coindicir</li>
                                    <li>Clase 8 - KPI´s</li>
                                    <li>Clase 9 - Estadística Descriptiva</li>
                                    <li>Clase 10 - Media Móvil</li>
                                    <li>Clase 11 - Regresión lineas</li>
                                    <li>Clase 12 – Diseños</li>
                                    <li>Clase 12 - Minigráficos</li>
                                    <li>Clase 13 - Líneas de tendencia</li>
                                    <li>Clase 14 - Histogramas</li>
                                    <li>Clase 15 - Instalación</li>
                                    <li>Clase 16 - Conexión de Bases de datos</li>
                                    <li>Clase 17 - Columnas formuladas</li>
                                    <li>Clase 18 - Creación de modelos y conexión entre tablas</li>
                                    <li>Clase 19 - Análisis de datos y construcción de gráficos</li>
                                    <li>Clase 20 - Formularios - Definición de objeto</li>
                                    <li>Clase 21 - Uso de controles - Detallar controles y características</li>
                                    <li>Clase 22 - Diseño de formularios - Pasos para un buen diseño</li>
                                    <li>Clase 23 - Automatización - Formularios y macros</li>
                                    <li>Clase 24 - Introducción VBA - Programación VBA</li>
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
                        <h1 style="font-family: 'Raleway Black';">¿Qué estas esperando?</h1>
                        <p>Al final podés presentar un examen para poder validar todo lo que aprendiste en el curso.</p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #007A6A;">¡Comenzar ahora!</a>
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
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">3hs de contenido</h5>
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
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Certificado de&nbsp;conocimiento</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-4.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Online y también descargable</h5>
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
                        <h4 style="font-family: 'Raleway Black';">Dominá Excel en profundidad</h4>
                        <p>A través de este curso vas a aprender a dominar Microsoft Excel hasta un nivel intermedio, consiguiendo dominar la mayoría de sus funciones generales y avanzadas de esta herramienta. Explicado paso a paso en 4 horas de videos.</p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #007A6A;">Quiero estos cursos</a>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-md-5" style="background: linear-gradient(90deg, #007a6a, #008c69 71%, #5e892b 100%);">
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5">
                    <div>
                        <p style="color: rgb(255,255,255);">Dominá Excel en profundidad<br></p>
                        <h1 style="font-family: 'Raleway Black';color: rgb(255,255,255);">Excel Avanzado</h1>
                        <p class="mt-5" style="color: rgb(255,255,255);">Accedé hoy y tenelo de por vida. Pago por única vez (sin suscripciones ni pagos mensuales).<br></p>
                        <p style="color: rgb(255,255,255);">Garantía de devolución de 7 días<br></p>
                        <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: normal;color: #ffffff;"><?= $precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Black';font-weight: bold;color: #ffffff;"><?=$moneda?><br></span></p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #ffffff;color: #008b69;font-family: 'Raleway Bold';">Quiero este curso</a>
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