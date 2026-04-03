<?php
header("Location: https://excel-cursos.com/");
die();

require_once  dirname(__DIR__) . '/a-libraries/vendor/autoload.php';

use Ipdata\ApiClient\Ipdata;
use Symfony\Component\HttpClient\Psr18Client;
use Nyholm\Psr7\Factory\Psr17Factory;

if (isset( $_SERVER['HTTP_CF_CONNECTING_IP'])) {
    $ip  = $_SERVER['HTTP_CF_CONNECTING_IP'];
} else if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$ip = explode(',', str_replace(' ', '', $ip))[0];

if(isset($productoIP) && $productoIP != null){
    $dataIP = getIP($ip, $productoIP);
    if ($dataIP == null) {
        $httpClient = new Psr18Client();
        $psr17Factory = new Psr17Factory();
        $ipdata = new Ipdata('670ffe7a0bd967e949ee51ff856a24a4812fe48f9efe99140e1ce4fd', $httpClient, $psr17Factory);
        $data = $ipdata->lookup($ip);

        insertIP($ip, $productoIP, json_encode($data));
    } else {
        $data = json_decode($dataIP['data'], true);
        updateIP($ip, $productoIP, $dataIP['visitas'] + 1);
    }
} else {
    $dataC =  isset($idcurso) ? $idcurso : (isset($_GET['curso']) ? $_GET['curso'] : null);
    if($dataC){
        $httpClient = new Psr18Client();
        $psr17Factory = new Psr17Factory();
        $ipdata = new Ipdata('670ffe7a0bd967e949ee51ff856a24a4812fe48f9efe99140e1ce4fd', $httpClient, $psr17Factory);
        $data = $ipdata->lookup($ip);
    } else {
        $dataIP = getIP($ip, $dataC) ;
        if ($dataIP == null) {
            $httpClient = new Psr18Client();
            $psr17Factory = new Psr17Factory();
            $ipdata = new Ipdata('670ffe7a0bd967e949ee51ff856a24a4812fe48f9efe99140e1ce4fd', $httpClient, $psr17Factory);
            $data = $ipdata->lookup($ip);

            insertIP($ip, $dataC, json_encode($data));
        } else {
            $data = json_decode($dataIP['data'], true);
            updateIP($ip, $dataC, $dataIP['visitas'] + 1);
        }
    }
}

if(isset($_GET['dev'])){
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo $actual_link;
    
}

if($data['country_code'] != 'AR'){
    if(!isset($_GET['dev'])){
        /*
        $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $actual_link = str_replace("reparando.com.ar", "comunidadreparando.com", $actual_link);
        $actual_link = str_replace("reparando.org", "comunidadreparando.com", $actual_link);
        header("Location: $actual_link");
         * 
         */
    }
}

$urlRoot = "index.php";

/* Id abrebiado del curso dedault, este curso se visualiza si el usuario borra por accidente el para metro de la url del sitio web */
//OBLIGATORIO
$idCursoDefault = 'c1';

/* * ** Desencripta el parametro data del get
 * $_GET['data'] -> Esta encriptado en base64 y trae los siguientes datos
 * moneda -> Tipo de moneda (ej: MX)
 * simbolo-> Simbolo de la maneda (ej: $)
 * code -> Codigo del pais (ej: MEX)
 * *** */
//$_dataURL = isset($_GET['data']) ? ($_GET['data']) : null;
//$_data = $_dataURL != null ? (base64_decode($_dataURL)) : null;
//$_data = json_decode($_data . '');

//OBLIGATORIOS
$moneda = 'MXN';//$data['currency']['code'];//isset($_data->moneda) ? $_data->moneda : null;
$simbolo = '$';//$data['currency']['symbol']; //''; //isset($_data->simbolo) ? $_data->simbolo : null;
$country = 'MX';//$data['country_code'];//isset($_data->code) ? $_data->code : null;

$curso = isset($_GET['curso']) ? $_GET['curso'] : $idCursoDefault;

function getFormatMoneda($val, $moneda){
    return getFloatFormat($val) . $moneda;
    $a = new NumberFormatter("it-IT", NumberFormatter::CURRENCY);
    return $a->formatCurrency($val, $moneda) ;
}

function getFloatFormat($val){
    return round($val);
}

/** Función que pinta la logica de facebook * */
function initFacebookAnalytics($tracks) {
    $idFacebook = '730656554204232';

    $stringTraks = '';
    foreach ($tracks as $item) {
        $stringTraks .= 'fbq(\'' . key($item) . '\', \'' . $item[key($item)] . '\');';
    }
    return '<script>
            !function (f, b, e, v, n, t, s)
            {
                if (f.fbq)
                    return;
                n = f.fbq = function () {
                    n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = \'2.0\';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, \'script\', \'https://connect.facebook.net/en_US/fbevents.js\');
            fbq(\'init\', ' . $idFacebook . ');
            ' . $stringTraks . '
        </script>
        <noscript>
        <img height="1" width="1" style="display:none"   src="https://www.facebook.com/tr?id=' . $idFacebook . '&ev=PageView&noscript=1"/>
        </noscript>';
}

/** Función que pinta la logica de Google * */
function initGoogleAnalytics() {
    $idGoogle = 'UA-164180510-1';

    return '<script async src="https://www.googletagmanager.com/gtag/js?id=' . $idGoogle . '"></script>' .
            '<script>' .
            'window.dataLayer = window.dataLayer || [];' .
            'function gtag() {' .
            'dataLayer.push(arguments);' .
            '}' .
            'gtag("js", new Date());' .
            'gtag("config", "' . $idGoogle . '");' .
            '</script>';
}
