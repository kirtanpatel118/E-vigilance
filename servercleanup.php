<?php
// E-Vigilance Server Cleanup Script
// Run once, then delete this file immediately after.
error_reporting(E_ALL);
ini_set('display_errors', 1);

$root = '/home/vol13_3/infinityfree.com/if0_42397730/htdocs';
$log = [];
$totalFreed = 0;

function deleteDir($path, &$log, &$totalFreed) {
    if (!is_dir($path)) {
        $log[] = "SKIP (not found): $path";
        return;
    }
    $size = getDirSize($path);
    $files = countFiles($path);
    $result = rrmdir($path);
    if ($result) {
        $log[] = "DELETED: $path ($files files, " . round($size/1024/1024, 2) . " MB)";
        $totalFreed += $size;
    } else {
        $log[] = "FAILED: $path";
    }
}

function deleteFile($path, &$log, &$totalFreed) {
    if (!file_exists($path)) {
        $log[] = "SKIP (not found): $path";
        return;
    }
    $size = filesize($path);
    if (unlink($path)) {
        $log[] = "DELETED file: $path (" . round($size/1024, 1) . " KB)";
        $totalFreed += $size;
    } else {
        $log[] = "FAILED to delete file: $path";
    }
}

function rrmdir($dir) {
    if (!is_dir($dir)) return false;
    $items = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($items as $item) {
        if ($item->isDir()) rmdir($item->getRealPath());
        else unlink($item->getRealPath());
    }
    return rmdir($dir);
}

function getDirSize($dir) {
    $size = 0;
    if (!is_dir($dir)) return 0;
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS)) as $file) {
        $size += $file->getSize();
    }
    return $size;
}

function countFiles($dir) {
    if (!is_dir($dir)) return 0;
    return iterator_count(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS)));
}

// ── 1. Unused media asset directories ────────────────────────────────────────
$unusedMedia = [
    'public/assets/media/stock',
    'public/assets/media/books',
    'public/assets/media/misc',
    'public/assets/media/demos',
    'public/assets/media/flags',
    'public/assets/media/svg',
    'public/assets/media/product-demos',
    'public/assets/media/products',
    'public/assets/media/icons',
    'public/assets/media/smiles',
    'public/assets/media/technology-logos',
    'public/assets/media/plugins',
];
foreach ($unusedMedia as $d) deleteDir("$root/$d", $log, $totalFreed);

// Keep only newp.png from sketchy-1, rest of illustrations go
$illustrationDirs = ['dozzy-1','sigma-1','unitedpalms-1'];
foreach ($illustrationDirs as $d) deleteDir("$root/public/assets/media/illustrations/$d", $log, $totalFreed);

// From sketchy-1 keep newp.png, delete all others
$sketchy = "$root/public/assets/media/illustrations/sketchy-1";
if (is_dir($sketchy)) {
    foreach (scandir($sketchy) as $f) {
        if ($f === '.' || $f === '..' || $f === 'newp.png') continue;
        deleteFile("$sketchy/$f", $log, $totalFreed);
    }
    $log[] = "KEPT: illustrations/sketchy-1/newp.png";
}

// From dozzy-1 keep 18.png (already deleted dir above, but handle if dir survived)
// Logos: keep 1.png, logo-2.svg, satyamev_logo.png — delete the rest
$keepLogos = ['1.png', 'logo-2.svg', 'satyamev_logo.png'];
$logosDir = "$root/public/assets/media/logos";
if (is_dir($logosDir)) {
    foreach (scandir($logosDir) as $f) {
        if ($f === '.' || $f === '..') continue;
        if (!in_array($f, $keepLogos)) {
            deleteFile("$logosDir/$f", $log, $totalFreed);
        }
    }
}

// ── 2. Unused JS files — keep only 5 essential ones ─────────────────────────
$keepJs = ['jquery-3.6.0.js', 'scripts.bundle.js', 'jquery.validate.min.js', 'abc.js'];
$jsDir = "$root/public/assets/js";
if (is_dir($jsDir)) {
    foreach (scandir($jsDir) as $f) {
        if ($f === '.' || $f === '..') continue;
        $full = "$jsDir/$f";
        if (is_dir($full)) {
            // Keep custom/authentication/sign-up/general.js, delete rest
            if ($f === 'custom') {
                $keepCustom = "$full/authentication/sign-up/general.js";
                // Delete all custom subfolders except authentication/sign-up
                foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($full, RecursiveDirectoryIterator::SKIP_DOTS)) as $item) {
                    if ($item->isFile() && $item->getRealPath() !== realpath($keepCustom)) {
                        $sz = $item->getSize();
                        unlink($item->getRealPath());
                        $totalFreed += $sz;
                    }
                }
                // Clean empty dirs
                $dirs = [];
                foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($full, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST) as $item) {
                    if ($item->isDir()) $dirs[] = $item->getRealPath();
                }
                foreach ($dirs as $emptyDir) {
                    @rmdir($emptyDir);
                }
                $log[] = "TRIMMED: js/custom/ (kept only authentication/sign-up/general.js)";
            } else {
                deleteDir($full, $log, $totalFreed);
            }
        } elseif (!in_array($f, $keepJs)) {
            deleteFile($full, $log, $totalFreed);
        }
    }
}

// ── 3. Dev-only vendor packages ───────────────────────────────────────────────
$devVendors = [
    'vendor/fakerphp',
    'vendor/phpunit',
    'vendor/nikic',
    'vendor/sebastian',
    'vendor/mikey179',
    'vendor/phar-io',
    'vendor/myclabs',
    'vendor/theseer',
];
foreach ($devVendors as $d) deleteDir("$root/$d", $log, $totalFreed);

// ── 4. Tests folder ───────────────────────────────────────────────────────────
deleteDir("$root/tests", $log, $totalFreed);

// ── 5. Test/diagnostic PHP files from htdocs root ────────────────────────────
$testFiles = [
    'diag.php','diag2.php','fix.php','fix2.php','fix3.php','finalfix.php',
    'readlog.php','test_index.php','dbtest.php','logintest.php','fixall.php',
    'fixproxyip.php','fixemployee.php','fixsession.php','sesstest.php',
    'fixproxyip2.php','fixall2.php',
];
foreach ($testFiles as $f) deleteFile("$root/$f", $log, $totalFreed);

// ── 6. system_old_bak ─────────────────────────────────────────────────────────
deleteDir("$root/system_old_bak", $log, $totalFreed);

// ── Summary ───────────────────────────────────────────────────────────────────
$mb = round($totalFreed / 1024 / 1024, 2);
echo "<h2 style='color:green'>Cleanup Complete — {$mb} MB freed</h2>";
echo "<table border='1' cellpadding='4' style='font-size:13px;font-family:monospace'>";
foreach ($log as $entry) {
    $color = str_starts_with($entry, 'DELETED') ? '#d4edda' : (str_starts_with($entry, 'FAILED') ? '#f8d7da' : '#fff3cd');
    echo "<tr style='background:$color'><td>$entry</td></tr>";
}
echo "</table>";
echo "<p style='color:red;font-weight:bold'>⚠️ DELETE THIS FILE (servercleanup.php) FROM YOUR SERVER NOW.</p>";
