<?php
/**
 * Página de Suscripción - Aprende Excel
 * Colores y estilo consistentes con el sitio principal
 */

$dirpage = '../';

// ===== PRECIOS Y URLs DE PAGO (Stripe Payment Links) =====

// Plan Profesional (Anual) — el más elegido
$precioProAnual    = 'USD $2.90';
$precioProAnualRef = 'USD $3.90';
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

    <!-- Bootstrap 4 (consistente con el resto del sitio) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Fonts: Raleway (igual que el sitio) -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700;900&display=swap" rel="stylesheet">

    <style>
        /* ===== VARIABLES — paleta del sitio ===== */
        :root {
            --navy:        #00173B;
            --green:       #007A6A;
            --green-dark:  #005c50;
            --green-check: #008B69;
            --gold:        #F7AC3B;
            --bg:          #f5f7fa;
            --card-bg:     #ffffff;
            --border:      #e0e6ed;
            --text:        #333333;
            --text-muted:  #6c757d;
            --white:       #ffffff;
        }

        * { box-sizing: border-box; }

        body {
            background-color: var(--bg);
            font-family: 'Raleway', sans-serif;
            color: var(--text);
        }

        /* ===== NAV / LOGO ===== */
        .page-header {
            background: var(--green);
            padding: 16px 32px;
            display: flex;
            align-items: center;
        }
        .page-header img {
            height: 48px;
        }

        /* ===== HERO ===== */
        .hero {
            background: var(--navy);
            color: var(--white);
            text-align: center;
            padding: 52px 16px 40px;
        }
        .hero h1 {
            font-family: 'Raleway', sans-serif;
            font-weight: 900;
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .hero p {
            font-size: 1rem;
            opacity: 0.85;
            margin-bottom: 0;
        }

        /* ===== GARANTÍA ===== */
        .garantia-bar {
            background: #e8f5f3;
            border-bottom: 2px solid var(--green);
            padding: 12px 24px;
            text-align: center;
            font-size: 0.9rem;
            color: var(--navy);
        }
        .garantia-bar i {
            color: var(--green);
            margin-right: 6px;
        }

        /* ===== PLANS GRID ===== */
        .plans-section {
            padding: 48px 16px 60px;
        }
        .plans-grid {
            display: flex;
            justify-content: center;
            gap: 24px;
            flex-wrap: wrap;
            max-width: 860px;
            margin: 0 auto;
        }

        /* ===== CARD ===== */
        .plan-card {
            background: var(--card-bg);
            border: 2px solid var(--border);
            border-radius: 16px;
            padding: 32px 28px 28px;
            width: 370px;
            max-width: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
            transition: box-shadow 0.25s ease, transform 0.25s ease;
        }
        .plan-card:hover {
            box-shadow: 0 8px 32px rgba(0,23,59,0.12);
            transform: translateY(-3px);
        }

        /* Plan destacado */
        .plan-card.pro {
            border-color: var(--green);
            box-shadow: 0 4px 24px rgba(0,122,106,0.15);
        }

        /* ===== BADGES ===== */
        .badges-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            min-height: 26px;
        }
        .badge-off {
            background: var(--green);
            color: var(--white);
            font-weight: 800;
            font-size: 0.72rem;
            padding: 4px 10px;
            border-radius: 20px;
            letter-spacing: 0.4px;
        }
        .badge-elegido {
            background: var(--gold);
            color: var(--navy);
            font-weight: 800;
            font-size: 0.72rem;
            padding: 4px 10px;
            border-radius: 20px;
        }

        /* ===== NOMBRE ===== */
        .plan-name {
            font-weight: 900;
            font-size: 1.4rem;
            color: var(--navy);
            margin-bottom: 6px;
        }
        .plan-name.pro { color: var(--green); }

        .plan-subtitle {
            font-size: 0.84rem;
            color: var(--text-muted);
            line-height: 1.5;
            margin-bottom: 20px;
        }
        .plan-subtitle strong { color: var(--navy); }

        /* ===== PRECIO ===== */
        .price-block { margin-bottom: 22px; }
        .price-old {
            font-size: 0.9rem;
            color: var(--text-muted);
            text-decoration: line-through;
            margin-bottom: 2px;
        }
        .price-main {
            font-weight: 900;
            font-size: 2.6rem;
            color: var(--navy);
            line-height: 1;
        }
        .price-per {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-muted);
        }
        .price-period {
            font-size: 0.78rem;
            color: var(--text-muted);
            margin-top: 4px;
        }

        /* ===== DIVIDER ===== */
        .plan-divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 18px 0;
        }

        /* ===== FEATURES ===== */
        .features-list {
            list-style: none;
            padding: 0;
            margin-bottom: 24px;
            flex: 1;
        }
        .features-list li {
            font-size: 0.88rem;
            color: var(--text);
            padding: 6px 0;
            display: flex;
            align-items: flex-start;
            gap: 9px;
            line-height: 1.45;
        }
        .features-list li .fa-check {
            color: var(--green-check);
            margin-top: 3px;
            flex-shrink: 0;
        }
        .features-list li .fa-lock {
            color: #c8d0da;
            margin-top: 3px;
            flex-shrink: 0;
        }
        .features-list li.locked {
            color: #c8d0da;
        }

        /* ===== BOTONES ===== */
        .btn-cta {
            display: block;
            width: 100%;
            padding: 14px;
            border-radius: 8px;
            font-weight: 800;
            font-size: 1rem;
            text-align: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.15s ease;
            margin-bottom: 10px;
        }
        .btn-cta:hover { transform: scale(0.99); text-decoration: none; }

        .btn-cta.pro {
            background: var(--green);
            color: var(--white);
        }
        .btn-cta.pro:hover { background: var(--green-dark); color: var(--white); }

        .btn-cta.ini {
            background: var(--white);
            color: var(--green);
            border: 2px solid var(--green);
        }
        .btn-cta.ini:hover { background: #e8f5f3; color: var(--green); }

        /* ===== COUNTDOWN ===== */
        .countdown-wrap {
            text-align: center;
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-bottom: 12px;
        }
        .countdown-timer {
            font-weight: 700;
            color: var(--navy);
        }

        /* ===== SOCIAL PROOF ===== */
        .card-social {
            text-align: center;
            font-size: 0.76rem;
            color: var(--text-muted);
            margin-top: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }
        .dot-green {
            display: inline-block;
            width: 7px; height: 7px;
            background: var(--green);
            border-radius: 50%;
            animation: pulse 1.8s infinite;
        }
        .cancel-text {
            text-align: center;
            font-size: 0.72rem;
            color: #c8d0da;
            margin-top: 6px;
        }

        /* ===== TESTIMONIOS ===== */
        .testimonials-section {
            background: var(--white);
            padding: 56px 16px;
            text-align: center;
        }
        .testimonials-section h2 {
            font-weight: 900;
            font-size: 1.6rem;
            color: var(--navy);
            margin-bottom: 6px;
        }
        .testimonials-section .sub {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 36px;
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
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 24px;
            width: 265px;
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
            color: var(--text-muted);
            line-height: 1.55;
            margin-bottom: 14px;
        }
        .testimonial-card .author {
            font-weight: 700;
            color: var(--navy);
            font-size: 0.85rem;
        }
        .testimonial-card .role {
            font-size: 0.75rem;
            color: var(--text-muted);
        }

        /* ===== POPUP COMPRA RECIENTE ===== */
        .recent-purchase {
            position: fixed;
            bottom: 24px; right: 24px;
            background: var(--white);
            border: 1.5px solid var(--green);
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.78rem;
            max-width: 240px;
            z-index: 999;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            animation: slideIn 0.5s ease forwards;
            flex-direction: column;
            gap: 4px;
            display: none;
        }
        .recent-purchase .rp-label {
            font-size: 0.65rem;
            color: var(--green);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .recent-purchase .rp-name {
            font-weight: 700;
            color: var(--navy);
        }
        .recent-purchase .rp-close {
            position: absolute;
            top: 8px; right: 10px;
            background: none; border: none;
            color: var(--text-muted); cursor: pointer;
            font-size: 0.8rem;
        }

        /* ===== FOOTER ===== */
        .page-footer {
            background: var(--navy);
            color: rgba(255,255,255,0.5);
            text-align: center;
            padding: 28px 16px;
            font-size: 0.78rem;
        }
        .page-footer a { color: rgba(255,255,255,0.5); text-decoration: underline; }

        /* ===== ANIMACIONES ===== */
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: 0.5; transform: scale(1.4); }
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 600px) {
            .hero h1 { font-size: 1.5rem; }
            .plan-card { width: 100%; padding: 24px 18px; }
            .price-main { font-size: 2rem; }
            .recent-purchase { display: none !important; }
        }
    </style>
