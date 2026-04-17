# Sistema de recuperación de carrito abandonado

## Flujo

1. El usuario completa el formulario → `realizarVenta.php` crea la Stripe Checkout Session **y** registra el carrito en `carritos_abandonados` (estado `pending`).
2. Si el cliente paga → `IPN_stripe.php` (webhook de Stripe) marca el carrito como `recovered` → no se envía ningún email.
3. Si no paga, el cron `procesar.php` dispara la secuencia:
   - **Email 1** — 20 min: recordatorio inmediato, tono de soporte.
   - **Email 2** — 1 h: refuerzo suave ("te guardé el lugar").
   - **Email 3** — 24 h: valor y objeciones (beneficios del curso, garantía).
   - **Email 4** — 48 h: urgencia final.
   - **96 h** → estado `expired`.
4. Cada email lleva un CTA a `/recuperar_carrito.php?t=TOKEN`, que:
   - Redirige a la Checkout Session original si sigue open, o
   - Genera una nueva Session con los mismos datos (Stripe expira sesiones a las 24 h) y redirige.

## Anti-duplicados

- Cada `UPDATE ... SET email_N_sent_at = NOW() WHERE email_N_sent_at IS NULL` actúa como claim atómico (sólo un worker puede "ganar" cada paso).
- Antes de enviar, se verifica `ventas.ESTADO_MP = 'approved'` (por si el webhook llegó tarde o falló).
- Errores temporales (5xx / 429) liberan el claim para reintento; errores permanentes (4xx) quedan marcados con `last_error`.
- El evento `checkout.session.completed` es la fuente de verdad para cancelar la secuencia.

## Setup (una vez por entorno)

### 1. Crear la tabla

```bash
php public_html/n-libraries/carritos_abandonados/instalar.php
```

O por HTTP (con `INSTALL_TOKEN` seteado en env):

```
GET /n-libraries/carritos_abandonados/instalar.php?key=$INSTALL_TOKEN
```

### 2. Variables de entorno

| Variable              | Obligatoria | Descripción                                                                 |
|-----------------------|-------------|-----------------------------------------------------------------------------|
| `RESEND_API_KEY`      | sí          | Clave de API de Resend (ya usada en `reenviar_credenciales.php`).           |
| `CRON_TOKEN`          | sí (HTTP)   | Token para ejecutar `procesar.php` por HTTP.                                |
| `INSTALL_TOKEN`       | sí (HTTP)   | Token para `instalar.php` por HTTP.                                         |
| `CARRITO_FROM`        | opcional    | Remitente. Default: `Aprende Excel <onboarding@resend.dev>`.                |
| `CARRITO_REPLY_TO`    | opcional    | Reply-To. Default: `hola@aprende-excel.com`.                                |

### 3. Agendar el procesador cada 5 minutos

**Cron clásico:**

```
*/5 * * * * /usr/bin/php /app/public_html/n-libraries/carritos_abandonados/procesar.php >> /var/log/carritos.log 2>&1
```

**Railway / Vercel cron / servicio externo (HTTP):**

```
*/5 * * * * curl -fsS "https://aprende-excel.com/n-libraries/carritos_abandonados/procesar.php?key=$CRON_TOKEN"
```

## Archivos

- `schema.sql`       — tabla `carritos_abandonados`.
- `instalar.php`     — aplica el schema.
- `helpers.php`      — registro, marcado, templates, envío Resend.
- `procesar.php`     — cron: selecciona, claim atómico, envía, expira.
- `../../recuperar_carrito.php` — endpoint de los CTAs.

## Modificaciones a código existente

- `realizarVenta.php` — llama a `ca_registrar_carrito` después de crear la Stripe Session.
- `IPN_stripe.php`    — llama a `ca_marcar_recuperado` al confirmar el pago.

## Logs

- `public_html/log-carritos-abandonados.txt` — envíos y errores del procesador.
