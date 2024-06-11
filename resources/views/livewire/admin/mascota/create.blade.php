<div class="flex flex-col sm:flex-row  w-full">

    <div class="sm:w-1/3 hidden lg:block -translate-x-24">
        <img class="w-full h-auto" src="{{ asset('storage/dalmata.png') }}">
    </div>

    <div class="bg-[#B3EAF5] p-6 max-w-md mx-auto sm:w-1/3 w-full rounded-sm">

        <h1 class="text-center text-2xl mb-4">{{ $title }}</h1>

        <form>
            <!-- Nombre -->
            <div class="mb-8 border-b border-[#545454] focus:border-none">
                <input
                    type="text"
                    placeholder="Nombre"
                    class="w-full p-2 border-none bg-transparent dark:text-white focus:outline-none"
                    id="nombre"
                    wire:model="nombre"
                    required
                />
            </div>

            @error('nombre') <span>{{ $message }}</span> @enderror

            <!-- Sexo -->
            <div class="flex justify-around mb-4">
                <label class="flex items-center cursor-pointer">
                    <input type="radio" name="sexo" value="Hembra" class="hidden peer" wire:model="sexo" />
                    <div class="w-5 h-5 rounded-full border-2 border-[#FFB6C1] flex items-center justify-center peer-checked:bg-[#FFB6C1]"></div>
                    <span class="ml-2">Hembra</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input type="radio" name="sexo" value="Macho" class="hidden peer" wire:model="sexo" />
                    <div class="w-5 h-5 rounded-full border-2 border-[#FFB6C1] flex items-center justify-center peer-checked:bg-[#FFB6C1]"></div>
                    <span class="ml-2">Macho</span>
                </label>
            </div>
            @error('sexo') <span>{{ $message }}</span> @enderror

            <!-- Raza -->
            <div class="mb-4 border-b border-[#545454] focus:border-none">
                <input
                    type="text"
                    placeholder="Raza"
                    class="w-full p-2 border-none bg-transparent dark:text-white focus:outline-none"
                    id="raza"
                    wire:model="raza"
                    required
                />
            </div>

            @error('raza') <span>{{ $message }}</span> @enderror

            <div class="flex justify-center mb-4">
                <strong>Selecciona su Especie</strong>
            </div>

            <!-- Especie -->
            <div class="flex justify-around mb-8">

                <label class="cursor-pointer">
                    <input type="radio" name="especie" value="Perro" class="hidden peer" wire:model="especie" />
                    <div class="w-16 h-12 border-2 border-zinc-400 flex items-center justify-center peer-checked:bg-[#EFBBE1]">
                        <i class="fa-solid fa-bone"></i>
                    </div>
                </label>

                <label class="cursor-pointer">
                    <input type="radio" name="especie" value="Gato" class="hidden peer" wire:model="especie" />
                    <div class="w-16 h-12 border-2 border-zinc-400 flex items-center justify-center peer-checked:bg-[#EFBBE1]">
                        <i class="fa-solid fa-fish"></i>
                    </div>
                </label>
            </div>
            @error('especie') <span>{{ $message }}</span> @enderror

            <!-- Fecha de Nacimiento -->
            <strong class="block mb-2"> Fecha de Nacimiento</strong>
            <input
                type="date"
                class="w-full mb-4 p-2 border-b border-zinc-400 bg-transparent"
                id="fecha_nacimiento"
                wire:model="fecha_nacimiento"
                required
            />
            @error('fecha_nacimiento') <span>{{ $message }}</span> @enderror

            <!-- Color -->
            <div class="mb-4 border-b border-[#545454] focus:border-none">
                <input
                    type="text"
                    placeholder="Color"
                    class="w-full p-2 border-none bg-transparent dark:text-white focus:outline-none"
                    id="color"
                    wire:model="color"
                    required
                />
            </div>

            @error('color') <span>{{ $message }}</span> @enderror

            <!-- Imagen -->
            <div class="mb-4">
                <label for="imagen" class="bg-transparent border-[#545454] border text-[#545454] font-bold py-2 px-4 cursor-pointer">
                    Agregar Foto
                </label>
                <input
                    type="file"
                    class="hidden"
                    id="imagen"
                    wire:model="imagen"
                />
                @error('imagen') <span>{{ $message }}</span> @enderror
            </div>


            <!-- Botones de acción -->
            <div class="flex justify-between">
                <button
                    type="button"
                    class="py-2 bg-[#823E70] text-white w-[40%]"
                    wire:click.prevent="closeModal()"
                >Cancelar</button>
                <button
                    type="button"
                    class=" py-2 bg-[#823E70] text-white w-[40%]"
                    wire:click.prevent="store()"
                >Listo</button>
            </div>
        </form>


    </div>

</div>









