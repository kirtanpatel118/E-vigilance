<?php
echo "extension_dir: " . ini_get('extension_dir') . "\n";
echo "mysqli: " . (extension_loaded('mysqli') ? 'YES' : 'NO') . "\n";
echo "DEFINED: " . (defined('MYSQLI_STORE_RESULT') ? 'YES' : 'NO') . "\n";
