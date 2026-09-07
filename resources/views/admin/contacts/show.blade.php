@extends('admin.layouts.app')

@section('title', 'View Inquiry Details')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Message Details</h4>
            <p class="text-muted small mb-0">From {{ $contact->name }} on {{ $contact->created_at->format('d M Y, h:i A') }}</p>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Inbox
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title">{{ $contact->subject }}</h5>
                </div>
                <div class="admin-card-body">
                    <div class="bg-light p-3 rounded-3 mb-4">
                        <div class="row">
                            <div class="col-sm-6 mb-2 mb-sm-0">
                                <small class="text-muted d-block">Sender</small>
                                <strong>{{ $contact->name }}</strong>
                            </div>
                            <div class="col-sm-6 mb-2 mb-sm-0">
                                <small class="text-muted d-block">Email &amp; Phone</small>
                                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                @if($contact->phone)
                                    <div><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-2">Message Body:</h6>
                    <div class="p-3 border rounded-3 bg-white mb-4" style="line-height: 1.7; font-size: 0.95rem; white-space: pre-wrap;">{{ $contact->message }}</div>

                    <div class="d-flex gap-2">
                        <a href="mailto:{{ $contact->email }}?subject=Re: {{ urlencode($contact->subject) }}" class="btn-admin-primary">
                            <i class="bi bi-reply-fill me-1"></i> Reply via Email
                        </a>
                        @if($contact->phone)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" target="_blank" class="btn btn-success">
                                <i class="bi bi-whatsapp me-1"></i> Message on WhatsApp
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h6 class="admin-card-title">Manage Inquiry Status</h6>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.contacts.status', $contact->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Current Status</label>
                            <select name="status" class="form-select">
                                <option value="unread" {{ $contact->status === 'unread' ? 'selected' : '' }}>Unread / New</option>
                                <option value="contacted" {{ $contact->status === 'contacted' ? 'selected' : '' }}>Contacted / In Progress</option>
                                <option value="resolved" {{ $contact->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-admin-secondary w-100">Update Status</button>
                    </form>

                    <hr class="my-4">

                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Delete this message permanently?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100 btn-sm">
                            <i class="bi bi-trash me-1"></i> Delete Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
