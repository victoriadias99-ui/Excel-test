<?php 
require '../../vendor/autoload.php';

include("conexion.php");

date_default_timezone_set('America/Argentina/Buenos_Aires');
if(!isset($_GET['ruta']) || !isset($_GET['archivo'])){
    die('no_autorizado');
}

$path = $_GET['ruta'];
$file = $_GET['archivo'];
$string = file_get_contents("../../".$path."/assets/data/". $file);
$data = json_decode($string, true);

function insertProd($data){
  
	$cnx = OpenCon();

$cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$cnx->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

foreach($data as $dat){
    $stmt1=$cnx->prepare("SELECT * FROM cursos_detalle where CURSO=?");
    $stmt1->bindValue(1, $dat['CURSO'], PDO::PARAM_STR);
    $result = $stmt1->execute();
    $rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);

	if(count($rows) <= 0)
	{
        $stmt1=$cnx->prepare("INSERT INTO cursos_detalle (CURSO, TITULO, DESCRIPCION, PRECIO_UNITARIO, PUBLIC_KEY_MP,ACCESS_TOKEN_MP) VALUES (?,?,?,?,?,?)");
     
        $stmt1->bindValue(1, $dat['CURSO'], PDO::PARAM_STR);
        $stmt1->bindValue(2, $dat['TITULO'], PDO::PARAM_STR);
        $stmt1->bindValue(3, $dat['DESCRIPCION'], PDO::PARAM_STR);
        $stmt1->bindValue(4, $dat['PRECIO_UNITARIO'], PDO::PARAM_INT);
        $stmt1->bindValue(5, $dat['PUBLIC_KEY_MP'], PDO::PARAM_STR);
        $stmt1->bindValue(6, $dat['ACCESS_TOKEN_MP'], PDO::PARAM_STR);
        $stmt1->execute();
    }
    $stmt2=$cnx->prepare("SELECT * FROM auto_num where ID=?");
    $stmt2->bindValue(1, $dat['CURSO'], PDO::PARAM_STR);
    $result2 = $stmt2->execute();
    $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

	if(count($rows2) <= 0)
	{
        $stmt2=$cnx->prepare("INSERT INTO auto_num (ID, PREFIJO, ULTIMO_NUM, MAX_LEN) VALUES (?,?,?,?)");
     
        $stmt2->bindValue(1, $dat['CURSO'], PDO::PARAM_STR);
        $stmt2->bindValue(2, substr($dat['CURSO'],0,1).substr($dat['CURSO'],strlen($dat['CURSO'])-1,1) , PDO::PARAM_STR);
        $stmt2->bindValue(3, 1, PDO::PARAM_INT);
        $stmt2->bindValue(4, 10, PDO::PARAM_INT);
        $stmt2->execute();
    }

}

}
$des = $path == 'plantillas'?'Plantilla Aprende Excel':'Curso Aprende Excel';
$datai = array();

foreach($data as $dat){
    $nombres = $dat['nombre'];
    $precios =  $dat['precio_oferta'];
    $datai[$dat['codigo']]['CURSO'] = $dat['codigo'];
   $datai[$dat['codigo']]['TITULO'] = $dat['nombre'];
   $datai[$dat['codigo']]['DESCRIPCION'] = $des;
   $datai[$dat['codigo']]['PRECIO_UNITARIO'] = $dat['precio_oferta'];
   $datai[$dat['codigo']]['PUBLIC_KEY_MP'] = 'APP_USR-7f1ced66-ff78-441a-834e-e9f9df81e6b5';
   $datai[$dat['codigo']]['ACCESS_TOKEN_MP'] = 'APP_USR-4851780803812018-041018-0531d6ea354191d9f264e93c8190f2a2-541733259';
    
   $upsells = $dat['up_sells'];

   if(count($upsells) > 0){

   foreach($upsells as $ups){
        $datai[$ups['codigo']]['CURSO'] = $ups['codigo'];
        $datai[$ups['codigo']]['TITULO'] = $dat['nombre'].' y '.$ups['nombre'];
        $datai[$ups['codigo']]['DESCRIPCION'] = $des.' - UPSELL';
        $datai[$ups['codigo']]['PRECIO_UNITARIO'] = $ups['precio_oferta']+$dat['precio_oferta'];
        $datai[$ups['codigo']]['PUBLIC_KEY_MP'] = 'APP_USR-7f1ced66-ff78-441a-834e-e9f9df81e6b5';
        $datai[$ups['codigo']]['ACCESS_TOKEN_MP'] = 'APP_USR-4851780803812018-041018-0531d6ea354191d9f264e93c8190f2a2-541733259';
        $nombres.= ' Y '.$ups['nombre']; 
        $precios = $precios + $ups['precio_oferta'];
   }
}
   if(count($upsells) > 1){
    $datai[$dat['all_ups']]['CURSO'] = $dat['all_ups'];
    $datai[$dat['all_ups']]['TITULO'] = $nombres;
    $datai[$dat['all_ups']]['DESCRIPCION'] = $des.' - UPSELL';
    $datai[$dat['all_ups']]['PRECIO_UNITARIO'] = $precios;
    $datai[$dat['all_ups']]['PUBLIC_KEY_MP'] = 'APP_USR-7f1ced66-ff78-441a-834e-e9f9df81e6b5';
    $datai[$dat['all_ups']]['ACCESS_TOKEN_MP'] = 'APP_USR-4851780803812018-041018-0531d6ea354191d9f264e93c8190f2a2-541733259';
   }
}

insertProd($datai);

?>