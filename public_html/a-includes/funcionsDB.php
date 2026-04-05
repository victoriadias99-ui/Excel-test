<?php
include("conexion.php");
include("class.autonum.php");

// FIX BUG-04: todas las funciones usan prepared statements con placeholders
// para prevenir SQL Injection. Nunca más concatenación directa de variables.

function updateCountContact($_num, $_lista) {
    $cnx = OpenCon();
    $consulta = 'UPDATE `v2_contacto_contador` SET `ultimo` = ? WHERE lista = ?';
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([$_num, $_lista]);
}

function getCountContact($_lista) {
    $cnx = OpenCon();
    $consulta = "SELECT `ultimo` FROM `v2_contacto_contador` WHERE `lista` = ?";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([$_lista]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return count($rows) == 0 ? null : $rows[0]['ultimo'];
}

function insertContact($_email, $_fecha, $_nombre, $_pais, $_sms, $_lista) {
    $cnx = OpenCon();
    $consulta = 'INSERT INTO `v2_contacto`(`email`, `fecha_registro`, `nombre`, `pais`, `sms`, `lista`) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([$_email, $_fecha, $_nombre, $_pais, $_sms, $_lista]);
}

function getContact($_email, $_lista) {
    $cnx = OpenCon();
    $consulta = "SELECT * FROM `v2_contacto` WHERE `email` = ? AND `lista` = ?";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([$_email, $_lista]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return count($rows) == 0 ? null : $rows[0];
}

function deleteContact($_email, $_lista) {
    $cnx = OpenCon();
    $consulta = "DELETE FROM `v2_contacto` WHERE `email` = ? AND `lista` = ?";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([$_email, $_lista]);
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
    // FIX BUG-04: reemplazado concatenación vulnerable por placeholder
    $cnx = OpenCon();
    $consulta = "SELECT * FROM `ip_visita` WHERE `ip` = ? AND `id_producto` = ?";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([$_ip, $idCurso]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return count($rows) == 0 ? null : $rows[0];
}

function getVenta($idVenta) {
    // FIX BUG-04: reemplazado concatenación vulnerable por placeholder
    $cnx = OpenCon();
    $consulta = "SELECT * FROM `ventas` WHERE `ID` = ? ORDER BY `FECHA` DESC";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([$idVenta]);
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
    // FIX BUG-09: SELECT específico en lugar de SELECT * para reducir payload de BD→PHP
    $cnx = OpenCon();

    $consulta = "SELECT CURSO, PRECIO, PRECIO_OFICIAL, URL_CHECKOUT, NOMBRE FROM cursos_detalle WHERE CURSO = ?";
    $stmt = $cnx->prepare($consulta);
    $stmt->bindValue(1, $idCurso, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = count($rows) == 0 ? null : $rows[0];

    $consulta = "SELECT ID_ABRE, ID_PACK, PRECIO, URL_CHECKOUT FROM cursos_pack WHERE ID_ABRE = ?";
    $stmt = $cnx->prepare($consulta);
    $stmt->bindValue(1, $idCurso, PDO::PARAM_STR);
    $stmt->execute();
    $pack = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return [
        'producto' => $data,
        'pack'     => $pack,
    ];
}

function getCursoDetalleDown($idCurso){
    $cnx = OpenCon();
    $consulta = "SELECT * FROM cursos_pack_down where ID_ABRE=?;";
    $stmt = $cnx->prepare($consulta);
    $stmt->bindValue(1, $idCurso, PDO::PARAM_STR);
    $stmt->execute();
    $pack = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $pack;
}
?>
