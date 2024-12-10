<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
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
        <div class="flex justify-center w-full">
            <ul class="flex justify-center space-x-4 horizontal-list">
                <li>
                    <a href="{{ route('apprentice.home') }}"
                        class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('apprentice.calendar') }}"
                        class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Calendario
                    </a>
                </li>
            </ul>
        </div>

    </nav>

    <!-- Search Bar -->
    <div class="container p-4 mx-auto">
        <div class="flex items-center space-x-4">
            <button class="p-2 bg-gray-200 rounded">
                <img src="{{ asset('img/menu1.png') }}" alt="Menu" class="w-8 h-8">
            </button>
            <input type="text" placeholder="Buscar..." class="w-full p-2 bg-gray-100 border border-gray-300 rounded">
            <button class="p-2 bg-gray-200 rounded">
                <img src="{{ asset('img/mas.png') }}" alt="Nuevo" class="w-8 h-8">
            </button>
        </div>
    </div>

    <!-- Notifications List -->
    <div class="container p-4 mx-auto">
        <div class="bg-white divide-y divide-gray-200 rounded-lg shadow">
            @forelse($notificaciones as $notificacion)
                <div class="flex items-center justify-between p-4 cursor-pointer hover:bg-gray-50"
                    onclick="mostrarModal({{ json_encode($notificacion) }})">
                    <div>
                        <h3 class="text-lg font-semibold">{{ $notificacion['message'] ?? 'Mensaje no disponible' }}
                        </h3>
                        <p class="text-sm text-gray-500">{{ $notificacion['content'] ?? 'Contenido no disponible' }}
                        </p>
                        <p class="text-xs text-gray-400">Fecha:
                            {{ $notificacion['shipping_date'] ?? 'Fecha no disponible' }}</p>
                    </div>
                    <button class="text-red-600 hover:text-red-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500">No hay notificaciones disponibles.</div>
            @endforelse
        </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="w-1/2 bg-white rounded-lg shadow-lg">
            <div class="p-4 border-b">
                <h2 id="modal-title" class="text-lg font-semibold">Detalles de la Notificación</h2>
            </div>
            <div class="p-4">
                <p><strong>Mensaje:</strong> <span id="modal-message"></span></p>
                <p><strong>Contenido:</strong> <span id="modal-content"></span></p>
                <p><strong>Fecha:</strong> <span id="modal-date"></span></p>
                <hr class="my-4">
                <p><strong>Enviado por:</strong></p>
                <p><strong>Nombre:</strong> <span id="modal-sender-name"></span></p>
                <p><strong>Email:</strong> <span id="modal-sender-email"></span></p>
                <p><strong>Teléfono:</strong> <span id="modal-sender-telephone"></span></p>
            </div>
            <div class="p-4 text-right border-t">
                <button onclick="cerrarModal()" class="px-4 py-2 text-white bg-red-500 rounded">Cerrar</button>
            </div>
        </div>
    </div>

    <script>
        function mostrarModal(notificacion) {
            document.getElementById('modal').classList.remove('hidden');

            document.getElementById('modal-title').textContent = notificacion.message ?? 'Sin título';
            document.getElementById('modal-message').textContent = notificacion.message ?? 'Mensaje no disponible';
            document.getElementById('modal-content').textContent = notificacion.content ?? 'Contenido no disponible';
            document.getElementById('modal-date').textContent = notificacion.shipping_date ?? 'Fecha no disponible';

            const sender = notificacion.sender || {};
            document.getElementById('modal-sender-name').textContent =
                `${sender.name ?? 'Nombre no disponible'} ${sender.last_name ?? ''}`;
            document.getElementById('modal-sender-email').textContent = sender.email ?? 'Correo no disponible';
            document.getElementById('modal-sender-telephone').textContent = sender.telephone ?? 'Teléfono no disponible';
        }

        function cerrarModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>

</body>

</html>
