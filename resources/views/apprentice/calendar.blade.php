<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
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

        .vis-item.completed {
            background-color: green;
            color: white;
        }

        .vis-item {
            background-color: #3498db;
            color: white;
        }

        .vis-item.vis-selected {
            background-color: #2ecc71;
        }

        .card {
            width: 300px;
            /* Ajusta el ancho según tus necesidades */
            height: 300px;
            /* Ajusta la altura según tus necesidades */
            position: relative;
            /* Necesario para posicionar el texto en el centro */
        }

        #percentage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            /* Ajusta el tamaño de la fuente según tus necesidades */
            font-weight: bold;
            color: black;
            /* Color del porcentaje */
        }

        .modal {
            display: none;
        }

        /* Estilo general para todos los botones */
        .fc-button {
            background-color: #009e00 !important;
            /* Fondo verde oscuro */
            border-color: #009e00 !important;
            /* Borde verde oscuro */
            color: #fff !important;
            /* Texto blanco */
            font-weight: bold;
            transition: background-color 0.3s ease;
            border-radius: 5px;
            /* Esquinas redondeadas */
        }

        /* Cambiar el color al pasar el mouse */
        .fc-button:hover {
            background-color: #007d00 !important;
            /* Verde más oscuro al pasar el mouse */
            border-color: #007d00 !important;
        }

        /* Botón 'Hoy' (puedes personalizarlo si quieres que sea diferente) */
        .fc-today-button {
            background-color: #009e00 !important;
            border-color: #007d00 !important;
            color: #fff !important;
        }

        /* Botones de navegación (previo y siguiente) */
        .fc-prev-button,
        .fc-next-button {
            background-color: #009e00 !important;
            border-color: #007d00 !important;
            color: #fff !important;
        }
    </style>

</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-start items-center relative z-10">
        <a href="{{ route('apprentice.notification') }}" id="notifButton" class="absolute right-0">
            <img class="w-[35px] h-auto mr-2.5 filter invert" src="{{ asset('img/notificaciones.png') }}"
                alt="Notificaciones">
        </a>
        <div class="w-full flex justify-center">
            <ul class="horizontal-list flex space-x-4 justify-center">
                <li>
                    <a href="{{ route('apprentice.index') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition ">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('apprentice.calendar') }}"
                        class="block text-white text-center px-4 py-2 rounded-lg  hover:bg-green-700 transition font-bold
                              {{ request()->routeIs('apprentice.calendar') ? 'bg-green-600' : 'hover:bg-green-600' }}">
                        Calendario
                    </a>
                </li>
            </ul>
        </div>

    </nav>

    <div class="w-full flex justify-between items-center mt-6">
        <a href="{{ route('apprentice.home') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <div class="flex justify-center">
        <main class="bg-white m-4 p-4 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Cronograma</h2>
            </div>
            <section class="p-4">
                <div id="calendarDays" class="calendar"></div>
            </section>
            {{-- <button id="open-modal" class="px-4 py-2 bg-green-500 text-white rounded">Abrir Modal</button> --}}
        </main>
    </div>

    <div class="modal relative z-10 hidden" id="evento" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                    <form action="/" id="visit-form" method="POST"
                        class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">

                        {!! csrf_field() !!}

                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:items-start">

                                <h3 class="text-center text-base font-semibold text-gray-900" id="modal-title">Visita
                                </h3>
                                <div class="text-center mt-2">
                                    <p id="selected-date" class="text-lg text-gray-500">Fecha: 2024-12-12</p>
                                    <p class="text-lg text-gray-500">Hora: 08:30 am</p>
                                </div>

                                <!-- Contenedor para opciones y botón -->
                                <div class="mt-4 flex justify-between items-center">
                                    <div class="flex flex-col space-y-2">
                                        <span class="text-sm text-gray-700">Selecciona una opción:</span>
                                        <label class="inline-flex items-center">
                                            <input type="radio" class="form-radio text-indigo-600" name="option"
                                                value="1" required>
                                            <span class="ml-2">Realizado</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" class="form-radio text-indigo-600" name="option"
                                                value="2" required>
                                            <span class="ml-2">No realizado</span>
                                        </label>
                                    </div>

                                    <div>
                                        <button type="button" id="reschedule"
                                            class="bg-blue-500 text-white rounded px-4 py-2 hover:bg-blue-600">
                                            Reprogramar
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:justify-between sm:px-6">
                            <button type="button" id="btn-save"
                                class="inline-flex justify-center rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-600">
                                Guardar
                            </button>

                            <button type="button" id="close-modal"
                                class="mt-3 inline-flex justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0">
                                Cerrar
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        const calendarData = @json($visitsData);
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Data from the assigned trainer and data with variable name injected by the controller
        const events = calendarData.map(followUp => ({
            title: followUp.type_of_agreement,
            start: followUp.date,
            observation: followUp.observation,
            backgroundColor: '#009e00',
            borderColor: '#009e00',
        }));
    </script>

    <script src="{{ asset('js/calendar.js') }}" defer></script>
</body>

</html>
