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

    body {
    background-color: #f3f4f6;
    }

    .section-box {
    background-color: #fff;
    border: 1px solid #e5e7eb;
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
    text-align: center;
    color: #4B5563;
    margin-top: 12px;
    }

    .btn-read {
    display: block;
    text-align: center;
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

    .sidebar-item {
    display: flex;
    gap: 12px;
    margin-bottom: 20px;
    }

    .sidebar-item img {
    width: 120px;
    height: 80px;
    object-fit: cover;
    border-radius: 6px;
    }

    .sidebar-item .info {
    flex: 1;
    }

    .sidebar-item .info a {
    font-weight: 600;
    font-size: 0.95rem;
    color: #1f2937;
    text-decoration: none;
    }

    .sidebar-item .info p {
    font-size: 0.85rem;
    color: #4B5563;
    margin-top: 4px;
    margin-bottom: 4px;
    }

    .sidebar-item .info small {
    color: #6b7280;
    font-size: 0.75rem;
    }

    .carousel .card {
    border: none;
    transition: all 0.3s ease;
    }

    .carousel .card-title {
    font-weight: 600;
    font-size: 1rem;
    color: #1f2937;
    }

    .carousel .card-date {
    font-size: 0.85rem;
    color: #6b7280;

    }

    /* Tombol carousel berbentuk lingkaran merah */
    .carousel-control-prev,
    .carousel-control-next {
    top: 45%;
    transform: translateY(-50%);
    width: 35px;
    height: 35px;
    background-color: #dc2626;
    border-radius: 50%;
    z-index: 10;
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    /* Hover effect */
    .carousel-control-prev:hover,
    .carousel-control-next:hover {
    background-color: #b91c1c;
    transform: translateY(-50%) scale(1.05);
    }

    /* Panah putih di tengah lingkaran */
    .carousel-control-prev-icon i,
    .carousel-control-next-icon i {
    color: white;
    font-size: 1rem;
    }

    /* Posisi tombol */
    .carousel-control-prev {
    left: -20px;
    }

    .carousel-control-next {
    right: -20px;
    }




    @media (max-width: 767.98px) {
    .headline-img {
      height: 220px;
    }

    .sidebar-item {
      flex-direction: column;
      align-items: start;
    }

    .sidebar-item img {
      width: 100%;
      height: auto;
    }
    }

    .headline-box small {
    text-align: center;
    margin-bottom: 4%;
    display: block;
    color: #6b7280;
    }


    .headline-box p {
    text-align: left;
    color: #4B5563;
    margin-top: 12px;
    }

    .btn-read {
    text-align: left;
    margin-top: 16px;
    }
  </style>

  <div class="container py-5">
    <div class="row">
    {{-- KIRI --}}
    <div class="col-md-8">

      {{-- HEADLINE --}}
      @if($headline)
      <div class="section-box headline-box">
      <h2>{{ $headline->title }}</h2>
      <small>{{ $headline->created_at->format('d F Y') }}</small>
      <img src="{{ asset('storage/gambar/' . $headline->gambar) }}" alt="Headline" class="headline-img">
      <p>{!! \Illuminate\Support\Str::limit(strip_tags($headline->content), 200) !!}</p>
      <a href="#" class="btn-read">Baca Selengkapnya &rarr;</a>
      </div>
    @endif

      {{-- BERITA DI INDONESIA --}}
      <div class="section-box">
      <h3 class="fw-bold mb-4">Berita di Indonesia</h3>
      @if(count($articles) > 0)
      <div id="carouselTerbaru" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        @foreach(collect($articles)->chunk(3) as $index => $chunk)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
        <div class="row">
        @foreach($chunk as $article)
        <div class="col-md-4 col-12">
        <div class="card h-100 border-0">
        <a href="#" class="card-link text-decoration-none text-dark">
        <img src="{{ asset('storage/gambar/' . $article->gambar) }}" class="card-img-top rounded-2"
        alt="Gambar Berita">
        <div class="card-body px-0 pt-2 pb-0">
        <div class="card-date small text-muted mb-1">{{ $article->created_at->format('d F Y') }}</div>
        <h6 class="card-title mb-0">{{ $article->title }}</h6>
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
        <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselTerbaru" data-bs-slide="next">
        <span class="carousel-control-next-icon"><i class="fas fa-chevron-right"></i></span>
        <span class="visually-hidden">Selanjutnya</span>
        </button>
      </div>
    @else
      <p class="text-muted">Belum ada berita tersedia.</p>
    @endif

      {{-- PEMBATAS --}}
      <hr class="my-4">

      {{-- BERITA TERBARU --}}
      <h3 class="fw-bold mb-4">Berita Terbaru</h3>
      @if(!empty($recentArticles) && count($recentArticles) > 0)
      <div id="carouselTerbaru2" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        @foreach(collect($recentArticles)->chunk(3) as $index => $chunk)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
        <div class="row">
        @foreach($chunk as $article)
        <div class="col-md-4 col-12">
        <div class="card h-100 border-0">
        <a href="#" class="card-link text-decoration-none text-dark">
        <img src="{{ asset('storage/gambar/' . $article->gambar) }}" class="card-img-top rounded-2"
        alt="Gambar Berita">
        <div class="card-body px-0 pt-2 pb-0">
        <div class="card-date small text-muted mb-1">{{ $article->created_at->format('d F Y') }}</div>
        <h6 class="card-title mb-0">{{ $article->title }}</h6>
        </div>
        </a>
        </div>
        </div>
      @endforeach
        </div>
        </div>
      @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTerbaru2" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"><i class="fas fa-chevron-left"></i></span>
        <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselTerbaru2" data-bs-slide="next">
        <span class="carousel-control-next-icon"><i class="fas fa-chevron-right"></i></span>
        <span class="visually-hidden">Selanjutnya</span>
        </button>
      </div>
    @else
      <p class="text-muted">Belum ada berita terbaru tersedia.</p>
    @endif
      </div>
    </div>

    {{-- KANAN: SIDEBAR --}}
    <div class="col-md-4 sidebar ps-md-4 mt-5 mt-md-0">
      <div class="section-box">
      <h4 class="text-dark mb-3"><strong>Berita Populer</strong></h4>
      @foreach($popularArticles as $pop)
      <div class="sidebar-item border-top pt-2">
      <img src="{{ asset('storage/gambar/' . $pop->gambar) }}" alt="Populer" class="img-fluid rounded mb-2">
      <div class="info">
      <div class="d-flex flex-column">
        <a href="#" class="mb-1 fw-semibold text-dark">{{ $pop->title }}</a>
        <small class="text-muted">{{ $pop->created_at->format('d F Y') }}</small>
      </div>
      </div>
      </div>
    @endforeach
      </div>
    </div>
    </div>
  </div>

@endsection