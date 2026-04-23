#!/bin/sh
exec env PHP_CLI_SERVER_WORKERS=10 php -S 0.0.0.0:${PORT:-8080} -t public_html public_html/router.php 2>&1
