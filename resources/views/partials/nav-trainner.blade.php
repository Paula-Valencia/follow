<nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-start items-center relative z-10">

    <div class="w-full flex justify-center">
        <ul class="horizontal-list flex space-x-4 justify-center">
            <li>
                <a href="{{ route('trainer.home') }}"
                    class="block text-white text-center px-4 py-2 rounded-lg  hover:bg-green-700 transition font-bold
                          {{ request()->routeIs('apprentice.home') ? 'bg-green-600' : 'hover:bg-green-600' }}">
                    Inicio
                </a>
            </li>
            <li>
                <a href="{{ route('cronograma') }}"
                    class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    Cronograma
                </a>
            </li>
        </ul>
    </div>
    <button id="notifButton" class="relative">
        <a href="{{ route('notificationtrainer') }}">
            <img class="w-[50px] h-auto mr-3 filter invert" src="{{ asset('img/notificaciones.png') }}"
                alt="Notificaciones">
        </a>
    </button>
</nav>