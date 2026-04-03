<?php
$dirpage = '../';
$titulo = 'Pack experto en Excel';

$idcurso = 'excel_promo';
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
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <?php include('../n-pages/head.php')?>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php 
        $headerImagen = "assets/img/imagen-header.png";
        include('../n-pages/header.php')
        ?>
        
        <section>
            <div class="row">
                <div class="col-md-7 px-5 ">
                    <img class="d-block d-md-none img-fluid mb-4" src="assets/img/imagen-header-excel-computadora-2.jpg" width="100%">
                    <h5 class="texto-header">4.9/5&nbsp;<i class="fa fa-star" style="color: #F7AC3B;"></i>&nbsp;Basado en 15.000 estudiantes</h5>
                    <h1 style="font-family: 'Raleway Black'; color:#00173B;">Pack experto en Excel</h1>
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Conviértete en el profesional que las empresas están buscando</h5>
                    
                    <div class="d-block d-md-none mt-3">
                        <h5 style="color: #00173B;font-family: 'Raleway SemiBold';">
                            <img src="assets/img/imagen-porcentaje.png" style="width: 30px;">&nbsp;Oferta limitada
                        </h5>
                        <p class="d-flex align-items-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?=$precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;">ARS<br></span></p>
                        <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?=$precioCursoOficial?> ARS</strike></p>
                        <p class="text-center">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #007A6A;width: 100%;">Quiero estos cursos</a>
                        </p>
                        
                        <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Domina la herramienta más solicitada por las empresas de todo el mundo.&nbsp;</p>
                        <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';">Destaca entre todos los currículums y consigue empleos bien pagos. Ser un Experto en esta herramienta representa un gran valor para las empresas, y están dispuestas a pagar salarios elevados por quien sepa manejar Excel en niveles avanzados.</p>
                    
                        <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Hazlo a tu propio ritmo, donde y cuando quieras<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Consulta cualquier duda 24/7<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;75 videos pre-grabados (12hs) paso a paso<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;+ 100 Ejercicios Prácticos<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;15 Plantillas Gratis<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Incluye curso Nivel Inicial, Nivel Intermedio&nbsp;y Nivel Avanzado<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Sin requisitos previos<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Otorgamos Certificado Oficial<br></li>
                            </ul>
                        <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EDF3F4;">
                                <img src="assets/img/logo-verde-calidad.png" style="width: 50px;">
                                <p class="ml-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                            </div>
                    </div>
                    
                    <img class="d-none d-md-block img-fluid mt-2" src="assets/img/imagen-header-excel-computadora-2.jpg" width="100%">
                    <p class="d-none d-md-block mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Domina la herramienta más solicitada por las empresas de todo el mundo.&nbsp;</p>
                    <p class="d-none d-md-block" style="color: #555555;font-family: 'Raleway Regular';">Destaca entre todos los currículums y consigue empleos bien pagos. Ser un Experto en esta herramienta representa un gran valor para las empresas, y están dispuestas a pagar salarios elevados por quien sepa manejar Excel en niveles avanzados.</p>
                    <a href="<?= $urlCheckout ?>" class="d-none d-md-block btn btn-primary px-5" style="background: #007A6A;">Quiero estos cursos</a>
                    <p class="my-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>
                    
                    <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Conviértete en un Experto en Excel con nuestro método dinámico y simple</h5>
                            
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Ejemplos reales, desde un nivel inicial hasta avanzado, soporte cada vez que lo necesites, y sin requisitos previos. </p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-1.png">&nbsp; +12 horas de contenido para verlos donde y cuando quieras.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-2.png">&nbsp; Acceso al curso y al soporte de por vida con un único pago.</p>
                    <p class="item-sec2"><img src="assets/img/icono-s2-3.png">&nbsp; Certificado y Garantía de 100% de satisfacción.</p>
                    <img class="d-none d-md-block img-fluid" src="assets/img/banner-2.jpg" width="100%">
                    <img class="d-block d-md-none img-fluid" src="assets/img/banner-2-movil.png" width="100%">
                    <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Este pack de 3 cursos está valorado en <b><?=$precioCursoOficial?></b> pero puede ser tuyo con esta oferta limitada por sólo:</p>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-radius: 10px;background: #ffffff;border: 1px solid #bcbcbc ;">
                        <div class="col m-0">
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?=$precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;">ARS<br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?=$precioCursoOficial?> ARS</strike></p>
                        </div>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3" style="border-bottom-style: solid;border-bottom-color: rgb(225,225,225);">
                        <img src="assets/img/logo-amarillo-calidad.png" style="width: 50px;">
                        <p class="ml-3" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>
                    </div>
                    <div class="d-xl-flex align-items-xl-center p-3"><img class="img-fluid" src="assets/img/icono-libro-compu.png" style="width: 50px;">
                        <h3 class="ml-3" style="font-family: 'Raleway SemiBold';color: #00173B;">Aprenderás</h3>
                    </div>
                    <ul class="lista-header pl-3 mt-2" style="list-style-type: none;">
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Fundamentos de Excel<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Funciones básicas y avanzadas<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Filtros básicos y avanzados para gestionar la información<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Crear facturas<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Armar tablas dinámicas<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Crear dashboards<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Ejecutar y automatizar Macros<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Introducción VBA - Programación VBA<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Conexión de Bases de datos a traves de Power Pivot<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Herramientas de análisis de datos, Estadística Descriptiva, Media Móvil<br></li>
                        <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;y muchísimo mas!<br></li>
                        <li>• No requiere conocimientos previos</li>
                    </ul>
                    <div class="p-4 mt-5" style="background: url(&quot;assets/img/banner2.png&quot;) no-repeat;background-size: cover;font-size: 0.8em;border-radius: 10px;">
                        <p style="color: rgb(255,255,255);font-family: 'Raleway Bold';font-size: 1.2em;">Serás el especialista que las empresas están buscando</p>
                        <p style="color: rgb(255,255,255);">Abre tus puertas a nuevas oportunidades. Domina Excel por completo en solo 12 horas y con soporte 24/7&nbsp;</p>
                        <p style="color: rgb(255,255,255);">Más de 15.500 estudiantes recomiendan nuestra academia</p>
                        <p style="font-size: 1.4em;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                    </div>
                    <h5 class="mt-4 pt-4 text-md-left text-center" style="font-family: 'Raleway Bold';color: #00173B;">Aprender excel desde casa nunca ha sido tan simple</h5>
                    <div class="row mt-3">
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="assets/img/icon-certificado.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Certificado</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Adquiere un Certificado para sumar a tu Currículum</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="assets/img/icon-soporte.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Soporte</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Obtén soporte siempre que lo necesites</p>
                            </div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="assets/img/icon-por-vide.png">
                                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Acceso de por vida</h5>
                                <p class="ml-3" style="font-size: 0.7em;">Aprende a tu ritmo y cuando quieras</p>
                            </div>
                        </div>
                    </div>
                    <div class="stop-card-madre row">
                        <div class="col">
                            <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 mt-5 ml-0" style="background: #007A6A;">Quiero estos cursos</a>
                            <p class="mt-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>
                            <div class="d-xl-flex align-items-xl-center p-3 text-md-left text-center mt-3">
                                <img class="img-fluid" src="assets/img/icon-regalo.png" style="width: 50px;">
                                <h3 class="ml-3" style="font-family: 'Raleway SemiBold';color: #00173B;">¡Y aún hay más!</h3>
                            </div>
                            <div class="d-xl-flex text-center text-md-left justify-content-xl-start align-items-xl-start position-relative p-3 mb-2" style="border-radius: 10px; background-image: url(assets/img/banner-bonus-1.png); background-repeat: no-repeat; background-size: cover;background-position: center;"><img class="img-fluid" src="assets/img/ico-bonus-1.png" style="width: 50px;">
                                <div class="ml-md-4">
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">Bonus #1</h5>
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">+ 10 Templates</h5>
                                    <p class="texto-aun-mas" style="font-size: 0.7em;">Te dejamos templates de excel para ver el uso de las herramientas necesarias. (El uso de herramientas también se explica en los videos)</p>
                                </div>
                            </div>
                            <div class="d-xl-flex text-center text-md-left justify-content-xl-start align-items-xl-start position-relative p-3 mb-2" style="border-radius: 10px; background-image: url(assets/img/banner-bonus-2.png); background-repeat: no-repeat; background-size: cover;background-position: center;"><img class="img-fluid" src="assets/img/ico-bonus-2.png" style="width: 50px;">
                                <div class="ml-md-4">
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">Bonus #2</h5>
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">+ 20 Ejercicios</h5>
                                    <p class="texto-aun-mas" style="font-size: 0.7em;">Aprenderás cómo crear un atractivo recibo formal para darle a tus clientes, brindando profesionalismo y confianza</p>
                                </div>
                            </div>
                            <div class="d-xl-flex text-center text-md-left justify-content-xl-start align-items-xl-start position-relative p-3" style="border-radius: 10px; background-image: url(assets/img/banner-bonus-3.png); background-repeat: no-repeat; background-size: cover;background-position: center;"><img class="img-fluid" src="assets/img/ico-bonus-3.png" style="width: 50px;">
                                <div class="ml-md-4">
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">Bonus #3</h5>
                                    <h5 style="font-family: 'Raleway Bold';color: #00173B;">+ Examen Integrador&nbsp;</h5>
                                    <p class="texto-aun-mas" style="font-size: 0.7em;">Al final podés presentar un examen para poder validar todo lo que aprendiste en el curso.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-block col-md-5 position-relative">
                    <div class="card-madre px-3 py-4 mr-5" style="position: fixed; border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div class="col">
                            <h5 style="color: #00173B;font-family: 'Raleway SemiBold';"><img src="assets/img/imagen-porcentaje.png" style="width: 50px;">&nbsp;Oferta limitada</h5>
                            <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCurso ?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Light';font-weight: bold;color: #008B69;">ARS<br></span></p>
                            <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficial ?> ARS</strike></p>
                            <p class="text-center">
                                <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5" style="background: #007A6A;width: 80%;">Quiero estos cursos</a>
                            </p>
                            <ul class="lista-header pl-3" style="list-style-type: none;">
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Hazlo a tu propio ritmo, donde y cuando quieras<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Consulta cualquier duda 24/7<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;75 videos pre-grabados (12hs) paso a paso<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;+ 100 Ejercicios Prácticos<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;15 Plantillas Gratis<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Incluye curso Nivel Inicial, Nivel Intermedio&nbsp;y Nivel Avanzado<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Sin requisitos previos<br></li>
                                <li><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Otorgamos Certificado Oficial<br></li>
                            </ul>
                            <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EDF3F4;">
                                <img src="assets/img/logo-verde-calidad.png" style="width: 50px;">
                                <p class="ml-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                            </div>
                        </div>
                    </div>
                    <image class="objeto-flotante-1" src="assets/img/objeto-flotante-1.png">
                    <image class="objeto-flotante-2" src="assets/img/objeto-flotante-2.png">
                    <image class="objeto-flotante-3" src="assets/img/objeto-flotante-3.png">
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
                        <li>Clase 2	    Funciones Lógicas - Función SI &amp; SI ANIDADA</li>
                        <li>Clase 3	    Funciones Lógicas - Función SI.ERROR</li>
                        <li>Clase 4	    Funciones Lógicas -  Función (O) &amp; Y</li>
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
                </div>
            </div>
            
            <div class="row mt-5 py-5" style="background: url(&quot;assets/img/seccion-verde.jpg&quot;);background-size: cover;">
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
                                                <p class="text-center">Lo recomiendo, el profe explica muy bien y es facil ver los videos. gracias.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Belén</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p class="text-center">Introduce muchas herramientas en excel. Muy satisfecho.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Federico</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p class="text-center">Enseña muy bien, tengo poco manejo de pc y me fue de mucha utilidad.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Ramiro</h5>
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
                                                <p class="text-center">Muy completo! gracias.</p>
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
                                                <p class="text-center">Excelente.</p>
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
            <div class="row mt-3 p-5 px-md-5">
                <div class="d-xl-flex align-items-xl-center col-md-6 pr-5">
                    <div>
                        <h1 style="font-family: 'Raleway Black';">¿Qué estas esperando?</h1>
                        <p>Al final podés presentar un examen para poder validar todo lo que aprendiste en el curso.</p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #007A6A;">¡Comenzar ahora!</a>
                    </div>
                </div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center mt-5 mt-md-0">
                    <img class="img-fluid" src="assets/img/persona-sonriendo.png">
                </div>
            </div>
            <div class="row mt-0 mt-md-5 px-3">
                <div class="col-md-2 offset-md-1 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-1.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">3hs de contenido</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-2.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Soporte 24/7</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-3.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Certificado de&nbsp;conocimiento</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-4.png">
                            <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Online y también descargable</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-2 mb-md-0">
                    <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                        <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="assets/img/icon-5-5.png">
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
                        <h4 style="font-family: 'Raleway Black';">Miles de alumnos de todo el país han aprendido con nuestro Curso Online a utilizar Excel para mejorar sus oportunidades.</h4>
                        <p>Estamos tan seguros de que te va a gustar que te ofrecemos 7 días para ver el contenido. Si no te gusta te devolvemos el 100% de tu dinero.</p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #007A6A;">Quiero estos cursos</a>
                    </div>
                </div>
            </div>
            <div class="row px-3 px-md-5" style="background: linear-gradient(90deg, #007a6a, #008c69 71%, #5e892b 100%);">
                <div class="d-xl-flex align-items-xl-center col-md-6 p-5">
                    <div>
                        <p style="color: rgb(255,255,255);">Domina Microsoft Excel en pocas horas<br></p>
                        <h1 style="font-family: 'Raleway Black';color: rgb(255,255,255);">Curso a distancia - 3 niveles</h1>
                        <p class="mt-5" style="color: rgb(255,255,255);">Accede hoy y obtén los 3 cursos de por vida. Pago por única vez (sin suscripciones ni pagos mensuales).<br></p>
                        <p style="color: rgb(255,255,255);">Garantía de devolución de 7 días<br></p>
                        <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: normal;color: #ffffff;"><?= $precioCurso?><br></span><span class="texto-moneda-head" style="font-family: 'Raleway Black';font-weight: bold;color: #ffffff;">ARS<br></span></p>
                        <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #ffffff;color: #008b69;font-family: 'Raleway Bold';">Quiero estos cursos</a>
                    </div>
                </div>
                <div class="col d-xl-flex justify-content-xl-center align-items-xl-center p-5">
                    <img class="img-fluid" src="assets/img/laptop.png">
                </div>
            </div>
        </section>
        <?php include('../n-pages/footer-cursos.php')?>
    </body>
</html>