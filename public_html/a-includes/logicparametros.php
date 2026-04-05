<?php
require_once  dirname(__DIR__) . '/a-libraries/vendor/autoload.php';
/** Inicio Explicación 1 **/
/***
 * Librerias necesarias para el funcionamiento de la geolocalización
 * **/
use Ipdata\ApiClient\Ipdata;
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
// FIX BUG-07: API key movida a variable de entorno.
// Agregar en Railway Dashboard → Variables → IPDATA_API_KEY = tu_key_de_ipdata.co
$keyApi = getenv('IPDATA_API_KEY') ?: '';

// FIX BUG-02: helper para crear la instancia de Ipdata una sola vez y no repetir el bloque
function crearClienteIpdata($keyApi) {
    $httpClient = new Psr18Client();
    $psr17Factory = new Psr17Factory();
    return new Ipdata($keyApi, $httpClient, $psr17Factory);
}

// FIX BUG-02: caché de geolocalización en sesión de PHP.
// La primera visita llama a ipdata.co (puede tardar ~1s).
// Las visitas siguientes del mismo navegador usan el dato en sesión (0ms).
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$idProductoActual = isset($productoIP) && $productoIP != null
    ? $productoIP
    : (isset($idcurso) ? $idcurso : (isset($_GET['curso']) ? $_GET['curso'] : null));

// Primero intentar caché de sesión (más rápido que la BD)
if (isset($_SESSION['geo_data']) && isset($_SESSION['geo_ip']) && $_SESSION['geo_ip'] === $ip) {
    $data = $_SESSION['geo_data'];
    // Igual actualizar contador de visitas en BD si hay producto
    if ($idProductoActual != null) {
        $dataIP = getIP($ip, $idProductoActual);
        if ($dataIP != null) {
            updateIP($ip, $idProductoActual, $dataIP['visitas'] + 1, json_encode($_COOKIE));
        }
    }
} elseif ($idProductoActual != null) {
    // Intentar desde caché de BD por IP+producto
    $dataIP = getIP($ip, $idProductoActual);
    if ($dataIP == null) {
        $ipdata = crearClienteIpdata($keyApi);
        $data = $ipdata->lookup($ip);
        insertIP($ip, $idProductoActual, json_encode($data), json_encode($_COOKIE));
    } else {
        $data = json_decode($dataIP['data'], true);
        updateIP($ip, $idProductoActual, $dataIP['visitas'] + 1, json_encode($_COOKIE));
    }
    // Guardar en sesión para próximos requests
    $_SESSION['geo_data'] = $data;
    $_SESSION['geo_ip']   = $ip;
} else {
    // Sin producto: llamar a ipdata directo (sin caché BD)
    $ipdata = crearClienteIpdata($keyApi);
    $data = $ipdata->lookup($ip);
    $_SESSION['geo_data'] = $data;
    $_SESSION['geo_ip']   = $ip;
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
        $actual_link = "https://excel-facil.com$_SERVER[REQUEST_URI]?4";
        header("Location: $actual_link");
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
/** Inicio Explicación 4 **/
