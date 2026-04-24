<?php
/**
 * Script para optimizar la imagen del logo Gemini
 * Ejecutar una vez: http://localhost/gemini-mockup/optimize-logo.php
 */

$logoPath = '../a-img/logo-gemini.png';

if (!file_exists($logoPath)) {
    die("❌ Logo no encontrado: $logoPath");
}

try {
    // Obtener tamaño original
    $sizeOriginal = filesize($logoPath);
    echo "📦 Tamaño original: " . round($sizeOriginal / 1024) . " KB<br>";

    // Crear copia backup
    copy($logoPath, $logoPath . '.backup');

    // Usar GD para reducir tamaño
    $img = imagecreatefrompng($logoPath);
    if (!$img) {
        throw new Exception("No se pudo abrir la imagen PNG");
    }

    $width = imagesx($img);
    $height = imagesy($img);
    echo "Dimensiones originales: {$width}x{$height} px<br>";

    // Redimensionar a máximo 400px de ancho
    $maxWidth = 400;
    if ($width > $maxWidth) {
        $ratio = $maxWidth / $width;
        $newHeight = (int)($height * $ratio);
        $newWidth = $maxWidth;

        $img_resized = imagecreatetruecolor($newWidth, $newHeight);

        // Preservar transparencia
        $transparent = imagecolorallocatealpha($img_resized, 0, 0, 0, 127);
        imagefill($img_resized, 0, 0, $transparent);
        imagesavealpha($img_resized, true);

        imagecopyresampled($img_resized, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        imagepng($img_resized, $logoPath, 6);
        imagedestroy($img_resized);
        echo "✅ Redimensionado a: {$newWidth}x{$newHeight} px<br>";
    }

    imagedestroy($img);

    // Tamaño final
    $sizeFinal = filesize($logoPath);
    $reduction = round((1 - $sizeFinal / $sizeOriginal) * 100);

    echo "✅ Tamaño final: " . round($sizeFinal / 1024) . " KB<br>";
    echo "✅ Reducción: {$reduction}%<br>";
    echo "<br><a href='index.html'>Volver al curso</a>";

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
