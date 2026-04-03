<?php
$dirpage = '../';
$titulo = 'Realiza el PACK OFFICE';

$idcurso = 'officecert';
include($dirpage . "n-includes/funcionsDB.php");
include($dirpage . "n-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$porcentaje = $curso['PORCENTAJE_DES'];
$precioCursoOficial = '$' . ($value + intval(($value / $porcentaje) * 100));
$precioCurso = '$' . $value;
$urlCheckout = './checkout_cert.php';
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
        <?php include('../n-pages/head.php') ?>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php
        $headerImagen = null;
        include('../n-pages/header.php')
        ?>
        <section>
            <div class="row">
                <div class="col-md-7 px-5 ">
                    <img class="d-block d-md-none img-fluid mb-4" src="assets/img/imagen-header.png" width="100%">
                    <h5 class="texto-header">4.9/5&nbsp;<i class="fa fa-star" style="color: #F7AC3B;"></i>&nbsp;Basado en 15.000 estudiantes</h5>
                    <h1 style="font-family: 'Raleway Black'; color:#00173B;">Certificación Internacional en Microsoft Office</h1>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Transfórmate en un profesional del siglo 21</h5>

                    <div class="d-block d-md-none mt-3">
                        <h5 style="color: #00173B;font-family: 'Raleway SemiBold';">
                            <img src="../n-assets/img/imagen-porcentaje.png" style="width: 30px;">&nbsp;Oferta limitada
                        </h5>
                        <p class="d-flex align-items-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #007DD6;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #007DD6;">ARS<br></span></p>
                        <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> ARS</strike></p>
                        <p class="text-center">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #6C3BF3;width: 100%; color:#fff"><b>Lo quiero</b></a>
                        </p>

                        <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Aprende Word, Excel y PowerPoint en solo 9 horas y consigue las mejores oportunidades laborales.</p>
                        <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';">Ya sea que quieras escalar dentro de tu empresa, conseguir un nuevo y mejor empleo o estés estudiando, tu currículum estará incompleto hasta que no domines Word, Excel y PowerPoint.</p>

                        <ul class="lista-header pl-3" style="list-style-type: none;">
                            <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Hazlo a tu propio ritmo, donde y cuando quieras<br></li>
                            <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Despeja tus dudas con nuestro soporte 24/7
                                <br></li>
                            <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;20 Ejercicios Prácticos
                                <br></li>
                            <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;+70 Clases Teóricas
                            <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp; Certificado Internacional y Garantía de 100% de satisfacción.
                                <br></li>
                        </ul>
                        <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EBF1F2;">
                            <img src="assets/img/logo-verde-calidad.png" style="width: 50px;">
                            <p class="ml-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                        </div>
                    </div>

                    <img class="d-none d-md-block img-fluid mt-2" src="assets/img/imagen-header.png" width="100%">

                    <p class="d-none d-md-block mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Aprende Word, Excel y PowerPoint en solo 9 horas y consigue las mejores oportunidades.</p>
                    <p class="d-none d-md-block mb-4" style="color: #555555;font-family: 'Raleway Regular';">Ya sea que quieras escalar dentro de tu empresa, conseguir un nuevo y mejor empleo o estés estudiando, tu currículum estará incompleto hasta que no domines Word, Excel y PowerPoint.</p>




                    <a href="<?= $urlCheckout ?>" class="d-none d-md-block btn btn-primary px-5" style="background: #6C3BF3; color:#fff"><b>Lo quiero</b></a>
                    <p class="my-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>

                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Domina el requisito más pedido por las empresas</h5>

                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Con nuestro curso online Pack Office manejarás las tres herramientas de forma rápida, sencilla y dinámica.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-1.png">&nbsp; 9 horas de contenido para verlos donde y cuando quieras.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-2.png">&nbsp; Acceso al curso y al soporte de por vida con un único pago.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-3.png">&nbsp; Certificado y Garantía de 100% de satisfacción.</p>
                    <img class="img-fluid" src="assets/img/certificado-internacional-excel.png">
                    <img class="img-fluid" src="assets/img/excel-certificacion-internacional.jpg">
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">
                        Nuestro curso está valorado en <b><?= $precioCursoOficial ?></b> 
                        pero puede ser tuyo con esta oferta limitada por sólo: </p>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-radius: 10px;background: #ffffff;border: 1px solid #bcbcbc ;">
                        <div class="col m-0">
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #007DD6;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #007DD6;">ARS<br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> ARS</strike></p>
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
                        <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Crea documentos de manera profesional.
                            <br></li>
                        <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Maneja las funciones como autocorrección, índices, formatos de letra, entre otras.
                            <br></li>
                        <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Domina los temas y cambia el aspecto de tus documentos en solo unos pasos.
                            <br></li>
                        <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Conoce los fundamentos y maneja las funciones básicas de Excel.
                            <br></li>
                        <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Crea plantillas de cálculo de manera rápida y sencilla.
                            <br></li>
                        <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Gestiona grandes volúmenes de información de forma simple.
                            <br></li>
                        <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp; Diseña presentaciones de alto impacto.
                            <br></li>
                        <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Expon datos importantes de manera profesional.
                            <br></li>
                        <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Descubre todas las funciones de PowerPoint.
                            <br></li>
                        <li>Requsitos:<br>una PC con los programas Word, Excel y Powerpoint instalados </li>
                    </ul>
                    <div class="p-4 mt-5" style="background: url(&quot;assets/img/banner2.png&quot;) no-repeat;background-size: cover;font-size: 0.8em;border-radius: 10px;">
                        <p style="color: rgb(255,255,255);font-family: 'Raleway Bold';font-size: 1.2em;">Olvida las clases magistrales con horas y horas de contenido aburrido y tecnicismos engorrosos.</p>
                        <p style="color: rgb(255,255,255);">Explicaciones detalladas, paso a paso y casos prácticos te van a dar la seguridad de manejar el Pack de Office como todo un profesional.
                            Haz que tu currículum aumente su valor y consigue las mejores oportunidades de empleo.</p>
                        <p style="font-size: 1.4em;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                    </div>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Aprende Word, Excel y PowerPoint en un solo lugar</h5>
                    <div class="row mt-3">
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                <img class="icono-csa" src="assets/img/word.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Word</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Crea documentos de manera profesional</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                <img class="icono-csa" src="assets/img/excel.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Excel</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Domina el programa más utilizado por las empresas</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                <img class="icono-csa" src="assets/img/powerpoint.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">PowerPoint</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Diseña presentaciones de alto impacto</p>
                            </div>
                        </div>
                    </div>
                    <div class="stop-card-madre row">
                        <div class="col text-center text-md-left">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 mt-5 ml-0" style="background: #6C3BF3; color:#fff"><b>Quiero ser un experto</b></a>
                            <p class="mt-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>
                            <div class="d-xl-flex align-items-xl-center p-3"><img class="img-fluid" src="assets/img/icon-regalo.png" style="width: 50px;">
                                <h3 class="ml-3" style="font-family: 'Raleway SemiBold';color: #00173B;">¡Y aún hay más!</h3>
                            </div>
                            <div class="d-xl-flex text-center text-md-left justify-content-xl-start align-items-xl-start position-relative p-3 mb-2" style="border-radius: 10px; background-image: url(assets/img/banner-bonus-1.png); background-repeat: no-repeat; background-size: cover;background-position: center;"><img class="img-fluid" src="assets/img/ico-bonus-1.png" style="width: 50px;">
                                <div class="ml-md-4">
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">Bonus #1</h5>
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">5 Templates</h5>
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
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #007DD6;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #007DD6;">ARS<br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> ARS</strike></p>
                            <p class="text-center">
                                <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #6C3BF3;width: 80%; color:#fff;"><b>Lo quiero</b></a>
                            </p>
                            <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Hazlo a tu propio ritmo, donde y cuando quieras<br></li>
                                <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Despeja tus dudas con nuestro soporte 24/7
                                    <br></li>
                                <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Otorgamos Certificado Oficial
                                    <br></li>
                                <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;Estudia desde tu PC, notebook, tablet o Celular
                                    <br></li>
                                <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp; 20 Ejercicios Prácticos
                                    <br></li>
                                <li><i class="fa fa-check" style="color: #007DD6;"></i>&nbsp;+70 Clases Teóricas
                                    <br></li>
                            </ul>
                            <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EBF1F2;">
                                <img src="assets/img/logo-verde-calidad.png" style="width: 50px;">
                                <p class="ml-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 py-5" style="background: url(&quot;assets/img/background-azul.png&quot;);background-size: cover;">
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
                                                <p style="font-size: 0.7em;text-align: left;">"De mucha utilidad y con bastante contenido. Aún me faltan ver varios videos pero por ahora viene de maravilla</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Fernando Gutierrez</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Los ejemplos son fáciles de entender, se explican bastante bien. Recomiendo</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Evelyn Lucera</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Agradezco a los profesores y a la academia. Me sirvió mucho, en mi caso no tengo (mejor dicho no tenía) un buen manejo de la computadra más que para ver emails y googlear. Ahora me siento mucho más seguro. Destaco que explican lento sin saltearse cosas"</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Luciano Cordero</h5>
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
                                                <p style="font-size: 0.7em;text-align: left;">"La información que dan es muy clara y van despacio explicando cada paso. Hice estos cursos para capacitarme y estar mas preparado para los nuevos empleos"</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Julian Mazzei</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Destaco la ayuda de los profesores. Si bien explican bien, me surgieron dudas con el curso de Excel y me respondieron rápido y con claridad"</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Camila Lanfranco</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Recomiendo este pack sin dudas. Estoy buscando cambiar de trabajo y en todos los portales online como bumeran y zonajobs piden manejo de estas herramientas"</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Maria Belén Reynoso</h5>
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
                <div class="col-md-6 mx-auto">
                    <h1 style="font-family: 'Raleway Black';">Somos expertos despejando cualquier duda</h1>
                    <div class="accordion mt-4" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">#1 ¿Cuánto tiempo tengo para hacer el curso?</button></h5>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                <div class="card-body"> Nuestros cursos los podés hacer a tu propio ritmo.
                                    <br><br> El acceso al contenido y al soporte lo tendrás de por vida. Accedé directamente desde tu computadora, tablet o celular.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Incluye alguna constancia?</button></h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                                <div class="card-body">Sí. Al finalizar el curso podés solicitar tu Certificado Internacional el cual podrás sumar a tu currículum para demostrar tus conocimientos en Excel, Powerpoint y Word.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header text-center text-md-left" id="headingThree" style="">
                                <h5 class="mb-0 text-center text-md-left" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan soporte?</button></h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                                <div class="card-body">En nuestro curso online Pack Office Nivel Inicial no necesitás conocimientos previos. Te enseñamos desde 0.
                                    <br><br> Lo único que necesitás es tener ganas de aprender y los programas de Microsoft Office (Word, Excel y Powerpoint) instalados en tu computadora.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0" style="">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">#4 ¿Qué pasa si tengo alguna duda sobre la cursada?</button></h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                                <div class="card-body">Nuestro curso incluye soporte 24/7 de manera online. Solo tenés que consultar por e-mail o WhatsApp y te vamos a ayudar a despejar cualquier duda.
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5  class="mt-3 mt-md-5" style="font-family: 'Raleway Black';">¿Querés conocer el temario completo?</h5>
                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="">👉 Click acá para ver el temario</button></h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="">
                            <div class="card-body">

                                <ul>
                                    <p class="h5 pt-3"> Temario de Excel Inicial</p>
                                    <li> Clase 1: Estructuras básicas de excel</li>
                                    <li>Clase 2: Hacer una factura</li>
                                    <li>Clase 3: Hojas, libros</li>
                                    <li>Clase 4: Vista Backstage: libro, hojas, en la vista vemos botones inicio,nuevo y abrir</li>
                                    <li>Clase 5: Insertar Celdas Filas y Columnas</li>
                                    <li>Clase 6: Eliminar Celdas Filas y Columnas</li>
                                    <li>Clase 7: Ocultar y visualizar de nuevo filas y columnas sin eliminarlas</li>
                                    <li>Clase 8: Copiar , cortar y pegar celdas</li>
                                    <li>Clase 9: Formato a la tabla de datos Ajustar texto Alinear texto</li>
                                    <li>Clase 10: Formato simple monedas</li>
                                    <li>Clase 11: Creación de lista desplegable</li>
                                    <li>Clase 12: Ordenar la base de datos orden de A Z de Z A y personalizado</li>
                                    <li>Clase 13: Buscar y reemplazar</li>
                                    <li>Clase 14: Alternativas para copiar una hoja.</li>
                                    <li>Clase 15: Operaciones aritméticas (Sumar, Restar, Multiplicar, Dividir)</li>
                                    <li>Clase 16: Sumar por celda, sumar con formula y la funcion autosuma</li>
                                    <li>Clase 17: Multiplicación con selección de celdas y fórmula de PRODUCTO</li>
                                    <li>Clase 18: Division por celdas y formula COCIENTE</li>
                                    <li>Clase 19: Calcular promedio de forma manual y fórmula PROMEDIO</li>
                                    <li>Clase 20: Validación de datos VERDADERO/FALSO</li>
                                    <li>Clase 21: Fórmula Condicional SI</li>
                                    <li>Clase 22: Fórmula Sumar.SI (Suma Condicional)</li>
                                    <li>Clase 23: Anclaje de celdas</li>
                                    <li>Clase 24: Formato de tablas, asignación de nombres a tablas</li>
                                    <li>Clase 25: Fórmula BUSCARV</li>
                                    <li>Clase 26: Formato Condicional</li>
                                    <li>Clase 27: Cifrar archivo, proteger y desproteger hoja y libro</li>
                                    <li>Clase 28: Gráfica en barra con una variable y formato de gráfica</li>
                                    <li>Clase 29: Gráfica de pastel o circular</li>
                                    <li>Clase 30: Gráfico de tiempo con varias variables</li>
                                    <li>Clase 31: Cómo imprimir en Excel</li>
                                    <p class="h5 pt-3 "> Temario de Word</p>
                                    <li>Clase 1: Introducción a Word, explicación breve de Microsoft Word</li>
                                    <li>Clase 2: Presentación de herramientas, barras de tareas, visualización</li>
                                    <li>Clase 3: Vista Backstage y sus funcionalidades basicas</li>
                                    <li>Clase 4: Edición de textos, estilo de fuentes, líneas, párrafos</li>
                                    <li>Clase 5: Comandos con teclas</li>
                                    <li>Clase 6: Utilizar los comandos de selección, menú de selección</li>
                                    <li>Clase 7: Escribir texto y uso de idioma con corrección ortográfica</li>
                                    <li>Clase 8: Cambiar tipos de estilos, tamaño, fuente, letra</li>
                                    <li>Clase 9: Cambiar el tipo de formato, guiones número de letras</li>
                                    <li>Clase 10: Insertar gráficos, SmartArt, captura, imágenes, vínculos</li>
                                    <li>Clase 11: Creación de portadas</li>
                                    <li>Clase 12: Copiar, pegar, y editar textos</li>
                                    <li>Clase 13: Crear, guardar, modificar textos</li>
                                    <li>Clase 14: Vincular textos</li>
                                    <li>Clase 15: Plantillas, estilos</li>
                                    <li>Clase 16: Marca de agua, color de página, bordes de pagina</li>
                                    <li>Clase 17: Marcador, Hipervinculo</li>
                                    <li>Clase 18: Ecuación, símbolos</li>
                                    <li>Clase 19: Formas</li>
                                    <li>Clase 20: Buscar, remplazar, seleccionar</li>
                                    <li>Clase 21: Imprimir, compartir, exportar</li>
                                    <li>Clase 22: Reglas de medición</li>
                                    <li>Clase 23: Vistas</li>
                                    <li>Clase 24: Organizar, dividir</li>
                                    <li>Clase 25: Lineas de la cuadricula</li>
                                    <p class="h5 pt-3 "> Temario de Power Point</p>
                                    <li>Clase 1 – Introducción a Power Point</li>
                                    <li>Clase 2 – Funcionalidades del menú Archivo</li>
                                    <li>Clase 3 – Funcionalidad del Menú Inicio Parte 1</li>
                                    <li>Clase 4 – Funcionalidad del Menú Inicio Parte 2</li>
                                    <li>Clase 5 – Funcionalidad del Menú Inicio Parte 3</li>
                                    <li>Clase 6 – Insertar y editar imágenes</li>
                                    <li>Clase 7 – Insertar y editar tablas</li>
                                    <li>Clase 8 – Insertar y editar gráficos</li>
                                    <li>Clase 9 – Insertar vínculos, comentarios y textos</li>
                                    <li>Clase 10 – Insertar elementos multimedia</li>
                                    <li>Clase 11 – Transiciones y animaciones</li>
                                    <li>Clase 12 – Diseños</li>
                                    <li>Clase 13 – Pestaña revisar</li>
                                    <li>Clase 14 – Pestaña vista</li>
                                    <li>Clase 15 – Pestaña Ayuda</li>
                                    <li>Clase 16 – Presentación formal de diapositivas</li>
                                    <li>Clase 17 – Como Imprimir y sus configuraciones</li>
                                    <li>Clase 18 – Combinación de teclas</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row  mt-0 mt-md-0 px-3">
                <div class="col-md-2 offset-md-3 p-1">
                    <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                        <img class="icono-csa" src="assets/img/icon-certificado.png">
                        <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Certificado Internacional</h5>
                        <p class="ml-3" style="font-size: 0.7em;">Certificación Profesional emitida por <b>Educar</b>, con cooperación académica de <b>UTN, UBA y UNLP</b> mediante un convenio con la fundación Promover. Validez internacional en Latinoamérica y España.</p>
                    </div>
                </div>
                <div class="col-md-2 p-1">
                    <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                        <img class="icono-csa" src="assets/img/icon-soporte.png">
                        <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Soporte</h5>
                        <p class="ml-3" style="font-size: 0.7em;">Obtén soporte siempre que lo necesites</p>
                    </div>
                </div>
                <div class="col-md-2 p-1">
                    <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                        <img class="icono-csa" src="assets/img/icon-por-vide.png">
                        <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Acceso de por vida</h5>
                        <p class="ml-3" style="font-size: 0.7em;">Aprende a tu ritmo y cuando quieras</p>
                    </div>
                </div>
            </div>

            <div class="row mt-3 p-5 px-md-5">
                <div class="d-xl-flex align-items-xl-center col-md-6 pr-5">
                    <div>
                        <h1 style="font-family: 'Raleway Black';">¿Qué estas esperando?</h1>
                        <p>Más de 15.500 alumnos de toda Latinoamérica han aprendido Word, Excel y PowerPoint gracias a nuestro curso y han logrado mejorar sus currículums</p>
                        <p>Empieza por sólo <?= $precioCurso ?></p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #6C3BF3;"><b>¡Comenzar ahora!</b></a>
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
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">9hs de contenido</h5>
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
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Online</h5>
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
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #6C3BF3; color:#fff;"><b>Quiero estos cursos</b></a>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-md-5" style="background-image: url(assets/img/background-footer-azul.png);
                 background-repeat: no-repeat;
                 background-size: cover;
                 background-position: center;">
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5">
                    <div>
                        <p style="color: rgb(255,255,255);">Conviértete en un profesional del  Siglo XXI<br></p>
                        <h1 style="font-family: 'Raleway Black';color: rgb(255,255,255);">Domina Word, Excel y PowerPoint... los programas esenciales para que tu currículum esté completo</h1>
                        <p class="mt-5" style="color: rgb(255,255,255);">Accede hoy y obtén los 3 cursos de por vida. Pago por única vez (sin suscripciones ni pagos mensuales).<br></p>
                        <p style="color: rgb(255,255,255);">Garantía de devolución de 7 días<br></p>
                        <p class="d-xl-flex align-items-xl-center m-0">
                            <span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: normal;color: #fff;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Black';font-weight: bold;color: #fff;">ARS<br></span></p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #ffffff;color: #6C3BF3;font-family: 'Raleway Bold';"><b>Quiero estos cursos</b></a>
                    </div>
                </div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center p-5">
                    <img class="img-fluid" src="assets/img/laptop.png">
                </div>

            </div>
        </section>
        <?php include('../n-pages/footer-cursos.php') ?>
    </body>
</html>