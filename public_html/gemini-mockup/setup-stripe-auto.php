<?php
/**
 * Script para copiar la clave Stripe de otro curso a Gemini
 * Ejecutar una sola vez: http://localhost/gemini-mockup/setup-stripe-auto.php
 */

try {
    include("../n-includes/conexion.php");

    $cnx = OpenCon();

    // 1. Obtener clave Stripe de un curso existente (excel_inicial)
    $consulta = "SELECT STRIPE_SECRET_KEY FROM cursos_detalle WHERE CURSO = ? LIMIT 1";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute(['excel_inicial']);
    $cursoExistente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cursoExistente || empty($cursoExistente['STRIPE_SECRET_KEY'])) {
        die("❌ No se encontró clave Stripe en curso existente");
    }

    $stripeKey = $cursoExistente['STRIPE_SECRET_KEY'];

    // 2. Verificar si existe el curso gemini
    $consulta = "SELECT * FROM cursos_detalle WHERE CURSO = ?";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute(['gemini']);
    $existe = $stmt->fetch(PDO::FETCH_ASSOC);

    // 3. Insertar o actualizar
    if ($existe) {
        // Actualizar
        $consulta = "UPDATE cursos_detalle
                     SET TITULO=?, DESCRIPCION=?, PRECIO_UNITARIO=?, PORCENTAJE_DES=?, STRIPE_SECRET_KEY=?, ESTADO=?
                     WHERE CURSO=?";
        $stmt = $cnx->prepare($consulta);
        $stmt->execute([
            'Curso de Gemini desde Cero',
            'Aprende a usar Google Gemini para trabajar, crear y automatizar 10× más rápido',
            12999,
            23,
            $stripeKey,
            1,
            'gemini'
        ]);
        echo "✅ Curso Gemini ACTUALIZADO con clave Stripe<br>";
    } else {
        // Insertar
        $consulta = "INSERT INTO cursos_detalle (CURSO, TITULO, DESCRIPCION, DIR, IMAGEN, PRECIO_UNITARIO, PORCENTAJE_DES, ESTADO, STRIPE_SECRET_KEY)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $cnx->prepare($consulta);
        $stmt->execute([
            'gemini',
            'Curso de Gemini desde Cero',
            'Aprende a usar Google Gemini para trabajar, crear y automatizar 10× más rápido',
            '../gemini-mockup/',
            '../a-img/logo-gemini.png',
            12999,
            23,
            1,
            $stripeKey
        ]);
        echo "✅ Curso Gemini CREADO con clave Stripe<br>";
    }

    echo "<br><strong>Detalles del curso:</strong><br>";
    echo "Curso ID: gemini<br>";
    echo "Título: Curso de Gemini desde Cero<br>";
    echo "Precio: AR$ 12.999<br>";
    echo "Descuento: 23%<br>";
    echo "Clave Stripe: " . substr($stripeKey, 0, 20) . "...<br>";

    echo "<br><a href='checkout.php'>✅ Ir a Checkout</a>";

} catch (Exception $e) {
    echo "❌ Error: " . htmlspecialchars($e->getMessage());
    echo "<br><br><pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}
?>
