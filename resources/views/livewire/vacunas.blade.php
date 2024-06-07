<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liquidy navbar</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<style>
    #pagina2 {
        display: none;
    }
</style>

<body>

<div class="bg-cover bg-center h-full bg-[#AADAE6] bg-opacity-[70%] w-full">
    @include('components.nav')

    <div class="text-center text-3xl mt-2">
        <p class="uppercase">CARTILLA DE {{ $mascota->nombre }}</p>
    </div>

    <div id="pagina1" class="flex md:flex-row flex-col justify-center">


        <div class="md:py-4 md:w-[25%] md:mx-4 mx-6 md:order-1 order-2">
            <div class="max-w-md mx-auto p-4 bg-[#BFEFFB] h-96 shadow-md rounded mt-9">
                <div class="text-center mb-4">
                    <h1 class="text-xl font-bold">MASCOTA</h1>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="text-gray-600">Nombre: {{ $mascota->nombre }}</p>
                        <p class="text-gray-600">Especie: {{ $mascota->especie }}</p>
                        <p class="text-gray-600">Sexo: {{ $mascota->sexo }}</p>
                        <p class="text-gray-600">Fecha de Nacimiento: {{ $mascota->fecha_nacimiento }}</p>
                        <p class="text-gray-600">Raza: {{ $mascota->raza }}</p>
                        <p class="text-gray-600">Color: {{ $mascota->color }}</p>
                        <p class="text-gray-600">Señas Particulares: {{ $mascota->senas_particulares }}</p>
                    </div>
                    <div class="w-[100%] h-32 overflow-hidden">
                        <img src="{{ asset('storage/' . $mascota->foto) }}" alt="{{ $mascota->nombre }} class="object-cover w-full h-full">
                    </div>
                </div>
            </div>
        </div>

        <div class="px-2 md:px-0 md:py-4  md:w-[60%] w-[100%] md:order-2 order-3">

            <div class="flex md:flex-row flex-col space-x-2 items-center">



                <div>
                    <div class="flex justify-between">
                        <div class="w-full text-center">
                            <h3 class="text-2xl">{{ $title }}</h3>
                        </div>
                        @if (auth()->user()->rol == 'VETERINARIO')
                            <button class="bg-success text-white text-nowrap py-1 px-3 rounded" wire:click="create()"><i
                                    class="fa fa-plus"></i> Agregar Información</button>
                        @endif
                    </div>

                    <div class="flex gap-3 items-center overflow-auto">
                        <div>
                            <button class="flex bg-dark text-white text-nowrap py-2 px-3 rounded" wire:click="back()"><i
                                    class="fa fa-chevron-left fa-2x"></i> </button>
                        </div>
                        <div class="w-full">
                            <div class="overflow-auto">
                                <table class="w-full mt-3">
                                    <thead class="border-b border-t border-gray-500">
                                    <th class="text-left p-1">Tratamiento</th>
                                    <th class="text-left p-1">Fecha</th>
                                    <th class="text-left p-1">Peso</th>
                                    <th class="text-left p-1">Descripción</th>
                                    <th class="text-left p-1">Veterinario</th>
                                    <th class="text-left p-1">Próximo control</th>
                                    </thead>
                                    <tbody>

                                    @foreach ($data as $item)
                                        <tr class="border-b border-gray-500 hover:bg-gray-100">
                                            <td class="p-1">{{ $item->tratamiento }}</td>
                                            <td class="p-1">{{ $item->fecha }}</td>
                                            <td class="p-1">{{ $item->peso }}</td>
                                            <td class="p-1">{{ $item->descripcion }}</td>
                                            <td class="p-1">{{ $item->user->name }}</td>
                                            <td class="p-1">{{ $item->proximo_control }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                                @if ($data->count())
                                    <div class="mt-4">
                                        {{ $data->links() }}
                                    </div>
                                @else
                                    <p>No hay información disponible.</p>
                                @endif
                            </div>
                        </div>
                        <div>
                            <button class="flex bg-dark text-white text-nowrap py-2 px-3 rounded" wire:click="next()"><i
                                    class="fa fa-chevron-right fa-2x"></i> </button>
                        </div>
                    </div>
                </div>


@include('components.footer')
</body>
</html>


<script>
    document.getElementById('btnIrPagina2').addEventListener('click', function() {
        document.getElementById('pagina1').style.display = 'none';
        document.getElementById('pagina2').style.display = 'flex';
    });

    document.getElementById('btnRegresarPagina1').addEventListener('click', function() {
        document.getElementById('pagina2').style.display = 'none';
        document.getElementById('pagina1').style.display = 'flex';
    });
</script>
