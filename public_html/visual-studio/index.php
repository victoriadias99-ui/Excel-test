<?php
$dirpage = '../';

$idcurso = 'visualstudio';
include("../a-includes/funcionsDB.php");
include("../a-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$precioCursoOficial = $simbolo . ' ' . convertirPrecio(intval(($value / $curso['PORCENTAJE_DES']) * 100), $moneda);
$precioCurso = $simbolo . ' ' . convertirPrecio($value, $moneda);

// SEO
$seo_title = 'Curso de Visual Studio Online con Certificado | Desarrollo de Software';
$seo_description = 'Curso de Visual Studio online. Aprende desarrollo de software y programación con certificado oficial. Inteligencia artificial y tecnología. Líderes en educación online.';
$seo_keywords = 'curso visual studio, visual studio online, desarrollo software, programación visual studio, certificado visual studio, capacitaciones laborales, inteligencia artificial';
$seo_slug = 'visual-studio';
$seo_og_title = 'Curso de Visual Studio Online con Certificado | Aprende Excel';
$seo_image = 'https://aprende-excel.com/n-img/visualstudio4.jpeg';
$seo_structured_data = json_encode([
    "@context" => "https://schema.org",
    "@type" => "Course",
    "name" => "Visual Studio",
    "description" => "Aprende Visual Studio y desarrollo de software. Curso online con certificado oficial.",
    "provider" => ["@type" => "Organization", "name" => "Aprende Excel", "url" => "https://aprende-excel.com"],
    "url" => "https://aprende-excel.com/visual-studio/",
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
        <header class="bg" style="background-color:#69237c">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-2 col-sm-6 col-6 logo">
                        <a href="../" target="_blank"><img src="../a-img/logowhite.png" alt="logo" class="img-fluid"> </a>
                    </div>
                    <div class="col-md-3 hdphone">
                        <p> </p>
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
                            <img src="img/visual.jpg" class="img-fluid my-auto py-auto align-items-center justify-content-center pt-5 pt-md-5 mt-md-5" alt="curso de visual studio">
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp;</div>
                    <div class="col-md-6">
                        <div class="section-heading ">
                            <h3 style="color:black;">Curso online a distancia</h3>
                            <h1 class="mt-4  " style=""><b>APRENDÉ A<span style="font-family: montserrat_black ;"> PROGRAMAR EN C#</span></b></h1>
                        </div>
                        <div class="feature-list mt-4">
                            <ul class="font-weight-light" style="font-family: montserrat_light ;">
                                <li class="wow fadeIn  animated" data-wow-delay="0.1" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;"><i class="fas fa-check-circle text-dark"></i> 7 hs de video paso a paso</li>
                                <li class="wow fadeIn animated" data-wow-delay="0.2" style="visibility: visible;-webkit-animation-delay: 0.2; -moz-animation-delay: 0.2; animation-delay: 0.2;"> <i class="fas fa-check-circle text-dark"></i> Acceso para siempre al curso</li>
                                <li class="wow fadeIn animated" data-wow-delay="0.3" style="visibility: visible;"><i class="fas fa-check-circle text-dark"></i> Otorgamos Certificado Oficial</li>
                                <li class="wow fadeIn animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;"><i class="fas fa-check-circle text-dark"></i> Estudialo desde tu PC, notebook, tablet o Celular</li>
                                <li class="wow fadeIn animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;"><i class="fas fa-check fa-check-circle text-dark"></i> Creado por nuestro profesor <span style="font-family: montserrat_bold; color:black;"> con amplia experiencia</span></li>
                            </ul>
                            <h3 class="mt-md-4 p-2 mt-3 col-8 col-md-6 text-center" style="background-color:#f3c910; color:black;font-family: montserrat_regular;"><span class="font-weight-bold ">¡OFERTA LANZAMIENTO!</span></h3>
                            <h3 class="mt-md-4 p-2 mt-3 col-8 col-md-6 text-center" style="background-color:#f3c910; color:black;font-family: montserrat_regular;"><strike><?= $precioCursoOficial ?></strike><span class="font-weight-bold "> <?= $precioCurso ?></span></h3>
                            <p style="font-family: montserrat_bold">Aprende Excel es una empresa Argentina. Éste precio es final y en Pesos Argentinos</p>

                        </div>
                        <div class="call-button mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated shadow text-dark" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s; background-color:#f3c910;">Lo quiero</a>
                                </div>
                                <div class="col-md-6 payments">
                                    <img src="../a-img/security.png" class="img-fluid wow flipInX animated pt-md-2 " data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                </div>
                            </div>
                        </div>
                        <div class="review-one mt-5 mt-md-3">
                            <div class="review-text">
                                <h5 style="font-family: montserrat_regular" class="font-weight-light">"Ideal para principiantes que quieren aprender a programar, ya estoy desarrollando!"</h5>
                            </div>
                            <div class="review-image">
                                <p class="user_name d-inline" style="font-family: montserrat_bold;">Fernando Viale<i class="ml-3 fa fa-star" style="color:#ffd322;"></i>
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
        <div class="py-5 text-center mt-5 pt-5 bg" style="background-color:#69237c">
            <div class="container">
                <div class="row">
                    <div class="mx-auto col-md-12">
                        <h1 class="text-white " style="font-family: montserrat_bold">¡Sumate a una de las carreras <span style="font-family: montserrat_black;">mejor remuneradas</span> del mundo!</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5 align-items-center d-flex" style="">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 px-md-5 mx-auto" style="">


                        <p class="font-weight-light lead mb-4"> Visual Studio es el software más usado para programar en cualquier lenguaje. En este curso vas a aprender a programar en C#, para que puedas llevar a cabo cualquier proyecto que te propongas. <span style="background-color:#f3c910; color:black;"
                                                                                                                                                                                                        class="p-1 font-w">Ideal para principiantes.</span>

                        <p class="lead mb-4">Tengas la edad que tengas, a través de este curso explicado paso a paso en 7 horas de videos, vas a aprender los conocimientos necesarios para dominar este poderoso lenguaje de programación.</p>
                        <hr>
                        <p class="lead" style=""> Requsitos: Tener Visual Studio instalado (es gratuito)<br></p>
                        <div class="call-button mt-5">
                            <div class="row justify-content-md-cen">
                                <div class="col-md-5">
                                    <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg text-dark" data-wow-delay="0.2s">Inscribirme</a>
                                </div>
                            </div>
                            <div class="rating-user d-inline"><br>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half"></i>
                            </div>
                            <p class="user_name d-inline pl-4 pr-4 font-weight-light">+850 estudiantes</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="py-5 bg text-white" style="background-color:#69237c">
            <div class="container ">
                <div class="row mx-auto">
                    <div class="col-lg-5 col-md-6 p-md-4   mx-0 px-0 "> <img class="img-fluid d-block rounded shadow  " src="img/2.jpg" width="1500"> </div>
                    <div class="col-md-6 offset-lg-1 d-flex flex-column justify-content-center py-4">
                        <h2 class="my-3 mx-auto mx-md-1 mt-5 mt-md-1" style="font-family: montserrat_bold"> <b>Vas a aprender:</b></h2>
                        <ul class="mx-auto mx-md-1 lead">
                            <li><i class="fas fa-check " style="color:#f3c910;"></i> Variables. Estructuras de control, sintaxis, funciones y bucles.</li>
                            <li><i class="fas fa-check  " style="color:#f3c910;"></i> Tipos de datos</li>
                            <li><i class="fas fa-check " style="color:#f3c910;"></i> Estructuras Secuenciales simples y complejas</li>
                            <li><i class="fas fa-check " style="color:#f3c910;"></i> Modularidad y encapsulamiento</li>
                            <li><i class="fas fa-check  " style="color:#f3c910;"></i> Objetivos y clases</li>
                            <li><i class="fas fa-check " style="color:#f3c910;"></i> Herencia y excepciones</li>
                            <li><i class="fas fa-check  " style="color:#f3c910;"></i> Arreglos Unidimensionales y Bidimensionales</li>
                            <li><i class="fas fa-check  " style="color:#f3c910;"></i> y muchos más temas!</li>
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
                        <p class="mb-3"><i>"</i>Si bien aún lo estoy realizando, lo recomiendo para usuarios principiantes que quieran introducirse en el tema. El profesor explica bien, en detalle y apto para personas como yo que recién empiezan en este mundo<i>"</i> </p>
                        <p class="mb-1"> <b>Miguel Neuss</b></p>
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
                        <p class="mb-3">Excelente, me ayudó a asentar varios conocimientos que tenia flojos. Recomendado para principiantes!!"&nbsp;&nbsp;</p>
                        <p class="mb-1"> <b>Alejandro Nerea</b></p>
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
                        <p class="mb-3">"Se nota la experiencia del instructor. Transmite bien los conocimientos básicos, y eso es clave para desarrollarse como programador con una base sólida en C. Superó mis expectativas " </p>
                        <p class="mb-1"> <b>Mauricio Esquivel</b></p>
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
                        <p class="mb-3">"Lo recomiendo ampliamente para iniciarse en la programación."</p>
                        <p class="mb-1"> <b>Patricia Reynoso</b></p>
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
                        <p class="mb-3">"Vengo acostumbrado a ver cosas por youtube pero siempre me quedan dudas o no se entiende bien. Creo que lo más valioso de este curso es la sencillez con la que es explicado, y además que pude solventar todas mis dudas rápidamente
                            con el profesor mediante e-mail"</p>
                        <p class="mb-1"> <b>Nahuel Romero</b></p>
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
                        <p class="mb-3"> "Como siempre, encantada con el material. He realizado Excel avanzado y Power BI y hace unos días hice este de programación. A quien no haya adquirido cursos de esta academia, se los recomiendo ampliamente"</p>
                        <p class="mb-1"><b>Malena Castelli</b></p>
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


        <div class="py-5">
            <hr>
        </div>

        <!-- FAQ -->
        <section>
            <div class="container col-md-6">
                <div class="section-heading ">
                    <h2 class="mt-2 mb-1 pb-3 text-dark" style="font-family: montserrat_bold"><i class="fa fa-question-circle" aria-hidden="true">&nbsp;</i>Preguntas Frecuentes&nbsp;</h2>
                </div>
                <div class="accordion mt-4" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0" style=""><button class="btn btn-link text-left " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo tengo?</button></h5>
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
                            <div class="card-body">7 hs de videos es la duración total del curso.</div>
                        </div>
                    </div>
                    <div class="card text-left">
                        <div class="card-header " id="headingFour">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">#3 ¿Incluye Certificado o Diploma?</button></h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                            <div class="card-body">Una vez termines el curso podés solicitarnos gratis la Certificado de Cursado.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">#4 ¿Qué requisitos tiene?</button></h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                            <div class="card-body">Tener instalado Visual Stuido y nada mas!</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h5 class="mb-0 text-left">
                                <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">#5 ¿Cuál es el temario completo?</button></h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="">
                            <div class="card-body">

                                <ul>
                                    <li>Clase 1 – Introducción - ¿Qué es Microsoft.NET? Lenguaje C# - Entorno Visual Studio</li>
                                    <li>Clase 2 – Creando Primer Proyecto (Consola - Formulario)</li>
                                    <li>Clase 3 – Tipo de Datos – Conversión de tipos</li>
                                    <li>Clase 4 – Comentarios, Variables, Métodos, Campos Instrucciones.</li>
                                    <li>Clase 5 – Interface Gráfica (Formularios Windows)</li>
                                    <li>Clase 6 – Propiedades, Eventos y delegados, Atributos.</li>
                                    <li>Clase 7 – Estructuras Secuenciales I</li>
                                    <li>Clase 8 – Estructuras Secuenciales II</li>
                                    <li>Clase 9 – Estructuras Algorítmicas Condicionales Simples I (Operadores de Comparación)</li>
                                    <li>Clase 10 – Estructuras Algorítmicas Condicionales Simples II (Operadores Lógicos)</li>
                                    <li>Clase 11 – Estructuras Algorítmicas Condicionales Múltiples</li>
                                    <li>Clase 12 – Estructuras Repetitivas I</li>
                                    <li>Clase 13 – Estructuras Repetitivas II</li>
                                    <li>Clase 14 – Estructuras Repetitivas III</li>
                                    <li>Clase 15 – Modularidad y Encapsulamiento</li>
                                    <li>Clase 16 – Objetivos y Clases</li>
                                    <li>Clase 17 - Herencia</li>
                                    <li>Clase 18 - Excepciones</li>
                                    <li>Clase 19 - Arreglos Unidimensionales (Vectores)</li>
                                    <li>Clase 20 - Arreglos Bidimensionales (Matrices)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="call-button mt-5">
                    <div class="row justify-content-md-center">
                        <div class="col-md-3">
                            <a href="checkout.php" class="sc-roll hvr-sweep-to-top  wow flipInX animated text-dark" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Lo quiero </a>
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
                            <img src="img/3.jpg" class="img-fluid rounded shadow" alt="product">
                        </div>
                    </div>
                    <div class="col-md-1">&nbsp;</div>
                    <div class="col-md-6" style="">
                        <div class="section-heading">
                            <h3>
                            </h3>
                            <h1 class="font-weight-bold text-left" style="font-family: montserrat_black">Sumá C# a tu CV</h1>
                        </div>
                        <div class="feature-list mt-4">
                            <p> • Pago por única vez en Pesos Argentinos (sin suscripciones ni pagos mensuales). <br>• Garantía de devolución de 7 días</p>
                            <h3 class="mt-md-4 p-2 mt-3 col-8 col-md-6 text-center" style="background-color:#69237c; color:white;font-family: montserrat_regular;"><span class="font-weight-bold "> OFERTA LANZAMIENTO!</span></h3>
                            <h3 class="mt-md-4 p-2 mt-3 col-8 col-md-6 text-center" style="background-color:#f3c910; color:black;font-family: montserrat_bold;"><strike><?= $precioCursoOficial ?></strike><span class="font-weight-bold "> <?= $precioCurso ?></span></h3>
                        </div>
                        <div class="call-button mt-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated text-dark shadow" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Inscribirme</a>
                                </div>
                                <div class="col-md-6 payments ">
                                    <img src="../a-img/seguridad.png" class="img-fluid wow flipInX animated px-5 px-md-0 mt-md-0 mt-3 " data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include('../a-pages/footer.php') ?>
    </body>
</html>