</head>
<body>

<!-- ===== HEADER ===== -->
<div class="page-header">
    <a href="../">
        <img
            src="../n-assets/img/logo-excel.png"
            alt="Aprende Excel"
            onerror="this.src='../a-img/logojpg.jpg'"
        >
    </a>
</div>

<!-- ===== HERO ===== -->
<div class="hero">
    <h1>Acceso ilimitado a todos los cursos</h1>
    <p>Elegí el plan que mejor se adapta a vos y empezá hoy</p>
</div>

<!-- ===== GARANTÍA ===== -->
<div class="garantia-bar">
    <i class="fas fa-shield-alt"></i>
    <strong>Suscríbete sin riesgos:</strong>
    Te devolvemos el 100% de tu pago si no estás conforme en los primeros 7 días.
</div>

<!-- ===== PLANES ===== -->
<section class="plans-section">
    <div class="plans-grid">

        <!-- ===== PLAN PROFESIONAL ===== -->
        <div class="plan-card pro">

            <div class="badges-row">
                <span class="badge-off"><?= $descuentoPro ?></span>
                <span class="badge-elegido">⭐ MÁS ELEGIDO</span>
            </div>

            <div class="plan-name pro">Plan Profesional</div>

            <p class="plan-subtitle">
                Obtén 20% de ahorro + Conviértete en Profesional Certificado.<br>
                <strong>2 meses gratis incluidos.</strong>
            </p>

            <div class="price-block">
                <div class="price-old"><?= $precioProAnualRef ?></div>
                <div>
                    <span class="price-main"><?= $precioProAnual ?></span>
                    <span class="price-per"> x/mes</span>
                </div>
                <div class="price-period">Cobrado anualmente</div>
            </div>

            <hr class="plan-divider">

            <ul class="features-list">
                <li><i class="fas fa-check"></i> Acceso ilimitado a todos los cursos y actualizaciones</li>
                <li><i class="fas fa-check"></i> 100% online a tu ritmo</li>
                <li><i class="fas fa-check"></i> Comunidad de alumnos</li>
                <li><i class="fas fa-check"></i> Certificado Oficial para validar tus conocimientos</li>
                <li><i class="fas fa-check"></i> Acceso a profesores expertos y soporte prioritario</li>
                <li><i class="fas fa-check"></i> Prioridad en nuevos lanzamientos</li>
                <li><i class="fas fa-check"></i> Asistente IA 24/7 para resolver tus dudas</li>
            </ul>

            <div class="countdown-wrap">
                Oferta termina en: <span class="countdown-timer" id="countdown">24h 00m 00s</span>
            </div>

            <a href="<?= $urlCheckoutPro ?>" class="btn-cta pro">
                <i class="fas fa-bolt"></i>&nbsp; Aprovechar Oferta
            </a>

            <div class="card-social">
                <span class="dot-green"></span>
                +<?= $alumnosMes ?> alumnos certificados este mes
            </div>
        </div>

        <!-- ===== PLAN INICIAL ===== -->
        <div class="plan-card ini">

            <div class="badges-row"></div>

            <div class="plan-name">Plan Inicial</div>

            <p class="plan-subtitle">Acceso ilimitado a todos los cursos, mes a mes.</p>

            <div class="price-block">
                <div style="height:22px;"></div><!-- alineado con precio tachado del pro -->
                <div>
                    <span class="price-main"><?= $precioInicialMes ?></span>
                </div>
                <div class="price-period">Mensual</div>
            </div>

            <hr class="plan-divider">

            <ul class="features-list">
                <li><i class="fas fa-check"></i> Acceso ilimitado a todos los cursos mensualmente</li>
                <li><i class="fas fa-check"></i> 100% online a tu ritmo</li>
                <li><i class="fas fa-check"></i> Soporte 24/7</li>
                <li><i class="fas fa-check"></i> Comunidad de alumnos</li>
                <li class="locked"><i class="fas fa-lock"></i> Certificado Oficial</li>
                <li class="locked"><i class="fas fa-lock"></i> Profesores expertos y soporte prioritario</li>
                <li class="locked"><i class="fas fa-lock"></i> Prioridad en nuevos lanzamientos</li>
            </ul>

            <div style="height:40px;"></div>

            <a href="<?= $urlCheckoutInicial ?>" class="btn-cta ini">
                Suscribirme ahora
            </a>

            <div class="cancel-text">Cancelá cuando quieras</div>
        </div>

    </div>
