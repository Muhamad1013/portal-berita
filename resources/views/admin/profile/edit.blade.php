@extends('layouts.admin')

@section('title', 'Edit Profile Admin')

@section('content')
    <div class="container-fluid py-4 px-3">
        <div class="bg-white rounded shadow-sm p-4 mb-4">
            <h5 class="fw-bold text-danger fs-4 mb-4">Edit Profile Admin</h5>

            <form action="{{ route('admin.profile.update') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" id="name"
                            class="form-control shadow-sm border-danger @error('name') is-invalid @enderror"
                            value="{{ old('name', $admin->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control shadow-sm border-danger @error('email') is-invalid @enderror"
                            value="{{ old('email', $admin->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label fw-semibold">Username</label>
                        <input type="text" name="username" id="username"
                            class="form-control shadow-sm border-danger @error('username') is-invalid @enderror"
                            value="{{ old('username', $admin->username) }}">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label fw-semibold">No. Telepon</label>
                        <input type="text" name="phone" id="phone"
                            class="form-control shadow-sm border-danger @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $admin->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-danger px-4 shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('admin.profile.show') }}" class="btn btn-secondary px-4 shadow-sm">
                        <i class="bi bi-arrow-left me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
        input.form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.15rem rgba(220, 53, 69, 0.25);
        }

        .form-label {
            font-size: 0.95rem;
        }

        .form-control {
            font-size: 0.95rem;
            padding: 0.6rem 0.75rem;
        }

        .btn i {
            vertical-align: middle;
        }
    </style>
@endsection