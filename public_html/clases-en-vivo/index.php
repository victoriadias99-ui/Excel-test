<?php
$dirpage = '../';
$titulo = 'Clases en Vivo';

$idcurso = 'excel_en_vivo';
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
        $headerImagen = "assets/img/imagen-header.png";
        include('../n-pages/header.php')
        ?>
        <section>
            <div class="row">
                <div class="col-md-12 px-5 ">
                    <img class="d-block d-md-none img-fluid mb-4" src="assets/img/imagen-header-excel-computadora-2.jpg" width="100%">
                    <h5 class="texto-header">4.9/5&nbsp;<i class="fa fa-star" style="color: #F7AC3B;"></i>&nbsp;Basado en 15.000 estudiantes</h5>
					<h5 class="texto-header"> 1era Semana anotate gratis por 1$.</h5>
					<h5 class="texto-header"> Abonás el curso completo si te gusta</h5>
					
                   <!-- <h1 style="font-family: 'Raleway Black'; color:#00173B;">Dominá Microsoft Excel - Clases en vivo por Zoom</h1> -->
				  <h1 style="font-family: 'Raleway Black'; color:#00173B;">
				 
				  Dominá Microsoft Excel - Clases en vivo por Zoom</h1>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Conviértete en el profesional que las empresas están buscando</h5>
                    <div class="d-block d-md-none mt-3">
                        <h5 style="color: #00173B;font-family: 'Raleway SemiBold';">
                            <i class="fa fa-certificate" style="color: #F7AC3B;"></i>&nbsp;Certificate Internacionalmente como Experto en Excel
                        </h5>
                        <p class="d-flex align-items-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;">6.999<br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;"><?=$moneda?><br></span></p>
                        <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?=$precioCursoOficial?> <?=$moneda?></strike></p>
                        <p class="text-center">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #007A6A;width: 100%;">Solicitar más información</a>
                        </p>
                        <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Dominá la herramienta más solicitada por las empresas de todo el mundo.&nbsp;</p>
                        <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';">Destacá entre todos los currículums y consigue empleos bien pagos. Ser un Experto en esta herramienta representa un gran valor para las empresas y están dispuestas a pagar salarios elevados por quien sepa manejar Excel en niveles avanzados.</p>
                    
                        <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Certificado avalado por Cámara de Comercio Internacional. Válido para todo Latinoamérica y España<br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Consulta cualquier duda de manera sincrónica con el profesor<br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Clases en vivo <br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Nivel Inicial e Intermedio&nbsp;<br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Sin requisitos previos<br></li>
                             </ul>
                        <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EDF3F4;">
                                <img src="assets/img/logo-verde-calidad.png" style="width: 50px;">
                                 
                            </div>
                    </div>
                    
                    <img class="d-none d-md-block img-fluid mt-2" src="assets/img/imagen-header-excel-computadora-2.jpg" width="100%">
                    <p class="d-none d-md-block mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Domina la herramienta más solicitada por las empresas de todo el mundo.&nbsp;</p>
                    <p class="d-none d-md-block" style="color: #555555;font-family: 'Raleway Regular';">Destaca entre todos los currículums y consigue empleos bien pagos. Ser un Experto en esta herramienta representa un gran valor para las empresas, y están dispuestas a pagar salarios elevados por quien sepa manejar Excel en niveles avanzados.</p>
                    <a href="<?= $urlCheckout ?>" class="d-none d-md-block btn btn-primary px-5" style="background: #007A6A;">Solicitar más información</a>
                    <p class="my-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>
                    
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Conviértete en un Experto en Excel con nuestro método dinámico y simple</h5>
                            
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Ejemplos reales, desde un nivel inicial hasta intermedio y sin requisitos previos. </p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-2.png">&nbsp; Clases en Vivo.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-3.png">&nbsp; Certificado Internacional y Garantía de 100% de satisfacción.</p>
                    <img class="d-none d-md-block img-fluid" src="assets/img/banner-2.jpg" width="100%">
                    <img class="d-block d-md-none img-fluid" src="assets/img/banner-2-movil.png" width="100%">
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Estas clases estan valoradas por <b>$19.999</b> pero puede acceder a esta oferta limitada por sólo:</p>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-radius: 10px;background: #ffffff;border: 1px solid #bcbcbc ;">
                        <div class="col m-0">
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCurso ?> <br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;"><?=$moneda?><br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?=$precioCursoOficial?> <?=$moneda?></strike></p>
                        </div>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-bottom-style: solid;border-bottom-color: rgb(225,225,225);">
                        <img src="assets/img/logo-amarillo-calidad.png" style="width: 50px;">
                        <p class="ml-3 mt-3" style="font-size: 0.7em;">Compra segura: tienes 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3"><img class="img-fluid" src="assets/img/icono-libro-compu.png" style="width: 50px;">
                        <h3 class="ml-3 mt-3" style="font-family: 'Raleway SemiBold';color: #00173B;">Aprenderás</h3>
                    </div>
                    <ul class="lista-header pl-3 mt-2" style="list-style-type: none;">
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Fundamentos de Excel<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Funciones básicas<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Filtros básicos e intermedios para gestionar la información<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Crear facturas<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Fórmula BUSCARV<br></li>
						<li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Tablas Dinámicas<br></li>                       
					   <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Crear dashboards<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Fórmula Sumar.SI (Suma Condicional)<br></li>
                        <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;y muchísimo mas!<br></li>
                        <li style="font-size:14px;"> No requiere conocimientos previos</li>
                    </ul>
                    <img class="img-fluid" src="assets/img/certificado-internacional-excel.png">
                    <img class="img-fluid" src="assets/img/excel-certificacion-internacional.jpg">
                    <div class="p-4 mt-5" style="background: url(&quot;assets/img/banner2.png&quot;) no-repeat;background-size: cover;font-size: 0.8em;border-radius: 10px;">
                        <p style="color: rgb(255,255,255);font-family: 'Raleway Bold';font-size: 1.2em;">Serás el especialista que las empresas están buscando</p>
                        <p style="color: rgb(255,255,255);">Sumá un conocimiento valioso en solo 2 semanas y obtené tu certificado &nbsp;</p>
                        <p style="color: rgb(255,255,255);">Más de 15.500 estudiantes recomiendan nuestra academia</p>
                        <p style="font-size: 1.4em;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                    </div>
                    <h5 class="mt-4 pt-4 text-md-left text-center" style="font-family: 'Raleway Bold';color: #00173B;">Aprender excel desde casa nunca ha sido tan simple</h5>
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
                    </div>
                </div>
            <div class="section   py-5 col-md-12" style="background: rgb(33,163,99);background: linear-gradient(180deg, rgba(33,163,99,1) 31%, rgba(17,125,67,1) 67%);">
                <div class="container px-3 text-white">
                        <h2 class=" font-weight-bold" style=" "><span style="color:white ;">¡Mejorá tu currículum en 2 semanas!</span> </h2>
                        <h5 class=" font-weight-bold" style=" "><span style="color:white ;"><u>Clases en vivo por Zoom</u></span> </h5>
                        <p class="mt-3" style="  font-size: 19px;">No es un secreto. Lo sabés. <br>El mercado laboral se encuentra saturado. Las empresas reciben cientos de currículums cada vez que se abre una nueva vacante.<br>
                            <strong>Necesitás destacar, hacerlo diferente y sumar nuevas habilidades y destrezas.</strong>
                        <br><br>
                        <b>¡Y con nuestra ayuda lo vas a lograr!</b>
                                Ya sea que estés buscando un ascenso, un nuevo empleo o quieras aprender una nueva herramienta, manejar Excel es indispensable para mejorar tus oportunidades.</p><hr>
                    <div class="bg-white rounded   text-dark p-4">
                        <h3 class=" font-weight-bold ">Características del curso:</h3>
                        <ul>
                        <li><span class="font-weight-bold">Fecha de Inicio:</span> Martes 19 de julio</li>
						<li><span class="font-weight-bold">Modalidad:</span> desde tu casa, a través de Zoom</li>
                        <li><span class="font-weight-bold">Requisitos:</span> sin conocimientos previos. Solo una PC con Excel instalado</li>
                        <li><span class="font-weight-bold">Días y horarios:</span> Martes y Jueves de 19 a 21hs</li>
						<li><span class="font-weight-bold">Duración:</span> 2 semanas</li>
						<li><span class="font-weight-bold">Carga horaria:</span> 8 horas: 4 clases de 2 horas</li>
                        <li><span class="font-weight-bold">Precio:</span> Único pago de <?= $precioCurso ?> </li>
                        <li><span class="font-weight-bold">Cuotas:</span> hasta 3 sin interés</li>
                        </ul>
                    </div>
                </div>
            </div>

                <div class="d-none d-md-block col-md-5 position-relative">
                    <div class="card-madre px-3 py-4 mr-5" style="position: fixed; border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div class="col">
                            <h5 style="color: #00173B;font-family: 'Raleway SemiBold';"><img src="assets/img/imagen-porcentaje.png" style="width: 50px;">&nbsp;Oferta limitada</h5>
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCurso ?> <br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;"><?=$moneda?><br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCurso ?>  <?=$moneda?></strike></p>
                            <p class="text-center">
                                <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #007A6A;width: 80%;">Quiero mas información</a>
                            </p>
                            <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Accede a las clases por zoom desde donde quieras, celu compu o tablet. <br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Consulta cualquier duda 24/7<br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Si te perdés alguna clase, podés ver la grabación cuantas veces quieras<br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Sin requisitos previos<br></li>
                                <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Otorgamos Certificado Oficial<br></li>
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
                <div class="d-xl-flex align-items-xl-center col-md-12 pt-5 p-md-5">
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
                                                <p class="text-center">Lo recomiendo, el profe explica muy bien y es facil ver los videos. gracias.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Belén</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p class="text-center">Introduce muchas herramientas en excel. Muy satisfecho.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Federico</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p class="text-center">Enseña muy bien, tengo poco manejo de pc y me fue de mucha utilidad.</p>
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
                                                <p class="text-center">Muy completo! gracias.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Daniel</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Muy didáctico el profesor, algunas cosas yo ya las sabia pero me sirvio para profundizar lo que se de excel.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Laura</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p class="text-center">Excelente, calidad de profesionalismo. Me encanto!</p>
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
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Ejercicios Descargables y Tps</h5>
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
                        <br>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #007A6A;">Quiero más información</a>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-md-5" style="background: linear-gradient(90deg, #007a6a, #008c69 71%, #5e892b 100%);">
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5">
                    <div>
                        <p style="color: rgb(255,255,255);">Domina Microsoft Excel y certificate como Experto<br></p>
                        <h1 style="font-family: 'Raleway Black';color: rgb(255,255,255);">Clases en vivo</h1>
                        <p class="mt-5" style="color: rgb(255,255,255);">Reserva hoy tu cupo para las clases en vivo. <b>Se agotan rapido</b>.<br></p>
                        <p style="color: rgb(255,255,255);">Garantía de devolución de 7 días<br></p>
                        <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: normal;color: #ffffff;"><?= $precioCurso ?> <br></span><span class="texto-moneda-head" style="font-family: 'Raleway Black';font-weight: bold;color: #ffffff;"><?=$moneda?><br></span></p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #ffffff;color: #008b69;font-family: 'Raleway Bold';">Quiero estos cursos</a>
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