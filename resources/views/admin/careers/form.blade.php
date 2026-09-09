@extends('admin.layouts.app')

@section('title', $career->exists ? 'Edit Job Opening' : 'Create Job Opening')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $career->exists ? 'Edit Job Opening' : 'Create New Job Opening' }}</h4>
            <p class="text-muted small mb-0">Fill in details about role, qualification requirements, stipend, and job type.</p>
        </div>
        <a href="{{ route('admin.careers.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Careers
        </a>
    </div>

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $career->exists ? route('admin.careers.update', $career->id) : route('admin.careers.store') }}" method="POST">
                        @csrf
                        @if($career->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Job Title *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $career->title) }}" required placeholder="e.g. Field Project Coordinator">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Job Type *</label>
                                <select name="job_type" class="form-select" required>
                                    @php $types = ['Full Time', 'Part Time', 'Paid Internship', 'Volunteer Role', 'Contractual']; @endphp
                                    @foreach($types as $type)
                                        <option value="{{ $type }}" {{ old('job_type', $career->job_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" value="{{ old('location', $career->location) }}" placeholder="e.g. Prayagraj / Delhi / Remote">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Stipend / Salary Range</label>
                                <input type="text" name="stipend_salary" class="form-control" value="{{ old('stipend_salary', $career->stipend_salary) }}" placeholder="e.g. Competitive NGO Stipend / ₹15,000 - ₹25,000">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Required Qualification</label>
                                <input type="text" name="qualification" class="form-control" value="{{ old('qualification', $career->qualification) }}" placeholder="e.g. MSW / B.Ed / Social Sciences / Graduate">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Required Experience</label>
                                <input type="text" name="experience" class="form-control" value="{{ old('experience', $career->experience) }}" placeholder="e.g. 1-3 Years in NGO Fieldwork / Freshers Welcome">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Short Summary (Shown on Job Card) *</label>
                                <textarea name="short_description" class="form-control" rows="3" placeholder="Brief overview of responsibilities...">{{ old('short_description', $career->short_description) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Full Details / Key Responsibilities &amp; Requirements</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Detailed job scope, tasks, preferred skills, etc...">{{ old('description', $career->description) }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Application Deadline</label>
                                <input type="date" name="deadline" class="form-control" value="{{ old('deadline', $career->deadline ? $career->deadline->format('Y-m-d') : '') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $career->sort_order ?? 1) }}">
                            </div>

                            <div class="col-md-4 d-flex align-items-center pt-4">
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $career->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_active">Open for Applications</label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.careers.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $career->exists ? 'Update Opening' : 'Publish Opening' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
