@extends('layouts.app')

@php
    $articleTitle = $article->title ?? 'News Article';
    $articleSlug = $article->slug ?? ($article->id ?? 'news');
    $articleCategory = $article->category ?? ($article->type == 'press' ? 'Press Release' : ($article->type == 'event' ? 'Field Event' : 'NGO News'));
    $articleExcerpt = $article->excerpt ?? Str::limit(strip_tags($article->content ?? ''), 160);
    $articleImage = asset($article->image ?? 'images/student1.jpeg');
    $articleUrl = route('news.detail', $articleSlug);
    $articleDate = null;
    if (!empty($article->published_date)) {
        $articleDate = $article->published_date instanceof \Carbon\Carbon 
            ? $article->published_date 
            : \Carbon\Carbon::parse($article->published_date);
    }
    $wordCount = str_word_count(strip_tags($article->content ?? ''));
    $readMinutes = max(2, ceil($wordCount / 200));
@endphp

@section('title', $articleTitle . ' - Matri Seva Samiti')
@section('meta_description', Str::limit(strip_tags($articleExcerpt), 160))

@section('meta')
    <!-- Open Graph / Social Sharing Meta Tags -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $articleTitle }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($articleExcerpt), 160) }}">
    <meta property="og:image" content="{{ $articleImage }}">
    <meta property="og:url" content="{{ $articleUrl }}">
    <meta property="og:site_name" content="Matri Seva Samiti">
    @if($articleDate)
        <meta property="article:published_time" content="{{ $articleDate->toIso8601String() }}">
    @endif
    <meta property="article:section" content="{{ $articleCategory }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $articleTitle }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($articleExcerpt), 160) }}">
    <meta name="twitter:image" content="{{ $articleImage }}">
@endsection

