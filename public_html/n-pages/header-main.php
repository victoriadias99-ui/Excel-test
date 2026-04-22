<?php
// Precarga de los 10 cursos del navbar en UNA sola query (antes: 10 queries).
$__idsNav = [
    'excel', 'excel_intermedio', 'excel_avanzado', 'excel_promo',
    'office', 'powerbi', 'sql', 'pbi_avanzado',
    'prom_pbi_excel', 'pantilla_finanzas',
];
$__navBatch = getCursosDetalleBatch($__idsNav);

$__fmtPrecios = function ($c) use ($simbolo, $moneda) {
    if (!$c) return ['', ''];
    $pu  = $c['PRECIO_UNITARIO'];
    $des = $c['PORCENTAJE_DES'] ?: 100;
    $oficial = $simbolo . ' ' . convertirPrecio($pu + intval(($pu / $des) * 100), $moneda) . ' <small>' . $moneda . '</small>';
    $normal  = $simbolo . ' ' . convertirPrecio($pu, $moneda) . ' <small>' . $moneda . '</small>';
    return [$oficial, $normal];
};

[$precioCursoOficialExcelInicial,        $precioCursoExcelInicial]        = $__fmtPrecios($__navBatch['excel']             ?? null);
$urlCheckoutExcelInicial        = 'excel-inicial/';
[$precioCursoOficialExcelIntermedio,     $precioCursoExcelIntermedio]     = $__fmtPrecios($__navBatch['excel_intermedio']  ?? null);
$urlCheckoutExcelIntermedio     = 'excel-intermedio/';
[$precioCursoOficialExcelAvanzado,       $precioCursoExcelAvanzado]       = $__fmtPrecios($__navBatch['excel_avanzado']    ?? null);
$urlCheckoutExcelAvanzado       = 'excel-avanzado/';
[$precioCursoOficialExcelPromo,          $precioCursoExcelPromo]          = $__fmtPrecios($__navBatch['excel_promo']       ?? null);
$urlCheckoutExcelPromo          = 'excel-promo/';
[$precioCursoOficialPackOffice,          $precioCursoPackOffice]          = $__fmtPrecios($__navBatch['office']            ?? null);
$urlCheckoutPackOffice          = 'pack-office/';
[$precioCursoOficialPowerBi,             $precioCursoPowerBi]             = $__fmtPrecios($__navBatch['powerbi']           ?? null);
$urlCheckoutPowerBi             = 'power-bi/';
[$precioCursoOficialSqlServer,           $precioCursoSqlServer]           = $__fmtPrecios($__navBatch['sql']               ?? null);
$urlCheckoutSqlServer           = 'microsoft-sql-server/';
[$precioCursoOficialPowerBiAvanzado,     $precioCursoPowerBiAvanzado]     = $__fmtPrecios($__navBatch['pbi_avanzado']      ?? null);
$urlCheckoutPowerBiAvanzado     = 'power-bi-avanzado/';
[$precioCursoOficialExcelPromoPowerBI,   $precioCursoExcelPromoPowerBI]   = $__fmtPrecios($__navBatch['prom_pbi_excel']    ?? null);
$urlCheckoutExcelPromoPowerBI   = 'power-bi-y-excel/';
[$precioCursoOficialPlantillas,          $precioCursoPlantillas]          = $__fmtPrecios($__navBatch['pantilla_finanzas'] ?? null);
$urlCheckoutPlantillas          = 'plantillas/finanzas/';
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
    <img id="image-header-min" src="n-img/image-header-min.png" alt="Cursos online de Excel, Power BI e Inteligencia Artificial con certificado oficial" class="d-none d-md-block" fetchpriority="high">
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
