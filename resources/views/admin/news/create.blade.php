@extends('layouts.admin')

@section('content')
  <div class="container">
    <h1 style="font-weight:bold; font-size:24px;" class="mb-4">Tambah Berita</h1>

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="title" class="form-label"><strong>Judul</strong></label>
      <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="category_id" class="form-label"><strong>Kategori</strong></label>
      <select name="category_id[]" id="category_id" class="form-select" multiple>
      @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
      </select>
      <div class="form-text">Tekan Ctrl (atau Cmd di Mac) untuk memilih lebih dari satu kategori.</div>
    </div>

    <div class="mb-3">
      <label for="content" class="form-label"><strong>Konten</strong></label>
      <textarea name="content" id="content" class="form-control" rows="6" required></textarea>
    </div>

    <div class="mb-3">
      <label for="gambar" class="form-label"><strong>Gambar Thumbnail</strong></label>
      <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-danger">Simpan</button>
    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

  </div>
@endsection