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


        {{-- FIN Menu --}}


        <div class="flex justify-center">
            <main class="flex flex-col items-center mt-4 relative">
                <div class="w-full max-w-7xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Identificación</th>
                                    <th class="py-3 px-6 text-left">Nombre</th>
                                    <th class="py-3 px-6 text-left">Apellido</th>
                                    <th class="py-3 px-6 text-left">Programa</th>
                                    <th class="py-3 px-6 text-left">Nivel Academico</th>
                                    <th class="py-3 px-6 text-left">Ficha</th>
                                    <th class="py-3 px-6 text-left">Teléfono</th>
                                    <th class="py-3 px-6 text-left">Correo</th>
                                    <th class="py-3 px-6 text-left">Tipo de Contrato</th>
                                    <th class="py-3 px-6 text-left">Inicio Contrato</th>
                                    <th class="py-3 px-6 text-left">Fin Contrato</th>
                                    <th class="py-3 px-6 text-left">NIT Empresa</th>
                                    <th class="py-3 px-6 text-left">Razón Social</th>
                                    <th class="py-3 px-6 text-left">Dirección</th>
                                    <th class="py-3 px-6 text-left">Teléfono Empresa</th>
                                    <th class="py-3 px-6 text-left">Nombre Instructor</th>
                                    <th class="py-3 px-6 text-left">Correo Instructor</th>
                                    <th class="py-3 px-6 text-left">Editar</th>
                                    <th class="py-3 px-6 text-left">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                <tr class="border-b border-gray-300">
                                    <td class="py-3 px-6 text-left">123456</td>
                                    <td class="py-3 px-6 text-left">Nombre1</td>
                                    <td class="py-3 px-6 text-left">Apellido1</td>
                                    <td class="py-3 px-6 text-left">
                                        <span>GESTION ADMINISTRATIVA DEL SECTOR SALUD</span>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <span>Tecnólogo</span>
                                    </td>

                                    </td>
                                    <td class="py-3 px-6 text-left">Ficha1</td>
                                    <td class="py-3 px-6 text-left">555-1234</td>
                                    <td class="py-3 px-6 text-left">correo1@example.com</td>
                                    <td class="py-3 px-6 text-left"><select class="border border-gray-400 p-2 rounded-md w-48 bg-white">
                                        <option selected="">Selecciona Opción</option>
                                        <option value="Contrato de Aprendizaje">Contrato de Aprendizaje</option>
                                        <option value="Pasantia">Pasantia</option>
                                        <option value="Vinculo laboral">Vinculo laboral</option>
                                        <option value="Patrocinio">Patrocinio</option>
                                        <option value="Unidad Productiva">Unidad Productiva</option>
                                        <option value="Proyecto Productivo">Proyecto Productivo</option>
                                    </select></td>
                                    <td class="py-3 px-6 text-left">01/01/2022</td>
                                    <td class="py-3 px-6 text-left">01/01/2023</td>
                                    <td class="py-3 px-6 text-left">987654</td>
                                    <td class="py-3 px-6 text-left">Empresa1</td>
                                    <td class="py-3 px-6 text-left">Calle 123</td>
                                    <td class="py-3 px-6 text-left">555-5678</td>
                                    <td class="py-3 px-6 text-left">Representante1</td>
                                    <td class="py-3 px-6 text-left">representante1@example.com</td>

                                    <td class="py-3 px-6 text-left"><a href="#" class="text-blue-600 hover:underline">Editar</a></td>
                                    <td class="py-3 px-6 text-left"><a href="#" class="text-red-600 hover:underline">Eliminar</a></td>

                                </tr>
                                <tbody class="text-gray-600 text-sm font-light">
                                    <tr class="border-b border-gray-300">
                                        <td class="py-3 px-6 text-left">123456</td>
                                        <td class="py-3 px-6 text-left">Nombre1</td>
                                        <td class="py-3 px-6 text-left">Apellido1</td>
                                        <td class="py-3 px-6 text-left">
                                            <span>GESTION ADMINISTRATIVA DEL SECTOR SALUD</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>Tecnólogo</span>
                                        </td>

                                        </td>
                                        <td class="py-3 px-6 text-left">Ficha1</td>
                                        <td class="py-3 px-6 text-left">555-1234</td>
                                        <td class="py-3 px-6 text-left">correo1@example.com</td>
                                        <td class="py-3 px-6 text-left"><select class="border border-gray-400 p-2 rounded-md w-48 bg-white">
                                            <option selected="">Selecciona Opción</option>
                                            <option value="Contrato de Aprendizaje">Contrato de Aprendizaje</option>
                                            <option value="Pasantia">Pasantia</option>
                                            <option value="Vinculo laboral">Vinculo laboral</option>
                                            <option value="Patrocinio">Patrocinio</option>
                                            <option value="Unidad Productiva">Unidad Productiva</option>
                                            <option value="Proyecto Productivo">Proyecto Productivo</option>
                                        </select></td>
                                        <td class="py-3 px-6 text-left">01/01/2022</td>
                                        <td class="py-3 px-6 text-left">01/01/2023</td>
                                        <td class="py-3 px-6 text-left">987654</td>
                                        <td class="py-3 px-6 text-left">Empresa1</td>
                                        <td class="py-3 px-6 text-left">Calle 123</td>
                                        <td class="py-3 px-6 text-left">555-5678</td>
                                        <td class="py-3 px-6 text-left">Representante1</td>
                                        <td class="py-3 px-6 text-left">representante1@example.com</td>

                                        <td class="py-3 px-6 text-left"><a href="#" class="text-blue-600 hover:underline">Editar</a></td>
                                        <td class="py-3 px-6 text-left"><a href="#" class="text-red-600 hover:underline">Eliminar</a></td>

                                    </tr>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        <tr class="border-b border-gray-300">
                                            <td class="py-3 px-6 text-left">123456</td>
                                            <td class="py-3 px-6 text-left">Nombre1</td>
                                            <td class="py-3 px-6 text-left">Apellido1</td>
                                            <td class="py-3 px-6 text-left">
                                                <span>GESTION ADMINISTRATIVA DEL SECTOR SALUD</span>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <span>Tecnólogo</span>
                                            </td>

                                            </td>
                                            <td class="py-3 px-6 text-left">Ficha1</td>
                                            <td class="py-3 px-6 text-left">555-1234</td>
                                            <td class="py-3 px-6 text-left">correo1@example.com</td>
                                            <td class="py-3 px-6 text-left"><select class="border border-gray-400 p-2 rounded-md w-48 bg-white">
                                                <option selected="">Selecciona Opción</option>
                                                <option value="Contrato de Aprendizaje">Contrato de Aprendizaje</option>
                                                <option value="Pasantia">Pasantia</option>
                                                <option value="Vinculo laboral">Vinculo laboral</option>
                                                <option value="Patrocinio">Patrocinio</option>
                                                <option value="Unidad Productiva">Unidad Productiva</option>
                                                <option value="Proyecto Productivo">Proyecto Productivo</option>
                                            </select></td>
                                            <td class="py-3 px-6 text-left">01/01/2022</td>
                                            <td class="py-3 px-6 text-left">01/01/2023</td>
                                            <td class="py-3 px-6 text-left">987654</td>
                                            <td class="py-3 px-6 text-left">Empresa1</td>
                                            <td class="py-3 px-6 text-left">Calle 123</td>
                                            <td class="py-3 px-6 text-left">555-5678</td>
                                            <td class="py-3 px-6 text-left">Representante1</td>
                                            <td class="py-3 px-6 text-left">representante1@example.com</td>

                                            <td class="py-3 px-6 text-left"><a href="#" class="text-blue-600 hover:underline">Editar</a></td>
                                            <td class="py-3 px-6 text-left"><a href="#" class="text-red-600 hover:underline">Eliminar</a></td>

                                        </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full max-w-7xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="flex justify-center">
                            <a href="/ruta/a/tu/plantilla.xlsx" download>
                                <button class="w-1/3 p-2 rounded-full flex items-center justify-center bg-blue-500 text-white hover:bg-blue-700">
                                    <!-- Icono de descarga de Font Awesome -->
                                    <i class="fas fa-download text-3xl"></i>
                                </button>
                    <div class="flex justify-end mt-6 space-x-4">
                        <a type="submit" href="{{ route('administrator.apprentice')}}" class="bg-green-700 hover:bg-green-900 text-white py-2 px-4 rounded">Confirmar</a>
                        <a href="{{ route('administrator.apprentice') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded">Cancelar</a>
                    </div>
                </div>
            </main>
        </div>

        <script src="{{ asset('js/SuperAdmin.js') }}"></script>
    </body>

    </html>
