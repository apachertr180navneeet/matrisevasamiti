@extends('admin.layouts.app')

@section('title', $banner->exists ? 'Edit Banner' : 'Create Banner')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $banner->exists ? 'Edit Banner' : 'Create New Banner' }}</h4>
            <p class="text-muted small mb-0">Customize hero banner contents, call-to-actions, and background visuals.</p>
        </div>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Banners
        </a>
    </div>

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $banner->exists ? route('admin.banners.update', $banner->id) : route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($banner->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Banner Title *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $banner->title) }}" required placeholder="e.g. Matri Seva Samiti">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Sub-Title / Tagline</label>
                                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $banner->subtitle) }}" placeholder='e.g. "मिलकर करें प्रयास, खुशहाल हो समाज"'>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Brief description displayed below the title...">{{ old('description', $banner->description) }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Primary Button Text</label>
                                <input type="text" name="btn_text" class="form-control" value="{{ old('btn_text', $banner->btn_text ?? 'Donate Now') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Primary Button Link</label>
                                <input type="text" name="btn_link" class="form-control" value="{{ old('btn_link', $banner->btn_link ?? '/donate') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Secondary Button Text</label>
                                <input type="text" name="secondary_btn_text" class="form-control" value="{{ old('secondary_btn_text', $banner->secondary_btn_text ?? 'Explore Our Work') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Secondary Button Link</label>
                                <input type="text" name="secondary_btn_link" class="form-control" value="{{ old('secondary_btn_link', $banner->secondary_btn_link ?? '/projects') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $banner->sort_order ?? 1) }}">
                            </div>

                            <div class="col-md-6 d-flex align-items-center pt-4">
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $banner->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_active">Publish Banner (Active)</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Banner Image</label>
                                <input type="file" name="image" class="form-control" onchange="previewImage(this, 'bannerPreview')">
                                <div class="mt-2 img-preview-box" style="max-width: 320px; height: 180px;">
                                    <img id="bannerPreview" src="{{ asset($banner->image ?? 'images/herobg.png') }}" alt="Banner Preview">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.banners.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $banner->exists ? 'Update Banner' : 'Create Banner' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
