@extends('admin.layouts.app')

@section('title', 'Legal Documents & Certificates')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Tax Exemption &amp; Legal Certificates</h4>
            <p class="text-muted small mb-0">Upload and manage 80G, 12A, CSR-1, Darpan, and Annual Audit Reports for donors.</p>
        </div>
        <a href="{{ route('admin.certificates.create') }}" class="btn-admin-primary">
            <i class="bi bi-file-earmark-plus me-1"></i> Upload Document
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Document Title</th>
                            <th>Type / Category</th>
                            <th>Validity / Year</th>
                            <th>File</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($certificates as $cert)
                            <tr>
                                <td>
                                    <strong>{{ $cert->title }}</strong>
                                    <div class="small text-muted">{{ $cert->description }}</div>
                                </td>
                                <td><span class="badge bg-light text-dark border">{{ $cert->type }}</span></td>
                                <td>{{ $cert->year ?? 'Current' }}</td>
                                <td>
                                    <a href="{{ asset($cert->file_path) }}" target="_blank" class="btn btn-sm btn-light border py-1 px-2">
                                        <i class="bi bi-file-earmark-pdf text-danger me-1"></i> View Document
                                    </a>
                                </td>
                                <td>
                                    @if($cert->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Hidden</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.certificates.edit', $cert->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.certificates.destroy', $cert->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this certificate?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No certificates or reports uploaded yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
