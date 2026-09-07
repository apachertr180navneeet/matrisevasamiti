@extends('admin.layouts.app')

@section('title', 'Photo Gallery')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Photo Gallery &amp; Albums</h4>
            <p class="text-muted small mb-0">Upload and organize photographs of on-ground activities and beneficiaries.</p>
        </div>
        <a href="{{ route('admin.gallery.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-circle me-1"></i> Add Photo
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Title &amp; Caption</th>
                            <th>Album / Category</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $photo)
                            <tr>
                                <td style="width: 90px;">
                                    <img src="{{ asset($photo->image) }}" alt="{{ $photo->title }}" style="width: 80px; height: 55px; object-fit: cover; border-radius: 8px;">
                                </td>
                                <td>
                                    <strong>{{ $photo->title }}</strong>
                                    <div class="small text-muted">{{ $photo->caption }}</div>
                                </td>
                                <td><span class="badge bg-light text-dark border">{{ $photo->category }}</span></td>
                                <td>{{ $photo->sort_order }}</td>
                                <td>
                                    @if($photo->is_active)
                                        <span class="badge bg-success">Visible</span>
                                    @else
                                        <span class="badge bg-secondary">Hidden</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.gallery.edit', $photo->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.gallery.destroy', $photo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this image?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No gallery photos uploaded yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
