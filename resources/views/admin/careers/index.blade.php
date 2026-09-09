@extends('admin.layouts.app')

@section('title', 'Careers & Job Openings')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Careers &amp; Job Openings</h4>
            <p class="text-muted small mb-0">Manage job vacancies, internships, and volunteer opportunities shown on the Career page.</p>
        </div>
        <a href="{{ route('admin.careers.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-circle me-1"></i> Add New Job Opening
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Type &amp; Location</th>
                            <th>Qualification &amp; Exp</th>
                            <th>Stipend / Salary</th>
                            <th>Deadline</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($careers as $job)
                            <tr>
                                <td>
                                    <strong>{{ $job->title }}</strong>
                                    @if($job->short_description)
                                        <div class="small text-muted text-truncate" style="max-width: 250px;">{{ $job->short_description }}</div>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-primary text-white mb-1">{{ $job->job_type }}</span>
                                    <div class="small text-muted">{{ $job->location ?? 'All Locations' }}</div>
                                </td>
                                <td>
                                    <div class="small"><strong>Qual:</strong> {{ $job->qualification ?? 'N/A' }}</div>
                                    <div class="small text-muted"><strong>Exp:</strong> {{ $job->experience ?? 'N/A' }}</div>
                                </td>
                                <td>
                                    <span class="small fw-semibold text-dark">{{ $job->stipend_salary ?? 'As per NGO standards' }}</span>
                                </td>
                                <td>
                                    <span class="small text-muted">{{ $job->deadline ? $job->deadline->format('d M, Y') : 'Open Until Filled' }}</span>
                                </td>
                                <td>
                                    @if($job->is_active)
                                        <span class="badge bg-success">Active / Open</span>
                                    @else
                                        <span class="badge bg-secondary">Closed / Hidden</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.careers.edit', $job->id) }}" class="btn btn-sm btn-light border me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.careers.destroy', $job->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this job posting?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No job openings added yet. Click "Add New Job Opening" to create one.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
