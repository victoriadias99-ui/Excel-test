<?php
$curso = getCursoDetalle('excel');
$precioCursoOficialExcelInicial = '$' . ($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100)) . ' <small>ARS</small>';
$precioCursoExcelInicial = '$' . $curso['PRECIO_UNITARIO'] . ' <small>ARS</small>';
$urlCheckoutExcelInicial = 'excel-inicial/';

$curso = getCursoDetalle('excel_intermedio');
$precioCursoOficialExcelIntermedio = '$' . ($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100)) . ' <small>ARS</small>';
$precioCursoExcelIntermedio = '$' . $curso['PRECIO_UNITARIO'] . ' <small>ARS</small>';
$urlCheckoutExcelIntermedio = 'excel-intermedio/';

$curso = getCursoDetalle('excel_avanzado');
$precioCursoOficialExcelAvanzado = '$' . ($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100)) . ' <small>ARS</small>';
$precioCursoExcelAvanzado = '$' . $curso['PRECIO_UNITARIO'] . ' <small>ARS</small>';
$urlCheckoutExcelAvanzado = 'excel-avanzado/';

$curso = getCursoDetalle('excel_promo');
$precioCursoOficialExcelPromo = '$' . ($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100)) . ' <small>ARS</small>';
$precioCursoExcelPromo = '$' . $curso['PRECIO_UNITARIO'] . ' <small>ARS</small>';
$urlCheckoutExcelPromo = 'excel-promo/';

$curso = getCursoDetalle('office');
$precioCursoOficialPackOffice = '$' . ($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100)) . ' <small>ARS</small>';
$precioCursoPackOffice = '$' . $curso['PRECIO_UNITARIO'] . ' <small>ARS</small>';
$urlCheckoutPackOffice = 'pack-office/';

$curso = getCursoDetalle('powerbi');
$precioCursoOficialPowerBi = '$' . ($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100)) . ' <small>ARS</small>';
$precioCursoPowerBi = '$' . $curso['PRECIO_UNITARIO'] . ' <small>ARS</small>';
$urlCheckoutPowerBi = 'power-bi/';

$curso = getCursoDetalle('sql');
$precioCursoOficialSqlServer = '$' . ($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100)) . ' <small>ARS</small>';
$precioCursoSqlServer = '$' . $curso['PRECIO_UNITARIO'] . ' <small>ARS</small>';
$urlCheckoutSqlServer = 'microsoft-sql-server/';

$curso = getCursoDetalle('pbi_avanzado');
$precioCursoOficialPowerBiAvanzado = '$' . ($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100)) . ' <small>ARS</small>';
$precioCursoPowerBiAvanzado = '$' . $curso['PRECIO_UNITARIO'] . ' <small>ARS</small>';
$urlCheckoutPowerBiAvanzado = 'power-bi-avanzado/';


$curso = getCursoDetalle('prom_pbi_excel');
$precioCursoOficialExcelPromoPowerBI = '$' . ($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100)) . ' <small>ARS</small>';
$precioCursoExcelPromoPowerBI = '$' . $curso['PRECIO_UNITARIO'] . ' <small>ARS</small>';
$urlCheckoutExcelPromoPowerBI = 'power-bi-y-excel/';

$curso = getCursoDetalle('pantilla_finanzas');
$precioCursoOficialPlantillas = '$' . ($curso['PRECIO_UNITARIO'] + intval(($curso['PRECIO_UNITARIO'] / $curso['PORCENTAJE_DES']) * 100)) . ' <small>ARS</small>';
$precioCursoPlantillas = '$' . $curso['PRECIO_UNITARIO'] . ' <small>ARS</small>';
$urlCheckoutPlantillas = 'plantillas/finanzas/';
?>
<header class="position-relative">
    <nav class="navbar px-md-5 px-3 navbar-expand-lg navbar-dark bg-light">
        <a class="navbar-brand" href="">
            <img src="n-assets/img/logo-excel.png" alt="logo" class="logo">
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
    <img id="image-header-min" src="n-img/image-header-min.png" class="d-none d-md-block">
    <div class="row"  style="height: 100%;">
        <div class="col-12 d-block d-md-none mb-5"> 
            <img class="img-fluid" src="n-img/image-header-min.png" style="position: absolute; margin-right:-10px;">
        </div>
        <div class="col-md-5 p-md-5 m-md-5 d-flex align-items-center text-center text-md-left">
            <div class="container">
                <h1 style="font-family: 'Raleway Black'; color:#00173B;">Academia aprende <span style="color: #008B69;">Excel</span></h1>
                <p class="mt-0">Cursos a distancia</p>
                <p class="text-center text-md-left">
                    <a href="#cursos" class="btn btn-primary px-5" style="background: #007A6A;">Ver más</a>
                </p>
            </div>
        </div>
    </div>
</header>
