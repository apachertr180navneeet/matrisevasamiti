@extends('admin.layouts.app')

@section('title', $item->exists ? 'Edit News Post' : 'Create News Post')

@push('styles')
<style>
    /* Styling to match project & screenshot aesthetics */
    .news-form-card {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #e5e9f2;
        padding: 32px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
    }
    .form-group-custom {
        margin-bottom: 24px;
    }
    .form-group-custom .form-label {
        font-weight: 600;
        color: #334155;
        font-size: 0.92rem;
        margin-bottom: 7px;
    }
    .form-group-custom .form-text-hint {
        font-size: 0.82rem;
        color: #64748b;
        margin-top: 6px;
    }
    /* Existing Image Preview Box from screenshot */
    .existing-image-card {
        position: relative;
        display: inline-block;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 6px;
        background: #ffffff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        margin-top: 10px;
        max-width: 140px;
        text-align: center;
    }
    .existing-image-card img {
        width: 126px;
        height: 84px;
        object-fit: cover;
        border-radius: 6px;
    }
    .existing-image-card .remove-btn {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #64748b;
        color: #fff;
        border-radius: 50%;
        width: 22px;
        height: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        cursor: pointer;
        border: 2px solid #fff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        transition: background 0.2s;
    }
    .existing-image-card .remove-btn:hover {
        background: #ef4444;
    }
    .existing-image-card .image-meta {
        font-size: 0.72rem;
        color: #475569;
        margin-top: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
        max-width: 126px;
    }
    .existing-image-card .image-sub {
        font-size: 0.68rem;
        color: #94a3b8;
        display: block;
    }

    /* SEO Section Styling */
    .seo-header-title {
        font-size: 1.18rem;
        font-weight: 700;
        color: #1e293b;
        margin-top: 36px;
        margin-bottom: 22px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e2e8f0;
    }
</style>
@endpush

