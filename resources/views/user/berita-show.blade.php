@extends('layouts.app')

@section('title', $berita->title)

@section('content')
  <div class="container py-5">
    <div class="row">
    <div class="col-md-8">
      <h2 class="fw-bold">{{ $berita->title }}</h2>
      <small class="text-muted">{{ $berita->created_at->format('d F Y') }}</small>
      <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid my-3 rounded" alt="{{ $berita->title }}">
      <div>{!! $berita->content !!}</div>
    </div>

    <div class="col-md-4">
      <h5 class="fw-bold mb-3">Berita Terkait</h5>
      @foreach($relatedNews as $item)
      <div class="mb-3 border-bottom pb-2">
      <a href="{{ route('berita.show', $item->id) }}" class="text-decoration-none text-dark">
      <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid rounded mb-2"
      style="height: 100px; object-fit: cover;">
      <h6 class="mb-1">{{ $item->title }}</h6>
      <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
      </a>
      </div>
    @endforeach
    </div>
    </div>
  </div>
@endsection