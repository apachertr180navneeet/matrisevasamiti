@extends('layouts.app')

@section('content')
@php
$defaultCertificates = [
    [
        "title" => "GST Certificate",
        "category" => "Registration",
        "date" => "22 July 2022",
        "file" => "assets/certificates/AA090722075773U_RC22072022.pdf",
        "desc" => "Official GST registration certificate from regulatory tax authorities."
    ],
    [
        "title" => "CSR-1 Approval Letter",
        "category" => "Approval",
        "date" => "08 August 2023",
        "file" => "assets/certificates/Approval Letter for form CSR1 - 2023-08-08T153427.735.PDF",
        "desc" => "Corporate Social Responsibility (CSR) approval documentation from MCA Govt. of India."
    ],
    [
        "title" => "Organization Charter & Constitution",
        "category" => "Registration",
        "date" => "Foundation Document",
        "file" => "assets/certificates/Matri Seva Samiti.pdf",
        "desc" => "Founding charter and organizational constitution under Societies Registration Act 1860."
    ],
    [
        "title" => "NGO Darpan Registration",
        "category" => "Registration",
        "date" => "NITI Aayog Portal",
        "file" => "assets/certificates/NGO Darpan.pdf",
        "desc" => "Accreditation on Government of India NGO Darpan (NITI Aayog) portal."
    ],
    [
        "title" => "Udyam MSME Registration",
        "category" => "Registration",
        "date" => "MSME Registration",
        "file" => "assets/certificates/Udyam Registration Certificate.pdf",
        "desc" => "Micro, Small & Medium Enterprises registration certificate."
    ],
    [
        "title" => "PAN Card",
        "category" => "Tax Document",
        "date" => "Tax ID Verification",
        "file" => "assets/certificates/pancard.jpeg",
        "desc" => "Permanent Account Number certificate for Matri Seva Samiti."
    ]
];
@endphp

<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Certificates &amp; Statutory Registrations</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Certificates</li>
            </ul>
        </div>
    </section>

    <!-- CERTIFICATES SECTION -->
    <section class="ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center">
                <div>
                    <span class="ul-section-sub-title">"मिलकर करें प्रयास, खुशहाल हो समाज"</span>
                    <h2 class="ul-section-title">Official Government Approvals &amp; Documents</h2>
                    <p class="ul-section-descr">Matri Seva Samiti maintains 100% legal compliance, regular audits, and transparency with all regulatory authorities.</p>
                </div>
            </div>

            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4">
                @if(isset($certificates) && $certificates->count() > 0)
                    @foreach ($certificates as $cert)
                    <div class="col">
                        <div class="card p-4 border-0 shadow-sm rounded-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-warning text-dark">{{ $cert->type }}</span>
                                    <small class="text-muted"><i class="flaticon-calendar me-1"></i> {{ $cert->year ?? 'Active' }}</small>
                                </div>
                                <h4 class="h5 mb-2 text-dark">{{ $cert->title }}</h4>
                                <p class="text-muted small mb-3">{{ $cert->description }}</p>
                            </div>
                            <div class="pt-3 border-top d-flex gap-2">
                                <a href="{{ asset($cert->file_path) }}" target="_blank" class="btn btn-outline-danger btn-sm rounded-pill flex-grow-1">
                                    <i class="flaticon-search me-1"></i> View
                                </a>
                                <a href="{{ asset($cert->file_path) }}" download class="btn btn-secondary btn-sm rounded-pill flex-grow-1">
                                    <i class="flaticon-package me-1"></i> Download
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    @foreach ($defaultCertificates as $cert)
                    <div class="col">
                        <div class="card p-4 border-0 shadow-sm rounded-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-warning text-dark">{{ $cert['category'] }}</span>
                                    <small class="text-muted"><i class="flaticon-calendar me-1"></i> {{ $cert['date'] }}</small>
                                </div>
                                <h4 class="h5 mb-2 text-dark">{{ $cert['title'] }}</h4>
                                <p class="text-muted small mb-3">{{ $cert['desc'] }}</p>
                            </div>
                            <div class="pt-3 border-top d-flex gap-2">
                                <a href="{{ asset($cert['file']) }}" target="_blank" class="btn btn-outline-danger btn-sm rounded-pill flex-grow-1">
                                    <i class="flaticon-search me-1"></i> View
                                </a>
                                <a href="{{ asset($cert['file']) }}" download class="btn btn-secondary btn-sm rounded-pill flex-grow-1">
                                    <i class="flaticon-package me-1"></i> Download
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
</main>
@endsection
