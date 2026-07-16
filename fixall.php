<?php
$root = '/home/vol13_3/infinityfree.com/if0_42397730/htdocs';

echo "<h2>Fix All — Session + OPcache</h2>";

// 1. Write Session.php
$sessionConfig = <<<'PHP'
<?php
namespace Config;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Session\Handlers\FileHandler;
class Session extends BaseConfig
{
    public string $driver = FileHandler::class;
    public string $cookieName = 'ci_session';
    public int $expiration = 7200;
    public string $savePath = '/home/vol13_3/infinityfree.com/if0_42397730/htdocs/writable/session';
    public bool $matchIP = false;
    public int $timeToUpdate = 300;
    public bool $regenerateDestroy = false;
    public ?string $DBGroup = null;
}
PHP;

if (file_put_contents($root . '/app/Config/Session.php', $sessionConfig)) {
    echo "<p style='color:green'>✅ Session.php written</p>";
} else {
    echo "<p style='color:red'>❌ Failed to write Session.php</p>";
}

// 2. Create writable/session directory
$sessionDir = $root . '/writable/session';
if (!is_dir($sessionDir)) {
    mkdir($sessionDir, 0755, true);
    echo "<p style='color:green'>✅ Created writable/session/</p>";
} else {
    echo "<p style='color:green'>✅ writable/session/ exists</p>";
}
chmod($sessionDir, 0755);

// Test write to session dir
$test = $sessionDir . '/test.tmp';
if (file_put_contents($test, 'ok')) {
    unlink($test);
    echo "<p style='color:green'>✅ Session dir is writable</p>";
} else {
    echo "<p style='color:red'>❌ Session dir NOT writable — trying 0777</p>";
    chmod($sessionDir, 0777);
}

// 3. Clear OPcache
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "<p style='color:green'>✅ OPcache cleared</p>";
}

// 4. Verify Session.php exists and is readable
if (file_exists($root . '/app/Config/Session.php')) {
    echo "<p style='color:green'>✅ Session.php confirmed on disk</p>";
    echo "<pre>" . htmlspecialchars(file_get_contents($root . '/app/Config/Session.php')) . "</pre>";
}

echo "<h3 style='color:green'>All done! Now try logging in at <a href='https://e-vigilance.freepage.cc/'>https://e-vigilance.freepage.cc/</a></h3>";
