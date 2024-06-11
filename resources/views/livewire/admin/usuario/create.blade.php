
<div class="flex justify-center">

    <form class="flex flex-col w-[33%] bg-[#BFEFFB] p-6">
        <label class="text-center text-2xl">AGREGA UN USUARIO</label>
        <input type="hidden" wire:model="id">

        <div class="mb-5 border-b border-[#545454] focus:border-none">
            <div class="flex items-center py-2">
                <i class="fa-solid fa-font-awesome"></i>
                <select
                    class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none"
                    wire:model="rol"
                    id="rol"
                    required
                >
                    <option value="USUARIO">Usuario</option>
                    <option value="ADMINISTRADOR">Administrador</option>
                    <option value="VETERINARIO">Veterinario</option>
                </select>
                @error('rol') <span>{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-5 border-b border-[#545454] focus:border-none">
            <div class="flex items-center py-2">
                <i class="fa-solid fa-user"></i>
                <input
                    id="name"
                    class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none"
                    type="text"
                    wire:model="name"
                    required
                    placeholder="Nombre"
                />
                @error('name') <span>{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-5 border-b border-[#545454] focus:border-none">
            <div class="flex items-center py-2">
                <i class="fa-solid fa-envelope"></i>
                <input
                    id="email"
                    class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none"
                    type="email"
                    wire:model="email"
                    required
                    placeholder="Email"
                />
                @error('email') <span>{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-5 border-b border-[#545454] focus:border-none">
            <div class="flex items-center py-2">
                <i class="fa-solid fa-lock"></i>
                <input
                    id="password"
                    class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none"
                    type="password"
                    wire:model="password"
                    required
                    placeholder="Contraseña"
                />
                @error('password') <span>{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-5 border-b border-[#545454] focus:border-none">
            <div class="flex items-center py-2">
                <i class="fa-solid fa-location-dot"></i>
                <input
                    id="direccion"
                    class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none"
                    type="text"
                    wire:model="direccion"
                    required
                    placeholder="Dirección"
                />
                @error('direccion') <span>{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mb-5 border-b border-[#545454] focus:border-none">
            <div class="flex items-center py-2">
                <i class="fa-solid fa-phone"></i>
                <input
                    id="telefono"
                    class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none"
                    type="text"
                    wire:model="telefono"
                    required
                    placeholder="Teléfono"
                />
                @error('telefono') <span>{{ $message }}</span> @enderror
            </div>
        </div>

<div class="flex justify-between">
    <button class="w-[40%] bg-[#823E70] text-white py-1 px-3 rounded" type="button" wire:click.prevent="store()">
        <i class="fas fa-save mr-1"></i> Guardar
    </button>
    <button class="w-[40%] bg-[#EFBBE1] text-white py-1 px-3 rounded" type="button" wire:click.prevent="closeModal()">
        <i class="fas fa-times mr-1"></i> Cancelar
    </button>

</div>

    </form>
</div>
