<!DOCTYPE html>
<?php

	include("./includes/conexion.php");
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	
	$curso = $_GET['curso'];
	$mail = $_GET['mail'];
	$linkDownload='';
	$linkFacebook='';
	
	try {   
	$cnx = OpenCon(); 
	
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Pago Exitoso</title>
  <!--- FavIcon--->
  <link rel="icon" href="img/fav.png" type="image/x-icon">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Website core CSS -->
  <link href="vendor/css/app.css" rel="stylesheet">
  <!-- Animation CSS -->
  <link href="vendor/css/animate.css" rel="stylesheet">
  <link href="vendor/css/hover.css" rel="stylesheet">
  <!-- Website Fonts -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" crossorigin="anonymous">
    
</head>

<body>
  <header>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-2 col-sm-6 col-6 logo">
          <img src="img/logojpg.jpg" alt="logo" class="img-fluid">
        </div>
        <div class="col-md-3 hdphone">
          <p> </p>
        </div>
        <div class="col-md-3 hdphone">
          <img src="img/security.png" alt="security" class="img-fluid">
        </div>
        <div class="col-md-1 gr-logo"></div>
        <div class="col-md-3 cta-button  col-sm-6 col-6">
        </div>
      </div>
    </div>
  </header>
  <!-- Website Sections -->
  <!-- Top Product Banner -->
  <section class="top-product">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
          <div class="product-img">
            <img src="img/cursoexcel-inicial.jpg" class="img-fluid" alt="product">
          </div>
        </div>
        <div class="col-md-7">
		    <div class="section-heading">
            <h1 class="text-body mt-5">Aca tienes tu curso</h1>
            <hr>
          </div>
		  <p class="">
				<?php if ($curso=='excel') 
						{echo 'EXCEL INICIAL';} 
				else { echo 'EXCEL INTERMEDIO ';}?><br>
				Acá te dejo las instrucciones para empezar:<br><br>

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
  <footer>
    <div class="container mt-5 pt-5">
      <div class="row align-items-center">
        <div class="col-md-2">
          <img src="img/logojpg.jpg" alt="logo" class="img-fluid w-50">
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2">
          <img src="img/security.png" alt="security" class="img-fluid d-inline">
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-2">
          <div class="footer-links">
            <ul>
              <li><a href="javascript:void(0)" data-toggle="modal" data-target="#terms">Términos y Condiciones</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--- Modals / Popups --->
  <!-- Terms & Condition Modal -->
  <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="termstitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="termstitle">Términos y Condiciones</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
                <p>Este contrato describe los términos y condiciones generales (los "Términos y Condiciones Generales") que son aplicables al uso de los servicios ofrecidos por Aprende Excel  dentro del sitio web www.aprende-excel.com, en adelante “El Sitio” o “El Sitio Web”. Cualquier persona que desee acceder y/o usar el sitio o los servicios podrá hacerlo sujetándose a los Términos y Condiciones Generales, junto con todas las demás políticas y principios que rigen a Aprende Excel.
   CUALQUIER PERSONA QUE NO ACEPTE ESTOS TÉRMINOS Y CONDICIONES GENERALES, LOS CUALES TIENEN UN CARÁCTER OBLIGATORIO Y VINCULANTE, DEBERÁ ABSTENERSE DE UTILIZAR EL SITIO (www.aprende-excel.com) Y/O LOS SERVICIOS QUE PROPORCIONA. ASIMISMO, LA ACEPTACIÓN DE LOS MISMOS, IMPLICA PLENA CONFORMIDAD Y CONOCIMIENTO DE ELLOS.
   1. CAPACIDAD
   Nuestros servicios sólo están disponibles para personas que tengan capacidad legal para contratar. No podrán utilizar los servicios proporcionados, los menores de edad, quienes no tengan capacidad en los términos del Código Civil y Comercial de la República Argentina, temporal o definitivamente, quienes hayan sido sancionados por El Sitio Web por haber incumplido los Términos y Condiciones Generales o por el uso indebido del material de estudio puesto a disposición. Si el usuario es menor de 18 años, su padre, madre o tutor legal debe aceptar estos Términos de Servicio y registrarse para el Servicio en nombre de aquél.
   2. REGISTRACIÓN  
   Es obligatorio completar el formulario de inscripción para poder utilizar los servicios que ofrece El Sitio. El futuro Usuario deberá completarlo con su información personal de manera exacta y precisa (en adelante, "Datos Personales"). Todos los campos deberán ser completados con la información requerida. El Sitio se reserva el derecho de inhabilitar a aquellos Usuarios que hayan ingresado datos falsos.
   3. MODIFICACIONES DEL ACUERDO 
   El Sitio podrá modificar en cualquier momento los términos y condiciones de este contrato y notificará los cambios al Usuario publicando una versión actualizada de dichos términos y condiciones en este sitio web y comunicándoselo vía email a los Usuarios. Dentro de los 5 (cinco) días siguientes a la publicación de las modificaciones introducidas, el Usuario deberá comunicar por e-mail a aprendeexcel.curso@gmail.com si no acepta las mismas; en ese caso quedará disuelto el vínculo contractual. Vencido este plazo, se considerará que el Usuario acepta los nuevos términos y el contrato continuará vinculando a ambas partes.
   4. COMPRAS, Y MEDIOS DE PAGO. CONDICIONES
   Todas las compras y transacciones que se lleven a cabo por medio de este sitio web, están sujetas a un proceso de confirmación y verificación de parte de Mercado Pago. 
   Los precios y condiciones de venta tienen un carácter meramente informativo y pueden ser modificados en atención a las fluctuaciones del mercado sin previo aviso. No obstante, la realización de la solicitud mediante la cumplimentación del formulario de compra, implica la conformidad con el precio ofertado y con las condiciones generales de venta vigentes en ese momento. Una vez completada y enviada la solicitud, se entenderá perfeccionada la compra de pleno derecho, con todas las garantías legales que amparan al consumidor adquirente y, desde ese instante, los precios y condiciones tendrán carácter contractual y no podrán ser modificados sin el expreso acuerdo de ambos contratantes. No existen plazos de entrega ya que no se envían materiales físicos. El contenido del curso está alojado en el Grupo Privado “Comunidad Aprende Excel” de Facebook y actualiza periódicamente para que el usuario tenga acceso a aquellos en cualquier momento y desde cualquier lugar con conexión a Internet.
   5. FORMAS DE PAGO Y MODALIDADES DE PAGO 
   El pago se realiza a través de la plataforma “Mercado Pago” o transferencia bancaria. 
   6. COMPROBACIÓN ANTIFRAUDE 
   La compra del cliente puede ser aplazada para la comprobación antifraude. También puede ser suspendida por más tiempo para una investigación más rigurosa, para evitar transacciones fraudulentas.
   7. MONEDA EXPRESIÓN DE PRECIOS
   Los precios que se muestran junto a nuestros cursos se indican en Pesos Argentinos (ARS). En ellos, todos los impuestos se encuentran incluidos. 
   8. USO NO AUTORIZADO
   En caso de haber contratado un servicio de Aprende Excel por intermedio de su sitio web www.aprende-excel.com, o cualquier otro medio, el usuario no podrá y deberá abstenerse de ofrecerlos para redistribución o reventa de ningún tipo. Queda totalmente prohibida utilización de los recursos audiovisuales que componen nuestros programas de formación de forma distinta al fin educativo con el cual fueron ideados. El uso y acceso a nuestros servicios es exclusivo al usuario comprador del curso, quedando bajo su responsabilidad la pérdida de datos personales que implique el uso compartido de su cuenta. Asimismo, el usuario también será pasible de sanciones tales como la exclusión del sistema si el mismo facilitase el acceso al sistema provisto por Aprende Excel a un tercero sin poseer autorización expresa para ello, sin perjuicio de las acciones legales que Aprende Excel pueda incoar en contra del incumplidor.
   9. PROPIEDAD 
   El usuario no podrá declarar propiedad intelectual o exclusiva sobre ninguno de nuestros productos o servicios, modificados o sin modificar. Todos los recursos y servicios son propiedad de Aprende Excel . En caso de que no se especifique lo contrario, nuestros productos se proporcionan sin ningún tipo de garantía, expresa o implícita. En ningún caso estas personas serán responsable de ningún daño incluyendo, pero no limitado a, daños directos, indirectos, especiales, fortuitos o consecuentes u otras pérdidas resultantes del uso o de la imposibilidad de utilizar nuestros productos. 
   10. EXCLUSIÓN DE GARANTÍAS Y RESPONSABILIDAD
   Aprende Excel no se hará responsables, en ningún caso, de los daños y perjuicios de cualquier naturaleza que pudieran ocasionar, a título enunciativo: errores u omisiones en los contenidos, falta  de disponibilidad del portal o la transmisión de virus o programas maliciosos o lesivos en los contenidos, a pesar de haber adoptado todas las medidas tecnológicas necesarias para evitarlo.
   11. MODIFICACIONES DE CONTENIDO
   Aprende Excel se reserva el derecho de efectuar sin previo aviso las modificaciones que considere oportunas en su portal y/o su grupo privado de Facebook “Comunidad Aprende Excel”, pudiendo cambiar, suprimir o añadir tanto los contenidos y servicios que se presten a través de la misma como la forma en la que éstos aparezcan presentados o localizados en su portal sin requerir conformidad alguna por parte del usuario.
   12. ENLACES 
   En el caso de que en nombre del dominio se dispusiesen enlaces o hipervínculos hacía otros sitios de Internet, Aprende Excel no ejercerá ningún tipo de control sobre dichos sitios y contenidos. En ningún caso Aprende Excel asumirá responsabilidad alguna por los contenidos pertenecientes a un sitio web ajeno, ni garantizará la disponibilidad técnica, calidad, fiabilidad, exactitud, amplitud, veracidad, y validez de cualquier material o información contenida en ninguno de dichos hipervínculos u otros sitios de Internet. Igualmente la inclusión de estas conexiones externas no implicará ningún tipo de asociación, fusión o participación con las entidades propietarias de los sitios web a los que redireccione un hipervínculo. Aprende Excel se reserva el derecho a denegar o retirar el acceso a portal y/o los servicios ofrecidos sin necesidad de preaviso, a instancia propia o de un tercero, a aquellos usuarios que incumplan las Condiciones Generales de Uso. 
   13. GENERALIDADES 
   Aprende Excel perseguirá el incumplimiento de las condiciones así como cualquier utilización indebida de su portal y/o del contenido ofrecido en el mismo ejerciendo todas las acciones civiles y penales que le puedan corresponder conforme derecho. Los resultados de los cursos mostrados a modo ilustrativo en los videos o textos del sitio web son resultados de años de entrenamiento, práctica, experimentos y aprendizaje sobre errores. En el curso se enseña e ilustra acerca de cómo lograr esos resultados, no obstante ello, no se garantizan idénticos resultados. Aprobado el curso, se entregarán constancias de cursada que en modo alguno se encuentran certificadas o avaladas por ninguna entidad gubernamental educativa.
				</p>
			</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Privacy Policy Modal -->
  <div class="modal fade" id="privacy" tabindex="-1" role="dialog" aria-labelledby="policytitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="policytitle">Privacy Policy</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse faucibus mi ut enim faucibus, vel euismod magna blandit. Sed placerat elementum orci, quis faucibus diam pharetra eu. Nulla non sapien gravida metus feugiat efficitur consectetur id eros. Nulla at purus at dui lacinia accumsan ut nec purus. Sed a consectetur turpis, eget tincidunt turpis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis bibendum aliquet justo semper fringilla.</p>
              <p> Integer felis ipsum, mattis eget est vitae, semper varius tortor. Integer sapien est, suscipit sit amet purus id, consectetur rutrum libero. Vivamus finibus, quam vel sodales euismod, augue ipsum rhoncus nisi, ut egestas enim magna ut felis. Nunc in lorem felis. Duis ut iaculis diam. Morbi id libero fringilla, accumsan orci eu, tincidunt neque. Phasellus aliquet eros tristique nisi consectetur consequat. Etiam finibus augue eget placerat tempus. Aenean tempus ligula quis nibh sodales, vel varius elit tincidunt. Praesent ornare, mi ac aliquam cursus, dolor eros sagittis dolor, vitae blandit purus tellus sed ante. Donec dignissim arcu ut venenatis sollicitudin. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery/wow.min.js"></script>
  <script src="vendor/jquery/app.js"></script>
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