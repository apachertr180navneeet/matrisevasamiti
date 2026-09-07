@extends('admin.layouts.app')

@section('title', 'Frequently Asked Questions')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Frequently Asked Questions (FAQs)</h4>
            <p class="text-muted small mb-0">Manage common questions about donations, 80G tax benefits, volunteering, and CSR.</p>
        </div>
        <a href="{{ route('admin.faqs.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-circle me-1"></i> Add FAQ
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Question</th>
                            <th>Category</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($faqs as $faq)
                            <tr>
                                <td>
                                    <strong>{{ $faq->question }}</strong>
                                    <div class="small text-muted text-truncate" style="max-width: 450px;">{{ $faq->answer }}</div>
                                </td>
                                <td><span class="badge bg-light text-dark border">{{ $faq->category }}</span></td>
                                <td>{{ $faq->sort_order }}</td>
                                <td>
                                    @if($faq->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Hidden</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this FAQ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">No FAQs created yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
