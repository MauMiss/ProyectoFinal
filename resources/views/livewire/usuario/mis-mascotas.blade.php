<div class="container w-full">

    @if (session()->has('success'))

        <div id="alertModal" class="modal fixed inset-0 bg-[#AADAE6] bg-opacity-50 flex items-center justify-center" style="z-index: 9999;">
            <div class="bg-[#EFBBE1] p-3 rounded-lg shadow-lg max-w-sm w-60 relative">
                <div class="flex mb-2">
                    <div class="w-[60%] flex justify-end">
                        <img src="{{ asset('storage/GUF.gif') }}" alt="GIF" width="35%" height="10%">
                    </div>
                    <div class=" w-[40%] flex justify-end">
                        <button id="closeButton"><i class="fa-solid fa-xmark text-2xl"></i></button>
                    </div>
                </div>
                <div>
                    <p>El clima de nuestro estado es idóneo para las pulgas,
                        garrapatas, moscos, moscas y otros insectos; debido a
                        esto es importante proteger y controlar la cantidad de
                        ectoparásitos en tu mascota.</p>
                </div>
            </div>
        </div>

    @endif

    @if (session()->has('error'))
        <div class="bg-danger text-white p-2">{{ session('error') }}</div>
    @endif

    @if($isOpen)
        @include('livewire.admin.mascota.create')
    @else

        <h3 class="font-semibold text-center text-4xl">Mis Mascotas</h3>

        <div class="mt-4 mb-4">
            <div class="flex gap-3">
                <button class="bg-[#EFBBE1] text-white text-nowrap py-1 px-3 rounded" wire:click="create()"><i class="fa-solid fa-paw"></i> Agregar Mascota </button>
            </div>
        </div>



        <div class="overflow-auto">

            <div class="grid md:grid-cols-3 grid-cols-2 md:gap-10 gap-4 mt-4 w-[100%]">
                @foreach($mascotas as $mascota)
                    <div class="bg-[#BFEFFB] rounded-md shadow-md md:h-full">
                        <div class="h-32 md:relative">
                            <img class="rounded-t-md h-full w-full object-cover hover:brightness-50" src="{{ asset('storage/' . $mascota->foto) }}" alt="{{ $mascota->nombre }}">
                            <a href="/ver-cartilla/{{ $mascota->id }}" class="md:absolute inset-0 flex items-center justify-center bg-white bg-opacity-70 opacity-0 hover:opacity-100 transition-opacity duration-300 text-2xl">
                                Ver Cartilla
                            </a>
                        </div>

                        <div class="mt-2 flex justify-between flex-col md:flex-row items-center p-2">
                            <h2 class="text-lg font-bold">{{ $mascota->nombre }}</h2>
                            @if($mascota->especie == 'Perro')
                                <button><i class="fa-solid fa-bone text-2xl"></i></button>
                            @elseif($mascota->especie == 'Gato')
                                <button><i class="fa-solid fa-fish text-2xl"></i></button>
                            @endif
                            <p class="text-gray-600">{{ $mascota->sexo }}</p>
                        </div>
                    </div>
                @endforeach
            </div>


            @if ($mascotas->count())
                <div class="mt-4">
                    {{ $mascotas->links() }}
                </div>
            @else
                <p>No hay mascotas disponibles.</p>
            @endif

        </div>




    @endif


</div>

