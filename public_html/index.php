<?php
// FIX BUG-11: display_errors solo activo en entorno local o con variable de entorno DEBUG=true.
// Antes: cualquier visitante podía activarlo con ?test en la URL (exponía paths y errores PHP).
$isDebugEnv   = getenv('APP_ENV') === 'local' || getenv('APP_DEBUG') === 'true';
$isLocalIP    = in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1']);
if ($isDebugEnv || $isLocalIP) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}
    
$dirpage = '../';

include("a-includes/funcionsDB.php");
include("a-includes/logicparametros.php");
include("a-includes/logicprecios.php");

$numberWhatsapp = getenv('WHATSAPP_NUMBER') ?: '';
$urlWhatsApp = 'https://api.whatsapp.com/send?phone='.$numberWhatsapp.'&text=Hola!%20Te%20escribo%20por%20el%20curso%20de%20Excel';

// Precargar TODOS los cursos del home en una sola query (en lugar de 10+ individuales).
// Antes: ~20 queries SQL por render del home. Ahora: 1 query.
$__idsCursosHome = [
    'excel-promo', 'excel-inicial', 'excel-intermedio', 'excel-avanzado',
    'sql-server', 'pack-office', 'power-bi', 'power-bi-avanzado',
    'excel-promo-power-bi', 'plantillas',
];
$__cursosBatch = getCursosDetalleBatch($__idsCursosHome);

// Helper: extrae precio, precio oficial y URL de checkout desde el batch precargado.
function extraerDatosCurso($idCurso, $simbolo, $moneda) {
    global $__cursosBatch;
    $producto = $__cursosBatch[$idCurso] ?? null;

    if ($producto === null) {
        return [
            'precio'         => '',
            'precioOficial'  => '',
            'urlCheckout'    => '#',
        ];
    }

    $precioRaw        = isset($producto['PRECIO'])         ? $producto['PRECIO']         : '';
    $precioOficialRaw = isset($producto['PRECIO_OFICIAL']) ? $producto['PRECIO_OFICIAL'] : '';
    $urlCheckout      = isset($producto['URL_CHECKOUT'])   ? $producto['URL_CHECKOUT']   : '#';

    $precio        = $precioRaw        !== '' ? $simbolo . ' ' . convertirPrecio($precioRaw,        $moneda) : '';
    $precioOficial = $precioOficialRaw !== '' ? $simbolo . ' ' . convertirPrecio($precioOficialRaw, $moneda) : '';

    return [
        'precio'        => $precio,
        'precioOficial' => $precioOficial,
        'urlCheckout'   => $urlCheckout,
    ];
}

$datosCursoExcelPromo        = extraerDatosCurso('excel-promo',          $simbolo, $moneda);
$datosCursoExcelInicial      = extraerDatosCurso('excel-inicial',        $simbolo, $moneda);
$datosCursoExcelIntermedio   = extraerDatosCurso('excel-intermedio',     $simbolo, $moneda);
$datosCursoExcelAvanzado     = extraerDatosCurso('excel-avanzado',       $simbolo, $moneda);
$datosCursoSqlServer         = extraerDatosCurso('sql-server',           $simbolo, $moneda);
$datosCursoPackOffice        = extraerDatosCurso('pack-office',          $simbolo, $moneda);
$datosCursoPowerBi           = extraerDatosCurso('power-bi',             $simbolo, $moneda);
$datosCursoPowerBiAvanzado   = extraerDatosCurso('power-bi-avanzado',    $simbolo, $moneda);
$datosCursoExcelPromoPowerBI = extraerDatosCurso('excel-promo-power-bi', $simbolo, $moneda);
$datosCursoPlantillas        = extraerDatosCurso('plantillas',           $simbolo, $moneda);

// Variables de precio y URL para cada curso
$precioCursoExcelPromo              = $datosCursoExcelPromo['precio'];
$precioCursoOficialExcelPromo       = $datosCursoExcelPromo['precioOficial'];
$urlCheckoutExcelPromo              = $datosCursoExcelPromo['urlCheckout'];

$precioCursoExcelInicial            = $datosCursoExcelInicial['precio'];
$precioCursoOficialExcelInicial     = $datosCursoExcelInicial['precioOficial'];
$urlCheckoutExcelInicial            = $datosCursoExcelInicial['urlCheckout'];

