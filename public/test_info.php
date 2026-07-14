<?php
echo "php_ini: " . php_ini_loaded_file() . "\n";
echo "SAPI: " . php_sapi_name() . "\n";
$extensions = get_loaded_extensions();
echo "Extensions: " . implode(", ", $extensions) . "\n";
