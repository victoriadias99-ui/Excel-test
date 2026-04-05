<?php
/**
 * Página de Suscripción - Aprende Excel
 * Rediseño con dark theme — Pagos via Stripe
 */

$dirpage = '../';

// ===== PRECIOS Y URLs DE PAGO (Stripe Payment Links) =====

// Plan Profesional (Anual) — el más elegido
$precioProAnual    = 'USD $2.90';
$precioProAnualRef = 'USD $3.90'; // precio tachado (referencia sin descuento)
$descuentoPro      = '20% OFF';
$urlCheckoutPro    = 'https://buy.stripe.com/14k5nib7pdEL1zyfYY'; // Stripe: Anual

// Plan Inicial (Mensual)
$precioInicialMes   = 'USD $3.90';
$urlCheckoutInicial = 'https://buy.stripe.com/5kAg1W8ZhbwDgus145'; // Stripe: Mensual

// Estadísticas sociales
$alumnosMes = '527';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Acceso ilimitado a todos los cursos de Aprende Excel. Elige tu plan y empieza hoy.">
    <title>Planes y Precios — Aprende Excel</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700;900&display=swap" rel="stylesheet">

    <style>
        /* ===== RESET & BASE ===== */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg-dark:       #07091A;
            --bg-card:       #0D1230;
            --bg-card-hover: #121840;
            --border-pro:    #00C8FF;
            --border-ini:    #1A2050;
            --text-pro:      #00C8FF;
            --text-ini:      #C084FC;
            --green-cta:     #00D26A;
            --green-dark:    #00A855;
            --pink-cta:      #E040FB;
            --pink-dark:     #B300D6;
            --gold:          #FFD700;
            --white:         #FFFFFF;
            --gray:          #9AA3BF;
            --dot-color:     rgba(0,200,255,0.07);
        }

        body {
            background-color: var(--bg-dark);
            font-family: 'Raleway', sans-serif;
            color: var(--white);
            min-height: 100vh;
            /* fondo de puntos */
            background-image: radial-gradient(circle, var(--dot-color) 1px, transparent 1px);
            background-size: 28px 28px;
        }

        /* ===== GARANTÍA BANNER ===== */
        .garantia-banner {
            background: linear-gradient(90deg, #0A1540 0%, #101C55 100%);
            border: 1px solid rgba(0,200,255,0.25);
            border-radius: 12px;
            padding: 14px 24px;
            text-align: center;
            font-size: 0.95rem;
            color: #CBD5F5;
            max-width: 520px;
            margin: 0 auto 40px;
        }
        .garantia-banner strong { color: var(--white); }

        /* ===== SECCIÓN HERO ===== */
        .hero-section {
            padding: 60px 16px 16px;
            text-align: center;
        }
        .hero-logo {
            height: 60px;
            margin-bottom: 32px;
        }

        /* ===== GRID DE CARDS ===== */
        .plans-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            padding: 0 16px 60px;
            max-width: 900px;
            margin: 0 auto;
        }

        /* ===== CARD BASE ===== */
        .plan-card {
            background: var(--bg-card);
            border-radius: 20px;
            border: 1.5px solid var(--border-ini);
            padding: 32px 28px 28px;
            width: 380px;
            max-width: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .plan-card:hover {
            transform: translateY(-4px);
        }

        /* ===== CARD PROFESIONAL (destacada) ===== */
        .plan-card.pro {
            border-color: var(--border-pro);
            box-shadow: 0 0 40px rgba(0,200,255,0.18), inset 0 0 30px rgba(0,200,255,0.04);
        }

        /* Badges arriba de la card */
        .card-top-badges {
            display: flex;
            justify-content: space-between;
            margin-bottom: 18px;
        }
        .badge-off {
            background: var(--green-cta);
            color: #000;
            font-weight: 900;
            font-size: 0.72rem;
            padding: 4px 10px;
            border-radius: 6px;
            letter-spacing: 0.5px;
        }
        .badge-elegido {
            background: linear-gradient(90deg, #00C8FF, #0078FF);
            color: #000;
            font-weight: 800;
            font-size: 0.72rem;
            padding: 4px 10px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Nombre del plan */
        .plan-name {
            font-size: 1.45rem;
            font-weight: 900;
            margin-bottom: 10px;
            letter-spacing: 0.3px;
        }
        .plan-name.pro { color: var(--text-pro); }
        .plan-name.ini { color: var(--text-ini); }

        .plan-subtitle {
            font-size: 0.82rem;
            color: var(--gray);
            line-height: 1.5;
            margin-bottom: 18px;
        }

        /* Precio */
        .plan-price-block { margin-bottom: 22px; }
        .plan-price-old {
            font-size: 0.9rem;
            color: var(--gray);
            text-decoration: line-through;
            margin-bottom: 2px;
        }
        .plan-price-main {
            font-size: 2.5rem;
            font-weight: 900;
            line-height: 1;
        }
        .plan-price-main.pro { color: var(--white); }
        .plan-price-main.ini { color: var(--white); }
        .plan-price-period {
            font-size: 0.8rem;
            color: var(--gray);
            margin-top: 4px;
        }

        /* Separador */
        .plan-divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.07);
            margin: 18px 0;
        }

        /* Features list */
        .features-list {
            list-style: none;
            padding: 0;
            margin-bottom: 24px;
            flex: 1;
        }
        .features-list li {
            font-size: 0.88rem;
            color: #CBD5F5;
            padding: 6px 0;
            display: flex;
            align-items: flex-start;
            gap: 9px;
            line-height: 1.4;
        }
        .features-list li .icon-check {
            color: var(--green-cta);
            font-size: 0.85rem;
            margin-top: 2px;
            flex-shrink: 0;
        }
        .features-list li .icon-lock {
            color: #4A5075;
            font-size: 0.85rem;
            margin-top: 2px;
            flex-shrink: 0;
        }
        .features-list li.locked { color: #4A5075; }

        /* Botones CTA */
        .btn-cta {
            display: block;
            width: 100%;
            padding: 14px;
            border-radius: 10px;
            font-weight: 800;
            font-size: 1rem;
            text-align: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: opacity 0.2s ease, transform 0.15s ease;
            margin-bottom: 10px;
        }
        .btn-cta:hover { opacity: 0.88; transform: scale(0.99); }

        .btn-cta.pro {
            background: linear-gradient(135deg, var(--green-cta), var(--green-dark));
            color: #000;
            box-shadow: 0 4px 18px rgba(0,210,106,0.35);
        }
        .btn-cta.ini {
            background: linear-gradient(135deg, var(--pink-cta), var(--pink-dark));
            color: #fff;
            box-shadow: 0 4px 18px rgba(176,0,210,0.35);
        }

        /* Countdown timer */
        .countdown-wrap {
            text-align: center;
            font-size: 0.8rem;
            color: var(--gray);
            margin-bottom: 12px;
        }
        .countdown-timer {
            font-weight: 700;
            color: var(--white);
            font-size: 0.92rem;
            letter-spacing: 1px;
        }

        /* Social proof dentro de card */
        .card-social-proof {
            text-align: center;
            font-size: 0.76rem;
            color: var(--gray);
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .card-social-proof .dot-green {
            display: inline-block;
            width: 7px;
            height: 7px;
            background: var(--green-cta);
            border-radius: 50%;
            animation: pulse 1.8s infinite;
        }

        /* Texto "cancelar cuando quieras" */
        .cancel-text {
            text-align: center;
            font-size: 0.72rem;
            color: #4A5075;
            margin-top: 4px;
            text-decoration: underline;
            cursor: default;
        }

        /* ===== POPUP COMPRA RECIENTE ===== */
        .recent-purchase {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: #141A40;
            border: 1px solid rgba(0,200,255,0.25);
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.78rem;
            max-width: 240px;
            z-index: 999;
            animation: slideIn 0.5s ease forwards;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .recent-purchase .rp-label {
            font-size: 0.65rem;
            color: var(--green-cta);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .recent-purchase .rp-close {
            position: absolute;
            top: 8px; right: 10px;
            background: none; border: none;
            color: var(--gray); cursor: pointer;
            font-size: 0.8rem;
        }

        /* ===== SECCIÓN TESTIMONIOS ===== */
        .testimonials-section {
            padding: 60px 16px;
            text-align: center;
        }
        .testimonials-section h2 {
            font-size: 1.6rem;
            font-weight: 900;
            color: var(--white);
            margin-bottom: 8px;
        }
        .testimonials-section .sub {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 40px;
        }
        .testimonials-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            max-width: 900px;
            margin: 0 auto;
        }
        .testimonial-card {
            background: var(--bg-card);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 16px;
            padding: 24px;
            width: 270px;
            max-width: 100%;
            text-align: left;
        }
        .testimonial-card .stars {
            color: var(--gold);
            font-size: 0.85rem;
            margin-bottom: 10px;
        }
        .testimonial-card p {
            font-size: 0.85rem;
            color: #CBD5F5;
            line-height: 1.55;
            margin-bottom: 14px;
        }
        .testimonial-card .author {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--white);
        }
        .testimonial-card .role {
            font-size: 0.72rem;
            color: var(--gray);
        }

        /* ===== FOOTER MINIMALISTA ===== */
        .page-footer {
            text-align: center;
            padding: 30px 16px 40px;
            font-size: 0.75rem;
            color: #3A4060;
            border-top: 1px solid rgba(255,255,255,0.05);
        }
        .page-footer a { color: #3A4060; text-decoration: underline; }

        /* ===== ANIMACIONES ===== */
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: 0.5; transform: scale(1.3); }
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 600px) {
            .plans-grid { gap: 16px; }
            .plan-card  { width: 100%; padding: 24px 18px; }
            .plan-price-main { font-size: 2rem; }
            .recent-purchase { display: none; }
        }
    </style>
</head>
<body>

<!-- ===== HERO ===== -->
<section class="hero-section">
    <!-- Logo del proyecto -->
    <img
        src="../a-img/logo.png"
        alt="Aprende Excel"
        class="hero-logo"
        onerror="this.style.display='none'"
    >

    <!-- Garantía -->
    <div class="garantia-banner">
        🛡️ <strong>Suscríbete sin riesgos:</strong>
        Te devolvemos tu pago al 100% si no estás conforme con tu compra en los primeros 7 días.
    </div>
</section>

<!-- ===== CARDS DE PLANES ===== -->
<div class="plans-grid">

    <!-- ======================== PLAN PROFESIONAL ======================== -->
    <div class="plan-card pro">

        <!-- Badges -->
        <div class="card-top-badges">
            <span class="badge-off"><?= $descuentoPro ?></span>
            <span class="badge-elegido">⚡ MÁS ELEGIDO</span>
        </div>

        <!-- Nombre -->
        <div class="plan-name pro">PLAN PROFESIONAL 🚀</div>

        <!-- Subtítulo -->
        <p class="plan-subtitle">
            Obtén 20% DE AHORRO + Conviértete en Profesional Certificado.<br>
            <strong style="color:var(--green-cta);">2 MESES GRATIS ⚡</strong>
        </p>

        <!-- Precio -->
        <div class="plan-price-block">
            <div class="plan-price-old"><?= $precioProAnualRef ?></div>
            <div class="plan-price-main pro">
                <?= $precioProAnual ?>
                <span style="font-size:0.9rem;font-weight:600;color:var(--gray);"> x/mes</span>
            </div>
            <div class="plan-price-period">(Cobrado anualmente)</div>
        </div>

        <hr class="plan-divider">

        <!-- Features -->
        <ul class="features-list">
            <li>
                <i class="fas fa-check icon-check"></i>
                Acceso ilimitado a todos los cursos y actualizaciones
            </li>
            <li>
                <i class="fas fa-check icon-check"></i>
                100% online a tu ritmo
            </li>
            <li>
                <i class="fas fa-check icon-check"></i>
                Comunidad de alumnos
            </li>
            <li>
                <i class="fas fa-check icon-check"></i>
                🏆 Certificado Oficial para validar tus conocimientos
            </li>
            <li>
                <i class="fas fa-check icon-check"></i>
                👨‍🏫 Acceso a profesores expertos y soporte prioritario
            </li>
            <li>
                <i class="fas fa-check icon-check"></i>
                🔥 Prioridad en Nuevos Lanzamientos
            </li>
            <li>
                <i class="fas fa-check icon-check"></i>
                🤖 Asistente IA 24/7 para resolver tus dudas
            </li>
        </ul>

        <!-- Countdown -->
        <div class="countdown-wrap">
            Oferta termina en: <span class="countdown-timer" id="countdown">0h 0m 0s</span>
        </div>

        <!-- CTA -->
        <a href="<?= $urlCheckoutPro ?>" class="btn-cta pro">
            🔥 Aprovechar Oferta
        </a>

        <!-- Social proof -->
        <div class="card-social-proof">
            <span class="dot-green"></span>
            +<?= $alumnosMes ?> alumnos certificados este mes
        </div>
    </div>

    <!-- ======================== PLAN INICIAL ======================== -->
    <div class="plan-card ini">

        <!-- Espacio alineado con los badges del plan pro -->
        <div style="height:28px; margin-bottom:18px;"></div>

        <!-- Nombre -->
        <div class="plan-name ini">Plan Inicial</div>

        <!-- Subtítulo -->
        <p class="plan-subtitle">Acceso ilimitado a todos los cursos</p>

        <!-- Precio -->
        <div class="plan-price-block">
            <div class="plan-price-main ini"><?= $precioInicialMes ?></div>
            <div class="plan-price-period">Mensual</div>
        </div>

        <hr class="plan-divider">

        <!-- Features -->
        <ul class="features-list">
            <li>
                <i class="fas fa-check icon-check"></i>
                Acceso ilimitado a todos los cursos mensualmente
            </li>
            <li>
                <i class="fas fa-check icon-check"></i>
                100% online a tu ritmo
            </li>
            <li>
                <i class="fas fa-check icon-check"></i>
                Soporte 24/7
            </li>
            <li>
                <i class="fas fa-check icon-check"></i>
                Comunidad de alumnos
            </li>
            <li class="locked">
                <i class="fas fa-lock icon-lock"></i>
                Certificado Oficial para validar tus conocimientos
            </li>
            <li class="locked">
                <i class="fas fa-lock icon-lock"></i>
                Acceso a profesores expertos y soporte prioritario
            </li>
            <li class="locked">
                <i class="fas fa-lock icon-lock"></i>
                Prioridad en Nuevos Lanzamientos
            </li>
        </ul>

        <!-- Spacer para alinear CTA con la card pro -->
        <div style="height:40px;"></div>

        <!-- CTA -->
        <a href="<?= $urlCheckoutInicial ?>" class="btn-cta ini">
            🚀 Suscribirme ahora
        </a>

        <div class="cancel-text">Cancela cuando quieras</div>
    </div>

</div>

<!-- ===== TESTIMONIOS ===== -->
<section class="testimonials-section">
    <h2>LO QUE DICEN NUESTROS CLIENTES</h2>
    <p class="sub">Más de 25.000 alumnos ya transformaron su carrera</p>

    <div class="testimonials-grid">

        <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p>"Gracias a Aprende Excel conseguí un ascenso en mi empresa. El contenido es increíble y los profesores responden al instante."</p>
            <div class="author">María G.</div>
            <div class="role">Analista Financiera · Buenos Aires</div>
        </div>

        <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p>"En 3 meses aprendí más que en 2 años de universidad. El certificado me abrió puertas que nunca imaginé."</p>
            <div class="author">Carlos R.</div>
            <div class="role">Contador · Córdoba</div>
        </div>

        <div class="testimonial-card">
            <div class="stars">★★★★★</div>
            <p>"La plataforma es intuitiva, los cursos están muy bien estructurados y el soporte 24/7 es real. Recomendado 100%."</p>
            <div class="author">Lucía M.</div>
            <div class="role">Administradora · Rosario</div>
        </div>

    </div>
</section>

<!-- ===== FOOTER ===== -->
<footer class="page-footer">
    <p>
        © <?= date('Y') ?> Aprende Excel ·
        <a href="#">Términos y condiciones</a> ·
        <a href="#">Política de privacidad</a>
    </p>
    <p style="margin-top:6px;">Pagos procesados de forma segura.</p>
</footer>

<!-- ===== POPUP COMPRA RECIENTE ===== -->
<div class="recent-purchase" id="recentPurchase">
    <button class="rp-close" onclick="document.getElementById('recentPurchase').style.display='none'">✕</button>
    <span class="rp-label">🟢 Compra Reciente</span>
    <span id="rp-name" style="color:var(--white);font-weight:600;font-size:0.82rem;">Alguien</span>
    <span style="color:var(--gray);">acaba de comprar el <strong style="color:var(--white);">Plan Profesional</strong></span>
</div>

<!-- ===== SCRIPTS ===== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// ──── COUNTDOWN TIMER ────
(function() {
    // Duración de la oferta: 24 horas desde que carga la página
    var end = new Date().getTime() + (24 * 60 * 60 * 1000);

    function updateCountdown() {
        var now  = new Date().getTime();
        var diff = end - now;
        if (diff <= 0) {
            document.getElementById('countdown').textContent = '¡Oferta expirada!';
            return;
        }
        var h = Math.floor(diff / (1000 * 60 * 60));
        var m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        var s = Math.floor((diff % (1000 * 60)) / 1000);
        document.getElementById('countdown').textContent =
            (h < 10 ? '0' : '') + h + 'h ' +
            (m < 10 ? '0' : '') + m + 'm ' +
            (s < 10 ? '0' : '') + s + 's';
    }
    updateCountdown();
    setInterval(updateCountdown, 1000);
})();

// ──── POPUP COMPRA RECIENTE ────
(function() {
    var names = [
        'Miguel R.', 'Sofía L.', 'Andrés P.', 'Valentina C.',
        'Juan M.', 'Carolina B.', 'Diego F.', 'Paula S.',
        'Tomás G.', 'Laura V.'
    ];

    function showPopup() {
        var name = names[Math.floor(Math.random() * names.length)];
        document.getElementById('rp-name').textContent = name;
        var el = document.getElementById('recentPurchase');
        el.style.display = 'flex';
        el.style.animation = 'none';
        void el.offsetWidth;
        el.style.animation = 'slideIn 0.5s ease forwards';

        // Ocultar después de 5 s
        setTimeout(function() {
            el.style.opacity = '0';
            el.style.transition = 'opacity 0.4s';
            setTimeout(function() {
                el.style.display = 'none';
                el.style.opacity = '1';
                el.style.transition = '';
            }, 400);
        }, 5000);
    }

    // Mostrar la primera vez a los 3 s, luego cada 25 s
    setTimeout(function() {
        showPopup();
        setInterval(showPopup, 25000);
    }, 3000);
})();
</script>

</body>
</html>
