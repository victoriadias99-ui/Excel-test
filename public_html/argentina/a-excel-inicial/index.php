<?php
$dirpage = '../';
if(isset($_GET)){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$idcurso = 'excel';
include("../a-includes/funcionsDB.php");
include("../a-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$precioCursoOficial = '$' . intval(($value / $curso['PORCENTAJE_DES']) * 100) . ' ARS';
$precioCurso = '$' . $value . ' ARS';

if(isset($_GET)){
    echo '<pre>';
    echo '</pre>';
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Aprende Excel - Cursos Online</title>
        <?php include('../a-pages/header.php')?>
    </head>
    <body style="font-family: montserrat_regular">
        <header>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-2 col-sm-6 col-6 logo">
                        <a href="../" target="_blank"><img src="../a-img/logojpg.jpg" alt="logo" class="img-fluid"> </a>
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
                            <img src="img/excelinicial.jpg" class="img-fluid" alt="product">
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp;</div>
                    <div class="col-md-6">
                        <div class="  mt-md-4 mt-0">
                            <h5 style="color:black;" class="mb-0 pb-0">Curso Online Excel Nivel Inicial</h5>
                            <div class="rating-user d-inline mt-0 pt-0" style="color:#ffd322;"><br>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <p class="user_name d-inline pl-2 pr-4">+15.500 estudiantes</p>

                            <h1 class="text-left mt-5" style="font-family: montserrat_bold">Abrí tus puertas en el mercado laboral</h1>
                        </div>
                        <div class="feature-list mt- mt-md-2">
                            <ul style="">
                                <h5>Aprende Excel en solo 3 horas con ejemplos reales y soporte siempre que lo necesites</h5>
                                <li class="wow fadeIn animated" data-wow-delay="0.1" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;"><i class="fas fa-check text-success "></i>Hacelo a tu propio ritmo, donde y cuando quieras</li>
                                <li class="wow fadeIn animated  animated" data-wow-delay="0.2" style="visibility: visible;-webkit-animation-delay: 0.2; -moz-animation-delay: 0.2; animation-delay: 0.2;"> <i class="fas fa-check text-success "></i>Consultá cualquier duda 24/7</li>

                                <li class="wow fadeIn animated   animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;"><i class="fas fa-check text-success "></i>Sin requisitos previos</li>
                                <li class="wow fadeIn animated   animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;"><i class="fas fa-check text-success "></i> Otorgamos Certificado Oficial </li>

                                <h2 class="text-dark font-weight-bold p-2 mt-3 col-8 col-md-6 text-center" style="">Antes: <strike style=""><?= $precioCursoOficial ?></strike></h2>
                                <h3 class="bg-success text-white font-weight-bold p-2 mt-3 col-8 col-md-6 text-center">Empezá por sólo<span> <?= $precioCurso ?></span></h3>
                                <p class="" style="">¡Oferta por tiempo limitado!</p>
                            </ul>
                        </div>
                        <div class="call-button mt-5">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated shadow animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Quiero este curso</a>
                                </div>
                                <div class="col-md-6 payments">
                                    <img src="../a-img/payments.jpg" class="img-fluid wow flipInX  animated animated" data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                </div>
                            </div>
                        </div>
                        <div class="review-one mt-5">
                            <div class="review-text">
                                <p class="lead">"Lo recomiendo para iniciarse en Excel. Toca todos los temas y además el profesor explica muy bien"</p>
                            </div>
                            <div class="review-image">

                                <p class="user_name d-inline  font-weight-bold">Miguel Galarza <i class="fa fa-star pl-1 " style="color:#ffd322;"></i>
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
                        <h1 class="display-4 mb-4 " style="font-family: montserrat_bold">¡Levante la mano quien&nbsp; no quiera mejorar su currículum!</h1>
                        <p class="lead mb-4">No es un secreto. Lo sabés. El mercado laboral se encuentra saturado. Las empresas reciben cientos de currículums cada vez que se abre una nueva vacante.
                            <br> Necesitás destacar, hacerlo diferente y sumar nuevas habilidades y destrezas.
                            <br><br>
                            <b> Domina la herramienta más solicitada por las empresas de todo el mundo.</b>
                            <br><br> Ya sea que estés buscando un ascenso dentro de tu trabajo, un nuevo empleo o quieras aprender una nueva herramienta, manejar Excel es indispensable para mejorar tus oportunidades.
                            <br><br> Sin embargo la mayoría de los métodos de enseñanza son aburridos.
                            <br><br> Horas y horas de teoría para que al final nos preguntemos: ¿Para qué perdí mi tiempo y mi dinero?

                        </p>
                        <hr>
                        <p class="" style="font-size: 18px;"> Más de un 80% de las empresas utilizan Excel para sus tareas, lo que lo convierte en <b>un conocimiento imprescindible para la inserción en el mercado laboral.</b><br></p>
                        <div class="call-button mt-5">
                            <div class="row justify-content-md-cen">
                                <div class="col-md-3">
                                    <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Lo quiero</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="py-5 text-center my-5" style="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="mb-3 font-weight-bold" style="font-family: montserrat_bold;">Aprende Excel con nuestro método de manera dinámica y simple</h1>
                        <p class="lead"> Ejemplos reales, desde un nivel inicial y con soporte cada vez que lo necesites... y sin requisitos previos.
                        </p>
                    </div>
                </div>
                <ul style="">
                    <li class="wow fadeIn animated  mb-2 mt-4 animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;">
                        <i class="fas fa-check text-success "></i> 3 horas de contenido para verlos donde y cuando quieras.
                    </li>
                    <li class="wow fadeIn animated   mb-2 animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;">
                        <i class="fas fa-check text-success "></i> Acceso al curso y al soporte de por vida con un único pago.

                    </li>
                    <li class="wow fadeIn animated   mb-2 animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;">
                        <i class="fas fa-check text-success "></i> Certificado y Garantía de 100% de satisfacción.
                    </li>
                </ul>
            </div>
        </div>
        <div class="py-5 text-center bg-success text-white my-5" style="">
            <div class="container">
                <p style="font-size: 18px;" class="font-weight-bold">Nuestro curso está valorado en <span class="h3 bold font-weight-bold"><?= $precioCursoOficial ?></span>, <br> pero puede ser tuyo con esta oferta limitada
                    <br><br> por sólo
                    <br>
                    <span class="h1 bold font-weight-bold" style="font-family: montserrat_bold;"><?= $precioCurso ?></span>
                </p>
                <div class="call-button mt-3  mx-auto text-center">
                    <div class="col-md-3  mx-auto text-center">
                        <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg animated animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Empezá ahora</a>
                    </div>
                </div>
                <p style="font-size: 18px;" class="font-weight-regular mt-3">Estamos tan seguros de que te va a gustar que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>
            </div>
        </div>
        <div class="row py-5 mx-auto text-center justify-content-center" style="">
            <div class="col-lg-4 col-md-6 p-4 text-center">
                <div class="review-image text-center mt-3 mb-3">
                </div>
                <p class="mb-3"><i>"</i>Me sirvió para reforzar varias cosas que me había olvidado por no usarlo, en mi caso trabajo como administrativa y me lo pagó la empresa para mejorar mis conocimientos.<i>"</i> </p>
                <p class="mb-1"> <b>Mercedes Canestari</b></p>
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
                </div>
                <p class="mb-3">"Explica en detalle y sin apuro, lo cuál me sirvió porque no soy muy entendido de la computadora. Recomiendo"&nbsp;&nbsp;</p>
                <p class="mb-1"> <b>Eduardo Artiaga</b></p>
                <div class="rating-user d-inline" style="color:#ffd322;">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                </div>
            </div>

        </div>

        <hr class="my-5">
        <h1 class="font-weight-bold my-5 text-center" style="font-family: montserrat_bold;">APRENDER EXCEL DESDE CASA NUNCA FUÉ TAN SIMPLE</h1>
        <div class="pb-5 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 p-3">
                        <div class="card">
                            <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/certificado.jpg" width="150">
                                <h3 style="font-family: montserrat_bold">Certificado</h3>
                                <p class="mb-0 lead">
                                    Adquirí una Certificado para sumar a tu Curriculum
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-3 col-md-6">
                        <div class="card">
                            <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/soporte.jpg" width="150">
                                <h3 style="font-family: montserrat_bold">Soporte </h3>
                                <p class="mb-0 lead">Obtené soporte siempre que lo necesites</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-3 col-md-6">
                        <div class="card">
                            <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/acceso.jpg" width="150">
                                <h3 style="font-family: montserrat_bold">Acceso de por vida</h3>
                                <p class="mb-0 lead">Aprendé a tu ritmo y cuando quieras</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-5">
        <h2 class="font-weight-bold my-5 text-center" style="font-family: montserrat_bold;">Conseguí mejores oportunidades laborales, mejorá tu curriculum y ganá más</h2>
        <div class="py-5 my-5" style="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 p-md-4 "> <img class="img-fluid d-block img-thumbnail" src="img/laptopconlogo.jpg" width="1500"> </div>
                            <div class="col-md-6 offset-lg-1 d-flex flex-column justify-content-center py-4">
                                <h1 class="text-left mb-4 font-weight-bold mt-4" style="font-family: montserrat_bold;">Vas a aprender</h1>

                                <ul>
                                    <li><i class="fas fa-check text-success "></i> Conocé los fundamentos de Microsoft Excel.
                                    </li>
                                    <li><i class="fas fa-check text-success "></i> Dominá las funciones básicas de Excel</li>
                                    <li><i class="fas fa-check text-success "></i> Aplicá funciones en distintos contextos </li>
                                    <li><i class="fas fa-check text-success "></i> Creá planillas de cálculo de forma sencilla</li>
                                    <li><i class="fas fa-check text-success "></i> Gestionar volúmenes de información de manera simple</li>
                                    <li><i class="fas fa-check text-success "></i> Utilizar filtros básicos y avanzados para el manejo de información</li>
                                    <li><i class="fas fa-check text-success "></i> Aplicá subtotales o totales parciales</li>
                                    <li><i class="fas fa-check text-success "></i> Gestioná la información de manera inteligente y fácil</li>
                                    <li><i class="fas fa-check text-success "></i> Controlá la administración y creá facturas.
                                    </li>
                                    <li><i class="fas fa-check text-success "></i> ... y muchísimo más! </li>
                                    <li class="mt-4"> • No requiere conocimientos previos</li>
                                </ul>
                                <div class="review-count  wow fadeIn  animated animated animated" data-wow-delay="1.2s" style="visibility: visible;-webkit-animation-delay: 1.2s; -moz-animation-delay: 1.2s; animation-delay: 1.2s;">
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
                                            <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg animated animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Inscribirme al curso</a>
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
        <div class="py-5 text-center my-5" style="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="mb-3 font-weight-bold" style="font-family: montserrat_bold;">Excel es el programa más solicitado en el mercado laboral</h1>
                        <p class="lead" style=""> Abrí tus puertas a nuevas oportunidades. Dominá el nivel inicial de Excel en sólo 3 horas y con soporte 24/7&nbsp;</p>
                    </div>
                </div>

                <div class="review-count  wow fadeIn  animated animated animated" data-wow-delay="1.2s" style="visibility: visible;-webkit-animation-delay: 1.2s; -moz-animation-delay: 1.2s; animation-delay: 1.2s;">
                    <div class="rating-user d-inline" style="color:#ffd322;"><br>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p class="user_name d-inline pl-2 pr-4">Más de 15.500 estudiantes han realizado este curso <b>con éxito</b></p>
                </div>


            </div>
        </div>
        <div class="py-5 text-center bg-success text-white my-5" style="">
            <div class="container">
                <p style="font-size: 18px;" class="font-weight-bold">Nuestro curso tiene un valor de <span class="h3 bold font-weight-bold"><?= $precioCursoOficial ?></span>, <br> pero puede ser tuyo ahora

                    <br><br> por sólo
                    <br>
                    <span class="h1 bold font-weight-bold" style="font-family: montserrat_bold;"><?= $precioCurso ?></span>
                </p>

                <div class="call-button mt-3  mx-auto text-center">
                    <div class="col-md-3  mx-auto text-center">
                        <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg animated animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Empezá ahora</a>
                    </div>

                </div>

                <p style="font-size: 18px;" class="font-weight-regular mt-5 font-weight-bold">Comprá seguro</p>

                <p style="font-size: 18px;" class="font-weight-regular mt-3">Si no estás satisfecho con nuestro curso, puedes pedir en los primeros 7 días el 100% de tu inversión.
                </p>
            </div>
        </div>
        <div class="py-5 text-dar" style="" id=" ">
            <div class="container my-3">
                <div class="row">
                    <div class="text-center mx-auto col-md-12">
                        <h1 class="font-weight-bold  mb-md-5" style="font-family: montserrat_bold">Lo que dicen nuestros alumnos/as</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 p-4 text-center">
                        <div class="review-image text-center mt-3 mb-3">
                        </div>
                        <p class="mb-3"><i>"</i>Es muy bueno, me ayudo para ampliar mis conocimientos. El profesor transmite transmite muy bien.<i>"</i> </p>
                        <p class="mb-1"> <b>Adrián Daich</b></p>
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
                        </div>
                        <p class="mb-3">"Explica muy bien y con ejemplos sencillos."&nbsp;&nbsp;</p>
                        <p class="mb-1"> <b>Ernesto Ageitos</b></p>
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
                        </div>
                        <p class="mb-3">"Buen curso para alguien como yo que comienza de cero, les agradezco mucho" </p>
                        <p class="mb-1"> <b>Candela Ortiz</b></p>
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
                        </div>
                        <p class="mb-3">"La información es clara y precisa, el profe es muy bueno para explicar cada una de las funciones."</p>
                        <p class="mb-1"> <b>Alan Macedo</b></p>
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
                        </div>

                        <p class="mb-3">"Soy una persona grande y no sabia nada de excel, no tengo buen manejo de pc. Aun así el curso valió la pena, aprendi bastante y esta bien explicado."</p>
                        <p class="mb-1"> <b>Mariano Pintos</b></p>
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
                        </div>
                        <p class="mb-3"> <i>"Sin dudas lo recomiendo"</i> </p>
                        <p class="mb-1"><b>Julia Vieytes</b></p>
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
        <hr class="my-5">
        <h2 class="font-weight-bold my-5 text-center" style="font-family: montserrat_bold;">Somos expertos despejando cualquier duda <i class="far fa-smile-wink"></i>

        </h2>
        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="call-button mt-2 text-center mx-auto">
                            <div class="row justify-content-md-cen">
                                <div class="col-md-3 mx-auto">
                                    <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow  flipInX shadow-lg animated animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Inscribirme</a>
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
        <hr class="my-5">
        <section class="pt-5 pb-5">
            <div class="container">
                <div class="section-heading text-center">
                    <h2 class="mt-2 mb-1 pb-3 text-dark" style="font-family: montserrat_bold"><i class="fa fa-question-circle" aria-hidden="true">&nbsp;</i>Preguntas Frecuentes&nbsp;</h2>
                </div>
                <div class="accordion mt-4" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">#1 ¿Cuánto tiempo tengo para hacer el curso?</button></h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                            <div class="card-body"> Nuestros cursos los podés hacer a tu propio ritmo.
                                <br><br> El acceso al contenido y al soporte lo tendrás de por vida. Además podés descargar las clases para elegir verlo con internet o directamente desde tu computadora, tablet o celular.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Incluye alguna constancia?</button></h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                            <div class="card-body">Sí. Al finalizar el curso podés solicitar tu Certificado de Finalización la cual podrás sumar a tu currículum para demostrar tus conocimientos en Excel. .
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-center text-md-left" id="headingThree" style="">
                            <h5 class="mb-0 text-center text-md-left" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan soporte?</button></h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                            <div class="card-body">En nuestro Curso Online Excel Nivel Inicial no necesitás conocimientos previos. Te enseñamos desde 0.
                                <br><br> Lo único que necesitás es tener ganas de aprender y el programa de Microsoft Excel instalado en tu computadora, pero si no lo tenés no te preocupes, te enseñamos a descargarlo gratis.
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


                <h2 class=" text-dark text-center mt-5 pb-3 pt-3" style="font-family: montserrat_bold">¿Querés conocer el temario completo?</h2>

                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h5 class="mb-0" style="">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix" style="">👉 Click acá para ver el temario</button></h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="">
                        <div class="card-body">

                            <ul>
                                <p class="lead"> Temario</p>
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
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="call-button mt-5">
                    <div class="row justify-content-md-center">
                        <div class="col-md-3">
                            <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg animated animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Quiero anotarme</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bottom Product -->
        <hr class="" style="">
        <div class="row py-5 mx-auto text-center justify-content-center" style="">
            <div class="col-lg-4 col-md-6 p-4 text-center">
                <div class="review-image text-center mt-3 mb-3">
                </div>
                <p class="mb-3" style=""><i>"</i>Lo hice hace un tiempo y me fué bastante bien. Aún recurro al material cada tanto para repasar fórmulas que necesito hacer en el momento.<i>"</i> </p>
                <p class="mb-1"> <b>Constanza Franco</b></p>
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
                </div>
                <p class="mb-3" style="">"Muy recomendado, lo hice junto con su curso intermedio y avanzado, hay muchísimo material y se deja entender bien. Me sirve la modalidad debido al trabajo y la facultad. Apenas pueda voy a comprar el de Power Bi."&nbsp;&nbsp;</p>
                <p class="mb-1"> <b>Hugo Lanfranco</b></p>
                <div class="rating-user d-inline" style="color:#ffd322;">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half"></i>
                </div>
            </div>

        </div>
        <div class="py-5 text-center bg-success text-white mt-5" style="">
            <div class="container">
                <h2 style="" class="font-weight-bold"> ¿Qué estás esperando?
                    <br><br> Sumá valor a tu currículum y conseguí nuevas y mejores oportunidades
                </h2> <br><br>

                <p style="font-size: 18px;" class="font-weight-regular">Con un único pago vas a tener acceso de por vida.
                </p>
            </div>
        </div>
        <div class="py-5 text-center mx-auto">
            <div class="container text-center mx-auto">
                <div class="row text-center mx-auto justify-content-center">
                    <div class="col-lg-2 p-3">
                        <div class="">
                            <div class="card-body p-4"> <i class="fas fa-play-circle display-1 mb-2" style="color: rgb(254, 197, 19);"></i>


                                <h5 style="font-family: montserrat_bold">3hs de contenido</h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 p-3 ">
                        <div class="">
                            <div class="card-body p-4"> <i class="fas fa-headset display-1 mb-2" style="color: rgb(254, 197, 19);"></i>
                                <h5 style="font-family: montserrat_bold">Soporte 24/7</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 p-3 ">
                        <div class="">
                            <div class="card-body p-4"> <i class="fas fa-scroll display-1 mb-2" style="color: rgb(254, 197, 19);"></i>
                                <h5 style="font-family: montserrat_bold">Certificado de conocimiento</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 p-3 ">
                        <div class="">
                            <div class="card-body p-4"> <i class="fas fa-download display-1 mb-2" style="color: rgb(254, 197, 19);"></i>
                                <h5 style="font-family: montserrat_bold">Online y también descargable</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 p-3 ">
                        <div class="">
                            <div class="card-body p-4"> <i class="fas fa-money-check-alt display-1 mb-2" style="color: rgb(254, 197, 19);"></i>
                                <h5 style="font-family: montserrat_bold">Garantía de 100% satisfacción</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5 text-center text-dark my-5" style="">
            <div class="container">
                <h2 class="font-weight-bold text-center"><b>Más de 15.500 alumnos<br> de todo el país han aprendido con nuestro Curso Online a utilizar Excel para mejorar sus oportunidades.</b>

                </h2>

                <div class="call-button mt-3  mx-auto text-center">
                    <div class="col-md-3  mx-auto text-center">
                        <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg animated bg-success text-white animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Empezá por sólo $1.299</a>
                    </div>

                </div>

                <p style="font-size: 18px;" class="font-weight-regular mt-3">Estamos tan seguros de que te va a gustar que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>


            </div>
        </div>
        <section class="bottom-product bg-light" style="">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="product-img    ">
                            <img src="img/cursodeexcel2.jpg" class="img-fluid" alt="product">
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp;</div>
                    <div class="col-md-6" style="">
                        <div class=" ">
                            <h3>
                            </h3>
                            <h1 class="display-5" style="font-family: montserrat_bold">Adqurí un conocimiento clave en 3hs</h1>
                        </div>
                        <div class="feature-list mt-4 lead">
                            <p> • Accedé hoy y tenelo de por vida. Pago por única vez (sin suscripciones ni pagos mensuales). <br>• Garantía de devolución de 7 días</p>
                            <h3 class="bg-success text-white font-weight-bold p-2 mt-3 col-8 col-md-6 text-center"><strike><?= $precioCursoOficial ?></strike><span style="font-family: montserrat_bold"> <?= $precioCurso ?></span></h3>
                        </div>
                        <div class="call-button mt-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated   animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Quiero este curso</a>
                                </div>
                                <div class="col-md-6 payments">
                                    <img src="../a-img/paymentsgris.jpg" class="img-fluid wow flipInX animated   animated" data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
<!-- Website Footer -->
<div class="cta-fixed">
    <div class="call-button container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-10">
                <a href="checkout.php" class="hvr-sweep-to-top">¡Lo quiero! 👉</a>
            </div>
        </div>
    </div>
</div>
        <?php include('../a-pages/footer.php')?>
    </body>

</html>