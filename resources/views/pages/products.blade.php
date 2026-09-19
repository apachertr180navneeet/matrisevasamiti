@extends('layouts.app')

@section('title', 'Matri Srijani — मातृ सृजनी • Handcrafted Products & Organic Store')

@section('content')
<!-- MATRI SRIJANI ARTISAN PRODUCT PAGE (Design based on Matrikala Matrisrijani) -->
<div class="srijani-page-wrapper">
    <!-- Ambient Floating Orbs -->
    <div class="srijani-floating-orb orb-a"></div>
    <div class="srijani-floating-orb orb-b"></div>

    <!-- HERO SECTION -->
    <section class="srijani-hero">
        <div class="srijani-container">
            <div class="srijani-hero-card">
                <div class="srijani-hero-copy">
                    <span class="srijani-kicker">✦ Inspired by her • Created for tomorrow</span>
                    <h1 class="srijani-hero-title">Matri Srijani</h1>
                    <p class="srijani-hero-desc">
                        A premium digital home for authentic Indian craftsmanship, natural wellness products, and women-led rural creativity under Matri Seva Samiti.
                    </p>
                    <div class="srijani-hero-actions">
                        <a href="#products-catalog" class="srijani-btn srijani-btn-gold">
                            <span>Explore Collection</span>
                            <i class="bi bi-arrow-down-right"></i>
                        </a>
                        <a href="https://wa.me/919415451910?text={{ urlencode('Namaste Matri Seva Samiti, I would like to inquire about your handcrafted products and custom orders.') }}" target="_blank" rel="noopener noreferrer" class="srijani-btn srijani-btn-secondary">
                            <i class="bi bi-whatsapp text-success me-1"></i> WhatsApp Helpline
                        </a>
                    </div>
                    <div class="srijani-hero-stats">
                        <span><b>01</b> Heritage Craft</span>
                        <span><b>02</b> 100% Handmade</span>
                        <span><b>03</b> WhatsApp Ordering</span>
                    </div>
                </div>

                <div class="srijani-hero-art">
                    <div class="srijani-hero-ring"></div>
                    <div class="srijani-hero-logo-box">
                        <img src="{{ asset(config('site.site_logo', config('site.logo', 'logo/Logo.png'))) }}" alt="Matri Srijani Logo" class="srijani-hero-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STORY & MISSION 3-CARD GRID -->
    <section class="srijani-section pt-2">
        <div class="srijani-container">
            <div class="srijani-section-head">
                <span class="srijani-kicker">Our Story</span>
                <h2>Culture, Craft &amp; Community</h2>
            </div>
            <div class="srijani-info-grid">
                <article class="srijani-info-card">
                    <span class="srijani-card-number">01</span>
                    <h3>Handmade Heritage</h3>
                    <p>Every product is hand-crafted with ancestral techniques by self-help group women, celebrating rich Indian traditions and sustainability.</p>
                </article>
                <article class="srijani-info-card">
                    <span class="srijani-card-number">02</span>
                    <h3>Vision</h3>
                    <p>To establish economic self-reliance for rural women artisans through fair wages, market access, and dignified vocational livelihoods.</p>
                </article>
                <article class="srijani-info-card">
                    <span class="srijani-card-number">03</span>
                    <h3>Direct Impact</h3>
                    <p>100% of proceeds directly empower grassroots women artisan clusters, providing skill upgrades, toolkits, and family healthcare support.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- TRUST STRIP -->
    <section class="srijani-section py-3">
        <div class="srijani-container">
            <div class="srijani-trust-strip">
                <div>
                    <b>✦ Curated Craft</b>
                    <span>Thoughtfully handcrafted products</span>
                </div>
                <div>
                    <b>💬 WhatsApp Ordering</b>
                    <span>Direct chat &amp; order assistance</span>
                </div>
                <div>
                    <b>✓ Fair SHG Wages</b>
                    <span>Supporting rural women artisans</span>
                </div>
                <div>
                    <b>⌁ Pan-India Delivery</b>
                    <span>Safe packing &amp; door delivery</span>
                </div>
            </div>
        </div>
    </section>

    <!-- PRODUCTS CATALOGUE SECTION -->
    <section class="srijani-section" id="products-catalog">
        <div class="srijani-container">
            <div class="srijani-section-head d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
                <div>
                    <span class="srijani-kicker">Curated Catalogue</span>
                    <h2>Artisan Products &amp; Store</h2>
                    <p class="srijani-muted mb-0">Discover products one beautiful story at a time. Order directly via WhatsApp.</p>
                </div>
            </div>

            <!-- Category & Search Bar -->
            <div class="srijani-filter-bar mb-4">
                <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between">
                    <div class="d-flex flex-wrap gap-2" id="srijaniFilterPills">
                        <button type="button" class="srijani-tab-btn active" data-filter="all">
                            All Products ({{ $products->count() }})
                        </button>
                        @foreach($categories as $cat)
                            <button type="button" class="srijani-tab-btn" data-filter="{{ Str::slug($cat) }}">
                                {{ $cat }}
                            </button>
                        @endforeach
                    </div>

                    <div class="srijani-search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" id="srijaniSearchInput" placeholder="Search crafts, bags, decor...">
                    </div>
                </div>
            </div>

            <!-- PRODUCT FEED (Wide & Grid Responsive Cards) -->
            <div class="srijani-feed" id="srijaniProductFeed">
                @forelse($products as $product)
                    @php
                        $catSlug = Str::slug($product->category ?? 'general');
                    @endphp
                    <article class="srijani-product-card" data-category="{{ $catSlug }}" data-title="{{ strtolower($product->name) }}">
                        <div class="srijani-product-image-wrap">
                            <span class="srijani-product-index">0{{ $loop->iteration ?? 1 }} • {{ $product->category ?? 'Handmade' }}</span>
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="srijani-product-photo">
                            @else
                                <div class="srijani-photo-placeholder">
                                    <i class="bi bi-bag-heart"></i>
                                </div>
                            @endif

                            @if($product->discount_percent)
                                <span class="srijani-discount-tag">{{ $product->discount_percent }}% OFF</span>
                            @endif
                        </div>

                        <div class="srijani-product-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="srijani-price">₹{{ number_format($product->price, 2) }}</span>
                                @if($product->original_price && $product->original_price > $product->price)
                                    <del class="text-muted small fw-semibold">MRP ₹{{ number_format($product->original_price, 2) }}</del>
                                @endif
                            </div>

                            <h3 class="srijani-product-name">{{ $product->name }}</h3>
                            
                            <p class="srijani-product-desc">
                                {{ $product->short_description ?? Str::limit(strip_tags($product->description), 140) }}
                            </p>

                            <div class="srijani-product-actions">
                                <a href="{{ $product->whatsapp_url }}" target="_blank" rel="noopener noreferrer" class="srijani-btn srijani-btn-whatsapp">
                                    <i class="bi bi-whatsapp"></i>
                                    <span>Buy on WhatsApp</span>
                                </a>
                                <button type="button" class="srijani-btn srijani-btn-secondary" data-bs-toggle="modal" data-bs-target="#srijaniModal{{ $product->id ?? $loop->index }}">
                                    <span>View Details</span>
                                </button>
                            </div>
                        </div>
                    </article>

                    <!-- PRODUCT DETAILS MODAL -->
                    <div class="modal fade" id="srijaniModal{{ $product->id ?? $loop->index }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content srijani-dialog">
                                <div class="modal-header border-0 pb-0">
                                    <span class="srijani-kicker">Product Showcase</span>
                                    <button type="button" class="srijani-close-btn" data-bs-dismiss="modal" aria-label="Close">×</button>
                                </div>
                                <div class="modal-body p-4 pt-2">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-md-5">
                                            <div class="rounded-4 overflow-hidden shadow-sm" style="background:#f3e9dd; height: 320px;">
                                                @if($product->image)
                                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-100 h-100" style="object-fit: cover;">
                                                @else
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center fs-1 text-muted">
                                                        <i class="bi bi-bag-heart"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <span class="srijani-card-number mb-1 d-block">{{ $product->category ?? 'Handicrafts' }}</span>
                                            <h3 class="srijani-product-name mb-2" style="font-size: 1.6rem;">{{ $product->name }}</h3>
                                            
                                            <div class="d-flex align-items-baseline gap-2 mb-3">
                                                <span class="srijani-price" style="font-size: 1.1rem; padding: 6px 16px;">₹{{ number_format($product->price, 2) }}</span>
                                                @if($product->original_price && $product->original_price > $product->price)
                                                    <del class="text-muted">₹{{ number_format($product->original_price, 2) }}</del>
                                                    <span class="badge bg-danger text-white rounded-pill px-2 py-1 small">{{ $product->discount_percent }}% OFF</span>
                                                @endif
                                            </div>

                                            <div class="srijani-modal-description mb-4">
                                                {{ $product->description ?? $product->short_description }}
                                            </div>

                                            <div class="p-3 rounded-4 mb-3" style="background: #fff8eb; border: 1px solid rgba(229,138,23,.25); color: #783f04; font-size: 0.85rem;">
                                                <i class="bi bi-shield-check text-warning me-1"></i>
                                                <strong>Ordering Process:</strong> Click below to start a WhatsApp chat with our coordinator. We will confirm color/size preferences, provide shipping cost, and share UPI payment options.
                                            </div>

                                            <div class="d-flex gap-2 flex-wrap">
                                                <a href="{{ $product->whatsapp_url }}" target="_blank" rel="noopener noreferrer" class="srijani-btn srijani-btn-whatsapp flex-grow-1 justify-content-center">
                                                    <i class="bi bi-whatsapp"></i>
                                                    <span>Order on WhatsApp</span>
                                                </a>
                                                <button type="button" class="srijani-btn srijani-btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="srijani-empty-box">
                        <i class="bi bi-bag-x fs-1 mb-2 d-block text-muted"></i>
                        <h4>No Products Found</h4>
                        <p class="text-muted">Our artisans are creating new batches. Please message us directly on WhatsApp for custom inquiries.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CUSTOM & BULK ORDERS BANNER -->
    <section class="srijani-section pb-5">
        <div class="srijani-container">
            <div class="srijani-bulk-card">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-8">
                        <span class="srijani-kicker text-warning">Bulk &amp; Corporate Orders</span>
                        <h2 class="text-white mt-1 mb-2" style="font-family: Georgia, serif; font-size: clamp(1.8rem, 3.5vw, 2.4rem);">
                            Custom Corporate Gifting &amp; Event Supplies
                        </h2>
                        <p class="text-white-50 mb-0" style="line-height: 1.7;">
                            We craft customized eco-friendly conference bags, jute folders, handmade mementos, festive gifting hampers, and pottery decor customized with your organization's branding.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="https://wa.me/919415451910?text={{ urlencode('Hello Matri Seva Samiti, I would like to inquire about Bulk / Corporate handcrafted product orders.') }}" target="_blank" rel="noopener noreferrer" class="srijani-btn srijani-btn-gold" style="padding: 14px 26px; font-size: 1rem;">
                            <i class="bi bi-whatsapp fs-5"></i>
                            <span>Inquire on WhatsApp</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- MATRI SRIJANI DEDICATED STYLESHEET (Replicating exact matrikalamatrisrijani design tokens) -->
