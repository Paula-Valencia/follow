<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Etapa Productiva</title>
    <style>
        #userMenu {
            top: 100%;
            margin-top: 0.5rem;
        }


        .notifications {
            display: block;
            width: 54px;
            /* tamaño de la imagen */
            height: auto;
            /* Mantiene la proporción de la imagen */
            filter: invert(1);
            /* Invierte los colores de la imagen */
        }

        .Flecha {
            display: block;
            position: absolute;
            width: 24px;
            /* tamaño de la imagen */
            height: auto;
            /* Mantiene la proporción de la imagen */
            margin-left: 10px;
            /* lados */
            margin-top: 40px;
            /* altura */
        }

        .text-ventana {
            color: #ffffff;
            /* Color del texto para que contraste con el fondo */
            font-size: 20px;
            /* Tamaño del texto para que sea visible */
            position: absolute;
            font-family: 'DM Sans', sans-serif;
            left: 50%;
            /* Ajusta la posición horizontal según sea necesario */
            transform: translateX(-50%);
            /* Centra el texto horizontalmente */
            top: 85px;
            /* Ajusta la posición vertical según sea necesario */
            z-index: 1000;
            /* Asegúrate de que esté por encima de otros elementos */
        }

        .Linea-Tiempo {
            display: block;
        }
    </style>
</head>
{{-- Barra Azul --}}

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-end items-center relative z-10">

        {{-- FIN Barra Azul --}}

        <div class="w-full flex justify-center">
            <ul class="horizontal-list flex space-x-4 justify-center items-center">
                <li>
                    <a href="{{ route('superadmin.home') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Administrator') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Administrador

                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Instructor') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Instructor

                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Aprendices
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Graficas') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Graficas
                    </a>
                </li>
                <button id="notifButton" class="absolute right-0 mr-4">
                    <a href="{{ route('superadmin.SuperAdmin-Notificaciones') }}">
                        <img class="w-[50px] h-auto filter invert" src="{{ asset('img/notificaciones.png') }}"
                            alt="Notificaciones">
                    </a>
                </button>
            </ul>
        </div>

    </nav>

    <div class="w-full flex justify-between items-center mt-6">
        <a href="{{ route('superadmin.home') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <div class="flex justify-center">
        <main class="bg-white m-4 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3 items-center">
            <h2 class="text-2xl font-bold mb-4">Gestión de Permisos</h2>

            <div class="table-container mb-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Permiso</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Permiso 1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Asignado</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-indigo-600 hover:text-indigo-900">Revocar</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Permiso 2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No Asignado</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-indigo-600 hover:text-indigo-900">Asignar</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Permiso 3</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No Asignado</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-indigo-600 hover:text-indigo-900">Asignar</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Permiso 4</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No Asignado</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-indigo-600 hover:text-indigo-900">Asignar</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Permiso 5</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No Asignado</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-indigo-600 hover:text-indigo-900">Asignar</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Permiso 6</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No Asignado</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-indigo-600 hover:text-indigo-900">Asignar</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>

</html>
