<?php
$html = file_get_contents('scratch_charitics_index.html');

// Find all CSS links
preg_match_all('/<link[^>]+href=["\']([^"\']+)["\']/i', $html, $matches);
echo "=== CSS LINKS ===\n";
foreach ($matches[1] as $m) {
    echo "$m\n";
}

// Find all JS scripts
preg_match_all('/<script[^>]+src=["\']([^"\']+)["\']/i', $html, $matches);
echo "\n=== JS SCRIPTS ===\n";
foreach ($matches[1] as $m) {
    echo "$m\n";
}

// Find all images
preg_match_all('/<img[^>]+src=["\']([^"\']+)["\']/i', $html, $matches);
echo "\n=== IMAGES (" . count($matches[1]) . ") ===\n";
$uniqueImages = array_unique($matches[1]);
foreach ($uniqueImages as $img) {
    echo "$img\n";
}

// Find main sections
preg_match_all('/<(section|header|footer|div)[^>]+class=["\']([^"\']+)["\'][^>]*>/i', $html, $matches);
echo "\n=== MAJOR CLASSES ===\n";
foreach ($matches[2] as $cls) {
    if (strpos($cls, 'ul-') !== false && (strpos($cls, 'section') !== false || strpos($cls, 'banner') !== false || strpos($cls, 'header') !== false || strpos($cls, 'footer') !== false)) {
        echo "$cls\n";
    }
}
