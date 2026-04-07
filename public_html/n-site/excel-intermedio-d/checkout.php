<?php
include('../../n-includes/checkout-headers.php');
$dirpage = '../';

$idcurso = 'excel_intermedio';
include("../n-includes/funcionsDB.php");
include("../n-includes/logicparametros.php");
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
        <?php include('../n-pages/head.php') ?>
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php
        $headerImagen = "assets/img/imagen-header.png";
        include('../n-pages/header.php')
        ?>
        <!-- Website Sections -->
        <div class="pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4  mr-auto order-2 order-md-1"> <img class="img-fluid d-block" src="../n-img/c-excelintermedio.jpeg"> </div>
                    <div class="px-md-5 p-3 d-flex flex-column align-items-start justify-content-center col-md-7 order-1 order-md-2" style="">
                        <h1 style="font-family: montserrat_bold;">Excel Nivel Intermedio</h1>
                        <p class="lead mb-0 pb-0">Dominá con facilidad el software</p>
                        <p class="lead mt-1"><span class="bg-success p-2 text-white">más solicitado por las empresas</span></p>
                        <div class="row text-muted">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-white jp_banner_jobs_categories_wrapper bg-white float_left pt-5 pb-0 mx-auto mx-1">
            <div class="container bg-light rounded ">
                <div class="row p-3">
                    <div class="col-md-5 mx-auto  my-auto" style="padding: 80px 20px;">
                        <h4 class="d-flex justify-content-between mb-3"> <span class="text-muted"><b>Tu carrito <i class="fas fa-cart-arrow-down"></i></b></span> </h4>
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
                        <ul class="list-group mt-4">
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0 text-dark">Excel nivel intermedio </h6> <small class="text-muted">De por vida</small>
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
                        <p class="text-left mt-2 ml-1  text-dark">• Pago por única vez.</p>
                        <hr>
                        <div class="row mx-2 ">
                            <div class="col-md-12 text-dark">
                                <p class="mt-3 pb-2" style="font-family: montserrat_bold;"><b> ¿Por qué elegir Aprende Excel? </b></p>
                                <ul>
                                    <li> <i class="fas fa-check-square " style="color:green;"></i> Acceso ilimitado</li>
                                    <li><i class="fas fa-check-square " style="color:green;"></i> Soporte dado por los profesores</li>
                                    <li><i class="fas fa-check-square " style="color:green;"></i> Videos bien explicados paso a paso</li>
                                    <li><i class="fas fa-check-square " style="color:green;"></i> Más de 10.500 alumnos/as en Aprende Excel</li>
                                </ul>
                                <hr>
                            </div>

                            <div class=" col-md-12" style="">
                                <div class=" mb-0 text-dark">
                                    <p>"Excelente! Muy clara la explicación y al ser videos para descargar, no estás atado a cumplir con un horario"</p>
                                    <div class="rating-user d-inline">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="blockquote-footer">
                                        <b>Clara Manjarín</b>, Ciudad de Buenos Aires</div>
                                </div>
                            </div>

                        </div>
                        <hr>

                    </div>

                    <div class="col-md-6 order-md-2 my-auto col-xl-5 " id="arriba">
                        <div class="col-md-10 mx-auto text-dark rounded pb-5 py-5 px-md-4 px-xs-2 px-sm-2  bg-white mt-3">
                            <div class="text-center "> <img class="img-fluid " src="../n-img/securityjpg.jpg"></div>
                            <div class="row">
                                <div class=" mx-auto mt-3">
                                    <p class="text-center">Tu detalles contacto están seguros</p>
                                </div>
                                <div class="mx-auto mt-md-2">
                                    <h5 class="mx-auto pb-md-3 mt-4 text-center" style="font-family: montserrat_bold;"><i class="fas fa-arrow-circle-right text-success mb-3 blink"></i> <b>¿Dónde querés recibir el curso?</b></h5>
                                </div>
                            </div>
                            <?php include('../n-pages/form.php') ?>
                        </div>
                    </div>

                </div>
                <hr>
            </div>
            
            <div class="container row mt-5 mx-auto text-dark">
                <div class="col-md-4 col-4">
                    <img class="img-fluid d-block mx-auto" src="../n-img/badge1_.jpg" draggable="true">
                    <p class=" text-center" draggable="true">Protegemos tu privacidad</p>
                </div>
                <div class="col-md-4 col-4">
                    <img class="img-fluid d-block mx-auto" src="../n-img/badge2_.jpg">
                    <p class="pi-draggable text-center" draggable="true">Tus datos están seguros</p>
                </div>
                <div class="col-md-4 col-4">
                    <img class="img-fluid d-block mx-auto" src="../n-img/badge3_.jpg">
                    <p class="pi-draggable text-center">Garantía de satisfacción 100%</p>
                </div>
            </div>
            <div class="py-5 text-center text-dark mt-5">
                <hr>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="mt-2 font-weight-bold">¿Querés hablar con nosotros? ¡Escribinos!</h3>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-4 text-center">
                        </div>
                        <div class="col-md-4 text-center">
                            <a class="" href="https://api.whatsapp.com/send?phone=5491168787291&amp;text=Hola!%20Te%20escribo%20por%20el%20curso%20de%20Excel%20Avanzado" target="_blank"> <img class="img-fluid d-block  mx-auto" src="../n-img/whatsapp_.jpg"> </a>
                        </div>
                        <div class="col-md-4 text-center">
                        </div>
                    </div>
                </div>
            </div>
            <?php include('../n-pages/footer-cursos.php') ?>
            <script src="../n-libraries/js/mailcheck.js"></script>
            <script src="../n-libraries/js/jquery.validate.min.js"></script>
            <!-- upsell -->
            <script>
<?php
foreach ($data['pack'] as $c => $item) {
    if ($item['PRECIO'] > 0) {
        echo '$("#item_' . $item['ID_ABRE_PACK'] . '").attr("style", "display: none!important");';
    }
}
?>
            </script>
            <script src="../n-libraries/js/checkoutv3.js?t=2"></script>
    </body>
</html>