<?php

/**
 * Matri Seva Samiti - Laravel 11 Root Proxy
 * Automatically routes requests to public/ directory for Apache / XAMPP subfolder serving.
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

// If running via built-in PHP server in root, serve public assets directly
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';