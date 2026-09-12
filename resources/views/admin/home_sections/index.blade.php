@extends('admin.layouts.app')

@section('title', 'Home Page Sections & Content Manager')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h4 class="mb-1 fw-bold text-dark"><i class="bi bi-house-gear-fill text-warning me-2"></i> Home Page Content &amp; Sections Manager</h4>
        <p class="text-muted mb-0 small">Customize all headings, text blurbs, feature highlights, and media for each homepage section.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-box-arrow-up-right me-1"></i> View Live Homepage
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form action="{{ route('admin.home-sections.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <!-- Quick Section Navigation -->
        <div class="col-lg-3 mb-4">
            <div class="admin-card sticky-top" style="top: 90px; z-index: 10;">
                <div class="admin-card-header py-3">
                    <h6 class="admin-card-title mb-0 fs-6"><i class="bi bi-list-ul me-2"></i> Home Sections</h6>
                </div>
                <div class="list-group list-group-flush small" id="sectionNav">
                    <a href="#sec-about" class="list-group-item list-group-item-action py-2.5 d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-info-circle text-primary me-2"></i> 2. About Us Section</span>
                    </a>
                    <a href="#sec-causes" class="list-group-item list-group-item-action py-2.5 d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-heart text-danger me-2"></i> 3. Urgent Causes Section</span>
                    </a>
                    <a href="#sec-donate" class="list-group-item list-group-item-action py-2.5 d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-credit-card text-success me-2"></i> 4. Live Donation Strip</span>
                    </a>
                    <a href="#sec-stats" class="list-group-item list-group-item-action py-2.5 d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-speedometer2 text-warning me-2"></i> 5. 4 Circular Stats</span>
                    </a>
                    <a href="#sec-events" class="list-group-item list-group-item-action py-2.5 d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-calendar-event text-info me-2"></i> 6. Upcoming Events</span>
                    </a>
                    <a href="#sec-why" class="list-group-item list-group-item-action py-2.5 d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-question-circle text-primary me-2"></i> 7. Why Join Us Accordion</span>
                    </a>
                    <a href="#sec-team" class="list-group-item list-group-item-action py-2.5 d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-people text-secondary me-2"></i> 8. Our Dedicated Team</span>
                    </a>
                    <a href="#sec-testi" class="list-group-item list-group-item-action py-2.5 d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-chat-quote text-warning me-2"></i> 9. Testimonials Section</span>
                    </a>
                    <a href="#sec-blogs" class="list-group-item list-group-item-action py-2.5 d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-newspaper text-danger me-2"></i> 10. Latest Impact Stories</span>
                    </a>
                    <a href="#sec-gallery" class="list-group-item list-group-item-action py-2.5 d-flex justify-content-between align-items-center">
                        <span><i class="bi bi-images text-dark me-2"></i> 11. Gallery Strip</span>
                    </a>
                </div>
                <div class="p-3 bg-light border-top text-center">
                    <button type="submit" class="btn btn-primary w-100 fw-semibold">
                        <i class="bi bi-save me-1"></i> Save All Changes
                    </button>
                </div>
            </div>
        </div>

        <!-- Section Edit Cards -->
        <div class="col-lg-9">

            <!-- 1. HERO BANNERS SHORTCUT -->
            <div class="admin-card mb-4" id="sec-hero">
                <div class="admin-card-header bg-light d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary">Section 1</span>
                        <h5 class="admin-card-title mb-0">Hero Banner Slides &amp; Top Showcase</h5>
                    </div>
                    <a href="{{ route('admin.banners.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-sliders me-1"></i> Manage Hero Slides &amp; Banners
                    </a>
                </div>
                <div class="admin-card-body">
                    <p class="text-muted small mb-3">Hero banners are managed as slide records. If only 1 banner is active, it displays as a fixed hero; if multiple exist, it slides automatically.</p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Floating Impact Stat (e.g. 15K+)</label>
                            <input type="text" name="impact_beneficiaries" class="form-control" value="{{ old('impact_beneficiaries', $settings['impact_beneficiaries'] ?? '15K+') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Impact Stat Label</label>
                            <input type="text" name="home_hero_stat_label" class="form-control" value="{{ old('home_hero_stat_label', $settings['home_hero_stat_label'] ?? 'Beneficiaries Reached') }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. ABOUT US SECTION -->
            <div class="admin-card mb-4" id="sec-about">
                <div class="admin-card-header bg-light">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary">Section 2</span>
                        <h5 class="admin-card-title mb-0">About Us / Story Section</h5>
                    </div>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Subtitle / Tagline</label>
                            <input type="text" name="home_about_subtitle" class="form-control" value="{{ old('home_about_subtitle', $settings['home_about_subtitle'] ?? 'About Us') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Main Title</label>
                            <input type="text" name="home_about_title" class="form-control" value="{{ old('home_about_title', $settings['home_about_title'] ?? 'Serving Humanity with Soft Hearts & Strong Resolve') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">About Short Description / Intro</label>
                            <textarea name="home_about_description" rows="3" class="form-control">{{ old('home_about_description', $settings['home_about_description'] ?? 'Established in April 2019, Matri Seva Samiti is a certified 80G non-profit organization dedicated to grassroots transformation across education, healthcare, women empowerment, and skill development.') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Highlight Box Title</label>
                            <input type="text" name="home_about_block_title" class="form-control" value="{{ old('home_about_block_title', $settings['home_about_block_title'] ?? 'Key Accreditations & Impact') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Highlight Point 1</label>
                            <input type="text" name="home_about_point_1" class="form-control" value="{{ old('home_about_point_1', $settings['home_about_point_1'] ?? 'Registered under 80G, 12A, CSR-1 & NITI Aayog NGO Darpan') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Highlight Point 2</label>
                            <input type="text" name="home_about_point_2" class="form-control" value="{{ old('home_about_point_2', $settings['home_about_point_2'] ?? '50+ Projects Completed & 15,000+ Rural Lives Empowered') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Read More Button Text</label>
                            <input type="text" name="home_about_btn_text" class="form-control" value="{{ old('home_about_btn_text', $settings['home_about_btn_text'] ?? 'Read More') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Inquiry Phone Text Label</label>
                            <input type="text" name="home_about_call_title" class="form-control" value="{{ old('home_about_call_title', $settings['home_about_call_title'] ?? 'Call For Inquiries') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Inquiry Phone Number</label>
                            <input type="text" name="home_about_phone" class="form-control" value="{{ old('home_about_phone', $settings['home_about_phone'] ?? $settings['contact_phone_primary'] ?? '+91 9415451910') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">About Main Image</label>
                            <input type="file" name="home_about_image" class="form-control" accept="image/*" onchange="previewImage(this, 'homeAboutPreview')">
                            <div class="mt-2 img-preview-box" style="max-width: 220px; height: 100px;">
                                <img id="homeAboutPreview" src="{{ asset($settings['home_about_image'] ?? $settings['about_image'] ?? 'images/about-us.jpg') }}" alt="About Image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">About Small Thumbnail Image</label>
                            <input type="file" name="home_about_thumb_image" class="form-control" accept="image/*" onchange="previewImage(this, 'homeAboutThumbPreview')">
                            <div class="mt-2 img-preview-box" style="max-width: 150px; height: 100px;">
                                <img id="homeAboutThumbPreview" src="{{ asset($settings['home_about_thumb_image'] ?? 'images/student2.jpeg') }}" alt="Thumbnail" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. URGENT CAUSES SECTION -->
            <div class="admin-card mb-4" id="sec-causes">
                <div class="admin-card-header bg-light d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary">Section 3</span>
                        <h5 class="admin-card-title mb-0">Urgent Causes Slider Section</h5>
                    </div>
                    <a href="{{ route('admin.causes.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-cash-coin me-1"></i> Manage Cause Cards
                    </a>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="home_causes_subtitle" class="form-control" value="{{ old('home_causes_subtitle', $settings['home_causes_subtitle'] ?? 'Help & Donate') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Main Title</label>
                            <input type="text" name="home_causes_title" class="form-control" value="{{ old('home_causes_title', $settings['home_causes_title'] ?? 'Inspiring and Helping for a Better Lifestyle') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Active Donors Number (e.g. 15K+)</label>
                            <input type="text" name="home_causes_stat_number" class="form-control" value="{{ old('home_causes_stat_number', $settings['home_causes_stat_number'] ?? '15K+') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Active Donors Label</label>
                            <input type="text" name="home_causes_stat_label" class="form-control" value="{{ old('home_causes_stat_label', $settings['home_causes_stat_label'] ?? 'Active Donors') }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. LIVE DONATE STRIP -->
            <div class="admin-card mb-4" id="sec-donate">
                <div class="admin-card-header bg-light">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary">Section 4</span>
                        <h5 class="admin-card-title mb-0">Live Donation CTA Strip</h5>
                    </div>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Form Heading</label>
                            <input type="text" name="home_donate_form_title" class="form-control" value="{{ old('home_donate_form_title', $settings['home_donate_form_title'] ?? 'Support Our Cause - Donate Now') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tax Exemption Subtitle Badge</label>
                            <input type="text" name="home_donate_subtitle" class="form-control" value="{{ old('home_donate_subtitle', $settings['home_donate_subtitle'] ?? '100% Tax Deductible (80G)') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">CTA Banner Main Title</label>
                            <input type="text" name="home_donate_title" class="form-control" value="{{ old('home_donate_title', $settings['home_donate_title'] ?? 'Support Rural India With 80G Tax Exemption') }}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">CTA Description &amp; Bank / UPI Details</label>
                            <textarea name="home_donate_description" rows="2" class="form-control">{{ old('home_donate_description', $settings['home_donate_description'] ?? 'Donations made to Matri Seva Samiti are eligible for tax deduction under Section 80G. UPI ID: 9415451910@ybl / matrisevasamiti1910@sbi') }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Progress Bar Value (0 - 100)</label>
                            <input type="number" name="home_donate_progress_percent" class="form-control" min="0" max="100" value="{{ old('home_donate_progress_percent', $settings['home_donate_progress_percent'] ?? '85') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Progress Label Left</label>
                            <input type="text" name="home_donate_progress_label_1" class="form-control" value="{{ old('home_donate_progress_label_1', $settings['home_donate_progress_label_1'] ?? 'Beneficiaries Reached : 15,000+') }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Progress Label Right</label>
                            <input type="text" name="home_donate_progress_label_2" class="form-control" value="{{ old('home_donate_progress_label_2', $settings['home_donate_progress_label_2'] ?? 'Projects : 50+ Completed') }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5. 4 CIRCULAR STATS COUNTER -->
            <div class="admin-card mb-4" id="sec-stats">
                <div class="admin-card-header bg-light">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary">Section 5</span>
                        <h5 class="admin-card-title mb-0">Circular Stats Counter (4 Circles)</h5>
                    </div>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <!-- Stat 1 -->
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 bg-light rounded-3 border">
                                <h6 class="fw-bold mb-2 text-primary">Circle Stat 1</h6>
                                <div class="mb-2">
                                    <label class="form-label small">Icon Class</label>
                                    <input type="text" name="stat_1_icon" class="form-control form-control-sm" value="{{ old('stat_1_icon', $settings['stat_1_icon'] ?? 'flaticon-costumer') }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small">Number</label>
                                    <input type="text" name="stat_1_number" class="form-control form-control-sm" value="{{ old('stat_1_number', $settings['stat_1_number'] ?? '12,500+') }}">
                                </div>
                                <div>
                                    <label class="form-label small">Title Label</label>
                                    <input type="text" name="stat_1_title" class="form-control form-control-sm" value="{{ old('stat_1_title', $settings['stat_1_title'] ?? 'Children Supported') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Stat 2 -->
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 bg-light rounded-3 border">
                                <h6 class="fw-bold mb-2 text-primary">Circle Stat 2</h6>
                                <div class="mb-2">
                                    <label class="form-label small">Icon Class</label>
                                    <input type="text" name="stat_2_icon" class="form-control form-control-sm" value="{{ old('stat_2_icon', $settings['stat_2_icon'] ?? 'flaticon-team') }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small">Number</label>
                                    <input type="text" name="stat_2_number" class="form-control form-control-sm" value="{{ old('stat_2_number', $settings['stat_2_number'] ?? '450+') }}">
                                </div>
                                <div>
                                    <label class="form-label small">Title Label</label>
                                    <input type="text" name="stat_2_title" class="form-control form-control-sm" value="{{ old('stat_2_title', $settings['stat_2_title'] ?? 'Active Volunteers') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Stat 3 -->
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 bg-light rounded-3 border">
                                <h6 class="fw-bold mb-2 text-primary">Circle Stat 3</h6>
                                <div class="mb-2">
                                    <label class="form-label small">Icon Class</label>
                                    <input type="text" name="stat_3_icon" class="form-control form-control-sm" value="{{ old('stat_3_icon', $settings['stat_3_icon'] ?? 'flaticon-package') }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small">Number</label>
                                    <input type="text" name="stat_3_number" class="form-control form-control-sm" value="{{ old('stat_3_number', $settings['stat_3_number'] ?? '35+') }}">
                                </div>
                                <div>
                                    <label class="form-label small">Title Label</label>
                                    <input type="text" name="stat_3_title" class="form-control form-control-sm" value="{{ old('stat_3_title', $settings['stat_3_title'] ?? 'Villages Transformed') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Stat 4 -->
                        <div class="col-md-6 col-lg-3">
                            <div class="p-3 bg-light rounded-3 border">
                                <h6 class="fw-bold mb-2 text-primary">Circle Stat 4</h6>
                                <div class="mb-2">
                                    <label class="form-label small">Icon Class</label>
                                    <input type="text" name="stat_4_icon" class="form-control form-control-sm" value="{{ old('stat_4_icon', $settings['stat_4_icon'] ?? 'flaticon-relationship') }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small">Number</label>
                                    <input type="text" name="stat_4_number" class="form-control form-control-sm" value="{{ old('stat_4_number', $settings['stat_4_number'] ?? '15,000+') }}">
                                </div>
                                <div>
                                    <label class="form-label small">Title Label</label>
                                    <input type="text" name="stat_4_title" class="form-control form-control-sm" value="{{ old('stat_4_title', $settings['stat_4_title'] ?? 'Supporters Worldwide') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6. UPCOMING EVENTS -->
            <div class="admin-card mb-4" id="sec-events">
                <div class="admin-card-header bg-light d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary">Section 6</span>
                        <h5 class="admin-card-title mb-0">Upcoming Events Section</h5>
                    </div>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-calendar2-event me-1"></i> Manage Events &amp; News
                    </a>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="home_events_subtitle" class="form-control" value="{{ old('home_events_subtitle', $settings['home_events_subtitle'] ?? 'Upcoming Events') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Main Title</label>
                            <input type="text" name="home_events_title" class="form-control" value="{{ old('home_events_title', $settings['home_events_title'] ?? 'Join Our Community Outreach Schedule') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Action Button Text</label>
                            <input type="text" name="home_events_btn_text" class="form-control" value="{{ old('home_events_btn_text', $settings['home_events_btn_text'] ?? 'Join An Event') }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 7. WHY JOIN US ACCORDION -->
            <div class="admin-card mb-4" id="sec-why">
                <div class="admin-card-header bg-light">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary">Section 7</span>
                        <h5 class="admin-card-title mb-0">Why Join Us / Volunteer Accordion</h5>
                    </div>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="home_why_subtitle" class="form-control" value="{{ old('home_why_subtitle', $settings['home_why_subtitle'] ?? 'Join Us') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Main Title</label>
                            <input type="text" name="home_why_title" class="form-control" value="{{ old('home_why_title', $settings['home_why_title'] ?? 'Why We Need You To Become A Volunteer') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Intro Paragraph</label>
                            <textarea name="home_why_description" rows="2" class="form-control">{{ old('home_why_description', $settings['home_why_description'] ?? 'Volunteers are the heart and soul of Matri Seva Samiti. Together, we reach the most remote households to spark lasting smiles.') }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Volunteer Section Image</label>
                            <input type="file" name="home_why_image" class="form-control" accept="image/*" onchange="previewImage(this, 'homeWhyPreview')">
                            <div class="mt-2 img-preview-box" style="max-width: 220px; height: 110px;">
                                <img id="homeWhyPreview" src="{{ asset($settings['home_why_image'] ?? 'images/project1.jpeg') }}" alt="Why Join Image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                            </div>
                        </div>

                        <!-- Accordion Items -->
                        <div class="col-12"><hr class="my-2"><h6 class="fw-bold text-secondary">Accordion Tabs</h6></div>

                        <div class="col-md-6">
                            <label class="form-label">Accordion 1 Title</label>
                            <input type="text" name="home_why_acc1_title" class="form-control" value="{{ old('home_why_acc1_title', $settings['home_why_acc1_title'] ?? 'Direct Grassroot Fulfillment & Experience') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Accordion 1 Content</label>
                            <textarea name="home_why_acc1_text" rows="2" class="form-control">{{ old('home_why_acc1_text', $settings['home_why_acc1_text'] ?? 'Work directly on the field with educators, healthcare specialists, and women mentors. Gain hands-on leadership experience and official volunteering certification.') }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Accordion 2 Title</label>
                            <input type="text" name="home_why_acc2_title" class="form-control" value="{{ old('home_why_acc2_title', $settings['home_why_acc2_title'] ?? 'Flexible Virtual & On-Field Roles') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Accordion 2 Content</label>
                            <textarea name="home_why_acc2_text" rows="2" class="form-control">{{ old('home_why_acc2_text', $settings['home_why_acc2_text'] ?? 'Contribute on weekends or remotely in content writing, digital awareness, campaign management, and teaching sessions.') }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Accordion 3 Title</label>
                            <input type="text" name="home_why_acc3_title" class="form-control" value="{{ old('home_why_acc3_title', $settings['home_why_acc3_title'] ?? 'Be Part of a Transparent National Network') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Accordion 3 Content</label>
                            <textarea name="home_why_acc3_text" rows="2" class="form-control">{{ old('home_why_acc3_text', $settings['home_why_acc3_text'] ?? 'Join over 450+ passionate changemakers across India working with verifiable accountability, regular audit reports, and heartfelt passion.') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 8. TEAM SECTION -->
            <div class="admin-card mb-4" id="sec-team">
                <div class="admin-card-header bg-light d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary">Section 8</span>
                        <h5 class="admin-card-title mb-0">Our Dedicated Team Section</h5>
                    </div>
                    <a href="{{ route('admin.members.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-people me-1"></i> Manage Team Members
                    </a>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="home_team_subtitle" class="form-control" value="{{ old('home_team_subtitle', $settings['home_team_subtitle'] ?? 'Our Team') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Main Title</label>
                            <input type="text" name="home_team_title" class="form-control" value="{{ old('home_team_title', $settings['home_team_title'] ?? 'Dedicated Social Workers & Leaders') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="home_team_btn_text" class="form-control" value="{{ old('home_team_btn_text', $settings['home_team_btn_text'] ?? 'Join MSS') }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 9. TESTIMONIALS SECTION -->
            <div class="admin-card mb-4" id="sec-testi">
                <div class="admin-card-header bg-light d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary">Section 9</span>
                        <h5 class="admin-card-title mb-0">Testimonials Slider Section</h5>
                    </div>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-chat-quote me-1"></i> Manage Testimonials
                    </a>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="home_testi_subtitle" class="form-control" value="{{ old('home_testi_subtitle', $settings['home_testi_subtitle'] ?? 'Testimonials') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Main Title</label>
                            <input type="text" name="home_testi_title" class="form-control" value="{{ old('home_testi_title', $settings['home_testi_title'] ?? 'What Donors & Beneficiaries Say') }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 10. IMPACT STORIES / BLOGS -->
            <div class="admin-card mb-4" id="sec-blogs">
                <div class="admin-card-header bg-light d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary">Section 10</span>
                        <h5 class="admin-card-title mb-0">Latest Impact Stories &amp; Blogs</h5>
                    </div>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-newspaper me-1"></i> Manage Articles &amp; News
                    </a>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="home_blogs_subtitle" class="form-control" value="{{ old('home_blogs_subtitle', $settings['home_blogs_subtitle'] ?? 'Latest Updates') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Main Title</label>
                            <input type="text" name="home_blogs_title" class="form-control" value="{{ old('home_blogs_title', $settings['home_blogs_title'] ?? 'Read Our Impact Stories') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Section Short Blurb</label>
                            <textarea name="home_blogs_description" rows="2" class="form-control">{{ old('home_blogs_description', $settings['home_blogs_description'] ?? 'Discover how your contributions bring tangible transformation to underprivileged communities across India.') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 11. GALLERY SHORTCUT -->
            <div class="admin-card mb-4" id="sec-gallery">
                <div class="admin-card-header bg-light d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary">Section 11</span>
                        <h5 class="admin-card-title mb-0">Continuous Photo Gallery Strip</h5>
                    </div>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-images me-1"></i> Manage Gallery Photos
                    </a>
                </div>
                <div class="admin-card-body">
                    <p class="text-muted small mb-0">This section automatically rotates photos uploaded in the Photo Gallery module with interactive lightbox support.</p>
                </div>
            </div>

            <!-- Save Bar at Bottom -->
            <div class="admin-card p-3 bg-white text-end">
                <button type="submit" class="btn btn-primary px-4 fw-semibold">
                    <i class="bi bi-check2-circle me-1"></i> Save All Home Page Content
                </button>
            </div>

        </div>
    </div>
</form>
@endsection
