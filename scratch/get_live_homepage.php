<?php
$context = stream_context_create([
    'http' => ['header' => "User-Agent: Mozilla/5.0\r\n"],
    'ssl' => ['verify_peer' => false, 'verify_peer_name' => false]
]);

$html = file_get_contents('https://matrisevasamiti.ngo/', false, $context);
file_put_contents(__DIR__ . '/live_homepage.html', $html);

preg_match_all('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $html, $matches);
echo "All <img> tags on live homepage:\n";
foreach ($matches[0] as $tag) {
    echo $tag . "\n";
}
