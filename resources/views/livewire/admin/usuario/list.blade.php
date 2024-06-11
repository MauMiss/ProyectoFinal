<div class="container w-full justify-center flex flex-col ">

    @if (session()->has('success'))
        <div class="bg-[#823E70] text-center text-white p-2">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="bg-danger text-white p-2">{{ session('error') }}</div>
    @endif

    @if($isOpen)
        @include('livewire.admin.usuario.create')
    @else

        <h3 class="font-semibold text-2xl text-center">Lista de usuarios</h3>

            <div class="mb-2">
                <div class="flex ">
                    <input class=" bg-[#BFEFFB] border-none rounded-lg w-80" type="text" placeholder="Ingrese el nombre" wire:model.live="filter" required>
                </div>
            </div>


        <div class="overflow-auto">

            <div class="text-right mb-4">
                <button class="bg-[#823E70] text-white text-nowrap py-1 px-3 rounded" wire:click="create()"><i class="fa fa-plus"></i> Nuevo Usuario</button>
            </div>

            <div class="overflow-x-auto h-96 bg-[#BFEFFB]">
                <table class="min-w-full rounded-lg">
                    <thead class="bg-[#EFBBE1]">
                    <tr>
                        <th class="py-2 px-4 text-left">Nombre</th>
                        <th class="py-2 px-4 text-left">Correo</th>
                        <th class="py-2 px-4 text-left">Dirección</th>
                        <th class="py-2 px-4 text-left">Teléfono</th>
                        <th class="py-2 px-4 text-left">Rol</th>
                        <th class="py-2 px-4 text-left"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr class="">
                            <td class="py-2 px-4 h-2">{{ $usuario->name }}</td>
                            <td class="py-2 px-4 h-2">{{ $usuario->email }}</td>
                            <td class="py-2 px-4 h-2">{{ $usuario->direccion }}</td>
                            <td class="py-2 px-4 h-2">{{ $usuario->telefono }}</td>
                            <td class="py-2 px-4 h-2">{{ $usuario->rol }}</td>
                            <td class="py-2 px-4 h-2">
                                <div class="flex justify-end gap-1">
                                    <button class="bg-[#823E70] text-white py-1 px-3 rounded" wire:click="edit({{ $usuario->id }})">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                    <button class="bg-[#EFBBE1] text-white py-1 px-3 rounded" wire:click="delete({{ $usuario->id }})">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        @if ($usuarios->count())
            <div class="mt-4">
                {{ $usuarios->links() }}
            </div>
            @else
            <p>No hay usuarios disponibles.</p>
            @endif

        </div>

    @endif


</div>
