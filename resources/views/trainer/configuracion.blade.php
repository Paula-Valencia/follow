<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Etapa Seguimiento</title>
    <style>
        #userMenuTri {
            top: 100%;
            margin-top: 0.5rem;
        }

        .section-header {
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 2px solid #009e00;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
        }

        .settings-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    
    @include('partials.header')
    @include('partials.nav-trainner')

    <div class="w-full flex justify-between items-center mt-6">
        <a href="{{ route('icon') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>


    <div class="flex justify-center">
        <main class="bg-white m-4 p-6 rounded-lg shadow-lg border border-[#e0e0e0] w-2/3">
            <h1 class="section-header">Configuración</h1>

            <!-- Sección de Cambio de Contraseña -->
            <div class="settings-card">
                <h2 class="text-lg font-bold mb-4">Cambio de Contraseña</h2>
                <form action="#" method="#">
                    @csrf
                    <div class="mb-4">
                        <label for="currentPassword" class="block text-sm font-medium text-gray-700">Contraseña
                            Actual</label>
                        <input type="password" id="currentPassword" name="currentPassword"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-green-500 sm:text-sm"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="newPassword" class="block text-sm font-medium text-gray-700">Nueva
                            Contraseña</label>
                        <input type="password" id="newPassword" name="newPassword"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-green-500 sm:text-sm"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirmar Nueva
                            Contraseña</label>
                        <input type="password" id="confirmPassword" name="confirmPassword"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-green-500 sm:text-sm"
                            required>
                    </div>
                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Actualizar
                        Contraseña</button>
                </form>
            </div>


        </main>
    </div>

    <script src="{{ asset('js/Trainer.js') }}"></script>
</body>

</html>
