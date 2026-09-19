@extends('layouts.app')

@section('title', 'Artisan Store — Matri Srijani | Handcrafted & Natural Products')

@section('content')
<main>
    <!-- BREADCRUMBS SECTION START -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Artisan Products &amp; Rural Store</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Products</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMBS SECTION END -->

    <!-- ULTRA PREMIUM MATRI SRIJANI ARTISAN PRODUCT STORE -->
    <div class="srijani-master-wrapper">
        <!-- Ambient Background Lighting -->
        <div class="srijani-ambient-glow glow-1"></div>
        <div class="srijani-ambient-glow glow-2"></div>
        <div class="srijani-ambient-glow glow-3"></div>

        <!-- 1. HERO SHOWCASE SECTION -->
        <section class="srijani-hero-section">
            <div class="srijani-container">
                <div class="srijani-hero-glass-box">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-7">
                            <div class="srijani-hero-content">
                                <!-- Live Store Pill -->
                                <div class="srijani-live-pill mb-3">
                                    <span class="srijani-pulse-dot"></span>
                                    <span>Matri Srijani • Rural Artisan &amp; SHG Store</span>
                                </div>

                            <h1 class="srijani-hero-headline">
                                Authentic Indian Craftsmanship &amp; <span class="text-gradient-gold">Natural Products</span>
                            </h1>

                            <p class="srijani-hero-subtext">
                                Every handcrafted item tells a story of dignity, resilience, and artistry. Hand-stitched, wheel-thrown, and organically prepared by rural women self-help groups under <strong>{{ config('site.site_name', 'Matri Seva Samiti') }}</strong>.
                            </p>

                            @php
                                $waPhone = preg_replace('/[^0-9]/', '', (string) config('site.contact_phone_primary', config('site.phone_primary', '919415451910')));
                                if (strlen($waPhone) === 10) $waPhone = '91' . $waPhone;
                            @endphp

                            <!-- Hero CTAs -->
                            <div class="d-flex flex-wrap gap-3 align-items-center mb-4">
                                <a href="#products-catalog" class="srijani-cta-gold">
                                    <span>Explore Products</span>
                                    <i class="bi bi-bag-check-fill ms-2"></i>
                                </a>
                                <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode('Namaste ' . config('site.site_name', 'Matri Seva Samiti') . ', I would like to inquire about your handcrafted products and custom orders.') }}" target="_blank" rel="noopener noreferrer" class="srijani-cta-whatsapp">
                                    <i class="bi bi-whatsapp fs-5"></i>
                                    <span>WhatsApp Helpline</span>
                                </a>
                            </div>

                            <!-- Trust Metric Highlights -->
                            <div class="srijani-hero-metrics">
                                <div class="metric-item">
                                    <span class="metric-num">500+</span>
                                    <span class="metric-label">SHG Artisans</span>
                                </div>
                                <div class="metric-divider"></div>
                                <div class="metric-item">
                                    <span class="metric-num">100%</span>
                                    <span class="metric-label">Handmade &amp; Eco</span>
                                </div>
                                <div class="metric-divider"></div>
                                <div class="metric-item">
                                    <span class="metric-num">4.9 ★</span>
                                    <span class="metric-label">Quality Rating</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 text-center">
                        <div class="srijani-hero-visual">
                            <div class="rotating-halo"></div>
                            <div class="floating-badge-top">
                                <i class="bi bi-heart-fill text-danger me-1"></i> Fair Trade SHG
                            </div>
                            <div class="srijani-hero-emblem-card">
                                <img src="{{ asset(config('site.site_logo', config('site.logo', 'logo/Logo.png'))) }}" alt="Matri Srijani Logo" class="srijani-emblem-img">
                                <div class="emblem-meta mt-3">
                                    <h5 class="mb-0 fw-bold" style="color: #7d241f; font-family: Georgia, serif;">Matri Srijani</h5>
                                    <small class="text-muted">मातृ सृजनी • स्वावलंबन से स्वाभिमान</small>
                                </div>
                            </div>
                            <div class="floating-badge-bottom">
                                <i class="bi bi-whatsapp text-success me-1"></i> Easy 1-Click Order
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. WHY SHOP WITH US (4 FEATURE PILLARS) -->
    <section class="srijani-pillars-section">
        <div class="srijani-container">
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 g-4">
                <div class="col">
                    <div class="pillar-card">
                        <div class="pillar-icon bg-icon-amber">
                            <i class="bi bi-gem"></i>
                        </div>
                        <h5 class="pillar-title">100% Handcrafted</h5>
                        <p class="pillar-desc">Artisanal creations made with ancestral skills, natural fibers, and zero chemical additives.</p>
                    </div>
                </div>

                <div class="col">
                    <div class="pillar-card">
                        <div class="pillar-icon bg-icon-emerald">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <h5 class="pillar-title">Direct WhatsApp Order</h5>
                        <p class="pillar-desc">No complicated cart checkout. Direct 1-on-1 WhatsApp chat to customize color, size, and address.</p>
                    </div>
                </div>

                <div class="col">
                    <div class="pillar-card">
                        <div class="pillar-icon bg-icon-blue">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h5 class="pillar-title">Pan-India Delivery</h5>
                        <p class="pillar-desc">Safe, eco-friendly packaging and reliable courier dispatch directly to your doorstep.</p>
                    </div>
                </div>

                <div class="col">
                    <div class="pillar-card">
                        <div class="pillar-icon bg-icon-rose">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <h5 class="pillar-title">Empower Rural Women</h5>
                        <p class="pillar-desc">100% of profit margins go directly to rural women artisans, funding vocational training and family support.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. HOW TO ORDER IN 3 EASY STEPS -->
    <section class="srijani-steps-section py-4">
        <div class="srijani-container">
            <div class="srijani-steps-box">
                <div class="text-center mb-4">
                    <span class="srijani-mini-badge">Simple Ordering Process</span>
                    <h3 class="fw-bold mt-1" style="font-family: Georgia, serif; color: #5d1c18;">How WhatsApp Ordering Works</h3>
                </div>
                <div class="row g-4 text-center">
                    <div class="col-md-4">
                        <div class="step-card">
                            <div class="step-circle">1</div>
                            <h6 class="fw-bold mb-1">Pick Your Product</h6>
                            <p class="small text-muted mb-0">Browse our catalogue below and choose your favorite handcrafted item.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="step-card">
                            <div class="step-circle">2</div>
                            <h6 class="fw-bold mb-1">Tap "Buy on WhatsApp"</h6>
                            <p class="small text-muted mb-0">It automatically opens a pre-filled chat with product title and price.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="step-card">
                            <div class="step-circle">3</div>
                            <h6 class="fw-bold mb-1">Confirm &amp; Receive</h6>
                            <p class="small text-muted mb-0">Share your delivery address, pay via UPI, and receive tracking details.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. PRODUCT CATALOGUE & FILTER SECTION -->
    <section class="srijani-catalog-section" id="products-catalog">
        <div class="srijani-container">
            <!-- Section Header -->
            <div class="srijani-section-title-wrap text-center mb-4">
                <span class="srijani-mini-badge">Curated Handcraft Collection</span>
                <h2 class="srijani-catalog-heading">Artisan Products &amp; Store</h2>
                <p class="srijani-catalog-sub">Click any item to view specifications or order directly via WhatsApp.</p>
            </div>

            <!-- Sticky Filter & Search Toolbar -->
            <div class="srijani-toolbar-box mb-5">
                <div class="row g-3 align-items-center justify-content-between">
                    <div class="col-lg-8">
                        <div class="srijani-category-pills" id="srijaniCategoryNav">
                            <button type="button" class="srijani-cat-btn active" data-filter="all">
                                <i class="bi bi-grid-fill me-1"></i> All Items ({{ $products->count() }})
                            </button>
                            @foreach($categories as $cat)
                                <button type="button" class="srijani-cat-btn" data-filter="{{ Str::slug($cat) }}">
                                    {{ $cat }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="srijani-search-field">
                            <i class="bi bi-search"></i>
                            <input type="text" id="srijaniLiveSearch" placeholder="Search craft, bags, kurti, pottery...">
                        </div>
                    </div>
                </div>
            </div>

            <!-- PRODUCT CARDS GRID -->
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4" id="srijaniGrid">
                @forelse($products as $product)
                    @php
                        $catSlug = Str::slug($product->category ?? 'general');
                    @endphp
                    <div class="col srijani-item-col" data-category="{{ $catSlug }}" data-title="{{ strtolower($product->name) }}">
                        <div class="srijani-craft-card h-100">
                            <!-- Image Frame -->
                            <div class="craft-img-frame">
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="craft-main-photo">
                                @else
                                    <div class="craft-no-photo">
                                        <i class="bi bi-bag-heart"></i>
                                    </div>
                                @endif

                                <!-- Category Badge -->
                                @if($product->category)
                                    <span class="craft-badge-cat">
                                        {{ $product->category }}
                                    </span>
                                @endif

                                <!-- Discount Badge -->
                                @if($product->discount_percent)
                                    <span class="craft-badge-discount">
                                        {{ $product->discount_percent }}% OFF
                                    </span>
                                @endif

                                <!-- Quick View Floating Overlay -->
                                <button type="button" class="craft-quickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal{{ $product->id ?? $loop->index }}" title="Quick Details">
                                    <i class="bi bi-eye-fill"></i>
                                </button>
                            </div>

                            <!-- Card Body -->
                            <div class="craft-card-content">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <!-- Star Ratings -->
                                    <div class="craft-rating">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <span>5.0</span>
                                    </div>
                                    @if($product->sku)
                                        <span class="craft-sku">#{{ $product->sku }}</span>
                                    @endif
                                </div>

                                <!-- Title -->
                                <h3 class="craft-title">{{ $product->name }}</h3>

                                <!-- Description -->
                                <p class="craft-description">
                                    {{ $product->short_description ?? Str::limit(strip_tags($product->description), 110) }}
                                </p>

                                <!-- Price Bar -->
                                <div class="craft-price-bar">
                                    <div class="price-wrap">
                                        <span class="price-val">₹{{ number_format($product->price, 2) }}</span>
                                        @if($product->original_price && $product->original_price > $product->price)
                                            <del class="price-mrp">₹{{ number_format($product->original_price, 2) }}</del>
                                        @endif
                                    </div>
                                    @if($product->original_price && $product->original_price > $product->price)
                                        <span class="save-tag">Save ₹{{ number_format($product->original_price - $product->price, 0) }}</span>
                                    @endif
                                </div>

                                <!-- Action Buttons -->
                                <div class="craft-actions-row">
                                    <a href="{{ $product->whatsapp_url }}" target="_blank" rel="noopener noreferrer" class="btn-whatsapp-order">
                                        <i class="bi bi-whatsapp fs-5"></i>
                                        <span>Buy on WhatsApp</span>
                                    </a>
                                    <button type="button" class="btn-specs-view" data-bs-toggle="modal" data-bs-target="#quickModal{{ $product->id ?? $loop->index }}">
                                        <i class="bi bi-info-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PRODUCT DETAILS MODAL -->
                    <div class="modal fade" id="quickModal{{ $product->id ?? $loop->index }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content srijani-modal-box">
                                <div class="modal-header border-0 pb-0">
                                    <span class="srijani-mini-badge">Artisan Craft Details</span>
                                    <button type="button" class="srijani-modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                                </div>
                                <div class="modal-body p-4 pt-2">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-md-5">
                                            <div class="modal-img-container">
                                                @if($product->image)
                                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="modal-product-img">
                                                @else
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center fs-1 text-muted">
                                                        <i class="bi bi-bag-heart"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <span class="badge bg-light text-dark border px-3 py-1 rounded-pill mb-2">{{ $product->category ?? 'Handmade Craft' }}</span>
                                            <h3 class="modal-title mb-2">{{ $product->name }}</h3>
                                            
                                            <div class="d-flex align-items-baseline gap-2 mb-3">
                                                <span class="modal-price">₹{{ number_format($product->price, 2) }}</span>
                                                @if($product->original_price && $product->original_price > $product->price)
                                                    <del class="text-muted fs-6">₹{{ number_format($product->original_price, 2) }}</del>
                                                    <span class="badge bg-danger text-white rounded-pill px-2 py-1 small">{{ $product->discount_percent }}% OFF</span>
                                                @endif
                                            </div>

                                            <div class="modal-desc-text mb-4">
                                                {{ $product->description ?? $product->short_description }}
                                            </div>

                                            <div class="modal-assurance-box mb-4">
                                                <i class="bi bi-shield-check text-success fs-4"></i>
                                                <div>
                                                    <strong class="d-block text-dark">Verified SHG Quality</strong>
                                                    <small class="text-muted">Chat with us on WhatsApp for size choices, custom colors, bulk inquiry, and UPI QR code.</small>
                                                </div>
                                            </div>

                                            <div class="d-flex gap-2 flex-wrap">
                                                <a href="{{ $product->whatsapp_url }}" target="_blank" rel="noopener noreferrer" class="btn-whatsapp-order flex-grow-1 justify-content-center py-2 px-4">
                                                    <i class="bi bi-whatsapp fs-5"></i>
                                                    <span>Order via WhatsApp</span>
                                                </a>
                                                <button type="button" class="btn btn-light border rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="srijani-empty-notice">
                            <i class="bi bi-bag-x fs-1 text-muted mb-3 d-block opacity-50"></i>
                            <h4 class="fw-bold text-dark">No Products Available Currently</h4>
                            <p class="text-muted">Our artisans are creating new batches. Please contact us on WhatsApp for custom orders.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 5. CORPORATE & BULK ORDERS SHOWCASE -->
    <section class="srijani-bulk-section pb-5">
        <div class="srijani-container">
            <div class="srijani-bulk-banner">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-8">
                        <span class="srijani-mini-badge bg-warning text-dark mb-2">Corporate Gifting &amp; Bulk Orders</span>
                        <h2 class="bulk-heading">Customized Eco-Friendly Gifting &amp; Event Kits</h2>
                        <p class="bulk-sub">
                            Looking for sustainable conference bags, custom jute files, festive hampers, or handmade terracotta gifts with your organization logo? Our women SHGs produce customized bulk orders with high precision and fair pricing.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode('Hello ' . config('site.site_name', 'Matri Seva Samiti') . ', I would like to inquire about Bulk / Corporate product orders.') }}" target="_blank" rel="noopener noreferrer" class="bulk-cta-btn">
                            <i class="bi bi-whatsapp fs-4"></i>
                            <span>Inquire on WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- ULTRA MODERN CSS STYLING (Inspired by Matrikala Matrisrijani & Luxury Indian Craft Aesthetics) -->
