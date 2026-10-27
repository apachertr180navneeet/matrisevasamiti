@extends('admin.layouts.app')

@section('title', 'All Blogs')

@section('content')
<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">
                <i class="bi bi-journal-richtext me-2 text-warning"></i>All Blog Articles
            </h4>
            <p class="text-muted small mb-0">Manage and publish inspiring articles, editorial stories, and community insights.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-tags-fill me-1"></i> Manage Categories
            </a>
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-admin-primary d-inline-flex align-items-center gap-2">
                <i class="bi bi-plus-circle"></i>
                <span>Add New Blog</span>
            </a>
        </div>
    </div>

    <!-- Filters & Search Bar -->
    <div class="admin-card mb-4">
        <div class="admin-card-body p-3">
            <form action="{{ route('admin.blogs.index') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control border-start-0" placeholder="Search by title, keyword, description..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <select name="category" class="form-select" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-admin-primary flex-grow-1">Filter</button>
                    @if(request()->hasAny(['search', 'category']))
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-light border" title="Reset Filters">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Blogs Table -->
    <div class="admin-card">
        <div class="admin-card-header d-flex justify-content-between align-items-center">
            <h5 class="admin-card-title">Articles ({{ $blogs->total() }})</h5>
            <span class="text-muted small">Showing {{ $blogs->firstItem() ?? 0 }} - {{ $blogs->lastItem() ?? 0 }} of {{ $blogs->total() }}</span>
        </div>
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th style="width: 90px;">Image</th>
                            <th>Title &amp; Meta</th>
                            <th>Category</th>
                            <th class="text-center">Views</th>
                            <th class="text-center">Status</th>
                            <th>Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration + ($blogs->currentPage() - 1) * $blogs->perPage() }}</td>
                                <td>
                                    <div class="rounded-3 overflow-hidden bg-light border" style="width: 76px; height: 52px;">
                                        @if($blog->image)
                                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="w-100 h-100 object-fit-cover">
                                        @else
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted small bg-light">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="fw-bold text-dark text-decoration-none d-block hover-primary">
                                        {{ Str::limit($blog->title, 65) }}
                                    </a>
                                    <div class="small text-muted d-flex align-items-center gap-2 mt-1">
                                        <code>/blogs/{{ $blog->slug }}</code>
                                        @if($blog->meta_title)
                                            <span class="badge bg-light text-secondary border" title="SEO Title configured"><i class="bi bi-check-circle-fill text-success me-1"></i>SEO</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if($blog->category)
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1">
                                            {{ $blog->category->name }}
                                        </span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary px-2 py-1">Uncategorized</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border px-2 py-1">
                                        <i class="bi bi-eye text-muted me-1"></i>{{ number_format($blog->views_count) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if($blog->is_published)
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">Published</span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2 py-1">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted d-block">{{ optional($blog->published_date)->format('M d, Y') ?? $blog->created_at->format('M d, Y') }}</small>
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('blogs.show', $blog->slug) }}" target="_blank" class="btn btn-sm btn-outline-info" title="View on Public Website">
                                            <i class="bi bi-box-arrow-up-right"></i>
                                        </a>
                                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-outline-primary" title="Edit Article">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Article">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="bi bi-journal-x fs-1 d-block mb-2 text-secondary"></i>
                                    No blog articles found.
                                    <div class="mt-2">
                                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-sm btn-admin-primary">
                                            <i class="bi bi-plus-circle me-1"></i> Create First Article
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($blogs->hasPages())
                <div class="p-3 border-top d-flex justify-content-end">
                    {{ $blogs->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
