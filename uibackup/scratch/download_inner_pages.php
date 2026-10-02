<?php
$pages = [
    'about.html',
    'services.html',
    'service-details.html',
    'projects.html',
    'project-details.html',
    'donations.html',
    'donation-details.html',
    'events.html',
    'event-details.html',
    'faq.html',
    'team.html',
    'team-details.html',
    'pricing.html',
    'blog.html',
    'blog-details.html',
    'contact.html',
    '404.html'
];

$baseUrl = 'https://charitics.temptics.com/';
foreach ($pages as $p) {
    $url = $baseUrl . $p;
    $local = __DIR__ . '/charitics_' . $p;
    if (!file_exists($local)) {
        echo "Downloading $url...\n";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code == 200 && $data) {
            file_put_contents($local, $data);
            echo " -> Saved $local\n";
        } else {
            echo " -> Failed ($code)\n";
        }
    }
}
echo "Done downloading inner pages!\n";
