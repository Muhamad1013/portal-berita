@extends('layouts.app')

@section('title', 'Berita Kategori: ' . $category->name)

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a,
        small {
            font-family: 'Inter', sans-serif;
        }

        a:hover {
            color: #dc2626 !important;
        }

        .headline-img {
            width: 100%;
            height: 360px;
            object-fit: cover;
            border-radius: 8px;
        }

        .headline-box h2 {
            font-weight: 700;
            font-size: 1.8rem;
            color: #1f2937;
            margin-bottom: 16px;
        }

        .headline-box small {
            display: block;
            color: #6b7280;
            margin: 8px 0;
        }

        .headline-box p {
            color: #4B5563;
            margin-top: 12px;
        }

        .btn-read {
            display: block;
            margin-top: 16px;
            font-weight: 600;
            color: #dc2626;
            text-decoration: none;
        }

        .category-article {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            padding: 8px 0;
            align-items: flex-start;
            text-decoration: none;
            color: #1f2937;
            border-bottom: 1px solid #e5e7eb;
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
            transition: transform 0.3s ease;
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

        .sidebar-item-link:hover img {
            transform: scale(1.05);
        }

        .category-box {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 24px;
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

        .hover-article {
            transition: background-color 0.2s ease;
            border-radius: 6px;
        }

        .hover-article:hover .article-title {
            color: #dc2626 !important;
        }

        .article-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 6px;
            transition: transform 0.3s ease;
        }

        .hover-article:hover .article-img {
            transform: scale(1.05);
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
    </style>

    <div class="container py-5">
        <div class="row gx-5">
            <!-- KONTEN UTAMA -->
            <div class="col-md-8">
                <div class="mb-4">
                    <h1 style="font-size: 24px;" class="fw-bold">Kategori: {{ $category->name }}</h1>
                </div>

                @php
                    $currentPage = $filteredArticles->currentPage();
                    $lastPage = $filteredArticles->lastPage();
                @endphp

                @if($currentPage == 1 && $filteredArticles->count() > 0)
                    @php $first = $filteredArticles->first(); @endphp
                    <div class="headline-box mb-5 bg-white p-4 rounded">
                        <div class="text-center mb-3">
                            <h2>{{ $first->title }}</h2>
                            <small>{{ $first->created_at->format('d M Y') }}</small>
                        </div>
                        <img src="{{ asset('storage/' . $first->gambar) }}" alt="{{ $first->title }}" class="headline-img mb-3">
                        <p>{!! Str::limit(strip_tags($first->content), 300) !!}</p>
                        <a href="{{ route('berita.show', $first->id) }}" class="btn-read">Baca Selengkapnya</a>
                    </div>
                @endif

                <div class="category-box">
                    @foreach($currentPage == 1 ? $filteredArticles->skip(1) : $filteredArticles as $item)
                        <a href="{{ route('berita.show', $item->id) }}"
                            class="hover-article d-flex gap-3 mb-4 text-decoration-none border-bottom pb-3 align-items-start">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->title }}"
                                class="article-img flex-shrink-0">
                            <div>
                                <h6 class="article-title fw-semibold text-dark mb-1" style="font-size: 1rem;">
                                    {{ $item->title }}
                                </h6>
                                <small class="text-muted d-block mb-1">{{ $item->created_at->format('d F Y') }}</small>
                                <p class="text-muted mb-0" style="font-size: 0.875rem;">
                                    {!! Str::limit(strip_tags($item->content), 200) !!}
                                </p>
                            </div>
                        </a>
                    @endforeach

                    @if ($lastPage > 1)
                        <nav class="d-flex justify-content-center mt-4">
                            <ul class="custom-pagination d-flex list-unstyled">
                                {{-- Tombol Sebelumnya --}}
                                <li>
                                    <a href="{{ $filteredArticles->previousPageUrl() ?? '#' }}"
                                        class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                        &laquo;
                                    </a>
                                </li>

                                {{-- Nomor Halaman --}}
                                @for ($page = 1; $page <= $lastPage; $page++)
                                    <li>
                                        <a href="{{ $filteredArticles->url($page) }}"
                                            class="page-item {{ $currentPage == $page ? 'active' : '' }}">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endfor

                                {{-- Tombol Selanjutnya --}}
                                <li>
                                    <a href="{{ $filteredArticles->nextPageUrl() ?? '#' }}"
                                        class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}">
                                        &raquo;
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-md-4">
                <div class="category-box">
                    <h5 class="fw-bold mb-4">Other Topics</h5>
                    @foreach($otherArticles as $other)
                        <a href="{{ route('berita.show', $other->id) }}" class="sidebar-item-link">
                            <img src="{{ asset('storage/' . $other->gambar) }}" alt="{{ $other->title }}">
                            <div>
                                <h6>{{ $other->title }}</h6>
                                <small class="text-muted">{{ $other->created_at->format('d F Y') }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection