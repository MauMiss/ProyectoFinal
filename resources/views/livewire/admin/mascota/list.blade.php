<div class="container w-full">

    @if (session()->has('success'))
        <div class="bg-[#823E70] text-center text-white p-2">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="bg-danger text-white p-2">{{ session('error') }}</div>
    @endif

    @if($isOpen)
        @include('livewire.admin.mascota.create')
    @else


        <h3 class="font-semibold text-2xl text-center">Lista de mascotas</h3>

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
                    <tr class="">
                        <td class="py-2 px-4 h-2">{{ $mascota->nombre }}</td>
                        <td class="py-2 px-4 h-2">{{ $mascota->especie }}</td>
                        <td class="py-2 px-4 h-2">{{ $mascota->raza }}</td>
                        <td class="py-2 px-4 h-2">{{ $mascota->sexo }}</td>
                        <td class="py-2 px-4 h-2">{{ $mascota->color }}</td>
                        <td class="py-2 px-4 h-2">{{ $mascota->fecha_nacimiento }}</td>
                        <td class="py-2 px-4 h-2">{{ $mascota->tipo }}</td>
                        <td class="py-2 px-4 h-2">{{ $mascota->user->name }}</td>
                        <td class="py-2 px-4 h-2">{{ $mascota->senas_particulares }}</td>
                        <td class="py-2 px-4 h-2 bg-red-500">

                            <div class="flex justify-end gap-1">
                                <button class="bg-[#823E70] text-white py-1 px-3 rounded" wire:click="edit({{ $mascota->id }})">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                                <button class="bg-[#EFBBE1] text-white py-1 px-3 rounded" wire:click="delete({{ $mascota->id }})">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
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
                <p class="px-4 py-2">No hay mascotas disponibles.</p>
            @endif

    @endif

</div>
