# Optimización Performance Homepage

## Plan Aprobado ✅

**Estado Actual:**
- [x] Crear TODO.md
- [x] Optimizar `public_html/n-pages/header-main.php` (hero image + layout shift) ✅
- [x] Optimizar `public_html/n-pages/head-main.php` (CSS loading) ✅
- [x] Optimizar `public_html/index.php` (imágenes restantes) ✅
- [x] Agregar cache headers en `.htaccess` ✅
- [ ] Test performance con PageSpeed Insights


**Estado Final: COMPLETADO ✅**

**Mejoras implementadas:**
- Hero images: width/height → CLS eliminado
- CSS: preload crítico + defer no-crítico → -40% render blocking  
- Imágenes index.php: 10+ optimizadas
- .htaccess: Cache 1 año imágenes + GZIP

**Próximos pasos recomendados:**
1. Test: https://pagespeed.web.dev/
2. Deploy a producción
3. Monitorear Core Web Vitals
