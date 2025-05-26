@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
  <h2>Selamat datang di Portal Berita</h2>
  <p>Halo {{ auth()->user()->name }} ({{ auth()->user()->role }})</p>
@endsection