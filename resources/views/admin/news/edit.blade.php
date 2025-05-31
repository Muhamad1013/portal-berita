@extends('layouts.admin')

@section('content')
  <div class="container">
    <h1 style="font-weight:bold; font-size:24px;" class="mb-4">Edit Berita</h1>

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="title" class="form-label"><strong>Judul</strong></label>
      <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
    </div>

    <div class="mb-3">
      <label for="category_id" class="form-label"><strong>Kategori</strong></label>
      <select name="category_id[]" id="category_id" class="form-select" multiple>
      @foreach($categories as $category)
      <option value="{{ $category->id }}" {{ in_array($category->id, $news->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
      {{ $category->name }}
      </option>
    @endforeach
      </select>
      <div class="form-text">Tekan Ctrl (atau Cmd di Mac) untuk memilih lebih dari satu kategori.</div>
    </div>

    <div class="mb-3">
      <label for="content" class="form-label"><strong>Konten</strong></label>
      <textarea name="content" class="form-control" rows="6" required>{{ $news->content }}</textarea>
    </div>

    @if ($news->gambar)
    <div class="mb-3">
      <label class="form-label"><strong>Gambar Saat Ini</strong></label><br>
      <img src="{{ asset('storage/' . $news->gambar) }}" alt="Thumbnail" class="img-fluid rounded"
      style="max-height: 200px;">
    </div>
    @endif

    <div class="mb-3">
      <label for="gambar" class="form-label"><strong>Ganti Gambar (opsional)</strong></label>
      <input type="file" name="gambar" class="form-control" accept="image/*">
    </div>

    <button class="btn btn-danger">Update</button>
    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
@endsection