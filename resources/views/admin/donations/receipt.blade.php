<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>80G Tax Exemption Receipt #{{ $donation->order_id }} | Matri Seva Samiti</title>
    <link rel="shortcut icon" href="{{ asset(config('site.favicon', 'logo/Logo.png')) }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f8fafc;
            color: #1e293b;
            padding: 30px 15px;
        }

        .receipt-card {
            background: #ffffff;
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 25px rgba(0,0,0,0.06);
            border: 1px solid #e2e8f0;
            position: relative;
        }

        .receipt-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #0F2B5B;
            padding-bottom: 20px;
            margin-bottom: 24px;
        }

        .receipt-logo img {
            height: 64px;
        }

        .org-details {
            text-align: right;
            font-size: 0.85rem;
            color: #475569;
        }

        .receipt-badge {
            background: #0F2B5B;
            color: #ffffff;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 4px 14px;
            border-radius: 20px;
            display: inline-block;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .tax-alert-box {
            background: #f1f5f9;
            border-left: 4px solid #E35E25;
            padding: 12px 16px;
            font-size: 0.85rem;
            border-radius: 0 8px 8px 0;
            margin-bottom: 24px;
        }

        .table-receipt th {
            background: #f8fafc;
            color: #334155;
            font-size: 0.88rem;
            font-weight: 600;
            padding: 10px 16px;
        }

        .table-receipt td {
            padding: 12px 16px;
            font-size: 0.92rem;
        }

        @media print {
            body {
                background: #ffffff;
                padding: 0;
            }
            .no-print {
                display: none !important;
            }
            .receipt-card {
                box-shadow: none;
                border: none;
                padding: 20px 0;
            }
        }
    </style>
</head>
<body>

    <div class="text-center mb-3 no-print">
        <button onclick="window.print()" class="btn btn-primary px-4 py-2 rounded-pill fw-bold shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer me-2" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4z"/>
            </svg> Print / Save as PDF
        </button>
        <button onclick="window.close()" class="btn btn-outline-secondary px-4 py-2 rounded-pill ms-2">Close</button>
    </div>

    <div class="receipt-card">
        <!-- HEADER -->
        <div class="receipt-header">
            <div class="receipt-logo">
                <img src="{{ asset(config('site.logo', 'logo/Logo.png')) }}" alt="Matri Seva Samiti">
                <h4 class="fw-bold mt-2 mb-0" style="color: #0F2B5B;">Matri Seva Samiti</h4>
                <small class="text-muted">Registered Non-Profit Charitable Organization</small>
            </div>
            <div class="org-details">
                <div><strong>Head Office:</strong> {{ config('site.contact_address', 'Lucknow / Varanasi, UP, India') }}</div>
                <div><strong>Email:</strong> {{ config('site.contact_email', 'info@matrisevasamiti.org') }}</div>
                <div><strong>Phone:</strong> {{ config('site.contact_phone_primary', '+91 94152 00000') }}</div>
                <div><strong>PAN:</strong> {{ config('site.pan_number', 'AAATM1234E') }}</div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="receipt-badge">Section 80G Tax Exemption Donation Receipt</span>
            <div class="text-muted small"><strong>Receipt Date:</strong> {{ $donation->created_at->format('d M, Y') }}</div>
        </div>

        <div class="tax-alert-box">
            Donations made to <strong>Matri Seva Samiti</strong> are eligible for 50% tax deduction under <strong>Section 80G</strong> of the Income Tax Act, 1961 (Approval Unique Reg No: <strong>{{ config('site.tax_exemption_80g', 'AAATM1234EF20214') }}</strong>).
        </div>

        <!-- DONOR & TRANSACTION DETAILS -->
        <div class="row g-3 mb-4">
            <div class="col-sm-6">
                <div class="border rounded-3 p-3 h-100 bg-light">
                    <small class="text-muted d-block fw-semibold mb-1">DONOR INFORMATION</small>
                    <h5 class="fw-bold mb-1 text-primary">{{ $donation->billing_name }}</h5>
                    <div class="small"><strong>Email:</strong> {{ $donation->billing_email }}</div>
                    @if($donation->billing_tel)
                        <div class="small"><strong>Mobile:</strong> {{ $donation->billing_tel }}</div>
                    @endif
                    <div class="small"><strong>Donor PAN:</strong> {{ $donation->pan_number ? strtoupper($donation->pan_number) : 'Not Provided' }}</div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="border rounded-3 p-3 h-100 bg-light">
                    <small class="text-muted d-block fw-semibold mb-1">RECEIPT &amp; PAYMENT INFO</small>
                    <div class="small"><strong>Receipt No / Order ID:</strong> {{ $donation->order_id }}</div>
                    <div class="small"><strong>CCAvenue Ref:</strong> {{ $donation->tracking_id ?? 'N/A' }}</div>
                    <div class="small"><strong>Payment Method:</strong> {{ $donation->payment_mode ?? 'Online Gateway' }}</div>
                    <div class="small"><strong>Payment Status:</strong> <span class="badge bg-success">Received &amp; Verified</span></div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-receipt mb-4">
            <thead>
                <tr>
                    <th>Description / Purpose</th>
                    <th>Payment Mode</th>
                    <th class="text-end">Amount (INR)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>Charitable Contribution</strong>
                        <div class="small text-muted">{{ $donation->cause ?? 'General Community Upliftment, Rural Education & Healthcare Fund' }}</div>
                    </td>
                    <td>Online / CCAvenue Gateway</td>
                    <td class="text-end fw-bold text-success fs-5">₹{{ number_format($donation->amount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- FOOTER & SIGNATURE -->
        <div class="d-flex justify-content-between align-items-end mt-5 pt-3 border-top">
            <div class="small text-muted" style="max-width: 420px;">
                * This is a computer-generated official receipt. No physical signature is required. Thank you for empowering marginalized communities across India.
            </div>
            <div class="text-center">
                <div style="font-family: cursive; font-size: 1.3rem; color: #0F2B5B; margin-bottom: 4px;">Authorized Signatory</div>
                <div class="border-top pt-1 small fw-bold text-muted" style="min-width: 170px;">MATRI SEVA SAMITI</div>
            </div>
        </div>
    </div>

</body>
</html>
