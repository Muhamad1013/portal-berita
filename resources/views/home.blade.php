@extends('layouts.app')

@section('title', 'Portal Berita')

@section('content')
  <div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold">Selamat Datang di Portal Berita</h1>
    <p class="mt-2 text-gray-700">Temukan berita terbaru, artikel menarik, dan informasi terpercaya.</p>

    @auth
    <div class="mt-4 text-green-600">
    Anda login sebagai <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->role }})
    <a href="{{ route('redirect') }}" class="text-blue-600 underline ml-2">Lanjut ke dashboard</a>
    </div>
    @else
    <div class="mt-4">
    <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</a>
    <a href="{{ route('register') }}" class="ml-2 text-blue-700 underline">Daftar</a>
    </div>
    @endauth
  </div>
@endsection