@extends('admin.layouts.app')

@section('title', 'Team & Board Members')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Team, Board &amp; Advisory Members</h4>
            <p class="text-muted small mb-0">Manage leadership profiles, designations, photos, and contact info.</p>
        </div>
        <a href="{{ route('admin.members.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-circle me-1"></i> Add Member
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Full Name</th>
                            <th>Designation</th>
                            <th>Category</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $member)
                            <tr>
                                <td style="width: 70px;">
                                    <img src="{{ asset($member->photo ?? 'images/student1.jpeg') }}" alt="{{ $member->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                </td>
                                <td>
                                    <strong>{{ $member->name }}</strong>
                                </td>
                                <td>{{ $member->designation }}</td>
                                <td><span class="badge bg-light text-dark border">{{ $member->category }}</span></td>
                                <td>
                                    <div class="small">{{ $member->email }}</div>
                                    <div class="small text-muted">{{ $member->phone }}</div>
                                </td>
                                <td>
                                    @if($member->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Hidden</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.members.edit', $member->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this member?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No team members added yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
