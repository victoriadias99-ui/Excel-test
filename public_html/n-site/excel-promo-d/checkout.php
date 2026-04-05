<?php
include('../../n-includes/checkout-headers.php');
$dirpage = '../';

$idcurso = 'excel_promo';
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
                    <div class="col-md-4  mr-auto order-2 order-md-1"> <img class="img-fluid d-block" src="../n-assets/img/imagen-header-excel-computadora-2.jpg"> </div>
                    <div class="px-md-5 p-3 d-flex flex-column align-items-start justify-content-center col-md-7 order-1 order-md-2" style="">
                        <h1 class="font-weight-bold">Aprende Excel - Curso a Distancia</h1>
                        <p class="mb-3 lead">Dominá a fondo esta herramienta y adquirí un conocimiento imprescindible en la actualidad 🏆</p>
                        <div class="row text-muted">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="section ">
            <div class="container  px-0 px-md-4" style="">
                <div class="row p-3">
                    <div class="col-md-6 order-md-2 px-0 px-md-4" style="padding: 80px 20px 20px;">
                        <h2 class="" style="">¿Listo/a para empezar?&nbsp;🚀</h2>
                        <p class="mb-3   mt-4"> Al abonar te vamos a enviar el link para que descargues ambos cursos en tu PC, notebook, tablet o celular. ¡Es muy sencillo! </p>
                        <hr>

                        <div class=" col-md-12 mt-5" style="">
                            <div class=" mb-0">
                                <p>"Muy satisfecha. Todos los puntos explicados en detalle. Entendi muy bien cada uno de los temas, animo a la gente a que realice este curso"</p>
                                <div class="rating-user d-inline">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="blockquote-footer">
                                    <b>Laura Miller</b>, Junín, Buenos Aires</div>
                            </div>
                        </div>
                        <div class=" col-md-12 mt-5" style="">
                            <div class=" mb-0">
                                <p>"Muy buena elección. Didáctico y fácil de entender. Los profes me ayudaron cada vez que tuve dudas."</p>
                                <div class="rating-user d-inline">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half"></i>
                                </div>
                                <div class="blockquote-footer">
                                    <b>Felipe Salcedo</b>, San Rafael, Mnedoza</div>
                            </div>
                            <div class="text-dark pt-5" id="gr"><hr>
                                <h4 class="mt-3 pb-2"><b> ¿Por qué la gente nos elige? </b></h4>
                                <ul class="lead">
                                    <li> <i class="fas fa-check-square " style="color:#009045;"></i> Acceso para siempre a los cursos</li>
                                    <li><i class="fas fa-check-square " style="color:#009045;"></i> Ayuda de los profesores</li>
                                    <li><i class="fas fa-check-square " style="color:#009045;"></i> Videos muy bien explicados</li>
                                    <li><i class="fas fa-check-square " style="color:#009045;"></i> + 15.500 alumnos</li>
                                    <li><i class="fas fa-check-square " style="color:#009045;"></i> + 100 Ejercios Prácticos</li>

                                </ul>

                            </div>
                        </div>
                        <div class="row mt-5 mx-auto" id="gr">
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
                    </div>

                    <div class="order-md-2 border rounded bg-light my-5 py-5 px-md-4 col-md-5" style="">
                        <h4 class="d-flex justify-content-between mb-3"> <span class="text-muted"><b>Tu Carrito</b> <i class="fas fa-cart-arrow-down"></i>

                            </span> </h4>
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
                                    <h6 class="my-0"><b>Excel nivel inicial</b></h6> <small class="text-muted">Acceso de por vida</small>
                                </div> <span class="text-muted">$1299</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0"><b>Excel nivel intermedio</b></h6> <small class="text-muted">Acceso de por vida</small>
                                </div> <span class="text-muted">$1497</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0"><b>Excel nivel avanzado</b></h6> <small class="text-muted">Acceso de por vida</small>
                                </div> <span class="text-muted">$1999</span>
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
                        </ul>
                        <p class="text-left mt-2">- Pago por única vez.</p>
                        <hr>
                        <p class="text-left mt-2"><i class="fas fa-lock" style="color:green;"></i> Garantía de Satisfacción: Estamos tan seguros de que los cursos te van a encantar que si en los primeros 7 dias no estás conforme, te devolvemos el dinero 😊. Probalos, y si no estas satisfecho/a, te vamos a devolver el 100% de tu compra sin hacer preguntas. Tenés todas las de ganar adquiriendo este combo hoy!<p>
                        <div class="text-dark pt-5" id="ch">
                            <h4 class="mt-3 pb-2"><b> ¿Por qué la gente nos elige? </b></h4>
                            <ul class="lead">
                                <li> <i class="fas fa-check-square " style="color:#009045;"></i> Acceso para siempre a los cursos</li>
                                <li><i class="fas fa-check-square " style="color:#009045;"></i> Ayuda de los profesores</li>
                                <li><i class="fas fa-check-square " style="color:#009045;"></i> Videos muy bien explicados</li>
                                <li><i class="fas fa-check-square " style="color:#009045;"></i> + 15.500 alumnos</li>
                                <li><i class="fas fa-check-square " style="color:#009045;"></i> + 100 Ejercios Prácticos</li>

                            </ul>

                        </div>
                        <img class="img-fluid d-block mx-auto mt-4 mb-3" src="../n-img/flecha.png">


                        <div class="order-md-2 mx-3" style="">
                            <div class="row border rounded py-4 bg-white">
                                <h4 class="mx-auto mt-3 pb-3 text-center">¿Dónde querés recibir los cursos?</h4>
                                <div class="mx-auto col-10 m-form">
                                    <div class="row mb-3">
                                        <div class="row mb-3 mx-auto">
                                            <div class="mx-auto"> <img class="img-fluid " src="../n-img/securityjpg.jpg"></div>

                                        </div>
                                        <div class=" col-12">
                                            <p class="text-center">Tu detalles contacto están seguros</p>
                                        </div>
                                    </div>
                                    <?php include('../n-pages/form.php') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <script src="../n-libraries/js/checkoutv3.js?t=1"></script>
    </body>
</html>