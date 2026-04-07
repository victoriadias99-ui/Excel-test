<?php
$dirpage = '../';
$titulo = 'Power BI y Pack de Excel';

$idcurso = 'prom_pbi_excel';
include($dirpage . "n-includes/funcionsDB.php");
include($dirpage . "n-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);

$value = $curso['PRECIO_UNITARIO'];
$porcentaje = $curso['PORCENTAJE_DES'];
$precioCursoOficial = '$' . ($value + intval(($value / $porcentaje) * 100));
$precioCurso = '$' . $value;
$urlCheckout = './checkout.php';
/*
  $value = 'ddd';
  $porcentaje = 'ddd';
  $precioCursoOficial = 'ddd';
  $precioCurso = 'ddd';
  $urlCheckout = 'ddd';
 */

// SEO
$seo_title = 'Curso de Power BI y Excel Online | El Combo Más Completo con Certificado';
$seo_description = 'Combo Power BI + Excel 3 en 1 online. La formación más completa en análisis de datos. Certificado oficial, acceso de por vida. Líderes en capacitaciones laborales y educación online.';
$seo_keywords = 'curso power bi y excel, combo excel power bi, análisis de datos curso, excel y power bi online, capacitaciones laborales, inteligencia artificial datos, certificado power bi excel';
$seo_slug = 'power-bi-y-excel';
$seo_og_title = 'Curso Power BI + Excel 3 en 1 Online | Aprende Excel';
$seo_image = 'https://aprende-excel.com/n-img/powerbiyexcel4.jpeg';
$seo_structured_data = json_encode([
    "@context" => "https://schema.org",
    "@type" => "Course",
    "name" => "Power BI y Excel Promo 3 en 1",
    "description" => "El combo más completo: Power BI + Excel Inicial, Intermedio y Avanzado. Certificado oficial.",
    "provider" => ["@type" => "Organization", "name" => "Aprende Excel", "url" => "https://aprende-excel.com"],
    "url" => "https://aprende-excel.com/power-bi-y-excel/",
    "educationalLevel" => "Beginner to Advanced",
    "inLanguage" => "es",
    "aggregateRating" => ["@type" => "AggregateRating", "ratingValue" => "4.9", "reviewCount" => "15000", "bestRating" => "5"],
    "offers" => ["@type" => "Offer", "category" => "Paid", "availability" => "https://schema.org/InStock"]
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include('../n-pages/head.php') ?>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php
        $headerImagen = "assets/img/back-imagen-header.png";
        include('../n-pages/header.php')
        ?>
        <section>
            <div class="row">
                <div class="col-md-7 px-5 ">
                    <img class="d-block d-md-none img-fluid mb-4" src="assets/img/pack-power-bi-y-excel.jpeg" width="100%">
                    <h5 class="texto-header">4.9/5&nbsp;<i class="fa fa-star" style="color: #F7AC3B;"></i>&nbsp;Basado en +15.500 estudiantes</h5>
                    <h1 style="font-family: 'Raleway Black'; color:#00173B;">Convertite en un Experto/a de <span style="color: #ffc902;">Excel y Power BI</span> que las empresas necesitan</h1>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Curso online a distancia</h5>

                    <div class="d-block d-md-none mt-3">
                        <h5 style="color: #00173B;font-family: 'Raleway SemiBold';">
                            <img src="../n-assets/img/imagen-porcentaje.png" style="width: 30px;">&nbsp;Oferta limitada
                        </h5>
                        <p class="d-flex align-items-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #333333;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #333333;">ARS<br></span></p>
                        <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> ARS</strike></p>
                        <p class="text-center">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #ffc902;width: 100%; color:#000"><b>Lo quiero</b></a>
                        </p>

                        <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Con estos cursos vas a aprender a usar a fondo Microsoft Power y Excel en sus tres niveles. Explicados paso a paso en un total de 12.5 hs de videos, te enseñamos a usarlas en profundidad.</p>
                        <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';">Más de un 70% de las empresas utilizan Excel y Power BI para la organización y análisis de sus datos. Ser un experto en estas herramientas representa un gran valor para cualquier empresa, lo cuál te va a permitir encontrar puestos de salarios elevados.</p>
                        <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';"><b>Requsitos:</b> Una PC con Power BI instalado (es gratuito).</p>

                        <ul class="lista-header pl-3" style="list-style-type: none;">
                            <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;12.5 horas de vídeo bajo demanda<br></li>
                            <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;92 video-clases pregrabadas<br></li>
                            <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Incluye Curso Power BI + Excel Nivel Inicial + Nivel Intermedio + Nivel Avanzado<br></li>
                            <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Acceso de por vida a todos los niveles<br></li>
                            <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Paso a paso y desde 0. Sin requisitos previos<br></li>
                            <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Acceso en dispositivos móviles y TV<br></li>
                            <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Certificado de Participación<br></li>
                        </ul>
                        <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EDF3F4;">
                            <img src="../n-assets/img/logo-verde-calidad.png" style="width: 50px;">
                            <p class="ml-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                        </div>
                    </div>

                    <img class="d-none d-md-block img-fluid mt-2" src="assets/img/pack-power-bi-y-excel.jpeg" width="100%">

                    <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Con estos cursos vas a aprender a usar a fondo Microsoft Power y Excel en sus tres niveles. Explicados paso a paso en un total de 12.5 hs de videos, te enseñamos a usarlas en profundidad.</p>
                    <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';">Más de un 70% de las empresas utilizan Excel y Power BI para la organización y análisis de sus datos. Ser un experto en estas herramientas representa un gran valor para cualquier empresa, lo cuál te va a permitir encontrar puestos de salarios elevados.</p>
                    <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';"><b>Requsitos:</b> Una PC con Power BI instalado (es gratuito).</p>

                    <a href="<?= $urlCheckout ?>" class="d-none d-md-block btn btn-primary px-5" style="background: #ffc902; color:#000"><b>Inscribirme</b></a>
                    <p class="my-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>

                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Conviértete en un Experto en Power BI con nuestro método dinámico y simple</h5>

                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Ejemplos reales, desde un nivel inicial hasta avanzado, soporte cada vez que lo necesites, y sin requisitos previos. </p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-1.png">&nbsp; +12 horas de contenido para verlos donde y cuando quieras.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-2.png">&nbsp; Acceso al curso y al soporte de por vida con un único pago.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-3.png">&nbsp; Certificado y Garantía de 100% de satisfacción.</p>
                    <img class="d-none d-md-block img-fluid" src="assets/img/banner-2.png" width="100%">
                    <img class="d-block d-md-none img-fluid" src="assets/img/banner-2-movil.png" width="100%">
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Este pack de 4 cursos está valorado en <b><?= $precioCursoOficial ?></b> pero puede ser tuyo con esta oferta limitada por sólo:</p>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-radius: 10px;background: #ffffff;border: 1px solid #bcbcbc ;">
                        <div class="col m-0">
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #000;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #000;">ARS<br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> ARS</strike></p>
                        </div>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-bottom-style: solid;border-bottom-color: rgb(225,225,225);">
                        <img src="../n-assets/img/logo-amarillo-calidad.png" style="width: 50px;">
                        <p class="ml-3" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3">
                        <img class="img-fluid" src="assets/img/icono-aprenderas.png" style="width: 50px;">
                        <h3 class="ml-3" style="font-family: 'Raleway SemiBold';color: #00173B;">Aprenderás</h3>
                    </div>
                    <ul class="lista-header pl-3 mt-2" style="list-style-type: none;">
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Metodología para el análisis de datos<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Todas las visualizaciones disponibles en Power BI<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Creación de reportes en Power BI<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Funcionalidades avanzadas de Power BI<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Gráficos dinámicos<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Gráficos Animados<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Rapidez para crear nuestros análisis<br></li>
                        <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;y muchísimo mas!<br></li>
                        <li>• No requiere conocimientos previos</li>
                    </ul>
                    <div class="p-4 mt-5" style="background: url(&quot;assets/img/banner2.png&quot;) no-repeat;background-size: cover;font-size: 0.8em;border-radius: 10px;">
                        <p style="color: rgb(255,255,255);font-family: 'Raleway Bold';font-size: 1.2em;">Serás el especialista que las empresas están buscando</p>
                        <p style="color: rgb(255,255,255);">Abre tus puertas a nuevas oportunidades. Domina Excel por completo en solo 12 horas y con soporte 24/7&nbsp;</p>
                        <p style="color: rgb(255,255,255);">Más de 15.500 estudiantes recomiendan nuestra academia</p>
                        <p style="font-size: 1.4em;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                    </div>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Aprender Power BI y Excel desde casa nunca ha sido tan simple</h5>
                    <div class="row mt-3">
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                <img class="icono-csa" src="assets/img/icon-certificado.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Certificado</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Adquiere un Certificado para sumar a tu Currículum</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                <img class="icono-csa" src="assets/img/icon-soporte.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Soporte</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Obtén soporte siempre que lo necesites</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;">
                                <img class="icono-csa" src="assets/img/icon-por-vide.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Acceso de por vida</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Aprende a tu ritmo y cuando quieras</p>
                            </div>
                        </div>
                    </div>
                    <div class="stop-card-madre row">
                        <div class="col text-center text-md-left">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 mt-5 ml-0" style="background: #000; color:#fff">Quiero este curso</a>
                            <p class="mt-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>
                            <div class="d-xl-flex align-items-xl-center p-3">
                                <h3 class="ml-3" style="font-family: 'Raleway SemiBold';color: #00173B;">Cursos Excel incluidos en este Pack</h3>
                            </div>

                            <div class="container">
                                <div class="card">
                                    <div class="card-header bg-warning " id="headingIni">
                                        <h5 class="mb-0 bg-warning " style="">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapsePb" aria-expanded="true" aria-controls="collapsePb" style="width:100%; text-decoration:none">Temario Power BI</button>
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
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseIni" aria-expanded="true" aria-controls="collapseIni" style="width:100%; text-decoration:none">Temario Excel Nivel
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
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseInt" aria-expanded="true" aria-controls="collapseAvan" style="width:100%; text-decoration:none">Temario Excel Nivel
                                                Intermedio</button>
                                        </h5>
                                    </div>
                                    <div id="collapseInt" class="collapse" aria-labelledby="headingInt" data-parent="#accordionExample" style="">
                                        <div class="card-body">

                                            <ul class="">

                                                <li><b>Clase 1:</b> Tablas Dinámicas</li>
                                                <li><b>Clase 2:</b> Funciones Lógicas - Función SI &amp; SI ANIDADA</li>
                                                <li><b>Clase 3:</b> Funciones Lógicas - Función SI.ERROR</li>
                                                <li><b>Clase 4:</b> Funciones Lógicas - Función (O) &amp; Y</li>
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
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseAvan" aria-expanded="true" aria-controls="collapseAvan" style="width:100%; text-decoration:none">Temario Excel Nivel
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
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-block col-md-5 position-relative">
                    <div class="card-madre px-3 py-4 mr-5" style="position: fixed; border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div class="col">
                            <h5 style="color: #00173B;font-family: 'Raleway SemiBold';"><img src="../n-assets/img/imagen-porcentaje.png" style="width: 50px;">&nbsp;Oferta limitada</h5>
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #333333;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #333333;">ARS<br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> ARS</strike></p>
                            <p class="text-center">
                                <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #ffc902;width: 80%; color:#000"><b>Quiero este curso</b></a>
                            </p>
                            <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;12.5 horas de vídeo bajo demanda<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;92 video-clases pregrabadas<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Incluye Curso Power BI + Excel Nivel Inicial + Nivel Intermedio + Nivel Avanzado<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Acceso de por vida a todos los niveles<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Paso a paso y desde 0. Sin requisitos previos<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Acceso en dispositivos móviles y TV<br></li>
                                <li><i class="fa fa-check" style="color: #333333;"></i>&nbsp;Certificado de Participación<br></li>
                            </ul>
                            <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EDF3F4;">
                                <img src="../n-assets/img/logo-verde-calidad.png" style="width: 50px;">
                                <p class="ml-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 py-5" style="background: url(&quot;assets/img/seccion-amarillo.png&quot;);background-size: cover;">
                <div class="d-xl-flex align-items-xl-center col-md-3 pt-5 p-md-5">
                    <h3 class="ml-3 text-center text-md-left" style="font-family: 'Raleway Black';color: #ffffff;font-size: 1.5em;">Lo que opinan nuestros estudiantes</h3>
                </div>


                <div class="col-md-9">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4 pb-5 px-5 p-md-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"Muy buenas las explicaciones, bastante entendíble. 100/100."</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Pricila Anabel Moya</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"La información es clara y precisa, el profe es muy bueno para explicar cada una de las funciones."</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Alan Macedo</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">"La verdad que el curso es excelente. No sabia usar excel asi que me sirvió muchisimo. Las clases son muy dinámicas y fáciles de comprender."</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Pia Capria</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4 pb-5 px-5 p-md-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Muy completo! gracias.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Daniel</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Transmiten muy claro su conocimiento, algunas cosas yo ya las sabia pero me sirvio para profundizar lo que se de excel.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Laura</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Excelente.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Alejandro</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row  mt-3 p-5 px-md-5">
                <div class="col-md-6">
                    <h1 style="font-family: 'Raleway Black';">Somos expertos despejando cualquier duda</h1>
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
                                <div class="card-body">Tener instalado el programa Power BI y nada más!</div>
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
                                        <li>Clase 1 – Introducción: Power BI como herramienta de Reporting, Interfaz y recorrido</li>
                                        <li>Clase 2 – Conexión a fuente de datos (Excel, Web, etc.)</li>
                                        <li>Clase 3 – ETL (Extracción, Transformación y Carga de datos)</li>
                                        <li>Clase 4 – Power Query. Tips y consideraciones</li>
                                        <li>Clase 5 – Proceso de Modelado Relaciones y Direcciones del modelo</li>
                                        <li>Clase 6 – Generación de Relaciones. Direcciones y Cardinalidad</li>
                                        <li>Clase 7 – Calendario Automático. Dimensión Dinámica</li>
                                        <li>Clase 8 – Tablas calculadas y columnas calculadas</li>
                                        <li>Clase 9 – DAX. Generación de métricas rápidas</li>
                                        <li>Clase 10 – Operadores CALCULATE, SUMX</li>
                                        <li>Clase 11 – Inteligencia de Tiempo: YTD, MTD, QTD, SPLY</li>
                                        <li>Clase 12 – Consultas, Glosario en DAX</li>
                                        <li>Clase 13 – Visuales. ¿Como se generan? Asignación de campos y Formatos</li>
                                        <li>Clase 14 – Construcción del Dashboard</li>
                                        <li>Clase 15 – Edicion de interacciones. Revision de Visuales</li>
                                        <li>Clase 16 – Publicacion Dashboard en Power BI Service</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3 p-5 px-md-5">
                <div class="d-xl-flex align-items-xl-center col-md-6 pr-5">
                    <div>
                        <h1 style="font-family: 'Raleway Black';">¿Qué estas <span style="color: #ffc902;">esperando</span>?</h1>
                        <p>Suma valor a tu currículum y consigue nuevas y mejores oportunidades. Con un único pago tendrás acceso de por vida.</p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #000;"><b>¡Comenzar ahora!</b></a>
                    </div>
                </div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center mt-5 mt-md-0">
                    <img class="img-fluid" src="assets/img/persona-sonriendo.png">
                </div>
            </div>
            <div class="row mt-0 mt-md-5 px-3">
                <div class="col-md-2 offset-md-1 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;">
                            <img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-1.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">3hs de contenido</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;">
                            <img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-2.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Soporte 24/7</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;">
                            <img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-3.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Certificado de&nbsp;conocimiento</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;">
                            <img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-4.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Online y también descargable</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;">
                            <img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-5.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Garantía de&nbsp;100% satisfacción</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-0">
                <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
                    <img class="img-fluid" src="assets/img/persona-sonriendo-computadora.png">
                </div>
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5 pr-md-5">
                    <div>
                        <h4 style="font-family: 'Raleway Black';">Este 2021 es tuyo. Convertite en un Especialista en Excel y Power BI</h4>
                        <p>Estamos tan seguros de que te va a gustar que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #ffc902; color:#000;"><b>Quiero este curso</b></a>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-md-5" style="background-image: url(assets/img/background-negro.png);
                 background-repeat: no-repeat;
                 background-size: cover;
                 background-position: center;">
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5">
                    <div>
                        <p style="color: rgb(255,255,255);">Domina Power BI y Excel en pocas horas<br></p>
                        <h1 style="font-family: 'Raleway Black';color: rgb(255,255,255);">Curso a <span style="color:#EDBD11">distancia</h1>
                        <p class="mt-5" style="color: rgb(255,255,255);">Accede hoy y obtén este  curso de por vida. Pago por única vez (sin suscripciones ni pagos mensuales).<br></p>
                        <p style="color: rgb(255,255,255);">Garantía de devolución de 7 días<br></p>
                        <p class="d-xl-flex align-items-xl-center m-0">
                            <span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: normal;color: #EDBD11;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Black';font-weight: bold;color: #EDBD11;">ARS<br></span></p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #ffffff;color: #333333;font-family: 'Raleway Bold';">Quiero este curso</a>
                    </div>
                </div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center p-5">
                    <img class="img-fluid" src="assets/img/experto-en-excel-y-power-bi.jpeg">
                </div>
            </div>
        </section>
        <?php include('../n-pages/footer-cursos.php') ?>
    </body>
</html>