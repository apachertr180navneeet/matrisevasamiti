<?php
if (!defined('BASE_URL')) {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $scriptDir = dirname($_SERVER['SCRIPT_NAME']);
    define('BASE_URL', rtrim($protocol . '://' . $host . $scriptDir, '/\\') . '/');
}
if (file_exists(__DIR__ . '/../config.php')) {
    require_once __DIR__ . '/../config.php';
}

$currentPage = basename($_SERVER['PHP_SELF']);
$currentSlug = preg_replace('/\.php$/', '', $currentPage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Matri Seva Samiti - NGO for Social Development'; ?></title>
    <meta name="description" content="Matri Seva Samiti is a registered non-profit NGO dedicated to empowering rural communities through education, skill development, healthcare, and women empowerment.">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="logo/Logo.png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- Google Translate Script Setup -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,hi,bn,ta,te,mr,gu,kn,ml,pa,or,as,ur,ne',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }
        
        function changeLanguage(lang) {
            if (lang === '' || lang === 'en') {
                document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
                document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=' + window.location.hostname;
                window.location.href = window.location.href.split('#')[0];
            } else {
                document.cookie = 'googtrans=/en/' + lang + '; path=/';
                document.cookie = 'googtrans=/en/' + lang + '; path=/; domain=' + window.location.hostname;
                window.location.hash = 'googtrans(/en/' + lang + ')';
                setTimeout(function() {
                    window.location.reload();
                }, 150);
            }
        }

        window.addEventListener('DOMContentLoaded', function() {
            var dropdown = document.getElementById('language-selector');
            if (dropdown) {
                var cookie = document.cookie.match(/googtrans=\/en\/([^;]+)/);
                if (cookie && cookie[1]) {
                    dropdown.value = cookie[1];
                }
                dropdown.addEventListener('change', function() {
                    changeLanguage(this.value);
                });
            }
        });
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body>

    <!-- 1. Top Bar -->
    <div class="top-bar">
        <div class="top-bar-container">
            <div class="top-bar-left">
                <a href="tel:+919415451910"><i class="fas fa-phone-alt"></i> +91-9415451910</a>
                <a href="mailto:matrisevasamiti1910@gmail.com"><i class="fas fa-envelope"></i> matrisevasamiti1910@gmail.com</a>
                <span style="color: var(--gold-primary); font-weight: 600;"><i class="fas fa-certificate"></i> 80G & 12A Certified NGO</span>
            </div>
            <div class="top-bar-right">
                <a href="volunteer"><i class="fas fa-hands-helping"></i> Join Volunteer</a>
                <a href="grants"><i class="fas fa-hand-holding-usd"></i> CSR Funding</a>
                <div style="display: flex; gap: 6px; margin-left: 6px;">
                    <a href="<?php echo defined('FACEBOOK_URL') ? FACEBOOK_URL : '#'; ?>" target="_blank" class="top-social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo defined('TWITTER_URL') ? TWITTER_URL : '#'; ?>" target="_blank" class="top-social-link"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo defined('INSTAGRAM_URL') ? INSTAGRAM_URL : '#'; ?>" target="_blank" class="top-social-link"><i class="fab fa-instagram"></i></a>
                    <a href="<?php echo defined('YOUTUBE_URL') ? YOUTUBE_URL : '#'; ?>" target="_blank" class="top-social-link"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Main Header (Forest Green) -->
    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <!-- Logo -->
                <a href="index" class="nav-logo">
                    <img src="logo/Logo.png" alt="Matri Seva Samiti Logo" class="logo">
                    <div class="logo-title">Matri Seva <span>Samiti</span></div>
                </a>

                <!-- Nav Menu -->
                <ul class="nav-menu" id="nav-menu">
                    <li><a href="index" class="nav-link <?php echo ($currentSlug == 'index' || $currentSlug == '') ? 'active' : ''; ?>">Home</a></li>
                    <li><a href="about" class="nav-link <?php echo $currentSlug == 'about' ? 'active' : ''; ?>">About Us</a></li>
                    <li><a href="programs" class="nav-link <?php echo $currentSlug == 'programs' ? 'active' : ''; ?>">Services</a></li>
                    <li><a href="projects" class="nav-link <?php echo $currentSlug == 'projects' ? 'active' : ''; ?>">Projects</a></li>
                    <li><a href="certificate" class="nav-link <?php echo $currentSlug == 'certificate' ? 'active' : ''; ?>">Documents</a></li>
                    <li><a href="impact" class="nav-link <?php echo $currentSlug == 'impact' ? 'active' : ''; ?>">Impact</a></li>
                    <li><a href="gallery" class="nav-link <?php echo $currentSlug == 'gallery' ? 'active' : ''; ?>">Gallery</a></li>
                    <li><a href="ngo-news" class="nav-link <?php echo $currentSlug == 'ngo-news' ? 'active' : ''; ?>">News</a></li>
                    <li><a href="contact" class="nav-link <?php echo $currentSlug == 'contact' ? 'active' : ''; ?>">Contact</a></li>
                </ul>

                <!-- Action Button -->
                <div class="nav-actions">
                    <div class="nav-translate notranslate">
                        <select id="language-selector" class="language-dropdown notranslate" translate="no">
                            <option value="">🌐 English</option>
                            <option value="hi">हिन्दी (Hindi)</option>
                            <option value="bn">বাংলা (Bengali)</option>
                            <option value="ta">தமிழ் (Tamil)</option>
                            <option value="te">తెలుగు (Telugu)</option>
                            <option value="mr">मराठी (Marathi)</option>
                            <option value="gu">ગુજરાતી (Gujarati)</option>
                            <option value="kn">ಕನ್ನಡ (Kannada)</option>
                            <option value="ml">മലയാളം (Malayalam)</option>
                            <option value="pa">ਪੰਜਾਬੀ (Punjabi)</option>
                            <option value="ur">اردو (Urdu)</option>
                        </select>
                        <div id="google_translate_element"></div>
                    </div>

                    <a href="donate" class="btn btn-gold btn-sm btn-pill btn-pulse">
                        <i class="fas fa-heart"></i> Donate Now
                    </a>

                    <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>