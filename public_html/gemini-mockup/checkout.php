<?php
include('../n-includes/checkout-headers.php');
$dirpage = '../';

$idcurso = 'gemini';
include("../n-includes/funcionsDB.php");

// AUTO-SETUP: Si el curso no existe o falta config, lo crea automáticamente
try {
    $cnx = OpenCon();

    // Buscar el curso
    $stmt = $cnx->prepare("SELECT * FROM cursos_detalle WHERE CURSO = ?");
    $stmt->execute(['gemini']);
    $curso = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si no existe o le falta la clave Stripe, obtenerla de otro curso y configurar
    if (!$curso || empty($curso['STRIPE_SECRET_KEY'])) {
        // Obtener clave Stripe de un curso existente
        $stmt = $cnx->prepare("SELECT STRIPE_SECRET_KEY FROM cursos_detalle WHERE STRIPE_SECRET_KEY != '' AND STRIPE_SECRET_KEY IS NOT NULL LIMIT 1");
        $stmt->execute();
        $otherCurso = $stmt->fetch(PDO::FETCH_ASSOC);
        $stripeKey = $otherCurso['STRIPE_SECRET_KEY'] ?? '';

        if ($curso) {
            // Actualizar con clave Stripe
            $stmt = $cnx->prepare("UPDATE cursos_detalle SET STRIPE_SECRET_KEY = ?, TITULO = ?, DESCRIPCION = ?, PRECIO_UNITARIO = ?, PORCENTAJE_DES = ?, ESTADO = ? WHERE CURSO = ?");
            $stmt->execute([$stripeKey, 'Curso de Gemini desde Cero', 'Aprende a usar Google Gemini para trabajar, crear y automatizar 10× más rápido', 12999, 23, 1, 'gemini']);
        } else {
            // Crear nuevo
            $stmt = $cnx->prepare("INSERT INTO cursos_detalle (CURSO, TITULO, DESCRIPCION, DIR, IMAGEN, PRECIO_UNITARIO, PORCENTAJE_DES, ESTADO, STRIPE_SECRET_KEY) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute(['gemini', 'Curso de Gemini desde Cero', 'Aprende a usar Google Gemini para trabajar, crear y automatizar 10× más rápido', '../gemini-mockup/', '../a-img/logo-gemini.png', 12999, 23, 1, $stripeKey]);
        }

        // Recargar
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }
} catch (Exception $e) {
    // Fallback
}

// Ahora incluir logicparametros para obtener moneda/país
include("../n-includes/logicparametros.php");

try {
    $data = getCursoDetalleCheckout($idcurso);
    $curso = $data['producto'];
} catch (Exception $e) {
    $data = ['pack' => []];
}

if (isset($_GET['test'])) {
    echo "<pre>";
    print_r($curso);
    echo "</pre>";
}

//PRECIO_UNITARIO
$value = $curso['PRECIO_UNITARIO'];
$precioCursoOficial = $simbolo . ' ' . convertirPrecio(intval(($value / $curso['PORCENTAJE_DES']) * 100), $moneda);
$precioDescuento = $value;
$precioCursoDescuento = $simbolo . ' ' . convertirPrecio($value, $moneda) . ' ' . $moneda;
$precioCurso = $simbolo . ' ' . convertirPrecio($value, $moneda) . $textoIVA;
$diferencia = $simbolo . ' ' . convertirPrecio(intval(($value / $curso['PORCENTAJE_DES']) * 100) - $value, $moneda) . ' ' . $moneda;
$urlCheckout = 'checkout.php';
$titulo = 'Carrito';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $titulo ?> - Curso de Gemini</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            .comentarios p{ font-size: 0.6em; }
            .comentarios .rating-user{ color: #008a69; font-size: 0.5em; }
            .card-scv{
                -webkit-box-shadow: 0 0.75rem 1.25rem 0.0625rem rgb(64 64 64 / 30%);
                box-shadow: 0 0.75rem 1.25rem 0.06;
                border-radius: 10px;
            }
            .card-scv span{ font-size: 0.5em; width: 100%; }
            .card-scv img{ height: 50px; width: auto; margin-bottom: 5px; }
            #proceder_pago{ background-color: #7B3FF2 !important; font-size: 0.8em; }
            .formulario input{ border: 1px solid #d2bef6; font-size: 0.8em !important; }
            .error{ border: 2px solid #f44336 !important; }
            .formulario{
                font-size: 0.9em !important;
                background-color: white;
                border-radius: 10px;
                -webkit-box-shadow: 0 0.75rem 1.25rem 0.0625rem rgb(64 64 64 / 30%);
                box-shadow: 0 0.75rem 1.25rem 0.06;
            }
            .section-header-checkout-next .titulo{ color:#7B3FF2; font-size: 0.9em; }
            .section-header-checkout-next .subtitulo{ font-size: 0.75em; }
            .detalle-checkout{ width: 100%; }
            .detalle-checkout .list-group-item{
                border: none;
                border-bottom: #00000020;
                border-bottom-style: solid;
                border-bottom-width: 2px;
                border-radius: 0px;
            }
            .feature-list ul li i{ font-size: 1em; color: #7B3FF2; margin-right: 10px; }
            .feature-list ul li{ font-size: 0.8em; }
            .logo{ width: 150px; }
            .section-header-checkout-next {
                margin-top: 20px !important;
                height: auto;
                border-radius: 10px;
                background-color: #F1EAFE;
            }
        </style>
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php
        $headerImagen = "";
        include('../n-pages/header.php')
        ?>
        <section>
            <div class="container">
                <div class="row p-4 p-md-0">
                    <div class="col-md-7 flex-column">
                        <div class="row">
                            <div class="col-md-5">
                                <img class="img-fluid rounded" src="../a-img/logo-gemini.png">
                            </div>
                            <div class="col-md-7 mt-4 mt-md-0">
                                <h5><b>Estás a unos clics de tener tu curso...</b></h5>
                                <h3><b>Curso de Gemini desde Cero</b></h3>
                                <p class="mb-3">Aprendé a usar Google Gemini para potenciar tu productividad con Inteligencia Artificial.</p>
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
                                            <h4 class="titulo h4 text-black text-md-left text-center">
                                                <input class="check-producto-paquete" type="checkbox" id="up_<?= $item['ID_ABRE_PACK'] ?>" value="<?= $item['ID_ABRE_PACK'] ?>"/>
                                                <input id="id_up_<?= $item['ID_ABRE_PACK'] ?>" value="<?= $item['ID_UPSELL'] ?? '' ?>" hidden=""/>
                                                <?= str_replace('{#MONTO}', ($simbolo . ' ' . convertirPrecio($precioItem, $moneda) . ' ' . $moneda), $item['TITULO_2']) ?>
                                            </h4>
                                            <p class="subtitulo p-0 m-0 text-md-left text-center">
                                                <?= str_replace('{#MONTO}', ($simbolo . ' ' . convertirPrecio($precioItem, $moneda) . ' ' . $moneda), $item['DESCRIPCION']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="row">
                            <h3 class="f-30 mt-5"><b>Tu <span style="color:#7B3FF2">carrito</span></b></h3>
                            <ul class="mt-4 list-group detalle-checkout">
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <div>
                                            <div>
                                                <h6 class="my-0"><?= $curso['TITULO'] ?></h6>
                                            </div>
                                        </div>
                                        <h6 class="text-danger pt-3"><b>OFERTA 🔥</b></h6>
                                    </div>
                                    <span class="text-muted" id="item_price_currency" style="width:50%; text-align: end; font-size: 0.8em;">
                                        <em><span class="precio-original" style="color:black"><?= $precioCursoOficial ?></span></em>
                                        <br>
                                        <span class="text-danger">-<?= $diferencia ?></span>
                                    </span>
                                </li>
                                <?php
                                foreach ($data['pack'] as $c => $item) {
                                    $precioItem = $item['PRECIO'];
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between text-dark" id="item_<?= $item['ID_ABRE_PACK'] ?>">
                                        <input type="number" id="<?= $item['ID_ABRE_PACK'] ?>_item_price" value="<?= $precioItem ?>" hidden>
                                        <div>
                                            <h6 class="my-0 font-weight-bold text-dark"><b><?= $item['TITULO_1'] ?></b></h6> <small class="text-muted">De por vida</small>
                                        </div> <span class="text-muted text-dark"><?= $simbolo . ' ' . convertirPrecio($precioItem, $moneda) . ' ' . $moneda ?></span>
                                    </li>
                                    <?php
                                }
                                ?>
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
                                    <ul class="pl-0 px-md-3 px-0" style="list-style: none">
                                        <h5 class="pt-0 text-left"><b>¿Por qué la gente nos elige?</b></h5>
                                        <li class="text-dark"><i class="fas fa-check-circle"></i>Acceso ilimitado</li>
                                        <li class="text-dark"><i class="fas fa-check-circle"></i>Soporte dado por los profesores</li>
                                        <li class="text-dark"><i class="fas fa-check-circle"></i>Videos bien explicados paso a paso</li>
                                        <li class="text-dark"><i class="fas fa-check-circle"></i>+50 prompts profesionales descargables</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 pl-0 pl-md-5 pr-0 mt-4 mt-md-0">
                        <div class="formulario p-4">
                            <p class="p-0 m-0 mt-4"><b>Tus datos de contacto están seguros</b></p>
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
                                <p class="mt-5">¿Querés comunicarte con nosotros?</p>
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
        <script>
<?php
foreach ($data['pack'] as $c => $item) {
    if ($item['PRECIO'] > 0) {
        echo '$("#item_' . $item['ID_ABRE_PACK'] . '").attr("style", "display: none!important");';
    }
}
?>
        </script>
        <script src="../n-libraries/js/checkoutv4.js?t=6"></script>
    </body>
</html>
