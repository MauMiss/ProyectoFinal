<div class="container w-full">

    @if (session()->has('success'))
        <div class="bg-success text-white p-2">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="bg-danger text-white p-2">{{ session('error') }}</div>
    @endif

    <h3 class="font-semibold text-2xl">Mascotas del cliente</h3>

        <div class="mb-2">
            <div class="flex ">
                <input class=" bg-[#BFEFFB] border-none rounded-lg w-80" type="text" placeholder="Ingrese el nombre" wire:model.live="filter" required>
            </div>
        </div>

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
                        <td class="py-2 px-2 h-2">{{ $mascota->nombre }}</td>
                        <td class="py-2 px-2 h-2">{{ $mascota->especie }}</td>
                        <td class="py-2 px-2 h-2">{{ $mascota->raza }}</td>
                        <td class="py-2 px-2 h-2">{{ $mascota->sexo }}</td>
                        <td class="py-2 px-2 h-2">{{ $mascota->color }}</td>
                        <td class="py-2 px-2 h-2">{{ $mascota->fecha_nacimiento }}</td>
                        <td class="py-2 px-2 h-2">{{ $mascota->tipo }}</td>
                        <td class="py-2 px-2 h-2">{{ $mascota->user->name }}</td>
                        <td class="py-2 px-2 h-2">{{ $mascota->senas_particulares }}</td>
                        <td class="py-2 px-2 h-10 ">
                            <div class="text-center">
                                <div class="rounded h-10 bg-[#823E70] ">
                                    <a href="/ver-cartilla/{{ $mascota->id }}" class="text-white py-1 px-3"><i class="fa fa-note" aria-hidden="true"></i> Ver Cartilla</a>
                                </div>

                                <div class="mt-3 bg-[#EFBBE1] text-white py-1 px-2 rounded text-xs h-10">
                                    <button class="" wire:click="delete({{ $mascota->id }})">Eliminar Mascota</button>
                                </div>

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
