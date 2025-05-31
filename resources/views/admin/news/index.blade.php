@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
  <!-- Top Buttons -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div class="btn-group gap-2">
    <a href="{{ route('admin.news.create') }}" class="btn btn-success btn-sm">
      Tambah
    </a>
    <button class="btn btn-secondary btn-sm">
      Filter
    </button>
    <button class="btn btn-primary btn-sm">
      Ekspor
    </button>
    </div>
    <form action="{{ route('admin.news.index') }}" method="GET" class="input-group input-group-sm" style="width: 12rem;">
    <input type="text" name="search" class="form-control" placeholder="Cari berita..." value="{{ request('search') }}">
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
      <th>Judul</th>
      <th>Kategori</th>
      <th>Tanggal</th>
      <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($news as $item)
      <tr>
      <td>{{ $item->title }}</td>
      <td>
      @if ($item->categories->isNotEmpty())
      {{ $item->categories->pluck('name')->join(', ') }}
      @else
      Tanpa Kategori
      @endif
      </td>

      <td>{{ $item->created_at->format('d M Y') }}</td>
      <td class="text-center">
      <a href="{{ route('admin.news.show', $item->id) }}" class="btn btn-info btn-sm text-white me-1">
      Show
      </a>
      <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-warning btn-sm text-white me-1">
      Edit
      </a>
      <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="d-inline"
      onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger btn-sm">
        Hapus
      </button>
      </form>
      </td>

      </tr>
    @endforeach

      @if ($news->isEmpty())
      <tr>
      <td colspan="4" class="text-center text-muted py-3">Tidak ada data berita.</td>
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