<?php
if(isset($titulo) && $titulo == 'Carrito'){
    $titulo = $titulo . (isset($curso) ? ' - ' . $curso['TITULO'] : '');
}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title><?= $titulo ?></title>
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,800,900">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20Black.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20Black%20Italic.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20Bold.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20Bold%20Italic.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20ExtraBold.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20ExtraBold%20Italic.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20ExtraLight.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20ExtraLight%20Italic.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20Italic.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20Light.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20Light%20Italic.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20Medium.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20Medium%20Italic.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20Regular.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20SemiBold.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20SemiBold%20Italic.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20Thin.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/Raleway%20Thin%20Italic.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/fonts/font-awesome.min.css">
<link rel="stylesheet" href="<?= isset($dirpage) ? $dirpage : '' ?>n-assets/css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" crossorigin="anonymous">
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