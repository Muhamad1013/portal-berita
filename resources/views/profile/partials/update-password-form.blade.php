<section class="mt-8">
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-gray-900">Ubah Kata Sandi</h2>
    </header>

    <form id="update-password-form" method="POST" action="{{ route('password.update.custom') }}">
        @csrf
        @method('put')

        <div class="flex flex-col gap-4">
            <div>
                <x-input-label for="current_password" value="Password Saat Ini" />
                <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password" value="Password Baru" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" value="Konfirmasi Password Baru" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                    class="mt-1 block w-full" required autocomplete="new-password" />
            </div>
        </div>

        <div class="mt-6">
            <x-primary-button class="bg-red-600 hover:bg-red-700">Ubah Password</x-primary-button>
            @if (session('status') === 'password-updated')
                <span class="text-sm text-green-600 ml-3">Password berhasil diubah.</span>
            @endif
        </div>
    </form>
</section>
