<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="grid gap-4">
                <!-- Email Address -->
                <div class="space-y-2">
                    <x-form.label for="email" :value="__('Email')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input withicon id="email" class="block w-full dark:text-gray-300" type="email" name="email"
                            :value="old('email')" placeholder="{{ __('Email') }}" required autofocus />
                    </x-form.input-with-icon-wrapper>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <x-form.label for="password" :value="__('Password')" />

                    <x-form.input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="false" class="w-5 h-5" />
                        </x-slot>

                        <x-form.input withicon id="password" class="block w-full dark:text-gray-300" type="password" name="password"
                            required autocomplete="current-password" placeholder="{{ __('Password') }}" />

                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <x-heroicon-o-eye aria-hidden="true" class="w-5 h-5" id="eye-icon" />
                        </button>
                    </x-form.input-with-icon-wrapper>

                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="text-gray-500 border-gray-300 rounded focus:border-gray-300 focus:ring focus:ring-gray-500 dark:border-gray-600 dark:bg-dark-eval-1 dark:focus:ring-offset-dark-eval-1"
                            name="remember">

                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Remember me') }}
                        </span>
                    </label>

                    <!-- @if (Route::has('password.request'))
                        <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif -->
                </div>

                <!-- Log in -->

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400"
                            href="{{ route('password.request') }}" style="text-decoration: none;">
                            <p class=" hover:text-gray-700">
                            {{ __('Forgot your password?') }}
                            </p>
                        </a>
                        <a class="underline text-sm text-gray-600 dark:text-gray-400"
                            href="{{ route('register') }}" style="text-decoration: none;">
                            <p class=" hover:text-gray-700">
                            {{ __('Criar Conta') }}
                            </p>
                        </a>
                    @endif

                    <x-button class="justify-center gap-2">
                        <x-heroicon-o-login class="w-6 h-6 dark:text-gray-300" aria-hidden="true" />

                        <span class="dark:text-gray-300">{{ __('Log in') }}</span>
                    </x-button>
                </div>
            
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>


<style>
    .password-container {
        position: relative;
        width: 100%;
    }

    .password-container-input {
        padding-right: 2.5rem;
        /* Espaço para o ícone */
    }

    .password-container-i {
        position: absolute;
        top: 50%;
        right: 0.75rem;
        transform: translateY(30%);
        cursor: pointer;
    }
</style>

<script>
    document.getElementById('togglePassword').addEventListener('click', function (e) {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>