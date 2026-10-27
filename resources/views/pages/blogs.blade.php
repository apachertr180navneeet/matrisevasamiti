@extends('layouts.app')

@section('title', $page_title ?? 'Articles & Blogs - Matri Seva Samiti')
@section('meta_description', $meta_description ?? 'Explore insightful articles, impact stories, and community news from Matri Seva Samiti on rural education, women empowerment, health awareness, and sustainable development.')

@push('styles')
<style>
    .blog-card {
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
    .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 36px rgba(15, 43, 91, 0.1);
    }
    .blog-thumb-wrap {
        position: relative;
        overflow: hidden;
        height: 230px;
        background-color: #f1f5f9;
    }
    .blog-thumb-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .blog-card:hover .blog-thumb-wrap img {
        transform: scale(1.06);
    }
    .blog-category-badge {
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
    .blog-card-body {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        justify-content: space-between;
    }
    .blog-meta-top {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 0.8rem;
        color: #64748b;
        margin-bottom: 10px;
    }
    .blog-meta-top i {
        color: #EB5310;
    }
    .blog-title {
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
    .blog-card:hover .blog-title {
        color: #EB5310;
    }
    .blog-excerpt {
        font-size: 0.9rem;
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .blog-card-footer {
        padding-top: 16px;
        border-top: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .blog-read-more {
        color: #EB5310;
        font-weight: 700;
        font-size: 0.88rem;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        transition: gap 0.2s ease;
    }
    .blog-card:hover .blog-read-more {
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
</style>
@endpush

@section('content')
<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb">
        <div class="ul-container">
            <h1 class="ul-breadcrumb-title">Articles &amp; Blogs</h1>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li><a href="{{ route('blogs') }}">Blogs</a></li>
                @if(!empty($selectedCategory))
                    <li><span class="separator"><i class="flaticon-right"></i></span></li>
                    <li>{{ $selectedCategory->name }}</li>
                @endif
            </ul>
        </div>
    </section>

    <!-- BLOGS SECTION -->
    <section class="ul-blogs ul-section-spacing" style="padding: 70px 0;">
        <div class="ul-container">
            <div class="ul-section-heading text-center mb-4">
                <div>
                    <span class="ul-section-sub-title">"ज्ञान और सेवा का संगम"</span>
                    <h2 class="ul-section-title">Insights, Stories &amp; Articles</h2>
                    <p class="ul-section-descr">Explore inspiring articles on rural development, women empowerment, health awareness, and grassroots social change driven by Matri Seva Samiti.</p>
                </div>
            </div>

            <!-- SEARCH & CATEGORY BAR -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-6 col-md-8">
                    <form action="{{ route('blogs') }}" method="GET" class="position-relative">
                        @if(!empty($selectedCategory))
                            <input type="hidden" name="category" value="{{ $selectedCategory->slug }}">
                        @endif
                        <div class="input-group shadow-sm rounded-pill overflow-hidden border">
                            <span class="input-group-text bg-white border-0 ps-3">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-0 py-2" placeholder="Search blog articles by topic or keywords..." value="{{ request('search') }}">
                            <button class="btn btn-primary px-4 fw-semibold" style="background-color: #EB5310; border-color: #EB5310;" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- CATEGORY FILTER PILLS -->
            @if($categories->isNotEmpty())
                <div class="category-filter-pills">
                    <a href="{{ route('blogs') }}" class="category-pill {{ empty($selectedCategory) ? 'active' : '' }}">
                        All Articles
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('blogs', ['category' => $category->slug]) }}" 
                           class="category-pill {{ (!empty($selectedCategory) && $selectedCategory->id === $category->id) ? 'active' : '' }}">
                            {{ $category->name }} ({{ $category->blogs_count }})
                        </a>
                    @endforeach
                </div>
            @endif

            <!-- BLOG CARDS GRID -->
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4">
                @forelse($blogs as $item)
                    <div class="col">
                        <div class="blog-card">
                            <a href="{{ route('blogs.show', $item->slug) }}" class="blog-thumb-wrap d-block text-decoration-none">
                                <img src="{{ asset($item->image ?? 'images/student1.jpeg') }}" 
                                     alt="{{ $item->title }}"
                                     loading="lazy">
                                <span class="blog-category-badge">
                                    {{ $item->category->name ?? 'Article' }}
                                </span>
                            </a>
                            <div class="blog-card-body">
                                <div>
                                    <div class="blog-meta-top">
                                        <span><i class="bi bi-calendar3 me-1"></i> {{ optional($item->published_date)->format('M d, Y') ?? 'Recent' }}</span>
                                        <span>•</span>
                                        <span><i class="bi bi-clock me-1"></i> {{ $item->reading_time }} min read</span>
                                    </div>
                                    <h3 class="blog-title">
                                        <a href="{{ route('blogs.show', $item->slug) }}" class="text-decoration-none text-inherit">
                                            {{ $item->title }}
                                        </a>
                                    </h3>
                                    <p class="blog-excerpt">
                                        {{ $item->short_description ?? Str::limit(strip_tags($item->content), 130) }}
                                    </p>
                                </div>
                                <div class="blog-card-footer">
                                    <span class="small text-muted d-flex align-items-center">
                                        <i class="bi bi-person-circle me-1 text-primary"></i> {{ $item->author_name ?? 'MSS Team' }}
                                    </span>
                                    <a href="{{ route('blogs.show', $item->slug) }}" class="blog-read-more">
                                        <span>Read More</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="p-5 bg-light rounded-4 border">
                            <i class="bi bi-journal-text display-4 text-muted mb-3 d-block"></i>
                            <h4 class="fw-bold text-dark">No Articles Found</h4>
                            <p class="text-muted">We couldn't find any articles matching your search criteria.</p>
                            <a href="{{ route('blogs') }}" class="btn btn-outline-primary rounded-pill px-4 mt-2">
                                Clear Search &amp; View All
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- PAGINATION -->
            @if($blogs->hasPages())
                <div class="mt-5 d-flex justify-content-center">
                    {{ $blogs->links() }}
                </div>
            @endif
        </div>
    </section>
</main>
@endsection
