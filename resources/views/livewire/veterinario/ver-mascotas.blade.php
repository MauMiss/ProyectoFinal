<div class="container w-full">

    @if (session()->has('success'))
        <div class="bg-success text-white p-2">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="bg-danger text-white p-2">{{ session('error') }}</div>
    @endif

    <h3 class="font-semibold text-2xl">Mascotas del cliente</h3>

        <div class="mb-2">
            <label for="filter">Buscar por nombre</label>
            <div class="flex gap-3">
                <input class="c-input" type="text" placeholder="Ingrese el nombre de mascota" wire:model.live="filter" required>
                <button class="bg-dark text-white text-nowrap py-1 px-3 rounded" wire:click="search()"><i class="fa fa-search"></i> Buscar </button>
            </div>
        </div>

        <hr class="mt-3 mb-3 border-cyan-800">

        <div class="overflow-x-auto h-96 bg-[#BFEFFB]">
            <table class="min-w-full rounded-lg">
                <thead class="bg-[#EFBBE1]">
                <tr>
                    <th class="py-2 px-4 text-left">Nombre</th>
                    <th class="py-2 px-4 text-left">Especie</th>
                    <th class="py-2 px-4 text-left">Raza</th>
                    <th class="py-2 px-4 text-left">Sexo</th>
                    <th class="py-2 px-4 text-left">Color</th>
                    <th class="py-2 px-4 text-left">Fecha Nacimiento</th>
                    <th class="py-2 px-4 text-left">Tipo</th>
                    <th class="py-2 px-4 text-left">Propietario</th>
                    <th class="py-2 px-4 text-left">Señas particulares</th>
                    <th class="py-2 px-4 text-left">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($mascotas as $mascota)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4">{{ $mascota->nombre }}</td>
                        <td class="py-2 px-4">{{ $mascota->especie }}</td>
                        <td class="py-2 px-4">{{ $mascota->raza }}</td>
                        <td class="py-2 px-4">{{ $mascota->sexo }}</td>
                        <td class="py-2 px-4">{{ $mascota->color }}</td>
                        <td class="py-2 px-4">{{ $mascota->fecha_nacimiento }}</td>
                        <td class="py-2 px-4">{{ $mascota->tipo }}</td>
                        <td class="py-2 px-4">{{ $mascota->user->name }}</td>
                        <td class="py-2 px-4">{{ $mascota->senas_particulares }}</td>
                        <td class="py-2 px-4">
                            <div class="flex justify-end gap-1">
                                <a href="/ver-cartilla/{{ $mascota->id }}" class="bg-[#823E70] text-white py-1 px-3 rounded"><i class="fa fa-note" aria-hidden="true"></i> Ver Cartilla</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>


        @if ($mascotas->count())
            <div class="mt-4">
                {{ $mascotas->links() }}
            </div>
        @else
            <p>No hay mascotas disponibles.</p>
        @endif
</div>
