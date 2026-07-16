<?php
$root = '/home/vol13_3/infinityfree.com/if0_42397730/htdocs';

// Fix App.php proxyIPs
$file = $root . '/app/Config/App.php';
$content = file_get_contents($file);
$fixed = str_replace("public \$proxyIPs = '';", "public \$proxyIPs = [];", $content);
if ($fixed !== $content) {
    file_put_contents($file, $fixed);
    echo "<p style='color:green'>✅ Fixed App.php: proxyIPs = '' → []</p>";
} else {
    echo "<p style='color:orange'>⚠️ proxyIPs already correct</p>";
}

// Fix forgot_pwd.php redirect
$fpwd = $root . '/app/Views/forgot_pwd.php';
$fc = file_get_contents($fpwd);
$fc2 = str_replace(
    "window.location.href = '<?= base_url('sign-in') ?>';",
    "window.location.href = '<?= base_url('/') ?>';",
    $fc
);
// Also remove bad base href
$fc2 = str_replace('<head><base href="../../../">', '<head>', $fc2);
if ($fc2 !== $fc) {
    file_put_contents($fpwd, $fc2);
    echo "<p style='color:green'>✅ Fixed forgot_pwd.php redirect + base href</p>";
} else {
    echo "<p style='color:orange'>⚠️ forgot_pwd.php already correct</p>";
}

if (function_exists('opcache_reset')) { opcache_reset(); echo "<p style='color:green'>✅ OPcache cleared</p>"; }
echo "<p><b>Done! Try logging in at <a href='https://e-vigilance.freepage.cc/'>https://e-vigilance.freepage.cc/</a></b></p>";
