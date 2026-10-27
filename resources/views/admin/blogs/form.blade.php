@extends('admin.layouts.app')

@section('title', $blog->exists ? 'Edit Blog Article' : 'Create Blog Article')

@push('styles')
<style>
    /* Styling to match project & screenshot aesthetics */
    .blog-form-card {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #e5e9f2;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
    }
    .form-group-custom {
        margin-bottom: 22px;
    }
    .form-group-custom .form-label {
        font-weight: 600;
        color: #334155;
        font-size: 0.92rem;
        margin-bottom: 6px;
    }
    .form-group-custom .form-text-hint {
        font-size: 0.8rem;
        color: #64748b;
        margin-top: 5px;
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
        font-size: 1.15rem;
        font-weight: 700;
        color: #1e293b;
        margin-top: 35px;
        margin-bottom: 20px;
        padding-bottom: 8px;
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
                {{ $blog->exists ? 'Edit Blog Article' : 'Create New Blog Article' }}
            </h4>
            <p class="text-muted small mb-0">Fill in the fields below to publish or update your blog article with SEO metadata.</p>
        </div>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to All Blogs
        </a>
    </div>

    <div class="row">
        <div class="col-xl-10 col-lg-11 mx-auto">
            <div class="blog-form-card">
                <form action="{{ $blog->exists ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store') }}" 
                      method="POST" 
                      enctype="multipart/form-data" 
                      id="blogForm">
                    @csrf
                    @if($blog->exists)
                        @method('PUT')
                    @endif

                    <!-- Title -->
                    <div class="form-group-custom">
                        <label class="form-label" for="blogTitle">Title <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="title" 
                               id="blogTitle" 
                               class="form-control @error('title') is-invalid @enderror" 
                               value="{{ old('title', $blog->title) }}" 
                               required 
                               placeholder="e.g. Empowering Rural Communities: Our 2026 Initiative"
                               onkeyup="handleTitleChange(this.value)">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text-hint">This title your projects title.</div>
                    </div>

                    <!-- Slug -->
                    <div class="form-group-custom">
                        <label class="form-label" for="blogSlug">Slug <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="slug" 
                               id="blogSlug" 
                               class="form-control @error('slug') is-invalid @enderror" 
                               value="{{ old('slug', $blog->slug) }}" 
                               required 
                               placeholder="e.g. empowering-rural-communities-our-2026-initiative">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text-hint">create a slug from your title.</div>
                    </div>

                    <!-- Select Category -->
                    <div class="form-group-custom">
                        <label class="form-label" for="blogCategory">Select Category</label>
                        <select name="blog_category_id" id="blogCategory" class="form-select @error('blog_category_id') is-invalid @enderror">
                            <option value="">-- Choose Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('blog_category_id', $blog->blog_category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('blog_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image Upload & Preview -->
                    <div class="form-group-custom">
                        <label class="form-label" for="blogImage">Image</label>
                        <input type="file" 
                               name="image" 
                               id="blogImage" 
                               class="form-control @error('image') is-invalid @enderror" 
                               accept="image/*"
                               onchange="handleImagePreview(this)">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <!-- Preview Card matching screenshot 1 -->
                        <div id="imagePreviewContainer" style="{{ $blog->image ? 'display:block;' : 'display:none;' }}">
                            <div class="existing-image-card">
                                <span class="remove-btn" onclick="clearSelectedImage()" title="Remove image">
                                    <i class="bi bi-x"></i>
                                </span>
                                <img id="imagePreviewImg" 
                                     src="{{ $blog->image ? asset($blog->image) : '' }}" 
                                     alt="Blog Thumbnail Preview">
                                <span class="image-meta" id="imageFileName">
                                    {{ $blog->image ? basename($blog->image) : 'Preview' }}
                                </span>
                                <span class="image-sub">Existing</span>
                            </div>
                        </div>

                        <div class="form-text-hint">This Image show in your projects Image section.</div>
                    </div>

                    <!-- Short Description -->
                    <div class="form-group-custom">
                        <label class="form-label" for="shortDescription">Short Description</label>
                        <textarea name="short_description" 
                                  id="shortDescription" 
                                  class="form-control @error('short_description') is-invalid @enderror" 
                                  rows="3" 
                                  placeholder="Provide a concise summary of the article for blog cards and previews...">{{ old('short_description', $blog->short_description) }}</textarea>
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
                                  placeholder="Write the full body of the article here...">{{ old('content', $blog->content) }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Extra Publishing Options (2 columns) -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold text-muted">Author Name</label>
                            <input type="text" name="author_name" class="form-control" value="{{ old('author_name', $blog->author_name ?? 'Matri Seva Samiti') }}" placeholder="Author name">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold text-muted">Publish Date</label>
                            <input type="date" name="published_date" class="form-control" value="{{ old('published_date', optional($blog->published_date)->format('Y-m-d') ?? date('Y-m-d')) }}">
                        </div>
                        <div class="col-md-4 d-flex align-items-center pt-md-4">
                            <div class="form-check form-switch fs-5">
                                <input class="form-check-input" type="checkbox" name="is_published" value="1" id="is_published" {{ old('is_published', $blog->is_published ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_published">Publish Live</label>
                            </div>
                        </div>
                    </div>

                    <!-- SEO META INFORMATION SECTION (Matching Screenshot 2 & 3) -->
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
                               value="{{ old('meta_title', $blog->meta_title) }}" 
                               placeholder="e.g. Rural Healthcare Innovations &amp; Clean Water | Matri Seva Samiti">
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
                                  placeholder="e.g. rural development, health camp, women empowerment, ngo varanasi">{{ old('meta_keywords', $blog->meta_keywords) }}</textarea>
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
                                  placeholder="Enter summary description used in search engine snippet results...">{{ old('meta_description', $blog->meta_description) }}</textarea>
                        @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text-hint">Summary description used in search engine snippet results.</div>
                    </div>

                    <!-- Action Buttons matching Screenshot 3 -->
                    <div class="mt-4 pt-3 border-top d-flex justify-content-center gap-3">
                        <button type="submit" class="btn btn-success px-5 py-2 fw-semibold shadow-sm" style="background-color: #28a745; border-color: #28a745;">
                            Submit
                        </button>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-danger px-5 py-2 fw-semibold shadow-sm" style="background-color: #ef4444; border-color: #ef4444;">
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
    // Initialize TinyMCE matching Screenshot 2 styling and toolbar
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
    let manualSlugEdited = {{ $blog->exists ? 'true' : 'false' }};
    const slugInput = document.getElementById('blogSlug');
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
                document.getElementById('imagePreviewContainer').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }

    function clearSelectedImage() {
        const fileInput = document.getElementById('blogImage');
        fileInput.value = '';
        document.getElementById('imagePreviewContainer').style.display = 'none';
        document.getElementById('imagePreviewImg').src = '';
    }
</script>
@endpush
