@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="container-fluid py-4 px-3">
        <div class="bg-white rounded shadow-sm p-4 mb-4">
            <h5 class="fw-bold text-danger fs-4 mb-4">Tambah Kategori</h5>

            <form action="{{ route('admin.categories.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Kategori</label>
                    <input type="text" name="name" id="name"
                        class="form-control shadow-sm border-danger @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" required>

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-4 d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-danger px-4 shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary px-4 shadow-sm">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
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