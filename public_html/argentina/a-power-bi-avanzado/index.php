<?php
$dirpage = '../';
if(isset($_GET)){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$idcurso = 'pbi_avanzado';
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

<body style="font-family: montserrat_regular;">

    <header class="bg-dark " style="">
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
                <div class="col-md-3 cta-button  col-sm-6 col-6 text-dark">
                    <a class="hvr-sweep-to-right text-white" href="checkout.php">Adquirir</a>
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
                        <img src="img/powerbi-avanzado.gif" class="img-fluid my-auto py-auto align-items-center justify-content-center pt-5 pt-md-5 mt-md-5" alt="curso de power bi">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6">
                    <div class="section-heading ">
                        <h3 style="color:black;">Curso online a distancia</h3>
                        <h1 class="mt-4  " style=""><b>Convertite en <span style="font-family: montserrat_black ;">ESPECIALISTA POWER BI</span></b></h1>
                    </div>
                    <div class="feature-list mt-4">
                        <ul class="font-weight-light" style="font-family: montserrat_light ;">
                            <li class="wow fadeIn  animated" data-wow-delay="0.1" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;"><i class="fas fa-check-circle text-dark"></i> 4.5 hs de video paso a paso</li>
                            <li class="wow fadeIn animated" data-wow-delay="0.2" style="visibility: visible;-webkit-animation-delay: 0.2; -moz-animation-delay: 0.2; animation-delay: 0.2;"> <i class="fas fa-check-circle text-dark"></i> Acceso para siempre al curso</li>
                            <li class="wow fadeIn animated" data-wow-delay="0.3" style="visibility: visible;"><i class="fas fa-check-circle text-dark"></i> Certificado Oficial</li>
                            <li class="wow fadeIn animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;"><i class="fas fa-check-circle text-dark"></i> Estudialo desde tu PC, notebook, tablet o Celular</li>
                        </ul>
                        <h3 class="mt-md-4 p-2 mt-3 col-8 col-md-6 text-center" style="background-color:#f3c910; color:black;font-family: montserrat_regular;"><strike><?= $precioCursoOficial ?></strike><span class="col-md-12 font-weight-bold "> <?= $precioCurso ?></span></h3>
                        <p style="font-family: montserrat_bold">Aprende Excel es una empresa Argentina. Éste precio es final y en Pesos Argentinos</p>

                    </div>
                    <div class="call-button mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated shadow text-white" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s; background-color:#f3c910;">Lo quiero</a>
                            </div>
                            <div class="col-md-6 payments">
                                <img src="../a-img/security.png" class="img-fluid wow flipInX animated pt-md-2 " data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            </div>
                        </div>
                    </div>
                    <div class="review-one mt-5 mt-md-3">
                        <div class="review-text">
                            <iframe class="col-md-12" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fbreem.ferro%2Fposts%2F3772813796120626&width=500&show_text=true&appId=822560431639621&height=187" width="500" height="187" style="border:none;overflow:hidden"
                                scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                            </iframe>
                        </div>
                        <div class="review-image">
                            <p class="user_name d-inline" style="font-family: montserrat_bold;"><i class="ml-3 fa fa-star" style="color:#ffd322;"></i>
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
    <div class="py-5 text-center mt-5 pt-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-12">
                    <h1 class="text-white " style="font-family: montserrat_black">Un analista Power BI gana un sueldo x3 veces mayor a la media</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 align-items-center d-flex" style="">
        <div class="container">
            <div class="row">
                <div class="col-md-9 px-md-5 mx-auto" style="">


                    <p class="font-weight-light lead mb-4">¡Serás el <span style="background-color:#f3c910; color:black;font-family: montserrat_bold;" class="p-1">Especialista Power BI</span> que las empresas están buscando! En este curso profundizaremos las herramientas y visualizaciones avanzadas de Power BI. Aprenderás habilidades avanzadas del panel de control para crear visualizaciones de datos más sofisticadas.</b>

                        <p class="lead mb-4">Ya lo sabes, el dominio de Power BI es muy valorado por las empresas! Mejora tus oportunidades laborales y tus ingresos utilizando Power BI en nivel Avanzado
                        <br></p>
                        <hr>
                        <p class="lead" style=""> Requsitos: una PC con Power BI instalado (es gratuito) y conocimientos básicos de la herramienta.<br></p>
                        <div class="call-button mt-5">
                            <div class="row justify-content-md-cen">
                                <div class="col-md-5">
                                    <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg text-white" data-wow-delay="0.2s">Inscribirme</a>
                                </div>
                            </div>
                            <div class="rating-user d-inline"><br>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half"></i>
                            </div>
                            <p class="user_name d-inline pl-4 pr-4 font-weight-light">+2.200 estudiantes</p>
                        </div>
                </div>

            </div>
        </div>
    </div>
    <div class="py-5 bg-dark text-white   ">
        <div class="container ">
            <div class="row mx-auto">
                <div class="col-lg-5 col-md-6 p-md-4   mx-0 px-0 "> <img class="img-fluid d-block rounded shadow  " src="img/powerbi-avanzado.jpg" width="1500"> </div>
                <div class="col-md-6 offset-lg-1 d-flex flex-column justify-content-center py-4">
                    <h2 class="my-3 mx-auto mx-md-1 mt-5 mt-md-1" style="font-family: montserrat_bold"> <b>Vas a aprender:</b></h2>
                    <ul class="mx-auto mx-md-1 lead">
                      <li><i class="fas fa-check " style="color:#f3c910;"></i> Instalación y introduccion a Power BI desde cero</li>
                      <li><i class="fas fa-check  " style="color:#f3c910;"></i> Modelado de Datos</li>
                      <li><i class="fas fa-check " style="color:#f3c910;"></i> Funcionalidades avanzadas de Power BI</li>
                      <li><i class="fas fa-check  " style="color:#f3c910;"></i> DAX General</li>
                      <li><i class="fas fa-check " style="color:#f3c910;"></i> Tablas Calculadas</li>
                      <li><i class="fas fa-check  " style="color:#f3c910;"></i> Función CALCULATE</li>
          <li><i class="fas fa-check  " style="color:#f3c910;"></i> Hacer cálculos dinámicos para analizar tus datos</li>
          <li><i class="fas fa-check " style="color:#f3c910;"></i> Creación de reportes en Power BI</li>
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
                            <p class="mb-0">Obtené tu Certificado Oficial para adjuntar a tu CV</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/soporte.jpg" width="150">
                            <h4 class="font-weight-bold" style="font-family: montserrat_bold">Soporte </h4>
                            <p class="mb-0">Te ayudamos con todas tus dudas</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="/img/acceso.jpg" width="150">
                            <h4 class="font-weight-bold" style="font-family: montserrat_bold">Acceso de por vida</h4>
                            <p class="mb-0">Te queda para siempre. Hacelo a tu ritmo y sin horarios</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-dark text-white">
        <div class="container my-3">
            <div class="row">
                <div class="text-center mx-auto col-md-12">
                    <h1 style="font-family: montserrat_bold">Lo que dicen nuestros alumnos/as</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sn-12 p-4 text-center">

                    <iframe class="col-md-12 col-sm-12" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fvalentina.giusti1%2Fposts%2F10223730863393067&width=500&show_text=true&appId=822560431639621&height=206" width="400" height="226"
                        style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <div class="rating-user d-inline">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 p-4 text-center">
                    <iframe class="col-md-12 col-sm-12" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpablolamagni84%2Fposts%2F10221554659508440&width=500&show_text=true&appId=822560431639621&height=168" width="400" height="226" style="border:none;overflow:hidden"
                        scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <div class="rating-user d-inline">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                </div>
                <div class="col-lg-4 p-4 text-center">
                    <iframe class="col-md-12 col-sm-12" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fdaniel.vicente.37017%2Fposts%2F10222698852933274&width=500&show_text=true&appId=822560431639621&height=187" width="400" height="226"
                        style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <div class="rating-user d-inline">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 p-4 text-center">
                    <iframe class="col-md-12 col-sm-12" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fmartin.arrudi11%2Fposts%2F4465611253454018&width=400&show_text=true&appId=822560431639621&height=226" width="400" height="226" style="border:none;overflow:hidden"
                        scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <div class="rating-user d-inline">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 p-4 text-center">
                    <iframe class="col-md-12 col-sm-12" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fvale.corbalan.585%2Fposts%2F802550920665542&width=400&show_text=true&appId=822560431639621&height=226" width="400" height="240" style="border:none;overflow:hidden"
                        scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <div class="rating-user d-inline">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-lg-4 p-4 text-center">
                    <iframe class="col-md-12 col-sm-12" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fvaleria.salcedo610%2Fposts%2F10219493187135924&width=400&show_text=true&appId=822560431639621&height=226" width="400" height="226"
                        style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
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
    <section class="pt-5 pb-5" id="grs">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mt-2 mb-1 pb-3 text-dark " style="font-family: montserrat_bold"><i class="fa fa-question-circle" aria-hidden="true">&nbsp;</i>Preguntas Frecuentes&nbsp;</h2>
            </div>
            <div class="accordion mt-4" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0 text-md-left text-sm-center "><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo tengo?</button></h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                        <div class="card-body"> ¡De por vida! Una vez que abones vas a tener acceso para siempre. Lo vas a poder descargar en tu PC, notebook, tablet o celular.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0 text-md-left text-sm-center"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto tiempo tardo en terminarlo?</button></h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">4.5 hs de videos es la duración total del curso.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0 text-md-left text-sm-center"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan Soporte?</button></h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">Sí, damos soporte 24/7. Podés consultar cualquier duda en nuestro e-mail o Whatsapp.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0 text-md-left text-sm-center">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">#4 ¿Incluye Certificación o Diploma?</button></h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                        <div class="card-body">Una vez termines el curso podés solicitarnos gratis la Certificado de Cursado.</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0 text-md-left text-sm-center" style="">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">#5 ¿Qué requisitos tiene?</button></h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                        <div class="card-body">Tener instalado el programa Power BI y nada más!</div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h5 class="mb-0 text-md-left text-sm-center">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">#6 ¿Cuál es el temario completo?</button></h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="">
                        <div class="card-body">

                            <ul>
                              <li>Clase 1– Que es Power Bi</li>
                              <li>Clase 2 – Instalación de Power Bi</li>
                              <li>Clase 3 – Creación de una cuenta gratuita en Power bi</li>
                              <li>Clase 4 – Conectarse desde múltiples orígenes de datos</li>
                              <li>Clase 5 – Acceder a datos desde la Nube con Power Bi</li>
                              <li>Clase 6 – Diferencia entre duplicar archivo y referencia de archivo</li>
                              <li>Clase 7 – Utilizar Parámetros para el cambio del origen de datos</li>
                              <li>Clase 8 – Anexar Consultas</li>
                              <li>Clase 9 – Combinar Consultas</li>
                              <li>Clase 10 – Creación de columnas y columnas condicionales</li>
                              <li>Clase 11 – Limpieza y Transformación I - Archivo Contable</li>
                              <li>Clase 12 – Limpieza y transformación II - Limpiar URL</li>
                              <li>Clase 13 – Limpieza y Tranformación III - Limpiar Texto y Rellenar</li>
                              <li>Clase 14 – Limpieza y Transformación IV- Limpiar URL</li>
                              <li>Clase 15 – Limpieza y transformación V - Dinamización Columnas</li>
                              <li>Clase 16 – Agrupar por I - País y Género</li>
                              <li>Clase 17 – Agrupar por II - Subcategoría y Modelo</li>
                              <li>Clase 18 –  Establecer datos en consultas desconectadas en Power Bi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="call-button mt-5">
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow text-white" data-wow-delay="0.2s">Acceder al curso</a>
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
                        <img src="img/curso-avanzado-power-bi.jpg" class="img-fluid rounded shadow" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6" style="">
                    <div class="section-heading">
                        <h3>
                        </h3>
                        <h1 class="font-weight-bold text-left" style="font-family: montserrat_black">Sumá POWER BI AVANZADO a tu CV</h1>
                    </div>
                    <div class="feature-list mt-4">
                        <p> • Pago por única vez en Pesos Argentinos (sin suscripciones ni pagos mensuales). <br>• Garantía de devolución de 7 días</p>
                        <h3 class="mt-md-4 p-2 mt-3 col-8 col-md-6 text-center" style="background-color:#f3c910; color:black;font-family: montserrat_bold;"><strike><?= $precioCursoOficial ?></strike><span class="col-md-12 font-weight-bold "> <?= $precioCurso ?></span></h3>
                    </div>
                    <div class="call-button mt-5">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated text-white shadow" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Inscribirme</a>
                            </div>
                            <div class="col-md-6 payments ">
                                <img src="../a-img/security.png" class="img-fluid wow flipInX animated px-5 px-md-0 mt-md-0 mt-3 " data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
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