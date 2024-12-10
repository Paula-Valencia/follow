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

        .active-button {
            background-color: #2F3E4C;
            color: white;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    @include('partials.nav-trainner')

    <div class="w-full flex justify-between items-center mt-6">
        <a href="{{ route('trainer.home') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <div class="w-full flex justify-center mt-4 items-center mb-2 bg-white">
        <form action="#" method="GET" class="flex items-center">
            <input placeholder="Buscar..." class="px-2 py-1 text-sm border border-black rounded-full w-96">
            <button type="submit" aria-label="Buscar" class="p-2 bg-transparent border-none cursor-pointer -ml-10">
                <img src="{{ asset('img/lupa.png') }}" alt="Buscar" class="w-4 h-auto">
            </button>
        </form>
    </div>


    <div class="w-24 flex justify-start m-2 pl-56 items-center">
        <a href="{{ route('report') }}" type="submit" class="bg-gray-300 hover:bg-gray-400 text-black p-1 rounded">
            Redactar
        </a>
    </div>

    <div class="flex justify-center">

        <main class="bg-white m-4 p-4 rounded-lg shadow-lg border-[#2F3E4C] w-2/3">

            <!-- Botones de Tabs -->
            <div class="flex justify-center mb-4">
                <button type="button" id="receivedTab" class="tab-button active-button p-2 w-1/3 text-center rounded"
                    onclick="setActiveTab('received')">
                    Recibidos
                </button>
                <button type="button" id="sentTab" class="tab-button p-2 w-1/3 text-center rounded"
                    onclick="setActiveTab('sent')">
                    Enviados
                </button>
            </div>

            <!-- Lista de Notificaciones -->
            <ul id="notificationList" class="bg-white shadow overflow-hidden sm:rounded-md">
                <!-- Notificaciones Recibidas -->
                <div id="receivedNotifications" class="notification-list">
                    @foreach ($receivedNotifications as $notification)
                        <li class="notification-item border-t border-gray-200"
                            id="notification-{{ $notification['id'] }}">
                            <div class="flex justify-between items-center p-4 hover:bg-gray-100">
                                <div>
                                    <h2 class="text-lg font-bold">{{ $notification['content'] }}</h2>
                                    <p class="text-gray-600">{{ $notification['message'] }}</p>
                                    <p class="text-gray-600">
                                        {{ \Carbon\Carbon::parse($notification['shipping_date'])->format('d/m/Y') }}</p>
                                </div>
                                <div class="flex items-center">
                                    <button class="bg-[#009e00] text-white p-2 rounded ml-2"
                                        onclick="mostrarModal({{ json_encode($notification) }})">
                                        Ver
                                    </button>
                                    <button class="bg-gray-300 text-black p-2 rounded ml-2"
                                        onclick="deleteNotification({{ $notification['id'] }})">Eliminar</button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </div>

                <!-- Notificaciones Enviadas -->
                <div id="sentNotifications" class="notification-list" style="display:none;">
                    @foreach ($sentNotifications as $notification)
                        <li class="notification-item border-t border-gray-200"
                            id="notification-{{ $notification['id'] }}">
                            <div class="flex justify-between items-center p-4 hover:bg-gray-100">
                                <div>
                                    <h2 class="text-lg font-bold">{{ $notification['content'] }}</h2>
                                    <p class="text-gray-600">{{ $notification['message'] }}</p>
                                    <p class="text-gray-600">
                                        {{ \Carbon\Carbon::parse($notification['shipping_date'])->format('d/m/Y') }}
                                    </p>
                                </div>
                                <div class="flex items-center">
                                    <button class="bg-[#009e00] text-white p-2 rounded ml-2"
                                        onclick="mostrarModalUserSend({{ json_encode($notification) }})">
                                        Ver
                                    </button>
                                    <button class="bg-gray-300 text-black p-2 rounded ml-2"
                                        onclick="deleteNotification({{ $notification['id'] }})">Eliminar</button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </div>
            </ul>

        </main>

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

    <div id="modal-user" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="w-1/2 bg-white rounded-lg shadow-lg">
            <div class="p-4 border-b">
                <h2 id="modal-title-user" class="text-lg font-semibold">Detalles de la Notificación</h2>
            </div>
            <div class="p-4">
                <p><strong>Mensaje:</strong> <span id="modal-message-user"></span></p>
                <p><strong>Contenido:</strong> <span id="modal-content-user"></span></p>
                <p><strong>Fecha:</strong> <span id="modal-date-user"></span></p>
                <hr class="my-4">
                <p><strong>Enviado a:</strong></p>
                <p><strong>Nombre:</strong> <span id="modal-user-name"></span></p>
                <p><strong>Email:</strong> <span id="modal-user-email"></span></p>
                <p><strong>Teléfono:</strong> <span id="modal-user-telephone"></span></p>
            </div>
            <div class="p-4 text-right border-t">
                <button onclick="cerrarModalUser()" class="px-4 py-2 text-white bg-red-500 rounded">Cerrar</button>
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

        function mostrarModalUserSend(notificacion) {
            document.getElementById('modal-user').classList.remove('hidden');

            document.getElementById('modal-title-user').textContent = notificacion.message ?? 'Sin título';
            document.getElementById('modal-message-user').textContent = notificacion.message ?? 'Mensaje no disponible';
            document.getElementById('modal-content-user').textContent = notificacion.content ?? 'Contenido no disponible';
            document.getElementById('modal-date-user').textContent = notificacion.shipping_date ?? 'Fecha no disponible';

            const user = notificacion.user || {};
            document.getElementById('modal-user-name').textContent =
                `${user.name ?? 'Nombre no disponible'} ${user.last_name ?? ''}`;
            document.getElementById('modal-user-email').textContent = user.email ?? 'Correo no disponible';
            document.getElementById('modal-user-telephone').textContent = user.telephone ?? 'Teléfono no disponible';
        }

        function cerrarModalUser() {
            document.getElementById('modal-user').classList.add('hidden');
        }
    </script>

    <script>
        // Función para cambiar entre tabs
        function setActiveTab(tab) {
            if (tab === 'received') {
                document.getElementById('receivedTab').classList.add('active-button');
                document.getElementById('sentTab').classList.remove('active-button');
                document.getElementById('receivedNotifications').style.display = 'block';
                document.getElementById('sentNotifications').style.display = 'none';
            } else if (tab === 'sent') {
                document.getElementById('sentTab').classList.add('active-button');
                document.getElementById('receivedTab').classList.remove('active-button');
                document.getElementById('sentNotifications').style.display = 'block';
                document.getElementById('receivedNotifications').style.display = 'none';
            }
        }

        // Iniciar con la tab 'received' activa
        setActiveTab('received');
    </script>

    <script>
        const URL_API = "{{ env('URL_API') }}";

        function deleteNotification(notificationId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'No podrás revertir esta acción.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`${URL_API}notifications/${notificationId}`)
                        .then(response => {
                            document.getElementById('notification-' + notificationId).remove();

                            Swal.fire(
                                'Eliminado',
                                'La notificación ha sido eliminada correctamente.',
                                'success'
                            );
                        })
                        .catch(error => {
                            console.error('Error al eliminar la notificación:', error);

                            Swal.fire(
                                'Error',
                                'Hubo un problema al eliminar la notificación.',
                                'error'
                            );
                        });
                }
            });
        }
    </script>

</body>

</html>
