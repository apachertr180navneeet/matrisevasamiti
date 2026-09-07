<!-- FOOTER SECTION START -->
<footer class="ul-footer">
    <div class="ul-footer-top">
        <div class="ul-footer-container">
            <div class="ul-footer-top-contact-infos">
                <!-- Address Info -->
                <div class="ul-footer-top-contact-info">
                    <div class="ul-footer-top-contact-info-icon">
                        <div class="ul-footer-top-contact-info-icon-inner">
                            <i class="flaticon-pin"></i>
                        </div>
                    </div>
                    <div class="ul-footer-top-contact-info-txt">
                        <span class="ul-footer-top-contact-info-label">Main Registered Office</span>
                        <h5 class="ul-footer-top-contact-info-address">{{ config('site.address_primary') }}</h5>
                    </div>
                </div>

                <!-- Email Info -->
                <div class="ul-footer-top-contact-info">
                    <div class="ul-footer-top-contact-info-icon">
                        <div class="ul-footer-top-contact-info-icon-inner">
                            <i class="flaticon-email"></i>
                        </div>
                    </div>
                    <div class="ul-footer-top-contact-info-txt">
                        <span class="ul-footer-top-contact-info-label">Send Email</span>
                        <h5 class="ul-footer-top-contact-info-address"><a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></h5>
                    </div>
                </div>

                <!-- Phone Info -->
                <div class="ul-footer-top-contact-info">
                    <div class="ul-footer-top-contact-info-icon">
                        <div class="ul-footer-top-contact-info-icon-inner">
                            <i class="flaticon-telephone-call-1"></i>
                        </div>
                    </div>
                    <div class="ul-footer-top-contact-info-txt">
                        <span class="ul-footer-top-contact-info-label">Helpline Number</span>
                        <h5 class="ul-footer-top-contact-info-address"><a href="tel:{{ config('site.phone_primary') }}">{{ config('site.phone_primary') }} / {{ config('site.phone_secondary') }}</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ul-footer-middle">
        <div class="ul-footer-container">
            <div class="ul-footer-middle-wrapper wow animate__fadeInUp">
                <!-- Column 1: About -->
                <div class="ul-footer-about">
                    <a href="{{ route('home') }}"><img src="{{ asset('logo/Logo.png') }}" alt="Matri Seva Samiti Logo" style="max-height:60px; filter: brightness(0) invert(1);" class="logo mb-3"></a>
                    <p class="ul-footer-about-txt">{{ config('site.org_mission') }}</p>
                    <div class="ul-footer-socials">
                        <a href="{{ config('site.social.facebook') }}" target="_blank"><i class="flaticon-facebook"></i></a>
                        <a href="{{ config('site.social.twitter') }}" target="_blank"><i class="flaticon-twitter"></i></a>
                        <a href="{{ config('site.social.linkedin') }}" target="_blank"><i class="flaticon-linkedin-big-logo"></i></a>
                        <a href="{{ config('site.social.youtube') }}" target="_blank"><i class="flaticon-youtube"></i></a>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="ul-footer-widget">
                    <h3 class="ul-footer-widget-title">Quick Links</h3>
                    <div class="ul-footer-widget-links">
                        <a href="{{ route('about') }}">About MSS</a>
                        <a href="{{ route('programs') }}">Our Programs</a>
                        <a href="{{ route('donate.index') }}">Donate with 80G Exemption</a>
                        <a href="{{ route('volunteer.index') }}">Volunteer Registration</a>
                        <a href="{{ route('certificate') }}">Tax Certificates</a>
                        <a href="{{ route('contact.index') }}">Contact Us</a>
                    </div>
                </div>

                <!-- Column 3: Recent Impact Stories -->
                <div class="ul-footer-widget ul-footer-recent-posts">
                    <h3 class="ul-footer-widget-title">Recent Updates</h3>
                    <div class="ul-blog-sidebar-posts">
                        <div class="ul-blog-sidebar-post ul-footer-post">
                            <div class="img">
                                <img src="{{ asset('assets/img/blog-1.jpg') }}" alt="Post Image">
                            </div>
                            <div class="txt">
                                <span class="date">
                                    <span class="icon"><i class="flaticon-calendar"></i></span>
                                    <span>Aug 24, {{ date('Y') }}</span>
                                </span>
                                <h4 class="title"><a href="{{ route('news') }}">1,000+ Girls Enrolled in Rural Digital Literacy</a></h4>
                            </div>
                        </div>

                        <div class="ul-blog-sidebar-post ul-footer-post">
                            <div class="img">
                                <img src="{{ asset('assets/img/blog-2.jpg') }}" alt="Post Image">
                            </div>
                            <div class="txt">
                                <span class="date">
                                    <span class="icon"><i class="flaticon-calendar"></i></span>
                                    <span>Aug 18, {{ date('Y') }}</span>
                                </span>
                                <h4 class="title"><a href="{{ route('news') }}">Free Eye & General Health Checkup in 12 Villages</a></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column 4: Newsletter / Connect -->
                <div class="ul-footer-widget ul-nwsltr-widget">
                    <h3 class="ul-footer-widget-title">Stay Connected</h3>
                    <div class="ul-footer-widget-links ul-footer-contact-links">
                        <a href="mailto:{{ config('site.email') }}"><i class="flaticon-mail"></i> {{ config('site.email') }}</a>
                        <a href="tel:{{ config('site.phone_primary') }}"><i class="flaticon-telephone-call"></i> {{ config('site.phone_primary') }}</a>
                    </div>
                    <form action="{{ route('contact.submit') }}" method="POST" class="ul-nwsltr-form">
                        @csrf
                        <input type="hidden" name="name" value="Newsletter Subscriber">
                        <input type="hidden" name="subject" value="Newsletter Subscription Request">
                        <input type="hidden" name="message" value="Please subscribe me to updates.">
                        <div class="top">
                            <input type="email" name="email" id="nwsltr-email" placeholder="Your Email Address" class="ul-nwsltr-input" required>
                            <button type="submit"><i class="flaticon-next"></i></button>
                        </div>
                        <div class="agreement">
                            <label for="nwsltr-agreement" class="ul-checkbox-wrapper">
                                <input type="checkbox" name="agreement" id="nwsltr-agreement" checked hidden>
                                <span class="ul-checkbox"><i class="flaticon-tick"></i></span>
                                <span class="ul-checkbox-txt">I agree with the <a href="{{ route('privacy') }}">Privacy Policy</a></span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="ul-footer-bottom">
        <div class="ul-footer-container">
            <div class="ul-footer-bottom-wrapper">
                <p class="copyright-txt">&copy; {{ date('Y') }} Matri Seva Samiti. All rights reserved. Registered under Indian Societies Act XXI, 1860.</p>
                <div class="ul-footer-bottom-nav">
                    <a href="{{ route('terms') }}">Terms & Conditions</a>
                    <a href="{{ route('privacy') }}">Privacy Policy</a>
                    <a href="{{ route('disclaimer') }}">Disclaimer</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Vector Art -->
    <div class="ul-footer-vectors">
        <img src="{{ asset('assets/img/footer-vector-img.png') }}" alt="Footer Vector" class="ul-footer-vector-1">
    </div>
</footer>
<!-- FOOTER SECTION END -->
