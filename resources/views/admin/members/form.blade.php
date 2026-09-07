@extends('admin.layouts.app')

@section('title', $member->exists ? 'Edit Member' : 'Add Member')

@section('content')
<div class="container-fluid px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #0F2B5B;">{{ $member->exists ? 'Edit Member Profile' : 'Add New Member' }}</h4>
            <p class="text-muted small mb-0">Record role, profile photo, biography, and social accounts.</p>
        </div>
        <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Members
        </a>
    </div>

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="admin-card">
                <div class="admin-card-body">
                    <form action="{{ $member->exists ? route('admin.members.update', $member->id) : route('admin.members.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($member->exists)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}" required placeholder="e.g. Dr. R. K. Sharma">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Designation / Role *</label>
                                <input type="text" name="designation" class="form-control" value="{{ old('designation', $member->designation) }}" required placeholder="e.g. President & Founder">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Category *</label>
                                <select name="category" class="form-select" required>
                                    <option value="Board" {{ old('category', $member->category) == 'Board' ? 'selected' : '' }}>Governing Board</option>
                                    <option value="Advisory" {{ old('category', $member->category) == 'Advisory' ? 'selected' : '' }}>Advisory Council</option>
                                    <option value="Core" {{ old('category', $member->category) == 'Core' ? 'selected' : '' }}>Core Executive Team</option>
                                    <option value="Volunteer" {{ old('category', $member->category) == 'Volunteer' ? 'selected' : '' }}>Lead Volunteer</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $member->phone) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Short Biography</label>
                                <textarea name="bio" class="form-control" rows="3" placeholder="Brief background, credentials, and achievements...">{{ old('bio', $member->bio) }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">LinkedIn Profile URL</label>
                                <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $member->linkedin) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Twitter / X URL</label>
                                <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $member->twitter) }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $member->sort_order ?? 1) }}">
                            </div>

                            <div class="col-md-6 d-flex align-items-center pt-4">
                                <div class="form-check form-switch fs-5">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $member->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label fs-6 fw-semibold text-dark ms-2" for="is_active">Publish on Website</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Profile Photo</label>
                                <input type="file" name="photo" class="form-control" onchange="previewImage(this, 'memberPreview')">
                                <div class="mt-2 img-preview-box" style="width: 120px; height: 120px; border-radius: 50%;">
                                    <img id="memberPreview" src="{{ asset($member->photo ?? 'images/student1.jpeg') }}" alt="Member Preview">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.members.index') }}" class="btn btn-light border px-4">Cancel</a>
                            <button type="submit" class="btn-admin-primary px-4">
                                <i class="bi bi-check2-circle me-1"></i> {{ $member->exists ? 'Update Member' : 'Save Member' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
