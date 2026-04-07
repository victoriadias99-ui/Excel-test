<?php
include("conexion.php");
include("class.autonum.php");

function updateCountContact($_num, $_lista) {
    $cnx = OpenCon();
    $consulta = 'UPDATE `v2_contacto_contador` SET `ultimo` = '.$_num.' WHERE lista = "'.$_lista.'"';
    $stmt = $cnx->prepare($consulta);
    $stmt->execute();
}

function getCountContact($_lista) {
    $cnx = OpenCon();
    $consulta = "SELECT * FROM `v2_contacto_contador` WHERE `lista` ='" . $_lista ."'";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return count($rows) == 0 ? null : $rows[0]['ultimo'];
}

function insertContact($_email, $_fecha, $_nombre, $_pais, $_sms, $_lista) {
    $cnx = OpenCon();
    $consulta = 'INSERT INTO `v2_contacto`(`email`, `fecha_registro`, `nombre`, `pais`, `sms`, `lista`) '
    . 'VALUES ("'.$_email.'","'.$_fecha.'","'.$_nombre.'","'.$_pais.'","'.$_sms.'","'.$_lista.'")';
    $stmt = $cnx->prepare($consulta);
    $stmt->execute();
}

function getContact($_email, $_lista) {
    $cnx = OpenCon();
    $consulta = "SELECT * FROM `v2_contacto` WHERE `email` = '$_email' and `lista` ='" . $_lista ."'";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return count($rows) == 0 ? null : $rows[0];
}

function deleteContact($_email, $_lista) {
    $cnx = OpenCon();
    $consulta = "DELETE FROM `v2_contacto` WHERE `email` = '$_email' and `lista` ='" . $_lista ."'";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute();
}

function getTimer($_ip, $idCurso, $timezone) {
    $result = getIP($_ip, $idCurso);
    if ($result != null){
        $dateNow = date('Y-m-d H:i:s');
        $dateRegistro = $result['fecha_registro'];
        
        $date1 = new DateTime($dateRegistro);
        $date2 = new DateTime("now");
        $diff = $date1->diff($date2);
        
        $minutos = $diff->days * 24 * 60;
        $minutos += $diff->h * 60;
        $minutos += $diff->i;
        
        $date1 = new DateTime($dateRegistro, new DateTimeZone(date_default_timezone_get()));
        $date1->setTimezone(new DateTimeZone($timezone));
        
        return [
            'minutos' => intval($minutos),
            'date' => $date1,
        ];
    }
    return -1;
}

function updateIP($_ip, $idCurso, $count, $cache = null) {
    $cnx = OpenCon();
    $consulta = "UPDATE `ip_visita` SET `visitas` = ?, `cache` = ? WHERE `ip` = ? AND `id_producto` = ?";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([
        $count,
        $cache == null ? '' : $cache,
        $_ip,
        $idCurso
    ]);
}

function insertIP($_ip, $idCurso, $data = null, $cache = null) {
    $cnx = OpenCon();
    $consulta = "INSERT INTO `ip_visita`(`ip`, `id_producto`, `data`, `cache`) VALUES (?, ?, ?, ?)";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([
        $_ip,
        $idCurso,
        $data == null ? '' : $data,
        $cache == null ? '' : $cache
    ]);
}

function getIP($_ip, $idCurso) {
    $consulta = "SELECT * FROM `ip_visita` WHERE `ip` = '$_ip' and `id_producto` ='" . $idCurso ."'";

    $cnx = OpenCon();
    $stmt = $cnx->prepare($consulta);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return count($rows) == 0 ? null : $rows[0];
}

function getVenta($idVenta) {
    $consulta = "SELECT * FROM `ventas` WHERE `ID` = '$idVenta'";
    //echo $consulta;
    $cnx = OpenCon();
    $stmt = $cnx->prepare($consulta);
    $stmt->bindValue(1, $idVenta, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return count($rows) == 0 ? null : $rows[0];
}

function getCursoDetalle($idCurso){
    $consulta = "SELECT * FROM cursos_detalle where CURSO=?;";
    //echo  "SELECT * FROM cursos_detalle where CURSO='$idCurso';<br>";
   
    $cnx = OpenCon();
    $stmt = $cnx->prepare($consulta);
    $stmt->bindValue(1, $idCurso, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //echo 'count($rows) = ' . count($rows) .'<br>';
    $data = count($rows) == 0 ? null : $rows[0];
    return $data;
}

function getCursoDetalleCheckout($idCurso){
    $cnx = OpenCon();
    
    $consulta = "SELECT * FROM cursos_detalle where CURSO=?;";
    $stmt = $cnx->prepare($consulta);
    $stmt->bindValue(1, $idCurso, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = count($rows) == 0 ? null : $rows[0];
    
    $consulta = "SELECT * FROM cursos_pack where ID_ABRE=?;";
    $stmt = $cnx->prepare($consulta);
    $stmt->bindValue(1, $idCurso, PDO::PARAM_STR);
    $stmt->execute();
    $pack = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    
    $consulta = "SELECT * FROM cursos_botones where ids like '%$idCurso%';";
    if(isset($_GET['test']))
        echo $consulta;
    $stmt = $cnx->prepare($consulta);
    $stmt->execute();
    $botones = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $data = [
        'producto' => $data,
        'pack' => $pack,
        'botones' => $botones,
    ];
    return $data;
}
?>
