<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white dark:bg-[#161615] rounded-lg shadow-lg p-6 sm:p-8">
                <h1 class="text-2xl sm:text-3xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">
                    Bienvenido al Dashboard
                </h1>
                <p class="text-[#706f6c] dark:text-[#A1A09A] mb-6">
                    Has iniciado sesión correctamente.
                </p>
                <div id="userInfo" class="mb-6 p-4 bg-[#FDFDFC] dark:bg-[#0a0a0a] rounded-lg">
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">
                        Cargando información del usuario...
                    </p>
                </div>
                <button
                    onclick="logout()"
                    class="px-4 py-2 bg-[#f53003] dark:bg-[#FF4433] text-white rounded-lg hover:opacity-90 transition-opacity"
                >
                    Cerrar Sesión
                </button>
            </div>
        </div>
    </div>

    <script>
        // Mostrar información del usuario
        const user = localStorage.getItem('user');
        if (user) {
            const userData = JSON.parse(user);
            document.getElementById('userInfo').innerHTML = `
                <p class="font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">Usuario:</p>
                <p class="text-[#706f6c] dark:text-[#A1A09A]">Nombre: ${userData.name || 'N/A'}</p>
                <p class="text-[#706f6c] dark:text-[#A1A09A]">Email: ${userData.email || 'N/A'}</p>
            `;
        }

        // Función de logout
        async function logout() {
            const token = localStorage.getItem('auth_token');
            
            try {
                const response = await fetch('/api/logout', {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });

                // Limpiar localStorage y redirigir
                localStorage.removeItem('auth_token');
                localStorage.removeItem('user');
                window.location.href = '/login';
            } catch (error) {
                // Aun así redirigir
                localStorage.removeItem('auth_token');
                localStorage.removeItem('user');
                window.location.href = '/login';
            }
        }
    </script>
</body>
</html>

