<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$root = '/home/vol13_3/infinityfree.com/if0_42397730/htdocs';

echo "<h2>Login Diagnostics</h2>";

// 1. Check Session.php exists
$sessionFile = $root . '/app/Config/Session.php';
if (file_exists($sessionFile)) {
    echo "<p style='color:green'>✅ Session.php EXISTS</p>";
    echo "<pre>" . htmlspecialchars(file_get_contents($sessionFile)) . "</pre>";
} else {
    echo "<p style='color:red'>❌ Session.php MISSING — writing now...</p>";
    $content = <<<'PHP'
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
    file_put_contents($sessionFile, $content);
    echo "<p style='color:green'>✅ Session.php written!</p>";
}

// 2. Check writable/session dir
$sessionDir = $root . '/writable/session';
if (!is_dir($sessionDir)) {
    mkdir($sessionDir, 0755, true);
    echo "<p style='color:green'>✅ Created writable/session/</p>";
} else {
    echo "<p style='color:green'>✅ writable/session/ exists</p>";
}
$test = $sessionDir . '/test.tmp';
if (file_put_contents($test, 'ok')) { unlink($test); echo "<p style='color:green'>✅ Session dir writable</p>"; }
else { chmod($sessionDir, 0777); echo "<p style='color:orange'>⚠️ Fixed session dir permissions to 777</p>"; }

// 3. Test DB connection directly
$conn = @mysqli_connect('sql312.infinityfree.com', 'if0_42397730', 'L5rOKul31Y', 'if0_42397730_if0_42397730_ecomplaint');
if (!$conn) {
    echo "<p style='color:red'>❌ DB Connection FAILED: " . mysqli_connect_error() . "</p>";
} else {
    echo "<p style='color:green'>✅ DB Connected</p>";

    // 4. Show all users
    $r = mysqli_query($conn, "SELECT uid, fullname, email, pwd, user_level FROM user_master");
    echo "<h3>Users:</h3><table border='1' cellpadding='4'><tr><th>uid</th><th>name</th><th>email</th><th>pwd (MD5)</th><th>level</th></tr>";
    $count = 0;
    while ($row = mysqli_fetch_assoc($r)) {
        $count++;
        echo "<tr><td>{$row['uid']}</td><td>{$row['fullname']}</td><td>{$row['email']}</td><td>{$row['pwd']}</td><td>{$row['user_level']}</td></tr>";
    }
    echo "</table>";

    // 5. Reset admin password and show login details
    $newpwd = md5('admin123');
    mysqli_query($conn, "UPDATE user_master SET pwd='$newpwd' WHERE user_level=0 LIMIT 1");
    $admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email FROM user_master WHERE user_level=0 LIMIT 1"));
    if ($admin) {
        echo "<p style='color:green'><b>✅ Admin password reset to: admin123</b><br>Login email: <b>{$admin['email']}</b></p>";
    }

    mysqli_close($conn);
}

// 6. Clear OPcache
if (function_exists('opcache_reset')) { opcache_reset(); echo "<p style='color:green'>✅ OPcache cleared</p>"; }

// 7. Show latest CI4 error log
echo "<h3>Latest CI4 Error Log:</h3>";
$logs = glob($root . '/writable/logs/log-*.log');
if ($logs) {
    rsort($logs);
    $content = file_get_contents($logs[0]);
    $lines = array_slice(explode("\n", $content), -30);
    echo "<pre style='background:#111;color:#0f0;font-size:11px;padding:10px;max-height:300px;overflow:auto'>" . htmlspecialchars(implode("\n", $lines)) . "</pre>";
} else {
    echo "<p>No log files found</p>";
}

echo "<hr><p><b>All done. Now try logging in at <a href='https://e-vigilance.freepage.cc/'>https://e-vigilance.freepage.cc/</a></b></p>";
