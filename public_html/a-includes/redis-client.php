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
 */

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
        $disabled = true;
        return null;
    }

    if (!class_exists('Redis')) {
        // Extensión phpredis no instalada
        $disabled = true;
        return null;
    }

    try {
        $parsed = parse_url($redisUrl);
        $host   = $parsed['host'] ?? '127.0.0.1';
        $port   = $parsed['port'] ?? 6379;
        $pass   = isset($parsed['pass']) && $parsed['pass'] !== '' ? $parsed['pass'] : null;
        $dbNum  = isset($parsed['path']) ? (int) ltrim($parsed['path'], '/') : 0;

        $r = new Redis();
        // Timeout de conexión corto para no bloquear el render si Redis está caído
        $r->connect($host, (int) $port, 1.0);

        if ($pass !== null) {
            $r->auth($pass);
        }
        if ($dbNum > 0) {
            $r->select($dbNum);
        }

        $redis = $r;
    } catch (Exception $e) {
        // Redis no disponible — continuar sin caché
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
    $r = getRedis();
    if ($r === null) {
        return null;
    }
    try {
        $val = $r->get($key);
        return ($val === false) ? null : $val;
    } catch (Exception $e) {
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
    $r = getRedis();
    if ($r === null) {
        return false;
    }
    try {
        if ($ttl > 0) {
            return (bool) $r->setex($key, $ttl, $value);
        }
        return (bool) $r->set($key, $value);
    } catch (Exception $e) {
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
    $r = getRedis();
    if ($r === null) {
        return false;
    }
    try {
        return (bool) $r->del($key);
    } catch (Exception $e) {
        return false;
    }
}
