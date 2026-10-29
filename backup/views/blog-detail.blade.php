@extends('layouts.app')

@section('title', $page_title ?? ($blog->title . ' - Matri Seva Samiti'))
@section('meta_description', $meta_description ?? $blog->effective_meta_description)

@section('meta')
    @if(!empty($meta_keywords))
        <meta name="keywords" content="{{ $meta_keywords }}">
    @endif
    <!-- Open Graph / Social Meta Tags -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $blog->effective_meta_title }}">
    <meta property="og:description" content="{{ $blog->effective_meta_description }}">
    <meta property="og:url" content="{{ url()->current() }}">
    @if($blog->image)
        <meta property="og:image" content="{{ asset($blog->image) }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->effective_meta_title }}">
    <meta name="twitter:description" content="{{ $blog->effective_meta_description }}">
    @if($blog->image)
        <meta name="twitter:image" content="{{ asset($blog->image) }}">
    @endif
@endsection

@push('styles')
<style>
    .blog-detail-content {
        font-family: 'Manrope', sans-serif;
        font-size: 1.05rem;
        line-height: 1.85;
        color: #334155;
    }
    .blog-detail-content h1, 
    .blog-detail-content h2, 
    .blog-detail-content h3, 
    .blog-detail-content h4 {
        font-family: var(--font-quicksand), 'Manrope', sans-serif;
        color: #0F2B5B;
        font-weight: 700;
        margin-top: 1.8rem;
        margin-bottom: 0.8rem;
        line-height: 1.35;
    }
    .blog-detail-content h2 {
        font-size: 1.65rem;
        border-left: 4px solid #EB5310;
        padding-left: 14px;
    }
    .blog-detail-content p {
        margin-bottom: 1.35rem;
    }
    .blog-detail-content img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        margin: 1.5rem 0;
        box-shadow: 0 4px 18px rgba(0,0,0,0.06);
    }
    .blog-detail-content blockquote {
        margin: 2rem 0;
        padding: 20px 24px;
        background: #f8fafc;
        border-left: 4px solid #0F2B5B;
        border-radius: 0 12px 12px 0;
        font-style: italic;
        color: #1e293b;
        font-size: 1.1rem;
    }
    .blog-detail-content ul, .blog-detail-content ol {
        margin-bottom: 1.35rem;
        padding-left: 1.5rem;
    }
    .blog-detail-content li {
        margin-bottom: 0.5rem;
    }
    /* Share Buttons */
    .share-btn {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff !important;
        font-size: 14px;
        text-decoration: none;
        transition: transform 0.2s ease, opacity 0.2s ease;
    }
    .share-btn:hover {
        transform: translateY(-2px);
        opacity: 0.9;
    }
    .share-btn.whatsapp { background-color: #25D366; }
    .share-btn.facebook { background-color: #1877F2; }
    .share-btn.twitter { background-color: #000000; }
    .share-btn.linkedin { background-color: #0A66C2; }
    .share-btn.copy { background-color: #64748b; }

    /* Sidebar Widgets */
    .sidebar-widget {
        background: #ffffff;
        border: 1px solid #edf2f7;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.03);
        margin-bottom: 28px;
    }
    .sidebar-widget-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #0F2B5B;
        margin-bottom: 18px;
        position: relative;
        padding-bottom: 10px;
        border-bottom: 2px solid #f1f5f9;
    }
    .sidebar-widget-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 45px;
        height: 2px;
        background: #EB5310;
    }
    .recent-post-item {
        display: flex;
        gap: 14px;
        align-items: center;
        margin-bottom: 16px;
        padding-bottom: 16px;
        border-bottom: 1px dashed #f1f5f9;
    }
    .recent-post-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }
    .recent-post-thumb {
        width: 72px;
        height: 60px;
        border-radius: 8px;
        overflow: hidden;
        flex-shrink: 0;
    }
    .recent-post-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .category-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 9px 0;
        border-bottom: 1px solid #f8fafc;
        color: #475569;
        text-decoration: none;
        font-size: 0.93rem;
        transition: color 0.2s ease, padding 0.2s ease;
    }
    .category-list-item:hover {
        color: #EB5310;
        padding-left: 6px;
    }
</style>
@endpush

@section('content')
<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb">
        <div class="ul-container">
            <h1 class="ul-breadcrumb-title">{{ Str::limit($blog->title, 55) }}</h1>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li><a href="{{ route('blogs') }}">Blogs</a></li>
                @if($blog->category)
                    <li><span class="separator"><i class="flaticon-right"></i></span></li>
                    <li><a href="{{ route('blogs', ['category' => $blog->category->slug]) }}">{{ $blog->category->name }}</a></li>
                @endif
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Article</li>
            </ul>
        </div>
    </section>

    <!-- ARTICLE MAIN SECTION -->
    <section class="ul-section-spacing" style="padding: 60px 0;">
        <div class="ul-container">
            <div class="row g-4">
                <!-- Main Article Column -->
                <div class="col-lg-8">
                    <article class="bg-white rounded-4 p-4 p-md-5 border shadow-sm">
                        <!-- Category Badge & Meta Header -->
                        <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                            @if($blog->category)
                                <a href="{{ route('blogs', ['category' => $blog->category->slug]) }}" 
                                   class="badge bg-primary text-white text-decoration-none px-3 py-2 rounded-pill font-weight-bold"
                                   style="background-color: #0F2B5B !important; font-size: 0.78rem; letter-spacing: 0.5px;">
                                    {{ $blog->category->name }}
                                </a>
                            @endif
                            <span class="text-muted small">
                                <i class="bi bi-calendar3 text-danger me-1"></i> {{ optional($blog->published_date)->format('F d, Y') ?? 'Recent Article' }}
                            </span>
                            <span class="text-muted small">
                                <i class="bi bi-clock text-warning me-1"></i> {{ $blog->reading_time }} min read
                            </span>
                            <span class="text-muted small">
                                <i class="bi bi-eye text-info me-1"></i> {{ number_format($blog->views_count) }} views
                            </span>
                        </div>

                        <!-- Article Title -->
                        <h1 class="h2 fw-bold mb-3" style="color: #0F2B5B; line-height: 1.3;">
                            {{ $blog->title }}
                        </h1>

                        <!-- Author Header -->
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                            <div class="rounded-circle bg-light border p-1" style="width: 44px; height: 44px; overflow: hidden;">
                                <img src="{{ asset('logo/Logo.png') }}" alt="MSS Logo" class="w-100 h-100 object-fit-contain">
                            </div>
                            <div>
                                <div class="fw-bold text-dark small">{{ $blog->author_name ?? 'Matri Seva Samiti' }}</div>
                                <div class="text-muted" style="font-size: 0.75rem;">NGO Dedicated to Grassroots Empowerment</div>
                            </div>
                            <!-- Social Share Icons (Top) -->
                            <div class="ms-auto d-flex align-items-center gap-2">
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' ' . url()->current()) }}" 
                                   target="_blank" rel="noopener noreferrer" class="share-btn whatsapp" title="Share on WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                                   target="_blank" rel="noopener noreferrer" class="share-btn facebook" title="Share on Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(url()->current()) }}" 
                                   target="_blank" rel="noopener noreferrer" class="share-btn twitter" title="Share on X">
                                    <i class="fab fa-x-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                                   target="_blank" rel="noopener noreferrer" class="share-btn linkedin" title="Share on LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Featured Image -->
                        @if($blog->image)
                            <div class="rounded-4 overflow-hidden mb-4 shadow-sm" style="max-height: 480px;">
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="w-100 h-100 object-fit-cover">
                            </div>
                        @endif

                        <!-- Short Description / Lead paragraph -->
                        @if($blog->short_description)
                            <div class="lead fs-6 text-secondary mb-4 p-3 bg-light rounded-3 border-start border-4 border-warning">
                                {{ $blog->short_description }}
                            </div>
                        @endif

                        <!-- Main Content (HTML from WYSIWYG) -->
                        <div class="blog-detail-content">
                            {!! $blog->content !!}
                        </div>

                        <!-- Social Share Bottom Section -->
                        <div class="mt-5 pt-4 border-top d-flex flex-wrap align-items-center justify-content-between gap-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-bold text-dark small"><i class="bi bi-share me-1 text-primary"></i> Share this Article:</span>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title . ' ' . url()->current()) }}" target="_blank" rel="noopener noreferrer" class="share-btn whatsapp" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" class="share-btn facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" class="share-btn twitter" title="X"><i class="fab fa-x-twitter"></i></a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener noreferrer" class="share-btn linkedin" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                <button type="button" class="share-btn copy border-0" onclick="copyArticleLink()" title="Copy Link"><i class="bi bi-link-45deg fs-6"></i></button>
                            </div>
                            @if($blog->category)
                                <a href="{{ route('blogs', ['category' => $blog->category->slug]) }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                                    More in {{ $blog->category->name }} &rarr;
                                </a>
                            @endif
                        </div>

                        <!-- Author Card -->
                        <div class="mt-4 p-4 rounded-4 bg-light border d-flex align-items-center gap-3">
                            <img src="{{ asset('logo/Logo.png') }}" alt="MSS Logo" style="width: 58px; height: 58px; object-fit: contain;" class="bg-white p-2 rounded-circle border">
                            <div>
                                <h6 class="fw-bold mb-1" style="color: #0F2B5B;">Published by {{ $blog->author_name ?? 'Matri Seva Samiti' }}</h6>
                                <p class="small text-muted mb-0">Empowering rural youth and women with quality education, sustainable livelihoods, and compassionate healthcare initiatives across Uttar Pradesh and India.</p>
                            </div>
                        </div>

                        <!-- Prev / Next Navigation -->
                        <div class="row g-3 mt-4 pt-3 border-top">
                            <div class="col-sm-6">
                                @if($prevBlog)
                                    <a href="{{ route('blogs.show', $prevBlog->slug) }}" class="p-3 bg-light rounded-3 d-block text-decoration-none border h-100">
                                        <span class="small text-muted d-block">&larr; Previous Article</span>
                                        <strong class="text-dark small d-block text-truncate">{{ $prevBlog->title }}</strong>
                                    </a>
                                @endif
                            </div>
                            <div class="col-sm-6 text-sm-end">
                                @if($nextBlog)
                                    <a href="{{ route('blogs.show', $nextBlog->slug) }}" class="p-3 bg-light rounded-3 d-block text-decoration-none border h-100">
                                        <span class="small text-muted d-block">Next Article &rarr;</span>
                                        <strong class="text-dark small d-block text-truncate">{{ $nextBlog->title }}</strong>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar Column -->
                <div class="col-lg-4">
                    <!-- Search Widget -->
                    <div class="sidebar-widget">
                        <h5 class="sidebar-widget-title">Search Articles</h5>
                        <form action="{{ route('blogs') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search topics..." required>
                                <button class="btn btn-primary px-3" style="background-color: #0F2B5B; border-color: #0F2B5B;" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    @if($categories->isNotEmpty())
                        <div class="sidebar-widget">
                            <h5 class="sidebar-widget-title">Categories</h5>
                            <div class="category-list">
                                @foreach($categories as $cat)
                                    <a href="{{ route('blogs', ['category' => $cat->slug]) }}" class="category-list-item">
                                        <span><i class="bi bi-chevron-right small text-warning me-2"></i>{{ $cat->name }}</span>
                                        <span class="badge bg-light text-dark border">{{ $cat->blogs_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Recent Articles Widget -->
                    @if($recentBlogs->isNotEmpty())
                        <div class="sidebar-widget">
                            <h5 class="sidebar-widget-title">Recent Articles</h5>
                            @foreach($recentBlogs as $recent)
                                <div class="recent-post-item">
                                    <a href="{{ route('blogs.show', $recent->slug) }}" class="recent-post-thumb">
                                        <img src="{{ asset($recent->image ?? 'images/student1.jpeg') }}" alt="{{ $recent->title }}">
                                    </a>
                                    <div>
                                        <span class="text-muted small d-block" style="font-size: 0.72rem;">
                                            <i class="bi bi-calendar3 me-1 text-danger"></i> {{ optional($recent->published_date)->format('M d, Y') }}
                                        </span>
                                        <a href="{{ route('blogs.show', $recent->slug) }}" class="fw-semibold text-dark text-decoration-none small d-block hover-primary" style="line-height: 1.35;">
                                            {{ Str::limit($recent->title, 50) }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Support NGO Donation CTA Widget -->
                    <div class="sidebar-widget text-center text-white p-4" style="background: linear-gradient(135deg, #0F2B5B 0%, #1e3a6d 100%); border: none;">
                        <div class="rounded-circle bg-white text-danger mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 54px; height: 54px; font-size: 24px;">
                            <i class="flaticon-fast-forward-double-right-arrows-symbol"></i>
                        </div>
                        <h5 class="fw-bold text-white mb-2">Support Our Cause</h5>
                        <p class="small text-white-50 mb-3">Your contribution helps us educate rural children and empower women with life skills.</p>
                        <span class="badge bg-warning text-dark px-3 py-1 mb-3">80G Tax Exemption Eligible</span>
                        <a href="{{ route('donate.index') }}" class="btn btn-warning w-100 fw-bold rounded-pill text-dark">
                            Donate Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- RELATED ARTICLES SECTION -->
            @if($relatedBlogs->isNotEmpty())
                <div class="mt-5 pt-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="fw-bold mb-0" style="color: #0F2B5B;">Related Articles</h3>
                        <a href="{{ route('blogs') }}" class="text-decoration-none fw-semibold" style="color: #EB5310;">
                            View All Articles &rarr;
                        </a>
                    </div>
                    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4">
                        @foreach($relatedBlogs as $item)
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                                    <div style="height: 190px; overflow: hidden;">
                                        <img src="{{ asset($item->image ?? 'images/student1.jpeg') }}" alt="{{ $item->title }}" class="w-100 h-100 object-fit-cover">
                                    </div>
                                    <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                                        <div>
                                            <span class="badge bg-light text-primary border mb-2 text-uppercase" style="font-size: 0.7rem;">
                                                {{ $item->category->name ?? 'General' }}
                                            </span>
                                            <h5 class="h6 fw-bold mb-2">
                                                <a href="{{ route('blogs.show', $item->slug) }}" class="text-dark text-decoration-none">
                                                    {{ Str::limit($item->title, 55) }}
                                                </a>
                                            </h5>
                                            <p class="text-muted small mb-3">
                                                {{ $item->short_description ?? Str::limit(strip_tags($item->content), 90) }}
                                            </p>
                                        </div>
                                        <div class="border-top pt-2 text-muted small d-flex justify-content-between align-items-center">
                                            <span>{{ optional($item->published_date)->format('M d, Y') }}</span>
                                            <a href="{{ route('blogs.show', $item->slug) }}" class="text-danger fw-semibold text-decoration-none">Read &rarr;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
    function copyArticleLink() {
        navigator.clipboard.writeText(window.location.href).then(function() {
            alert('Article link copied to clipboard!');
        }).catch(function() {
            prompt('Copy this link:', window.location.href);
        });
    }
</script>
@endpush
