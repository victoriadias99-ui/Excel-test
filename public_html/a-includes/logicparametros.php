<?php
// Instrumentación temporal de performance (visible solo con ?dev o ?resetip)
$__perf = ['start' => microtime(true), 'marks' => []];
$__perfMark = function ($label) use (&$__perf) {
    $__perf['marks'][$label] = round((microtime(true) - $__perf['start']) * 1000, 1);
};

require_once  dirname(__DIR__) . '/a-libraries/vendor/autoload.php';
$__perfMark('autoload');

require_once __DIR__ . '/redis-client.php';

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\Psr18Client;
use Nyholm\Psr7\Factory\Psr17Factory;

// La página es dinámica (precios por país) — Cloudflare no debe cachearla,
// pero sí permitimos el bfcache del browser para que navegar con atrás/adelante
// y entre cursos sea instantáneo. Checkout tiene su propio header no-store.
if (!headers_sent()) {
    header('Cache-Control: private, no-cache, must-revalidate');
    header('Pragma: no-cache');
}

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

// ─── Default cuando no se puede detectar el país ─────────────────────────────
$dataDefault = [
    'country_code' => 'AR',
    'currency'     => ['code' => 'ARS', 'symbol' => '$'],
];

// ─── Mapa país → moneda ───────────────────────────────────────────────────────
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
    'CA' => ['code' => 'USD', 'symbol' => '$'],
    'ES' => ['code' => 'EUR', 'symbol' => '€'],
    'DE' => ['code' => 'EUR', 'symbol' => '€'],
    'FR' => ['code' => 'EUR', 'symbol' => '€'],
    'IT' => ['code' => 'EUR', 'symbol' => '€'],
    'GB' => ['code' => 'USD', 'symbol' => '$'],
];

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
 * Detecta el país de una IP.
 * 1° Cloudflare CF-IPCountry header (instantáneo, muy confiable)
 * 2° ip-api.com (gratis, sin key)
 * 3° Default AR
 */
function detectarPais($ip, $currencyByCountry, $dataDefault) {
    // Intento 1: header de Cloudflare (el más rápido y confiable)
    $cfCountry = strtoupper(trim($_SERVER['HTTP_CF_IPCOUNTRY'] ?? ''));
    if ($cfCountry && $cfCountry !== 'XX' && $cfCountry !== 'T1') {
        $currency = isset($currencyByCountry[$cfCountry])
            ? $currencyByCountry[$cfCountry]
            : ['code' => 'USD', 'symbol' => '$'];
        return ['country_code' => $cfCountry, 'currency' => $currency];
    }

    // Intento 2: ip-api.com (gratis, sin key) — timeout muy corto para no bloquear el render.
    // 200ms es suficiente en LatAm (mediana ~80ms). Si falla, cae a default AR y no
    // bloquea el first-paint del home hasta 1s como antes.
    try {
        $ctx = stream_context_create([
            'http' => ['timeout' => 0.2, 'ignore_errors' => true],
        ]);
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
    } catch (\Exception $e) { }

    return $dataDefault;
}

// ─── Determinar clave de caché ────────────────────────────────────────────────
$forceRefresh = isset($_GET['resetip']) || isset($_GET['dev']);

if (isset($productoIP) && $productoIP != null) {
    $cacheKey = $productoIP;
} else {
    $cacheKey = isset($idcurso)
        ? $idcurso
        : (isset($_GET['curso']) ? $_GET['curso'] : '_global');
}

// ─── Detección de país (separada del tracking por curso) ─────────────────────
// Orden: CF-IPCountry header → Redis (geo:{ip}, 24 h) → MySQL _geo → ip-api.com.
//
// Redis es la capa más rápida (<1 ms) y elimina la mayoría de las llamadas HTTP
// a ip-api.com y las queries MySQL de geo-lookup. El _geo de MySQL se mantiene
// como fallback para cuando Redis no está disponible.
$data      = null;
$cfCountry = strtoupper(trim($_SERVER['HTTP_CF_IPCOUNTRY'] ?? ''));

if ($cfCountry && $cfCountry !== 'XX' && $cfCountry !== 'T1') {
    $currency = isset($currencyByCountry[$cfCountry])
        ? $currencyByCountry[$cfCountry]
        : ['code' => 'USD', 'symbol' => '$'];
    $data = ['country_code' => $cfCountry, 'currency' => $currency];
}

// Lookup de la fila de tracking por curso (analítica de visitas)
$existingIP = getIP($ip, $cacheKey);
$__perfMark('getIP');

// ── Capa 1: Redis geo-cache (geo:{ip}, TTL 24 h) ─────────────────────────────
// Evita tanto la query MySQL _geo como la llamada HTTP a ip-api.com en visitas
// repetidas. Un hit de Redis tarda <1 ms frente a los ~1 000 ms de ip-api.com.
$geoCached    = null;   // resultado MySQL _geo (cargado solo si Redis falla)
$geoFromRedis = false;  // indica si el hit vino de Redis

if ($data === null && !$forceRefresh) {
    $redisGeoRaw = cacheGet("geo:{$ip}");
    if ($redisGeoRaw !== null) {
        $decoded = json_decode($redisGeoRaw, true);
        if (is_array($decoded) && !empty($decoded['country_code'])) {
            $data         = normalizarDataIP($decoded, $currencyByCountry, $dataDefault);
            $geoFromRedis = true;
            $__perfMark('geoCacheHit_redis');
        }
    }
}