@section('content')
<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">{{ Str::limit($articleTitle, 60) }}</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li><a href="{{ route('news') }}">News</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li class="active">{{ Str::limit($articleTitle, 35) }}</li>
            </ul>
        </div>
    </section>

    <!-- ARTICLE DETAILS SECTION -->
    <section class="mss-article-section py-5">
        <div class="container py-lg-3">
            <div class="row g-5">
                <!-- MAIN ARTICLE COLUMN (8 cols) -->
                <div class="col-lg-8">
                    <article class="mss-article-card bg-white p-4 p-md-5 rounded-4 shadow-sm border">
                        <!-- Top Meta Header -->
                        <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                            <span class="badge bg-danger px-3 py-2 rounded-pill text-uppercase font-weight-bold" style="letter-spacing: 0.5px;">
                                <i class="fas fa-tag me-1"></i> {{ $articleCategory }}
                            </span>
                            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill">
                                <i class="far fa-clock me-1 text-danger"></i> {{ $readMinutes }} min read
                            </span>
                            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill">
                                <i class="fas fa-map-marker-alt me-1 text-danger"></i> Uttar Pradesh, India
                            </span>
                        </div>

                        <!-- Article Headline H1 -->
                        <h1 class="h2 text-dark fw-extrabold mb-3 line-height-sm" style="color: #1a1e24; line-height: 1.35;">
                            {{ $articleTitle }}
                        </h1>

                        <!-- Publishing Details Bar -->
                        <div class="d-flex flex-wrap align-items-center justify-content-between border-top border-bottom py-3 mb-4 text-muted small gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar-circle bg-danger-subtle text-danger fw-bold rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #fff0eb; color: #EB5310;">
                                    <i class="fas fa-hands-helping"></i>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark">Matri Seva Samiti Field Team</div>
                                    <div class="text-secondary" style="font-size: 12px;">
                                        <i class="flaticon-calendar text-danger me-1"></i> 
                                        {{ $articleDate ? $articleDate->format('F d, Y') : 'Recent Field Story' }}
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Social Share Pills -->
                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-semibold text-secondary d-none d-sm-inline" style="font-size: 13px;">Share:</span>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($articleTitle . ' - ' . $articleUrl) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-success rounded-circle share-btn" title="Share on WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($articleUrl) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary rounded-circle share-btn" title="Share on Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($articleTitle) }}&url={{ urlencode($articleUrl) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-dark rounded-circle share-btn" title="Share on X">
                                    <i class="fab fa-x-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode($articleUrl) }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-info rounded-circle share-btn" title="Share on LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle share-btn copy-link-btn" data-url="{{ $articleUrl }}" title="Copy Link" id="copyLinkBtnTop">
                                    <i class="fas fa-link"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Featured Media Image -->
                        <div class="position-relative overflow-hidden rounded-4 mb-4 shadow-sm" style="max-height: 480px;">
                            <img src="{{ $articleImage }}" 
                                 alt="{{ $articleTitle }}" 
                                 class="w-100 img-fluid" 
                                 loading="eager" 
                                 style="max-height: 480px; width: 100%; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-gradient-dark text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(transparent, rgba(0,0,0,0.75));">
                                <span class="small"><i class="fas fa-camera me-1"></i> Grassroots Field Documentation</span>
                                <span class="badge bg-light text-dark font-monospace" style="font-size: 11px;">Prayagraj / Bhadohi</span>
                            </div>
                        </div>

                        <!-- Article Lead Excerpt Callout -->
                        @if(!empty($article->excerpt))
                            <div class="lead-callout p-4 rounded-3 mb-4" style="background-color: #fcf6f2; border-left: 4px solid #EB5310;">
                                <p class="mb-0 fst-italic text-dark fw-semibold" style="font-size: 1.1rem; line-height: 1.7;">
                                    "{{ $article->excerpt }}"
                                </p>
                            </div>
                        @endif

                        <!-- Main Body Content -->
                        <div class="mss-article-body text-secondary" style="font-size: 1.05rem; line-height: 1.85; color: #3b434e;">
                            {!! $article->content !!}
                        </div>

                        <!-- Motto & Mission Highlight Banner -->
                        <div class="mss-quote-box my-4 p-4 rounded-4 text-center text-white" style="background: linear-gradient(135deg, #EB5310 0%, #FAA019 100%);">
                            <i class="fas fa-quote-left fa-2x mb-2 text-white-50"></i>
                            <h3 class="h4 text-white fw-bold mb-2 font-hindi">
                                "मिलकर करें प्रयास, खुशहाल हो समाज"
                            </h3>
                            <p class="mb-0 text-white-75 small">
                                — Matri Seva Samiti Core Philosophy | Dedicated to uplifting rural lives across Uttar Pradesh
                            </p>
                        </div>

                        <!-- Key Impact Takeaways Box -->
                        <div class="card border-0 rounded-4 p-4 my-4" style="background-color: #f8fafc; border: 1px dashed #cbd5e1 !important;">
                            <h4 class="h5 fw-bold text-dark mb-3 d-flex align-items-center">
                                <i class="fas fa-chart-line text-danger me-2"></i> Field Impact Highlights at a Glance
                            </h4>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center gap-3 p-3 bg-white rounded-3 shadow-sm">
                                        <i class="fas fa-users-cog text-danger fa-2x"></i>
                                        <div>
                                            <div class="small text-muted">Primary Focus</div>
                                            <strong class="text-dark">{{ $articleCategory }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center gap-3 p-3 bg-white rounded-3 shadow-sm">
                                        <i class="fas fa-shield-alt text-success fa-2x"></i>
                                        <div>
                                            <div class="small text-muted">Field Status</div>
                                            <strong class="text-success">Active &amp; Ongoing</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center gap-3 p-3 bg-white rounded-3 shadow-sm">
                                        <i class="fas fa-map-marked-alt text-primary fa-2x"></i>
                                        <div>
                                            <div class="small text-muted">Region</div>
                                            <strong class="text-dark">Prayagraj &amp; Bhadohi, UP</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center gap-3 p-3 bg-white rounded-3 shadow-sm">
                                        <i class="fas fa-heart text-danger fa-2x"></i>
                                        <div>
                                            <div class="small text-muted">Impact Scale</div>
                                            <strong class="text-dark">Hundreds of Rural Families</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- In-Article Donation / Volunteer Banner -->
                        <div class="card border-0 rounded-4 p-4 text-white mb-4" style="background: linear-gradient(135deg, #1E252F 0%, #2c3644 100%);">
                            <div class="row align-items-center g-3">
                                <div class="col-md-8">
                                    <span class="badge bg-danger mb-2 text-uppercase">Support This Cause</span>
                                    <h4 class="h5 text-white fw-bold mb-1">Inspired by this community transformation?</h4>
                                    <p class="text-white-50 small mb-0">
                                        Your tax-exempt contribution directly funds vocational training setups, free medicines, and digital study kits for children.
                                    </p>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <a href="{{ route('donate.index') }}" class="btn btn-danger rounded-pill px-4 py-2 fw-semibold shadow">
                                        Donate Now <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Social Share Bottom Bar -->
                        <div class="d-flex flex-wrap justify-content-between align-items-center border-top border-bottom py-3 my-4 gap-3">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-share-alt text-danger"></i>
                                <span class="fw-bold text-dark">Share This Field Update:</span>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($articleTitle . ' - ' . $articleUrl) }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-success btn-sm rounded-pill px-3" title="Share via WhatsApp">
                                    <i class="fab fa-whatsapp me-1"></i> WhatsApp
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($articleUrl) }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm rounded-pill px-3" title="Share on Facebook">
                                    <i class="fab fa-facebook-f me-1"></i> Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($articleTitle) }}&url={{ urlencode($articleUrl) }}" target="_blank" rel="noopener noreferrer" class="btn btn-outline-dark btn-sm rounded-pill px-3" title="Post on X">
                                    <i class="fab fa-x-twitter me-1"></i> X
                                </a>
                                <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill px-3 copy-link-btn" data-url="{{ $articleUrl }}" id="copyLinkBtnBottom">
                                    <i class="fas fa-copy me-1"></i> Copy Link
                                </button>
                            </div>
                        </div>

                        <!-- Previous / Next Story Navigation -->
                        <div class="row g-3 pt-2">
                            <div class="col-sm-6">
                                @if(!empty($prevArticle))
                                    @php $pSlug = $prevArticle->slug ?? $prevArticle->id; @endphp
                                    <a href="{{ route('news.detail', $pSlug) }}" class="d-flex align-items-center gap-3 p-3 rounded-3 border text-decoration-none hover-lift bg-light text-dark h-100">
                                        <i class="fas fa-chevron-left text-danger fa-lg"></i>
                                        <div class="overflow-hidden">
                                            <span class="small text-muted d-block">&larr; Previous Story</span>
                                            <strong class="small d-block text-truncate text-dark">{{ $prevArticle->title }}</strong>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{ route('news') }}" class="d-flex align-items-center gap-3 p-3 rounded-3 border text-decoration-none hover-lift bg-light text-dark h-100">
                                        <i class="fas fa-th-large text-danger fa-lg"></i>
                                        <div>
                                            <span class="small text-muted d-block">Browse All</span>
                                            <strong class="small d-block text-dark">All Field Updates</strong>
                                        </div>
                                    </a>
                                @endif
                            </div>
                            <div class="col-sm-6 text-sm-end">
                                @if(!empty($nextArticle))
                                    @php $nSlug = $nextArticle->slug ?? $nextArticle->id; @endphp
                                    <a href="{{ route('news.detail', $nSlug) }}" class="d-flex align-items-center justify-content-end gap-3 p-3 rounded-3 border text-decoration-none hover-lift bg-light text-dark h-100">
                                        <div class="text-end overflow-hidden">
                                            <span class="small text-muted d-block">Next Story &rarr;</span>
                                            <strong class="small d-block text-truncate text-dark">{{ $nextArticle->title }}</strong>
                                        </div>
                                        <i class="fas fa-chevron-right text-danger fa-lg"></i>
                                    </a>
                                @else
                                    <a href="{{ route('news') }}" class="d-flex align-items-center justify-content-end gap-3 p-3 rounded-3 border text-decoration-none hover-lift bg-light text-dark h-100">
                                        <div class="text-end">
                                            <span class="small text-muted d-block">Explore More</span>
                                            <strong class="small d-block text-dark">All Field Updates &rarr;</strong>
                                        </div>
                                        <i class="fas fa-th-large text-danger fa-lg"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </article>
                </div>

                <!-- SIDEBAR COLUMN (4 cols) -->
                <div class="col-lg-4">
                    <div class="d-flex flex-column gap-4 sticky-sidebar">
                        
                        <!-- 1. Quick Donation Widget -->
                        <div class="card border-0 rounded-4 overflow-hidden shadow-sm text-white" style="background: linear-gradient(145deg, #1a202c, #2d3748);">
                            <div class="card-body p-4 position-relative">
                                <div class="badge bg-danger mb-2 text-uppercase">Make An Impact</div>
                                <h3 class="h5 fw-bold text-white mb-2">Support Rural Communities</h3>
                                <p class="text-white-50 small mb-4">
                                    Every contribution directly supports child literacy, free medicines, and women self-help collectives.
                                </p>

                                <div class="row g-2 mb-3">
                                    <div class="col-4">
                                        <a href="{{ route('donate.index') }}?amount=500" class="btn btn-outline-light btn-sm w-100 rounded-pill fw-semibold py-2">₹500</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{ route('donate.index') }}?amount=1100" class="btn btn-danger btn-sm w-100 rounded-pill fw-bold py-2 shadow-sm">₹1,100</a>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{ route('donate.index') }}?amount=2500" class="btn btn-outline-light btn-sm w-100 rounded-pill fw-semibold py-2">₹2,500</a>
                                    </div>
                                </div>

                                <a href="{{ route('donate.index') }}" class="btn btn-danger w-100 rounded-pill py-2 fw-bold text-uppercase shadow" style="letter-spacing: 0.5px;">
                                    Donate Online &rarr;
                                </a>

                                <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top border-white border-opacity-10 small text-white-50">
                                    <span><i class="fas fa-shield-alt text-warning me-1"></i> 80G Tax Exemption</span>
                                    <span><i class="fas fa-lock text-success me-1"></i> Secure CCAvenue</span>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Recent News Updates Widget -->
                        <div class="card border-0 rounded-4 shadow-sm bg-white p-4 border">
                            <h4 class="h6 fw-bold text-dark text-uppercase border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center">
                                <span><i class="far fa-newspaper text-danger me-2"></i> Recent Field Stories</span>
                                <a href="{{ route('news') }}" class="text-danger fw-bold text-decoration-none" style="font-size: 11px;">View All</a>
                            </h4>

                            <div class="d-flex flex-column gap-3">
                                @foreach($recentNews as $rItem)
                                    @php
                                        $rSlug = $rItem->slug ?? $rItem->id;
                                        $rDate = null;
                                        if (!empty($rItem->published_date)) {
                                            $rDate = $rItem->published_date instanceof \Carbon\Carbon 
                                                ? $rItem->published_date->format('M d, Y') 
                                                : \Carbon\Carbon::parse($rItem->published_date)->format('M d, Y');
                                        }
                                    @endphp
                                    <div class="d-flex align-items-center gap-3">
                                        <a href="{{ route('news.detail', $rSlug) }}" class="flex-shrink-0 overflow-hidden rounded-3" style="width: 75px; height: 70px;">
                                            <img src="{{ asset($rItem->image ?? 'images/student1.jpeg') }}" 
                                                 alt="{{ $rItem->title }}" 
                                                 class="w-100 h-100" 
                                                 style="object-fit: cover; transition: transform 0.3s ease;">
                                        </a>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <span class="text-muted d-block mb-1" style="font-size: 11px;">
                                                <i class="flaticon-calendar text-danger me-1"></i> {{ $rDate ?? 'Recent' }}
                                            </span>
                                            <h5 class="h6 mb-0 text-truncate-2" style="font-size: 13.5px; line-height: 1.35;">
                                                <a href="{{ route('news.detail', $rSlug) }}" class="text-dark text-decoration-none hover-primary fw-semibold">
                                                    {{ $rItem->title }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- 3. Key Focus Areas Badges -->
                        <div class="card border-0 rounded-4 shadow-sm bg-white p-4 border">
                            <h4 class="h6 fw-bold text-dark text-uppercase border-bottom pb-3 mb-3">
                                <i class="fas fa-cubes text-danger me-2"></i> Our Program Sectors
                            </h4>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="{{ route('programs') }}" class="badge bg-light text-dark border p-2 text-decoration-none hover-pill">
                                    <i class="fas fa-laptop-code text-danger me-1"></i> Skill Training
                                </a>
                                <a href="{{ route('programs') }}" class="badge bg-light text-dark border p-2 text-decoration-none hover-pill">
                                    <i class="fas fa-heartbeat text-danger me-1"></i> Healthcare Camps
                                </a>
                                <a href="{{ route('programs') }}" class="badge bg-light text-dark border p-2 text-decoration-none hover-pill">
                                    <i class="fas fa-female text-danger me-1"></i> Women Empowerment
                                </a>
                                <a href="{{ route('programs') }}" class="badge bg-light text-dark border p-2 text-decoration-none hover-pill">
                                    <i class="fas fa-book-reader text-danger me-1"></i> Digital Education
                                </a>
                                <a href="{{ route('programs') }}" class="badge bg-light text-dark border p-2 text-decoration-none hover-pill">
                                    <i class="fas fa-water text-danger me-1"></i> Water &amp; Sanitation
                                </a>
                                <a href="{{ route('programs') }}" class="badge bg-light text-dark border p-2 text-decoration-none hover-pill">
                                    <i class="fas fa-solar-panel text-danger me-1"></i> Rural Solar Energy
                                </a>
                            </div>
                        </div>

                        <!-- 4. Volunteer / Contact Helpline Card -->
                        <div class="card border-0 rounded-4 shadow-sm p-4 text-center text-dark" style="background: #fff6f2; border: 1px solid #ffdcd0 !important;">
                            <div class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 55px; height: 55px; background: #EB5310; color: #fff;">
                                <i class="fas fa-phone-alt fa-lg"></i>
                            </div>
                            <h4 class="h6 fw-bold mb-1">Want to Volunteer or Partner?</h4>
                            <p class="small text-muted mb-3">
                                Join hands with Matri Seva Samiti to create measurable grassroots change.
                            </p>
                            <a href="tel:{{ preg_replace('/[^0-9]/', '', config('site.phone_primary', '919415451910')) }}" class="btn btn-outline-danger btn-sm rounded-pill mb-2 w-100 fw-bold">
                                <i class="fas fa-phone me-1"></i> Call +91 9415451910
                            </a>
                            <a href="{{ route('volunteer.index') }}" class="btn btn-danger btn-sm rounded-pill w-100 fw-bold">
                                <i class="fas fa-user-plus me-1"></i> Join as Volunteer
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RELATED NEWS STORIES (Bottom section) -->
    @if(isset($relatedNews) && $relatedNews->count() > 0)
        <section class="ul-blogs py-5 border-top" style="background-color: #fcfcfc;">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between align-items-end mb-4">
                    <div>
                        <span class="text-danger fw-bold text-uppercase" style="font-size: 13px; letter-spacing: 1px;">Discover More Updates</span>
                        <h2 class="h3 fw-bold text-dark mb-0">More Grassroots Impact Stories</h2>
                    </div>
                    <a href="{{ route('news') }}" class="btn btn-outline-danger btn-sm rounded-pill px-4 mt-2 mt-md-0 fw-semibold">
                        View All News &rarr;
                    </a>
                </div>

                <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4">
                    @foreach($relatedNews as $rel)
                        @php
                            $relSlug = $rel->slug ?? $rel->id;
                            $relCategory = $rel->category ?? ($rel->type == 'press' ? 'Press Release' : ($rel->type == 'event' ? 'Event' : 'News'));
                            $relDate = null;
                            if (!empty($rel->published_date)) {
                                $relDate = $rel->published_date instanceof \Carbon\Carbon 
                                    ? $rel->published_date->format('M d, Y') 
                                    : \Carbon\Carbon::parse($rel->published_date)->format('M d, Y');
                            }
                        @endphp
                        <div class="col">
                            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 p-0 hover-lift transition news-card">
                                <a href="{{ route('news.detail', $relSlug) }}" class="d-block overflow-hidden position-relative news-card-thumb">
                                    <img src="{{ asset($rel->image ?? 'images/student1.jpeg') }}" 
                                         alt="{{ $rel->title }}" 
                                         loading="lazy" 
                                         decoding="async" 
                                         style="height: 220px; width: 100%; object-fit: cover; transition: transform 0.4s ease;">
                                    <span class="badge bg-danger position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill text-uppercase shadow-sm" style="font-size: 11px;">
                                        {{ $relCategory }}
                                    </span>
                                </a>
                                <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                                    <div>
                                        <h3 class="h6 mb-2 text-dark fw-bold line-clamp-2" style="line-height: 1.4;">
                                            <a href="{{ route('news.detail', $relSlug) }}" class="text-dark text-decoration-none hover-primary">
                                                {{ $rel->title }}
                                            </a>
                                        </h3>
                                        <p class="text-muted small mb-3 line-clamp-2">
                                            {{ $rel->excerpt ?? Str::limit(strip_tags($rel->content), 100) }}
                                        </p>
                                    </div>
                                    <div class="border-top pt-3 text-muted small d-flex justify-content-between align-items-center">
                                        <span>
                                            <i class="flaticon-calendar text-danger me-1"></i> 
                                            {{ $relDate ?? 'Recent Update' }}
                                        </span>
                                        <a href="{{ route('news.detail', $relSlug) }}" class="text-danger fw-bold text-decoration-none news-readmore-link">
                                            Read More &rarr;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</main>

<!-- Toast Notification for Copied Link -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080;">
    <div id="copyToast" class="toast align-items-center text-bg-dark border-0 rounded-pill px-3 py-1 shadow" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex align-items-center">
            <div class="toast-body small">
                <i class="fas fa-check-circle text-success me-2"></i> Article link copied to clipboard!
            </div>
        </div>
    </div>
</div>

<style>
.mss-article-card {
    border: 1px solid rgba(0,0,0,0.07) !important;
}
.mss-article-body p {
    margin-bottom: 1.4rem;
}
.mss-article-body h2, .mss-article-body h3, .mss-article-body h4 {
    color: #1a1e24;
    font-weight: 700;
    margin-top: 1.8rem;
    margin-bottom: 0.9rem;
}
.mss-article-body ul, .mss-article-body ol {
    margin-bottom: 1.4rem;
    padding-left: 1.5rem;
}
.mss-article-body li {
    margin-bottom: 0.5rem;
}
.mss-article-body blockquote {
    background-color: #fff9f6;
    border-left: 4px solid var(--ul-primary, #EB5310);
    padding: 1.25rem 1.5rem;
    margin: 1.8rem 0;
    border-radius: 0.5rem;
    font-style: italic;
    color: #2c3644;
    font-weight: 500;
}
.font-hindi {
    font-family: 'Noto Sans Devanagari', 'Quicksand', sans-serif !important;
}
.share-btn {
    width: 34px;
    height: 34px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    transition: all 0.2s ease;
}
.share-btn:hover {
    transform: translateY(-2px);
}
.hover-pill:hover {
    background-color: var(--ul-primary, #EB5310) !important;
    color: #fff !important;
    border-color: var(--ul-primary, #EB5310) !important;
}
.text-truncate-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.sticky-sidebar {
    position: sticky;
    top: 90px;
}
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
.hover-primary:hover {
    color: var(--ul-primary, #EB5310) !important;
}
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const copyBtns = document.querySelectorAll('.copy-link-btn');
    const toastEl = document.getElementById('copyToast');
    const toast = toastEl && typeof bootstrap !== 'undefined' ? new bootstrap.Toast(toastEl, { delay: 2500 }) : null;

    copyBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const url = this.getAttribute('data-url') || window.location.href;
            if (navigator.clipboard) {
                navigator.clipboard.writeText(url).then(() => {
                    if (toast) {
                        toast.show();
                    } else {
                        alert('Article link copied to clipboard!');
                    }
                }).catch(() => {
                    prompt('Copy this link:', url);
                });
            } else {
                prompt('Copy this link:', url);
            }
        });
    });
});
</script>
@endpush
@endsection
