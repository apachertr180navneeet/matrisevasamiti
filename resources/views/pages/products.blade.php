@extends('layouts.app')

@section('content')
<main>
    <!-- BREADCRUMBS -->
    <section class="ul-breadcrumb ul-section-spacing">
        <div class="ul-container">
            <h2 class="ul-breadcrumb-title">Handicrafts &amp; Artisan Products</h2>
            <ul class="ul-breadcrumb-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="separator"><i class="flaticon-right"></i></span></li>
                <li>Products</li>
            </ul>
        </div>
    </section>

    <!-- PRODUCTS STORE SECTION -->
    <section class="ul-section-spacing" style="background-color: #f8fafc;">
        <div class="ul-container">
            <!-- Header Section -->
            <div class="ul-section-heading text-center mb-5">
                <div>
                    <span class="ul-section-sub-title">"स्वावलंबन से स्वाभिमान" • SHG &amp; Rural Livelihood</span>
                    <h2 class="ul-section-title">Support Rural Women Artisans</h2>
                    <p class="ul-section-descr mx-auto" style="max-width: 780px;">
                        Explore authentic handmade crafts, eco-friendly jute products, organic items, and home decor handcrafted by rural women trained under Matri Seva Samiti's skill development initiatives.
                    </p>
                </div>

                <!-- Trust Badges Bar -->
                <div class="d-flex justify-content-center flex-wrap gap-4 mt-4 text-muted small">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-patch-check-fill text-success fs-5"></i>
                        <span>100% Handcrafted by SHG Women</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-whatsapp text-success fs-5"></i>
                        <span>Direct WhatsApp Ordering &amp; Support</span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-heart-fill text-danger fs-5"></i>
                        <span>All Proceeds Empower Rural Families</span>
                    </div>
                </div>
            </div>

            <!-- FILTERS & CATEGORIES -->
            @if(isset($categories) && $categories->count() > 0)
                <div class="d-flex justify-content-center flex-wrap gap-2 mb-5">
                    <button type="button" class="btn btn-outline-danger active rounded-pill px-4 product-filter-btn" data-filter="all">All Products</button>
                    @foreach($categories as $cat)
                        <button type="button" class="btn btn-outline-danger rounded-pill px-4 product-filter-btn" data-filter="{{ Str::slug($cat) }}">
                            {{ $cat }}
                        </button>
                    @endforeach
                </div>
            @endif

            <!-- PRODUCTS GRID -->
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-4" id="products-grid">
                @forelse($products as $product)
                    @php
                        $catSlug = Str::slug($product->category ?? 'general');
                    @endphp
                    <div class="col product-card-item" data-category="{{ $catSlug }}">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 p-0 hover-lift transition bg-white" style="transition: transform 0.25s ease, box-shadow 0.25s ease;">
                            <!-- Product Image & Badges -->
                            <div class="position-relative overflow-hidden" style="height: 250px; background-color: #f1f5f9;">
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-100 h-100 object-fit-cover transition-scale">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                                        <i class="bi bi-bag-fill fs-1 opacity-25"></i>
                                    </div>
                                @endif

                                <!-- Category Badge -->
                                @if($product->category)
                                    <span class="position-absolute top-0 start-0 m-3 badge bg-white text-dark shadow-sm rounded-pill px-3 py-2 fw-semibold">
                                        {{ $product->category }}
                                    </span>
                                @endif

                                <!-- Discount Badge -->
                                @if($product->discount_percent)
                                    <span class="position-absolute top-0 end-0 m-3 badge bg-danger text-white shadow-sm rounded-pill px-3 py-2 fw-bold">
                                        {{ $product->discount_percent }}% OFF
                                    </span>
                                @endif
                            </div>

                            <!-- Card Body -->
                            <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                                <div>
                                    <!-- Price & SKU -->
                                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                                        <div class="d-flex align-items-baseline gap-2">
                                            <span class="fs-4 fw-bold text-dark">₹{{ number_format($product->price, 2) }}</span>
                                            @if($product->original_price && $product->original_price > $product->price)
                                                <del class="text-muted small">₹{{ number_format($product->original_price, 2) }}</del>
                                            @endif
                                        </div>
                                        @if($product->sku)
                                            <small class="text-muted">#{{ $product->sku }}</small>
                                        @endif
                                    </div>

                                    <!-- Title -->
                                    <h3 class="h5 mb-2 text-dark fw-bold" style="line-height: 1.4;">{{ $product->name }}</h3>

                                    <!-- Short Description -->
                                    <p class="text-muted small mb-3" style="min-height: 42px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ $product->short_description ?? Str::limit(strip_tags($product->description), 110) }}
                                    </p>
                                </div>

                                <!-- Action Buttons -->
                                <div class="pt-3 border-top d-flex flex-column gap-2">
                                    <!-- WhatsApp Order Button -->
                                    <a href="{{ $product->whatsapp_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-success rounded-pill fw-bold py-2 d-flex align-items-center justify-content-center gap-2 shadow-sm order-btn">
                                        <i class="bi bi-whatsapp fs-5"></i>
                                        <span>Buy on WhatsApp</span>
                                    </a>

                                    @if(!empty($product->description))
                                        <!-- View Details Modal Trigger -->
                                        <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill py-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                                            <i class="bi bi-info-circle me-1"></i> View Details &amp; Specs
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PRODUCT DETAILS MODAL -->
                    @if(!empty($product->description))
                        <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content rounded-4 border-0 shadow">
                                    <div class="modal-header border-0 pb-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4 p-md-5 pt-0">
                                        <div class="row g-4 align-items-center">
                                            <div class="col-md-5">
                                                @if($product->image)
                                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-100 rounded-4 shadow-sm object-fit-cover" style="max-height: 320px;">
                                                @else
                                                    <div class="bg-light rounded-4 d-flex align-items-center justify-content-center text-muted" style="height: 260px;">
                                                        <i class="bi bi-bag fs-1"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-7">
                                                <span class="badge bg-light text-dark border px-3 py-2 rounded-pill mb-2">{{ $product->category ?? 'Handmade Craft' }}</span>
                                                <h3 class="h4 fw-bold text-dark mb-2">{{ $product->name }}</h3>
                                                
                                                <div class="d-flex align-items-baseline gap-2 mb-3">
                                                    <span class="fs-3 fw-bold text-success">₹{{ number_format($product->price, 2) }}</span>
                                                    @if($product->original_price && $product->original_price > $product->price)
                                                        <del class="text-muted">₹{{ number_format($product->original_price, 2) }}</del>
                                                        <span class="badge bg-danger text-white rounded-pill px-2 py-1 small">{{ $product->discount_percent }}% OFF</span>
                                                    @endif
                                                </div>

                                                <div class="product-description-text text-muted mb-4" style="line-height: 1.6; white-space: pre-line;">
                                                    {{ $product->description }}
                                                </div>

                                                <div class="d-flex gap-2">
                                                    <a href="{{ $product->whatsapp_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-success rounded-pill fw-bold py-2 px-4 d-inline-flex align-items-center gap-2 shadow-sm flex-grow-1 justify-content-center">
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
                    @endif
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="p-5 bg-white rounded-4 shadow-sm">
                            <i class="bi bi-bag-x text-muted opacity-50" style="font-size: 3.5rem;"></i>
                            <h4 class="mt-3 fw-bold text-dark">No Products Available Currently</h4>
                            <p class="text-muted">Our artisans are crafting new items. Please check back soon or contact us directly on WhatsApp for custom bulk orders.</p>
                            <a href="https://wa.me/919415451910?text={{ urlencode('Hello Matri Seva Samiti, I would like to inquire about handcrafted products and bulk orders.') }}" target="_blank" class="btn btn-success rounded-pill px-4 mt-2">
                                <i class="bi bi-whatsapp me-1"></i> Contact on WhatsApp
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- BOTTOM HELP BANNER -->
            <div class="mt-5 p-4 p-md-5 rounded-4 shadow-sm text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #0F2B5B 0%, #1e40af 100%);">
                <div class="row align-items-center gy-3">
                    <div class="col-lg-8">
                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-2">Bulk Orders &amp; Custom Crafts</span>
                        <h3 class="fw-bold mb-2 text-white">Looking for Custom Gifts or Bulk NGO Supplies?</h3>
                        <p class="mb-0 text-white-50">We undertake bulk orders for corporate gifting, eco-friendly conference bags, jute files, and festive handmade hampers crafted by our trained SHGs.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="https://wa.me/919415451910?text={{ urlencode('Hello Matri Seva Samiti, I am interested in bulk / corporate handcrafted product orders.') }}" target="_blank" class="btn btn-success btn-lg rounded-pill px-4 fw-bold shadow">
                            <i class="bi bi-whatsapp me-2"></i> Inquire on WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.product-filter-btn');
    const productCards = document.querySelectorAll('.product-card-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => {
                b.classList.remove('active', 'btn-danger', 'text-white');
                b.classList.add('btn-outline-danger');
            });
            
            this.classList.remove('btn-outline-danger');
            this.classList.add('active', 'btn-danger', 'text-white');

            const filter = this.getAttribute('data-filter');
            productCards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endpush
@endsection
