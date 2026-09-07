<!-- SIDEBAR / OFFCANVAS FOR MOBILE -->
<div class="ul-sidebar">
    <!-- header -->
    <div class="ul-sidebar-header">
        <div class="ul-sidebar-header-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('logo/Logo.png') }}" alt="Matri Seva Samiti Logo" class="logo">
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
            <a href="{{ config('site.social.facebook') }}" target="_blank"><i class="flaticon-facebook"></i></a>
            <a href="{{ config('site.social.twitter') }}" target="_blank"><i class="flaticon-twitter"></i></a>
            <a href="{{ config('site.social.linkedin') }}" target="_blank"><i class="flaticon-linkedin-big-logo"></i></a>
            <a href="{{ config('site.social.youtube') }}" target="_blank"><i class="flaticon-youtube"></i></a>
        </div>
    </div>
</div>
<!-- SIDEBAR END -->

<!-- SEARCH MODAL -->
<div class="ul-search-form-wrapper flex-grow-1 flex-shrink-0">
    <button class="ul-search-closer"><i class="flaticon-close"></i></button>
    <form action="{{ route('news') }}" method="GET" class="ul-search-form">
        <div class="ul-search-form-right">
            <input type="search" name="search" id="ul-search" placeholder="Search programs, events, causes...">
            <button type="submit"><span class="icon"><i class="flaticon-search"></i></span></button>
        </div>
    </form>
</div>
<!-- SEARCH MODAL END -->
