<?php
/**
 * helpers.php — utilidades del sistema de recuperación de carritos abandonados.
 * - Inserta / marca / consulta registros en carritos_abandonados.
 * - Arma templates de emails (1..4) y los envía via Resend.
 * - Resuelve la URL de recuperación (/recuperar_carrito.php?t=...).
 *
 * El procesador (procesar.php) es el único con side-effects de envío;
 * este archivo sólo expone funciones puras + send_resend_email.
 */

declare(strict_types=1);

if (!function_exists('ca_log')) {
    function ca_log(string $msg): void {
        $line = '[' . date('Y-m-d H:i:s') . '] ' . $msg . PHP_EOL;
        @file_put_contents(dirname(__DIR__, 2) . '/log-carritos-abandonados.txt', $line, FILE_APPEND | LOCK_EX);
    }
}

if (!function_exists('ca_resend_key')) {
    function ca_resend_key(): string {
        return (string)($_ENV['RESEND_API_KEY'] ?? getenv('RESEND_API_KEY') ?? '');
    }
}

if (!function_exists('ca_from_address')) {
    function ca_from_address(): string {
        // Permite override; default igual que reenviar_credenciales.php
        return (string)(getenv('CARRITO_FROM') ?: 'Aprende Excel <onboarding@resend.dev>');
    }
}

if (!function_exists('ca_reply_to')) {
    function ca_reply_to(): string {
        return (string)(getenv('CARRITO_REPLY_TO') ?: 'hola@aprende-excel.com');
    }
}

/**
 * Inserta el carrito. Si ya existe (mismo curso+id_venta) no hace nada.
 * Devuelve el token del carrito creado (o existente).
 */
if (!function_exists('ca_registrar_carrito')) {
    function ca_registrar_carrito(PDO $cnx, array $d): ?string {
        $token = bin2hex(random_bytes(16));
        try {
            $stmt = $cnx->prepare("
                INSERT IGNORE INTO carritos_abandonados
                (token, curso, id_venta, stripe_session_id, stripe_session_url,
                 nombre, apellido, celular, email, dir, dominio, pack, descuento,
                 monto_ars, monto_stripe, moneda, country)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
            ");
            $stmt->execute([
                $token,
                $d['curso'],
                $d['id_venta'],
                $d['stripe_session_id'],
                $d['stripe_session_url'] ?? '',
                $d['nombre']    ?? '',
                $d['apellido']  ?? '',
                $d['celular']   ?? '',
                strtolower(trim((string)$d['email'])),
                $d['dir']       ?? '',
                $d['dominio']   ?? '',
                $d['pack']      ?? '',
                $d['descuento'] ?? '',
                $d['monto_ars']     ?? null,
                $d['monto_stripe']  ?? null,
                $d['moneda']    ?? 'ARS',
                $d['country']   ?? 'AR',
            ]);
            if ($stmt->rowCount() === 0) {
                // Ya existía: devolver el token actual
                $q = $cnx->prepare("SELECT token FROM carritos_abandonados WHERE curso=? AND id_venta=?");
                $q->execute([$d['curso'], $d['id_venta']]);
                $row = $q->fetch(PDO::FETCH_ASSOC);
                return $row['token'] ?? null;
            }

            // Cerrar carritos pendientes previos del mismo email+curso:
            // el usuario reintentó el checkout y sólo queremos secuenciar el más reciente.
            $close = $cnx->prepare("UPDATE carritos_abandonados
                                    SET estado = 'expired'
                                    WHERE email = ? AND curso = ? AND estado = 'pending' AND token <> ?");
            $close->execute([strtolower(trim((string)$d['email'])), $d['curso'], $token]);

            return $token;
        } catch (PDOException $e) {
            ca_log('registrar_carrito ERROR: ' . $e->getMessage());
            return null;
        }
    }
}

if (!function_exists('ca_marcar_recuperado')) {
    /**
     * Marca el carrito como 'recovered' al confirmarse el pago.
     * Puede llamarse por (curso,id_venta) o por session_id o por email.
     */
    function ca_marcar_recuperado(PDO $cnx, array $filtros): void {
        try {
            $wh = [];
            $args = [];
            if (!empty($filtros['curso']) && !empty($filtros['id_venta'])) {
                $wh[] = '(curso = ? AND id_venta = ?)';
                $args[] = $filtros['curso'];
                $args[] = $filtros['id_venta'];
            }
            if (!empty($filtros['stripe_session_id'])) {
                $wh[] = 'stripe_session_id = ?';
                $args[] = $filtros['stripe_session_id'];
            }
            if (empty($wh)) return;

            $sql = "UPDATE carritos_abandonados
                    SET estado = 'recovered', recovered_at = NOW()
                    WHERE estado IN ('pending','failed') AND (" . implode(' OR ', $wh) . ")";
            $stmt = $cnx->prepare($sql);
            $stmt->execute($args);
        } catch (PDOException $e) {
            ca_log('marcar_recuperado ERROR: ' . $e->getMessage());
        }
    }
}

if (!function_exists('ca_recovery_url')) {
    function ca_recovery_url(array $cart): string {
        $host = $cart['dominio'] ?: ($_SERVER['HTTP_HOST'] ?? 'aprende-excel.com');
        return 'https://' . $host . '/recuperar_carrito.php?t=' . urlencode($cart['token']);
    }
}

/* ──────────────────────────────────────────────────────────────────────────
   Envío Resend
   ────────────────────────────────────────────────────────────────────────── */

if (!function_exists('ca_send_resend')) {
    function ca_send_resend(string $to, string $subject, string $html, string $replyTo = ''): array {
        $key = ca_resend_key();
        if ($key === '') {
            return ['ok' => false, 'code' => 0, 'error' => 'RESEND_API_KEY no configurado'];
        }
        $payload = [
            'from'    => ca_from_address(),
            'to'      => [$to],
            'subject' => $subject,
            'html'    => $html,
        ];
        if ($replyTo !== '') {
            $payload['reply_to'] = $replyTo;
        }
        $ch = curl_init('https://api.resend.com/emails');
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($payload, JSON_UNESCAPED_UNICODE),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 15,
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $key,
            ],
        ]);
        $resp = curl_exec($ch);
        $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err  = curl_error($ch);
        curl_close($ch);

        if ($code >= 200 && $code < 300) {
            return ['ok' => true, 'code' => $code];
        }
        return ['ok' => false, 'code' => $code, 'error' => $err ?: (string)$resp];
    }
}

