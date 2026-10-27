@extends('admin.layouts.app')

@section('title', 'Blog Categories')

@section('content')
<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">
                <i class="bi bi-tags-fill me-2 text-warning"></i>Blog Categories
            </h4>
            <p class="text-muted small mb-0">Manage topic categories for your blog posts and articles.</p>
        </div>
        <button type="button" class="btn btn-admin-primary d-inline-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
            <i class="bi bi-plus-circle"></i>
            <span>Add New Category</span>
        </button>
    </div>

    <div class="row g-4">
        <!-- Categories Table -->
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title">All Categories ({{ $categories->count() }})</h5>
                </div>
                <div class="admin-card-body p-0">
                    <div class="table-responsive">
                        <table class="table admin-table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 60px;">#</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th class="text-center">Articles</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $category->name }}</div>
                                            @if($category->description)
                                                <small class="text-muted text-truncate d-block" style="max-width: 240px;">{{ $category->description }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <code class="text-primary bg-light px-2 py-1 rounded small">{{ $category->slug }}</code>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.blogs.index', ['category' => $category->id]) }}" class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 text-decoration-none">
                                                {{ $category->blogs_count }} {{ Str::plural('article', $category->blogs_count) }}
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            @if($category->is_active)
                                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">Active</span>
                                            @else
                                                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2 py-1">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-flex gap-1">
                                                <button type="button" class="btn btn-sm btn-outline-primary" 
                                                        onclick="openEditCategory({{ json_encode($category) }})" title="Edit Category">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <form action="{{ route('admin.blog-categories.destroy', $category->id) }}" method="POST" 
                                                      onsubmit="return confirm('Are you sure you want to delete this category? Associated blogs will remain preserved without a category.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Category">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">
                                            <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary"></i>
                                            No categories created yet. Click "Add New Category" above.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Info Card -->
        <div class="col-lg-4">
            <div class="admin-card">
                <div class="admin-card-header bg-light">
                    <h6 class="admin-card-title fs-6"><i class="bi bi-lightbulb-fill text-warning me-2"></i>Category Tips</h6>
                </div>
                <div class="admin-card-body">
                    <p class="small text-muted mb-3">Organizing your blog articles into distinct categories makes it easier for readers and search engines to discover related stories.</p>
                    <ul class="small text-muted ps-3 mb-0">
                        <li class="mb-2"><strong>Suggested Categories:</strong> Women Empowerment, Rural Education, Health &amp; Sanitation, Community Outreach, Environment.</li>
                        <li class="mb-2">Category slugs are automatically generated from the category name.</li>
                        <li>Deleting a category will NOT delete its blog articles.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ADD CATEGORY MODAL -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold" style="color: #0F2B5B;">Add New Blog Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.blog-categories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Category Name *</label>
                        <input type="text" name="name" id="addCategoryName" class="form-control" required placeholder="e.g. Rural Healthcare" onkeyup="generateCategorySlug(this.value, 'addCategorySlug')">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category Slug</label>
                        <input type="text" name="slug" id="addCategorySlug" class="form-control" placeholder="e.g. rural-healthcare">
                        <div class="form-text small text-muted">Auto-generated from name. Keep unique for clean URLs.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description (Optional)</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Brief description of this topic category..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="0">
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="addIsActive" checked>
                        <label class="form-check-label fw-semibold text-dark ms-2" for="addIsActive">Active (Visible on Website)</label>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-admin-primary">Create Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT CATEGORY MODAL -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold" style="color: #0F2B5B;">Edit Blog Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editCategoryForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Category Name *</label>
                        <input type="text" name="name" id="editCategoryName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category Slug *</label>
                        <input type="text" name="slug" id="editCategorySlug" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description (Optional)</label>
                        <textarea name="description" id="editCategoryDescription" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" id="editCategorySort" class="form-control">
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="editIsActive">
                        <label class="form-check-label fw-semibold text-dark ms-2" for="editIsActive">Active</label>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-admin-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function generateCategorySlug(text, targetId) {
        const slug = text.toString().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
        document.getElementById(targetId).value = slug;
    }

    function openEditCategory(category) {
        document.getElementById('editCategoryName').value = category.name || '';
        document.getElementById('editCategorySlug').value = category.slug || '';
        document.getElementById('editCategoryDescription').value = category.description || '';
        document.getElementById('editCategorySort').value = category.sort_order ?? 0;
        document.getElementById('editIsActive').checked = Boolean(category.is_active);

        const form = document.getElementById('editCategoryForm');
        form.action = `/admin/blog-categories/${category.id}`;

        const modal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
        modal.show();
    }
</script>
@endpush
