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

        .comment-item {
            margin-top: 20px;
            border-radius: 12px;
            transition: background-color 0.3s ease;
            font-size: 0.95rem;
        }

        .comment-item.reply {
            padding: 16px;
            border-left: 4px solid #dc2626;
        }


        .comment-item .rounded-circle {
            font-weight: bold;
            font-size: 16px;
        }


        .comment-item strong {
            color: #dc2626;
            font-weight: 600;
        }

        .comment-item .text-muted {
            font-size: 13px;
        }

        .comment-item .btn {
            font-size: 13px;
            color: #6b7280;
            transition: color 0.2s ease;
        }


        .comment-item .btn.text-primary {
            color: #dc2626 !important;
        }

        .comment-item .btn.text-secondary {
            color: #6b7280 !important;
        }


        .comment-item .btn-primary {
            background-color: #dc2626;
            border-color: #dc2626;
            font-size: 13px;
            padding: 4px 10px;
        }

        .comment-item .btn-primary:hover {
            background-color: #b91c1c;
            border-color: #b91c1c;
        }

        .comment-item .btn-link {
            color: #dc2626;
            font-size: 14px;
            text-decoration: none;
        }

        .comment-item .btn-link:hover {
            text-decoration: underline;
        }

        .comment-item i.fa-trash:hover {
            color: #dc2626 !important;
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

        .share-icon:hover {
            opacity: 0.85;
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

                    <!-- Bagikan -->
                    <div class="d-flex align-items-center gap-3 mt-3" style="font-size: 1rem;">
                        <strong class="">Bagikan:</strong>
                        <span
                            onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}', '_blank')"
                            class="text-primary share-icon" style="cursor: pointer;">
                            <i class="fab fa-facebook-f me-1"></i>Facebook
                        </span>
                        <span
                            onclick="window.open('https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->title) }}', '_blank')"
                            class="text-info share-icon" style="cursor: pointer;">
                            <i class="fab fa-twitter me-1"></i>Twitter
                        </span>
                        <span
                            onclick="window.open('https://api.whatsapp.com/send?text={{ urlencode($berita->title . ' ' . request()->fullUrl()) }}', '_blank')"
                            class="text-success share-icon" style="cursor: pointer;">
                            <i class="fab fa-whatsapp me-1"></i>WhatsApp
                        </span>
                        <span
                            onclick="window.open('https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($berita->title) }}', '_blank')"
                            class="text-primary share-icon" style="cursor: pointer;">
                            <i class="fab fa-telegram-plane me-1"></i>Telegram
                        </span>
                        <span onclick="copyLink('{{ request()->fullUrl() }}')" class="text-secondary share-icon"
                            style="cursor: pointer;">
                            <i class="fa fa-link me-1"></i>Salin Link
                        </span>
                    </div>
                    <script>
                        function copyLink(link) {
                            navigator.clipboard.writeText(link).then(() => {
                                alert('Link berhasil disalin!');
                            }).catch(() => {
                                alert('Gagal menyalin link.');
                            });
                        }
                    </script>

                    <div class="mt-4">
                        <hr class="my-2">
                    </div>

                    <!-- Komentar Dinamis -->
                    <h4 class="fw-bold mt-5 mb-3">Komentar</h4>

                    <!-- Form Komentar Baru -->
                    @auth
                        <form action="{{ route('user.comment.store', $berita->id) }}" method="POST" class="mb-4">
                            @csrf
                            <textarea class="form-control" name="content" rows="4" placeholder="Tulis komentar..."></textarea>
                            <button type="submit" class="btn btn-danger mt-2">Kirim</button>
                        </form>
                    @else
                        <div class="alert alert-warning">Silakan <a href="{{ route('login') }}">login</a> untuk menulis
                            komentar.</div>
                    @endauth

                    <!-- Daftar Komentar -->
                    @php
                        $colors = ['#dc2626', '#16a34a', '#2563eb', '#ca8a04', '#0e7490', '#7c3aed', '#f59e0b', '#14b8a6'];
                        function getUserColor($userId, $colors)
                        {
                            return $colors[$userId % count($colors)];
                        }
                    @endphp

                    @foreach($berita->comments->where('parent_id', null) as $comment)
                        @php $parentColor = getUserColor($comment->user->id, $colors); @endphp

                        <!-- Komentar Utama -->
                        <div class="d-flex mt-2 mb-4 comment-item">
                            <div class="flex-shrink-0">
                                <a href="{{ route('user.profile', $comment->user->id) }}" class="text-decoration-none">
                                    <div class="rounded-circle text-white text-center"
                                        style="background-color: {{ $parentColor }}; width:40px; height:40px; line-height:40px;">
                                        {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                    </div>
                                </a>

                            </div>
                            <div class="ms-3 w-100">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="{{ route('user.profile', $comment->user->id) }}"
                                            class="fw-bold text-dark text-decoration-none">
                                            {{ ucfirst(explode(' ', $comment->user->name)[0]) }}
                                        </a>

                                        <span class="text-muted small ms-2">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <div class="mt-1 mb-2">{{ $comment->content }}</div>
                                <div class="d-flex align-items-center gap-3">
                                    <!-- Reaksi -->
                                    <form action="{{ route('user.comment.react', $comment->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <input type="hidden" name="reaction" value="like">
                                        <button type="submit"
                                            class="btn btn-sm p-0 border-0 bg-transparent {{ $comment->reactions->where('reaction', 1)->where('user_id', auth()->id())->count() ? 'text-primary' : 'text-secondary' }}">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                            {{ $comment->reactions->where('reaction', 1)->count() }}
                                        </button>
                                    </form>
                                    <form action="{{ route('user.comment.react', $comment->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <input type="hidden" name="reaction" value="dislike">
                                        <button type="submit"
                                            class="btn btn-sm p-0 border-0 bg-transparent {{ $comment->reactions->where('reaction', -1)->where('user_id', auth()->id())->count() ? 'text-primary' : 'text-secondary' }}">
                                            <i class="fa-solid fa-thumbs-down"></i>
                                        </button>
                                    </form>
                                    @auth
                                        <button type="button" class="btn btn-sm p-0 border-0 text-secondary bg-transparent"
                                            onclick="document.getElementById('reply-box-{{ $comment->id }}').classList.toggle('d-none')">
                                            Balas
                                        </button>
                                    @endauth
                                    @if(auth()->id() === $comment->user_id)
                                        <form action="{{ route('user.comment.delete', $comment->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm p-0 border-0 text-secondary bg-transparent">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>

                                <!-- Form Balas Komentar Utama -->
                                <div id="reply-box-{{ $comment->id }}" class="mt-3 d-none">
                                    <form action="{{ route('user.comment.reply', $comment->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="news_id" value="{{ $berita->id }}">
                                        <textarea name="content" rows="2" class="form-control mb-2"
                                            placeholder="Tulis balasan..."></textarea>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="text-muted"
                                                onclick="document.getElementById('reply-box-{{ $comment->id }}').classList.add('d-none')">Batal</button>
                                            <button type="submit" class="btn btn-sm btn-primary text-white">Kirim</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Daftar Balasan -->
                                @if($comment->replies->count() > 0)
                                    <button type="button" class="btn btn-link p-0 mt-2 text-primary"
                                        onclick="document.getElementById('replies-{{ $comment->id }}').classList.toggle('d-none')">
                                        <i class="fa-solid fa-caret-down"></i> {{ $comment->replies->count() }} balasan
                                    </button>
                                    <div id="replies-{{ $comment->id }}" class="mt-3 d-none">
                                        @foreach($comment->replies as $reply)
                                            @php
                                                $replyColor = getUserColor($reply->user->id, $colors);
                                            @endphp
                                            <div class="d-flex mt-3 comment-item reply">
                                                <div class="flex-shrink-0">
                                                    <a href="{{ route('user.profile', $reply->user->id) }}"
                                                        class="text-decoration-none">
                                                        <div class="rounded-circle text-white text-center"
                                                            style="background-color: {{ $replyColor }}; width:35px; height:35px; line-height:35px;">
                                                            {{ strtoupper(substr($reply->user->name, 0, 1)) }}
                                                        </div>
                                                    </a>

                                                </div>
                                                <div class="ms-3 w-100">
                                                    <div>
                                                        <a href="{{ route('user.profile', $reply->user->id) }}"
                                                            class="fw-bold text-dark text-decoration-none">
                                                            {{ ucfirst(explode(' ', $reply->user->name)[0]) }}
                                                        </a>

                                                        <span
                                                            class="text-muted small ms-2">{{ $reply->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <div class="mt-1 mb-2">
                                                        {{ $reply->content }}
                                                    </div>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <!-- Reaksi -->
                                                        <form action="{{ route('user.comment.react', $reply->id) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="reaction" value="like">
                                                            <button type="submit"
                                                                class="btn btn-sm p-0 border-0 bg-transparent {{ $reply->reactions->where('reaction', 1)->where('user_id', auth()->id())->count() ? 'text-primary' : 'text-secondary' }}">
                                                                <i class="fa-solid fa-thumbs-up"></i>
                                                                {{ $reply->reactions->where('reaction', 1)->count() }}
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('user.comment.react', $reply->id) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="reaction" value="dislike">
                                                            <button type="submit"
                                                                class="btn btn-sm p-0 border-0 bg-transparent {{ $reply->reactions->where('reaction', -1)->where('user_id', auth()->id())->count() ? 'text-primary' : 'text-secondary' }}">
                                                                <i class="fa-solid fa-thumbs-down"></i>
                                                            </button>
                                                        </form>

                                                        @auth
                                                            <!-- Tombol Balas ke balasan -->
                                                            <button type="button"
                                                                class="btn btn-sm p-0 border-0 text-secondary bg-transparent"
                                                                onclick="document.getElementById('reply-box-{{ $reply->id }}').classList.toggle('d-none')">
                                                                Balas
                                                            </button>
                                                        @endauth

                                                        @if(auth()->id() === $reply->user_id)
                                                            <form action="{{ route('user.comment.delete', $reply->id) }}" method="POST"
                                                                class="d-inline">
                                                                @csrf @method('DELETE')
                                                                <button class="btn btn-sm p-0 border-0 text-secondary bg-transparent">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>

                                                    <!-- Form balas terhadap balasan -->
                                                    <div id="reply-box-{{ $reply->id }}" class="mt-3 d-none">
                                                        <form action="{{ route('user.comment.reply', $comment->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="news_id" value="{{ $berita->id }}">
                                                            @php
                                                                $mentionName = '@' . explode(' ', $reply->user->name)[0] . ', ';
                                                            @endphp
                                                            <textarea name="content" rows="2" class="form-control mb-2"
                                                                placeholder="Tulis balasan...">{{ $mentionName }}</textarea>

                                                            <div class="d-flex gap-2">
                                                                <button type="button" class="text-muted"
                                                                    onclick="document.getElementById('reply-box-{{ $reply->id }}').classList.add('d-none')">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-primary text-white">Kirim</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

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