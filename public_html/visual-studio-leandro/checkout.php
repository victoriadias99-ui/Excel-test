<?php

$dirpage = '../';
/*
$idcurso = 'visualstudio';
include("../a-includes/funcionsDB.php");
include("../a-includes/logicparametros.php");
$data = getCursoDetalleCheckout($idcurso);
$curso = $data['producto'];

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$precioCursoOficial = '$' . intval(($value / $curso['PORCENTAJE_DES']) * 100) . ' ARS';
$precioDescuento = $value;
$precioCursoDescuento = '$' . $value . ' ARS';
$precioCurso = '$' . $value . ' ARS';
$diferencia = '$' . (intval(($value / $curso['PORCENTAJE_DES']) * 100) - $value) . ' ARS';
$urlCheckout = 'checkout.php';
*/
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Aprende Excel - Cursos Online</title>
        <?php include('../a-pages/header.php') ?>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style> 
            .blanco {
                background-color: white;
                color: black;
            }

            .crema {
                background-color: #f4f5f9;
            }
        </style>


    </head>

    <body style="font-family: montserrat_regular;">
        <?php include('../a-pages/body.php'); ?>
        <!-- Website Header -->
        <header>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-2 col-sm-6 col-6 logo">
                        <a href="../" target="_blank"> <img src="../a-img/logojpg.jpg" alt="logo" class="img-fluid" width=""> </a>
                    </div>
                    <div class="col-md-3 hdphone">
                        <p>Curso a distancia</p>
                    </div>
                    <div class="col-md-3 hdphone">
                        <img src="../a-img/security.png" alt="security" class="img-fluid">
                    </div>
                </div>
            </div>
        </header>
        <!-- Website Sections -->
        <div class="pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4  mr-auto order-2 order-md-1"> <img class="img-fluid d-block" src="img/3.jpg"> </div>
                    <div class="px-md-5 p-3 d-flex flex-column align-items-start justify-content-center col-md-7 order-1 order-md-2" style="">
                        <h1 style="font-family: montserrat_bold;">Accedé hoy y obtené acceso ilimitado</h1>
                        <div class="row text-muted">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-white jp_banner_jobs_categories_wrapper bg-white float_left pt-5 pb-0 mx-auto mx-1">
            <div class="container bg-light rounded ">
                <div class="row ">
                    <div class="col-md-5 mx-auto  my-auto" style="padding: 80px 20px;">
                        <h4 class="d-flex justify-content-between mb-3"> <span class="text-muted"><b>Resumen</b></span> </h4>
                        <?php
                        foreach ($data['pack'] as $c => $item) {
                            $precioItem = $item['PRECIO'];
                            ?>
                            <div class="p-3 mb-3 text-dark" style="border-style: dashed;border-width:2px;border-color: darkgray;background-color: rgba(255, 234, 118, 0.3); ">
                                <i class="fas fa-arrow-alt-circle-right text-danger blink text-dark"></i> 
                                <input class="check-producto-paquete" type="checkbox" id="up_<?= $item['ID_ABRE_PACK'] ?>" value="<?= $item['ID_ABRE_PACK'] ?>"/>
                                <input id="id_up_<?= $item['ID_ABRE_PACK'] ?>" value="<?= $item['ID_UPSELL'] ?>" hidden=""/>
                                <?= str_replace('{#MONTO}', ('$' . $precioItem . ' ARG'), $item['TITULO_2']) ?>
                                <p class="mt-2  px-3 text-dark">
                                    <?= str_replace('{#MONTO}', ('$' . $precioItem . ' ARG'), $item['DESCRIPCION']) ?>
                                </p>
                            </div>
                            <?php
                        }
                        ?>

                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0 text-dark">Programación en C#</h6> <small class="text-muted">Curso de por vida</small>
                                </div> <span class="text-muted"><?= $precioCursoDescuento ?></span>
                            </li>
                            <?php
                            foreach ($data['pack'] as $c => $item) {
                                $precioItem = $item['PRECIO'];
                                ?>
                                <li class="list-group-item d-flex justify-content-between" id="item_<?= $item['ID_ABRE_PACK'] ?>" style="">
                                    <input type="number" id="<?= $item['ID_ABRE_PACK'] ?>_item_price" value="<?= $precioItem ?>" hidden>
                                    <div>
                                        <h6 class="my-0 text-success font-weight-bold"><b><?= $item['TITULO_1'] ?></b></h6> <small class="text-muted">De por vida</small>
                                    </div> <span class="text-muted"><?= '$' . $precioItem . ' ARS' ?></span>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0 text-danger"><b>Promo 🔥</b></h6> <small class="text-muted"></small>
                                </div> <span class="text-danger">- <?= $diferencia ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between text-dark"> <span>Total</span>
                                <b id="total_price"><?= $precioCurso ?></b>
                        </ul>


                        <p class="text-left mt-2 ml-1  text-dark">• Pago por única vez.</p>
                        <hr>

                        <div class="row mx-2 ">
                            <div class="col-md-12 text-dark">
                                <p class="mt-3 pb-2" style="font-family: montserrat_bold;"> ¿Por qué elegir Aprende Excel? </p>
                                <ul>
                                    <li> <i class="fas fa-check-square " style="color:green;"></i> Acceso ilimitado al curso</li>
                                    <li><i class="fas fa-check-square " style="color:green;"></i> Soporte dado por los profesores</li>
                                    <li><i class="fas fa-check-square " style="color:green;"></i> Videos bien explicados paso a paso</li>
                                    <li><i class="fas fa-check-square " style="color:green;"></i> Más de 10.500 alumnos/as en Aprende Excel</li>
                                </ul>
                                <hr>
                            </div>

                            <div class=" col-md-12" style="">
                                <div class=" mb-0 text-dark">
                                    <p>"De lo mejorcito que vi para aprender programación. El contenido y la explicación del profesor son magistrales. Sin dudas volveria a comprar"</p>
                                    <div class="rating-user d-inline">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="blockquote-footer">
                                        <b>Lucas Dominguez</b>, Ciudad de Buenos Aires</div>
                                </div>
                            </div>

                        </div>  
                        <hr>

                    </div>

                    <div class="col-md-6 order-md-2 my-auto col-xl-5 " id="arriba" >

                        <div class="col-md-10 mx-auto text-dark rounded pb-5 py-5 px-md-4 px-xs-2 px-sm-2  bg-white mt-3" >
                            <div class="text-center ">  <img class="img-fluid " src="../a-img/securityjpg.jpg"></div>
                            <div class="row">
                                <div class=" mx-auto mt-3">     
                                    <p class="text-center">Tu detalles contacto están seguros</p>
                                </div>
                                <div class="mx-auto mt-md-2">
                                    <h5 class="mx-auto pb-md-3 mt-4 text-center" style="font-family: montserrat_bold;"><i class="fas fa-arrow-alt-circle-right text-success blink"></i><b> ¿Dónde querés recibir el curso?</b></h5>       
                                </div>
                            </div>
                            <?php include('../a-pages/form.php') ?>
                        </div>
                    </div>

                </div>
                <hr>
            </div>
            <div class="container row mt-5 mx-auto text-dark">
                <div class="col-md-4 col-4">
                    <img class="img-fluid d-block mx-auto" src="img/badge1.jpg" draggable="true">
                    <p class=" text-center" draggable="true">Protegemos tu privacidad</p>
                </div>
                <div class="col-md-4 col-4">
                    <img class="img-fluid d-block mx-auto" src="img/badge2.jpg">
                    <p class="pi-draggable text-center" draggable="true">Tus datos están seguros</p>
                </div>
                <div class="col-md-4 col-4">
                    <img class="img-fluid d-block mx-auto" src="img/badge3.jpg">
                    <p class="pi-draggable text-center">Garantía de satisfacción 100%</p>
                </div>
            </div>
            <div class="py-5 text-center text-dark mt-5"><hr>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mt-2" style="font-family: montserrat_bold;">¿Querés hablar con nosotros? ¡Escribinos!</h3>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4 text-center">
                        </div>
                        <div class="col-md-4 text-center">
                            <a class="" href="https://api.whatsapp.com/send?phone=5491168787291&amp;text=Hola!%20Te%20escribo%20por%20el%20curso%20de%20Visual%20Studio" target="_blank"> <img class="img-fluid d-block  mx-auto" src="img/whatsapp.jpg"> </a>
                        </div>
                        <div class="col-md-4 text-center">
                        </div>
                    </div>
                </div>
            </div>

            <?php include('../a-pages/footer.php') ?>
            <script src="../a-libraries/js/mailcheck.js"></script>
            <script src="../a-libraries/js/jquery.validate.min.js"></script>
            <!-- upsell -->
            <script>
<?php
foreach ($data['pack'] as $c => $item) {
    if($item['PRECIO'] > 0){
    echo '$("#item_' . $item['ID_ABRE_PACK'] . '").attr("style", "display: none!important");';
    }
}
?>
            </script>
            <script src="../a-libraries/js/checkoutv3.js?t=1"></script>
    </body>

</html>