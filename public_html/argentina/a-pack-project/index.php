<?php
$dirpage = '../';
if(isset($_GET)){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$idcurso = 'prom_project_pack';
include("../a-includes/funcionsDB.php");
include("../a-includes/logicparametros.php");
$curso = getCursoDetalle($idcurso);

$curso1 = getCursoDetalleCheckout('project_inicial')['producto'];
$curso2 = getCursoDetalleCheckout('project_intermedio')['producto'];
$curso3 = getCursoDetalleCheckout('project_avanzado')['producto'];
$precioJunto = $curso1['PRECIO_UNITARIO'] +$curso2['PRECIO_UNITARIO'] + $curso3['PRECIO_UNITARIO'];

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$precioCursoOficial = '$' . intval(($value / $curso['PORCENTAJE_DES']) * 100) . ' ARS';
$precioCursoOficialVal = intval(($value / $curso['PORCENTAJE_DES']) * 100);
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
    <link href="css/pack-project.css" rel="stylesheet">
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

                        <img src="img/6.jpg" class="img-fluid" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6">
                    <div class="  mt-md-4 mt-0">
                        <h5 style="color:black;" class="mb-0 pb-0">El requisito más solicitado por las empresas argentinas</h5>
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
                                <i class="fas fa-check text-success "></i> 9.5 horas de vídeo bajo demanda</li>

                            <li class="wow fadeIn" data-wow-delay="0.2" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> 35 clases</li>

                            <li class="wow fadeIn" data-wow-delay="0.3" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Incluye Curso nivel Inicial, Curso nivel Intermedio + Curso nivel Avanzado</li>

                            <li class="wow fadeIn" data-wow-delay="0.4" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Acceso de por vida a todos los niveles</li>

                            <li class="wow fadeIn" data-wow-delay="0.5" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Paso a paso y desde 0. Sin requisitos previos</li>

                            <li class="wow fadeIn" data-wow-delay="0.6" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Acceso en dispositivos móviles y TV</li>

                            <li class="wow fadeIn" data-wow-delay="0.7" style="visibility: visible;-webkit-animation-delay: 0.1; -moz-animation-delay: 0.1; animation-delay: 0.1;">
                                <i class="fas fa-check text-success "></i> Certificado de Participación</li>


                            <h4 class="mt-3 ">

                                El precio por separado de cada curso es de $<?= $curso1['PRECIO_UNITARIO']; ?> + $<?= $curso2['PRECIO_UNITARIO']; ?> + $<?= $curso3['PRECIO_UNITARIO']; ?> sumando un total de <b>$<?= $precioJunto ?><b></span></h4>
               <h4 class="mt-3 ">
               
               ¡Con ésta promo obtenés los 3 cursos a <b><?= $precioCurso ?></b> finales! <span style='color:#0d9f18;'> <b>(Ahorrás $<?= ($precioJunto - $value) ?></b>)</span></h4>
                    </div>

                    <div class="call-button mt-5">
                        <div class="row">
                            <div class="col-md-6 ">
                                <a href="checkout.php" class="hvr-sweep-to-top  wow flipInX animated shadow " data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">Quiero los 
                  3 cursos</a>
                            </div>
                            <div class="col-md-6 payments">
                                <img src="../a-img/payments.jpg" class="img-fluid wow flipInX  animated" data-wow-delay="0.3s" alt="payments" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            </div>
                        </div>
                    </div>
                    <div class="review-one mt-5">
                        <div class="review-text">
                            <p class="lead">"El Curso esta pensado para gerentes de proyecto"</p>
                        </div>
                        <div class="review-image">

                            <p class="user_name d-inline  font-weight-bold">Alberto Rodríguez - PM <i class="fa fa-star pl-1 " style="color:#ffd322;"></i>
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
                    <h3 class="text-white display-4 ">Pack Microsoft Project experto</h3>
                    <b>
		  <b>
		  <h4 class="text-white display-4">Nivel Inicial + Nivel Intermedio + Nivel Avanzado</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 align-items-center d-flex" style="">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-9 px-md-5" style="">
          <h1 class="display-4 mb-4">Dominalo en pocas horas</h1>
          <p class="lead mb-4">Con estos cursos vas a aprender a usar a fondo Microsoft Project. Explicados paso a paso en un total de 9.5 hs de videos, te enseñamos a usarla en profundidad.<br></p>
          <hr>
          <p class="lead" style="">Más de un 90% de las empresas utilizan Project para el control y seguimiento de sus proyectos, lo que lo convierte en un conocimiento imprescindible para la inserción en el mercado laboral.<br></p>
          <div class="call-button mt-5 text-dark" >
            <div class="row justify-content-md-cen">
              <div class="col-lg-6 col-md-6 col-xs-12">
                <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg " data-wow-delay="0.2s">Quiero estos cursos 👉</a>
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
                src="img/medio.jpg" width="1500"> </div>
            <div class="col-md-6 offset-lg-1 d-flex flex-column justify-content-center py-4">
              <h1 class="text-left mb-4 font-weight-bold mt-4" style="font-family: montserrat_bold">Vas a aprender</h1>

              <ul>
                <li><i class="fas fa-check text-success "></i> Creación de un plan de Proyecto</li>
                <li><i class="fas fa-check text-success "></i> Creación de lista de Tareas</li>
                <li><i class="fas fa-check text-success "></i> Recursos</li>
                <li><i class="fas fa-check text-success "></i> Seguimiento de Progreso de Tareas</li>
                <li><i class="fas fa-check text-success "></i> Vistas de Diagrama de Gantt y Gantt de Seguimiento</li>
                <li><i class="fas fa-check text-success "></i> Creación Avanzada de Tareas</li>
                                <li><i class="fas fa-check text-success "></i> Configuración Avanzada de Recursos</li>
                                <li><i class="fas fa-check text-success "></i> Resolución de Sobreasignación de Recursos</li>
                                <li><i class="fas fa-check text-success "></i> Vistas de Microsoft Project</li>
                                <li><i class="fas fa-check text-success "></i> Configuración de Subproyecto</li>
                                <li><i class="fas fa-check text-success "></i> Plantillas en Project</li>
                                <li><i class="fas fa-check text-success "></i> Costos</li>
                                <li><i class="fas fa-check text-success "></i> Análisis de Costos</li>
                                <li><i class="fas fa-check text-success "></i> Informes y Reportes</li>
                                <li><i class="fas fa-check text-success "></i> Macros en Project</li>
                                <li><i class="fas fa-check text-success "></i> y mucho mas..!!!</li>
                <li> • No requiere conocimientos previos </li>
              </ul>

              <div class="card mt-3">
                <div class="card-header" id="headingII">
                  
                        <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#collapseII" aria-expanded="true" aria-controls="collapseII">
                     Ver temario completo</button>
                <div id="collapseII" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="text-align: left;">
                    <!-- div class="card-body" -->


                    <ul style="font-family: montserrat_regular;">
                        <p class="lead mt-3" style="font-family: montserrat_bold;"> <b>Nivel Inicial</b></p>
                    <li class=”mt-1”> <b> Módulo 1 </b> - Introducción a Microsoft Project </li>
                    <ol>
                        <li class=”mt-1”> <b> Clase 1 </b> - Nociones Básicas de Manejo de Microsoft Project </li>
                    </ol>
                    <li class=”mt-1”> <b> Módulo 2 </b> - Creación de un nuevo plan de Proyecto </li>
                    <ol>
                        <li class=”mt-1”> <b> Clase 2 </b> - Información del proyecto </li>
                        <li class=”mt-1”> <b> Clase 3 </b> - Calendario laboral </li>
                    </ol>
                    <li class=”mt-1”> <b> Módulo 3 </b> - Creación de lista de Tareas </li>
                    <ol>
                        <li class=”mt-1”> <b> Clase 4 </b> - Modo de tarea </b> - Nombre de Tarea </b> - Duración de Tarea
                        </li>
                        <li class=”mt-1”> <b> Clase 5 </b> - Fecha de Comienzo </b> - Fecha Fin </b> - Relación entre tareas (predecesoras) </li>
                    </ol>
                    <li class=”mt-1”> <b> Módulo 4 </b> - Tipos de Tareas </li>
                    <ol>
                        <li class=”mt-1”> <b> Clase 6 </b> - Estructura de Trabajo </b> - Tarea resumen del proyecto </b>
                            - Tarea </b> - Fases </li>
                        <li class=”mt-1”> <b> Clase 7 </b> - Subfases </b> - Hitos </li>
                    </ol>

                    <li class=”mt-1”> <b> Módulo 5 </b> - Recursos </li>
                    <ol>
                        <li class=”mt-1”> <b> Clase 8 </b> - Recursos de Trabajo Personas -Equipamientos </li>
                        <li class=”mt-1”> <b> Clase 9 </b> - Recursos de Trabajo Materiales </b> - Asignación Básica </li>
                    </ol>
                    <li class=”mt-1”> <b> Módulo 6 </b> - Seguimiento de Progreso de Tareas </li>
                    <ol>
                        <li class=”mt-1”> <b> Clase 10 </b> - Escalas de Tiempo Clase </li>
                        <li class=”mt-1”> <b> Clase 11 </b> - Ruta Crítica </b> - Linea Base </li>
                        <li class=”mt-1”> <b> Clase 12 </b> - Avance Previsto de Tareas </li>
                        <li class=”mt-1”> <b> Clase 13 </b> - Avance Real de Tareas </li>
                    </ol>
                    <li class=”mt-1”> <b> Módulo 7 </b> - Configuración e Impresión de Vistas en Project </li>
                    <ol>
                        <li class=”mt-1”> <b> Clase 14 </b> - Vistas de Diagrama de Gantt y Gantt de Seguimiento </li>
                    </ol>
                    </ul>

                    <ul>
                        <p class="lead mt-3" style="font-family: montserrat_bold;">Nivel Intermedio</p>


                        <li class=”mt-1”> <b>Módulo 1 </b> - Configuración Avanzada de Tareas </li>
                        <ol>

                            <li class=”mt-1”> <b> Clase  1</b> - Relación entre tareas – FC -CC- FF – CF – Retraso y Adelanto </li>
                        </ol>
                        <ol>

                            <li class=”mt-1”> <b> Clase  2</b> - Relaciones – Restricciones – Prioridad – Tipo y Condicionamiento (Parte 1) </li>
                        </ol>
                        <ol>

                            <li class=”mt-1”> <b> Clase  3</b> - Relaciones – Restricciones – Prioridad – Tipo y Condicionamiento (Parte 2) </li>
                        </ol>
                        <ol>

                            <li class=”mt-1”> <b> Clase  4</b> - Tareas Cíclicas – Hitos </li>
                        </ol>
                        <ol>

                            <li class=”mt-1”> <b> Clase  5</b> - Aplicación en Proyecto Completo </li>
                        </ol>


                        <li class=”mt-1”> <b>Módulo 2 </b> - Configuración Avanzada de Recursos </li>
                        <ol>

                            <li class=”mt-1”> <b> Clase  6</b> - Trabajo – Materiales – Costos – Costos Fijos – Utilización – Tasas – Tarifas – Disponibilidad (Parte 1) </li>
                        </ol>
                        <ol>

                            <li class=”mt-1”> <b> Clase  7</b> - Trabajo – Materiales – Costos – Costos Fijos – Utilización – Tasas – Tarifas – Disponibilidad (Parte 2) </li>
                        </ol>


                        <li class=”mt-1”> <b>Módulo 3 </b> - Resolución de Sobreasignación de Recursos </li>
                        <ol>

                            <li class=”mt-1”> <b> Clase  8</b> - Organizador de Equipo – Análisis Directo </li>
                        </ol>
                        <ol>

                            <li class=”mt-1”> <b> Clase  9</b> - Redistribución y Nivelación de Recursos </li>
                        </ol>
                        <ol>

                            <li class=”mt-1”> <b> Clase  10</b> - Aplicación en Proyecto Completo </li>
                        </ol>


                        <li class=”mt-1”> <b>Módulo 4 </b> - Vistas de Microsoft Project </li>
                        <ol>

                            <li class=”mt-1”> <b> Clase  11</b> - Tipos y Configuración </li>
                        </ol>

                    </ul>

                    <ul>
                        <p class="lead mt-3" style="font-family: montserrat_bold;"> Nivel Avanzado</p>


                        <li class=”mt-1”> <b>Módulo 1 </b> - Subproyectos </li>
                        <ol>

                            <li class=”mt-1”> <b> Clase  1</b> - Vinculación de Lectura y Escritura </li>
                        </ol>
                        <ol>

                            <li class=”mt-1”> <b> Clase  2</b> - Subproyectos: Vinculación de Solo Lectura y Sin Vinculación </li>
                        </ol>


                        <li class=”mt-1”> <b>Módulo 2 </b> - Plantillas en Project </li>
                        <ol>

                            <li class=”mt-1”> <b> Clase  3</b> - Creación y Utilización </li>
                        </ol>


                        <li class=”mt-1”> <b>Módulo 3 </b> - Costos </li>
                        <ol>

                            <li class=”mt-1”> <b> Clase  4</b> - Recursos, Tareas y Proyectos </li>
                        </ol>


                        <li class=”mt-1”> <b>Módulo 4 </b> - Análisis de Costos </li>
                        <ol>

                            <li class=”mt-1”> <b> Clase  5</b> - Valor Planeado, Valor acumulado, Costo Real y VP </li>
                        </ol>
                        <ol>

                            <li class=”mt-1”> <b> Clase  6</b> - VC, IRC, IRP, CPF, CEF, VAF e IRPC </li>
                        </ol>
                        <ol>

                            <li class=”mt-1”> <b> Clase  7</b> - Valor acumulado en Fecha de Estado </li>
                        </ol>
                        <ol>

                            <li class=”mt-1”> <b> Clase  8</b> - exportación e Importación de Datos </li>
                        </ol>


                        <li class=”mt-1”> <b>Módulo 5 </b> - Informes y Reportes </li>
                        <ol>

                            <li class=”mt-1”> <b> Clase  9</b> - Uso y Configuración </li>
                        </ol>


                        <li class=”mt-1”> <b>Módulo 6 </b> - Macros en Project </li>
                        <ol>

                            <li class=”mt-1”> <b> Clase  10</b> - Creación y Aplicación </li>
                        </ol>

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
                    <a href="checkout.php" class="sc-roll hvr-sweep-to-top wow flipInX shadow-lg " data-wow-delay="0.2s">Inscribirme en los curso</a>
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
                            <p class="mb-0 lead">¡Te queda para siempre!<br><span>&nbsp;<span></p>
            </div>
          </div>
        </div>
     
    </div>
  </div>
</div>

  <div class="py-5 bg-success " style="" id=" ">
    <div class="container my-3">
      <div class="row">
        <div class="text-center mx-auto col-md-12">
          <h1 class="font-weight-bold  mb-md-5 " style="font-family: montserrat_bold">Lo que dicen nuestros alumnos/as
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 p-4 text-center">
    
          
    
          <p class="mb-3"><i>"</i>Muchas gracias. Quiero felicitarlos por los cursos, son muy entendible y tienen una buena estructura para el avance en el aprendizaje.<i>"</i> </p>
          <p class="mb-1"> <b>Leonardo Bermudez</b></p>
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
                    <p class="mb-1"> <b>Francisco Pancho Chazarreta</b></p>
                    <div class="rating-user d-inline sombras" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-lg-4 p-4 text-center">

                    <p class="mb-3">"Recomiendo este curso, todo super claro y con demostraciones visuales para los que no nunca lo usaron.100 % recomendable." </p>
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

                    <p class="mb-3">"Muy buen docente! Me llevó mas tiempo de lo esperado porque lo seguí con mi compu al pie de la letra. Aprendí muchísimo! Gracias profe"</p>
                    <p class="mb-1"> <b>Aye Urquiza </b></p>
                    <div class="rating-user d-inline sombras" style="color:#ffd322;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-lg-4 p-4 text-center">

                    <p class="mb-3"> <i>"Muy interesante, didáctico y dinámico! Me gustó porque lo pude realizar en mis tiempos libres. Muchas gracias!"</i> </p>
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

                    <p class="mb-3"> <i>"Muy bueno el curso.Tiene la gran ventaja de hacerlo en el tiempo que quieras y los horarios que quieras.Lo recomiendo"</i> </p>
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
                        <div class="card-body">9.5hs de video es la duración total del curso.</div>
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
                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h5 class="mb-0" style="">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">#6 ¿Cuál es el temario completo?</button></h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample" style="">
                        <div class="card-body">

                            <ul>
                                <p class="lead mt-3"> Nivel Inicial</p>
                                <li class=”mt-1”> <b> Módulo 1 </b> - Introducción a Microsoft Project </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 1 </b> - Nociones Básicas de Manejo de Microsoft Project </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 2 </b> - Creación de un nuevo plan de Proyecto </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 2 </b> - Información del proyecto </li>
                                    <li class=”mt-1”> <b> Clase 3 </b> - Calendario laboral </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 3 </b> - Creación de lista de Tareas </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 4 </b> - Modo de tarea </b> - Nombre de Tarea </b> - Duración de Tarea
                                    </li>
                                    <li class=”mt-1”> <b> Clase 5 </b> - Fecha de Comienzo </b> - Fecha Fin </b> - Relación entre tareas (predecesoras) </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 4 </b> - Tipos de Tareas </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 6 </b> - Estructura de Trabajo </b> - Tarea resumen del proyecto </b>
                                        - Tarea </b> - Fases </li>
                                    <li class=”mt-1”> <b> Clase 7 </b> - Subfases </b> - Hitos </li>
                                </ol>

                                <li class=”mt-1”> <b> Módulo 5 </b> - Recursos </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 8 </b> - Recursos de Trabajo Personas -Equipamientos </li>
                                    <li class=”mt-1”> <b> Clase 9 </b> - Recursos de Trabajo Materiales </b> - Asignación Básica </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 6 </b> - Seguimiento de Progreso de Tareas </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 10 </b> - Escalas de Tiempo Clase </li>
                                    <li class=”mt-1”> <b> Clase 11 </b> - Ruta Crítica </b> - Linea Base </li>
                                    <li class=”mt-1”> <b> Clase 12 </b> - Avance Previsto de Tareas </li>
                                    <li class=”mt-1”> <b> Clase 13 </b> - Avance Real de Tareas </li>
                                </ol>
                                <li class=”mt-1”> <b> Módulo 7 </b> - Configuración e Impresión de Vistas en Project </li>
                                <ol>
                                    <li class=”mt-1”> <b> Clase 14 </b> - Vistas de Diagrama de Gantt y Gantt de Seguimiento </li>
                                </ol>
                            </ul>

                            <ul>
                                <p class="lead mt-3">Nivel Intermedio</p>


                                <li class=”mt-1”> <b>Módulo 1 </b> - Configuración Avanzada de Tareas </li>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  1</b> - Relación entre tareas – FC -CC- FF – CF – Retraso y Adelanto </li>
                                </ol>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  2</b> - Relaciones – Restricciones – Prioridad – Tipo y Condicionamiento (Parte 1) </li>
                                </ol>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  3</b> - Relaciones – Restricciones – Prioridad – Tipo y Condicionamiento (Parte 2) </li>
                                </ol>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  4</b> - Tareas Cíclicas – Hitos </li>
                                </ol>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  5</b> - Aplicación en Proyecto Completo </li>
                                </ol>


                                <li class=”mt-1”> <b>Módulo 2 </b> - Configuración Avanzada de Recursos </li>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  6</b> - Trabajo – Materiales – Costos – Costos Fijos – Utilización – Tasas – Tarifas – Disponibilidad (Parte 1) </li>
                                </ol>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  7</b> - Trabajo – Materiales – Costos – Costos Fijos – Utilización – Tasas – Tarifas – Disponibilidad (Parte 2) </li>
                                </ol>


                                <li class=”mt-1”> <b>Módulo 3 </b> - Resolución de Sobreasignación de Recursos </li>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  8</b> - Organizador de Equipo – Análisis Directo </li>
                                </ol>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  9</b> - Redistribución y Nivelación de Recursos </li>
                                </ol>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  10</b> - Aplicación en Proyecto Completo </li>
                                </ol>


                                <li class=”mt-1”> <b>Módulo 4 </b> - Vistas de Microsoft Project </li>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  11</b> - Tipos y Configuración </li>
                                </ol>

                            </ul>

                            <ul>
                                <p class="lead mt-3"> Nivel Avanzado</p>


                                <li class=”mt-1”> <b>Módulo 1 </b> - Subproyectos </li>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  1</b> - Vinculación de Lectura y Escritura </li>
                                </ol>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  2</b> - Subproyectos: Vinculación de Solo Lectura y Sin Vinculación </li>
                                </ol>


                                <li class=”mt-1”> <b>Módulo 2 </b> - Plantillas en Project </li>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  3</b> - Creación y Utilización </li>
                                </ol>


                                <li class=”mt-1”> <b>Módulo 3 </b> - Costos </li>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  4</b> - Recursos, Tareas y Proyectos </li>
                                </ol>


                                <li class=”mt-1”> <b>Módulo 4 </b> - Análisis de Costos </li>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  5</b> - Valor Planeado, Valor acumulado, Costo Real y VP </li>
                                </ol>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  6</b> - VC, IRC, IRP, CPF, CEF, VAF e IRPC </li>
                                </ol>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  7</b> - Valor acumulado en Fecha de Estado </li>
                                </ol>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  8</b> - exportación e Importación de Datos </li>
                                </ol>


                                <li class=”mt-1”> <b>Módulo 5 </b> - Informes y Reportes </li>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  9</b> - Uso y Configuración </li>
                                </ol>


                                <li class=”mt-1”> <b>Módulo 6 </b> - Macros en Project </li>
                                <ol>

                                    <li class=”mt-1”> <b> Clase  10</b> - Creación y Aplicación </li>
                                </ol>

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
                        <img src="img/7.jpg" class="img-fluid" alt="product">
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6" style="">
                    <div class=" ">
                        <h3>
                        </h3>
                        <h1 class="display-5" style="font-family: montserrat_bold">Adquirí un conocimiento clave en 9.5hs</h1>
                    </div>
                    <div class="feature-list mt-4 lead">
                        <p> • Accedé hoy y tenelo de por vida. Pago por única vez (sin suscripciones ni pagos mensuales). <br>• Garantía de devolución de 7 días</p>
                        <h3 class="bg-success text-dark font-weight-bold p-2 mt-3 col-8 col-md-6 text-center">
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