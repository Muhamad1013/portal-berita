@extends('layouts.app')

@section('title', 'Verifikasi Email')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <div style="
            max-width: 480px;
            margin: 60px auto;
            font-family: 'Inter', sans-serif;
            padding: 32px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        ">

        <!-- Judul -->
        <h2
            style="font-family: 'Inter', sans-serif;font-size: 24px; font-weight: bold; margin-bottom: 1rem; text-align: center; color: #111827;">
            Verifikasi Email Anda
        </h2>

        <!-- Pesan utama -->
        <div style="font-size: 14px; color: #4B5563; margin-bottom: 1.5rem;">
            Terima kasih telah mendaftar! Sebelum melanjutkan, silakan verifikasi email Anda dengan mengklik tautan yang
            telah kami kirimkan. Jika Anda belum menerima email, kami dapat mengirim ulang.
        </div>

        <!-- Status sukses -->
        @if (session('status') == 'verification-link-sent')
            <div
                style="font-size: 14px; color: #15803d; background-color: #dcfce7; padding: 12px; border-radius: 6px; margin-bottom: 1.5rem;">
                Tautan verifikasi baru telah dikirim ke alamat email Anda.
            </div>
        @endif

        <!-- Form Resend -->
        <form method="POST" action="{{ route('verification.send') }}" style="margin-bottom: 1rem;">
            @csrf
            <button type="submit"
                style="width: 100%; background-color: #dc2626; color: white; padding: 10px 16px; border: none; border-radius: 6px; font-weight: 500; font-size: 14px; cursor: pointer;"
                onmouseover="this.style.backgroundColor='#b91c1c'" onmouseout="this.style.backgroundColor='#dc2626'">
                Kirim Ulang Email Verifikasi
            </button>
        </form>

        <!-- Tombol Kembali ke Beranda -->
        <a href="{{ route('beranda') }}"
            style="display: block; width: 100%; text-align: center; font-size: 14px; color: #374151; background: none; border: none; text-decoration: underline; cursor: pointer;">
            Kembali
        </a>
    </div>
@endsection