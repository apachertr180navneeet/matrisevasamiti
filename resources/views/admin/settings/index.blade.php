@extends('admin.layouts.app')

@section('title', 'Site Settings')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Global Site Settings</h4>
            <p class="text-muted small mb-0">Configure website branding, contact information, social links, legal registration, and bank details.</p>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- SETTINGS TABS -->
        <div class="admin-card">
            <div class="admin-card-header p-0">
                <ul class="nav nav-tabs border-bottom-0" id="settingsTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active py-3 px-4 fw-semibold" data-bs-toggle="tab" data-bs-target="#tab-general" type="button">
                            <i class="bi bi-globe me-2"></i> General &amp; Branding
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link py-3 px-4 fw-semibold" data-bs-toggle="tab" data-bs-target="#tab-contact" type="button">
                            <i class="bi bi-telephone me-2"></i> Contact Info
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link py-3 px-4 fw-semibold" data-bs-toggle="tab" data-bs-target="#tab-social" type="button">
                            <i class="bi bi-share me-2"></i> Social Links
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link py-3 px-4 fw-semibold" data-bs-toggle="tab" data-bs-target="#tab-legal" type="button">
                            <i class="bi bi-shield-check me-2"></i> NGO &amp; Legal
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link py-3 px-4 fw-semibold" data-bs-toggle="tab" data-bs-target="#tab-bank" type="button">
                            <i class="bi bi-bank me-2"></i> Bank Details
                        </button>
                    </li>
                </ul>
            </div>

            <div class="admin-card-body">
                <div class="tab-content" id="settingsTabContent">
                    
                    <!-- 1. GENERAL & BRANDING -->
                    <div class="tab-pane fade show active" id="tab-general">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Organization / Site Name</label>
                                <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] ?? 'Matri Seva Samiti' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Hindi Tagline / Slogan</label>
                                <input type="text" name="tagline" class="form-control" value="{{ $settings['tagline'] ?? 'मिलकर करें प्रयास, खुशहाल हो समाज' }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Established Year</label>
                                <input type="text" name="org_established" class="form-control" value="{{ $settings['org_established'] ?? '2019' }}">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Site Meta Description</label>
                                <textarea name="site_description" class="form-control" rows="2">{{ $settings['site_description'] ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="form-label">Organization Logo</label>
                                <input type="file" name="site_logo" class="form-control" onchange="previewImage(this, 'logoPreview')">
                                <div class="mt-2 img-preview-box">
                                    <img id="logoPreview" src="{{ asset($settings['site_logo'] ?? 'logo/Logo.png') }}" alt="Logo">
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="form-label">Favicon Icon</label>
                                <input type="file" name="site_favicon" class="form-control" onchange="previewImage(this, 'favPreview')">
                                <div class="mt-2 img-preview-box" style="width: 70px; height: 70px;">
                                    <img id="favPreview" src="{{ asset($settings['site_favicon'] ?? 'logo/Logo.png') }}" alt="Favicon">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. CONTACT INFO -->
                    <div class="tab-pane fade" id="tab-contact">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Primary Phone Number</label>
                                <input type="text" name="contact_phone_primary" class="form-control" value="{{ $settings['contact_phone_primary'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Secondary Phone / WhatsApp</label>
                                <input type="text" name="contact_phone_secondary" class="form-control" value="{{ $settings['contact_phone_secondary'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Official Email</label>
                                <input type="email" name="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Working Hours</label>
                                <input type="text" name="working_hours" class="form-control" value="{{ $settings['working_hours'] ?? 'Mon - Sat: 9:00 AM - 6:00 PM' }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Registered Office Address</label>
                                <textarea name="contact_address" class="form-control" rows="3">{{ $settings['contact_address'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 3. SOCIAL LINKS -->
                    <div class="tab-pane fade" id="tab-social">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-facebook text-primary me-1"></i> Facebook Page URL</label>
                                <input type="url" name="facebook_url" class="form-control" value="{{ $settings['facebook_url'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-twitter text-info me-1"></i> Twitter / X URL</label>
                                <input type="url" name="twitter_url" class="form-control" value="{{ $settings['twitter_url'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-instagram text-danger me-1"></i> Instagram URL</label>
                                <input type="url" name="instagram_url" class="form-control" value="{{ $settings['instagram_url'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-linkedin text-primary me-1"></i> LinkedIn Page URL</label>
                                <input type="url" name="linkedin_url" class="form-control" value="{{ $settings['linkedin_url'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-youtube text-danger me-1"></i> YouTube Channel URL</label>
                                <input type="url" name="youtube_url" class="form-control" value="{{ $settings['youtube_url'] ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <!-- 4. LEGAL & NGO NUMBERS -->
                    <div class="tab-pane fade" id="tab-legal">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">NITI Aayog NGO Darpan Unique ID</label>
                                <input type="text" name="ngo_darpan_id" class="form-control" value="{{ $settings['ngo_darpan_id'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">80G Tax Exemption Certificate No.</label>
                                <input type="text" name="tax_exemption_80g" class="form-control" value="{{ $settings['tax_exemption_80g'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">12A Income Tax Registration No.</label>
                                <input type="text" name="tax_exemption_12a" class="form-control" value="{{ $settings['tax_exemption_12a'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">MCA CSR-1 Registration No.</label>
                                <input type="text" name="csr_registration_no" class="form-control" value="{{ $settings['csr_registration_no'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Organization Permanent Account Number (PAN)</label>
                                <input type="text" name="pan_number" class="form-control" value="{{ $settings['pan_number'] ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <!-- 5. BANK ACCOUNT DETAILS -->
                    <div class="tab-pane fade" id="tab-bank">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Bank Name</label>
                                <input type="text" name="bank_name" class="form-control" value="{{ $settings['bank_name'] ?? 'State Bank of India' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Account Holder Name</label>
                                <input type="text" name="bank_account_name" class="form-control" value="{{ $settings['bank_account_name'] ?? 'MATRI SEVA SAMITI' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Account Number</label>
                                <input type="text" name="bank_account_no" class="form-control" value="{{ $settings['bank_account_no'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">IFSC Code</label>
                                <input type="text" name="bank_ifsc_code" class="form-control" value="{{ $settings['bank_ifsc_code'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Bank Branch</label>
                                <input type="text" name="bank_branch" class="form-control" value="{{ $settings['bank_branch'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">UPI ID / VPA</label>
                                <input type="text" name="upi_id" class="form-control" value="{{ $settings['upi_id'] ?? '' }}">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end">
                    <button type="submit" class="btn-admin-primary px-4 py-2">
                        <i class="bi bi-save2 me-1"></i> Save All Settings
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
