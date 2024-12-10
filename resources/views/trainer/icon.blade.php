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
    </style>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex justify-start items-center relative z-10">

        <div class="w-full flex justify-center">
            <ul class="horizontal-list flex space-x-4 justify-center">
                <li>
                    <a href="{{ route('icon') }}"
                        class="block text-white text-center px-4 py-2 rounded-lg  hover:bg-green-700 transition font-bold
                              {{ request()->routeIs('apprentice.home') ? 'bg-green-600' : 'hover:bg-green-600' }}">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('report') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Reportes
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

    </div>
    <main class="flex flex-col items-center mt-4 relative">
        <div class="w-full flex justify-between items-center mb-4">
            <a href="{{ route('icon') }}" class="ml-4">
                <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
            </a>

            <form action="#" method="GET" class="flex items-center justify-center mx-auto pl-20">
                <input placeholder="Buscar..." class="px-2  py-1 text-sm border border-black rounded-full w-96">
                <button type="submit" aria-label="Buscar" class="p-2 bg-transparent border-none cursor-pointer -ml-10">
                    <img src="{{ asset('img/lupa.png') }}" alt="Buscar" class="w-4 h-auto">
                </button>
            </form>
            <div class="bg-white border-none pr-28 cursor-pointer">
            </div>
        </div>

        <div
            class="w-full max-w-6xl bg-[#2f3e4c14] border-2 border-[#04324D] rounded-lg p-6 shadow-[0_0_10px_rgba(0,0,0,0.8)] mt-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-6 gap-4">
                @php
                    $contador = 0;
                @endphp
                @for ($i = 0; $i < 24; $i++)
                    <a href="{{ route('perfilapre') }}"
                        class=" w-40px h-30px  bg-white border-2 border-[#009E00] rounded-2xl m-4 p-2 flex flex-col items-center hover:bg-green-100">
                        <img src="{{ asset('img/trainer/aprendiz_icono_tra.png') }}" alt="User"
                            class="w-6 h-8 mb-1">
                        <span class="text-xs text-center p-1">Nombre Completo</span>
                        <span class="text-xs text-center p-1">Cédula</span>
                        <span class="text-xs text-center p-1">Ficha</span>
                        <span class="text-xs text-center p-1">Tipo de seguimineto</span>
                    </a>
                    @php
                        $contador++;
                    @endphp
                @endfor
            </div>
        </div>
        <div class="bg-[#009E00] border-2 border-[black] rounded-lg p-2 mb-2">
            <div class="text-center text-sm text-black">Total de Aprendices: {{ $contador }}</div>
        </div>
    </main>


    <script src="{{ asset('js/Trainer.js') }}"></script>

</body>

</html>
