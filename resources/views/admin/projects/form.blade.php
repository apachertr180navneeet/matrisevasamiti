@extends('admin.layouts.app')

@section('title', $project->exists ? 'Edit Project' : 'Create Project')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $project->exists ? 'Edit Project' : 'Create New Project' }}</h4>
            <p class="text-muted small mb-0">Record project locations, impact metrics, status, and photos.</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Projects
        </a>
    </div>

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $project->exists ? route('admin.projects.update', $project->id) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($project->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label">Project Title *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}" required placeholder="e.g. Project Shiksha Uday">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Execution Status *</label>
                                <select name="status" class="form-select" required>
                                    <option value="Ongoing" {{ old('status', $project->status) == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                                    <option value="Completed" {{ old('status', $project->status) == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="Upcoming" {{ old('status', $project->status) == 'Upcoming' ? 'selected' : '' }}>Upcoming</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Location / Geography</label>
                                <input type="text" name="location" class="form-control" value="{{ old('location', $project->location) }}" placeholder="e.g. Varanasi & Chandauli District, UP">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Beneficiaries Reached</label>
                                <input type="text" name="beneficiaries" class="form-control" value="{{ old('beneficiaries', $project->beneficiaries) }}" placeholder="e.g. 3,500+ Rural Students">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Initiation Date</label>
                                <input type="date" name="project_date" class="form-control" value="{{ old('project_date', optional($project->project_date)->format('Y-m-d')) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $project->sort_order ?? 1) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Project Summary</label>
                                <textarea name="summary" class="form-control" rows="2" placeholder="Brief project summary...">{{ old('summary', $project->summary) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Detailed Implementation Report</label>
                                <textarea name="details" class="form-control" rows="5" placeholder="Detailed objectives, challenges overcome, and outcomes...">{{ old('details', $project->details) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Project Cover Image</label>
                                <input type="file" name="image" class="form-control" onchange="previewImage(this, 'projPreview')">
                                <div class="mt-2 img-preview-box" style="max-width: 280px; height: 160px;">
                                    <img id="projPreview" src="{{ asset($project->image ?? 'images/project1.jpeg') }}" alt="Project Preview">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $project->exists ? 'Update Project' : 'Save Project' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
