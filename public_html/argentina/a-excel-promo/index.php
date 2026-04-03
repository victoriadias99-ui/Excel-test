<?php
$dirpage = '../';
if(isset($_GET)){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$idcurso = 'excel_promo';
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
<body>
    <header style="">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 col-sm-6 col-6 logo">
                    <a href="../" target="_blank"><img src="../a-img/logojpg.jpg" alt="logo" class="img-fluid"> </a>
                </div>
                <div class="col-md-3 hdphone">
                    <p> Aprendé en casa</p>
                </div>
                <div class="col-md-3 hdphone">
                    <img src="../a-img/securityjpg.jpg" alt="security" class="img-fluid">
                </div>
                <div class="col-md-1 gr-logo"></div>
                <div class="col-md-3 cta-button  col-sm-6 col-6">
                    <a class="hvr-sweep-to-right" href="checkout.php">👉 Lo quiero</a>
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
                    <div class="product-img">
                        <img src="img/excel-experto.jpg" class="img-fluid" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6">
                    <div class="section-heading">
                        <h3 style="color:black;">Curso a distancia </h3>

                        <h2 class="mt-4"><strong>Pack experto </strong></h2>
                        <h2 class="mt-4"><strong>Nivel Inicial + Nivel Intermedio + Nivel Avanzado</strong></h2>
                    </div>
                    <div class="feature-list mt-4">
                        <ul style="">
                            <li class="wow fadeIn animated animated animated animated" data-wow-delay="0.1" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">✔️ 12 horas de vídeo bajo demanda</li>
                            <li class="wow fadeIn animated animated animated animated" data-wow-delay="0.1" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">✔️ 75 clases</li>
                            <li class="wow fadeIn animated animated animated animated" data-wow-delay="0.1" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">✔️ Incluye Curso para Principiantes, Curso nivel Intermedio + Curso nivel Avanzado</li>
                            <li class="wow fadeIn animated animated animated animated" data-wow-delay="0.2" style="visibility: visible;-webkit-animation-delay: 0.2; -moz-animation-delay: 0.2; animation-delay: 0.2;"> ✔️ Acceso para siempre a todos los cursos</li>
                            <li class="wow fadeIn animated animated animated animated" data-wow-delay="0.3" style="visibility: visible;">✔️ Paso a paso y desde 0. Sin requisitos previos<br></li>
                            <li class="wow fadeIn animated animated animated animated" data-wow-delay="0.3" style="visibility: visible;">✔️ Otorgamos Certificado oficial de Cursado<br></li>
                            <li class="wow fadeIn animated animated animated animated" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.3; -moz-animation-delay: 0.3; animation-delay: 0.3;">✔️ Estudialos desde tu PC, Notebook Tablet o Celular</li>
                            <h3 class="bg-success text-white mt-md-4 font-weight-bold p-2 mt-3 col-8 col-md-6 text-center"><strike><?= $precioCursoOficial ?></strike><span> <?= $precioCurso ?></span></h3>
                        </ul>
                    </div>
                    <div class="call-button mt-3">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated animated animated animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Quiero los 3 cursos 👉</a>
                            </div>
                            <div class="col-md-6 payments">
                                <img src="../a-img/payments.jpg" class="img-fluid wow flipInX animated animated animated animated" data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- As Featured On Section -->
    <!-- Intro Section -->
    <div class="py-5 text-center mt-4" style="	background-image: url(&quot;img/fondo2.jpg&quot;);	background-position: center left;	background-size: cover;	background-repeat: repeat;">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-12">
                    <h3 class="text-white display-4">Pack experto 🎓</h3>
                    <b>
		  <b>
		  <h3 class="text-white display-4">Nivel Inicial + Nivel Intermedio + Nivel Avanzado 🎓</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 align-items-center d-flex" style="">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-9 px-md-5" style="">
          <h1 class="display-4 mb-4">Dominalo en pocas horas</h1>
          <p class="lead mb-4">Con estos cursos vas a aprender a usar a fondo Microsoft Excel. Explicados paso a paso en un total de 12 hs de videos, te enseñamos a usarla en profundidad.<br></p>
          <hr>
          <p class="lead" style="">Más de un 80% de las empresas utilizan Excel para sus tareas, lo que lo convierte en un conocimiento imprescindible para la inserción en el mercado laboral.<br></p>
          <div class="call-button mt-5">
            <div class="row justify-content-md-cen">
              <div class="col-md-3">
                <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg" data-wow-delay="0.2s">Quiero estos cursos 👉</a>
              </div>
            </div>
             
           </div>
        </div>
         
      </div>
    </div>
  </div>
  <hr>
  <div class="py-5" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center mb-4">🎓 Vas a aprender</h1>
          <div class="row">
            <div class="col-lg-5 col-md-6 p-md-4 "> <img class="img-fluid d-block img-thumbnail" src="img/laptopconlogo.jpg" width="1500"> </div>
            <div class="col-md-6 offset-lg-1 d-flex flex-column justify-content-center py-4">
               <ul>
                <li>✔️ Fundamentos de Microsoft Excel</li>
                <li>✔️ Conocer las funciones básicas de excel</li>
                   <li>✔️ Utilizar filtros básicos y avanzados en la gestión de información</li>
                  <li>✔️ Crear facturas </li>
                <li>✔️ Armar tablas dinámicas </li>
                  <li>✔️ Funciones básicas y avanzadas </li>
                  <li>✔️ Crear dashboards </li>
                   <li>✔️ Ejecutar y automatizar Macros </li>
				   <li>✔️ Introducción VBA - Programación VBA </li>
				   <li>✔️ KPI´s </li>
				   <li>✔️ Conexión de Bases de datos a traves de Power Pivot </li>
				   <li>✔️ Herramientas de análisis de datos, Estadística Descriptiva, Media Móvil</li>
				   
                     <li>✔️ y muchísimo mas!</li>
                <li> • No requiere conocimientos previos </li>
              </ul>
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
   
  <div class="py-4 text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 p-3">
          <div class="card">
            <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/certificado.jpg" width="150">
              <h4>Certificado</h4>
              <p class="mb-0">Te brindamos Certificado de Cursado.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-3 col-md-6">
          <div class="card">
            <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/soporte.jpg" width="150">
              <h4>Soporte </h4>
              <p class="mb-0">Nosotros los profesores te vamos a ayudar con cada duda que tengas :)</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 p-3 col-md-6">
          <div class="card">
            <div class="card-body p-4"> <img class="img-fluid d-block mb-3 mx-auto rounded-circle" src="img/acceso.jpg" width="150">
              <h4>Acceso de por vida</h4>
              <p class="mb-0">¡Te quedan para siempre! Hacelo a tu ritmo</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
   
   
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
            <div class="card-body"> ¡De por vida! Una vez que abones esta promo vas a tener acceso para siempre a ambos cursos. Los vas a poder descargar en tu PC, notebook, tablet o celular.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto tiempo tardo en terminarlos?</button></h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
            <div class="card-body">12 hs de videos es la duración total de ambos cursos.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan soporte?</button></h5>
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
            <div class="card-body">No requiere conocimientos previos. Sólo necesitás una PC o Notebook con el Excel instalado. Si no tenés Excel, dentro del curso te enseñamos cómo descargarlo gratis :)</div>
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
             <p class="lead font-weight-bold"> CURSO NIVEL INICIAL</p>
                  <li>Clase 1: Estructuras básicas de Excel</li>
                    <li>Clase 2: Hacer una factura</li>
                    <li>Clase 3: Hojas, libros</li>
                    <li>Clase 4: Vista Backstage: libro, hojas, en la vista vemos botones inicio, nuevo y abrir</li>
                    <li>Clase 5: Insertar Celdas Filas y Columnas</li>
                    <li>Clase 6: Eliminar Celdas Filas y Columnas</li>
                    <li>Clase 7: Ocultar y visualizar de nuevo filas y columnas sin eliminarlas</li>
                    <li>Clase 8: Copiar, cortar y pegar celdas</li>
                    <li>Clase 9: Formato a la tabla de datos Ajustar texto Alinear texto</li>
                    <li>Clase 10: Formato simple monedas</li>
                    <li>Clase 11: Creación de lista desplegable</li>
                    <li>Clase 12: Ordenar la base de datos orden de A Z de Z A y personalizado</li>
                    <li>Clase 13: Buscar y reemplazar</li>
                    <li>Clase 14: Alternativas para copiar una hoja.</li>
                    <li>Clase 15: Operaciones aritméticas (Sumar, Restar, Multiplicar, Dividir)</li>
                    <li>Clase 16: Sumar por celda, sumar con formula y la funcion autosuma</li>
                    <li>Clase 17: Multiplicación con selección de celdas y fórmula de PRODUCTO</li>
                    <li>Clase 18: División por celdas y formula COCIENTE</li>
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
              
              <ul>
                        <p class="lead font-weight-bold mt-5"> CURSO NIVEL INTERMEDIO</p>
                        <li>Clase 1: Estructuras básicas de excel</li>
                        <li>Clase 1	    Tablas Dinámicas</li>
                        <li>Clase 2	    Funciones Lógicas - Función SI & SI ANIDADA</li>
                        <li>Clase 3	    Funciones Lógicas - Función SI.ERROR</li>
                        <li>Clase 4	    Funciones Lógicas -  Función (O) & Y</li>
                        <li>Clase 5	    Función CONCATENAR</li>
                        <li>Clase 6	    Función INDIRECTO</li>
                        <li>Clase 7	    Funciones de Texto</li>
                        <li>Clase 8	    Función INDICE y COINCIDIR</li>
                        <li>Clase 9	    Remover datos duplicados</li>
                        <li>Clase 10	Función SUBTOTALES</li>
                        <li>Clase 11	Funcion Pronostico</li>
                        <li>Clase 12	Listas Desplegables Dependientes</li>
                        <li>Clase 13	Listas Desplegables Dinámicas</li>
                        <li>Clase 14	Creación y Grabación de Macros</li>
                        <li>Clase 15	Ejecución y Automatización con Macros</li>
                        <li>Clase 16	Crear plantilla para Gráficos</li>
                        <li>Clase 17	Filtros Avanzados para Excel</li>
                        <li>Clase 18	Análisis de Hipótesis</li>
                        <li>Clase 19	Graficos Dinámicos</li>
                        <li>Clase 20	Clase 20: Parte 1 - Modelo de datos para creacion de dashboard</li>
                        <li>Clase 20	Clase 20: Parte 2 - Utilizacion de modelo de datos y creacion de dashboard</li>
                        <li>Clase 21	Casos Practicos para los usuarios</li>
						
						<p class="lead font-weight-bold mt-5"> CURSO NIVEL AVANZADO</p>
