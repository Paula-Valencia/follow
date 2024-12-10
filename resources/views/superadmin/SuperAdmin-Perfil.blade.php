<!DOCTYPE html>
<html lang="es">
@include('partials.head')

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')
    @yield('content')
    @include('partials.nav')

    <div class="flex items-center justify-between w-full mt-6">
        <a href="{{ route('superadmin.home') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>
    <div class="flex justify-center mt-6">
        <main class="bg-gray-100  m-2 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="mb-6 text-center">
                    <div class="flex items-center justify-center">
                        <img id="profilePreview" src="{{ asset('img/administrador/mujer.png') }}" alt="User"
                            class="w-40 h-40 mb-4">
                    </div>
                    <h1 class="m-0 text-lg font-bold text-black">SUPER</h1>
                    <h1 class="m-0 text-lg font-bold text-black">ADMINISTRADOR</h1>
                </div>

                <h3 class="mb-4 font-bold">Datos básicos</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombres:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white rounded-md h-7">
                            {{ session('user.name') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apellidos:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white rounded-md h-7">
                            {{ session('user.last_name') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cedula:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white rounded-md h-7">
                            {{ session('user.identification') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Telefono:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white rounded-md h-7">
                            {{ session('user.telephone') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Correo electrónico:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white rounded-md h-7">
                            {{ session('user.email') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha de nacimiento:</label>
                        <p type="date" class="w-full p-1 mt-1 text-sm text-black bg-white rounded-md h-7">
                        </p>
                    </div>
                </div>

                <h3 class="mt-6 mb-4 font-bold">Lugar de Residencia</h3>
                <div class="space-y-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Departamento:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white rounded-md h-7">
                            {{ session('user.department') }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Municipio:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white rounded-md h-7">
                            {{ session('user.municipality') }}
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Dirección:</label>
                        <p class="w-full p-1 mt-1 text-sm text-black bg-white rounded-md h-7">
                            {{ session('user.address') ?? '' }}
                        </p>
                    </div>
                </div>

                <!-- Campo para cargar foto de perfil -->
                <h3 class="mt-6 mb-4 font-bold">Foto de perfil</h3>
                <form action="{{ route('superadmin.updateProfilePhoto') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST') <!-- Se usa PUT para actualizar el recurso -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Cargar Foto de Perfil:</label>
                        <input type="file" name="profile_photo" accept="image/*"
                            class="w-full p-1 mt-1 text-sm text-black bg-white rounded-md"
                            onchange="previewImage(event)">
                    </div>

                    <div class="flex justify-end mt-6 space-x-4">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-green-700 rounded hover:bg-green-900">Actualizar
                            Foto</button>
                        <a href="{{ route('superadmin.home') }}"
                            class="px-4 py-2 text-gray-800 bg-gray-300 rounded hover:bg-gray-400">Cancelar</a>
                    </div>
                </form>

            </div>
        </main>
    </div>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profilePreview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>

</html>
