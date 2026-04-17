<?php
include("conexion.php");
include("class.autonum.php");

function updateCountContact($_num, $_lista) {
    $cnx = OpenCon();
    $consulta = 'UPDATE `v2_contacto_contador` SET `ultimo` = ? WHERE lista = ?';
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([$_num, $_lista]);
}

function getCountContact($_lista) {
    $cnx = OpenCon();
    $consulta = "SELECT * FROM `v2_contacto_contador` WHERE `lista` = ?";
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

function refreshIP($_ip, $idCurso, $data = null, $cache = null) {
    $cnx = OpenCon();
    $consulta = "UPDATE `ip_visita` SET `data` = ?, `cache` = ?, `visitas` = `visitas` + 1 WHERE `ip` = ? AND `id_producto` = ?";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([
        $data == null ? '' : $data,
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
    $consulta = "SELECT * FROM `ip_visita` WHERE `ip` = ? AND `id_producto` = ?";

    $cnx = OpenCon();
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([$_ip, $idCurso]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return count($rows) == 0 ? null : $rows[0];
}

function getVenta($idVenta) {
    $consulta = "SELECT * FROM `ventas` WHERE `ID` = ?";
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

/**
 * Trae varios cursos en UNA sola query (en lugar de N queries).
 * Usado por el navbar/home para precargar 10+ cursos de una vez.
 * Devuelve un array keyed por CURSO.
 */
function getCursosDetalleBatch(array $idCursos) {
    if (empty($idCursos)) return [];
    $cnx = OpenCon();
    $placeholders = implode(',', array_fill(0, count($idCursos), '?'));
    $stmt = $cnx->prepare("SELECT * FROM cursos_detalle WHERE CURSO IN ($placeholders)");
    $stmt->execute(array_values($idCursos));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $out = [];
    foreach ($rows as $row) {
        $out[$row['CURSO']] = $row;
    }
    return $out;
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
    
    
    
    $consulta = "SELECT * FROM cursos_botones WHERE ids LIKE ?";
    $likeParam = '%' . $idCurso . '%';
    if(isset($_GET['test']))
        echo $consulta;
    $stmt = $cnx->prepare($consulta);
    $stmt->execute([$likeParam]);
    $botones = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $data = [
        'producto' => $data,
        'pack' => $pack,
        'botones' => $botones,
    ];
    return $data;
}
?>