@section('content')
<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">
                {{ $item->exists ? 'Edit News & NGO News Article' : 'Create New News & NGO News Article' }}
            </h4>
            <p class="text-muted small mb-0">Fill in the fields below to publish or update your news article with SEO metadata.</p>
        </div>
        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to News
        </a>
    </div>

    <div class="row">
        <div class="col-xl-10 col-lg-11 mx-auto">
            <div class="news-form-card">
                <form action="{{ $item->exists ? route('admin.news.update', $item->id) : route('admin.news.store') }}" 
                      method="POST" 
                      enctype="multipart/form-data" 
                      id="newsForm">
                    @csrf
                    @if($item->exists)
                        @method('PUT')
                    @endif

                    <!-- Hidden remove image flag -->
                    <input type="hidden" name="remove_image" id="removeImageInput" value="0">

                    <!-- Title -->
                    <div class="form-group-custom">
                        <label class="form-label" for="newsTitle">Title <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="title" 
                               id="newsTitle" 
                               class="form-control @error('title') is-invalid @enderror" 
                               value="{{ old('title', $item->title) }}" 
                               required 
                               placeholder="e.g. Annual Blood Donation Camp Draws Over 500 Participants"
                               onkeyup="handleTitleChange(this.value)">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text-hint">This title your news title.</div>
                    </div>

                    <!-- Slug -->
                    <div class="form-group-custom">
                        <label class="form-label" for="newsSlug">Slug <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="slug" 
                               id="newsSlug" 
                               class="form-control @error('slug') is-invalid @enderror" 
                               value="{{ old('slug', $item->slug) }}" 
                               required 
                               placeholder="e.g. annual-blood-donation-camp-draws-over-500-participants">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text-hint">create a slug from your title.</div>
                    </div>

                    <!-- Select Category -->
                    <div class="form-group-custom">
                        <label class="form-label" for="newsCategory">Select Category</label>
                        <select name="category" id="newsCategory" class="form-select @error('category') is-invalid @enderror">
                            <option value="">-- Choose Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category', $item->category) == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                            @if($item->category && !in_array($item->category, $categories))
                                <option value="{{ $item->category }}" selected>{{ $item->category }}</option>
                            @endif
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image Upload & Preview -->
                    <div class="form-group-custom">
                        <label class="form-label" for="newsImage">Image</label>
                        <input type="file" 
                               name="image" 
                               id="newsImage" 
                               class="form-control @error('image') is-invalid @enderror" 
                               accept="image/*"
                               onchange="handleImagePreview(this)">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <!-- Preview Card matching screenshot 2 -->
                        <div id="imagePreviewContainer" style="{{ $item->image ? 'display:block;' : 'display:none;' }}">
                            <div class="existing-image-card">
                                <span class="remove-btn" onclick="clearSelectedImage()" title="Remove image">
                                    <i class="bi bi-x"></i>
                                </span>
                                <img id="imagePreviewImg" 
                                     src="{{ $item->image ? asset($item->image) : '' }}" 
                                     alt="News Thumbnail Preview">
                                <span class="image-meta" id="imageFileName">
                                    {{ $item->image ? basename($item->image) : 'Preview' }}
                                </span>
                                <span class="image-sub" id="imageStatusBadge">{{ $item->image ? 'Existing' : 'New' }}</span>
                            </div>
                        </div>

                        <div class="form-text-hint">This Image show in your news Image section.</div>
                    </div>

                    <!-- Short Description -->
                    <div class="form-group-custom">
                        <label class="form-label" for="shortDescription">Short Description</label>
                        <textarea name="short_description" 
                                  id="shortDescription" 
                                  class="form-control @error('short_description') is-invalid @enderror" 
                                  rows="3" 
                                  placeholder="Provide a concise summary of the news article for cards and previews...">{{ old('short_description', $item->excerpt) }}</textarea>
                        @error('short_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Full Description (Rich Text Editor) -->
                    <div class="form-group-custom">
                        <label class="form-label" for="fullDescription">Full Description</label>
                        <textarea name="content" 
                                  id="fullDescription" 
                                  class="form-control @error('content') is-invalid @enderror" 
                                  rows="12" 
                                  placeholder="Write the full body of the news article here...">{{ old('content', $item->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Publishing Options Row -->
                    <div class="row g-3 mb-3 p-3 bg-light rounded-3 border">
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold text-muted">Post Type</label>
                            <select name="type" class="form-select form-select-sm">
                                <option value="news" {{ old('type', $item->type ?? 'news') == 'news' ? 'selected' : '' }}>News Update</option>
                                <option value="blog" {{ old('type', $item->type) == 'blog' ? 'selected' : '' }}>Blog Article / Story</option>
                                <option value="event" {{ old('type', $item->type) == 'event' ? 'selected' : '' }}>Community Event</option>
                                <option value="media" {{ old('type', $item->type) == 'media' ? 'selected' : '' }}>Media Coverage</option>
                                <option value="press" {{ old('type', $item->type) == 'press' ? 'selected' : '' }}>Press Release</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold text-muted">Publish Date</label>
                            <input type="date" name="published_date" class="form-control form-control-sm" value="{{ old('published_date', optional($item->published_date)->format('Y-m-d') ?? date('Y-m-d')) }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold text-muted">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control form-control-sm" value="{{ old('sort_order', $item->sort_order ?? 1) }}">
                        </div>
                        <div class="col-md-3 d-flex align-items-center pt-md-3">
                            <div class="form-check form-switch fs-5">
                                <input class="form-check-input" type="checkbox" name="is_published" value="1" id="is_published" {{ old('is_published', $item->is_published ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_published">Publish Live</label>
                            </div>
                        </div>
                    </div>

                    <!-- SEO META INFORMATION SECTION (Matching Screenshot 3 & 4) -->
                    <div class="seo-header-title">
                        SEO Meta Information
                    </div>

                    <!-- SEO Title (Meta Title) -->
                    <div class="form-group-custom">
                        <label class="form-label" for="seoTitle">SEO Title (Meta Title)</label>
                        <input type="text" 
                               name="meta_title" 
                               id="seoTitle" 
                               class="form-control @error('meta_title') is-invalid @enderror" 
                               value="{{ old('meta_title', $item->meta_title) }}" 
                               placeholder="e.g. Annual Blood Donation Camp Draws Over 500 Participants | Matri Seva Samiti">
                        @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text-hint">Title tag used for search engines and browser title.</div>
                    </div>

                    <!-- SEO Keywords (Meta Keywords) -->
                    <div class="form-group-custom">
                        <label class="form-label" for="seoKeywords">SEO Keywords (Meta Keywords)</label>
                        <textarea name="meta_keywords" 
                                  id="seoKeywords" 
                                  class="form-control @error('meta_keywords') is-invalid @enderror" 
                                  rows="3" 
                                  placeholder="e.g. blood donation, rural healthcare, matri seva samiti, community welfare">{{ old('meta_keywords', $item->meta_keywords) }}</textarea>
                        @error('meta_keywords')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text-hint">Keywords for search engines separated by commas.</div>
                    </div>

                    <!-- SEO Description (Meta Description) -->
                    <div class="form-group-custom">
                        <label class="form-label" for="seoDescription">SEO Description (Meta Description)</label>
                        <textarea name="meta_description" 
                                  id="seoDescription" 
                                  class="form-control @error('meta_description') is-invalid @enderror" 
                                  rows="3" 
                                  placeholder="Summary description used in search engine snippet results...">{{ old('meta_description', $item->meta_description) }}</textarea>
                        @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text-hint">Summary description used in search engine snippet results.</div>
                    </div>

                    <!-- Action Buttons matching Screenshot 4 -->
                    <div class="mt-4 pt-3 border-top d-flex justify-content-center gap-3">
                        <button type="submit" class="btn btn-success px-5 py-2 fw-semibold shadow-sm" style="background-color: #28a745; border-color: #28a745;">
                            Submit
                        </button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-danger px-5 py-2 fw-semibold shadow-sm" style="background-color: #ef4444; border-color: #ef4444;">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- TinyMCE Rich Text Editor CDN -->
<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.3/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    // Initialize TinyMCE matching Screenshot 3 styling and toolbar
    tinymce.init({
        selector: '#fullDescription',
        height: 380,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image table | code help',
        content_style: 'body { font-family: Plus Jakarta Sans, Arial, sans-serif; font-size: 15px; color: #334155; line-height: 1.6; } h1, h2, h3, h4 { color: #0F2B5B; }',
        branding: false,
        promotion: false,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });

    // Auto-generate slug from title
    let manualSlugEdited = {{ $item->exists ? 'true' : 'false' }};
    const slugInput = document.getElementById('newsSlug');
    slugInput.addEventListener('input', function() {
        manualSlugEdited = true;
    });

    function handleTitleChange(val) {
        if (!manualSlugEdited) {
            const slug = val.toString().toLowerCase()
                .trim()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '')
                .replace(/-+$/, '');
            slugInput.value = slug;
        }

        // Auto-fill SEO Title if empty
        const seoTitleInput = document.getElementById('seoTitle');
        if (!seoTitleInput.value || seoTitleInput.dataset.autofilled === "true") {
            seoTitleInput.value = val;
            seoTitleInput.dataset.autofilled = "true";
        }
    }

    // Auto-fill SEO Description from Short Description if empty
    const shortDescInput = document.getElementById('shortDescription');
    const seoDescInput = document.getElementById('seoDescription');
    shortDescInput.addEventListener('input', function() {
        if (!seoDescInput.value || seoDescInput.dataset.autofilled === "true") {
            seoDescInput.value = this.value;
            seoDescInput.dataset.autofilled = "true";
        }
    });

    // Handle Image Preview
    function handleImagePreview(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreviewImg').src = e.target.result;
                document.getElementById('imageFileName').textContent = file.name;
                document.getElementById('imageStatusBadge').textContent = 'New';
                document.getElementById('imagePreviewContainer').style.display = 'block';
                document.getElementById('removeImageInput').value = '0';
            };
            reader.readAsDataURL(file);
        }
    }

    function clearSelectedImage() {
        const fileInput = document.getElementById('newsImage');
        fileInput.value = '';
        document.getElementById('imagePreviewContainer').style.display = 'none';
        document.getElementById('imagePreviewImg').src = '';
        document.getElementById('removeImageInput').value = '1';
    }
</script>
@endpush
