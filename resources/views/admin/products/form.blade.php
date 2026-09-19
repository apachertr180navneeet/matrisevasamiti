@extends('admin.layouts.app')

@section('title', $product->exists ? 'Edit Product' : 'Add New Product')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $product->exists ? 'Edit Product' : 'Add New Product' }}</h4>
            <p class="text-muted small mb-0">Set up product details, pricing, photos, and WhatsApp ordering information.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Products
        </a>
    </div>

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $product->exists ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($product->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <!-- Basic Info -->
                            <div class="col-md-8">
                                <label class="form-label">Product Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required placeholder="e.g. Handmade Eco-Friendly Jute Bag">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Category</label>
                                <input type="text" name="category" class="form-control" value="{{ old('category', $product->category ?? 'Handicrafts') }}" placeholder="e.g. Handicrafts, Organic, Clothing">
                            </div>

                            <!-- Pricing -->
                            <div class="col-md-4">
                                <label class="form-label">Selling Price (₹) *</label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" required placeholder="350.00">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Original / MRP Price (₹) <small class="text-muted">(Optional)</small></label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" step="0.01" name="original_price" class="form-control" value="{{ old('original_price', $product->original_price) }}" placeholder="499.00">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">SKU / Item Code <small class="text-muted">(Optional)</small></label>
                                <input type="text" name="sku" class="form-control" value="{{ old('sku', $product->sku) }}" placeholder="e.g. MSS-JUTE-01">
                            </div>

                            <!-- WhatsApp Integration Section -->
                            <div class="col-12 mt-4">
                                <div class="p-3 bg-light rounded-3 border border-success-subtle">
                                    <h6 class="fw-bold text-success mb-2 d-flex align-items-center gap-2">
                                        <i class="bi bi-whatsapp fs-5"></i> WhatsApp Direct Ordering Setup
                                    </h6>
                                    <p class="text-muted small mb-3">
                                        By default, customer clicks will automatically open WhatsApp with the product name and price pre-filled using the NGO primary number (<strong>{{ config('site.contact_phone_primary', '+91 94154 51910') }}</strong>). You can customize it below if needed:
                                    </p>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label small">Specific WhatsApp Number <small class="text-muted">(Optional)</small></label>
                                            <input type="text" name="whatsapp_number" class="form-control" value="{{ old('whatsapp_number', $product->whatsapp_number) }}" placeholder="e.g. 9415451910 or +919415451910">
                                            <div class="form-text small">Leave blank to use default organization phone.</div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small">Custom WhatsApp Order Link Override <small class="text-muted">(Optional)</small></label>
                                            <input type="url" name="whatsapp_link" class="form-control" value="{{ old('whatsapp_link', $product->whatsapp_link) }}" placeholder="e.g. https://wa.me/919415451910?text=CustomMessage">
                                            <div class="form-text small">Overrides automatic message link if filled.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Descriptions -->
                            <div class="col-12">
                                <label class="form-label">Short Description / Key Features</label>
                                <textarea name="short_description" class="form-control" rows="2" placeholder="Brief summary (e.g. Hand-stitched by rural women self-help group with premium organic jute material)...">{{ old('short_description', $product->short_description) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Full Product Description &amp; Specifications</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Detailed product specifications, materials used, artisan background, dimensions, and usage instructions...">{{ old('description', $product->description) }}</textarea>
                            </div>

                            <!-- Image Upload & Preview -->
                            <div class="col-12">
                                <label class="form-label">Product Image</label>
                                <input type="file" name="image" class="form-control" onchange="previewImage(this, 'productPreview')">
                                <div class="mt-2 img-preview-box" style="max-width: 240px; height: 160px;">
                                    @if($product->image)
                                        <img id="productPreview" src="{{ asset($product->image) }}" alt="Product Image">
                                    @else
                                        <img id="productPreview" src="" alt="Product Preview" style="display:none;">
                                        <span class="text-muted small">No image selected</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $product->sort_order ?? 0) }}">
                            </div>

                            <div class="col-md-6 d-flex align-items-center mt-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_active">Publish Product on Website (Active)</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $product->exists ? 'Update Product' : 'Save Product' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
