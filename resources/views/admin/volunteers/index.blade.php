@extends('admin.layouts.app')

@section('title', 'Volunteer Applications')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Volunteer Applications &amp; Directory</h4>
            <p class="text-muted small mb-0">Review applications from passionate individuals joining the Matri Seva Samiti mission.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.volunteers.index') }}" class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-outline-secondary' }}">All</a>
            <a href="{{ route('admin.volunteers.index', ['status' => 'pending']) }}" class="btn btn-sm {{ request('status') === 'pending' ? 'btn-warning' : 'btn-outline-warning' }}">Pending</a>
            <a href="{{ route('admin.volunteers.index', ['status' => 'approved']) }}" class="btn btn-sm {{ request('status') === 'approved' ? 'btn-success' : 'btn-outline-success' }}">Approved</a>
            <a href="{{ route('admin.volunteers.index', ['status' => 'rejected']) }}" class="btn btn-sm {{ request('status') === 'rejected' ? 'btn-danger' : 'btn-outline-danger' }}">Rejected</a>
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Volunteer Name</th>
                            <th>Contact Info</th>
                            <th>City / Address</th>
                            <th>Field of Interest</th>
                            <th>Applied On</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($volunteers as $vol)
                            <tr>
                                <td><strong>{{ $vol->name }}</strong></td>
                                <td>
                                    <div><a href="mailto:{{ $vol->email }}">{{ $vol->email }}</a></div>
                                    <div class="small text-muted">{{ $vol->phone }}</div>
                                </td>
                                <td>{{ $vol->address ?? 'N/A' }}</td>
                                <td><span class="badge bg-light text-dark border">{{ $vol->interest ?? 'General' }}</span></td>
                                <td class="small text-muted">{{ $vol->created_at->format('d M, Y') }}</td>
                                <td>
                                    @if($vol->status === 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($vol->status === 'approved')
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.volunteers.show', $vol->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-eye"></i> Details</a>
                                    <form action="{{ route('admin.volunteers.destroy', $vol->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete volunteer record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No volunteer applications found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($volunteers->hasPages())
                <div class="p-3 border-top d-flex justify-content-center">
                    {{ $volunteers->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
