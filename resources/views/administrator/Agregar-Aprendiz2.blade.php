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
    <header
        class="bg-white text-[#009e00] px-5 py-2.5 flex flex-col items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0]">

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
                    <img class="bg-white w-[45px] h-auto rounded-full border-2 "
                        src="{{ asset('img/administrador/mujer.png') }}" alt="User Icon">

                    <!-- Botón de los tres puntos encima de la imagen -->
                    <button id="menuButton" class="absolute top-1 right-0 bg-transparent p-1 mr-[-46%]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="black" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.75a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm0 5.25a1.5 1.5 0 110-3 1.5 1.5 0 010 3z" />
                        </svg>
                    </button>
                </div>
                {{-- Menu --}}
                <div id="userMenu"
                    class=" hidden absolute right-4  mt-2 w-64 bg-[#D9D9D9] border border-gray-300 rounded-lg shadow-lg z-20">
                    <div class="p-4">
                        <div class="flex items-center mb-4">
                            <div>
                                <p class="text-sm font-bold">{{ auth()->user()->name }} {{ auth()->user()->last_name }}
                                </p>
                                <p class="text-sm mt-2">Administrador</p>
                            </div>


                        </div>
                        <ul>
                            <li class="mt-2"><a href="{{ route('administrator.Administrator-perfil') }}"
                                    class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-1">Ver
                                    perfil</a></li>

                            <li class="mt-2"><a href="{{ route('administrator.settings') }}"
                                    class="block text-black hover:bg-white p-2 rounded-lg">Configuración</a></li>


                            <li class="mt-2"><a href="{{ route('administrator.template') }}"
                                    class="block text-black hover:bg-white p-2 rounded-lg"
                                    onclick="toggleSublist(event)">Plantillas</a>
                                <ul class="hidden ml-4 mt-2 bg-[#EEEEEE] p-2 rounded-lg">
                                    <li class="mt-2 font-bold text-black border-b border-gray-300 pb-2">MODALIDAD</li>
                                    <li class="mt-2"><a
                                            href="{{ route('administrator.template') }}"class="block text-black hover:bg-white p-2 rounded-lg">Pasantía</a>
                                    </li>
                                    <a href="javascript:void(0);" class="block text-black hover:bg-white p-2 rounded-lg"
                                        onclick="toggleSublist(event)">Contrato de Aprendizaje</a>
                                    <ul class="hidden ml-4 mt-2 bg-[#D9D9D9] p-2 rounded-lg w-[250px]">
                                        <li class="mt-2">
                                            <a href="{{ route('administrator.template') }}"
                                                class="block text-black hover:bg-white p-2 rounded-lg">Ver Plantilla</a>
                                        </li>
                                        <ul>
                                            <li class="mt-2">
                                                <button id="uploadButton"
                                                    class="block text-black hover:bg-white p-2 rounded-lg">+ Añadir
                                                    Plantilla</button>
                                                <input type="file" id="fileUpload" class="hidden" name="fileUpload"
                                                    accept=".txt,.doc" />
                                            </li>
                                        </ul>
                                    </ul>
                            </li>
                            <li class="mt-2"><a href="{{ route('administrator.template') }}"
                                    class="block text-black hover:bg-white p-2 rounded-lg">Vinculo Laboral</a></li>
                            <li><a href="{{ route('administrator.template') }}"
                                    class="block text-black hover:bg-white p-2 rounded-lg">Unidad Productiva
                                    Familiar</a></li>
                            <li><a href="{{ route('administrator.template') }}"
                                    class="block text-black hover:bg-white p-2 rounded-lg">Proyecto Productivo
                                    Empresarial</a></li>
                        </ul>
                        </li>
                        <li class="mt-2"><a href="{{ route('administrator.graphic') }}"
                                class="block text-black hover:bg-white p-2 rounded-lg">Graficas</a></li>
                        <a href="javascript:void(0);" class="block text-black hover:bg-white p-2 rounded-lg"
                            onclick="toggleSublist(event)">Registrar </a>
                        <ul class="hidden ml-4 mt-2 bg-[#D9D9D9] p-2 rounded-lg w-[250px]">
                            <li class="mt-2">
                                <a href="{{ route('register') }}"
                                    class="block text-black hover:bg-white p-2 rounded-lg">Instructor</a>
                            </li>
                            <li class="mt-2">
                                <a href="{{ route('register') }}"
                                    class="block text-black hover:bg-white p-2 rounded-lg">Aprendiz</a>
                            </li>
                        </ul>

                        </li>

                        </ul>
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit"
                                class="block text-center text-green-600 font-bold bg-white border hover:text-white hover:bg-green-600 border-green-600 rounded-lg py-2 w-full">Cerrar
                                sesión</button>
                        </form>
                    </div>
                </div>
    </header>
    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex items-center relative z-10">
        <!-- Contenido centrado de la barra de navegación -->
        <div class="w-full flex justify-center">
            <ul class="horizontal-list flex space-x-4 justify-center">
                <li>
                    <a href="{{ route('administrator.home') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('administrator.apprentice') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Aprendices
                    </a>
                </li>
                <li>
                    <a href="{{ route('administrator.instructor') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Instructores
                    </a>
                </li>
                <li>
                    <a href="{{ route('administrator.graphic') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Gráficas
                    </a>
                </li>
            </ul>
        </div>

        <!-- Botón de notificaciones alineado a la derecha -->
        <button id="notifButton" class="absolute right-0 mr-4">
            <a href="{{ route('administrator.notificaciones') }}">
                <img class="w-[50px] h-auto filter invert" src="{{ asset('img/notificaciones.png') }}"
                    alt="Notificaciones">
            </a>
        </button>
    </nav>


    {{-- FIN Menu --}}
    <div class="flex justify-center">
        <main
            class="bg-white m-4 p-6 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-full md:w-3/4 lg:w-2/3 items-center">
            <div class="bg-gray-100 p-6 rounded-lg">
                <div class="text-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-40 h-40 mx-auto text-gray-500 m-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <h1 class="text-lg m-0 text-black font-bold">INSTRUCTOR</h1>
                </div>
                <h3 class="font-bold mb-4">Datos básicos</h3>
                <form action='/api/user_registers' method="POST">
                    @csrf
                    <!-- Sección de datos básicos -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">
                        <div class="w-full">
                            <label class="block text-gray-700">Identificación</label>
                            <input type="text" name="id"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Identificación"
                                required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Nombre</label>
                            <input type="text" name="name"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Nombre" required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Apellido</label>
                            <input type="text" name="last_name"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Apellido"
                                required>
                        </div>
                        <div class="w-full">
                            <label for="programa" class="block text-gray-700">Programa</label>
                            <select id="program" name="program"
                                class="w-full border border-gray-300 rounded-lg p-2.5" required>
                                <option value="GESTION ADMINISTRATIVA DEL SECTOR SALUD">GESTION ADMINISTRATIVA DEL
                                    SECTOR SALUD</option>
                                <option value="GESTION DE MERCADOS">GESTION DE MERCADOS</option>
                                <option value="ASISTENCIA ADMINISTRATIVA">ASISTENCIA ADMINISTRATIVA</option>
                                <option value="GESTION DE PROCESOS ADMINISTRATIVOS DE SALUD">GESTION DE PROCESOS
                                    ADMINISTRATIVOS DE SALUD</option>
                                <option value="GESTION EMPRESARIAL">GESTION EMPRESARIAL</option>
                                <option value="GUIANZA TURISTICA">GUIANZA TURISTICA</option>
                                <option value="GESTION CONTABLE Y FINANCIERA">GESTION CONTABLE Y FINANCIERA</option>
                                <option value="ANALISIS Y DESARROLLO DE SISTEMAS DE INFORMACION">ANALISIS Y DESARROLLO
                                    DE SISTEMAS DE INFORMACION</option>
                                <option value="GESTION LOGISTICA">GESTION LOGISTICA</option>
                                <option value="NEGOCIACION INTERNACIONAL">NEGOCIACION INTERNACIONAL</option>
                                <option value="GESTION DEL TALENTO HUMANO">GESTION DEL TALENTO HUMANO</option>
                                <option value="GESTION DOCUMENTAL">GESTION DOCUMENTAL</option>
                                <option value="CONTABILIZACION DE OPERACIONES COMERCIALES Y FINANCIERAS">
                                    CONTABILIZACION DE OPERACIONES COMERCIALES Y FINANCIERAS</option>
                                <option value="GESTION BANCARIA Y DE ENTIDADES FINANCIERAS">GESTION BANCARIA Y DE
                                    ENTIDADES FINANCIERAS</option>
                                <option value="PELUQUERIA">PELUQUERIA</option>
                                <option value="PANIFICACION">PANIFICACION</option>
                                <option value="COCINA">COCINA</option>
                                <option value="SERVICIOS FARMACEUTICOS">SERVICIOS FARMACEUTICOS</option>
                                <option value="SALUD PUBLICA">SALUD PUBLICA</option>
                                <option value="APOYO ADMINISTRATIVO EN SALUD">APOYO ADMINISTRATIVO EN SALUD</option>
                                <option value="OPERACION TURISTICA LOCAL">OPERACION TURISTICA LOCAL</option>
                                <option value="ANIMACION 3D">ANIMACION 3D</option>
                                <option value="ANIMACION DIGITAL">ANIMACION DIGITAL</option>
                                <option value="PROMOCION DE PRODUCTOS">PROMOCION DE PRODUCTOS</option>
                                <option value="SERVICIOS Y OPERACIONES MICROFINANCIERAS">SERVICIOS Y OPERACIONES
                                    MICROFINANCIERAS</option>
                                <option value="CUIDADO ESTETICO DE MANOS Y PIES">CUIDADO ESTETICO DE MANOS Y PIES
                                </option>
                                <option value="CONTROL DE MOVILIDAD TRANSPORTE Y SEGURIDAD VIAL">CONTROL DE MOVILIDAD
                                    TRANSPORTE Y SEGURIDAD VIAL</option>
                                <option value="ENFERMERIA">ENFERMERIA</option>
                                <option value="SISTEMAS">SISTEMAS</option>
                                <option value="DISTRIBUCION FISICA INTERNACIONAL">DISTRIBUCION FISICA INTERNACIONAL
                                </option>
                                <option value="ASESORIA COMERCIAL Y OPERACIONES DE ENTIDADES FINANCIERAS">ASESORIA
                                    COMERCIAL Y OPERACIONES DE ENTIDADES FINANCIERAS</option>
                                <option value="ATENCION INTEGRAL A LA PRIMERA INFANCIA">ATENCION INTEGRAL A LA PRIMERA
                                    INFANCIA</option>
                                <option value="ASISTENCIA EN ORGANIZACION DE ARCHIVOS">ASISTENCIA EN ORGANIZACION DE
                                    ARCHIVOS</option>
                                <option value="DESARROLLO DE OPERACIONES LOGISTICA EN LA CADENA DE ABASTECIMIENTO">
                                    DESARROLLO DE OPERACIONES LOGISTICA EN LA CADENA DE ABASTECIMIENTO</option>
                                <option value="SERVICIO DE RESTAURANTE Y BAR">SERVICIO DE RESTAURANTE Y BAR</option>
                                <option value="OPERACIONES DE COMERCIO EXTERIOR">OPERACIONES DE COMERCIO EXTERIOR
                                </option>
                                <option value="DISEÑO E INTEGRACION DE MULTIMEDIA">DISEÑO E INTEGRACION DE MULTIMEDIA
                                </option>
                                <option value="INFORMACION Y SERVICIO AL CLIENTE">INFORMACION Y SERVICIO AL CLIENTE
                                </option>
                                <option value="SERVICIOS DE AGENCIAS DE VIAJES">SERVICIOS DE AGENCIAS DE VIAJES
                                </option>
                                <option value="ASESORIA COMERCIAL">ASESORIA COMERCIAL</option>
                                <option value="PROCESOS DE PANADERIA">PROCESOS DE PANADERIA</option>
                                <option value="GESTION COMUNITARIA DEL RIESGO DE DESASTRES">GESTION COMUNITARIA DEL
                                    RIESGO DE DESASTRES</option>
                                <option value="PROGRAMACION DE APLICACIONES Y SERVICIOS PARA LA NUBE">PROGRAMACION DE
                                    APLICACIONES Y SERVICIOS PARA LA NUBE</option>
                                <option value="PROGRAMACION DE SOFTWARE">PROGRAMACION DE SOFTWARE</option>
                                <option value="SERVICIOS DE BARISMO">SERVICIOS DE BARISMO</option>
                                <option value="GESTION CONTABLE Y DE INFORMACION FINANCIERA">GESTION CONTABLE Y DE
                                    INFORMACION FINANCIERA</option>
                                <option value="INTEGRACION DE OPERACIONES LOGISTICAS">INTEGRACION DE OPERACIONES
                                    LOGISTICAS</option>
                                <option value="INTEGRACION DE CONTENIDOS DIGITALES">INTEGRACION DE CONTENIDOS DIGITALES
                                </option>
                                <option value="AUXILIAR EN COCINA">AUXILIAR EN COCINA</option>
                                <option value="PROGRAMACION PARA ANALITICA DE DATOS">PROGRAMACION PARA ANALITICA DE
                                    DATOS</option>
                                <option value="AGENTE DE TRANSITO Y TRANSPORTE">AGENTE DE TRANSITO Y TRANSPORTE
                                </option>
                                <option value="ANALISIS Y DESARROLLO DE SOFTWARE">ANALISIS Y DESARROLLO DE SOFTWARE
                                </option>
                                <option value="ATENCION INTEGRAL AL CLIENTE">ATENCION INTEGRAL AL CLIENTE</option>
                                <option value="CONTROL DE MOVILIDAD, TRANSPORTE Y SEGURIDAD VIAL">CONTROL DE MOVILIDAD,
                                    TRANSPORTE Y SEGURIDAD VIAL</option>
                                <option value="DESARROLLO DE PROCESOS DE MERCADEO">DESARROLLO DE PROCESOS DE MERCADEO
                                </option>
                                <option value="DESARROLLO PUBLICITARIO">DESARROLLO PUBLICITARIO</option>
                                <option value="GESTION INTEGRAL DEL TRANSPORTE">GESTION INTEGRAL DEL TRANSPORTE
                                </option>
                                <option value="ORGANIZACION DE ARCHIVO">ORGANIZACION DE ARCHIVO</option>
                                <option value="PRESELECCION DE TALENTO HUMANO MEDIADO POR HERRAMIENTAS TIC">
                                    PRESELECCION DE TALENTO HUMANO MEDIADO POR HERRAMIENTAS TIC</option>
                                <option value="SERVICIOS EN CONTACT CENTER Y BPO">SERVICIOS EN CONTACT CENTER Y BPO
                                </option>
                                <option value="COORDINACION DE PROCESOS LOGISTICOS">COORDINACION DE PROCESOS LOGISTICOS
                                </option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="academic_level" class="block text-gray-700">Nivel Académico</label>
                            <select id="academic_level" name="academic_level"
                                class="w-full border border-gray-300 rounded-lg p-2.5" required>
                                <option value="" disabled selected>Seleccione Nivel Académico</option>
                                <option value="tecnologo">Tecnólogo</option>
                                <option value="tecnico">Técnico</option>
                                <option value="operario">Operario</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Ficha</label>
                            <input type="text" name="ficha"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Cedula" required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Teléfono</label>
                            <input type="text" name="telephone"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Correo" required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Correo</label>
                            <input type="text" name="email"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Celular" required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Tipo de Contrato</label>
                            <input type="text" name="Contract_Type"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Total de horas"
                                required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Fecha de inicio</label>
                            <input type="date" name="Start_date"
                                class="w-full border border-gray-300 rounded-lg p-2.5" required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Fecha de fin</label>
                            <input type="date" name="End_date"
                                class="w-full border border-gray-300 rounded-lg p-2.5" required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Nit empresa</label>
                            <input type="text" name="Nit_empresa"
                                class="w-full border border-gray-300 rounded-lg p-2.5" required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Razón Social</label>
                            <input type="text" name="Company_Name"
                                class="w-full border border-gray-300 rounded-lg p-2.5" required>
                        </div>
                    </div>

                    <h3 class="font-bold mb-4 mt-6">Lugar de Residencia</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-6">
                        <div class="w-full">
                            <label class="block text-gray-700">Municipio</label>
                            <input type="text" name="municipality"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Municipio"
                                required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Direccion</label>
                            <input type="text" name="address"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Barrio" required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Telefono empresa</label>
                            <input type="text" name="telephone"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Barrio" required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Nombre instructor</label>
                            <input type="text" name="name_instructor"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Barrio" required>
                        </div>
                        <div class="w-full">
                            <label class="block text-gray-700">Correo instructor</label>
                            <input type="text" name="email_instructor"
                                class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Barrio" required>
                        </div>
                    </div>

                    <div class="flex space-x-4 justify-start mb-4">
                        <button type="button" class="bg-[#009e00] text-white px-3 py-1 rounded">Enviar
                            Aprendiz</button>
                        <button type="button" class="bg-[#009e00] text-white px-3 py-1 rounded">Enviar
                            Instructor</button>
                        <button type="button" class="bg-[#009e00] text-white px-3 py-1 rounded">Editar</button>
                        <button type="button" class="bg-[#009e00] text-white px-3 py-1 rounded">Eliminar</button>
                    </div>
                    <button type="submit"
                        class="w-full bg-[#009e00] text-white py-3 rounded-lg mt-6">Registrar</button>
                </form>
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
