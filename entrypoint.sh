#!/bin/sh
exec php -S 0.0.0.0:${PORT:-8080} -t public_html public_html/router.php 2>&1
