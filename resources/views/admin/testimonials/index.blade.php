@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Testimonials &amp; Impact Stories</h4>
            <p class="text-muted small mb-0">Manage beneficiary feedback, donor testimonials, and community reviews.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-admin-primary">
            <i class="bi bi-plus-circle me-1"></i> Add Testimonial
        </a>
    </div>

    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Author &amp; Role</th>
                            <th>Quote</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $testi)
                            <tr>
                                <td style="width: 70px;">
                                    <img src="{{ asset($testi->photo ?? 'images/student2.jpeg') }}" alt="{{ $testi->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                </td>
                                <td>
                                    <strong>{{ $testi->name }}</strong>
                                    <div class="small text-muted">{{ $testi->designation }} {{ $testi->location ? '('.$testi->location.')' : '' }}</div>
                                </td>
                                <td class="text-truncate" style="max-width: 280px;" title="{{ $testi->quote }}">{{ $testi->quote }}</td>
                                <td class="text-warning">
                                    @for($i=1; $i<=($testi->rating ?? 5); $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                </td>
                                <td>
                                    @if($testi->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Hidden</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.testimonials.edit', $testi->id) }}" class="btn btn-sm btn-light border me-1"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.testimonials.destroy', $testi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this testimonial?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No testimonials added yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
