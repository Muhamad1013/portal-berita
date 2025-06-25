@extends('layouts.app')

@section('title', 'Detail Berita')

@section('content')
  <div class="p-6">
    <a href="{{ route('berita.index') }}" class="text-blue-500 mb-4 inline-block">← Kembali ke Berita</a>

    <iframe src="{{ $url }}" class="w-full h-[80vh] border rounded" allowfullscreen></iframe>
  </div>
@endsection