@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Informasi Profil + Ubah Password --}}
            <div class="p-6 bg-white shadow-md sm:rounded-lg">
                @include('profile.partials.profile-and-password-form')
            </div>

            {{-- Hapus Akun --}}
            <div class="mt-3 p-6 bg-white shadow-md sm:rounded-lg">
                <h2 class="text-xl font-semibold text-red-600 mb-4">Hapus Akun</h2>
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
@endsection