@extends('layouts.auth')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="bg-white dark:bg-[#161615] rounded-lg shadow-lg p-6 sm:p-8">
        <!-- Logo/Header -->
        <div class="text-center mb-8">
            <h1 class="text-2xl sm:text-3xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                Bienvenido de nuevo
            </h1>
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                Inicia sesión en tu cuenta
            </p>
        </div>

        <!-- Formulario de Login -->
        <form id="loginForm" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                    Correo electrónico
                </label>
                <input type="email" id="email" name="email" required autocomplete="email"
                    class="w-full px-4 py-3 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] placeholder-[#706f6c] dark:placeholder-[#A1A09A] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent transition-all"
                    placeholder="tu@email.com">
                <p class="mt-1 text-xs text-[#f53003] dark:text-[#FF4433] hidden" id="email-error"></p>
            </div>

            <!-- Contraseña -->
            <div>
                <label for="password" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                    Contraseña
                </label>
                <div class="relative">
                    <input type="password" id="password" name="password" required autocomplete="current-password"
                        class="w-full px-4 py-3 rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] placeholder-[#706f6c] dark:placeholder-[#A1A09A] focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:border-transparent transition-all pr-10"
                        placeholder="••••••••">
                    <button type="button" id="togglePassword"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="eyeIcon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        <svg class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            id="eyeOffIcon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                            </path>
                        </svg>
                    </button>
                </div>
                <p class="mt-1 text-xs text-[#f53003] dark:text-[#FF4433] hidden" id="password-error"></p>
            </div>

            <!-- Mensaje de error general -->
            <div id="errorMessage"
                class="hidden p-3 rounded-lg bg-[#fff2f2] dark:bg-[#1D0002] border border-[#f53003] dark:border-[#FF4433]">
                <p class="text-sm text-[#f53003] dark:text-[#FF4433]"></p>
            </div>

            <!-- Botón de submit -->
            <button type="submit" id="submitButton"
                class="w-full py-3 px-4 bg-[#1b1b18] dark:bg-[#EDEDEC] text-white dark:text-[#1b1b18] font-medium rounded-lg hover:bg-black dark:hover:bg-white transition-colors focus:outline-none focus:ring-2 focus:ring-[#f53003] dark:focus:ring-[#FF4433] focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed">
                <span id="submitText">Iniciar sesión</span>
                <span id="submitLoading" class="hidden">
                    <svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                </span>
            </button>
        </form>

        <!-- Enlace a registro -->
        <div class="mt-6 text-center">
            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                ¿No tienes una cuenta?
                <a href="{{ route('register') }}" class="font-medium text-[#f53003] dark:text-[#FF4433] hover:underline">
                    Regístrate
                </a>
            </p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeOffIcon = document.getElementById('eyeOffIcon');
            const submitButton = document.getElementById('submitButton');
            const submitText = document.getElementById('submitText');
            const submitLoading = document.getElementById('submitLoading');
            const errorMessage = document.getElementById('errorMessage');

            // Toggle password visibility
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                eyeIcon.classList.toggle('hidden');
                eyeOffIcon.classList.toggle('hidden');
            });

            // Handle form submission
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Reset errors
                errorMessage.classList.add('hidden');
                document.getElementById('email-error').classList.add('hidden');
                document.getElementById('password-error').classList.add('hidden');

                // Show loading state
                submitButton.disabled = true;
                submitText.classList.add('hidden');
                submitLoading.classList.remove('hidden');

                try {
                    const response = await fetch('/api/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .content,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            email: document.getElementById('email').value,
                            password: document.getElementById('password').value
                        })
                    });

                    const data = await response.json();

                    if (response.ok && data.status) {
                        // Guardar token en localStorage
                        if (data.data && data.data.token) {
                            localStorage.setItem('auth_token', data.data.token);
                            localStorage.setItem('user', JSON.stringify(data.data.user));
                        }

                        // Redirigir al dashboard o página principal
                        window.location.href = '/dashboard';
                    } else {
                        // Mostrar error
                        const errorText = data.message || 'Credenciales incorrectas';
                        errorMessage.querySelector('p').textContent = errorText;
                        errorMessage.classList.remove('hidden');

                        // Mostrar errores de validación si existen
                        if (data.errors) {
                            if (data.errors.email) {
                                const emailError = document.getElementById('email-error');
                                emailError.textContent = data.errors.email[0];
                                emailError.classList.remove('hidden');
                            }
                            if (data.errors.password) {
                                const passwordError = document.getElementById('password-error');
                                passwordError.textContent = data.errors.password[0];
                                passwordError.classList.remove('hidden');
                            }
                        }
                    }
                } catch (error) {
                    errorMessage.querySelector('p').textContent =
                        'Error de conexión. Por favor, intenta de nuevo.';
                    errorMessage.classList.remove('hidden');
                } finally {
                    // Reset loading state
                    submitButton.disabled = false;
                    submitText.classList.remove('hidden');
                    submitLoading.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
