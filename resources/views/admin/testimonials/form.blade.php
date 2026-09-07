@extends('admin.layouts.app')

@section('title', $testimonial->exists ? 'Edit Testimonial' : 'Add Testimonial')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $testimonial->exists ? 'Edit Testimonial' : 'Add New Testimonial' }}</h4>
            <p class="text-muted small mb-0">Record story, rating, and feedback from beneficiaries and supporters.</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Testimonials
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial->id) : route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($testimonial->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Person Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required placeholder="e.g. Sunita Devi">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Designation / Role</label>
                                <input type="text" name="designation" class="form-control" value="{{ old('designation', $testimonial->designation) }}" placeholder="e.g. Artisan Beneficiary / Donor">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Location / City</label>
                                <input type="text" name="location" class="form-control" value="{{ old('location', $testimonial->location) }}" placeholder="e.g. Varanasi, UP">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Star Rating</label>
                                <select name="rating" class="form-select">
                                    <option value="5" {{ old('rating', $testimonial->rating) == 5 ? 'selected' : '' }}>5 Stars ★★★★★</option>
                                    <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>4 Stars ★★★★☆</option>
                                    <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>3 Stars ★★★☆☆</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Quote / Feedback Message *</label>
                                <textarea name="quote" class="form-control" rows="4" required placeholder="What the person said about their experience with Matri Seva Samiti...">{{ old('quote', $testimonial->quote) }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $testimonial->sort_order ?? 1) }}">
                            </div>

                            <div class="col-md-6 d-flex align-items-center pt-4">
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_active">Publish Testimonial</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Person Photo</label>
                                <input type="file" name="photo" class="form-control" onchange="previewImage(this, 'testiPreview')">
                                <div class="mt-2 img-preview-box" style="width: 100px; height: 100px; border-radius: 50%;">
                                    <img id="testiPreview" src="{{ asset($testimonial->photo ?? 'images/student2.jpeg') }}" alt="Preview">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $testimonial->exists ? 'Update Testimonial' : 'Save Testimonial' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
