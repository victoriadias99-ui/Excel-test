<?php
include('../n-includes/checkout-headers.php');
$dirpage = '../';

$idcurso = 'gemini';
include("../n-includes/funcionsDB.php");

// AUTO-SETUP: Si el curso no existe o falta config, lo crea automáticamente
try {
    $cnx = OpenCon();

    // Buscar el curso
    $stmt = $cnx->prepare("SELECT * FROM cursos_detalle WHERE CURSO = ?");
    $stmt->execute(['gemini']);
    $curso = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si no existe o le falta la clave Stripe, obtenerla de otro curso y configurar
    if (!$curso || empty($curso['STRIPE_SECRET_KEY'])) {
        // Obtener clave Stripe de un curso existente
        $stmt = $cnx->prepare("SELECT STRIPE_SECRET_KEY FROM cursos_detalle WHERE STRIPE_SECRET_KEY != '' AND STRIPE_SECRET_KEY IS NOT NULL LIMIT 1");
        $stmt->execute();
        $otherCurso = $stmt->fetch(PDO::FETCH_ASSOC);
        $stripeKey = $otherCurso['STRIPE_SECRET_KEY'] ?? '';

        if ($curso) {
            // Actualizar con clave Stripe
            $stmt = $cnx->prepare("UPDATE cursos_detalle SET STRIPE_SECRET_KEY = ?, TITULO = ?, DESCRIPCION = ?, PRECIO_UNITARIO = ?, PORCENTAJE_DES = ?, ESTADO = ? WHERE CURSO = ?");
            $stmt->execute([$stripeKey, 'Curso de Gemini desde Cero', 'Aprende a usar Google Gemini para trabajar, crear y automatizar 10× más rápido', 12999, 23, 1, 'gemini']);
        } else {
            // Crear nuevo
            $stmt = $cnx->prepare("INSERT INTO cursos_detalle (CURSO, TITULO, DESCRIPCION, DIR, IMAGEN, PRECIO_UNITARIO, PORCENTAJE_DES, ESTADO, STRIPE_SECRET_KEY) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute(['gemini', 'Curso de Gemini desde Cero', 'Aprende a usar Google Gemini para trabajar, crear y automatizar 10× más rápido', '../gemini-mockup/', '../a-img/logo-gemini.png', 12999, 23, 1, $stripeKey]);
        }

        // Recargar
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
    }
} catch (Exception $e) {
    // Fallback
}

// Ahora incluir logicparametros para obtener moneda/país
include("../n-includes/logicparametros.php");

try {
    $data = getCursoDetalleCheckout($idcurso);
    $curso = $data['producto'];
} catch (Exception $e) {
    $data = ['pack' => []];
}

if (isset($_GET['test'])) {
    echo "<pre>";
    print_r($curso);
    echo "</pre>";
}

//PRECIO_UNITARIO
if (!$curso || empty($curso['PRECIO_UNITARIO']) || empty($curso['PORCENTAJE_DES'])) {
    // Fallback a valores por defecto si la BD no responde correctamente
    $curso = [
        'TITULO' => 'Curso de Gemini desde Cero',
        'DIR' => '../gemini-mockup/',
        'PRECIO_UNITARIO' => 12999,
        'PORCENTAJE_DES' => 23,
        'STRIPE_SECRET_KEY' => '',
    ];
    $data = ['pack' => []];
}

$value = $curso['PRECIO_UNITARIO'];
$descuento = $curso['PORCENTAJE_DES'];
$precioOriginal = intval(($value / $descuento) * 100);
$precioCursoOficial = $simbolo . ' ' . convertirPrecio($precioOriginal, $moneda);
$precioDescuento = $value;
$precioCursoDescuento = $simbolo . ' ' . convertirPrecio($value, $moneda) . ' ' . $moneda;
$precioCurso = $simbolo . ' ' . convertirPrecio($value, $moneda) . $textoIVA;
$diferencia = $simbolo . ' ' . convertirPrecio($precioOriginal - $value, $moneda) . ' ' . $moneda;
$urlCheckout = 'checkout.php';
$titulo = 'Carrito';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $titulo ?> - Curso de Gemini</title>
        <!-- CSS existentes (se conservan para no romper header/footer compartidos) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Tipografía moderna -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <style>
            /* ============================================================
               DESIGN TOKENS — violeta de marca refinado
               Todo lo nuevo vive dentro de .checkout-v2 para no pisar
               estilos del header/footer compartidos del sitio.
               ============================================================ */
            .checkout-v2 {
                --brand-50:  #F5F3FF;
                --brand-100: #EDE9FE;
                --brand-200: #DDD6FE;
                --brand-300: #C4B5FD;
                --brand-400: #A78BFA;
                --brand-500: #8B5CF6;
                --brand-600: #7C3AED;
                --brand-700: #6D28D9;
                --brand-800: #5B21B6;
                --brand-900: #4C1D95;

                --slate-50:  #F8FAFC;
                --slate-100: #F1F5F9;
                --slate-200: #E2E8F0;
                --slate-300: #CBD5E1;
                --slate-400: #94A3B8;
                --slate-500: #64748B;
                --slate-600: #475569;
                --slate-700: #334155;
                --slate-800: #1E293B;
                --slate-900: #0F172A;

                --success: #10B981;
                --success-light: #D1FAE5;
                --warning: #F59E0B;
                --warning-light: #FEF3C7;
                --danger:  #EF4444;

                --bg:           #F8FAFC;
                --surface:      #FFFFFF;
                --surface-soft: #FAFAFF;
                --border:       #E2E8F0;
                --border-strong:#CBD5E1;

                --text-primary:   #0F172A;
                --text-secondary: #475569;
                --text-muted:     #64748B;

                --shadow-xs: 0 1px 2px 0 rgba(15,23,42,0.04);
                --shadow-sm: 0 1px 3px 0 rgba(15,23,42,0.06), 0 1px 2px -1px rgba(15,23,42,0.04);
                --shadow-md: 0 4px 12px -2px rgba(15,23,42,0.08), 0 2px 4px -2px rgba(15,23,42,0.04);
                --shadow-lg: 0 12px 24px -6px rgba(15,23,42,0.10), 0 4px 8px -4px rgba(15,23,42,0.06);
                --shadow-brand: 0 10px 24px -8px rgba(124,58,237,0.45), 0 4px 8px -4px rgba(124,58,237,0.25);

                --radius-sm: 6px;
                --radius-md: 10px;
                --radius-lg: 14px;
                --radius-xl: 20px;
                --radius-full: 999px;

                --t-fast: 120ms cubic-bezier(0.4, 0, 0.2, 1);
                --t-base: 180ms cubic-bezier(0.4, 0, 0.2, 1);
                --t-slow: 280ms cubic-bezier(0.4, 0, 0.2, 1);

                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                color: var(--text-primary);
                font-size: 15px;
                line-height: 1.55;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            .checkout-v2 *,
            .checkout-v2 *::before,
            .checkout-v2 *::after { box-sizing: border-box; }

            .checkout-v2 a { color: var(--brand-700); }

            /* Fondo decorativo detrás del checkout */
            body.has-checkout-v2 {
                background:
                    radial-gradient(ellipse 80% 60% at 20% 10%, rgba(124, 58, 237, 0.06), transparent 60%),
                    radial-gradient(ellipse 60% 40% at 100% 0%, rgba(139, 92, 246, 0.05), transparent 60%),
                    var(--bg, #F8FAFC);
            }

            /* ============================================================
               LAYOUT
               ============================================================ */
            .checkout-v2 .cv2-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 40px 24px 80px;
            }
            .checkout-v2 .cv2-page-title {
                text-align: center;
                margin: 0 0 40px;
            }
            .checkout-v2 .cv2-page-title h1 {
                font-family: 'Inter', sans-serif;
                font-size: clamp(22px, 3vw, 28px);
                font-weight: 700;
                letter-spacing: -0.02em;
                margin: 0 0 8px;
                color: var(--text-primary);
            }
            .checkout-v2 .cv2-page-title p {
                margin: 0;
                color: var(--text-secondary);
                font-size: 15px;
            }
            .checkout-v2 .cv2-accent { color: var(--brand-700); }

            .checkout-v2 .cv2-grid {
                display: grid;
                grid-template-columns: minmax(0, 1.15fr) minmax(0, 1fr);
                gap: 32px;
                align-items: start;
            }
            @media (max-width: 960px) {
                .checkout-v2 .cv2-grid { grid-template-columns: 1fr; gap: 24px; }
            }

            /* ============================================================
               CARD BASE
               ============================================================ */
            .checkout-v2 .cv2-card {
                background: var(--surface);
                border: 1px solid var(--border);
                border-radius: var(--radius-xl);
                box-shadow: var(--shadow-sm);
                overflow: hidden;
            }
            .checkout-v2 .cv2-card + .cv2-card { margin-top: 20px; }
            .checkout-v2 .cv2-card__body { padding: 24px; }
            @media (min-width: 768px) {
                .checkout-v2 .cv2-card__body { padding: 32px; }
            }
            .checkout-v2 .cv2-card__title {
                font-size: 18px;
                font-weight: 700;
                letter-spacing: -0.01em;
                margin: 0 0 20px;
                color: var(--text-primary);
            }

            /* ============================================================
               HERO
               ============================================================ */
            .checkout-v2 .cv2-hero {
                display: grid;
                grid-template-columns: 220px 1fr;
                gap: 24px;
                align-items: center;
            }
            @media (max-width: 560px) {
                .checkout-v2 .cv2-hero { grid-template-columns: 1fr; }
                .checkout-v2 .cv2-hero__media { max-width: 240px; }
            }
            .checkout-v2 .cv2-hero__media {
                border-radius: var(--radius-lg);
                overflow: hidden;
                box-shadow: var(--shadow-lg);
                background: linear-gradient(135deg, #A855F7 0%, #6D28D9 100%);
            }
            .checkout-v2 .cv2-hero__media img {
                width: 100%;
                height: auto;
                display: block;
            }
            .checkout-v2 .cv2-hero__badge {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: var(--brand-50);
                color: var(--brand-800);
                padding: 6px 12px;
                border-radius: var(--radius-full);
                font-size: 12px;
                font-weight: 600;
                margin-bottom: 12px;
            }
            .checkout-v2 .cv2-hero__title {
                font-size: clamp(22px, 3vw, 28px);
                font-weight: 700;
                letter-spacing: -0.02em;
                line-height: 1.2;
                margin: 0 0 12px;
                color: var(--text-primary);
            }
            .checkout-v2 .cv2-hero__desc {
                margin: 0 0 20px;
                color: var(--text-secondary);
                font-size: 15px;
                max-width: 52ch;
            }
            .checkout-v2 .cv2-hero__meta {
                display: flex;
                flex-wrap: wrap;
                gap: 16px;
                color: var(--text-muted);
                font-size: 13.5px;
            }
            .checkout-v2 .cv2-hero__meta-item {
                display: inline-flex;
                align-items: center;
                gap: 6px;
            }
            .checkout-v2 .cv2-hero__meta-item i {
                color: var(--brand-600);
                font-size: 13px;
            }

            /* ============================================================
               PRICE BLOCK
               ============================================================ */
            .checkout-v2 .cv2-price {
                margin-top: 24px;
                display: grid;
                grid-template-columns: 1fr auto;
                gap: 20px;
                align-items: end;
                padding: 24px;
                background: linear-gradient(135deg, var(--brand-50) 0%, #FFFFFF 100%);
                border: 1px solid var(--brand-100);
                border-radius: var(--radius-lg);
            }
            @media (max-width: 480px) {
                .checkout-v2 .cv2-price { grid-template-columns: 1fr; }
            }
            .checkout-v2 .cv2-price__label {
                font-size: 12px;
                font-weight: 600;
                color: var(--brand-700);
                letter-spacing: 0.08em;
                text-transform: uppercase;
                margin-bottom: 8px;
            }
            .checkout-v2 .cv2-price__row {
                display: flex;
                align-items: baseline;
                gap: 12px;
                flex-wrap: wrap;
            }
            .checkout-v2 .cv2-price__was {
                color: var(--text-muted);
                font-size: 16px;
                text-decoration: line-through;
                font-variant-numeric: tabular-nums;
            }
            .checkout-v2 .cv2-price__now {
                font-size: clamp(32px, 4.5vw, 40px);
                font-weight: 800;
                letter-spacing: -0.03em;
                color: var(--text-primary);
                font-variant-numeric: tabular-nums;
                line-height: 1;
            }
            .checkout-v2 .cv2-price__note {
                font-size: 13px;
                color: var(--text-muted);
                margin-top: 8px;
            }
            .checkout-v2 .cv2-price__discount {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                background: linear-gradient(135deg, #F59E0B, #EA580C);
                color: white;
                padding: 8px 14px;
                border-radius: var(--radius-full);
                font-size: 13px;
                font-weight: 700;
                box-shadow: 0 6px 14px -4px rgba(234, 88, 12, 0.4);
                white-space: nowrap;
                align-self: center;
            }

            /* ============================================================
               UPSELLS / "SECTION HEADER CHECKOUT" (preservando clases originales)
               ============================================================ */
            .checkout-v2 .section-header-checkout-next {
                margin-top: 16px !important;
                border-radius: var(--radius-lg) !important;
                background: linear-gradient(135deg, #F5F3FF, #EDE9FE) !important;
                border: 1px solid var(--brand-100);
                padding: 4px 8px;
                height: auto;
            }
            .checkout-v2 .section-header-checkout-next .titulo {
                color: var(--brand-700) !important;
                font-size: 15px !important;
                font-weight: 700;
                letter-spacing: -0.01em;
                display: flex;
                align-items: center;
                gap: 10px;
            }
            .checkout-v2 .section-header-checkout-next .subtitulo {
                font-size: 13px !important;
                color: var(--text-secondary);
            }
            .checkout-v2 .check-producto-paquete {
                width: 18px;
                height: 18px;
                accent-color: var(--brand-600);
                cursor: pointer;
            }

            /* ============================================================
               CART LINE
               ============================================================ */
            .checkout-v2 .cv2-cart-line {
                display: grid;
                grid-template-columns: 44px 1fr auto;
                gap: 16px;
                align-items: center;
                padding: 16px 0;
            }
            .checkout-v2 .cv2-cart-line + .cv2-cart-line { border-top: 1px solid var(--border); }
            .checkout-v2 .cv2-cart-thumb {
                width: 44px; height: 44px;
                border-radius: 10px;
                background: linear-gradient(135deg, #A855F7, #6D28D9);
                display: grid; place-items: center;
                color: white;
                font-weight: 800;
                font-size: 16px;
                font-family: 'Inter', sans-serif;
            }
            .checkout-v2 .cv2-cart-info { display: flex; flex-direction: column; gap: 4px; min-width: 0; }
            .checkout-v2 .cv2-cart-name {
                font-weight: 600;
                color: var(--text-primary);
                font-size: 15px;
                margin: 0;
            }
            .checkout-v2 .cv2-cart-offer {
                display: inline-flex;
                align-items: center;
                gap: 4px;
                background: #FEF3C7;
                color: #92400E;
                padding: 2px 8px;
                border-radius: var(--radius-full);
                font-size: 11px;
                font-weight: 700;
                width: fit-content;
                letter-spacing: 0.02em;
            }
            .checkout-v2 .cv2-cart-prices {
                text-align: right;
                font-variant-numeric: tabular-nums;
                font-size: 13px;
            }
            .checkout-v2 .cv2-cart-prices .precio-original {
                color: var(--text-muted);
                text-decoration: line-through;
                display: block;
            }
            .checkout-v2 .cv2-cart-prices .cv2-cart-save {
                color: var(--danger);
                font-weight: 600;
                display: block;
                margin-top: 2px;
            }
            .checkout-v2 .cv2-cart-total {
                display: flex;
                justify-content: space-between;
                align-items: baseline;
                padding-top: 20px;
                margin-top: 4px;
                border-top: 2px solid var(--border);
            }
            .checkout-v2 .cv2-cart-total__label {
                font-size: 15px;
                font-weight: 600;
                color: var(--text-secondary);
            }
            .checkout-v2 .cv2-cart-total__sub {
                display: block;
                font-size: 13px;
                color: var(--text-muted);
                margin-top: 2px;
                font-weight: 400;
            }
            .checkout-v2 .cv2-cart-total__value,
            .checkout-v2 #total_price {
                font-size: 22px !important;
                font-weight: 800 !important;
                color: var(--text-primary) !important;
                font-variant-numeric: tabular-nums;
                letter-spacing: -0.02em;
            }

            /* ============================================================
               BENEFITS
               ============================================================ */
            .checkout-v2 .cv2-benefits {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
                list-style: none;
                padding: 0;
                margin: 0;
            }
            @media (max-width: 480px) {
                .checkout-v2 .cv2-benefits { grid-template-columns: 1fr; }
            }
            .checkout-v2 .cv2-benefit {
                display: flex;
                align-items: flex-start;
                gap: 12px;
                padding: 14px;
                background: var(--slate-50);
                border-radius: var(--radius-md);
                border: 1px solid var(--border);
                transition: transform var(--t-base), box-shadow var(--t-base), border-color var(--t-base);
                font-size: 14px;
                color: var(--text-primary);
            }
            .checkout-v2 .cv2-benefit:hover {
                transform: translateY(-2px);
                box-shadow: var(--shadow-md);
                border-color: var(--brand-200);
            }
            .checkout-v2 .cv2-benefit__icon {
                flex: 0 0 36px;
                width: 36px; height: 36px;
                border-radius: 10px;
                background: var(--brand-100);
                color: var(--brand-700);
                display: grid; place-items: center;
                font-size: 16px;
            }

            /* ============================================================
               TESTIMONIAL CAROUSEL — mantiene estructura Bootstrap, restyle
               ============================================================ */
            .checkout-v2 .comentarios {
                background: var(--surface-soft) !important;
                border: 1px solid var(--border) !important;
                border-radius: var(--radius-lg) !important;
                padding: 20px !important;
                position: relative;
            }
            .checkout-v2 .comentarios::before {
                content: '\201C';
                position: absolute;
                top: -8px;
                left: 16px;
                font-size: 48px;
                line-height: 1;
                color: var(--brand-300);
                font-family: Georgia, serif;
            }
            .checkout-v2 .comentarios p {
                font-size: 14.5px !important;
                color: var(--text-primary);
                line-height: 1.5;
                margin: 0 0 10px;
                font-style: italic;
            }
            .checkout-v2 .comentarios .rating-user {
                color: #F59E0B !important;
                font-size: 14px !important;
                margin-right: 8px;
            }
            .checkout-v2 .comentarios .blockquote-footer {
                font-size: 13px;
                color: var(--text-muted);
                margin-top: 4px;
            }
            .checkout-v2 .comentarios .blockquote-footer b {
                color: var(--text-secondary);
                font-weight: 600;
            }
            .checkout-v2 .carousel-indicators {
                position: static;
                margin: 12px 0 0;
                justify-content: center;
            }
            .checkout-v2 .carousel-indicators li {
                background-color: var(--slate-300);
                width: 6px;
                height: 6px;
                border-radius: 50%;
                margin: 0 4px;
                opacity: 1;
                border: none;
                transition: background var(--t-base), width var(--t-base);
            }
            .checkout-v2 .carousel-indicators li.active {
                background: var(--brand-600);
                width: 20px;
                border-radius: var(--radius-full);
            }

            /* ============================================================
               FORM CARD (columna derecha)
               Estilo superpuesto a form.php sin modificarlo.
               ============================================================ */
            .checkout-v2 .cv2-form-card {
                position: sticky;
                top: 20px;
            }
            @media (max-width: 960px) {
                .checkout-v2 .cv2-form-card { position: static; }
            }

            .checkout-v2 .cv2-payments {
                padding: 16px 24px;
                background: var(--slate-50);
                border-bottom: 1px solid var(--border);
            }
            .checkout-v2 .cv2-payments img {
                width: 100%;
                height: auto;
                display: block;
                border-radius: var(--radius-sm);
            }

            .checkout-v2 .cv2-trust-line {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 8px 12px;
                background: var(--success-light);
                color: #065F46;
                border-radius: var(--radius-full);
                font-size: 12.5px;
                font-weight: 600;
                margin-bottom: 16px;
            }
            .checkout-v2 .cv2-form-title {
                font-size: 22px;
                font-weight: 700;
                letter-spacing: -0.02em;
                color: var(--text-primary);
                margin: 0 0 20px;
                line-height: 1.3;
            }

            /* --- Overrides de form.php (preserva IDs/clases existentes) --- */
            .checkout-v2 #procederPagoForm .form {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }
            @media (max-width: 420px) {
                .checkout-v2 #procederPagoForm .form { grid-template-columns: 1fr; }
            }
            .checkout-v2 #procederPagoForm .form > .form-group { margin: 0; padding: 0; }
            .checkout-v2 #procederPagoForm .form-row {
                margin: 12px 0 0;
                display: block;
            }
            .checkout-v2 #procederPagoForm .form-row > .form-group {
                padding: 0 !important;
                margin: 0;
                flex: initial;
                max-width: none;
                display: block;
            }
            .checkout-v2 #procederPagoForm .form-row > .form-group > * + input {
                margin-top: 6px;
            }
            /* Texto que aparece como "label" antes de email y promo */
            .checkout-v2 #procederPagoForm .form-row > .form-group {
                font-size: 13px;
                font-weight: 600;
                color: var(--text-secondary);
            }
            .checkout-v2 #procederPagoForm input.form-control-lg {
                width: 100% !important;
                height: 48px !important;
                padding: 0 14px !important;
                background: var(--surface) !important;
                border: 1.5px solid var(--border) !important;
                border-radius: var(--radius-md) !important;
                font-size: 15px !important;
                font-weight: 400;
                color: var(--text-primary) !important;
                line-height: 1.3 !important;
                transition: border-color var(--t-fast), box-shadow var(--t-fast), background var(--t-fast) !important;
                outline: none;
                box-shadow: none;
                font-family: 'Inter', sans-serif !important;
            }
            .checkout-v2 #procederPagoForm input.form-control-lg::placeholder {
                color: var(--slate-400);
                font-weight: 400;
            }
            .checkout-v2 #procederPagoForm input.form-control-lg:hover {
                border-color: var(--border-strong) !important;
            }
            .checkout-v2 #procederPagoForm input.form-control-lg:focus {
                border-color: var(--brand-600) !important;
                box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.14) !important;
                background: var(--surface) !important;
            }
            .checkout-v2 #procederPagoForm input.form-control-lg.error,
            .checkout-v2 #procederPagoForm input.form-control-lg.error:focus {
                border-color: var(--danger) !important;
                box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.12) !important;
            }
            .checkout-v2 #procederPagoForm input.form-control-lg.valid {
                border-color: var(--success) !important;
            }

            .checkout-v2 #hint {
                font-size: 12.5px;
                color: var(--danger);
                margin: 6px 0 0;
            }
            .checkout-v2 #hint .suggestion {
                color: var(--brand-700);
                font-weight: 600;
            }

            /* CTA: Proceder con el pago */
            .checkout-v2 #proceder_pago {
                margin-top: 24px !important;
                width: 100% !important;
                min-height: 60px !important;
                padding: 18px 24px !important;
                background: linear-gradient(135deg, var(--brand-500) 0%, var(--brand-700) 100%) !important;
                background-color: var(--brand-600) !important; /* fallback */
                color: #ffffff !important;
                border: none !important;
                border-radius: var(--radius-md) !important;
                font-size: 16px !important;
                font-weight: 700 !important;
                letter-spacing: -0.01em !important;
                line-height: 1.2 !important;
                display: inline-flex !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 10px !important;
                box-shadow: var(--shadow-brand) !important;
                transition: transform var(--t-fast), box-shadow var(--t-base), filter var(--t-fast) !important;
                font-family: 'Inter', sans-serif !important;
                cursor: pointer;
            }
            .checkout-v2 #proceder_pago:hover {
                transform: translateY(-1px);
                filter: brightness(1.05);
                box-shadow: 0 16px 32px -8px rgba(124, 58, 237, 0.5), 0 6px 12px -4px rgba(124, 58, 237, 0.3) !important;
            }
            .checkout-v2 #proceder_pago:active { transform: translateY(0); }

            .checkout-v2 .cv2-cta-subtext {
                text-align: center;
                font-size: 12.5px;
                color: var(--text-muted);
                margin-top: 12px;
            }
            .checkout-v2 .cv2-cta-subtext i { color: var(--success); margin-right: 4px; }

            .checkout-v2 #spinnerloading {
                padding: 20px 0;
                color: var(--text-secondary);
            }
            .checkout-v2 #spinnerloading i { color: var(--brand-600); }

            /* ============================================================
               TRUST BADGES (bottom right)
               ============================================================ */
            .checkout-v2 .cv2-trust-badges {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 12px;
                margin-top: 20px;
            }
            @media (max-width: 520px) {
                .checkout-v2 .cv2-trust-badges { grid-template-columns: 1fr; }
            }
            .checkout-v2 .card-scv {
                background: var(--surface) !important;
                border: 1px solid var(--border) !important;
                border-radius: var(--radius-lg) !important;
                box-shadow: var(--shadow-sm) !important;
                padding: 16px !important;
                text-align: center !important;
                transition: transform var(--t-base), box-shadow var(--t-base), border-color var(--t-base);
                display: flex !important;
                flex-direction: column;
                align-items: center;
                gap: 8px;
            }
            .checkout-v2 .card-scv:hover {
                transform: translateY(-2px);
                box-shadow: var(--shadow-md) !important;
                border-color: var(--brand-200) !important;
            }
            .checkout-v2 .card-scv img {
                height: 40px !important;
                width: auto !important;
                margin: 0 !important;
            }
            .checkout-v2 .card-scv span {
                font-size: 12.5px !important;
                font-weight: 600;
                color: var(--text-secondary) !important;
                line-height: 1.3;
            }

            /* ============================================================
               WHATSAPP BLOCK
               ============================================================ */
            .checkout-v2 .cv2-whatsapp {
                text-align: center;
                padding: 24px 16px;
                margin-top: 24px;
                background: var(--surface-soft);
                border: 1px dashed var(--border-strong);
                border-radius: var(--radius-lg);
            }
            .checkout-v2 .cv2-whatsapp p {
                margin: 0 0 12px;
                color: var(--text-secondary);
                font-size: 14px;
            }
            .checkout-v2 .cv2-whatsapp a img {
                max-width: 200px;
                margin: 0 auto;
            }

            /* ============================================================
               MOBILE STICKY BAR
               ============================================================ */
            @media (max-width: 960px) {
                body.has-checkout-v2 { padding-bottom: 100px; }
                .checkout-v2 .cv2-mobile-bar {
                    position: fixed;
                    left: 0; right: 0; bottom: 0;
                    background: rgba(255,255,255,0.96);
                    backdrop-filter: blur(10px);
                    -webkit-backdrop-filter: blur(10px);
                    border-top: 1px solid var(--border);
                    padding: 12px 16px calc(12px + env(safe-area-inset-bottom));
                    display: flex;
                    align-items: center;
                    gap: 12px;
                    z-index: 30;
                    box-shadow: 0 -8px 24px -12px rgba(15, 23, 42, 0.15);
                }
                .checkout-v2 .cv2-mobile-bar__price { flex: 1; }
                .checkout-v2 .cv2-mobile-bar__price-label {
                    font-size: 11px;
                    color: var(--text-muted);
                    font-weight: 500;
                    text-transform: uppercase;
                    letter-spacing: 0.06em;
                }
                .checkout-v2 .cv2-mobile-bar__price-value {
                    font-size: 18px;
                    font-weight: 800;
                    color: var(--text-primary);
                    letter-spacing: -0.02em;
                    font-variant-numeric: tabular-nums;
                }
                .checkout-v2 .cv2-mobile-cta {
                    background: linear-gradient(135deg, var(--brand-500), var(--brand-700));
                    color: white;
                    border: none;
                    padding: 12px 20px;
                    border-radius: var(--radius-md);
                    font-size: 14.5px;
                    font-weight: 700;
                    min-height: 48px;
                    flex: 1.4;
                    font-family: 'Inter', sans-serif;
                    cursor: pointer;
                    box-shadow: var(--shadow-brand);
                }
            }
            @media (min-width: 961px) {
                .checkout-v2 .cv2-mobile-bar { display: none; }
            }
        </style>
    </head>

    <body class="has-checkout-v2" style="font-family: 'Inter', 'Raleway Regular', sans-serif;">
        <?php
        $headerImagen = "";
        include('../n-pages/header.php')
        ?>

        <main class="checkout-v2">
            <div class="cv2-container">

                <!-- Page title -->
                <div class="cv2-page-title">
                    <h1>Estás a unos clics de tener <span class="cv2-accent">tu curso</span></h1>
                    <p>Completá tus datos y recibí acceso inmediato por email.</p>
                </div>

                <div class="cv2-grid">

                    <!-- =========================================================
                         LEFT COLUMN
                         ========================================================= -->
                    <section>

                        <!-- Hero product -->
                        <article class="cv2-card">
                            <div class="cv2-card__body">
                                <div class="cv2-hero">
                                    <div class="cv2-hero__media">
                                        <img src="../a-img/logo-gemini.png" alt="Curso de Gemini desde Cero">
                                    </div>
                                    <div class="cv2-hero__info">
                                        <span class="cv2-hero__badge">
                                            <i class="fas fa-star" style="font-size:12px"></i>
                                            Curso Online · Nivel Desde Cero
                                        </span>
                                        <h2 class="cv2-hero__title"><?= $curso['TITULO'] ?? 'Curso de Gemini desde Cero' ?></h2>
                                        <p class="cv2-hero__desc">Aprendé a usar Google Gemini para potenciar tu productividad con Inteligencia Artificial.</p>
                                        <div class="cv2-hero__meta">
                                            <span class="cv2-hero__meta-item"><i class="far fa-clock"></i> Acceso ilimitado</span>
                                            <span class="cv2-hero__meta-item"><i class="fas fa-video"></i> Videos paso a paso</span>
                                            <span class="cv2-hero__meta-item"><i class="far fa-file-alt"></i> +50 prompts pro</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price highlight -->
                                <div class="cv2-price">
                                    <div>
                                        <div class="cv2-price__label">Precio exclusivo online</div>
                                        <div class="cv2-price__row">
                                            <span class="cv2-price__was"><?= $precioCursoOficial ?></span>
                                            <span class="cv2-price__now"><?= $simbolo . ' ' . convertirPrecio($value, $moneda) ?></span>
                                            <span style="color: var(--text-muted); font-size:14px; font-weight:500;"><?= $textoIVA ?></span>
                                        </div>
                                        <div class="cv2-price__note">Pago por única vez · Acceso inmediato</div>
                                    </div>
                                    <div class="cv2-price__discount">
                                        <i class="fas fa-fire-alt"></i>
                                        Ahorrás <?= $diferencia ?>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!-- Upsells (se preservan clases/IDs que checkoutv4.js usa) -->
                        <?php if (!empty($data['pack'])): ?>
                            <div class="cv2-card">
                                <div class="cv2-card__body" style="padding-top: 16px; padding-bottom: 16px;">
                                    <?php foreach ($data['pack'] as $c => $item):
                                        $precioItem = $item['PRECIO'];
                                    ?>
                                        <div class="col-12 p-0 animate__animated animate__delay-2s animate__shakeX animate__1">
                                            <div class="col-md-12 section-header-checkout-next">
                                                <div class="row p-3">
                                                    <h4 class="titulo h4 text-black text-md-left text-center" style="width:100%">
                                                        <input class="check-producto-paquete" type="checkbox" id="up_<?= $item['ID_ABRE_PACK'] ?>" value="<?= $item['ID_ABRE_PACK'] ?>"/>
                                                        <input id="id_up_<?= $item['ID_ABRE_PACK'] ?>" value="<?= $item['ID_UPSELL'] ?? '' ?>" hidden=""/>
                                                        <?= str_replace('{#MONTO}', ($simbolo . ' ' . convertirPrecio($precioItem, $moneda) . ' ' . $moneda), $item['TITULO_2']) ?>
                                                    </h4>
                                                    <p class="subtitulo p-0 m-0 text-md-left text-center" style="width:100%">
                                                        <?= str_replace('{#MONTO}', ($simbolo . ' ' . convertirPrecio($precioItem, $moneda) . ' ' . $moneda), $item['DESCRIPCION']) ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Cart -->
                        <article class="cv2-card">
                            <div class="cv2-card__body">
                                <h3 class="cv2-card__title">Tu <span class="cv2-accent">carrito</span></h3>

                                <ul class="detalle-checkout" style="list-style:none; padding:0; margin:0;">
                                    <li>
                                        <div class="cv2-cart-line">
                                            <div class="cv2-cart-thumb">G</div>
                                            <div class="cv2-cart-info">
                                                <h6 class="cv2-cart-name"><?= $curso['TITULO'] ?></h6>
                                                <span class="cv2-cart-offer"><i class="fas fa-fire-alt" style="font-size:10px"></i> OFERTA</span>
                                            </div>
                                            <span id="item_price_currency" class="cv2-cart-prices">
                                                <span class="precio-original"><?= $precioCursoOficial ?></span>
                                                <span class="cv2-cart-save">-<?= $diferencia ?></span>
                                            </span>
                                        </div>
                                    </li>

                                    <?php foreach ($data['pack'] as $c => $item):
                                        $precioItem = $item['PRECIO'];
                                    ?>
                                        <li id="item_<?= $item['ID_ABRE_PACK'] ?>">
                                            <div class="cv2-cart-line">
                                                <input type="number" id="<?= $item['ID_ABRE_PACK'] ?>_item_price" value="<?= $precioItem ?>" hidden>
                                                <div class="cv2-cart-thumb" style="background: linear-gradient(135deg, #F59E0B, #EA580C);"><i class="fas fa-plus" style="font-size:14px"></i></div>
                                                <div class="cv2-cart-info">
                                                    <h6 class="cv2-cart-name"><?= $item['TITULO_1'] ?></h6>
                                                    <small style="color: var(--text-muted); font-size:12px;">De por vida</small>
                                                </div>
                                                <span class="cv2-cart-prices">
                                                    <strong style="color: var(--text-primary); font-size:14px;"><?= $simbolo . ' ' . convertirPrecio($precioItem, $moneda) . ' ' . $moneda ?></strong>
                                                </span>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <div class="cv2-cart-total">
                                    <div>
                                        <div class="cv2-cart-total__label">Total</div>
                                        <span class="cv2-cart-total__sub">Pago por única vez</span>
                                    </div>
                                    <b id="total_price"><?= $precioCurso ?></b>
                                </div>
                            </div>
                        </article>

                        <!-- Benefits + Testimonials -->
                        <article class="cv2-card">
                            <div class="cv2-card__body">
                                <h3 class="cv2-card__title">¿Por qué la gente <span class="cv2-accent">nos elige?</span></h3>

                                <ul class="cv2-benefits">
                                    <li class="cv2-benefit">
                                        <span class="cv2-benefit__icon"><i class="fas fa-infinity"></i></span>
                                        <span>Acceso ilimitado</span>
                                    </li>
                                    <li class="cv2-benefit">
                                        <span class="cv2-benefit__icon"><i class="fas fa-comments"></i></span>
                                        <span>Soporte dado por los profesores</span>
                                    </li>
                                    <li class="cv2-benefit">
                                        <span class="cv2-benefit__icon"><i class="fas fa-video"></i></span>
                                        <span>Videos bien explicados paso a paso</span>
                                    </li>
                                    <li class="cv2-benefit">
                                        <span class="cv2-benefit__icon"><i class="fas fa-file-download"></i></span>
                                        <span>+50 prompts profesionales descargables</span>
                                    </li>
                                </ul>

                                <!-- Testimonial carousel (estructura Bootstrap conservada) -->
                                <div class="mt-4" id="carouselExampleControls" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="comentarios">
                                                <p>"Muy satisfecha. Todos los puntos explicados en detalle. Entendí muy bien cada uno de los temas, animo a la gente a que realice este curso."</p>
                                                <div>
                                                    <div class="rating-user d-inline">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="blockquote-footer">
                                                        <b>Laura Miller</b>, Junín, Buenos Aires
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="comentarios">
                                                <p>"Muy buena elección. Didáctico y fácil de entender. Los profes me ayudaron cada vez que tuve dudas."</p>
                                                <div>
                                                    <div class="rating-user d-inline">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="blockquote-footer">
                                                        <b>Felipe Salcedo</b>, San Rafael, Mendoza
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                                    </ol>
                                </div>
                            </div>
                        </article>

                    </section>

                    <!-- =========================================================
                         RIGHT COLUMN — FORM
                         ========================================================= -->
                    <aside>
                        <div class="cv2-card cv2-form-card">
                            <div class="cv2-payments">
                                <img alt="Mercado Pago - Medios de pago" title="Mercado Pago - Medios de pago" src="https://imgmp.mlstatic.com/org-img/banners/ar/medios/online/468X60.jpg">
                            </div>
                            <div class="cv2-card__body">
                                <div class="cv2-trust-line">
                                    <i class="fas fa-lock"></i>
                                    Tus datos de contacto están seguros
                                </div>
                                <h2 class="cv2-form-title">¿Dónde querés recibir tu curso?</h2>

                                <?php include('../n-pages/form.php') ?>

                                <div class="cv2-cta-subtext">
                                    <i class="fas fa-check-circle"></i>
                                    Compra 100% segura · Sin cargos ocultos
                                </div>
                            </div>
                        </div>

                        <!-- Trust badges -->
                        <div class="cv2-trust-badges">
                            <div class="card-scv">
                                <img src="../n-img/iconos-cuadros3.png" alt="">
                                <span>Protegemos tu privacidad</span>
                            </div>
                            <div class="card-scv">
                                <img src="../n-img/iconos-cuadros2.png" alt="">
                                <span>Tus datos están seguros</span>
                            </div>
                            <div class="card-scv">
                                <img src="../n-img/iconos-cuadros1.png" alt="">
                                <span>Garantía de satisfacción 100%</span>
                            </div>
                        </div>

                        <?php if($haveWhatsapp) { ?>
                        <div class="cv2-whatsapp">
                            <p>¿Querés comunicarte con nosotros?</p>
                            <a href="https://api.whatsapp.com/send?phone=<?= $numberWhatsapp ?>">
                                <img src="../n-img/whatsapp-image.png" alt="Contactanos por WhatsApp">
                            </a>
                        </div>
                        <?php } ?>
                    </aside>
                </div>
            </div>

            <!-- Mobile sticky bar -->
            <div class="cv2-mobile-bar">
                <div class="cv2-mobile-bar__price">
                    <div class="cv2-mobile-bar__price-label">Total</div>
                    <div class="cv2-mobile-bar__price-value"><?= $precioCurso ?></div>
                </div>
                <button type="button" class="cv2-mobile-cta" onclick="document.getElementById('proceder_pago').click()">
                    Pagar <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </main>

        <?php include('../n-pages/footer-cursos.php') ?>
        <script src="../n-libraries/js/mailcheck.js"></script>
        <script src="../n-libraries/js/jquery.validate.min.js"></script>
        <script>
<?php
foreach ($data['pack'] as $c => $item) {
    if ($item['PRECIO'] > 0) {
        echo '$("#item_' . $item['ID_ABRE_PACK'] . '").attr("style", "display: none!important");';
    }
}
?>
        </script>
        <script src="../n-libraries/js/checkoutv4.js?t=6"></script>
        <script>
            // Espejar #total_price al mobile sticky bar sin tocar checkoutv4.js.
            (function () {
                var src = document.getElementById('total_price');
                var dst = document.querySelector('.cv2-mobile-bar__price-value');
                if (!src || !dst) return;
                var sync = function () { dst.textContent = src.textContent || src.innerText; };
                sync();
                // checkoutv4.js actualiza con jQuery .html() -> MutationObserver lo captura.
                try {
                    new MutationObserver(sync).observe(src, { childList: true, characterData: true, subtree: true });
                } catch (e) {}
            })();
        </script>
    </body>
</html>
