<?php

/**
 * logicprecios.php
 * ----------------
 * Conversión de precios para toda Latinoamérica.
 *
 * Los precios en la BD están almacenados en ARS.
 * Este módulo los convierte a la moneda local del visitante
 * usando USD como moneda puente (ARS → USD → moneda local).
 *
 * ⚠️ MANTENIMIENTO: Actualizar las tasas mensualmente o cuando
 * haya variaciones mayores al 10% en alguna divisa.
 * Última actualización: Abril 2026
 */

// ─────────────────────────────────────────────
// 1. TASA ARS → USD
// Cuántos ARS equivalen a 1 USD (dólar libre/MEP)
// ─────────────────────────────────────────────
if (!defined('TASA_ARS_USD')) {
    define('TASA_ARS_USD', 1100);   // 1 USD = 1100 ARS  ← actualizar cuando varíe
}

// ─────────────────────────────────────────────
// 2. TASAS USD → MONEDA LOCAL
// Cuántas unidades de moneda local equivalen a 1 USD
// ─────────────────────────────────────────────
$tasasDesdeUSD = [
    // ── Cono Sur ──
    'ARS' => 1100,     // Argentina       — Peso argentino
    'CLP' => 970,      // Chile           — Peso chileno
    'UYU' => 40,       // Uruguay         — Peso uruguayo
    'PYG' => 7600,     // Paraguay        — Guaraní

    // ── Países andinos ──
    'COP' => 4200,     // Colombia        — Peso colombiano
    'PEN' => 3.75,     // Perú            — Sol
    'BOB' => 6.9,      // Bolivia         — Boliviano
    'VES' => 37,       // Venezuela       — Bolívar soberano

    // ── México y Centroamérica ──
    'MXN' => 17.5,     // México          — Peso mexicano
    'GTQ' => 7.8,      // Guatemala       — Quetzal
    'HNL' => 24.8,     // Honduras        — Lempira
    'NIO' => 36.8,     // Nicaragua       — Córdoba
    'CRC' => 520,      // Costa Rica      — Colón
    'PAB' => 1,        // Panamá          — Balboa (= USD)

    // ── Caribe ──
    'DOP' => 59,       // R. Dominicana   — Peso dominicano
    'CUP' => 24,       // Cuba            — Peso cubano

    // ── Dolarizados y otros ──
    'USD' => 1,        // Ecuador, El Salvador, y dolarizados
    'BRL' => 5.15,     // Brasil          — Real
    'EUR' => 0.93,     // España/Europa   — Euro
];

// ─────────────────────────────────────────────
// 3. FUNCIÓN PRINCIPAL DE CONVERSIÓN
// ─────────────────────────────────────────────

/**
 * Convierte un precio en ARS a la moneda local del visitante.
 *
 * Flujo: ARS → USD → moneda local
 *
 * @param  float|string  $precioARS   Precio en pesos argentinos (de la BD)
 * @param  string        $moneda      Código ISO de la moneda destino (ej: 'COP', 'MXN')
 * @return string                     Precio formateado sin símbolo (ej: "4.200" o "17.50")
 */
if (!function_exists('convertirPrecio')):
function convertirPrecio($precioARS, $moneda) {
    global $tasasDesdeUSD;

    if (!isset($precioARS) || $precioARS === '' || !is_numeric($precioARS)) {
        return '';
    }

    // ARS → USD → moneda local
    $precioUSD   = floatval($precioARS) / TASA_ARS_USD;
    $tasaLocal   = isset($tasasDesdeUSD[$moneda]) ? $tasasDesdeUSD[$moneda] : 1;
    $precioLocal = $precioUSD * $tasaLocal;

    return formatearPrecio($precioLocal, $moneda);
}
endif;

/**
 * Devuelve el precio convertido como número (float, sin formatear).
 * Útil para integraciones de pago (Stripe, PayPal) donde se necesita
 * el monto en unidades/centavos.
 */
if (!function_exists('convertirPrecioNumerico')):
function convertirPrecioNumerico($precioARS, $moneda) {
    global $tasasDesdeUSD;

    if (!isset($precioARS) || $precioARS === '' || !is_numeric($precioARS)) {
        return 0.0;
    }

    $precioUSD = floatval($precioARS) / TASA_ARS_USD;
    $tasaLocal = isset($tasasDesdeUSD[$moneda]) ? $tasasDesdeUSD[$moneda] : 1;
    return $precioUSD * $tasaLocal;
}
endif;

// ─────────────────────────────────────────────
// 4. FORMATEO DE NÚMEROS SEGÚN MONEDA
// ─────────────────────────────────────────────

/**
 * Formatea el número con los separadores correctos para cada moneda.
 *
 * @param  float   $precio   Precio convertido a moneda local
 * @param  string  $moneda   Código ISO de la moneda
 * @return string            Número formateado (sin símbolo)
 */
if (!function_exists('formatearPrecio')):
function formatearPrecio($precio, $moneda) {
    // Monedas que usan 2 decimales
    $conDecimales = ['USD', 'EUR', 'BRL', 'PAB', 'PEN', 'BOB', 'UYU'];

    if (in_array($moneda, $conDecimales)) {
        return number_format($precio, 2, '.', ',');
    }

    // Resto de LatAm: sin decimales, punto como separador de miles
    return number_format($precio, 0, ',', '.');
}
endif;
