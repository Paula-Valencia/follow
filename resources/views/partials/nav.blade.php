 <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-end items-center relative z-10">

        <div class="flex items-center justify-center w-full">
            <ul class="flex items-center justify-center space-x-4 horizontal-list">
                <li>
                    <a href="{{ route('superadmin.home') }}" class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Administrator') }}" class="block text-center text-white px-4 py-2 rounded-lg {{ request()->routeIs('superadmin.SuperAdmin-Administrator') ? 'bg-green-600 bg-opacity-70' : 'bg-green-600 bg-opacity-20 hover:bg-opacity-50' }}">
                        <span class="font-bold">
                            Administradores
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Instructor') }}" class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Instructores
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Aprendiz') }}" class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Aprendices
                    </a>
                </li>
                <li>
                    <a href="{{ route('superadmin.SuperAdmin-Graficas') }}" class="block px-4 py-2 text-center text-white transition bg-transparent rounded-lg hover:bg-green-700">
                        Graficas
                    </a>
                </li>
                <!-- Botón de notificaciones alineado a la derecha -->
                <button id="notifButton" class="absolute right-0 items-center mr-4">
                    <a href="{{ route('superadmin.SuperAdmin-Notificaciones') }}">
                        <img class="w-[50px] h-auto filter invert items-center " src="{{ asset('img/notificaciones.png') }}" alt="Notificaciones">
                    </a>
                </button>



            </ul>
        </div>
    </nav>