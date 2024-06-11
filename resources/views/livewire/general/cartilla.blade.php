

<div class="bg-cover bg-center h-full w-full">



    <div class="text-center text-3xl mt-2">
        <p class="uppercase">CARTILLA</p>
    </div>


    @if (session()->has('success'))
        <div class="bg-[#823E70] text-center text-white p-2">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="bg-danger text-white p-2">{{ session('error') }}</div>
    @endif

    @if ($isOpen)
        @include('livewire.veterinario.add-information')
    @else

    <div class="flex md:flex-row flex-col ">


        <div class="md:w-[25%] md:mx-4 mx-6 md:order-1 order-2 md:mt-0 mt-5">
            <div class="max-w-md mx-auto p-6 bg-[#BFEFFB] dark:bg-zinc-800 shadow-md ">
                <div class="text-center mb-4">
                    <h1 class="text-[#545454] text-opacity-50 uppercase text-2xl font-bold">{{ $mascota->nombre }}</h1>
                </div>
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between">
                        <span class="font-semibold">Nombre:</span>
                        <span>{{ $mascota->nombre }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold">Especie:</span>
                        <span>{{ $mascota->especie }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold">Sexo:</span>
                        <span>{{ $mascota->sexo }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold">Fecha de Nacimiento:</span>
                        <span>{{ $mascota->fecha_nacimiento }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold">Raza:</span>
                        <span>{{ $mascota->raza }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold">Color:</span>
                        <span>{{ $mascota->color }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-semibold">Señas Particulares:</span>
                        <span>{{ $mascota->senas_particulares }}</span>
                    </div>
                </div>
                <div class="my-4 mx-auto w-[90%] h-32 overflow-hidden">
                    <img src="{{ asset('storage/' . $mascota->foto) }}" alt="{{ $mascota->nombre }}" class="object-cover w-full h-full">
                </div>
            </div>
        </div>



        <div>

        </div>
        <div class="px-2 md:px-0 md:py-4  md:w-[70%] w-[100%] md:order-2 order-3">

            <div class="flex md:flex-row flex-col space-x-2 items-center">

                <div class=" w-full">
                    <div class="flex justify-between">
                        <div class="w-full text-center">
                            <h3 class="text-[#545454] text-opacity-50 uppercase text-xl font-bold md:block hidden">{{ $title }}</h3>
                        </div>
                        @if (auth()->user()->rol == 'VETERINARIO')
                            <button class="bg-[#823E70] text-white text-nowrap py-1 px-3 rounded mt-3 md:mt-0" wire:click="create()"><i
                                    class="fa fa-plus"></i> Agregar Información</button>
                        @endif
                    </div>

                    <div class="flex flex-col md:flex-row gap-3 items-center overflow-auto">
                        <div>
                            <button class="flex text-[#545454] text-nowrap py-2 px-3 rounded" wire:click="back()"><i
                                    class="fa fa-chevron-left fa-2x"></i> </button>
                        </div>
                        <h3 class="text-3xl block md:hidden">{{ $title }}</h3>
                        <div class="w-full">
                            <div class="overflow-auto bg-[#BFEFFB] h-96 px-6">
                                <table class="w-full mt-3">
                                    <thead class=" border-gray-500">
                                    <th class="text-left p-1 border-r-[#EFBBE1] border-b-[#EFBBE1] border-t-[#BFEFFB]  border-2 bg-[#BFEFFB]">Fecha</th>
                                    <th class="text-left p-1 border-r-[#EFBBE1] border-b-[#EFBBE1] border-t-[#BFEFFB]  border-2 bg-[#BFEFFB]">Peso</th>
                                    <th class="text-left p-1 border-r-[#EFBBE1] border-b-[#EFBBE1] border-t-[#BFEFFB]  border-2 bg-[#BFEFFB]">Descripción</th>
                                    <th class="text-left p-1 border-b-[#EFBBE1] border-t-[#BFEFFB] border-r-[#EFBBE1] border-2 bg-[#BFEFFB]">Próximo control</th>
                                    <th class="text-left p-1 border-b-[#EFBBE1] border-t-[#BFEFFB]  border-2 bg-[#BFEFFB]">Veterinario</th>
                                    </thead>
                                    <tbody>

                                    @foreach ($data as $item)
                                        <tr class="">
                                            <td class="p-1 h-20">{{ $item->fecha }}</td>
                                            <td class="p-1">{{ $item->peso }} Kg</td>
                                            <td class="p-1">{{ $item->descripcion }}</td>
                                            <td class="p-1">{{ $item->proximo_control }}</td>
                                            <td class="p-1">{{ $item->user->name }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div>
                            <button class="flex text-[#545454] text-nowrap py-2 px-3 rounded" wire:click="next()"><i
                                    class="fa fa-chevron-right fa-2x"></i> </button>
                        </div>
                    </div>

                    <div class="px-48 mt-2">
                        {{ $data->links('vendor.custom') }}

                    </div>

                </div>

@endif




