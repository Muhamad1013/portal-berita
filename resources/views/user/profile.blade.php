@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .profile-container {
            max-width: 80%;
            margin: 0 auto;
            padding: 40px 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.06);
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .profile-avatar {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #dc2626;
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .profile-role {
            color: #6c757d;
            font-size: 1rem;
        }

        .profile-table {
            width: 100%;
            border-collapse: collapse;
        }

        .profile-table th,
        .profile-table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .profile-table th {
            background-color: #f8f9fa;
            width: 40%;
        }

        .text-success {
            color: #198754;
            font-weight: 500;
        }

        .text-danger {
            color: #dc3545;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-avatar {
                margin-bottom: 15px;
            }

            .profile-name {
                font-size: 1.5rem;
            }
        }
    </style>

    <div class="profile-container">
        <div class="profile-header">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=dc2626&color=fff&size=128"
                alt="Avatar" class="profile-avatar">
            <div class="profile-info">
                <div class="profile-name">{{ $user->name }}</div>
                <div class="profile-role">{{ $user->role }}</div>
            </div>
        </div>

        <table class="profile-table">
            <tbody>
                <tr>
                    <th>Nama</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Status Verifikasi</th>
                    <td>
                        @if($user->email_verified_at)
                            <span class="text-success">Terverifikasi</span>
                        @else
                            <a href="{{ route('verification.notice') }}" class="text-decoration-none">
                                <span class="text-danger">Belum Diverifikasi</span>
                            </a>

                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Bergabung Sejak</th>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection