<?php
if(isset($titulo) && $titulo == 'Carrito'){
    $titulo = $titulo . (isset($curso) ? ' - ' . $curso['TITULO'] : '');
}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title><?= $titulo ?></title>
<!-- Bootstrap 4.6 via jsDelivr (reemplaza bundle local) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<!-- Montserrat desde Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400,800,900&display=swap" rel="stylesheet">

<!-- FIX FOUT: preload de fuentes críticas — se descargan antes del primer render -->
<link rel="preload" href="/n-assets/fonts/Raleway-Black.woff" as="font" type="font/woff" crossorigin="anonymous">
<link rel="preload" href="/n-assets/fonts/Raleway-SemiBold.woff" as="font" type="font/woff" crossorigin="anonymous">
<link rel="preload" href="/n-assets/fonts/Raleway-Bold.woff" as="font" type="font/woff" crossorigin="anonymous">
<link rel="preload" href="/n-assets/fonts/Raleway-Regular.woff" as="font" type="font/woff" crossorigin="anonymous">
<link rel="preload" href="/n-assets/fonts/Raleway-Light.woff" as="font" type="font/woff" crossorigin="anonymous">

<!-- 19 CSS Raleway → 1 archivo consolidado con font-display:block -->
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