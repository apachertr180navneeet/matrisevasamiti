@extends('layouts.app')

@section('content')
<main class="overflow-hidden">
    <!-- 1. HERO / BANNER SECTION -->
    <section class="ul-banner">
        @if(isset($banners) && $banners->isNotEmpty())
            @if($banners->count() == 1)
                @php $b = $banners->first(); @endphp
                <div class="ul-banner-container">
                    <div class="row gy-4 row-cols-lg-2 row-cols-1 align-items-center flex-column-reverse flex-lg-row">
                        <!-- Banner Text Content -->
                        <div class="col">
                            <div class="ul-banner-txt">
                                <div class="wow animate__fadeInUp">
                                    @if($b->subtitle)
                                        <span class="ul-banner-sub-title ul-section-sub-title">{{ $b->subtitle }}</span>
                                    @endif
                                    <h1 class="ul-banner-title">{{ $b->title }}</h1>
                                    @if($b->description)
                                        <p class="ul-banner-descr">{{ $b->description }}</p>
                                    @endif
                                    <div class="ul-banner-btns">
                                        <a href="{{ $b->btn_link ?: route('donate.index') }}" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> {{ $b->btn_text ?: 'Donate Now' }}</a>
                                        @if($b->secondary_btn_text)
                                            <a href="{{ $b->secondary_btn_link ?: route('projects') }}" class="ul-btn" style="background: var(--ul-secondary, #0F2B5B); margin-left: 10px;"><i class="flaticon-up-right-arrow"></i> {{ $b->secondary_btn_text }}</a>
                                        @endif

                                        <div class="ul-banner-stat mt-3">
                                            <div class="imgs">
                                                <img src="{{ asset('images/student1.jpeg') }}" alt="Beneficiary 1" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                                                <img src="{{ asset('images/student2.jpeg') }}" alt="Beneficiary 2" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                                                <img src="{{ asset('images/student3.jpeg') }}" alt="Beneficiary 3" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                                                <span class="number">{{ $siteSettings['impact_beneficiaries'] ?? '15K+' }}</span>
                                            </div>
                                            <span class="txt">Beneficiaries Reached</span>
                                        </div>
                                    </div>
                                </div>

                                <img src="{{ asset('assets/img/vector-img.png') }}" alt="Vector Art" class="ul-banner-txt-vector">
                            </div>
                        </div>

                        <!-- Banner Image Collage & Floating Vectors -->
                        <div class="col align-self-start">
                            <div class="ul-banner-img">
                                <div class="img-wrapper" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                                    <img src="{{ !empty($b->image) ? asset($b->image) : asset('images/herobg.png') }}" alt="{{ $b->title }}" style="width: 100%; height: auto; object-fit: cover;">
                                </div>
                                <div class="ul-banner-img-vectors">
                                    <img src="{{ asset('assets/img/banner-img-vector-1.png') }}" alt="vector" class="vector-1 wow animate__fadeInRight">
                                    <img src="{{ asset('assets/img/banner-img-vector-2.png') }}" alt="vector" class="vector-2 wow animate__fadeInDown">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Multiple Banners Slider -->
                <div class="ul-home-hero-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach($banners as $b)
                            <div class="swiper-slide">
                                <div class="ul-banner-container">
                                    <div class="row gy-4 row-cols-lg-2 row-cols-1 align-items-center flex-column-reverse flex-lg-row">
                                        <div class="col">
                                            <div class="ul-banner-txt">
                                                <div>
                                                    @if($b->subtitle)
                                                        <span class="ul-banner-sub-title ul-section-sub-title">{{ $b->subtitle }}</span>
                                                    @endif
                                                    <h1 class="ul-banner-title">{{ $b->title }}</h1>
                                                    @if($b->description)
                                                        <p class="ul-banner-descr">{{ $b->description }}</p>
                                                    @endif
                                                    <div class="ul-banner-btns">
                                                        <a href="{{ $b->btn_link ?: route('donate.index') }}" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> {{ $b->btn_text ?: 'Donate Now' }}</a>
                                                        @if($b->secondary_btn_text)
                                                            <a href="{{ $b->secondary_btn_link ?: route('projects') }}" class="ul-btn" style="background: var(--ul-secondary, #0F2B5B); margin-left: 10px;"><i class="flaticon-up-right-arrow"></i> {{ $b->secondary_btn_text }}</a>
                                                        @endif

                                                        <div class="ul-banner-stat mt-3">
                                                            <div class="imgs">
                                                                <img src="{{ asset('images/student1.jpeg') }}" alt="Beneficiary 1" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                                                                <img src="{{ asset('images/student2.jpeg') }}" alt="Beneficiary 2" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                                                                <img src="{{ asset('images/student3.jpeg') }}" alt="Beneficiary 3" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                                                                <span class="number">{{ $siteSettings['impact_beneficiaries'] ?? '15K+' }}</span>
                                                            </div>
                                                            <span class="txt">Beneficiaries Reached</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="{{ asset('assets/img/vector-img.png') }}" alt="Vector Art" class="ul-banner-txt-vector">
                                            </div>
                                        </div>

                                        <div class="col align-self-start">
                                            <div class="ul-banner-img">
                                                <div class="img-wrapper" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                                                    <img src="{{ !empty($b->image) ? asset($b->image) : asset('images/herobg.png') }}" alt="{{ $b->title }}" style="width: 100%; height: auto; object-fit: cover;">
                                                </div>
                                                <div class="ul-banner-img-vectors">
                                                    <img src="{{ asset('assets/img/banner-img-vector-1.png') }}" alt="vector" class="vector-1">
                                                    <img src="{{ asset('assets/img/banner-img-vector-2.png') }}" alt="vector" class="vector-2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="ul-home-hero-pagination text-center mt-3"></div>
                </div>
            @endif
        @else
            <!-- Fallback Default Hero Banner -->
            <div class="ul-banner-container">
                <div class="row gy-4 row-cols-lg-2 row-cols-1 align-items-center flex-column-reverse flex-lg-row">
                    <!-- Banner Text Content -->
                    <div class="col">
                        <div class="ul-banner-txt">
                            <div class="wow animate__fadeInUp">
                                <span class="ul-banner-sub-title ul-section-sub-title">{{ $siteSettings['tagline'] ?? '"मिलकर करें प्रयास, खुशहाल हो समाज"' }}</span>
                                <h1 class="ul-banner-title">{{ $siteSettings['site_name'] ?? 'Matri Seva Samiti' }}</h1>
                                <p class="ul-banner-descr">{{ $siteSettings['site_description'] ?? 'Established in April ' . ($siteSettings['org_established'] ?? '2019') . ', Matri Seva Samiti is a registered non-profit organization dedicated to uplifting rural and marginalized communities across India through education, healthcare, women empowerment, and skill development.' }}</p>
                                <div class="ul-banner-btns">
                                    <a href="{{ route('donate.index') }}" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Donate Now</a>
                                    <a href="{{ route('projects') }}" class="ul-btn" style="background: var(--ul-secondary, #0F2B5B); margin-left: 10px;"><i class="flaticon-up-right-arrow"></i> Explore Our Work</a>

                                    <div class="ul-banner-stat mt-3">
                                        <div class="imgs">
                                            <img src="{{ asset('images/student1.jpeg') }}" alt="Beneficiary 1" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                                            <img src="{{ asset('images/student2.jpeg') }}" alt="Beneficiary 2" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                                            <img src="{{ asset('images/student3.jpeg') }}" alt="Beneficiary 3" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
                                            <span class="number">{{ $siteSettings['impact_beneficiaries'] ?? '15K+' }}</span>
                                        </div>
                                        <span class="txt">Beneficiaries Reached</span>
                                    </div>
                                </div>
                            </div>

                            <img src="{{ asset('assets/img/vector-img.png') }}" alt="Vector Art" class="ul-banner-txt-vector">
                        </div>
                    </div>

                    <!-- Banner Image Collage & Floating Vectors -->
                    <div class="col align-self-start">
                        <div class="ul-banner-img">
                            <div class="img-wrapper" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                                <img src="{{ asset('images/herobg.png') }}" alt="Matri Seva Samiti Social Work" style="width: 100%; height: auto; object-fit: cover;">
                            </div>
                            <div class="ul-banner-img-vectors">
                                <img src="{{ asset('assets/img/banner-img-vector-1.png') }}" alt="vector" class="vector-1 wow animate__fadeInRight">
                                <img src="{{ asset('assets/img/banner-img-vector-2.png') }}" alt="vector" class="vector-2 wow animate__fadeInDown">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <!-- HERO SECTION END -->

    <!-- 2. ABOUT US SECTION -->
    <section class="ul-about ul-section-spacing wow animate__fadeInUp">
        <div class="ul-container">
            <div class="row row-cols-md-2 row-cols-1 align-items-center gy-4 ul-about-row">
                <!-- Left Image Collage -->
                <div class="col">
                    <div class="ul-about-imgs">
                        <div class="img-wrapper" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                            <img src="{{ !empty($siteSettings['home_about_image']) ? asset($siteSettings['home_about_image']) : (!empty($siteSettings['about_image']) ? asset($siteSettings['about_image']) : asset('images/project1.jpeg')) }}" alt="About {{ $siteSettings['site_name'] ?? 'Matri Seva Samiti' }}" style="width: 100%; height: 380px; object-fit: cover;">
                        </div>
                        <div class="ul-about-imgs-vectors">
                            <img src="{{ asset('assets/img/about-img-vector-1.svg') }}" alt="Decoration" class="vector-1">
                            <img src="{{ asset('assets/img/about-img-vector-2.svg') }}" alt="Decoration" class="vector-2">
                        </div>
                    </div>
                </div>

                <!-- Right Text & Highlights -->
                <div class="col">
                    <div class="ul-about-txt">
                        <span class="ul-section-sub-title ul-section-sub-title--2">{{ $siteSettings['home_about_subtitle'] ?? $siteSettings['tagline'] ?? 'About Us' }}</span>
                        <h2 class="ul-section-title">{{ $siteSettings['home_about_title'] ?? 'Serving Humanity with Soft Hearts & Strong Resolve' }}</h2>
                        <p class="ul-section-descr">{{ !empty($siteSettings['home_about_description']) ? $siteSettings['home_about_description'] : (!empty($siteSettings['about_story']) ? Str::limit($siteSettings['about_story'], 280) : 'Established in April ' . ($siteSettings['org_established'] ?? config('site.org_established', '2019')) . ', ' . ($siteSettings['site_name'] ?? 'Matri Seva Samiti') . ' is a certified 80G non-profit organization dedicated to grassroots transformation across education, healthcare, women empowerment, and skill development.') }}</p>

                        <div class="ul-about-block">
                            <div class="block-left">
                                <div class="block-heading">
                                    <div class="icon"><i class="flaticon-love"></i></div>
                                    <h3 class="block-title">{{ $siteSettings['home_about_block_title'] ?? 'Key Accreditations & Impact' }}</h3>
                                </div>
                                <ul class="block-list">
                                    <li>{{ $siteSettings['home_about_point_1'] ?? 'Registered under 80G, 12A, CSR-1 & NITI Aayog NGO Darpan' }}</li>
                                    <li>{{ $siteSettings['home_about_point_2'] ?? (($siteSettings['impact_projects'] ?? '50+') . ' Projects Completed & ' . ($siteSettings['impact_beneficiaries'] ?? '15,000+') . ' Rural Lives Empowered') }}</li>
                                </ul>
                            </div>
                            <div class="block-right">
                                <img src="{{ !empty($siteSettings['home_about_thumb_image']) ? asset($siteSettings['home_about_thumb_image']) : asset('images/student1.jpeg') }}" alt="MSS Field Program" style="width: 120px; height: 120px; border-radius: 12px; object-fit: cover;">
                            </div>
                        </div>

                        <div class="ul-about-bottom">
                            <a href="{{ route('about') }}" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> {{ $siteSettings['home_about_btn_text'] ?? 'Read More' }}</a>

                            <div class="ul-about-call">
                                <div class="icon"><i class="flaticon-telephone-call"></i></div>
                                <div class="txt">
                                    <span class="call-title">{{ $siteSettings['home_about_call_title'] ?? 'Call For Inquiries' }}</span>
                                    <a href="tel:{{ $siteSettings['home_about_phone'] ?? $siteSettings['contact_phone_primary'] ?? config('site.phone_primary', '+91 9415451910') }}">{{ $siteSettings['home_about_phone'] ?? $siteSettings['contact_phone_primary'] ?? config('site.phone_primary', '+91 9415451910') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Floating Vector -->
        <div class="ul-about-vectors">
            <img src="{{ asset('assets/img/about-vector-1.png') }}" alt="vector" class="vector-1">
        </div>
    </section>
    <!-- ABOUT SECTION END -->

    <!-- 3. URGENT CAUSES / DONATIONS SLIDER SECTION -->
    <section class="ul-donations ul-section-spacing overflow-hidden">
        <div class="ul-container">
            <div class="ul-section-heading ul-donations-heading justify-content-between text-center">
                <div class="left">
                    <span class="ul-section-sub-title"><span class="txt">{{ $siteSettings['home_causes_subtitle'] ?? 'Help & Donate' }}</span></span>
                    <h2 class="ul-section-title">{{ $siteSettings['home_causes_title'] ?? 'Inspiring and Helping for a Better Lifestyle' }}</h2>
                </div>

                <div class="flex-shrink-0">
                    <div class="ul-banner-stat">
                        <div class="imgs">
                            <img src="{{ asset('assets/img/user-1.png') }}" alt="Donor">
                            <img src="{{ asset('assets/img/user-3.png') }}" alt="Donor">
                            <img src="{{ asset('assets/img/user-2.png') }}" alt="Donor">
                            <span class="number">{{ $siteSettings['home_causes_stat_number'] ?? $siteSettings['stat_4_number'] ?? '15K+' }}</span>
                        </div>
                        <span class="txt">{{ $siteSettings['home_causes_stat_label'] ?? 'Active Donors' }}</span>
                    </div>
                </div>
                <div class="ul-slider-nav ul-donations-slider-nav">
                    <button class="prev" aria-label="Previous Slide"><i class="flaticon-back"></i></button>
                    <button class="next" aria-label="Next Slide"><i class="flaticon-next"></i></button>
                </div>
            </div>
        </div>

        <!-- Donations Swiper Slider -->
        <div class="ul-container wow animate__fadeInUp">
            <div class="ul-donations-slider swiper">
                <div class="swiper-wrapper">
                    @php
                        $displayCauses = isset($causes) && $causes->isNotEmpty() ? $causes->all() : [];
                        
                        $fallbackCauses = [
                            (object)[
                                'id' => null,
                                'title' => 'Girl Child Education & Smart Classrooms',
                                'category' => 'Education',
                                'short_description' => 'Providing quality learning kits, digital smart tools, and scholarships to rural girl students.',
                                'raised_amount' => 35000,
                                'goal_amount' => 500000,
                                'image' => 'images/student1.jpeg',
                            ],
                            (object)[
                                'id' => null,
                                'title' => 'Women Tailoring & Skill Empowerment Center',
                                'category' => 'Women Empowerment',
                                'short_description' => 'Providing commercial sewing machines, fabric kits, and master trainer coaching for rural women to earn livelihood.',
                                'raised_amount' => 48000,
                                'goal_amount' => 200000,
                                'image' => 'images/project2.jpg',
                            ],
                            (object)[
                                'id' => null,
                                'title' => 'Free Rural Health & Diagnostic Camps',
                                'category' => 'Healthcare',
                                'short_description' => 'Organizing free specialized doctor consultations, diagnostic tests, and vital medicines in remote village areas.',
                                'raised_amount' => 62000,
                                'goal_amount' => 150000,
                                'image' => 'images/project1.jpeg',
                            ],
                            (object)[
                                'id' => null,
                                'title' => 'Digital Literacy & Computer Labs for Youths',
                                'category' => 'Skill Training',
                                'short_description' => 'Equipping village community centers with computers, internet access, and digital literacy training courses.',
                                'raised_amount' => 85000,
                                'goal_amount' => 300000,
                                'image' => 'images/student3.jpeg',
                            ],
                        ];

                        // If database has fewer than 3 causes, supplement with curated MSS initiatives so carousel is full
                        if (count($displayCauses) < 3) {
                            $existingTitles = array_map(function($c) { return is_object($c) ? $c->title : ''; }, $displayCauses);
                            foreach ($fallbackCauses as $fb) {
                                if (count($displayCauses) >= 4) break;
                                if (!in_array($fb->title, $existingTitles)) {
                                    $displayCauses[] = $fb;
                                    $existingTitles[] = $fb->title;
                                }
                            }
                        }
                    @endphp

                    @foreach($displayCauses as $cause)
                        @php
                            $raised = (float) ($cause->raised_amount ?? 0);
                            $goal = (float) ($cause->goal_amount ?? 0);
                            $progress = $goal > 0 ? min(100, round(($raised / $goal) * 100)) : 0;
                            $imageSrc = !empty($cause->image) ? asset($cause->image) : asset('images/project1.jpeg');
                            $donateUrl = !empty($cause->id) ? route('donate.index', ['cause_id' => $cause->id]) : route('donate.index');
                        @endphp
                        <div class="swiper-slide">
                            <div class="ul-donation">
                                <div class="ul-donation-img">
                                    <img src="{{ $imageSrc }}" alt="{{ $cause->title }}" style="height: 220px; width: 100%; object-fit: cover;">
                                    @if(!empty($cause->category))
                                        <span class="tag">{{ $cause->category }}</span>
                                    @endif
                                </div>
                                <div class="ul-donation-txt">
                                    <div class="ul-donation-progress">
                                        <div class="donation-progress-container ul-progress-container">
                                            <div class="donation-progressbar ul-progressbar" data-ul-progress-value="{{ $progress }}">
                                                <div class="donation-progress-label ul-progress-label"></div>
                                            </div>
                                        </div>
                                        <div class="ul-donation-progress-labels">
                                            <span class="ul-donation-progress-label">Raised : ₹{{ number_format($raised) }}</span>
                                            <span class="ul-donation-progress-label">Goal : ₹{{ number_format($goal) }}</span>
                                        </div>
                                    </div>
                                    <a href="{{ $donateUrl }}" class="ul-donation-title">{{ $cause->title }}</a>
                                    <p class="ul-donation-descr">{{ Str::limit($cause->short_description ?: $cause->description, 110) }}</p>
                                    <a href="{{ $donateUrl }}" class="ul-donation-btn">Donate now <i class="flaticon-up-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- CAUSES SECTION END -->

    <!-- 4. LIVE CUSTOM DONATE FORM STRIP -->
    <div class="ul-section-spacing">
        <div class="ul-container">
            <div class="ul-donate-form-section">
                <div class="row justify-content-between align-items-center">
                    <!-- Donation Quick Form -->
                    <div class="col-lg-6 position-relative">
                        <div class="ul-donate-form-wrapper">
                            <h3 class="ul-donate-form-title">{{ $siteSettings['home_donate_form_title'] ?? 'Support Our Cause - Donate Now' }}</h3>
                            <form action="{{ route('donate.index') }}" method="GET" class="ul-donate-form">
                                <div>
                                    <input type="radio" name="amount" id="donate-amount-1" value="500" checked hidden>
                                    <label for="donate-amount-1" class="ul-donate-form-label">₹500</label>
                                </div>
                                <div>
                                    <input type="radio" name="amount" id="donate-amount-2" value="1000" hidden>
                                    <label for="donate-amount-2" class="ul-donate-form-label">₹1,000</label>
                                </div>
                                <div>
                                    <input type="radio" name="amount" id="donate-amount-3" value="2500" hidden>
                                    <label for="donate-amount-3" class="ul-donate-form-label">₹2,500</label>
                                </div>
                                <div>
                                    <input type="radio" name="amount" id="donate-amount-4" value="5000" hidden>
                                    <label for="donate-amount-4" class="ul-donate-form-label">₹5,000</label>
                                </div>
                                <div>
                                    <input type="radio" name="amount" id="donate-amount-5" value="10000" hidden>
                                    <label for="donate-amount-5" class="ul-donate-form-label">₹10,000</label>
                                </div>

                                <div class="custom-amount-wrapper">
                                    <input type="radio" name="amount" id="custom-amount" value="custom">
                                    <label for="donate-amount-custom" class="ul-donate-form-label">
                                        <input type="number" name="custom_amount" id="donate-amount-custom" placeholder="Custom ₹" class="ul-donate-form-custom-input">
                                    </label>
                                </div>

                                <div>
                                    <button type="submit" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Donate Now</button>
                                </div>
                            </form>
                        </div>
                        <img src="{{ asset('assets/img/donate-form-vector.svg') }}" alt="vector" class="ul-donate-form-vector">
                    </div>

                    <!-- Right Impact Text -->
                    <div class="col-xl-5 col-lg-6">
                        <div class="ul-donate-form-section-txt">
                            <span class="ul-section-sub-title text-white">{{ $siteSettings['home_donate_subtitle'] ?? '100% Tax Deductible (80G)' }}</span>
                            <h2 class="ul-section-title text-white">{{ $siteSettings['home_donate_title'] ?? 'Support Rural India With 80G Tax Exemption' }}</h2>
                            <p class="text-white opacity-75 mb-3">{{ $siteSettings['home_donate_description'] ?? ('Donations made to ' . ($siteSettings['site_name'] ?? 'Matri Seva Samiti') . ' are eligible for tax deduction under Section 80G. UPI ID: ' . ($siteSettings['upi_id'] ?? '9415451910@ybl / matrisevasamiti1910@sbi')) }}</p>

                            <div class="ul-donation-progress">
                                <div class="donation-progress-container ul-progress-container">
                                    <div class="donation-progressbar ul-progressbar" data-ul-progress-value="{{ $siteSettings['home_donate_progress_percent'] ?? '85' }}">
                                        <div class="donation-progress-label ul-progress-label"></div>
                                    </div>
                                </div>
                                <div class="ul-donation-progress-labels">
                                    <span class="ul-donation-progress-label">{{ $siteSettings['home_donate_progress_label_1'] ?? ('Beneficiaries Reached : ' . ($siteSettings['impact_beneficiaries'] ?? '15,000+')) }}</span>
                                    <span class="ul-donation-progress-label">{{ $siteSettings['home_donate_progress_label_2'] ?? ('Projects : ' . ($siteSettings['impact_projects'] ?? '50+') . ' Completed') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DONATE FORM STRIP END -->

    <!-- 5. STATS COUNTER SECTION -->
    <div class="ul-stats ul-section-spacing">
        <div class="ul-container">
            <div class="ul-stats-wrapper wow animate__fadeInUp">
                <div class="row row-cols-md-4 row-cols-sm-3 row-cols-2 row-cols-xxs-1 ul-bs-row justify-content-center">
                    <div class="col">
                        <div class="ul-stats-item">
                            <i class="{{ $siteSettings['stat_1_icon'] ?? 'flaticon-costumer' }}"></i>
                            <span class="number">{{ $siteSettings['stat_1_number'] ?? $siteSettings['impact_beneficiaries'] ?? '12,500+' }}</span>
                            <span class="txt">{{ $siteSettings['stat_1_title'] ?? 'Children Supported' }}</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="ul-stats-item">
                            <i class="{{ $siteSettings['stat_2_icon'] ?? 'flaticon-team' }}"></i>
                            <span class="number">{{ $siteSettings['stat_2_number'] ?? $siteSettings['impact_volunteers'] ?? '450+' }}</span>
                            <span class="txt">{{ $siteSettings['stat_2_title'] ?? 'Active Volunteers' }}</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="ul-stats-item">
                            <i class="{{ $siteSettings['stat_3_icon'] ?? 'flaticon-package' }}"></i>
                            <span class="number">{{ $siteSettings['stat_3_number'] ?? $siteSettings['impact_projects'] ?? '35+' }}</span>
                            <span class="txt">{{ $siteSettings['stat_3_title'] ?? 'Villages Transformed' }}</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="ul-stats-item">
                            <i class="{{ $siteSettings['stat_4_icon'] ?? 'flaticon-relationship' }}"></i>
                            <span class="number">{{ $siteSettings['stat_4_number'] ?? '15,000+' }}</span>
                            <span class="txt">{{ $siteSettings['stat_4_title'] ?? 'Supporters Worldwide' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- STATS SECTION END -->

    <!-- 6. UPCOMING EVENTS SECTION -->
    <section class="ul-events ul-section-spacing pt-0">
        <div class="ul-container">
            <div class="ul-section-heading align-items-center wow animate__fadeInUp">
                <div class="left">
                    <span class="ul-section-sub-title">{{ $siteSettings['home_events_subtitle'] ?? 'Upcoming Events' }}</span>
                    <h2 class="ul-section-title text-white">{{ $siteSettings['home_events_title'] ?? 'Join Our Community Outreach Schedule' }}</h2>
                </div>
                <a href="{{ route('volunteer.index') }}" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> {{ $siteSettings['home_events_btn_text'] ?? 'Join An Event' }}</a>
            </div>

            <!-- Events Grid -->
            <div class="ul-events-wrapper">
                <div class="row ul-bs-row row-cols-lg-2 row-cols-1">
                    @php
                        $displayEvents = isset($events) && $events->isNotEmpty() ? $events : (isset($news) ? $news->where('type', 'event') : collect());
                    @endphp
                    @forelse($displayEvents as $event)
                        <div class="col wow animate__fadeInUp">
                            <div class="ul-event">
                                <div class="ul-event-img">
                                    <img src="{{ !empty($event->image) ? asset($event->image) : asset('images/healthcare-camp-news.jpg') }}" alt="{{ $event->title }}" style="height: 200px; width: 100%; object-fit: cover;">
                                    @if($event->published_date)
                                        <span class="date">{{ \Carbon\Carbon::parse($event->published_date)->format('d') }} <span>{{ \Carbon\Carbon::parse($event->published_date)->format('M') }}</span></span>
                                    @endif
                                </div>
                                <div class="ul-event-txt">
                                    <h3 class="ul-event-title"><a href="{{ route('news') }}">{{ $event->title }}</a></h3>
                                    <p class="ul-event-descr">{{ Str::limit($event->excerpt ?: strip_tags($event->content), 120) }}</p>
                                    <div class="ul-event-info">
                                        <span class="ul-event-info-title">Category</span>
                                        <p class="ul-event-info-descr">{{ $event->category ?? 'Community Outreach' }}</p>
                                    </div>
                                    <a href="{{ route('volunteer.index') }}" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Register as Volunteer</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Fallback Event -->
                        <div class="col wow animate__fadeInUp">
                            <div class="ul-event">
                                <div class="ul-event-img">
                                    <img src="{{ asset('images/healthcare-camp-news.jpg') }}" alt="Health Checkup Camp" style="height: 200px; width: 100%; object-fit: cover;">
                                    <span class="date">15 <span>Sep</span></span>
                                </div>
                                <div class="ul-event-txt">
                                    <h3 class="ul-event-title"><a href="{{ route('news') }}">Free Health Checkup Camp in Bhadohi</a></h3>
                                    <p class="ul-event-descr">Serving over 500 residents with free doctor consultations, diagnostic screenings, and medicines.</p>
                                    <div class="ul-event-info">
                                        <span class="ul-event-info-title">Venue</span>
                                        <p class="ul-event-info-descr">Rural Health Center, Bhadohi, UP</p>
                                    </div>
                                    <a href="{{ route('volunteer.index') }}" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Register as Volunteer</a>
                                </div>
                            </div>
                        </div>
                        <div class="col wow animate__fadeInUp">
                            <div class="ul-event">
                                <div class="ul-event-img">
                                    <img src="{{ asset('images/skill-development-news.jpg') }}" alt="Skill Training Graduation" style="height: 200px; width: 100%; object-fit: cover;">
                                    <span class="date">22 <span>Sep</span></span>
                                </div>
                                <div class="ul-event-txt">
                                    <h3 class="ul-event-title"><a href="{{ route('news') }}">Skill Training Graduation &amp; Digital Literacy</a></h3>
                                    <p class="ul-event-descr">150 rural youths completing commercial stitching and computer literacy programs.</p>
                                    <div class="ul-event-info">
                                        <span class="ul-event-info-title">Venue</span>
                                        <p class="ul-event-info-descr">MSS Skill Center, Jhusi, Prayagraj</p>
                                    </div>
                                    <a href="{{ route('volunteer.index') }}" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> Register as Volunteer</a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Decorative Vectors -->
        <div class="ul-events-vectors">
            <img src="{{ asset('assets/img/events-vector-1.png') }}" alt="Vector" class="vector-1">
            <img src="{{ asset('assets/img/events-vector-2.svg') }}" alt="Vector" class="vector-2">
        </div>
    </section>
    <!-- EVENTS SECTION END -->

    <!-- 7. WHY JOIN US / ACCORDION SECTION -->
    <section class="ul-why-join ul-section-spacing">
        <div class="ul-why-join-wrapper ul-section-spacing">
            <div class="ul-container">
                <div class="row row-cols-md-2 row-cols-1 gy-4 align-items-center">
                    <div class="col">
                        <div class="ul-why-join-img" style="border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                            <img src="{{ !empty($siteSettings['home_why_image']) ? asset($siteSettings['home_why_image']) : (!empty($siteSettings['about_image']) ? asset($siteSettings['about_image']) : asset('images/project2.jpg')) }}" alt="Join as Volunteer" style="width: 100%; height: 420px; object-fit: cover;">
                        </div>
                    </div>

                    <div class="col">
                        <div class="ul-why-join-txt">
                            <span class="ul-section-sub-title">{{ $siteSettings['home_why_subtitle'] ?? 'Join Us' }}</span>
                            <h2 class="ul-section-title">{{ $siteSettings['home_why_title'] ?? 'Why We Need You To Become A Volunteer' }}</h2>
                            <p class="ul-section-descr">{{ $siteSettings['home_why_description'] ?? ('Volunteers are the heart and soul of ' . ($siteSettings['site_name'] ?? 'Matri Seva Samiti') . '. Together, we reach the most remote households to spark lasting smiles.') }}</p>

                            <div class="ul-accordion">
                                <div class="ul-single-accordion-item open">
                                    <div class="ul-single-accordion-item__header">
                                        <div class="left">
                                            <h3 class="ul-single-accordion-item__title">{{ $siteSettings['home_why_acc1_title'] ?? 'Direct Grassroot Fulfillment & Experience' }}</h3>
                                        </div>
                                        <span class="icon"><i class="flaticon-next"></i></span>
                                    </div>
                                    <div class="ul-single-accordion-item__body">
                                        <p>{{ $siteSettings['home_why_acc1_text'] ?? 'Work directly on the field with educators, healthcare specialists, and women mentors. Gain hands-on leadership experience and official volunteering certification.' }}</p>
                                    </div>
                                </div>

                                <div class="ul-single-accordion-item">
                                    <div class="ul-single-accordion-item__header">
                                        <div class="left">
                                            <h3 class="ul-single-accordion-item__title">{{ $siteSettings['home_why_acc2_title'] ?? 'Flexible Virtual & On-Field Roles' }}</h3>
                                        </div>
                                        <span class="icon"><i class="flaticon-next"></i></span>
                                    </div>
                                    <div class="ul-single-accordion-item__body">
                                        <p>{{ $siteSettings['home_why_acc2_text'] ?? 'Contribute on weekends or remotely in content writing, digital awareness, campaign management, and teaching sessions.' }}</p>
                                    </div>
                                </div>

                                <div class="ul-single-accordion-item">
                                    <div class="ul-single-accordion-item__header">
                                        <div class="left">
                                            <h3 class="ul-single-accordion-item__title">{{ $siteSettings['home_why_acc3_title'] ?? 'Be Part of a Transparent National Network' }}</h3>
                                        </div>
                                        <span class="icon"><i class="flaticon-next"></i></span>
                                    </div>
                                    <div class="ul-single-accordion-item__body">
                                        <p>{{ $siteSettings['home_why_acc3_text'] ?? ('Join over ' . ($siteSettings['impact_volunteers'] ?? '450+') . ' passionate changemakers across India working with verifiable accountability, regular audit reports, and heartfelt passion.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- WHY JOIN SECTION END -->

    <!-- 8. TEAM SECTION -->
    <section class="ul-team ul-section-spacing pt-0">
        <div class="ul-container">
            <div class="ul-section-heading justify-content-between">
                <div class="left">
                    <span class="ul-section-sub-title">{{ $siteSettings['home_team_subtitle'] ?? 'Our Team' }}</span>
                    <h2 class="ul-section-title">{{ $siteSettings['home_team_title'] ?? 'Dedicated Social Workers & Leaders' }}</h2>
                </div>
                <div>
                    <a href="{{ route('volunteer.index') }}" class="ul-btn"><i class="flaticon-fast-forward-double-right-arrows-symbol"></i> {{ $siteSettings['home_team_btn_text'] ?? 'Join MSS' }}</a>
                </div>
            </div>

            <div class="row row-cols-md-4 row-cols-sm-3 row-cols-2 row-cols-xxs-1 ul-team-row justify-content-center">
                @forelse($members as $member)
                    <div class="col">
                        <div class="ul-team-member">
                            <div class="ul-team-member-img">
                                <img src="{{ !empty($member->photo) ? asset($member->photo) : asset('images/student1.jpeg') }}" alt="{{ $member->name }}" style="height: 280px; width: 100%; object-fit: cover;">
                                <div class="ul-team-member-socials">
                                    <a href="{{ $member->facebook ?: config('site.social.facebook') }}" target="_blank"><i class="flaticon-facebook"></i></a>
                                    <a href="{{ $member->twitter ?: config('site.social.twitter') }}" target="_blank"><i class="flaticon-twitter"></i></a>
                                    <a href="{{ $member->linkedin ?: config('site.social.linkedin') }}" target="_blank"><i class="flaticon-linkedin-big-logo"></i></a>
                                </div>
                            </div>
                            <div class="ul-team-member-info">
                                <h3 class="ul-team-member-name"><a href="{{ route('about') }}">{{ $member->name }}</a></h3>
                                <p class="ul-team-member-designation">{{ $member->designation }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Fallback default leadership -->
                    <div class="col">
                        <div class="ul-team-member">
                            <div class="ul-team-member-img">
                                <img src="{{ asset('members/dheeraj-raj-pal.jpeg') }}" alt="Dheeraj Raj Pal" style="height: 280px; width: 100%; object-fit: cover;">
                            </div>
                            <div class="ul-team-member-info">
                                <h3 class="ul-team-member-name"><a href="{{ route('about') }}">Dheeraj Raj Pal</a></h3>
                                <p class="ul-team-member-designation">President</p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- TEAM SECTION END -->

    <!-- 9. TESTIMONIAL SECTION -->
    <section class="ul-testimonial ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center">
                <div>
                    <span class="ul-section-sub-title">{{ $siteSettings['home_testi_subtitle'] ?? 'Testimonials' }}</span>
                    <h2 class="ul-section-title">{{ $siteSettings['home_testi_title'] ?? 'What Donors & Beneficiaries Say' }}</h2>
                </div>
            </div>

            <div class="ul-testimonial-slider swiper">
                <div class="swiper-wrapper">
                    @php
                        $displayTestis = isset($testimonials) && $testimonials->isNotEmpty() ? $testimonials->all() : [];
                        $fallbackTestis = [
                            (object)[
                                'name' => 'Kavita Devi',
                                'designation' => 'Beneficiary',
                                'location' => 'Prayagraj Skill Center',
                                'quote' => 'Through the MSS sewing center, I learned tailoring and bought my own machine. Today I earn ₹12,000 monthly and support my children\'s school fees proudly.',
                                'rating' => 5,
                                'photo' => 'images/student2.jpeg',
                            ],
                            (object)[
                                'name' => 'Rajeshwar Sharma',
                                'designation' => 'Donor & CSR Partner',
                                'location' => 'New Delhi',
                                'quote' => 'Matri Seva Samiti provides exceptional ground transparency. Receiving regular student report cards and 80G tax receipts gave us complete trust in their social mission.',
                                'rating' => 5,
                                'photo' => 'assets/img/user-1.png',
                            ],
                            (object)[
                                'name' => 'Pooja Vishwakarma',
                                'designation' => 'Computer Lab Graduate',
                                'location' => 'Bhadohi, UP',
                                'quote' => 'The digital literacy course gave me hands-on computer training and confidence. I recently secured a job at an administrative center in town.',
                                'rating' => 5,
                                'photo' => 'images/student3.jpeg',
                            ],
                        ];
                        if (count($displayTestis) < 3) {
                            $existingNames = array_map(function($t) { return is_object($t) ? $t->name : ''; }, $displayTestis);
                            foreach ($fallbackTestis as $ft) {
                                if (count($displayTestis) >= 3) break;
                                if (!in_array($ft->name, $existingNames)) {
                                    $displayTestis[] = $ft;
                                }
                            }
                        }
                    @endphp

                    @foreach($displayTestis as $testi)
                        <div class="swiper-slide">
                            <div class="ul-review">
                                <div class="ul-review-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= ($testi->rating ?? 5))
                                            <i class="flaticon-star text-warning"></i>
                                        @else
                                            <i class="flaticon-star text-muted opacity-50"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="ul-review-descr">“{{ $testi->quote }}”</p>
                                <div class="ul-review-bottom">
                                    <div class="ul-review-reviewer">
                                        <div class="reviewer-image">
                                            <img src="{{ !empty($testi->photo) ? asset($testi->photo) : asset('images/student1.jpeg') }}" alt="{{ $testi->name }}" style="width:50px; height:50px; border-radius:50%; object-fit:cover;">
                                        </div>
                                        <div>
                                            <h3 class="reviewer-name">{{ $testi->name }}</h3>
                                            <span class="reviewer-role">{{ $testi->designation }}{{ !empty($testi->location) ? ' • ' . $testi->location : '' }}</span>
                                        </div>
                                    </div>
                                    <div class="ul-review-icon"><i class="flaticon-left"></i></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="ul-testimonial-slider-pagination text-center mt-4"></div>
            </div>
        </div>
    </section>
    <!-- TESTIMONIAL SECTION END -->

    <!-- 10. BLOG SECTION -->
    <section class="ul-blogs ul-section-spacing">
        <div class="ul-blogs-container wow animate__fadeInUp">
            <div class="row gy-3">
                <div class="col-sm-5">
                    <div class="ul-section-heading">
                        <div class="left">
                            <span class="ul-section-sub-title">{{ $siteSettings['home_blogs_subtitle'] ?? 'Latest Updates' }}</span>
                            <h2 class="ul-section-title">{{ $siteSettings['home_blogs_title'] ?? 'Read Our Impact Stories' }}</h2>
                            <p class="ul-section-descr">{{ $siteSettings['home_blogs_description'] ?? 'Discover how your contributions bring tangible transformation to underprivileged communities across India.' }}</p>
                            <div class="ul-blogs-slider-nav ul-slider-nav">
                                <button class="prev"><i class="flaticon-back"></i></button>
                                <button class="next"><i class="flaticon-next"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blog Carousel -->
                <div class="col-sm-7">
                    <div class="ul-blogs-slider swiper">
                        <div class="swiper-wrapper">
                            @php
                                $displayBlogs = isset($news) ? $news->where('type', '!=', 'event')->values()->all() : [];
                                if (empty($displayBlogs) && isset($news) && $news->isNotEmpty()) {
                                    $displayBlogs = $news->values()->all();
                                }
                                $fallbackBlogs = [
                                    (object)[
                                        'title' => 'Giving Education: The Greatest Gift For A Child\'s Future',
                                        'category' => 'Education',
                                        'published_date' => '2026-08-24',
                                        'image' => 'assets/img/blog-1.jpg',
                                    ],
                                    (object)[
                                        'title' => 'Women Tailoring Center Empowers Over 120 Village Families',
                                        'category' => 'Skill Training',
                                        'published_date' => '2026-08-18',
                                        'image' => 'images/project2.jpg',
                                    ],
                                    (object)[
                                        'title' => 'Free Health Checkup Camp Concludes With 450+ Beneficiaries',
                                        'category' => 'Healthcare',
                                        'published_date' => '2026-08-10',
                                        'image' => 'images/healthcare-camp-news.jpg',
                                    ],
                                ];
                                if (count($displayBlogs) < 3) {
                                    $existingBlogTitles = array_map(function($b) { return is_object($b) ? $b->title : ''; }, $displayBlogs);
                                    foreach ($fallbackBlogs as $fb) {
                                        if (count($displayBlogs) >= 3) break;
                                        if (!in_array($fb->title, $existingBlogTitles)) {
                                            $displayBlogs[] = $fb;
                                        }
                                    }
                                }
                            @endphp
                            @foreach($displayBlogs as $blog)
                                <div class="swiper-slide">
                                    <div class="ul-blog">
                                        <div class="ul-blog-img">
                                            <img src="{{ !empty($blog->image) ? asset($blog->image) : asset('assets/img/blog-1.jpg') }}" alt="{{ $blog->title }}" style="height: 220px; width: 100%; object-fit: cover;">
                                            @if(!empty($blog->published_date))
                                                <div class="date">
                                                    <span class="number">{{ \Carbon\Carbon::parse($blog->published_date)->format('d') }}</span>
                                                    <span class="txt">{{ \Carbon\Carbon::parse($blog->published_date)->format('M') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ul-blog-txt">
                                            <div class="ul-blog-infos">
                                                <div class="ul-blog-info">
                                                    <span class="icon"><i class="flaticon-account"></i></span>
                                                    <span>MSS Team</span>
                                                </div>
                                                @if(!empty($blog->category))
                                                    <div class="ul-blog-info">
                                                        <span class="icon"><i class="flaticon-price-tag"></i></span>
                                                        <span>{{ $blog->category }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <a href="{{ route('news') }}" class="ul-blog-title">{{ $blog->title }}</a>
                                            <a href="{{ route('news') }}" class="ul-blog-btn">Read More <span class="icon"><i class="flaticon-next"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BLOG SECTION END -->

    <!-- 11. CONTINUOUS GALLERY STRIP -->
    <div class="ul-gallery overflow-hidden ul-section-spacing mx-auto pt-0">
        <div class="ul-gallery-slider swiper">
            <div class="swiper-wrapper">
                @php
                    $rawGallery = isset($gallery) && $gallery->isNotEmpty() ? $gallery : collect([
                        (object)['image' => 'images/student1.jpeg', 'title' => 'Education Initiative'],
                        (object)['image' => 'images/student2.jpeg', 'title' => 'Women Skill Program'],
                        (object)['image' => 'images/student3.jpeg', 'title' => 'Girl Child Sponsorship'],
                        (object)['image' => 'images/project1.jpeg', 'title' => 'Community Relief'],
                        (object)['image' => 'images/project2.jpg', 'title' => 'Free Health Camp'],
                        (object)['image' => 'images/project3.jpg', 'title' => 'Skill Training Center'],
                    ]);
                    
                    // Repeat items to ensure smooth infinite carousel looping across large screens
                    $galleryList = collect();
                    $repeatCount = $rawGallery->count() < 8 ? ceil(10 / max(1, $rawGallery->count())) : 1;
                    for ($r = 0; $r < $repeatCount; $r++) {
                        $galleryList = $galleryList->concat($rawGallery);
                    }
                @endphp
                @foreach($galleryList as $item)
                    <div class="ul-gallery-item swiper-slide">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title ?? 'Gallery Image' }}" loading="lazy">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- GALLERY STRIP END -->
</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.ul-home-hero-slider')) {
        new Swiper('.ul-home-hero-slider', {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.ul-home-hero-pagination',
                clickable: true,
            },
            speed: 800,
        });
    }
});
</script>
@endpush
