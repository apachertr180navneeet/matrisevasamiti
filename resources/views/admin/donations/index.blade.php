@extends('admin.layouts.app')

@section('title', 'Donations & CCAvenue Transactions')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Donation Transactions &amp; 80G Receipts</h4>
            <p class="text-muted small mb-0">Total Successful Donations: <strong class="text-success">₹{{ number_format($totalAmount, 2) }}</strong></p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.donations.index') }}" class="btn btn-sm {{ !request('status') ? 'btn-primary' : 'btn-outline-secondary' }}">All</a>
            <a href="{{ route('admin.donations.index', ['status' => 'Success']) }}" class="btn btn-sm {{ request('status') === 'Success' ? 'btn-success' : 'btn-outline-success' }}">Successful</a>
            <a href="{{ route('admin.donations.index', ['status' => 'Failure']) }}" class="btn btn-sm {{ request('status') === 'Failure' ? 'btn-danger' : 'btn-outline-danger' }}">Failed</a>
            <a href="{{ route('admin.donations.index', ['status' => 'Pending']) }}" class="btn btn-sm {{ request('status') === 'Pending' ? 'btn-warning' : 'btn-outline-warning' }}">Pending</a>
        </div>
    </div>

    <!-- SEARCH BAR -->
    <div class="admin-card mb-4">
        <div class="admin-card-body py-3">
            <form action="{{ route('admin.donations.index') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Search by Order ID, Tracking ID, Donor Name, Email, or Mobile..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn-admin-primary w-100">Search</button>
                    @if(request('search') || request('status'))
                        <a href="{{ route('admin.donations.index') }}" class="btn btn-light border">Reset</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- TRANSACTIONS TABLE -->
    <div class="admin-card">
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Order &amp; Tracking ID</th>
                            <th>Donor Name &amp; Contact</th>
                            <th>Amount</th>
                            <th>PAN Number</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($donations as $donation)
                            <tr>
                                <td>
                                    <strong>{{ $donation->order_id }}</strong>
                                    <div class="small text-muted font-monospace">{{ $donation->tracking_id ?? 'Pending Ref' }}</div>
                                </td>
                                <td>
                                    <div>{{ $donation->billing_name }}</div>
                                    <div class="small text-muted">{{ $donation->billing_email }} {{ $donation->billing_tel ? '• '.$donation->billing_tel : '' }}</div>
                                </td>
                                <td class="fw-bold text-success">₹{{ number_format($donation->amount, 2) }}</td>
                                <td>{{ $donation->pan_number ? strtoupper($donation->pan_number) : 'N/A' }}</td>
                                <td>
                                    @if($donation->order_status === 'Success')
                                        <span class="badge bg-success">Success</span>
                                    @elseif($donation->order_status === 'Failure')
                                        <span class="badge bg-danger">Failure</span>
                                    @elseif($donation->order_status === 'Aborted')
                                        <span class="badge bg-secondary">Aborted</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ $donation->order_status }}</span>
                                    @endif
                                </td>
                                <td class="small text-muted">{{ $donation->created_at->format('d M, Y h:i A') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.donations.show', $donation->id) }}" class="btn btn-sm btn-light border me-1" title="View Details"><i class="bi bi-eye"></i></a>
                                    @if($donation->order_status === 'Success')
                                        <a href="{{ route('admin.donations.receipt', $donation->id) }}" target="_blank" class="btn btn-sm btn-outline-success" title="Print Receipt"><i class="bi bi-printer"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No donation transactions match the selected criteria.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($donations->hasPages())
                <div class="p-3 border-top d-flex justify-content-center">
                    {{ $donations->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
