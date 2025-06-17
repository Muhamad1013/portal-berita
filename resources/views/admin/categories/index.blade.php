@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('content')
  <!-- Top Buttons -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div class="btn-group gap-2">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success btn-sm">
      Tambah
    </a>
    <button class="btn btn-secondary btn-sm">
      Filter
    </button>
    <button class="btn btn-primary btn-sm">
      Ekspor
    </button>
    </div>
    <form action="{{ route('admin.categories.index') }}" method="GET" class="input-group input-group-sm"
    style="width: 12rem;">
    <input type="text" name="search" class="form-control" placeholder="Cari kategori..."
      value="{{ request('search') }}">
    <button class="btn btn-outline-secondary" type="submit">
      <i class="bi bi-search"></i>
    </button>
    </form>
  </div>

  <!-- Table -->
  <div class="table-responsive border rounded">
    <table class="table table-hover table-bordered mb-0">
    <thead class="table-dark">
      <tr>
      <th>Nama Kategori</th>
      <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
      <td>{{ $category->name }}</td>
      <td class="text-center">
      <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm text-white me-1">
      Edit
      </a>
      <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline"
      onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger btn-sm">
        Hapus
      </button>
      </form>
      </td>
      </tr>
    @endforeach

      @if ($categories->isEmpty())
      <tr>
      <td colspan="2" class="text-center text-muted py-3">Tidak ada data kategori.</td>
      </tr>
    @endif
    </tbody>
    </table>
  </div>

  <!-- Bottom Save Button -->
  <div class="mt-4 d-flex justify-content-center">
    <button class="btn btn-danger px-4">
    Simpan
    </button>
  </div>
@endsection