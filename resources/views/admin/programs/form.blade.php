@extends('admin.layouts.app')

@section('title', $program->exists ? 'Edit Program' : 'Create Program')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $program->exists ? 'Edit Program' : 'Create New Program' }}</h4>
            <p class="text-muted small mb-0">Configure program thematic domain, details, and cover images.</p>
        </div>
        <a href="{{ route('admin.programs.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Programs
        </a>
    </div>

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $program->exists ? route('admin.programs.update', $program->id) : route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($program->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Program Title *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $program->title) }}" required placeholder="e.g. Education & Digital Literacy">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Thematic Domain / Category</label>
                                <input type="text" name="category" class="form-control" value="{{ old('category', $program->category) }}" placeholder="e.g. Education, Health">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Short Summary</label>
                                <textarea name="short_description" class="form-control" rows="2" placeholder="Brief summary for card display...">{{ old('short_description', $program->short_description) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Detailed Content &amp; Impact</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Full program strategy, objectives, and reach...">{{ old('description', $program->description) }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $program->sort_order ?? 1) }}">
                            </div>

                            <div class="col-md-6 d-flex align-items-center pt-4">
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $program->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_active">Publish Program</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Program Image</label>
                                <input type="file" name="image" class="form-control" onchange="previewImage(this, 'progPreview')">
                                <div class="mt-2 img-preview-box" style="max-width: 280px; height: 160px;">
                                    <img id="progPreview" src="{{ asset($program->image ?? 'images/student1.jpeg') }}" alt="Program Preview">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.programs.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $program->exists ? 'Update Program' : 'Save Program' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
