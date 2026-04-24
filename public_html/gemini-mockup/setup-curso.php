<?php
/**
 * Script de setup para crear/actualizar el curso Gemini en la BD
 * Ejecutar una sola vez: http://localhost/gemini-mockup/setup-curso.php
 */

try {
    include("../n-includes/conexion.php");

    $cnx = OpenCon();

    // Obtener clave Stripe si se envió
    $stripeKey = isset($_POST['stripe_key']) ? trim($_POST['stripe_key']) : '';

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
        'STRIPE_SECRET_KEY' => $stripeKey,
    ];

    // 1. Verificar si existe
    $consulta = "SELECT * FROM cursos_detalle WHERE CURSO = ?";
    $stmt = $cnx->prepare($consulta);
    $stmt->execute(['gemini']);
    $existe = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $stripeKey) {
        if ($existe) {
            // Actualizar
            $consulta = "UPDATE cursos_detalle SET TITULO=?, DESCRIPCION=?, PRECIO_UNITARIO=?, PORCENTAJE_DES=?, STRIPE_SECRET_KEY=? WHERE CURSO=?";
            $stmt = $cnx->prepare($consulta);
            $stmt->execute([
                $datos['TITULO'],
                $datos['DESCRIPCION'],
                $datos['PRECIO_UNITARIO'],
                $datos['PORCENTAJE_DES'],
                $stripeKey,
                'gemini'
            ]);
            echo "✅ Curso actualizado con clave Stripe exitosamente<br>";
        } else {
            // Insertar
            $consulta = "INSERT INTO cursos_detalle (CURSO, TITULO, DESCRIPCION, DIR, IMAGEN, PRECIO_UNITARIO, PORCENTAJE_DES, ESTADO, STRIPE_SECRET_KEY)
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $cnx->prepare($consulta);
            $stmt->execute([
                $datos['CURSO'],
                $datos['TITULO'],
                $datos['DESCRIPCION'],
                $datos['DIR'],
                $datos['IMAGEN'],
                $datos['PRECIO_UNITARIO'],
                $datos['PORCENTAJE_DES'],
                $datos['ESTADO'],
                $stripeKey
            ]);
            echo "✅ Curso creado exitosamente<br>";
        }

        echo "Datos del curso:<br>";
        echo "<pre>";
        print_r($datos);
        echo "</pre>";
        echo "<br><a href='checkout.php'>Ir al checkout</a>";
    } else {
        // Mostrar formulario
        if ($existe) {
            echo "ℹ️ El curso ya existe en la BD. Ingresa tu clave Stripe para actualizarlo:<br><br>";
        } else {
            echo "⚠️ El curso NO existe en la BD. Ingresa tu clave Stripe de Stripe para crearlo:<br><br>";
        }
        ?>
        <form method="POST">
            <label>Clave Stripe Secret Key:</label><br>
            <input type="password" name="stripe_key" placeholder="sk_live_..." style="width: 100%; padding: 10px; font-size: 14px;" required>
            <p style="font-size: 12px; color: #666;">Obtén tu clave en: https://dashboard.stripe.com/apikeys</p>
            <button type="submit" style="padding: 10px 20px; background: #5469d4; color: white; border: none; cursor: pointer;">Guardar clave Stripe</button>
        </form>
        <?php
    }

} catch (Exception $e) {
    echo "❌ Error: " . htmlspecialchars($e->getMessage());
    echo "<br><br>Detalles técnicos:<br>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}
?>
