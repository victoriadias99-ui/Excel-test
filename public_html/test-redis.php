<?php
/**
 * test-redis.php
 * --------------
 * Diagnostic endpoint to verify the Redis connection, write, and read cycle.
 * Visit this page to confirm Redis is reachable and caching is functional.
 *
 * Remove or restrict access to this file once the issue is resolved.
 */
require_once __DIR__ . '/a-includes/redis-client.php';

echo '<pre style="background:#1a1a1a;color:#0f0;padding:20px;font-family:monospace;font-size:14px">';
echo "=== Redis Diagnostic ===\n";
echo date('Y-m-d H:i:s') . " UTC\n\n";

// ── Environment ──────────────────────────────────────────────────────────────

$redisUrl = getenv('REDIS_URL');
if (empty($redisUrl)) {
    echo "REDIS_URL: NOT SET\n\n";
} else {
    // Mask the password portion for safe display
    $masked = preg_replace('/(:\/\/)([^:@]+):([^@]+)@/', '$1$2:***@', $redisUrl);
    echo "REDIS_URL: " . htmlspecialchars($masked) . "\n";
    echo "REDIS_URL length: " . strlen($redisUrl) . " chars\n\n";
}

// Show all environment variables that mention Redis
echo "--- Redis-related env vars ---\n";
$found = false;
foreach ($_SERVER as $k => $v) {
    if (stripos($k, 'redis') !== false) {
        $safe = (stripos($k, 'pass') !== false || stripos($k, 'url') !== false || stripos($k, 'secret') !== false)
            ? preg_replace('/(:\/\/)([^:@]+):([^@]+)@/', '$1$2:***@', $v)
            : $v;
        echo htmlspecialchars($k) . " = " . htmlspecialchars($safe) . "\n";
        $found = true;
    }
}
if (!$found) {
    echo "(none found in \$_SERVER)\n";
}
echo "\n";

// ── Test 1: phpredis extension ────────────────────────────────────────────────

echo "Test 1: phpredis extension\n";
if (class_exists('Redis')) {
    echo "  SUCCESS: phpredis extension is loaded (version: " . phpversion('redis') . ")\n\n";
} else {
    echo "  FAILED: phpredis extension is NOT loaded\n";
    echo "  Install the 'redis' PHP extension and restart the server.\n";
    echo '</pre>';
    exit(1);
}

// ── Test 2: Connect to Redis ──────────────────────────────────────────────────

echo "Test 2: Connecting to Redis via getRedis()\n";
$redis = getRedis();
if ($redis === null) {
    echo "  FAILED: getRedis() returned null\n";
    echo "  Check REDIS_URL is set correctly and the Redis service is running.\n";
    echo "  Tip: set REDIS_DEBUG=1 and check /tmp/redis-debug.log for details.\n";
    echo '</pre>';
    exit(1);
}
echo "  SUCCESS: Connected to Redis\n\n";

// ── Test 3: PING ──────────────────────────────────────────────────────────────

echo "Test 3: PING\n";
try {
    $pong = $redis->ping();
    // phpredis returns '+PONG' or true depending on version
    echo "  SUCCESS: PING response = " . var_export($pong, true) . "\n\n";
} catch (Exception $e) {
    echo "  FAILED: " . htmlspecialchars($e->getMessage()) . "\n\n";
}

// ── Test 4: Write a key ───────────────────────────────────────────────────────

echo "Test 4: Writing a test key via cacheSet()\n";
$testKey   = 'test:diag:' . time();
$testValue = 'hello-' . rand(1000, 9999);
$ttl       = 60; // seconds

$writeResult = cacheSet($testKey, $testValue, $ttl);
if ($writeResult) {
    echo "  SUCCESS: Key written\n";
    echo "  Key:   $testKey\n";
    echo "  Value: $testValue\n";
    echo "  TTL:   {$ttl}s\n\n";
} else {
    echo "  FAILED: cacheSet() returned false\n";
    echo "  The connection succeeded but the write was rejected.\n";
    echo "  Check Redis memory limits, eviction policy, or ACL permissions.\n\n";
}

// ── Test 5: Read the key back ─────────────────────────────────────────────────

echo "Test 5: Reading the test key back via cacheGet()\n";
$retrieved = cacheGet($testKey);
if ($retrieved === null) {
    echo "  FAILED: cacheGet() returned null — key not found\n";
    echo "  The write may have silently failed, or the key expired immediately.\n";
    echo "  Check Redis maxmemory-policy (should not be 'noeviction' with full memory).\n\n";
} elseif ($retrieved === $testValue) {
    echo "  SUCCESS: Value matches!\n";
    echo "  Retrieved: $retrieved\n\n";
} else {
    echo "  FAILED: Value mismatch\n";
    echo "  Expected: $testValue\n";
    echo "  Got:      $retrieved\n\n";
}

// ── Test 6: TTL check ─────────────────────────────────────────────────────────

echo "Test 6: Verifying TTL is set on the key\n";
try {
    $remainingTtl = $redis->ttl($testKey);
    if ($remainingTtl > 0) {
        echo "  SUCCESS: TTL = {$remainingTtl}s remaining\n\n";
    } elseif ($remainingTtl === -1) {
        echo "  WARNING: Key exists but has no expiry (TTL = -1)\n";
        echo "  cacheSet() may not be calling SETEX correctly.\n\n";
    } elseif ($remainingTtl === -2) {
        echo "  FAILED: Key does not exist (TTL = -2)\n\n";
    } else {
        echo "  INFO: TTL = " . var_export($remainingTtl, true) . "\n\n";
    }
} catch (Exception $e) {
    echo "  ERROR: " . htmlspecialchars($e->getMessage()) . "\n\n";
}

// ── Test 7: Delete the key ────────────────────────────────────────────────────

echo "Test 7: Cleaning up — deleting test key via cacheDel()\n";
$delResult = cacheDel($testKey);
echo "  Result: " . ($delResult ? 'SUCCESS' : 'FAILED (key may already be gone)') . "\n\n";

// ── Summary ───────────────────────────────────────────────────────────────────

echo "=== Done ===\n";
echo "If all tests show SUCCESS, Redis is fully operational.\n";
echo "If any test failed, the error message above indicates the root cause.\n";

echo '</pre>';
