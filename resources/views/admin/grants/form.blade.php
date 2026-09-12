@extends('admin.layouts.app')

@section('title', $grant->exists ? 'Edit Grant Opportunity' : 'Create Grant Opportunity')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $grant->exists ? 'Edit Grant Opportunity' : 'Create New Grant Opportunity' }}</h4>
            <p class="text-muted small mb-0">Configure funding verticles, eligibility criteria, and grant allocations.</p>
        </div>
        <a href="{{ route('admin.grants.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Grants
        </a>
    </div>

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $grant->exists ? route('admin.grants.update', $grant->id) : route('admin.grants.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($grant->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Grant Program Title *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $grant->title) }}" required placeholder="e.g. Education Development & Smart Learning Grant">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Category / Vertical *</label>
                                <input type="text" name="category" class="form-control" value="{{ old('category', $grant->category ?? 'Education & Skills') }}" required placeholder="e.g. Healthcare, Women Livelihood">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Badge Color</label>
                                <select name="badge_color" class="form-select">
                                    <option value="primary" {{ old('badge_color', $grant->badge_color) == 'primary' ? 'selected' : '' }}>Primary (Blue)</option>
                                    <option value="danger" {{ old('badge_color', $grant->badge_color) == 'danger' ? 'selected' : '' }}>Danger (Red)</option>
                                    <option value="success" {{ old('badge_color', $grant->badge_color) == 'success' ? 'selected' : '' }}>Success (Green)</option>
                                    <option value="warning" {{ old('badge_color', $grant->badge_color) == 'warning' ? 'selected' : '' }}>Warning (Yellow / Amber)</option>
                                    <option value="info" {{ old('badge_color', $grant->badge_color) == 'info' ? 'selected' : '' }}>Info (Teal / Cyan)</option>
                                    <option value="dark" {{ old('badge_color', $grant->badge_color) == 'dark' ? 'selected' : '' }}>Dark</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Estimated Grant Amount Range</label>
                                <input type="text" name="amount_range" class="form-control" value="{{ old('amount_range', $grant->amount_range) }}" placeholder="e.g. ₹5 - ₹10 Lakhs">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $grant->sort_order ?? 0) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Key Features / Tags (Comma-Separated)</label>
                                <input type="text" name="tags" class="form-control" value="{{ old('tags', $grant->tags) }}" placeholder="e.g. Equipment Support, Study Materials, Teacher Capacity">
                                <small class="text-muted">Separate multiple tags with commas.</small>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Short Description *</label>
                                <textarea name="short_description" class="form-control" rows="3" required placeholder="Brief description of the grant opportunity...">{{ old('short_description', $grant->short_description) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Detailed Guidelines &amp; Scope (Optional)</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Detailed objectives, eligibility, and expected outcomes...">{{ old('description', $grant->description) }}</textarea>
                            </div>

                            <div class="col-md-6 d-flex align-items-center pt-3">
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $grant->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_active">Active (Visible on Frontend)</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Featured Image (Optional)</label>
                                <input type="file" name="image" class="form-control" onchange="previewImage(this, 'grantPreview')">
                                <div class="mt-2 img-preview-box" style="max-width: 260px; height: 140px;">
                                    <img id="grantPreview" src="{{ asset($grant->image ?? 'images/project1.jpeg') }}" alt="Grant Preview">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.grants.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $grant->exists ? 'Update Grant' : 'Create Grant' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
