<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- Custom Font -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Inter', sans-serif;
        }

        @media (max-width: 768px) {
            #sidebar {
                display: none;
            }

            #sidebar-toggle {
                display: inline-block !important;
            }
        }

        .custom-dropdown-menu {
            min-width: 160px;
            padding: 0.5rem 0.75rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            left: auto !important;
            right: 0 !important;
        }

        .custom-dropdown-menu button.dropdown-item {
            width: 100%;
            text-align: left;
            padding: 0.4rem 0.6rem;
            font-size: 13px;
            border: none;
            background: none;
        }

        .custom-dropdown-menu button.dropdown-item:hover {
            background-color: #f8f9fa;
        }

        #sidebar nav a:hover {
            background-color: #f8f9fa;
            color: #dc2626 !important;
            text-decoration: none;
        }

        /* Aktif menu tetap prioritas */
        #sidebar nav a.bg-danger:hover {
            background-color: #dc2626 !important;
            color: #fff !important;
        }

        /* Hover untuk tombol logout */
        #sidebar form button:hover {
            background-color: #f1f1f1;
            border-radius: 0.25rem;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <div class="d-flex flex-column flex-md-row min-vh-100">

        <!-- SIDEBAR -->
        <aside id="sidebar" class="bg-white border-end d-flex flex-column flex-shrink-0"
            style="width: 250px; height: 100vh; position: fixed; top: 0; left: 0; z-index: 1030;">
            <!-- Avatar & Navigasi -->
            <div class="d-flex flex-column align-items-center justify-content-center py-4 border-bottom">
                <a href="{{ route('admin.profile.show') }}" class="text-decoration-none text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <!-- Avatar Inisial Nama -->
                        <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center mb-2"
                            style="width: 80px; height: 80px; font-size: 2rem; font-weight: 600;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <!-- Nama Admin -->
                        <a href="{{ route('admin.profile.show') }}" class="text-decoration-none">
                            <span class="fw-semibold text-secondary small text-center d-block">
                                {{ Auth::user()->name }}
                            </span>
                        </a>
                    </div>
                </a>
            </div>


            <nav class="flex-grow-1 px-3 py-4 fs-6 fw-medium">
                <a href="{{ route('admin.dashboard') }}"
                    class="d-block mb-2 px-3 py-2 rounded {{ request()->is('admin/dashboard') ? 'bg-danger text-white' : 'text-dark' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.news.index') }}"
                    class="d-block mb-2 px-3 py-2 rounded {{ request()->is('admin/news*') ? 'bg-danger text-white' : 'text-dark' }}">
                    Berita
                </a>

                <a href="{{ route('admin.categories.index') }}"
                    class="d-block mb-2 px-3 py-2 rounded {{ request()->is('admin/categories*') ? 'bg-danger text-white' : 'text-dark' }}">
                    Kategori
                </a>
                <a href="{{ route('admin.users.index') }}"
                    class="d-block mb-2 px-3 py-2 rounded {{ request()->is('admin/users*') ? 'bg-danger text-white' : 'text-dark' }}">
                    Pengguna
                </a>
            </nav>

            <!-- Logout dan Profil -->
            <div class="p-3 border-top">
                <nav class="fs-6 fw-medium">
                    <a href="{{ route('admin.profile.show') }}"
                        class="d-block mb-2 px-3 py-2 rounded {{ request()->routeIs('admin.profile.*') ? 'bg-danger text-white' : 'text-dark' }}">
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="btn btn-link text-danger d-block px-3 py-2 rounded text-start fw-medium fs-6 text-decoration-none">
                            Keluar
                        </button>
                    </form>
                </nav>
            </div>
        </aside>


        <!-- Main Area (Topbar + Content) -->
        <div class="flex-grow-1 d-flex flex-column" style="margin-left: 250px;">
            @php
                $status = session('user_status', 'active');
                $statusColors = ['active' => '#22c55e', 'dnd' => '#7f1d1d', 'idle' => '#facc15'];
                $statusLabels = ['active' => 'Aktif', 'dnd' => 'Do Not Disturb', 'idle' => 'Idle'];
            @endphp

            <!-- Topbar -->
            <header
                class="d-flex align-items-center justify-content-between px-3 px-md-4 py-2 bg-danger text-white shadow-sm"
                style="position: sticky; top: 0; z-index: 1020;">
                <div class="d-flex align-items-center gap-2">
                    <button id="sidebar-toggle" class="btn btn-sm btn-light d-md-none"
                        onclick="toggleSidebar()">☰</button>
                    <a href="{{ route('admin.dashboard') }}" class="fs-5 fw-bold text-white text-decoration-none">
                        Admin Panel
                    </a>
                </div>

                <div class="d-flex align-items-center gap-2 m-2">
                    <x-dropdown class="ms-2" align="right" width="48" contentClasses="custom-dropdown-menu">
                        <x-slot name="trigger">
                            <button class="rounded-circle border-0"
                                style="width: 14px; height: 14px; background-color: {{ $statusColors[$status] ?? '#22c55e' }};"
                                title="{{ $statusLabels[$status] ?? 'Aktif' }}">
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <form method="POST" action="{{ route('admin.status.update') }}">
                                @csrf
                                @foreach ($statusColors as $key => $color)
                                    <button type="submit" name="status" value="{{ $key }}"
                                        class="dropdown-item d-flex align-items-center gap-2 text-dark"
                                        style="font-size: 13px;">
                                        <span
                                            style="width: 12px; height: 12px; border-radius: 50%; background-color: {{ $color }}"></span>
                                        {{ ucfirst($statusLabels[$key]) }}
                                    </button>
                                @endforeach
                            </form>
                        </x-slot>
                    </x-dropdown>

                    <a href="{{ route('admin.profile.show') }}" class="small text-white text-decoration-none"
                        style="cursor: pointer;">
                        {{ Auth::user()->name ?? 'Username' }}
                    </a>

                </div>
            </header>

            <!-- Konten -->
            <main class="flex-grow-1 p-3 p-md-4 overflow-auto">
                <div class="p-2">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.style.display = sidebar.style.display === 'none' ? 'flex' : 'none';
        }
    </script>
</body>

</html>
