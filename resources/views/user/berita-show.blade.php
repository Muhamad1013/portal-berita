@extends('layouts.app')

@section('title', $berita->title)

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
        small,
        span {
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

        .headline-box h2 {
            text-align: center;
            font-weight: 700;
            font-size: 1.8rem;
            color: #1f2937;
            margin-bottom: 12px;
        }

        .headline-box small {
            display: block;
            text-align: center;
            color: #6b7280;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .headline-img {
            width: 100%;
            height: 360px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .headline-content {
            color: #374151;
            line-height: 1.7;
            margin-bottom: 24px;
            font-size: 1rem;
        }

        .badge-category {
            font-size: 0.8rem;
            border-radius: 999px;
            padding: 6px 12px;
            background-color: #ef4444;
            color: #fff;
            text-decoration: none;
            margin-right: 6px;
            margin-bottom: 6px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .badge-category:hover {
            background-color: #dc2626;
        }

        .sidebar-item-link {
            display: flex;
            gap: 12px;
            text-decoration: none;
            padding: 8px 0;
            margin-bottom: 16px;
            transition: background-color 0.2s;
        }

        .sidebar-item-link:hover {
            border-radius: 6px;
        }

        .sidebar-item-link img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
            transition: transform 0.3s ease;
        }

        .sidebar-item-link:hover img {
            transform: scale(1.05);
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

        .comment-box textarea {
            resize: vertical;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 12px;
            font-size: 0.95rem;
        }

        .comment-item {
            background-color: #f9fafb;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            border: 1px solid #e5e7eb;
        }

        .comment-item strong {
            font-weight: 600;
            font-size: 15px;
        }

        .comment-item small {
            font-size: 13px;
            color: #6b7280;
        }

        .comment-item p {
            margin-top: 8px;
            margin-bottom: 8px;
            font-size: 14px;
            color: #374151;
        }

        .comment-item .d-flex span {
            font-size: 14px;
            cursor: pointer;
            color: #4b5563;
            transition: color 0.3s;
        }

        .comment-item .d-flex span:hover {
            color: #dc2626;
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

        .kategori-style {
            font-size: 0.8rem;
            border-radius: 999px;
            padding: 6px 12px;
            background-color: #dc3545;
            color: #fff;
            text-decoration: none;
            margin-right: 6px;
            margin-bottom: 6px;
            display: inline-block;
            transition: background-color 0.3s;
            pointer-events: auto;
        }

        /* Nonaktifkan efek hover sepenuhnya */
        .kategori-style:hover {
            background-color: #dc2626;
            color: #fff !important;
            text-decoration: none;
        }

        .content-wrapper {
            width: 90%;
            margin: 5% auto;
        }

        .baca-juga-box {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            display: flex;
            gap: 15px;
            align-items: start;
        }
    </style>


    <div class="container py-5">
        <div class="row">
            <!-- Konten Utama -->
            <div class="col-md-8">
                <div class="section-box headline-box">
                    <h2>{{ $berita->title }}</h2>
                    <small>{{ $berita->author ?? 'Admin' }} | {{ $berita->created_at->format('d F Y H:i') }} WIB</small>

                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->title }}" class="headline-img">


                    <div class="headline-content content-wrapper">
                        @php
                            $paragraphs = preg_split('/\r\n|\r|\n/', strip_tags($berita->content));
                            $paragraphs = array_filter($paragraphs, fn($p) => trim($p) !== '');
                            $paragraphs = array_values($paragraphs); // Re-index array

                            $total = count($paragraphs);
                            $insertPoints = [];

                            // Tambah setelah paragraf ke-4 (index 4)
                            if ($total > 4)
                                $insertPoints[] = 4;

                            // Tambah sebelum paragraf terakhir (index = total - 2)
                            if ($total > 3)
                                $insertPoints[] = $total - 3;

                            $bacaJugaIndex = 0;
                        @endphp

                        @if ($total > 0)
                            <p><strong>FastNews -</strong> {{ $paragraphs[0] }}</p>
                        @endif

                        @foreach ($paragraphs as $index => $paragraph)
                            @if ($index === 0)
                                @continue
                            @endif

                            <p class="mt-3">{{ $paragraph }}</p>

                            @if (in_array($index, $insertPoints) && isset($relatedNews[$bacaJugaIndex]))
                                @php $related = $relatedNews[$bacaJugaIndex++]; @endphp

                                <div class="mt-4 mb-4 p-3 baca-juga-box d-flex gap-3 align-items-start">
                                    <img src="{{ asset('storage/' . $related->gambar) }}" alt="{{ $related->title }}"
                                        style="width: 100px; height: 70px; object-fit: cover; border-radius: 6px;">

                                    <div>
                                        <strong class="text-danger d-block mb-1">Baca Juga:</strong>
                                        <a href="{{ route('berita.show', $related->id) }}"
                                            class="text-decoration-none text-dark fw-semibold">
                                            {{ $related->title }}
                                        </a>
                                        <div class="d-flex flex-wrap gap-1 mt-1">
                                            @foreach ($related->categories as $cat)
                                                <span class="badge bg-danger" style="font-size: 0.75rem;">{{ $cat->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>


                    <!-- Kategori Terkait -->
                    <div class="d-flex flex-wrap gap-1 mb-4">
                        @foreach($berita->categories as $category)
                            <a href="{{ route('user.beranda.kategori', $category->id) }}" class="kategori-style">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>


                    <div class="mt-5">
                        <hr class="my-2">
                    </div>


                    <!-- Komentar Statis -->
                    <h4 class="fw-bold mt-5 mb-3">Komentar</h4>
                    <div class="mb-4">
                        <textarea class="form-control" rows="4" placeholder="Tulis komentar..."></textarea>
                        <button class="btn btn-danger mt-2">Kirim</button>
                    </div>

                    @for ($i = 0; $i < 3; $i++)
                        <div class="comment-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>Username</strong>
                                <small class="text-muted">5 hari lalu</small>
                            </div>
                            <p>Lorem ipsum dolor sit amet, komentar statis pengguna...</p>
                            <div class="d-flex align-items-center gap-3">
                                <span>👍 0</span>
                                <span>💬 Balas</span>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4 sidebar ps-md-4 mt mt-md-0">
                <!-- Related News -->
                <div class="section-box">
                    <h4 class="fw-bold mb-3" style="font-family: 'Inter', sans-serif;">Related</h4>
                    @foreach($relatedNews as $item)
                        <a href="{{ route('berita.show', $item->id) }}" class="sidebar-item-link">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->title }}">
                            <div class="d-flex flex-column align-items-start">
                                <h6>{{ $item->title }}</h6>
                                <div class="d-flex flex-wrap gap-1 mb-1">
                                    @foreach($item->categories as $cat)
                                        <span class="badge bg-danger" style="font-size: 0.75rem;">
                                            {{ $cat->name }}
                                        </span>
                                    @endforeach
                                </div>
                                <small class="text-muted">{{ $item->created_at->format('d F Y') }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Popular News -->
                <div class="section-box">
                    <h4 class="fw-bold mb-3" style="font-family: 'Inter', sans-serif;">Popular</h4>
                    @foreach($popularNews as $item)
                        <a href="{{ route('berita.show', $item->id) }}" class="sidebar-item-link">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->title }}">
                            <div class="d-flex flex-column align-items-start">
                                <h6>{{ $item->title }}</h6>
                                <div class="d-flex flex-wrap gap-1 mb-1">
                                    @foreach($item->categories as $cat)
                                        <span class="badge bg-danger" style="font-size: 0.75rem;">
                                            {{ $cat->name }}
                                        </span>
                                    @endforeach
                                </div>
                                <small class="text-muted">{{ $item->created_at->format('d F Y') }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection