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
            text-align: center; /* Centrar el texto */
            color: #009e00; /* Color verde */
            margin-top: 5px; /* Espacio superior para alineación */
            font-size: 12px; /* Ajustar el tamaño de fuente */
        }
    </style>
</head>
<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    <header class="bg-white text-[#009e00] px-5 py-2.5 flex flex-col items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0']">
        <div class="flex justify-between w-full">
            <div class="flex items-center">
                <!-- Logo de SENA en el lado izquierdo -->
                <img class="w-[70px] h-[70px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo ">

                <!-- Espaciado entre los dos bloques -->
                <div class="flex-grow m-2"></div>

                <!-- Logo de Etapa Productiva y texto "Centro de Comercio y Servicios" en el lado derecho -->
                <div class="text-left">
                    <!-- Logo de Etapa Seguimiento -->
                    <div class="flex items-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Etapa Seguimiento Logo" class="w-10 h-auto mr-1.5">
                        <div class="flex flex-col text-left">
                            <h2 class="text-[12px] m-0 text-[#009e00]">Etapa</h2>
                            <h2 class="text-[12px] m-0 text-[#009e00]">Productiva</h2>
                        </div>
                    </div>

                    <!-- Texto "Centro de Comercio y Servicios" debajo del logo y el texto de Etapa Productiva -->
                    <h2 class="text-sm mt-2 text-[#009e00]">Centro de Comercio y Servicios</h2>
                </div>
            </div>
            <div class="relative ml-auto flex items-center pt-5">

                <img class="bg-white w-[45px] h-auto rounded-full -ml-8 border-2 border-black" src="{{ asset('img/administrador/mujer.png') }}" alt="User Icon">
                <button id="menuButton" class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-5 h-5 ml-2 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>

                <div id="userMenu" class="hidden absolute right-4 mt-2 w-64 bg-[#D9D9D9] border border-gray-300 rounded-lg shadow-lg z-20">
                    <div class="p-4">
                        <div class="flex items-center mb-4">
                            <div>
                                <p class="text-sm text-black font-bold">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</p>
                           <p class="text-sm mt-2 text-black">Super administrador</p>
                            </div>

                        </div>
                        <ul>
                            <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Perfil') }}" class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-1">Ver perfil</a></li>
                            <li class="mt-2"><a href="{{ route('superadmin.home') }}" class="block text-black hover:bg-white p-2 rounded-lg">Inicio</a></li>
                            <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Configuracion') }}" class="block text-black hover:bg-white p-2 rounded-lg">Configuración</a></li>
                            <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Permisos') }}" class="block text-black hover:bg-white p-2 rounded-lg">Permisos</a></li>
                            <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Administrator') }}" class="block text-black hover:bg-white p-2 rounded-lg">Administradores</a></li>
                            <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Instructor') }}" class="block text-black hover:bg-white p-2 rounded-lg">Instructores</a></li>
                            <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}" class="block text-black hover:bg-white p-2 rounded-lg">Aprendices</a></li>
                            <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Notificaciones')}}" class="block text-black hover:bg-white p-2 rounded-lg">Reportes</a></li>
                            <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Graficas') }}" class="block text-black hover:bg-white p-2 rounded-lg">Gráficas</a></li>
                        </ul>
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-2 w-full">Cerrar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Texto "Super administrador" centrado, justo debajo de la barra de usuario -->

    </header>

    <nav class="bg-[#009e00] px-2.5 py-1.5 flex justify-end items-center h-14 relative z-10">
        <button id="notifButton" class="absolute right-0 mr-4">
            <a href="{{ route('superadmin.SuperAdmin-Notificaciones') }}">
                <img class="w-[50px] h-auto filter invert" src="{{ asset('img/notificaciones.png') }}" alt="Notificaciones">
            </a>
        </button>
        <div class="text-white text-center absolute left-1/2 transform -translate-x-1/2">Inicio</div>

    </nav>

    <div class="flex justify-center">
        <main class="flex flex-col items-center p-4 mt-4 relative">
            <div class="w-full max-w-7xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-2xl font-bold mb-4">Asunto: Asignación de Aprendiz para Seguimiento en modalidad de Contrato de Aprendizaje</h2>

                <p class="mb-4">Estimada Sofía Méndez,</p>

                <p class="mb-4">Me complace informarte que te ha sido asignado un aprendiz para el seguimiento en la modalidad de contrato de aprendizaje. La persona asignada es Yuliana Andrea Gomez Manquillo.</p>

                <p class="mb-4">Yuliana ha mostrado un gran interés en aprender y desarrollarse en el área, y confiamos en que tu experiencia y conocimientos serán de gran valor para su formación. Te agradecemos de antemano por tu disposición para acompañar y guiar a Yuliana durante este proceso.</p>

                <p class="mb-4">Te invito a ponerte en contacto con Yuliana lo antes posible para iniciar el proceso de seguimiento y establecer una comunicación efectiva.</p>

                <p class="mb-4">Si necesitas más información o tienes alguna pregunta, no dudes en comunicarte conmigo.</p>

                <p class="mb-4">Agradecemos tu compromiso y dedicación en esta labor.</p>

                <p class="mb-2">Saludos cordiales,</p>
                <p class="font-bold">Nombre Administrador</p>
                <p>Cargo Administrador</p>
                <div class="flex justify-end mt-6 space-x-4">
                    <a type="submit" href="{{ route('superadmin.SuperAdmin-Aprendiz')}}" class="bg-green-700 hover:bg-green-900 text-white py-2 px-4 rounded">Confirmar</a>
                    <a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded">Cancelar</a>
                </div>
            </div>

        </main>
    </div>
    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>

</html>
