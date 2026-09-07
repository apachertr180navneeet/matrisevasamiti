@extends('layouts.app')

@section('content')
@php
$galleryImages = [
    ["src" => "images/gallery/banner.jpeg", "title" => "Community Outreach Banner", "category" => "Events"],
    ["src" => "images/gallery/image.png", "title" => "Education & Child Development", "category" => "Education"],
    ["src" => "images/gallery/image copy.png", "title" => "Women Skill Workshop", "category" => "Women"],
    ["src" => "images/gallery/image copy 2.png", "title" => "Health & Eye Screening", "category" => "Health"],
    ["src" => "images/gallery/image copy 3.png", "title" => "Ration Distribution Drive", "category" => "Relief"],
    ["src" => "images/gallery/image copy 4.png", "title" => "Digital Classroom Training", "category" => "Education"],
    ["src" => "images/gallery/image copy 5.png", "title" => "Tree Plantation Campaign", "category" => "Environment"],
    ["src" => "images/gallery/image copy 6.png", "title" => "Volunteers Field Assembly", "category" => "Events"],
    ["src" => "images/gallery/WhatsApp Image 2025-07-02 at 5.52.20 PM.jpeg", "title" => "Community Water Conservation", "category" => "Environment"],
    ["src" => "images/gallery/WhatsApp Image 2025-07-02 at 5.52.22 PM.jpeg", "title" => "Village Health Checkup", "category" => "Health"],
    ["src" => "images/gallery/WhatsApp Image 2025-07-02 at 5.52.23 PM.jpeg", "title" => "Women Tailoring Training", "category" => "Women"],
    ["src" => "images/gallery/WhatsApp Image 2025-07-02 at 5.52.24 PM.jpeg", "title" => "Student Book Distribution", "category" => "Education"],
    ["src" => "images/gallery/WhatsApp Image 2025-07-02 at 5.52.30 PM.jpeg", "title" => "Nutrition Kits for Children", "category" => "Relief"],
    ["src" => "images/gallery/WhatsApp Image 2025-07-02 at 6.29.23 PM.jpeg", "title" => "Handicraft Exhibition Fair", "category" => "Women"],
    ["src" => "images/gallery/WhatsApp Image 2025-07-02 at 6.29.24 PM.jpeg", "title" => "Rural Youth Computer Training", "category" => "Education"],
    ["src" => "images/gallery/WhatsApp Image 2025-07-02 at 6.29.25 PM.jpeg", "title" => "Medical Aid Distribution", "category" => "Health"],
    ["src" => "images/gallery/WhatsApp Image 2025-07-02 at 6.29.26 PM.jpeg", "title" => "Self-Help Group Meeting", "category" => "Women"],
    ["src" => "images/gallery/WhatsApp Image 2025-07-02 at 6.29.27 PM.jpeg", "title" => "Field Inspection & Outreach", "category" => "Events"],
    ["src" => "images/gallery/WhatsApp Image 2025-07-02 at 6.29.28 PM.jpeg", "title" => "Grassroot Awareness Rally", "category" => "Events"],
    ["src" => "images/gallery/WhatsApp Image 2026-05-30 at 12.16.05 PM.jpeg", "title" => "Children Learning Circle", "category" => "Education"],
    ["src" => "images/gallery/WhatsApp Image 2026-05-30 at 12.16.06 PM.jpeg", "title" => "Emergency Relief Aid", "category" => "Relief"],
    ["src" => "images/gallery/WhatsApp Image 2026-05-30 at 12.16.07 PM.jpeg", "title" => "Clean Green India Campaign", "category" => "Environment"]
];
@endphp

<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Moments of Change - Photo Gallery</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Gallery</li>
            </ul>
        </div>
    </section>

    <!-- GALLERY GRID SECTION -->
    <section class="ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center">
                <div>
                    <span class="ul-section-sub-title">"मिलकर करें प्रयास, खुशहाल हो समाज"</span>
                    <h2 class="ul-section-title">Capturing Grassroots Transformation</h2>
                    <p class="ul-section-descr">Glimpses of skill development workshops, healthcare camps, relief drives, and child education programs across rural Uttar Pradesh.</p>
                </div>
            </div>

            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4">
                @if(isset($gallery) && $gallery->count() > 0)
                    @foreach ($gallery as $item)
                    <div class="col">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative group h-100">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="img-fluid w-100" style="height: 280px; object-fit: cover;">
                            <div class="p-3 bg-white d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title h6 mb-1 text-dark">{{ $item->title }}</h5>
                                    <span class="badge bg-light text-muted border">{{ $item->category }}</span>
                                </div>
                                <a href="{{ asset($item->image) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center;"><i class="flaticon-up-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    @foreach ($galleryImages as $item)
                    <div class="col">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative group h-100">
                            <img src="{{ asset($item['src']) }}" alt="{{ $item['title'] }}" class="img-fluid w-100" style="height: 280px; object-fit: cover;">
                            <div class="p-3 bg-white d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title h6 mb-1 text-dark">{{ $item['title'] }}</h5>
                                    <span class="badge bg-light text-muted border">{{ $item['category'] }}</span>
                                </div>
                                <a href="{{ asset($item['src']) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center;"><i class="flaticon-up-right-arrow"></i></a>
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
