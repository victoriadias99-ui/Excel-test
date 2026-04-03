<?php
// SDK de Mercado Pago
require '../vendor/autoload.php';

include("../src/includes/conexion.php");
include("../src/includes/class.autonum.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');
$url_site  = "https://excel-facil.com"; 
$curso = $_GET['curso'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$prefijo_cel = 0;
$celular = $_GET['celular'];
$email = $_GET['email'];
$descuento = $_GET['descuento'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
   $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {                   
   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
   $ip = $_SERVER['REMOTE_ADDR'];
}

//try {   
	$cnx = OpenCon();
	

	$auto_num = new auto_num($cnx,$curso);
	$id_venta = $auto_num -> get_id();
  	// Crea un ítem en la preferencia    
    
    $consulta ="SELECT TITULO,DESCRIPCION,PRECIO_UNITARIO,PUBLIC_KEY_MP,ACCESS_TOKEN_MP FROM cursos_detalle WHERE CURSO = ?";   				
    $stmt = $cnx->prepare($consulta);
    $stmt->bindValue(1, $curso, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //Agrega credenciales
    //MercadoPago\SDK::setClientId("testga");
	
    MercadoPago\SDK::setAccessToken($rows[0]['ACCESS_TOKEN_MP']);    
    
	$item = new MercadoPago\Item();
	$item->id = $id_venta;
	$item->title = $rows[0]['TITULO'];
	$item->quantity = 1;
	$item->description = $rows[0]['DESCRIPCION'];
	$item->currency_id = "ARS";
	$item->unit_price = $rows[0]['PRECIO_UNITARIO'];
	$item->picture_url = $url_site."/assets/img/logojpg.jpg";

	// Crea un ítem en la preferencia
	$payer = new MercadoPago\Payer();
	  $payer->name = $nombre;
	  $payer->surname = $apellido;
	  $payer->email = $email;

	  $payer->phone = array(
		"area_code" => $prefijo_cel,
		"number" => $celular
	  );
	  //S$payer->date_created = "2018-06-02T12:58:41.425-04:00";

	  // Crea un objeto de preferencia
	$preference = new MercadoPago\Preference();
	
	//Descuentos
	$consulta_desc ="SELECT DESCRIPCION, PORCENTAJE FROM descuentos WHERE CURSO=? AND CODIGO_DESCUENTO=? AND ESTADO_ACTIVO=TRUE AND FECHA_HASTA>=DATE(NOW())";   				
    	$stmt2 = $cnx->prepare($consulta_desc);
    	$stmt2->bindValue(1, $curso, PDO::PARAM_STR);
	$stmt2->bindValue(2, $descuento, PDO::PARAM_STR);
    	$stmt2->execute();
    	$rows_descuento = $stmt2->fetchAll(PDO::FETCH_ASSOC);

	if(count($rows_descuento)>0)
	{
		$itemdesc = new MercadoPago\Item();
		$itemdesc->id = $id_venta;
		$itemdesc->title = $rows_descuento[0]['DESCRIPCION'];
		$itemdesc->quantity = 1;
		$itemdesc->description =  $rows_descuento[0]['DESCRIPCION'];
		$itemdesc->currency_id = "ARS";
		$itemdesc->unit_price = ($rows[0]['PRECIO_UNITARIO'] * ($rows_descuento[0]['PORCENTAJE'] / 100)) * -1;
		$itemdesc->picture_url = $url_site."/assets/img/logojpg.jpg";		

	}
	
	if(count($rows_descuento)>0)
	{
		$itemsarr = array($item,$itemdesc);
		$preference->items = $itemsarr;
	}
	else
	{
		$preference->items = array($item);
	}
	

	
	$preference->payer = $payer;
	$preference->binary_mode = false;
	$preference->external_reference = $curso . "-" . $id_venta;
	$preference->notification_url = $url_site."/src/IPN_mp.php?curso=$curso";
	$preference->payment_methods = array(
  "excluded_payment_methods" => array(array("id" => "rapipago"),array("id" => "pagofacil")),
  "excluded_payment_types" => array(array("id" => "ticket")));
	  if($curso == 'pbi_avanzado')
	{
		
		$preference->back_urls = array(
    "success" => $url_site."/power-bi-avanzado/pago_exitoso.html",
    "failure" => $url_site."/power-bi-avanzado/pago_en_proceso.html",
    "pending" => $url_site."/power-bi-avanzado/pago_en_proceso.html");
	}
	
/*	if($curso == 'upsell_pb2_pbi')
	{
		$preference->back_urls = array(
        "success" => $url_site."/power-bi-avanzado/pago_exitoso_1y2.html",
        "failure" => $url_site."/power-bi-avanzado/pago_en_proceso.html",
        "pending" => $url_site."/power-bi-avanzado/pago_en_proceso.html");
	}
*/
	if($curso == 'upsell_pb2_ex_avan')
	{
		$preference->back_urls = array(
        "success" => $url_site."/power-bi-avanzado/pago_exitoso_1y3.html",
        "failure" => $url_site."/power-bi-avanzado/pago_en_proceso.html",
        "pending" => $url_site."/power-bi-avanzado/pago_en_proceso.html");
	}

/*	if($curso == 'upsell_pb2_pbi_ex_avan')
	{
		$preference->back_urls = array(
        "success" => $url_site."/power-bi-avanzado/pago_exitoso_1y2y3.html",
        "failure" => $url_site."/power-bi-avanzado/pago_en_proceso.html",
        "pending" => $url_site."/power-bi-avanzado/pago_en_proceso.html");
	}
  */  
    
 
   
	$preference->auto_return = "approved";
     
	$preference_created = $preference->save();


//} catch (PDOException $e) {
 // echo 'Connection failed: ' . $e->getMessage();
//}

$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$cnx->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


$stmt1=$cnx->prepare("INSERT INTO ventas (CURSO, ID,NOMBRE, APELLIDO, PREFIJO_CEL, CELULAR, EMAIL,ESTADO_MP,PREFERENCIA_ID_MP) VALUES (?,?,?,?,?,?,?,?,?)");
$stmt1->bindValue(1, $curso, PDO::PARAM_INT);
$stmt1->bindValue(2, $id_venta, PDO::PARAM_INT);
$stmt1->bindValue(3, $nombre, PDO::PARAM_INT);
$stmt1->bindValue(4, $apellido, PDO::PARAM_INT);
$stmt1->bindValue(5, $prefijo_cel, PDO::PARAM_INT);
$stmt1->bindValue(6, $celular, PDO::PARAM_INT);
$stmt1->bindValue(7, $email, PDO::PARAM_INT);
$stmt1->bindValue(8, ' ', PDO::PARAM_INT);
$stmt1->bindValue(9, $preference->id, PDO::PARAM_INT);


$stmt1->execute();

if ($stmt1->rowCount()>0)
{

	echo $preference->init_point;
}


?>