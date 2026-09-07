@extends('admin.layouts.app')

@section('title', $cause->exists ? 'Edit Cause' : 'Create Cause')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $cause->exists ? 'Edit Cause / Campaign' : 'Create New Cause' }}</h4>
            <p class="text-muted small mb-0">Set donation goals, story details, category, and cover visuals.</p>
        </div>
        <a href="{{ route('admin.causes.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Causes
        </a>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $cause->exists ? route('admin.causes.update', $cause->id) : route('admin.causes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($cause->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Cause / Campaign Title *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $cause->title) }}" required placeholder="e.g. Free Rural Health & Eye Screening Camps">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Category *</label>
                                <select name="category" class="form-select" required>
                                    <option value="Education" {{ old('category', $cause->category) == 'Education' ? 'selected' : '' }}>Education</option>
                                    <option value="Healthcare" {{ old('category', $cause->category) == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option value="Empowerment" {{ old('category', $cause->category) == 'Empowerment' ? 'selected' : '' }}>Women Empowerment</option>
                                    <option value="Sanitation" {{ old('category', $cause->category) == 'Sanitation' ? 'selected' : '' }}>Sanitation &amp; Water</option>
                                    <option value="Emergency" {{ old('category', $cause->category) == 'Emergency' ? 'selected' : '' }}>Emergency Relief</option>
                                    <option value="General" {{ old('category', $cause->category) == 'General' ? 'selected' : '' }}>General Welfare</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Goal Target Amount (₹) *</label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" step="0.01" name="goal_amount" class="form-control" value="{{ old('goal_amount', $cause->goal_amount) }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Already Raised Amount (₹)</label>
                                <div class="input-group">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" step="0.01" name="raised_amount" class="form-control" value="{{ old('raised_amount', $cause->raised_amount ?? 0) }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Short Summary</label>
                                <textarea name="short_description" class="form-control" rows="2" placeholder="Brief 1-2 sentence highlight shown on homepage slider...">{{ old('short_description', $cause->short_description) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Detailed Story &amp; Needs</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Detailed story, impact objectives, and budget breakdown...">{{ old('description', $cause->description) }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $cause->sort_order ?? 1) }}">
                            </div>

                            <div class="col-md-4 d-flex align-items-center pt-4">
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" {{ old('is_featured', $cause->is_featured) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_featured">Featured on Homepage</label>
                                </div>
                            </div>

                            <div class="col-md-4 d-flex align-items-center pt-4">
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $cause->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_active">Active &amp; Accepting</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Campaign Cover Image</label>
                                <input type="file" name="image" class="form-control" onchange="previewImage(this, 'causePreview')">
                                <div class="mt-2 img-preview-box" style="max-width: 280px; height: 160px;">
                                    <img id="causePreview" src="{{ asset($cause->image ?? 'images/project1.jpeg') }}" alt="Cause Preview">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.causes.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $cause->exists ? 'Update Cause' : 'Save Cause' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
