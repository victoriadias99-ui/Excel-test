-- ============================================================
-- Migración: Agregar columna MONEDA a la tabla ventas
-- ============================================================
-- Propósito: Guardar la moneda ISO 4217 (USD, ARS, MXN, COP, etc.)
-- de cada transacción para poder reportar ingresos por moneda en
-- Google Analytics 4 (evento purchase).
--
-- Ejecutar UNA sola vez en producción (preferentemente off-peak).
-- Las filas existentes quedan con MONEDA=NULL (se interpretan como
-- ARS por defecto en el frontend, por retrocompatibilidad).
--
-- Estimado: operación liviana, ~segundos en tablas < 100k rows.
-- ============================================================

ALTER TABLE ventas
  ADD COLUMN MONEDA VARCHAR(3) NULL DEFAULT NULL
  AFTER IMP_RECIBIDO_NETO_MP;

-- Verificación post-migración:
-- SHOW COLUMNS FROM ventas LIKE 'MONEDA';
-- Debe devolver: MONEDA | varchar(3) | YES | NULL
