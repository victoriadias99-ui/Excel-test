#!/bin/sh
exec PHP_CLI_SERVER_WORKERS=${PHP_CLI_SERVER_WORKERS:-4} php -S 0.0.0.0:${PORT:-8080} -t public_html public_html/router.php 2>&1
