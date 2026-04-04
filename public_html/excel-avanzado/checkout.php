<?php
$dirpage = '../';

$idcurso = 'excel_avanzado';
include("../n-includes/funcionsDB.php");
include("../n-includes/logicparametros.php");
$data = getCursoDetalleCheckout($idcurso);
$curso = $data['producto'];

if (isset($_GET['test'])) {
    echo "<pre>";
    print_r($curso);
    echo "</pre>";
}

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$precioCursoOficial = '$' . intval(($value / $curso['PORCENTAJE_DES']) * 100) . ' ARS';
$precioDescuento = $value;
$precioCursoDescuento = '$' . $value . ' ARS';
$precioCurso = '$' . $value . ' ARS';
$diferencia = '$' . (intval(($value / $curso['PORCENTAJE_DES']) * 100) - $value) . ' ARS';
$urlCheckout = 'checkout.php';
$titulo = 'Carrito';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include('../n-pages/head.php') ?>
        <link rel="stylesheet" href="assets/css/styles.css">
        <style>
            @media screen and (max-width: 450px) {
                .deco-header{
                    display: none;
                }
            }
            .comentarios{
                background-color: #d9d9d97d;
                border-radius: 10px;
                padding: 20px;
            }
            .comentarios p{
                font-size: 0.6em;
            }

            .comentarios .rating-user{
                color: #008a69;
                font-size: 0.5em;
            }

            .card-scv{
                -webkit-box-shadow: 0 0.75rem 1.25rem 0.0625rem rgb(64 64 64 / 30%);
                box-shadow: 0 0.75rem 1.25rem 0.06;
                border-radius: 10px;
            }

            .card-scv span{
                font-size: 0.5em;
                width: 100%;
            }

            .card-scv img{
                height: 50px;
                width: auto;
                margin-bottom: 5px;
            }

            #proceder_pago{
                background-color: #008C69 !important;
                font-size: 0.8em;
            }

            .formulario input{
                border: 1px solid #9ACBEA; 
                font-size: 0.8em !important;
            }

            .error{
                border: 2px solid #f44336 !important;
            }

            .formulario{
                font-size: 0.9em !important;
                background-color: white;
                border-radius: 10px;
                -webkit-box-shadow: 0 0.75rem 1.25rem 0.0625rem rgb(64 64 64 / 30%);
                box-shadow: 0 0.75rem 1.25rem 0.06;
            }

            /*            .section-header-checkout-next{
                            -webkit-box-shadow: 0 0.75rem 1.25rem 0.0625rem rgb(64 64 64 / 30%);
                            box-shadow: 0 0.75rem 1.25rem 0.06;
                        }*/

            .section-header-checkout-next .titulo{
                color:#007A6A;
                font-size: 0.9em;
            }

            .section-header-checkout-next .subtitulo{
                font-size: 0.75em;
            }

            .detalle-checkout{
                width: 100%;
            }

            .detalle-checkout .list-group-item{
                border: none;
                border-bottom: #00000020;
                border-bottom-style: solid;
                border-bottom-width: 2px;
                border-radius: 0px;
            }

            .feature-list ul li i{
                font-size: 1em;
                color: #008A69;
                margin-right: 10px;
            }

            .feature-list ul li{
                font-size: 0.8em;
            }

            .logo{
                width: 150px;
            }
            .section-header-checkout-next {
                margin-top: 20px !important;
                height: auto;
                /*-webkit-box-shadow: 0 0.75rem 1.25rem 0.0625rem rgb(64 64 64 / 30%);*/
                /*box-shadow: 0 0.75rem 1.25rem 0.06;*/
                border-radius: 10px;
                background-color: #EBF3F5;
                /*border-style: dashed;*/
                /*border-width: 2px;*/
            }
        </style>
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php
        $headerImagen = "assets/img/imagen-header.png";
        include('../n-pages/header.php')
        ?>
        <section>
            <div class="container">
                <div class="row p-4 p-md-0">
                    <div class="col-md-7 flex-column">
                        <div class="row">
                            <div class="col-md-5">
                                <img class="img-fluid rounded" src="../n-img/excelavanzado4.jpeg">
                            </div>
                            <div class="col-md-7 mt-4 mt-md-0">
                                <h5><b>Estás a unos clics de tener tu curso...</b></h5>
                                <h3><b>Excel Avanzado</b></h3>
                                <p class="mb-3">Curso para terminar de conocer Excel y dominar sus funcionalidades más avanzadas</p>
                            </div>
                        </div>
                        <div class="row mt-0 mt-md-5 pr-0 pr-md-5">
                            <?php
                            foreach ($data['pack'] as $c => $item) {
                                $precioItem = $item['PRECIO'];
                                ?>
                                <div class="col-12 p-0 animate__animated animate__delay-2s animate__shakeX animate__1">
                                    <div class="col-md-12 section-header-checkout-next mt-md-0 mt-2">
                                        <div class="row p-4">
                                            <h4 class="titulo h4 text-black text-md-left text-center" style="">
                                                <input class="check-producto-paquete" type="checkbox" id="up_<?= $item['ID_ABRE_PACK'] ?>" value="<?= $item['ID_ABRE_PACK'] ?>"/>
                                                <input id="id_up_<?= $item['ID_ABRE_PACK'] ?>" value="<?= $item['ID_UPSELL'] ?? '' ?>" hidden=""/>
                                                <?= str_replace('{#MONTO}', ('$' . $precioItem . ' ARS'), $item['TITULO_2']) ?>
                                            </h4>
                                            <p class="subtitulo p-0 m-0 text-md-left text-center">
                                                <?= str_replace('{#MONTO}', ('$' . $precioItem . ' ARS'), $item['DESCRIPCION']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>
                        </div>
                        <div class="row">

                            <h3 class="f-30 mt-5"><b>Tu <span class="color-text-oficial">carrito</span></b></h3>

                            <ul class="mt-4 list-group detalle-checkout">
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <div>
                                            <div>
                                                <h6 class="my-0"><?= $curso['TITULO'] ?></h6> 
                                            </div> 
                                        </div>
                                        <h6 class="  text-danger pt-3"><b>OFERTA 🔥</b></h6>
                                    </div> 
                                    <span class="text-muted " id="item_price_currency" style="width:50%; text-align: end; font-size: 0.8em;">
                                        <!-- Logica para pintar la oferta por producto paquete -->
                                        <em><span class="precio-original" style="color:black"><?= $precioCursoOficial ?></span></em>
                                        <br>
                                        <span class="text-danger">-<?= $diferencia ?></span></span>
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
                                <!-- Productos extras -->
                                <li class="list-group-item d-flex justify-content-between"> <span>Total</span>
                                    <b id="total_price"><?= $precioCurso ?></b>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="mt-4 mb-3">Pago por única vez</p>
                            </div>
                            <div class="col-12">
                                <div class="feature-list">
                                    <ul class="pl-0 px-md-3  px-0" style="list-style: none">
                                        <h5 class="pt-0 text-left"><b>¿Por qué la gente nos elige?</b></h5>
                                        <li class="text-dark"> <i class="fas fa-check-circle" ></i>Acceso ilimitado</li>
                                        <li class="text-dark"> <i class="fas fa-check-circle" ></i>Soporte dado por los profesores</li>
                                        <li class="text-dark"> <i class="fas fa-check-circle" ></i>Videos bien explicados paso a paso</li>
                                        <li class="text-dark"> <i class="fas fa-check-circle" ></i>Más de 25.000 alumnos/as en Aprende Excel</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators p-0 m-0">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active  p-2">
                                            <div class="comentarios">
                                                <p>"Un curso excelente para manejar las funciones avanzadas. Me lo exijían en donde trabajo para poder cambiar de puesto y estuvo muy bien."</p>
                                                <div class="rating-user d-inline">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="blockquote-footer">
                                                    <b>Edgardo Bolla</b>, Ciudad de Buenos Aires</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-5 pl-0 pl-md-5 pr-0 mt-4 mt-md-0">
                        <div class="formulario p-4">
                            <img width="100%" alt="Mercado Pago - Medios de pago" title="Mercado Pago - Medios de pago" src="https://imgmp.mlstatic.com/org-img/banners/ar/medios/online/468X60.jpg">
                            <p class="p-0 m-0 mt-4"><b>Tu detalles contacto están seguros</b></p>
                            <h3 class="mb-4"><b>¿Dónde querés recibir el curso?</b></h3>
                            <?php include('../n-pages/form.php') ?>
                        </div>
                        <div class="row mt-5">
                            <div class="col-4 p-1">
                                <div class="card-scv p-2 text-center">
                                    <img src="../n-img/iconos-cuadros3.png" class="p-1"><br>
                                    <span>Protegemos tu privacidad</span>
                                </div>
                            </div>
                            <div class="col-4 p-1">
                                <div class="card-scv p-2 text-center">
                                    <img src="../n-img/iconos-cuadros2.png" class="p-1"><br>
                                    <span>Tus datos están seguros</span>
                                </div>
                            </div>
                            <div class="col-4 p-1">
                                <div class="card-scv p-2 text-center">
                                    <img src="../n-img/iconos-cuadros1.png" class="p-1"><br>
                                    <span>Garantía de satisfacción 100%</span>
                                </div>
                            </div>
                        </div>

                        <?php if($haveWhatsapp) { ?>
                        <div class="row">
                            <div class="col-12 text-center">
                                <p class="mt-5" >¿Querés comunicarte con nosotros?</p>
                                <a href="https://api.whatsapp.com/send?phone=<?= $numberWhatsapp ?>"><img src="../n-img/whatsapp-image.png"></a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
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
        <script src="../n-libraries/js/checkoutv4.js?t=2"></script>
    </body>
</html>