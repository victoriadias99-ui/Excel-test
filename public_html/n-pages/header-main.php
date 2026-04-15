<?php
$curso = getCursoDetalle('excel');
$precioCursoOficialExcelInicial = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100), $moneda) . ' <small>' . $moneda . '</small>';
$precioCursoExcelInicial = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'], $moneda) . ' <small>' . $moneda . '</small>';
$urlCheckoutExcelInicial = 'excel-inicial/';

$curso = getCursoDetalle('excel_intermedio');
$precioCursoOficialExcelIntermedio = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100), $moneda) . ' <small>' . $moneda . '</small>';
$precioCursoExcelIntermedio = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'], $moneda) . ' <small>' . $moneda . '</small>';
$urlCheckoutExcelIntermedio = 'excel-intermedio/';

$curso = getCursoDetalle('excel_avanzado');
$precioCursoOficialExcelAvanzado = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100), $moneda) . ' <small>' . $moneda . '</small>';
$precioCursoExcelAvanzado = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'], $moneda) . ' <small>' . $moneda . '</small>';
$urlCheckoutExcelAvanzado = 'excel-avanzado/';

$curso = getCursoDetalle('excel_promo');
$precioCursoOficialExcelPromo = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100), $moneda) . ' <small>' . $moneda . '</small>';
$precioCursoExcelPromo = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'], $moneda) . ' <small>' . $moneda . '</small>';
$urlCheckoutExcelPromo = 'excel-promo/';

$curso = getCursoDetalle('office');
$precioCursoOficialPackOffice = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100), $moneda) . ' <small>' . $moneda . '</small>';
$precioCursoPackOffice = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'], $moneda) . ' <small>' . $moneda . '</small>';
$urlCheckoutPackOffice = 'pack-office/';

$curso = getCursoDetalle('powerbi');
$precioCursoOficialPowerBi = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100), $moneda) . ' <small>' . $moneda . '</small>';
$precioCursoPowerBi = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'], $moneda) . ' <small>' . $moneda . '</small>';
$urlCheckoutPowerBi = 'power-bi/';

$curso = getCursoDetalle('sql');
$precioCursoOficialSqlServer = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100), $moneda) . ' <small>' . $moneda . '</small>';
$precioCursoSqlServer = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'], $moneda) . ' <small>' . $moneda . '</small>';
$urlCheckoutSqlServer = 'microsoft-sql-server/';

$curso = getCursoDetalle('pbi_avanzado');
$precioCursoOficialPowerBiAvanzado = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100), $moneda) . ' <small>' . $moneda . '</small>';
$precioCursoPowerBiAvanzado = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'], $moneda) . ' <small>' . $moneda . '</small>';
$urlCheckoutPowerBiAvanzado = 'power-bi-avanzado/';


$curso = getCursoDetalle('prom_pbi_excel');
$precioCursoOficialExcelPromoPowerBI = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100), $moneda) . ' <small>' . $moneda . '</small>';
$precioCursoExcelPromoPowerBI = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'], $moneda) . ' <small>' . $moneda . '</small>';
$urlCheckoutExcelPromoPowerBI = 'power-bi-y-excel/';

$curso = getCursoDetalle('pantilla_finanzas');
$precioCursoOficialPlantillas = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100), $moneda) . ' <small>' . $moneda . '</small>';
$precioCursoPlantillas = $simbolo . ' ' . convertirPrecio($curso['PRECIO_UNITARIO'], $moneda) . ' <small>' . $moneda . '</small>';
$urlCheckoutPlantillas = 'plantillas/finanzas/';
?>
<header class="position-relative">
    <nav class="navbar px-md-5 px-3 navbar-expand-lg navbar-dark bg-light">
        <a class="navbar-brand" href="">
            <img src="n-assets/img/logo-excel.png" alt="Aprende Excel - Cursos Online de Excel, Power BI e Inteligencia Artificial" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownExcel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Excel
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownExcel">
                        <a class="dropdown-item" href="<?= $urlCheckoutExcelInicial ?>">Excel Nivel Inicial</a>
                        <a class="dropdown-item" href="<?= $urlCheckoutExcelIntermedio ?>">Excel Nivel Intermedio</a>
                        <a class="dropdown-item" href="<?= $urlCheckoutExcelAvanzado ?>">Excel Nivel Avanzado</a>
                        <a class="dropdown-item" href="<?= $urlCheckoutExcelPromo ?>">Excel promo 3 en 1</a>
                        <a class="dropdown-item" href="<?= $urlCheckoutExcelPromoPowerBI ?>">Excel promo 3 y Power BI</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $urlCheckoutPackOffice ?>">Pack Office</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPBI" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Power BI
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownPBI">
                        <a class="dropdown-item" href="<?= $urlCheckoutPowerBi ?>">Power BI Inicial</a>
                        <a class="dropdown-item" href="<?= $urlCheckoutExcelPromoPowerBI ?>">Power BI y Excel promo 3</a>
                        <a class="dropdown-item" href="<?= $urlCheckoutPowerBiAvanzado ?>">Power BI Avanzado</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $urlCheckoutSqlServer ?>">Sql Server</a>
                </li>
				<!--<li class="nav-item">
                    <a class="nav-link" href="https://aprende-excel.com/clases-en-vivo/">Clases en vivo</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="suscripcion-acceso-ilimitado/">Suscripciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/plan-empresa/">Plan Empresa</a>
                </li>
				 <li class="nav-item">
                  <b><a class="nav-link" href="<?= htmlspecialchars(getenv('ACADEMIA_URL') ?: 'https://academia-production-c4cc.up.railway.app') ?>">Iniciar sesión</a></b>
                </li>
            </ul>
        </div>
    </nav>
    <img id="image-header-min" src="n-img/image-header-min.png" alt="Cursos online de Excel, Power BI e Inteligencia Artificial con certificado oficial" class="d-none d-md-block">
    <div class="row"  style="height: 100%;">
        <div class="col-12 d-block d-md-none mb-5">
            <img class="img-fluid" src="n-img/image-header-min.png" alt="Academia Aprende Excel - Líderes en educación online y capacitaciones laborales" style="position: absolute; margin-right:-10px;">
        </div>
        <div class="col-md-5 p-md-5 m-md-5 d-flex align-items-center text-center text-md-left">
            <div class="container">
                <h1 style="font-family: 'Raleway Black'; color:#00173B;">Líderes en Cursos Online de <span style="color: #008B69;">Excel</span>, Power BI e IA</h1>
                <p class="mt-0">Capacitaciones laborales online con certificado oficial | +15.000 estudiantes</p>
                <p class="text-center text-md-left">
                    <a href="#cursos" class="btn btn-primary px-5" style="background: #007A6A;" aria-label="Ver cursos online de Excel, Power BI e Inteligencia Artificial">Ver cursos</a>
                </p>
            </div>
        </div>
    </div>
</header>
