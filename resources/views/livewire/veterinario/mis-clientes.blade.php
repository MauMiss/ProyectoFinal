
<div class="px-20 w-full">

    @if (session()->has('success'))
        <div class="bg-success text-white p-2">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="bg-danger text-white p-2">{{ session('error') }}</div>
    @endif

    @if($isOpen)
        @include('livewire.admin.usuario.create')
    @else

        <h3 class="font-semibold text-2xl text-center">Clientes</h3>


            <div class="mb-2">
                <div class="flex ">
                    <input class=" bg-[#BFEFFB] border-none rounded-lg w-80" type="text" placeholder="Ingrese el nombre" wire:model.live="filter" required>
                </div>
            </div>



            <div class="overflow-x-auto h-96 bg-[#BFEFFB]">
                <table class="min-w-full  rounded-lg">
                    <thead class="bg-[#EFBBE1]">
                    <tr>
                        <th class="py-2 px-4 text-left">Nombre</th>
                        <th class="py-2 px-4 text-left">Correo</th>
                        <th class="py-2 px-4 text-left">Dirección</th>
                        <th class="py-2 px-4 text-left">Teléfono</th>
                        <th class="py-2 px-4 text-center">Ver Mascotas</th>
                    </tr>
                    </thead>
                    <tbody >
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td class="py-2 px-4 h-2">{{ $usuario->name }}</td>
                            <td class="py-2 px-4 h-2">{{ $usuario->email }}</td>
                            <td class="py-2 px-4 h-2">{{ $usuario->direccion }}</td>
                            <td class="py-2 px-4 h-2">{{ $usuario->telefono }}</td>
                            <td class="py-2 px-4 h-2">
                                <div class="flex justify-center gap-1">
                                    <a class="bg-[#823E70] text-white py-1 px-3 rounded" href="/ver-mascotas/{{ $usuario->id }}">Ver mascotas</a>
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
