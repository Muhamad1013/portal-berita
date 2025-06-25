@extends('layouts.app')

@section('title', 'Berita Kategori: ' . $category->name)

@section('content')
  <div class="container py-5">
    <div class="row">
    <div class="col-md-8">
      <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold mb-0">Berita Kategori: {{ $category->name }}</h2>
      <a href="{{ route('beranda') }}" class="btn btn-sm btn-outline-danger">
        Kembali ke Beranda
      </a>
      </div>

      @foreach($filteredArticles as $item)
      {{-- Tampilan berita sama seperti di beranda --}}
      <div class="d-flex mb-3 border-bottom pb-3">
      <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->title }}"
      style="width:80px; height:80px; object-fit:cover; border-radius:6px;" class="me-3">
      <div class="flex-grow-1">
      <a href="#" class="fw-semibold text-dark d-block mb-1">
      {{ $item->title }}
      </a>
      <small class="text-muted d-block mb-2">
      {{ $item->created_at->format('d M Y') }}
      </small>
      <p class="mb-0 text-muted" style="font-size:0.875rem;">
      {!! Str::limit(strip_tags($item->content), 80) !!}
      </p>
      </div>
      </div>
    @endforeach

      {{ $filteredArticles->links() }}
    </div>

    <div class="col-md-4">
      {{-- Sidebar --}}
    </div>
    </div>
  </div>
@endsection