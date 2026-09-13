@extends('layouts.app')

@section('content')
<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Articles &amp; Blogs</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Blogs</li>
            </ul>
        </div>
    </section>

    <!-- BLOGS SECTION -->
    <section class="ul-blogs ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center">
                <div>
                    <span class="ul-section-sub-title">"ज्ञान और सेवा का संगम"</span>
                    <h2 class="ul-section-title">Insights, Stories &amp; Articles</h2>
                    <p class="ul-section-descr">Explore inspiring articles on rural youth development, women empowerment, health awareness, and sustainable development.</p>
                </div>
            </div>

            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4">
                @forelse($blogs as $item)
                    <div class="col">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 p-0 hover-lift transition">
                            <img src="{{ asset($item->image ?? 'images/blog1.jpg') }}" alt="{{ $item->title }}" style="height: 220px; width: 100%; object-fit: cover;">
                            <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <span class="badge bg-primary mb-2 text-uppercase">{{ $item->category ?? 'Blog Article' }}</span>
                                    <h3 class="h5 mb-2 text-dark font-weight-bold">{{ $item->title }}</h3>
                                    <p class="text-muted small mb-3">{{ $item->excerpt ?? Str::limit(strip_tags($item->content), 120) }}</p>
                                </div>
                                <div class="border-top pt-3 text-muted small d-flex justify-content-between align-items-center">
                                    <span><i class="flaticon-calendar text-danger me-1"></i> {{ optional($item->published_date)->format('M d, Y') ?? 'Recent Article' }}</span>
                                    <span class="fw-semibold text-secondary"><i class="flaticon-user text-primary me-1"></i> MSS Team</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No blog articles found at this time.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</main>
@endsection
