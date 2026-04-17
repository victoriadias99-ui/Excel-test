<?php
/**
 * procesar.php — Cron processor del sistema de recuperación de carritos abandonados.
 *
 * Ejecutar cada 5 minutos desde cron/Railway scheduler:
 *   */5 * * * * php /app/public_html/n-libraries/carritos_abandonados/procesar.php
 *
 * O por HTTP con un token:
 *   GET /n-libraries/carritos_abandonados/procesar.php?key=$CRON_TOKEN
 *
 * Cadencia de envíos (desde fecha_creacion):
 *   Paso 1 → a partir de 20 min
 *   Paso 2 → a partir de 60 min
 *   Paso 3 → a partir de 24 h
 *   Paso 4 → a partir de 48 h
 *   > 96 h y pendiente → marcar 'expired'
 *
 * Anti-duplicados: cada UPDATE claim usa WHERE email_N_sent_at IS NULL.
 * Sólo el primer proceso que obtenga rowCount=1 envía el mail.
 */

declare(strict_types=1);
date_default_timezone_set('America/Argentina/Buenos_Aires');

$isCli = (php_sapi_name() === 'cli');
if (!$isCli) {
    $expected = getenv('CRON_TOKEN') ?: '';
    $got      = $_GET['key'] ?? '';
    if ($expected === '' || !hash_equals($expected, (string) $got)) {
        http_response_code(403);
        exit('Forbidden');
    }
    header('Content-Type: text/plain; charset=utf-8');
}

require_once dirname(__DIR__, 2) . '/n-includes/conexion.php';
require_once __DIR__ . '/helpers.php';

$cnx = OpenCon();

// Pasos: min_minutos, max_minutos (desde fecha_creacion), campo de timestamp
$steps = [
    1 => ['min' => 20,         'max' => 24 * 60,      'col' => 'email_1_sent_at'],
    2 => ['min' => 60,         'max' => 24 * 60,      'col' => 'email_2_sent_at'],
    3 => ['min' => 24 * 60,    'max' => 48 * 60,      'col' => 'email_3_sent_at'],
    4 => ['min' => 48 * 60,    'max' => 96 * 60,      'col' => 'email_4_sent_at'],
];

$sentSummary = ['1' => 0, '2' => 0, '3' => 0, '4' => 0, 'skipped_paid' => 0, 'expired' => 0, 'errors' => 0];

foreach ($steps as $stepNum => $cfg) {
    $prevCol = $stepNum > 1 ? 'email_' . ($stepNum - 1) . '_sent_at' : null;
    // Para paso 2+, exigimos que el paso anterior ya se haya enviado (refuerza orden).
    $prevClause = $prevCol ? " AND $prevCol IS NOT NULL " : '';

    // Candidatos
    $sql = "SELECT id, token, curso, id_venta, stripe_session_id, stripe_session_url,
                   nombre, apellido, email, dir, dominio,
                   monto_ars, monto_stripe, moneda, country
            FROM carritos_abandonados
            WHERE estado = 'pending'
              AND {$cfg['col']} IS NULL
              $prevClause
              AND TIMESTAMPDIFF(MINUTE, fecha_creacion, NOW()) >= {$cfg['min']}
              AND TIMESTAMPDIFF(MINUTE, fecha_creacion, NOW()) <= {$cfg['max']}
            ORDER BY fecha_creacion ASC
            LIMIT 200";
    $rows = $cnx->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $cart) {
        // Saltear si la venta ya fue aprobada (webhook pudo no haber corrido el UPDATE aún)
        if (ca_venta_pagada($cnx, $cart['curso'], $cart['id_venta'])) {
            ca_marcar_recuperado($cnx, ['curso' => $cart['curso'], 'id_venta' => $cart['id_venta']]);
            $sentSummary['skipped_paid']++;
            continue;
        }

        // Claim atómico: sólo uno gana.
        $claim = $cnx->prepare("UPDATE carritos_abandonados
                                SET {$cfg['col']} = NOW()
                                WHERE id = ? AND {$cfg['col']} IS NULL AND estado = 'pending'");
        $claim->execute([$cart['id']]);
        if ($claim->rowCount() === 0) {
            continue; // otro worker lo agarró
        }

        try {
            $titulo   = ca_titulo_curso($cnx, $cart['curso']);
            $recovery = ca_recovery_url($cart);
            [$subject, $html] = ca_build_email($stepNum, $cart, $titulo, $recovery);

            $res = ca_send_resend($cart['email'], $subject, $html, ca_reply_to());

            if ($res['ok']) {
                $sentSummary[(string)$stepNum]++;
                ca_log("SENT step=$stepNum id={$cart['id']} email={$cart['email']} curso={$cart['curso']}");
            } else {
                // Revertir el claim para reintento próximo tick (si no fue un 4xx permanente).
                $http = (int)($res['code'] ?? 0);
                $permanent = ($http >= 400 && $http < 500 && $http !== 429);

                if ($permanent) {
                    // Dejar marcado el intento y registrar error; no reintentar este paso.
                    $cnx->prepare("UPDATE carritos_abandonados SET last_error = ? WHERE id = ?")
                        ->execute([substr((string)$res['error'], 0, 500), $cart['id']]);
                } else {
                    // Soltar el lock del paso para reintento
                    $cnx->prepare("UPDATE carritos_abandonados SET {$cfg['col']} = NULL, last_error = ? WHERE id = ?")
                        ->execute([substr((string)$res['error'], 0, 500), $cart['id']]);
                }
                $sentSummary['errors']++;
                ca_log("ERROR step=$stepNum id={$cart['id']} http=$http err=" . (string)$res['error']);
            }
        } catch (\Throwable $e) {
            $cnx->prepare("UPDATE carritos_abandonados SET {$cfg['col']} = NULL, last_error = ? WHERE id = ?")
                ->execute([substr($e->getMessage(), 0, 500), $cart['id']]);
            $sentSummary['errors']++;
            ca_log("EXCEPTION step=$stepNum id={$cart['id']} msg=" . $e->getMessage());
        }
    }
}

// Expirar carritos muy viejos (>96h) que siguen pending
$expire = $cnx->prepare("UPDATE carritos_abandonados
                         SET estado = 'expired'
                         WHERE estado = 'pending'
                           AND TIMESTAMPDIFF(MINUTE, fecha_creacion, NOW()) > 96 * 60");
$expire->execute();
$sentSummary['expired'] = $expire->rowCount();

echo json_encode($sentSummary) . "\n";
