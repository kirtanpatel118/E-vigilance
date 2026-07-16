<?php
$sessionDir = '/home/vol13_3/infinityfree.com/if0_42397730/htdocs/writable/session';

if (!is_dir($sessionDir)) {
    if (mkdir($sessionDir, 0755, true)) {
        echo "<p style='color:green'>✅ Created: $sessionDir</p>";
    } else {
        echo "<p style='color:red'>❌ Failed to create session dir</p>";
    }
} else {
    echo "<p style='color:green'>✅ Session dir already exists: $sessionDir</p>";
}

// Make writable
chmod($sessionDir, 0755);
echo "<p>Permissions set to 755</p>";

// Test write
$testFile = $sessionDir . '/test_write.tmp';
if (file_put_contents($testFile, 'ok')) {
    echo "<p style='color:green'>✅ Session dir is writable!</p>";
    unlink($testFile);
} else {
    echo "<p style='color:red'>❌ Session dir NOT writable</p>";
}

if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "<p style='color:green'>✅ OPcache cleared</p>";
}
echo "<p><b>Done. Now upload app/Config/Session.php and try logging in.</b></p>";
