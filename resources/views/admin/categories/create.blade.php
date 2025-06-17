@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
  <div class="container">
    <h1 style="font-weight:bold; font-size:24px;" class="mb-4">Tambah Kategori</h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Nama Kategori</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-danger">Simpan</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
@endsection