<style>
:root {
    --mss-maroon: #7d241f;
    --mss-maroon-dark: #581814;
    --mss-saffron: #e58a17;
    --mss-gold: #c99a3b;
    --mss-cream: #fffaf2;
    --mss-paper: #ffffff;
    --mss-ink: #2b1d19;
    --mss-muted: #736159;
    --mss-line: rgba(125, 36, 31, 0.12);
    --mss-shadow: 0 20px 60px rgba(61, 35, 20, 0.10);
    --mss-radius: 26px;
}

.srijani-master-wrapper {
    background-color: var(--mss-cream);
    background-image: 
        radial-gradient(circle at 10% 15%, rgba(229, 138, 23, 0.08), transparent 30%),
        radial-gradient(circle at 90% 45%, rgba(125, 36, 31, 0.08), transparent 35%),
        radial-gradient(circle at 30% 85%, rgba(201, 154, 59, 0.06), transparent 30%);
    color: var(--mss-ink);
    position: relative;
    overflow-x: hidden;
    font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
}

.srijani-container {
    width: min(1180px, 92%);
    margin: auto;
}

/* Ambient Glowing Orbs */
.srijani-ambient-glow {
    position: absolute;
    width: 250px;
    height: 250px;
    border-radius: 50%;
    filter: blur(60px);
    opacity: 0.18;
    pointer-events: none;
    z-index: 0;
}
.glow-1 { top: 5%; left: -80px; background: var(--mss-saffron); }
.glow-2 { top: 40%; right: -90px; background: var(--mss-maroon); }
.glow-3 { bottom: 10%; left: 20%; background: var(--mss-gold); }

