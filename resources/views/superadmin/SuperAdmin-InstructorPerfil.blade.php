<!DOCTYPE html>
<html lang="es">

@include('partials.head')

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')
    @yield('content')
    @include('partials.nav')

    <div class="flex items-center justify-between w-full mt-6">
        <a href="{{ route('superadmin.SuperAdmin-Instructor') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <div class="flex justify-center mt-6">
        <main class="bg-gray-100 m-2 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <div class="p-6 bg-gray-100 rounded-lg">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('img/administrador/instructor-icon.png') }}" alt="User"
                        class="w-40 h-40 mb-4">
                </div>
                <div class="mb-6 text-center">
                    <h1 class="m-0 text-lg font-bold text-black">INSTRUCTOR</h1>
                </div>

                <form action="{{ route('superadmin.updateInstructor', $user['id']) }}" method="POST">
                @csrf
                @method('PUT') 

                    <h3 class="mb-4 font-bold">Datos básicos</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombres:</label>
                            <input type="text" name="name" value="{{ $user['name'] }}" 
                                class="w-full p-1 mt-1 text-sm bg-white border border-gray-300 rounded-md h-7">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Apellidos:</label>
                            <input type="text" name="last_name" value="{{ $user['last_name'] }}" 
                                class="w-full p-1 mt-1 text-sm bg-white border border-gray-300 rounded-md h-7">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Correo electrónico:</label>
                            <input type="email" name="email" value="{{ $user['email'] }}" 
                                class="w-full p-1 mt-1 text-sm bg-white border border-gray-300 rounded-md h-7">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Cuenta Soy SENA:</label>
                            <input type="text" name="soy_sena" value="{{ $user['email'] }}" 
                                class="w-full p-1 mt-1 text-sm bg-white border border-gray-300 rounded-md h-7">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Departamento:</label>
                            <input type="text" name="department" value="{{ $user['department'] }}" 
                                class="w-full p-1 mt-1 text-sm bg-white border border-gray-300 rounded-md h-7">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Municipio:</label>
                            <input type="text" name="municipality" value="{{ $user['municipality'] }}" 
                                class="w-full p-1 mt-1 text-sm bg-white border border-gray-300 rounded-md h-7">
                        </div>
                    </div>

                    <h3 class="mt-6 mb-4 font-bold">Lugar de Residencia</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Departamento:</label>
                            <input type="text" name="residence_department" value="{{ $user['department'] }}" 
                                class="w-full p-1 mt-1 text-sm bg-white border border-gray-300 rounded-md h-7">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Municipio:</label>
                            <input type="text" name="residence_municipality" value="{{ $user['municipality'] }}" 
                                class="w-full p-1 mt-1 text-sm bg-white border border-gray-300 rounded-md h-7">
                        </div>
                    </div>

                    {{-- <h3 class="mt-6 mb-4 font-bold">Información Seguimiento</h3> --}}

                    <div class="flex justify-end mt-6 space-x-4">
                        <button type="submit"
                            class="bg-[#009e00] hover:bg-[#37a837] text-white py-2 px-4 rounded">Actualizar</button>
                        <a href="{{ route('administrator.instructor') }}"
                            class="px-4 py-2 text-black bg-gray-300 rounded hover:bg-gray-400">Cancelar</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/SuperAdmin.js') }}"></script>
</body>

</html>