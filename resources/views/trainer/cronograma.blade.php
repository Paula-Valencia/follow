<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Etapa Seguimiento</title>
    <style>
        #userMenuTri {
            top: 100%;
            margin-top: 0.5rem;
        }

        @media (max-width: 768px) {

            header,
            nav {
                flex-direction: column;
            }

            .text-lg {
                font-size: 1rem;
            }
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
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    @include('partials.nav-trainner')

    <div class="w-full flex justify-between items-center mt-4">
        <a href="{{ route('trainer.home') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <div class="flex justify-center">
        <main class="bg-white m-4 p-4 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <button id="prevMonth" class="bg-[#009e00] text-white p-2 rounded-l-lg">←</button>
                    <h2 id="currentMonth" class="text-lg font-bold mx-4"></h2>
                    <button id="nextMonth" class="bg-[#009e00] text-white p-2 rounded-r-lg">→</button>
                </div>
                <button id="addEvent" class=""></button>
            </div>

            <div id="calendarDays" class="calendar"></div>
        </main>
    </div>

    <!-- Modal para agregar/editar eventos -->
    <div id="eventModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-4 rounded-lg shadow-lg w-80">
            <h3 id="modalTitle" class="text-lg font-bold mb-4">Agregar Evento</h3>
            <form id="eventForm">
                <input type="hidden" id="eventId">
                <label for="eventDate" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" id="eventDate" class="block w-full p-2 border border-gray-300 rounded-md mb-4"
                    required>
                <label for="eventTitle" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" id="eventTitle" class="block w-full p-2 border border-gray-300 rounded-md mb-4"
                    required>
                <label for="eventDescription" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="eventDescription" class="block w-full p-2 border border-gray-300 rounded-md mb-4"></textarea>
                <div class="flex justify-between">
                    <button type="button" id="cancelEvent"
                        class="bg-gray-300 text-black px-4 py-2 rounded-md">Cancelar</button>
                    <button type="submit" class="bg-[#009e00] text-white px-4 py-2 rounded-md">Guardar</button>
                </div>
            </form>
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
