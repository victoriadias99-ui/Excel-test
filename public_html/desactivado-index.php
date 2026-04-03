<?php
$dirpage = '';
if(isset($_GET)){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

include("a-includes/funcionsDB.php");
include("a-includes/logicparametros.php");


?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" media="screen" href="css/theme.min.css">
        <link rel="stylesheet" media="screen" href="css/menu.css">
        <link rel="stylesheet" media="screen" href="css/style.css">

        <meta name="google-site-verification" content="sVk708HLkFaamx5q_YGfwrpVOSMpkSuh6XJhfMkaHc4">
        <meta charset="utf-8">
        <title>Aprende Excel | Comunidad Online </title>
        <!-- SEO Meta Tags-->
        <meta name="description" content="Aprendé de 0 a 100 Microsoft Excel a través de videos desde la comunidad de tu casa">
        <meta name="keywords" content="aprende excel, cursos online de microsoft excel, curso aprender excel, aprende excel cursos">
        <meta name="author" content="Aprende Excel">
        <!-- Viewport-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon and Touch Icons-->

        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <link rel="manifest" href="assets/img/site.webmanifest">
        <link rel="mask-icon" href="assets/img/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" media="screen" href="a-libraries/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
        <link rel="stylesheet" media="screen" href="css/vendor.min.css">
        <!-- Main Theme Styles + Bootstrap-->

        <link rel="stylesheet" media="screen" href="css/theme.min.css">
        <link rel="stylesheet" media="screen" href="css/menu.css">
        <link rel="stylesheet" media="screen" href="css/style.css">

        <meta name="google-site-verification" content="zx1ETcfMVvGFQG3GNNf-6Mt5XvXwMak-6VKmbCahV-U" />
    </head>

    <body style="margin-top: 0px; padding-top: 0px;">


        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light shadow-sm p-0 mb-0 bg-white">
            <div class="container-fluid">
                <a class="navbar-brand mr-5" href=""><img class="img-responsive" src="img/logojpg.jpg" alt="Logo" class=""></a>
                <!-- button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button -->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse px-3" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-lg-0">

                        <li class="nav-item active">
                            <a class="nav-link" href="/">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Excel</a>
                            <div class="dropdown-menu px-2" aria-labelledby="navbarDropdown1">
                                <a class="nav-link dropdown-item" href="excel-inicial">Excel Nivel Inicial</a>
                                <a class="nav-link dropdown-item" href="excel-intermedio">Excel Nivel Intermedio</a>
                                <a class="nav-link dropdown-item" href="excel-avanzado">Excel Nivel Avanzado</a>
                                <a class="nav-link dropdown-item" href="excel-promo">Excel promo 3 en 1</a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Power BI</a>
                            <div class="dropdown-menu px-2" aria-labelledby="navbarDropdown2">
                                <a class="nav-link dropdown-item" href="power-bi">Power BI Nivel Inicial</a>
                                <a class="nav-link dropdown-item" href="power-bi-avanzado">Power BI Avanzado</a>
                                <a class="nav-link dropdown-item" href="power-bi-y-excel">Power BI + Excel 3 en 1</a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Office</a>
                            <div class="dropdown-menu px-2" aria-labelledby="navbarDropdown3">
                                <a class="nav-link dropdown-item" href="excel-inicial">Microsoft Excel</a>
                                <a class="nav-link dropdown-item" href="word">Microsoft Word</a>
                                <a class="nav-link dropdown-item" href="power-point">Microsoft Power Point</a>
                                <a class="nav-link dropdown-item" href="pack-office">Pack Office promo 3 en 1</a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown5" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Programación
                            </a>
                            <div class="dropdown-menu px-2" aria-labelledby="navbarDropdown5">
                                <a class="nav-link dropdown-item" href="visual-studio">Visual Studio en C#</a>
                                <a class="nav-link dropdown-item" href="microsoft-sql-server">Base de datos con SQL SERVER</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown5" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gerencia De Proyectos
                            </a>
                            <div class="dropdown-menu px-2" aria-labelledby="navbarDropdown5">
                                <a class="nav-link dropdown-item" href="microsoft-project-inicial">Gerencia De Proyectos Inicial</a>
                                <a class="nav-link dropdown-item" href="microsoft-project-intermedio">Gerencia De Proyectos Intermedio</a>
                                <a class="nav-link dropdown-item" href="microsoft-project-avanzado">Gerencia De Proyectos Avanzado</a>
                                <a class="nav-link dropdown-item" href="pack-project">Gerencia De Proyectos 3 en 1 Promo</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown5" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Otros
                            </a>
                            <div class="dropdown-menu px-2" aria-labelledby="navbarDropdown5">
                                <a class="nav-link dropdown-item" href="windows-server">Windows Server</a>
                                <a class="nav-link dropdown-item" href="petroleo">Introducción al Petróleo</a>
                                <a class="nav-link dropdown-item" href="google-sheets">Google Sheets</a>

                            </div>
                        </li>
						<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://aprende-excel.com/clases-en-vivo-excel-inicial/">
                                Clases en Vivo
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://aprende-excel.com/plan-empresa/">
                                Plan Empresarial
                            </a>
                            
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <!-- Page Content-->
        <!-- Hero-->
        <div class="py-5 mt-5 text-center text-md-right" style="	background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.9)), url(&quot;img/fondtop.jpg&quot;);	background-position: top left, center;	background-size: 100%, cover;	background-repeat: repeat, repeat;	background-attachment: fixed;">
            <div class="container py-5">
                <div class="row">
                    <div class="p-5 mx-auto mx-md-0 ml-md-auto col-10 col-md-9">
                        <h3 class="block-title text-white display-4">Academia Aprende Excel</h3>
                        <p class="mb-3 lead text-white">Cursos a distancia</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services-->
        <section class="container py-5 my-2 my-md-4">
            <h2 class="h3 block-title text-center" style="">Capacitate para los empleos de hoy<br>🏆</h2>
        </section>
        <!-- CTA #1-->
        <section class="py-5 " style="	background-color: #;	background-image: url(&quot;img/fondo3.jpg&quot;);	background-position: top left;	background-size: 100%;	background-repeat: no-repeat;" id="gr">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-md-6 offset-xl-1"><img class="d-block mx-auto img-thumb border rounded img-thumbnail" src="img/laptopconlogo.jpg" alt="CreateX Marketing"></div>
                    <div class="col-xl-5 col-md-6 text-center text-md-left py-5" style="">
                        <h2 class="h3 block-title text-white">Cursos cortos con amplia salida laboral</h2>
                        <p class="text-lg text-white py-3">Aprendé a dominar las herramientas que más necesitan las empresas argentinas. Aprendé a dominar las herramientas que más necesitan las empresas argentinas. Utilizá este momento de cuarentena obligatoria para alcanzar una mejor versión
                            de vos adquiriendo conocimientos nuevos.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-3 " style="	background-color: #;	background-image: url(&quot;img/fondo3.jpg&quot;);	background-position: top left;	background-size: 100%;	background-repeat: no-repeat;" id="ch">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-md-6 offset-xl-1"><img class="d-block mx-auto img-thumb border rounded img-thumbnail" src="img/laptopconlogo.jpg" alt="CreateX Marketing"></div>
                    <div class="col-xl-5 col-md-6 text-center text-md-left py-5" style="">
                        <h2 class="h3 block-title text-dark">Cursos cortos con amplia salida laboral</h2>
                        <p class="text-lg text-dark py-3" style=""><br>Aprendé a dominar las herramientas que más necesitan las empresas argentinas. Utilizá este momento de cuarentena obligatoria para alcanzar una mejor versión de vos adquiriendo conocimientos nuevos.<br></p>
                    </div>
                </div>
                <hr>
            </div>
        </section>
        <!-- Pricing Plans-->


        <section class="container-fluid pb-5 bg-light text-dark" style="	background-color: #;"></section>


        <div class="py-4 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 p-3">
                        <div class="card">
                            <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/certificado.jpg" width="150">
                                <h4>Constancia de cursado</h4>
                                <p class="mb-0">Te brindamos una constancia oficial de participación por cada curso que realices</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-3 col-md-6">
                        <div class="card">
                            <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/soporte.jpg" width="150">
                                <h4>Soporte </h4>
                                <p class="mb-0">Vamos a ayudarte con cada duda que tengas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-3 col-md-6">
                        <div class="card">
                            <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/acceso.jpg" width="150">
                                <h4>Acceso para siempre</h4>
                                <p class="mb-0">Cada curso que adquieras te queda disponible de por vida, para que lo puedas hacer a tu ritmo y revisarlo cuantas veces quieras</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="container py-3 mt-3">
            <hr>
            <section class="container py-5 mb-3 col-md-12">
                <h2 class="h3 block-title text-center mt-3" id="cursos">Nuestros Cursos</h2>
                <div>
                    <button class="filter1 pr-3 btn btn-link">Excel</button>
                    <button class="filter1 pr-3 btn btn-link">Power BI</button>
                    <button class="filter1 pr-3 btn btn-link">Office</button>
                    <button class="filter1 pr-3 btn btn-link">Programación</button>
                    <button class="filter1 pr-3 btn btn-link">Gerencia de Proyectos</button>
                    <button class="filter1 pr-3 btn btn-link">Otros</button>
                    <button class="filter1 pr-3 btn btn-link">Todos</button>
                </div>
                <div class="row pt-4 justify-content-center">
                    <!-- Portfolio Item-->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/excelinicial.jpg" alt="Portfolio Thumbnail">
                        <div class="card-body">

                            <h5 class="portfolio-title">#1: Excel nivel inicial - Desde cero<br></h5>
                        </div>
                        <div class="card-tag d-none">Excel Office</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="excel-inicial/">Sin requisitos previos, éste curso te va a enseñar a usar Microsoft Excel: la herramienta laboral más solicitada por las empresas.<br></a> 
                                <a class="btn btn-lg btn-block" href="excel-inicial" style="background-color:#4eaf4e; color:white;" target="_blank">👉 Ver Curso</a></div>
                            <div class="portfolio-meta"> </div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/excelintermedio.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">#2: Excel Nivel Intermedio</h5>
                        </div>
                        <div class="card-tag d-none">Excel</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="excel-intermedio/" target="_blank">Entrenamiento para usuarios que ya tienen los conocimientos básicos de Microsoft Excel, para aprender en profundidad la mayoría de sus funcionalidades.<br></a>
                                <a class="btn btn-lg btn-block" href="excel-intermedio" target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver Curso</a>
                            </div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/excelavanzado.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">#3: Excel Nivel Avanzado</h5>
                        </div>
                        <div class="card-tag d-none">Excel</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="excel-avanzado/" target="_blank">Curso para terminar de conocer Excel y dominar sus funcionalidades más avanzadas. Ser Experto en Excel otorga una gran ventaja y abre las puertas a empleos muy bien pagos.<br></a>
                                <a class="btn btn-lg btn-block" href="excel-avanzado" target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver Curso</a>
                            </div>
                        </div>
                    </div>
                    <!-- div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="/img/google-sheets/google-sheets-1.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Google Sheets</h5>
                        </div>
                        <div class="card-tag d-none">Excel Google Sheets Otros</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="google-sheets/" target="_blank">Dominá la herramienta de Hojas de Cálculo Online más utilizada del mercado<br></a>
                                <a class="btn btn-lg btn-block" href="google-sheets/" target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/powerbi.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Microsoft Power BI</h5>
                        </div>
                        <div class="card-tag d-none">POWER BI</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="power-bi/" target="_blank">Un especialista en Power BI gana un sueldo 3 vecess mayor a la media. Ésta herramienta de Inteligencia Empresarial permite crear tableros para visualizar datos. Sin requisitos previos<br></a>
                                <a class="btn btn-lg btn-block" href="power-bi" target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver Curso</a>
                            </div>
                        </div>
                    </div>
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/powerbi-avanzado/powerbi-avanzado.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Microsoft Power BI Avanzado</h5>
                        </div>
                        <div class="card-tag d-none">POWER BI</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="power-bi-avanzado/" target="_blank">Profundizá tus conocimientos a través de este Curso Avanzado de Power BI en 4.5 horas de curso<br></a>
                                <a class="btn btn-lg btn-block" href="power-bi-avanzado/" target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver Curso</a>
                            </div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/excel-experto.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">3 NIVELES - PACK EXPERTO</h5>
                        </div>
                        <div class="card-tag d-none">EXCEL</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="excel-promo/" target="_blank">Convertite en un Experto en Excel con este pack de 3 cursos. ¡Sé el experto que las empresas están buscando!<br></a>
                                <a class="btn btn-lg btn-block" href="excel-promo/" target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver Curso</a>
                            </div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/office/office2.jpeg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Pack Office</h5>
                        </div>
                        <div class="card-tag d-none">EXCEL OFFICE</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="pack-office/" target="_blank">Pack de conocimientos clave e infaltables en un Currículum. Dominá las 3 herramientas más solicitadas por las empresas.<br></a>
                                <a class="btn btn-lg btn-block" href="pack-office/"
                                                                                                                                                                                                        target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/word.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Microsoft Word: curso completo</h5>
                        </div>
                        <div class="card-tag d-none">OFFICE</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="word/" target="_blank"> Aprendé a dominar con facilidad el procesador de texto más utilizado del mundo: Microsoft Word. Sin requisitos previos<br> 
                                    <a class="btn btn-lg btn-block" href="word" target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver Curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/powerpoint.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Microsoft Power Point</h5>
                        </div>
                        <div class="card-tag d-none">OFFICE</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="power-point/" target="_blank">Creá fácilmente presentaciones atractivas, cursos, diapositivas y mucho más. Sin requisitos previos <br></a>
                                <a class="btn btn-lg btn-block" href="power-point/" target="_blank"
                                                                                                                                                                                                        style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/curso-visual-studio.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Programación en C# con Visual Studio</h5>
                        </div>
                        <div class="card-tag d-none">Programación</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="visual-studio/" target="_blank">Iniciate en el mundo de la programación a través de este poderoso lenguaje<br></a>
                                <a class="btn btn-lg btn-block" href="visual-studio/" target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/microsoft-project-bottom.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Microsoft Project Inicial</h5>
                        </div>
                        <div class="card-tag d-none">Gerencia de proyectos</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="microsoft-project-inicial/" target="_blank">Iniciate en la administración y desarrollo de proyectos y escalá tu puesto laboral.<br></a>
                                <a class="btn btn-lg btn-block" href="microsoft-project-inicial/"
                                                                                                                                                                                                        target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/microsoft-project-intermedios-top.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Microsoft Project Intermedio</h5>
                        </div>
                        <div class="card-tag d-none">Gerencia de proyectos</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="microsoft-project-intermedio/" target="_blank">Se continúa en profundidad el nivel inicial<br></a>
                                <a class="btn btn-lg btn-block" href="microsoft-project-intermedio/" target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/project-3.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Microsoft Project Avanzado</h5>
                        </div>
                        <div class="card-tag d-none">Gerencia de proyectos</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="microsoft-project-avanzado/" target="_blank">Nivel 3 de Microsoft Project. Completá tus conocimientos y se todo un profesional de Microsoft Project.<br></a>
                                <a class="btn btn-lg btn-block" href="microsoft-project-avanzado/"
                                                                                                                                                                                                        target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/sql.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Microsoft SQL Server</h5>
                        </div>
                        <div class="card-tag d-none">Programación</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="microsoft-sql-server/" target="_blank">Aprendé a programar en base de datos desde cero. Recomendable para principiantes<br></a>
                                <a class="btn btn-lg btn-block" href="microsoft-sql-server/" target="_blank"
                                                                                                                                                                                                  style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/ws-01.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Windows Server</h5>
                        </div>
                        <div class="card-tag d-none">Otros</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="windows-server/" target="_blank">Aprendé de cero a cien cómo administrar servidores Windows.<br></a>
                                <a class="btn btn-lg btn-block" href="windows-server/" target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/petroleo-01.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Introducción al Petróleo</h5>
                        </div>
                        <div class="card-tag d-none">Petroleo Otros</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="petroleo/" target="_blank">Incursioná en el mundo petrolero. Con este curso introductorio vas a tener una base inicial para aplicar en empleos de la industria petrolera.<br></a>
                                <a class="btn btn-lg btn-block" href="petroleo/" target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="img/pack-power-bi-y-excel.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Pack Experto en Excel + Power BI</h5>
                        </div>
                        <div class="card-tag d-none">Excel Power BI</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="power-bi-y-excel/" target="_blank">Convertite en el Experto/a que las empresas necesitan, aprendiendo los 3 niveles de Excel y Power BI<br></a>
                                <a class="btn btn-lg btn-block" href="power-bi-y-excel/" target="_blank"
                                                                                                                                                                                                        style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="/img/ms-project/6.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Pack Experto Ms Project</h5>
                        </div>
                        <div class="card-tag d-none">Gerencia de proyectos</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="pack-project/" target="_blank">Aprendiendo los 3 niveles de Microsoft Project vas a poder administrar todos los proyectos que te propongas como un experto.<br></a>
                                <a class="btn btn-lg btn-block" href="pack-project/"
                                                                                                                                                                                                        target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->
                    <!-- div class="col-md-3 col-sm-6 mb-30 pb-2" -->
                    <div class="card portfolio-card col-md-3 col-sm-6 mb-30 pb-2"> <img src="metodologias-agiles/img/ma2.jpg" alt="Portfolio Thumbnail" style="">
                        <div class="card-body">
                            <h5 class="portfolio-title">Metodologías ágiles</h5>
                        </div>
                        <div class="card-tag d-none">METODOLOGÍAS ÁGILES</div>
                        <div class="card-footer">
                            <div><a class="tag-link" href="metodologias-agiles/" target="_blank">Aprendé a gestionar proyectos innovadores usando métodos y herramientas del mundo Agile. Dominá la gestion en entornos complejos y utilizá prácticas ágiles en tus proyectos.<br></a>
                                <a class="btn btn-lg btn-block" href="metodologias-agiles/"
                                                                                                                                                                                                        target="_blank" style="background-color:#4eaf4e; color:white;">👉 Ver curso</a></div>
                        </div>
                    </div>
                    <!-- /div -->


                </div>
                </div>
            </section>
        </section>
        <hr>
        <section class="py-5 " style="	background-color: #;	background-image: url(&quot;img/fondo3.jpg&quot;);	background-position: top left;	background-size: 100%;	background-repeat: no-repeat;" id="">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-md-6 offset-xl-1"><img class="d-block mx-auto img-thumb border rounded img-thumbnail" src="img/empresa.jpg" alt="CreateX Marketing"></div>
                    <div class="col-xl-5 col-md-6 text-center text-md-left py-5" style="">
                        <h2 class="h3 block-title text-dark" id="ch">¿Tenés un negocio?</h2>
                        <h2 class="h3 block-title text-white" id="gr">¿Tenés un negocio?</h2>
                        <p class="text-lg text-white py-3" id="gr">Más de 120 empresas capacitaron a su personal con Aprende Excel. Consultanos por promociones y paquetes personalizados</p>
                        <p class="text-lg text-dark py-3" id="ch">Más de 120 empresas capacitaron a su personal con Aprende Excel. Consultanos por promociones y paquetes personalizados</p>

                        <a class="" target="_blank" href="https://aprende-excel.com/plan-empresa/"> <img class="img-fluid d-block mx-auto mx-md-1" src="img/whatsappempresas.png"></a>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <div class="py-5 section-parallax my-5">
            <div class="container">
                <div class="row">
                    <div class="text-center mx-auto col-md-12">
                        <h2 class="text-dark mb-4">¿Qué opinan nuestros alumnos/as?&nbsp;</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 p-3">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-4 col-3"> <img class="img-fluid d-block rounded-circle" src="img/testimonios/belen.jpg"> </div>
                                    <div class="d-flex  col-md-8 flex-column justify-content-center align-items-start col-9">
                                        <p class="mb-0 lead"><b>Belén</b></p>
                                        <p class="mb-0">Ciudad de Buenos Aires </p><img class="img-fluid d-block" src="img/45star.png">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0">Lo recomiendo, el profe explica muy bien y es facil ver los videos. gracias.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-3">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-4 col-3"> <img class="img-fluid d-block rounded-circle" src="img/testimonios/federico.jpg"> </div>
                                    <div class="d-flex  col-md-8 flex-column justify-content-center align-items-start col-9">
                                        <p class="mb-0 lead"><b>Federico</b></p>
                                        <p class="mb-0">Misiones</p><img class="img-fluid d-block" src="img/45star.png">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0">Introduce muchas herramientas en excel. Muy satisfecho.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-3">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-4 col-3"> <img class="img-fluid d-block rounded-circle" src="img/testimonios/ramiro.jpg"> </div>
                                    <div class="d-flex  col-md-8 flex-column justify-content-center align-items-start col-9">
                                        <p class="mb-0 lead"><b>Ramiro</b></p>
                                        <p class="mb-0">San Miguel de Tucumán</p><img class="img-fluid d-block" src="img/5star.png">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0">enseña muy bien, tengo poco manejo de pc y me fue de mucha utilidad.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-3">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-4 col-3"> <img class="img-fluid d-block rounded-circle" src="img/testimonios/daniel.jpg"> </div>
                                    <div class="d-flex  col-md-8 flex-column justify-content-center align-items-start col-9">
                                        <p class="mb-0 lead"><b>Daniel</b></p>
                                        <p class="mb-0">Ciudad de Córdoba</p><img class="img-fluid d-block" src="img/45star.png">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0">Muy completo! gracias.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-3">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-4 col-3"> <img class="img-fluid d-block rounded-circle" src="img/testimonios/laura.jpg"> </div>
                                    <div class="d-flex  col-md-8 flex-column justify-content-center align-items-start col-9">
                                        <p class="mb-0 lead"><b>Laura</b></p>
                                        <p class="mb-0">Ciudad de Buenos Aires </p><img class="img-fluid d-block" src="img/5star.png">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0">Transmiten muy claro su conocimiento, algunas cosas yo ya las sabia pero me sirvio para profundizar lo que se de excel.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-3">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-4 col-3"> <img class="img-fluid d-block rounded-circle" src="img/testimonios/alejandro.jpg"> </div>
                                    <div class="d-flex  col-md-8 flex-column justify-content-center align-items-start col-9">
                                        <p class="mb-0 lead"><b>Alejandro</b></p>
                                        <p class="mb-0">Provincia de Buenos Aires</p><img class="img-fluid d-block" src="img/5star.png">
                                    </div>
                                </div>
                                <p class="mt-3 mb-0">Excelente.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="py-5 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="">¿Tenés dudas? Envianos un mensaje (Lu a vie 09 a 18hs)</h3>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4 text-center">
                    </div>
                    <div class="col-md-4 text-center">
                        <a class="" target="_blank" href="https://api.whatsapp.com/send?phone=5491168787291&amp;text=Hola!%20Te%20escribo%20por%20el%20curso%20de%20Excel"> <img class="img-fluid d-block  mx-auto" src="img/whatsapp.jpg"> </a>
                    </div>
                    <div class="col-md-4 text-center">
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!-- Footer-->
        <footer class="pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pb-4 pt-5 mb-2">
                        <a class="navbar-brand d-inline-block mb-4" href=""><img src="img/logojpg.jpg" alt="CreateX"></a>
                        <ul class="list-icon text-sm pb-2" style="">
                            <li><i class="fe-icon-map-pin text-muted"></i><a class="navi-link">1309 Coffeen Avenue, Wyoming</a></li>
                            <li><i class="fe-icon-phone text-muted"></i></li>
                            <li><i class="fe-icon-mail text-muted"></i><a class="navi-link" href="mailto:hola@aprende-excel.com">hola@aprende-excel.com</a></li>
                        </ul>
                        <a class="social-btn sb-style-6 sb-facebook" href="https://www.facebook.com/aprende.excel.argentina/" target="_blank"><i class="socicon-facebook"></i></a>
                        <a class="social-btn sb-style-6 sb-instagram" href="https://www.instagram.com/aprende.excel.arg"><i class="socicon-instagram"></i></a>
                        <br>
                        <ul style="text-align: center; list-style:  none;">
                            <li><a href="terminos.php">Términos y Condiciones</a></li>

                        </ul>
                    </div>
                </div>
                <hr>
            </div>
        </footer>



        <!--  #### POP UP - PROMOCION ##### -->

        <!-- div class="text-center cookiealert" role="alert" id="popup">
            <div class="container">
                <div class="row">
                    <div>
                        <img class="logoban " src="img/logojpg.jpg" style="min-width: 77px;">
    
                        <span style="font-weight: bold;"> Obtenga un 15% de descuento en cualquiera de nuestros productos </span>
    
                        <span class="btn btn-primary btn-sm ">CÓDIGO: NAVIDAD2020</span>
                        <img class="logoban" src="img/15off_etiqueta.png" style="min-width: 77px;" />
    
                        <a class="cookiealert-cerrar" href="#" onclick="cerrar_pop()">X</a>
                    </div>
                </div>
            </div>
        </div -->

        <!-- fin banner de promocion -->

        <!-- Terms & Condition Modal -->
        <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="termstitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="termstitle">Políticas de Privacidad y condiciones</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" id="yt-player">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="font-weight-normal">
                                    Este contrato describe los términos y condiciones generales (los "Términos y Condiciones Generales") que son aplicables al uso de los servicios ofrecidos por Aprende Excel dentro del sitio web www.excel-facil.com, en adelante “El Sitio” o “El Sitio
                                    Web”. Cualquier persona que desee acceder y/o usar el sitio o los servicios podrá hacerlo sujetándose a los Términos y Condiciones Generales, junto con todas las demás políticas y principios que rigen a Aprende Excel. CUALQUIER
                                    PERSONA QUE NO ACEPTE ESTOS TÉRMINOS Y CONDICIONES GENERALES, LOS CUALES TIENEN UN CARÁCTER OBLIGATORIO Y VINCULANTE, DEBERÁ ABSTENERSE DE UTILIZAR EL SITIO (www.excel-facil.com) Y/O LOS SERVICIOS QUE PROPORCIONA. ASIMISMO,
                                    LA ACEPTACIÓN DE LOS MISMOS, IMPLICA PLENA CONFORMIDAD Y CONOCIMIENTO DE ELLOS. 1. CAPACIDAD Nuestros servicios sólo están disponibles para personas que tengan capacidad legal para contratar. No podrán utilizar los servicios
                                    proporcionados, los menores de edad, quienes no tengan capacidad en los términos del Código Civil y Comercial de la República Argentina, temporal o definitivamente, quienes hayan sido sancionados por El Sitio Web por haber
                                    incumplido los Términos y Condiciones Generales o por el uso indebido del material de estudio puesto a disposición. Si el usuario es menor de 18 años, su padre, madre o tutor legal debe aceptar estos Términos de Servicio
                                    y registrarse para el Servicio en nombre de aquél. 2. REGISTRACIÓN Es obligatorio completar el formulario de inscripción para poder utilizar los servicios que ofrece El Sitio. El futuro Usuario deberá completarlo con su
                                    información personal de manera exacta y precisa (en adelante, "Datos Personales"). Todos los campos deberán ser completados con la información requerida. El Sitio se reserva el derecho de inhabilitar a aquellos Usuarios
                                    que hayan ingresado datos falsos. 3. MODIFICACIONES DEL ACUERDO El Sitio podrá modificar en cualquier momento los términos y condiciones de este contrato y notificará los cambios al Usuario publicando una versión actualizada
                                    de dichos términos y condiciones en este sitio web y comunicándoselo vía email a los Usuarios. Dentro de los 5 (cinco) días siguientes a la publicación de las modificaciones introducidas, el Usuario deberá comunicar por
                                    e-mail a aprendeexcel.curso@gmail.com si no acepta las mismas; en ese caso quedará disuelto el vínculo contractual. Vencido este plazo, se considerará que el Usuario acepta los nuevos términos y el contrato continuará vinculando
                                    a ambas partes. 4. COMPRAS, Y MEDIOS DE PAGO. CONDICIONES Todas las compras y transacciones que se lleven a cabo por medio de este sitio web, están sujetas a un proceso de confirmación y verificación de parte de Mercado
                                    Pago. Los precios y condiciones de venta tienen un carácter meramente informativo y pueden ser modificados en atención a las fluctuaciones del mercado sin previo aviso. No obstante, la realización de la solicitud mediante
                                    la cumplimentación del formulario de compra, implica la conformidad con el precio ofertado y con las condiciones generales de venta vigentes en ese momento. Una vez completada y enviada la solicitud, se entenderá perfeccionada
                                    la compra de pleno derecho, con todas las garantías legales que amparan al consumidor adquirente y, desde ese instante, los precios y condiciones tendrán carácter contractual y no podrán ser modificados sin el expreso acuerdo
                                    de ambos contratantes. No existen plazos de entrega ya que no se envían materiales físicos. El contenido del curso está alojado en el Grupo Privado “Comunidad Aprende Excel” de Facebook y actualiza periódicamente para que
                                    el usuario tenga acceso a aquellos en cualquier momento y desde cualquier lugar con conexión a Internet. 5. FORMAS DE PAGO Y MODALIDADES DE PAGO El pago se realiza a través de la plataforma “Mercado Pago” o transferencia
                                    bancaria. 6. COMPROBACIÓN ANTIFRAUDE La compra del cliente puede ser aplazada para la comprobación antifraude. También puede ser suspendida por más tiempo para una investigación más rigurosa, para evitar transacciones fraudulentas.
                                    7. MONEDA EXPRESIÓN DE PRECIOS Los precios que se muestran junto a nuestros cursos se indican en Pesos Argentinos (ARS). En ellos, todos los impuestos se encuentran incluidos. 8. USO NO AUTORIZADO En caso de haber contratado
                                    un servicio de Aprende Excel por intermedio de su sitio web www.excel-facil.com, o cualquier otro medio, el usuario no podrá y deberá abstenerse de ofrecerlos para redistribución o reventa de ningún tipo. Queda totalmente
                                    prohibida utilización de los recursos audiovisuales que componen nuestros programas de formación de forma distinta al fin educativo con el cual fueron ideados. El uso y acceso a nuestros servicios es exclusivo al usuario
                                    comprador del curso, quedando bajo su responsabilidad la pérdida de datos personales que implique el uso compartido de su cuenta. Asimismo, el usuario también será pasible de sanciones tales como la exclusión del sistema
                                    si el mismo facilitase el acceso al sistema provisto por Aprende Excel a un tercero sin poseer autorización expresa para ello, sin perjuicio de las acciones legales que Aprende Excel pueda incoar en contra del incumplidor.
                                    9. PROPIEDAD El usuario no podrá declarar propiedad intelectual o exclusiva sobre ninguno de nuestros productos o servicios, modificados o sin modificar. Todos los recursos y servicios son propiedad de Aprende Excel . En
                                    caso de que no se especifique lo contrario, nuestros productos se proporcionan sin ningún tipo de garantía, expresa o implícita. En ningún caso estas personas serán responsable de ningún daño incluyendo, pero no limitado
                                    a, daños directos, indirectos, especiales, fortuitos o consecuentes u otras pérdidas resultantes del uso o de la imposibilidad de utilizar nuestros productos. 10. EXCLUSIÓN DE GARANTÍAS Y RESPONSABILIDAD Aprende Excel no
                                    se hará responsables, en ningún caso, de los daños y perjuicios de cualquier naturaleza que pudieran ocasionar, a título enunciativo: errores u omisiones en los contenidos, falta de disponibilidad del portal o la transmisión
                                    de virus o programas maliciosos o lesivos en los contenidos, a pesar de haber adoptado todas las medidas tecnológicas necesarias para evitarlo. 11. MODIFICACIONES DE CONTENIDO Aprende Excel se reserva el derecho de efectuar
                                    sin previo aviso las modificaciones que considere oportunas en su portal y/o su grupo privado de Facebook “Comunidad Aprende Excel”, pudiendo cambiar, suprimir o añadir tanto los contenidos y servicios que se presten a
                                    través de la misma como la forma en la que éstos aparezcan presentados o localizados en su portal sin requerir conformidad alguna por parte del usuario. 12. ENLACES En el caso de que en nombre del dominio se dispusiesen
                                    enlaces o hipervínculos hacía otros sitios de Internet, Aprende Excel no ejercerá ningún tipo de control sobre dichos sitios y contenidos. En ningún caso Aprende Excel asumirá responsabilidad alguna por los contenidos pertenecientes
                                    a un sitio web ajeno, ni garantizará la disponibilidad técnica, calidad, fiabilidad, exactitud, amplitud, veracidad, y validez de cualquier material o información contenida en ninguno de dichos hipervínculos u otros sitios
                                    de Internet. Igualmente la inclusión de estas conexiones externas no implicará ningún tipo de asociación, fusión o participación con las entidades propietarias de los sitios web a los que redireccione un hipervínculo. Aprende
                                    Excel se reserva el derecho a denegar o retirar el acceso a portal y/o los servicios ofrecidos sin necesidad de preaviso, a instancia propia o de un tercero, a aquellos usuarios que incumplan las Condiciones Generales de
                                    Uso. 13. GENERALIDADES Aprende Excel perseguirá el incumplimiento de las condiciones así como cualquier utilización indebida de su portal y/o del contenido ofrecido en el mismo ejerciendo todas las acciones civiles y penales
                                    que le puedan corresponder conforme derecho. Los resultados de los cursos mostrados a modo ilustrativo en los videos o textos del sitio web son resultados de años de entrenamiento, práctica, experimentos y aprendizaje sobre
                                    errores. En el curso se enseña e ilustra acerca de cómo lograr esos resultados, no obstante ello, no se garantizan idénticos resultados. Aprobado el curso, se entregarán constancias de cursada que en modo alguno se encuentran
                                    certificadas o avaladas por ninguna entidad gubernamental educativa.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Back To Top Button-->
        <a class="scroll-to-top-btn" href="#"><i class="fe-icon-chevron-up"></i></a>
        <!-- script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        -->
        <script src="a-libraries/vendor/jquery/jquery.min.js"></script>
        <link rel="stylesheet" media="screen" href="a-libraries/vendor/bootstrap/js/bootstrap.min.js">
        <script src="js/menu.js"></script>
        <script src="js/cookiebanner.js"></script>

        <!-- Filtro -->
        <script type="text/javascript">

            $('.filter1').click(function () {

                const cards = document.getElementsByClassName("portfolio-card");
                let filter = this.innerText
                for (let i = 0; i < cards.length; i++) {
                    console.log(cards[i]);
                    let title = cards[i].querySelector(".card-tag");
                    let aa = title.innerText.toUpperCase();
                    if ('TODOS' != filter.toUpperCase()) {
                        if (aa.indexOf(filter.toUpperCase()) > -1) {
                            cards[i].classList.remove("d-none")
                        } else {
                            cards[i].classList.add("d-none")
                        }
                    } else {
                        cards[i].classList.remove("d-none")
                    }
                }
            });
        </script>

        <!-- Facebook Pixel Code AP.EX -->
        <script>
            !function (f, b, e, v, n, t, s) {
                if (f.fbq)
                    return;
                n = f.fbq = function () {
                    n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');




            //AE ARG este es el pixel id de aprende excel que usamos en argentina
            fbq('init', '177917573796998');

            //EVENTOS Los eventos solo se agregan una vez, y van a ser trackeados por ambos pixeles
            fbq('track', 'PageView');
            fbq('track', 'ViewContent');

        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id=177917573796998&ev=PageView&noscript=1"
                       /></noscript>
        <!-- End Facebook Pixel Code -->

        <!-- Tracker Sendinblue -->
        <script type="text/javascript">
            (function () {
                window.sib = {
                    equeue: [],
                    client_key: "odq97yyhds94d616wrj5mx6i"
                };

                window.sendinblue = {};
                for (var j = ['track', 'identify', 'trackLink', 'page'], i = 0; i < j.length; i++) {
                    (function (k) {
                        window.sendinblue[k] = function () {
                            var arg = Array.prototype.slice.call(arguments);
                            (window.sib[k] || function () {
                                var t = {};
                                t[k] = arg;
                                window.sib.equeue.push(t);
                            })(arg[0], arg[1], arg[2]);
                        };
                    })(j[i]);
                }
                var n = document.createElement("script"),
                        i = document.getElementsByTagName("script")[0];
                n.type = "text/javascript", n.id = "sendinblue-js", n.async = !0, n.src = "https://sibautomation.com/sa.js?key=" + window.sib.client_key, i.parentNode.insertBefore(n, i), window.sendinblue.page();
            })();
        </script>

    </body>
</html>