<?php
$dirpage = '../';

$idcurso = 'project_inicial';
include("../a-includes/funcionsDB.php");
include("../a-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$precioCursoOficial = $simbolo . ' ' . convertirPrecio(intval(($value / $curso['PORCENTAJE_DES']) * 100), $moneda);
$precioCurso = $simbolo . ' ' . convertirPrecio($value, $moneda);

// SEO
$seo_title = 'Curso de Microsoft Project Inicial Online con Certificado | Gestión de Proyectos';
$seo_description = 'Curso de Microsoft Project Inicial online. Aprende gestión de proyectos desde cero con certificado oficial. Líderes en capacitaciones laborales y educación online.';
$seo_keywords = 'curso microsoft project, project management online, gestión de proyectos, microsoft project certificado, project inicial, capacitaciones laborales';
$seo_slug = 'microsoft-project-inicial';
$seo_og_title = 'Curso de Microsoft Project Inicial Online | Aprende Excel';
$seo_image = 'https://aprende-excel.com/n-img/msproject4.jpeg';
$seo_structured_data = json_encode([
    "@context" => "https://schema.org",
    "@type" => "Course",
    "name" => "Microsoft Project Inicial",
    "description" => "Gestión de proyectos con Microsoft Project. Nivel inicial con certificado oficial.",
    "provider" => ["@type" => "Organization", "name" => "Aprende Excel", "url" => "https://aprende-excel.com"],
    "url" => "https://aprende-excel.com/microsoft-project-inicial/",
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
    <?php include('../a-pages/header.php')?>
</head>

<body style="font-family: montserrat_regular">
    <?php include('../a-pages/body.php'); ?>
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 col-sm-6 col-6 logo">
                    <a href="../" target="_blank"><img src="../a-img/logojpg.jpg" alt="logo" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-3 hdphone">
                    <p> Aprendé a distancia</p>
                </div>
                <div class="col-md-3 hdphone">
                    <img src="../a-img/securityjpg.jpg" alt="security" class="img-fluid">
                </div>
                <div class="col-md-3 cta-button  col-sm-6 col-6">
                    <a class="hvr-sweep-to-right" href="checkout.php">Lo quiero</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Website Sections -->
    <!-- Top Product Banner -->
    <section class="top-product pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5" style="">
                    <div class="product-img  ">
                        <img src="img/microsoft-project-top.jpg" class="img-fluid" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6">
                    <div class="  mt-md-4 mt-0">
                        <h5 style="color:black;" class="mb-0 pb-0">Desarrollate en puestos Gerenciales</h5>
                        <div class="rating-user d-inline mt-0 pt-0" style="color:#ffd322;"><br>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p class="user_name d-inline pl-2 pr-4">+15.500 estudiantes</p>

                        <h1 class="text-left mt-5" style="font-family: montserrat_bold">Aprendé a dominar Microsoft Project</h1>
                    </div>
                    <div class="feature-list mt- mt-md-2">
                        <ul style="">
                            <li class="wow fadeIn" data-wow-delay="0.1" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> 3 horas de video bajo demanda</li>
                            <li class="wow fadeIn animated " data-wow-delay="0.2" style="visibility: visible;-webkit-animation-delay: 0.2; -moz-animation-delay: 0.2; animation-delay: 0.2;">
                                <i class="fas fa-check text-success "></i> Acceso de por vida</li>

                            <li class="wow fadeIn animated  " data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;">
                                <i class="fas fa-check text-success "></i> Acceso en dispositivos móviles y Tv</li>
                            <li class="wow fadeIn animated  " data-wow-delay="0.3" style="visibility: visible;"><i class="fas fa-check text-success "></i> Certificado de participación</li>
                            <div class="">

                                <a class="fas fa-check text-success " href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">&nbsp;&nbsp;Ver temario completo</a>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="">
                                    <!-- div class="card-body" -->

                                    <ul>
                                        <p class="lead"> Temario</p>
                                        <li class=”mt-1”> <b> Módulo 1 </b> - Introducción a Microsoft Project </li>
                                        <ol>
                                            <li class=”mt-1”> <b> Clase 1 </b> - Nociones Básicas de Manejo de Microsoft Project </li>
                                        </ol>
                                        <li class=”mt-1”> <b> Módulo 2 </b> - Creación de un nuevo plan de Proyecto </li>
                                        <ol>
                                            <li class=”mt-1”> <b> Clase 2 </b> - Información del proyecto </li>
                                            <li class=”mt-1”> <b> Clase 3 </b> - Calendario laboral </li>
                                        </ol>
                                        <li class=”mt-1”> <b> Módulo 3 </b> - Creación de lista de Tareas </li>
                                        <ol>
                                            <li class=”mt-1”> <b> Clase 4 </b> - Modo de tarea </b> - Nombre de Tarea </b> - Duración de Tarea
                                            </li>
                                            <li class=”mt-1”> <b> Clase 5 </b> - Fecha de Comienzo </b> - Fecha Fin </b> - Relación entre tareas (predecesoras) </li>
                                        </ol>
                                        <li class=”mt-1”> <b> Módulo 4 </b> - Tipos de Tareas </li>
                                        <ol>
                                            <li class=”mt-1”> <b> Clase 6 </b> - Estructura de Trabajo </b> - Tarea resumen del proyecto </b>
                                                - Tarea </b> - Fases </li>
                                            <li class=”mt-1”> <b> Clase 7 </b> - Subfases </b> - Hitos </li>
                                        </ol>

                                        <li class=”mt-1”> <b> Módulo 5 </b> - Recursos </li>
                                        <ol>
                                            <li class=”mt-1”> <b> Clase 8 </b> - Recursos de Trabajo Personas -Equipamientos </li>
                                            <li class=”mt-1”> <b> Clase 9 </b> - Recursos de Trabajo Materiales </b> - Asignación Básica </li>
                                        </ol>
                                        <li class=”mt-1”> <b> Módulo 6 </b> - Seguimiento de Progreso de Tareas </li>
                                        <ol>
                                            <li class=”mt-1”> <b> Clase 10 </b> - Escalas de Tiempo Clase </li>
                                            <li class=”mt-1”> <b> Clase 11 </b> - Ruta Crítica </b> - Linea Base </li>
                                            <li class=”mt-1”> <b> Clase 12 </b> - Avance Previsto de Tareas </li>
                                            <li class=”mt-1”> <b> Clase 13 </b> - Avance Real de Tareas </li>
                                        </ol>
                                        <li class=”mt-1”> <b> Módulo 7 </b> - Configuración e Impresión de Vistas en Project </li>
                                        <ol>
                                            <li class=”mt-1”> <b> Clase 14 </b> - Vistas de Diagrama de Gantt y Gantt de Seguimiento </li>
                                        </ol>
                                    </ul>
                                    <!-- /div -->
                                </div>
                            </div>



                            <h3 class="bg-success text-white font-weight-bold p-2 mt-3 col-8 col-md-6 text-center">
                                <strike><?=  $precioCursoOficial ?></strike><span> <?=  $precioCurso ?></span></h3>
                        </ul>
                    </div>
                    <div class="call-button mt-5">
                        <div class="row">
                            <div class="col-md-6 ">
                                <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated shadow" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Quiero
                  este curso</a>
                            </div>
                            <div class="col-md-6 payments">
                                <img src="../a-img/payments.jpg" class="img-fluid wow flipInX  animated" data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            </div>
                        </div>
                    </div>
                    <div class="review-one mt-5">
                        <div class="review-text">
                            <p class="lead">"Excelente para aprender a planificar proyectos!"</p>
                        </div>
                        <div class="review-image">

                            <p class="user_name d-inline  font-weight-bold">Cristian Bermudez <i class="fa fa-star pl-1 " style="color:#ffd322;"></i>
                                <i class="fa fa-star " style="color:#ffd322;"></i>
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

    <div class="py-5 align-items-center d-flex bg-success text-white" style="">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-9 px-md-5" style="">
                    <h1 class="display-4 mb-4 " style="font-family: montserrat_bold">Escalá a puestos gerenciales.</h1>
                    <p class="lead mb-4">A través de éste curso explicado paso a paso en 3 horas de videos, vas a aprender los conocimientos necesarios para dominar esta poderosa plataforma, para que puedas alcanzar y desarrollarte en puestos de gerencia y coordinación.<br></p>
                    <hr>
                    <p class="" style="font-size: 18px;"> <b>Microsoft Project</b> es un software de administración de proyectos y programas desarrollado y comercializado por Microsoft para asistir a administradores de en el desarrollo de planes, asignación de recursos a tareas, dar seguimiento
                        al progreso, administrar presupuesto y analizar cargas de trabajo.</b><br></p>
                    <div class="call-button mt-5">
                        <div class="row justify-content-md-cen">
                            <div class="col-md-3">
                                <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg" data-wow-delay="0.2s">Lo
                  quiero</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="py-5 my-5" style="">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 p-md-4 "> <img class="img-fluid d-block img-thumbnail" src="img/curso-microsoft-project-nivel1-medio.jpg" width="1500"> </div>
                        <div class="col-md-6 offset-lg-1 d-flex flex-column justify-content-center py-4">
                            <h1 class="text-left mb-4 font-weight-bold mt-4" style="font-family: montserrat_bold">Vas a aprender</h1>

                            <ul>
                                <li><i class="fas fa-check text-success "></i> Creación de un plan de Proyecto</li>
                                <li><i class="fas fa-check text-success "></i> Creación de lista de Tareas</li>
                                <li><i class="fas fa-check text-success "></i> Recursos</li>
                                <li><i class="fas fa-check text-success "></i> Seguimiento de Progreso de Tareas</li>
                                <li><i class="fas fa-check text-success "></i> Vistas de Diagrama de Gantt y Gantt de Seguimiento</li>
                                <li class="mt-4"> • No requiere conocimientos previos</li>
                            </ul>
                            <div class="review-count  wow fadeIn  animated" data-wow-delay="1.2s" style="visibility: visible;-webkit-animation-delay: 1.2s; -moz-animation-delay: 1.2s; animation-delay: 1.2s;">
                                <div class="rating-user d-inline" style="color:#ffd322;"><br>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="user_name d-inline pl-2 pr-4">+15.500 estudiantes</p>
                            </div>
                            <div class="call-button mt-5">
                                <div class="row justify-content-md-cen">
                                    <div class="col-8">
                                        <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg" data-wow-delay="0.2s">Inscribirme al curso</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="py-5 text-center my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mb-3 font-weight-bold" style="font-family: montserrat_bold">¡Capacitate en casa!</h1>
                    <p class="lead"> Alcanzá una versión mejorada de vos adquiriendo un conocimiento de por vida y que además abre cientos de puertas laborales</p>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-3">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/certificado.jpg" width="150">
                            <h3 style="font-family: montserrat_bold">Certificado</h3>
                            <p class="mb-0 lead">Te otorgamos Certificado Oficial cuando termines el curso.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/soporte.jpg" width="150">
                            <h3 style="font-family: montserrat_bold">Soporte </h3>
                            <p class="mb-0 lead">Te ayudamos con todas tus dudas</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/acceso.jpg" width="150">
                            <h3 style="font-family: montserrat_bold">Acceso de por vida</h3>
                            <p class="mb-0 lead">¡Te queda para siempre!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-5 bg-success text-white" style="" id=" ">
        <div class="container my-3">
            <div class="row">
                <div class="text-center mx-auto col-md-12">
                    <h1 class="font-weight-bold  mb-md-5" style="font-family: montserrat_bold">Lo que dicen nuestros alumnos/as
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 p-4 text-center">
                    <div class="review-image text-center mt-3 mb-3">
                        <!--   <img src="img/reviews/1.png" alt="review" class="d-inline">-->
                    </div>
                    <p class="mb-3"><i>"</i>Es un curso muy didáctico Adecuado para mis necesidad de conocimiento y poder realizarlo de acuerdo a los tiempos de cada uno<i>"</i> </p>
                    <p class="mb-1"> <b>Matias Latorre</b></p>
                    <div class="rating-user d-inline" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 p-4 text-center">
                    <div class="review-image text-center mt-3 mb-3">
                        <!-- <img src="img/reviews/6.png" alt="review" class="d-inline">-->
                    </div>
                    <p class="mb-3">"super práctico, ya estoy gestionando de forma mas eficiente"&nbsp;&nbsp;</p>
                    <p class="mb-1"> <b>Zunilda Cuevas</b></p>
                    <div class="rating-user d-inline" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                </div>
                <div class="col-lg-4 p-4 text-center">
                    <div class="review-image text-center mt-3 mb-3">
                        <!--  <img src="img/reviews/4.png" alt="review" class="d-inline">-->
                    </div>
                    <p class="mb-3">"Excelente y ideal para gestionar proyectos" </p>
                    <p class="mb-1"> <b>Gisela Fernandez</b></p>
                    <div class="rating-user d-inline" style="color:#ffd322;">
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
                        <!--    <img src="img/reviews/3.png" alt="review" class="d-inline">-->
                    </div>
                    <p class="mb-3">"El profesor transmite muy bien la información. Recibí capacitaciones en el trabajo de MS Project pero este curso se hace entender mejor."</p>
                    <p class="mb-1"> <b>Lourdes Sandoval</b></p>
                    <div class="rating-user d-inline" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 p-4 text-center">
                    <div class="review-image text-center mt-3 mb-3">
                        <!-- <img src="img/reviews/2.png" alt="review" class="d-inline">-->
                    </div>
                    <p class="mb-3">"Me gustó mucho el curso, me pareció didáctico, y claro. Voy a hacer el siguiente."</p>
                    <p class="mb-1"> <b>Maria Victoria</b></p>
                    <div class="rating-user d-inline" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-lg-4 p-4 text-center">
                    <div class="review-image text-center mt-3 mb-3">
                        <!-- <img src="img/reviews/5.png" alt="review" class="d-inline">-->
                    </div>
                    <p class="mb-3"> <i>"Muy buenas las explicaciones, bastante entendíble. Respondieron mis dudas en el día."</i> </p>
                    <p class="mb-1"><b>Hernan Vielo</b></p>
                    <div class="rating-user d-inline" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="call-button mt-5 text-center mx-auto">
                        <div class="row justify-content-md-cen">
                            <div class="col-md-3 mx-auto">
                                <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow  flipInX shadow-lg" data-wow-delay="0.2s">Inscribirme</a>
                            </div>
                        </div>
                        <div class="rating-user d-inline" style="color:#ffd322;"><br>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p class="user_name d-inline pl-4 pr-4">+15.500 estudiantes</p>
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
                <h2 class="mt-2 mb-1 pb-3 text-dark" style="font-family: montserrat_bold"><i class="fa fa-question-circle" aria-hidden="true">&nbsp;</i>Preguntas Frecuentes&nbsp;</h2>
            </div>
            <div class="accordion mt-4" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo
                tengo?</button></h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                        <div class="card-body"> ¡De por vida! Una vez que abones vas a tener acceso para siempre. Lo vas a poder descargar en tu PC, notebook, tablet o celular.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto tiempo tardo en
                terminarlo?</button></h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                        <div class="card-body">3hs de video es la duración total del curso.</div>
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
                        <div class="card-body">Una vez termines el curso podés solicitarnos gratis la Certificado de Cursado.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0" style="">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">#5 ¿Qué requisitos tiene?</button></h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                        <div class="card-body">No requiere conocimientos previos. Sólo necesitás una PC o Notebook con el Project instalado. Si no tenés Project, dentro del curso te enseñamos cómo descargarlo gratis</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h5 class="mb-0" style="">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">#6 ¿Cuál es el temario completo?</button></h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="">
                        <div class="card-body">

                            <ul class="ist-unstyled">
                                <p class="lead"> Temario</p>
                                <li class=”mt-1”> <b> Módulo 1 </b> - Introducción a Microsoft Project </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 1 </b> - Nociones Básicas de Manejo de Microsoft Project </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 2 </b> - Creación de un nuevo plan de Proyecto </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 2 </b> - Información del proyecto </li>
                                    <li class=”mt-1”> <b> Clase 3 </b> - Calendario laboral </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 3 </b> - Creación de lista de Tareas </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 4 </b> - Modo de tarea </b> - Nombre de Tarea </b> - Duración de Tarea
                                    </li>
                                    <li class=”mt-1”> <b> Clase 5 </b> - Fecha de Comienzo </b> - Fecha Fin </b> - Relación entre tareas (predecesoras) </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 4 </b> - Tipos de Tareas </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 6 </b> - Estructura de Trabajo </b> - Tarea resumen del proyecto </b> - Tarea </b> - Fases </li>
                                    <li class=”mt-1”> <b> Clase 7 </b> - Subfases </b> - Hitos </li>
                                </ol>

                                <li class=”mt-1”> <b> Módulo 5 </b> - Recursos </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 8 </b> - Recursos de Trabajo Personas -Equipamientos </li>
                                    <li class=”mt-1”> <b> Clase 9 </b> - Recursos de Trabajo Materiales </b> - Asignación Básica </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 6 </b> - Seguimiento de Progreso de Tareas </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 10 </b> - Escalas de Tiempo Clase </li>
                                    <li class=”mt-1”> <b> Clase 11 </b> - Ruta Crítica </b> - Linea Base </li>
                                    <li class=”mt-1”> <b> Clase 12 </b> - Avance Previsto de Tareas </li>
                                    <li class=”mt-1”> <b> Clase 13 </b> - Avance Real de Tareas </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 7 </b> - Configuración e Impresión de Vistas en Project </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 14 </b> - Vistas de Diagrama de Gantt y Gantt de Seguimiento </li>
                                </ol>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="call-button mt-5">
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg" data-wow-delay="0.2s">Quiero
              anotarme</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="ch">
        <div class="container">
            <div class="text-center ">
                <h2 class="mt-2 mb-1 text-dark" style="font-family: montserrat_bold"><i class="fa fa-question-circle" aria-hidden="true">&nbsp;</i>Preguntas Frecuentes&nbsp;</h2>
            </div>
            <div class="accordion mt-4" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0" style=""><button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo
                tengo?</button></h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                        <div class="card-body">¡De por vida! Una vez que abones vas a tener acceso para siempre. Lo vas a poder descargar en tu PC, notebook, tablet o celular.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header " id="headingTwo">
                        <h5 class="mb-0 " style=""><button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto tiempo tardo en
                terminarlo?</button></h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                        <div class="card-body">3hs de videos es la duración total del curso.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan
                soporte?</button></h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                        <div class="card-body">Sí, damos soporte 24/7. Podes consultar cualquier duda en nuestro e-mail o Whatsapp.
                        </div>
                    </div>
                </div>
                <div class="card  text-left">
                    <div class="card-header text-left" id="headingFour">
                        <h5 class="mb-0" style="">
                            <button class="btn btn-link  text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">#4 ¿Incluye Certificado o Diploma?</button></h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                        <div class="card-body">Una vez termines el curso podes solicitarnos gratis la Certificado de Cursado.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header  text-left" id="headingFive">
                        <h5 class="mb-0  text-left" style="">
                            <button class="btn btn-link  text-left" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">#5 ¿Qué requisitos tiene?</button></h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                        <div class="card-body">No requiere conocimientos previos. Sólo necesitás una PC o Notebook con el Project instalado. Si no tenes Project, dentro del curso te enseñamos cómo descargarlo gratis.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header  text-left" id="headingSix">
                        <h5 class="mb-0  text-left" style="">
                            <button class="btn btn-link  text-left" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">#6 ¿Cuál es el temario completo?</button></h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="">
                        <div class="card-body">

                            <ul class="ist-unstyled">
                                <p class="lead"> Temario</p>
                                <li class=”mt-1”> <b> Módulo 1 </b> - Introducción a Microsoft Project </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 1 </b> - Nociones Básicas de Manejo de Microsoft Project </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 2 </b> - Creación de un nuevo plan de Proyecto </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 2 </b> - Información del proyecto </li>
                                    <li class=”mt-1”> <b> Clase 3 </b> - Calendario laboral </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 3 </b> - Creación de lista de Tareas </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 4 </b> - Modo de tarea </b> - Nombre de Tarea </b> - Duración de Tarea
                                    </li>
                                    <li class=”mt-1”> <b> Clase 5 </b> - Fecha de Comienzo </b> - Fecha Fin </b> - Relación entre tareas (predecesoras) </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 4 </b> - Tipos de Tareas </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 6 </b> - Estructura de Trabajo </b> - Tarea resumen del proyecto </b> - Tarea </b> - Fases </li>
                                    <li class=”mt-1”> <b> Clase 7 </b> - Subfases </b> - Hitos </li>
                                </ol>

                                <li class=”mt-1”> <b> Módulo 5 </b> - Recursos </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 8 </b> - Recursos de Trabajo Personas -Equipamientos </li>
                                    <li class=”mt-1”> <b> Clase 9 </b> - Recursos de Trabajo Materiales </b> - Asignación Básica </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 6 </b> - Seguimiento de Progreso de Tareas </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 10 </b> - Escalas de Tiempo Clase </li>
                                    <li class=”mt-1”> <b> Clase 11 </b> - Ruta Crítica </b> - Linea Base </li>
                                    <li class=”mt-1”> <b> Clase 12 </b> - Avance Previsto de Tareas </li>
                                    <li class=”mt-1”> <b> Clase 13 </b> - Avance Real de Tareas </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 7 </b> - Configuración e Impresión de Vistas en Project </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 14 </b> - Vistas de Diagrama de Gantt y Gantt de Seguimiento </li>
                                </ol>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="call-button mt-5">
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <a href="checkout.php" class="sc-roll hvr-sweep-to-top  wow flipInX animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">lo
              quiero&nbsp;👉</a>
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
                    <div class="product-img    ">
                        <img src="img/microsoft-project-bottom.jpg" class="img-fluid" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6" style="">
                    <div class=" ">
                        <h3>
                        </h3>
                        <h1 class="display-5" style="font-family: montserrat_bold">Adquirí un conocimiento clave en 3hs</h1>
                    </div>
                    <div class="feature-list mt-4 lead">
                        <p> • Accedé hoy y tenelo de por vida. Pago por única vez (sin suscripciones ni pagos mensuales). <br>• Garantía de devolución de 7 días</p>
                        <h3 class="bg-success text-white font-weight-bold p-2 mt-3 col-8 col-md-6 text-center">
                            <strike><?=  $precioCursoOficial ?></strike><span style="font-family: montserrat_bold"> <?=  $precioCurso ?></span></h3>
                    </div>
                    <div class="call-button mt-5">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated  " data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Quiero este curso</a>
                            </div>
                            <div class="col-md-6 payments">
                                <img src="../a-img/paymentsgris.jpg" class="img-fluid wow flipInX animated  " data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
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