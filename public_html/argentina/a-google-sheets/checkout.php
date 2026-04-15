<?php
$dirpage = '../';
if (isset($_GET)) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$idcurso = 'google_sheet';
include("../a-includes/funcionsDB.php");
include("../a-includes/logicparametros.php");
$data = getCursoDetalleCheckout($idcurso);
$curso = $data['producto'];

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$precioCursoOficial = '$' . intval(($value / $curso['PORCENTAJE_DES']) * 100) . ' ARS';
$precioDescuento = $value;
$precioCursoDescuento = '$' . $value . ' ARS';
$precioCurso = '$' . $value . ' ARS' . $textoIVA;
$diferencia = '$' . (intval(($value / $curso['PORCENTAJE_DES']) * 100) - $value) . ' ARS';
$urlCheckout = 'checkout.php';

if (isset($_GET['test'])) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Aprende Excel - Cursos Online</title>
        <?php include('../a-pages/header.php') ?>
    <link rel="stylesheet" href="css/google-sheet.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

<body style="font-family:montserrat_regular">
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 col-sm-6 col-6 logo">
                    <a href="../" target="_blank"> <img src="../a-img/logowhite.png" alt="logo" class="img-fluid" width=""> </a>
                </div>
                <div class="col-md-3 hdphone">
                    <p>Curso a distancia</p>
                </div>
                <div class="col-md-3 hdphone">
                    <img src="../a-img/securityjpg.jpg" alt="security" class="img-fluid">
                </div>
            </div>
        </div>
    </header>
    <!-- Website Sections -->
    <div class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4  mr-auto order-2 order-md-1"> <img class="img-fluid d-block" src="img/google-sheets-1.jpg"> </div>
                <div class="px-md-5 p-3 d-flex flex-column align-items-start justify-content-center col-md-7 order-1 order-md-2" style="">
                    <span class="mb-3 titulos text-center">Aprendé Google Sheets en pocas horas</span>
                    <div class="row text-muted">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="section ">
        <div class="container  px-0 px-md-4" style="">
            <div class="row">
                <div class="col-md-6 order-md-2 px-0 px-md-4" style="padding: 80px 20px 20px;">
                    <h2 class="font-weight-bold" style="font-family:montserrat_bold">¿Listo/a para empezar?&nbsp;🚀</h2>
                    <p class="mb-3 lead mt-4"> Al abonar te vamos a enviar el link para que descargues el curso en tu PC, notebook, tablet o celular. ¡Es muy sencillo! </p>
                    <hr>
                    <div class=" col-md-12 mt-5" style="">
                        <div class=" mb-0">
                            <p>La verdad que es muy ágil y fácil. Se puede reever las veces que sea necesario. muy recomendable para el que no sabe nada, y para el que tiene conocimiento, ayuda a reforzar. Excelente.</p>
                            <div class="rating-user d-inline">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="blockquote-footer">
                                Lau Martino </div>
                        </div>
                    </div>
                    <div class=" col-md-12 mt-5" style="">
                        <div class=" mb-0">
                            <p>Me resultó muy didáctico, a pesar de mis pocos conocimientos. Lo pude hacer entre mi trabajo y horas libres en mi casa. Me entusiasma a realizar cosas nuevas en la parte laboral. Por ser una persona grande, 😂nunca es tarde
                                para hacerlo, porque lo que no entiendes, Lo frenas escuchas y vuelves a escuchar al profesor. Gracias fue muy lindo!!!.</p>
                            <div class="rating-user d-inline">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="blockquote-footer">
                                Mariant Mendoza</div>
                        </div>
                    </div>

                    <div class="row mt-5 mx-auto" id="gr">
                        <div class="col-md-4">
                            <img class="img-fluid d-block mx-auto" src="img/badge1.jpg" draggable="true">
                            <p class="pi-draggable text-center" draggable="true">Protegemos tu privacidad</p>
                        </div>
                        <div class="col-md-4">
                            <img class="img-fluid d-block mx-auto" src="img/badge2.jpg">
                            <p class="pi-draggable text-center" draggable="true">Tus datos están seguros</p>
                        </div>
                        <div class="col-md-4">
                            <img class="img-fluid d-block mx-auto" src="img/badge3.jpg">
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


                    <ul class="list-group mt-4">
                        <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <h6 class="my-0 text-dark">Google Sheets </h6> <small class="text-muted">De por vida</small>
                                </div> <span class="text-muted"><?= $precioCursoOficial ?></span>
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
                            </li>
                    </ul>
                    <p class="text-left mt-2">- Pago por única vez</p>
                    <hr>
                    <p class="text-left mt-2"><i class="fas fa-lock" style="color:green;"></i> Garantía de Satisfacción: Estamos tan seguros de que el curso te va a encantar que si en los primeros 7 dias no estás conforme, te devolvemos el dinero. Pruebalo, y si no estas satisfecho/a
                        te vamos a devolver el 100% de tu compra sin hacer preguntas. ¡Tienes todas las de ganar adquiriendo el curso hoy!
                        <p>
                            <img class="img-fluid d-block mx-auto mt-4 mb-3" src="img/flecha.png">


                            <div class="order-md-2 mx-3" style="">
                                <div class="row border rounded py-4 bg-white">
                                    <h4 class="mx-auto mt-3 pb-3 text-center" style="font-family:montserrat_bold"><i class="fas fa-arrow-alt-circle-right text-success blink"></i> ¿Dónde querés recibir el curso?</h4>
                                    <div class="mx-auto col-10 m-form">
                                        <div class="row mb-3">
                                            <div class="row mb-3 mx-auto">
                                                <div class="mx-auto"> <img class="img-fluid d-block mx-auto pt-2" src="../a-img/securityjpg.jpg"></div>

                                            </div>
                                            <div class=" col-12">
                                                <p class="text-center">Tu detalles contacto están seguros</p>
                                            </div>
                                        </div>
                            <?php include('../a-pages/form.php') ?>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 mx-auto" id="ch">
        <div class="col-4">
            <img class="img-fluid d-block mx-auto" src="img/badge1.jpg" draggable="true">
            <p class="pi-draggable text-center" draggable="true">Protegemos tu privacidad</p>
        </div>
        <div class="col-4">
            <img class="img-fluid d-block mx-auto" src="img/badge2.jpg">
            <p class="pi-draggable text-center" draggable="true">Tus datos están seguros</p>
        </div>
        <div class="col-4">
            <img class="img-fluid d-block mx-auto" src="img/badge3.jpg">
            <p class="pi-draggable text-center">Garantía de satisfacción 100%</p>
        </div>
    </div>
    <div class="py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 style="font-family:montserrat_bold">¿Querés hablar con nosotros? ¡Escribinos ahora!</h3>
                    <hr>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 text-center">
                </div>
                <div class="col-md-4 text-center">
                    <a class="" href="https://api.whatsapp.com/send?phone=5491168787291&amp;text=Hola!%20Te%20escribo%20por%20el%20curso%20de%20Project"> <img class="img-fluid d-block  mx-auto" src="img/whatsapp.jpg"> </a>
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
            <script src="../a-libraries/js/checkoutv3.js?t=2"></script>
</body>

</html>