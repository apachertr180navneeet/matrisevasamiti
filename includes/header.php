<?php
if (!defined('BASE_URL')) {
    // Automatically determine base path
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $scriptDir = dirname($_SERVER['SCRIPT_NAME']);
    define('BASE_URL', rtrim($protocol . '://' . $host . $scriptDir, '/\\') . '/');
}
if (file_exists(__DIR__ . '/../config.php')) {
    require_once __DIR__ . '/../config.php';
}

$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Matri Seva Samiti - NGO for Social Development & Rural Empowerment'; ?></title>
    <meta name="description" content="Matri Seva Samiti is a registered non-profit NGO dedicated to empowering rural communities through education, skill development, healthcare, women empowerment, and sustainable social growth across India.">
    <meta name="keywords" content="Matri Seva Samiti, NGO India, Rural Development, Skill Training, 80G Tax Exemption, CSR-1, Healthcare Camp, Women Empowerment, Prayagraj NGO">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="logo/Logo.png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Core Modern Stylesheets -->
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

    <!-- 1. Top Information Bar -->
    <div class="top-bar">
        <div class="container top-bar-container">
            <div class="top-bar-left">
                <a href="tel:+919415451910"><i class="fas fa-phone-alt"></i> +91-9415451910</a>
                <a href="mailto:matrisevasamiti1910@gmail.com"><i class="fas fa-envelope"></i> matrisevasamiti1910@gmail.com</a>
                <span><i class="fas fa-certificate text-warning" style="color: var(--amber-gold);"></i> 80G & 12A Certified NGO</span>
            </div>
            <div class="top-bar-right">
                <a href="volunteer.php" class="top-nav-tag"><i class="fas fa-hands-helping"></i> Volunteer</a>
                <a href="grants.php" class="top-nav-tag"><i class="fas fa-hand-holding-usd"></i> CSR Grants</a>
                <div class="top-social-wrap" style="display: flex; gap: 6px; margin-left: 8px;">
                    <a href="<?php echo defined('FACEBOOK_URL') ? FACEBOOK_URL : 'https://facebook.com'; ?>" target="_blank" class="top-social-link" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo defined('TWITTER_URL') ? TWITTER_URL : 'https://twitter.com'; ?>" target="_blank" class="top-social-link" title="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo defined('INSTAGRAM_URL') ? INSTAGRAM_URL : 'https://instagram.com'; ?>" target="_blank" class="top-social-link" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="<?php echo defined('LINKEDIN_URL') ? LINKEDIN_URL : 'https://linkedin.com'; ?>" target="_blank" class="top-social-link" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="<?php echo defined('YOUTUBE_URL') ? YOUTUBE_URL : 'https://youtube.com'; ?>" target="_blank" class="top-social-link" title="YouTube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Sticky Glassmorphism Header -->
    <header class="header">
        <nav class="navbar">
            <div class="container nav-container">
                <!-- Brand Logo Lockup -->
                <a href="index.php" class="nav-logo">
                    <img src="logo/Logo.png" alt="Matri Seva Samiti Logo" class="logo">
                    <div class="logo-text">
                        <div class="logo-title">Matri Seva <span>Samiti</span></div>
                        <div class="logo-tagline hindi-text">मिलकर करें प्रयास, खुशहाल हो समाज</div>
                    </div>
                </a>

                <!-- Desktop / Mobile Nav Menu -->
                <ul class="nav-menu" id="nav-menu">
                    <li class="nav-item"><a href="index.php" class="nav-link <?php echo $currentPage == 'index.php' ? 'active' : ''; ?>">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link <?php echo $currentPage == 'about.php' ? 'active' : ''; ?>">About Us</a></li>
                    <li class="nav-item"><a href="programs.php" class="nav-link <?php echo $currentPage == 'programs.php' ? 'active' : ''; ?>">Programs</a></li>
                    <li class="nav-item"><a href="projects.php" class="nav-link <?php echo $currentPage == 'projects.php' ? 'active' : ''; ?>">Projects</a></li>
                    <li class="nav-item"><a href="impact.php" class="nav-link <?php echo $currentPage == 'impact.php' ? 'active' : ''; ?>">Impact</a></li>
                    <li class="nav-item"><a href="certificate.php" class="nav-link <?php echo $currentPage == 'certificate.php' ? 'active' : ''; ?>">Documents</a></li>
                    <li class="nav-item"><a href="gallery.php" class="nav-link <?php echo $currentPage == 'gallery.php' ? 'active' : ''; ?>">Gallery</a></li>
                    <li class="nav-item"><a href="ngo-news.php" class="nav-link <?php echo $currentPage == 'ngo-news.php' ? 'active' : ''; ?>">News</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link <?php echo $currentPage == 'contact.php' ? 'active' : ''; ?>">Contact</a></li>
                </ul>

                <!-- Action Group (Language & Donate Button) -->
                <div class="nav-actions">
                    <div class="nav-translate notranslate">
                        <select id="language-selector" class="language-dropdown notranslate" translate="no" title="Choose Language">
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
                            <option value="or">ଓଡ଼ିଆ (Odia)</option>
                            <option value="as">অসমীয়া (Assamese)</option>
                            <option value="ur">اردو (Urdu)</option>
                            <option value="ne">नेपाली (Nepali)</option>
                        </select>
                        <div id="google_translate_element"></div>
                    </div>

                    <a href="donate.php" class="btn btn-primary btn-sm btn-pulse" style="font-weight: 700;">
                        <i class="fas fa-heart"></i> Donate Now
                    </a>

                    <!-- Hamburger Button -->
                    <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation menu">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>