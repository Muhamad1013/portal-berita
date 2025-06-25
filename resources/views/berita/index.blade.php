@extends('layouts.guest') {{-- atau layouts.app jika user login --}}

@section('title', 'Berita')

@section('content')
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-6">
    @forelse ($berita as $item)
    <div class="bg-white shadow p-4 rounded">
    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover rounded">
    <h2 class="mt-2 text-lg font-semibold">{{ $item['title'] }}</h2>
    <p class="text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($item['description'], 100) }}</p>
    <a href="{{ route('berita.detail', ['url' => $item['url']]) }}" class="text-blue-600 mt-2 inline-block">Baca
      Selengkapnya</a>
    </div>
    @empty
    <p>Tidak ada berita ditemukan.</p>
    @endforelse
  </div>
@endsection