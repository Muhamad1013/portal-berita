@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')

@section('content')
    <div class="container-fluid py-4 px-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Judul Besar -->
        <h5 class="mb-3 fw-bold text-danger fs-4">Daftar Pengguna</h5>

        <div class="bg-white rounded shadow-sm p-4 mb-4">
            <!-- Header: Form Pencarian -->
            <div class="d-flex justify-content-end align-items-center flex-wrap gap-3 mb-4">
                <form action="{{ route('admin.users.index') }}" method="GET" class="input-group input-group-sm"
                    style="max-width: 340px;">
                    <input type="text" name="search" class="form-control border-danger shadow-sm"
                        placeholder="Cari nama/email..." value="{{ request('search') }}">
                    <button class="btn btn-danger shadow-sm" type="submit" title="Cari">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

            <!-- Tabel Pengguna -->
            <div class="scroll-table-wrapper">
                <table class="table table-hover table-bordered mb-2 mt-2 align-middle custom-table">
                    <thead>
                        <tr>
                            <th>
                                <a href="{{ route('admin.users.index', ['sort_by' => 'name', 'sort_order' => request('sort_order') === 'asc' && request('sort_by') === 'name' ? 'desc' : 'asc'] + request()->except(['page'])) }}"
                                    class="text-white text-decoration-none">
                                    Nama
                                    @if (request('sort_by') === 'name')
                                        <i
                                            class="bi bi-caret-{{ request('sort_order') === 'asc' ? 'up' : 'down' }}-fill ms-1"></i>
                                    @else
                                        <i class="bi bi-caret-down-up ms-1"></i>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('admin.users.index', ['sort_by' => 'email', 'sort_order' => request('sort_order') === 'asc' && request('sort_by') === 'email' ? 'desc' : 'asc'] + request()->except(['page'])) }}"
                                    class="text-white text-decoration-none">
                                    Email
                                    @if (request('sort_by') === 'email')
                                        <i
                                            class="bi bi-caret-{{ request('sort_order') === 'asc' ? 'up' : 'down' }}-fill ms-1"></i>
                                    @else
                                        <i class="bi bi-caret-down-up ms-1"></i>
                                    @endif
                                </a>
                            </th>
                            <th>
                                <a href="{{ route('admin.users.index', ['sort_by' => 'created_at', 'sort_order' => request('sort_order') === 'asc' && request('sort_by') === 'created_at' ? 'desc' : 'asc'] + request()->except(['page'])) }}"
                                    class="text-white text-decoration-none">
                                    Tanggal Bergabung
                                    @if (request('sort_by') === 'created_at')
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
                        @forelse ($users as $user)
                            <tr>
                                <td class="fw-semibold text-dark">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
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
                                <td colspan="4" class="text-center text-muted py-4">Tidak ada data pengguna.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- CSS Tambahan -->
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

        input.form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.15rem rgba(220, 53, 69, 0.25);
        }

        input.form-control {
            transition: 0.2s;
        }
    </style>
@endsection