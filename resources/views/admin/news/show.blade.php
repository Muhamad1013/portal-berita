@extends('layouts.admin')

@section('content')
  <div class="container">
    <h1 class="mb-3">Judul Berita: {{ $news->title }}</h1>

    <p>
    <strong>Editor:</strong> {{ $news->editor->name ?? 'Admin' }} <br>
    <strong>Kategori:</strong>
    @if ($news->categories->isNotEmpty())
    {{ $news->categories->pluck('name')->join(', ') }}
    @else
    Tanpa Kategori
    @endif
    <br>

    <strong>Tanggal Upload:</strong> {{ $news->created_at->format('d M Y H:i') }}
    </p>

    @if ($news->gambar)
    <div class="mb-4">
    <label class="form-label"><strong>Thumbnail</strong></label><br>
    <img src="{{ asset('storage/' . $news->gambar) }}" alt="Thumbnail" class="img-fluid rounded"
      style="max-height: 300px;">
    </div>
    @endif

    <hr>

    <div class="mb-4">
    {!! nl2br(e($news->content)) !!}
    </div>

    <hr>

    <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
  </div>
@endsection