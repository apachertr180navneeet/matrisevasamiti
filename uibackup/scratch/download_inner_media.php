<?php
$baseUrl = 'https://charitics.temptics.com/';
$files = glob(__DIR__ . '/charitics_*.html');

$allImgs = [];
foreach ($files as $file) {
    $content = file_get_contents($file);
    preg_match_all('/(?:src|href)=["\']([^"\']+\.(?:png|jpg|jpeg|svg|gif|webp))[\'"]/i', $content, $m);
    foreach ($m[1] as $img) {
        $allImgs[] = $img;
    }
}

$allImgs = array_unique($allImgs);
echo "Total unique media in inner pages: " . count($allImgs) . "\n";

foreach ($allImgs as $img) {
    $clean = ltrim(preg_replace('/\?.*$/', '', $img), '/');
    $local = __DIR__ . '/../' . $clean;
    if (!file_exists($local) || filesize($local) == 0) {
        $dir = dirname($local);
        if (!is_dir($dir)) mkdir($dir, 0777, true);
        
        $url = $baseUrl . $clean;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 6);
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code == 200 && $data) {
            file_put_contents($local, $data);
            echo "Downloaded: $clean\n";
        } else {
            echo "Failed ($code): $clean\n";
        }
    }
}
echo "Inner page media download completed!\n";
