<?php
/**
 * Router para PHP built-in server (Railway).
 * Reemplaza las reglas de mod_rewrite de Apache (.htaccess).
 *
 * BUG-12 FIX — Spider trap de bots de IA (Apr 2026):
 *   Antes este router hacía fallback ciego a index.php para CUALQUIER path
 *   inexistente, devolviendo 200 OK. Bots (meta-externalagent, Amazonbot,
 *   GPTBot) empezaron a inventar URLs tipo /dinamico/excel-promo/.../... con
 *   10+ segmentos, y cada una respondía 200. Consecuencias:
 *     · Cloudflare cache hit rate cayó de ~50% a 1,6%.
 *     · 2,93M requests en 30 días; 181 GB de egress; CPU de MySQL disparado.
 *   Fix: validamos el PRIMER segmento contra una whitelist de rutas reales.
 *   Si no matchea, la profundidad es excesiva, o hay segmentos duplicados,
 *   devolvemos 404 real para que Cloudflare cachee el error y el bot corte
 *   la rama del árbol. Defensa en profundidad complementa el robots.txt.
 *
 * ob_start() captura cualquier output prematuro (BOM, espacios) de archivos
 * incluidos para permitir header() desde cualquier punto del código.
 */
ob_start();

$uri      = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uriClean = trim($uri, '/');
$segments = $uriClean === '' ? [] : explode('/', $uriClean);

// ───────────────────────────────────────────────────────────────────────────
// 1) Si el archivo/directorio existe físicamente, servir directo.
//    (PHP built-in server sirve por nosotros al retornar false)
// ───────────────────────────────────────────────────────────────────────────
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    ob_end_clean();
    return false;
}

// ───────────────────────────────────────────────────────────────────────────
// 2) Helper: responder 404 con noindex para que Cloudflare/CDN cachee el error
//    y los crawlers dejen de seguir estas URLs.
// ───────────────────────────────────────────────────────────────────────────
$responder404 = function (string $motivo = '') {
    ob_end_clean();
    http_response_code(404);
    header('X-Robots-Tag: noindex, nofollow', true);
    header('Content-Type: text/html; charset=utf-8');
    header('Cache-Control: public, max-age=3600'); // permitir caching del 404
    // Log interno para monitoreo (no se muestra al cliente)
    if ($motivo !== '') {
        error_log('[router] 404 (' . $motivo . '): ' . ($_SERVER['REQUEST_URI'] ?? ''));
    }
    echo '<!DOCTYPE html><html lang="es"><head>'
        . '<meta charset="utf-8"><title>404 - Página no encontrada</title>'
        . '<meta name="robots" content="noindex, nofollow">'
        . '<link rel="canonical" href="https://aprende-excel.com/">'
        . '</head><body style="font-family:sans-serif;text-align:center;padding:60px 20px;">'
        . '<h1>404 · Página no encontrada</h1>'
        . '<p>La URL solicitada no existe. <a href="https://aprende-excel.com/">Volver al inicio</a>.</p>'
        . '</body></html>';
    exit;
};

// ───────────────────────────────────────────────────────────────────────────
// 3) Whitelist del PRIMER segmento. Cualquier primer-segmento fuera de esto
//    es una URL inventada por un bot o un typo → 404.
//    IMPORTANTE: mantener sincronizado con public_html/ si se agregan cursos.
// ───────────────────────────────────────────────────────────────────────────
$WHITELIST_PRIMER_SEGMENTO = [
    // Cursos (directorios reales)
    'excel-inicial', 'excel-intermedio', 'excel-avanzado', 'excel-promo',
    'power-bi', 'power-bi-avanzado', 'power-bi-y-excel', 'power-bi-y-excel-old',
    'pack-office', 'pack-project',
    'microsoft-sql-server', 'microsoft-sql-server-certificado',
    'microsoft-project-inicial', 'microsoft-project-intermedio', 'microsoft-project-avanzado',
    'power-point', 'word', 'google-sheets',
    'visual-studio', 'visual-studio-leandro',
    'petroleo', 'plantillas', 'programacion', 'windows-server',
    'metodologias-agiles', 'suscripcion-acceso-ilimitado',
    'plan-empresa', 'plan-empresa-test', 'plan-Empresa-lea',
    'clases-en-vivo', 'clases-en-vivo-excel-inicial', 'clases-en-vivo-lea',
    'argentina', 'latam',
    // Landings de preview / mockups
    'gemini-mockup',
    // Directorios estáticos / librerías
    'a-img', 'a-includes', 'a-libraries', 'a-pages',
    'n-img', 'n-includes', 'n-libraries', 'n-pages', 'n-assets', 'n-css', 'n-site',
    'css', 'js', 'img', 'vendor',
    // Páginas administrativas / internas
    'panel-rama', 'facebook-report', 'server-tes',
    // Archivos PHP de raíz (sin extensión en URL pero igual debe permitir)
    'api-precios.php', 'checkAbandonedUser.php', 'pago_exitoso.php', 'pago_exitoso_n.php',
    'recuperar_carrito.php', 'reenviar_credenciales.php', 'terminos.php', 'terminos.html',
    'unirse.php', 'unirse_n.php', 'catalogo.html',
    'robots.txt', 'sitemap.xml', 'favicon.ico', 'favicon1.ico', 'propagation.txt',
    'default.html',
];
$SET_WHITELIST = array_flip($WHITELIST_PRIMER_SEGMENTO);

// ───────────────────────────────────────────────────────────────────────────
// 4) Validaciones anti-spider-trap (en orden de barato → caro).
// ───────────────────────────────────────────────────────────────────────────
if (!empty($segments)) {
    $primerSegmento = $segments[0];

    // 4.a — Profundidad máxima razonable. Ninguna ruta legítima del sitio
    //       pasa de 4 niveles (p.ej. /clases-en-vivo-excel-inicial/assets/img/foo.png).
    //       Los paths abusivos tenían 10-11 segmentos.
    if (count($segments) > 4) {
        $responder404('depth>4');
    }

    // 4.b — Segmentos duplicados en el mismo path son señal de spider trap.
    //       Ej: /plan-empresa/microsoft-sql-server/microsoft-sql-server/...
    if (count($segments) !== count(array_unique($segments))) {
        $responder404('dup-segments');
    }

    // 4.c — Primer segmento debe estar en la whitelist.
    //       Esto mata TODO el bucket /dinamico/... que es el 47% del tráfico abusivo.
    if (!isset($SET_WHITELIST[$primerSegmento])) {
        $responder404('segment-not-whitelisted');
    }
}

// ───────────────────────────────────────────────────────────────────────────
// 5) Path válido pero archivo no existe → servir el index.php principal.
//    (Ej: /excel-inicial/ sin trailing file → home del curso)
//    Este es el caso legítimo que el router original cubría.
// ───────────────────────────────────────────────────────────────────────────
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/index.php';

ob_end_flush();
