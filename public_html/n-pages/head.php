<?php
if(isset($titulo) && $titulo == 'Carrito'){
    $titulo = $titulo . (isset($curso) ? ' - ' . $curso['TITULO'] : '');
}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title><?= isset($seo_title) ? $seo_title : $titulo . ' | Aprende Excel - Cursos Online con Certificado' ?></title>

<!-- SEO Meta Tags -->
<meta name="description" content="<?= isset($seo_description) ? $seo_description : 'Curso online de ' . $titulo . ' con certificado oficial. Aprende con videos paso a paso, acceso de por vida y garantía de 7 días. Líderes en educación online y capacitaciones laborales.' ?>">
<meta name="keywords" content="<?= isset($seo_keywords) ? $seo_keywords : 'curso ' . strtolower($titulo) . ', ' . strtolower($titulo) . ' online, aprender ' . strtolower($titulo) . ', curso online con certificado, capacitaciones laborales, educación online, inteligencia artificial, cursos de excel, formación profesional' ?>">
<meta name="author" content="Aprende Excel - Academia de Capacitación Online">
<meta name="robots" content="<?= isset($seo_noindex) ? 'noindex, nofollow' : 'index, follow' ?>">
<link rel="canonical" href="<?= isset($seo_canonical) ? $seo_canonical : 'https://aprende-excel.com/' . (isset($seo_slug) ? $seo_slug . '/' : '') ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="<?= isset($seo_og_type) ? $seo_og_type : 'product' ?>">
<meta property="og:url" content="<?= isset($seo_canonical) ? $seo_canonical : 'https://aprende-excel.com/' . (isset($seo_slug) ? $seo_slug . '/' : '') ?>">
<meta property="og:title" content="<?= isset($seo_og_title) ? $seo_og_title : 'Curso de ' . $titulo . ' Online con Certificado | Aprende Excel' ?>">
<meta property="og:description" content="<?= isset($seo_description) ? $seo_description : 'Curso online de ' . $titulo . ' con certificado oficial. +15.000 estudiantes. Acceso de por vida y garantía de devolución.' ?>">
<meta property="og:image" content="<?= isset($seo_image) ? $seo_image : 'https://aprende-excel.com/n-assets/img/logo-excel.png' ?>">
<meta property="og:site_name" content="Aprende Excel">
<meta property="og:locale" content="es_LA">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= isset($seo_og_title) ? $seo_og_title : 'Curso de ' . $titulo . ' Online | Aprende Excel' ?>">
<meta name="twitter:description" content="<?= isset($seo_description) ? $seo_description : 'Curso online de ' . $titulo . ' con certificado oficial. Líderes en educación online.' ?>">
<meta name="twitter:image" content="<?= isset($seo_image) ? $seo_image : 'https://aprende-excel.com/n-assets/img/logo-excel.png' ?>">

<?php if (isset($seo_structured_data)): ?>
<!-- Structured Data - Course Schema -->
<script type="application/ld+json">
<?= $seo_structured_data ?>
</script>
<?php endif; ?>

<!-- DNS prefetch para CDNs externos -->
<link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
<link rel="dns-prefetch" href="https://fonts.googleapis.com">
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link rel="dns-prefetch" href="https://www.googletagmanager.com">

<!-- Bootstrap 4.6 via jsDelivr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<!-- Montserrat desde Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;800;900&display=swap" rel="stylesheet">

<!-- Preload solo las 2 fuentes más críticas (above-the-fold) -->
<link rel="preload" href="/n-assets/fonts/Raleway-Regular.woff" as="font" type="font/woff" crossorigin="anonymous">
<link rel="preload" href="/n-assets/fonts/Raleway-Bold.woff" as="font" type="font/woff" crossorigin="anonymous">

<!-- Raleway: solo 6 variantes usadas, font-display:swap -->
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/raleway-all.css">

<!-- FontAwesome local (se elimina duplicado CDN externo) -->
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/fonts/font-awesome.min.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/style.css">
<link rel="apple-touch-icon" sizes="180x180" href="<?= isset($dirpage) ? $dirpage : '' ?>n-img/logo/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?= isset($dirpage) ? $dirpage : '' ?>n-img/logo/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?= isset($dirpage) ? $dirpage : '' ?>n-img/logo/favicon-16x16.png">
<style>
    .lead {
        list-style-type:none;
        padding: 0px;
    }
    .lead li i{
        margin-right: 1em;
    }
    .card{
        border-radius: 5px;
        box-shadow: rgb(205 205 205) 3px 3px 5px 3px;
        background: rgb(255, 255, 255);
        margin-bottom: 10px;    
    } 
    .card .card-header{
        background-color: #fff;
    }

    .card .card-header button {
        color: black;
        font-weight: bolder;
    }
</style>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PR68WN3');</script>
<!-- End Google Tag Manager -->