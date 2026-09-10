<!-- MOBILE SIDEBAR BACKDROP -->
<div class="ul-sidebar-backdrop" id="ulSidebarBackdrop"></div>

<!-- SIDEBAR / OFFCANVAS FOR MOBILE & TABLET -->
<div class="ul-sidebar" id="ulMobileSidebar">
    <!-- Header -->
    <div class="ul-sidebar-header">
        <div class="ul-sidebar-header-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset(config('site.site_logo', config('site.logo', 'logo/Logo.png'))) }}" alt="{{ config('site.site_name', 'Matri Seva Samiti') }} Logo" class="logo">
            </a>
        </div>
        <!-- Close button -->
        <button class="ul-sidebar-closer" id="ulSidebarCloser" aria-label="Close Navigation Menu"><i class="flaticon-close"></i></button>
    </div>

    <!-- Navigation body -->
    <div class="ul-sidebar-body">
        <div class="ul-sidebar-header-nav-wrapper d-block d-lg-none"></div>

        <div class="ul-sidebar-extra">
            <!-- Mobile Language Switcher -->
            <div class="ul-sidebar-lang">
                <label class="form-label text-muted small fw-bold mb-1"><i class="fas fa-globe me-1"></i> Choose Language:</label>
                <select class="form-select form-select-sm" onchange="changeLanguage(this.value)">
                    <option value="en">English (Default)</option>
                    <option value="hi">हिन्दी (Hindi)</option>
                    <option value="bn">বাংলা (Bengali)</option>
                    <option value="ta">தமிழ் (Tamil)</option>
                    <option value="te">తెలుగు (Telugu)</option>
                    <option value="mr">मराठी (Marathi)</option>
                    <option value="gu">ગુજરાતી (Gujarati)</option>
                </select>
            </div>

            <!-- Quick Action Button -->
            <a href="{{ route('donate.index') }}" class="ul-sidebar-cta-btn">
                <i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Donate with 80G Exemption
            </a>
            
            <a href="{{ route('volunteer.index') }}" class="btn btn-outline-secondary w-100 rounded-3 py-2 fw-semibold d-flex align-items-center justify-content-center gap-2 mb-3" style="font-size: 14px;">
                <i class="flaticon-account"></i> Join as Volunteer
            </a>

            <div class="p-3 bg-light rounded-3 mb-2" style="font-size: 13px;">
                <div class="text-muted small">Helpline &amp; Inquiries:</div>
                <a href="tel:{{ config('site.phone_primary', '+919415451910') }}" class="fw-bold text-dark d-block">
                    <i class="flaticon-telephone-call me-1 text-primary"></i> {{ config('site.phone_primary', '+91 94154 51910') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="ul-sidebar-footer">
        <span class="ul-sidebar-footer-title">Follow Matri Seva Samiti</span>
        <div class="ul-sidebar-footer-social">
            <a href="{{ config('site.facebook_url', config('site.social.facebook')) }}" target="_blank" rel="noopener noreferrer" title="Facebook"><i class="flaticon-facebook"></i></a>
            <a href="{{ config('site.twitter_url', config('site.social.twitter')) }}" target="_blank" rel="noopener noreferrer" title="Twitter"><i class="flaticon-twitter"></i></a>
            <a href="{{ config('site.linkedin_url', config('site.social.linkedin')) }}" target="_blank" rel="noopener noreferrer" title="LinkedIn"><i class="flaticon-linkedin-big-logo"></i></a>
            <a href="{{ config('site.youtube_url', config('site.social.youtube')) }}" target="_blank" rel="noopener noreferrer" title="YouTube"><i class="flaticon-youtube"></i></a>
        </div>
    </div>
</div>
<!-- SIDEBAR END -->

<!-- SEARCH MODAL -->
<div class="ul-search-form-wrapper flex-grow-1 flex-shrink-0">
    <button class="ul-search-closer" aria-label="Close Search"><i class="flaticon-close"></i></button>
    <form action="{{ route('news') }}" method="GET" class="ul-search-form">
        <div class="ul-search-form-right">
            <input type="search" name="search" id="ul-search" placeholder="Search programs, initiatives, news...">
            <button type="submit" aria-label="Submit Search"><span class="icon"><i class="flaticon-search"></i></span></button>
        </div>
    </form>
</div>
<!-- SEARCH MODAL END -->
