<!DOCTYPE html>
<html lang="es">
@include('partials.head')

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
    @include('partials.header')
    @yield('content')
    @include('partials.nav')
    <main class="relative flex flex-col items-center mt-4">
        <div class="flex items-center justify-between w-full mb-4">
            <a href="{{ route('superadmin.home') }}" class="ml-4">
                <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
            </a>
            <form class="flex items-center gap-2 mb-4" onsubmit="return false;">
                <input type="text" id="searchInput" placeholder="Buscar por nombre o identificación" class="px-2 py-1 text-sm border border-black rounded-full w-96" />
                <button aria-label="Buscar" class="p-2 -ml-10 bg-transparent border-none cursor-pointer">
                    <img src="{{ asset('img/lupa.png') }}" alt="Buscar" class="w-4 h-auto">
                </button>
            </form>


            <form action="#" method="GET" class="mr-8">
                <a href="{{ route('superadmin.SuperAdmin-AdministratorAñadir') }}" type="button" class="p-2 bg-white border-none cursor-pointer">
                    <img src="{{ asset('img/mas.png') }}" alt="Agregar" class="w-5 h-auto">
                </a>
            </form>
        </div>
        <div class="w-full max-w-6xl bg-[#2f3e4c14] border-2 border-[#04324D] rounded-lg p-6 shadow-[0_0_10px_rgba(0,0,0,0.8)] mt-1">
            <div id="resultContainer" <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-6">
                @php
                $contador = 0;
                @endphp
                @foreach ($users as $user)
                <a href="{{ route('superadmin.SuperAdmin-AdministratorPerfil', ['id' => $user['id']]) }}" class="w-40 h-30 bg-white border-2 border-[#009E00] rounded-2xl m-4 p-2 flex flex-col items-center hover:bg-green-100" id="user-link-{{ $user['id'] }}">
                    <img src="{{ asset('img/administrador/administrador.png') }}" alt="User" class="w-8 h-8 mb-1">
                    <span class="p-1 text-xs text-center">{{ $user['name'] }} {{ $user['last_name'] }}</span>
                    <span class="p-1 text-xs text-center">{{ $user['identification'] }}</span>
                    <span class="p-1 text-xs text-center">{{ $user['department'] }}</span>
                    <span class="p-1 text-xs text-center">{{ $user['role']['role_type'] }}</span>

                    <form action="{{ route('superadmin.deleteUser', $user['id']) }}" method="POST" class="mt-2" id="delete-form-{{ $user['id'] }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="flex items-center justify-center p-1 text-sm text-white bg-red-500 rounded-full hover:bg-red-600" onclick="confirmDelete(event, {{ $user['id'] }})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </a>
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

            fetch(`/superadmin/SuperAdmin-Administrator?search=${encodeURIComponent(query)}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                , })
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

    <script>
        function confirmDelete(event, userId) {
            // Previene que el formulario se envíe automáticamente
            event.preventDefault();

            // Muestra el alert de confirmación
            Swal.fire({
                title: '¿Estás seguro?'
                , text: "Esta acción no se puede deshacer."
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#d33'
                , cancelButtonColor: '#3085d6'
                , confirmButtonText: 'Sí, eliminar'
                , cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviar el formulario
                    document.getElementById('delete-form-' + userId).submit();
                }
            });
        }

    </script>
</body>

</html>
