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
  <header class="bg-white text-[#009e00] px-5 py-2.5 flex flex-col items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0]">

        <div class="flex justify-between w-full">
            <div class="flex items-center">
                <!-- Logo de SENA en el lado izquierdo -->
                <img class="w-[70px] h-[70px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo ">

                <!-- Espaciado entre los dos bloques -->
                <div class="flex-grow m-2"></div>

                <!-- Logo de Etapa Productiva y texto "Centro de Comercio y Servicios" en el lado derecho -->
                <div class="text-left">
                    <!-- Logo de Etapa Seguimiento -->
                    <a href="{{ route('superadmin.home') }}" class="flex items-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Etapa Seguimiento Logo" class="w-10 h-auto mr-1.5">
                        <div class="flex flex-col text-left">
                            <h2 class="text-[12px] m-0 text-[#009e00]">Etapa</h2>
                            <h2 class="text-[12px] m-0 text-[#009e00]">Productiva</h2>
                        </div>
                    </a>

                    <!-- Texto "Centro de Comercio y Servicios" debajo del logo y el texto de Etapa Productiva -->
                    <h2 class="text-sm mt-2 text-[#009e00]">Centro de Comercio y Servicios</h2>
                </div>
            </div>
            <div class="relative flex items-center ml-auto">
                <!-- Contenedor para la imagen y el ícono de los tres puntos -->
                <div class="relative">
                    <!-- Imagen de usuario -->
                    <img class="bg-white w-[45px] h-auto rounded-full border-2 " src="{{ asset('img/administrador/mujer.png') }}" alt="User Icon">

                    <!-- Botón de los tres puntos encima de la imagen -->
                    <button id="menuButton" class="absolute top-1 right-0 bg-transparent p-1 mr-[-46%]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" />
                        </svg>
                    </button>
                </div>
                 {{-- Menu --}}
                 <div id="userMenu" class=" hidden absolute right-4  mt-2 w-64 bg-[#D9D9D9] border border-gray-300 rounded-lg shadow-lg z-20">
                     <div class="p-4">
                         <div class="flex items-center mb-4">
                             <div>
                                 <p class="text-sm font-bold">{{ auth()->user()->name }} {{ auth()->user()->last_name }}</p>
                                 <p class="mt-2 text-sm">Super Administrador</p>
                             </div>


                         </div>
                         <ul>
                             <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Perfil') }}" class="block py-1 font-bold text-center text-green-600 bg-white border border-green-600 rounded-lg hover:text-white hover:bg-green-600">Ver perfil</a></li>

                             <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Configuracion') }}" class="block p-2 text-black rounded-lg hover:bg-white">Configuración</a></li>
                             <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Permisos') }}" class="block p-2 text-black rounded-lg hover:bg-white" onclick="toggleSublist(event)">Permisos</a></li>
                             <li class="mt-2"><a href="{{ route('superadmin.SuperAdmin-Graficas')}}" class="block p-2 text-black rounded-lg hover:bg-white">Graficas</a></li>
                         </ul>
                         <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-4">
                             @csrf
                             <button type="submit" class="block w-full py-2 font-bold text-center text-green-600 bg-white border border-green-600 rounded-lg hover:text-white hover:bg-green-600">Cerrar sesión</button>
                         </form>
                 </div>
             </div>
        </header>
    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-end items-center relative z-10">

    {{-- FIN Barra Azul --}}

        <div class="flex justify-center w-full">
            <ul class="flex items-center justify-center space-x-4 horizontal-list" >
                <li>
                    <a href="{{ route('superadmin.home') }}" class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Administrator') }}"
                    class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                   Administrador

                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Instructor') }}" class="block text-center text-white px-4 py-2 rounded-lg {{ request()->routeIs('superadmin.SuperAdmin-Instructor') ? 'bg-green-600 bg-opacity-70' : 'bg-green-600 bg-opacity-20 hover:bg-opacity-50' }}">
                        <span class="font-bold">
                           Instructor
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}" class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Aprendices
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Graficas') }}" class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                       Graficas
                    </a>
                </li>
                <button id="notifButton" class="absolute right-0 mr-4">
                    <a href="{{ route('superadmin.SuperAdmin-Notificaciones') }}">
                        <img class="w-[50px] h-auto filter invert" src="{{ asset('img/notificaciones.png') }}" alt="Notificaciones">
                    </a>
                </button>
            </ul>
        </div>





    </nav>


    <div class="flex items-center justify-between w-full mt-6">
        <a href="{{route('superadmin.SuperAdmin-Instructor') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>
  <div class="flex justify-center">
    <main class="bg-white m-4 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3 items-center">
        <div class="p-6 bg-gray-100 rounded-lg">
            <div class="mb-6 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40 m-4 mx-auto text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <h1 class="m-0 text-lg font-bold text-black">INSTRUCTOR</h1>
            </div>
            <h3 class="mb-4 font-bold">Datos básicos</h3>
                        <form id="instructorForm">
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Nombre">
                    </div>
                    <div>
                        <label class="block text-gray-700">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Apellido">
                    </div>
                    <div>
                        <label class="block text-gray-700">Cedula</label>
                        <input type="text" name="cedula" id="cedula" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Cedula">
                    </div>
                    <div>
                        <label class="block text-gray-700">Correo</label>
                        <input type="email" name="correo" id="correo" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Correo electrónico">
                    </div>
                    <div>
                        <label class="block text-gray-700">Celular</label>
                        <input type="text" name="celular" id="celular" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Celular">
                    </div>
                    <div>
                        <label class="block text-gray-700">Programa</label>
                        <input type="text" name="programa" id="programa" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Programa">
                    </div>
                    <div>
                        <label class="block text-gray-700">Total de horas</label>
                        <input type="number" name="total_horas" id="total_horas" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Total de horas">
                    </div>
                    <div>
                        <label class="block text-gray-700">Horas realizadas</label>
                        <input type="number" name="horas_realizadas" id="horas_realizadas" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Horas realizadas">
                    </div>
                    <div>
                        <label class="block text-gray-700">Fecha de inicio</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="w-full border border-gray-300 rounded-lg p-2.5">
                    </div>
                    <div>
                        <label class="block text-gray-700">Fecha de fin</label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="w-full border border-gray-300 rounded-lg p-2.5">
                    </div>
                </div>

                <h3 class="mt-6 mb-4 font-bold">Lugar de Residencia</h3>
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700">Pais:</label>
                        <input type="text" name="pais" id="pais" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Pais">
                    </div>
                    <div>
                        <label class="block text-gray-700">Departamento:</label>
                        <input type="text" name="departamento" id="departamento" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Departamento">
                    </div>
                    <div>
                        <label class="block text-gray-700">Municipio:</label>
                        <input type="text" name="municipio" id="municipio" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Municipio">
                    </div>
                    <div>
                        <label class="block text-gray-700">Barrio:</label>
                        <input type="text" name="barrio" id="barrio" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Barrio">
                    </div>
                    <div>
                        <label class="block text-gray-700">Dirección:</label>
                        <input type="text" name="direccion" id="direccion" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Dirección">
                    </div>
                </div>

                <div class="flex justify-end mt-6 space-x-4">
                    <button type="button" onclick="submitForm()" class="px-4 py-2 text-white bg-green-700 rounded hover:bg-green-900">Confirmar</button>
                    {{-- <a href="{{ route('ruta-al-cancelar') }}" class="px-4 py-2 text-gray-700 border border-gray-300 rounded hover:bg-gray-200">Cancelar</a> --}}
                </div>
            </form>

        </div>
    </main>
</div>

    </main>
</div>

   <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function submitForm() {
        const formData = {
            name: document.getElementById('nombre').value,
        };

        axios.post('http://127.0.0.1:8001/api/user_registers', formData, {
            headers: {
                'Content-Type': 'application/json',  
            }
        })
        .then(response => {
            console.log(response.data);
        })
        .catch(error => {
            console.error(error);
        });
    }
</script>


   {{-- cedula: document.getElementById('cedula').value,
            correo: document.getElementById('correo').value,
            celular: document.getElementById('celular').value,
            programa: document.getElementById('programa').value,
            total_horas: document.getElementById('total_horas').value,
            horas_realizadas: document.getElementById('horas_realizadas').value,
            fecha_inicio: document.getElementById('fecha_inicio').value,
            fecha_fin: document.getElementById('fecha_fin').value,
            pais: document.getElementById('pais').value,
            departamento: document.getElementById('departamento').value,
            municipio: document.getElementById('municipio').value,
            barrio: document.getElementById('barrio').value,
            direccion: document.getElementById('direccion').value --}}

</body>

</html>
