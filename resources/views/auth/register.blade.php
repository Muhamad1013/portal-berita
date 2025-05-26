<x-guest-layout>
    <h2 style="font-weight:bold; font-size:24px;"" class=" text-center mb-6 mt-4">Register</h2>
    <form method="POST" action="{{ route('register') }}"
        style="max-width: 400px; margin: 0 auto; padding: 20px; font-family: 'Inter', sans-serif;">
        @csrf
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Name -->
        <div style="margin-bottom: 1.5rem;">
            <x-input-label for="name" :value="__('Name')"
                style="margin-bottom: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #374151;" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                style="width: 100%; padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem; font-family: 'Inter', sans-serif;" />
            <x-input-error :messages="$errors->get('name')"
                style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem; font-family: 'Inter', sans-serif;" />
        </div>

        <!-- Email Address -->
        <div style="margin-bottom: 1.5rem;">
            <x-input-label for="email" :value="__('Email')"
                style="margin-bottom: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #374151;" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                style="width: 100%; padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem; font-family: 'Inter', sans-serif;" />
            <x-input-error :messages="$errors->get('email')"
                style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem; font-family: 'Inter', sans-serif;" />
        </div>

        <!-- Password -->
        <div style="margin-bottom: 1.5rem;">
            <x-input-label for="password" :value="__('Password')"
                style="margin-bottom: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #374151;" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password"
                style="width: 100%; padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem; font-family: 'Inter', sans-serif;" />
            <x-input-error :messages="$errors->get('password')"
                style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem; font-family: 'Inter', sans-serif;" />
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom: 1.5rem;">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                style="margin-bottom: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #374151;" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                autocomplete="new-password"
                style="width: 100%; padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem; font-family: 'Inter', sans-serif;" />
            <x-input-error :messages="$errors->get('password_confirmation')"
                style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem; font-family: 'Inter', sans-serif;" />
        </div>

        <div style="display: flex; align-items: center; justify-content: flex-end; margin-top: 1.5rem;">
            <a href="{{ route('login') }}"
                style="font-size: 0.875rem; color: #374151; text-decoration: none; font-family: 'Inter', sans-serif;"
                onmouseover="this.style.textDecoration='underline'; this.style.color='#111827'"
                onmouseout="this.style.textDecoration='none'; this.style.color='#374151'">
                {{ __('Already registered?') }}
            </a>

            <button type="submit"
                style="margin-left: 1rem; padding: 0.5rem 1.5rem; background-color: #dc2626; color: white; border-radius: 0.375rem; border: none; cursor: pointer; font-size: 0.875rem; font-weight: 500; font-family: 'Inter', sans-serif;"
                onmouseover="this.style.backgroundColor='#b91c1c'" onmouseout="this.style.backgroundColor='#dc2626'">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>