/* ──────────────────────────────────────────────────────────────────────────
   Templates por paso (1..4)
   Tono deliberadamente distinto en cada uno.
   ────────────────────────────────────────────────────────────────────────── */

if (!function_exists('ca_nombre_corto')) {
    function ca_nombre_corto(array $cart): string {
        $n = trim((string)$cart['nombre']);
        if ($n === '') return '';
        // Primer token para mantenerlo cercano
        $parts = preg_split('/\s+/', $n);
        return $parts[0] ?? $n;
    }
}

if (!function_exists('ca_titulo_curso')) {
    function ca_titulo_curso(PDO $cnx, string $curso): string {
        try {
            $stmt = $cnx->prepare("SELECT TITULO FROM cursos_detalle WHERE CURSO = ? LIMIT 1");
            $stmt->execute([$curso]);
            $t = $stmt->fetchColumn();
            if (is_string($t) && $t !== '') return $t;
        } catch (PDOException $e) {}
        return 'tu curso';
    }
}

if (!function_exists('ca_wrap_layout')) {
    function ca_wrap_layout(string $inner, string $preheader = ''): string {
        $pre = htmlspecialchars($preheader, ENT_QUOTES, 'UTF-8');
        return '<!DOCTYPE html><html><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Aprende Excel</title></head>
<body style="margin:0;padding:0;background:#f6f7f9;font-family:Arial,Helvetica,sans-serif;color:#1f2937;">
<div style="display:none;max-height:0;overflow:hidden;opacity:0;color:transparent;">' . $pre . '</div>
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f6f7f9;padding:24px 0;">
<tr><td align="center">
  <table role="presentation" width="560" cellpadding="0" cellspacing="0" style="max-width:560px;background:#ffffff;border-radius:10px;padding:28px;">
  <tr><td style="text-align:center;padding-bottom:16px;">
    <img src="https://excel-facil.com/n-assets/img/logo-excel.png" alt="Aprende Excel" style="max-width:160px;height:auto;">
  </td></tr>
  <tr><td style="font-size:15px;line-height:1.55;color:#1f2937;">
    ' . $inner . '
  </td></tr>
  <tr><td style="padding-top:24px;border-top:1px solid #eee;margin-top:24px;font-size:12px;color:#9ca3af;text-align:center;">
    Si ya resolviste tu compra, ignorá este email.<br>
    Aprende Excel · aprende-excel.com
  </td></tr>
  </table>
</td></tr></table></body></html>';
    }
}

if (!function_exists('ca_btn')) {
    function ca_btn(string $url, string $label): string {
        return '<p style="text-align:center;margin:24px 0;">
  <a href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" style="background:#e6007e;color:#ffffff;text-decoration:none;font-weight:bold;padding:14px 28px;border-radius:6px;display:inline-block;font-size:15px;">' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</a>
</p>';
    }
}

/**
 * Devuelve [subject, html] para el paso $step (1..4).
 */
