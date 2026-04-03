<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$dirpage = '../';
$titulo = 'Pack experto en Excel';
/*
$idcurso = 'excel_exp_cert';
include($dirpage . "n-includes/funcionsDB.php");
include($dirpage . "n-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);



$value = $curso['PRECIO_UNITARIO'];
$porcentaje = $curso['PORCENTAJE_DES'];
$precioCursoOficial = '$' . ($value + intval(($value / $porcentaje) * 100));
$precioCurso = '$' . $value;
$urlCheckout = './checkout_cert.php';
*/

$value = 'ddd';
$porcentaje = 'ddd';
$precioCursoOficial = 'ddd';
$precioCurso = 'ddd';
$urlCheckout = 'ddd';


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
                    <img class="d-block d-md-none img-fluid mb-4" src="assets/img/imagen-header-excel-computadora-2.jpg" width="100%">
                    <h5 class="texto-header">4.9/5&nbsp;<i class="fa fa-star" style="color: #F7AC3B;"></i>&nbsp;Basado en 1000 empresas</h5>
                    <h1 style="font-family: 'Raleway Black'; color:#00173B;">Plan para empresas</h1>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Llevá la productividad de tu empresa al próximo nivel </h5>
                    
                    <div class="d-block d-md-none mt-3">
                        <h5 style="color: #00173B;font-family: 'Raleway SemiBold';">
                            <i class="fa fa-certificate" style="color: #F7AC3B;"></i>&nbsp;CURSO CON CERTIFICACIÓN INTERNACIONAL
                        </h5>
                        <p class="d-flex align-items-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?=$precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;">ARS<br></span></p>
                        <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?=$precioCursoOficial?> ARS</strike></p>

                        
                        <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">¿Tus empleados pasan demasiado tiempo para hacer un reporte, un balance o trabajo administrativo?.&nbsp;</p>
                        <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';">El 85% de las empresas que usan Excel jamás entrenaron a su personal sobre este software, aún cuando se trata de una herramienta clave para la realización de tareas.</p>
                    
                        <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EDF3F4;">
                                <img src="assets/img/logo-verde-calidad.png" style="width: 50px;">
                                <p class="ml-2 mt-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                            </div>
                    </div>
                    
                    <img class="d-none d-md-block img-fluid mt-2" src="assets/img/imagen-header-excel-computadora-2.jpg" width="100%">
                    
                    <a href="<?= $urlCheckout ?>" class="d-none d-md-block btn btn-primary px-5" style="background: #007A6A;">Quiero más información</a>
                    <p class="d-none d-md-block" style="color: #555555;font-family: 'Raleway Regular';">Capacitar a tu personal con Excel permitirá que realicen trabajos de manera fluida, generando un gran impacto en su productividad.</p>
                    <p class="my-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>
                    
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">EN SOLO UNAS HORAS VAS A AUMENTAR LA PRODUCTIVIDAD DE TU EMPRESA</h5>
                            
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Ejemplos reales, desde un nivel inicial hasta avanzado, soporte cada vez que lo necesites, y sin requisitos previos. </p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-1.png">&nbsp; +12 horas de contenido para verlos donde y cuando quieras.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-2.png">&nbsp; Acceso al curso y al soporte de por vida con un único pago.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-3.png">&nbsp; Certificado Internacional y Garantía de 100% de satisfacción.</p>
                    <img class="d-none d-md-block img-fluid" src="assets/img/banner-2.jpg" width="100%">
                    <img class="d-block d-md-none img-fluid" src="assets/img/banner-2-movil.png" width="100%">
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-radius: 10px;background: #ffffff;border: 1px solid #bcbcbc ;">
                        <div class="col m-0">
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?=$precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;">ARS<br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?=$precioCursoOficial?> ARS</strike></p>
                        </div>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-bottom-style: solid;border-bottom-color: rgb(225,225,225);">
                        <img src="assets/img/logo-amarillo-calidad.png" style="width: 50px;">
                        <p class="ml-3 mt-3" style="font-size: 0.7em;">Aumenta la proactividad de tus empleados.</p>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3"><img class="img-fluid" src="assets/img/icono-libro-compu.png" style="width: 50px;">
                        <h3 class="ml-3 mt-3" style="font-family: 'Raleway SemiBold';color: #00173B;">Esto es lo que los integrantes de tu empresa Aprenderán</h3>
                    </div>
                    <ul class="lista-header pl-3 mt-2" style="list-style-type: none;">
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Fundamentos de Excel<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Funciones básicas y avanzadas<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Filtros básicos y avanzados para gestionar la información<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Crear facturas<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Armar tablas dinámicas<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Crear dashboards<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Ejecutar y automatizar Macros<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Introducción VBA - Programación VBA<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Conexión de Bases de datos a traves de Power Pivot<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Herramientas de análisis de datos, Estadística Descriptiva, Media Móvil<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;y muchísimo mas!<br></li>
                    </ul>
                    <div class="row mt-3">
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="assets/img/icon-certificado.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Certificado Internacional</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Certificación Profesional emitida por <b>Educar</b>, con cooperación académica de <b>UTN, UBA y UNLP</b> mediante un convenio con la fundación Promover. Validez internacional en Latinoamérica y España.</p>
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
                                <p class="ml-3" style="font-size: 0.7em;">Cursos asincrónicos</p>
                            </div>
                        </div>
                    </div>
                    <div class="stop-card-madre row">
                        <div class="col">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 mt-5 ml-0" style="background: #007A6A;">Quiero este plan de empresa</a>
                            <p class="mt-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>
                            <div class="d-xl-flex align-items-xl-center p-3 text-md-left text-center mt-3">
                                <img class="img-fluid" src="assets/img/icon-regalo.png" style="width: 50px;">
                                <h3 class="ml-3" style="font-family: 'Raleway SemiBold';color: #00173B;">¡Y aún hay más!</h3>
                            </div>
                            <div class="d-xl-flex text-center text-md-left justify-content-xl-start align-items-xl-start position-relative p-3 mb-2" style="border-radius: 10px; background-image: url(assets/img/banner-bonus-1.png); background-repeat: no-repeat; background-size: cover;background-position: center;"><img class="img-fluid" src="assets/img/ico-bonus-1.png" style="width: 50px;">
                                <div class="ml-md-4">
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">Bonus #1</h5>
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;"> 10 Templates</h5>
                                    <p class="texto-aun-mas" style="font-size: 0.7em;">Te dejamos templates de excel para ver el uso de las herramientas necesarias. (El uso de herramientas también se explica en los videos)</p>
                                </div>
                            </div>
                            <div class="d-xl-flex text-center text-md-left justify-content-xl-start align-items-xl-start position-relative p-3 mb-2" style="border-radius: 10px; background-image: url(assets/img/banner-bonus-2.png); background-repeat: no-repeat; background-size: cover;background-position: center;"><img class="img-fluid" src="assets/img/ico-bonus-2.png" style="width: 50px;">
                                <div class="ml-md-4">
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">Bonus #2</h5>
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;"> 20 Ejercicios</h5>
                                    <p class="texto-aun-mas" style="font-size: 0.7em;">Aprenderás cómo crear un atractivo recibo formal para darle a tus clientes, brindando profesionalismo y confianza</p>
                                </div>
                            </div>
                            <div class="d-xl-flex text-center text-md-left justify-content-xl-start align-items-xl-start position-relative p-3" style="border-radius: 10px; background-image: url(assets/img/banner-bonus-3.png); background-repeat: no-repeat; background-size: cover;background-position: center;"><img class="img-fluid" src="assets/img/ico-bonus-3.png" style="width: 50px;">
                                <div class="ml-md-4">
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">Bonus #3</h5>
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;"> Examen Integrador&nbsp;</h5>
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
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;">ARS<br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> ARS</strike></p>
                            <p class="text-center">
                                <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #007A6A;width: 80%;">Quiero este plan de empresa</a>
                            </p>
                            <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Hazlo a tu propio ritmo, donde y cuando quieras<br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Consulta cualquier duda 24/7<br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;100 Ejercicios Prácticos<br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;15 Plantillas Gratis<br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Sin requisitos previos<br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Otorgamos Certificado Oficial<br></li>
                            </ul>
                        </div>
                    </div>
                    <image class="objeto-flotante-1" src="assets/img/objeto-flotante-1.png">
                    <image class="objeto-flotante-2" src="assets/img/objeto-flotante-2.png">
                    <image class="objeto-flotante-3" src="assets/img/objeto-flotante-3.png">
                </div>
            </div>


            <div class="row  mt-3 p-5 px-md-5">
                <div class="col-md-12">
                    <h1 style="font-family: 'Raleway Black';">Somos expertos despejando cualquier duda</h1>
                    <div class="accordion mt-4" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo tengo?</button></h5>
          </div>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
            <div class="card-body" style="font-size:14px;"> ¡De por vida! Una vez que abones esta promo vas a tener acceso para siempre a ambos cursos.</div>
          </div>
        </div>
        <div class="card">
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapsetwo">#2 ¿Dan soporte?</button></h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
            <div class="card-body" style="font-size:14px;">Sí, damos soporte 24/7. Podés consultar cualquier duda en nuestro e-mail o Whatsapp.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingFour">
            <h5 class="mb-0" style="">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">#4 ¿Incluye Certificación o Diploma?</button></h5>
          </div>
          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
            <div class="card-body" style="font-size:14px;">Una vez que tus empleados terminen el curso podran solicitarnos la Certificación Profesional emitida por <b>Educar</b>, con cooperación académica de <b>UTN, UBA y UNLP</b> mediante un convenio con la fundación Promover. Validez internacional en Latinoamérica y España.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingFive">
            <h5 class="mb-0" style="">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">#5 ¿Qué requisitos tiene?</button></h5>
          </div>
          <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
            <div class="card-body" style="font-size:14px;">No requiere conocimientos previos. Sólo necesitás una PC con el Excel instalado.</div>
          </div>
        </div>
          <div class="card">
          
            <div class="row mt-3 p-5 px-md-5">
                <div class="d-xl-flex align-items-xl-center col-md-6 pr-5">
                    <div>
                        <h1 style="font-family: 'Raleway Black';">¿Qué estas esperando?</h1>
                        <p>¡Somos la única academia en Argentina con <b>Certificación Internacional!</b></p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #007A6A;">¡Comenzar ahora!</a>
                    </div>
                </div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center mt-5 mt-md-0">
                    <img class="img-fluid" src="assets/img/persona-sonriendo.png">
                </div>
            </div>
            <div class="row mt-0 mt-md-5 px-3">
                
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
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Certificado Internacional</h5>
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
                        <h4 style="font-family: 'Raleway Black';">Miles de alumnos de todo el país han aprendido con nuestro Curso Online a utilizar Excel para mejorar sus oportunidades.</h4>
                        
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #007A6A;">Solicitar más información</a>
                    </div>
                </div>
            </div>
            
            <div class="row px-3 px-md-5" style="background: linear-gradient(90deg, #007a6a, #008c69 71%, #5e892b 100%);">
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5">
                    <div>
                        <p style="color: rgb(255,255,255);">Domina Microsoft Excel y certificate como Experto<br></p>
                        <h1 style="font-family: 'Raleway Black';color: rgb(255,255,255);">Plan empresa</h1>
                        <p class="mt-5" style="color: rgb(255,255,255);">Somos unica empresa que brinda certificación internacional<br></p>
                        <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: normal;color: #ffffff;"><?= $precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Black';font-weight: bold;color: #ffffff;">ARS<br></span></p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #ffffff;color: #008b69;font-family: 'Raleway Bold';">Solicita ya una cotización</a>
                    </div>
                </div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center p-5">
                    <img class="img-fluid" src="assets/img/laptop.png">
                </div>
            </div>
            <div class="py-5 align-items-center text-center bg-light container ">

                <h1 class=" pt-4 pb-3   slider-text font-weight-bold" style="color:#323232;"><span style="color:#13a740;">Nuestros </span>cursos</h1> <div class=" container">
            <div class="row textoautos">
                <div class="col-md-3 col-6 p-1">
                    <a href="#modal1" data-toggle="modal" data-target="#modal1">
                    <img class="  d-block img-fluid img-thumbnail " src="assets/img/ExcelInicial.png">
                    <p class=" h5 font-weight-bold">Excel Inicial: $1073+IVA p/persona</p>
                    <p style="font-size:16px;color:black;">31 videos - 3hs de duración</p>
                    </a>
                </div>

                <div class="col-md-3 col-6 p-1">
                    <a href="#modal1" data-toggle="modal" data-target="#modal1">
                    <img class="d-block img-fluid img-thumbnail align-items-center text-center" src="assets/img/ExcelIntermedio.png">
                    <p class="h5 font-weight-bold ">Excel Intermedio: $1237+IVA p/persona</p>
                    <p style="font-size:16px;color:black;">20 videos - 3.5hs de duración</p>
                    </a>
                </div>

                <div class="col-md-3 col-6 p-1">
                    <a href="#modal1" data-toggle="modal" data-target="#modal1">
                    <img class="d-block img-fluid img-thumbnail align-items-center text-center" src="assets/img/ExcelAvanzado.png">
                    <p class="h5 font-weight-bold ">Excel Avanzado: $1652+IVA p/persona</p>
                    <p style="font-size:16px;color:black;">24 videos - 4hs de duración</p>
                    </a>
                </div>

                <div class="col-md-3 col-6 p-1">
                    <a href="#modal1" data-toggle="modal" data-target="#modal1">
                    <img class="d-block img-fluid img-thumbnail align-items-center text-center" src="assets/img/PowerBi.png">
                    <p class="h5 font-weight-bold ">Power BI: $1652+IVA p/persona</p>
                    <p style="font-size:16px;color:black;">16 videos - 3hs de duración </p>
                    </a>
                </div>
            </div>
        </div>
    </div>       

    <div class="py-5 align-items-center text-center  container">
