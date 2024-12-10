<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/vis-timeline/7.4.9/vis-timeline-graph2d.min.css"
        rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vis-timeline/7.4.9/vis-timeline-graph2d.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Etapa Seguimiento</title>
    <style>
        #userMenuTri {
            top: 100%;
            margin-top: 0.5rem;
        }
    </style>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    @include('partials.nav-trainner')

    <div class="flex items-center justify-between w-full mt-6">
        <a href="{{ route('trainer.home') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>
    <div class="flex justify-center">

        <main class=" bg-white m-2 px-2 rounded-lg max-height-100% w-5/7 border-2 border-black">

            <div class="container p-6 mx-auto mt-6 bg-white rounded-lg shadow-lg">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

                    <div class="flex flex-col items-center space-y-4 md:col-span-1">
                        <div class="p-6 bg-gray-200 border-2 border-black rounded-full">
                            <img src="{{ asset('img/trainer/aprendiz_icono_tra.png') }}" alt="Avatar" class="h-28">
                        </div>
                        <div class="w-full">
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombres</label>
                            <input type="text" id="nombre" value="{{ $apprentice['name'] }}"
                                class="block w-full mt-1 bg-gray-100 border-transparent rounded-md focus:border-gray-300 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="apellido" class="block text-sm font-medium text-gray-700">Apellidos</label>
                            <input type="text" id="apellido" value="{{ $apprentice['last_name'] }}"
                                class="block w-full mt-1 bg-gray-100 border-transparent rounded-md focus:border-gray-300 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="identificacion" class="block text-sm font-medium text-gray-700">N°
                                identificación</label>
                            <input type="text" id="identificacion" value="{{ $apprentice['identification'] }}"
                                class="block w-full mt-1 bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="ficha" class="block text-sm font-medium text-gray-700">N° ficha</label>
                            <input type="text" id="ficha"
                                value="{{ isset($apprentice['apprentice']['ficha']) ? $apprentice['apprentice']['ficha'] : '' }}"
                                class="block w-full mt-1 bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="email" class="block text-sm font-medium text-gray-700">Correo
                                Electrónico</label>
                            <input type="email" id="email" value="{{ $apprentice['email'] }}"
                                class="block w-full mt-1 bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="departamento"
                                class="block text-sm font-medium text-gray-700">Departamento</label>
                            <input type="text" id="departamento" value="{{ $apprentice['department'] }}"
                                class="block w-full mt-1 bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="municipio" class="block text-sm font-medium text-gray-700">Municipio</label>
                            <input type="text" id="municipio" value="{{ $apprentice['municipality'] }}"
                                class="block w-full mt-1 bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="nivel_formacion" class="block text-sm font-medium text-gray-700">Nivel de
                                Formación</label>
                            <input type="text" id="nivel_formacion"
                                value="{{ isset($apprentice['apprentice']['academic_level']) ? $apprentice['apprentice']['academic_level'] : '' }}"
                                class="block w-full mt-1 bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                        <div class="w-full">
                            <label for="programa" class="block text-sm font-medium text-gray-700">Programa</label>
                            <input type="text" id="programa"
                                value="{{ isset($apprentice['apprentice']['program']) ? $apprentice['apprentice']['program'] : '' }}"
                                class="block w-full mt-1 bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0">
                        </div>
                    </div>


                    <div class="flex flex-col items-center space-y-4 md:col-span-2">
                        <div class="flex items-center justify-between w-full">
                            <div>
                                <a href="{{ route('bitacora', ['id' => $apprentice['id']]) }}"
                                    class="m-2.5 py-10 rounded-[10%] flex flex-col items-center text-center p-5 w-56 h-56 hover:border-green-600">
                                    <img src="{{ asset('img/trainer/bitacoras_1.png') }}" alt="Bitacora"
                                        class="m-2.5 py-5 rounded-[10%] flex flex-col items-center text-center p-2 bg-white border-[2px] border-black w-40 h-40 hover:border-green-600 object-cover">
                                    <h2 class="text-center font-weight:300">Bitacora</h2>
                                </a>

                            </div>
                            <div>

                                <a href="{{ route('visita', ['id' => $apprentice['id']]) }}"
                                    class="m-2.5 py-10 rounded-[10%] flex flex-col items-center text-center p-5 w-56 h-56 hover:border-green-600">
                                    <img src="{{ asset('img/trainer/visitas_1.png') }}" alt="Visita"
                                        class="m-2.5 py-5 rounded-[10%] flex flex-col items-center text-center p-2 bg-white border-[2px] border-black w-40 h-40 hover:border-green-600 object-cover">
                                    <h2 class="text-center font-weight:300">Seguimiento</h2>
                                </a>

                            </div>
                            <div>
                                <div>
                                    <select id="statusSelect"
                                        class="border-[2px] border-black p-4 rounded-md w-48 bg-white text-white">
                                        <option selected disabled>Selecciona Opción</option>
                                        <option value="activo" data-color="green"
                                            @if ($apprentice['apprentice']['estado'] == 'activo') selected @endif>ACTIVO</option>
                                        <option value="novedad" data-color="orange"
                                            @if ($apprentice['apprentice']['estado'] == 'novedad') selected @endif>NOVEDAD</option>
                                        <option value="finalizada" data-color="red"
                                            @if ($apprentice['apprentice']['estado'] == 'finalizada') selected @endif>FINALIZADA</option>
                                    </select>


                                </div>
                            </div>
                        </div>
                        <div></div>
                        <div class="w-full p-4 bg-gray-100 rounded-md">
                            <div
                                class="w-full md:flex-1 mt-[0.5%] bg-gray-100 rounded-lg shadow mx-auto tarjeta flex flex-col items-center p-8 ">
                                <h3 class="mb-0 text-lg font-bold text-center">Línea Temporal (Etapa de seguimiento)
                                </h3>
                                <div id="timeline" class="object-cover w-full h-60 md:h-80 "></div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </main>

    </div>

    <script>
    const URL_API = "{{ env('URL_API') }}";

        document.getElementById('statusSelect').addEventListener('change', function() {
            var estado = this.value;
            var apprenticeId = {{ $apprentice['id'] }};

            fetch(`${URL_API}apprentices/${apprenticeId}/estado`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        estado: estado
                    })
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        title: 'Estado actualizado',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = "/trainer/home";
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.getElementById('statusSelect');

            selectElement.addEventListener('change', function() {
                const selectedOption = selectElement.options[selectElement.selectedIndex];

                // Depuración: Verifica si el evento se dispara correctamente
                console.log('Opción seleccionada:', selectedOption.value);

                const selectedColor = selectedOption.getAttribute('data-color');

                // Depuración: Verifica si el atributo 'data-color' está presente
                console.log('Color seleccionado:', selectedColor);

                if (selectedColor) {
                    // Cambia el color de fondo del select
                    selectElement.style.backgroundColor = selectedColor;
                } else {
                    // Restablece el color de fondo si no hay color
                    selectElement.style.backgroundColor = '';
                }
            });
        });

        const calendarData = @json($visitsData);

        const itemsData = calendarData.map(followUp => ({
            id: followUp.id,
            content: followUp.type_of_agreement,
            start: followUp.date,
            observation: followUp.observation,
            backgroundColor: '#009e00',
            borderColor: '#009e00',
        }));

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
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelect = document.getElementById('statusSelect');
            statusSelect.addEventListener('change', function() {
                const selectedOption = statusSelect.options[statusSelect.selectedIndex];
                const selectedColor = selectedOption.getAttribute('data-color');

                statusSelect.style.backgroundColor = selectedColor;
            });
            const initialSelectedOption = statusSelect.options[statusSelect.selectedIndex];
            const initialColor = initialSelectedOption.getAttribute('data-color');
            statusSelect.style.backgroundColor = initialColor;
        });
    </script>

</body>

</html>
