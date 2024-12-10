<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <script src="{{ asset('js/Trainer.js') }}"></script>
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
    @include('partials.nav-trainner')


    <div class="w-full flex items-center mt-6">
        <a href="{{ route('notificationtrainer') }}" class="mr-4 ml-8">
            <img src="{{ asset('img/flecha.png') }}" alt="Flecha" class="w-5 h-auto">
        </a>
    </div>

    <div
        class="flex flex-col border-2 border-[#D9D9D9] bg-[#ffffff] w-[900px] h-[500px] p-5 mx-auto my-5 rounded-lg shadow-md">
        <label class="flex flex-col">
            <div class="flex items-center mb-2">
                <img src="{{ asset('administrator/icon-email.png') }}" alt="Email" class="w-10 h-10 mr-3">
                <div class="mr-4">
                    <span class="block">Asunto: xxxxxx</span>
                    <span class="block">Para: xxxxxx</span>
                </div>
                <div class="ml-auto">
                    <span class="block">Fecha: xxxxxxxx</span>
                </div>
            </div>
            <span class="mb-1">Descripción</span>
            <textarea name="documentos" rows="4"
                class="w-full h-[300px] p-2 border border-gray-300 bg-[#D9D9D9] rounded-lg resize-none"></textarea>
        </label>

    </div>

    <script src="{{ asset('js/SuperAdmin.js') }}"></script>

    <script>
        function toggleSublist(event) {
            event.preventDefault();
            const sublist = event.target.nextElementSibling;
            if (sublist.classList.contains('hidden')) {
                sublist.classList.remove('hidden');
            } else {
                sublist.classList.add('hidden');
            }
        }
    </script>

</body>

</html>
