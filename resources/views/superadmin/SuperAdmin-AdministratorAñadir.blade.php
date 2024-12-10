<!DOCTYPE html>
<html lang="es">
@include('partials.head')

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">
  
  @include('partials.header')
    @yield('content')
    @include('partials.nav')

    <div class="flex items-center justify-between w-full mt-6">
        <a href="{{ route('superadmin.SuperAdmin-Administrator') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>
    <div class="flex justify-center">
        <main class="bg-white m-4 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3 items-center">
            <div class="p-6 bg-gray-100 rounded-lg">
                <form action="{{ route('superadmin.storeUser') }}" method="POST">
                    @csrf
                    <div class="flex justify-center">
                        <main class=" bg-white m-4 p-2 rounded-lg  shadow-[0_0_10px_rgba(0,0,0,0.8)]  border-[#2F3E4C] w-2/3 items-center ">
                            <div class="p-6 bg-gray-100 rounded-lg ">
                                <div class="mb-6 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-40 h-40 m-4 mx-auto text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <h1 class="m-0 text-lg font-bold text-black">ADMINISTRADOR</h1>
                                </div>

                                <h3 class="mb-4 font-bold">Datos básicos</h3>
                                <div class="grid grid-cols-3 gap-4 mb-6">
                                    <div>
                                        <label class="block text-gray-700">Nombre</label>
                                        <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Nombre" required>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Apellido</label>
                                        <input type="text" name="last_name" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Apellido" required>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Cédula</label>
                                        <input type="text" name="identification" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Cédula" required>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Correo</label>
                                        <input type="email" name="email" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Correo" required>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Celular</label>
                                        <input type="text" name="telephone" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Celular" required>
                                    </div>
                                </div>

                                <h3 class="mt-6 mb-4 font-bold">Lugar de Residencia</h3>
                                <div class="grid grid-cols-3 gap-4 mb-6">
                                    <div>
                                        <label class="block text-gray-700">Departamento:</label>
                                        <input type="text" name="department" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Departamento" required>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Municipio:</label>
                                        <input type="text" name="municipality" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Municipio" required>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700">Dirección:</label>
                                        <input type="text" name="address" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Dirección" required>
                                    </div>
                                </div>

                                <!-- Rol de usuario (según tu ejemplo, 'id_role' será fijo o seleccionado) -->
                                <div>
                                    {{-- <label class="block text-gray-700">Rol</label> --}}
                                    <input type="hidden" name="id_role" value="1"> <!-- O el valor adecuado -->
                                </div>

                                <!-- Contraseña -->
                                {{-- <div>
                                    <label class="block text-gray-700">Contraseña</label>
                                    <input type="password" name="password" class="w-full border border-gray-300 rounded-lg p-2.5" placeholder="Contraseña" required>
                                </div> --}}

                                <div class="flex justify-end mt-6 space-x-4">
                                    <button type="submit" class="px-4 py-2 text-white bg-green-700 rounded hover:bg-green-900">Confirmar</button>
                                    <a href="{{ route('superadmin.SuperAdmin-Administrator') }}" class="px-4 py-2 text-gray-800 bg-gray-300 rounded hover:bg-gray-400">Cancelar</a>
                                </div>
                            </div>
                        </main>
                    </div>
                </form>

            </div>
        </main>
    </div>

    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>

</html>
