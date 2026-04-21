<?php
/**
 * Script de setup para crear/actualizar el curso Gemini en la BD
 * Ejecutar una sola vez: http://localhost/gemini-mockup/setup-curso.php
 */

try {
    include("../n-includes/conexion.php");

    $cnx = OpenCon();

    // Datos del curso
    $datos = [
        'CURSO' => 'gemini',
        'TITULO' => 'Curso de Gemini desde Cero',
        'DESCRIPCION' => 'Aprende a usar Google Gemini para trabajar, crear y automatizar 10× más rápido',
        'DIR' => '../gemini-mockup/',
        'IMAGEN' => '../a-img/logo-gemini.png',
        'PRECIO_UNITARIO' => 12999,
        'PORCENTAJE_DES' => 23,
        'ESTADO' => 1,
    ];

    // 1. Verificar si existe
    $consulta = "SELECT * FROM cursos_detalle WHERE CURSO = ?";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute(['gemini']);
    $existe = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existe) {
        // Actualizar
        $consulta = "UPDATE cursos_detalle SET TITULO=?, DESCRIPCION=?, PRECIO_UNITARIO=?, PORCENTAJE_DES=? WHERE CURSO=?";
        $stmt = $cnx->prepare($consulta);
        $stmt->execute([
            $datos['TITULO'],
            $datos['DESCRIPCION'],
            $datos['PRECIO_UNITARIO'],
            $datos['PORCENTAJE_DES'],
            'gemini'
        ]);
        echo "✅ Curso actualizado exitosamente<br>";
    } else {
        // Insertar
        $consulta = "INSERT INTO cursos_detalle (CURSO, TITULO, DESCRIPCION, DIR, IMAGEN, PRECIO_UNITARIO, PORCENTAJE_DES, ESTADO)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $cnx->prepare($consulta);
        $stmt->execute([
            $datos['CURSO'],
            $datos['TITULO'],
            $datos['DESCRIPCION'],
            $datos['DIR'],
            $datos['IMAGEN'],
            $datos['PRECIO_UNITARIO'],
            $datos['PORCENTAJE_DES'],
            $datos['ESTADO']
        ]);
        echo "✅ Curso creado exitosamente<br>";
    }

    echo "Datos del curso:<br>";
    echo "<pre>";
    print_r($datos);
    echo "</pre>";
    echo "<br><a href='checkout.php'>Ver checkout</a>";

} catch (Exception $e) {
    echo "❌ Error: " . htmlspecialchars($e->getMessage());
    echo "<br><br>Detalles técnicos:<br>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}
?>
