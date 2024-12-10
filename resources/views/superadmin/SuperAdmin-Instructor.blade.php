<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
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
    </style>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')
    
    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-end items-center relative z-10">

        {{-- FIN Barra Azul --}}

        <div class="flex justify-center w-full">
            <ul class="flex items-center justify-center space-x-4 horizontal-list">
                <li>
                    <a href="{{ route('superadmin.home') }}"
                        class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Administrator') }}"
                        class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Administrador

                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Instructor') }}"
                        class="block text-center text-white px-4 py-2 rounded-lg {{ request()->routeIs('superadmin.SuperAdmin-Instructor') ? 'bg-green-600 bg-opacity-70' : 'bg-green-600 bg-opacity-20 hover:bg-opacity-50' }}">
                        <span class="font-bold">
                            Instructor
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}"
                        class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Aprendices
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Graficas') }}"
                        class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Graficas
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

    <main class="relative flex flex-col items-center mt-4">
        <div class="flex items-center justify-between w-full mb-4">
            <a href="{{ route('superadmin.home') }}" class="ml-4">
                <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
            </a>

            <form class="flex items-center gap-2 mb-4" onsubmit="return false;">
                <input type="text" id="searchInput"
                    placeholder="Buscar por nombre o identificación"class="px-2 py-1 text-sm border border-black rounded-full w-96" />
                <button aria-label="Buscar" class="p-2 -ml-10 bg-transparent border-none cursor-pointer">
                    <img src="{{ asset('img/lupa.png') }}" alt="Buscar" class="w-4 h-auto">
                </button>
            </form>

            <form action="#" method="GET" class="mr-8">
                <a href="{{ route('superadmin.SuperAdmin-InstructorAñadir') }}" type="button"
                    class="p-2 bg-white border-none cursor-pointer">
                    <img src="{{ asset('img/mas.png') }}" alt="Agregar" class="w-5 h-auto">
                </a>
            </form>
        </div>
        <div
            class="w-full max-w-6xl bg-[#2f3e4c14] border-2 border-[#04324D] rounded-lg p-6 shadow-[0_0_10px_rgba(0,0,0,0.8)] mt-1">
            <div id="resultContainer" <div
                class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-6">
                @php
                    $contador = 0;
                @endphp
                @foreach ($users as $user)
                    <a href="{{ route('superadmin.SuperAdmin-InstructorPerfil', ['id' => $user['id']]) }}"
                        class="w-40px h-30px bg-white border-2 border-[#009E00] rounded-2xl m-4 p-2 flex flex-col items-center hover:bg-green-100">
                        <img src="{{ asset('img/administrador/instructor-icon.png') }}" alt="User"
                            class="w-8 h-8 mb-1">
                        <span class="p-1 text-xs text-center ">{{ $user['name'] }} {{ $user['last_name'] }}</span>
                        <span class="p-1 text-xs text-center">{{ $user['identification'] }}</span>
                        <span class="p-1 text-xs text-center">{{ $user['municipality'] }}</span>
                        <span class="p-1 text-xs text-center">{{ $user['role']['role_type'] }}</span>

                        <span class="p-1 text-xs text-center">Aprendices: {{ $user['num_apprentices_assigned'] }}</span>
                    </a>
                    @php
                        $contador++;
                    @endphp
                @endforeach
            </div>
        </div>
        </div>
        <div class="m-4 mt-4 text-sm text-center text-gray-500">Total de registros: {{ $contador }}</div>
    </main>

    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
    <script>
        const searchInput = document.getElementById('searchInput');
        const resultContainer = document.getElementById('resultContainer');

        searchInput.addEventListener('keyup', () => {
            const query = searchInput.value.trim();

            fetch(`/superadmin/SuperAdmin-Instructor?search=${encodeURIComponent(query)}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al cargar los resultados');
                    }
                    return response.text();
                })
                .then(html => {
                    resultContainer.innerHTML = html;
                })
                .catch(error => {
                    console.error('Error:', error);
                    resultContainer.innerHTML =
                        `<p class="text-center text-red-500 col-span-full">Error al cargar resultados. Intenta de nuevo.</p>`;
                });
        });
    </script>
</body>

</html>
