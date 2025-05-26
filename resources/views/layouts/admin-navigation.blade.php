<div style="display: flex; height: 100vh; font-family: sans-serif; background-color: #f3f4f6;"> <!-- Sidebar -->
  <aside
    style="width: 250px; background-color: #ffffff; border-right: 1px solid #e5e7eb; display: flex; flex-direction: column;">

    <!-- Avatar -->
    <div
      style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 1.5rem 0; border-bottom: 1px solid #e5e7eb;">
      <div style="width: 80px; height: 80px; border-radius: 9999px; background-color: #9ca3af; margin-bottom: 0.5rem;">
      </div>
      <span style="font-size: 0.875rem; font-weight: 600; color: #374151;">Admin</span>
    </div>

    <!-- Navigation -->
    <nav style="flex: 1; padding: 1.5rem 1rem; font-size: 0.875rem; font-weight: 500; color: #1f2937;">
      <a href="{{ route('admin.dashboard') }}"
        style="display: block; padding: 0.5rem 0.75rem; border-radius: 0.375rem; text-decoration: none; margin-bottom: 0.5rem; background-color: {{ request()->is('admin/dashboard') ? '#f3f4f6' : 'transparent' }};">
        Dashboard
      </a>
      <a href="#"
        style="display: block; padding: 0.5rem 0.75rem; border-radius: 0.375rem; text-decoration: none; margin-bottom: 0.5rem;"
        onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
        Berita
      </a>
      <a href="#"
        style="display: block; padding: 0.5rem 0.75rem; border-radius: 0.375rem; text-decoration: none; margin-bottom: 0.5rem;"
        onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
        Kategori
      </a>
      <a href="#"
        style="display: block; padding: 0.5rem 0.75rem; border-radius: 0.375rem; text-decoration: none; margin-bottom: 0.5rem;"
        onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'">
        Pengguna
      </a>
    </nav>

    <!-- Logout -->
    <div style="padding: 1rem; border-top: 1px solid #e5e7eb;">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
          style="width: 100%; text-align: left; padding: 0.5rem 0.75rem; font-size: 0.875rem; color: #dc2626; border: none; background: none; cursor: pointer;"
          onmouseover="this.style.color='#b91c1c'" onmouseout="this.style.color='#dc2626'">
          Keluar
        </button>
      </form>
    </div>
  </aside> <!-- Main Content -->
  <div style="flex: 1; display: flex; flex-direction: column;">

    <!-- Topbar -->
    <header
      style="height: 4rem; background-color: #dc2626; color: #fff; display: flex; align-items: center; justify-content: space-between; padding: 0 1.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
      <h1 style="font-size: 1.125rem; font-weight: bold;">Admin Panel</h1>
      <div style="display: flex; align-items: center; gap: 0.5rem;">
        <div style="width: 12px; height: 12px; border-radius: 9999px; background-color: #fff;"></div>
        <span style="font-size: 0.875rem;">{{ Auth::user()->name ?? 'Username' }}</span>
      </div>
    </header>

    <!-- Content -->
    <main style="flex: 1; background-color: #f9fafb; padding: 1.5rem; overflow-y: auto;">

      <!-- Top Buttons -->
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <div style="display: flex; gap: 0.5rem;">
          <button
            style="padding: 0.5rem 1rem; font-size: 0.875rem; background-color: #fff; border: 1px solid #d1d5db; border-radius: 0.375rem; cursor: pointer;"
            onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='#fff'">
            Tambah
          </button>
          <button
            style="padding: 0.5rem 1rem; font-size: 0.875rem; background-color: #fff; border: 1px solid #d1d5db; border-radius: 0.375rem; cursor: pointer;"
            onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='#fff'">
            Filter
          </button>
          <button
            style="padding: 0.5rem 1rem; font-size: 0.875rem; background-color: #fff; border: 1px solid #d1d5db; border-radius: 0.375rem; cursor: pointer;"
            onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='#fff'">
            Ekspor
          </button>
        </div>
        <div style="width: 12rem; height: 1.5rem; background-color: #d1d5db; border-radius: 0.375rem;"></div>
      </div>

      <!-- Main Content Box -->
      <div
        style="background-color: #ffffff; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); padding: 1.5rem; min-height: 300px;">
        @yield('content')
      </div>

      <!-- Bottom Save Button -->
      <div style="margin-top: 2rem; display: flex; justify-content: center;">
        <button
          style="padding: 0.5rem 1.5rem; background-color: #dc2626; color: white; border-radius: 0.375rem; border: none; cursor: pointer;"
          onmouseover="this.style.backgroundColor='#b91c1c'" onmouseout="this.style.backgroundColor='#dc2626'">
          Simpan
        </button>
      </div>
    </main>
  </div>
</div>