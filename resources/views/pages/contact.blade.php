@extends('layouts.app')

@section('content')
<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Contact Matri Seva Samiti</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </section>

    <!-- CONTACT INFOS SECTION -->
    <div class="ul-contact-infos">
        <div class="ul-section-spacing ul-container">
            @if(session('contact_success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4 p-4 mb-5 shadow-sm" role="alert">
                    <h5 class="alert-heading"><i class="fas fa-check-circle me-2"></i> Message Sent!</h5>
                    <p class="mb-0">{{ session('contact_success') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-4 p-4 mb-5 shadow-sm" role="alert">
                    <h5 class="alert-heading"><i class="fas fa-exclamation-circle me-2"></i> Form Errors:</h5>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row row-cols-md-3 row-cols-1 gy-4">
                <!-- Phone -->
                <div class="col">
                    <div class="ul-contact-info h-100">
                        <div class="icon"><i class="flaticon-phone-call"></i></div>
                        <div class="txt">
                            <span class="title">Helpline Number</span>
                            <a href="tel:{{ config('site.phone_primary') }}">{{ config('site.phone_primary') }}</a>
                            <small class="d-block text-muted">Alt: {{ config('site.phone_secondary') }}</small>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col">
                    <div class="ul-contact-info h-100">
                        <div class="icon"><i class="flaticon-comment"></i></div>
                        <div class="txt">
                            <span class="title">Official Email</span>
                            <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a>
                            <small class="d-block text-muted">Response within 24h</small>
                        </div>
                    </div>
                </div>

                <!-- Location -->
                <div class="col">
                    <div class="ul-contact-info h-100">
                        <div class="icon"><i class="flaticon-location"></i></div>
                        <div class="txt">
                            <span class="title">Headquarters</span>
                            <span class="descr">{{ config('site.address_primary') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2 Office Locations Cards -->
            <div class="row row-cols-md-2 row-cols-1 gy-4 mt-4">
                <div class="col">
                    <div class="card p-4 border-0 shadow-sm rounded-4 h-100 bg-white border-start border-4 border-primary">
                        <span class="badge bg-danger align-self-start mb-2">Registered &amp; Head Office</span>
                        <h4 class="h5 mb-2 text-dark">Jhunsi Headquarters</h4>
                        <p class="text-muted small mb-2"><i class="flaticon-pin text-danger me-1"></i> {{ config('site.address_primary') }}</p>
                        <p class="text-muted small mb-0"><i class="flaticon-phone-call text-primary me-1"></i> {{ config('site.phone_primary') }} | Mon - Sat: 9:00 AM - 6:00 PM</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-4 border-0 shadow-sm rounded-4 h-100 bg-white border-start border-4 border-warning">
                        <span class="badge bg-warning text-dark align-self-start mb-2">Project &amp; Field Office</span>
                        <h4 class="h5 mb-2 text-dark">Ustapur Outreach Center</h4>
                        <p class="text-muted small mb-2"><i class="flaticon-pin text-danger me-1"></i> {{ config('site.address_secondary') }}</p>
                        <p class="text-muted small mb-0"><i class="flaticon-phone-call text-primary me-1"></i> {{ config('site.phone_primary') }} | Mon - Sat: 9:00 AM - 6:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAP SECTION -->
    <div class="ul-contact-map">
        <iframe src="https://maps.google.com/maps?q=Jhunsi,%20Prayagraj,%20Uttar%20Pradesh%20211019&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="width:100%; height:400px; border:0;"></iframe>
    </div>

    <!-- CONTACT FORM SECTION -->
    <section class="ul-inner-contact ul-section-spacing">
        <div class="ul-section-heading justify-content-center text-center">
            <div>
                <span class="ul-section-sub-title">"मिलकर करें प्रयास, खुशहाल हो समाज"</span>
                <h2 class="ul-section-title">Send Us a Message</h2>
                <p class="ul-section-descr">Have questions about our initiatives, tax exemptions (80G), CSR partnerships, or volunteering? Reach out to us.</p>
            </div>
        </div>

        <div class="ul-inner-contact-container">
            <form action="{{ route('contact.submit') }}" method="POST" class="ul-contact-form ul-form">
                @csrf
                <div class="row row-cols-md-2 row-cols-1 gy-3">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" name="name" value="{{ old('name') }}" id="ul-contact-name" placeholder="Your Name *" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input type="email" name="email" value="{{ old('email') }}" id="ul-contact-email" placeholder="Email Address *" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" name="subject" value="{{ old('subject', request()->get('subject', '')) }}" id="ul-contact-subject" placeholder="Subject / Inquiry Topic" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea name="message" id="ul-contact-msg" placeholder="Write Your Message Here..." rows="5" required>{{ old('message') }}</textarea>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
