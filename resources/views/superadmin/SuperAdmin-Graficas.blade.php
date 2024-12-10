<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        class="block text-center text-white px-4 py-2 rounded-lg {{ request()->routeIs('superadmin.SuperAdmin-Graficas') ? 'bg-green-600 bg-opacity-70' : 'bg-green-600 bg-opacity-20 hover:bg-opacity-50' }}">
                        <span class="font-bold">
                            Graficas
                        </span>
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
        <main class="container mx-auto p-4">

            <div class="bg-white rounded-lg p-6 mb-6 shadow">
                <h2 class="text-xl text-center p-8 m-4 font-bold mb-4">Año Actual</h2>
                <div class="grid grid-cols-5 gap-4 mb-4">
                    <div>
                        <p class="font-semibold">Pasantía</p>
                        <p id="pasantia">150</p>
                    </div>
                    <div>
                        <p class="font-semibold">Vínculo Laboral</p>
                        <p id="vinculoLaboral">250</p>
                    </div>
                    <div>
                        <p class="font-semibold">Contrato de Aprendizaje</p>
                        <p id="contratoAprendizaje">110</p>
                    </div>
                    <div>
                        <p class="font-semibold">Unidad Productiva Familiar</p>
                        <p id="unidadProductiva">190</p>
                    </div>
                    <div>
                        <p class="font-semibold">Proyecto Productivo Empresarial</p>
                        <p id="proyectoProductivo">100</p>
                    </div>
                    <div class="col-span-5">
                        <p class="font-semibold">Total</p>
                        <p id="total">800</p>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <canvas id="pieChart"></canvas>
                    </div>
                    <div>
                        <canvas id="barChart"></canvas>
                    </div>
                    <div>
                        <canvas id="doughnutChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg p-6 shadow mb-6">
                <h3 class="text-lg font-semibold mb-4">Tipo de Contrato</h3>
                <form id="contractForm" class="space-y-4">
                    <div>
                        <label class="block mb-1">Tipo de Contrato:</label>
                        <input type="text" id="tipoContrato" class="border rounded px-2 py-1 w-full">
                    </div>
                    <div>
                        <label class="block mb-1">Fecha:</label>
                        <div class="grid grid-cols-2 gap-4">
                            <input type="date" id="fechaInicio" class="border rounded px-2 py-1">
                            <input type="date" id="fechaFin" class="border rounded px-2 py-1">
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <button type="button" id="pendienteBtn"
                            class="bg-red-500 text-white px-4 py-2 rounded">Pendiente</button>
                        <button type="button" id="activoBtn"
                            class="bg-green-500 text-white px-4 py-2 rounded">Activo</button>
                        <button type="button" id="finalizadosBtn"
                            class="bg-gray-300 text-black px-4 py-2 rounded">Finalizados</button>
                    </div>
                    <div class="flex justify-end space-x-4 mt-4">
                        <button type="button" id="cancelarBtn"
                            class="bg-gray-300 text-black px-4 py-2 rounded">CANCELAR</button>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">CONFIRMAR</button>
                    </div>
                </form>
            </div>

            <div class="bg-white rounded-lg p-6 shadow">
                <h2 class="text-xl font-bold mb-4">Información Adicional</h2>
                <div class="grid grid-cols-5 gap-4 mb-4">
                    <div>
                        <p class="font-semibold">Pasantía</p>
                        <p id="pasantiaAdicional">1150</p>
                    </div>
                    <div>
                        <p class="font-semibold">Vínculo Laboral</p>
                        <p id="vinculoLaboralAdicional">1250</p>
                    </div>
                    <div>
                        <p class="font-semibold">Contrato de Aprendizaje</p>
                        <p id="contratoAprendizajeAdicional">1110</p>
                    </div>
                    <div>
                        <p class="font-semibold">Unidad Productiva Familiar</p>
                        <p id="unidadProductivaAdicional">1190</p>
                    </div>
                    <div>
                        <p class="font-semibold">Proyecto Productivo Empresarial</p>
                        <p id="proyectoProductivoAdicional">1100</p>
                    </div>
                    <div class="col-span-5">
                        <p class="font-semibold">Total</p>
                        <p id="totalAdicional">5800</p>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <canvas id="pieChartAdicional"></canvas>
                    </div>
                    <div>
                        <canvas id="barChartAdicional"></canvas>
                    </div>
                    <div>
                        <canvas id="doughnutChartAdicional"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/SuperAdmin.js') }}"></script>

</body>

</html>