<li>Clase 1 - Construcción Bases de datos</li>
<li>Clase 2 - Filtros y limpieza de datos</li>
<li>Clase 3 - Columnas primarias y formuladas</li>
<li>Clase 4 - Principales fórmulas utilizadas en las Bases de Datos</li>
<li>Clase 5 - Buscarv</li>
<li>Clase 6 - Buscarh</li>
<li>Clase 7 - Coindicir</li>
<li>Clase 8 - KPI´s</li>
<li>Clase 9 -  Estadística Descriptiva</li>
<li>Clase 10 - Media Móvil</li>
<li>Clase 11 - Regresión lineas</li>
<li>Clase 12 – Diseños</li>
<li>Clase 12 - Minigráficos</li>
<li>Clase 13 - Líneas de tendencia</li>
<li>Clase 14 - Histogramas</li>
<li>Clase 15 - Instalación</li>
<li>Clase 16 - Conexión de Bases de datos</li>
<li>Clase 17 - Columnas formuladas</li>
<li>Clase 18 - Creación de modelos y conexión entre tablas</li>  
<li>Clase 19 - Análisis de datos y construcción de gráficos</li>  
<li>Clase 20 - Formularios - Definición de objeto</li>  
<li>Clase 21 - Uso de controles - Detallar controles y características</li>  
<li>Clase 22 - Diseño de formularios - Pasos para un buen diseño</li>
<li>Clase 23 - Automatización - Formularios y macros</li>   
<li>Clase 24 - Introducción VBA - Programación VBA</li>  
					
              </ul>
              
              
              
              
              
              </div>
          </div>
        </div>
      </div>
      <div class="call-button mt-5">
        <div class="row justify-content-md-center">
          <div class="col-md-3">
            <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg" data-wow-delay="0.2s">lo quiero ya&nbsp;👉</a>
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
            <h5 class="mb-0" style=""><button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">#1 ¿Por cuánto tiempo los tengo?</button></h5>
          </div>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
            <div class="card-body">¡De por vida! Una vez que abones esta promo vas a tener acceso para siempre a ambos cursos. Los vas a poder descargar en tu PC, notebook, tablet o celular.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header " id="headingTwo">
            <h5 class="mb-0 " style=""><button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">#2 ¿Cuánto tiempo tardo en terminarlos?</button></h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
            <div class="card-body">12 hs de videos es la duración total de ambos cursos.</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">#3 ¿Dan soporte?</button></h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample" style="">
            <div class="card-body">Sí, damos soporte 24/7. Podés consultar cualquier duda en nuestro e-mail o Whatsapp..</div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingFour">
            <h5 class="mb-0" style="">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">#4 ¿Incluye Certificado?</button></h5>
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
            <div class="card-body">No requiere conocimientos previos. Sólo necesitás una PC o Notebook con el Excel instalado. Si no tenés Excel, dentro del curso te enseñamos cómo descargarlo gratis :)</div>
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
             <p class="lead font-weight-bold"> CURSO NIVEL INICIAL</p>
                  <li>Clase 1: Estructuras básicas de Excel</li>
                    <li>Clase 2: Hacer una factura</li>
                    <li>Clase 3: Hojas, libros</li>
                    <li>Clase 4: Vista Backstage: libro, hojas, en la vista vemos botones inicio, nuevo y abrir</li>
                    <li>Clase 5: Insertar Celdas Filas y Columnas</li>
                    <li>Clase 6: Eliminar Celdas Filas y Columnas</li>
                    <li>Clase 7: Ocultar y visualizar de nuevo filas y columnas sin eliminarlas</li>
                    <li>Clase 8: Copiar, cortar y pegar celdas</li>
                    <li>Clase 9: Formato a la tabla de datos Ajustar texto Alinear texto</li>
                    <li>Clase 10: Formato simple monedas</li>
                    <li>Clase 11: Creación de lista desplegable</li>
                    <li>Clase 12: Ordenar la base de datos orden de A Z de Z A y personalizado</li>
                    <li>Clase 13: Buscar y reemplazar</li>
                    <li>Clase 14: Alternativas para copiar una hoja.</li>
                    <li>Clase 15: Operaciones aritméticas (Sumar, Restar, Multiplicar, Dividir)</li>
                    <li>Clase 16: Sumar por celda, sumar con formula y la funcion autosuma</li>
                    <li>Clase 17: Multiplicación con selección de celdas y fórmula de PRODUCTO</li>
                    <li>Clase 18: División por celdas y formula COCIENTE</li>
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
              
              <ul>
                        <p class="lead font-weight-bold mt-5"> CURSO NIVEL INTERMEDIO</p>
                        <li>Clase 1: Estructuras básicas de excel</li>
                        <li>Clase 1	    Tablas Dinámicas</li>
                        <li>Clase 2	    Funciones Lógicas - Función SI & SI ANIDADA</li>
                        <li>Clase 3	    Funciones Lógicas - Función SI.ERROR</li>
                        <li>Clase 4	    Funciones Lógicas -  Función (O) & Y</li>
                        <li>Clase 5	    Función CONCATENAR</li>
                        <li>Clase 6	    Función INDIRECTO</li>
                        <li>Clase 7	    Funciones de Texto</li>
                        <li>Clase 8	    Función INDICE y COINCIDIR</li>
                        <li>Clase 9	    Remover datos duplicados</li>
                        <li>Clase 10	Función SUBTOTALES</li>
                        <li>Clase 11	Funcion Pronostico</li>
                        <li>Clase 12	Listas Desplegables Dependientes</li>
                        <li>Clase 13	Listas Desplegables Dinámicas</li>
                        <li>Clase 14	Creación y Grabación de Macros</li>
                        <li>Clase 15	Ejecución y Automatización con Macros</li>
                        <li>Clase 16	Crear plantilla para Gráficos</li>
                        <li>Clase 17	Filtros Avanzados para Excel</li>
                        <li>Clase 18	Análisis de Hipótesis</li>
                        <li>Clase 19	Graficos Dinámicos</li>
                        <li>Clase 20	Clase 20: Parte 1 - Modelo de datos para creacion de dashboard</li>
                        <li>Clase 20	Clase 20: Parte 2 - Utilizacion de modelo de datos y creacion de dashboard</li>
                        <li>Clase 21	Casos Practicos para los usuarios</li>

              
              </ul>
			  <ul>
                        <p class="lead font-weight-bold mt-5"> CURSO NIVEL AVANZADO</p>
