<?php
require_once  dirname(__DIR__) . '/a-libraries/vendor/autoload.php';
/** Inicio Explicación 1 **/
/***
 * Librerias necesarias para el funcionamiento de la geolocalización
 * **/
use Ipdata\ApiClient\Ipdata;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\Psr18Client;
use Nyholm\Psr7\Factory\Psr17Factory;

/***
 * Fragmento de codigo que optiene la ip del cliente
 * **/
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
/** Fin Explicación 1 **/

/** Inicio Explicación 2 **/
/**
* Fragmento de codigo que guarda los datos geograficos del cliente para no reconsultarlos
* cada que carge la pagina.
 * La consulta de los datos geograficos se hace por medio de una api https://ipdata.co/
 * donde se tendra que registrar y obtener tu nueva key y cambiarla en $keyApi
*  */
// FIX BUG-07: API key leída desde variable de entorno Railway.
// Si no está configurada aún, usa la key de fallback para no romper producción.
// ⚠️ Configurar en Railway Dashboard → Variables → IPDATA_API_KEY y luego borrar el fallback.
$keyApi = getenv('IPDATA_API_KEY') ?: '670ffe7a0bd967e949ee51ff856a24a4812fe48f9efe99140e1ce4fd';

// Valores por defecto en caso de fallo de la API de geolocalización
$dataDefault = [
    'country_code' => 'AR',
    'currency'     => ['code' => 'ARS', 'symbol' => '$'],
];

// Mapa de país → moneda, como fallback si ipdata no devuelve currency
$currencyByCountry = [
    'AR' => ['code' => 'ARS', 'symbol' => '$'],
    'MX' => ['code' => 'MXN', 'symbol' => '$'],
    'CO' => ['code' => 'COP', 'symbol' => '$'],
    'CL' => ['code' => 'CLP', 'symbol' => '$'],
    'PE' => ['code' => 'PEN', 'symbol' => 'S/'],
    'UY' => ['code' => 'UYU', 'symbol' => '$'],
    'PY' => ['code' => 'PYG', 'symbol' => '₲'],
    'BO' => ['code' => 'BOB', 'symbol' => 'Bs'],
    'VE' => ['code' => 'VES', 'symbol' => 'Bs.S'],
    'EC' => ['code' => 'USD', 'symbol' => '$'],
    'SV' => ['code' => 'USD', 'symbol' => '$'],
    'PA' => ['code' => 'PAB', 'symbol' => 'B/.'],
    'GT' => ['code' => 'GTQ', 'symbol' => 'Q'],
    'HN' => ['code' => 'HNL', 'symbol' => 'L'],
    'NI' => ['code' => 'NIO', 'symbol' => 'C$'],
    'CR' => ['code' => 'CRC', 'symbol' => '₡'],
    'DO' => ['code' => 'DOP', 'symbol' => '$'],
    'CU' => ['code' => 'CUP', 'symbol' => '$'],
    'BR' => ['code' => 'BRL', 'symbol' => 'R$'],
    'US' => ['code' => 'USD', 'symbol' => '$'],
    'ES' => ['code' => 'EUR', 'symbol' => '€'],
];

// Normaliza $data: asegura que currency siempre tenga code y symbol válidos
function normalizarDataIP($data, $currencyByCountry, $dataDefault) {
    if (empty($data['country_code'])) {
        return $dataDefault;
    }
    if (empty($data['currency']['code']) || empty($data['currency']['symbol'])) {
        $cc = strtoupper($data['country_code']);
        $data['currency'] = isset($currencyByCountry[$cc])
            ? $currencyByCountry[$cc]
            : ['code' => 'USD', 'symbol' => '$'];
    }
    return $data;
}

// Si se pasa ?resetip en la URL, fuerza un fresh lookup ignorando el cache de la DB
$forceRefresh = isset($_GET['resetip']) || isset($_GET['dev']);

