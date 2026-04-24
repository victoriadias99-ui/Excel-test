-- Script de optimización de BD para mejorar performance
-- Ejecutar en: aprendee_argentina_3_6_21

-- 1. Añadir índices a tabla ip_visita si no los tiene
ALTER TABLE `ip_visita`
ADD INDEX IF NOT EXISTS `idx_ip_producto` (`ip`, `id_producto`),
ADD INDEX IF NOT EXISTS `idx_producto` (`id_producto`),
ADD INDEX IF NOT EXISTS `idx_fecha` (`fecha_registro`);

-- 2. Optimizar tablas
OPTIMIZE TABLE `ip_visita`;
OPTIMIZE TABLE `cursos_detalle`;
OPTIMIZE TABLE `cursos_pack`;
OPTIMIZE TABLE `cursos_botones`;
OPTIMIZE TABLE `ventas`;

-- 3. Verificar índices existentes (para diagnóstico)
-- SHOW INDEXES FROM `ip_visita`;
-- SHOW INDEXES FROM `cursos_detalle`;
