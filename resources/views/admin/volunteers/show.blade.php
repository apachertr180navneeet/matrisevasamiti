@extends('admin.layouts.app')

@section('title', 'Volunteer Application Details')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Volunteer Application</h4>
            <p class="text-muted small mb-0">Applicant profile and motivation submitted on {{ $volunteer->created_at->format('d M Y, h:i A') }}</p>
        </div>
        <a href="{{ route('admin.volunteers.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Volunteers
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title"><i class="bi bi-person-vcard me-2 text-primary"></i> {{ $volunteer->name }}</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <label class="text-muted small d-block">Email Address</label>
                            <strong><a href="mailto:{{ $volunteer->email }}">{{ $volunteer->email }}</a></strong>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted small d-block">Phone / WhatsApp</label>
                            <strong><a href="tel:{{ $volunteer->phone }}">{{ $volunteer->phone }}</a></strong>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted small d-block">Address / City</label>
                            <strong>{{ $volunteer->address ?? 'N/A' }}</strong>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted small d-block">Primary Focus Area</label>
                            <span class="badge bg-primary fs-6">{{ $volunteer->interest ?? 'General Volunteering' }}</span>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted small d-block">Availability</label>
                            <strong>{{ $volunteer->availability ?? 'Flexible' }}</strong>
                        </div>
                    </div>

                    @if($volunteer->message)
                        <h6 class="fw-bold mb-2">Message / Why They Want to Volunteer:</h6>
                        <div class="p-3 border rounded-3 bg-light mb-4" style="line-height: 1.7; font-size: 0.95rem; white-space: pre-wrap;">{{ $volunteer->message }}</div>
                    @endif

                    <div class="d-flex gap-2">
                        <a href="mailto:{{ $volunteer->email }}?subject=Welcome to Matri Seva Samiti Volunteer Team" class="btn-admin-primary">
                            <i class="bi bi-envelope me-1"></i> Email Volunteer
                        </a>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $volunteer->phone) }}" target="_blank" class="btn btn-success">
                            <i class="bi bi-whatsapp me-1"></i> WhatsApp Message
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h6 class="admin-card-title">Manage Application Status</h6>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.volunteers.status', $volunteer->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Application Status</label>
                            <select name="status" class="form-select">
                                <option value="pending" {{ $volunteer->status === 'pending' ? 'selected' : '' }}>Pending Review</option>
                                <option value="approved" {{ $volunteer->status === 'approved' ? 'selected' : '' }}>Approved / Active Volunteer</option>
                                <option value="rejected" {{ $volunteer->status === 'rejected' ? 'selected' : '' }}>Rejected / Not Selected</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-admin-secondary w-100">Update Status</button>
                    </form>

                    <hr class="my-4">

                    <form action="{{ route('admin.volunteers.destroy', $volunteer->id) }}" method="POST" onsubmit="return confirm('Delete this volunteer record?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100 btn-sm">
                            <i class="bi bi-trash me-1"></i> Delete Record
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
