<?php
/**
 * debug-redis.php
 * ---------------
 * Displays the Redis debug log written by redis-client.php.
 *
 * Only accessible when REDIS_DEBUG=1 is set in the environment.
 * Shows the last 100 lines of /tmp/redis-debug.log and provides
 * a "Clear" button to reset the file.
 */

if (getenv('REDIS_DEBUG') !== '1') {
    http_response_code(403);
    die('REDIS_DEBUG is not enabled. Set REDIS_DEBUG=1 to use this endpoint.');
}

$logFile = '/tmp/redis-debug.log';

// Handle clear request
if (isset($_GET['clear'])) {
    file_put_contents($logFile, '');
    header('Location: debug-redis.php');
    die();
}

// Read last 100 lines
$lines   = [];
$hasLog  = false;
if (file_exists($logFile)) {
    $hasLog = true;
    $all    = file($logFile, FILE_IGNORE_NEW_LINES);
    $lines  = array_slice($all, -100);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redis Debug Log</title>
    <style>
        body {
            font-family: monospace;
            background: #1e1e1e;
            color: #d4d4d4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            font-family: sans-serif;
            font-size: 1.2rem;
            color: #9cdcfe;
            margin-bottom: 4px;
        }
        .meta {
            font-family: sans-serif;
            font-size: 0.8rem;
            color: #6a9955;
            margin-bottom: 16px;
        }
        .toolbar {
            margin-bottom: 12px;
        }
        .toolbar a {
            display: inline-block;
            padding: 6px 14px;
            background: #c0392b;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-family: sans-serif;
            font-size: 0.85rem;
            margin-right: 8px;
        }
        .toolbar a:hover {
            background: #e74c3c;
        }
        .toolbar a.refresh {
            background: #2980b9;
        }
        .toolbar a.refresh:hover {
            background: #3498db;
        }
        pre {
            background: #252526;
            border: 1px solid #3c3c3c;
            border-radius: 4px;
            padding: 16px;
            overflow-x: auto;
            white-space: pre-wrap;
            word-break: break-all;
            line-height: 1.5;
            font-size: 0.85rem;
        }
        .empty {
            font-family: sans-serif;
            color: #808080;
            padding: 20px;
            background: #252526;
            border: 1px solid #3c3c3c;
            border-radius: 4px;
        }
        .line-count {
            font-family: sans-serif;
            font-size: 0.75rem;
            color: #808080;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <h1>Redis Debug Log</h1>
    <div class="meta">
        Log file: <?php echo htmlspecialchars($logFile); ?>
        &nbsp;|&nbsp;
        Generated: <?php echo date('Y-m-d H:i:s'); ?>
    </div>

    <div class="toolbar">
        <a class="refresh" href="debug-redis.php">&#8635; Refresh</a>
        <a href="?clear=1" onclick="return confirm('Clear the log file?')">&#128465; Clear Log</a>
    </div>

    <?php if (!$hasLog): ?>
        <div class="empty">No log file found at <?php echo htmlspecialchars($logFile); ?>.<br>
        Make sure REDIS_DEBUG=1 is set and at least one request has been made.</div>
    <?php elseif (empty($lines)): ?>
        <div class="empty">Log file exists but is empty.</div>
    <?php else: ?>
        <div class="line-count">Showing last <?php echo count($lines); ?> line(s)</div>
        <pre><?php
            foreach ($lines as $line) {
                echo htmlspecialchars($line) . "\n";
            }
        ?></pre>
    <?php endif; ?>
</body>
</html>
