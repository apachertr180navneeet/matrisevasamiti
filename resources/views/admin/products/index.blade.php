@extends('admin.layouts.app')

@section('title', 'Products Management')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Products &amp; WhatsApp Store</h4>
            <p class="text-muted small mb-0">Manage handcrafted items, rural artisan products, and WhatsApp order links.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('products') }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                <i class="bi bi-eye me-1"></i> View Live Products Page
            </a>
            <a href="{{ route('admin.products.create') }}" class="btn-admin-primary">
                <i class="bi bi-plus-circle me-1"></i> Add New Product
            </a>
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>WhatsApp Order Link</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td style="width: 80px;">
                                    @if($product->image)
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center text-muted rounded" style="width: 60px; height: 60px;">
                                            <i class="bi bi-bag fs-4"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong class="d-block text-dark">{{ $product->name }}</strong>
                                    @if($product->sku)
                                        <small class="text-muted">SKU: {{ $product->sku }}</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $product->category ?? 'General' }}</span>
                                </td>
                                <td>
                                    <span class="fw-bold text-success fs-6">₹{{ number_format($product->price, 2) }}</span>
                                    @if($product->original_price && $product->original_price > $product->price)
                                        <br><del class="text-muted small">₹{{ number_format($product->original_price, 2) }}</del>
                                        <span class="badge bg-danger-subtle text-danger small">-{{ $product->discount_percent }}%</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ $product->whatsapp_url }}" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1 d-inline-flex align-items-center gap-1">
                                        <i class="bi bi-whatsapp"></i>
                                        <span>Test Order Link</span>
                                    </a>
                                </td>
                                <td>
                                    @if($product->is_active)
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">Active (Visible)</span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary border px-2 py-1">Hidden</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-light border me-1" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-bag-x fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                    No products added yet. Click <strong>"Add New Product"</strong> to add your first product.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
