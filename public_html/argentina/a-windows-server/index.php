<?php
$dirpage = '../';
if(isset($_GET)){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$idcurso = 'windows_server';
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
    <link href="css/win-server.css" rel="stylesheet">

</head>

<body style="font-family: montserrat_regular">

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

                        <img src="img/1.jpg" class="img-fluid" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6">
                    <div class="  mt-md-4 mt-0">
                        <h5 style="color:black;" class="mb-0 pb-0 titulos">Domina Windows Server</h5>
                        <div class="rating-user d-inline mt-0 pt-0" style="color:#ffd322;"><br>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p class="user_name d-inline pl-2 pr-4">+15.500 estudiantes</p>

                        <h1 class="text-left mt-5" style="font-family: montserrat_bold"></h1>
                    </div>
                    <div class="feature-list mt- mt-md-2">
                        <ul style="">

                            <li class="wow fadeIn" data-wow-delay="0.1" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> 11 horas de vídeo bajo demanda</li>

                            <li class="wow fadeIn" data-wow-delay="0.2" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> 27 videos</li>

                            <li class="wow fadeIn" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Acceso de por vida</li>

                            <li class="wow fadeIn" data-wow-delay="0.4" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Acceso en dispositivos móviles y TV</li>

                            <li class="wow fadeIn" data-wow-delay="0.5" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Certificado de Participación
                            </li>
                            <h3 class="bg-success text-white font-weight-bold p-2 mt-3 col-8 col-md-6 text-center">
                                <strike><?= $precioCursoOficial ?></strike><span> &nbsp;&nbsp;&nbsp;<?= $precioCurso ?></span>
                            </h3>
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
                            <p class="lead">"Curso especialmente diseñado para administradores de sistemas"</p>
                        </div>
                        <div class="review-image">

                            <p class="user_name d-inline  font-weight-bold"> Francisco Ferrer <i class="fa fa-star pl-1 " style="color:#ffd322;"></i>
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
                    <h1 class="display-4 mb-4 modal-title sombras " style="font-family: montserrat_bold">
                        Convertite en Administrador de Servidores </h1>
                    <p class="lead mb-4"> A través de este curso explicado paso a paso en 11 horas de videos, vas a aprender los conocimientos necesarios para dominar este poderoso sistema operativo. <br></p>
                    <hr>
                    <p class="lead mb-4"> Luego de finalizar el curso podrás ser administrador de sistemas. En este curso aprenderás desde cero TODA la implementación y administración de la versión mas actual de Windows Server en sus roles y características. <br></p>
                    <hr>
                    <p class="lead mb-4"> <br></p>
                    <hr>
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
                        <div class="col-lg-5 col-md-6 p-md-4 "> <img class="img-fluid d-block img-thumbnail" src="img/2.jpg" width="1500"> </div>
                        <div class="col-md-6 offset-lg-1 d-flex flex-column justify-content-center py-4">
                            <h1 class="text-left mb-4 font-weight-bold mt-4" style="font-family: montserrat_bold">Vas a aprender a:</h1>

                            <ul>

                                <li><i class="fas fa-check text-success "></i> Conocer funcionamiento de Sistemas Operativos de servidor.</li>

                                <li><i class="fas fa-check text-success "></i> Ediciones, tipos de licenciamiento de Windows Server 2016.</li>

                                <li><i class="fas fa-check text-success "></i> Instalación, configuraciones iniciales de Windows Server 2016.</li>

                                <li><i class="fas fa-check text-success "></i> Instalación y configuración de servicio DNS.</li>

                                <li><i class="fas fa-check text-success "></i> Implementación y despliegue de políticas de grupo en el dominio GPOs.</li>

                                <li><i class="fas fa-check text-success "></i> Despliegue de actualizaciones con Windows Server Update Services.</li>

                                <li><i class="fas fa-check text-success "></i> Implementar infraestructura de Active Directory Domain Services</li>

                                <li><i class="fas fa-check text-success "></i> Distribución dinámica de direcciones IP con DHCP.</li>
                                <!-- li class="mt-4"> • No requiere conocimientos previos </li -->
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




                    <p class="mb-3"><i>"</i>Es un curso muy fácil de entender pero con contenido de mucho provecho para todos lo niveles de administración de sistemas. muy técnico. Es genial!!<i>"</i> </p>
                    <p class="mb-1"> <b>Pamela Carvajal</b></p>
                    <div class="rating-user d-inline" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 p-4 text-center">
                    <p class="mb-3">"Explica muy bien y facil compresión de los conceptos informaticos."&nbsp;&nbsp;</p>
                    <p class="mb-1"> <b>Roney Sanchez</b></p>
                    <div class="rating-user d-inline" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                </div>
                <div class="col-lg-4 p-4 text-center">

                    <p class="mb-3">"Buen curso para alguien como que no tiene conocimientos de servidores" </p>
                    <p class="mb-1"> <b>Cruz Ojeda</b></p>
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
                        <img src="img/reviews/alanmacedo.jpg" alt="review" class="d-inline">
                    </div>
                    <p class="mb-3">"La información es clara y precisa, el profe es muy bueno para explicar cada una de las funciones."
                    </p>
                    <p class="mb-1"> <b>Alan Macedo</b></p>
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
                        <img src="img/reviews/juliavieytes_.jpg" alt="review" class="d-inline">
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
                        <div class="card-body">11 horas de video es la duración total del curso.</div>
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
                        <div class="card-body">11 horas de videos es la duración total del curso.</div>
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
                        <img src="img/3.jpg" class="img-fluid" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6" style="">
                    <div class=" ">
                        <h3>
                        </h3>
                        <h1 class="display-5" style="font-family: montserrat_bold">Adquirí un conocimiento clave en 11 horas</h1>
                    </div>
                    <div class="feature-list mt-4 lead">
                        <p> • Accedé hoy y tenelo de por vida. Pago por única vez (sin suscripciones ni pagos mensuales). <br>• Garantía de devolución de 7 días</p>
                        <h3 class="bg-success text-white font-weight-bold p-2 mt-3 col-8 col-md-6 text-center">
                            <strike><?= $precioCursoOficial ?></strike><span> &nbsp;&nbsp;&nbsp;<?= $precioCurso ?></span></h3>

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