$precioCursoExcelIntermedio         = $datosCursoExcelIntermedio['precio'];
$precioCursoOficialExcelIntermedio  = $datosCursoExcelIntermedio['precioOficial'];
$urlCheckoutExcelIntermedio         = $datosCursoExcelIntermedio['urlCheckout'];

$precioCursoExcelAvanzado           = $datosCursoExcelAvanzado['precio'];
$precioCursoOficialExcelAvanzado    = $datosCursoExcelAvanzado['precioOficial'];
$urlCheckoutExcelAvanzado           = $datosCursoExcelAvanzado['urlCheckout'];

$precioCursoSqlServer               = $datosCursoSqlServer['precio'];
$precioCursoOficialSqlServer        = $datosCursoSqlServer['precioOficial'];
$urlCheckoutSqlServer               = $datosCursoSqlServer['urlCheckout'];

$precioCursoPackOffice              = $datosCursoPackOffice['precio'];
$precioCursoOficialPackOffice       = $datosCursoPackOffice['precioOficial'];
$urlCheckoutPackOffice              = $datosCursoPackOffice['urlCheckout'];

$precioCursoPowerBi                 = $datosCursoPowerBi['precio'];
$precioCursoOficialPowerBi          = $datosCursoPowerBi['precioOficial'];
$urlCheckoutPowerBi                 = $datosCursoPowerBi['urlCheckout'];

$precioCursoPowerBiAvanzado         = $datosCursoPowerBiAvanzado['precio'];
$precioCursoOficialPowerBiAvanzado  = $datosCursoPowerBiAvanzado['precioOficial'];
$urlCheckoutPowerBiAvanzado         = $datosCursoPowerBiAvanzado['urlCheckout'];

$precioCursoExcelPromoPowerBI       = $datosCursoExcelPromoPowerBI['precio'];
$precioCursoOficialExcelPromoPowerBI = $datosCursoExcelPromoPowerBI['precioOficial'];
$urlCheckoutExcelPromoPowerBI       = $datosCursoExcelPromoPowerBI['urlCheckout'];

$precioCursoPlantillas              = $datosCursoPlantillas['precio'];
$precioCursoOficialPlantillas       = $datosCursoPlantillas['precioOficial'];
$urlCheckoutPlantillas              = $datosCursoPlantillas['urlCheckout'];

