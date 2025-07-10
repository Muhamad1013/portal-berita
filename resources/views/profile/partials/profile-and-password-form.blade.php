<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

    body,
    h1,
    h2,
    h3,
    h4,
    p,
    a,
    small {
        font-family: 'Inter', sans-serif;
    }

    a:hover {
        color: #dc2626 !important;
    }

    .profile-wrapper {
        font-family: 'Inter', sans-serif;
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    .section-title {
        font-size: 24px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 8px;
    }

    .section-subtitle {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 24px;
    }

    .profile-info {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    @media (min-width: 768px) {
        .profile-info {
            flex-direction: row;
        }
    }

    .avatar {
        width: 144px;
        height: 144px;
        border-radius: 9999px;
        object-fit: cover;
        border: 3px solid #dc2626;
    }

    .form-grid {
        flex: 1;
        display: grid;
        grid-template-columns: 1fr;
        gap: 16px;
    }

    @media (min-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 4px;
    }

    .form-group input {
        padding: 10px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 14px;
    }

    .form-submit {
        margin-top: 16px;
    }

    .btn {
        background-color: #dc2626;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        font-size: 14px;
    }

    .btn:hover {
        background-color: #b91c1c;
        color: white;
    }

    .btn:disabled {
        background-color: #fca5a5;
        cursor: not-allowed;
        opacity: 0.6;
    }

    .divider {
        height: 1px;
        background-color: #e5e7eb;
        margin: 32px 0;
    }

    .success-text {
        font-size: 14px;
        margin-left: 12px;
        color: #10b981;
    }

    .text-sm {
        font-size: 14px;
    }

    .error-text {
        font-size: 13px;
        color: #ef4444;
        margin-top: 4px;
    }
</style>

<section class="profile-wrapper">
    <!-- Header -->
    <div>
        <h2 class="section-title">Profil</h2>
        <p class="section-subtitle">Perbarui informasi profil dan kata sandi Anda di sini.</p>
    </div>

    <!-- Form Kirim Verifikasi -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="d-none">
        @csrf
    </form>

    <!-- Form Update Profil -->
    <form id="update-profile-form" method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="profile-info">
            <!-- Avatar -->
            <div>
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=dc2626&color=fff&size=128"
                    alt="Avatar" class="avatar">
            </div>

            <!-- Form Fields -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="error-text">{{ $message }}</div>
                    @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div class="text-sm mt-2">
                            <span class="text-red-600">Belum Diverifikasi</span>
                            <button form="send-verification" type="submit"
                                style="background: none; border: none; color: #374151; text-decoration: underline; cursor: pointer;">
                                Kirim Ulang Verifikasi
                            </button>
                            @if (session('status') === 'verification-link-sent')
                                <p class="success-text">Tautan verifikasi telah dikirim.</p>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Submit -->
                <div class="form-submit">
                    <button class="btn" type="submit">Simpan</button>
                    @if (session('status') === 'profile-updated')
                        <span class="success-text">Perubahan disimpan.</span>
                    @endif
                </div>
            </div>
        </div>
    </form>

    <!-- Divider -->
    <div class="divider"></div>

    <!-- Ganti Password -->
    <div>
        <h2 class="section-title">Ubah Kata Sandi</h2>

        <form id="update-password-form" method="POST" action="{{ route('password.update.custom') }}">
            @csrf
            @method('put')

            <div class="form-grid">
                <div class="form-group mt-2">
                    <label for="current_password">Password Saat Ini</label>
                    <input id="current_password" name="current_password" type="password" required>
                    @error('current_password')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input id="password" name="password" type="password" required>
                    @error('password')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required>
                    @error('password_confirmation')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-submit">
                <button class="btn" type="submit">Ubah Password</button>
                @if (session('status') === 'password-updated')
                    <span class="success-text">Password berhasil diubah.</span>
                @endif
            </div>
        </form>
    </div>
</section>