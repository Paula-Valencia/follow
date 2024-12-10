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
    <header class="bg-white text-[#009e00] px-5 py-2.5 flex flex-col items-center border-t-[5px] border-t-white border-b border-b-[#e0e0e0]">
        <div class="flex justify-between w-full">
            <div class="flex items-center">
                <img class="w-[70px] h-[70px]" src="{{ asset('img/logo-sena.png') }}" alt="Sena Logo ">
                <div class="flex-grow m-2"></div>
                <div class="text-left">
                    <a href="{{ route('administrator.home') }}" class="flex items-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Etapa Seguimiento Logo" class="w-10 h-auto mr-1.5">
                        <div class="flex flex-col text-left">
                            <h2 class="text-[12px] m-0 text-[#009e00]">Etapa</h2>
                            <h2 class="text-[12px] m-0 text-[#009e00]">Productiva</h2>
                        </div>
                    </a>
                    <h2 class="text-sm mt-2 text-[#009e00]">Centro de Comercio y Servicios</h2>
                </div>
            </div>
        </div>
    </header>
    <nav class="bg-[#009e00] px-2.5 h-14 py-1.5 flex items-center relative z-10">
        <div class="w-full flex justify-center">
            <ul class="horizontal-list flex space-x-4 justify-center">
                <li>
                    <a href="{{ route('administrator.home') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('administrator.apprentice') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Aprendices
                    </a>
                </li>
                <li>
                    <a href="{{ route('administrator.instructor') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Instructores
                    </a>
                </li>
                <li>
                    <a href="{{ route('administrator.graphic') }}" class="block text-white text-center bg-transparent px-4 py-2 rounded-lg hover:bg-green-700 transition">
                        Gráficas
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="flex justify-center mt-6">
        <main class="bg-gray-100 m-2 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3">
            <form method="POST" action='/api/user_registers'>
                @csrf
                <div class="bg-gray-100 p-6 rounded-lg relative">
                    <div class="absolute top-0 left-0 right-0 bg-[#009e00] bg-opacity-60 h-40 rounded-t-lg"></div>

                    <div class="relative flex items-start pt-8">
                        <img src="{{ asset('img/administrador/mujer.png') }}" alt="User" class="w-40 h-40 z-10">
                        <div class="ml-6 flex flex-col items-start">
                            <p style="font-family: 'Times New Roman', serif;" class="text-4xl font-bold text-black mb-1">
                                {{ auth()->user()->name }} {{ auth()->user()->last_name }}
                            </p>

                            <p class="text-lg text-black font-light tracking-wide">ADMINISTRADOR</p>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-6 mt-8">
                        <div class="w-full md:w-1/2 space-y-4">
                            <h3 class="font-bold mb-4">Datos básicos</h3>
                            <div class="space-y-2">
                                <label class="block">
                                    <strong>Nombre:</strong>
                                    <input type="text" name="name" class="w-full bg-white border rounded-lg p-1 mt-1" value="{{ auth()->user()->name }}">
                                </label>

                                <label class="block">
                                    <strong>Correo electrónico:</strong>
                                    <input type="email" name="email" class="w-full bg-white border rounded-lg p-1 mt-1" value="{{ auth()->user()->email }}">
                                </label>

                                <label class="block">
                                    <strong>Departamento:</strong>
                                    <input type="string" name="department" class="w-full bg-white border rounded-lg p-1 mt-1" value="{{ auth()->user()->department }}">
                                </label>

                                <label class="block">
                                    <strong>Municipio:</strong>
                                    <input type="text" name="municipality" class="w-full bg-white border rounded-lg p-1 mt-1" value="{{ auth()->user()->municipality }}">
                                </label>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 space-y-4">
                            <h3 class="font-bold mb-4 mt-6 md:mt-0">Modalidad que maneja</h3>
                            <div class="space-y-2">
                                <label class="block">
                                    <input type="text" name="modality" class="w-full bg-white border rounded-lg p-1 mt-1" value="Contrato de Aprendizaje">
                                </label>
                                <label class="block">
                                    <input type="text" name="modality" class="w-full bg-white border rounded-lg p-1 mt-1" value="Contrato de Aprendizaje">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6 space-x-4">
                        <button type="submit" class="bg-green-700 hover:bg-green-900 text-white py-2 px-4 rounded">Guardar Cambios</button>
                        <a href="{{ route('administrator.Administrator-perfil') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded">Cancelar</a>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <script src="{{ asset('js/Administrator.js') }}"></script>
</body>
</html>