<li>Clase 1 - Construcción Bases de datos</li>
<li>Clase 2 - Filtros y limpieza de datos</li>
<li>Clase 3 - Columnas primarias y formuladas</li>
<li>Clase 4 - Principales fórmulas utilizadas en las Bases de Datos</li>
<li>Clase 5 - Buscarv</li>
<li>Clase 6 - Buscarh</li>
<li>Clase 7 - Coindicir</li>
<li>Clase 8 - KPI´s</li>
<li>Clase 9 -  Estadística Descriptiva</li>
<li>Clase 10 - Media Móvil</li>
<li>Clase 11 - Regresión lineas</li>
<li>Clase 12 – Diseños</li>
<li>Clase 12 - Minigráficos</li>
<li>Clase 13 - Líneas de tendencia</li>
<li>Clase 14 - Histogramas</li>
<li>Clase 15 - Instalación</li>
<li>Clase 16 - Conexión de Bases de datos</li>
<li>Clase 17 - Columnas formuladas</li>
<li>Clase 18 - Creación de modelos y conexión entre tablas</li>  
<li>Clase 19 - Análisis de datos y construcción de gráficos</li>  
<li>Clase 20 - Formularios - Definición de objeto</li>  
<li>Clase 21 - Uso de controles - Detallar controles y características</li>  
<li>Clase 22 - Diseño de formularios - Pasos para un buen diseño</li>
<li>Clase 23 - Automatización - Formularios y macros</li>   
<li>Clase 24 - Introducción VBA - Programación VBA</li>    

              
              </ul>
              
              
              
              
              
              </div>
          </div>
        </div>
      </div>
      <div class="call-button mt-5">
        <div class="row justify-content-md-center">
          <div class="col-md-3">
            <a href="checkout.php" class="sc-roll hvr-sweep-to-top  wow flipInX animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Quiero ambos cursos&nbsp;👉</a>
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
          <div class="product-img">
            <img src="img/excel-experto.jpg" class="img-fluid" alt="product">
          </div>
        </div>
        <div class="col-md-1">&nbsp;</div>
        <div class="col-md-6" style="">
          <div class="section-heading">
            <h3>
            </h3>
            <h3 style="color:black;">Domina Microsoft Excel en pocas horas</h3>
            <h2 class="mt-4">🎓 Curso a distancia - 3 niveles</h2>
          </div>
          <div class="feature-list mt-4">
            <p> • Accedé hoy y tené ambos cursos de por vida. Pago por única vez (sin suscripciones ni pagos mensuales). <br>• Garantía de devolución de 7 días</p>
            <h3 class="bg-success text-white mt-md-4 font-weight-bold p-2 mt-3 col-8 col-md-6 text-center"><strike><?= $precioCursoOficial ?></strike><span> <?= $precioCurso ?></span></h3>
          </div>
          <div class="call-button mt-5">
            <div class="row">
              <div class="col-md-6">
                <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">Quiero estos cursos 👉</a>
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