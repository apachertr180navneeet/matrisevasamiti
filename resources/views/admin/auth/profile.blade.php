@extends('admin.layouts.app')

@section('title', 'Admin Profile')

@section('content')
<div class="container-fluid px-0">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5 class="admin-card-title"><i class="bi bi-person-gear me-2 text-primary"></i> Admin Profile &amp; Password</h5>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.profile.update') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <hr class="my-4">
                        <h6 class="fw-bold mb-3 text-secondary">Change Password (Leave blank to keep unchanged)</h6>

                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control" placeholder="••••••••">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control" placeholder="Minimum 6 characters">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirm new password">
                            </div>
                        </div>

                        <button type="submit" class="btn-admin-primary">
                            <i class="bi bi-check2-circle me-1"></i> Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
