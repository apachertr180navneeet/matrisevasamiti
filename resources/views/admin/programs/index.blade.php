@extends('admin.layouts.app')

@section('title', 'Programs')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Programs &amp; Strategic Pillars</h4>
            <p class="text-muted small mb-0">Manage core thematic programs (Education, Health, Women Livelihood, Environment).</p>
        </div>
        <a href="{{ route('admin.programs.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Program
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Program Title</th>
                            <th>Category</th>
                            <th>Short Description</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($programs as $program)
                            <tr>
                                <td style="width: 80px;">
                                    <img src="{{ asset($program->image ?? 'images/student1.jpeg') }}" alt="{{ $program->title }}" style="width: 70px; height: 50px; object-fit: cover; border-radius: 8px;">
                                </td>
                                <td>
                                    <strong>{{ $program->title }}</strong>
                                </td>
                                <td><span class="badge bg-light text-dark border">{{ $program->category ?? 'General' }}</span></td>
                                <td class="text-truncate" style="max-width: 250px;">{{ $program->short_description }}</td>
                                <td>
                                    @if($program->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Hidden</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.programs.edit', $program->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.programs.destroy', $program->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this program?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No programs created yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
