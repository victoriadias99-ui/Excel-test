<?php
require_once  dirname(__DIR__) . '/a-libraries/vendor/autoload.php';

use Ipdata\ApiClient\Ipdata;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\Psr18Client;
use Nyholm\Psr7\Factory\Psr17Factory;

// La página es dinámica (precios por país) — Cloudflare no debe cachearla
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');

// ─── Obtener IP real del visitante ───────────────────────────────────────────
if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
} elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$ip = explode(',', str_replace(' ', '', $ip))[0];

// ─── API key de ipdata (leída desde variable de entorno) ─────────────────────
$keyApi = getenv('IPDATA_API_KEY') ?: '670ffe7a0bd967e949ee51ff856a24a4812fe48f9efe99140e1ce4fd';

// ─── Default cuando no se puede detectar el país ────────────────────────────
$dataDefault = [
    'country_code' => 'AR',
    'currency'     => ['code' => 'ARS', 'symbol' => '$'],
];

// ─── Mapa país → moneda (fallback si la API no devuelve currency) ────────────
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
    'DE' => ['code' => 'EUR', 'symbol' => '€'],
    'FR' => ['code' => 'EUR', 'symbol' => '€'],
    'IT' => ['code' => 'EUR', 'symbol' => '€'],
    'CA' => ['code' => 'USD', 'symbol' => '$'],
    'GB' => ['code' => 'USD', 'symbol' => '$'],
];

// ─── Asegura que $data tenga country_code y currency válidos ─────────────────
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

/**
 * Detecta el país de una IP usando ipdata como primario
 * e ip-api.com como fallback gratuito.
 * Nunca bloquea más de 8 segundos en total.
 */
function detectarPais($ip, $keyApi, $currencyByCountry, $dataDefault) {
    // Intento 1: ipdata.co
    try {
        $httpClient = new Psr18Client(HttpClient::create(['timeout' => 4]));
        $psr17Factory = new Psr17Factory();
        $ipdata = new Ipdata($keyApi, $httpClient, $psr17Factory);
        $d = $ipdata->lookup($ip);
        if (!empty($d['country_code'])) {
            return normalizarDataIP($d, $currencyByCountry, $dataDefault);
        }
    } catch (\Exception $e) {
        // fall through to backup
    }

    // Intento 2: ip-api.com (gratis, sin key, muy rápido)
    try {
        $ctx = stream_context_create(['http' => ['timeout' => 4]]);
        $raw = @file_get_contents(
            'http://ip-api.com/json/' . urlencode($ip) . '?fields=countryCode,status',
            false,
            $ctx
        );
        if ($raw) {
            $geo = json_decode($raw, true);
            if (!empty($geo['countryCode']) && ($geo['status'] ?? '') === 'success') {
                $cc       = strtoupper($geo['countryCode']);
                $currency = isset($currencyByCountry[$cc])
                    ? $currencyByCountry[$cc]
                    : ['code' => 'USD', 'symbol' => '$'];
                return ['country_code' => $cc, 'currency' => $currency];
            }
        }
    } catch (\Exception $e) {
        // fall through to default
    }

    return $dataDefault;
}

// ─── Determinar clave de caché para esta visita ──────────────────────────────
// productoIP tiene prioridad (páginas de cursos individuales lo setean)
// Si no hay producto ni curso, usamos '_global' para cachear igual
$forceRefresh = isset($_GET['resetip']) || isset($_GET['dev']);

if (isset($productoIP) && $productoIP != null) {
    $cacheKey = $productoIP;
} else {
    $cacheKey = isset($idcurso)
        ? $idcurso
        : (isset($_GET['curso']) ? $_GET['curso'] : '_global');
}

// ─── Leer de caché o hacer lookup ────────────────────────────────────────────
$dataIP = $forceRefresh ? null : getIP($ip, $cacheKey);

if ($dataIP == null) {
    $data = detectarPais($ip, $keyApi, $currencyByCountry, $dataDefault);
    insertIP($ip, $cacheKey, json_encode($data), json_encode($_COOKIE));
} else {
    $data = json_decode($dataIP['data'], true);
    $data = normalizarDataIP($data, $currencyByCountry, $dataDefault);
    updateIP($ip, $cacheKey, $dataIP['visitas'] + 1, json_encode($_COOKIE));
}

// ─── Redirección de dominios alternativos ────────────────────────────────────
if (!isset($_GET['dev'])) {
    $dominio = str_replace('www.', '', $_SERVER['HTTP_HOST']);
    if (in_array($dominio, ['aprendiendo-excel.online', 'aprendiendo-excel.com', 'excel-facil.online'])) {
        $sanitizedUri = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        $actual_link  = 'https://excel-facil.com' . $sanitizedUri . '?4';
        header('Location: ' . $actual_link);
        die();
    }
}

// ─── Variables globales del visitante ────────────────────────────────────────
$urlRoot        = 'index.php';
$idCursoDefault = 'excel';
$moneda         = $data['currency']['code'];
$simbolo        = $data['currency']['symbol'];
$country        = $data['country_code'];
$curso          = isset($_GET['curso']) ? $_GET['curso'] : $idCursoDefault;

// ─── DEBUG: barra de diagnóstico con ?dev o ?resetip ─────────────────────────
if (isset($_GET['dev']) || isset($_GET['resetip'])) {
    echo '<div style="position:fixed;top:0;left:0;right:0;background:#1a1a2e;color:#00ff88;font-family:monospace;font-size:13px;padding:10px 16px;z-index:99999;border-bottom:2px solid #00ff88">';
    echo '<strong>GEO DEBUG</strong> &nbsp;|&nbsp; ';
    echo 'IP: <strong>' . htmlspecialchars($ip) . '</strong> &nbsp;|&nbsp; ';
    echo 'Pais: <strong>' . htmlspecialchars($country) . '</strong> &nbsp;|&nbsp; ';
    echo 'Moneda: <strong>' . htmlspecialchars($moneda) . '</strong> &nbsp;|&nbsp; ';
    echo 'Simbolo: <strong>' . htmlspecialchars($simbolo) . '</strong> &nbsp;|&nbsp; ';
    echo 'Cache key: <strong>' . htmlspecialchars($cacheKey) . '</strong> &nbsp;|&nbsp; ';
    echo 'Lookup: <strong>' . ($forceRefresh ? 'FRESH (cache ignorado)' : 'desde DB') . '</strong>';
    echo '</div><div style="height:40px"></div>';
}
