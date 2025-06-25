<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
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
  </style>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="d-flex vh-100" style="font-family: sans-serif; background-color: #f3f4f6;">
    <!-- Sidebar -->
    <aside class="bg-white border-end d-flex flex-column" style="width: 250px;">
      <!-- Avatar -->
      <div class="d-flex flex-column align-items-center justify-content-center py-4 border-bottom">
        <div class="rounded-circle bg-secondary mb-2" style="width: 80px; height: 80px;"></div>
        <span class="fw-semibold text-secondary small">Admin</span>
      </div>

      <!-- Navigation -->
      <nav class="flex-grow-1 px-3 py-4 fs-6 fw-medium text-dark">
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
        <a href="#"
          class="d-block mb-2 px-3 py-2 rounded {{ request()->is('admin/users*') ? 'bg-danger text-white' : 'text-dark' }}">
          Pengguna
        </a>
      </nav>

      <!-- Logout -->
      <div class="p-3 border-top">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-link text-danger p-0 w-100 text-start"
            onmouseover="this.classList.add('text-dark')" onmouseout="this.classList.remove('text-dark')">
            Keluar
          </button>
        </form>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-grow-1 d-flex flex-column">
      <!-- Topbar -->
      @php
    $status = session('user_status', 'active');
    $statusColors = ['active' => '#22c55e', 'dnd' => '#7f1d1d', 'idle' => '#facc15'];
    $statusLabels = ['active' => 'Aktif', 'dnd' => 'Do Not Disturb', 'idle' => 'Idle'];
    @endphp

      <header class="d-flex align-items-center justify-content-between px-4"
        style="height: 4rem; background-color: #dc2626; color: white; box-shadow: 0 1px 2px rgba(0,0,0,0.05); border-radius: 0 0 0.5rem 0.5rem;">
        <h1 class="fs-5 fw-bold m-0 d-flex align-items-center" style="height: 100%;">Admin Panel</h1>

        <div class="d-flex align-items-center gap-2">
          <!-- Dropdown status -->
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button class="d-flex align-items-center justify-content-center"
                style="width: 14px; height: 14px; border-radius: 50%; background-color: {{ $statusColors[$status] }}; border:none; cursor:pointer;"
                title="{{ $statusLabels[$status] }}">
              </button>
            </x-slot>

            <x-slot name="content">
              <form method="POST" action="{{ route('admin.status.update') }}">
                @csrf
                @foreach ($statusColors as $key => $color)
          <button type="submit" name="status" value="{{ $key }}"
            style="font-size:13px; color:rgba(0, 0, 0, 0.589); display: flex; align-items: center; gap: 0.5rem; width: 100%; padding: 0.5rem 1rem; border: none; background: none; cursor: pointer; text-align: left;"
            onmouseover="this.style.backgroundColor='#f3f4f6'"
            onmouseout="this.style.backgroundColor='transparent'" title="{{ $statusLabels[$key] }}">
            <span
            style="width: 12px; height: 12px; border-radius: 50%; background-color: {{ $color }}; display:inline-block;"></span>
            {{ ucfirst($statusLabels[$key]) }}
          </button>
        @endforeach
              </form>
            </x-slot>
          </x-dropdown>

          <span class="small text-white d-flex align-items-center">
            {{ Auth::user()->name ?? 'Username' }}
          </span>
        </div>
      </header>

      <!-- Content -->
      <main class="flex-grow-1 bg-light p-4 overflow-auto">
        <div class="bg-white rounded-3 shadow-sm p-4 min-vh-50">
          @yield('content')
        </div>
      </main>
    </div>
  </div>
</body>

</html>