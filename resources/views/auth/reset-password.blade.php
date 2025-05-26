<x-guest-layout>
    <div style="max-width: 400px; margin: 0 auto; padding: 20px; font-family: 'Inter', sans-serif;">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
        <h2 style="font-weight:bold; font-size:24px;"" class=" text-center mb-6 mt-4">Reset Password</h2>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div style="margin-bottom: 1.5rem;">
                <x-input-label for="email" :value="__('Email')"
                    style="margin-bottom: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #374151;" />
                <x-text-input id="email" type="email" name="email" :value="old('email', $request->email)" required
                    autofocus
                    style="width: 100%; padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem; font-family: 'Inter', sans-serif;" />
                <x-input-error :messages="$errors->get('email')"
                    style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem;" />
            </div>

            <!-- Password -->
            <div style="margin-bottom: 1.5rem;">
                <x-input-label for="password" :value="__('Password')"
                    style="margin-bottom: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #374151;" />
                <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                    style="width: 100%; padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem; font-family: 'Inter', sans-serif;" />
                <x-input-error :messages="$errors->get('password')"
                    style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem;" />
            </div>

            <!-- Confirm Password -->
            <div style="margin-bottom: 1.5rem;">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                    style="margin-bottom: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #374151;" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password"
                    style="width: 100%; padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem; font-family: 'Inter', sans-serif;" />
                <x-input-error :messages="$errors->get('password_confirmation')"
                    style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem;" />
            </div>

            <!-- Submit Button -->
            <div style="display: flex; justify-content: flex-end; margin-top: 1.5rem;">
                <button type="submit"
                    style="padding: 0.5rem 1.5rem; background-color: #dc2626; color: white; border-radius: 0.375rem; border: none; cursor: pointer; font-size: 0.875rem; font-weight: 500;"
                    onmouseover="this.style.backgroundColor='#b91c1c'"
                    onmouseout="this.style.backgroundColor='#dc2626'">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>