<?php
$dirpage = '../';

$idcurso = 'pbi_avanzado';
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

?>
<!DOCTYPE html>
<html>

    <head>
        <title>Tu Carrito </title>
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

            .botonmp1 {
                background-color: #2eb000;
                color: white;
                width: 100%;
                font-size: 23px;
                text-align: center;
                border-radius: 5px;
                padding-top: 20px;
                padding-bottom: 20px;
            }

            .botonmp1:hover {
                color: white;
                background-color: #36cf00;
            }

            @media only screen and (max-width:500px) {
                .m-form {
                    flex: 100%;
                    max-width: 100%;
                }
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
                    <div class="col-md-4  mr-auto order-2 order-md-1"> <img class="img-fluid d-block" src="img/curso-power-bi_.jpg"> </div>
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
                        <ul class="list-group text-dark ">
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0 text-dark">Power BI avanzado </h6> <small class="text-muted">De por vida</small>
                                </div> <span class="text-muted"><?= $precioCursoOficial ?></span>
                            </li>
                            <?php
                            foreach ($data['pack'] as $c => $item) {
                                $precioItem = $item['PRECIO'];
                                ?>
                                <li class="list-group-item d-flex justify-content-between text-dark" id="item_<?= $item['ID_ABRE_PACK'] ?>" style="">
                                    <input type="number" id="<?= $item['ID_ABRE_PACK'] ?>_item_price" value="<?= $precioItem ?>" hidden>
                                    <div>
                                        <h6 class="my-0 text-success font-weight-bold text-dark"><b><?= $item['TITULO_1'] ?></b></h6> <small class="text-muted">De por vida</small>
                                    </div> <span class="text-muted text-dark"><?= '$' . $precioItem . ' ARS' ?></span>
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
                            </li>
                        </ul>
                        <p class="text-left mt-2">- Pago por única vez</p>
                        <hr>

                        <div class="row mx-2 ">
                            <div class="col-md-12 text-dark">
                                <p class="mt-3 pb-2" style="font-family: montserrat_bold;"> ¿Por qué elegir Aprende Excel? </p>
                                <ul>
                                    <li> <i class="fas fa-check-square " style="color:green;"></i> Acceso ilimitado</li>
                                    <li><i class="fas fa-check-square " style="color:green;"></i> Soporte dado por los profesores</li>
                                    <li><i class="fas fa-check-square " style="color:green;"></i> Videos bien explicados paso a paso</li>
                                    <li><i class="fas fa-check-square " style="color:green;"></i> Más de 15.500 alumnos/as en Aprende Excel</li>
                                </ul>
                                <hr>
                            </div>

                            <div class=" col-md-12" style="">
                                <div class=" mb-0 text-dark">
                                    <iframe class="col-md-12 col-sm-12" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Flaura.martino.334%2Fposts%2F10224091033922225&width=500&show_text=true&appId=822560431639621&height=187" width="500" height="220"
                                            style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                    <div class="rating-user pl-4 d-inline align-content-center">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="col-md-6 order-md-2 my-auto col-xl-5 " id="arriba">
                        <div class="col-md-10 mx-auto text-dark rounded pb-5 py-5 px-md-4 px-xs-2 px-sm-2  bg-white mt-3">
                            <div class="text-center "> <img class="img-fluid " src="../a-img/securityjpg.jpg"></div>
                            <div class="row">
                                <div class=" mx-auto mt-3">
                                    <p class="text-center">Tu detalles contacto están seguros</p>
                                </div>
                                <div class="mx-auto mt-md-2">
                                    <h5 class="mx-auto pb-md-3 mt-4 text-center" style="font-family: montserrat_bold;"><i class="fas fa-arrow-circle-right text-success mb-3 blink"></i> <b>¿Dónde querés recibir el curso?</b></h5>
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
            <div class="py-5 text-center text-dark mt-5">
                <hr>
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
                            <a class="" href="https://api.whatsapp.com/send?phone=5491168787291&amp;text=Hola!%20Te%20escribo%20por%20el%20curso%20de%20Power%20BI" target="_blank"> <img class="img-fluid d-block  mx-auto" src="img/whatsapp.jpg"> </a>
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