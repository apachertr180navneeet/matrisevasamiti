@extends('layouts.app')

@section('title', 'News & NGO News - Latest Grassroots Updates | Matri Seva Samiti')
@section('meta_description', 'Official News & NGO News of Matri Seva Samiti (मिलकर करें प्रयास, खुशहाल हो समाज). Read about our grassroots rural initiatives, skill centers, free health camps, and media coverage.')

@section('content')
<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h1 class="ul-breadcrumb-title">News &amp; NGO News</h1>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>News &amp; NGO News</li>
            </ul>
        </div>
    </section>

    <!-- NEWS SECTION -->
    <section class="ul-blogs ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center mb-4">
                <div>
                    <span class="ul-section-sub-title">"मिलकर करें प्रयास, खुशहाल हो समाज"</span>
                    <h2 class="ul-section-title">Latest News &amp; NGO Field Updates</h2>
                    <p class="ul-section-descr">Stay updated with our newest center inaugurations, medical camps, digital libraries, media publications, and community achievements across Uttar Pradesh.</p>
                </div>
            </div>

            <!-- SEARCH & FILTER BAR -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                        <form action="{{ route('news') }}" method="GET" class="row g-2 align-items-center">
                            <div class="col-md-7 col-12">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                                    <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Search news articles, health camps, skills..." value="{{ request('search', $search ?? '') }}">
                                </div>
                            </div>
                            <div class="col-md-3 col-8">
                                <select name="category" class="form-select" onchange="this.form.submit()">
                                    <option value="">All Categories</option>
                                    @if(isset($categories))
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat }}" {{ (request('category', $category ?? '') == $cat) ? 'selected' : '' }}>{{ $cat }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-2 col-4 d-grid">
                                <button type="submit" class="btn btn-primary rounded-3 text-white fw-semibold" style="background-color: var(--ul-primary, #EB5310); border:none;">
                                    Filter
                                </button>
                            </div>
                        </form>
                        @if(!empty($search) || !empty($category))
                            <div class="d-flex align-items-center justify-content-between mt-2 pt-2 border-top text-muted small">
                                <span>Showing filtered results @if(!empty($search)) for "<strong>{{ $search }}</strong>"@endif @if(!empty($category)) in <strong>{{ $category }}</strong>@endif</span>
                                <a href="{{ route('news') }}" class="text-danger text-decoration-none fw-semibold"><i class="bi bi-x-circle me-1"></i> Reset Filters</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4">
                @forelse($news as $item)
                    @php
                        $itemSlug = $item->slug ?? $item->id;
                        $itemCategory = $item->category ?? ($item->type == 'press' ? 'Press Release' : ($item->type == 'media' ? 'Media Coverage' : ($item->type == 'event' ? 'Event' : 'NGO News')));
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
                                        {{ $itemDate ?? 'Recent Field Update' }}
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
                        <div class="p-5 bg-light rounded-4">
                            <i class="bi bi-newspaper fs-1 text-muted d-block mb-3"></i>
                            <h5 class="text-dark">No news articles found</h5>
                            <p class="text-muted mb-3">Try adjusting your search criteria or explore other categories.</p>
                            <a href="{{ route('news') }}" class="btn btn-outline-primary btn-sm rounded-pill px-4">View All News &amp; NGO News</a>
                        </div>
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
