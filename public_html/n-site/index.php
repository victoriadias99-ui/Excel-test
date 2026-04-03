<?php
ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
$dirpage = '../';

include("n-includes/funcionsDB.php");
include("n-includes/logicparametros.php");

$urlWhatsApp = 'https://api.whatsapp.com/send?phone=5491168787291&text=Hola!%20Te%20escribo%20por%20el%20curso%20de%20Excel';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Excel facil</title>
        <?php include('n-pages/head-main.php') ?>
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php include('n-pages/header-main.php') ?>
        
        <section class="d-none d-md-block">
            <div class="row">
                <div class="col-md-6 m-auto text-center">
                    <div class="card-with-shaw p-3 flex-d mx-3 mx-md-0 mb-3 mb-md-0">
                        <img class="icono-trofeo-min img-fluid" src="n-img/icono-trofeo-min.png">
                        <span class="texto px-5"><b>Capacítate para los empleos de hoy</b></span>
                        <img class="icono-flecha img-fluid" src="n-img/icono-flecha.png">
                    </div>
                </div>
            </div>
        </section>

        <section class="d-block d-md-none">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <div class="card-with-shaw p-3 flex-d mx-3 mx-md-0 mb-3 mb-md-0">
                        <span class="texto px-md-5">
                            <b>
                                <img class="mg-fluid mr-2" src="n-img/icono-trofeo-min.png" style="width:30px"> 
                                Capacítate para los empleos de hoy 
                                <img class="img-fluid ml-2" src="n-img/icono-flecha.png" style="width:20px">
                            </b>
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <section class="seccion-3 mt-md-5  mb-md-5 position-relative" >
            <img class="icono-libro-min" src="n-img/icono-libro-min.png">
            <img class="background-verde-min" src="n-img/background-verde-min.jpg">
            <div class="row py-5">
                <div class="col-md-6 ">
                    <img class="img-fluid" src="n-img/imagen-laptop-web-min.png">
                </div>
                <div class="col-md-6 d-flex align-items-center m-5 m-md-0" style="color:#fff;">
                    <div>
                        <h2 style="font-family: 'Raleway Black';">Cursos cortos con amplia salida laboral</h2>
                        <p class="mt-0">Aprende a dominar las herramientas que más necesitan las empresas en Latinoamérica.</p>
                        <p class="mt-3"><img class="icono-small img-fluid" src="n-img/icono-small-1.png"> Cursos paso a paso.</p>
                        <p class="mt-0"><img class="icono-small img-fluid" src="n-img/icono-small-2.png"> Desde casa y con acceso ilimitado.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="cursos" class="mt-md-5 mb-md-5">
            <div class="row  m-5 m-md-0">
                <h1 class="text-center m-auto" style="font-family: 'Raleway Black'; color:#00173B;">¿Qué vas a <br><span style="color: #008B69;">aprender</span> hoy?</h1>
            </div>

            <div class="row p-3 p-md-5">
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img class="img-fluid" src="n-img/c-excel-experto.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">3 Niveles - Pack Experto</p>
                                <p style="font-size: 0.7em;text-align: left;">Convertite en un Experto en Excel con este pack de 3 cursos. ¡Sé el experto que las empresas están buscando!</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoExcelPromo ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialExcelPromo ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutExcelPromo ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img class="img-fluid" src="n-img/c-excelinicial.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Excel Inicial</p>
                                <p style="font-size: 0.7em;text-align: left;">Sin requisitos previos, éste curso te va a enseñar a usar Microsoft Excel: la herramienta laboral más solicitada por las empresas.</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoExcelInicial ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialExcelInicial ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutExcelInicial ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img class="img-fluid" src="n-img/c-excelintermedio.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Excel Intermedio</p>
                                <p style="font-size: 0.7em;text-align: left;">Entrenamiento para usuarios que ya tienen los conocimientos básicos de Microsoft Excel, para aprender en profundidad la mayoría de sus funcionalidades.</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoExcelIntermedio ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialExcelIntermedio ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutExcelIntermedio ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img class="img-fluid" src="n-img/c-excelavanzado.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Excel Avanzado</p>
                                <p style="font-size: 0.7em;text-align: left;">Curso para terminar de conocer Excel y dominar sus funcionalidades más avanzadas. Ser Experto en Excel otorga una gran ventaja y abre las puertas a empleos muy bien pagos.</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoExcelAvanzado ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialExcelAvanzado ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutExcelAvanzado ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row p-3 p-md-5">



                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img class="" src="n-img/c-sql.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Microsoft SQL Server</p>
                                <p style="font-size: 0.7em;text-align: left;">Aprendé a programar en base de datos desde cero. Recomendable para principiantes</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoSqlServer ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialSqlServer ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutSqlServer ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img class="img-fluid" src="n-img/c-office2.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Pack Office</p>
                                <p style="font-size: 0.7em;text-align: left;">Pack de conocimientos clave e infaltables en un Currículum. Dominá las 3 herramientas más solicitadas por las empresas.</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoPackOffice ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialPackOffice ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutPackOffice ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img class="img-fluid" src="n-img/c-powerbi.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Microsoft Power BI</p>
                                <p style="font-size: 0.7em;text-align: left;">Un especialista en Power BI gana un sueldo 3 vecess mayor a la media. Ésta herramienta de Inteligencia Empresarial permite crear tableros para visualizar datos. Sin requisitos previos</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoPowerBi ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialPowerBi ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutPowerBi ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img class="img-fluid" src="n-img/c-powerbi-avanzado.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Microsoft Power BI Avanzado</p>
                                <p style="font-size: 0.7em;text-align: left;">Profundizá tus conocimientos a través de este Curso Avanzado de Power BI en 4.5 horas de curso</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoPowerBiAvanzado ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialPowerBiAvanzado ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutPowerBiAvanzado ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="seccion-5 section-background-verde-min position-relative d-flex align-items-center">
            <img class="d-none d-md-block background-verde-mujer-escuchando-min" src="n-img/background-verde-mujer-escuchando-min.jpg" style="width:100%">    
            <div class="row mt-0 py-0 mt-md-5 py-md-5" style="width:100%">
                <div class="d-xl-flex align-items-xl-center col-md-3 pt-5 p-md-5">
                    <h3 class="ml-3 text-center text-md-left" style="font-family: 'Raleway Black';color: #ffffff;font-size: 1.5em;">¿Qué opinan nuestros estudiantes?</h3>
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
                                                <img class="review-persona img-fluid" src="n-img/persona-1.jpeg">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Lo recomiendo, el profe explica muy bien y es facil ver los videos. gracias.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Belén</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <img class="review-persona img-fluid" src="n-img/persona-2.jpeg">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Introduce muchas herramientas en excel. Muy satisfecho.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Federico</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <img class="review-persona img-fluid" src="n-img/persona-3.jpeg">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Enseña muy bien, tengo poco manejo de pc y me fue de mucha utilidad.</p>
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
                                                <img class="review-persona img-fluid" src="n-img/persona-4.jpeg">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Muy completo! gracias.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Daniel</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <img class="review-persona img-fluid" src="n-img/persona-5.jpeg">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Transmiten muy claro su conocimiento, algunas cosas yo ya las sabia pero me sirvio para profundizar lo que se de excel.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Laura</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <img class="review-persona img-fluid" src="n-img/persona-6.jpeg">
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
        </section>

        <section class="mt-md-5 mb-md-5">
            <div class="row m-5 m-md-0">
                <h1 class="text-center m-auto" style="font-family: 'Raleway Black'; color:#00173B;"><span style="color: #008B69;">Marcas</span> con las que hemos trabajado</h1>
            </div>
            <div class="row px-md-5 py-md-5">
                <div class="col-6 col-md-3 py-3 px-5  d-flex align-items-center">
                    <img class="img-fluid" src="n-img/e-cruzceleste.jpeg"/>
                </div>
                <div class="col-6 col-md-3 py-3 px-5  d-flex align-items-center">
                    <img class="img-fluid" src="n-img/e-dggroup.jpeg"/>
                </div>
                <div class="col-6 col-md-3 py-3 px-5  d-flex align-items-center">
                    <img class="img-fluid" src="n-img/e-fincaelpongo.jpeg"/>
                </div>
                <div class="col-6 col-md-3 py-3 px-5 d-flex align-items-center">
                    <img class="img-fluid" src="n-img/e-greenoil.jpeg"/>
                </div>

                <div class="col-6 col-md-3 py-3 px-5 d-flex align-items-center">
                    <img class="img-fluid" src="n-img/e-santarita.jpeg"/>
                </div>
                <div class="col-6 col-md-3 py-3 px-5 d-flex align-items-center">
                    <img class="img-fluid" src="n-img/e-simiente.jpeg"/>
                </div>
                <div class="col-6 col-md-3 py-3 px-5 d-flex align-items-center">
                    <img class="img-fluid" src="n-img/e-sumed.jpeg"/>
                </div>

                <div class="col-6 col-md-3 py-3 px-5 d-flex align-items-center">
                    <img class="img-fluid" src="n-img/e-nosis.jpeg"/>
                </div>
            </div>
        </section>	

        <section class="mt-md-5 mb-md-5">
            <div class="row">
                <div class="col-md-6 p-md-5 m-5 m-md-0">
                    <img class="img-fluid" src="n-img/imagen-persona-min.png"/>
                </div>
                <div class="col-md-6 p-md-5 mb-5 mb-md-0 mx-5 mx-md-0 ">
                    <h1 class="m-auto" style="font-family: 'Raleway Black'; color:#00173B;">¿Tienes un <span style="color: #008B69;">negocio?</span></h1>
                    <p>Más de 270 empresas capacitaron a su personal con Aprende Excel. Consultanos por promociones y paquetes personalizados</p>
                    <form id="contacto" class="pb-5 pb-md-0"  name="formulario" method="post" action="./n-pages/formulario.php">
                        <div class="form-group">
                            <input class="form-control" name="nombre" id="inputNombre" aria-describedby="nombreHelp" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="telefono" id="inputTel" aria-describedby="telHelp" placeholder="Teléfono">
                        </div>

                        <div class="form-group">
                            <textarea maxlength="250" class="form-control" name="comentario" id="inputComentario" aria-describedby="comentarioHelp" placeholder="Comentario"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-verde-blanco">Enviar</button>
                    </form>
                    <?php
                    if (isset($_GET['enviado']) && $_GET['enviado'] == 1) {
                        echo '<div class="mt-3 alert alert-success" role="alert">
                        Tu mensaje fue enviado
                      </div>';
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php include('n-pages/footer-main.php') ?>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>