<style>
:root {
    --srijani-maroon: #7d241f;
    --srijani-maroon-2: #a7352d;
    --srijani-saffron: #e58a17;
    --srijani-gold: #c99a3b;
    --srijani-cream: #fffaf2;
    --srijani-paper: #fffdf9;
    --srijani-ink: #2d211d;
    --srijani-muted: #725f56;
    --srijani-line: rgba(125, 36, 31, 0.13);
    --srijani-shadow: 0 22px 70px rgba(61, 35, 20, 0.12);
    --srijani-radius: 26px;
}

.srijani-page-wrapper {
    background-color: var(--srijani-cream);
    background-image: radial-gradient(circle at 15% 20%, rgba(229, 138, 23, 0.08), transparent 30%), radial-gradient(circle at 85% 70%, rgba(125, 36, 31, 0.07), transparent 35%);
    color: var(--srijani-ink);
    position: relative;
    overflow-x: hidden;
    padding-bottom: 40px;
}

.srijani-container {
    width: min(1140px, 92%);
    margin: auto;
}

/* Floating Ambient Orbs */
.srijani-floating-orb {
    position: absolute;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    filter: blur(40px);
    opacity: 0.22;
    pointer-events: none;
    z-index: 0;
}
.srijani-floating-orb.orb-a {
    left: -80px;
    top: 15%;
    background: var(--srijani-saffron);
}
.srijani-floating-orb.orb-b {
    right: -90px;
    top: 55%;
    background: var(--srijani-maroon);
}

