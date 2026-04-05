<?php
/**
 * checkout-headers.php
 * --------------------
 * Headers HTTP para páginas de checkout.
 * 
 * Cache-Control: no-store excluye la página del bfcache del browser.
 * Esto previene que al volver atrás desde la pasarela de pago se restaure
 * el estado JS corrupto (upsells/pack desincronizados con el monto).
 * 
 * Incluir al inicio de cada checkout.php, antes de cualquier output:
 *   include('../n-includes/checkout-headers.php');
 */
if (!headers_sent()) {
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
    header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');
}
