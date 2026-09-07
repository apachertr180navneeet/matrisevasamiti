@extends('admin.layouts.app')

@section('title', 'Projects')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Key Projects &amp; Field Implementations</h4>
            <p class="text-muted small mb-0">Manage on-ground CSR and grassroots development projects.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Project
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Project Title</th>
                            <th>Location</th>
                            <th>Beneficiaries</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                            <tr>
                                <td style="width: 80px;">
                                    <img src="{{ asset($project->image ?? 'images/project1.jpeg') }}" alt="{{ $project->title }}" style="width: 70px; height: 50px; object-fit: cover; border-radius: 8px;">
                                </td>
                                <td>
                                    <strong>{{ $project->title }}</strong>
                                </td>
                                <td>{{ $project->location ?? 'N/A' }}</td>
                                <td><span class="badge bg-light text-dark border">{{ $project->beneficiaries ?? 'N/A' }}</span></td>
                                <td>
                                    @if($project->status === 'Ongoing')
                                        <span class="badge bg-primary">Ongoing</span>
                                    @elseif($project->status === 'Completed')
                                        <span class="badge bg-success">Completed</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $project->status }}</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this project?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No projects added yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
