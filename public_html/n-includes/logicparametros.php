<?php
$haveWhatsapp    = false;
$numberWhatsapp  = "5491125621394";

// La página es dinámica (precios por país) — Cloudflare no debe cachearla
if (!headers_sent()) {
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Pragma: no-cache');
}

$dominio = str_replace("www.", "", $_SERVER['HTTP_HOST']);
if (in_array($dominio, ['aprendiendo-excel.online', 'aprendiendo-excel.com', 'excel-facil.online', 'excel-facil.com'])) {
    die();
}

require_once dirname(__DIR__) . '/n-libraries/vendor/autoload.php';

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

// ─── Default y mapa de monedas ────────────────────────────────────────────────
$dataDefault = [
    'country_code' => 'AR',
    'currency'     => ['code' => 'ARS', 'symbol' => '$'],
];

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

function n_normalizarDataIP($data, $currencyByCountry, $dataDefault) {
    if (empty($data['country_code'])) return $dataDefault;
    if (empty($data['currency']['code']) || empty($data['currency']['symbol'])) {
        $cc = strtoupper($data['country_code']);
        $data['currency'] = isset($currencyByCountry[$cc])
            ? $currencyByCountry[$cc]
            : ['code' => 'USD', 'symbol' => '$'];
    }
    return $data;
}

function n_detectarPais($ip, $currencyByCountry, $dataDefault) {
    // 1° Cloudflare CF-IPCountry (instantáneo, muy confiable)
    $cfCountry = strtoupper(trim($_SERVER['HTTP_CF_IPCOUNTRY'] ?? ''));
    if ($cfCountry && $cfCountry !== 'XX' && $cfCountry !== 'T1') {
        $currency = isset($currencyByCountry[$cfCountry])
            ? $currencyByCountry[$cfCountry]
            : ['code' => 'USD', 'symbol' => '$'];
        return ['country_code' => $cfCountry, 'currency' => $currency];
    }

    // 2° ip-api.com (gratis, sin key)
    try {
        $ctx = stream_context_create(['http' => ['timeout' => 4]]);
        $raw = @file_get_contents(
            'http://ip-api.com/json/' . urlencode($ip) . '?fields=countryCode,status',
            false, $ctx
        );
        if ($raw) {
            $geo = json_decode($raw, true);
            if (!empty($geo['countryCode']) && ($geo['status'] ?? '') === 'success') {
                $cc = strtoupper($geo['countryCode']);
                $currency = isset($currencyByCountry[$cc])
                    ? $currencyByCountry[$cc]
                    : ['code' => 'USD', 'symbol' => '$'];
                return ['country_code' => $cc, 'currency' => $currency];
            }
        }
    } catch (\Exception $e) { }

    return $dataDefault;
}

// ─── Caché de IP ──────────────────────────────────────────────────────────────
$forceRefresh = isset($_GET['resetip']) || isset($_GET['dev']);

$cacheKey = isset($productoIP) && $productoIP != null
    ? $productoIP
    : (isset($idcurso) ? $idcurso : (isset($_GET['curso']) ? $_GET['curso'] : '_global'));

$existingIP = getIP($ip, $cacheKey);

if ($forceRefresh || $existingIP == null) {
    $data = n_detectarPais($ip, $currencyByCountry, $dataDefault);
    if ($existingIP === null) {
        insertIP($ip, $cacheKey, json_encode($data), json_encode($_COOKIE));
    } else {
        refreshIP($ip, $cacheKey, json_encode($data), json_encode($_COOKIE));
    }
} else {
    $data = json_decode($existingIP['data'], true);
    $data = n_normalizarDataIP($data, $currencyByCountry, $dataDefault);
    updateIP($ip, $cacheKey, $existingIP['visitas'] + 1, json_encode($_COOKIE));
}

// ─── Redirección dominios alternativos ───────────────────────────────────────
if (!isset($_GET['dev'])) {
    if (in_array($dominio, ['aprendiendo-excel.online', 'aprendiendo-excel.com', 'excel-facil.online'])) {
        header('Location: https://aprende-excel.com' . $_SERVER['REQUEST_URI']);
        die();
    }
}

// ─── Conversión de precios por moneda ────────────────────────────────────────
require_once dirname(__DIR__) . '/a-includes/logicprecios.php';

// ─── Variables globales del visitante ────────────────────────────────────────
$urlRoot        = "index.php";
$idCursoDefault = 'excel';
$moneda         = $data['currency']['code'];
$simbolo        = $data['currency']['symbol'];
$country        = $data['country_code'];
$curso          = isset($_GET['curso']) ? $_GET['curso'] : $idCursoDefault;

// ─── DEBUG ───────────────────────────────────────────────────────────────────
if (isset($_GET['dev']) || isset($_GET['resetip'])) {
    $cfRaw = strtoupper(trim($_SERVER['HTTP_CF_IPCOUNTRY'] ?? 'N/A'));
    echo '<div style="position:fixed;top:0;left:0;right:0;background:#1a1a2e;color:#00ff88;font-family:monospace;font-size:13px;padding:10px 16px;z-index:99999;border-bottom:2px solid #00ff88">';
    echo '<strong>GEO DEBUG (n)</strong> &nbsp;|&nbsp; ';
    echo 'IP: <strong>' . htmlspecialchars($ip) . '</strong> &nbsp;|&nbsp; ';
    echo 'CF-Country: <strong>' . htmlspecialchars($cfRaw) . '</strong> &nbsp;|&nbsp; ';
    echo 'Pais: <strong>' . htmlspecialchars($country) . '</strong> &nbsp;|&nbsp; ';
    echo 'Moneda: <strong>' . htmlspecialchars($moneda) . '</strong> &nbsp;|&nbsp; ';
    echo 'Cache: <strong>' . ($forceRefresh ? 'FRESH' : 'DB') . '</strong>';
    echo '</div><div style="height:40px"></div>';
}
