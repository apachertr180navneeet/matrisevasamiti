<?php
$files = glob(__DIR__ . '/../*.php');
$includes = glob(__DIR__ . '/../includes/*.php');
$all = array_merge($files, $includes);

$errors = 0;
foreach ($all as $f) {
    $cmd = 'php -l ' . escapeshellarg($f);
    $out = shell_exec($cmd);
    if (strpos($out, 'No syntax errors detected') === false) {
        echo "FAIL: $f\n$out\n";
        $errors++;
    } else {
        echo "PASS: " . basename($f) . "\n";
    }
}
echo "\nVerification complete: " . count($all) . " files checked. Total Errors: $errors\n";
