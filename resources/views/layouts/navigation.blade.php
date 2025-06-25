<style>
    .nav-fixed {
        position: sticky;
        top: 0;
        z-index: 50;
        background-color: #f8f9fa;
    }

    .kategori-fixed {
        position: sticky;
        top: 64px;
        z-index: 49;
        background-color: #dc2626;
    }
</style>

<!-- Navbar Utama -->
<nav x-data="{ open: false }" class="nav-fixed border-b border-gray-300 text-[#1c1c1e] font-[Inter,sans-serif]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                @auth
                    @php
                        $redirect = auth()->user()->role === 'admin' ? route('admin.dashboard') : route('beranda');
                    @endphp
                    <a href="{{ $redirect }}" class="text-xl font-bold font-[Georgia,serif]"
                        style="font-weight:bold; color:#1c1c1e;" onmouseover="this.style.color='#dc2626';"
                        onmouseout="this.style.color='#1c1c1e';">FastNews</a>
                @else
                    <a href="{{ route('home') }}" class="text-xl font-bold font-[Georgia,serif]"
                        style=" font-weight:bold;color:#1c1c1e;" onmouseover="this.style.color='#dc2626';"
                        onmouseout="this.style.color='#1c1c1e';">FastNews</a>
                @endauth
            </div>

            <!-- Search -->
            <div class="flex-1 mx-6 hidden sm:flex justify-center">
                <form action="{{ route('home') }}" method="GET" class="w-full max-w-md">
                    <input type="text" name="q" placeholder="Cari berita..."
                        style="width: 100%; padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem; outline: none; transition: border 0.2s ease;"
                        onfocus="this.style.borderColor='#dc2626';" onblur="this.style.borderColor='#d1d5db';" />
                </form>
            </div>

            <!-- Auth -->
            <div class="flex items-center text-sm">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm" style="color:#1c1c1e;"
                                onmouseover="this.style.color='#dc2626';" onmouseout="this.style.color='#1c1c1e';">
                                {{ Auth::user()->name }}
                                <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Log
                                    Out</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" style="color:#4b5563; transition:color 0.2s;"
                        onmouseover="this.style.color='#dc2626';" onmouseout="this.style.color='#4b5563';">Login</a>
                    <a href="{{ route('register') }}" style="color:#dc2626; margin-left:1rem; text-decoration:none;"
                        onmouseover="this.style.textDecoration='underline';"
                        onmouseout="this.style.textDecoration='none';">Daftar</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden">
        <div class="px-4 pt-2 pb-3 space-y-1">
            @auth
                <x-responsive-nav-link :href="route('redirect')">Dashboard</x-responsive-nav-link>
            @endauth
        </div>
        @auth
            <div class="border-t border-gray-300 pt-4 pb-1">
                <div class="px-4">
                    <div class="text-base text-[#1c1c1e] font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">Logout</x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>

<!-- Bar Kategori -->
<nav class="kategori-fixed border-b border-red" style="background-color: #dc2626;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto flex gap-2 py-2 text-sm font-medium overflow-x-auto">
            @isset($kategoriList)
                @foreach($kategoriList as $kategori)
                    <a href="{{ route('user.beranda.kategori', $kategori->id) }}" class="px-3 py-2 text-sm"
                        style="cursor: pointer; border-radius: 0.375rem; transition: background-color 0.2s ease, color 0.2s ease; font-weight: bold; color: #f1f1f1;"
                        onmouseover="this.style.backgroundColor='#fff'; this.style.color='#dc2626';"
                        onmouseout="this.style.backgroundColor=''; this.style.color='#fff';">
                        {{ $kategori->name }}
                    </a>
                @endforeach
            @endisset
        </div>
    </div>
</nav>