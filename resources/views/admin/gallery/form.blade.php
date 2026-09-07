@extends('admin.layouts.app')

@section('title', $item->exists ? 'Edit Gallery Photo' : 'Upload Gallery Photo')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $item->exists ? 'Edit Photo' : 'Upload New Photo' }}</h4>
            <p class="text-muted small mb-0">Upload high-resolution pictures for website gallery.</p>
        </div>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Gallery
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $item->exists ? route('admin.gallery.update', $item->id) : route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($item->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Photo Title *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $item->title) }}" required placeholder="e.g. Free Eye Screening Camp">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Album / Category *</label>
                                <input type="text" name="category" class="form-control" value="{{ old('category', $item->category ?? 'General') }}" required placeholder="e.g. Healthcare, Education">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Caption / Description</label>
                                <input type="text" name="caption" class="form-control" value="{{ old('caption', $item->caption) }}" placeholder="Short caption about the moment...">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $item->sort_order ?? 1) }}">
                            </div>

                            <div class="col-md-6 d-flex align-items-center pt-4">
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_active">Visible in Gallery</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Photo File {{ $item->exists ? '(Leave empty to keep current)' : '*' }}</label>
                                <input type="file" name="image" class="form-control" {{ $item->exists ? '' : 'required' }} onchange="previewImage(this, 'galleryPreview')">
                                <div class="mt-2 img-preview-box" style="max-width: 280px; height: 180px;">
                                    <img id="galleryPreview" src="{{ asset($item->image ?? 'images/student1.jpeg') }}" alt="Gallery Preview">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $item->exists ? 'Update Photo' : 'Upload Photo' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
