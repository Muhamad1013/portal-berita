@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('content')
    <div class="container-fluid py-4 px-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h5 class="mb-3 fw-bold text-danger fs-4">Daftar Kategori</h5>

        <div class="bg-white rounded shadow-sm p-4 mb-4">
            <!-- Header: Tombol Aksi dan Pencarian -->
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div class="btn-group gap-2">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-success btn-sm shadow-sm">
                        <i class="bi bi-plus-circle me-1"></i> Tambah
                    </a>
                    <a href="{{ route('admin.categories.export') }}" class="btn btn-primary btn-sm shadow-sm">
                        <i class="bi bi-download me-1"></i> Ekspor
                    </a>
                </div>

                <!-- Form Pencarian -->
                <form action="{{ route('admin.categories.index') }}" method="GET" class="input-group input-group-sm"
                    style="max-width: 340px;">
                    <input type="text" name="search" class="form-control border-danger shadow-sm"
                        placeholder="Cari kategori..." value="{{ request('search') }}">
                    <button class="btn btn-danger shadow-sm" type="submit" title="Cari">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

            <!-- Tabel Kategori -->
            <div class="scroll-table-wrapper">
                <table class="table table-hover table-bordered mb-2 mt-2 align-middle custom-table">
                    <thead>
                        <tr>
                            <th>
                                <a href="{{ route('admin.categories.index', ['sort_by' => 'name', 'sort_order' => request('sort_order') === 'asc' && request('sort_by') === 'name' ? 'desc' : 'asc'] + request()->except(['page'])) }}"
                                    class="text-white text-decoration-none">
                                    Nama Kategori
                                    @if (request('sort_by') === 'name')
                                        <i
                                            class="bi bi-caret-{{ request('sort_order') === 'asc' ? 'up' : 'down' }}-fill ms-1"></i>
                                    @else
                                        <i class="bi bi-caret-down-up ms-1"></i>
                                    @endif
                                </a>
                            </th>
                            <th class="text-center" style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td class="fw-semibold text-dark">{{ $category->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="btn btn-warning btn-sm text-white me-1 shadow-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted py-4">Tidak ada data kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Custom Pagination -->
            @php
                $currentPage = $categories->currentPage();
                $lastPage = $categories->lastPage();
            @endphp

            @if ($lastPage > 1)
                <nav class="d-flex justify-content-center mt-4">
                    <ul class="custom-pagination d-flex list-unstyled">
                        <!-- Prev -->
                        <li>
                            <a href="{{ $categories->previousPageUrl() ?? '#' }}"
                                class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                &laquo;
                            </a>
                        </li>

                        <!-- Pages -->
                        @for ($page = 1; $page <= $lastPage; $page++)
                            <li>
                                <a href="{{ $categories->url($page) }}"
                                    class="page-item {{ $currentPage == $page ? 'active' : '' }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endfor

                        <!-- Next -->
                        <li>
                            <a href="{{ $categories->nextPageUrl() ?? '#' }}"
                                class="page-item {{ $currentPage == $lastPage ? 'disabled' : '' }}">
                                &raquo;
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </div>

    <!-- Tambahan CSS -->
    <style>
        .scroll-table-wrapper {
            max-height: 500px;
            overflow-y: auto;
        }

        .custom-table thead th {
            position: sticky;
            top: 0;
            z-index: 1;
            background-color: #DC3545;
            color: white;
        }

        .custom-table th,
        .custom-table td {
            vertical-align: middle;
            border: 1px solid #c9c9c9;
            padding: 0.75rem;
            font-size: 0.95rem;
        }

        .custom-table tbody tr:hover {
            background-color: #f8d7da;
            transition: background-color 0.2s ease-in-out;
        }

        .btn:hover {
            opacity: 0.9;
            transition: 0.2s ease;
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

        input.form-control:focus,
        select.form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.15rem rgba(220, 53, 69, 0.25);
            transition: 0.2s;
        }

        input.form-control,
        select.form-select {
            transition: 0.2s;
        }
    </style>
@endsection