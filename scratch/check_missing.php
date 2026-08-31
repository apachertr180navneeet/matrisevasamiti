<?php
$baseUrl = 'https://charitics.temptics.com/';
$html = file_get_contents('scratch_charitics_index.html');
$css = file_get_contents('assets/css/charitics-style.css');

$allUrls = [];
preg_match_all('/(?:src|href)=["\']([^"\']+\.(?:png|jpg|jpeg|svg|gif|webp|woff|woff2|ttf|eot))[\'"]/i', $html, $m1);
preg_match_all('/url\([\'"]?([^\'")\?#]+\.(?:png|jpg|jpeg|svg|gif|webp|woff|woff2|ttf|eot))[\'"]?\)/i', $css, $m2);

foreach ($m1[1] as $u) $allUrls[] = $u;
foreach ($m2[1] as $u) {
    if (strpos($u, '../') === 0) {
        $allUrls[] = 'assets/' . substr($u, 3);
    } else {
        $allUrls[] = 'assets/css/' . $u;
    }
}

$allUrls = array_unique($allUrls);

$missing = [];
foreach ($allUrls as $u) {
    $clean = ltrim(preg_replace('/\?.*$/', '', $u), '/');
    if (!file_exists(__DIR__ . '/../' . $clean)) {
        $missing[] = $clean;
    }
}

echo "Missing files (" . count($missing) . "):\n";
foreach ($missing as $m) {
    echo "$m\n";
    $url = $baseUrl . $m;
    $local = __DIR__ . '/../' . $m;
    $dir = dirname($local);
    if (!is_dir($dir)) mkdir($dir, 0777, true);
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($code == 200 && $data) {
        file_put_contents($local, $data);
        echo " -> Downloaded $m\n";
    } else {
        echo " -> FAILED $code for $url\n";
    }
}
