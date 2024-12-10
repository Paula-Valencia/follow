<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    <title>Etapa Productiva</title>
    <style>
        .script-font {
            font-family: 'Dancing Script', cursive;
        }

        #userMenu {
            top: 100%;
            margin-top: 0.5rem;
        }

        .notifications {
            display: block;
            width: 54px;
            height: auto;
            filter: invert(1);
        }

        .Flecha {
            display: block;
            position: absolute;
            width: 24px;
            height: auto;
            margin-left: 10px;
            margin-top: 40px;
        }

        .text-ventana {
            color: #ffffff;
            font-size: 20px;
            position: absolute;
            font-family: 'DM Sans', sans-serif;
            left: 50%;
            transform: translateX(-50%);
            top: 85px;
            z-index: 1000;
        }
    </style>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex items-center relative z-10">
        <div class="w-full flex justify-center">
            <ul class="horizontal-list flex space-x-4 justify-center">
                <li>
                    <a href="{{ route('administrator.home') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('administrator.apprentice') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Aprendices
                    </a>
                </li>
                <li>
                    <a href="{{ route('administrator.instructor') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Instructores
                    </a>
                </li>
                <li>
                    <a href="{{ route('administrator.graphic') }}"
                        class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Gráficas
                    </a>
                </li>
            </ul>
        </div>
        <button id="notifButton" class="absolute right-0 mr-4">
            <a href="{{ route('administrator.notificaciones') }}">
                <img class="w-[50px] h-auto filter invert" src="{{ asset('img/notificaciones.png') }}"
                    alt="Notificaciones">
            </a>
        </button>
    </nav>

    <div class="flex justify-center mt-6">
        <main class="bg-gray-100 m-2 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <div class="bg-gray-100 p-6 rounded-lg relative">
                <div class="absolute top-0 left-0 right-0 bg-[#009e00] bg-opacity-60 h-40 rounded-t-lg"></div>

                <div class="relative flex items-start pt-8">
                    <img src="{{ asset('img/administrador/mujer.png') }}" alt="User" class="w-40 h-40 z-10">
                    <div class="ml-6 flex flex-col items-start">
                        <div class="flex items-baseline gap-2">
                            <h1 class="script-font text-4xl font-bold text-black mb-1"
                                style="font-family: 'Times New Roman', serif;">{{ auth()->user()->name }}</h1>
                            <span
                                class="text-2xl font-light uppercase tracking-wider">{{ auth()->user()->last_name }}</span>
                        </div>
                        <p class="text-lg text-black font-light tracking-wide">ADMINISTRADOR</p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mt-8">
                    <div class="w-full md:w-1/2 space-y-4">
                        <h3 class="font-bold mb-4">Datos básicos</h3>
                        <div class="space-y-2">
                            <p><strong>Nombres:</strong> {{ auth()->user()->name }}</p>
                            <p><strong>Apellidos:</strong> {{ auth()->user()->last_name }}</p>
                            <p><strong>Correo electrónico:</strong> {{ auth()->user()->email }}</p>
                            <p><strong>Departamento:</strong> {{ auth()->user()->department }}</p>
                            <p><strong>Municipio:</strong> {{ auth()->user()->municipality }}</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 space-y-4">
                        <h3 class="font-bold mb-4 mt-6 md:mt-0">Modalidad que maneja</h3>
                        <div class="space-y-2">
                            <p> Contrato de Aprendizaje</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-6 space-x-4">
                    <a href="{{ route('administrator.Actualizar-perfil') }}"
                        class="bg-green-700 hover:bg-green-900 text-white py-2 px-4 rounded">Actualizar</a>
                    <a href="{{ route('administrator.home') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded">Cancelar</a>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/Administrator.js') }}"></script>

</body>

</html>
