@extends('layouts.app')

@section('title', 'Portal Berita')

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

    h2,
    h3,
    h4 {
    color: #111827;
    }

    p {
    color: #4B5563;
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

    .headline-content h4 {
    margin-top: 20px;
    font-weight: 700;
    font-size: 1.4rem;
    }

    .headline-content p {
    margin-top: 10px;
    font-size: 1rem;
    }

    .headline-content small {
    color: #6b7280;
    font-size: 0.9rem;
    display: block;
    margin-top: 8px;
    }

    .card-link {
    text-decoration: none;
    color: inherit;
    }

    .card-date {
    font-size: 0.85rem;
    color: #6b7280;
    margin-top: 0.5rem;
    }

    .card-title {
    font-weight: 600;
    font-size: 1rem;
    margin-top: 6px;
    color: #1f2937;
    }

    .carousel .card {
    border: none;
    transition: all 0.3s ease;
    }


    .carousel .card-img-top {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 6px 6px 0 0;
    }

    .sidebar h4 {
    font-weight: 700;
    margin-bottom: 1rem;
    }

    .sidebar-item {
    display: flex;
    gap: 12px;
    margin-bottom: 20px;
    align-items: center;
    }

    .sidebar-item img {
    width: 64px;
    height: 64px;
    object-fit: cover;
    border-radius: 6px;
    }

    .sidebar-item a {
    font-weight: 600;
    font-size: 0.95rem;
    color: #1f2937;
    text-decoration: none;
    }

    .sidebar-item small {
    color: #6b7280;
    font-size: 0.8rem;
    }

    .sidebar-item a:hover {
    color: #dc2626;
    }

    @media (max-width: 767.98px) {
    .carousel .col-md-4 {
      flex: 0 0 100%;
      max-width: 100%;
    }

    .headline-img {
      height: 220px;
    }
    }
  </style>

  <div class="container py-5">
    <div class="row">
    {{-- BAGIAN KIRI: HEADLINE & BERITA TERBARU --}}
    <div class="col-md-8">
      {{-- HEADLINE --}}
      <div class="section-box">
      <img src="https://source.unsplash.com/900x400/?indonesia,news" class="headline-img" alt="Headline News">
      <div class="headline-content">
        <small>15 Juni 2025</small>
        <h4>Pemerintah Daerah Dorong UMKM Tembus Pasar Ekspor</h4>
        <p>Langkah ini merupakan bagian dari strategi pembangunan ekonomi lokal untuk meningkatkan daya saing pelaku
        usaha mikro di pasar global.</p>
      </div>
      </div>

      {{-- BERITA TERBARU --}}
      <div class="section-box">
      <h2 class="fw-bold mb-4">Berita Terbaru dari Indonesia</h2>
      @if(count($articles) > 0)
      <div id="carouselTerbaru" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        @foreach(collect($articles)->chunk(3) as $chunkIndex => $chunk)
        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
        <div class="row">
        @foreach($chunk as $article)
        <div class="col-md-4 col-12 mb-3">
        <div class="card h-100">
        <a href="{{ $article['link'] }}" class="card-link">
        @if($article['image_url'])
        <img src="{{ $article['image_url'] }}" class="card-img-top" alt="Gambar Berita">
        @endif
        <div class="card-body">
        <div class="card-date">
        {{ \Carbon\Carbon::parse($article['pubDate'])->translatedFormat('d F Y') }}
        </div>
        <h6 class="card-title">{{ $article['title'] }}</h6>
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
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselTerbaru" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Selanjutnya</span>
        </button>
      </div>
    @else
      <p class="text-muted">Belum ada berita tersedia.</p>
    @endif
      </div>
    </div>

    {{-- SIDEBAR --}}
    <div class="col-md-4 sidebar ps-md-4 mt-5 mt-md-0">
      <div class="section-box">
      <h4 class="text-dark">Berita Populer</h4>
      <div class="sidebar-item">
        <img src="https://source.unsplash.com/64x64/?news,bbm" alt="Berita Populer">
        <div>
        <a href="#">Harga BBM Naik, Ini Tanggapan Masyarakat</a>
        <small>12 Juni 2025</small>
        </div>
      </div>
      <div class="sidebar-item">
        <img src="https://source.unsplash.com/64x64/?startup" alt="Berita Populer">
        <div>
        <a href="#">Startup Lokal Raih Pendanaan Internasional</a>
        <small>10 Juni 2025</small>
        </div>
      </div>
      <div class="sidebar-item">
        <img src="https://source.unsplash.com/64x64/?weather" alt="Berita Populer">
        <div>
        <a href="#">Cuaca Ekstrem Diprediksi Pekan Ini</a>
        <small>9 Juni 2025</small>
        </div>
      </div>
      <div class="sidebar-item">
        <img src="https://source.unsplash.com/64x64/?cybersecurity" alt="Berita Populer">
        <div>
        <a href="#">Tips Keamanan Digital untuk Remaja</a>
        <small>8 Juni 2025</small>
        </div>
      </div>
      <div class="sidebar-item">
        <img src="https://source.unsplash.com/64x64/?travel,indonesia" alt="Berita Populer">
        <div>
        <a href="#">Wisata Alam di Indonesia Kembali Ramai</a>
        <small>7 Juni 2025</small>
        </div>
      </div>
      </div>
    </div>
    </div>
  </div>
@endsection