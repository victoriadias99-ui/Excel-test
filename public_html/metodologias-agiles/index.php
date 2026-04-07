<?php
$dirpage = '../';
$idcurso = 'metodologia_agil';
include("../a-includes/funcionsDB.php");
include("../a-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$precioCursoOficial = '$' . intval(($value / $curso['PORCENTAJE_DES']) * 100) . ' ARS';
$precioCurso = '$' . $value . ' ARS';

// SEO
$seo_title = 'Curso de Metodologías Ágiles Online con Certificado | Scrum y Gestión de Proyectos';
$seo_description = 'Curso de Metodologías Ágiles online. Aprende Scrum, Kanban y gestión de proyectos con certificado oficial. Líderes en capacitaciones laborales y educación online.';
$seo_keywords = 'curso metodologías ágiles, scrum online, gestión de proyectos, curso scrum certificado, kanban, agile, capacitaciones laborales, project management';
$seo_slug = 'metodologias-agiles';
$seo_og_title = 'Curso de Metodologías Ágiles Online | Scrum | Aprende Excel';
$seo_image = 'https://aprende-excel.com/n-img/agile4.jpeg';
$seo_structured_data = json_encode([
    "@context" => "https://schema.org",
    "@type" => "Course",
    "name" => "Metodologías Ágiles",
    "description" => "Aprende Scrum, Kanban y gestión de proyectos con certificado oficial.",
    "provider" => ["@type" => "Organization", "name" => "Aprende Excel", "url" => "https://aprende-excel.com"],
    "url" => "https://aprende-excel.com/metodologias-agiles/",
    "educationalLevel" => "Beginner",
    "inLanguage" => "es",
    "aggregateRating" => ["@type" => "AggregateRating", "ratingValue" => "4.9", "reviewCount" => "15000", "bestRating" => "5"],
    "offers" => ["@type" => "Offer", "category" => "Paid", "availability" => "https://schema.org/InStock"]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Aprende Excel - Cursos Online</title>
        <?php include('../a-pages/header.php') ?>
    </head>

    <body style="font-family: montserrat_regular;">
        <?php include('../a-pages/body.php'); ?>
        <header>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-2 col-sm-6 col-6 logo">
                        <a href="https://aprende-excel.com/" target="_blank"><img src="img/LogoAE.png" alt="logo" class="img-fluid"> </a>
                    </div>
                    <div class="col-md-3 hdphone">
                        <p> Aprendé a distancia</p>
                    </div>
                    <div class="col-md-3 hdphone">
                        <img src="img/securityjpg.jpg" alt="security" class="img-fluid">
                    </div>
                    <div class="col-md-3 cta-button  col-sm-6 col-6">
                        <a class="hvr-sweep-to-right" href="checkout.php">Lo quiero</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Website Sections -->
        <!-- Top Product Banner -->
        <section class="top-product  bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-5" style="">
                        <div class=" py-auto">
                            <img src="img/ma.png" class="img-fluid my-auto py-auto align-items-center justify-content-center pt-5 pt-md-5 mt-md-5" alt="curso de power bi">
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp;</div>
                    <div class="col-md-6">
                        <div class="section-heading ">
                            <h3 style="color:black;">Curso online a distancia</h3>
                            <h1 class="mt-4 text-left border-0" style="	text-shadow: 0px 0px 1px black;"><b>APRENDÉ METODOLOGÍAS ÁGILES</b><span style="font-family: montserrat_black ;">!</span></h1>
                        </div>
                        <div class="feature-list mt-4">
                            <ul class="font-weight-light" style="font-family: montserrat_light ;">
                                <li class="wow fadeIn animated animated animated animated" data-wow-delay="0.1" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;"><i class="fas fa-check-circle text-dark"></i> + 29 clases paso a paso!</li>
                                <li class="wow fadeIn animated animated animated animated" data-wow-delay="0.2" style="visibility: visible;-webkit-animation-delay: 0.2; -moz-animation-delay: 0.2; animation-delay: 0.2;"> <i class="fas fa-check-circle text-dark"></i> Acceso para siempre al curso</li>
                                <li class="wow fadeIn animated animated animated animated" data-wow-delay="0.2" style="visibility: visible;-webkit-animation-delay: 0.2; -moz-animation-delay: 0.2; animation-delay: 0.2;"> <i class="fas fa-check-circle text-dark"></i> Ayuda de los profesores online </li>
                                <li class="wow fadeIn animated animated animated animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;"><i class="fas fa-check-circle text-dark"></i> Otorgamos Certificado Oficial</li>
                                <li class="wow fadeIn animated animated animated animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;"><i class="fas fa-check-circle text-dark"></i> Estudialo desde tu PC, notebook, tablet o Celular</li>
                            </ul>
                            <h3 class="mt-md-4 p-2 mt-3 col-8 col-md-6 text-center" style="	background-color: #f3c910;	color: black;	font-family: montserrat_regular;"><strike>$3.999</strike><span class="font-weight-bold "> $1497</span></h3>
                            <p style="font-family: montserrat_bold">Aprende Excel es una empresa Argentina. Éste precio es final y en Pesos Argentinos</p>
                        </div>
                        <div class="call-button mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="checkout.php" class="hvr-sweep-to-top wow flipInX animated shadow bg-info text-light animated animated animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Lo quiero</a>
                                </div>
                                <div class="col-md-6 payments">
                                    <img src="img/security.png" class="img-fluid wow flipInX animated pt-md-2  animated animated animated" data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                </div>
                            </div>
                        </div>
                        <div class="review-one mt-5 mt-md-3">
                            <div class="review-text">
                                <h5 style="font-family: montserrat_regular" class="font-weight-light">"Excelente curso. Practico, sencillo y facil de seguir"</h5>
                            </div>
                            <div class="review-image">
                                <p class="user_name d-inline" style="font-family: montserrat_bold;">Julian Martinez<i class="ml-3 fa fa-star" style="color:#ffd322;"></i>
                                    <i class="fa fa-star" style="color:#ffd322;"></i>
                                    <i class="fa fa-star" style="color:#ffd322;"></i>
                                    <i class="fa fa-star" style="color:#ffd322;"></i>
                                    <i class="fa fa-star" style="color:#ffd322;"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- As Featured On Section -->
        <!-- Intro Section -->
        <div class="py-5 text-center mt-5 pt-5 bg-black" style="background-color:#23AFFA;">
            <div class="container">
                <div class="row">
                    <div class="mx-auto col-md-12">
                        <h1 style="font-family: montserrat_black" contenteditable="true" class="text-white">Convertite en un experto de las metodologías ágiles</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5 align-items-center d-flex" style="">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 px-md-5 mx-auto" style="">
                        <p class="font-weight-light lead mb-4"><b><span style="background-color: rgb(243, 201, 16); color: black; font-family: montserrat_bold;" class="p-1">Metodologías Ágiles.</span>&nbsp;Aprendé a gestionar proyectos innovadores usando <b>métodos</b> y herramientas del mundo <b>Agile</b>. Dominá la gestion en entornos complejos y utilizá prácticas&nbsp;<b>ágiles</b> en tus proyectos.</b></p>
                        <p class="lead mb-4" style="">A través de este curso conocerás los fundamentos de la metodología ágil, los diferentes roles, herramientas y las ceremonias de Scrum. Aprenderás cómo gestionar el backlog, planificar los sprints y organizar las retrospectivas. Esta metodología es aplicable cualquier ámbito de trabajo, y te permitirá una gestion eficiente de equipos multidisciplinarios. Explicado paso a paso en más de 29 clases por nuestro profesor.<br></p>
                        <hr>
                        <p class="lead" style="">¡Sin requisitos!<br></p>
                        <div class="call-button mt-5">
                            <div class="row justify-content-md-cen">
                                <div class="col-md-5">
                                    <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg text-white animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Inscribirme</a>
                                </div>
                            </div>
                            <div class="rating-user d-inline"><br>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half"></i>
                            </div>
                            <p class="user_name d-inline pl-4 pr-4 font-weight-light">+600 estudiantes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="py-5 bg text-white" style="background-color:#23AFFA">
            <div class="container ">
                <div class="row mx-auto">
                    <div class="col-lg-5 col-md-6 p-md-4   mx-0 px-0"> <img class="img-fluid d-block rounded shadow  " src="img/ma2.jpg" width="1500"> </div>
                    <div class="col-md-6 offset-lg-1 d-flex flex-column justify-content-center py-4">
                        <h2 class="my-3 mx-auto mx-md-1 mt-5 mt-md-1" style="font-family: montserrat_bold"> <b>Vas a aprender:</b></h2>
                        <ul class="mx-auto mx-md-1 lead">
                            <li class=""><i class="fas fa-check " style="color:#f3c910;"></i> ¿Qué es la agilidad? Historia</li>
                            <li><i class="fas fa-check  " style="color:#f3c910;"></i> Métodos Kanban, Scrum</li>
                            <li><i class="fas fa-check " style="color:#f3c910;"></i> Definiciones y Valores</li>
                            <li><i class="fas fa-check " style="color:#f3c910;"></i> Principios y sistemas de flujo</li>
                            <li><i class="fas fa-check  " style="color:#f3c910;"></i> Pilares teoricos de las metodologías ágiles</li>
                            <li><i class="fas fa-check  " style="color:#f3c910;"></i> Product backlog, los sprint, los eventos y mucho mas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-5 mb-5 pb-5 mt-5 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 p-3">
                        <div class="card">
                            <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/certificado.jpg" width="150">
                                <h4 class="font-weight-bold" style="font-family: montserrat_bold">Certificado</h4>
                                <p class="mb-0">Obtené tu Certificación Oficial para adjuntar a tu CV</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-3 col-md-6">
                        <div class="card">
                            <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/soporte.jpg" width="150">
                                <h4 class="font-weight-bold" style="font-family: montserrat_bold">Comunidad online</h4>
                                <p class="mb-0">Contamos con un espacio de intercambio de ideas y dudas entre estudiantes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-3 col-md-6">
                        <div class="card">
                            <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/acceso.jpg" width="150">
                                <h4 class="font-weight-bold" style="font-family: montserrat_bold">Acceso de por vida</h4>
                                <p class="mb-0">Te queda para siempre. Hacelo a tu ritmo y sin horarios</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5 bg-dark text-white" id="ch">
            <div class="container my-3">
                <div class="row">
                    <div class="text-center mx-auto col-md-12">
                        <h1 style="font-family: montserrat_bold">Lo que dicen nuestros alumnos/as</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 p-4 text-center">
                        <div class="review-image text-center mt-3 mb-3">
                        </div>
                        <p class="mb-3"><i></i>"Excelente curso de metodologías ágiles"<i></i> </p>
                        <p class="mb-1"> <b>Lara Barro</b></p>
                        <div class="rating-user d-inline">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-4 text-center">
                        <div class="review-image text-center mt-3 mb-3">
                        </div>
                        <p class="mb-3">"Muy buen curso. sencillo y bien explicado. Recomendado"&nbsp;&nbsp;</p>
                        <p class="mb-1"> <b>Martin Abalo</b></p>
                        <div class="rating-user d-inline">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                        </div>
                    </div>
                    <div class="col-lg-4 p-4 text-center">
                        <div class="review-image text-center mt-3 mb-3">
                        </div>
                        <p class="mb-3">"Es un curso que necesitaba. Me encanto este curso." </p>
                        <p class="mb-1"> <b>Anibal Caceres</b></p>
                        <div class="rating-user d-inline">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 p-4 text-center">
                        <div class="review-image text-center mt-3 mb-3">
                        </div>
                        <p class="mb-3">"Explica bien y bastante práctico"</p>
                        <p class="mb-1"> <b>Antonella Napoli</b></p>
                        <div class="rating-user d-inline">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-4 text-center">
                        <div class="review-image text-center mt-3 mb-3">
                        </div>
                        <p class="mb-3">"La verdad que por el precio es re completo, recomiendo!"</p>
                        <p class="mb-1"> <b>Barby Morichetti</b></p>
                        <div class="rating-user d-inline">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="col-lg-4 p-4 text-center">
                        <div class="review-image text-center mt-3 mb-3">
                        </div>
                        <p class="mb-3"> "Lo recomiendo sobre todo si entras al mundo Agile"</p>
                        <p class="mb-1"><b>Emiliano Furlan</b></p>
                        <div class="rating-user d-inline">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reviews Section -->
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p> </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ -->
        <section class="pt-5 pb-5" id="gr">
            <div class="container">
                <div class="section-heading text-center">
                    <h2 class="mt-2 mb-1 pb-3 text-dark " style="font-family: montserrat_bold"><i class="fa fa-question-circle" aria-hidden="true">&nbsp;</i>Preguntas Frecuentes&nbsp;</h2>
                </div>
                <div class="accordion mt-4" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo tengo?</button></h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                            <div class="card-body"> ¡De por vida! Una vez que abones vas a tener acceso para siempre a nuestro grupo privado de Facebook.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto dura el curso?</button></h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                            <div class="card-body">El curso de metodologías ágiles tiene una duracion de 2.5hs. Tenes accesos de por vida a los videos!</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Cual es el temario completo?</button></h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                            <div class="card-body">Clase 1 - Introducción a la agilidad HISTORIA</div>
                            <div class="card-body">Clase 1.2 - Introducción a la Agilidad - El Manifiesto Ágil</div>
                            <div class="card-body">Clase 1.3 - Introducción a la Agilidad Los principios de la agilidad</div>
                            <div class="card-body">Clase 1.4 - Introducción a la Agilidad - Resumen</div>
                            <div class="card-body">Clase 2.1 - KANBAN - Definición de KANBAN</div>
                            <div class="card-body">Clase 2.2 - Introducción a la agilidad - Valores - KANBAN</div>
                            <div class="card-body">Clase 2.3- KANBAN Los principios directores</div>
                            <div class="card-body">Clase 2.4 - Introducción a la agilidad - KANBAN</div>
                            <div class="card-body">Clase 2.5 - KANBAN - Descripción de los sistemas de flujo.</div>
                            <div class="card-body">Clase 2.6.1 - Las practicas generales</div>
                            <div class="card-body">Clase 2.6.2 -KANBAN Las practicas generales</div>
                            <div class="card-body">Clase 2.6.3 - Las prácticas generales de KANBAN</div>
                            <div class="card-body">Clase 3.1 - Introducción a la agilidad SCRUM Consideraciones</div>
                            <div class="card-body">Clase 3.2 - Introducción a SCRUM Definición de SCRUM</div>
                            <div class="card-body">Clase 3.3 Introducción a la agilidad - SCRUM La Teoría</div>
                            <div class="card-body">Clase 3.4 - Introducción a la agilidad 4 SCRUM Los Pilares</div>
                            <div class="card-body">Clase 3.5 - Introducción a la agilidad 5 SCRUM Los valores</div>
                            <div class="card-body">Clase 4.1 - El equipo SCRUM - 1 - Características</div>
                            <div class="card-body">Clase 4.2 - El equipo SCRUM - 2 - El rol de los Desarrolladores</div>
                            <div class="card-body">Clase 4.3 - El equipo SCRUM - 3 - El rol del Product Owner</div>
                            <div class="card-body">Clase 4.4 - El equipo SCRUM - 4 - El rol del Scrum Maste</div>
                            <div class="card-body">Clase 5.1 - Los eventos SCRUM - Características</div>
                            <div class="card-body">Clase 5.2 -Los eventos SCRUM - El contenedor Sprint</div>
                            <div class="card-body">Clase 5.3 - Los eventos SCRUM - La planificación del Sprint</div>
                            <div class="card-body">Clase 5.4 Los eventos SCRUM - El Scrum Diario</div>
                            <div class="card-body">Clase 5.5 Los eventos SCRUM - La revisión del Sprint</div>
                            <div class="card-body">Clase 5.6 - Los eventos SCRUM - La retrospectiva del Sprint</div>
                            <div class="card-body">Clase 6.1 - Los artefactos SCRUM - 1 - Características</div>
                            <div class="card-body">Clase 6.2 - Los artefactos SCRUM - 2 - El Product Backlog</div>
                            <div class="card-body">Clase 6.3 Los artefactos SCRUM - El Sprint Backlog</div>
                            <div class="card-body">Clase 6.4 - Los artefactos SCRUM - El Incremento</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">#4 ¿Incluye Certificación o Diploma?</button></h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                            <div class="card-body">Una vez termines el curso podés solicitarnos gratis el Certificado de Cursado.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">#5 ¿Qué requisitos tiene?</button></h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                            <div class="card-body" style="">No hay requisitos previos, este curso es para que te introduzcas en el mundo de las metodologías ágiles. Comenzas desde cero</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">#6 ¿Dan soporte?</button></h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                            <div class="card-body">Si damos soporte 24/7. Podés consultar cualquier duda en nuestro e-mail</div>
                        </div>
                    </div>
                    <div class="call-button mt-5">
                        <div class="row justify-content-md-center">
                            <div class="col-md-3">
                                <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow text-white animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Acceder al curso</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--TEMARIO -->
        <div class=" index2_services float_left pt-100 pb-100 " id="gr" style="background-color:#16A7FF">
            <div class="container align-items-center justify-content-center rounded py-5">
                <h2 class="text-center text-white pb-4 f-34" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0" style="text-shadow: 2px 2px 4px #333333;"> <i class="fas fa-lightbulb"></i> Mirá todo lo que vas a aprender</h2>
                <div class="row ">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12  mx-auto">
                        <div id="accordion" role="tablist ">
                            <div class="card">
                                <!-- Card Title -->
                                <div class="card_pagee py-4 shadow " role="tab" id="headingSix">
                                    <h5 class="h5-md text-center text-dark">
                                        <a data-toggle="collapse" href="#collapseSix" role="button" aria-expanded="true" aria-controls="collapseSix" class="py-4 text-dark"> Clickeame </a>
                                    </h5>
                                </div>
                                <!-- Card Content -->
                                <div id="collapseSix" class="collapse show" role="tabpanel" aria-labelledby="headingSix" data-parent="#accordion" style="">
                                    <div class="card-body">
                                        <div class=" show ">
                                            <br>
                                            <li>Clase 1 - Introducción a la agilidad HISTORIA</li>
                                            <li>Clase 1.2 - Introducción a la Agilidad - El Manifiesto Ágil</li>
                                            <li>Clase 1.3 - Introducción a la Agilidad Los principios de la agilidad</li>
                                            <li>Clase 1.4 - Introducción a la Agilidad - Resumen</li>
                                            <li>Clase 2.1 - KANBAN - Definición de KANBAN</li>
                                            <li>Clase 2.2 - Introducción a la agilidad - Valores - KANBAN</li>
                                            <li>Clase 2.3- KANBAN Los principios directores</li>
                                            <li>Clase 2.4 - Introducción a la agilidad - KANBAN</li>
                                            <li>Clase 2.5 - KANBAN - Descripción de los sistemas de flujo.</li>
                                            <li>Clase 2.6.1 - Las practicas generales</li>
                                            <li>Clase 2.6.2 -KANBAN Las practicas generales</li>
                                            <li>Clase 2.6.3 - Las prácticas generales de KANBAN</li>
                                            <li>Clase 3.1 - Introducción a la agilidad SCRUM Consideraciones</li>
                                            <li>Clase 3.2 - Introducción a SCRUM Definición de SCRUM</li>
                                            <li>Clase 3.3 Introducción a la agilidad - SCRUM La Teoría</li>
                                            <li>Clase 3.4 - Introducción a la agilidad 4 SCRUM Los Pilares</li>
                                            <li>Clase 3.5 - Introducción a la agilidad 5 SCRUM Los valores</li>
                                            <li>Clase 4.1 - El equipo SCRUM - 1 - Características</li>
                                            <li>Clase 4.2 - El equipo SCRUM - 2 - El rol de los Desarrolladores</li>
                                            <li>Clase 4.3 - El equipo SCRUM - 3 - El rol del Product Owner</li>
                                            <li>Clase 4.4 - El equipo SCRUM - 4 - El rol del Scrum Maste</li>
                                            <li>Clase 5.1 - Los eventos SCRUM - Características</li>
                                            <li>Clase 5.2 -Los eventos SCRUM - El contenedor Sprint</li>
                                            <li>Clase 5.3 - Los eventos SCRUM - La planificación del Sprint</li>
                                            <li>Clase 5.4 Los eventos SCRUM - El Scrum Diario</li>
                                            <li>Clase 5.5 Los eventos SCRUM - La revisión del Sprint</li>
                                            <li>Clase 5.6 - Los eventos SCRUM - La retrospectiva del Sprint</li>
                                            <li>Clase 6.1 - Los artefactos SCRUM - 1 - Características</li>
                                            <li>Clase 6.2 - Los artefactos SCRUM - 2 - El Product Backlog</li>
                                            <li>Clase 6.3 Los artefactos SCRUM - El Sprint Backlog</li>
                                            <li>Clase 6.4 - Los artefactos SCRUM - El Incremento</li>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          
        
        <section id="ch">
            <div class="container">
                <div class="section-heading ">
                    <h2 class="mt-2 mb-1 pb-3 text-dark" style="font-family: montserrat_bold"><i class="fa fa-question-circle" aria-hidden="true">&nbsp;</i>Preguntas Frecuentes&nbsp;</h2>
                </div>
                <div class="accordion mt-4" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0" style=""><button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo tengo o lo puedo descargar?</button></h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                            <div class="card-body">¡De por vida! Una vez que abones vas a tener acceso para siempre, vas a poder descargar el curso y verlo desde cualquier lugar sin conexión a internet.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header " id="headingTwo">
                            <h5 class="mb-0 " style=""><button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto dura el curso?</button></h5>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                            <div class="card-body"> Lo que vos decidas, + 45 clases para que hagas a tu ritmo y si decidís seguir practicando el curso no tiene FIN! ya que contamos con un espacio para que puedas conversar con alumnos y practicar ejercicios. </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan material práctico?</button></h5>
                        </div>
                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                            <div class="card-body">Sí! Además de brindarte tareas contamos con una comunidad en facebook donde vas a poder comunicarte con cualquier alumno para practicar</div>
                        </div>
                    </div>
                    <div class="card text-left">
                        <div class="card-header " id="headingFour">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">#4 ¿Incluye Certificado o Diploma?</button></h5>
                        </div>
                        <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                            <div class="card-body">Una vez termines el curso podés solicitarnos gratis el Certificado oficial de Cursado.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">#5 ¿Qué requisitos tiene?</button></h5>
                        </div>
                        <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                            <div class="card-body">No hay requisitos previos, este curso es para que comiences a estudiar inglés desde cero o refuerzes tus conocimientos!</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">#6 ¿Dan soporte?</button></h5>
                        </div>
                        <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                            <div class="card-body">Si damos soporte 24/7. Podés consultar cualquier duda en nuestro e-mail</div>
                        </div>
                    </div>
                </div>
                <!--TEMARIO -->
                <div class=" index2_services float_left pt-100 pb-100 " style="background-color:#d52d7a">
                    <div class="container align-items-center justify-content-center rounded py-5 bg-primary">
                        <h2 class="text-center text-white pb-4 f-34" data-aos-duration="600" data-aos="fade-down" data-aos-delay="0" style="text-shadow: 2px 2px 4px #333333;"> <i class="fas fa-lightbulb"></i> Mirá todo lo que vas a aprender</h2>
                        <div class="row ">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12  mx-auto">
                                <div id="accordion" role="tablist ">
                                    <div class="card">
                                        <!-- Card Title -->
                                        <div class="card_pagee py-4 shadow " role="tab" id="headingSix">
                                            <h5 class="h5-md text-center text-dark">
                                                <a data-toggle="collapse" href="#collapseSix" role="button" aria-expanded="true" aria-controls="collapseSix" class="py-4 text-dark"> Clickeame </a>
                                            </h5>
                                        </div>
                                        <!-- Card Content -->
                                        <div id="collapseSix" class="collapse show" role="tabpanel" aria-labelledby="headingSix" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <div class=" show ">
                                                    <br>
                                                    <li>Clase 1 - Introducción a la agilidad HISTORIA</li>
                                                    <li>Clase 1.2 - Introducción a la Agilidad - El Manifiesto Ágil</li>
                                                    <li>Clase 1.3 - Introducción a la Agilidad Los principios de la agilidad</li>
                                                    <li>Clase 1.4 - Introducción a la Agilidad - Resumen</li>
                                                    <li>Clase 2.1 - KANBAN - Definición de KANBAN</li>
                                                    <li>Clase 2.2 - Introducción a la agilidad - Valores - KANBAN</li>
                                                    <li>Clase 2.3- KANBAN Los principios directores</li>
                                                    <li>Clase 2.4 - Introducción a la agilidad - KANBAN</li>
                                                    <li>Clase 2.5 - KANBAN - Descripción de los sistemas de flujo.</li>
                                                    <li>Clase 2.6.1 - Las practicas generales</li>
                                                    <li>Clase 2.6.2 -KANBAN Las practicas generales</li>
                                                    <li>Clase 2.6.3 - Las prácticas generales de KANBAN</li>
                                                    <li>Clase 3.1 - Introducción a la agilidad SCRUM Consideraciones</li>
                                                    <li>Clase 3.2 - Introducción a SCRUM Definición de SCRUM</li>
                                                    <li>Clase 3.3 Introducción a la agilidad - SCRUM La Teoría</li>
                                                    <li>Clase 3.4 - Introducción a la agilidad 4 SCRUM Los Pilares</li>
                                                    <li>Clase 3.5 - Introducción a la agilidad 5 SCRUM Los valores</li>
                                                    <li>Clase 4.1 - El equipo SCRUM - 1 - Características</li>
                                                    <li>Clase 4.2 - El equipo SCRUM - 2 - El rol de los Desarrolladores</li>
                                                    <li>Clase 4.3 - El equipo SCRUM - 3 - El rol del Product Owner</li>
                                                    <li>Clase 4.4 - El equipo SCRUM - 4 - El rol del Scrum Maste</li>
                                                    <li>Clase 5.1 - Los eventos SCRUM - Características</li>
                                                    <li>Clase 5.2 -Los eventos SCRUM - El contenedor Sprint</li>
                                                    <li>Clase 5.3 - Los eventos SCRUM - La planificación del Sprint</li>
                                                    <li>Clase 5.4 Los eventos SCRUM - El Scrum Diario</li>
                                                    <li>Clase 5.5 Los eventos SCRUM - La revisión del Sprint</li>
                                                    <li>Clase 5.6 - Los eventos SCRUM - La retrospectiva del Sprint</li>
                                                    <li>Clase 6.1 - Los artefactos SCRUM - 1 - Características</li>
                                                    <li>Clase 6.2 - Los artefactos SCRUM - 2 - El Product Backlog</li>
                                                    <li>Clase 6.3 Los artefactos SCRUM - El Sprint Backlog</li>
                                                    <li>Clase 6.4 - Los artefactos SCRUM - El Incremento</li>
                                                    <br>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="call-button mt-5">
                    <div class="row justify-content-md-center">
                        <div class="col-md-3">
                            <a href="checkout.php" class="sc-roll hvr-sweep-to-top  wow flipInX animated text-dark animated animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Lo quiero </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Bottom Product -->
        <section class="bottom-product bg-light" style="">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="">
                            <img src="img/ma.png" class="img-fluid rounded shadow" alt="product">
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp;</div>
                    <div class="col-md-6" style="">
                        <div class="section-heading">
                            <h3>
                            </h3>
                            <h1 class="font-weight-bold" style="font-family: montserrat_black;">Aprende Metodologías Ágiles</h1>
                        </div>
                        <div class="feature-list mt-4">
                            <p> • Pago por única vez en Pesos Argentinos (sin suscripciones ni pagos mensuales). <br>• Garantía de devolución de 7 días</p>
                            <h3 class="mt-md-4 p-2 mt-3 col-8 col-md-6 text-center" style="background-color:#f3c910; color:black;font-family: montserrat_bold;"><strike>$3.999</strike><span class="font-weight-bold "> $1497</span></h3>
                        </div>
                        <div class="call-button mt-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated text-white shadow animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Inscribirme</a>
                                </div>
                                <div class="col-md-6 payments ">
                                    <img src="img/seguridad.png" class="img-fluid wow flipInX animated px-5 px-md-0 mt-md-0 mt-3  animated" data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <?php include('../a-pages/footer.php')?>
    </body>
</html>