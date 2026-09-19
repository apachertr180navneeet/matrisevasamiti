@extends('admin.layouts.app')

@section('title', 'Contact Inquiries')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Contact Inbox &amp; Inquiries</h4>
            <p class="text-muted small mb-0">Review citizen inquiries, donor questions, and outreach messages.</p>
        </div>
        <div class="d-flex gap-2 flex-wrap">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-outline-secondary' }}">All</a>
            <a href="{{ route('admin.contacts.index', ['status' => 'unread']) }}" class="btn btn-sm {{ request('status') === 'unread' ? 'btn-danger' : 'btn-outline-danger' }}">Unread</a>
            <a href="{{ route('admin.contacts.index', ['status' => 'contacted']) }}" class="btn btn-sm {{ request('status') === 'contacted' ? 'btn-info' : 'btn-outline-info' }}">Contacted</a>
            <a href="{{ route('admin.contacts.index', ['status' => 'resolved']) }}" class="btn btn-sm {{ request('status') === 'resolved' ? 'btn-success' : 'btn-outline-success' }}">Resolved</a>
        </div>
    </div>

    <!-- BULK ACTION FORM -->
    <form id="bulkDeleteForm" action="{{ route('admin.contacts.bulk-delete') }}" method="POST">
        @csrf

        <!-- FLOATING / STICKY BULK ACTION BAR -->
        <div id="bulkActionBar" class="alert alert-danger shadow-sm border-0 rounded-3 mb-3 d-none align-items-center justify-content-between py-2 px-3">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-check2-square fs-5 text-danger"></i>
                <span class="fw-bold text-danger"><span id="selectedCount">0</span> inquiries selected</span>
            </div>
            <button type="button" class="btn btn-danger btn-sm rounded-pill px-3 fw-bold" onclick="confirmBulkDelete()">
                <i class="bi bi-trash3-fill me-1"></i> Delete Selected
            </button>
        </div>

        <div class="admin-card">
            <div class="admin-card-body p-0">
                <div class="table-responsive">
                    <table class="table admin-table align-middle">
                        <thead>
                            <tr>
                                <th style="width: 40px;" class="text-center">
                                    <input type="checkbox" class="form-check-input" id="selectAllCheckbox" title="Select All">
                                </th>
                                <th>Sender</th>
                                <th>Subject &amp; Snippet</th>
                                <th>Received At</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $msg)
                                <tr class="{{ $msg->status === 'unread' ? 'fw-bold bg-light' : '' }}" id="row-{{ $msg->id }}">
                                    <td class="text-center">
                                        <input type="checkbox" name="ids[]" value="{{ $msg->id }}" class="form-check-input contact-row-checkbox">
                                    </td>
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
                                        <button type="button" class="btn btn-sm btn-light border text-danger" onclick="deleteSingle({{ $msg->id }})">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">No messages found in this view.</td>
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
    </form>
</div>

<!-- SINGLE ITEM DELETE FORM (HELPER) -->
<form id="singleDeleteForm" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('selectAllCheckbox');
    const checkboxes = document.querySelectorAll('.contact-row-checkbox');
    const bulkBar = document.getElementById('bulkActionBar');
    const countSpan = document.getElementById('selectedCount');

    function updateBulkState() {
        const checked = document.querySelectorAll('.contact-row-checkbox:checked');
        const count = checked.length;
        countSpan.textContent = count;

        if (count > 0) {
            bulkBar.classList.remove('d-none');
            bulkBar.classList.add('d-flex');
        } else {
            bulkBar.classList.add('d-none');
            bulkBar.classList.remove('d-flex');
        }

        if (selectAll) {
            selectAll.checked = (checkboxes.length > 0 && count === checkboxes.length);
            selectAll.indeterminate = (count > 0 && count < checkboxes.length);
        }
    }

    if (selectAll) {
        selectAll.addEventListener('change', function() {
            checkboxes.forEach(cb => {
                cb.checked = selectAll.checked;
            });
            updateBulkState();
        });
    }

    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateBulkState);
    });
});

function confirmBulkDelete() {
    const count = document.querySelectorAll('.contact-row-checkbox:checked').length;
    if (count === 0) {
        alert('Please select at least one inquiry to delete.');
        return;
    }
    if (confirm(`Are you sure you want to permanently delete ${count} selected inquiries?`)) {
        document.getElementById('bulkDeleteForm').submit();
    }
}

function deleteSingle(id) {
    if (confirm('Are you sure you want to delete this inquiry?')) {
        const form = document.getElementById('singleDeleteForm');
        form.action = "{{ url('admin/contacts') }}/" + id;
        form.submit();
    }
}
</script>
@endsection
