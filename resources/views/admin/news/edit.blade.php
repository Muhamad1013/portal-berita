@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
    <div class="container-fluid py-4 px-3">
        <div class="bg-white rounded shadow-sm p-4 mb-4">
            <h5 class="fw-bold text-danger fs-4 mb-4">Edit Berita</h5>

            <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Judul</label>
                    <input type="text" name="title" id="title"
                        class="form-control border-danger shadow-sm @error('title') is-invalid @enderror"
                        value="{{ old('title', $news->title) }}" required>

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
                            <option value="{{ $category->id }}" {{ in_array($category->id, $news->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="form-text">Gunakan Ctrl (Cmd di Mac) untuk memilih lebih dari satu.</div>
                </div>

                <!-- Konten -->
                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold">Konten</label>
                    <textarea name="content" id="content" rows="6"
                        class="form-control border-danger shadow-sm @error('content') is-invalid @enderror"
                        required>{{ old('content', $news->content) }}</textarea>

                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gambar saat ini -->
                @if ($news->gambar)
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Gambar Saat Ini</label><br>
                        <img src="{{ asset('storage/' . $news->gambar) }}" class="img-fluid rounded shadow-sm"
                            style="max-height: 200px;" alt="Gambar Berita">
                    </div>
                @endif

                <!-- Ganti Gambar -->
                <div class="mb-3">
                    <label for="gambar" class="form-label fw-semibold">Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar" id="gambar"
                        class="form-control border-danger @error('gambar') is-invalid @enderror" accept="image/*">

                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-start gap-2 mt-4">
                    <button type="submit" class="btn btn-danger px-4 shadow-sm">
                        <i class="bi bi-save me-1"></i> Update
                    </button>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary px-4 shadow-sm">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

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