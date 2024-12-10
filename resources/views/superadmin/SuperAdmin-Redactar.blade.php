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

        .user-status {
            text-align: center;
            /* Centrar el texto */
            color: #009e00;
            /* Color verde */
            margin-top: 5px;
            /* Espacio superior para alineación */
            font-size: 12px;
            /* Ajustar el tamaño de fuente */
        }
    </style>
</head>

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
                        class="block text-center text-white px-4 py-2 rounded-lg {{ request()->routeIs('superadmin.SuperAdmin-Instructor') ? 'bg-green-600 bg-opacity-70' : 'bg-green-600 bg-opacity-20 hover:bg-opacity-50' }}">
                        <span class="font-bold">
                            Instructor
                        </span>
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
        <a href="{{ route('superadmin.SuperAdmin-Notificaciones') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <div class="w-auto flex justify-start m-2 pl-56 items-center"></div>
    <div class="flex justify-center">

        <main class="bg-white m-4 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3 items-center">
            <h1 class="text-2xl font-bold mb-4">Reporte</h1>
            <form class="mb-4">
                <input type="text" placeholder="Para" class="border p-2 rounded w-full mb-2">
                <input type="text" placeholder="Título" class="border p-2 rounded w-full mb-2">
                <textarea placeholder="Asunto" class="border p-2 rounded w-full mb-2"></textarea>
                <a href="{{ route('superadmin.SuperAdmin-Notificaciones') }}" type="submit"
                    class="bg-[#009e00] text-white p-2 rounded ml-2">Enviar Reporte</a>
                <a href="{{ route('superadmin.SuperAdmin-Notificaciones') }}" type="submit"
                    class="bg-gray-300 text-black p-2 rounded ml-2">Cancelar</a>
            </form>
    </div>
    </div>
    </main>
    </div>
    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>

</html>
