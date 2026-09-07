@extends('admin.layouts.app')

@section('title', 'Contact Inquiries')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Contact Inbox &amp; Inquiries</h4>
            <p class="text-muted small mb-0">Review citizen inquiries, donor questions, and outreach messages.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-outline-secondary' }}">All</a>
            <a href="{{ route('admin.contacts.index', ['status' => 'unread']) }}" class="btn btn-sm {{ request('status') === 'unread' ? 'btn-danger' : 'btn-outline-danger' }}">Unread</a>
            <a href="{{ route('admin.contacts.index', ['status' => 'contacted']) }}" class="btn btn-sm {{ request('status') === 'contacted' ? 'btn-info' : 'btn-outline-info' }}">Contacted</a>
            <a href="{{ route('admin.contacts.index', ['status' => 'resolved']) }}" class="btn btn-sm {{ request('status') === 'resolved' ? 'btn-success' : 'btn-outline-success' }}">Resolved</a>
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Sender</th>
                            <th>Subject &amp; Snippet</th>
                            <th>Received At</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $msg)
                            <tr class="{{ $msg->status === 'unread' ? 'fw-bold bg-light' : '' }}">
                                <td>
                                    <div>{{ $msg->name }}</div>
                                    <div class="small text-muted font-monospace">{{ $msg->email }} {{ $msg->phone ? '• '.$msg->phone : '' }}</div>
                                </td>
                                <td>
                                    <div>{{ $msg->subject }}</div>
                                    <div class="small text-muted text-truncate" style="max-width: 320px;">{{ $msg->message }}</div>
                                </td>
                                <td class="small text-muted">{{ $msg->created_at->format('d M Y, h:i A') }}</td>
                                <td>
                                    @if($msg->status === 'unread')
                                        <span class="badge bg-danger">Unread</span>
                                    @elseif($msg->status === 'contacted')
                                        <span class="badge bg-info text-dark">Contacted</span>
                                    @else
                                        <span class="badge bg-success">Resolved</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.contacts.show', $msg->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-eye"></i> View</a>
                                    <form action="{{ route('admin.contacts.destroy', $msg->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete message?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No messages found in this view.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($contacts->hasPages())
                <div class="p-3 border-top d-flex justify-content-center">
                    {{ $contacts->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
