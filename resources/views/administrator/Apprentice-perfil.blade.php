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
            width: 54px; /* tamaño de la imagen */
            height: auto; /* Mantiene la proporción de la imagen */
            filter: invert(1); /* Invierte los colores de la imagen */
        }
        .Flecha {
            display: block;
            position: absolute;
            width: 24px; /* tamaño de la imagen */
            height: auto; /* Mantiene la proporción de la imagen */
            margin-left: 10px; /* lados */
            margin-top: 40px; /* altura */
        }
        .text-ventana {
            color: #ffffff; /* Color del texto para que contraste con el fondo */
            font-size: 20px; /* Tamaño del texto para que sea visible */
            position: absolute;
            font-family: 'DM Sans', sans-serif;
            left: 50%; /* Ajusta la posición horizontal según sea necesario */
            transform: translateX(-50%); /* Centra el texto horizontalmente */
            top: 85px; /* Ajusta la posición vertical según sea necesario */
            z-index: 1000; /* Asegúrate de que esté por encima de otros elementos */
        }
        .Linea-Tiempo {
            display: block;
        }
    </style>
</head>
{{-- Barra Azul --}}
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
                      <a href="{{ route('administrator.home') }}" class="flex items-center">
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
              <div class="relative ml-auto flex items-center">
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
                                 <p class="text-sm mt-2">Administrador</p>
                             </div>


                         </div>
                         <ul>
                             <li class="mt-2"><a href="{{ route('administrator.Administrator-perfil') }}" class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-1">Ver perfil</a></li>

                             <li class="mt-2"><a href="{{ route('administrator.settings') }}" class="block text-black hover:bg-white p-2 rounded-lg">Configuración</a></li>


                             <li class="mt-2"><a href="{{ route('administrator.template') }}" class="block text-black hover:bg-white p-2 rounded-lg" onclick="toggleSublist(event)">Plantillas</a>
                                 <ul class="hidden ml-4 mt-2 bg-[#EEEEEE] p-2 rounded-lg">
                                     <li class="mt-2 font-bold text-black border-b border-gray-300 pb-2">MODALIDAD</li>
                                     <li class="mt-2"><a href="{{ route('administrator.template')}}"class="block text-black hover:bg-white p-2 rounded-lg">Pasantía</a></li>
                                     <a href="javascript:void(0);" class="block text-black hover:bg-white p-2 rounded-lg" onclick="toggleSublist(event)">Contrato de Aprendizaje</a>
                                     <ul class="hidden ml-4 mt-2 bg-[#D9D9D9] p-2 rounded-lg w-[250px]">
                                         <li class="mt-2">
                                             <a href="{{ route('administrator.template') }}" class="block text-black hover:bg-white p-2 rounded-lg">Ver Plantilla</a>
                                         </li>
                                         <ul>
                                             <li class="mt-2">
                                                 <button id="uploadButton" class="block text-black hover:bg-white p-2 rounded-lg">+ Añadir Plantilla</button>
                                                 <input type="file" id="fileUpload" class="hidden" name="fileUpload" accept=".txt,.doc" />
                                             </li>
                                         </ul>
                                     </ul>
                                 </li>
                                     <li class="mt-2"><a href="{{ route('administrator.template')}}" class="block text-black hover:bg-white p-2 rounded-lg">Vinculo Laboral</a></li>
                                     <li><a href="{{ route('administrator.template')}}" class="block text-black hover:bg-white p-2 rounded-lg">Unidad Productiva Familiar</a></li>
                                     <li><a href="{{ route('administrator.template')}}" class="block text-black hover:bg-white p-2 rounded-lg">Proyecto Productivo Empresarial</a></li>
                                 </ul></li>
                             <li class="mt-2"><a href="{{ route('administrator.graphic')}}" class="block text-black hover:bg-white p-2 rounded-lg">Graficas</a></li>
                             <a href="javascript:void(0);" class="block text-black hover:bg-white p-2 rounded-lg" onclick="toggleSublist(event)">Registrar </a>
          <ul class="hidden ml-4 mt-2 bg-[#D9D9D9] p-2 rounded-lg w-[250px]">
              <li class="mt-2">
                  <a href="{{ route('register') }}" class="block text-black hover:bg-white p-2 rounded-lg">Instructor</a>
              </li>
                  <li class="mt-2">
                      <a href="{{ route('register') }}" class="block text-black hover:bg-white p-2 rounded-lg">Aprendiz</a>
                  </li>
              </ul>

      </li>

                         </ul>
                         <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-4">
                             @csrf
                             <button type="submit" class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-2 w-full">Cerrar sesión</button>
                         </form>
                 </div>
             </div>
        </header>
          <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex items-center relative z-10">
            <!-- Contenido centrado de la barra de navegación -->
            <div class="w-full flex justify-center">
                <ul class="horizontal-list flex space-x-4 justify-center">
                    <li>
                        <a href="{{ route('administrator.home') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                            Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('administrator.apprentice') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                            Aprendices
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('administrator.instructor') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                            Instructores
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('administrator.graphic') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                            Gráficas
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Botón de notificaciones alineado a la derecha -->
            <button id="notifButton" class="absolute right-0 mr-4">
                <a href="{{ route('administrator.notificaciones') }}">
                    <img class="w-[50px] h-auto filter invert" src="{{ asset('img/notificaciones.png') }}" alt="Notificaciones">
                </a>
            </button>
        </nav>

      <div class="w-full flex justify-between items-center mt-6">
        <a href="{{ route('administrator.apprentice') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>
        {{-- FIN Menu --}}


    <div class="flex justify-center mt-6">
        <main class="bg-gray-100 m-2 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <div class="bg-gray-100 p-6 rounded-lg">
                <div class="flex justify-center items-center">
                    <img src="{{ asset('img/administrador/aprendiz_icono.png') }}" alt="User" class="w-40 h-40 mb-">
                </div>

                <div class="text-center mb-6">
                    <h1 class="text-lg m-0 text-black font-bold">APRENDIZ</h1>
                </div>

                <h3 class="font-bold mb-4 mt-6">Información Modalidad</h4>
                <div class="space-y-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tipo de Modalidad:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md border border-gray-300">{{ auth()->user()->modality }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha Inicio:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md border border-gray-300">{{ auth()->user()->modality }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha Final:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md border border-gray-300">{{ auth()->user()->modality }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Proceso:</label>
                         <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md border border-gray-300">{{ auth()->user()->modality }}</p>
                     </div>
                     <img class="Linea-Tiempo" src="{{ asset('administrator/linea-tiempo.png') }}" alt="linea-tiempo">
                </div>

                <h3 class="font-bold mb-4 mt-6">Datos básicos</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombres:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md border border-gray-300">{{ auth()->user()->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apellidos:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md border border-gray-300">{{ auth()->user()->last_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Correo electrónico:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md border border-gray-300">{{ auth()->user()->email }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cuenta  SENA:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md border border-gray-300">{{ auth()->user()->sena_account }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Departamento:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md border border-gray-300">{{ auth()->user()->department }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Municipio:</label>
                        <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md border border-gray-300">{{ auth()->user()->municipality }}</p>
                    </div>
                    <label class="block text-sm font-medium text-gray-700">Nivel academico:</label>
                    <p class="text-sm text-black bg-white mt-1 w-full h-7 p-1 rounded-md border border-gray-300">{{ auth()->user()->municipality }}</p>
                </div>






                <div class="flex justify-end mt-6 space-x-4">
                    <a href="{{ route('administrator.home') }}" class="bg-[#009e00] hover:bg-[#37a837] text-white py-2 px-4 rounded">Actualizar</a>
                    <a href="{{ route('administrator.apprentice') }}" class="bg-gray-300 hover:bg-gray-400 text-black py-2 px-4 rounded">Cancelar</a>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>
</html>
