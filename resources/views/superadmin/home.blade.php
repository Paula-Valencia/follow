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
                    <a href="{{ route('graficos.index') }}"
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

    <main class="flex-nowrap p-10 flex justify-center items-center bg-white">
        <div
            class="grid grid-cols-4 gap-20 bg-[#f0f0f0] border-2 border-[#2F3E4C] p-[72px] rounded-[20px] max-w-[100%] mx-auto shadow-[0_0_10px_rgba(0,0,0,0.8)]">
            <a href="{{ route('superadmin.SuperAdmin-Administrator') }}"
                class=" m-2.5 py-4 rounded-[15%] flex flex-col items-center text-center bg-white border-[3px] border-black w-56 h-56 hover:border-green-600">
                <img src="{{ asset('SuperAdmin/administrador.png') }}" alt="Administradores"
                    class="w-[200px] h-[165px]  ">
                <span class="text-sm ">Administradores</span>
            </a>

            <a href="{{ route('superadmin.SuperAdmin-Instructor') }}"
                class="m-2.5 py-4 rounded-[15%] flex flex-col items-center text-center p-5 bg-white border-[3px] border-black w-56 h-56 hover:border-green-600">
                <img src="{{ asset('img/administrador/instructor.png') }}" alt="Instructores"
                    class="w-[160px] h-[150px] mb-0">
                <span class="text-sm p-2">Instructores</span>
            </a>

            <!-- Botón de Aprendices -->

            <a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}"
                class="m-2.5 py-4 rounded-[15%] flex flex-col items-center text-center p-5 bg-white border-[3px] border-black w-56 h-56 hover:border-green-600">
                <img src="{{ asset('img/administrador/aprendiz.png') }}" alt="Aprendices"
                    class="w-[130px] h-[120px] mb-0">
                <span class="text-sm p-4">Aprendices</span>
            </a>

            <a href="{{ route('graficos.index') }}"
                class="m-2.5 rounded-[15%] flex flex-col items-center text-center py-10 p-5 bg-white border-[3px] border-black w-56 h-56 hover:border-green-600">
                <img src="{{ asset('img/administrador/graficas.png') }}" alt="Graficas"
                    class="w-[120px] h-[110px] mb-2.5">
                <span class="text-sm p-4">Graficas</span>
            </a>
        </div>
    </main>
    
</body>

</html>
