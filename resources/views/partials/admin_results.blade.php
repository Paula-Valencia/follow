@foreach ($data as $user)
    <a href="{{ route('superadmin.SuperAdmin-AprendizPerfil', ['id' => $user['id']]) }}"
        class="w-40 h-30 bg-white border-2 border-[#009E00] rounded-2xl m-4 p-2 flex flex-col items-center hover:bg-green-100">
        <img src="{{ asset('img/administrador/administrador.png') }}" alt="User" class="w-8 h-8 mb-1">
        <span class="p-1 text-xs text-center">{{ $user['name'] }} {{ $user['last_name'] }}</span>
        <span class="p-1 text-xs text-center">{{ $user['identification'] }}</span>
        <span class="p-1 text-xs text-center">{{ $user['department'] }}</span>
        <span class="p-1 text-xs text-center">{{ $user['role']['role_type'] }}</span>
    </a>
@endforeach

@if (empty($data))
    <p class="text-center text-gray-500 col-span-full">No se encontraron resultados.</p>
@endif
