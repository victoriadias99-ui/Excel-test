<?php
// Endpoint público: devuelve precios actuales de cursos_detalle
// Usado por la Academia (Railway) para importar/sincronizar precios
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include('n-includes/conexion.php');

try {
    $cnx = OpenCon();
    $stmt = $cnx->prepare("SELECT CURSO, TITULO, PRECIO_UNITARIO FROM cursos_detalle ORDER BY CURSO");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $precios = [];
    foreach ($rows as $r) {
        $precios[$r['CURSO']] = [
            'titulo'          => $r['TITULO'],
            'precio_unitario' => intval($r['PRECIO_UNITARIO']),
        ];
    }

    echo json_encode(['ok' => true, 'precios' => $precios]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => $e->getMessage()]);
}
