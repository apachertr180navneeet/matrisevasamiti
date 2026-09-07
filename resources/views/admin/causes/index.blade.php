@extends('admin.layouts.app')

@section('title', 'Urgent Causes')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Causes &amp; Donation Campaigns</h4>
            <p class="text-muted small mb-0">Manage donation drives, goal amounts, raised totals, and featured appeals.</p>
        </div>
        <a href="{{ route('admin.causes.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Cause
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Campaign Title</th>
                            <th>Category</th>
                            <th>Financial Progress</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($causes as $cause)
                            <tr>
                                <td style="width: 80px;">
                                    <img src="{{ asset($cause->image ?? 'images/project1.jpeg') }}" alt="{{ $cause->title }}" style="width: 70px; height: 50px; object-fit: cover; border-radius: 8px;">
                                </td>
                                <td>
                                    <strong>{{ $cause->title }}</strong>
                                    <div class="small text-muted">Slug: /donate/{{ $cause->slug }}</div>
                                </td>
                                <td><span class="badge bg-light text-dark border">{{ $cause->category }}</span></td>
                                <td style="min-width: 170px;">
                                    <div class="d-flex justify-content-between small fw-semibold mb-1">
                                        <span class="text-success">₹{{ number_format($cause->raised_amount, 0) }}</span>
                                        <span class="text-muted">Goal: ₹{{ number_format($cause->goal_amount, 0) }}</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $cause->progress_percentage }}%"></div>
                                    </div>
                                </td>
                                <td>
                                    @if($cause->is_featured)
                                        <span class="badge bg-warning text-dark"><i class="bi bi-star-fill me-1"></i> Featured</span>
                                    @else
                                        <span class="text-muted small">Standard</span>
                                    @endif
                                </td>
                                <td>
                                    @if($cause->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Hidden</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.causes.edit', $cause->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.causes.destroy', $cause->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this cause?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No donation causes created yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
