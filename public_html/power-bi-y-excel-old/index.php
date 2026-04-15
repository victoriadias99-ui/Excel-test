<?php
$dirpage = '../';

$idcurso = 'prom_pbi_excel';
include("../a-includes/funcionsDB.php");
include("../a-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$precioCursoOficial = $simbolo . ' ' . convertirPrecio(intval(($value / $curso['PORCENTAJE_DES']) * 100), $moneda);
$precioCurso = $simbolo . ' ' . convertirPrecio($value, $moneda);

$urlCheckout = 'checkout_n.php';

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
                    <a class="hvr-sweep-to-right" href="<?= $urlCheckout ?>">Los quiero</a>
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
                        <img src="img/pack-power-bi-y-excel.jpg" class="img-fluid shadow" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6">
                    <div class="  mt-md-4 mt-0">
                        <h1 style="color:black; font-family: montserrat_bold" class="mb-0 pb-0 text-center">Convertite en un Experto/a de Excel y Power BI que las empresas necesitan </h1>
                        <div class="rating-user d-inline mt-0 pt-0" style="color:#ffd322;"><br>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>


                        <p class="user_name d-inline pl-2 pr-4">+15.500 estudiantes</p>

                        <h1 class="text-left mt-5" style="font-family: montserrat_bold"> </h1>
                    </div>
                    <div class="feature-list mt- mt-md-2">
                        <ul style="">


                            <li class="wow fadeIn" data-wow-delay="0.1" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> 12.5 horas de vídeo bajo demanda </li>

                            <li class="wow fadeIn" data-wow-delay="0.2" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> 92 video-clases pregrabadas</li>

                            <li class="wow fadeIn" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Incluye Curso Power BI + Excel Nivel Inicial + Nivel Intermedio + Nivel Avanzado </li>

                            <li class="wow fadeIn" data-wow-delay="0.4" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Acceso de por vida a todos los niveles </li>

                            <li class="wow fadeIn" data-wow-delay="0.5" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Paso a paso y desde 0. Sin requisitos previos </li>

                            <li class="wow fadeIn" data-wow-delay="0.6" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Acceso en dispositivos móviles y TV </li>

                            <li class="wow fadeIn" data-wow-delay="0.7" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Certificado de Participación </li>

                            <h4 class="mt-3 ">


                                ¡Con ésta promo obtenés los 4 cursos a <b><?= $precioCurso ?></b> finales! </h4>
                    </div>

                    <div class="call-button mt-5">
                        <div class="row">
                            <div class="col-md-6 ">
                                <a href="<?= $urlCheckout ?>" class="hvr-sweep-to-top  wow flipInX animated shadow" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Quiero
                                los
                                4 cursos</a>
                            </div>
                            <div class="col-md-6 payments">
                                <img src="../a-img/payments.jpg" class="img-fluid wow flipInX  animated" data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            </div>
                        </div>
                    </div>
                    <div class="review-one mt-5">
                        <div class="review-text">
                            <p class="lead">"Hay bastante contenido, aún no lo terminé pero se deja entender muy bien. "</p>
                        </div>
                        <div class="review-image">

                            <p class="user_name d-inline  font-weight-bold">Alberto Rodríguez - PM <i class="fa fa-star pl-1 " style="color:#ffd322;"></i>
                                <i class="fa fa-star " style="color:#ffd322;"></i>
                                <i class="fa fa-star" style="color:#ffd322;"></i>
                                <i class="fa fa-star" style="color:#ffd322;"></i>
                                <i class="fa fa-star" style="color:#ffd322;"></i>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- As Featured On Section -->
    <!-- Intro Section -->

    <div class="py-5 text-center mt-4 bg-warning" style="">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-12">
                    <h3 class=" titulos display-4">Pack experto</h3>

                    <h5 class="">Micrososft Power BI + Excel Nivel Inicial + Excel Nivel Intermedio + Excel Nivel Avanzado</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5 align-items-center d-flex" style="">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-9 px-md-5" style="">
                    <h1 class="display-4 mb-4 font-weight-bold">Escalá en tu carrera laboral</h1>
                    <p class="lead mb-5">Con estos cursos vas a aprender a usar a fondo Microsoft Power y Excel en sus tres niveles. Explicados paso a paso en un total de 12.5 hs de videos, te enseñamos a usarlas en profundidad.<br></p>
                    <hr>
                    <p class="lead" style="">Más de un 70% de las empresas utilizan Excel y Power BI para la organización y análisis de sus datos. Ser un experto en estas herramientas representa un gran valor para cualquier empresa, lo cuál te va a permitir encontrar puestos
                        de salarios elevados.
                        <br></p>
                    <div class="call-button mt-5 ">
                        <div class="row justify-content-md-cen">
                            <div class="col-md-4">
                                <a href="<?= $urlCheckout ?>" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg" data-wow-delay="0.2s">Quiero estos cursos 👉</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="bottom-product bg-light" style="">
        <div class="container">
            <div class="row ">
                <div class="col-md-5">
                    <div class="product-img    ">
                        <div class="card-1 px-2" style="font-family: montserrat_bold;">
                            Ya sabés lo que es Excel... ¿pero qué es Power BI? </div>
                        <div class="mx-4 d-flex flex-column text-justify py-4 ">
                            <p class="mx-1  mb-2 lead">Es una herramienta usada para la Inteligencia Empresarial. Permite unir diferentes fuentes de datos y volcarlos en tableros y gráficos que pueden ser consultados de forma rápida e intuitiva, facilitando el conocimiento y toma
                                de decisiones dentro de una empresa, ahorrando muchísimas horas de trabajo.</p>
                            <p class="mx-1 mb-2 lead">A través de este curso vas a aprender a conocer todas las funciones de Power BI, realizar tableros, análisis de datos y mucho más. Explicado paso a paso en 3 horas de videos por un profesor certificado de la Universidad Tecnológica
                                Nacional (UTN)
                            </p>

                        </div>

                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div style="align-items: flex-start;">
                    <img class="responsive shadow" src="img/experto-en-excel-y-power-bi.jpg" />
                </div>
            </div>
        </div>

        <section class="container mt-5 mt-md-0  ">
            <p class="titulos-1">
                Sobre Power BI vas a aprender:
            </p>
            <br />
            <ul class="mx-auto mx-md-1 lead">
                <li><i class="fas fa-check " style="color:#f3c910;"></i> Metodología para el análisis de datos
                </li>
                <li><i class="fas fa-check  " style="color:#f3c910;"></i> Todas las visualizaciones disponibles en Power BI</li>
                <li><i class="fas fa-check " style="color:#f3c910;"></i> Creación de reportes en Power BI
                </li>
                <li><i class="fas fa-check " style="color:#f3c910;"></i> Funcionalidades avanzadas de Power BI</li>
                <li><i class="fas fa-check  " style="color:#f3c910;"></i> Gráficos dinámicos</li>
                <li><i class="fas fa-check " style="color:#f3c910;"></i> Gráficos Animados</li>
                <li><i class="fas fa-check  " style="color:#f3c910;"></i> Rápidez para crear nuestros análisis</li>
            </ul>
        </section>
    </section>

    <section class="container py-3 mt-5">
        <hr>
        <section class="container py-5 mb-3 col-md-10">
            <h3 class="h3 block-title text-center mt-3 display-5 " id="cursos">Cursos Excel incluidos en este Pack</h3>
            <div class="row pt-4 justify-content-center">
                <!-- Portfolio Item-->
                <div class="col-md-4 col-sm-6 mb-30 pb-2">
                    <div class="card portfolio-card "> <img src="img/excelinicial.jpg" class="img-fluid" alt="Portfolio Thumbnail">
                        <div class="card-body">
                            <h5 class="portfolio-title">#1: Excel nivel inicial - Desde cero<br></h5>
                        </div>
                        <div class="card-footer">
                            <div>Sin requisitos previos, éste curso te va a enseñar a usar Microsoft Excel: la herramienta laboral más solicitada por las empresas.<br></div>
                            <div class="portfolio-meta"> </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-30 pb-2">
                    <div class="card portfolio-card"> <img src="img/excelintermedio.jpg" alt="Portfolio Thumbnail" class="img-fluid">
                        <div class="card-body">
                            <h5 class="portfolio-title">#2: Excel Nivel Intermedio</h5>
                        </div>
                        <div class="card-footer">
                            <div>Entrenamiento para usuarios que ya tienen los conocimientos básicos de Microsoft Excel, para aprender en profundidad la mayoría de sus funcionalidades.
                                <br></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-30 pb-2">
                    <div class="card portfolio-card"> <img src="img/excelavanzado.jpg" alt="Portfolio Thumbnail" class="img-fluid">
                        <div class="card-body">
                            <h5 class="portfolio-title">#3: Excel Nivel Avanzado</h5>
                        </div>
                        <div class="card-footer">
                            Curso para terminar de conocer Excel y dominar sus funcionalidades más avanzadas. <br></div>
                    </div>
                </div>
            </div>

        </section>
    </section>

    <div class="container">
        <div class="card">
            <div class="card-header bg-warning " id="headingIni">
                <h5 class="mb-0 bg-warning " style="">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsePb" aria-expanded="true" aria-controls="collapsePb" style="width:100%; font-family: montserrat_bold; text-decoration:none">Temario Power BI</button>
                </h5>
            </div>
            <div id="collapsePb" class="collapse" aria-labelledby="headingIni" data-parent="#accordionExample" style="">
                <div class="card-body">

                    <ul class="">
                        <li><b>Clase 1:</b> Introducción: Power BI como herramienta de Reporting, Interfaz y recorrido</li>
                        <li><b>Clase 2:</b> Conexión a fuente de datos (Excel, Web, etc.)</li>
                        <li><b>Clase 3:</b> ETL (Extracción, Transformación y Carga de datos)</li>
                        <li><b>Clase 4:</b> Power Query. Tips y consideraciones</li>
                        <li><b>Clase 5:</b> Proceso de Modelado Relaciones y Direcciones del modelo</li>
                        <li><b>Clase 6:</b> Generación de Relaciones. Direcciones y Cardinalidad</li>
                        <li><b>Clase 7:</b> Calendario Automático. Dimensión Dinámica</li>
                        <li><b>Clase 8:</b> Tablas calculadas y columnas calculadas</li>
                        <li><b>Clase 9:</b> DAX. Generación de métricas rápidas</li>
                        <li><b>Clase 10:</b> Operadores CALCULATE, SUMX</li>
                        <li><b>Clase 11:</b> Inteligencia de Tiempo: YTD, MTD, QTD, SPLY</li>
                        <li><b>Clase 12:</b> Consultas, Glosario en DAX</li>
                        <li><b>Clase 13:</b> Visuales. ¿Como se generan? Asignación de campos y Formatos</li>
                        <li><b>Clase 14:</b> Construcción del Dashboard</li>
                        <li><b>Clase 15:</b> Edicion de interacciones. Revision de Visuales</li>
                        <li><b>Clase 16:</b> Publicacion Dashboard en Power BI Service</li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-warning " id="headingIni">
                <h5 class="mb-0 bg-warning " style="">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseIni" aria-expanded="true" aria-controls="collapseIni" style="width:100%; font-family: montserrat_bold; text-decoration:none">Temario Excel Nivel
                    Inicial</button>
                </h5>
            </div>
            <div id="collapseIni" class="collapse" aria-labelledby="headingIni" data-parent="#accordionExample" style="">
                <div class="card-body">

                    <ul class="">
                        <li><b>Clase 1:</b> Estructuras básicas de Excel</li>
                        <li><b>Clase 2:</b> Hacer una factura</li>
                        <li><b>Clase 3:</b> Hojas, libros</li>
                        <li><b>Clase 4:</b> Vista Backstage: libro, hojas, en la vista vemos botones inicio, nuevo y abrir</li>
                        <li><b>Clase 5:</b> Insertar Celdas Filas y Columnas</li>
                        <li><b>Clase 6:</b> Eliminar Celdas Filas y Columnas</li>
                        <li><b>Clase 7:</b> Ocultar y visualizar de nuevo filas y columnas sin eliminarlas</li>
                        <li><b>Clase 8:</b> Copiar, cortar y pegar celdas</li>
                        <li><b>Clase 9:</b> Formato a la tabla de datos Ajustar texto Alinear texto</li>
                        <li><b>Clase 10:</b> Formato simple monedas</li>
                        <li><b>Clase 11:</b> Creación de lista desplegable</li>
                        <li><b>Clase 12:</b> Ordenar la base de datos orden de A Z de Z A y personalizado</li>
                        <li><b>Clase 13:</b> Buscar y reemplazar</li>
                        <li><b>Clase 14:</b> Alternativas para copiar una hoja.</li>
                        <li><b>Clase 15:</b> Operaciones aritméticas (Sumar, Restar, Multiplicar, Dividir)</li>
                        <li><b>Clase 16:</b> Sumar por celda, sumar con formula y la funcion autosuma</li>
                        <li><b>Clase 17:</b> Multiplicación con selección de celdas y fórmula de PRODUCTO</li>
                        <li><b>Clase 18:</b> División por celdas y formula COCIENTE</li>
                        <li><b>Clase 19:</b> Calcular promedio de forma manual y fórmula PROMEDIO</li>
                        <li><b>Clase 20:</b> Validación de datos VERDADERO/FALSO</li>
                        <li><b>Clase 21:</b> Fórmula Condicional SI</li>
                        <li><b>Clase 22:</b> Fórmula Sumar.SI (Suma Condicional)</li>
                        <li><b>Clase 23:</b> Anclaje de celdas</li>
                        <li><b>Clase 24:</b> Formato de tablas, asignación de nombres a tablas</li>
                        <li><b>Clase 25:</b> Fórmula BUSCARV</li>
                        <li><b>Clase 26:</b> Formato Condicional</li>
                        <li><b>Clase 27:</b> Cifrar archivo, proteger y desproteger hoja y libro</li>
                        <li><b>Clase 28:</b> Gráfica en barra con una variable y formato de gráfica</li>
                        <li><b>Clase 29:</b> Gráfica de pastel o circular</li>
                        <li><b>Clase 30:</b> Gráfico de tiempo con varias variables</li>
                        <li><b>Clase 31:</b> Cómo imprimir en Excel</li>


                    </ul>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-warning " id="headingInt">
                <h5 class="mb-0 bg-warning " style="">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseInt" aria-expanded="true" aria-controls="collapseAvan" style="width:100%; font-family: montserrat_bold; text-decoration:none">Temario Excel Nivel
                    Intermedio</button>
                </h5>
            </div>
            <div id="collapseInt" class="collapse" aria-labelledby="headingInt" data-parent="#accordionExample" style="">
                <div class="card-body">

                    <ul class="">

                        <li><b>Clase 1:</b> Tablas Dinámicas</li>
                        <li><b>Clase 2:</b> Funciones Lógicas - Función SI & SI ANIDADA</li>
                        <li><b>Clase 3:</b> Funciones Lógicas - Función SI.ERROR</li>
                        <li><b>Clase 4:</b> Funciones Lógicas - Función (O) & Y</li>
                        <li><b>Clase 5:</b> Función CONCATENAR</li>
                        <li><b>Clase 6:</b> Función INDIRECTO</li>
                        <li><b>Clase 7:</b> Funciones de Texto</li>
                        <li><b>Clase 8:</b> Función INDICE y COINCIDIR</li>
                        <li><b>Clase 9:</b> Remover datos duplicados</li>
                        <li><b>Clase 10:</b> Función SUBTOTALES</li>
                        <li><b>Clase 11:</b> Funcion Pronostico</li>
                        <li><b>Clase 12:</b> Listas Desplegables Dependientes</li>
                        <li><b>Clase 13:</b> Listas Desplegables Dinámicas</li>
                        <li><b>Clase 14:</b> Creación y Grabación de Macros</li>
                        <li><b>Clase 15:</b> Ejecución y Automatización con Macros</li>
                        <li><b>Clase 16:</b> Crear plantilla para Gráficos</li>
                        <li><b>Clase 17:</b> Filtros Avanzados para Excel</li>
                        <li><b>Clase 18:</b> Análisis de Hipótesis</li>
                        <li><b>Clase 19:</b> Graficos Dinámicos</li>
                        <li><b>Clase 20:</b> Parte 1 - Modelo de datos para creacion de dashboard</li>
                        <li><b>Clase 20</b>: Parte 2 - Utilizacion de modelo de datos y creacion de dashboard</li>
                        <li><b>Clase 21:</b> Casos Practicos para los usuarios</li>


                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header bg-warning " id="headingAvan">
                <h5 class="mb-0 bg-warning " style="">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseAvan" aria-expanded="true" aria-controls="collapseAvan" style="width:100%; font-family: montserrat_bold; text-decoration:none">Temario Excel Nivel
                    Avanzado</button>
                </h5>
            </div>
            <div id="collapseAvan" class="collapse" aria-labelledby="headingAvan" data-parent="#accordionExample" style="">
                <div class="card-body">

                    <ul class="">
                        <li><b>Clase 1:</b> Construcción Bases de datos</li>
                        <li><b>Clase 2:</b> Filtros y limpieza de datos</li>
                        <li><b>Clase 3:</b> Columnas primarias y formuladas</li>
                        <li><b>Clase 4:</b> Principales fórmulas utilizadas en las Bases de Datos</li>
                        <li><b>Clase 5:</b> Buscarv</li>
                        <li><b>Clase 6:</b> Buscarh</li>
                        <li><b>Clase 7:</b> Coindicir</li>
                        <li><b>Clase 8:</b> KPI´s</li>
                        <li><b>Clase 9:</b> Estadística Descriptiva</li>
                        <li><b>Clase 10:</b> Media Móvil</li>
                        <li><b>Clase 11:</b> Regresión lineas</li>
                        <li><b>Clase 12:</b> Diseños</li>
                        <li><b>Clase 12:</b> Minigráficos</li>
                        <li><b>Clase 13:</b> Líneas de tendencia</li>
                        <li><b>Clase 14:</b> Histogramas</li>
                        <li><b>Clase 15:</b> Instalación</li>
                        <li><b>Clase 16:</b> Conexión de Bases de datos</li>
                        <li><b>Clase 17:</b> Columnas formuladas</li>
                        <li><b>Clase 18:</b> Creación de modelos y conexión entre tablas</li>
                        <li><b>Clase 19:</b> Análisis de datos y construcción de gráficos</li>
                        <li><b>Clase 20:</b> Formularios - Definición de objeto</li>
                        <li><b>Clase 21:</b> Uso de controles - Detallar controles y características</li>
                        <li><b>Clase 22:</b> Diseño de formularios - Pasos para un buen diseño</li>
                        <li><b>Clase 23:</b> Automatización - Formularios y macros</li>
                        <li><b>Clase 24:</b> Introducción VBA - Programación VBA</li>


                    </ul>


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
                            <p class="mb-0 lead">¡Te queda para siempre!<br><span>&nbsp;<span></p>
            </div>
          </div>
        </div>
     
    </div>
  </div>
</div>

  <div class="py-5 bg-warning " style="" id=" ">
    <div class="container my-3">
        <div class="row">
            <div class="text-center mx-auto col-md-12">
                <h1 class="font-weight-bold  mb-md-5" style="font-family: montserrat_bold">Lo que dicen nuestros
                    alumnos/as
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 p-4 text-center">



                <p class="mb-3"><i>"</i>Muy buenas las explicaciones, bastante entendíble.
                    100/100.<i>"</i> </p>
                <p class="mb-1"> <b>Pricila Anabel Moya</b></p>
                <div class="rating-user d-inline" style="color:#ffd322;">
                <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 p-4 text-center">

                <p class="mb-3">"La información es clara y precisa, el profe es muy bueno para explicar cada una de las
                    funciones."</p>
                <p class="mb-1"> <b>Alan Macedo</b></p>
                <div class="rating-user d-inline" style="color:#ffd322;">
                <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                </div>
            </div>
            <div class="col-lg-4 p-4 text-center">

                <p class="mb-3">"La verdad que el curso es excelente. No sabia usar excel asi que me sirvió muchisimo.
                    Las clases son muy dinámicas y fáciles de comprender." </p>
                <p class="mb-1"> <b>Pia Capria</b></p>
                <div class="rating-user d-inline" style="color:#ffd322;">
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star-half sombras"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-6 p-4 text-center">

                <p class="mb-3">"El curso básico es ideal tanto para quienes no tienen conocimientos previos como para
                    (como en mi caso) los que si los tenemos pero necesitamos refrescar conceptos, nuevas
                    actualizaciones y tips que resultan muy prácticos. Lo recomiendo por su calidad de las clases por
                    video y la disponibilidad de los archivos de practica. Muy útil y didáctico !
                    El curso Intermedio me agrego conocimientos que no tenia y ya estoy poniendo en practica ! Si bien
                    esta orientado a las finanzas los ejemplos se útiles para llevar a otras aéreas, como en mi caso la
                    estadística aplicada a la medicina, el manejo de la información a través de tablas dinámicas esta
                    muy "bueno" y no es difícil ponerlo en practica ! Muy recomendable.."&nbsp;&nbsp;</p>
                <p class="mb-1"> <b>Alejandro Ruiz Trevisan</b></p>
                <div class="rating-user d-inline" style="color:#ffd322;">
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
                    <i class="fa fa-star sombras"></i>
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
                <a href="<?= $urlCheckout ?>" class="sc-roll hvr-sweep-to-top wow  flipInX shadow-lg"
                  data-wow-delay="0.2s">Inscribirme</a>
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
  <section class="pt-5 pb-5" id="gr">
    <div class="container">
      <div class="section-heading text-center">
        <h2 class="mt-2 mb-1 pb-3 text-dark" style="font-family: montserrat_bold"><i class="fa fa-question-circle"
            aria-hidden="true">&nbsp;</i>Preguntas Frecuentes&nbsp;</h2>
      </div>
      <div class="accordion mt-4" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo
                tengo?</button></h5>
          </div>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
            <div class="card-body"> ¡De por vida! Una vez que abones vas a tener acceso para siempre. Lo vas a poder
              descargar en tu PC, notebook, tablet o celular.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse"
                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto tiempo tardo en
                terminarlo?</button></h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample"
            style="">
            <div class="card-body">9.5hs de video es la duración total del curso.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse"
                data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan
                soporte?</button></h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample"
            style="">
            <div class="card-body">Sí, damos soporte 24/7. Podés consultar cualquier duda en nuestro e-mail o Whatsapp.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingFour">
            <h5 class="mb-0" style="">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour"
                aria-expanded="true" aria-controls="collapseFour">#4 ¿Incluye Certificación o Diploma?</button></h5>
          </div>
          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample"
            style="">
            <div class="card-body">Una vez termines el curso podés solicitarnos gratis la Certificado de Cursado.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingFive">
            <h5 class="mb-0" style="">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive"
                aria-expanded="true" aria-controls="collapseFive">#5 ¿Qué requisitos tiene?</button></h5>
          </div>
          <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample"
            style="">
            <div class="card-body">No requiere conocimientos previos. Sólo necesitás una PC o Notebook con el Project
              instalado. Si no tenés Project, dentro del curso te enseñamos cómo descargarlo gratis</div>
          </div>
        </div>
         
      </div>
      <div class="call-button mt-5">
        <div class="row justify-content-md-center">
          <div class="col-md-3">
            <a href="<?= $urlCheckout ?>" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg" data-wow-delay="0.2s">Quiero
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
            <img src="img/experto-en-excel-y-power-bi.jpg" class="img-fluid shadow" alt="product">
          </div>
        </div>
        <div class="col-md-1">&nbsp;</div>
        <div class="col-md-6" style="">
          <div class=" ">
            <h3>
            </h3>
            <h1 class="display-5" style="font-family: montserrat_bold">Este 2021 es tuyo. Convertite en un Especialista en Excel y Power BI</h1>
          </div>
          <div class="feature-list mt-4 lead">
            <p> • Accedé hoy y tenelo de por vida. Pago por única vez (sin suscripciones ni pagos mensuales). <br>•
              Garantía de devolución de 7 días</p>
              <h3 class="bg-warning text-dark font-weight-bold p-2 mt-3 col-8 col-md-6 text-center">
                 &nbsp;&nbsp;&nbsp;<?= $precioCurso ?></span></h3>

                        </div>
                        <div class="call-button mt-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="<?= $urlCheckout ?>" class="hvr-sweep-to-top  wow flipInX animated  " data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Quiero este curso</a>
                                </div>
                                <div class="col-md-6 payments">
                                    <img src="../a-img/paymentsgris.jpg" class="img-fluid wow flipInX animated  " data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
        <?php include('../a-pages/footer.php')?>
</body>

</html>