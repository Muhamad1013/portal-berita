@extends('layouts.admin')

@section('title', 'Ubah Password')

@section('content')
    <div class="container-fluid py-4 px-3">
        <div class="bg-white rounded shadow-sm p-4 mb-4">
            <h5 class="fw-bold text-danger fs-4 mb-4">Ubah Password</h5>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.profile.password.update') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="current_password" class="form-label fw-semibold">Password Saat Ini</label>
                    <input type="password" name="current_password" id="current_password"
                        class="form-control shadow-sm border-danger @error('current_password') is-invalid @enderror"
                        required>
                    @error('current_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password" class="form-label fw-semibold">Password Baru</label>
                    <input type="password" name="new_password" id="new_password"
                        class="form-control shadow-sm border-danger @error('new_password') is-invalid @enderror" required>
                    @error('new_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label fw-semibold">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        class="form-control shadow-sm border-danger" required>
                </div>

                <div class="mt-4 d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-danger px-4 shadow-sm">
                        <i class="bi bi-lock-fill me-1"></i> Ubah Password
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