/* Typography & Kickers */
.srijani-kicker {
    display: inline-flex;
    color: var(--srijani-maroon);
    font-weight: 900;
    letter-spacing: 0.09em;
    text-transform: uppercase;
    font-size: 0.74rem;
}
.srijani-muted {
    color: var(--srijani-muted);
    line-height: 1.8;
}

/* Buttons */
.srijani-btn {
    border: 0;
    border-radius: 999px;
    padding: 12px 22px;
    font-weight: 800;
    font-size: 0.92rem;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    transition: 0.25s transform, 0.25s box-shadow, 0.25s background-color;
    cursor: pointer;
}
.srijani-btn:hover {
    transform: translateY(-3px);
}
.srijani-btn-primary {
    background: linear-gradient(135deg, var(--srijani-maroon), var(--srijani-maroon-2));
    color: #fff;
    box-shadow: 0 8px 24px rgba(125, 36, 31, 0.25);
}
.srijani-btn-gold {
    background: linear-gradient(135deg, var(--srijani-saffron), #f0b238);
    color: #2e1b0e;
    box-shadow: 0 8px 25px rgba(229, 138, 23, 0.25);
}
.srijani-btn-gold:hover {
    color: #2e1b0e;
    box-shadow: 0 12px 30px rgba(229, 138, 23, 0.35);
}
.srijani-btn-secondary {
    background: rgba(255, 255, 255, 0.92);
    border: 1px solid var(--srijani-line);
    color: var(--srijani-maroon);
    box-shadow: 0 4px 15px rgba(61, 35, 20, 0.06);
}
.srijani-btn-secondary:hover {
    background: #fff;
    color: var(--srijani-maroon-2);
}
.srijani-btn-whatsapp {
    background: #25D366;
    color: #ffffff;
    box-shadow: 0 8px 20px rgba(37, 211, 102, 0.3);
}
.srijani-btn-whatsapp:hover {
    background: #1fa851;
    color: #ffffff;
    box-shadow: 0 12px 28px rgba(37, 211, 102, 0.4);
}

/* Hero Section */
.srijani-hero {
    padding: 40px 0 30px;
    position: relative;
    z-index: 1;
}
.srijani-hero-card {
    position: relative;
    background: rgba(255, 255, 255, 0.82);
    backdrop-filter: blur(16px);
    border: 1px solid rgba(255, 255, 255, 0.95);
    box-shadow: var(--srijani-shadow);
    border-radius: 38px;
    padding: 46px;
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    gap: 30px;
    align-items: center;
    overflow: hidden;
}
.srijani-hero-title {
    font: 700 clamp(2.6rem, 5.5vw, 4.2rem)/1.0 Georgia, serif;
    margin: 14px 0;
    color: #5d1c18;
    letter-spacing: -0.03em;
}
.srijani-hero-desc {
    color: var(--srijani-muted);
    font-size: 1.05rem;
    line-height: 1.8;
    max-width: 580px;
    margin-bottom: 24px;
}
.srijani-hero-actions {
    display: flex;
    gap: 12px;
    align-items: center;
    flex-wrap: wrap;
}
.srijani-hero-stats {
    display: flex;
    gap: 22px;
    margin-top: 28px;
    flex-wrap: wrap;
    color: var(--srijani-muted);
    font-size: 0.84rem;
}
.srijani-hero-stats b {
    color: var(--srijani-maroon);
    margin-right: 4px;
}
.srijani-hero-art {
    display: flex;
    justify-content: center;
    position: relative;
    min-height: 280px;
    align-items: center;
}
.srijani-hero-logo-box {
    position: relative;
    z-index: 2;
    background: #ffffff;
    padding: 24px;
    border-radius: 32px;
    box-shadow: 0 20px 45px rgba(90, 35, 20, 0.15);
}
.srijani-hero-img {
    width: min(200px, 60vw);
    height: auto;
    object-fit: contain;
    display: block;
}
.srijani-hero-ring {
    position: absolute;
    width: 290px;
    height: 290px;
    border-radius: 50%;
    border: 1px dashed rgba(125, 36, 31, 0.25);
    box-shadow: 0 0 0 20px rgba(229, 138, 23, 0.05), 0 0 0 40px rgba(125, 36, 31, 0.03);
}

/* Info Grid (3-cards) */
.srijani-section {
    padding: 30px 0;
    position: relative;
    z-index: 1;
}
.srijani-section-head h2 {
    font: 700 clamp(1.9rem, 3.5vw, 2.6rem) Georgia, serif;
    color: #5d1c18;
    margin: 4px 0 10px;
}
.srijani-info-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
}
.srijani-info-card {
    background: rgba(255, 255, 255, 0.88);
    border: 1px solid var(--srijani-line);
    border-radius: var(--srijani-radius);
    box-shadow: 0 12px 35px rgba(61, 35, 20, 0.06);
    padding: 26px;
    position: relative;
    overflow: hidden;
    transition: transform 0.25s ease;
}
.srijani-info-card:hover {
    transform: translateY(-4px);
}
.srijani-info-card h3 {
    margin: 8px 0;
    color: var(--srijani-maroon);
    font: 700 1.25rem Georgia, serif;
}
.srijani-info-card p {
    color: var(--srijani-muted);
    font-size: 0.92rem;
    line-height: 1.65;
    margin: 0;
}
.srijani-card-number {
    font-size: 0.72rem;
    font-weight: 900;
    letter-spacing: 0.1em;
    color: var(--srijani-saffron);
    text-transform: uppercase;
}

