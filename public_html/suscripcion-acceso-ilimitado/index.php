<?php
/**
 * Página de Suscripción - Aprende Excel
 * Layout idéntico a la referencia — colores del sitio — fondo claro
 */
$dirpage = '../';

$urlCheckoutPro     = 'https://buy.stripe.com/14k5nib7pdEL1zyfYY';
$urlCheckoutInicial = 'https://buy.stripe.com/5kAg1W8ZhbwDgus145';

$precioProMes     = 'USD $2.90';
$precioProRef     = 'USD $3.90';
$precioInicialMes = 'USD $3.90';
$alumnosMes       = '527';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes — Aprende Excel</title>
    <!-- Bootstrap 4 + estilos del sitio (igual que el resto de páginas) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="../n-assets/css/Raleway.css">
    <link rel="stylesheet" href="../n-assets/css/Raleway Bold.css">
    <link rel="stylesheet" href="../n-assets/css/Raleway Black.css">
    <link rel="stylesheet" href="../n-assets/css/Raleway SemiBold.css">
    <link rel="stylesheet" href="../n-assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../n-assets/css/style.css">
    <link rel="stylesheet" href="../n-css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        :root {
            --green:       #007A6A;
            --green-dark:  #005c50;
            --green-light: #e6f4f2;
            --green-glow:  rgba(0,122,106,0.18);
            --navy:        #00173B;
            --gold:        #F7AC3B;
            --gold-bg:     #fff8ec;
            --bg:          #f0f4f8;
            --card:        #ffffff;
            --border:      #dde4ed;
            --border-pro:  #007A6A;
            --text:        #00173B;
            --muted:       #6c7a8d;
            --dot:         rgba(0,122,106,0.08);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Raleway', sans-serif;
            background-color: var(--bg);
            background-image: radial-gradient(circle, var(--dot) 1.2px, transparent 1.2px);
            background-size: 26px 26px;
            color: var(--text);
            min-height: 100vh;
        }

        /* ── HEADER — override height del n-css/style.css para que no ocupe 700px ── */
        header { height: auto !important; }
        #image-header-min { display: none !important; }
        header .row { display: none !important; } /* oculta el hero de la home */

        /* ── GARANTÍA ── */
        .garantia-wrap {
            padding: 32px 16px 0;
            display: flex;
            justify-content: center;
        }
        .garantia {
            background: #fff;
            border: 1.5px solid var(--green);
            border-radius: 12px;
            padding: 14px 24px;
            text-align: center;
            font-size: 0.9rem;
            color: var(--navy);
            max-width: 500px;
            box-shadow: 0 2px 12px var(--green-glow);
            line-height: 1.55;
        }
        .garantia strong { color: var(--green); }

        /* ── PLANS ── */
        .plans-wrap {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 20px;
            flex-wrap: wrap;
            padding: 40px 16px 60px;
            max-width: 860px;
            margin: 0 auto;
        }

        /* ── CARD ── */
        .card {
            background: var(--card);
            border: 2px solid var(--border);
            border-radius: 20px;
            padding: 28px 24px 24px;
            width: 370px;
            max-width: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 16px rgba(0,23,59,0.06);
            transition: box-shadow 0.25s, transform 0.25s;
        }
        .card:hover {
            box-shadow: 0 8px 32px rgba(0,23,59,0.12);
            transform: translateY(-3px);
        }
        .card.pro {
            border-color: var(--border-pro);
            box-shadow: 0 4px 28px var(--green-glow);
        }

        /* ── BADGES ── */
        .badges {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            min-height: 26px;
        }
        .badge-off {
            background: var(--green);
            color: #fff;
            font-weight: 900;
            font-size: 0.68rem;
            padding: 3px 10px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }
        .badge-top {
            background: var(--gold);
            color: var(--navy);
            font-weight: 900;
            font-size: 0.68rem;
            padding: 3px 10px;
            border-radius: 20px;
            text-transform: uppercase;
        }

        /* ── NOMBRE ── */
        .plan-title {
            font-weight: 900;
            font-size: 1.35rem;
            margin-bottom: 8px;
            letter-spacing: 0.2px;
        }
        .plan-title.pro { color: var(--green); }
        .plan-title.ini { color: var(--navy); }

        .plan-sub {
            font-size: 0.83rem;
            color: var(--muted);
            line-height: 1.55;
            margin-bottom: 18px;
        }
        .plan-sub strong { color: var(--green); }

        /* ── PRECIO ── */
        .price-area { margin-bottom: 20px; }
        .price-old {
            font-size: 0.88rem;
            color: var(--muted);
            text-decoration: line-through;
            margin-bottom: 2px;
        }
        .price-main {
            font-weight: 900;
            font-size: 2.5rem;
            color: var(--navy);
            line-height: 1;
        }
        .price-unit {
            font-size: 0.85rem;
            color: var(--muted);
            font-weight: 600;
        }
        .price-note {
            font-size: 0.75rem;
            color: var(--muted);
            margin-top: 4px;
        }

        /* ── SEPARADOR ── */
        .sep {
            border: none;
            border-top: 1px solid var(--border);
            margin: 16px 0;
        }

        /* ── FEATURES ── */
        .features {
            list-style: none;
            padding: 0;
            flex: 1;
            margin-bottom: 22px;
        }
        .features li {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            font-size: 0.86rem;
            color: var(--text);
            padding: 5px 0;
            line-height: 1.45;
        }
        .features .ico-check { color: var(--green); font-size: 0.8rem; margin-top: 3px; flex-shrink: 0; }
        .features .ico-lock  { color: #c8d0da; font-size: 0.8rem; margin-top: 3px; flex-shrink: 0; }
        .features li.locked  { color: #c8d0da; }

        /* ── COUNTDOWN ── */
        .countdown-wrap {
            text-align: center;
            font-size: 0.78rem;
            color: var(--muted);
            margin-bottom: 10px;
        }
        .countdown-timer {
            font-weight: 700;
            color: var(--navy);
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        /* ── BOTONES ── */
        .btn-plan {
            display: block;
            width: 100%;
            padding: 14px 16px;
            border-radius: 10px;
            font-weight: 900;
            font-size: 0.98rem;
            text-align: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.15s;
            margin-bottom: 8px;
        }
        .btn-plan:hover { opacity: 0.88; transform: scale(0.99); text-decoration: none; }

        .btn-plan.pro {
            background: var(--green);
            color: #fff;
            box-shadow: 0 4px 18px var(--green-glow);
        }
        .btn-plan.pro:hover { background: var(--green-dark); color: #fff; }

        .btn-plan.ini {
            background: var(--gold);
            color: var(--navy);
        }
        .btn-plan.ini:hover { background: #e89d28; color: var(--navy); }

        /* ── SOCIAL PROOF ── */
        .social-proof {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-size: 0.74rem;
            color: var(--muted);
            margin-top: 8px;
        }
        .dot-live {
            width: 7px; height: 7px;
            background: var(--green);
            border-radius: 50%;
            display: inline-block;
            animation: blink 1.8s infinite;
        }
        .cancel-note {
            text-align: center;
            font-size: 0.7rem;
            color: #c8d0da;
            margin-top: 6px;
            text-decoration: underline;
        }

        /* ── TESTIMONIOS ── */
        .testimonials {
            background: #fff;
            padding: 60px 16px;
            text-align: center;
        }
        .testimonials h2 {
            font-weight: 900;
            font-size: 1.5rem;
            color: var(--navy);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
        }
        .testimonials .sub {
            font-size: 0.88rem;
            color: var(--muted);
            margin-bottom: 36px;
        }
        .t-grid {
            display: flex;
            justify-content: center;
            gap: 18px;
            flex-wrap: wrap;
            max-width: 880px;
            margin: 0 auto;
        }
        .t-card {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px;
            width: 260px;
            max-width: 100%;
            text-align: left;
        }
        .t-card .stars { color: var(--gold); font-size: 0.82rem; margin-bottom: 10px; }
        .t-card p     { font-size: 0.82rem; color: var(--muted); line-height: 1.55; margin-bottom: 12px; }
        .t-card .name { font-weight: 700; color: var(--navy); font-size: 0.82rem; }
        .t-card .role { font-size: 0.72rem; color: var(--muted); }

        /* ── POPUP COMPRA RECIENTE ── */
        .recent-buy {
            position: fixed;
            bottom: 22px; right: 22px;
            background: #fff;
            border: 1.5px solid var(--green);
            border-radius: 12px;
            padding: 12px 16px 12px 14px;
            font-size: 0.78rem;
            max-width: 230px;
            z-index: 9999;
            display: none;
            flex-direction: column;
            gap: 3px;
            box-shadow: 0 4px 24px rgba(0,122,106,0.15);
            animation: slideUp 0.4s ease forwards;
        }
        .recent-buy .rb-label { font-size: 0.63rem; color: var(--green); font-weight: 800; text-transform: uppercase; }
        .recent-buy .rb-name  { font-weight: 700; color: var(--navy); font-size: 0.82rem; }
        .recent-buy .rb-text  { color: var(--muted); font-size: 0.78rem; }
        .recent-buy .rb-close { position: absolute; top: 8px; right: 10px; background: none; border: none; color: var(--muted); cursor: pointer; font-size: 0.78rem; }

        /* ── FOOTER ── */
        .page-footer {
            background: var(--navy);
            color: rgba(255,255,255,0.4);
            text-align: center;
            padding: 26px 16px;
            font-size: 0.74rem;
        }
        .page-footer a { color: rgba(255,255,255,0.4); text-decoration: underline; }

        /* ── ANIMACIONES ── */
        @keyframes blink {
            0%,100% { opacity:1; transform:scale(1); }
            50%      { opacity:.4; transform:scale(1.4); }
        }
        @keyframes slideUp {
            from { opacity:0; transform:translateY(14px); }
            to   { opacity:1; transform:translateY(0); }
        }

        @media (max-width: 600px) {
            .card { width: 100%; }
            .price-main { font-size: 2rem; }
            .recent-buy { display: none !important; }
        }
    </style>
</head>
<body>

<!-- NAVBAR — idéntico al del sitio principal -->
<header class="position-relative">
    <nav class="navbar px-md-5 px-3 navbar-expand-lg navbar-dark bg-light">
        <a class="navbar-brand" href="../">
            <img src="../n-assets/img/logo-excel.png" alt="Aprende Excel" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSubs" aria-controls="navbarSubs" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSubs">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="ddExcel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Excel</a>
                    <div class="dropdown-menu" aria-labelledby="ddExcel">
                        <a class="dropdown-item" href="../excel-inicial/">Excel Nivel Inicial</a>
                        <a class="dropdown-item" href="../excel-intermedio/">Excel Nivel Intermedio</a>
                        <a class="dropdown-item" href="../excel-avanzado/">Excel Nivel Avanzado</a>
                        <a class="dropdown-item" href="../excel-promo/">Excel promo 3 en 1</a>
                        <a class="dropdown-item" href="../power-bi-y-excel/">Excel promo 3 y Power BI</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pack-office/">Pack Office</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="ddPBI" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Power BI</a>
                    <div class="dropdown-menu" aria-labelledby="ddPBI">
                        <a class="dropdown-item" href="../power-bi/">Power BI Inicial</a>
                        <a class="dropdown-item" href="../power-bi-y-excel/">Power BI y Excel promo 3</a>
                        <a class="dropdown-item" href="../power-bi-avanzado/">Power BI Avanzado</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../microsoft-sql-server/">Sql Server</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./" style="font-weight:700;">Suscripciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../plan-empresa/">Plan Empresa</a>
                </li>
                <li class="nav-item">
                    <b><a class="nav-link" href="https://academia.aprende-excel.com/">Iniciar sesión</a></b>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- GARANTÍA -->
<div class="garantia-wrap">
    <div class="garantia">
        🛡️ <strong>Suscríbete sin riesgos:</strong> Te devolvemos tu pago al 100%
        si no estás conforme con tu compra en los primeros 7 días.
    </div>
</div>

<!-- PLANES -->
<div class="plans-wrap">

    <!-- PLAN PROFESIONAL -->
    <div class="card pro">
        <div class="badges">
            <span class="badge-off">20% OFF</span>
            <span class="badge-top">⚡ MÁS ELEGIDO</span>
        </div>

        <div class="plan-title pro">PLAN PROFESIONAL 🚀</div>
        <p class="plan-sub">
            Obtén 20% DE AHORRO + Conviértete en Profesional Certificado.<br>
            <strong>2 MESES GRATIS ⚡</strong>
        </p>

        <div class="price-area">
            <div class="price-old"><?= $precioProRef ?></div>
            <div>
                <span class="price-main"><?= $precioProMes ?></span>
                <span class="price-unit"> x/mes</span>
            </div>
            <div class="price-note">(Cobrado anualmente)</div>
        </div>

        <hr class="sep">

        <ul class="features">
            <li><i class="fas fa-check ico-check"></i> Acceso ilimitado a todos los cursos y actualizaciones</li>
            <li><i class="fas fa-check ico-check"></i> 100% online a tu ritmo</li>
            <li><i class="fas fa-check ico-check"></i> Comunidad de alumnos</li>
            <li><i class="fas fa-check ico-check"></i> 🏆 Certificado Oficial para validar tus conocimientos</li>
            <li><i class="fas fa-check ico-check"></i> 👨‍🏫 Acceso a profesores expertos y soporte prioritario</li>
            <li><i class="fas fa-check ico-check"></i> 🔥 Prioridad en nuevos lanzamientos</li>
            <li><i class="fas fa-check ico-check"></i> 🤖 Asistente IA 24/7 para resolver tus dudas</li>
        </ul>

        <div class="countdown-wrap">
            Oferta termina en: <span class="countdown-timer" id="countdown">24h 00m 00s</span>
        </div>

        <a href="<?= $urlCheckoutPro ?>" class="btn-plan pro">
            ⚡ Aprovechar Oferta
        </a>

        <div class="social-proof">
            <span class="dot-live"></span>
            +<?= $alumnosMes ?> alumnos certificados este mes
        </div>
    </div>

    <!-- PLAN INICIAL -->
    <div class="card ini">
        <div class="badges"></div>

        <div class="plan-title ini">Plan Inicial</div>
        <p class="plan-sub">Acceso ilimitado a todos los cursos</p>

        <div class="price-area">
            <div style="height:20px;"></div>
            <div>
                <span class="price-main"><?= $precioInicialMes ?></span>
            </div>
            <div class="price-note">Mensual</div>
        </div>

        <hr class="sep">

        <ul class="features">
            <li><i class="fas fa-check ico-check"></i> Acceso ilimitado a todos los cursos mensualmente</li>
            <li><i class="fas fa-check ico-check"></i> 100% online a tu ritmo</li>
            <li><i class="fas fa-check ico-check"></i> Soporte 24/7</li>
            <li><i class="fas fa-check ico-check"></i> Comunidad de alumnos</li>
            <li class="locked"><i class="fas fa-lock ico-lock"></i> Certificado Oficial para validar tus conocimientos</li>
            <li class="locked"><i class="fas fa-lock ico-lock"></i> Asistente IA 24/7 para resolver tus dudas</li>
            <li class="locked"><i class="fas fa-lock ico-lock"></i> Acceso a profesores expertos y soporte prioritario</li>
            <li class="locked"><i class="fas fa-lock ico-lock"></i> Prioridad en nuevos lanzamientos</li>
        </ul>

        <div style="height:38px;"></div>

        <a href="<?= $urlCheckoutInicial ?>" class="btn-plan ini">
            🚀 Suscribirme ahora
        </a>

        <div class="cancel-note">Cancelá cuando quieras</div>
    </div>

</div>

<!-- TESTIMONIOS -->
<section class="testimonials">
    <h2>Lo que dicen nuestros clientes</h2>
    <p class="sub">Más de 25.000 alumnos ya transformaron su carrera</p>
    <div class="t-grid">
        <div class="t-card">
            <div class="stars">★★★★★</div>
            <p>"Gracias a Aprende Excel conseguí un ascenso en mi empresa. El contenido es increíble y los profesores responden al instante."</p>
            <div class="name">María G.</div>
            <div class="role">Analista Financiera · Buenos Aires</div>
        </div>
        <div class="t-card">
            <div class="stars">★★★★★</div>
            <p>"En 3 meses aprendí más que en 2 años de universidad. El certificado me abrió puertas que nunca imaginé."</p>
            <div class="name">Carlos R.</div>
            <div class="role">Contador · Córdoba</div>
        </div>
        <div class="t-card">
            <div class="stars">★★★★★</div>
            <p>"La plataforma es intuitiva, los cursos bien estructurados y el soporte 24/7 es real. Recomendado 100%."</p>
            <div class="name">Lucía M.</div>
            <div class="role">Administradora · Rosario</div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="page-footer">
    © <?= date('Y') ?> Aprende Excel &nbsp;·&nbsp;
    <a href="../terminos.php">Términos y condiciones</a> &nbsp;·&nbsp;
    <a href="#">Política de privacidad</a>
</footer>

<!-- POPUP COMPRA RECIENTE -->
<div class="recent-buy" id="recentBuy">
    <button class="rb-close" onclick="document.getElementById('recentBuy').style.display='none'">✕</button>
    <span class="rb-label">🟢 Compra Reciente</span>
    <span class="rb-name" id="rb-name">Alguien</span>
    <span class="rb-text">acaba de comprar el <strong style="color:var(--navy);">Plan Profesional</strong></span>
</div>

<!-- Bootstrap 4 JS — igual que el resto del sitio -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<script>
(function(){
    var end=Date.now()+24*3600*1000;
    function tick(){
        var d=end-Date.now(),el=document.getElementById('countdown');
        if(d<=0){el.textContent='¡Oferta finalizada!';return;}
        var h=Math.floor(d/3600000),m=Math.floor(d%3600000/60000),s=Math.floor(d%60000/1000);
        el.textContent=(h<10?'0':'')+h+'h '+(m<10?'0':'')+m+'m '+(s<10?'0':'')+s+'s';
    }
    tick();setInterval(tick,1000);
})();
(function(){
    var names=['Miguel R.','Sofía L.','Andrés P.','Valentina C.','Juan M.','Carolina B.','Diego F.','Paula S.','Tomás G.','Laura V.'];
    function show(){
        var el=document.getElementById('recentBuy');
        document.getElementById('rb-name').textContent=names[Math.floor(Math.random()*names.length)];
        el.style.display='flex';el.style.animation='none';void el.offsetWidth;el.style.animation='slideUp 0.4s ease forwards';
        setTimeout(function(){el.style.opacity='0';el.style.transition='opacity 0.35s';setTimeout(function(){el.style.display='none';el.style.opacity='1';el.style.transition='';},350);},5000);
    }
    setTimeout(function(){show();setInterval(show,25000);},3000);
})();
</script>
</body>
</html>
