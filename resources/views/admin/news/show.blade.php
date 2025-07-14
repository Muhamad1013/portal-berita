@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')
    <div class="container-fluid py-4 px-3">
        <div class="bg-white p-4 rounded shadow-sm mb-4 px-md-5">
            <h2 class="fw-bold text-danger mb-4 text-center mt-4 fs-2">{{ $news->title }}</h2>

            <div class="text-center text-muted mb-4">
                <small>
                    <i class="bi bi-person-circle"></i> {{ $news->editor->name ?? 'Admin' }} |
                    <i class="bi bi-calendar3"></i> {{ $news->created_at->format('d M Y H:i') }} WIB
                </small>
            </div>

            @if ($news->gambar)
                <div class="d-flex justify-content-center mb-4">
                    <img src="{{ asset('storage/' . $news->gambar) }}" alt="Thumbnail" class="img-fluid rounded"
                        style="max-height: 100vh; object-fit: cover;">
                </div>
            @endif

            <div class="px-md-5 text-justify" style="line-height: 1.8; color: #374151;">
                {{-- Badge kategori dipindah ke sini --}}
                @if ($news->categories->isNotEmpty())
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        @foreach ($news->categories as $category)
                            <span class="badge bg-danger px-3 py-2 text-white" style="font-size: 0.8rem;">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted"><em>Tanpa Kategori</em></p>
                @endif

                {!! nl2br(e($news->content)) !!}
            </div>

            <div class="mt-5 d-flex gap-3">
                <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-warning shadow-sm px-4">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary shadow-sm px-4">
                    <i class="bi bi-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <style>
        .badge.bg-danger {
            background-color: #dc2626 !important;
        }

        .text-justify {
            text-align: justify;
        }

        img.img-fluid:hover {
            transform: scale(1.01);
            transition: 0.3s ease;
        }

        @media (max-width: 768px) {
            .px-md-5 {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
        }
    </style>
@endsection