/* Trust Strip */
.srijani-trust-strip {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
}
.srijani-trust-strip > div {
    padding: 18px 16px;
    border: 1px solid var(--srijani-line);
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.85);
    box-shadow: 0 10px 25px rgba(61, 35, 20, 0.05);
    display: grid;
    gap: 4px;
}
.srijani-trust-strip b {
    color: var(--srijani-maroon);
    font-size: 0.92rem;
}
.srijani-trust-strip span {
    color: var(--srijani-muted);
    font-size: 0.76rem;
    line-height: 1.4;
}

/* Filter Bar */
.srijani-filter-bar {
    background: rgba(255, 255, 255, 0.8);
    border: 1px solid var(--srijani-line);
    border-radius: 20px;
    padding: 14px 18px;
    box-shadow: 0 8px 24px rgba(61, 35, 20, 0.04);
}
.srijani-tab-btn {
    border: 1px solid var(--srijani-line);
    background: rgba(255, 255, 255, 0.9);
    color: var(--srijani-maroon);
    padding: 8px 18px;
    border-radius: 999px;
    font-weight: 800;
    font-size: 0.88rem;
    transition: 0.2s all;
    cursor: pointer;
}
.srijani-tab-btn:hover {
    background: rgba(125, 36, 31, 0.08);
}
.srijani-tab-btn.active {
    background: var(--srijani-maroon);
    color: #ffffff;
    border-color: var(--srijani-maroon);
    box-shadow: 0 4px 14px rgba(125, 36, 31, 0.25);
}
.srijani-search-box {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #ffffff;
    border: 1px solid #ddcec2;
    border-radius: 999px;
    padding: 6px 14px;
    min-width: 250px;
}
.srijani-search-box input {
    border: 0;
    outline: 0;
    font-size: 0.88rem;
    background: transparent;
    width: 100%;
}
.srijani-search-box i {
    color: var(--srijani-muted);
}

/* Product Feed & Cards */
.srijani-feed {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
    gap: 24px;
}
.srijani-product-card {
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid var(--srijani-line);
    border-radius: 30px;
    box-shadow: var(--srijani-shadow);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: 0.3s transform, 0.3s box-shadow;
}
.srijani-product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 30px 70px rgba(61, 35, 20, 0.16);
}
.srijani-product-image-wrap {
    position: relative;
    height: 270px;
    overflow: hidden;
    background: #f3e9dd;
}
.srijani-product-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: 0.5s transform;
}
.srijani-product-card:hover .srijani-product-photo {
    transform: scale(1.05);
}
.srijani-photo-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: var(--srijani-muted);
    opacity: 0.3;
}
.srijani-product-index {
    position: absolute;
    left: 14px;
    top: 14px;
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(8px);
    padding: 6px 12px;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 900;
    color: var(--srijani-maroon);
    box-shadow: 0 4px 10px rgba(0,0,0,0.06);
}
.srijani-discount-tag {
    position: absolute;
    right: 14px;
    top: 14px;
    background: var(--srijani-maroon);
    color: #ffffff;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 0.72rem;
    font-weight: 900;
}
.srijani-product-body {
    padding: 24px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1;
}
.srijani-product-name {
    font: 700 1.35rem Georgia, serif;
    color: #54201b;
    margin: 0 0 8px;
    line-height: 1.35;
}
.srijani-price {
    display: inline-flex;
    width: max-content;
    padding: 6px 12px;
    border-radius: 999px;
    background: #fff0d6;
    color: #9b5100;
    font-weight: 900;
    font-size: 1.15rem;
}
.srijani-product-desc {
    color: var(--srijani-muted);
    line-height: 1.6;
    font-size: 0.88rem;
    margin-bottom: 18px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.srijani-product-actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    border-top: 1px solid var(--srijani-line);
    padding-top: 16px;
}