if (!function_exists('ca_build_email')) {
    function ca_build_email(int $step, array $cart, string $titulo, string $recoveryUrl): array {
        $nombre = ca_nombre_corto($cart);
        $saludo = $nombre !== '' ? 'Hola ' . htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') : 'Hola';
        $tituloEsc = htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8');

        switch ($step) {
            case 1:
                // Recordatorio inmediato, tono soporte
                $subject = '¿Te ayudo a finalizar la compra?';
                $pre = 'Vi que quedó pendiente tu inscripción — te dejo el link directo.';
                $inner =
                    '<p>' . $saludo . ',</p>' .
                    '<p>Soy del equipo de Aprende Excel. Vi que empezaste a inscribirte a <strong>' . $tituloEsc . '</strong> y quedó a mitad de camino.</p>' .
                    '<p>¿Tuviste algún problema con el pago? Si querés, retomás en un click:</p>' .
                    ca_btn($recoveryUrl, 'Retomar mi compra') .
                    '<p style="color:#6b7280;font-size:13px;">Si preferís pagar de otra forma o tenés alguna duda, respondé este mail y te ayudo.</p>';
                break;

            case 2:
                // Refuerzo suave
                $subject = 'Te guardé el lugar en ' . $titulo;
                $pre = 'Seguís a un click de acceder al curso.';
                $inner =
                    '<p>' . $saludo . ',</p>' .
                    '<p>Te dejo tu inscripción a <strong>' . $tituloEsc . '</strong> reservada para que la retomes cuando puedas.</p>' .
                    '<p>El link abre directo la pasarela con los datos que ya cargaste — no hace falta completar nada de nuevo.</p>' .
                    ca_btn($recoveryUrl, 'Finalizar mi inscripción') .
                    '<p style="color:#6b7280;font-size:13px;">Si algo no te cerró de la propuesta, contame y lo vemos.</p>';
                break;

            case 3:
                // Valor y objeciones
                $subject = 'Lo que te llevás con ' . $titulo;
                $pre = 'Acceso de por vida, certificado y soporte real.';
                $inner =
                    '<p>' . $saludo . ',</p>' .
                    '<p>Quería contarte rápido qué incluye <strong>' . $tituloEsc . '</strong> por si te quedó alguna duda:</p>' .
                    '<ul style="padding-left:18px;line-height:1.6;">' .
                    '<li>Acceso <strong>de por vida</strong> a todas las clases y actualizaciones.</li>' .
                    '<li><strong>Certificado</strong> al finalizar, avalado por Aprende Excel.</li>' .
                    '<li>Soporte por email con profesores reales (no bots).</li>' .
                    '<li>Garantía de satisfacción: si no te sirve, te devolvemos el dinero.</li>' .
                    '</ul>' .
                    '<p>Si ya te decidiste, retomás tu inscripción desde acá:</p>' .
                    ca_btn($recoveryUrl, 'Completar mi compra') .
                    '<p style="color:#6b7280;font-size:13px;">¿Tenés una duda puntual? Respondé este mail, lo leo yo.</p>';
                break;

            case 4:
            default:
                // Urgencia final
                $subject = 'Último aviso: tu inscripción a ' . $titulo . ' está por vencer';
                $pre = 'Liberamos el lugar si no confirmás la compra.';
                $inner =
                    '<p>' . $saludo . ',</p>' .
                    '<p>Este es el último recordatorio. Si no completás la inscripción en las próximas horas, <strong>liberamos tu lugar</strong> y se pierde el precio con el que iniciaste la compra.</p>' .
                    '<p>Si todavía querés sumarte a <strong>' . $tituloEsc . '</strong>, podés retomar desde acá:</p>' .
                    ca_btn($recoveryUrl, 'Reservar mi lugar ahora') .
                    '<p style="color:#6b7280;font-size:13px;">Si ya no te interesa, ignorá este mensaje y no te volvemos a escribir por esta inscripción.</p>';
                break;
        }
        return [$subject, ca_wrap_layout($inner, $pre)];
    }
}

/* ──────────────────────────────────────────────────────────────────────────
   Consulta segura: ¿la venta fue pagada?
   Evita enviar emails a quienes ya pagaron (si el webhook falló o llegó tarde).
   ────────────────────────────────────────────────────────────────────────── */

if (!function_exists('ca_venta_pagada')) {
    function ca_venta_pagada(PDO $cnx, string $curso, string $idVenta): bool {
        try {
            $stmt = $cnx->prepare("SELECT ESTADO_MP FROM ventas WHERE CURSO=? AND ID=? LIMIT 1");
            $stmt->execute([$curso, $idVenta]);
            $estado = (string) $stmt->fetchColumn();
            return $estado === 'approved';
        } catch (PDOException $e) {
            return false;
        }
    }
}
