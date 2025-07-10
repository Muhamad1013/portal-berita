<section>
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-gray-900">Informasi Profil</h2>
        <p class="mt-1 text-sm text-gray-600">Perbarui nama dan email akun Anda di sini.</p>
    </header>

    {{-- Form Kirim Verifikasi Email --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form id="update-profile-form" method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="flex flex-col md:flex-row gap-6 md:items-start">
            {{-- Avatar --}}
            <div class="flex-shrink-0">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=dc2626&color=fff&size=128"
                    alt="Avatar" class="rounded-full w-32 h-32 object-cover">
            </div>

            {{-- Input Nama & Email --}}
            <div class="flex flex-col gap-4 w-full">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="w-full md:w-1/2">
                        <x-input-label for="name" value="Nama" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            :value="old('name', $user->name)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="w-full md:w-1/2">
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                            :value="old('email', $user->email)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                </div>

                {{-- Verifikasi Email --}}
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div class="text-sm text-gray-800">
                        <span class="text-red-600">Email Anda belum diverifikasi.</span>
                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Klik di sini untuk mengirim ulang.
                        </button>
                        @if (session('status') === 'verification-link-sent')
                            <p class="text-sm text-green-600 mt-2">Tautan verifikasi telah dikirim.</p>
                        @endif
                    </div>
                @endif

                <div class="pt-2">
                    <x-primary-button class="bg-red-600 hover:bg-red-700">Simpan</x-primary-button>
                    @if (session('status') === 'profile-updated')
                        <p class="text-sm text-gray-600 ml-3">Disimpan.</p>
                    @endif
                </div>
            </div>
        </div>
    </form>
</section>
