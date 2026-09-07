@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid px-0">

    <!-- TOP WELCOME BANNER -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #0F2B5B;">Welcome back, {{ Auth::user()->name }}! 👋</h3>
            <p class="text-muted mb-0 small">Here is what is happening across Matri Seva Samiti campaigns and inquiries today.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.causes.create') }}" class="btn btn-admin-secondary btn-sm d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle"></i> <span>New Cause</span>
            </a>
            <a href="{{ route('admin.banners.create') }}" class="btn btn-admin-primary btn-sm d-flex align-items-center gap-2">
                <i class="bi bi-image"></i> <span>New Banner</span>
            </a>
        </div>
    </div>

    <!-- STATS ROW -->
    <div class="row g-3 mb-4">
        <!-- Total Donations -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon success">
                    <i class="bi bi-currency-rupee"></i>
                </div>
                <div>
                    <h3 class="stat-number">₹{{ number_format($totalDonationsAmount, 0) }}</h3>
                    <p class="stat-label">Online Donations ({{ $totalDonationsCount }})</p>
                </div>
            </div>
        </div>

        <!-- Volunteers -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon warning">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div>
                    <h3 class="stat-number">{{ $totalVolunteers }}</h3>
                    <p class="stat-label">Total Volunteers ({{ $pendingVolunteers }} New)</p>
                </div>
            </div>
        </div>

        <!-- Contact Inquiries -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon info">
                    <i class="bi bi-envelope-open-fill"></i>
                </div>
                <div>
                    <h3 class="stat-number">{{ $totalContacts }}</h3>
                    <p class="stat-label">Inquiries ({{ $unreadContacts }} Unread)</p>
                </div>
            </div>
        </div>

        <!-- Active Causes & Programs -->
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div class="stat-icon primary">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                <div>
                    <h3 class="stat-number">{{ $totalCauses }} Causes</h3>
                    <p class="stat-label">{{ $totalPrograms }} Active Programs</p>
                </div>
            </div>
        </div>
    </div>

    <!-- RECENT TRANSACTIONS & INQUIRIES -->
    <div class="row g-4">
        <!-- Recent Online Donations -->
        <div class="col-xl-7">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title"><i class="bi bi-credit-card me-2 text-primary"></i> Recent Donations</h5>
                    <a href="{{ route('admin.donations.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
                </div>
                <div class="admin-card-body p-0">
                    <div class="table-responsive">
                        <table class="table admin-table align-middle">
                            <thead>
                                <tr>
                                    <th>Donor</th>
                                    <th>Amount</th>
                                    <th>Order ID</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentDonations as $donation)
                                    <tr>
                                        <td>
                                            <strong>{{ $donation->billing_name }}</strong>
                                            <div class="small text-muted">{{ $donation->billing_email }}</div>
                                        </td>
                                        <td class="fw-bold text-success">₹{{ number_format($donation->amount, 2) }}</td>
                                        <td><span class="badge bg-light text-dark border">{{ $donation->order_id }}</span></td>
                                        <td>
                                            @if($donation->order_status === 'Success')
                                                <span class="badge bg-success">Success</span>
                                            @elseif($donation->order_status === 'Failure')
                                                <span class="badge bg-danger">Failure</span>
                                            @else
                                                <span class="badge bg-warning text-dark">{{ $donation->order_status }}</span>
                                            @endif
                                        </td>
                                        <td class="small text-muted">{{ $donation->created_at->format('d M, Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No online donations recorded yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Contact Inquiries -->
        <div class="col-xl-5">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title"><i class="bi bi-chat-left-dots me-2 text-secondary"></i> Recent Inquiries</h5>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-secondary">Inbox</a>
                </div>
                <div class="admin-card-body p-0">
                    <div class="table-responsive">
                        <table class="table admin-table align-middle">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentContacts as $contact)
                                    <tr>
                                        <td>
                                            <strong>{{ $contact->name }}</strong>
                                            <div class="small text-muted">{{ $contact->email }}</div>
                                        </td>
                                        <td class="text-truncate" style="max-width: 140px;" title="{{ $contact->subject }}">{{ $contact->subject }}</td>
                                        <td>
                                            @if($contact->status === 'unread')
                                                <span class="badge bg-danger">New</span>
                                            @elseif($contact->status === 'contacted')
                                                <span class="badge bg-info text-dark">Contacted</span>
                                            @else
                                                <span class="badge bg-success">Resolved</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-sm btn-light border py-1 px-2">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">No recent inquiries found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- RECENT VOLUNTEER APPLICANTS -->
    <div class="row mt-2">
        <div class="col-12">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title"><i class="bi bi-person-lines-fill me-2 text-warning"></i> Recent Volunteer Registrations</h5>
                    <a href="{{ route('admin.volunteers.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
                </div>
                <div class="admin-card-body p-0">
                    <div class="table-responsive">
                        <table class="table admin-table align-middle">
                            <thead>
                                <tr>
                                    <th>Volunteer Name</th>
                                    <th>Email &amp; Phone</th>
                                    <th>Location / City</th>
                                    <th>Interests</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentVolunteers as $vol)
                                    <tr>
                                        <td><strong>{{ $vol->name }}</strong></td>
                                        <td>
                                            <div>{{ $vol->email }}</div>
                                            <small class="text-muted">{{ $vol->phone }}</small>
                                        </td>
                                        <td>{{ $vol->address ?? 'N/A' }}</td>
                                        <td><span class="badge bg-light text-dark border">{{ $vol->interest ?? 'General' }}</span></td>
                                        <td>
                                            @if($vol->status === 'pending')
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @elseif($vol->status === 'approved')
                                                <span class="badge bg-success">Approved</span>
                                            @else
                                                <span class="badge bg-secondary">{{ ucfirst($vol->status) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.volunteers.show', $vol->id) }}" class="btn btn-sm btn-light border py-1 px-2">
                                                <i class="bi bi-eye"></i> View Details
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">No volunteer registrations submitted yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
