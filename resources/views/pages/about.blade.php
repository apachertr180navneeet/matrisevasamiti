@extends('layouts.app')

@section('content')
<main>
    <!-- BREADCRUMBS SECTION START -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">About {{ $siteSettings['site_name'] ?? config('site.name', 'Matri Seva Samiti') }}</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>About Us</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMBS SECTION END -->

    <!-- ABOUT INTRO SECTION START -->
    <section class="ul-about ul-section-spacing wow animate__fadeInUp">
        <div class="ul-container">
            <div class="row row-cols-md-2 row-cols-1 align-items-center gy-4 ul-about-row">
                <div class="col">
                    <div class="ul-about-imgs">
                        <div class="img-wrapper" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                            <img src="{{ !empty($siteSettings['about_image']) ? asset($siteSettings['about_image']) : asset('images/about-us.jpg') }}" alt="About {{ $siteSettings['site_name'] ?? 'Matri Seva Samiti' }}" style="width: 100%; height: auto; object-fit: cover;">
                        </div>
                        <div class="ul-about-imgs-vectors">
                            <img src="{{ asset('assets/img/about-img-vector-1.svg') }}" alt="Vector" class="vector-1">
                            <img src="{{ asset('assets/img/about-img-vector-2.svg') }}" alt="Vector" class="vector-2">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="ul-about-txt">
                        <span class="ul-section-sub-title ul-section-sub-title--2">"{{ $siteSettings['tagline'] ?? 'मिलकर करें प्रयास, खुशहाल हो समाज' }}"</span>
                        <h2 class="ul-section-title">Our Story &amp; Purpose</h2>
                        @if(!empty($siteSettings['about_story']))
                            <p class="ul-section-descr">{!! nl2br(e($siteSettings['about_story'])) !!}</p>
                        @else
                            <p class="ul-section-descr">{{ $siteSettings['site_name'] ?? 'Matri Seva Samiti' }} was established in <strong>April {{ $siteSettings['org_established'] ?? config('site.org_established', '2019') }}</strong>, inspired by Mahatma Gandhi's vision that "real India is in villages." Founded by visionary leader <strong>{{ $siteSettings['org_owner'] ?? config('site.org_owner', 'Gyan Shankar Pal') }}</strong>, our organization has been dedicated to transforming rural communities through sustainable development programs.</p>
                            <p class="ul-section-descr">Based in <strong>{{ $siteSettings['contact_address'] ?? 'Prayagraj (Allahabad), Uttar Pradesh' }}</strong>, {{ $siteSettings['site_name'] ?? 'Matri Seva Samiti' }} is registered under the Societies Registration Act, 1860 (Central Act, 21 of 1860) on 28 August, 2021, ensuring utmost transparency, accountability, and statutory compliance in all our initiatives.</p>
                        @endif

                        <div class="ul-about-block">
                            <div class="block-left">
                                <div class="block-heading">
                                    <div class="icon"><i class="flaticon-love"></i></div>
                                    <h3 class="block-title">Our Core Approach</h3>
                                </div>
                                <ul class="block-list">
                                    <li>{{ $siteSettings['about_approach_1'] ?? 'Empower rural youth with market-ready vocational skills' }}</li>
                                    <li>{{ $siteSettings['about_approach_2'] ?? 'Free health clinics, mobile diagnosis & nutrition kits' }}</li>
                                    <li>{{ $siteSettings['about_approach_3'] ?? 'Self-help groups, tailoring hubs & girl education' }}</li>
                                </ul>
                            </div>
                            @php
                                $presidentMember = $members->firstWhere('designation', 'President') ?? $members->first();
                            @endphp
                            <div class="block-right">
                                <img src="{{ asset($presidentMember->photo ?? 'images/president.png') }}" alt="{{ $presidentMember->name ?? 'President' }}" style="width: 120px; height: 120px; border-radius: 12px; object-fit: cover;">
                            </div>
                        </div>

                        <div class="ul-about-bottom">
                            <a href="{{ route('donate.index') }}" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Support Our Cause</a>

                            <div class="ul-about-call">
                                <div class="icon"><i class="flaticon-telephone-call"></i></div>
                                <div class="txt">
                                    <span class="call-title">Call For Inquiries</span>
                                    <a href="tel:{{ $siteSettings['contact_phone_primary'] ?? config('site.phone_primary', '+91 94152 00000') }}">{{ $siteSettings['contact_phone_primary'] ?? config('site.phone_primary', '+91 94152 00000') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ul-about-vectors">
            <img src="{{ asset('assets/img/about-vector-1.png') }}" alt="vector" class="vector-1">
        </div>
    </section>
    <!-- ABOUT INTRO END -->

    <!-- STATS SECTION -->
    <div class="ul-stats ul-section-spacing">
        <div class="ul-container">
            <div class="ul-stats-wrapper wow animate__fadeInUp">
                <div class="row row-cols-md-4 row-cols-sm-3 row-cols-2 row-cols-xxs-1 ul-bs-row justify-content-center">
                    <div class="col">
                        <div class="ul-stats-item">
                            <i class="flaticon-costumer"></i>
                            <span class="number">{{ $siteSettings['impact_beneficiaries'] ?? '15,000+' }}</span>
                            <span class="txt">Beneficiaries Reached</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="ul-stats-item">
                            <i class="flaticon-package"></i>
                            <span class="number">{{ $siteSettings['impact_projects'] ?? '50+' }}</span>
                            <span class="txt">Projects Completed</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="ul-stats-item">
                            <i class="flaticon-team"></i>
                            <span class="number">{{ $siteSettings['impact_volunteers'] ?? '120+' }}</span>
                            <span class="txt">Active Volunteers</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="ul-stats-item">
                            <i class="flaticon-relationship"></i>
                            <span class="number">{{ $siteSettings['impact_years'] ?? '5+' }}</span>
                            <span class="txt">Years of Structured Impact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- STATS END -->

    <!-- VISION, MISSION & VALUES CARDS -->
    <section class="ul-section-spacing pt-0">
        <div class="ul-container">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4">
                <!-- Vision -->
                <div class="col">
                    <div class="card p-4 border-0 shadow-sm rounded-4 h-100 text-center">
                        <div class="mx-auto mb-3 rounded-circle d-inline-flex align-items-center justify-content-center" style="width:70px; height:70px; background: rgba(235, 83, 16, 0.1); color: var(--ul-primary); font-size: 28px;">
                            <i class="flaticon-love"></i>
                        </div>
                        <h3 class="mb-3">Our Vision</h3>
                        <p class="text-muted">{{ $siteSettings['org_vision'] ?? 'To create a society where every individual, especially in rural areas, has access to basic needs, quality education, healthcare, and opportunities for sustainable livelihood and personal growth.' }}</p>
                    </div>
                </div>

                <!-- Mission -->
                <div class="col">
                    <div class="card p-4 border-0 shadow-sm rounded-4 h-100 text-center">
                        <div class="mx-auto mb-3 rounded-circle d-inline-flex align-items-center justify-content-center" style="width:70px; height:70px; background: rgba(235, 83, 16, 0.1); color: var(--ul-primary); font-size: 28px;">
                            <i class="flaticon-fast-forward-double-right-arrows-symbol"></i>
                        </div>
                        <h3 class="mb-3">Our Mission</h3>
                        <p class="text-muted">{{ $siteSettings['org_mission'] ?? config('site.org_mission', 'To transform rural and underserved communities by delivering accessible healthcare, education, women empowerment, and sustainable livelihood programs.') }}</p>
                    </div>
                </div>

                <!-- Values -->
                <div class="col">
                    <div class="card p-4 border-0 shadow-sm rounded-4 h-100 text-center">
                        <div class="mx-auto mb-3 rounded-circle d-inline-flex align-items-center justify-content-center" style="width:70px; height:70px; background: rgba(235, 83, 16, 0.1); color: var(--ul-primary); font-size: 28px;">
                            <i class="flaticon-account"></i>
                        </div>
                        <h3 class="mb-3">Our Values</h3>
                        <p class="text-muted">{{ $siteSettings['org_values'] ?? 'Integrity & Transparency, Community Participation, Sustainable Development, Compassion & Service, and Innovation in Grassroot Execution.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- EXECUTIVE COMMITTEE SECTION -->
    <section class="ul-team ul-section-spacing pt-0">
        <div class="ul-container">
            @php
                $boardMembers = $members->filter(function($m) {
                    return $m->category === 'Board' || in_array($m->designation, ['President', 'Vice President', 'Managing Secretary', 'Treasurer']);
                });
                $committeeMembers = $members->reject(function($m) {
                    return $m->category === 'Board' || in_array($m->designation, ['President', 'Vice President', 'Managing Secretary', 'Treasurer']);
                });
                if ($boardMembers->isEmpty() && $committeeMembers->isEmpty()) {
                    $boardMembers = $members;
                }
            @endphp

            @if($boardMembers->isNotEmpty())
                <div class="ul-section-heading justify-content-between text-center">
                    <div class="mx-auto">
                        <span class="ul-section-sub-title">Governance &amp; Leadership</span>
                        <h2 class="ul-section-title">Executive Committee</h2>
                    </div>
                </div>

                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 gy-4 justify-content-center mb-5">
                    @foreach($boardMembers as $member)
                        <div class="col">
                            <div class="ul-team-member text-center h-100 d-flex flex-column justify-content-between">
                                <div class="ul-team-member-img">
                                    <img src="{{ asset($member->photo ?? 'images/student1.jpeg') }}" alt="{{ $member->name }}" style="height: 280px; width: 100%; object-fit: cover; border-radius: 15px;">
                                </div>
                                <div class="ul-team-member-info mt-3 flex-grow-1">
                                    <h3 class="ul-team-member-name">{{ $member->name }}</h3>
                                    <p class="ul-team-member-designation text-primary fw-semibold">{{ $member->designation }}</p>
                                    @if($member->bio)
                                        <p class="text-muted small mb-2">{{ Str::limit($member->bio, 80) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($committeeMembers->isNotEmpty())
                <div class="ul-section-heading justify-content-between text-center mt-4">
                    <div class="mx-auto">
                        <span class="ul-section-sub-title">Field &amp; Advisory</span>
                        <h2 class="ul-section-title">Committee Members</h2>
                    </div>
                </div>

                <div class="row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-1 gy-4 justify-content-center">
                    @foreach($committeeMembers as $member)
                        <div class="col">
                            <div class="ul-team-member text-center h-100 d-flex flex-column justify-content-between">
                                <div class="ul-team-member-img">
                                    <img src="{{ asset($member->photo ?? 'images/student1.jpeg') }}" alt="{{ $member->name }}" style="height: 280px; width: 100%; object-fit: cover; border-radius: 15px;">
                                </div>
                                <div class="ul-team-member-info mt-3 flex-grow-1">
                                    <h3 class="ul-team-member-name">{{ $member->name }}</h3>
                                    <p class="ul-team-member-designation text-primary fw-semibold">{{ $member->designation }}</p>
                                    @if($member->bio)
                                        <p class="text-muted small mb-2">{{ Str::limit($member->bio, 80) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($members->isEmpty())
                <div class="text-center py-5 text-muted">
                    <p>Leadership details will be updated soon.</p>
                </div>
            @endif
        </div>
    </section>
    <!-- TEAM END -->

    <!-- TESTIMONIALS SECTION (DYNAMIC) -->
    @if(isset($testimonials) && $testimonials->isNotEmpty())
        <section class="ul-testimonials ul-section-spacing bg-light">
            <div class="ul-container">
                <div class="ul-section-heading text-center">
                    <div>
                        <span class="ul-section-sub-title">Voices of Change</span>
                        <h2 class="ul-section-title">What People Say About Our Impact</h2>
                    </div>
                </div>

                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4">
                    @foreach($testimonials as $testi)
                        <div class="col">
                            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 d-flex flex-column justify-content-between bg-white">
                                <div>
                                    <div class="mb-3 text-warning">
                                        @for($i = 1; $i <= ($testi->rating ?? 5); $i++)
                                            <i class="flaticon-star"></i>
                                        @endfor
                                    </div>
                                    <p class="text-muted fst-italic mb-4">"{{ $testi->quote }}"</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($testi->photo ?? 'images/student1.jpeg') }}" alt="{{ $testi->name }}" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;" class="me-3">
                                    <div>
                                        <h5 class="mb-0 text-dark">{{ $testi->name }}</h5>
                                        <small class="text-muted">{{ $testi->designation ?? $testi->location }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</main>
@endsection

