<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title ?? 'Matri Seva Samiti - Non Profit NGO' }}</title>
    <meta name="description" content="Matri Seva Samiti is a registered non-profit NGO dedicated to empowering rural communities through education, skill development, healthcare, and women empowerment.">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo/Logo.png') }}">
    
    <!-- DNS Prefetch & Preconnect for High-Speed Asset Delivery -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Quicksand:wght@500;600;700&family=Noto+Sans+Devanagari:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Libraries CSS -->
    <link rel="stylesheet" href="{{ asset('assets/icon/flaticon_charitics.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/splide/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/slim-select/slimselect.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate-wow/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom Charitics CSS & Master Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/charitics-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

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
        /* MSS Navigation & Header Colors */
        .ul-header-nav a,
        .ul-header-nav a:not([href]):not([class]),
        .ul-header-nav .has-sub-menu > a {
            color: var(--ul-black, #1E252F) !important;
            font-weight: 600;
            cursor: pointer;
            transition: color 0.2s ease;
        }
        .ul-header-nav a:hover,
        .ul-header-nav a:not([href]):hover,
        .ul-header-nav .has-sub-menu:hover > a {
            color: var(--ul-primary, #EB5310) !important;
        }
        .ul-header-nav a.active,
        .ul-header-nav .has-sub-menu > a.active,
        .ul-header-nav .has-sub-menu.active > a {
            color: var(--ul-primary, #EB5310) !important;
            font-weight: 700;
        }
        .ul-header-search-opener {
            color: var(--ul-black, #1E252F) !important;
        }
        .ul-header-search-opener i {
            color: var(--ul-black, #1E252F) !important;
            font-size: 16px;
        }
        .ul-header-search-opener:hover i {
            color: #ffffff !important;
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

        /* Header Positioning & Natural Document Flow */
        .ul-header {
            width: 100%;
            position: relative;
            z-index: 998;
        }
        .ul-header-bottom {
            position: relative !important;
            top: 0;
            width: 100%;
            transition: all 0.3s ease;
            background: #ffffff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            z-index: 998;
        }
        .ul-header-bottom.to-be-sticky.sticky {
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            animation: slideDown 0.3s ease forwards;
        }

        /* Page / Tab Breadcrumb Headings - Universal Responsive Spacing & Visibility */
        .ul-breadcrumb {
            position: relative;
            background: #111a28 url('{{ asset("assets/img/breadcrumb-bg.jpg") }}') no-repeat center center / cover;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            box-sizing: border-box;
            padding: 70px 15px 75px !important;
            margin: 0;
            z-index: 1;
            overflow: hidden;
        }
        .ul-breadcrumb::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(11, 25, 46, 0.85) 0%, rgba(15, 23, 42, 0.92) 100%);
            z-index: -1;
            pointer-events: none;
        }
        .ul-breadcrumb .ul-container,
        .ul-breadcrumb > div {
            position: relative;
            z-index: 2;
            max-width: 1140px;
            width: 100%;
            margin: 0 auto;
            padding: 0 15px;
        }
        .ul-breadcrumb-title {
            font-family: var(--font-quicksand), 'Manrope', 'Segoe UI', sans-serif !important;
            font-weight: 800 !important;
            font-size: clamp(28px, 3.5vw, 46px) !important;
            color: #ffffff !important;
            line-height: 1.25 !important;
            margin: 0 auto 14px auto !important;
            max-width: 900px;
            word-wrap: break-word;
            overflow-wrap: break-word;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.35);
            display: block;
        }
        .ul-breadcrumb-nav {
            display: inline-flex !important;
            flex-wrap: wrap !important;
            justify-content: center !important;
            align-items: center !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.12) !important;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 999px !important;
            padding: 6px 18px !important;
            gap: 6px !important;
            margin: 0 auto !important;
            list-style: none;
        }
        .ul-breadcrumb-nav li {
            display: inline-flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.85);
        }
        .ul-breadcrumb-nav a {
            color: #ffffff !important;
            transition: color 0.2s ease;
            text-decoration: none;
        }
        .ul-breadcrumb-nav a:hover {
            color: var(--ul-primary, #EB5310) !important;
        }
        .ul-breadcrumb-nav .separator {
            display: inline-flex;
            align-items: center;
            color: var(--ul-primary, #EB5310);
            font-size: 12px;
        }

        /* Responsive Breakpoints for Page / Tab Headings */
        @media screen and (min-width: 1200px) {
            .ul-breadcrumb {
                padding: 80px 20px 85px !important;
            }
            .ul-breadcrumb-title {
                font-size: 44px !important;
            }
        }
        @media screen and (max-width: 1199px) and (min-width: 992px) {
            .ul-breadcrumb {
                padding: 70px 20px 75px !important;
            }
            .ul-breadcrumb-title {
                font-size: 36px !important;
            }
        }
        @media screen and (max-width: 991px) and (min-width: 768px) {
            .ul-breadcrumb {
                padding: 55px 16px 60px !important;
            }
            .ul-breadcrumb-title {
                font-size: 30px !important;
                line-height: 1.3 !important;
            }
        }
        @media screen and (max-width: 767px) {
            .ul-breadcrumb {
                padding: 42px 12px 46px !important;
            }
            .ul-breadcrumb-title {
                font-size: clamp(21px, 5.8vw, 26px) !important;
                line-height: 1.3 !important;
                margin-bottom: 10px !important;
            }
            .ul-breadcrumb-nav {
                font-size: 12px !important;
                padding: 5px 14px !important;
            }
        }
        @media screen and (max-width: 420px) {
            .ul-breadcrumb {
                padding: 36px 10px 40px !important;
            }
            .ul-breadcrumb-title {
                font-size: 19px !important;
                line-height: 1.35 !important;
            }
        }

        /* Hero Banner & Global Headings */
        .ul-banner {
            position: relative;
            padding: clamp(45px, 5.5vw, 85px) 0 !important;
        }
        .ul-banner-title {
            font-size: clamp(26px, 4.5vw, 54px) !important;
            line-height: 1.22 !important;
            font-weight: 800 !important;
            word-break: break-word;
        }
        .ul-section-title {
            font-size: clamp(22px, 3.2vw, 38px) !important;
            line-height: 1.28 !important;
            font-weight: 800 !important;
            word-break: break-word;
        }
        .ul-section-sub-title {
            font-size: clamp(11px, 1vw, 14px) !important;
            font-weight: 700 !important;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            margin-bottom: 8px;
            display: inline-block;
        }

        /* ===================================================
           MATRI SEVA SAMITI - PREMIUM WEBSITE PRELOADER
           =================================================== */
        .mss-preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: radial-gradient(circle at 50% 45%, #ffffff 0%, #fbf9f6 60%, #f3ece4 100%);
            z-index: 99999999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.5s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            pointer-events: auto;
            user-select: none;
        }

        .mss-preloader.loaded {
            opacity: 0 !important;
            visibility: hidden !important;
            pointer-events: none !important;
        }

        .mss-preloader.loaded .mss-preloader-content {
            transform: scale(0.92) translateY(-12px);
            opacity: 0;
            transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.35s ease;
        }

        .mss-preloader-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            z-index: 2;
            padding: 24px;
            max-width: 420px;
            width: 90%;
            transition: transform 0.4s ease, opacity 0.4s ease;
        }

        /* Ambient Glow Aura */
        .mss-preloader-aura {
            position: absolute;
            width: 290px;
            height: 290px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(235, 83, 16, 0.14) 0%, rgba(15, 43, 91, 0.05) 55%, transparent 72%);
            animation: mssAuraPulse 2.8s ease-in-out infinite alternate;
            pointer-events: none;
            z-index: -1;
        }

        /* Logo & Spinner Wrapper */
        .mss-logo-wrapper {
            position: relative;
            width: 146px;
            height: 146px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 22px;
        }

        /* Outer Smooth Gradient Ring */
        .mss-spinner-ring-outer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 3.5px solid transparent;
            border-top-color: #EB5310;
            border-right-color: #FF8F3D;
            border-bottom-color: rgba(235, 83, 16, 0.12);
            border-left-color: rgba(15, 43, 91, 0.25);
            animation: mssRotateClockwise 1.6s linear infinite;
        }

        /* Orbiting Radiant Bead */
        .mss-spinner-dot {
            position: absolute;
            top: -5px;
            left: calc(50% - 5px);
            width: 10px;
            height: 10px;
            background: #EB5310;
            border-radius: 50%;
            box-shadow: 0 0 10px #EB5310, 0 0 4px #FF8F3D;
        }

        /* Inner Counter-Rotating Dashed Orbit */
        .mss-spinner-ring-inner {
            position: absolute;
            top: 9px;
            left: 9px;
            right: 9px;
            bottom: 9px;
            border-radius: 50%;
            border: 2px dashed rgba(15, 43, 91, 0.3);
            animation: mssRotateCounter 3.2s linear infinite;
        }

        /* Central Logo Badge Card */
        .mss-logo-box {
            width: 110px;
            height: 110px;
            background: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 14px;
            box-shadow: 0 12px 32px rgba(235, 83, 16, 0.14), 0 4px 14px rgba(15, 43, 91, 0.08);
            border: 1.5px solid rgba(235, 83, 16, 0.18);
            animation: mssLogoFloat 2.2s ease-in-out infinite alternate;
            position: relative;
            z-index: 2;
        }

        .mss-preloader-logo {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            display: block;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.05));
        }

        /* Preloader Typography */
        .mss-preloader-title {
            font-family: 'Manrope', 'Segoe UI', Roboto, sans-serif;
            font-size: 1.28rem;
            font-weight: 800;
            color: #0F2B5B;
            margin: 0 0 4px 0;
            letter-spacing: 0.3px;
            line-height: 1.25;
        }

        .mss-preloader-tagline {
            font-family: 'Quicksand', 'Segoe UI', sans-serif;
            font-size: 0.76rem;
            font-weight: 700;
            color: #EB5310;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            display: inline-block;
            margin-bottom: 18px;
        }

        /* Sleek Modern Loading Progress Bar */
        .mss-loading-bar-track {
            width: 180px;
            height: 4px;
            background: rgba(235, 83, 16, 0.12);
            border-radius: 999px;
            overflow: hidden;
            position: relative;
            margin: 0 auto 10px;
        }

        .mss-loading-bar-fill {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 45%;
            background: linear-gradient(90deg, #0F2B5B 0%, #EB5310 50%, #FF8F3D 100%);
            border-radius: 999px;
            animation: mssProgressSlide 1.6s ease-in-out infinite;
        }

        .mss-loading-status {
            font-family: 'Manrope', sans-serif;
            font-size: 0.72rem;
            font-weight: 600;
            color: #8c98a4;
            letter-spacing: 0.6px;
        }

        /* Keyframe Animations */
        @keyframes mssRotateClockwise {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes mssRotateCounter {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(-360deg); }
        }

        @keyframes mssLogoFloat {
            0% { transform: translateY(0px) scale(0.98); }
            100% { transform: translateY(-4px) scale(1.02); }
        }

        @keyframes mssAuraPulse {
            0% { transform: scale(0.88); opacity: 0.55; }
            100% { transform: scale(1.15); opacity: 0.95; }
        }

        @keyframes mssProgressSlide {
            0% { left: -45%; width: 35%; }
            50% { width: 60%; }
            100% { left: 100%; width: 35%; }
        }

        @media (max-width: 576px) {
            .mss-logo-wrapper {
                width: 124px;
                height: 124px;
                margin-bottom: 18px;
            }
            .mss-logo-box {
                width: 94px;
                height: 94px;
                padding: 12px;
            }
            .mss-preloader-title {
                font-size: 1.12rem;
            }
            .mss-preloader-tagline {
                font-size: 0.68rem;
                letter-spacing: 0.8px;
            }
            .mss-loading-bar-track {
                width: 150px;
            }
        }
    </style>

    <!-- Google Translate Script Setup (Non-Blocking / Asynchronous) -->
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

        // Defer Google Translate script to avoid blocking first paint
        window.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const gtScript = document.createElement('script');
                gtScript.type = 'text/javascript';
                gtScript.async = true;
                gtScript.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
                document.body.appendChild(gtScript);
            }, 100);
        });
    </script>

    @stack('styles')
