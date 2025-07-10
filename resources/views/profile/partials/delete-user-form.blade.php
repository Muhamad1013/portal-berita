<form id="delete-account-form" method="POST" action="{{ route('profile.destroy') }}" class="w-full">
    @csrf
    @method('delete')

    <!-- Deskripsi -->
    <p class="text-sm text-gray-700 mb-4">
        Setelah akun dihapus, semua data Anda akan hilang secara permanen. Tindakan ini tidak dapat dibatalkan.
    </p>

    <!-- Input Password -->
    <div class="mb-4">
        <x-input-label for="password" value="Konfirmasi dengan Password" />
        <x-text-input id="delete_password" name="password" type="password" class="mt-1 block w-full"
            autocomplete="current-password" required />
        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
    </div>

    <!-- Tombol Hapus -->
    <div class="mt-6">
        <x-danger-button id="delete-account-button" onclick="return confirm('Yakin ingin menghapus akun?')"
            class="bg-red-600 hover:bg-red-700 disabled:opacity-50" disabled>
            {{ __('Hapus Akun') }}
        </x-danger-button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('delete_password');
        const deleteButton = document.getElementById('delete-account-button');

        function toggleDeleteButton() {
            if (passwordInput.value.trim().length > 0) {
                deleteButton.removeAttribute('disabled');
            } else {
                deleteButton.setAttribute('disabled', 'disabled');
            }
        }

        // Pantau input password
        passwordInput.addEventListener('input', toggleDeleteButton);
    });
</script>