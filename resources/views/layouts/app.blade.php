<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title ?? 'Matri Seva Samiti - Non Profit NGO' }}</title>
    <meta name="description" content="Matri Seva Samiti is a registered non-profit NGO dedicated to empowering rural communities through education, skill development, healthcare, and women empowerment.">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo/Logo.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Quicksand:wght@300..700&family=Caveat:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Libraries CSS -->
    <link rel="stylesheet" href="{{ asset('assets/icon/flaticon_charitics.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/splide/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/slim-select/slimselect.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate-wow/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom Charitics CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/charitics-style.css') }}">

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

    @stack('styles')
</head>

<body>
    <!-- PRELOADER START -->
    <div class="preloader" id="preloader">
        <div class="loader"></div>
    </div>
    <!-- PRELOADER END -->

    @include('partials.sidebar')
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

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

    @stack('scripts')
</body>
</html>
