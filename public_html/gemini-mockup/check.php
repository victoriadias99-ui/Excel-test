<?php
/**
 * Diagnóstico STANDALONE - Sin redirects
 */
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>✅ Check Stripe - Gemini</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Arial; background: #f0f4f8; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        h1 { color: #2c3e50; margin-bottom: 30px; }
        .item { background: white; padding: 15px 20px; margin-bottom: 10px; border-radius: 5px; border-left: 5px solid #ccc; }
        .ok { border-left-color: #28a745; background: #f1f9f5; }
        .error { border-left-color: #dc3545; background: #fdf5f5; }
        .warning { border-left-color: #ffc107; background: #fffbf0; }
        .code { background: #f5f5f5; padding: 10px; border-radius: 3px; font-family: monospace; font-size: 12px; margin-top: 10px; overflow-x: auto; }
        hr { margin: 20px 0; border: none; border-top: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Verificación Stripe - Gemini</h1>

<?php
// Test 1: BD Connection
echo '<div class="item">';
try {
    // Intentar conexión manual sin logicparametros
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'aprendee_argentina_3_6_21';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        echo '<span style="color: red;">❌</span> Conexión BD: Error - ' . $conn->connect_error;
    } else {
        echo '<span style="color: green;">✅</span> Conexión BD: OK';
    }
} catch (Exception $e) {
    echo '<span style="color: red;">❌</span> Conexión BD: ' . $e->getMessage();
}
echo '</div>';

// Test 2: Curso Gemini
if (isset($conn) && $conn) {
    echo '<div class="item">';
    $result = $conn->query("SELECT * FROM cursos_detalle WHERE CURSO = 'gemini'");
    if ($result && $result->num_rows > 0) {
        $curso = $result->fetch_assoc();
        echo '<span style="color: green;">✅</span> Curso Gemini: <strong>ENCONTRADO</strong>';
        echo '<div class="code">';
        echo "ID: {$curso['CURSO']}<br>";
        echo "Título: {$curso['TITULO']}<br>";
        echo "Precio: {$curso['PRECIO_UNITARIO']}<br>";
        echo "Descuento: {$curso['PORCENTAJE_DES']}%<br>";
        echo '</div>';
    } else {
        echo '<span style="color: red;">❌</span> Curso Gemini: <strong>NO ENCONTRADO</strong>';
        echo '<div class="code">Ejecuta primero:<br>https://aprende-excel.com/gemini-mockup/setup-stripe-auto.php</div>';
    }
    echo '</div>';

    // Test 3: Clave Stripe
    if ($result && $result->num_rows > 0) {
        echo '<div class="item">';
        if (empty($curso['STRIPE_SECRET_KEY'])) {
            echo '<span style="color: red;">❌</span> STRIPE_SECRET_KEY: <strong>VACÍA</strong>';
            echo '<div class="code">Ejecuta:<br>https://aprende-excel.com/gemini-mockup/setup-stripe-auto.php</div>';
        } else {
            $key = substr($curso['STRIPE_SECRET_KEY'], 0, 30) . '...';
            echo '<span style="color: green;">✅</span> STRIPE_SECRET_KEY: <strong>CONFIGURADA</strong>';
            echo '<div class="code">' . htmlspecialchars($key) . '</div>';
        }
        echo '</div>';
    }

    // Test 4: Archivos
    echo '<div class="item">';
    $files = [
        '../a-libraries/realizarVentaStripe.php' => 'Procesador de pagos',
        '../n-libraries/js/checkoutv4.js' => 'JavaScript checkout',
        '../n-pages/form.php' => 'Formulario'
    ];

    $allOk = true;
    foreach ($files as $path => $name) {
        $exists = file_exists($path);
        $status = $exists ? '<span style="color: green;">✅</span>' : '<span style="color: red;">❌</span>';
        echo "$status $name<br>";
        if (!$exists) $allOk = false;
    }

    if ($allOk) {
        echo '<div class="code" style="color: green;">Todos los archivos existen</div>';
    }
    echo '</div>';

    $conn->close();
}

echo '<hr>';
echo '<div class="item warning">';
echo '<strong>📝 Próximos pasos:</strong><br>';
echo '1. Si ves ❌ rojo arriba, ejecuta: setup-stripe-auto.php<br>';
echo '2. Recarga esta página (F5)<br>';
echo '3. Verifica que todos sean ✅ verde<br>';
echo '4. Intenta el pago nuevamente<br>';
echo '</div>';
?>

    </div>
</body>
</html>
