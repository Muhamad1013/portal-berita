<x-guest-layout>
    <div style="max-width: 400px; margin: 0 auto; padding: 20px; font-family: 'Inter', sans-serif;">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Info Text -->
        <div style="margin-bottom: 1rem; font-size: 0.875rem; color: #4b5563; line-height: 1.5;">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status style="margin-bottom: 1rem; color: #10b981;" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div style="margin-bottom: 1.5rem;">
                <x-input-label for="email" :value="__('Email')"
                    style="margin-bottom: 0.5rem; font-size: 0.875rem; font-weight: 500; color: #374151;" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                    style="width: 100%; padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem; font-family: 'Inter', sans-serif;" />
                <x-input-error :messages="$errors->get('email')"
                    style="color: #ef4444; font-size: 0.8125rem; margin-top: 0.25rem; font-family: 'Inter', sans-serif;" />
            </div>

            <div style="display: flex; justify-content: flex-end; margin-top: 1.5rem;">
                <button type="submit"
                    style="padding: 0.5rem 1.5rem; background-color: #dc2626; color: white; border-radius: 0.375rem; border: none; cursor: pointer; font-size: 0.875rem; font-weight: 500; font-family: 'Inter', sans-serif;"
                    onmouseover="this.style.backgroundColor='#b91c1c'"
                    onmouseout="this.style.backgroundColor='#dc2626'">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>