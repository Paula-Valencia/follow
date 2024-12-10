<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/vis-timeline/7.4.9/vis-timeline-graph2d.min.css"
        rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vis-timeline/7.4.9/vis-timeline-graph2d.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        class="block text-white text-center px-4 py-2 rounded-lg  hover:bg-green-700 transition font-bold
                              {{ request()->routeIs('apprentice.home') ? 'bg-green-600' : 'hover:bg-green-600' }}">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('apprentice.calendar') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Calendario
                    </a>
                </li>
            </ul>
        </div>

    </nav>

    <!-- Trainer Container -->
    <div class="flex flex-col md:flex-row w-full px-2 p-[2%] py-4 md:px-10 md:py-0 space-y-4 md:space-y-0 md:space-x-4">

        <div class="w-full max-w-screen-lg mx-auto p-3 bg-gray-100 rounded-lg shadow flex flex-col mt-[1%] ">

            <h2 class="text-lg font-bold">Instructor Asignado {{ $data['trainer']['user']['name'] ?? '(No tienes un instructor asignado todavía)' }}</h2>
            <ul class="mt-7 space-y-2 md:space-y-4 text-sm">
                <li>
                    <span class="font-semibold">Nombre:</span>
                    {{ isset($data['trainer']['user']['name'], $data['trainer']['user']['last_name'])
                        ? $data['trainer']['user']['name'] . ' ' . $data['trainer']['user']['last_name']
                        : 'N/A' }}
                </li>
                <hr class="border-white">

                <li>
                    <span class="font-semibold">Correo:</span>
                    {{ $data['trainer']['user']['email'] ?? 'N/A' }}
                </li>
                <hr class="border-white">

                <li>
                    <span class="font-semibold">Teléfono:</span>
                    {{ $data['trainer']['user']['telephone'] ?? 'N/A' }}
                </li>
                <hr class="border-white">

                <li>
                    <span class="font-semibold">Rol:</span>
                    {{ isset($data['trainer']['user']['id_role']) && $data['trainer']['user']['id_role'] == 3 ? 'Instructor' : 'N/A' }}
                </li>
                <hr class="border-white">
            </ul>


        </div>

        <!-- Graphiph dount of cant logs -->
        <div class="card flex flex-col p-3 mb-1 bg-gray-100 rounded-lg shadow w-full md:w-[25%] md:p-6 mt-[0.5%]">
            <h4 class="text-center text-lg font-bold mb-0">Bitácoras</h4>
            <div class="w-60 h-60 mx-auto flex justify-center items-center">
                <canvas id="logs" class="w-full h-full"></canvas>
            </div>
        </div>

    </div>

    <!-- Timeline Section -->
    <div
        class="w-full m-5 md:flex-1 mt-[0.5%] bg-gray-100 rounded-lg shadow mx-auto tarjeta flex flex-col items-center p-8 ">
        <h3 class="text-center text-lg font-bold mb-0">Línea Temporal (Etapa de seguimiento)</h3>
        <div id="timeline" class="w-full h-60 md:h-80 object-cover "></div>
    </div>

    <script>
        const calendarData = @json($visitsData);
    </script>

    <script>
        // Función para obtener actividades completadas
        function getCompletedActivities() {
            return JSON.parse(localStorage.getItem('completedActivities')) || [];
        }

        const itemsData = calendarData.map(followUp => ({
            id: followUp.id,
            content: followUp.type_of_agreement,
            start: followUp.date,
            observation: followUp.observation,
            backgroundColor: '#009e00',
            borderColor: '#009e00',
        }));

        // Crear elementos para la línea de tiempo
        var items = new vis.DataSet(itemsData);

        // Opciones de la línea de tiempo
        var options = {
            width: '100%',
            height: '100%', // Ajusta la altura automáticamente
            start: new Date(),
            end: '2024-08-01',
            showCurrentTime: true, // Muestra una línea para el tiempo actual
            zoomMin: 1000 * 60 * 60 * 24 * 30, // Z'oom mínimo: 1 mes
            orientation: {
                axis: 'top',
                item: 'top'
            }, // Coloca el eje temporal en la parte superior zoomMax: 1000 * 60 * 60 * 24 * 365 * 2, // Zoom máximo: 2 años
            editable: {
                updateTime: false, // No permite cambiar la hora de los eventos
                updateGroup: false, // No permite cambiar el grupo de los eventos
                add: false, // No permite añadir nuevos eventos
                remove: false // No permite eliminar eventos
            },
            margin: {
                item: 10, // Margen entre los elementos y el eje temporal
                axis: 5 // Margen entre el eje y el borde de la visualización
            },
            stack: true, // Permite apilar eventos que se solapan
            tooltip: {
                followMouse: true, // El tooltip sigue el puntero
            },
            locale: 'es', // Define el idioma como español
            format: {
                minorLabels: {
                    minute: 'HH:mm', // Formato de horas y minutos en etiquetas menores
                    hour: 'HH:mm', // Formato de horas en etiquetas menores
                    day: 'DD-MM', // Formato de día en etiquetas menores
                },
                majorLabels: {
                    day: 'MMMM YYYY', // Formato de mes y año en etiquetas mayores
                }
            }
        };
        // Función para obtener actividades completadas
        function getCompletedActivities() {
            return JSON.parse(localStorage.getItem('completedActivities')) || [];
        }

        // Crear el contenedor de la línea de tiempo
        var container = document.getElementById('timeline');
        var timeline = new vis.Timeline(container, items, options);

        // Función para actualizar el estado de los eventos en la línea de tiempo
        function updateTimeline() {
            let completedActivities = getCompletedActivities();
            completedActivities.forEach(date => {
                let item = items.get({
                    filter: function(item) {
                        return item.start === date;
                    }
                });
                if (item.length > 0) {
                    items.update({
                        id: item[0].id,
                        className: 'completed'
                    });
                }
            });
        }

        // Actualizar la línea de tiempo al cargar la página
        updateTimeline();
    </script>

    <script>
        const logsData = @json($logsData);

        const approvedNumberLogs = logsData.filter(bitacora => bitacora.state === 'approved')
            .map(bitacora => bitacora.number_log);

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('logs').getContext('2d');

            // Función para actualizar el gráfico con la cantidad de bitácoras seleccionadas
            function actualizarGrafico(cantidadSeleccionada) {
                const totalBitacoras = 12; // Total de bitácoras posibles
                const porcentaje = (cantidadSeleccionada / totalBitacoras) * 100;

                // Crear o actualizar el gráfico
                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Completado', 'Pendiente'],
                        datasets: [{
                            data: [porcentaje, 100 - porcentaje],
                            backgroundColor: [getColor(porcentaje), '#E0E0E0'],
                            borderWidth: 0,
                        }]
                    },
                    options: {
                        cutout: '70%', // Espacio central
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false // Ocultar leyenda
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2) +
                                            '%';
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // Función para obtener color según el porcentaje
            function getColor(percentage) {
                if (percentage < 50) return 'red';
                if (percentage < 75) return 'orange';
                return 'green';
            }

            actualizarGrafico(approvedNumberLogs.length);
        });
    </script>

</body>

</html>