// SEO Variables para head-main.php
$seo_description = 'Aprende Excel, Power BI, Inteligencia Artificial y más con cursos online con certificado oficial. Líderes en educación online y capacitaciones laborales. +15.000 estudiantes. Acceso de por vida, videos paso a paso y garantía de 7 días.';
$seo_keywords = 'cursos de excel online, curso excel con certificado, aprender excel desde cero, curso power bi, cursos de inteligencia artificial, capacitaciones laborales online, educación online, cursos online con certificado, excel para empresas, líderes en cursos online, formación profesional, curso excel avanzado, curso excel intermedio, curso excel inicial, microsoft office online, sql server curso, power bi avanzado, cursos IA, herramientas de productividad, excel para el trabajo';
$seo_canonical = 'https://aprende-excel.com/';
$seo_og_title = 'Aprende Excel | Cursos Online de Excel, Power BI, IA y Capacitaciones Laborales';
$seo_image = 'https://aprende-excel.com/n-assets/img/logo-excel.png';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Aprende Excel | Cursos Online de Excel, Power BI e Inteligencia Artificial con Certificado</title>
        <?php include('n-pages/head-main.php') ?>
        <meta name="facebook-domain-verification" content="o3o30mm5uo4a74505h53yhntshexbm" />

        <!-- Structured Data: Organization -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "EducationalOrganization",
            "name": "Aprende Excel",
            "url": "https://aprende-excel.com",
            "logo": "https://aprende-excel.com/n-assets/img/logo-excel.png",
            "description": "Líderes en educación online. Cursos de Excel, Power BI, Inteligencia Artificial y capacitaciones laborales con certificado oficial.",
            "sameAs": [],
            "contactPoint": {
                "@type": "ContactPoint",
                "contactType": "customer service",
                "availableLanguage": "Spanish"
            },
            "areaServed": {
                "@type": "Place",
                "name": "Latinoamérica"
            }
        }
        </script>

        <!-- Structured Data: Course List -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ItemList",
            "name": "Cursos Online de Excel, Power BI e Inteligencia Artificial",
            "description": "Catálogo de cursos online con certificado oficial. Líderes en capacitaciones laborales y educación online.",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "item": {
                        "@type": "Course",
                        "name": "Excel Promo 3 en 1 (Inicial + Intermedio + Avanzado)",
                        "description": "Curso completo de Excel desde cero hasta nivel avanzado. Aprende funciones, tablas dinámicas, macros y más.",
                        "provider": {"@type": "Organization", "name": "Aprende Excel"},
                        "url": "https://aprende-excel.com/excel-promo/"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "item": {
                        "@type": "Course",
                        "name": "Excel Nivel Inicial",
                        "description": "Aprende Excel desde cero. Curso online con videos paso a paso y certificado oficial.",
                        "provider": {"@type": "Organization", "name": "Aprende Excel"},
                        "url": "https://aprende-excel.com/excel-inicial/"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "item": {
                        "@type": "Course",
                        "name": "Excel Nivel Intermedio",
                        "description": "Domina funciones intermedias de Excel: tablas dinámicas, gráficos avanzados y fórmulas complejas.",
                        "provider": {"@type": "Organization", "name": "Aprende Excel"},
                        "url": "https://aprende-excel.com/excel-intermedio/"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 4,
                    "item": {
                        "@type": "Course",
                        "name": "Excel Nivel Avanzado",
                        "description": "Conviértete en experto en Excel. Macros, VBA, funciones avanzadas y automatización.",
                        "provider": {"@type": "Organization", "name": "Aprende Excel"},
                        "url": "https://aprende-excel.com/excel-avanzado/"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 5,
                    "item": {
                        "@type": "Course",
                        "name": "Power BI",
                        "description": "Aprende Power BI desde cero. Visualización de datos, dashboards y business intelligence.",
                        "provider": {"@type": "Organization", "name": "Aprende Excel"},
                        "url": "https://aprende-excel.com/power-bi/"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 6,
                    "item": {
                        "@type": "Course",
                        "name": "Power BI Avanzado",
                        "description": "Nivel avanzado de Power BI. DAX, modelado de datos y reportes profesionales.",
                        "provider": {"@type": "Organization", "name": "Aprende Excel"},
                        "url": "https://aprende-excel.com/power-bi-avanzado/"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 7,
                    "item": {
                        "@type": "Course",
                        "name": "Pack Office Completo",
                        "description": "Domina Word, Excel, PowerPoint y más. El pack completo de Microsoft Office online.",
                        "provider": {"@type": "Organization", "name": "Aprende Excel"},
                        "url": "https://aprende-excel.com/pack-office/"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 8,
                    "item": {
                        "@type": "Course",
                        "name": "Microsoft SQL Server",
                        "description": "Aprende SQL Server desde cero. Bases de datos, consultas SQL y administración.",
                        "provider": {"@type": "Organization", "name": "Aprende Excel"},
                        "url": "https://aprende-excel.com/microsoft-sql-server/"
                    }
                }
            ]
        }
        </script>

        <!-- Structured Data: WebSite (para Google Search Box) -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Aprende Excel",
            "url": "https://aprende-excel.com",
            "description": "Líderes en cursos online de Excel, Power BI, Inteligencia Artificial y capacitaciones laborales con certificado oficial.",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://aprende-excel.com/?s={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }
        </script>
    </head>

    <body style="font-family: 'Raleway Regular';">
        <?php include('n-pages/header-main.php') ?>

        <?php if (isset($_GET['pago'])): ?>
            <?php if ($_GET['pago'] === 'exitoso'): ?>
            <div style="background:#28a745;color:#fff;text-align:center;padding:16px 20px;font-size:1.1rem;font-weight:bold;">
                ✅ ¡Tu pago fue procesado con éxito! En breve vas a recibir el acceso al curso por email.
            </div>
            <?php elseif ($_GET['pago'] === 'cancelado'): ?>
            <div style="background:#ffc107;color:#333;text-align:center;padding:16px 20px;font-size:1.05rem;">
                ⚠️ El pago fue cancelado. Podés volver a intentarlo cuando quieras.
            </div>
            <?php elseif ($_GET['pago'] === 'pendiente'): ?>
            <div style="background:#17a2b8;color:#fff;text-align:center;padding:16px 20px;font-size:1.05rem;">
                🕐 Tu pago está siendo procesado. Te avisamos por email cuando se confirme.
            </div>
            <?php endif; ?>
        <?php endif; ?>

        <section class="d-none d-md-block">
            <div class="row">
                <div class="col-md-6 m-auto text-center">
                    <div class="card-with-shaw p-3 flex-d mx-3 mx-md-0 mb-3 mb-md-0">
                        <img class="icono-trofeo-min img-fluid" src="n-img/icono-trofeo-min.png">
                        <span class="texto px-5"><b>Capacítate para los empleos de hoy</b></span>
                        <img class="icono-flecha img-fluid" src="n-img/icono-flecha.png">
                    </div>
                </div>
            </div>
        </section>

        <section class="d-block d-md-none">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <div class="card-with-shaw p-3 flex-d mx-3 mx-md-0 mb-3 mb-md-0">
                        <span class="texto px-md-5">
                            <b>
                                <img class="mg-fluid mr-2" src="n-img/icono-trofeo-min.png" style="width:30px"> 
                                Capacítate para los empleos de hoy 
                                <img class="img-fluid ml-2" src="n-img/icono-flecha.png" style="width:20px">
                            </b>
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <section class="seccion-3 mt-md-5  mb-md-5 position-relative" >
            <img class="icono-libro-min" src="n-img/icono-libro-min.png">
            <img class="background-verde-min" src="n-img/background-verde-min.jpg">
            <div class="row py-5">
                <div class="col-md-6 ">
                    <img class="img-fluid" src="n-img/imagen-laptop-web-min.png">
                </div>
                <div class="col-md-6 d-flex align-items-center m-5 m-md-0" style="color:#fff;">
                    <div>
                        <h2 style="font-family: 'Raleway Black';">Cursos cortos con amplia salida laboral</h2>
                        <p class="mt-0">Aprende a dominar las herramientas que más necesitan las empresas en Latinoamérica.</p>
                        <p class="mt-3"><img class="icono-small img-fluid" src="n-img/icono-small-1.png"> Cursos paso a paso.</p>
                        <p class="mt-0"><img class="icono-small img-fluid" src="n-img/icono-small-2.png"> Desde casa y con acceso ilimitado.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="cursos" class="mt-md-5 mb-md-5">
            <div class="row  m-5 m-md-0">
                <h1 class="text-center m-auto" style="font-family: 'Raleway Black'; color:#00173B;">¿Qué vas a <br><span style="color: #008B69;">aprender</span> hoy?</h1>
            </div>

            <div class="row p-3 p-md-5">
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img loading="lazy" class="img-fluid" src="n-img/excel-inicial-nueva-2024_11zon.webp" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">3 Niveles - Pack Experto</p>
                                <p style="font-size: 0.7em;text-align: left;">Convertite en un Experto en Excel con este pack de 3 cursos. ¡Sé el experto que las empresas están buscando!</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoExcelPromo ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialExcelPromo ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutExcelPromo ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img loading="lazy" class="img-fluid" src="n-img/c-excelinicial.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Excel Inicial</p>
                                <p style="font-size: 0.7em;text-align: left;">Sin requisitos previos, éste curso te va a enseñar a usar Microsoft Excel: la herramienta laboral más solicitada por las empresas.</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoExcelInicial ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialExcelInicial ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutExcelInicial ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img loading="lazy" class="img-fluid" src="n-img/c-excelintermedio.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Excel Intermedio</p>
                                <p style="font-size: 0.7em;text-align: left;">Entrenamiento para usuarios que ya tienen los conocimientos básicos de Microsoft Excel, para aprender en profundidad la mayoría de sus funcionalidades.</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoExcelIntermedio ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialExcelIntermedio ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutExcelIntermedio ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img loading="lazy" class="img-fluid" src="n-img/c-excelavanzado.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Excel Avanzado</p>
                                <p style="font-size: 0.7em;text-align: left;">Curso para terminar de conocer Excel y dominar sus funcionalidades más avanzadas. Ser Experto en Excel otorga una gran ventaja y abre las puertas a empleos muy bien pagos.</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoExcelAvanzado ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialExcelAvanzado ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutExcelAvanzado ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row p-3 p-md-5">



                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img loading="lazy" class="" src="n-img/c-sql.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Microsoft SQL Server</p>
                                <p style="font-size: 0.7em;text-align: left;">Aprendé a programar en base de datos desde cero. Recomendable para principiantes</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoSqlServer ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialSqlServer ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutSqlServer ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img loading="lazy" class="img-fluid" src="n-img/c-office2.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Pack Office</p>
                                <p style="font-size: 0.7em;text-align: left;">Pack de conocimientos clave e infaltables en un Currículum. Dominá las 3 herramientas más solicitadas por las empresas.</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoPackOffice ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialPackOffice ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutPackOffice ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img loading="lazy" class="img-fluid" src="n-img/c-powerbi.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Microsoft Power BI</p>
                                <p style="font-size: 0.7em;text-align: left;">Un especialista en Power BI gana un sueldo 3 vecess mayor a la media. Ésta herramienta de Inteligencia Empresarial permite crear tableros para visualizar datos. Sin requisitos previos</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoPowerBi ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialPowerBi ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutPowerBi ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img loading="lazy" class="img-fluid" src="n-img/c-powerbi-avanzado.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Microsoft Power BI Avanzado</p>
                                <p style="font-size: 0.7em;text-align: left;">Profundizá tus conocimientos a través de este Curso Avanzado de Power BI en 4.5 horas de curso</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoPowerBiAvanzado ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialPowerBiAvanzado ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutPowerBiAvanzado ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img loading="lazy" class="img-fluid" src="n-img/pack-power-bi-y-excel.jpg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Microsoft Power BI y Pack Excel</p>
                                <p style="font-size: 0.7em;text-align: left;">Con estos cursos vas a aprender a usar a fondo Microsoft Power y Excel en sus tres niveles. Explicados paso a paso en un total de 12.5 hs de videos, te enseñamos a usarlas en profundidad.</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoExcelPromoPowerBI ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialExcelPromoPowerBI ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutExcelPromoPowerBI ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img loading="lazy" class="img-fluid" src="/plantillas/finanzas/assets/img/finanzas.png" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Pack de plantillas de finanzas</p>
                                <p style="font-size: 0.7em;text-align: left;">Accede a estas plantillas y sé un profesional.<br>
Con estas plantillas entras en el mundo profesional. Administra tu empresa o presenta informes agradables visualmente. Desde Control de entrada y salida de dinero, Black and scholes, Presupuesto cascada, Calculadora de fibonacci y muchas más..</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;"><?= $precioCursoPlantillas ?><br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';"><strike><?= $precioCursoOficialPlantillas ?></strike></p>
                                <p>
                                    <a href="<?= $urlCheckoutPlantillas ?>" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                        <div>
                            <img loading="lazy" class="img-fluid" src="n-img/c-excelinicial.jpeg" style="width:100%">
                            <div class="p-3">
                                <p style="font-family: 'Raleway Bold'; color:#00173B">Curso de Gemini desde Cero</p>
                                <p style="font-size: 0.7em;text-align: left;">Aprendé a usar Google Gemini para potenciar tu productividad con Inteligencia Artificial. Curso paso a paso, sin requisitos previos.</p>
                                <p class="d-xl-flex align-items-xl-center m-0"><span class="texto-precio-head mr-2" style="font-family: Montserrat, sans-serif;font-weight: bold;color: #008B69;">¡Nuevo!<br></span></p>
                                <p style="color: #FF0000;font-family: 'Raleway SemiBold';">&nbsp;</p>
                                <p>
                                    <a href="/gemini-mockup/" class="btn btn-primary px-5" style="background: #007A6A; width:100%">Ver curso</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="seccion-5 section-background-verde-min position-relative d-flex align-items-center">
            <img class="d-none d-md-block background-verde-mujer-escuchando-min" src="n-img/background-verde-mujer-escuchando-min.jpg" loading="lazy" style="width:100%">    
            <div class="row mt-0 py-0 mt-md-5 py-md-5" style="width:100%">
                <div class="d-xl-flex align-items-xl-center col-md-3 pt-5 p-md-5">
                    <h3 class="ml-3 text-center text-md-left" style="font-family: 'Raleway Black';color: #ffffff;font-size: 1.5em;">¿Qué opinan nuestros estudiantes?</h3>
                </div>
                <div class="col-md-9">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4 pb-5 px-5 p-md-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <img loading="lazy" class="review-persona img-fluid" src="n-img/persona-1.jpeg">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Lo recomiendo, el profe explica muy bien y es facil ver los videos. gracias.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Belén</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <img loading="lazy" class="review-persona img-fluid" src="n-img/persona-2.jpeg">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Introduce muchas herramientas en excel. Muy satisfecho.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Federico</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <img loading="lazy" class="review-persona img-fluid" src="n-img/persona-3.jpeg">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Enseña muy bien, tengo poco manejo de pc y me fue de mucha utilidad.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Ramiro</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4 pb-5 px-5 p-md-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <img loading="lazy" class="review-persona img-fluid" src="n-img/persona-4.jpeg">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Muy completo! gracias.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Daniel</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <img loading="lazy" class="review-persona img-fluid" src="n-img/persona-5.jpeg">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Transmiten muy claro su conocimiento, algunas cosas yo ya las sabia pero me sirvio para profundizar lo que se de excel.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Laura</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-5">
                                        <div class="px-3 py-3" style="border-radius: 10px;box-shadow: 10px 10px 20px 14px rgb(205,205,205);background: #ffffff;">
                                            <div class="col" style="text-align: center;">
                                                <img loading="lazy" class="review-persona img-fluid" src="n-img/persona-6.jpeg">
                                                <p style="text-align: center;"><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i><i class="fa fa-star" style="color: #F7AC3B;"></i></p>
                                                <p style="font-size: 0.7em;text-align: left;">Excelente.</p>
                                                <h5 style="font-family: 'Raleway Bold';color: #00173B;">Alejandro</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-md-5 mb-md-5">
            <div class="row m-5 m-md-0">
                <h1 class="text-center m-auto" style="font-family: 'Raleway Black'; color:#00173B;"><span style="color: #008B69;">Marcas</span> con las que hemos trabajado</h1>
            </div>
            <div class="row px-md-5 py-md-5">
                <div class="col-6 col-md-3 py-3 px-5  d-flex align-items-center">
                    <img loading="lazy" class="img-fluid" src="n-img/e-cruzceleste.jpeg"/>
                </div>
                <div class="col-6 col-md-3 py-3 px-5  d-flex align-items-center">
                    <img loading="lazy" class="img-fluid" src="n-img/e-dggroup.jpeg"/>
                </div>
                <div class="col-6 col-md-3 py-3 px-5  d-flex align-items-center">
                    <img loading="lazy" class="img-fluid" src="n-img/e-fincaelpongo.jpeg"/>
                </div>
                <div class="col-6 col-md-3 py-3 px-5 d-flex align-items-center">
                    <img loading="lazy" class="img-fluid" src="n-img/e-greenoil.jpeg"/>
                </div>

                <div class="col-6 col-md-3 py-3 px-5 d-flex align-items-center">
                    <img loading="lazy" class="img-fluid" src="n-img/e-santarita.jpeg"/>
                </div>
                <div class="col-6 col-md-3 py-3 px-5 d-flex align-items-center">
                    <img loading="lazy" class="img-fluid" src="n-img/e-simiente.jpeg"/>
                </div>
                <div class="col-6 col-md-3 py-3 px-5 d-flex align-items-center">
                    <img loading="lazy" class="img-fluid" src="n-img/e-sumed.jpeg"/>
                </div>

                <div class="col-6 col-md-3 py-3 px-5 d-flex align-items-center">
                    <img loading="lazy" class="img-fluid" src="n-img/e-nosis.jpeg"/>
                </div>
            </div>
        </section>	

        <section class="mt-md-5 mb-md-5">
            <div class="row">
                <div class="col-md-6 p-md-5 m-5 m-md-0">
                    <img loading="lazy" class="img-fluid" src="n-img/imagen-persona-min.png"/>
                </div>
                <div class="col-md-6 p-md-5 mb-5 mb-md-0 mx-5 mx-md-0 ">
                    <h1 class="m-auto" style="font-family: 'Raleway Black'; color:#00173B;">¿Tienes un <span style="color: #008B69;">negocio?</span></h1>
                    <p>Más de 270 empresas capacitaron a su personal con Aprende Excel. Consultanos por promociones y paquetes personalizados</p>
                    <form id="contacto" class="pb-5 pb-md-0"  name="formulario" method="post" action="./n-pages/formulario.php">
                        <div class="form-group">
                            <input class="form-control" name="nombre" id="inputNombre" aria-describedby="nombreHelp" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="telefono" id="inputTel" aria-describedby="telHelp" placeholder="Teléfono">
                        </div>

                        <div class="form-group">
                            <textarea maxlength="250" class="form-control" name="comentario" id="inputComentario" aria-describedby="comentarioHelp" placeholder="Comentario"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-verde-blanco">Enviar</button>
                    </form>
                    <?php
                    if (isset($_GET['enviado']) && $_GET['enviado'] == 1) {
                        echo '<div class="mt-3 alert alert-success" role="alert">
                        Tu mensaje fue enviado
                      </div>';
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php include('n-pages/footer-main.php') ?>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>
