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
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Matri Seva Samiti - Non Profit NGO'; ?></title>
    <meta name="description" content="Matri Seva Samiti is a registered non-profit NGO dedicated to empowering rural communities through education, skill development, healthcare, and women empowerment.">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="logo/Logo.png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Quicksand:wght@300..700&family=Caveat:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Libraries CSS -->
    <link rel="stylesheet" href="assets/icon/flaticon_charitics.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/splide/splide.min.css">
    <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/vendor/slim-select/slimselect.css">
    <link rel="stylesheet" href="assets/vendor/animate-wow/animate.min.css">
    <link rel="stylesheet" href="assets/vendor/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom Charitics CSS -->
    <link rel="stylesheet" href="assets/css/charitics-style.css">

    <style>
        /* MSS Brand Color Overrides & Polish */
        .ul-header-bottom-wrapper .logo-container img {
            max-height: 55px;
            width: auto;
            object-fit: contain;
        }
        .ul-sidebar-header-logo img {
            max-height: 50px;
            width: auto;
        }
        .goog-te-banner-frame.skiptranslate, .goog-te-gadget-simple {
            display: none !important;
        }
        body {
            top: 0px !important;
        }
        .lang-select-pill {
            background: #fff;
            border: 1px solid var(--ul-gray2);
            border-radius: 30px;
            padding: 6px 12px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            outline: none;
            color: var(--ul-black);
            margin-right: 8px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .lang-select-pill:hover {
            border-color: var(--ul-primary);
        }
        .ul-header-nav a.active {
            color: var(--ul-primary);
            font-weight: 700;
        }
        .tax-exemption-tag {
            display: inline-block;
            background: rgba(235, 83, 16, 0.12);
            color: var(--ul-primary);
            font-size: 11px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 4px;
            margin-left: 6px;
            text-transform: uppercase;
        }
    </style>

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
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>

<body>
    <!-- PRELOADER START -->
    <div class="preloader" id="preloader">
        <div class="loader"></div>
    </div>
    <!-- PRELOADER END -->

    <!-- SIDEBAR / OFFCANVAS FOR MOBILE -->
    <div class="ul-sidebar">
        <!-- header -->
        <div class="ul-sidebar-header">
            <div class="ul-sidebar-header-logo">
                <a href="index.php">
                    <img src="logo/Logo.png" alt="Matri Seva Samiti Logo" class="logo">
                </a>
            </div>
            <!-- sidebar closer -->
            <button class="ul-sidebar-closer"><i class="flaticon-close"></i></button>
        </div>

        <div class="ul-sidebar-header-nav-wrapper d-block d-lg-none"></div>

        <!-- sidebar footer -->
        <div class="ul-sidebar-footer">
            <span class="ul-sidebar-footer-title">Follow MSS India</span>
            <div class="ul-sidebar-footer-social">
                <a href="https://facebook.com" target="_blank"><i class="flaticon-facebook"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="flaticon-twitter"></i></a>
                <a href="https://instagram.com" target="_blank"><i class="flaticon-instagram"></i></a>
                <a href="https://youtube.com" target="_blank"><i class="flaticon-youtube"></i></a>
            </div>
        </div>
    </div>
    <!-- SIDEBAR END -->

    <!-- SEARCH MODAL -->
    <div class="ul-search-form-wrapper flex-grow-1 flex-shrink-0">
        <button class="ul-search-closer"><i class="flaticon-close"></i></button>
        <form action="blogs.php" method="GET" class="ul-search-form">
            <div class="ul-search-form-right">
                <input type="search" name="search" id="ul-search" placeholder="Search programs, events, causes...">
                <button type="submit"><span class="icon"><i class="flaticon-search"></i></span></button>
            </div>
        </form>
    </div>
    <!-- SEARCH MODAL END -->

    <!-- HEADER SECTION START -->
    <header class="ul-header">
        <div class="ul-header-bottom to-be-sticky">
            <div class="ul-header-bottom-wrapper ul-header-container">
                <div class="logo-container">
                    <a href="index.php" class="d-inline-flex align-items-center gap-2">
                        <img src="logo/Logo.png" alt="Matri Seva Samiti Logo" class="logo">
                    </a>
                </div>

                <!-- header nav -->
                <div class="ul-header-nav-wrapper">
                    <div class="to-go-to-sidebar-in-mobile">
                        <nav class="ul-header-nav">
                            <a href="index.php" class="<?php echo ($currentSlug == 'index' || $currentSlug == '') ? 'active' : ''; ?>">Home</a>
                            <a href="about.php" class="<?php echo ($currentSlug == 'about') ? 'active' : ''; ?>">About Us</a>
                            
                            <div class="has-sub-menu">
                                <a role="button" class="<?php echo in_array($currentSlug, ['programs', 'projects', 'impact', 'grants']) ? 'active' : ''; ?>">Our Work</a>
                                <div class="ul-header-submenu">
                                    <ul>
                                        <li><a href="programs.php">All Programs</a></li>
                                        <li><a href="projects.php">Key Projects</a></li>
                                        <li><a href="impact.php">Impact & Reports</a></li>
                                        <li><a href="grants.php">CSR & Grants</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="has-sub-menu">
                                <a role="button" class="<?php echo in_array($currentSlug, ['donate', 'certificate']) ? 'active' : ''; ?>">Donate</a>
                                <div class="ul-header-submenu">
                                    <ul>
                                        <li><a href="donate.php">Donate Now <span class="tax-exemption-tag">80G</span></a></li>
                                        <li><a href="certificate.php">Tax Certificates (80G/12A)</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="has-sub-menu">
                                <a role="button" class="<?php echo in_array($currentSlug, ['volunteer', 'career']) ? 'active' : ''; ?>">Get Involved</a>
                                <div class="ul-header-submenu">
                                    <ul>
                                        <li><a href="volunteer.php">Become a Volunteer</a></li>
                                        <li><a href="career.php">Career Opportunities</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="has-sub-menu">
                                <a role="button" class="<?php echo in_array($currentSlug, ['gallery', 'blogs', 'ngo-news', 'faq', 'media']) ? 'active' : ''; ?>">Media</a>
                                <div class="ul-header-submenu">
                                    <ul>
                                        <li><a href="gallery.php">Photo Gallery</a></li>
                                        <li><a href="blogs.php">Impact Blogs</a></li>
                                        <li><a href="ngo-news.php">NGO News</a></li>
                                        <li><a href="media.php">Press & Media</a></li>
                                        <li><a href="faq.php">FAQs</a></li>
                                    </ul>
                                </div>
                            </div>

                            <a href="contact.php" class="<?php echo ($currentSlug == 'contact') ? 'active' : ''; ?>">Contact</a>
                        </nav>
                    </div>
                </div>

                <!-- actions -->
                <div class="ul-header-actions">
                    <!-- Language selector -->
                    <select class="lang-select-pill d-none d-md-inline-flex" onchange="changeLanguage(this.value)">
                        <option value="en">English</option>
                        <option value="hi">हिन्दी</option>
                        <option value="bn">বাংলা</option>
                        <option value="ta">தமிழ்</option>
                        <option value="te">తెలుగు</option>
                        <option value="mr">मराठी</option>
                        <option value="gu">ગુજરાતી</option>
                    </select>
                    <div id="google_translate_element" style="display:none;"></div>

                    <button class="ul-header-search-opener" title="Search"><i class="flaticon-search"></i></button>
                    <a href="donate.php" class="ul-btn d-sm-inline-flex d-none"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Donate Now </a>
                    <button class="ul-header-sidebar-opener d-lg-none d-inline-flex"><i class="flaticon-menu"></i></button>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER SECTION END -->