@extends('layouts.app')

@section('title', 'Hasil Pencarian')

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


        .card-hover:hover .card-title {
            color: #dc2626;
        }

        .card-body {
            padding: 16px 20px;
        }

        .card-body h4 {
            margin-bottom: 10px;
        }

        .card-body .card-text {
            margin-bottom: 16px;
        }

        .custom-pagination .page-item {
            display: inline-block;
            padding: 8px 14px;
            margin: 0 4px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            color: #1f2937;
            background-color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: 0.2s ease-in-out;
        }

        .custom-pagination .page-item:hover {
            background-color: #dc2626;
            color: white !important;
            border-color: #dc2626;
        }

        .custom-pagination .page-item.active {
            background-color: #dc2626 !important;
            color: white;
            border-color: #dc2626 !important;
            pointer-events: none;
        }

        .custom-pagination .page-item.disabled {
            color: #9ca3af;
            background-color: #f3f4f6;
            border-color: #e5e7eb;
            pointer-events: none;
        }

        #content-search {
            display: block;
            transition: transform 0.3s ease;
            border-radius: 8px;
        }

        #content-search:hover {
            transform: scale(1.02);
        }

    </style>

    <div class="container py-5">
        <h3 class="mb-4"><strong>Hasil Pencarian untuk:</strong> <em>{{ $query }}</em></h3>

        <div class="row">
            <!-- Sidebar Filter -->
            <div class="col-md-3 mb-4">
                <div class="category-box bg-white p-4 rounded">
                    <h4 class="text-center mb-3"><strong>Filter</strong></h4>
                    <form method="GET">
                        <input type="hidden" name="q" value="{{ request('q') }}">

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-select">
                                <option value="">Semua Kategori</option>
                                @foreach($kategoriList as $kategori)
                                    <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                value="{{ request('tanggal') }}">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-filter me-1"></i> Terapkan Filter
                            </button>
                            <a href="{{ route('user.search', ['q' => $query]) }}" class="btn btn-secondary">
                                <i class="fa fa-undo me-1"></i> Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Konten -->
            <div class="col-md-9">
                @if($results->count() > 0)
                    <div class="row">
                        @foreach($results as $item)
                            <div class="col-md-12 mb-4">
                                <a id="content-search" href="{{ route('berita.show', $item->id) }}"
                                    class="text-decoration-none text-dark d-block">
                                    <div class="card border-0 card-hover">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->title }}"
                                                    class="img-fluid rounded-start card-img-top" style="height:100%; object-fit:cover;">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body text-start">
                                                    <h4 class="card-title fw-bold" style="font-size: 24px;">{{ $item->title }}</h4>
                                                    <div class="mb-2">
                                                        @foreach($item->categories as $cat)
                                                            <span class="badge bg-danger me-1">{{ $cat->name }}</span>
                                                        @endforeach
                                                    </div>
                                                    <p class="card-text text-muted small">
                                                        {{ Str::limit(strip_tags($item->content), 200) }}
                                                    </p>
                                                    <div class="d-flex justify-content-between">
                                                        <span class="btn btn-sm btn-danger">Baca Selengkapnya</span>
                                                        <small class="text-muted">
                                                            <i class="fa fa-calendar-alt me-1"></i>
                                                            {{ $item->created_at->format('d M Y') }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @php
                        $currentPage = $results->currentPage();
                        $lastPage = $results->lastPage();
                    @endphp

                    @if ($lastPage > 1)
                        <nav class="d-flex justify-content-center mt-4">
                            <ul class="custom-pagination d-flex list-unstyled gap-2">
                                <li>
                                    <a href="{{ $results->previousPageUrl() ?? '#' }}"
                                        class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                        &laquo;
                                    </a>
                                </li>
                                @for ($page = 1; $page <= $lastPage; $page++)
                                    <li>
                                        <a href="{{ $results->url($page) }}" class="page-item {{ $currentPage == $page ? 'active' : '' }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endfor
                                <li>
                                    <a href="{{ $results->nextPageUrl() ?? '#' }}"
                                        class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}">
                                        &raquo;
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    @endif
                @else
                    <div class="alert alert-warning">
                        <i class="fa fa-exclamation-circle me-2"></i>
                        Tidak ditemukan berita yang sesuai dengan pencarian Anda.
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
