-- Script para crear el curso Gemini en la base de datos
-- Ejecutar en: aprendee_argentina_3_6_21

-- 1. Insertar en tabla cursos_detalle
INSERT INTO cursos_detalle (
    CURSO,
    TITULO,
    DESCRIPCION,
    DIR,
    IMAGEN,
    PRECIO_UNITARIO,
    PORCENTAJE_DES,
    ESTADO
) VALUES (
    'gemini',
    'Curso de Gemini desde Cero',
    'Aprende a usar Google Gemini para trabajar, crear y automatizar 10× más rápido',
    '../gemini-mockup/',
    '../a-img/logo-gemini.png',
    12999,
    23,
    1
) ON DUPLICATE KEY UPDATE
    TITULO = 'Curso de Gemini desde Cero',
    DESCRIPCION = 'Aprende a usar Google Gemini para trabajar, crear y automatizar 10× más rápido',
    PRECIO_UNITARIO = 12999,
    PORCENTAJE_DES = 23;

-- 2. Insertar en tabla cursos_pack (si es necesario)
-- INSERT INTO cursos_pack (ID_ABRE, TITULO_1, TITULO_2, DESCRIPCION, PRECIO, ESTADO)
-- VALUES ('gemini', 'Acceso Completo', 'Pack Completo', 'Acceso completo al curso', 0, 1);

-- 3. Insertar en tabla cursos_botones (si es necesario)
-- INSERT INTO cursos_botones (ids, boton, estado)
-- VALUES ('gemini', 'Quiero este curso', 1);
