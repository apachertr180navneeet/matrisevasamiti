<?php
$baseUrl = 'https://charitics.temptics.com/';

function downloadFile($relPath, $baseUrl) {
    $cleanPath = ltrim($relPath, '/');
    // strip query params
    $filePathOnly = preg_replace('/\?.*$/', '', $cleanPath);
    $url = $baseUrl . $cleanPath;
    $localPath = __DIR__ . '/../' . $filePathOnly;

    $dir = dirname($localPath);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    if (!file_exists($localPath) || filesize($localPath) == 0) {
        echo "Downloading: $url -> $filePathOnly\n";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200 && $data !== false && strlen($data) > 0) {
            file_put_contents($localPath, $data);
            return $data;
        } else {
            echo "FAILED ($httpCode): $url\n";
            return false;
        }
    } else {
        return file_get_contents($localPath);
    }
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

    // Images in index.html
    'assets/img/logo.svg',
    'assets/img/user-1.png',
    'assets/img/user-3.png',
    'assets/img/user-2.png',
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

// Execute downloads
foreach ($filesToDownload as $f) {
    downloadFile($f, $baseUrl);
}

// 2. Scan all CSS files for fonts and images referenced in url(...)
$cssFiles = [
    'assets/icon/flaticon_charitics.css',
    'assets/vendor/bootstrap/bootstrap.min.css',
    'assets/vendor/splide/splide.min.css',
    'assets/vendor/swiper/swiper-bundle.min.css',
    'assets/vendor/slim-select/slimselect.css',
    'assets/vendor/animate-wow/animate.min.css',
    'assets/vendor/flatpickr/flatpickr.min.css',
    'assets/css/style.css',
];

foreach ($cssFiles as $cssFile) {
    $fullCssPath = __DIR__ . '/../' . $cssFile;
    if (file_exists($fullCssPath)) {
        $content = file_get_contents($fullCssPath);
        $cssDir = dirname($cssFile);

        preg_match_all('/url\((?![\'"]?(?:data:|http:\/\/|https:\/\/))[\'"]?([^\'")]+)[\'"]?\)/i', $content, $matches);
        if (!empty($matches[1])) {
            foreach ($matches[1] as $ref) {
                // normalize relative path
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
                
                // Also retain query params when requesting from server
                $targetUrlRel = str_replace($refClean, $ref, $targetRel);
                downloadFile($targetUrlRel, $baseUrl);
            }
        }
    }
}

echo "\nDownload process finished!\n";