</head>

<body>
    <!-- PRELOADER / LOADING SCREEN START -->
    <div class="mss-preloader" id="preloader" role="status" aria-label="Loading Matri Seva Samiti website...">
        <div class="mss-preloader-aura"></div>
        <div class="mss-preloader-content">
            <div class="mss-logo-wrapper">
                <div class="mss-spinner-ring-outer">
                    <span class="mss-spinner-dot"></span>
                </div>
                <div class="mss-spinner-ring-inner"></div>
                <div class="mss-logo-box">
                    <img src="{{ asset(config('site.site_logo', config('site.logo', 'logo/Logo.png'))) }}" 
                         alt="{{ config('site.site_name', 'Matri Seva Samiti') }} Logo" 
                         class="mss-preloader-logo">
                </div>
            </div>
            
            <h4 class="mss-preloader-title">{{ config('site.site_name', 'Matri Seva Samiti') }}</h4>
            <span class="mss-preloader-tagline">Empowering Communities • Transforming Lives</span>

            <div class="mss-loading-bar-track">
                <div class="mss-loading-bar-fill"></div>
            </div>
            <span class="mss-loading-status">Loading experience...</span>
        </div>
    </div>
    <!-- PRELOADER / LOADING SCREEN END -->

    @include('partials.sidebar')
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <!-- Floating Action Buttons (Mobile / Tablet quick actions) -->
    <div class="mss-floating-actions">
        <a href="{{ route('donate.index') }}" class="mss-fab-btn donate d-lg-none" title="Quick Donate">
            <i class="flaticon-fast-forward-double-right-arrows-symbol"></i>
        </a>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('site.phone_primary', '919415451910')) }}?text=Hello%20Matri%20Seva%20Samiti%2C%20I%20would%20like%20to%20know%20more%20about%20your%20initiatives." target="_blank" rel="noopener noreferrer" class="mss-fab-btn whatsapp" title="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <button type="button" class="mss-fab-btn scroll-top" id="mssScrollTopBtn" title="Back to Top">
            <i class="fas fa-chevron-up"></i>
        </button>
    </div>

    <!-- Libraries JS -->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/splide/splide.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/splide/splide-extension-auto-scroll.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/slim-select/slimselect.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/animate-wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/splittype/index.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/mixitup/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/fslightbox/fslightbox.js') }}"></script>
    <script src="{{ asset('assets/vendor/flatpickr/flatpickr.js') }}"></script>

    <!-- Custom Charitics Template Scripts -->
    <script src="{{ asset('assets/js/charitics-main.js') }}"></script>
    <script src="{{ asset('assets/js/charitics-tab.js') }}"></script>
    <script src="{{ asset('assets/js/charitics-accordion.js') }}"></script>
    <script src="{{ asset('assets/js/charitics-progressbar.js') }}"></script>
    <script src="{{ asset('assets/js/charitics-donate-form.js') }}"></script>

    <script>
        // Scroll To Top Button Logic
        const scrollTopBtn = document.getElementById('mssScrollTopBtn');
        if (scrollTopBtn) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    scrollTopBtn.classList.add('visible');
                } else {
                    scrollTopBtn.classList.remove('visible');
                }
            });
            scrollTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // High-Speed Page Preloader Transition (Instant UI Feedback)
        (function() {
            const preloader = document.getElementById('preloader');
            if (!preloader) return;

            let isDismissed = false;

            function dismissPreloader() {
                if (isDismissed) return;
                isDismissed = true;

                setTimeout(() => {
                    preloader.classList.add('loaded');
                    setTimeout(() => {
                        preloader.style.display = 'none';
                        document.body.classList.add('page-loaded');
                    }, 350);
                }, 150);
            }

            if (document.readyState === 'interactive' || document.readyState === 'complete') {
                dismissPreloader();
            } else {
                document.addEventListener('DOMContentLoaded', dismissPreloader, { once: true });
                window.addEventListener('load', dismissPreloader, { once: true });
            }

            // Safety fallback timeout
            setTimeout(dismissPreloader, 1200);
        })();
    </script>

    @stack('scripts')
</body>
</html>
