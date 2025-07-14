@extends('layouts.admin')

@section('title', 'Profil Admin')

@section('content')
    @php use Illuminate\Support\Facades\Storage; @endphp

    <h5 class="mb-3 fw-bold text-danger fs-4">Profile Admin</h5>

    <div class="container-fluid">
        <div class="bg-white rounded shadow-sm p-4 border border-light-subtle">
            <div class="row align-items-start">
                {{-- Avatar Inisial --}}
                <div class="col-md-3 text-center mb-4 mb-md-0">
                    <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center mx-auto"
                        style="width: 140px; height: 140px; font-size: 3rem; font-weight: 600;">
                        {{ strtoupper(substr($admin->name, 0, 1)) }}
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <a href="{{ route('admin.profile.password') }}" class="btn btn-sm btn-outline-secondary">Ganti
                            Password</a>
                    </div>
                </div>

                {{-- Informasi Profil --}}
                <div class="col-md-9">
                    <div class="row row-cols-1 row-cols-md-2 g-4 mb-3">
                        <div>
                            <label class="text-muted small mb-1">Nama Lengkap</label>
                            <div class="fw-semibold text-dark">{{ $admin->name }}</div>
                        </div>
                        <div>
                            <label class="text-muted small mb-1">Email</label>
                            <div class="fw-semibold text-dark">{{ $admin->email }}</div>
                        </div>
                        <div>
                            <label class="text-muted small mb-1">Username</label>
                            <div class="fw-semibold text-dark">{{ $admin->username ?? '-' }}</div>
                        </div>
                        <div>
                            <label class="text-muted small mb-1">No. Telepon</label>
                            <div class="fw-semibold text-dark">{{ $admin->phone ?? '-' }}</div>
                        </div>
                        <div>
                            <label class="text-muted small mb-1">Tanggal Bergabung</label>
                            <div class="fw-semibold text-dark">
                                {{ \Carbon\Carbon::parse($admin->created_at)->translatedFormat('d F Y') }}
                            </div>
                        </div>
                        <div>
                            <label class="text-muted small mb-1">Status</label>
                            <div class="fw-semibold text-dark">
                                <span class="badge bg-success">{{ $admin->status ?? 'Aktif' }}</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-danger px-4 mt-2">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
@endsection