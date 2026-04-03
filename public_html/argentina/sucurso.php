<!DOCTYPE html>
<?php

	include("./curso1/includes/conexion.php");
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	
	$curso = $_GET['curso'];
	$mail = $_GET['mail'];
	$linkDownload='';
	$linkFacebook='';
	
	try {   
	$cnx = OpenCon(); 
	
    //$consulta ="select `cursos_detalle`.URL_DOWNLOAD, `cursos_detalle`.URL_FACEBOOK_GROUP from `ventas`, `cursos_detalle` where `ventas`.CURSO=? and `ventas`.CURSO=`cursos_detalle`.CURSO and (`ventas`.EMAIL=? OR `ventas`.PAGADOR_EMAIL_MP=?) AND `ventas`.ESTADO_MP='approved'";   				
    $consulta ="select `cursos_detalle`.URL_DOWNLOAD, `cursos_detalle`.URL_FACEBOOK_GROUP,`ventas`.EMAIL,`ventas`.NOMBRE,`ventas`.APELLIDO from `ventas`, `cursos_detalle` where `ventas`.CURSO=? and `ventas`.CURSO=`cursos_detalle`.CURSO and (`ventas`.EMAIL=? OR `ventas`.PAGADOR_EMAIL_MP=?) AND `ventas`.ESTADO_MP='approved'";
    $stmt = $cnx->prepare($consulta);
    $stmt->bindValue(1, $curso, PDO::PARAM_STR);
	$stmt->bindValue(2, $mail, PDO::PARAM_STR);
	$stmt->bindValue(3, $mail, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    
	if ($stmt->rowCount()>0)
	{
		$linkDownload = $rows[0]['URL_DOWNLOAD'];
		$linkFacebook = $rows[0]['URL_FACEBOOK_GROUP'];

		$consulta ="SELECT WEBHOOK_URL FROM webhooks_config WHERE CURSO=? AND ESTADO_MP=?";   				
        	$stmt = $cnx->prepare($consulta);
        	$stmt->bindValue(1, $curso, PDO::PARAM_STR);
        	$stmt->bindValue(2, 'resendcourse', PDO::PARAM_STR);
        	$stmt->execute();
		
        	$rowsWebHook = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$webHookUrl=$rowsWebHook[0]['WEBHOOK_URL'];
		
		$data = array("CURSO" => $curso,
                               "MAIL" => $rows[0]['EMAIL'],
                               "NOMBRE"=> $rows[0]['NOMBRE'],
                               "APELLIDO" => $rows[0]['APELLIDO']);
    
        	$data_string = json_encode($data);
		
		echo "<span style='display:none'>";
        	$data_string = json_encode($data);
        	$ch=curl_init($webHookUrl);
    
        	curl_setopt_array($ch, array(
            		CURLOPT_POST => true,
            		CURLOPT_POSTFIELDS => $data_string,
            		CURLOPT_HEADER => true,
            		CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Content-Length: ' . strlen($data_string))));
        	
		$result = curl_exec($ch);
        	curl_close($ch);
		echo"</span>";
	}
	

} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}


?>
<html>

<head>
  <meta name="google-site-verification" content="sVk708HLkFaamx5q_YGfwrpVOSMpkSuh6XJhfMkaHc4">
  <meta charset="utf-8">
  <title>Aprende Excel | Comunidad Online </title>
  <!-- SEO Meta Tags-->
  <meta name="description" content="Aprendé de 0 a 100 Microsoft Excel a través de videos desde la comunidad de tu casa">
  <meta name="keywords" content="aprende excel, cursos online de microsoft excel, curso aprender excel, aprende excel cursos">
  <meta name="author" content="Aprende Excel">
  <!-- Viewport-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon and Touch Icons-->
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">
  <link rel="mask-icon" color="#343b43" href="safari-pinned-tab.svg">
  <meta name="msapplication-TileColor" content="#603cba">
  <meta name="theme-color" content="#ffffff">
  <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
  <link rel="stylesheet" media="screen" href="css/vendor.min.css">
  <!-- Main Theme Styles + Bootstrap-->
  <link rel="stylesheet" media="screen" href="css/theme.min.css">
  <script src="js/modernizr.min.js"></script>
    
</head>

<body>
   <!-- MENU MOBILE -->
  <div class="offcanvas-container is-triggered offcanvas-container-reverse" id="mobile-menu"><span class="offcanvas-close"><i class="fe-icon-x"></i></span>
    <div class="offcanvas-scrollable-area border-top" style="height:calc(100% - 235px); top: 144px;">
      <!-- Mobile Menu-->
      <div class="accordion mobile-menu" id="accordion-menu">
        <!-- Inicio-->
        <div class="card">
          <div class="card-header"><a class="mobile-menu-link" href="index.html">Inicio</a></div>
        </div>
        <!-- Blog-->
        <div class="card">
          <div class="card-header"><a class="mobile-menu-link active" href="ayuda.html">Ayuda</a> </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FIN MENU MOBILE -->
  <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
  <header class="navbar-wrapper navbar-boxed navbar-sticky navbar-stuck">
    <div class="container-fluid">
      <div class="d-table-cell align-middle pr-md-3"><a class="navbar-brand mr-1" href="index.html"><img src="img/logojpg.jpg" alt="Logo" class="mx-2"></a></div>
      <div class="d-table-cell w-100 align-middle pl-md-3">
        <div class="navbar justify-content-end justify-content-lg-between">
            
          <!-- Main Menu-->
          <ul class="navbar-nav d-none d-lg-block">
            <!-- Home-->
            <li class="nav-item mega-dropdown-toggle "><a class="nav-link" href="index.html">Inicio</a>
              <div class="dropdown-menu mega-dropdown">
                <div class="d-flex"></div>
              </div>
            </li>
            <li class="nav-item dropdown-toggle active"><a class="nav-link" href="blog.html">Ayuda</a>
            </li>
          </ul>
          <div>
            <ul class="navbar-buttons d-inline-block align-middle">
              <li class="d-block d-lg-none" style=""><a href="#mobile-menu" data-toggle="offcanvas"><i class="fe-icon-menu"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Page Content-->  
  <!-- Top Product Banner -->
  <section class="mt-5 pt-5">
    <div class="container">
      <div class="row justify-content-center align-items-center">
         
        <div class="col-md-7">
		    <div class="section-heading">
            <h1 class="text-body mt-5">Aca está tu curso :)</h1>
            <hr>
          </div>
		  <p class="">
				<?php if ($curso=='excel') 
						{echo 'EXCEL INICIAL';} 
				else { echo 'EXCEL INTERMEDIO ';}?><br><br>
				(Éstas instrucciones también van a llegarte a tu e-mail en unos minutos)<br><br>

				Te recomiendo ver el curso de manera ONLINE. Es muy simple, no tenés que descargar nada y los vas a poder ver más rápido. Para eso tenés que unirte a nuestro Grupo Privado de Facebook. Allí están todos los videos :)<br><br>


				Leer con atención:<br><br>

				Para comenzar el curso de manera online clickeá el siguiente link:<br>
				<a href="<?php echo $linkFacebook?>"><?php echo $linkFacebook?></a><br><br>

				Una vez que ingreses, vas a poder acceder al curso siempre que quieras desde tu Facebook y desde PC, notebook, celular y tablet.<br><br>

				Una vez que te aceptemos el ingreso al grupo, ir al Menú "unidades" para comenzar el curso.<br><br>

				Tené en cuenta que las solicitudes se aprueban de 09 a 18 hs.<br><br>

				Para descargar el curso y verlo sin conexión a internet seguí los siguientes pasos:<br>
				1) Descargar la aplicación MEGA desde su Playstore en android o Appstore en Iphone.<br>
				2) Registrarse en la aplicación MEGA.<br>
				3) Ingresar al siguiente link y comenzar con la descarga <a href="<?php echo $linkDownload?>"><?php echo $linkDownload?></a><br>
		</p>

        </div>
		<div class="col-md-1">&nbsp;</div>
      </div>
    </div>
  </section>
  <!-- Website Footer -->
  <footer class="pt-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 pb-4 pt-5 mb-2"><a class="navbar-brand d-inline-block mb-4" href="index.html"><img src="img/logojpg.jpg" alt="CreateX"></a>
          <ul class="list-icon text-sm pb-2" style="">
            <li><i class="fe-icon-map-pin text-muted"></i><a class="navi-link" href="#">Devoto, Ciudad de Buenos Aires</a></li>
            <li><i class="fe-icon-phone text-muted"></i></li>
            <li><i class="fe-icon-mail text-muted"></i><a class="navi-link" href="mailto:hola@aprende-excel.com">hola@aprende-excel.com</a></li>
          </ul>
          <a class="social-btn sb-style-6 sb-facebook" href="https://www.facebook.com/aprende.excel.argentina/" target="_blank"><i class="socicon-facebook"></i></a>
          <a class="social-btn sb-style-6 sb-instagram" href="https://www.instagram.com/aprende.excel.arg"><i class="socicon-instagram"></i></a>
        </div>
      </div>
      <hr>
    </div>
  </footer>
  <!--- Modals / Popups --->
 
   
  <!-- Bootstrap core JavaScript -->
  <script src="curso1/vendor/jquery/jquery.min.js"></script>
  <script src="curso1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="curso1/vendor/jquery/wow.min.js"></script>
  <script src="curso1/vendor/jquery/app.js"></script>
  <script>
    function getURLParameter(name) {
	return decodeURI((RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]);
}
function hideURLParams() {
	//Parameters to hide (ie ?success=value, ?error=value, etc)
	var hide = ['success','error'];
	for(var h in hide) {
		if(getURLParameter(h)) {
			history.replaceState(null, document.getElementsByTagName("title")[0].innerHTML, window.location.pathname);
		}
	}
}

//Run onload, you can do this yourself if you want to do it a different way
window.onload = hideURLParams;
  </script>
</body>

</html>