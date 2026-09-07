@extends('admin.layouts.app')

@section('title', 'Hero Banners')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Hero Sliders &amp; Banners</h4>
            <p class="text-muted small mb-0">Manage homepage hero banners, promotional text, call-to-actions, and background images.</p>
        </div>
        <a href="{{ route('admin.banners.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Banner
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title &amp; Subtitle</th>
                            <th>Buttons</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($banners as $banner)
                            <tr>
                                <td style="width: 120px;">
                                    <img src="{{ asset($banner->image ?? 'images/herobg.png') }}" alt="{{ $banner->title }}" style="width: 90px; height: 55px; object-fit: cover; border-radius: 8px;">
                                </td>
                                <td>
                                    <strong>{{ $banner->title }}</strong>
                                    <div class="small text-muted">{{ $banner->subtitle }}</div>
                                </td>
                                <td>
                                    @if($banner->btn_text)
                                        <span class="badge bg-primary">{{ $banner->btn_text }}</span>
                                    @endif
                                    @if($banner->secondary_btn_text)
                                        <span class="badge bg-secondary">{{ $banner->secondary_btn_text }}</span>
                                    @endif
                                </td>
                                <td>{{ $banner->sort_order }}</td>
                                <td>
                                    @if($banner->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this banner?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No banners created yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
