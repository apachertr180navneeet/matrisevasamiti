<?php
$baseUrl = 'https://charitics.temptics.com/';

function downloadBatch($urls, $baseUrl) {
    $mh = curl_multi_init();
    $curlHandles = [];

    foreach ($urls as $relPath) {
        $cleanPath = ltrim($relPath, '/');
        $filePathOnly = preg_replace('/\?.*$/', '', $cleanPath);
        $localPath = __DIR__ . '/../' . $filePathOnly;

        if (file_exists($localPath) && filesize($localPath) > 0) {
            continue;
        }

        $dir = dirname($localPath);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $url = $baseUrl . $cleanPath;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        curl_multi_add_handle($mh, $ch);
        $curlHandles[(int)$ch] = [
            'handle' => $ch,
            'url' => $url,
            'localPath' => $localPath,
            'relPath' => $filePathOnly
        ];
    }

    if (empty($curlHandles)) {
        return;
    }

    $running = null;
    do {
        $status = curl_multi_exec($mh, $running);
        if ($running) {
            curl_multi_select($mh, 0.1);
        }
    } while ($running > 0 && $status == CURLM_OK);

    foreach ($curlHandles as $id => $item) {
        $ch = $item['handle'];
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $content = curl_multi_getcontent($ch);
        if ($httpCode == 200 && $content !== false && strlen($content) > 0) {
            file_put_contents($item['localPath'], $content);
            echo "OK ($httpCode): " . $item['relPath'] . " (" . strlen($content) . " bytes)\n";
        } else {
            echo "FAILED ($httpCode): " . $item['url'] . "\n";
        }
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
}

// 1. Files from HTML
$filesToDownload = [
    // CSS
    'assets/icon/flaticon_charitics.css',
    'assets/vendor/bootstrap/bootstrap.min.css',
    'assets/vendor/splide/splide.min.css',
    'assets/vendor/swiper/swiper-bundle.min.css',
    'assets/vendor/slim-select/slimselect.css',
    'assets/vendor/animate-wow/animate.min.css',
    'assets/vendor/flatpickr/flatpickr.min.css',
    'assets/css/style.css',

    // JS
    'assets/vendor/bootstrap/bootstrap.bundle.min.js',
    'assets/vendor/splide/splide.min.js',
    'assets/vendor/splide/splide-extension-auto-scroll.min.js',
    'assets/vendor/swiper/swiper-bundle.min.js',
    'assets/vendor/slim-select/slimselect.min.js',
    'assets/vendor/animate-wow/wow.min.js',
    'assets/vendor/splittype/index.min.js',
    'assets/vendor/mixitup/mixitup.min.js',
    'assets/vendor/fslightbox/fslightbox.js',
    'assets/vendor/flatpickr/flatpickr.js',
    'assets/js/main.js',
    'assets/js/tab.js',
    'assets/js/accordion.js',
    'assets/js/progressbar.js',
    'assets/js/donate-form.js',

    // Images
    'assets/img/logo.svg',
    'assets/img/user-1.png',
    'assets/img/user-2.png',
    'assets/img/user-3.png',
    'assets/img/vector-img.png',
    'assets/img/banner-img.png',
    'assets/img/banner-img-vector-1.png',
    'assets/img/banner-img-vector-2.png',
    'assets/img/about-img.png',
    'assets/img/about-img-vector-1.svg',
    'assets/img/about-img-vector-2.svg',
    'assets/img/about-block-img.jpg',
    'assets/img/about-vector-1.png',
    'assets/img/donation-1.jpg',
    'assets/img/donation-2.jpg',
    'assets/img/donation-3.jpg',
    'assets/img/donation-4.jpg',
    'assets/img/donate-form-vector.svg',
    'assets/img/event-img.jpg',
    'assets/img/blog-b-1.jpg',
    'assets/img/blog-2.jpg',
    'assets/img/blog-b-3.jpg',
    'assets/img/events-vector-1.png',
    'assets/img/events-vector-2.svg',
    'assets/img/why-join.jpg',
    'assets/img/member-1.jpg',
    'assets/img/member-2.jpg',
    'assets/img/member-3.jpg',
    'assets/img/member-4.jpg',
    'assets/img/blog-1.jpg',
    'assets/img/blog-3.jpg',
    'assets/img/gallery-item-1.png',
    'assets/img/gallery-item-2.png',
    'assets/img/gallery-item-3.png',
    'assets/img/gallery-item-4.png',
    'assets/img/gallery-item-5.png',
    'assets/img/gallery-item-6.png',
    'assets/img/logo-white.svg',
    'assets/img/footer-vector-img.png',
];

// Chunk downloads in batches of 10
$chunks = array_chunk($filesToDownload, 10);
foreach ($chunks as $chunk) {
    downloadBatch($chunk, $baseUrl);
}

// 2. Scan all CSS files for fonts and images referenced in url(...)
$cssFiles = [
    'assets/icon/flaticon_charitics.css',
    'assets/css/style.css',
];

$fontFiles = [];
foreach ($cssFiles as $cssFile) {
    $fullCssPath = __DIR__ . '/../' . $cssFile;
    if (file_exists($fullCssPath)) {
        $content = file_get_contents($fullCssPath);
        $cssDir = dirname($cssFile);

        preg_match_all('/url\((?![\'"]?(?:data:|http:\/\/|https:\/\/))[\'"]?([^\'")]+)[\'"]?\)/i', $content, $matches);
        if (!empty($matches[1])) {
            foreach ($matches[1] as $ref) {
                $refClean = preg_replace('/\?.*$/', '', $ref);
                $refClean = preg_replace('/#.*$/', '', $refClean);
                if (strpos($ref, '../') === 0) {
                    $parentDir = dirname($cssDir);
                    $targetRel = ltrim($parentDir . '/' . substr($refClean, 3), '/');
                } else if (strpos($ref, './') === 0) {
                    $targetRel = ltrim($cssDir . '/' . substr($refClean, 2), '/');
                } else if (strpos($ref, '/') === 0) {
                    $targetRel = ltrim($refClean, '/');
                } else {
                    $targetRel = ltrim($cssDir . '/' . $refClean, '/');
                }
                $fontFiles[] = $targetRel;
            }
        }
    }
}

$fontChunks = array_chunk(array_unique($fontFiles), 10);
foreach ($fontChunks as $chunk) {
    downloadBatch($chunk, $baseUrl);
}

echo "All batches completed!\n";
