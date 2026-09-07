@extends('admin.layouts.app')

@section('title', $certificate->exists ? 'Edit Document' : 'Upload Document')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $certificate->exists ? 'Edit Document' : 'Upload New Document' }}</h4>
            <p class="text-muted small mb-0">Upload 80G, 12A, CSR-1, Audit Reports, or legal certificates (PDF/Images).</p>
        </div>
        <a href="{{ route('admin.certificates.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Certificates
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $certificate->exists ? route('admin.certificates.update', $certificate->id) : route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($certificate->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Document Title *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $certificate->title) }}" required placeholder="e.g. 80G Tax Exemption Certificate">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Document Type *</label>
                                <select name="type" class="form-select" required>
                                    <option value="80G" {{ old('type', $certificate->type) == '80G' ? 'selected' : '' }}>80G Certificate</option>
                                    <option value="12A" {{ old('type', $certificate->type) == '12A' ? 'selected' : '' }}>12A Registration</option>
                                    <option value="CSR-1" {{ old('type', $certificate->type) == 'CSR-1' ? 'selected' : '' }}>CSR-1 Registration</option>
                                    <option value="NITI-Aayog" {{ old('type', $certificate->type) == 'NITI-Aayog' ? 'selected' : '' }}>NITI Aayog Darpan</option>
                                    <option value="Audit" {{ old('type', $certificate->type) == 'Audit' ? 'selected' : '' }}>Audit Report</option>
                                    <option value="Annual-Report" {{ old('type', $certificate->type) == 'Annual-Report' ? 'selected' : '' }}>Annual Report</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Financial Year / Validity</label>
                                <input type="text" name="year" class="form-control" value="{{ old('year', $certificate->year) }}" placeholder="e.g. 2023-2024 / Permanent">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $certificate->sort_order ?? 1) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description / Legal Details</label>
                                <textarea name="description" class="form-control" rows="2" placeholder="Brief note about the issuing authority and approval section...">{{ old('description', $certificate->description) }}</textarea>
                            </div>

                            <div class="col-md-6 d-flex align-items-center pt-2">
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $certificate->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_active">Make Available for Public Download</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Document File (PDF or Image) {{ $certificate->exists ? '(Leave empty to keep current)' : '*' }}</label>
                                <input type="file" name="file" class="form-control" {{ $certificate->exists ? '' : 'required' }}>
                                @if($certificate->exists && $certificate->file_path)
                                    <div class="mt-2 small text-muted">
                                        Current file: <a href="{{ asset($certificate->file_path) }}" target="_blank">{{ $certificate->file_path }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.certificates.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $certificate->exists ? 'Update Document' : 'Upload Document' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
