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
    <section class="ul-services ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center">
                <div>
                    <span class="ul-section-sub-title">"मिलकर करें प्रयास, खुशहाल हो समाज"</span>
                    <h2 class="ul-section-title">Core Social Development Initiatives</h2>
                    <p class="ul-section-descr">We run diverse grassroots programs focusing on holistic community development across multiple key sectors.</p>
                </div>
            </div>

            <div class="row row-cols-lg-2 row-cols-1 gy-4">
                @forelse($programs as $prog)
                    <div class="col">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 p-0">
                            <div class="row g-0 h-100">
                                <div class="col-md-5">
                                    <img src="{{ asset($prog->image ?? 'images/Educationimage.png') }}" alt="{{ $prog->title }}" class="img-fluid h-100 w-100" style="object-fit: cover; min-height: 250px;">
                                </div>
                                <div class="col-md-7 p-4 d-flex flex-column justify-content-between">
                                    <div>
                                        <span class="badge bg-warning text-dark mb-2">{{ $prog->category ?? 'Social Initiative' }}</span>
                                        <h3 class="h4 mb-2 text-dark">{{ $prog->title }}</h3>
                                        <p class="text-muted small mb-2">{{ $prog->short_description }}</p>
                                        @if($prog->description)
                                            <p class="text-muted small mb-3 text-truncate-3" style="font-size:0.85rem;">{{ Str::limit(strip_tags($prog->description), 140) }}</p>
                                        @endif
                                    </div>
                                    <a href="{{ route('donate.index') }}" class="btn btn-outline-danger btn-sm rounded-pill align-self-start">Support {{ $prog->title }} &rarr;</a>
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

