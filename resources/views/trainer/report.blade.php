<!DOCTYPE html>
<html lang="es">

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

    <!--Notificaciones -->
    @include('partials.nav-trainner')

    <div class="w-full flex justify-between items-center mt-4">
        <a href="{{ route('notificationtrainer') }}" class="ml-4">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <div class="w-auto flex justify-start m-2 pl-56 items-center"></div>
    <div class="flex justify-center">

        <main class="bg-white m-4 p-2 rounded-lg shadow-[0_0_10px_rgba(0,0,0,0.8)] border-[#2F3E4C] w-2/3 items-center">
            <h1 class="text-2xl font-bold mb-4">Reporte - notificación</h1>
            <!-- Formulario para enviar la notificación -->
            <form action="{{ route('createNotificationTrainner') }}" method="POST" class="mb-4">
                @csrf

                <select name="user_id" class="border p-2 rounded w-full mb-2" required>
                    <option value="" disabled selected>Seleccionar aprendiz</option>
                    @foreach ($apprentices[0]['apprentices'] as $apprentice)
                        <option value="{{ $apprentice['user']['id'] }}">
                            {{ $apprentice['user']['name'] }} {{ $apprentice['user']['last_name'] }}
                        </option>
                    @endforeach
                </select>

                <textarea name="message" placeholder="Asunto" class="border p-2 rounded w-full mb-2" required></textarea>

                <!-- Botón de Enviar -->
                <button type="submit" class="bg-[#009e00] text-white p-2 rounded">Enviar</button>

                <!-- Botón de Cancelar -->
                <a href="{{ route('notificationtrainer') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-black p-2 rounded">Cancelar</a>
            </form>
        </main>

    </div>

</body>

</html>
