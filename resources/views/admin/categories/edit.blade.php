@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
  <div class="container">
    <h1 style="font-weight:bold; font-size:24px;" class="mb-4">Edit Kategori</h1>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
      <label for="name" class="form-label">Nama Kategori</label>
      <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
    </div>

    <button type="submit" class="btn btn-danger">Update</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
@endsection