/* 1. HERO GLASS BOX */
.srijani-hero-section {
    padding: 40px 0 25px;
    position: relative;
    z-index: 1;
}
.srijani-hero-glass-box {
    background: rgba(255, 255, 255, 0.86);
    backdrop-filter: blur(18px);
    border: 1px solid rgba(255, 255, 255, 0.95);
    box-shadow: var(--mss-shadow);
    border-radius: 38px;
    padding: 50px;
    position: relative;
    overflow: hidden;
}
.srijani-live-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff3e0;
    border: 1px solid rgba(229, 138, 23, 0.3);
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 0.76rem;
    font-weight: 800;
    color: #a04c00;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}
.srijani-pulse-dot {
    width: 8px;
    height: 8px;
    background: #25D366;
    border-radius: 50%;
    box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
    animation: pulseGlow 1.8s infinite;
}
@keyframes pulseGlow {
    0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
    70% { box-shadow: 0 0 0 8px rgba(37, 211, 102, 0); }
    100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
}

.srijani-hero-headline {
    font: 700 clamp(2.4rem, 4.8vw, 3.8rem)/1.1 Georgia, serif;
    color: var(--mss-maroon-dark);
    margin: 12px 0 16px;
    letter-spacing: -0.02em;
}
.text-gradient-gold {
    background: linear-gradient(135deg, var(--mss-maroon), #d97706);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.srijani-hero-subtext {
    color: var(--mss-muted);
    font-size: 1.05rem;
    line-height: 1.75;
    margin-bottom: 24px;
}

/* CTA Buttons */
.srijani-cta-gold {
    background: linear-gradient(135deg, #e58a17, #f59e0b);
    color: #2b1708 !important;
    font-weight: 800;
    padding: 13px 26px;
    border-radius: 999px;
    text-decoration: none;
    box-shadow: 0 8px 25px rgba(229, 138, 23, 0.3);
    transition: 0.25s all;
    display: inline-flex;
    align-items: center;
}
.srijani-cta-gold:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(229, 138, 23, 0.4);
}

.srijani-cta-whatsapp {
    background: #25D366;
    color: #ffffff !important;
    font-weight: 800;
    padding: 13px 26px;
    border-radius: 999px;
    text-decoration: none;
    box-shadow: 0 8px 25px rgba(37, 211, 102, 0.3);
    transition: 0.25s all;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.srijani-cta-whatsapp:hover {
    background: #1eb855;
    transform: translateY(-3px);
    box-shadow: 0 12px 32px rgba(37, 211, 102, 0.4);
}

/* Metrics */
.srijani-hero-metrics {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-top: 24px;
    flex-wrap: wrap;
}
.metric-item {
    display: flex;
    flex-direction: column;
}
.metric-num {
    font: 800 1.35rem Georgia, serif;
    color: var(--mss-maroon);
}
.metric-label {
    font-size: 0.78rem;
    color: var(--mss-muted);
    font-weight: 600;
}
.metric-divider {
    width: 1px;
    height: 30px;
    background: var(--mss-line);
}

/* Hero Emblem & Halo Art */
.srijani-hero-visual {
    position: relative;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}
.rotating-halo {
    position: absolute;
    width: 290px;
    height: 290px;
    border-radius: 50%;
    border: 2px dashed rgba(125, 36, 31, 0.25);
    box-shadow: 0 0 0 18px rgba(229, 138, 23, 0.06), 0 0 0 36px rgba(125, 36, 31, 0.03);
    animation: rotateSlow 24s linear infinite;
}
@keyframes rotateSlow {
    to { transform: rotate(360deg); }
}
.srijani-hero-emblem-card {
    position: relative;
    z-index: 2;
    background: #ffffff;
    border-radius: 34px;
    padding: 32px;
    box-shadow: 0 20px 50px rgba(90, 35, 20, 0.16);
    border: 1px solid rgba(125, 36, 31, 0.1);
}
.srijani-emblem-img {
    width: 130px;
    height: 130px;
    object-fit: contain;
}
.floating-badge-top {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 3;
    background: #ffffff;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 0.78rem;
    font-weight: 800;
    color: var(--mss-maroon);
    border: 1px solid var(--mss-line);
}
.floating-badge-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    z-index: 3;
    background: #ffffff;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    padding: 6px 14px;
    border-radius: 999px;
    font-size: 0.78rem;
    font-weight: 800;
    color: #1a7f37;
    border: 1px solid rgba(37, 211, 102, 0.3);
}

/* 2. PILLAR CARDS */
.srijani-pillars-section {
    padding: 35px 0 20px;
    position: relative;
    z-index: 1;
}
.pillar-card {
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid var(--mss-line);
    border-radius: 22px;
    padding: 24px;
    box-shadow: 0 10px 30px rgba(61, 35, 20, 0.05);
    transition: 0.3s transform, 0.3s box-shadow;
    height: 100%;
}
.pillar-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 45px rgba(61, 35, 20, 0.1);
}
.pillar-icon {
    width: 52px;
    height: 52px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    margin-bottom: 16px;
}
.bg-icon-amber { background: #fef3c7; color: #d97706; }
.bg-icon-emerald { background: #d1fae5; color: #059669; }
.bg-icon-blue { background: #dbeafe; color: #2563eb; }
.bg-icon-rose { background: #ffe4e6; color: #e11d48; }
.pillar-title {
    font: 700 1.15rem Georgia, serif;
    color: var(--mss-maroon-dark);
    margin-bottom: 8px;
}
.pillar-desc {
    color: var(--mss-muted);
    font-size: 0.88rem;
    line-height: 1.6;
    margin: 0;
}

/* 3. ORDERING STEPS */
.srijani-steps-box {
    background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(255, 248, 238, 0.95));
    border: 1px solid var(--mss-line);
    border-radius: 28px;
    padding: 30px;
    box-shadow: 0 12px 35px rgba(61, 35, 20, 0.06);
}
.srijani-mini-badge {
    display: inline-flex;
    background: rgba(125, 36, 31, 0.1);
    color: var(--mss-maroon);
    font-weight: 800;
    font-size: 0.72rem;
    padding: 4px 12px;
    border-radius: 999px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
}
.step-circle {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: var(--mss-maroon);
    color: #ffffff;
    font: 800 1.2rem Georgia, serif;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 12px;
    box-shadow: 0 6px 16px rgba(125, 36, 31, 0.25);
}

/* 4. PRODUCT CATALOGUE & FILTER BAR */
.srijani-catalog-section {
    padding: 45px 0 30px;
    position: relative;
    z-index: 1;
}
.srijani-catalog-heading {
    font: 700 clamp(2rem, 4vw, 2.8rem) Georgia, serif;
    color: var(--mss-maroon-dark);
    margin: 8px 0 6px;
}
.srijani-catalog-sub {
    color: var(--mss-muted);
    font-size: 1rem;
}

/* Filter Bar */
.srijani-toolbar-box {
    background: rgba(255, 255, 255, 0.92);
    border: 1px solid var(--mss-line);
    border-radius: 24px;
    padding: 14px 20px;
    box-shadow: 0 8px 30px rgba(61, 35, 20, 0.05);
}
.srijani-category-pills {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.srijani-cat-btn {
    border: 1px solid var(--mss-line);
    background: #ffffff;
    color: var(--mss-maroon);
    padding: 8px 18px;
    border-radius: 999px;
    font-weight: 800;
    font-size: 0.86rem;
    transition: 0.2s all;
    cursor: pointer;
}
.srijani-cat-btn:hover {
    background: #fdf6ec;
}
.srijani-cat-btn.active {
    background: var(--mss-maroon);
    color: #ffffff;
    border-color: var(--mss-maroon);
    box-shadow: 0 4px 14px rgba(125, 36, 31, 0.25);
}
.srijani-search-field {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 999px;
    padding: 8px 16px;
}
.srijani-search-field input {
    border: 0;
    background: transparent;
    outline: none;
    font-size: 0.88rem;
    width: 100%;
}
.srijani-search-field i {
    color: var(--mss-muted);
}

/* PRODUCT CARD STYLES */
.srijani-craft-card {
    background: #ffffff;
    border: 1px solid var(--mss-line);
    border-radius: 28px;
    box-shadow: 0 12px 35px rgba(61, 35, 20, 0.07);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: 0.35s transform, 0.35s box-shadow;
}
.srijani-craft-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 24px 60px rgba(61, 35, 20, 0.16);
}
.craft-img-frame {
    position: relative;
    height: 260px;
    background: #f4ede4;
    overflow: hidden;
}
.craft-main-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: 0.6s transform ease;
}
.srijani-craft-card:hover .craft-main-photo {
    transform: scale(1.08);
}
.craft-no-photo {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3.5rem;
    color: var(--mss-muted);
    opacity: 0.3;
}
.craft-badge-cat {
    position: absolute;
    top: 14px;
    left: 14px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(8px);
    padding: 5px 12px;
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 800;
    color: var(--mss-maroon);
    box-shadow: 0 4px 10px rgba(0,0,0,0.06);
}
.craft-badge-discount {
    position: absolute;
    top: 14px;
    right: 14px;
    background: #e11d48;
    color: #ffffff;
    padding: 5px 10px;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 900;
}
.craft-quickview-btn {
    position: absolute;
    bottom: 14px;
    right: 14px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 0;
    background: rgba(255, 255, 255, 0.95);
    color: var(--mss-maroon);
    box-shadow: 0 6px 15px rgba(0,0,0,0.12);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.25s all;
    opacity: 0.9;
}
.craft-quickview-btn:hover {
    transform: scale(1.15);
    background: #ffffff;
}

.craft-card-content {
    padding: 24px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1;
}
.craft-rating {
    display: flex;
    align-items: center;
    gap: 2px;
    color: #f59e0b;
    font-size: 0.8rem;
}
.craft-rating span {
    color: var(--mss-muted);
    font-size: 0.78rem;
    font-weight: 700;
    margin-left: 4px;
}
.craft-sku {
    font-size: 0.72rem;
    color: var(--mss-muted);
    font-weight: 600;
}
.craft-title {
    font: 700 1.28rem Georgia, serif;
    color: var(--mss-maroon-dark);
    margin: 0 0 8px;
    line-height: 1.35;
    min-height: 48px;
}
.craft-description {
    color: var(--mss-muted);
    font-size: 0.86rem;
    line-height: 1.6;
    margin-bottom: 18px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 40px;
}

/* Price Bar */
.craft-price-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
    padding-bottom: 14px;
    border-bottom: 1px solid var(--mss-line);
}
.price-wrap {
    display: flex;
    align-items: baseline;
    gap: 8px;
}
.price-val {
    font: 800 1.45rem Georgia, serif;
    color: var(--mss-maroon);
}
.price-mrp {
    font-size: 0.88rem;
    color: #94a3b8;
}
.save-tag {
    font-size: 0.75rem;
    font-weight: 800;
    color: #16a34a;
    background: #dcfce7;
    padding: 3px 8px;
    border-radius: 6px;
}

/* Actions */
.craft-actions-row {
    display: flex;
    gap: 8px;
}
.btn-whatsapp-order {
    flex: 1;
    background: linear-gradient(135deg, #25D366, #128C7E);
    color: #ffffff !important;
    padding: 10px 18px;
    border-radius: 999px;
    font-weight: 800;
    font-size: 0.92rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    box-shadow: 0 6px 18px rgba(37, 211, 102, 0.28);
    transition: 0.25s all;
}
.btn-whatsapp-order:hover {
    background: linear-gradient(135deg, #1fa851, #0d7065);
    transform: translateY(-2px);
    box-shadow: 0 10px 24px rgba(37, 211, 102, 0.38);
}
.btn-specs-view {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    border: 1px solid var(--mss-line);
    background: #f8fafc;
    color: var(--mss-maroon);
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.2s all;
}
.btn-specs-view:hover {
    background: #ffffff;
    transform: scale(1.08);
}

/* MODAL STYLING */
.srijani-modal-box {
    background: #fffcf8 !important;
    border-radius: 32px !important;
    box-shadow: 0 30px 90px rgba(0, 0, 0, 0.28) !important;
    border: 1px solid var(--mss-line) !important;
}
.srijani-modal-close {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 0;
    background: #f2e8df;
    color: var(--mss-maroon);
    font-size: 1.4rem;
    line-height: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
.modal-img-container {
    height: 320px;
    border-radius: 24px;
    overflow: hidden;
    background: #f3e9dd;
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
}
.modal-product-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.modal-title {
    font: 700 1.65rem Georgia, serif;
    color: var(--mss-maroon-dark);
}
.modal-price {
    font: 800 1.7rem Georgia, serif;
    color: #16a34a;
}
.modal-desc-text {
    color: var(--mss-muted);
    font-size: 0.9rem;
    line-height: 1.7;
    white-space: pre-line;
    max-height: 170px;
    overflow-y: auto;
}
.modal-assurance-box {
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-radius: 16px;
    padding: 12px 16px;
    display: flex;
    gap: 12px;
    align-items: center;
}

/* 5. BULK BANNER */
.srijani-bulk-banner {
    background: linear-gradient(135deg, #581814 0%, #872822 60%, #b43e35 100%);
    border-radius: 36px;
    padding: 46px;
    box-shadow: 0 20px 60px rgba(88, 24, 20, 0.28);
    position: relative;
    overflow: hidden;
}
.bulk-heading {
    font: 700 clamp(1.8rem, 3.2vw, 2.5rem) Georgia, serif;
    color: #ffffff;
    margin: 8px 0;
}
.bulk-sub {
    color: rgba(255, 255, 255, 0.82);
    font-size: 1.05rem;
    line-height: 1.7;
}
.bulk-cta-btn {
    background: linear-gradient(135deg, #e58a17, #f59e0b);
    color: #2b1708 !important;
    font-weight: 800;
    padding: 15px 30px;
    border-radius: 999px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
    transition: 0.25s all;
}
.bulk-cta-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.35);
}

.srijani-empty-notice {
    background: #ffffff;
    border: 2px dashed var(--mss-line);
    border-radius: 28px;
    padding: 50px 20px;
    max-width: 600px;
    margin: auto;
}

/* Responsive */
@media (max-width: 991px) {
    .srijani-hero-glass-box {
        padding: 30px;
    }
    .srijani-hero-visual {
        margin-top: 20px;
    }
    .rotating-halo {
        width: 220px;
        height: 220px;
    }
}
@media (max-width: 767px) {
    .srijani-hero-glass-box {
        padding: 24px;
        border-radius: 28px;
    }
    .srijani-bulk-banner {
        padding: 28px;
        border-radius: 28px;
    }
    .srijani-category-pills {
        overflow-x: auto;
        padding-bottom: 6px;
    }
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const catBtns = document.querySelectorAll('.srijani-cat-btn');
    const searchInput = document.getElementById('srijaniLiveSearch');
    const itemCols = document.querySelectorAll('.srijani-item-col');

    let currentCat = 'all';
    let currentSearch = '';

    function applyFilters() {
        itemCols.forEach(col => {
            const cat = col.getAttribute('data-category') || '';
            const title = col.getAttribute('data-title') || '';

            const matchesCategory = (currentCat === 'all' || cat === currentCat);
            const matchesQuery = (currentSearch === '' || title.includes(currentSearch));

            if (matchesCategory && matchesQuery) {
                col.style.display = 'block';
            } else {
                col.style.display = 'none';
            }
        });
    }

    catBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            catBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            currentCat = this.getAttribute('data-filter');
            applyFilters();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            currentSearch = e.target.value.toLowerCase().trim();
            applyFilters();
        });
    }
});
</script>
@endpush
</main>
@endsection
