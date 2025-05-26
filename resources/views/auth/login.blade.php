<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <h2 style="font-weight:bold; font-size:24px;"" class=" text-center mb-6 mt-4">Login</h2>
    <form method="POST" action="{{ route('login') }}"
        style="max-width: 400px; margin: 0 auto; padding: 20px; font-family: 'Inter', sans-serif;">
        @csrf
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Email -->
        <div style="margin-bottom: 1.5rem;">
            <x-input-label for="email" :value="__('Email')"
                style="margin-bottom: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #374151;" />
            <x-text-input id="email" name="email" type="email" required autofocus
                style="width: 100%; padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem; font-family: 'Inter', sans-serif;"
                placeholder="{{ __('Your email') }}" value="{{ old('email') }}" />
            <x-input-error :messages="$errors->get('email')"
                style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem; font-family: 'Inter', sans-serif;" />
        </div>

        <!-- Password -->
        <div style="margin-bottom: 1rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                <x-input-label for="password" :value="__('Password')"
                    style="font-size: 0.875rem; font-weight: 500; color: #374151;" />
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        style="font-size: 0.75rem; color: #374151; text-decoration: none; font-family: 'Inter', sans-serif;"
                        onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>
            <x-text-input id="password" name="password" type="password" required
                style="width: 100%; padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem; font-family: 'Inter', sans-serif;"
                placeholder="{{ __('Your password') }}" />
            <x-input-error :messages="$errors->get('password')"
                style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem; font-family: 'Inter', sans-serif;" />
        </div>

        <!-- Remember Me Checkbox -->
        <div style="display: block; margin-top: 1rem;">
            <label for="remember_me" style="display: inline-flex; align-items: center;">
                <input id="remember_me" type="checkbox" style="border-radius: 0.25rem; border: 1px solid #d1d5db; color: #4f46e5; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); 
                        width: 1rem; height: 1rem; cursor: pointer;" name="remember">
                <span
                    style="margin-left: 0.5rem; font-size: 0.875rem; color: #4b5563; font-family: 'Inter', sans-serif;">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <!-- Sign In Button -->
        <div style="margin-top: 1.5rem;">
            <button type="submit"
                style="padding: 0.5rem 1.5rem; width: 100%; background-color: #dc2626; color: white; border-radius: 0.375rem; border: none; cursor: pointer; font-size: 0.875rem; font-weight: 500; font-family: 'Inter', sans-serif;"
                onmouseover="this.style.backgroundColor='#b91c1c'" onmouseout="this.style.backgroundColor='#dc2626'">
                {{ __('Sign In') }}
            </button>
        </div>

        <!-- Register -->
        <div style="margin-top: 1rem; text-align: center;">
            <a href="{{ route('register') }}"
                style="font-size: 0.875rem; color: #374151; text-decoration: none; font-family: 'Inter', sans-serif;"
                onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                {{ __('Don\'t have an account? Register') }}
            </a>
        </div>
    </form>
</x-guest-layout>