// ── Capa 2: MySQL _geo (fallback cuando Redis no disponible o miss) ───────────
// El caché _geo es UNA fila por IP, compartida entre todas las páginas del
// sitio. Antes, al estar atado a $cacheKey (curso), cada nueva página del
// mismo visitante generaba otro miss y —sin Cloudflare— otra llamada HTTP
// bloqueante de hasta 1s a ip-api.com. Con _geo, el HTTP se hace solo en la
// primera visita de la IP.
if ($data === null && !$forceRefresh) {
    $geoCached = getIP($ip, '_geo');
    if ($geoCached !== null && !empty($geoCached['data'])) {
        $decoded = json_decode($geoCached['data'], true);
        if (is_array($decoded) && !empty($decoded['country_code'])) {
            $data = normalizarDataIP($decoded, $currencyByCountry, $dataDefault);
            $__perfMark('geoCacheHit_db');
            // Rellenar Redis para que la próxima visita no toque MySQL
            cacheSet("geo:{$ip}", json_encode($data), 2592000);
        }
    }
}

// ── Capa 3: Detección fresca (CF header + ip-api.com) ────────────────────────
if ($data === null || $forceRefresh) {
    $data = detectarPais($ip, $currencyByCountry, $dataDefault);
    $__perfMark('detectarPais');

    $geoJson = json_encode($data);

    // Persistir en Redis (30 días) para evitar futuras llamadas HTTP
    cacheSet("geo:{$ip}", $geoJson, 2592000);

    // Persistir en MySQL _geo como fallback si Redis no está disponible
    $geoExisting = $geoCached !== null ? $geoCached : getIP($ip, '_geo');
    if ($geoExisting === null) {
        insertIP($ip, '_geo', $geoJson, null);
    } else {
        refreshIP($ip, '_geo', $geoJson, null);
    }
    $__perfMark('geoPersist');
}

// Contador de visitas por curso (analítica). Sampleo 1/20 para no escribir en cada page view.
if ($existingIP === null) {
    insertIP($ip, $cacheKey, json_encode($data), json_encode($_COOKIE));
    $__perfMark('insertIP');
} elseif (mt_rand(1, 20) === 1) {
    updateIP($ip, $cacheKey, $existingIP['visitas'] + 20, json_encode($_COOKIE));
    $__perfMark('updateIP');
}

// ─── Redirección de dominios alternativos ─────────────────────────────────────
if (!isset($_GET['dev'])) {
    $dominio = str_replace('www.', '', $_SERVER['HTTP_HOST']);
    if (in_array($dominio, ['aprendiendo-excel.online', 'aprendiendo-excel.com', 'excel-facil.online'])) {
        $sanitizedUri = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        header('Location: https://excel-facil.com' . $sanitizedUri . '?4');
        die();
    }
}

// ─── Conversión de precios por moneda ────────────────────────────────────────
require_once __DIR__ . '/logicprecios.php';

// ─── Variables globales del visitante ────────────────────────────────────────
$urlRoot        = 'index.php';
$idCursoDefault = 'excel';
$moneda         = $data['currency']['code'];
$simbolo        = $data['currency']['symbol'];
$country        = $data['country_code'];
// IVA solo aplica a visitantes argentinos (el IVA de RG 4626 es fiscal de AR).
// Para el resto del mundo el precio mostrado ya es el total.
$textoIVA       = ($country === 'AR') ? ' + IVA' : '';
$curso          = isset($_GET['curso']) ? $_GET['curso'] : $idCursoDefault;

// ─── DEBUG: barra de diagnóstico con ?dev o ?resetip ─────────────────────────
if (isset($_GET['dev']) || isset($_GET['resetip'])) {
    $__perfMark('end');
    $cfRaw    = strtoupper(trim($_SERVER['HTTP_CF_IPCOUNTRY'] ?? 'N/A'));
    $redisOk  = getRedis() !== null ? 'OK' : 'N/A';
    $cacheSource = $forceRefresh
        ? 'FRESH'
        : ($geoFromRedis ? 'REDIS' : (isset($geoCached) && $geoCached !== null ? 'DB' : 'FRESH'));
    echo '<div style="position:fixed;top:0;left:0;right:0;background:#1a1a2e;color:#00ff88;font-family:monospace;font-size:13px;padding:10px 16px;z-index:99999;border-bottom:2px solid #00ff88">';
    echo '<strong>GEO DEBUG</strong> &nbsp;|&nbsp; ';
    echo 'IP: <strong>' . htmlspecialchars($ip) . '</strong> &nbsp;|&nbsp; ';
    echo 'CF-Country: <strong>' . htmlspecialchars($cfRaw) . '</strong> &nbsp;|&nbsp; ';
    echo 'Pais: <strong>' . htmlspecialchars($country) . '</strong> &nbsp;|&nbsp; ';
    echo 'Moneda: <strong>' . htmlspecialchars($moneda) . '</strong> &nbsp;|&nbsp; ';
    echo 'Redis: <strong>' . $redisOk . '</strong> &nbsp;|&nbsp; ';
    echo 'Cache: <strong>' . $cacheSource . '</strong><br>';
    echo '<strong>PERF (ms desde start):</strong> ';
    foreach ($__perf['marks'] as $label => $ms) {
        echo htmlspecialchars($label) . '=<strong>' . $ms . '</strong> &nbsp; ';
    }
    echo '</div><div style="height:60px"></div>';
}
