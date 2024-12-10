<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Etapa Productiva</title>
    <style>
       #userMenu {
            top: 100%;
            margin-top: 0.5rem;
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



    </script>
    <div class="w-full flex items-center mt-6">
        <a href="{{ route('administrator.home') }}" class="mr-4 ml-8">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
        <h2 class="text-xl font-serif">Plantilla CONTRATO DE APRENDIZAJE</h2>
    </div>
        {{-- FIN Menu --}}

        <div class="p-5">
            <p class="mt-2">Cantidad de Aprendices de la modalidad CONTRATO DE APRENDIZAJE: <span class="font-bold">3</span></p>
            <table class="w-full border-collapse mt-4">
                <thead>
                    <tr>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">IDENTIFICACIÓN</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">APELLIDO</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">NOMBRE</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">PROGRAMA</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">FICHA</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">TELEFONO</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">CORREO</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">CONTRATO INICIO</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">CONTRATO FIN</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">NIT. EMPRESA</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">RAZON SOCIAL</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">DIRECCIÓN</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">TELEFONO</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">CIUDAD</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">INSTRUCTOR ASIGNADO</th>
                        <th class="border border-gray-300 bg-gray-100 text-green-700 px-4 py-2 text-left">FECHA ASIGNACIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">120548215</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">GOMEZ MANQUILLO</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">YULIANA ANDREA</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">ANÁLISIS Y DESARROLLO DEL SOFTWARE</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">2711891</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">3124578923</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">msjd@mail.com</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">02/03/2024</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">02/09/2024</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">1548</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">seleccionar</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">24 #224-25</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">312458782</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">POPAYÁN-CAUCA</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">Mariani Dorado</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">02/03/2024</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">130657326</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">PEREZ LOPEZ</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">CARLOS ANDRES</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">DISEÑO GRÁFICO</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">2711892</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">3125678934</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">capl@mail.com</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">01/04/2024</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">01/10/2024</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">1547</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">seleccionar</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">34 #124-26</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">313468783</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">POPAYAN-CAUCA</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">Luisa Martinez</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">01/04/2024</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">140766437</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">RAMIREZ DIAZ</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">ANA MARIA</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">ADMINISTRACIÓN EMPRESARIAL</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">2711893</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">3136789045</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">ardm@mail.com</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">15/05/2024</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">15/11/2024</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">1546</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">seleccionar</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">12 #456-78</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">314579896</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">MEDELLÍN-ANTIOQUIA</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">Julio Perez</td>
                        <td class="border border-gray-300 bg-gray-50 px-4 py-2">15/05/2024</td>
                    </tr>
                </tbody>
            </table>
        </div>


<script src="{{ asset('js/Administrator.js') }}"></script>


</body>
</html>
