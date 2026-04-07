<!-- Bootstrap 4.6 (actualizado desde 4.0.0-beta) via jsDelivr CDN estable -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<!-- Montserrat desde Google Fonts (1 request) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400,800,900&display=swap" rel="stylesheet">

<!-- FIX FOUT: preload de las fuentes críticas above-the-fold.
     El browser las descarga en paralelo con el CSS, así están listas
     antes del primer render y no hay flash de fuente incorrecta. -->
<link rel="preload" href="/n-assets/fonts/Raleway-Black.woff" as="font" type="font/woff" crossorigin="anonymous">
<link rel="preload" href="/n-assets/fonts/Raleway-SemiBold.woff" as="font" type="font/woff" crossorigin="anonymous">
<link rel="preload" href="/n-assets/fonts/Raleway-Bold.woff" as="font" type="font/woff" crossorigin="anonymous">
<link rel="preload" href="/n-assets/fonts/Raleway-Regular.woff" as="font" type="font/woff" crossorigin="anonymous">

<!-- FIX BUG-03: 19 archivos CSS de Raleway consolidados en 1 solo archivo local.
     Mantiene los nombres de fuente originales ('Raleway Black', 'Raleway Bold', etc.)
     que usa el CSS del sitio. Reduce de 19 requests HTTP a 1. -->
<link rel="stylesheet" href="n-assets/css/raleway-all.css">
<link rel="stylesheet" href="n-assets/fonts/font-awesome.min.css">
<link rel="stylesheet" href="n-assets/css/style.css">
<link rel="stylesheet" href="n-assets/css/styles.css">
<link rel="stylesheet" href="n-css/style.css">
<link rel="apple-touch-icon" sizes="180x180" href="<?= isset($dirpage) ? $dirpage : '' ?>n-img/logo/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?= isset($dirpage) ? $dirpage : '' ?>n-img/logo/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?= isset($dirpage) ? $dirpage : '' ?>n-img/logo/favicon-16x16.png">
<style>
    .review-persona{
        width: 80px;
    }
</style>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PR68WN3');</script>
<!-- End Google Tag Manager -->