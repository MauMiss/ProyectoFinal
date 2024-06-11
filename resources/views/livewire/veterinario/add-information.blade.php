<div class="flex items-center justify-center min-h-screen bg-[#AADAE6] bg-opacity-[#70%] text-[#545454]">
    <div class="bg-[#BFEFFB] p-8 rounded-sm shadow-md w-full max-w-md">
        <h2 class="text-center text-2xl font-semibold mb-6">Agrega un Registro</h2>
        <form class="w-full">
            <input type="hidden" wire:model="idRegistro">

            <div class="mb-4 border-b-2 border-[#545454]">
                <select class="w-full border-none border-zinc-400 focus:border-zinc-600 outline-none bg-transparent appearance-none" wire:model="tratamiento" id="tratamiento" required>
                    <option value="" disabled selected>Tipo de Tratamiento</option>
                    <option value="vacuna">Vacuna</option>
                    <option value="desparasitacion">Desparacitación</option>
                    <option value="otro_tratamiento">Otro tratamiento</option>
                </select>
                @error('tratamiento') <span>{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="fecha" class="block text-zinc-700">Fecha:</label>
                <input class="w-full border-b-2 border-zinc-400 focus:border-zinc-600 outline-none bg-transparent" type="date" id="fecha" wire:model="fecha" required style="border: none; border-bottom: 2px solid;">
                @error('fecha') <span>{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <input class="w-full border-b-2 border-zinc-400 focus:border-zinc-600 outline-none bg-transparent" type="number" step="0.01" id="peso" wire:model="peso" required placeholder="Peso" style="border: none; border-bottom: 2px solid;">
                @error('peso') <span>{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <textarea class="w-full border-b-2 border-zinc-400 focus:border-zinc-600 outline-none bg-transparent h-24" wire:model="descripcion" cols="5" required placeholder="Descripción" style="border: none; border-bottom: 2px solid;"></textarea>
                @error('descripcion') <span>{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="proximo_control" class="block text-zinc-700">Próximo Control:</label>
                <input class="w-full border-b-2 border-zinc-400 focus:border-zinc-600 outline-none bg-transparent" type="date" id="proximo_control" wire:model="proximo_control" required style="border: none; border-bottom: 2px solid;">
                @error('proximo_control') <span>{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-between">
                <button class="bg-[#EFBBE1] text-white py-2 px-4 " type="button" wire:click.prevent="closeModal()">Cancelar</button>
                <button class="bg-[#823E70] text-white py-2 px-4" type="button" wire:click.prevent="store()">Guardar</button>
            </div>
        </form>
    </div>
</div>
