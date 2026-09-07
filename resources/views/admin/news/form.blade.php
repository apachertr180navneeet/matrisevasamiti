@extends('admin.layouts.app')

@section('title', $item->exists ? 'Edit News Post' : 'Create News Post')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $item->exists ? 'Edit Article / Event' : 'Create New Article / Event' }}</h4>
            <p class="text-muted small mb-0">Publish stories, press coverages, and event reports.</p>
        </div>
        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to News
        </a>
    </div>

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $item->exists ? route('admin.news.update', $item->id) : route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($item->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Article / Event Title *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $item->title) }}" required placeholder="e.g. Annual Blood Donation Camp Draws Over 500 Participants">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Post Type *</label>
                                <select name="type" class="form-select" required>
                                    <option value="news" {{ old('type', $item->type) == 'news' ? 'selected' : '' }}>News Update</option>
                                    <option value="event" {{ old('type', $item->type) == 'event' ? 'selected' : '' }}>Community Event</option>
                                    <option value="media" {{ old('type', $item->type) == 'media' ? 'selected' : '' }}>Media / Press</option>
                                    <option value="press" {{ old('type', $item->type) == 'press' ? 'selected' : '' }}>Press Release</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <input type="text" name="category" class="form-control" value="{{ old('category', $item->category) }}" placeholder="e.g. Health Camp, Education, CSR">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Publish Date</label>
                                <input type="date" name="published_date" class="form-control" value="{{ old('published_date', optional($item->published_date)->format('Y-m-d') ?? date('Y-m-d')) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Short Excerpt</label>
                                <textarea name="excerpt" class="form-control" rows="2" placeholder="Short excerpt for cards...">{{ old('excerpt', $item->excerpt) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Full Article Content</label>
                                <textarea name="content" class="form-control" rows="6" placeholder="Detailed story and press coverage details...">{{ old('content', $item->content) }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $item->sort_order ?? 1) }}">
                            </div>

                            <div class="col-md-6 d-flex align-items-center pt-4">
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="is_published" value="1" id="is_published" {{ old('is_published', $item->is_published ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_published">Publish Post Live</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Featured Image</label>
                                <input type="file" name="image" class="form-control" onchange="previewImage(this, 'newsPreview')">
                                <div class="mt-2 img-preview-box" style="max-width: 280px; height: 160px;">
                                    <img id="newsPreview" src="{{ asset($item->image ?? 'images/student1.jpeg') }}" alt="News Preview">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.news.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $item->exists ? 'Update Article' : 'Publish Article' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
