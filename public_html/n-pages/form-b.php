<form class="text-left" id="procederPagoForm">
    <input type="text" id="curso_principal" value="<?= $idcurso ?>" <?= (isset($_GET['test']) && $_GET['test'] == 1 ? 'style="width: 100%;"' : 'hidden')?>>
    <input type="text" id="dir" name="dir" value="<?= $curso['DIR'] ?>" <?= (isset($_GET['test']) && $_GET['test'] == 1 ? 'style="width: 100%;"' : 'hidden')?>>
    <input type="text" id="curso" name="curso" value="<?= $idcurso ?>" <?= (isset($_GET['test']) && $_GET['test'] == 1 ? 'style="width: 100%;"' : 'hidden')?>>
    <input type="text" id="amount" name="amount" value="<?= $precioDescuento ?>" <?= (isset($_GET['test']) && $_GET['test'] == 1 ? 'style="width: 100%;"' : 'hidden')?>>
    <input type="text" id="pack" value="<?= $idcurso ?>" <?= (isset($_GET['test']) && $_GET['test'] == 1 ? 'style="width: 100%;"' : 'hidden')?>>
    <input type="text" id="moneda" name="moneda" value="<?= isset($moneda) ? $moneda : 'ARS' ?>" <?= (isset($_GET['test']) && $_GET['test'] == 1 ? 'style="width: 100%;"' : 'hidden')?>>
    <input type="text" id="country" name="country" value="<?= isset($country) ? $country : 'AR' ?>" <?= (isset($_GET['test']) && $_GET['test'] == 1 ? 'style="width: 100%;"' : 'hidden')?>>
    <?php
    $botones = $data['botones'];
    $urlPago = "https://epagos-oline.com/?i=";
    foreach ($botones as $boton){
    ?>
    <p><a  id="<?= $boton['ids'] ?>" href="<?= $urlPago . $boton['codigo'] ?>" style="<?= ('' . $idcurso . '' != $boton['ids'] ? 'display: none;' : 'display: block;') ?>" class="btn hvr-sweep-to-right w-100 py-3 border bg-success text-white">👉 Proceder con el pago</a></p>
    <?php    
    }
    ?>
</form>