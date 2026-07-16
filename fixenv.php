<?php
$root = '/home/vol13_3/infinityfree.com/if0_42397730/htdocs';

$env = <<<ENV
CI_ENVIRONMENT = production

app.baseURL = 'https://e-vigilance.freepage.cc/'

database.default.hostname = sql312.infinityfree.com
database.default.database = if0_42397730_if0_42397730_ecomplaint
database.default.username = if0_42397730
database.default.password = L5rOKul31Y
database.default.DBDriver = MySQLi
database.default.port = 3306
ENV;

if (file_put_contents($root . '/.env', $env)) {
    echo "<p style='color:green'>✅ .env written successfully!</p>";
    echo "<pre>" . htmlspecialchars(file_get_contents($root . '/.env')) . "</pre>";
} else {
    echo "<p style='color:red'>❌ Failed to write .env</p>";
}

// Also clear opcache
if (function_exists('opcache_reset')) {
    opcache_reset();
    echo "<p style='color:green'>✅ OPcache cleared</p>";
}
