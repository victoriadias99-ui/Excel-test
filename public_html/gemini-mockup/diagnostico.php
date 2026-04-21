<?php
/**
 * Script de diagnóstico para verificar la configuración de Stripe
 * http://localhost/gemini-mockup/diagnostico.php
 * NOTA: No incluye logicparametros.php para evitar redirects
 */

header('Content-Type: text/html; charset=utf-8');

// Evitar redirects
if (!isset($_GET['dev'])) {
    $_GET['dev'] = 1; // Simular dev mode para evitar redirects
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Diagnóstico Stripe - Gemini</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f5f5f5; }
        .check { padding: 15px; margin: 10px 0; border-radius: 5px; }
        .ok { background: #d4edda; border-left: 4px solid #28a745; }
        .error { background: #f8d7da; border-left: 4px solid #dc3545; }
        .warning { background: #fff3cd; border-left: 4px solid #ffc107; }
        code { background: #f1f1f1; padding: 2px 5px; border-radius: 3px; }
    </style>
</head>
<body>
    <h1>🔍 Diagnóstico de Configuración Stripe - Gemini</h1>

    <?php
    try {
        // Conexión directa sin logicparametros
        require_once dirname(__DIR__) . '/n-libraries/vendor/autoload.php';
        include("../n-includes/conexion.php");
        $cnx = OpenCon();

        // 1. Verificar que BD está disponible
        echo '<div class="check ok">✅ Conexión a BD: OK</div>';

        // 2. Verificar curso gemini
        $consulta = "SELECT * FROM cursos_detalle WHERE CURSO = 'gemini'";
        $stmt = $cnx->prepare($consulta);
        $stmt->execute();
        $curso = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($curso) {
            echo '<div class="check ok">✅ Curso Gemini encontrado en BD</div>';
            echo '<div class="check">';
            echo "ID: {$curso['CURSO']}<br>";
            echo "Título: {$curso['TITULO']}<br>";
            echo "Precio: {$curso['PRECIO_UNITARIO']}<br>";
            echo "Descuento: {$curso['PORCENTAJE_DES']}%<br>";
            echo '</div>';
        } else {
            echo '<div class="check error">❌ Curso Gemini NO ENCONTRADO en BD</div>';
            echo '<div class="check warning">⚠️ Solución: Ejecuta primero:<br><code>https://aprende-excel.com/gemini-mockup/setup-stripe-auto.php</code></div>';
            throw new Exception("Curso no encontrado");
        }

        // 3. Verificar clave Stripe
        if (empty($curso['STRIPE_SECRET_KEY'])) {
            echo '<div class="check error">❌ STRIPE_SECRET_KEY está vacía</div>';
            echo '<div class="check warning">⚠️ Solución: Ejecuta:<br><code>https://aprende-excel.com/gemini-mockup/setup-stripe-auto.php</code></div>';
            throw new Exception("Clave Stripe vacía");
        } else {
            $keyStart = substr($curso['STRIPE_SECRET_KEY'], 0, 20);
            echo "<div class=\"check ok\">✅ STRIPE_SECRET_KEY configurada: {$keyStart}...</div>";
        }

        // 4. Verificar archivo realizarVentaStripe.php
        $ventaFile = '../a-libraries/realizarVentaStripe.php';
        if (file_exists($ventaFile)) {
            echo "<div class=\"check ok\">✅ Archivo realizarVentaStripe.php existe</div>";
        } else {
            echo "<div class=\"check error\">❌ Archivo realizarVentaStripe.php NO ENCONTRADO</div>";
            echo "<div class=\"check warning\">Ruta esperada: {$ventaFile}</div>";
        }

        // 5. Verificar archivos JavaScript
        $jsFile = '../n-libraries/js/checkoutv4.js';
        if (file_exists($jsFile)) {
            echo "<div class=\"check ok\">✅ Archivo checkoutv4.js existe</div>";
        } else {
            echo "<div class=\"check error\">❌ Archivo checkoutv4.js NO ENCONTRADO</div>";
        }

        // 6. Verificar archivo form.php
        $formFile = '../n-pages/form.php';
        if (file_exists($formFile)) {
            echo "<div class=\"check ok\">✅ Archivo form.php existe</div>";
        } else {
            echo "<div class=\"check error\">❌ Archivo form.php NO ENCONTRADO</div>";
        }

        // 7. Test de API
        echo '<div class="check">';
        echo '<strong>📝 Test de llamada a API:</strong><br>';
        echo 'Intenta abrir en nueva pestaña (con datos de prueba):<br>';
        $testUrl = 'https://' . $_SERVER['HTTP_HOST'] . '/a-libraries/realizarVentaStripe.php?curso=gemini&email=test@test.com&nombre=Test&apellido=User&moneda=ARS&country=AR&test=1';
        echo "<code style='display: block; word-break: break-all; margin-top: 10px;'>";
        echo "<a href='{$testUrl}' target='_blank'>Ver respuesta API →</a>";
        echo "</code>";
        echo '</div>';

        echo '<div class="check ok"><strong>✅ Configuración aparentemente correcta</strong></div>';
        echo '<div class="check">Si sigue sin funcionar, verifica la consola del navegador (F12) para errores JavaScript.</div>';

    } catch (Exception $e) {
        echo '<div class="check error">❌ Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
    ?>

    <hr>
    <div style="font-size: 12px; color: #666;">
        <p><strong>Próximos pasos:</strong></p>
        <ol>
            <li>Si ves ❌ rojo, ejecuta el setup: <code>setup-stripe-auto.php</code></li>
            <li>Luego vuelve a esta página y recarga (F5)</li>
            <li>Verifica que todos los checks muestren ✅</li>
            <li>Intenta el pago nuevamente</li>
        </ol>
    </div>

</body>
</html>
