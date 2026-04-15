<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dirpage = '../';
$titulo = 'Domina SQL Server';

/*

$idcurso = 'sql';

include($dirpage . "n-includes/funcionsDB.php");
include($dirpage . "n-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$porcentaje = $curso['PORCENTAJE_DES'];
$precioCursoOficial = $simbolo . ' ' . convertirPrecio($value + intval(($value / $porcentaje) * 100), $moneda);
$precioCurso = $simbolo . ' ' . convertirPrecio($value, $moneda);
$urlCheckout = './checkout.php';

*/
  $value = 'ddd';
  $porcentaje = 'ddd';
  $precioCursoOficial = 'ddd';
  $precioCurso = 'ddd';
  $urlCheckout = 'ddd';
 
?>

<!DOCTYPE html>
<html lang="es">
<head >
        <?php include('../n-pages/head.php') ?>
        <link rel="stylesheet" href="assets/css/styles.css">
        <style>
                @media only screen and (max-width: 900px) {
	                .deco-header{
			            width: 50%;
		            }
                }
        </style>
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php
        $headerImagen = "assets/img/banner-cvi.png";
        include('../n-pages/header.php')
        ?>
        <section>
            <div class="row">
                <div class="col-md-7 px-5 ">
                    <img class="d-block d-md-none img-fluid mb-4" style="border-radius: 10px;" src="assets/img/imagen-header.png" width="100%">
                    <h5 class="texto-header">4.9/5&nbsp;<i class="fa fa-star" style="color: #F7AC3B;"></i>&nbsp;Basado en 15.000 estudiantes</h5>
                    <h1 style="font-family: 'Raleway Black'; color:#00173B;">Dominá Programación C#</h1>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Transformate en un profesional del siglo 21</h5>

                    <div class="d-block d-md-none mt-3">
                        <h5 style="color: #00173B;font-family: 'Raleway SemiBold';">
                            <img src="../n-assets/img/imagen-porcentaje.png" style="width: 30px;">&nbsp;Oferta limitada
                        </h5>
                        <p class="d-flex align-items-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #000;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #000;"><?=$moneda?><br></span></p>
                        <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> <?=$moneda?></strike></p>
                        <p class="text-center">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #a311d5;width: 100%; color:#fff"><b>Lo quiero</b></a>
                        </p>

                        <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';"> Aprender a programar en el lenguaje C# puede generar un gran impacto en tu carrera. Es uno de los lenguajes más utilizados en el mundo de los videos juegos. Industria que está en auge. ¡Aprendé ya!.</p>
                        <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';">La programación informática es el arte del proceso por el cual se limpia, codifica, traza y protege el código fuente de programas computacionales, en otras palabras, es indicarle a la computadora lo que tiene que hacer</p>

                        <ul class="lista-header pl-3" style="list-style-type: none;">
                            <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;7 horas de vídeo bajo demanda<br></li>
                            <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;20 clases<br></li>
                            <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;Acceso de por vida<br></li>
                            <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;Acceso en dispositivos móviles y TV<br></li>
                            <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;Certificado Internacional<br></li>
                        </ul>
                        <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #FFE6ED;">
                            <img src="assets/img/logo-verde-calidad.png" style="width: 50px;">
                            <p class="ml-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                        </div>
                    </div>

                    <img class="d-none d-md-block img-fluid mt-2" src="assets/img/c.jpg" width="auto">

                    <p class="d-none d-md-block mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Aprender a programar en el lenguaje C# puede generar un gran impacto en tu carrera. Es uno de los lenguajes más utilizados en el mundo de los videos juegos. Industria que está en auge. ¡Aprendé ya!.</p>
                    <p class="d-none d-md-block mb-4" style="color: #555555;font-family: 'Raleway Regular';">C# es un lenguaje de programación orientado a objetos orientado a componentes. C# proporciona construcciones de lenguaje para admitir directamente estos conceptos, por lo que se trata de un lenguaje natural en el que crear y usar componentes de software.</p>

                    <a href="<?= $urlCheckout ?>" class="d-none d-md-block btn btn-primary px-5" style="background: #a311d5; color:#fff"><b>Lo quiero</b></a>
                    <p class="my-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>

                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Convertite en un Programador con nuestro método dinámico y simple</h5>

                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Nuestro curso de Programación C# garantiza total satisfacción y aprendizaje.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-1.png">&nbsp; 7 horas de contenido para verlos donde y cuando quieras.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-2.png">&nbsp; Acceso al curso y al soporte de por vida con un único pago.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-3.png">&nbsp; Certificado internacional y Garantía de 100% de satisfacción.</p>
                    <img class="d-none d-md-block img-fluid" src="assets/img/banner-c.png" width="100%">
                    <img class="d-block d-md-none img-fluid" src="assets/img/banner-2-movil.png" width="100%">
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Nuestro curso está valorado en <b><?= $precioCursoOficial ?></b> 
                        pero puede ser tuyo con esta oferta limitada por sólo: </p>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-radius: 10px;background: #ffffff;border: 1px solid #bcbcbc ;">
                        <div class="col m-0">
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #000;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #000;"><?=$moneda?><br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> <?=$moneda?></strike></p>
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
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Programación DESDE CERO con C# utilizando Visual Studio 2019<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Aprenderás una sólida base de C# y podrás aplicarla a todos tus proyectos.
                            <br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Aprenderás Variables. Estructuras de Control, Sintaxis, Funciones y Bucles.
                            <br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Empezar a trabajar a nivel profesional en el sector de programación con C# .NET y Visual Studio
                            <br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Tipos de datos.
                            <br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Estructuras Secuenciales 
                            <br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp; Estructuras Algorítmicas Condicionales Simples 
                            <br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Estructuras Algorítmicas Condicionales Múltiples 
                            <br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Modularidad y Encapsulamiento 
                            <br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Objetivos y Clases. Herencia y Excepciones y mucho más.
                            <br></li>
                        <li>Requsitos:<br>
                            Necesitás una PC o Notebook con  el framework Visual Studio instalado. NO REQUIERE CONOCIMIENTOS PREVIOS</li>
                    </ul>
                    <div class="p-4 mt-5" style="background: url(&quot;assets/img/bannerprueba.png&quot;) no-repeat;background-size: cover;font-size: 0.8em; border-radius: 10px;">
                        <p style="color: rgb(255,255,255);font-family: 'Raleway Bold';font-size: 1.2em;">Serás el especialista que las empresas están buscando</p>
                        <p style="color: rgb(255,255,255);">Abre tus puertas a nuevas oportunidades. Aprendé Programación C# en solo 12 horas y con soporte 24/7&nbsp;</p>
                        <p style="color: rgb(255,255,255);">Más de 15.500 estudiantes recomiendan nuestra academia</p>
                        <p style="font-size: 1.4em;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                    </div>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Aprender a programar desde casa nunca ha sido tan simple</h5>
                    <div class="row mt-3">
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                <img class="icono-csa" src="assets/img/icon-certificado.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Certificado Internacional</h5>
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
                                <p class="ml-3" style="font-size: 0.7em;">Aprendé a tu ritmo y cuando quieras</p>
                            </div>
                        </div>
                    </div>
                    <div class="stop-card-madre row">
                        
                    </div>
                </div>
                <div class="d-none d-md-block col-md-5 position-relative">
                    <div class="card-madre px-3 py-4 mr-5" style="position: fixed; border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div class="col">
                            <h5 style="color: #00173B;font-family: 'Raleway SemiBold';"><img src="../n-assets/img/imagen-porcentaje.png" style="width: 50px;">&nbsp;Oferta limitada</h5>
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #000;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #000;"><?=$moneda?><br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> <?=$moneda?></strike></p>
                            <p class="text-center">
                                <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #a311d5;width: 80%;"><b>Lo quiero</b></a>
                            </p>
                            <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;7 horas de vídeo bajo demanda<br></li>
                                <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;20 clases<br></li>
                                <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;Acceso de por vida<br></li>
                                <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;Acceso en dispositivos móviles y TV<br></li>
                                <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;Certificado internacional<br></li>
                            </ul>
                            <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #a311d5;">
                                <img src="assets/img/logo-verde-calidad.png" style="width: 50px;">
                                <p class="ml-2" style="font-size: 0.7em; color: #FFFFFF;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div >
           
            <div class="stop-card-madre row ">
                    <div class="col m-0 p-md-5">
                        <h1 style="">Certificación Internacional</h1>
                            <img class="img-fluid" src="assets/img/certificado-internacional-excel.png">
                            <img class="img-fluid" src="assets/img/excel-certificacion-internacional.jpg">
                        </div>
                        
                    </div>

        
                
            <div class="row mt-5" style="background: url(&quot;assets/img/banner2prueba.png&quot;);background-size: cover;">
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
                                                <p style="font-size: 0.7em;text-align: left;">"Es un curso muy didáctico Adecuado para mis necesidad de conocimiento y poder realizarlo de acuerdo a los tiempos de cada uno"</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Matías Latorre</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"La verdad que el curso es muy completo, está bien explicado, detallado, es exelente y sobre todo para todo tipo de edad. Esperando el segundo nivel, muchas gracias por brindar estos cursos. Lo recomiendo."</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Ruth Beron</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Me anote en este curso por que no tenia ni idea de programación y los videos de youtube no me ayudaban o estaban incompletos. Muy recomendado. Excelente."</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Lau Martino</h5>
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
                                                <p style="font-size: 0.7em;text-align: left;">"Es muy dinámica la explicación y mas fácil de lo que pensaba. Gracias."</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Monica Garcia</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Me resultó muy didáctico, a pesar de mis pocos conocimientos. Lo pude hacer entre mi trabajo y horas libres en mi casa. Me entusiasma a realizar cosas nuevas en la parte laboral. Por ser una persona grande, 😂nunca es tarde para hacerlo, porque lo que no entiendes, Lo frenas escuchas y vuelves a escuchar al profesor. Gracias fue muy lindo!!!."</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Mariant Mendoza</h5>
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
                                <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo
                                        tengo?</button></h5>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                <div class="card-body"> ¡De por vida! Una vez que abones vas a tener acceso para siempre.</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto tiempo tardo en
                                        terminarlo?</button></h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                                <div class="card-body">7hs de video es la duración total del curso.</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan
                                        soporte?</button></h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                                <div class="card-body">Sí, damos soporte 24/7. Podés consultar cualquier duda en nuestro e-mail o Whatsapp.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0" style="">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">#4 ¿Incluye Certificación o Diploma?</button></h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                                <div class="card-body">Una vez termines el curso podés solicitarnos el certificado internacional.</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h5 class="mb-0" style="">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">#5 ¿Qué requisitos tiene?</button></h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                                <div class="card-body">No requiere conocimientos previos. Sólo necesitás una PC o Notebook con el Visual estudio. Si no lo tenés, dentro del curso te enseñamos cómo descargarlo</div>
                            </div>
                        </div>

                    </div>
                    <h2 class=" text-dark text-center mt-5 pb-3 pt-3" style="font-family: 'Raleway Black';">¿Querés conocer el temario completo?</h2>
                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="">👉 Click acá para ver el temario</button></h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="">
                            <div class="card-body">

                                <ul style="font-size: 11px;">
                                    <p class="lead"> Temario</p>
                                    <li>Clase 1 – Introducción – ¿Qué es Microsoft  .NET? Lenguaje C# – Entorno Visual Studio </li>
                                    <li>Clase 2 – Creando Primer Proyecto (Consola – Formulario)</li>
                                    <li>Clase 3 – Tipo de Datos – Conversión de tipos</li>
                                    <li>Clase 4 – Comentarios, Variables, Métodos, Campos Instrucciones</li>
                                    <li>Clase 5 – Interface Gráfica (Formularios Windows)</li>
                                    <li>Clase 6 – Propiedades, Eventos y delegados, Atributos.</li>
                                    <li>Clase 7 – Estructuras Secuenciales I </li>
                                    <li>Clase 8 – Estructuras Secuenciales II </li>
                                    <li>Clase 9 – Estructuras Algorítmicas Condicionales Simples I (Operadores de Comparación)</li>
                                    <li>Clase 10 – Estructuras Algorítmicas Condicionales Simples II (Operadores Lógicos) </li>
                                    <li>Clase 11 – Estructuras Algorítmicas Condicionales Múltiples</li>
                                    <li>Clase 12 – Estructuras Repetitivas I </li>
                                    <li>Clase 13 – Estructuras Repetitivas II </li>
                                    <li>Clase 14 – Estructuras Repetitivas III </li>
                                    <li>Clase 15 – Modularidad y Encapsulamiento</li>
                                    <li>Clase 16 – Objetivos y Clases </li>
                                    <li>Clase 17 – Herencia </li>
                                    <li>Clase 18 – Excepciones</li>
                                    <li>Clase 19 – Arreglos Unidimensionales (Vectores) </li>
                                    <li>Clase 20 – Arreglos Bidimensionales (Matrices)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-0 mt-md-5 px-3">
                <div class="col-md-2 offset-md-1 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;">
                            <img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-1.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">7hs de contenido</h5>
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
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Certificado de&nbsp;internacional</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;">
                            <img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-4.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Online </h5>
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
                        <h4 style="font-family: 'Raleway Black';">Cientos de alumnos de todo el país han aprendido con nuestro Curso Online a programar C# para mejorar sus oportunidades.</h4>
                        <p>Estamos tan seguros de que te va a gustar que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #a311d5; color:#fff;"><b>Quiero este curso</b></a>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-md-5" style="background-image: url(assets/img/bannerfooter.png);
                 background-repeat: no-repeat;
                 background-size: cover;
                 background-position: center;">

                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center p-5">
                    <img class="img-fluid" src="assets/img/laptop.png">
                </div>
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5">
                    <div>
                        <p style="color: rgb(255,255,255);">Convertite en un profesional del  Siglo XXI<br></p>
                        <h1 style="font-family: 'Raleway Black';color: rgb(255,255,255);">Adquirí un conocimiento clave en 7hs</h1>
                        <p class="mt-5" style="color: rgb(255,255,255);">Accede hoy y obtén este  curso de por vida. Pago por única vez (sin suscripciones ni pagos mensuales).<br></p>
                        <p style="color: rgb(255,255,255);">Garantía de devolución de 7 días<br></p>
                        <p class="d-xl-flex align-items-xl-center m-0">
                            <span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: normal;color: #fff;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Black';font-weight: bold;color: #fff;"><?=$moneda?><br></span></p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #fff200;color: #Ffff;font-family: 'Raleway Bold';">Lo quiero</a>
                    </div>
                </div>
            </div>
        </section>
        <?php include('../n-pages/footer-cursos.php') ?>
    </body>
</html>