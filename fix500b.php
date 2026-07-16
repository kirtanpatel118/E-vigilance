<?php
// fix500b.php — patches autoload_static.php $files map + fixes autoload_files.php double-slash
// Upload to htdocs root, visit once, delete immediately.
error_reporting(E_ALL);
ini_set('display_errors', 1);

$root = '/home/vol13_3/infinityfree.com/if0_42397730/htdocs';

// Hashes for the two deleted packages
$badHashes = [
    '6124b4c8570aa390c21fafd04a26c69f', // myclabs/deep-copy/deep_copy.php
    'ec07570ca5a812141189b1fa81503674', // phpunit/phpunit/Assert/Functions.php
];

echo "<style>body{font-family:monospace;font-size:13px;padding:15px}
.ok{color:green}.bad{color:red}.warn{color:orange}pre{background:#f4f4f4;padding:10px;overflow-x:auto;white-space:pre-wrap;word-break:break-all}</style>";

echo "<h2>Fix500b — Autoload Static Patcher</h2>";

// ── 1. Fix autoload_files.php double-slash left by previous script ────────────
$af = $root . '/vendor/composer/autoload_files.php';
$afContent = file_get_contents($af);
if (strpos($afContent, "/'//") !== false || preg_match("/vendorDir \. '\/\//", $afContent)) {
    $afContent = str_replace("$vendorDir . '//", "\$vendorDir . '/", $afContent);
    // more robust: fix any double-slash after the quote
    $afContent = preg_replace("/(\\\$vendorDir \. '\/)\/+/", '$1', $afContent);
    $afContent = preg_replace("/(\\\$baseDir \. '\/)\/+/", '$1', $afContent);
    if (file_put_contents($af, $afContent) !== false) {
        echo "<p class='ok'>autoload_files.php double-slash fixed.</p>";
    } else {
        echo "<p class='bad'>Could not write autoload_files.php.</p>";
    }
} else {
    echo "<p class='ok'>autoload_files.php looks clean (no double-slash).</p>";
}
echo "<pre>" . htmlspecialchars(file_get_contents($af)) . "</pre>";

// ── 2. Patch autoload_static.php — remove bad $files entries ─────────────────
$as = $root . '/vendor/composer/autoload_static.php';
$content = file_get_contents($as);

$patched = $content;
foreach ($badHashes as $hash) {
    // Match the full array line for this hash and remove it
    // Format: '6124b4c8...' => __DIR__ . '/..' . '/myclabs/...',\n
    $patched = preg_replace(
        "/\s*'" . preg_quote($hash, '/') . "'\s*=>\s*__DIR__[^,\n]+,?\n?/",
        "\n",
        $patched
    );
}

if ($patched !== $content) {
    if (file_put_contents($as, $patched) !== false) {
        echo "<p class='ok'>autoload_static.php patched — removed " . count($badHashes) . " missing file entries.</p>";
    } else {
        echo "<p class='bad'>Could not write autoload_static.php — check permissions.</p>";
    }
} else {
    echo "<p class='warn'>autoload_static.php: no matching lines found to remove. Check manually.</p>";
}

// Show the $files section of the patched file
if (preg_match('/public static \$files\s*=\s*array\s*\(.*?\);/s', $patched, $m)) {
    echo "<p><b>autoload_static.php \$files after patch:</b></p><pre>" . htmlspecialchars($m[0]) . "</pre>";
}

// ── 3. Quick verification — try to include autoload and see if it errors ──────
echo "<h3>3. Verifying — loading Composer autoloader</h3>";
$autoload = $root . '/vendor/autoload.php';
$fatal = null;
register_shutdown_function(function() {
    $err = error_get_last();
    if ($err && in_array($err['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        echo "<p class='bad'>FATAL after require: " . htmlspecialchars($err['message']) . " in " . $err['file'] . " line " . $err['line'] . "</p>";
    }
});
// Can't re-require autoload in same process, but we can check the files array directly
$filesArr = include $af;
$allOk = true;
foreach ($filesArr as $h => $path) {
    if (!file_exists($path)) {
        echo "<p class='bad'>Still missing: $path</p>";
        $allOk = false;
    }
}
if ($allOk) {
    echo "<p class='ok'>All autoload_files.php entries point to existing files.</p>";
}

// Check static too
$staticContent = file_get_contents($as);
if (preg_match('/public static \$files\s*=\s*array\s*\((.*?)\);/s', $staticContent, $m)) {
    preg_match_all("/'([a-f0-9]{32})'\s*=>\s*__DIR__\s*\.\s*'([^']+)'/", $m[1], $matches, PREG_SET_ORDER);
    foreach ($matches as $match) {
        $fullPath = $root . '/vendor/composer/' . ltrim($match[2], '/');
        // The path uses /../ to go up from composer/ to vendor/
        $realPath = realpath(dirname($as) . '/' . $match[2]);
        if ($realPath && !file_exists($realPath)) {
            echo "<p class='bad'>Static map still references missing file: $realPath</p>";
        } elseif ($realPath) {
            echo "<p class='ok'>Static map OK: " . basename($realPath) . "</p>";
        }
    }
}

echo "<h3>4. Site should be back up now</h3>";
echo "<p>Visit <a href='https://e-vigilance.freepage.cc/' target='_blank'>https://e-vigilance.freepage.cc/</a> to confirm.</p>";
echo "<p>Remaining issues from the error log:</p>";
echo "<ul>
<li><b>Feedback view not found</b> — <code>app/Views/Feedback.php</code> not on server yet. Need to upload it.</li>
<li><b>update_employee crash (uid=11)</b> — Officer uid=11 is in officer_detail only; fixed by new update_officer route, but old link in viewofficer.php may not be uploaded yet.</li>
</ul>";
echo "<hr><p style='color:red;font-weight:bold'>DELETE fix500b.php from server immediately.</p>";
