<?php
/**
 * redis-client.php
 * ----------------
 * Conexión a Redis y helpers de caché para reducir egress de red y latencia.
 *
 * Railway provee REDIS_URL automáticamente cuando se agrega el plugin Redis.
 * Si la variable no existe o la conexión falla, todas las funciones degradan
 * silenciosamente: cacheGet() devuelve null, cacheSet()/cacheDel() no hacen nada.
 *
 * Uso:
 *   $val = cacheGet('geo:1.2.3.4');          // null si miss o Redis no disponible
 *   cacheSet('geo:1.2.3.4', $json, 86400);   // TTL en segundos (86400 = 24 h)
 *   cacheDel('courses:batch');
 *
 * Debug:
 *   Set REDIS_DEBUG=1 to write detailed logs to /tmp/redis-debug.log
 */

/**
 * Writes a timestamped line to /tmp/redis-debug.log when REDIS_DEBUG=1.
 *
 * @param  string  $message  Log message
 * @return void
 */
function debugLog(string $message): void {
    if (getenv('REDIS_DEBUG') !== '1') {
        return;
    }
    $line = '[' . date('Y-m-d H:i:s') . '] ' . $message . PHP_EOL;
    file_put_contents('/tmp/redis-debug.log', $line, FILE_APPEND | LOCK_EX);
}

/**
 * Devuelve la instancia singleton de Redis, o null si no está disponible.
 *
 * @return Redis|null
 */
function getRedis(): ?Redis {
    static $redis    = false;   // false = aún no intentado; null = falló
    static $disabled = false;   // true = ya sabemos que no hay Redis

    if ($disabled) {
        return null;
    }

    if ($redis !== false) {
        return $redis;  // ya conectado (o null si falló antes)
    }

    // Marcar como intentado para no reintentar en la misma request
    $redis = null;

    $redisUrl = getenv('REDIS_URL');
    if (empty($redisUrl)) {
        debugLog('getRedis() - REDIS_URL is not set; Redis disabled');
        $disabled = true;
        return null;
    }

    if (!class_exists('Redis')) {
        // Extensión phpredis no instalada
        debugLog('getRedis() - phpredis extension not available; Redis disabled');
        $disabled = true;
        return null;
    }

    try {
        $parsed = parse_url($redisUrl);
        $host   = $parsed['host'] ?? '127.0.0.1';
        $port   = $parsed['port'] ?? 6379;
        $pass   = isset($parsed['pass']) && $parsed['pass'] !== '' ? $parsed['pass'] : null;
        $dbNum  = isset($parsed['path']) ? (int) ltrim($parsed['path'], '/') : 0;

        if (empty($host)) {
            throw new Exception('Redis host is empty after parsing REDIS_URL');
        }

        debugLog("getRedis() - Parsed: host={$host}, port={$port}, db={$dbNum}");

        $r = new Redis();

        // Attempt connection with a 3-second timeout; retry once on failure
        // to handle slow hostname resolution on Railway's private network.
        $connected = false;
        for ($attempt = 1; $attempt <= 2; $attempt++) {
            try {
                $r->connect($host, (int) $port, 3.0);
                $connected = true;
                debugLog("getRedis() - TCP connect succeeded on attempt {$attempt}");
                break;
            } catch (Exception $ce) {
                debugLog("getRedis() - Connect attempt {$attempt} failed: " . $ce->getMessage());
                if ($attempt === 2) {
                    throw $ce;  // re-throw after final attempt
                }
            }
        }

        if ($pass !== null) {
            $r->auth($pass);
        }
        if ($dbNum > 0) {
            $r->select($dbNum);
        }

        // Verify the connection is alive with a PING
        $r->ping();

        debugLog('getRedis() - Connection successful and verified');
        $redis = $r;
    } catch (Exception $e) {
        // Redis no disponible — continuar sin caché
        debugLog('getRedis() - Connection failed: ' . $e->getMessage());
        $redis    = null;
        $disabled = true;
    }

    return $redis;
}

/**
 * Lee un valor del caché Redis.
 *
 * @param  string      $key  Clave de caché (ej: 'geo:1.2.3.4')
 * @return string|null       Valor almacenado, o null si no existe / Redis no disponible
 */
function cacheGet(string $key): ?string {
    debugLog("cacheGet() - Fetching key={$key}");
    $r = getRedis();
    if ($r === null) {
        debugLog("cacheGet() - Redis unavailable; returning null for key={$key}");
        return null;
    }
    try {
        $val = $r->get($key);
        if ($val === false) {
            debugLog("cacheGet() - Miss for key={$key}");
            return null;
        }
        debugLog("cacheGet() - Hit for key={$key}");
        return $val;
    } catch (Exception $e) {
        debugLog("cacheGet() - Exception for key={$key}: " . $e->getMessage());
        return null;
    }
}

/**
 * Guarda un valor en Redis con TTL opcional.
 *
 * @param  string  $key    Clave de caché
 * @param  string  $value  Valor a almacenar (usar json_encode() para arrays)
 * @param  int     $ttl    Tiempo de vida en segundos (0 = sin expiración)
 * @return bool            true si se guardó, false si Redis no disponible
 */
function cacheSet(string $key, string $value, int $ttl = 0): bool {
    debugLog("cacheSet() - Storing key={$key}, ttl={$ttl}");
    $r = getRedis();
    if ($r === null) {
        debugLog("cacheSet() - Redis unavailable; skipping key={$key}");
        return false;
    }
    try {
        if ($ttl > 0) {
            $result = (bool) $r->setex($key, $ttl, $value);
        } else {
            $result = (bool) $r->set($key, $value);
        }
        debugLog('cacheSet() - Result: ' . ($result ? 'true' : 'false') . " for key={$key}");
        return $result;
    } catch (Exception $e) {
        debugLog("cacheSet() - Exception for key={$key}: " . $e->getMessage());
        return false;
    }
}

/**
 * Elimina una clave del caché Redis.
 *
 * @param  string  $key  Clave a eliminar
 * @return bool          true si se eliminó, false si Redis no disponible
 */
function cacheDel(string $key): bool {
    debugLog("cacheDel() - Deleting key={$key}");
    $r = getRedis();
    if ($r === null) {
        debugLog("cacheDel() - Redis unavailable; skipping key={$key}");
        return false;
    }
    try {
        $result = (bool) $r->del($key);
        debugLog('cacheDel() - Result: ' . ($result ? 'true' : 'false') . " for key={$key}");
        return $result;
    } catch (Exception $e) {
        debugLog("cacheDel() - Exception for key={$key}: " . $e->getMessage());
        return false;
    }
}
