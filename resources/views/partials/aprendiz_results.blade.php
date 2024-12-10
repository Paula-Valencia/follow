    @foreach ($aprendiz as $user)
        <a href="{{ route('superadmin.SuperAdmin-AprendizPerfil', ['id' => $user['id'] ?? '']) }}"
            class="flex flex-col items-center w-full p-4 transition-shadow duration-300 bg-white border border-gray-300 shadow-lg rounded-xl hover:shadow-xl">
            <div class="w-16 h-16 mb-2 overflow-hidden rounded-full">
                <img src="{{ asset('img/administrador/administrador.png') }}" alt="User"
                    class="object-cover w-full h-full">
            </div>

            <div class="space-y-1 text-center">
                <p class="text-sm font-medium text-gray-700">
                    <strong></strong> {{ $user['name'] ?? 'N/A' }} {{ $user['last_name'] ?? 'N/A' }}
                </p>
                <p class="text-xs text-gray-500">
                    <strong>Ficha:</strong> {{ $user['apprentice']['ficha'] ?? 'N/A' }}
                </p>
                <p class="text-xs text-gray-500">
                    <strong>Prog:</strong> {{ $user['apprentice']['program'] ?? 'N/A' }}
                </p>
                <p class="text-xs text-gray-500">
                    <strong>Mod:</strong> {{ $user['apprentice']['modalidad'] ?? 'N/A' }}
                </p>
                <p class="text-xs font-semibold text-green-600">
                    <strong>Rol:</strong> {{ $user['role']['role_type'] ?? 'N/A' }}
                </p>
                <p class="text-xs text-gray-500">
                    <strong>Instr:</strong>
                    {{ $user['apprentice']['trainer']['user']['name'] ?? 'N/A' }}
                    {{ $user['apprentice']['trainer']['user']['last_name'] ?? '' }}
                </p>
            </div>
        </a>
    @endforeach

    @if (empty($aprendiz))
        <p class="text-center text-gray-500 col-span-full">No se encontraron resultados.</p>
    @endif
