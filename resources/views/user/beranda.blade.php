@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

    body,
    h1,
    h2,
    h3,
    h4,
    p,
    a,
    small {
    font-family: 'Inter', sans-serif;
    }

    a:hover {
    color: #dc2626 !important;
    }

    .section-box {
    background-color: #fff;
    border-radius: 8px;
    padding: 24px;
    margin-bottom: 40px;
    }

    .headline-img {
    width: 100%;
    height: 360px;
    object-fit: cover;
    border-radius: 8px;
    }

    .headline-box h2 {
    text-align: center;
    font-weight: 700;
    font-size: 1.8rem;
    color: #1f2937;
    margin-bottom: 16px;
    }

    .headline-box small {
    display: block;
    text-align: center;
    color: #6b7280;
    margin: 8px 0;
    }

    .headline-box p {
    text-align: left;
    color: #4B5563;
    margin-top: 12px;
    }

    .btn-read {
    display: block;
    text-align: left;
    margin-top: 16px;
    font-weight: 600;
    color: #dc2626;
    text-decoration: none;
    }

    .card-img-top {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 6px 6px 0 0;
    }

    .card-hover:hover h6 {
    color: #dc2626;
    }

    .carousel-control-prev,
    .carousel-control-next {
    top: 35% !important;
    transform: translateY(-50%);
    width: 30px;
    height: 30px;
    background-color: #dc2626;
    border-radius: 50%;
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
    background-color: #b91c1c;
    }

    .carousel-control-prev-icon i,
    .carousel-control-next-icon i {
    color: white;
    font-size: 1rem;
    }

    .carousel-control-prev {
    left: -10px;
    }

    .carousel-control-next {
    right: -10px;
    }

    .sidebar-item-link {
    display: flex;
    gap: 12px;
    text-decoration: none;
    padding: 8px 0;
    margin-bottom: 16px;
    }

    .sidebar-item-link img {
    width: 100px;
    height: 70px;
    object-fit: cover;
    border-radius: 6px;
    }

    .sidebar-item-link h6 {
    font-size: 0.95rem;
    margin-bottom: 4px;
    font-weight: 600;
    color: #1f2937;
    transition: color 0.3s ease;
    }

    .sidebar-item-link:hover h6 {
    color: #dc2626;
    }

    .category-box {
    background-color: #ffffff;
    border-radius: 8px;
    padding: 24px;
    height: 100%;
    }

    .category-article {
    display: flex;
    gap: 12px;
    margin-bottom: 20px;
    padding: 8px 0;
    align-items: flex-start;
    text-decoration: none;
    color: #1f2937;
    }

    .category-article img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 6px;
    flex-shrink: 0;
    }

    .category-article h6 {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 4px;
    transition: color 0.3s ease;
    }

    .category-article:hover h6 {
    color: #dc2626;
    }

    .category-article small {
    font-size: 0.8rem;
    color: #6b7280;
    }

    .category-article p {
    font-size: 0.85rem;
    color: #6b7280;
    margin-bottom: 0;
    }

    @media (max-width: 767.98px) {
    .headline-img {
      height: 220px;
    }

    .sidebar-item-link {
      flex-direction: column;
      align-items: flex-start;
    }

    .sidebar-item-link img {
      width: 100%;
      height: auto;
    }
    }

    .card-img-top,
    .sidebar-item-link img,
    .category-article img,
    .headline-img {
    transition: transform 0.4s ease;
    }

    .card-hover:hover .card-img-top,
    .sidebar-item-link:hover img,
    .category-article:hover img {
    transform: scale(1.05);
    }

    a.badge:hover {
    color: white !important;
    background-color: #dc2626 !important;
    text-decoration: none !important;
    }


    .carousel-control-prev-icon,
    .carousel-control-next-icon {
    background-image: none !important;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    background-color: #dc2626;
    border-radius: 50%;
    }
  </style>

  <div class="container py-5">
    <div class="row">
    {{-- KIRI --}}
    <div class="col-md-8">
      {{-- HEADLINE --}}
      @if($headline)
      <div class="section-box headline-box">
      <div class="text-center mb-3">
      <h2 class="fw-bold">{{ $headline->title }}</h2>
      <small class="text-muted">{{ $headline->created_at->format('d F Y') }}</small>
      </div>
      <div class="mb-3">
      <img src="{{ asset('storage/' . $headline->gambar) }}" alt="Headline" class="headline-img">
      </div>
      {{-- Tombol kategori bisa diklik, tanpa efek hover --}}
      <div class="d-flex flex-wrap gap-1 mb-2">
      @foreach($headline->categories as $cat)
      <a href="{{ route('user.beranda.kategori', $cat->id) }}"
      class="badge bg-danger text-decoration-none text-white" style="font-size: 0.75rem; pointer-events: auto;">
      {{ $cat->name }}
      </a>
      @endforeach
      </div>

      <p class="text-justify text-muted" style="line-height: 1.6;">
      {!! \Illuminate\Support\Str::limit(strip_tags($headline->content), 500) !!}
      </p>
      <div class="mt-3">
      <a href="{{ route('berita.show', $headline->id) }}" class="btn-read">Baca Selengkapnya &rarr;</a>
      </div>
      <hr class="my-5">
      </div>
    @endif


      {{-- BERITA TERPOPULER --}}
      <div style="margin-top: -6em;" class="section-box">
      <h3 class="fw-bold mb-4">Berita Terpopuler</h3>
      @if(count($popularArticles) > 0)
      <div id="carouselPopuler" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        @foreach(collect($popularArticles)->chunk(3) as $index => $chunk)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
        <div class="row"> @foreach($chunk as $article) <div class="col-md-4 col-12 mb-3">
        <div class="card h-100 border-0 card-hover">
        <a href=" {{ route('berita.show', $article->id) }}" class="text-decoration-none text-dark">
        <img src="{{ asset('storage/' . $article->gambar) }}" class="card-img-top" alt="Gambar Berita">
        <div class="card-body px-0 pt-2 pb-0">
        <h6 style="font-weight: bold" class="card-title mb-0">{{ $article->title }}</h6>
        <div class="card-date small text-muted mt-2">{{ $article->created_at->format('d F Y') }}</div>
        </div>
        </a>
        </div>
        </div> @endforeach </div>
        </div>
      @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPopuler" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"><i class="fas fa-chevron-left"></i></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselPopuler" data-bs-slide="next">
        <span class="carousel-control-next-icon"><i class="fas fa-chevron-right"></i></span>
        </button>
      </div>
    @else
      <p class="text-muted">Belum ada berita terpopuler tersedia.</p>
    @endif
      <hr class="my-4">


      {{-- BERITA DI INDONESIA --}}
      <h3 class="fw-bold mb-4">Berita di Indonesia</h3>
      @if(count($articles) > 0)
      <div iv id="carouselTerbaru" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        @foreach(collect($articles)->chunk(3) as $index => $chunk)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
        <div class="row">
        @foreach($chunk as $article)
        <div class="col-md-4 col-12 mb-3">
        <div class="card h-100 border-0 card-hover">
        <a href="{{ route('berita.show', $article->id) }}" class="text-decoration-none text-dark">
        <img src="{{ asset('storage/' . $article->gambar) }}" class="card-img-top" alt="Gambar Berita">
        <div class="card-body px-0 pt-2 pb-0">
        <h6 style="font-weight: bold" class="card-title mb-0">{{ $article->title }}</h6>
        <div class="card-date small text-muted mt-2">{{ $article->created_at->format('d F Y') }}</div>
        </div>
        </a>
        </div>
        </div>
      @endforeach
        </div>
        </div>
      @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTerbaru" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"><i class="fas fa-chevron-left"></i></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselTerbaru" data-bs-slide="next">
        <span class="carousel-control-next-icon"><i class="fas fa-chevron-right"></i></span>
        </button>
      </div>
    @else
      <p class="text-muted">Belum ada berita tersedia.</p>
    @endif
      <hr class="my-4">


      {{-- BERITA GLOBAL --}}
      <h3 class="fw-bold mb-4">Berita Global</h3>
      @if(count($globalArticles) > 0)
      <div id="carouselGlobal" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        @foreach(collect($globalArticles)->chunk(3) as $index => $chunk)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
        <div class="row">
        @foreach($chunk as $article)
        <div class="col-md-4 col-12 mb-3">
        <div class="card h-100 border-0 card-hover">
        <a href="{{ route('berita.show', $article->id) }}" class="text-decoration-none text-dark">
        <img src="{{ asset('storage/' . $article->gambar) }}" class="card-img-top" alt="Gambar Berita">
        <div class="card-body px-0 pt-2 pb-0">
        <h6 style="font-weight: bold" class="card-title mb-0">{{ $article->title }}</h6>
        <div class="card-date small text-muted mt-2">{{ $article->created_at->format('d F Y') }}</div>
        </div>
        </a>
        </div>
        </div>
      @endforeach
        </div>
        </div>
      @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselGlobal" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"><i class="fas fa-chevron-left"></i></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselGlobal" data-bs-slide="next">
        <span class="carousel-control-next-icon"><i class="fas fa-chevron-right"></i></span>
        </button>
      </div>
    @else
      <p class="text-muted">Belum ada berita global tersedia.</p>
    @endif

      <hr class="my-4">

      </div>
    </div>





    {{-- KANAN: SIDEBAR --}}
    <div class="col-md-4 sidebar ps-md-4 mt-5 mt-md-0">
      <div class="section-box">
      <h4 class="text-dark mb-3"><strong>Berita Terbaru</strong></h4>
      @foreach($recentArticles->slice(1, 5) as $recent)
      <a href="{{ route('berita.show', $recent->id) }}" class="sidebar-item-link">
      <img src="{{ asset('storage/' . $recent->gambar) }}" alt="Berita Terbaru">
      <div class="d-flex flex-column align-items-start">
      <h6>{{ $recent->title }}</h6>

      {{-- Tampilkan kategori berita ini --}}
      <div class="d-flex flex-wrap gap-1 mb-1">
        @foreach($recent->categories as $cat)
      <span class="badge bg-danger" style="font-size: 0.75rem;">
      {{ $cat->name }}
      </span>
      @endforeach
      </div>

      <small class=" text-muted">{{ $recent->created_at->format('d F Y') }}</small>
      </div>
      </a>
    @endforeach
      </div>
    </div>




    {{-- SECTION: ARTIKEL PER KATEGORI --}}
    <div class="row mt-2">
      @foreach($kategoriList as $kategori)
      <div style="margin-top: -2em;" class="col-md-6 mb-4">
      <div style="padding:5%;" class="category-box">
      <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
      <h5 style="font-family: 'Inter', sans-serif;" class="fw-bold mb-0">{{ $kategori->name }}</h5>
      <a href="{{ route('user.beranda.kategori', $kategori->id) }}" class="text-danger small">Lihat Semua</a>
      </div>
      @forelse($kategori->limited_news as $item)
      <a href="{{ route('berita.show', $item->id) }}" class="category-article">
      <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->title }}">
      <div>
      <h6 class="mb-1">{{ $item->title }}</h6>
      <small>{{ $item->created_at->format('d M Y') }}</small>
      </div>
      </a>
      @empty
      <p class="text-muted fst-italic">Belum ada artikel di kategori ini.</p>
      @endforelse
      </div>
      </div>
    @endforeach
    </div>
  </div> @endsection