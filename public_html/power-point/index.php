<?php
$dirpage = '../';

$idcurso = 'powerpoint';
include("../a-includes/funcionsDB.php");
include("../a-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$precioCursoOficial = '$' . intval(($value / $curso['PORCENTAJE_DES']) * 100) . ' ARS';
$precioCurso = '$' . $value . ' ARS';

// SEO
$seo_title = 'Curso de PowerPoint Online con Certificado | Presentaciones Profesionales';
$seo_description = 'Curso de PowerPoint online. Crea presentaciones profesionales e impactantes. Certificado oficial, acceso de por vida. Líderes en capacitaciones laborales.';
$seo_keywords = 'curso powerpoint, powerpoint online, crear presentaciones, curso powerpoint certificado, presentaciones profesionales, capacitaciones laborales, microsoft powerpoint';
$seo_slug = 'power-point';
$seo_og_title = 'Curso de PowerPoint Online con Certificado | Aprende Excel';
$seo_image = 'https://aprende-excel.com/n-img/powerpoint4.jpeg';
$seo_structured_data = json_encode([
    "@context" => "https://schema.org",
    "@type" => "Course",
    "name" => "PowerPoint",
    "description" => "Crea presentaciones profesionales e impactantes. Curso online con certificado oficial.",
    "provider" => ["@type" => "Organization", "name" => "Aprende Excel", "url" => "https://aprende-excel.com"],
    "url" => "https://aprende-excel.com/power-point/",
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

<body>
    <?php include('../a-pages/body.php'); ?>
    <header style="background-color:#FF5718;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 col-sm-6 col-6 logo">
                    <a href="../" target="_blank"><img src="../a-img/logowhite.png" alt="logo" class="img-fluid"> </a>
                </div>
                <div class="col-md-3 hdphone">
                    <p></p>
                </div>
                <div class="col-md-3 hdphone">
                </div>
                <div class="col-md-1 gr-logo"></div>
                <div class="col-md-3 cta-button  col-sm-6 col-6">
                    <a class="hvr-sweep-to-right text-white" href="checkout.php">Inscribirme</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Website Sections -->
    <!-- Top Product Banner -->
    <section class="top-product">
        <div class="container">
            <div class="row">
                <div class="col-md-5" style="">
                    <div class="">
                        <img src="img/power-point.jpg" class="img-fluid" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6">
                    <div class="section-heading">
                        <h3 style="color:black;">Dominá Power Point en profundidad</h3>
                        <h2 class="mt-4" style=""><b>Curso online nivel completo </b></h2>
                    </div>
                    <div class="feature-list mt-4">
                        <ul style="">
                            <li class="wow fadeIn   animated" data-wow-delay="0.1" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;"><i class="fas fa-check text-success "></i> 3hs de video paso a paso</li>
                            <li class="wow fadeIn animated" data-wow-delay="0.2" style="visibility: visible;-webkit-animation-delay: 0.2; -moz-animation-delay: 0.2; animation-delay: 0.2;"> <i class="fas fa-check text-success "></i> Acceso para siempre al curso</li>
                            <li class="wow fadeIn animated" data-wow-delay="0.3" style="visibility: visible;"><i class="fas fa-check text-success "></i> Otorgamos Certificado Oficial</li>
                            <li class="wow fadeIn animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;"><i class="fas fa-check text-success "></i> Estudialo desde tu PC, notebook, tablet o Celular</li>
                        </ul>
                        <h3 class="bg-success text-white mt-md-4 font-weight-bold p-2 mt-3 col-8 col-md-6 text-center"><strike><?= $precioCursoOficial ?></strike><span> <?= $precioCurso ?></span></h3>

                    </div>
                    <div class="call-button mt-5">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated " data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Lo quiero</a>
                            </div>
                            <div class="col-md-6 payments">
                                <img src="../a-img/payments.jpg" class="img-fluid wow flipInX animated pt-md-2 " data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            </div>
                        </div>
                    </div>
                    <div class="review-one mt-5">
                        <div class="review-text">
                            <h5>"Lo recomiendo el profesor explica muy bien"</h5>
                        </div>
                        <div class="review-image">
                            <p class="user_name d-inline">Carlos Ferro <i class="ml-3 fa fa-star" style="color:#ffd322;"></i>
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
    <div class="py-5 text-center mt-5 pt-5" style="background-color:#FF5718;">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-12">
                    <h3 class="text-white display-4">Dominá Power Point en profundidad</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 align-items-center d-flex" style="">
        <div class="container">
            <div class="row">
                <div class="col-md-9 px-md-5 mx-auto" style="">
                    <p class="lead mb-4">A través de este curso vas a aprender a dominar Microsoft Power Point a un nivel completo, consiguiendo dominar la mayoría de sus funciones generales y avanzadas de esta herramienta. Explicado paso a paso en 3 horas de videos.<br></p>
                    <hr>
                    <p class="lead" style=""> No requiere requisitos, ideal para principiantes que comienzan desde 0<br></p>
                    <div class="call-button mt-5">
                        <div class="row justify-content-md-cen">
                            <div class="col-md-5">
                                <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg" data-wow-delay="0.2s">Inscribirme</a>
                            </div>
                        </div>
                        <div class="rating-user d-inline"><br>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                        </div>
                        <p class="user_name d-inline pl-4 pr-4">+800 Estudiantes</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="py-5 text-white" style="background-color:#FF5718;">
        <div class="container ">
            <div class="row mx-auto">
                <div class="col-lg-5 col-md-6 p-md-4   mx-0 px-0 "> <img class="img-fluid d-block img-thumbnail rounded shadow  " src="img/power-point2.png" width="1500"> </div>
                <div class="col-md-6 offset-lg-1 d-flex flex-column justify-content-center py-4">
                    <h2 class="my-3 mx-auto mx-md-1 mt-5 mt-md-1"> <b>Vas a aprender:</b></h2>
                    <ul class="mx-auto mx-md-1">
                        <li><i class="fas fa-check text-success "></i> Destacar en tu trabajo, estudios y carrera realizando las mejores presentaciones en Power Point</li>
                        <li><i class="fas fa-check text-success "></i> Crear presentaciones de alto impacto</li>
                        <li><i class="fas fa-check text-success "></i> Todas las funciones que brinda Power Point</li>
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
                            <h4 class="font-weight-bold">Certificado</h4>
                            <p class="mb-0">Obtené tu Certificado Oficial para adjuntar a tu CV</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/soporte.jpg" width="150">
                            <h4 class="font-weight-bold">Soporte </h4>
                            <p class="mb-0">Te ayudamos con todas tus dudas</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/acceso.jpg" width="150">
                            <h4 class="font-weight-bold">Acceso de por vida</h4>
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
                    <h1 class="font-weight-bold">Lo que dicen nuestros alumnos/as</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 p-4 text-center">
                    <div class="review-image text-center mt-3 mb-3">

                    </div>
                    <p class="mb-3"><i>" </i>Excelente presentaciones<i>"</i> </p>
                    <p class="mb-1"> <b>Flor Martinez</b></p>
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
                    <p class="mb-3">"Aprendí muchisimo lo recomiento 100%</p>
                    <p class="mb-1"> <b>Juan Ventura</b></p>
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
                    <p class="mb-3">"El profesor es muy bueno explicando y ya pude practicar todo lo explicado en el curso" </p>
                    <p class="mb-1"> <b>Micaela Romero</b></p>
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
                    <p class="mb-3">"La sencillez del profesor es genial, lo recomiendo"</p>
                    <p class="mb-1"> <b>Matias Prieto</b></p>
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
                <h2 class="mt-2 mb-1 pb-3 text-dark"><i class="fa fa-question-circle" aria-hidden="true">&nbsp;</i>Preguntas Frecuentes&nbsp;</h2>
            </div>
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
                        <div class="card-body">No necesitas conocimientos en Power Point, lo unico que se requiere es tener instalado el programa Microsoft Power Point</div>
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
            <div class="call-button mt-5">
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg" data-wow-delay="0.2s">Acceder al curso</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="ch">
        <div class="container">
            <div class="section-heading ">
                <h2 class="mt-2 mb-1 pb-3 text-dark"><i class="fa fa-question-circle" aria-hidden="true">&nbsp;</i>Preguntas Frecuentes&nbsp;</h2>
            </div>
            <div class="accordion mt-4" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0" style=""><button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo tengo?</button></h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                        <div class="card-body">¡De por vida! Una vez que abones vas a tener acceso para siempre. Lo vas a poder descargar en tu PC, Notebook, Tablet o celular.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header " id="headingTwo">
                        <h5 class="mb-0 " style=""><button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto tiempo tardo en terminarlo?</button></h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                        <div class="card-body">3 hs de videos es la duración total del curso.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan Soporte?</button></h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                        <div class="card-body">Sí, damos soporte 24/7. Podés consultar cualquier duda en nuestro e-mail o Whatsapp..</div>
                    </div>
                </div>
                <div class="card text-left">
                    <div class="card-header " id="headingFour">
                        <h5 class="mb-0" style="">
                            <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">#4 ¿Incluye Certificado o Diploma?</button></h5>
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
                        <div class="card-body">No necesitas conocimientos en Power Point, lo unico que se requiere es tener instalado el programa Microsoft Power Point</div>
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
            <div class="call-button mt-5">
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <a href="checkout.php" class="sc-roll hvr-sweep-to-top  wow flipInX animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">lo quiero&nbsp;👉</a>
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
                        <img src="img/power-point-2.jpg" class="img-fluid" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6" style="">
                    <div class="section-heading">
                        <h3>
                        </h3>
                        <h2 class="font-weight-bold text-left">Dominá Power Point en profundidad</h2>
                    </div>
                    <div class="feature-list mt-4">
                        <p> • Pago por única vez (sin suscripciones ni pagos mensuales). <br>• Garantía de devolución de 7 días</p>
                        <h3 class="bg-success text-white mt-md-4 font-weight-bold p-2 mt-3 col-8 col-md-6 text-center"><strike><?= $precioCursoOficial ?></strike><span> <?= $precioCurso ?></span></h3>
                    </div>
                    <div class="call-button mt-5">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Lo quiero</a>
                            </div>
                            <div class="col-md-6 payments">
                                <img src="../a-img/paymentsgris.jpg" class="img-fluid wow flipInX animated animated" data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
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