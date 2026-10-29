@extends('layouts.app')

@section('title', $page_title ?? 'News & Field Updates - Matri Seva Samiti')
@section('meta_description', $meta_description ?? 'Official News and Grassroots Field Updates from Matri Seva Samiti (मिलकर करें प्रयास, खुशहाल हो समाज). Read our latest rural skill centers, free health camps, and community achievements.')

@push('styles')
<style>
    .news-card {
        border-radius: 18px;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #edf2f7;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        transition: transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .news-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 36px rgba(15, 43, 91, 0.1);
    }
    .news-thumb-wrap {
        position: relative;
        overflow: hidden;
        height: 230px;
        background-color: #f1f5f9;
    }
    .news-thumb-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .news-card:hover .news-thumb-wrap img {
        transform: scale(1.06);
    }
    .news-category-badge {
        position: absolute;
        bottom: 14px;
        left: 14px;
        background: rgba(15, 43, 91, 0.9);
        backdrop-filter: blur(6px);
        color: #ffffff;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 5px 12px;
        border-radius: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    .news-card-body {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        justify-content: space-between;
    }
    .news-meta-top {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 0.8rem;
        color: #64748b;
        margin-bottom: 10px;
    }
    .news-meta-top i {
        color: #EB5310;
    }
    .news-title {
        font-family: var(--font-quicksand), 'Manrope', sans-serif;
        font-size: 1.18rem;
        font-weight: 700;
        color: #0F2B5B;
        line-height: 1.4;
        margin-bottom: 12px;
        transition: color 0.2s ease;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .news-card:hover .news-title {
        color: #EB5310;
    }
    .news-excerpt {
        font-size: 0.9rem;
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .news-card-footer {
        padding-top: 16px;
        border-top: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .news-read-more {
        color: #EB5310;
        font-weight: 700;
        font-size: 0.88rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        transition: gap 0.2s ease;
    }
    .news-card:hover .news-read-more {
        gap: 10px;
    }
    /* Filter Pills */
    .category-filter-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: center;
        margin-bottom: 35px;
    }
    .category-pill {
        display: inline-block;
        padding: 7px 18px;
        border-radius: 999px;
        font-size: 0.88rem;
        font-weight: 600;
        text-decoration: none;
        color: #475569;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        transition: all 0.2s ease;
    }
    .category-pill:hover, .category-pill.active {
        background: #0F2B5B;
        color: #ffffff;
        border-color: #0F2B5B;
        box-shadow: 0 4px 12px rgba(15, 43, 91, 0.15);
    }
    /* Search Bar */
    .search-box-wrap {
        max-width: 580px;
        margin: 0 auto 30px auto;
    }
    .search-box-wrap .form-control {
        border-radius: 50px 0 0 50px;
        padding: 12px 24px;
        border: 1px solid #cbd5e1;
        font-size: 0.95rem;
    }
    .search-box-wrap .form-control:focus {
        border-color: #EB5310;
        box-shadow: 0 0 0 3px rgba(235, 83, 16, 0.15);
    }
    .search-box-wrap .btn-search {
        border-radius: 0 50px 50px 0;
        background: #EB5310;
        color: #ffffff;
        border: none;
        padding: 0 28px;
        font-weight: 600;
        transition: background 0.2s ease;
    }
    .search-box-wrap .btn-search:hover {
        background: #d44708;
    }
</style>
@endpush

@section('content')
<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h1 class="ul-breadcrumb-title">News &amp; Field Updates</h1>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li><a href="{{ route('news') }}">News</a></li>
                @if(!empty($selectedCategory))
                    <li><span class="separator"><i class="flaticon-right"></i></span></li>
                    <li>{{ $selectedCategory }}</li>
                @endif
            </ul>
        </div>
    </section>

    <!-- NEWS SECTION -->
    <section class="ul-blogs ul-section-spacing">
        <div class="ul-container">
            <div class="ul-section-heading text-center mb-4">
                <div>
                    <span class="ul-section-sub-title">"मिलकर करें प्रयास, खुशहाल हो समाज"</span>
                    <h2 class="ul-section-title">Latest Grassroots Impact News</h2>
                    <p class="ul-section-descr">Stay updated with our newest center inaugurations, medical camps, digital libraries, and community achievements across Uttar Pradesh.</p>
                </div>
            </div>

            <!-- SEARCH BAR -->
            <div class="search-box-wrap">
                <form action="{{ route('news') }}" method="GET">
                    @if(!empty($selectedCategory))
                        <input type="hidden" name="category" value="{{ $selectedCategory }}">
                    @endif
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search news by keywords, programs, or health camps..." value="{{ $search ?? '' }}">
                        <button type="submit" class="btn btn-search">
                            <i class="bi bi-search me-1"></i> Search
                        </button>
                    </div>
                </form>
                @if(!empty($search) || !empty($selectedCategory))
                    <div class="text-center mt-2">
                        <span class="text-muted small">
                            Showing results @if(!empty($search)) for "<strong>{{ $search }}</strong>" @endif @if(!empty($selectedCategory)) in <strong>{{ $selectedCategory }}</strong> @endif
                        </span>
                        <a href="{{ route('news') }}" class="text-danger small ms-2 text-decoration-none fw-semibold">
                            <i class="bi bi-x-circle me-1"></i> Clear Filters
                        </a>
                    </div>
                @endif
            </div>

            <!-- CATEGORY FILTER PILLS (from blog logic) -->
            @if(isset($categoriesWithCount) && $categoriesWithCount->count() > 0)
                <div class="category-filter-pills">
                    <a href="{{ route('news', array_filter(['search' => $search ?? null])) }}" class="category-pill {{ empty($selectedCategory) ? 'active' : '' }}">
                        All Updates <span class="badge bg-secondary-subtle text-dark ms-1">{{ $totalCount ?? $news->total() }}</span>
                    </a>
                    @foreach($categoriesWithCount as $catItem)
                        <a href="{{ route('news', array_filter(['category' => $catItem->category, 'search' => $search ?? null])) }}" class="category-pill {{ ($selectedCategory == $catItem->category) ? 'active' : '' }}">
                            {{ $catItem->category }} <span class="badge bg-secondary-subtle text-dark ms-1">{{ $catItem->count }}</span>
                        </a>
                    @endforeach
                </div>
            @endif

            <!-- NEWS GRID -->
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4 mb-5">
                @forelse($news as $item)
                    @php
                        $itemSlug = $item->slug ?? $item->id;
                        $itemCategory = $item->category ?? ($item->type == 'press' ? 'Press Release' : ($item->type == 'media' ? 'Media Coverage' : 'Grassroots'));
                        $itemDate = null;
                        if (!empty($item->published_date)) {
                            $itemDate = $item->published_date instanceof \Carbon\Carbon 
                                ? $item->published_date->format('M d, Y') 
                                : \Carbon\Carbon::parse($item->published_date)->format('M d, Y');
                        }
                        $wordCount = str_word_count(strip_tags($item->content ?? $item->excerpt ?? ''));
                        $readMinutes = max(2, (int) ceil($wordCount / 200));
                    @endphp
                    <div class="col">
                        <article class="news-card">
                            <div class="news-thumb-wrap">
                                <a href="{{ route('news.detail', $itemSlug) }}">
                                    <img src="{{ asset($item->image ?? 'images/student1.jpeg') }}" 
                                         alt="{{ $item->title }}" 
                                         loading="lazy" 
                                         decoding="async">
                                </a>
                                <span class="news-category-badge">{{ $itemCategory }}</span>
                            </div>
                            <div class="news-card-body">
                                <div>
                                    <div class="news-meta-top">
                                        <span><i class="far fa-calendar-alt"></i> {{ $itemDate ?? 'Recent Update' }}</span>
                                        <span>&bull;</span>
                                        <span><i class="far fa-clock"></i> {{ $readMinutes }} min read</span>
                                    </div>
                                    <h3 class="news-title">
                                        <a href="{{ route('news.detail', $itemSlug) }}" class="text-decoration-none">
                                            {{ $item->title }}
                                        </a>
                                    </h3>
                                    <p class="news-excerpt">
                                        {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 125) }}
                                    </p>
                                </div>
                                <div class="news-card-footer">
                                    <a href="{{ route('news.detail', $itemSlug) }}" class="news-read-more">
                                        Read Story <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="p-5 bg-light rounded-4">
                            <i class="bi bi-newspaper fs-1 text-muted d-block mb-3"></i>
                            <h4 class="text-dark fw-bold mb-2">No news updates found</h4>
                            <p class="text-muted mb-3">No updates matched your search or category filter. Try browsing all news.</p>
                            <a href="{{ route('news') }}" class="btn btn-outline-primary rounded-pill px-4">View All News</a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- PAGINATION (from blog logic) -->
            @if($news->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $news->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </section>
</main>
@endsection
