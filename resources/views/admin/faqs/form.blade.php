@extends('admin.layouts.app')

@section('title', $faq->exists ? 'Edit FAQ' : 'Add FAQ')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $faq->exists ? 'Edit FAQ' : 'Add New FAQ' }}</h4>
            <p class="text-muted small mb-0">Help donors and volunteers by answering frequently asked questions.</p>
        </div>
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to FAQs
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $faq->exists ? route('admin.faqs.update', $faq->id) : route('admin.faqs.store') }}" method="POST">
                        @csrf
                        @if($faq->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Category *</label>
                                <input type="text" name="category" class="form-control" value="{{ old('category', $faq->category ?? 'General') }}" required placeholder="e.g. Donations, Volunteer, 80G, CSR">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $faq->sort_order ?? 1) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Question *</label>
                                <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}" required placeholder="e.g. Is my donation eligible for 80G tax exemption?">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Detailed Answer *</label>
                                <textarea name="answer" class="form-control" rows="5" required placeholder="Clear and informative answer...">{{ old('answer', $faq->answer) }}</textarea>
                            </div>

                            <div class="col-12 d-flex align-items-center pt-2">
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $faq->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_active">Publish on FAQ page</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.faqs.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $faq->exists ? 'Update FAQ' : 'Save FAQ' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
