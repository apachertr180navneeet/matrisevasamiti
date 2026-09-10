<?php
require_once __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Matri Seva Samiti - NGO for Social Development'; ?></title>
    <meta name="description" content="Matri Seva Samiti is a non-profit organization dedicated to empowering rural communities through skill development, healthcare, and educational initiatives across India.">
    <meta name="keywords" content="NGO, Matri Seva Samiti, rural development, skill development, healthcare, education, social work, charity">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/new_design.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="logo/Logo.png">
    
    <!-- Google Translate Script - Simplified Version -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,hi,bn,ta,te,mr,gu,kn,ml,pa,or,as,ur,ne',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
            
            // After initialization, check if we need to trigger translation
            setTimeout(function() {
                var hash = window.location.hash;
                if (hash && hash.includes('googtrans')) {
                    // Try to trigger translation if it hasn't happened
                    var select = document.querySelector('.goog-te-combo');
                    if (select) {
                        var langMatch = hash.match(/googtrans\(\/en\/([^)]+)\)/);
                        if (langMatch && langMatch[1]) {
                            select.value = langMatch[1];
                            select.dispatchEvent(new Event('change'));
                        }
                    }
                }
            }, 1000);
        }
        
        // Simple language change handler
        function changeLanguage(lang) {
            console.log('Changing language to:', lang || 'English');
            
            if (lang === '' || lang === 'en') {
                // Clear all possible cookie variations
                document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
                document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=' + window.location.hostname;
                document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=.' + window.location.hostname;
                
                // Clear hash and reload
                window.location.href = window.location.href.split('#')[0];
            } else {
                // Set cookie with all variations to ensure it works
                console.log('Setting translation cookies for:', lang);
                document.cookie = 'googtrans=/en/' + lang + '; path=/';
                document.cookie = 'googtrans=/en/' + lang + '; path=/; domain=' + window.location.hostname;
                document.cookie = 'googtrans=/en/' + lang + '; path=/; domain=.' + window.location.hostname;
                
                // Log cookies for debugging
                console.log('Cookies set:', document.cookie);
                
                // Set hash and reload
                window.location.hash = 'googtrans(/en/' + lang + ')';
                setTimeout(function() {
                    window.location.reload(true);
                }, 100);
            }
        }
        
        // Initialize dropdown on page load
        window.addEventListener('DOMContentLoaded', function() {
            var dropdown = document.getElementById('language-selector');
            if (dropdown) {
                // Set dropdown value based on current translation
                var cookie = document.cookie.match(/googtrans=\/en\/([^;]+)/);
                if (cookie && cookie[1]) {
                    dropdown.value = cookie[1];
                }
                
                // Handle dropdown change
                dropdown.addEventListener('change', function() {
                    changeLanguage(this.value);
                });
            }
        });
        
        // Verify Google Translate loads
        window.addEventListener('load', function() {
            setTimeout(function() {
                if (typeof google === 'undefined' || typeof google.translate === 'undefined') {
                    console.error('Google Translate failed to load. Please check your internet connection.');
                } else {
                    console.log('Google Translate loaded successfully.');
                }
            }, 2000);
        });
        
        // Handle hamburger menu toggle
        window.addEventListener('load', function() {
            var navToggle = document.getElementById('nav-toggle');
            var navMenu = document.getElementById('nav-menu');
            
            if (navToggle && navMenu) {
                navToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    navMenu.classList.toggle('active');
                    navToggle.classList.toggle('active');
                    console.log('Menu toggled');
                });
                
                // Close menu when clicking a link
                var navLinks = document.querySelectorAll('.nav-link');
                navLinks.forEach(function(link) {
                    link.addEventListener('click', function() {
                        navMenu.classList.remove('active');
                        navToggle.classList.remove('active');
                    });
                });
                
                // Close menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!navToggle.contains(event.target) && !navMenu.contains(event.target)) {
                        navMenu.classList.remove('active');
                        navToggle.classList.remove('active');
                    }
                });
            }
        });
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    
    <style>
        /* Navigation Translate Styling */
        .nav-translate {
            display: inline-block !important;
            margin-left: 10px;
            visibility: visible !important;
            position: relative;
            z-index: 1000;
        }
        
        /* Hide Google Translate banner and attribution */
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }
        
        /* Hide the Google Translate notification bar completely */
        .goog-te-banner-frame {
            display: none !important;
        }
        
        body {
            top: 0px !important;
        }
        
        /* Hide Google's translate notification */
        body > .skiptranslate {
            display: none !important;
        }
        
        /* Hide the translate bar that appears at top */
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }
        
        /* Force hide any translate notifications */
        div[id^="goog-gt-"] {
            display: none !important;
        }
        
        .goog-te-banner-frame {
            display: none !important;
        }
        
        /* Style the custom language dropdown */
        .language-dropdown {
            padding: 8px 12px !important;
            border: 2px solid #f47a20 !important;
            border-radius: 6px !important;
            font-size: 14px !important;
            color: white !important;
            background: #f47a20 !important;
            cursor: pointer !important;
            font-family: 'Poppins', sans-serif !important;
            font-weight: 500 !important;
            min-width: 120px !important;
            transition: all 0.3s ease !important;
            position: relative !important;
            z-index: 1001 !important;
            outline: none !important;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" width="4" height="5"><path fill="white" d="M2 0L0 2h4z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 10px;
            /* Prevent Google from translating */
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        
        .language-dropdown:hover {
            background: #ff4500 !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 8px rgba(244, 122, 32, 0.3) !important;
        }
        
        .language-dropdown option {
            background: white !important;
            color: #333 !important;
            padding: 8px !important;
            font-family: 'Poppins', sans-serif !important;
        }
        
        /* Prevent translation of dropdown */
        .notranslate {
            translate: no !important;
        }
        
        /* Ensure dropdown works when page is translated */
        .skiptranslate {
            display: none !important;
        }
        
        /* Fix for translated pages */
        body.translated-ltr {
            top: 0 !important;
        }
        
        /* Mobile responsive - Keep in single line */
        @media (max-width: 768px) {
            .nav-translate {
                margin-left: 5px;
                display: inline-block !important;
                visibility: visible !important;
            }
            
            .language-dropdown {
                min-width: 80px !important;
                font-size: 12px !important;
                padding: 6px 8px !important;
                display: inline-block !important;
                visibility: visible !important;
            }
            
            .nav-link {
                font-size: 14px;
                padding: 0 6px;
            }
            
            .nav-menu {
                gap: 2px;
            }
            
            /* Mobile adjustments for corner logo */
            .nav-logo {
                top: 10px;
                left: 10px;
                padding: 8px 12px;
                z-index: 1000 !important;
            }
            
            .nav-logo .logo {
                width: 40px;
                height: 40px;
            }
            
            .nav-logo .logo-text h1,
            .nav-logo .logo-text span {
                font-size: 14px;
            }
            
            .nav-logo .logo-text .hindi-text {
                font-size: 10px;
            }
            
            .nav-container {
                padding-left: 20px; /* Less padding on mobile */
                position: relative;
            }
            
            /* Ensure translate widget shows in mobile menu */
            .nav-menu.active .nav-translate {
                display: block !important;
                visibility: visible !important;
                opacity: 1 !important;
            }
        }
        
        /* Position Google Translate widget off-screen instead of hiding */
        #google_translate_element {
            position: absolute;
            left: -9999px;
            top: -9999px;
        }
        
        .goog-te-gadget {
            color: transparent !important;
        }
        
        .goog-te-gadget-simple {
            background-color: transparent !important;
            border: none !important;
        }
        

        
        /* Make sure it aligns with nav items */
        .nav-menu {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 10px;
            max-width: 100%;
        }
        
        /* Ensure proper navigation container */
        .nav-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: nowrap;
            overflow: visible;
            width: 100%;
            position: relative;
            min-height: 50px;
        }
        
        /* Fix container on mobile to not overlap hamburger */
        @media (max-width: 1000px) {
            .nav-container {
                justify-content: flex-start;
                padding-right: 60px; /* Space for hamburger */
            }
        }
        
        /* Make sure header allows dropdowns */
        .header {
            overflow: visible !important;
            position: relative;
            z-index: 999;
            background: #0F2B5B;
            padding: 15px 0;
        }
        
        .navbar {
            overflow: visible !important;
            position: relative;
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
            display: flex;
            align-items: center;
            min-height: 60px;
        }
        
        /* Position logo in corner */
        .nav-logo {
            position: absolute !important;
            top: 15px;
            left: 20px;
            /* For top-right corner, use: right: 20px; left: auto; */
            /* For bottom-left corner, use: bottom: 20px; top: auto; */
            /* For bottom-right corner, use: bottom: 20px; right: 20px; top: auto; left: auto; */
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 10px;
            background: #0F2B5B;
            padding: 10px 15px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        a.nav-logo {
            text-decoration: none !important;
        }
        
        .nav-logo:hover {
            background: #0a1c3d;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }
        
        .nav-logo .logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
        
        .nav-logo .logo-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .nav-logo .logo-text h1 {
            font-size: 22px;
            color: #f47a20;
            margin: 0;
            line-height: 1;
            font-weight: 700;
        }
        
        .nav-logo .logo-text span {
            font-size: 22px;
            color: #f47a20;
            line-height: 1;
            font-weight: 700;
        }
        
        .nav-logo .logo-text .hindi-text {
            font-size: 12px;
            color: #ffd700;
            margin-top: 2px;
            font-family: 'Noto Sans Devanagari', sans-serif;
        }
        
        /* Adjust navigation container - prevent overlap with fixed logo */
        .nav-container {
            padding-left: 280px;
            padding-right: 20px;
            width: 100%;
            max-width: 100%;
            justify-content: flex-end;
        }
        
        /* Ensure logo stays on top of everything */
        .nav-logo {
            pointer-events: auto;
        }
        
        /* Optional: Add a subtle animation on page load */
        @keyframes slideInFromLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        .nav-logo {
            animation: slideInFromLeft 0.5s ease-out;
        }
        
        /* Style the hamburger menu toggle */
        .nav-toggle {
            display: none;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            flex-direction: column;
            cursor: pointer;
            z-index: 1001;
        }
        
        .nav-toggle .bar {
            width: 25px;
            height: 3px;
            background-color: #f47a20;
            margin: 3px 0;
            transition: 0.3s;
            pointer-events: none; /* Ensure clicks go to parent */
        }
        
        /* Hamburger animation when active */
        .nav-toggle.active .bar:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }
        
        .nav-toggle.active .bar:nth-child(2) {
            opacity: 0;
        }
        
        .nav-toggle.active .bar:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }
        
        /* Hide hamburger on desktop */
        @media (min-width: 1001px) {
            .nav-toggle {
                display: none !important;
            }
            
            .nav-menu {
                flex-wrap: wrap !important;
                justify-content: flex-end;
            }
        }
        
        .nav-link {
            white-space: nowrap;
            font-size: 16px;
            font-weight: 500;
            padding: 0 12px;
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: #f47a20;
        }
        
        /* Responsive adjustments */
        @media (max-width: 1300px) {
            .nav-menu {
                gap: 8px;
            }
            
            .nav-link {
                font-size: 15px;
                padding: 0 8px;
            }
        }
        
        @media (max-width: 1200px) {
            .nav-link {
                font-size: 14px;
                padding: 0 6px;
            }
            
            .nav-translate {
                margin-left: 5px;
            }
            
            .language-dropdown {
                min-width: 95px !important;
                font-size: 12px !important;
                padding: 6px 8px !important;
            }
        }
        
        @media (max-width: 1100px) {
            .nav-menu {
                padding: 0 10px;
                gap: 5px;
            }
            
            .nav-link {
                font-size: 13px;
                padding: 0 5px;
            }
        }
        
        @media (max-width: 1000px) {
            /* Show hamburger menu and hide desktop menu */
            .nav-toggle {
                display: flex !important;
                position: fixed !important;
                right: 20px;
                top: 35px;
                z-index: 1002 !important;
                background: rgba(0, 0, 0, 0.8);
                padding: 10px;
                border-radius: 5px;
            }
            
            .nav-menu {
                display: none;
                position: fixed !important;
                top: 80px;
                left: 0;
                right: 0;
                background: #0F2B5B;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                z-index: 1001 !important;
                max-height: calc(100vh - 80px);
                overflow-y: auto;
            }
            
            .nav-menu.active {
                display: flex !important;
            }
            
            .nav-link {
                font-size: 14px;
                padding: 10px 0;
                width: 100%;
                text-align: center;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            .nav-translate {
                margin: 10px 0 0 0;
                width: 100%;
                display: block !important;
                visibility: visible !important;
            }
            
            .language-dropdown {
                width: 100% !important;
                min-width: unset !important;
                font-size: 14px !important;
                padding: 10px !important;
                display: block !important;
                visibility: visible !important;
            }
            
            /* Ensure header has proper height on mobile */
            .header {
                min-height: 70px;
            }
            
            .navbar {
                min-height: 70px;
            }
        }
        
        /* Top Bar Styling */
        .top-bar {
            background-color: #f47a20; /* Website Theme Orange */
            color: #ffffff;
            padding: 8px 0;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
        }
        .top-bar-container {
            max-width: 100%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px; /* Aligned with logo left: 20px */
        }
        .top-bar-left, .top-bar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .top-bar-left a, .top-bar-right a {
            color: #ffffff !important;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: opacity 0.3s;
        }
        .top-bar-left a:hover, .top-bar-right a:hover {
            opacity: 0.8;
        }
        .top-bar-right a {
            width: 28px;
            height: 28px;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            font-size: 14px;
        }
        .top-bar-right a:hover {
            background-color: rgba(255, 255, 255, 0.4);
        }
        @media (max-width: 768px) {
            .top-bar-container {
                flex-direction: column;
                gap: 10px;
                padding: 0 15px;
            }
            .top-bar-left {
                flex-direction: column;
                gap: 5px;
                text-align: center;
            }
            .top-bar-left a {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-bar-container">
            <div class="top-bar-left">
                <a href="tel:+919415451910"><i class="fas fa-phone-alt"></i> +91-9415451910</a>
                <a href="mailto:matrisevasamiti1910@gmail.com"><i class="fas fa-envelope"></i> matrisevasamiti1910@gmail.com</a>
            </div>
            <div class="top-bar-right">
                <a href="<?php echo defined('FACEBOOK_URL') ? FACEBOOK_URL : '#'; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="<?php echo defined('TWITTER_URL') ? TWITTER_URL : '#'; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="<?php echo defined('INSTAGRAM_URL') ? INSTAGRAM_URL : '#'; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo defined('LINKEDIN_URL') ? LINKEDIN_URL : '#'; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a href="<?php echo defined('YOUTUBE_URL') ? YOUTUBE_URL : '#'; ?>" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="header">
        <nav class="navbar">
            <div class="nav-container">
                <a href="index.php" class="nav-logo">
                    <img src="logo/Logo.png" alt="Matri Seva Samiti" class="logo">
                    <div class="logo-text">
                        <h1>Matri Seva</h1>
                        <span>Samiti</span>
                        <small class="hindi-text">मिलकर करें प्रयास, खुशहाल हो समाज ।</small>
                    </div>
                </a>
                
                <div class="nav-menu" id="nav-menu">
                    <a href="index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Home</a>
                    <a href="about.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">About Us</a>
                    <a href="certificate.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'certificate.php' ? 'active' : ''; ?>">Documents</a>
                    <a href="programs.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'programs.php' ? 'active' : ''; ?>">Programs</a>
                    <a href="projects.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'projects.php' ? 'active' : ''; ?>">Projects</a>
                    <a href="impact.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'impact.php' ? 'active' : ''; ?>">Impact</a>
                    <a href="gallery.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'gallery.php' ? 'active' : ''; ?>">Gallery</a>
                    <a href="ngo-news.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'ngo-news.php' ? 'active' : ''; ?>">News</a>
                    <a href="grants.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'grants.php' ? 'active' : ''; ?>">Grants & Funding</a>
                    <a href="donate.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'donate.php' ? 'active' : ''; ?>">Donate</a>
                    <a href="contact.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">Contact</a>
                    <div class="nav-translate notranslate">
                        <select id="language-selector" class="language-dropdown notranslate" translate="no">
                            <option value="">🌐 Language</option>
                            <option value="en">English</option>
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
                </div>
                
                <div class="nav-toggle" id="nav-toggle">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
        </nav>
    </header>
    <script>
        // Fallback hamburger menu handler
        setTimeout(function() {
            var navToggle = document.getElementById('nav-toggle');
            var navMenu = document.getElementById('nav-menu');
            
            if (navToggle && !navToggle.hasAttribute('data-listener')) {
                navToggle.setAttribute('data-listener', 'true');
                navToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    navMenu.classList.toggle('active');
                    navToggle.classList.toggle('active');
                    console.log('Hamburger menu clicked - fallback handler');
                });
            }
        }, 500);
    </script>
</body>
</html> 