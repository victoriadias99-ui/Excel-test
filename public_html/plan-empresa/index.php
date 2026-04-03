<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$dirpage = '/';
$titulo = 'Plan Empresa';

/*
  $idcurso = 'excel_exp_cert';
  include($dirpage . "n-includes/funcionsDB.php");
  include($dirpage . "n-includes/logicparametros.php");
  $curso = getCursoDetalle($idcurso);


  $value = $curso['PRECIO_UNITARIO'];
  $porcentaje = $curso['PORCENTAJE_DES'];
  $precioCursoOficial = '$' . ($value + intval(($value / $porcentaje) * 100));
  $precioCurso = '$' . $value;
  $urlCheckout = './checkout_cert.php';
 */

$value = 'ddd';
$porcentaje = 'ddd';
$precioCursoOficial = 'ddd';
$precioCurso = 'ddd';
$urlCheckout = 'ddd';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <script src="/clases-en-vivo/assets/js/jquery-3.5.1.min.js"></script>
        <script src="/clases-en-vivo/assets/js/main.js"></script>
        <script src="https://kit.fontawesome.com/cd33816f91.js" crossorigin="montserrat"></script>
        <link name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/clases-en-vivo/assets/css/estilos.css">
        <?php include('../n-pages/head.php') ?>
        <link rel="stylesheet" href="/clases-en-vivo/assets/css/styles.css">

    </head>
    <?php
    $headerImagen = "/clases-en-vivo/assets/img/imagen-header.png";
    include('../n-pages/header.php')
    ?>

    <section>
        <div class="row">
            <div class="col-md-7 px-5 ">
                <img class="d-block d-md-none img-fluid mb-4" src="/clases-en-vivo/assets/img/imagen-header-excel-computadora-2.jpg" width="100%">
                <h5 class="texto-header">4.9/5&nbsp;<i class="fa fa-star" style="color: #F7AC3B;"></i>&nbsp;Basado en más de 150 empresas</h5>
                <h1 style="font-family: 'Raleway Black'; color:#00173B;">Plan para empresas</h1>
                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Capacitá a tu personal para que mejoren hasta un 70% en su trabajo</h5>

                <div class="d-block d-md-none mt-3">
                    <h5 style="color: #00173B;font-family: 'Raleway SemiBold';">
                        <i class="fa fa-certificate" style="color: #F7AC3B;"></i>&nbsp;CURSO CON CERTIFICACIÓN INTERNACIONAL
                    </h5>           
                    <p class="mt-4" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">¿Tus empleados pasan demasiado tiempo para hacer un reporte, un balance o trabajo administrativo?.&nbsp;</p>
                    <p class="mb-4" style="color: #555555;font-family: 'Raleway Regular';">El 85% de las empresas que usan Excel jamás entrenaron a su personal sobre este software, aún cuando se trata de una herramienta clave para la realización de tareas.</p>

                    <div class="d-xl-flex align-items-xl-start p-3" style="border-radius: 10px;background: #EDF3F4;">
                        <img src="/clases-en-vivo/assets/img/logo-verde-calidad.png" style="width: 50px;">
                        <p class="ml-2 mt-2" style="font-size: 0.7em;">Estamos tan seguros de que te encantará, que te ofrecemos 7 días para ver el contenido. Si no te gusta te <b>devolvemos el 100% de tu dinero</b>.</p>
                    </div>

                </div>

                <img class="d-none d-md-block img-fluid mt-2" src="/clases-en-vivo/assets/img/imagen-header-excel-computadora-2.jpg" width="100%">

                <a href="<?= $urlCheckout ?>" class="d-none d-md-block btn btn-primary px-5" style="background: #007A6A;">Solicitar más información</a><br>
                <p class="d-none d-md-block" style="color: #555555;font-family: 'Raleway Regular';">Capacitar a tu personal con Excel permitirá que realicen trabajos de manera eficaz, generando un gran impacto en su entrega final.</p>
                <p class="my-3" style="border-bottom: 2px solid #a6a6a6 ;"></p>

                <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">EN SOLO UNAS HORAS VAS A AUMENTAR LA PRODUCTIVIDAD DE TU EMPRESA</h5>

                <p class="mt-4 mb-5" style="color: rgb(85,85,85);font-family: 'Raleway Regular';">Ejemplos reales, desde un nivel inicial hasta avanzado, soporte cada vez que lo necesites, y sin requisitos previos. </p>
                <p class="item-sec2"><img src="/clases-en-vivo/assets/img/icono-s2-1.png">&nbsp; Planes personalizados. Acorde a la necesidad de cada empleado.</p>
                <p class="item-sec2"><img src="/clases-en-vivo/assets/img/icono-s2-2.png">&nbsp; Acceso al curso y al soporte de por vida con un único pago.</p>
                <p class="item-sec2"><img src="/clases-en-vivo/assets/img/icono-s2-3.png">&nbsp; Certificado Internacional y Garantía de 100% de satisfacción.</p>
                <img class="d-none d-md-block img-fluid" src="/clases-en-vivo/assets/img/banner-2.jpg" width="100%">
                <img class="d-block d-md-none img-fluid" src="/clases-en-vivo/assets/img/banner-2-movil.png" width="100%">
                <div class="d-xl-flex align-items-xl-center p-3" style="border-radius: 10px;background: #ffffff;border: 1px solid #bcbcbc ;">

                </div>

                <div class="d-xl-flex align-items-xl-center p-3" style="border-bottom-style: solid;border-bottom-color: rgb(225,225,225);">
                    <img src="/clases-en-vivo/assets/img/logo-amarillo-calidad.png" style="width: 50px;">
                    <p class="ml-3 mt-3" style="font-size: 0.7em;">Aumenta la proactividad de tus empleados.</p>
                </div>
                <div class="d-xl-flex align-items-xl-center p-3"><img class="img-fluid" src="/clases-en-vivo/assets/img/icono-libro-compu.png" style="width: 50px;">
                    <h3 class="ml-3 mt-3" style="font-family: 'Raleway SemiBold';color: #00173B;">Actualmente brindamos los siguientes cursos</h3>
                </div>
                <ul class="lista-header pl-3 mt-2" style="list-style-type: none;">
                    <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Excel nivel inicial<br></li>
                    <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Excel nivel intermedio<br></li>
                    <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Excel nivel avanzado<br></li>
                    <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Power Bi<br></li>
                    <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Word</li>
                    <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Base de datos MySQL Server</li>
                    <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Programación C#</li>
                    <li style="font-size:14px;"><i class="fa fa-check" style="color: #008B69;"></i>&nbsp;Y muchos cursos más...</li>
                </ul>
                <div class="row mt-3">
                    <div class="col-md-4 p-1">
                        <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="/clases-en-vivo/assets/img/icon-certificado.png">
                            <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Certificado Internacional</h5>
                            <p class="ml-3" style="font-size: 0.7em;">Certificación Profesional emitida por <b>Educar</b>, con cooperación académica de <b>UTN, UBA y UNLP</b> mediante un convenio con la fundación Promover. Validez internacional en Latinoamérica y España.</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="/clases-en-vivo/assets/img/icon-soporte.png">
                            <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Soporte</h5>
                            <p class="ml-3" style="font-size: 0.7em;">Obtén soporte siempre que lo necesites</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="p-3 text-center" style="border: 2px solid #bcbcbc;border-bottom-style: solid;border-radius: 10px;"><img class="icono-csa" src="/clases-en-vivo/assets/img/icon-por-vide.png">
                            <h5 class="mt-4" style="font-family: 'Raleway Bold';color: #00173B;">Acceso de por vida</h5>
                            <p class="ml-3" style="font-size: 0.7em;">Cursos asincrónicos</p>
                        </div>
                    </div>
                </div>
                <div class="stop-card-madre row">
                    <div class="col m-0">
                        <img class="img-fluid" src="/clases-en-vivo/assets/img/certificado-internacional-excel.png">
                        <img class="img-fluid" src="/clases-en-vivo/assets/img/excel-certificacion-internacional.jpg">
                    </div>

                </div>
            </div>
            <div class="p-2 d-block d-md-none " >
                <div class=" py-5 px-3 col m-0 text-dark ">
                    <h3 class="text-dark font-weight-bold">SOLICITÁ PRESUPUESTO</h3>
                    <p class="lead" style="color:black; "><b>RESPUESTA
                            <span style="color:#1ae759;"> INMEDIATA <i class="fas fa-tachometer-alt"></i></span> </b></p>
                    <p>*Formulario solo para empresas, no para planes individuales</p>
                    <form class="" name="formulario" method="post" action="enviar.php">
                        <input type="hidden" name="ip" value="">
                        <div class="form-group  mt-2 shadow">
                            <input type="text" class="form-control form-control-md" placeholder="Tu Nombre" name="nombre" required=""> </div>
                        <div class="form-group  mt-2 shadow">
                            <input type="email" class="form-control form-control-md" placeholder="Tu correo" name="correo" required=""> </div>
                        <div class="form-group  mt-2 shadow">
                            <input type="text" class="form-control form-control-md" placeholder="Tu celular (+cód de área)" name="telefono" required=""> </div>
                        <div class="form-group  mt-2 shadow">
                            <input type="text" class="form-control form-control-md" placeholder="Empresa" name="empresa" required=""> </div>
                        <div class="form-group  mt-2 shadow">
                            <input type="text" class="form-control form-control-md" placeholder="Cantidad de usuarios" name="usuarios" required=""> </div>

                        <div class="form-group shadow">
                            <textarea class="form-control " name="comentario" id="contacto" placeholder="Comentarios" maxlength="500" rows="3"  required=""></textarea>
                        </div>
                        <input type="hidden" name="origen" value="FB Lead">
                        <h4 id="formdsktp" class="text-left lead mt-4 font-weight-bold" style="color:white;"></h4>
                        <button type="submit" class="btn btn-block py-3 px-5 mb-4 heartbeat shadow" style="font-size:30px; background-color:#24a547; color:white; border-radius: 0;">ENVIAR</button>
                    </form>
                    <div>
                        <image class="objeto-flotante-1" src="/clases-en-vivo/assets/img/objeto-flotante-1.png">
                        <image class="objeto-flotante-2" src="/clases-en-vivo/assets/img/objeto-flotante-2.png">
                        <image class="objeto-flotante-3" src="/clases-en-vivo/assets/img/objeto-flotante-3.png">
                    </div>
                </div>
            </div>
            <div class="d-none d-md-block col-md-5">
                <div class="card-madre px-3 py-4 " style="position: fixed; border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                    <div class="col">
                        <div class="col-md-9 mt-2 container text-dark" id="ch">
                            <a id="formumobile"></a>
                            <div class="mx-auto text-center py-5 px-3  text-dark">
                                <h3 class="text-dark font-weight-bold">SOLICITÁ PRESUPUESTO</h3>
                                <p class="lead" style="color:black; "><b>RESPUESTA
                                        <span style="color:#1ae759;"> INMEDIATA <i class="fas fa-tachometer-alt"></i></span> </b></p>
                                <p>*Formulario solo para empresas, no para planes individuales</p>
                                <form class="" name="formulario" method="post" action="enviar.php">
                                    <input type="hidden" name="ip" value="">
                                    <div class="form-group  mt-2 shadow">
                                        <input type="text" class="form-control form-control-md" placeholder="Tu Nombre" name="nombre" required=""> </div>
                                    <div class="form-group  mt-2 shadow">
                                        <input type="email" class="form-control form-control-md" placeholder="Tu correo" name="correo" required=""> </div>
                                    <div class="form-group  mt-2 shadow">
                                        <input type="text" class="form-control form-control-md" placeholder="Tu celular (+cód de área)" name="telefono" required=""> </div>
                                    <div class="form-group  mt-2 shadow">
                                        <input type="text" class="form-control form-control-md" placeholder="Empresa" name="empresa" required=""> </div>
                                    <div class="form-group  mt-2 shadow">
                                        <input type="text" class="form-control form-control-md" placeholder="Cantidad de usuarios" name="usuarios" required=""> </div>

                                    <div class="form-group shadow">
                                        <textarea class="form-control " name="comentario" id="contacto" placeholder="Comentarios" maxlength="500" rows="3"  required=""></textarea>
                                    </div>
                                    <input type="hidden" name="origen" value="FB Lead">
                                    <h4 id="formdsktp" class="text-left lead mt-4 font-weight-bold" style="color:white;"></h4>
                                    <button type="submit" class="btn btn-block py-3 px-5 mb-4 heartbeat shadow" style="font-size:30px; background-color:#24a547; color:white; border-radius: 0;">ENVIAR</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <image class="objeto-flotante-1" src="/clases-en-vivo/assets/img/objeto-flotante-1.png">
                <image class="objeto-flotante-2" src="/clases-en-vivo/assets/img/objeto-flotante-2.png">
                <image class="objeto-flotante-3" src="/clases-en-vivo/assets/img/objeto-flotante-3.png">
            </div>
        </div>




        <div class="row  mt-3 p-5 px-md-5">
            <div class="col-md-12">
                <h1 style="font-family: 'Raleway Black';">Somos expertos despejando cualquier duda</h1>
                <div class="accordion mt-4" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0"><button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">#1 ¿Por cuánto tiempo lo tengo?</button></h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                            <div class="card-body" style="font-size:14px;"> ¡De por vida! Tus empleados tendras acceso ilimitado para acceder en cualquier horario.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0" style=""><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapsetwo">#2 ¿Dan soporte?</button></h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample" style="">
                            <div class="card-body" style="font-size:14px;">Sí, damos soporte 24/7. Podés consultar cualquier duda en nuestro e-mail o Whatsapp.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">#4 ¿Incluye Certificación o Diploma?</button></h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample" style="">
                            <div class="card-body" style="font-size:14px;">Una vez que tus empleados terminen el curso podran solicitarnos la Certificación Profesional emitida por <b>Educar</b>, con cooperación académica de <b>UTN, UBA y UNLP</b> mediante un convenio con la fundación Promover. Validez internacional en Latinoamérica y España.</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0" style="">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">#5 ¿Qué requisitos tiene?</button></h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample" style="">
                            <div class="card-body" style="font-size:14px;">No requiere conocimientos previos. Sólo necesitás una PC con el Excel instalado.</div>
                        </div>
                    </div>
                    <div class="card">

                        <div class="row mt-3 p-5 px-md-5">
                            <div class="d-xl-flex align-items-xl-center col-md-6 pr-5">
                                <div>
                                    <h1 style="font-family: 'Raleway Black';">¿Qué estas esperando?</h1>
                                    <p>¡Somos la única academia en Argentina con <b>Certificación Internacional!</b></p>
                                    <p>Diseñamos un plan de estudios para tus trabajadores y adaptamos los cursos a las necesidad de tu <b>empresa.</b></p>
                                    <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #007A6A;">Solicitar más información</a>
                                </div>
                            </div>
                            <div class="col d-xl-flex justify-content-xl-center align-items-xl-center mt-5 mt-md-0">
                                <img class="img-fluid" src="/clases-en-vivo/assets/img/persona-sonriendo.png">
                            </div>
                        </div>
                        <div class="row mt-0 mt-md-5 px-3">

                            <div class="col-md-2 mb-2 mb-md-0">
                                <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                                    <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="/clases-en-vivo/assets/img/icon-5-2.png">
                                        <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Soporte 24/7</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                                    <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="/clases-en-vivo/assets/img/icon-5-3.png">
                                        <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Certificado Internacional</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                                    <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="/clases-en-vivo/assets/img/icon-5-4.png">
                                        <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Online</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mb-2 mb-md-0">
                                <div class="px-2 py-4" style="border-radius: 10px;box-shadow: 10px 10px 20px 3px rgb(205,205,205);background: #ffffff;">
                                    <div class="col" style="text-align: center;"><img class="img-fluid card-imagen-section-2" src="/clases-en-vivo/assets/img/icon-5-5.png">
                                        <h5 class="mt-3" style="font-family: 'Raleway Bold';color: #00173B;">Garantía de&nbsp;100% satisfacción</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mb-0">
                            <div class="col d-xl-flex justify-content-xl-start align-items-xl-center">
                                <img class="img-fluid" src="/clases-en-vivo/assets/img/persona-sonriendo-computadora.png">
                            </div>
                            <div class="d-xl-flex align-items-xl-center col-md-6 p-5 pr-md-5">
                                <div>
                                    <h4 style="font-family: 'Raleway Black';">Cientos de empresas de todo el país se han capacitado con nosotros, consiguiendo mejorar a su personal.</h4>

                                    <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #007A6A;">Solicitar más información</a>
                                </div>
                            </div>
                        </div>

                        <div class="row px-3 px-md-5" style="background: linear-gradient(90deg, #007a6a, #008c69 71%, #5e892b 100%);">
                            <div class="d-xl-flex align-items-xl-center col-md-6 p-5">
                                <div>
                                    <p style="color: rgb(255,255,255);">Dominá Microsoft Excel y certificate como Experto<br></p>
                                    <h1 style="font-family: 'Raleway Black';color: rgb(255,255,255);">Plan empresa</h1>
                                    <p class="mt-5" style="color: rgb(255,255,255);">Somos única empresa que brinda certificación internacional<br></p>

                                    <a href="<?= $urlCheckout ?>" class="btn btn-primary px-5 ml-0" style="background: #ffffff;color: #008b69;font-family: 'Raleway Bold';">Solicitá ya una cotización</a>
                                </div>
                            </div>
                            <div class="col d-xl-flex justify-content-xl-center align-items-xl-center p-5">
                                <img class="img-fluid" src="/clases-en-vivo/assets/img/laptop.png">
                            </div>
                        </div>
                        <div class="py-5 align-items-center text-center bg-light container ">

                            <h1 class=" pt-4 pb-3   slider-text font-weight-bold" style="color:#323232;"><span style="color:#13a740;">Cursos </span>más solicitados</h1> <div class=" container">
                                <div class="row textoempresa">
                                    <div class="col-md-3 col-6 p-1">
                                        <a href="#modal1" data-toggle="modal" data-target="#modal1">
                                            <img class="  d-block img-fluid img-thumbnail " src="/clases-en-vivo/assets/img/ExcelInicial.png">
                                            <p class=" h5 font-weight-bold">Excel Inicial: $1650+IVA p/persona</p>
                                            <p style="font-size:16px;color:black;">31 videos - 3hs de duración</p>
                                        </a>
                                    </div>

                                    <div class="col-md-3 col-6 p-1">
                                        <a href="#modal1" data-toggle="modal" data-target="#modal1">
                                            <img class="d-block img-fluid img-thumbnail align-items-center text-center" src="/clases-en-vivo/assets/img/ExcelIntermedio.png">
                                            <p class="h5 font-weight-bold ">Excel Intermedio: $1652+IVA p/persona</p>
                                            <p style="font-size:16px;color:black;">20 videos - 3.5hs de duración</p>
                                        </a>
                                    </div>

                                    <div class="col-md-3 col-6 p-1">
                                        <a href="#modal1" data-toggle="modal" data-target="#modal1">
                                            <img class="d-block img-fluid img-thumbnail align-items-center text-center" src="/clases-en-vivo/assets/img/ExcelAvanzado.png">
                                            <p class="h5 font-weight-bold ">Excel Avanzado: $1652+IVA p/persona</p>
                                            <p style="font-size:16px;color:black;">24 videos - 4hs de duración</p>
                                        </a>
                                    </div>

                                    <div class="col-md-3 col-6 p-1">
                                        <a href="#modal1" data-toggle="modal" data-target="#modal1">
                                            <img class="d-block img-fluid img-thumbnail align-items-center text-center" src="/clases-en-vivo/assets/img/PowerBi.png">
                                            <p class="h5 font-weight-bold ">Power BI: $832,50+IVA p/persona</p>
                                            <p style="font-size:16px;color:black;">16 videos - 3hs de duración </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>       

                        <div class="py-5 align-items-center text-center  container">
                            <h3 class=" pt-4 pb-3   slider-text font-weight-bold" style="color:#323232;"> Más de 150 compañias capacitadas con éxito </h3>
                            <div class=" container">
                                <div class="row textoautos">
                                    <div class="col-md-3 col-6 p-1  ">
                                        <img class="  d-block img-fluid   p-5" src="/clases-en-vivo/assets/img/nosis.png">
                                    </div>
                                    <div class="col-md-3 col-6 p-1">
                                        <img class="  d-block img-fluid   p-4" src="/clases-en-vivo/assets/img/gos.png">
                                    </div>
                                    <div class="col-md-3 col-6 p-1">
                                        <img class="  d-block img-fluid   p-5" src="/clases-en-vivo/assets/img/hz.png">
                                    </div>
                                    <div class="col-md-3 col-6 p-1">
                                        <img class="  d-block img-fluid    p-5" src="/clases-en-vivo/assets/img/stm.png">
                                    </div>
                                    <div class="col-md-3 col-6 p-1">
                                        <img class="  d-block img-fluid    p-5" src="/clases-en-vivo/assets/img/clinicaC.png">
                                    </div>
                                    <div class="col-md-3 col-6 p-1">
                                        <img class="  d-block img-fluid    p-5" src="/clases-en-vivo/assets/img/diseñog.png">
                                    </div>
                                    <div class="col-md-3 col-6 p-1">
                                        <img class="  d-block img-fluid    p-5" src="/clases-en-vivo/assets/img/simiente.png">
                                    </div>
                                    <div class="col-md-3 col-6 p-4">
                                        <img class="  d-block img-fluid    p-3" src="/clases-en-vivo/assets/img/sumed.png">
                                    </div>
                                </div>

                                <a href="#formumobile" id="ch" class="btn bg-success text-white font-weight-bold d-block px-3 py-3 mt-3 pulse">Recibir presupuesto HOY</a>
                            </div>
                        </div>

                        <div class="container text-center"><hr>
                            <h3 class="my-5 py-5   slider-text font-weight-bold" style="color:#323232;">¿No sabes qué nivel tiene tu personal? <br><span style="color:#13a740;" class="h5 "><i class="fas fa-file-alt"></i>
                                    Realizaremos un rápido test de nivelación gratuito antes de que nos contrates </span></h3>
                        </div>    


                        </section>
                        <section>
                            <div class="container">
                                <?php if ($haveWhatsapp) { ?>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <p class="mt-5" >Contacte ahora con un asesor</p>
                                            <a href="https://api.whatsapp.com/send?phone=<?= $numberWhatsapp ?>"><img src="../n-img/whatsapp-image.png"></a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </section>
                        <?php include('../n-pages/footer-cursos.php') ?>
                        </body>
                        </html>


