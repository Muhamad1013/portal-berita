@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
    <div class="container-fluid py-4 px-3">
        <div class="bg-white rounded shadow-sm p-4 mb-4">
            <h5 class="fw-bold text-danger fs-4 mb-4">Tambah Berita</h5>

            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf

                <!-- Judul -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul</label>
                    <input type="text" name="title" id="title"
                        class="form-control border-danger shadow-sm @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" required>

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Kategori -->
                <div class="mb-3">
                    <label for="category_id" class="form-label fw-semibold">Kategori</label>
                    <select name="category_id[]" id="category_id"
                        class="form-select border-danger shadow-sm @error('category_id') is-invalid @enderror" multiple
                        required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ collect(old('category_id'))->contains($category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="form-text">Tekan Ctrl (atau Cmd di Mac) untuk memilih lebih dari satu kategori.</div>
                </div>

                <!-- Konten -->
                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold">Konten</label>
                    <textarea name="content" id="content"
                        class="form-control border-danger shadow-sm @error('content') is-invalid @enderror" rows="6"
                        required>{{ old('content') }}</textarea>

                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gambar -->
                <div class="mb-3">
                    <label for="gambar" class="form-label fw-semibold">Gambar Thumbnail</label>
                    <input type="file" name="gambar" id="gambar"
                        class="form-control border-danger @error('gambar') is-invalid @enderror" accept="image/*" required>

                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-start gap-2 mt-4">
                    <button type="submit" class="btn btn-danger px-4 shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary px-4 shadow-sm">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Tambahan CSS -->
    <style>
        input.form-control:focus,
        select.form-select:focus,
        textarea.form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.15rem rgba(220, 53, 69, 0.25);
        }

        .form-label {
            font-size: 0.95rem;
        }

        .form-control,
        .form-select {
            font-size: 0.95rem;
            padding: 0.6rem 0.75rem;
            transition: 0.2s ease-in-out;
        }

        textarea.form-control {
            resize: vertical;
        }

        .btn i {
            vertical-align: middle;
        }
    </style>
@endsection