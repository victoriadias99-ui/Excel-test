<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dirpage = '../';
$titulo = 'Petróleo';

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

// SEO
$seo_title = 'Curso de Petróleo y Gas Online con Certificado | Industria Petrolera';
$seo_description = 'Curso de Petróleo y Gas online. Aprende sobre la industria petrolera con certificado oficial. Capacitaciones laborales especializadas.';
$seo_keywords = 'curso petróleo, industria petrolera, petróleo y gas online, capacitaciones laborales petróleo, curso petrolero certificado';
$seo_slug = 'petroleo';
$seo_og_title = 'Curso de Petróleo y Gas Online | Aprende Excel';
$seo_image = 'https://aprende-excel.com/n-img/petroleo4.jpeg';
$seo_structured_data = json_encode([
    "@context" => "https://schema.org",
    "@type" => "Course",
    "name" => "Petróleo y Gas",
    "description" => "Curso sobre industria petrolera. Certificado oficial.",
    "provider" => ["@type" => "Organization", "name" => "Aprende Excel", "url" => "https://aprende-excel.com"],
    "url" => "https://aprende-excel.com/petroleo/",
    "educationalLevel" => "Beginner",
    "inLanguage" => "es",
    "aggregateRating" => ["@type" => "AggregateRating", "ratingValue" => "4.9", "reviewCount" => "15000", "bestRating" => "5"],
    "offers" => ["@type" => "Offer", "category" => "Paid", "availability" => "https://schema.org/InStock"]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

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
        $headerImagen = "assets/img/headerPetro.png";
        include('../n-pages/header.php')
        ?>
        <section>
            <div class="row">
                <div class="col-md-7 px-5 ">
                    
                    <h5 class="texto-header">4.9/5&nbsp;<i class="fa fa-star" style="color: #F7AC3B;"></i>&nbsp;Basado en 15.000 estudiantes</h5>
                    <h1 style="font-family: 'Raleway Black'; color:#00173B;">Curso de Introducción al Petróleo y Gas</h1>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Transformate en un profesional del siglo 21</h5>
                    <img class="d-block d-md-none img-fluid" style="border-radius: 10px;" src="assets/img/petro1.jpg" width="100%">
                    <div class="d-block d-md-none mt-3">
                        <h5 style="color: #00173B;font-family: 'Raleway SemiBold';">
                            <img src="../n-assets/img/imagen-porcentaje.png" style="width: 30px;">&nbsp;Oferta limitada
                        </h5>
                        <p class="d-flex align-items-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #000;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #000;"><?=$moneda?><br></span></p>
                        <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> <?=$moneda?></strike></p>
                        <p class="text-center">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #fe7608;width: 100%; color:#FFFFFF"><b>Lo quiero</b></a>
                        </p>
                        
                        <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';"> Alguna vez te preguntaste ¿Qué es el petróleo? Bueno...</p>
                        <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';">La palabra petróleo proviene del latín "petroleum", que significa "aceite de piedra". En sí es un aceite mineral natural, constituido por una mezcla de hidrocarburos y otros elementos, en menor cantidad.
                            Su definición científica es: “conjunto de compuestos químicos complejos cuya composición principal es Hidrógeno (hidro) y Carbono (carburo).
                            </p>

                        <ul class="lista-header pl-3" style="list-style-type: none;">
                            <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;2.5 horas de vídeo bajo demanda<br></li>
                            <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;7 clases<br></li>
                            <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;Acceso de por vida<br></li>
                            <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;Acceso en dispositivos móviles y TV<br></li>
                            <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;Certificado Internacional<br></li>
                        </ul>
                        <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px; background-color: #d34b01;">
                            <img src="assets/img/logo-amarillo-calidad.png" media=""style="width: 50px;">
                            <p class="ml-2" style="font-size: 0.7em; color: #FFFFFF;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                        </div>
                    </div>

                    <img class="d-none d-md-block img-fluid mt-2" src="assets/img/petro1.jpg" width="auto">

                    <p class="d-none d-md-block mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';"><b>Alguna vez te preguntaste ¿Qué es el petróleo? Bueno...</b></p>
                    <p class="d-none d-md-block mb-4" style="color: #555555;font-family: 'Raleway Regular';">La palabra petróleo proviene del latín "petroleum", que significa "aceite de piedra". En sí es un aceite mineral natural, constituido por una mezcla de hidrocarburos y otros elementos, en menor cantidad.
                        Su definición científica es: “conjunto de compuestos químicos complejos cuya composición principal es Hidrógeno (hidro) y Carbono (carburo).</p>

                    <a href="<?= $urlCheckout ?>" class="d-none d-md-block btn btn-primary px-5" style="background-color: #d34b01; color:#FFFFFFF"><b>Lo quiero</b></a>
                    <p class="my-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>

                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Aprendé sobre el petróleo con nuestro método dinámico y simple</h5>

                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Nuestro curso de Petróleo garantiza total satisfacción y aprendizaje.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-1.png">&nbsp; 2.5 horas de contenido para verlos donde y cuando quieras.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-2.png">&nbsp; Acceso al curso y al soporte de por vida con un único pago.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-3.png">&nbsp; Certificado internacional y Garantía de 100% de satisfacción.</p>
                    <p></p>
                    <img class="d-none d-md-block img-fluid" src="assets/img/gentePetro.png" width="100%">
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
                        <li><i class="fa fa-check" style="color: #d34b01;"></i>&nbsp;¿Qué es el petóleo?
                            <br></li>
                        <li><i class="fa fa-check" style="color: #d34b01;"></i>&nbsp;Etapas del Petroleo
                            <br></li>
                        <li><i class="fa fa-check" style="color: #d34b01;"></i>&nbsp;Perforación
                            <br></li>
                            <li><i class="fa fa-check" style="color: #d34b01;"></i>&nbsp;Refinación
                            <br>
                        </li>    
                        
                    </ul>

                    <div class="p-4 mt-5" style="background: url(&quot;assets/img/aprenderasPetro.png&quot;) no-repeat;background-size: cover;font-size: 0.8em; border-radius: 10px;">
                        <p style="color: rgb(255,255,255);font-family: 'Raleway Bold';font-size: 1.2em;">Serás el especialista que las empresas están buscando</p>
                        <p style="color: rgb(255,255,255);">Abre tus puertas a nuevas oportunidades. Aprenderás las bases del petróleo en solo 2.5 horas&nbsp;</p>
                        <p style="color: rgb(255,255,255);">Más de 15.500 estudiantes recomiendan nuestra academia</p>
                        <p style="font-size: 1.4em;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                    </div>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Aprender sobre este hidrocarburo desde casa nunca ha sido tan simple</h5>
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
                    
                </div>

                <div class="d-none d-md-block col-md-5 position-relative">
                    <div class="card-madre px-3 py-4 mr-5" style="position: fixed; border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div class="col">
                            <h5 style="color: #00173B;font-family: 'Raleway SemiBold';"><img src="../n-assets/img/imagen-porcentaje.png" style="width: 50px;">&nbsp;Oferta limitada</h5>
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #000;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #000;"><?=$moneda?><br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> <?=$moneda?></strike></p>
                            <p class="text-center">
                                <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #fe7608;width: 80%;"><b>Lo quiero</b></a>
                            </p>
                            <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;2.5 horas de vídeo bajo demanda<br></li>
                                <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;7 clases<br></li>
                                <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;Acceso de por vida<br></li>
                                <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;Acceso en dispositivos móviles y TV<br></li>
                                <li><i class="fa fa-check" style="color: #C6343D;"></i>&nbsp;Certificado internacional<br></li>
                            </ul>
                            <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #fe7608;">
                                <img src="assets/img/logo-verde-calidad.png" style="width: 50px;">
                                <p class="ml-2" style="font-size: 0.7em; color: #FFFFFF;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div >
           
        

            <div class="stop-card-madre row mt-5 mt-3 p-5 px-md-5" style="background: url(&quot;assets/img/MedioPetro.png&quot;);background-size: cover;">
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
                                                <p style="font-size: 0.7em;text-align: left;">Me anote en este curso por que siempre me intereso el tema de los hidrocarburos. Excelente curso. Pude despejar muchas dudas.</p>
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
                                <div class="card-body">2.5hs de video es la duración total del curso.</div>
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
                                <div class="card-body">No requiere conocimientos previos. Sólo necesitás una PC o Notebook.</div>
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

                                <ul>
                                <style>
                @media only screen and (max-width: 900px) {
	                ul.li{
			           font-size: 80%;
		            }
                }
        </style>
                                    <p class="lead"> Temario</p>
                                    <li >Clase 1 - Introducción al Petroleo</li>
                                    <li>Clase 2 -  Etapas del Petroleo</li>
                                    <li>Clase 3 - Perforación</li>
                                    <li>Clase 4 - Perforación 2 </li>
                                    <li>Clase 5 - Producción</li>
                                    <li>Clase 6 - Producción 2</li>
                                    <li>Clase 7 - Refinación</li>

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
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">2.5hs de contenido</h5>
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
                        <h4 style="font-family: 'Raleway Black';">Cientos de alumnos de todo el país han aprendido los principios básicos sobre este hidrocarburo para mejorar sus oportunidades.</h4>
                        <p>Estamos tan seguros de que te va a gustar que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #d34b01; color:#fff;"><b>Quiero este curso</b></a>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-md-5" style="background-image: url(assets/img/footerPetro.png);
                 background-repeat: no-repeat;
                 background-size: cover;
                 background-position: center;">

                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center p-5">
                    <img class="img-fluid" src="assets/img/petroLaptop.png">
                </div>
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5">
                    <div>
                        <p style="color: rgb(255,255,255);">Convertite en un profesional del  Siglo XXI<br></p>
                        <h1 style="font-family: 'Raleway Black';color: rgb(255,255,255);">Adquirí un conocimiento clave en 2.5hs</h1>
                        <p class="mt-5" style="color: rgb(255,255,255);">Accede hoy y obtén este  curso de por vida. Pago por única vez (sin suscripciones ni pagos mensuales).<br></p>
                        <p style="color: rgb(255,255,255);">Garantía de devolución de 7 días<br></p>
                        <p class="d-xl-flex align-items-xl-center m-0">
                            <span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: normal;color: #fff;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Black';font-weight: bold;color: #fff;"><?=$moneda?><br></span></p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #FFFFFF;color: #d34b01;font-family: 'Raleway Bold';">Lo quiero</a>
                    </div>
                </div>
            </div>
        </section>
        <?php include('../n-pages/footer-cursos.php') ?>
    </body>
</html>