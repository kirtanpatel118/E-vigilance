<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$root = '/home/vol13_3/infinityfree.com/if0_42397730/htdocs';

echo "<h2>Session & Config Diagnostics</h2>";

// 1. PHP session settings
echo "<h3>PHP Session Config:</h3><table border='1' cellpadding='4'>";
foreach (['session.save_handler','session.save_path','session.cookie_secure','session.cookie_samesite','session.use_cookies','session.gc_maxlifetime'] as $k) {
    echo "<tr><td>$k</td><td>" . ini_get($k) . "</td></tr>";
}
echo "</table>";

// 2. Check App.php proxyIPs
$app = file_get_contents($root . '/app/Config/App.php');
preg_match('/proxyIPs\s*=\s*([^;]+);/', $app, $m);
echo "<p>App.php proxyIPs: <b>" . htmlspecialchars($m[1] ?? 'NOT FOUND') . "</b></p>";

// 3. Check Session.php savePath
$sess = file_get_contents($root . '/app/Config/Session.php');
preg_match('/savePath\s*=\s*([^;]+);/', $sess, $m2);
echo "<p>Session.php savePath: <b>" . htmlspecialchars($m2[1] ?? 'NOT FOUND') . "</b></p>";

// 4. Check writable/session dir
$sessionDir = $root . '/writable/session';
echo "<p>Session dir exists: <b>" . (is_dir($sessionDir) ? 'YES' : 'NO') . "</b></p>";
echo "<p>Session dir writable: <b>" . (is_writable($sessionDir) ? 'YES' : 'NO') . "</b></p>";
$files = glob($sessionDir . '/ci_session*');
echo "<p>Session files count: <b>" . count($files) . "</b></p>";
if ($files) {
    rsort($files);
    echo "<p>Latest session file: <b>" . basename($files[0]) . "</b> (" . date('Y-m-d H:i:s', filemtime($files[0])) . ")</p>";
    echo "<pre style='background:#111;color:#0f0;font-size:11px;padding:8px'>" . htmlspecialchars(file_get_contents($files[0])) . "</pre>";
}

// 5. CI4 latest error log
$logs = glob($root . '/writable/logs/log-*.log');
if ($logs) {
    rsort($logs);
    $lines = array_slice(explode("\n", file_get_contents($logs[0])), -20);
    echo "<h3>Latest CI4 Log (last 20 lines):</h3>";
    echo "<pre style='background:#111;color:#0f0;font-size:11px;padding:8px;overflow:auto'>" . htmlspecialchars(implode("\n", $lines)) . "</pre>";
}

// 6. Check HTTPS & cookie config
echo "<p>HTTPS: <b>" . ($_SERVER['HTTPS'] ?? 'off') . "</b></p>";
echo "<p>HTTP_HOST: <b>" . ($_SERVER['HTTP_HOST'] ?? '') . "</b></p>";