if(isset($productoIP) && $productoIP != null){
    $dataIP = $forceRefresh ? null : getIP($ip, $productoIP);
    if ($dataIP == null) {
        try {
            $httpClient = new Psr18Client(HttpClient::create(['timeout' => 6]));
            $psr17Factory = new Psr17Factory();
            $ipdata = new Ipdata($keyApi, $httpClient, $psr17Factory);
            $data = $ipdata->lookup($ip);
            $data = normalizarDataIP($data, $currencyByCountry, $dataDefault);
        } catch (\Exception $e) {
            $data = $dataDefault;
        }
        insertIP($ip, $productoIP, json_encode($data), json_encode($_COOKIE));
    } else {
        $data = json_decode($dataIP['data'], true);
        $data = normalizarDataIP($data, $currencyByCountry, $dataDefault);
        updateIP($ip, $productoIP, $dataIP['visitas'] + 1, json_encode($_COOKIE));
    }
} else {
    $dataC = isset($idcurso) ? $idcurso : (isset($_GET['curso']) ? $_GET['curso'] : null);
    if($dataC == null){
        try {
            $httpClient = new Psr18Client(HttpClient::create(['timeout' => 6]));
            $psr17Factory = new Psr17Factory();
            $ipdata = new Ipdata($keyApi, $httpClient, $psr17Factory);
            $data = $ipdata->lookup($ip);
            $data = normalizarDataIP($data, $currencyByCountry, $dataDefault);
        } catch (\Exception $e) {
            $data = $dataDefault;
        }
    } else {
        $dataIP = $forceRefresh ? null : getIP($ip, $dataC);
        if ($dataIP == null) {
            try {
                $httpClient = new Psr18Client(HttpClient::create(['timeout' => 6]));
                $psr17Factory = new Psr17Factory();
                $ipdata = new Ipdata($keyApi, $httpClient, $psr17Factory);
                $data = $ipdata->lookup($ip);
                $data = normalizarDataIP($data, $currencyByCountry, $dataDefault);
            } catch (\Exception $e) {
                $data = $dataDefault;
            }
            insertIP($ip, $dataC, json_encode($data), json_encode($_COOKIE));
        } else {
            $data = json_decode($dataIP['data'], true);
            $data = normalizarDataIP($data, $currencyByCountry, $dataDefault);
            updateIP($ip, $dataC, $dataIP['visitas'] + 1, json_encode($_COOKIE));
        }
    }
}
/** Fin Explicación 2 **/

/** Inicio Explicación 3 **/
/**
 * La variable $data['country_code'] contiene el codigo del pais del visitante
 * en este fragmento de codigo es donde se deben realizar las redirecciones, por
 * ejemplo si el visitante no es de argentina lo redireciona a la pagina de latam como en
 * el fragmento de codigo de abajo
 * ***/
if($data['country_code'] != 'AR'){
    //Este datos solo es para que puedan hacer visitas sin redirecionar en automatico por ejemplo
    //aprende-excel.com?dev, si consultas cualquier pagina de este dominio agrdando dev al final de la url
    //No se realizara la dedirección
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

if (!isset($_GET['dev'])) {
    //echo $_SERVER['HTTP_HOST'];
    $dominio = str_replace("www.", "", $_SERVER['HTTP_HOST']);
    if(in_array($dominio, ['aprendiendo-excel.online', 'aprendiendo-excel.com', 'excel-facil.online'])){
        /**
         * aprende-excel.com, aprendiendo-excel.online, aprendiendo-excel.com a -> excel-facil.com
         * **/
        $sanitizedUri = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        $actual_link = "https://excel-facil.com" . $sanitizedUri . "?4";
        header("Location: " . $actual_link);
        die();
    }
}

/** Inicio Explicación 3 **/



/** Inicio Explicación 4 **/
/**
 * Son las variables obligatorias por default
 * ***/
$urlRoot = "index.php"; //Es el archivo raiz del sitio
/* Id abrebiado del curso dedault, este curso se visualiza si el usuario borra por accidente el para metro de la url del sitio web */
//OBLIGATORIO
$idCursoDefault = 'excel';

//OBLIGATORIOS
$moneda = $data['currency']['code'];
$simbolo = $data['currency']['symbol'];
$country = $data['country_code'];

$curso = isset($_GET['curso']) ? $_GET['curso'] : $idCursoDefault;

// DEBUG: mostrar info de detección cuando se usa ?dev o ?resetip
if (isset($_GET['dev']) || isset($_GET['resetip'])) {
    echo '<div style="position:fixed;top:0;left:0;right:0;background:#1a1a2e;color:#00ff88;font-family:monospace;font-size:13px;padding:10px 16px;z-index:99999;border-bottom:2px solid #00ff88">';
    echo '<strong>🔍 GEO DEBUG</strong> &nbsp;|&nbsp; ';
    echo 'IP: <strong>' . htmlspecialchars($ip) . '</strong> &nbsp;|&nbsp; ';
    echo 'País: <strong>' . htmlspecialchars($country) . '</strong> &nbsp;|&nbsp; ';
    echo 'Moneda: <strong>' . htmlspecialchars($moneda) . '</strong> &nbsp;|&nbsp; ';
    echo 'Símbolo: <strong>' . htmlspecialchars($simbolo) . '</strong> &nbsp;|&nbsp; ';
    echo 'Cache: <strong>' . ($forceRefresh ? 'IGNORADO (fresh lookup)' : 'usó DB') . '</strong>';
    echo '</div><div style="height:40px"></div>';
}
/** Inicio Explicación 4 **/
