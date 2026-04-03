<?php
$dirpage = '../';
if(isset($_GET)){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$idcurso = 'office';
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

    <header class="bg" style="background-color:#27569A">
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

    <section class="top-product  bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-5" style="">
                    <div class=" py-auto">
                        <img src="img/office1.jpeg" class="img-fluid my-auto py-auto align-items-center justify-content-center  mt-md-5" alt="curso de power bi">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6">
                    <div class="section-heading ">
                        <h3 style="color:black;">Curso Online Pack Office Nivel Inicial</h3>
                        <h1 class="mt-4  " style=""><b>Realizá el <span style="font-family: montserrat_black ;">PACK OFFICE</span></b></h1>
                        <h1 class="mt-4  " style=""><b><span style="font-family: montserrat_black;">Transformate en un profesional del siglo 21</span><h5 class="mt-2">Aprendé Word, Excel y PowerPoint en solo 9 horas y conseguí las mejores oportunidades.
</h5></b></h1>
                    </div>
                    <div class="feature-list mt-4">
                        <ul class="font-weight-light" style="font-family: montserrat_light ;">
                            <li class="wow fadeIn  animated animated" data-wow-delay="0.1" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;"><i class="fas fa-check-circle text-dark"></i>Hacelo a tu propio ritmo, donde y cuando quieras</li>
                            <li class="wow fadeIn animated animated" data-wow-delay="0.2" style="visibility: visible;"> <i class="fas fa-check-circle text-dark"></i>Despejá tus dudas con nuestro soporte 24/7</li>
                            <li class="wow fadeIn animated animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;"><i class="fas fa-check-circle text-dark"></i> Otorgamos Certificado Oficial</li>
                            <li class="wow fadeIn animated animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;"><i class="fas fa-check-circle text-dark"></i> Estudialo desde tu PC, notebook, tablet o Celular</li>
                        </ul>
                        <p style="font-family: montserrat_bold">Aprende Excel es una empresa Argentina. Éste precio es final y en Pesos Argentinos</p>
                        <h3 class="mt-md-4 p-2 mt-3 col-8 col-md-6 text-center" style="background-color:#f3c910; color:black;font-family: montserrat_regular;"><strike><?= $precioCursoOficial ?></strike><span class="font-weight-bold "> <?= $precioCurso ?></span></h3>


                    </div>
                    <div class="call-button mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="font-weight-bold mt-3" style="font-family:montserrat_bold;">Antes <?= $precioCursoOficial ?>
                                </h5><a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated shadow text-dark animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Empezá por solo <?= $precioCurso ?></a>
                            </div>
                            <div class="col-md-6 payments">
                                <img src="../a-img/security.png" class="img-fluid wow flipInX animated pt-md-2 mx-auto  animated" data-wow-delay="0.3s" alt="payments" style="visibility: visible; animation-delay: 0.3s;">
                            </div>
                        </div>
                    </div>
                    <div class="review-one mt-5 mt-md-3">
                        <div class="review-text">
                            <p>Aprende Excel es una empresa Argentina. Este precio es final y en Pesos Argentinos</p>
                            <h5 style="font-family: montserrat_regular;" class="font-weight-light mt-3">"Fué una buena elección para aprender algo nuevo para mi. Si bien los conocía, practicamente no sabía nada sobre ellos, y el profesor explica de una forma clara todos los contenidos haciendo fácil su comprensión"</h5>
                        </div>
                        <div class="review-image">
                            <p class="user_name d-inline" style="font-family: montserrat_bold;">Marcos Pineda<i class="ml-3 fa fa-star" style="color:#ffd322;"></i>
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

    <div class="py-5 text-center mt-5 pt-5 bg" style="background-color: rgb(39, 86, 154);">
        <div class="container">
            <div class="mx-auto col-md-12">
                <h1 class="text-white " style="font-family: montserrat_black;">Convertite en un profesional del Siglo XXI</h1>
            </div>
        </div>
    </div>

    <div class="py-5 align-items-center d-flex" style="">
        <div class="container">
            <div class="row">
                <div class="col-md-9 px-md-5 mx-auto" style="">


                    <p class="font-weight-light lead mb-4"><span style="background-color:#f3c910; color:black;font-family: montserrat_bold;" class="p-1">Paquete Microsoft Office</span> <b></b>

                    </p>
                    <p class="lead mb-4">Ya sea que querés escalar dentro de tu empresa, conseguir un nuevo y mejor empleo o estés estudiando, tu currículum estará incompleto hasta que domines Word, Excel y PowerPoint.</p>

                    <p class="mb-4 font-weight-bold" style="font-size: 19px;">
                        Con nuestro curso online Pack Office Nivel Inicial manejarás las tres herramientas de forma rápida, sencilla y dinámica. </p>

                    <p class="lead mb-4">Olvidá las clases magistrales con horas y horas de contenido aburrido y tecnicismos engorrosos.
                    </p>

                    <p class="lead mb-4">Explicaciones detalladas, paso a paso y casos prácticos te van a dar la seguridad de manejar el Pack de Office como todo un profesional.

                    </p>

                    <p class="lead mb-4">Hacé que tu currículum aumente su valor y conseguí las mejores oportunidades de empleo.

                    </p>
                    <hr>
                    <p class="lead" style=""> Requsitos: una PC con los programas Word, Excel y Powerpoint instalados (es gratuito)<br></p>
                    <div class="call-button mt-5">
                        <div class="row justify-content-md-cen">
                            <div class="col-md-5">
                                <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg text-dark animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Inscribirme</a>
                            </div>
                        </div>
                        <div class="rating-user d-inline"><br>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half"></i>
                        </div>
                        <p class="user_name d-inline pl-4 pr-4 font-weight-light">+3.500 estudiantes</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="py-5 text-center mt-5 pt-5 bg" style="background-color: rgb(39, 86, 154);">
        <div class="container">
            <div class="mx-auto col-md-12">
                <h1 class="text-white " style="font-family: montserrat_black;">Avanzá a tu propio ritmo y volvé las veces que necesites</h1>
            </div>
        </div>
    </div>
    <div class="pt-5 mb-5 pb-5 mt-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-3">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/laptop_word.jpg" width="150">
                            <h4 class="font-weight-bold" style="font-family: montserrat_bold">Word</h4>
                            <p class="mb-0">CREÁ DOCUMENTOS DE MANERA PROFESIONAL
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/laptop_excel.jpg" width="150">
                            <h4 class="font-weight-bold" style="font-family: montserrat_bold">Excel </h4>
                            <p class="mb-0">DOMINÁ EL PROGRAMA MÁS UTILIZADO POR LAS EMPRESAS
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/laptop_powerpoint.jpg" width="150">
                            <h4 class="font-weight-bold" style="font-family: montserrat_bold">PowerPoint</h4>
                            <p class="mb-0">DISEÑÁ PRESENTACIONES DE ALTO IMPACTO
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-5 bg-dark text-white   " style="">
        <div class="container ">
            <div class="row mx-auto">
                <div class="col-lg-5 col-md-6 p-md-4   mx-0 px-0 " style=""> <img class="img-fluid d-block rounded shadow  " src="img/office1.jpeg" width="1500" style=""> </div>
                <div class="col-md-6 offset-lg-1 d-flex flex-column justify-content-center py-4">
                    <h2 class="my-3 mx-auto mx-md-1 mt-5 mt-md-1" style="font-family: montserrat_bold"> <b style="">Aprendé Word, Excel y PowerPoint en un solo lugar </b></h2>

                    <p class="mb-4" style="font-size: 18px;">
                        De manera rápida, sencilla y dinámica y desde un nivel inicial.
                        <br><b>-Con soporte y sin requisitos previos-</b> </p>

                    <ul class="mx-auto mx-md-1 lead">
                        <li style=""><i class="fas fa-check " style="color:#f3c910;"></i> 9 horas de contenido con ejemplos reales y prácticos.</li>
                        <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Acceso de por vida: vas a poder verlo cuantas veces quieras. </li>
                        <li style=""><i class="fas fa-check " style="color:#f3c910;"></i> Soporte 24/7. Ante cualquier duda te ayudaremos.</li>
                        <li style=""><i class="fas fa-check " style="color:#f3c910;"></i> Certificado Oficial para sumar valor&nbsp; a tu currículum.</li>
                        <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Garantía de satisfacción: 7 días para probar el contenido.</li>
                        <li style=""><i class="fas fa-check " style="color:#f3c910;"></i> Crear documentos de manera profesional</li>
                        <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Manejar Auto-corrección y Auto-texto</li>
                        <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Usar Temas</li>
                        <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Crear Indices y glosarios</li>
                        <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Aplicar Formato de Letra y Párrafo</li>
                        <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Destacar en tu trabajo, estudios y carrera realizando las mejores presentaciones en Power Point</li>
                        <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Crear presentaciones de alto impacto</li>
                        <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Todas las funciones que brinda Power Point</li>
                        <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Y muchísimo más! Un total de 9hs de videos bien explicados.</li>
                    </ul>
                </div>
            </div>
            <div class="py-5 text-center text-white rounded" style="background-color: rgb(39, 86, 154);">
                <div class="container">
                    <p style="font-size: 18px;" class="font-weight-bold">Nuestro curso está valorado en <span class="h3 bold font-weight-bold" style=""><?= $precioCursoOficial ?></span>, <br> pero puede ser tuyo con esta oferta limitada

                        <br><br> por solo
                        <br>
                        <span class="h1 bold font-weight-bold" style="font-family: montserrat_bold;"><?= $precioCurso ?></span>
                    </p>

                    <div class="call-button mt-3  mx-auto text-center">
                        <div class="col-md-3  mx-auto text-center">
                            <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg animated animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Empezá ahora</a>
                        </div>

                    </div>

                    <p style="font-size: 18px;" class="font-weight-regular mt-3 col-md-8 mx-auto">Estamos tan seguros de que te va a gustar que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>


                </div>
            </div>
        </div>
    </div>

    <div class="py-3 bg-white text-dark">
        <div class="container">
            <div class="row">
                <div class="text-center mx-auto col-md-12">
                    <h1 style="font-family: montserrat_bold">Lo que dicen nuestros alumnos/as</h1>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4 col-md-6 p-4 text-center" style="">
                    <div class="review-image text-center mt-3 mb-3">
                    </div>
                    <p class="mb-3"><i>"</i>Excelente curso y muy completo<i>"</i> </p>
                    <p class="mb-1"> <b>Carlos Trota</b></p>
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
                    <p class="mb-3">"Conocía algo de cada uno de los programas, casi nada en verdad. Se aprende mucho en estos cursos, el de Excel es muy completo y un poco más complejo que los demás, pero pude aprenderlo bien y hacer fórmulas"</p>
                    <p class="mb-1"> <b>Aníbal Guerra</b></p>
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
                    <p class="mb-3">"Esta muy bien, fué una buena compra. Me lo recomendó mi amiga que ya pertenecía a la academia" </p>
                    <p class="mb-1"> <b>Alejandra Maida</b></p>
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

    </div>
    <div class="py-5 text-center" style="background-color: rgb(39, 86, 154);">
        <div class="container">
            <h1 class="text-white" style="font-family: montserrat_black;">
                CONSEGUIR LAS MEJORES OPORTUNIDADES ESTÁ EN TUS MANOS… Y EN TU COMPUTADORA</h1>
        </div>
    </div>
    <div class="pt-5 mb-5 pb-5 mt-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-3">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/certificado.jpg" width="150">
                            <p class="mb-0">Sumá valor a tu currículum</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/soporte.jpg" width="150">
                            <p class="mb-0">Soporte cada vez que lo necesites</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 p-3 col-md-6">
                    <div class="card">
                        <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/acceso.jpg" width="150">
                            <p class="mb-0">Hacelo a tu ritmo y sin horarios</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 text-center mt-5 pt-5 bg" style="background-color: rgb(39, 86, 154);">
        <div class="container">
            <h3 class="text-white " style="font-family: montserrat_black;">
                Utilizá de manera inteligente las herramientas del Pack Office: Word, Excel y PowerPoint y conseguí el ascenso que estabas deseando
            </h3>
        </div>
    </div>
    <section class="pt-5 pb-5 container">
        <div class="row align-items-center justify-content-center justify-items-center">

            <div class="col-md-2"><img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/laptop_word.jpg" width="150"></div>
            <div class="col-md-7">
                <ul class="mx-3  mx-md-1  lead">
                    <li style=""><i class="fas fa-check " style="color:#f3c910;"></i> Creá documentos de manera profesional.
                    </li>
                    <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Manejá las funciones como autocorrección, índices, formatos de letra, entre otras. </li>
                    <li style=""><i class="fas fa-check " style="color:#f3c910;"></i> Dominá los temas y cambiá el aspecto de tus documentos en solo unos pasos.</li>

                </ul>
            </div>
        </div>

        <div class="row mt-4 align-items-center justify-content-center justify-items-center">

            <div class="col-md-2">
                <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/laptop_excel.jpg" width="150">
            </div>
            <div class="col-md-7">
                <ul class="mx-3 mx-md-1 lead">
                    <li style=""><i class="fas fa-check " style="color:#f3c910;"></i> Conocé los fundamentos y manejá las funciones básicas de Excel.

                    </li>
                    <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Creá plantillas de cálculo de manera rápida y sencilla. </li>
                    <li style=""><i class="fas fa-check " style="color:#f3c910;"></i> Gestioná grandes volúmenes de información de forma simple.</li>

                </ul>
            </div>
        </div>

        <div class="row mt-4 align-items-center justify-content-center justify-items-center">
            <div class="col-md-2"><img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/laptop_powerpoint.jpg" width="150"></div>
            <div class="col-md-7">
                <ul class="mx-3 mx-md-1 lead">
                    <li style=""><i class="fas fa-check " style="color:#f3c910;"></i> Diseñá presentaciones de alto impacto.

                    </li>
                    <li style=""><i class="fas fa-check  " style="color:#f3c910;"></i> Exponé datos importantes de manera profesional.
                    </li>
                    <li style=""><i class="fas fa-check " style="color:#f3c910;"></i> Descubrí todas las funciones de PowerPoint.</li>

                </ul>
            </div>
        </div>
        <h2 class="my-3 text-dark text-center" style="font-family: montserrat_bold;">¡Y muchísimo más...!</h2>

    </section>
    <div class="py-5 text-center text-white my-5" style="background-color: rgb(39, 86, 154);">
        <div class="container">
            <h2 style="font-family:montserrat_bold;">Lográ que tu Currículum sobresalga </h2>
            <h5>Dominá Word, Excel y PowerPoint en solo 9 horas y con soporte 24/7</h5>

            <div class="review-count  wow fadeIn  animated animated animated" data-wow-delay="1.2s" style="visibility: visible;-webkit-animation-delay: 1.2s; -moz-animation-delay: 1.2s; animation-delay: 1.2s;">
                <div class="rating-user d-inline" style="color:#ffd322;"><br>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p class="user_name d-inline pl-2 pr-4">Más de 3.500 estudiantes han realizado este curso <b>con éxito</b></p>
            </div>


            <p style="font-size: 18px;" class="font-weight-bold mt-3">Nuestro curso está valorado en <span class="h3 bold font-weight-bold" style=""><?= $precioCursoOficial ?></span>, <br> pero puede ser tuyo con esta oferta limitada

                <br><br> por solo
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
    <div class="py-5 text-dar" style="" id=" ">
        <div class="container my-3">
            <div class="row">
                <div class="text-center mx-auto col-md-12">
                    <h1 class="font-weight-bold  mb-md-5" style="font-family: montserrat_bold;">Nuestros alumnos están diciendo:</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 p-4 text-center">
                    <div class="review-image text-center mt-3 mb-3">
                    </div>
                    <p class="mb-3"><i>"</i>De mucha utilidad y con bastante contenido. Aún me faltan ver varios videos pero por ahora viene de maravilla </p>
                    <p class="mb-1"> <b>Fernando Gutierrez</b></p>
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
                    <p class="mb-3">"Los ejemplos son fáciles de entender, se explican bastante bien. Recomiendo</p>
                    <p class="mb-1"> <b>Evelyn Lucera</b></p>
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
                    <p class="mb-3">"Agradezco a los profesores y a la academia. Me sirvió mucho, en mi caso no tengo (mejor dicho no tenía) un buen manejo de la computadra más que para ver emails y googlear. Ahora me siento mucho más seguro. Destaco que explican lento
                        sin saltearse cosas" </p>
                    <p class="mb-1" style=""> <b>Luciano Cordero</b></p>
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
                    <p class="mb-3">"La información que dan es muy clara y van despacio explicando cada paso. Hice estos cursos para capacitarme y estar mas preparado para los nuevos empleos"</p>
                    <p class="mb-1"> <b>Julian Mazzei</b></p>
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

                    <p class="mb-3">"Destaco la ayuda de los profesores. Si bien explican bien, me surgieron dudas con el curso de Excel y me respondieron rápido y con claridad"</p>
                    <p class="mb-1"> <b>Camila Lanfranco</b></p>
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
                    <p class="mb-3"> "Recomiendo este pack sin dudas. Estoy buscando cambiar de trabajo y en todos los portales online como bumeran y zonajobs piden manejo de estas herramientas" </p>
                    <p class="mb-1"><b>Maria Belén Reynoso</b></p>
                    <div class="rating-user d-inline" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                </div>
            </div>
            <div class="call-button mt-3  mx-auto text-center">
                <div class="col-md-3  mx-auto text-center">
                    <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg animated animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Empezá ahora</a>
                </div>

            </div>
        </div>
    </div>
    <h2 class="font-weight-bold my-5 py-5 text-center text-white" style="font-family: montserrat_bold; background-color: rgb(39, 86, 154);">Somos expertos despejando cualquier duda <i class="far fa-smile-wink"></i></h2>
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
                        <div class="card-body">Sí. Al finalizar el curso podés solicitar tu Certificado de Finalización la cual podrás sumar a tu currículum para demostrar tus conocimientos en Excel, Powerpoint y Word. .
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-center text-md-left" id="headingThree" style="">
                        <h5 class="mb-0 text-center text-md-left" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan soporte?</button></h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                        <div class="card-body">En nuestro curso online Pack Office Nivel Inicial no necesitás conocimientos previos. Te enseñamos desde 0.
                            <br><br> Lo único que necesitás es tener ganas de aprender y los programas de Microsoft Office (Word, Excel y Powerpoint) instalados en tu computadora, pero si no lo tenés no te preocupes, te enseñamos a descargarlo gratis.
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


            <div class="call-button mt-5">
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg animated animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Quiero anotarme</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="text-white" style="background-color: rgb(39, 86, 154);">
        <div class="container my-3">

            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4 col-md-6 p-4 text-center" style="">
                    <div class="review-image text-center mt-3 mb-3">
                    </div>
                    <p class="mb-3"><i>"</i>Excelente curso y muy completo<i>"</i> </p>
                    <p class="mb-1"> <b>Carlos Trota</b></p>
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
                    <p class="mb-3">"Excelentes los cursos del pack. Me sorprendió la cantidad de información, empieza desde lo básico pero llega a niveles más avanzados. Es fácil de aprender, aunque cada tanto vuelvo a ver algunos videos para repasar temas puntuales
                        por cosas que surgen en mi trabajo"</p>
                    <p class="mb-1"> <b>Eliana Villaverde</b></p>
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
                    <p class="mb-3">"Primera vez que compro en esta academia y la verdad un diez. Respondieron mis dudas de Excel con agilidad... le doy 5/5" </p>
                    <p class="mb-1"> <b>Javier Trotta</b></p>
                    <div class="rating-user d-inline" style="">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" style="">
                <div class="col-lg-4 col-md-6 p-4 text-center" style="">
                    <div class="review-image text-center mt-3 mb-3">
                    </div>
                    <p class="mb-3">"Super práctico y sencillo de aprender"</p>
                    <p class="mb-1"> <b>Michelle Daneri</b></p>
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
    <div class="py-5 text-center text-white " style="background-color: rgb(39, 86, 154);">
        <div class="container">
            <h2 style="font-family: montserrat_bold;">Convertite en un profesional del&nbsp; Siglo XXI</h2>
            <h3>Dominá Word, Excel y PowerPoint... los programas esenciales para que tu currículum esté completo
            </h3>

            <div class="review-count  wow fadeIn  animated animated animated" data-wow-delay="1.2s" style="visibility: visible; animation-delay: 1.2s;">

                <p class="user_name d-inline pl-2 pr-4">Acceso de por vida con un único pago</p>
            </div>


            <p style="font-size: 18px;" class="font-weight-bold mt-3">Nuestro curso está valorado en <span class="h3 bold font-weight-bold" style=""><?= $precioCursoOficial ?></span>, <br> pero puede ser tuyo con esta oferta limitada

                <br><br> por solo
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
    <div class="py-5 text-center mx-auto">
        <div class="container text-center mx-auto">
            <div class="row text-center mx-auto justify-content-center">
                <div class="col-lg-2 p-3">
                    <div class="">
                        <div class="card-body p-4"> <i class="fas fa-play-circle display-1 mb-2" style="color: rgb(254, 197, 19);"></i>


                            <h5 style="font-family: montserrat_bold">9hs de contenido</h5>

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
            <h2 class="font-weight-bold text-center"><b>Más de 3.500 alumnos<br> de todo el país&nbsp;han aprendido el Word, Excel y PowerPoint gracias a nuestro curso y han logrado mejorar sus currículums</b>

            </h2>

            <div class="call-button mt-3  mx-auto text-center">
                <div class="col-md-3  mx-auto text-center">
                    <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg animated bg-success text-white animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Empezá por sólo <?= $precioCurso ?></a>
                </div>

            </div>

            <p style="font-size: 18px;" class="font-weight-regular mt-3">Estamos tan seguros de que te va a gustar que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>


        </div>
    </div>
    
    <?php include('../a-pages/footer.php')?>
</body>

</html>