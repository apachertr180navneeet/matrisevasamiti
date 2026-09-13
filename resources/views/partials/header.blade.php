<!-- HEADER SECTION START -->
<header class="ul-header">
    <div class="ul-header-bottom to-be-sticky">
        <div class="ul-header-bottom-wrapper ul-header-container">
            <div class="logo-container">
                <a href="{{ route('home') }}" class="d-inline-flex align-items-center gap-2">
                    <img src="{{ asset(config('site.site_logo', config('site.logo', 'logo/Logo.png'))) }}" alt="{{ config('site.site_name', 'Matri Seva Samiti') }} Logo" class="logo">
                </a>
            </div>

            <!-- header nav -->
            <div class="ul-header-nav-wrapper">
                <div class="to-go-to-sidebar-in-mobile">
                    <nav class="ul-header-nav">
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
                        
                        <div class="has-sub-menu">
                            <a role="button" class="{{ request()->routeIs(['programs', 'projects', 'impact', 'grants']) ? 'active' : '' }}">Our Work</a>
                            <div class="ul-header-submenu">
                                <ul>
                                    <li><a href="{{ route('programs') }}">All Programs</a></li>
                                    <li><a href="{{ route('projects') }}">Key Projects</a></li>
                                    <li><a href="{{ route('impact') }}">Impact & Reports</a></li>
                                    <li><a href="{{ route('grants') }}">CSR & Grants</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="has-sub-menu">
                            <a role="button" class="{{ request()->routeIs(['donate.index', 'certificate']) ? 'active' : '' }}">Donate</a>
                            <div class="ul-header-submenu">
                                <ul>
                                    <li><a href="{{ route('donate.index') }}">Donate Now <span class="tax-exemption-tag">80G</span></a></li>
                                    <li><a href="{{ route('certificate') }}">Tax Certificates (80G/12A)</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="has-sub-menu">
                            <a role="button" class="{{ request()->routeIs(['volunteer.index', 'career']) ? 'active' : '' }}">Get Involved</a>
                            <div class="ul-header-submenu">
                                <ul>
                                    <li><a href="{{ route('volunteer.index') }}">Become a Volunteer</a></li>
                                    <li><a href="{{ route('career') }}">Career Opportunities</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="has-sub-menu">
                            <a role="button" class="{{ request()->routeIs(['gallery', 'news', 'blogs', 'faq']) ? 'active' : '' }}">Media</a>
                            <div class="ul-header-submenu">
                                <ul>
                                    <li><a href="{{ route('gallery') }}">Photo Gallery</a></li>
                                    <li><a href="{{ route('news') }}">NGO News</a></li>
                                    <li><a href="{{ route('blogs') }}">Blogs &amp; Articles</a></li>
                                    <li><a href="{{ route('faq') }}">FAQs</a></li>
                                </ul>
                            </div>
                        </div>

                        <a href="{{ route('contact.index') }}" class="{{ request()->routeIs('contact.index') ? 'active' : '' }}">Contact</a>
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

                <a href="{{ route('donate.index') }}" class="ul-btn d-sm-inline-flex d-none"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Donate Now </a>
                <button class="ul-header-sidebar-opener d-lg-none d-inline-flex"><i class="flaticon-menu"></i></button>
            </div>
        </div>
    </div>
</header>
<!-- HEADER SECTION END -->