<h3 class=" pt-4 pb-3   slider-text font-weight-bold" style="color:#323232;"> Más de 150 compañias capacitadas con éxito </h3>
<div class=" container">
<div class="row textoautos">
<div class="col-md-3 col-6 p-1  ">
<img class="  d-block img-fluid   p-5" src="assets/img/nosis.png">
</div>
<div class="col-md-3 col-6 p-1">
<img class="  d-block img-fluid   p-4" src="assets/img/gos.png">
</div>
<div class="col-md-3 col-6 p-1">
<img class="  d-block img-fluid   p-5" src="assets/img/hz.png">
</div>
<div class="col-md-3 col-6 p-1">
<img class="  d-block img-fluid    p-5" src="assets/img/stm.png">
</div>
<div class="col-md-3 col-6 p-1">
<img class="  d-block img-fluid    p-5" src="assets/img/clinicaC.png">
</div>
<div class="col-md-3 col-6 p-1">
<img class="  d-block img-fluid    p-5" src="assets/img/diseñog.png">
</div>
<div class="col-md-3 col-6 p-1">
<img class="  d-block img-fluid    p-5" src="assets/img/simiente.png">
</div>
<div class="col-md-3 col-6 p-4">
<img class="  d-block img-fluid    p-3" src="assets/img/sumed.png">
</div>
</div>

<a href="#formumobile" id="ch" class="btn bg-success text-white font-weight-bold d-block px-3 py-3 mt-3 pulse">Recibir presupuesto HOY</a>
</div>
</div>

<div class="container text-center"><hr>
<h3 class="my-5 py-5   slider-text font-weight-bold" style="color:#323232;">¿No sabes qué nivel tiene tu personal? <br><span style="color:#13a740;" class="h5 "><i class="fas fa-file-alt"></i>
Realizaremos un rápido test de nivelación gratuito antes de que nos contrates </span></h3>
</div>    




        </section>
        <?php include('../n-pages/footer-cursos.php')?>
    </body>
</html>


