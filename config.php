<?php
// Matri Seva Samiti NGO Website Configuration

// Site Configuration
define('SITE_NAME', 'Matri Seva Samiti');
define('SITE_URL', 'https://matrisevasamiti.ngo');
define('SITE_EMAIL', 'matrisevasamiti1910@gmail.com');
define('ADMIN_EMAIL', 'matrisevasamiti1910@gmail.com');

// Contact Information
define('PHONE_PRIMARY', '+91 9415451910');
define('PHONE_SECONDARY', '+91 9838291910');
define('ADDRESS_PRIMARY', '01 NAIKA CHHATNAG ROAD NEAR RAM SHIV COLONY JHUNSI PRAYAGRAJ UTTAR PRADESH 211019');
define('ADDRESS_SECONDARY', 'USTAPUR PATHSHALA ROAD BHAJNANAND ASHRAM NEAR, PANI TANKI JHUNSI PRAYAGRAJ UTTAR PRADESH 211019');

// Organization Details
define('ORG_OWNER', 'GYAN SHANKAR PAL');
define('ORG_ESTABLISHED', '1995');
define('ORG_MISSION', 'Empowering rural communities through sustainable development programs and creating lasting positive impact.');

// Database Configuration (for future use)
// Uncomment and configure when database is needed
/*
define('DB_HOST', 'localhost');
define('DB_NAME', 'matrisevasamiti_db');
define('DB_USER', 'your_db_user');
define('DB_PASS', 'your_db_password');
define('DB_CHARSET', 'utf8mb4');

// Database Connection Function
function getDBConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());
        return false;
    }
}
*/

// Email Configuration
define('SMTP_HOST', 'smtp.gmail.com'); // Change if using different email provider
define('SMTP_PORT', 587);
define('SMTP_SECURE', 'tls');
define('FROM_EMAIL', 'noreply@matrisevasamiti.ngo');
define('FROM_NAME', 'Matri Seva Samiti');

// CCAvenue Configuration
define('CCAVENUE_MERCHANT_ID', '4438174');
define('CCAVENUE_ACCESS_CODE', 'AVQM90ND88AU58MQUA');
define('CCAVENUE_WORKING_KEY', '23E5332DE7E9D33452155CD40C048001');
// Use 'TEST' or 'PRODUCTION'
define('CCAVENUE_ENVIRONMENT', 'PRODUCTION');


// Social Media Links
define('FACEBOOK_URL', 'https://www.facebook.com/share/18Z1iLkmnA/');
define('INSTAGRAM_URL', '#');
define('YOUTUBE_URL', 'https://youtube.com/@matrisevasamiti?si=f11QpU1HAHZemBZX');
define('LINKEDIN_URL', 'https://www.linkedin.com/in/matri-seva-samiti-b228b3381');
define('TWITTER_URL', 'https://x.com/Official_Matri');

// File Upload Settings
define('MAX_UPLOAD_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'pdf']);
define('UPLOAD_PATH', 'uploads/');

// Security Settings
define('CSRF_TOKEN_NAME', 'csrf_token');
define('SESSION_TIMEOUT', 3600); // 1 hour

// Utility Functions
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function generateCSRFToken() {
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}

function validateCSRFToken($token) {
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION[CSRF_TOKEN_NAME]) && hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
}

function logActivity($action, $details = '') {
    $log_entry = date('Y-m-d H:i:s') . " - " . $action;
    if ($details) {
        $log_entry .= " - " . $details;
    }
    $log_entry .= " - IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
    
    // Log to file (ensure logs directory exists and is writable)
    error_log($log_entry, 3, 'logs/activity.log');
}

// Email Helper Function
function sendEmail($to, $subject, $body, $isHTML = true) {
    $headers = "MIME-Version: 1.0\r\n";
    if ($isHTML) {
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    } else {
        $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
    }
    $headers .= "From: " . FROM_NAME . " <" . FROM_EMAIL . ">\r\n";
    $headers .= "Reply-To: " . SITE_EMAIL . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    return mail($to, $subject, $body, $headers);
}

// Environment Detection
function isDevelopment() {
    return ($_SERVER['HTTP_HOST'] === 'localhost' || 
            strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false ||
            strpos($_SERVER['HTTP_HOST'], '.local') !== false);
}

// Error Handling
if (!isDevelopment()) {
    // Hide errors in production
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', 'logs/php_errors.log');
} else {
    // Show errors in development
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

// Session Configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', !isDevelopment());
ini_set('session.use_strict_mode', 1);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?> 