/* Modal Dialog Styling */
.srijani-dialog {
    background: #fffaf6 !important;
    border-radius: 30px !important;
    box-shadow: 0 30px 100px rgba(0, 0, 0, 0.25) !important;
    border: 1px solid var(--srijani-line) !important;
}
.srijani-close-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    border: 0;
    background: #f2e8df;
    color: var(--srijani-maroon);
    font-size: 1.4rem;
    line-height: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
.srijani-modal-description {
    color: var(--srijani-muted);
    font-size: 0.92rem;
    line-height: 1.7;
    white-space: pre-line;
    max-height: 180px;
    overflow-y: auto;
}

/* Bulk Card */
.srijani-bulk-card {
    background: linear-gradient(135deg, #5d1c18 0%, #872822 100%);
    border-radius: 36px;
    padding: 44px;
    box-shadow: 0 20px 60px rgba(93, 28, 24, 0.25);
}

.srijani-empty-box {
    text-align: center;
    padding: 48px 20px;
    border: 2px dashed var(--srijani-line);
    border-radius: 28px;
    color: var(--srijani-muted);
    background: rgba(255, 255, 255, 0.58);
    grid-column: 1 / -1;
}

/* Responsive */
@media (max-width: 900px) {
    .srijani-hero-card {
        grid-template-columns: 1fr;
        padding: 30px;
    }
    .srijani-hero-art {
        order: -1;
        min-height: 200px;
    }
    .srijani-hero-ring {
        width: 220px;
        height: 220px;
    }
    .srijani-info-grid {
        grid-template-columns: 1fr;
    }
    .srijani-trust-strip {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 540px) {
    .srijani-trust-strip {
        grid-template-columns: 1fr;
    }
    .srijani-feed {
        grid-template-columns: 1fr;
    }
    .srijani-bulk-card {
        padding: 26px;
    }
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabBtns = document.querySelectorAll('.srijani-tab-btn');
    const searchInput = document.getElementById('srijaniSearchInput');
    const productCards = document.querySelectorAll('.srijani-product-card');

    let activeFilter = 'all';
    let searchKeyword = '';

    function filterCatalog() {
        productCards.forEach(card => {
            const cat = card.getAttribute('data-category') || '';
            const title = card.getAttribute('data-title') || '';

            const matchesFilter = (activeFilter === 'all' || cat === activeFilter);
            const matchesSearch = (searchKeyword === '' || title.includes(searchKeyword));

            if (matchesFilter && matchesSearch) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    tabBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            tabBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            activeFilter = this.getAttribute('data-filter');
            filterCatalog();
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            searchKeyword = e.target.value.toLowerCase().trim();
            filterCatalog();
        });
    }
});
</script>
@endpush
@endsection
