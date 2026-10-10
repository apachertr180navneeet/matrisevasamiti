@extends('layouts.app')

@section('title', 'NGO News & Grassroots Updates - Matri Seva Samiti')
@section('meta_description', 'Latest news, field stories, medical camp updates, and rural skill center inaugurations by Matri Seva Samiti (मिलकर करें प्रयास, खुशहाल हो समाज).')

@section('content')
<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h1 class="ul-breadcrumb-title">NGO News &amp; Field Updates</h1>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>News</li>
            </ul>
        </div>
    </section>

    <!-- NEWS SECTION -->
    <section class="ul-blogs ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center mb-5">
                <div>
                    <span class="ul-section-sub-title">"मिलकर करें प्रयास, खुशहाल हो समाज"</span>
                    <h2 class="ul-section-title">Latest Grassroots Impact News</h2>
                    <p class="ul-section-descr">Stay updated with our newest center inaugurations, medical camps, digital libraries, and community achievements across Uttar Pradesh.</p>
                </div>
            </div>

            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4">
                @forelse($news as $item)
                    @php
                        $itemSlug = $item->slug ?? $item->id;
                        $itemCategory = $item->category ?? ($item->type == 'press' ? 'Press Release' : ($item->type == 'event' ? 'Event' : 'News'));
                        $itemDate = null;
                        if (!empty($item->published_date)) {
                            $itemDate = $item->published_date instanceof \Carbon\Carbon 
                                ? $item->published_date->format('M d, Y') 
                                : \Carbon\Carbon::parse($item->published_date)->format('M d, Y');
                        }
                    @endphp
                    <div class="col">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 p-0 hover-lift transition news-card">
                            <a href="{{ route('news.detail', $itemSlug) }}" class="d-block overflow-hidden position-relative news-card-thumb">
                                <img src="{{ asset($item->image ?? 'images/student1.jpeg') }}" 
                                     alt="{{ $item->title }}" 
                                     loading="lazy" 
                                     decoding="async" 
                                     style="height: 230px; width: 100%; object-fit: cover; transition: transform 0.4s ease;">
                                <span class="badge bg-danger position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill text-uppercase shadow-sm" style="font-size: 11px; letter-spacing: 0.5px;">
                                    {{ $itemCategory }}
                                </span>
                            </a>
                            <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <h3 class="h5 mb-2 text-dark fw-bold line-clamp-2">
                                        <a href="{{ route('news.detail', $itemSlug) }}" class="text-dark text-decoration-none hover-primary">
                                            {{ $item->title }}
                                        </a>
                                    </h3>
                                    <p class="text-muted small mb-3 line-clamp-3">
                                        {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 120) }}
                                    </p>
                                </div>
                                <div class="border-top pt-3 text-muted small d-flex justify-content-between align-items-center">
                                    <span>
                                        <i class="flaticon-calendar text-danger me-1"></i> 
                                        {{ $itemDate ?? 'Recent Update' }}
                                    </span>
                                    <a href="{{ route('news.detail', $itemSlug) }}" class="text-danger fw-bold text-decoration-none news-readmore-link">
                                        Read Story <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No news articles found at this time.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</main>

<style>
.news-card {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    background: #ffffff;
    border: 1px solid rgba(0,0,0,0.06) !important;
}
.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 28px rgba(0,0,0,0.08) !important;
}
.news-card:hover .news-card-thumb img {
    transform: scale(1.05);
}
.hover-primary {
    transition: color 0.2s ease;
}
.hover-primary:hover {
    color: var(--ul-primary, #EB5310) !important;
}
.news-readmore-link {
    transition: transform 0.2s ease, color 0.2s ease;
    display: inline-flex;
    align-items: center;
}
.news-readmore-link:hover {
    transform: translateX(3px);
    color: #c93d04 !important;
}
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection
