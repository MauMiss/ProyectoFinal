<div class="container w-full">

    @if (session()->has('success'))
        <div class="bg-success text-white p-2">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="bg-danger text-white p-2">{{ session('error') }}</div>
    @endif

    @if($isOpen)
        @include('livewire.admin.usuario.create')
    @else

        <h3 class="font-semibold text-2xl">Lista de usuarios</h3>

        <div class="mb-2">
            <label for="filter">Buscar por nombre</label>
            <div class="flex gap-3">
                <input class="c-input" type="text" placeholder="Ingrese el nombre de usuario" wire:model="filter" required>
                <button class="bg-dark text-white text-nowrap py-1 px-3 rounded" wire:click="search()"><i class="fa fa-search"></i> Buscar </button>
            </div>
        </div>

        <hr class="mt-3 mb-3 border-cyan-800">

        <div class="overflow-auto">

            <div class="text-right">
                <button class="bg-success text-white text-nowrap py-1 px-3 rounded" wire:click="create()"><i class="fa fa-plus"></i> Nuevo Usuario</button>
            </div>

            <table class="w-full mt-3">
                <thead class="border-b border-gray-500">
                    <th class="text-left p-1">Nombre</th>
                    <th class="text-left p-1">Correo</th>
                    <th class="text-left p-1">Dirección</th>
                    <th class="text-left p-1">Teléfono</th>
                    <th class="text-left p-1">Rol</th>
                    <th></th>
                </thead>
                <tbody>

                    @foreach ($usuarios as $usuario)
                    <tr class="border-b border-gray-500 hover:bg-gray-100">
                        <td class="p-1">{{ $usuario->name }}</td>
                        <td class="p-1">{{ $usuario->email }}</td>
                        <td class="p-1">{{ $usuario->direccion }}</td>
                        <td class="p-1">{{ $usuario->telefono }}</td>
                        <td class="p-1">{{ $usuario->rol }}</td>
                        <td class="p-1">
                            <div class="flex justify-end gap-1">
                                <button class="bg-primary text-white py-1 px-3 rounded" wire:click="edit({{ $usuario->id }})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
                                <button class="bg-danger text-white py-1 px-3 rounded" wire:click="delete({{ $usuario->id }})"><i class="fa fa-trash" aria-hidden="true"></i> </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

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
