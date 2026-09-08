@extends('admin.layouts.app')

@section('title', 'CSR & Grants')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">CSR &amp; Philanthropic Grants</h4>
            <p class="text-muted small mb-0">Manage funding verticals, grant schemes, and focus project areas.</p>
        </div>
        <a href="{{ route('admin.grants.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Grant
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Grant Title</th>
                            <th>Category</th>
                            <th>Grant Amount</th>
                            <th>Features / Tags</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($grants as $item)
                            <tr>
                                <td>
                                    <strong class="d-block text-dark">{{ $item->title }}</strong>
                                    <small class="text-muted">{{ Str::limit($item->short_description, 60) }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $item->badge_color ?? 'primary' }}">
                                        {{ $item->category }}
                                    </span>
                                </td>
                                <td>
                                    <strong class="text-primary">{{ $item->amount_range ?? 'N/A' }}</strong>
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap gap-1">
                                        @foreach($item->tags_array as $tag)
                                            <span class="badge bg-light text-dark border small" style="font-size: 11px;">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td>{{ $item->sort_order }}</td>
                                <td>
                                    @if($item->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.grants.edit', $item->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.grants.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this grant vertical?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No grant opportunities configured yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
