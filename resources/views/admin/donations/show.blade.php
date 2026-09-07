@extends('admin.layouts.app')

@section('title', 'Donation Details #' . $donation->order_id)

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">Donation Order Details</h4>
            <p class="text-muted small mb-0">Order: <strong>#{{ $donation->order_id }}</strong> recorded on {{ $donation->created_at->format('d M Y, h:i A') }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.donations.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back to Donations
            </a>
            @if($donation->order_status === 'Success')
                <a href="{{ route('admin.donations.receipt', $donation->id) }}" target="_blank" class="btn btn-success btn-sm">
                    <i class="bi bi-printer me-1"></i> Print 80G Receipt
                </a>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title"><i class="bi bi-receipt me-2 text-primary"></i> Payment &amp; Donor Dossier</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <label class="text-muted small d-block">Donor Full Name</label>
                            <h5 class="fw-bold mb-0 text-dark">{{ $donation->billing_name }}</h5>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted small d-block">Donation Amount</label>
                            <h4 class="fw-bold mb-0 text-success">₹{{ number_format($donation->amount, 2) }} {{ $donation->currency }}</h4>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted small d-block">Email Address</label>
                            <a href="mailto:{{ $donation->billing_email }}">{{ $donation->billing_email }}</a>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted small d-block">Phone Number</label>
                            <a href="tel:{{ $donation->billing_tel }}">{{ $donation->billing_tel ?? 'N/A' }}</a>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted small d-block">Donor PAN Card</label>
                            <span class="badge bg-light text-dark border fs-6">{{ $donation->pan_number ? strtoupper($donation->pan_number) : 'Not Provided' }}</span>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted small d-block">Designated Cause / Fund</label>
                            <strong>{{ $donation->cause ?? 'General Community Welfare Fund' }}</strong>
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3 border-top pt-3">CCAvenue Gateway Transaction Information</h6>
                    <div class="table-responsive bg-light rounded-3 p-3 mb-4">
                        <table class="table table-borderless table-sm mb-0">
                            <tr>
                                <th class="text-muted" style="width: 200px;">Order ID:</th>
                                <td><span class="font-monospace fw-bold">{{ $donation->order_id }}</span></td>
                            </tr>
                            <tr>
                                <th class="text-muted">CCAvenue Tracking ID:</th>
                                <td><span class="font-monospace">{{ $donation->tracking_id ?? 'N/A' }}</span></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Bank Reference Number:</th>
                                <td><span class="font-monospace">{{ $donation->bank_ref_no ?? 'N/A' }}</span></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Payment Mode:</th>
                                <td>{{ $donation->payment_mode ?? 'Online / CCAvenue' }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Transaction Status:</th>
                                <td>
                                    @if($donation->order_status === 'Success')
                                        <span class="badge bg-success">Payment Success</span>
                                    @elseif($donation->order_status === 'Failure')
                                        <span class="badge bg-danger">Payment Failure</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ $donation->order_status }}</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>

                    @if($donation->raw_response)
                        <div class="accordion" id="rawAccordion">
                            <div class="accordion-item border rounded-3 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed py-2 small bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#rawPayload">
                                        <i class="bi bi-code-square me-2"></i> View Encrypted / Raw Callback Payload
                                    </button>
                                </h2>
                                <div id="rawPayload" class="accordion-collapse collapse" data-bs-parent="#rawAccordion">
                                    <div class="accordion-body bg-dark text-light small font-monospace" style="white-space: pre-wrap; word-break: break-all;">
                                        {{ $donation->raw_response }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h6 class="admin-card-title">Tax Exemption Summary</h6>
                </div>
                <div class="admin-card-body">
                    <p class="small text-muted mb-3">All donations made to Matri Seva Samiti are eligible for 50% deduction under Section 80G of the Indian Income Tax Act.</p>

                    <div class="p-3 bg-light rounded-3 mb-3">
                        <div class="small text-muted">80G Reg No:</div>
                        <strong>{{ config('site.tax_exemption_80g', 'AAATM1234EF20214') }}</strong>
                        <div class="small text-muted mt-2">12A Reg No:</div>
                        <strong>{{ config('site.tax_exemption_12a', 'AAATM1234EE20214') }}</strong>
                        <div class="small text-muted mt-2">NGO Darpan ID:</div>
                        <strong>{{ config('site.ngo_darpan_id', 'UP/2019/0234567') }}</strong>
                    </div>

                    @if($donation->order_status === 'Success')
                        <a href="{{ route('admin.donations.receipt', $donation->id) }}" target="_blank" class="btn btn-outline-primary w-100 mb-2">
                            <i class="bi bi-file-earmark-pdf me-1"></i> Generate Printable Receipt
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
