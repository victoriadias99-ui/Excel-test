<?php
$dirpage = '../';

$idcurso = 'google_sheet';
include("../a-includes/funcionsDB.php");
include("../a-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$precioCursoOficial = $simbolo . ' ' . convertirPrecio(intval(($value / $curso['PORCENTAJE_DES']) * 100), $moneda);
$precioCurso = $simbolo . ' ' . convertirPrecio($value, $moneda);

// SEO
$seo_title = 'Curso de Google Sheets Online con Certificado | Hojas de Cálculo en la Nube';
$seo_description = 'Curso de Google Sheets online. Aprende hojas de cálculo en la nube, fórmulas, automatización y colaboración. Certificado oficial. Líderes en educación online.';
$seo_keywords = 'curso google sheets, google sheets online, hojas de cálculo nube, aprender google sheets, curso google sheets certificado, alternativa excel online, capacitaciones laborales';
$seo_slug = 'google-sheets';
$seo_og_title = 'Curso de Google Sheets Online con Certificado | Aprende Excel';
$seo_image = 'https://aprende-excel.com/n-img/googlesheets4.jpeg';
$seo_structured_data = json_encode([
    "@context" => "https://schema.org",
    "@type" => "Course",
    "name" => "Google Sheets",
    "description" => "Aprende Google Sheets desde cero. Hojas de cálculo en la nube con certificado oficial.",
    "provider" => ["@type" => "Organization", "name" => "Aprende Excel", "url" => "https://aprende-excel.com"],
    "url" => "https://aprende-excel.com/google-sheets/",
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
    <link href="css/google-sheet.css" rel="stylesheet">
</head>

<body style="font-family: montserrat_regular">
    <?php include('../a-pages/body.php'); ?>
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 col-sm-6 col-6 logo">
                    <a href="../" target="_blank"><img src="../a-img/logowhite.png" alt="logo" class="img-fluid"> </a>
                </div>
                <div class="col-md-3 hdphone">
                    <p> Aprendé a distancia</p>
                </div>
                <div class="col-md-3 hdphone">
                    <!-- img src="../assets/img/securityjpg.jpg" alt="security" class="img-fluid" -->
                </div>
                <div class="col-md-3 cta-button  col-sm-6 col-6">
                    <a class="hvr-sweep-to-right " href="checkout.php">Lo quiero</a>
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

                        <img src="img/google-sheets-1.jpg" class="img-fluid" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6">
                    <div class="  mt-md-4 mt-0">
                        <h5 style="color:black;" class="mb-0 pb-0">Google Sheets. Crea usa y comparte datos</h5>
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
                                <i class="fas fa-check text-success "></i> 5 horas de vídeo bajo demanda</li>

                            <li class="wow fadeIn" data-wow-delay="0.2" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> 11 video-clases</li>

                            <li class="wow fadeIn" data-wow-delay="0.4" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Acceso de por vida a todos los niveles</li>

                            <li class="wow fadeIn" data-wow-delay="0.5" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Paso a paso y desde 0. Sin requisitos previos</li>

                            <li class="wow fadeIn" data-wow-delay="0.6" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Acceso desde tu PC y celular</li>

                            <li class="wow fadeIn" data-wow-delay="0.7" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Certificado Oficial de participación</li>

                    </div>
                    <h3 class="bg-success text-white font-weight-bold p-2 mt-3 col-8 col-md-6 text-center">
                        <strike class="precio_full" id="precio_fudll"><?= $precioCursoOficial ?></strike>&nbsp;<span class="precio_oferta"><?= $precioCurso ?></span></h3>

                    <div class="call-button mt-5">
                        <div class="row">
                            <div class="col-md-6 ">
                                <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated shadow " data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Quiero este curso</a>
                            </div>
                            <div class="col-md-6 payments">
                                <img src="../a-img/payments.jpg" class="img-fluid wow flipInX  animated" data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            </div>
                        </div>
                    </div>
                    <div class="review-one mt-5">
                        <div class="review-text">
                            <p class="lead">"Excelente los videos, explicaciones claras y ejercicios prácticos. Muy recomendable y se aprende en pocas horas lo que te lleva meses aprender por tu cuenta."</p>
                        </div>
                        <div class="review-image">

                            <p class="user_name d-inline  font-weight-bold">Damian Latorre <br>
                                <i class="fa fa-star pl-1 " style="color:#ffd322;"></i>
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

    <div class="py-5 text-center mt-4" style="	background-image: url('img/fondo2.jpg');	background-position: center left;	background-size: cover;	background-repeat: repeat;">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-12 ">
                    <h3 class="text-white display-4 ">Google Sheets</h3>
                    <b>
		  <b>
		  <h4 class="text-white display-4">Más que una simple hoja de cálculos</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 align-items-center d-flex" style="">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-9 px-md-5" style="">
          <h1 class="display-4 mb-4">Dominalo en pocas horas</h1>
          <p class="lead mb-4">A través de este curso vas a aprender a usar Google Sheets desde cero. Explicados paso a paso en un total de 5 hs de videos, te enseñamos a usarla esta herramienta en profundidad.<br></p>
          <hr>
          <p class="lead" style="">Google Sheets es cada vez más utilizado por las empresas debido a su versatilidad, ya que permite trabajar una hoja de cálculo online para poder compartir y colaborar en proyectos editables desde la nube.<br></p>
          <div class="call-button mt-5 text-dark" >
            <div class="row justify-content-md-cen">
              <div class="col-lg-6 col-md-6 col-xs-12">
                <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg " data-wow-delay="0.2s">Quiero este curso 👉</a>
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
            <div class="col-lg-5 col-md-6 p-md-4 "> <img class="img-fluid d-block img-thumbnail"
                src="img/google-sheets-2.jpg" width="1500"> </div>
            <div class="col-md-6 offset-lg-1 d-flex flex-column justify-content-center py-4">
              <h1 class="text-left mb-4 font-weight-bold mt-4" style="font-family: montserrat_bold">Vas a aprender</h1>

              <ul>
                <li><i class="fas fa-check text-success "></i> Ventajas y desventajas</li>
                <li><i class="fas fa-check text-success "></i> Diferencias con una hoja de cálculo tradicional</li>
                <li><i class="fas fa-check text-success "></i> Crear bases </li>
                <li><i class="fas fa-check text-success "></i> Usar fórmulas</li>
                <li><i class="fas fa-check text-success "></i> Usar referencias a celdas</li>
                <li><i class="fas fa-check text-success "></i> Crear gráficas </li>
                <li><i class="fas fa-check text-success "></i> y mucho mas...!</li>
                <li> • No requiere conocimientos previos </li>
              </ul>

              <div class="card mt-3">
                <div class="card-header" id="headingII">
                  
                        <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapseII" aria-expanded="true" aria-controls="collapseII">
                     Ver temario completo</button>
                <div id="collapseII" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="text-align: left;">
                    <!-- div class="card-body" -->


                    <ul style="font-family: montserrat_regular;">
                    <li class=”mt-1”> <b> Lección 1 </b> - Introducción a Google Sheets y Hojas de Cálculo</li>
                    <li class=”mt-1”> <b> Lección 2 </b> - Bases de Google Sheets </li>
                    <li class=”mt-1”> <b> Lección 3 </b> - Introducción a Formatos </li>
                    <li class=”mt-1”> <b> Lección 4 </b> - Formulas > </li>
                    <li class=”mt-1”> <b> Lección 5 </b> - Funciones </li>
                    <li class=”mt-1”> <b> Lección 6 </b> - Referencias de celdas </li>
                    <li class=”mt-1”> <b> Lección 7 </b> - Funciones de Fecha </li>

                    <li class=”mt-1”> <b> Lección 8 </b> - Funciones de Texto </li>
                    <li class=”mt-1”> <b> Lección 9 </b> - Tablas</li>
                    <li class=”mt-1”> <b> Lección 10 </b> - Gráficas </li>
                    <li class=”mt-1”> <b> Lección 11 </b> - Compartir, exportar y recuperar </li>

                    </ul>
                </div>
            </div>
        </div>





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
                    <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg " data-wow-delay="0.2s">Inscribime en el curso</a>
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
                <div class="col-lg-4 p-3 col-md-6">
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
                            <h3 style="font-family: montserrat_bold">Acceso de por vida </h3>
                            <p class="mb-0 lead">El curso te queda para siempre para que puedas verlo cuando gustes, y puedas revisar el material cuando tengas dudas<br><span>&nbsp;<span></p>
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
          <h1 class="font-weight-bold  mb-md-5 " style="font-family: montserrat_bold">Lo que dicen nuestros alumnos/as
          </h1>
        </div>
      </div>
      <div class="row" style="font-family: montserrat_regular;">
        <div class="col-lg-4 col-md-6 p-4 text-center font-weight-regular " style="font-family: montserrat_regular;">
    
          
    
          <p class="mb-3"><i>"</i>Todos  deberíamos saber Google Sheets, tanto como sabemos hablar, para estos momentos que estamos viviendo por lo menos acá mi país Chile, es indispensable y lamento mucho no saber, por ello busco la manera de aprender..<i>"</i> </p>
          <p class="mb-1"> <b>Gabriela Gonzalez Cartes</b></p>
                    <div class="rating-user d-inline sombras " style="color:#ffd322;">
                        <i class="fa fa-star sombras"></i>
                        <i class="fa fa-star sombras"></i>
                        <i class="fa fa-star sombras"></i>
                        <i class="fa fa-star sombras"></i>
                        <i class="fa fa-star-half sombras"></i>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 p-4 text-center">

                    <p class="mb-3">"Excelente el método y las explicaciones, muy practico, muy recomendable."</p>
                    <p class="mb-1"> <b>Francisco Chazarreta</b></p>
                    <div class="rating-user d-inline sombras" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                </div>
                <div class="col-lg-4 p-4 text-center">

                    <p class="mb-3">"Recomiendo este curso, todo super claro y con demostraciones visuales para los que no nunca lo usaron" </p>
                    <p class="mb-1"> <b>Norma Gonzalez </b></p>
                    <div class="rating-user d-inline sombras" style="color:#ffd322;">
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
            <div class="row">
                <div class="col-lg-4 col-md-6 p-4 text-center">

                    <p class="mb-3">"La verdad que es muy ágil y fácil. Se puede reever las veces que sea necesario. Esta bueno para el que no sabe nada, y para el que tiene conocimiento como yo ayuda a reforzar. Excelente."</p>
                    <p class="mb-1"> <b>Lourdes Martino </b></p>
                    <div class="rating-user d-inline sombras" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                </div>
                <div class="col-lg-4 p-4 text-center">

                    <p class="mb-3"> <i>"Interesante, didáctico y dinámico. Me sirvio porque lo pude realizar en mis tiempos libres. Muchas gracias!"</i> </p>
                    <p class="mb-1"><b>Yésica Miño</b></p>
                    <div class="rating-user d-inline sombras" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-lg-4 p-4 text-center">

                    <p class="mb-3"> <i>"Muy bueno el curso. Tiene la ventaja de hacerlo en el tiempo que quieras y los horarios que quieras. Lo recomiendo"</i> </p>
                    <p class="mb-1"><b>Carolina Marone</b></p>
                    <div class="rating-user d-inline sombras" style="color:#ffd322;">
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
                    <div class="call-button mt-5 text-center mx-auto">
                        <div class="row justify-content-md-cen">
                            <div class="col-md-3 mx-auto">
                                <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow  flipInX shadow-lg " data-wow-delay="0.2s">Inscribirme</a>
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
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="mt-2 mb-1 pb-3 text-dark" style="font-family: montserrat_bold"><i class="fa fa-question-circle" aria-hidden="true">&nbsp;</i>Preguntas Frecuentes&nbsp;</h2>
            </div>
            <div class="accordion mt-4 text-left" id="accordionExample">
                <div class="card">
                    <div class="card-header text-left" id="headingOne">
                        <h5 class="mb-0 text-left"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo
                tengo?</button></h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                        <div class="card-body"> ¡De por vida! Una vez que abones vas a tener acceso para siempre. Lo vas a poder descargar en tu PC, notebook, tablet o celular.</div>
                    </div>
                </div>
                <div class="card text-left">
                    <div class="card-header text-left" id="headingTwo">
                        <h5 class="mb-0 text-left" style=""><button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto tiempo tardo en
                terminarlo?</button></h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
                        <div class="card-body text-left">5hs de video es la duración total del curso.</div>
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
                        <div class="card-body">No requiere conocimientos previos. Sólo necesitás una PC o Notebook y una cuenta Gmail. Si no tenés la cuenta, dentro del curso te enseñamos cómo crearla</div>
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
                             <li class=”mt-1”> <b> Lección 1 </b> - Introducción a Google Sheets y Hojas de Cálculo</li>
                             <li class=”mt-1”> <b> Lección 2 </b> - Bases de Google Sheets </li>
                             <li class=”mt-1”> <b> Lección 3 </b> - Introducción a Formatos en Google Sheets </li>
                             <li class=”mt-1”> <b> Lección 4 </b> - Formulas en Google Sheets > </li>
                             <li class=”mt-1”> <b> Lección 5 </b> - Funciones en Google Sheets  </li>
                             <li class=”mt-1”> <b> Lección 6 </b> - Referencias de celdas en Google Sheets </li>
                             <li class=”mt-1”> <b> Lección 7 </b> - Funciones de Fecha en Google Sheets </li>
                         
                             <li class=”mt-1”> <b> Lección 8 </b> - Funciones de Texto en Google Sheets </li>
                             <li class=”mt-1”> <b> Lección 9 </b> - Tablas en Google Sheets </li>
                             <li class=”mt-1”> <b> Lección 10 </b> - Gráficas en Google Sheets </li>
                             <li class=”mt-1”> <b> Lección 11 </b> - Compartir, exportar y recuperar </li>
                                             
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div class="call-button mt-5">
                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg " data-wow-delay="0.2s">Quiero
              anotarme</a>
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
                        <img src="img/google-sheets-1.jpg" class="img-fluid" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6" style="">
                    <div class=" ">
                        <h3>
                        </h3>
                        <h1 class="display-5" style="font-family: montserrat_bold">Adquiere un conocimiento clave en 5hs</h1>
                    </div>
                    <div class="feature-list mt-4 lead">
                        <p> • Accedé hoy y tenlo de por vida. Pago por única vez (sin suscripciones ni pagos mensuales). <br>• Garantía de devolución de 7 días</p>
                        <h3 class="bg-success text-white font-weight-bold p-2 mt-3 col-8 col-md-6 text-center">
                            <strike class="precio_full"><?= $precioCursoOficial ?></strike>&nbsp;&nbsp;&nbsp;<span class="precio_oferta"><?= $precioCurso ?></span></h3>

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