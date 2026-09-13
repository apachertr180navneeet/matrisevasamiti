@extends('layouts.app')

@section('content')
<main>
    <!-- BREADCRUMBS SECTION -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Our Programs &amp; Key Initiatives</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Programs</li>
            </ul>
        </div>
    </section>

    <!-- PROGRAMS LISTING SECTION -->
    <section class="ul-services ul-section-spacing" style="background: #f8fafc;">
        <div class="ul-container">
            <div class="ul-section-heading text-center mb-5">
                <div>
                    <span class="ul-section-sub-title">"मिलकर करें प्रयास, खुशहाल हो समाज"</span>
                    <h2 class="ul-section-title">Core Social Development Initiatives</h2>
                    <p class="ul-section-descr">We run diverse grassroots programs focusing on holistic community development across multiple key sectors across India.</p>
                </div>
            </div>

            <div class="row gy-4">
                @forelse($programs as $prog)
                    <div class="col-12">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white p-0">
                            <div class="row g-0 align-items-stretch">
                                <div class="col-lg-4 col-md-5">
                                    <div class="h-100 position-relative" style="min-height: 280px;">
                                        <img src="{{ asset($prog->image ?? 'images/Educationimage.png') }}" alt="{{ $prog->title }}" class="w-100 h-100 position-absolute top-0 start-0" style="object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-7 p-4 p-lg-5 d-flex flex-column justify-content-between">
                                    <div>
                                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
                                            <h3 class="h4 mb-0 text-dark fw-bold">{{ $prog->title }}</h3>
                                            @if($prog->category)
                                                <span class="badge bg-warning text-dark px-3 py-2 fs-6 rounded-pill">{{ $prog->category }}</span>
                                            @endif
                                        </div>

                                        <div class="program-content text-muted mt-3 mb-4" style="line-height: 1.7;">
                                            @if($prog->description)
                                                {!! $prog->description !!}
                                            @else
                                                <p>{{ $prog->short_description }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="border-top pt-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
                                        <a href="{{ route('donate.index') }}" class="btn btn-danger rounded-pill px-4 py-2 font-weight-bold">
                                            <i class="flaticon-heart me-1"></i> Support This Initiative
                                        </a>
                                        <a href="{{ route('volunteer.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                                            <i class="flaticon-team me-1"></i> Join As Volunteer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No programs found at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</main>
@endsection