</section>

<!-- ===== TESTIMONIOS ===== -->
<section class="testimonials-section">
    <h2>Lo que dicen nuestros alumnos</h2>
    <p class="sub">Más de 25.000 estudiantes ya transformaron su carrera</p>

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
    © <?= date('Y') ?> Aprende Excel &nbsp;·&nbsp;
    <a href="../terminos.php">Términos y condiciones</a> &nbsp;·&nbsp;
    <a href="#">Política de privacidad</a>
</footer>

<!-- ===== POPUP COMPRA RECIENTE ===== -->
<div class="recent-purchase" id="recentPurchase">
    <button class="rp-close" onclick="document.getElementById('recentPurchase').style.display='none'">✕</button>
    <span class="rp-label">🟢 Compra Reciente</span>
    <span class="rp-name" id="rp-name">Alguien</span>
    <span style="color:var(--text-muted);">acaba de suscribirse al <strong style="color:var(--navy);">Plan Profesional</strong></span>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
// ── COUNTDOWN ──
(function () {
    var end = new Date().getTime() + 24 * 60 * 60 * 1000;
    function tick() {
        var diff = end - new Date().getTime();
        if (diff <= 0) { document.getElementById('countdown').textContent = '¡Oferta finalizada!'; return; }
        var h = Math.floor(diff / 3600000);
        var m = Math.floor((diff % 3600000) / 60000);
        var s = Math.floor((diff % 60000) / 1000);
        document.getElementById('countdown').textContent =
            (h < 10 ? '0' : '') + h + 'h ' +
            (m < 10 ? '0' : '') + m + 'm ' +
            (s < 10 ? '0' : '') + s + 's';
    }
    tick(); setInterval(tick, 1000);
})();

// ── POPUP COMPRA RECIENTE ──
(function () {
    var names = ['Miguel R.','Sofía L.','Andrés P.','Valentina C.','Juan M.','Carolina B.','Diego F.','Paula S.','Tomás G.','Laura V.'];
    function show() {
        var el = document.getElementById('recentPurchase');
        document.getElementById('rp-name').textContent = names[Math.floor(Math.random() * names.length)];
        el.style.display = 'flex';
        el.style.animation = 'none';
        void el.offsetWidth;
        el.style.animation = 'slideIn 0.5s ease forwards';
        setTimeout(function () {
            el.style.opacity = '0'; el.style.transition = 'opacity 0.4s';
            setTimeout(function () { el.style.display = 'none'; el.style.opacity = '1'; el.style.transition = ''; }, 400);
        }, 5000);
    }
    setTimeout(function () { show(); setInterval(show, 25000); }, 3000);
})();
</script>
</body>
</html>
