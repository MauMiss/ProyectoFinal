<div class="w-full md:w-2/3">
    <form>
        <input type="hidden" wire:model="id">
        <div class="mb-2">
            <label for="name">Nombre</label>
            <input class="c-input" type="text" id="name" wire:model="name" required>
            @error('name') <span>{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label for="email">Email</label>
            <input class="c-input" type="email" id="email" wire:model="email" required>
            @error('email') <span>{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label for="password">Contraseña</label>
            <input class="c-input" type="password" id="password" wire:model="password" required>
            @error('password') <span>{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label for="direccion">Dirección</label>
            <input class="c-input" type="text" id="direccion" wire:model="direccion" required>
            @error('direccion') <span>{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label for="telefono">Teléfono</label>
            <input class="c-input" type="text" id="telefono" wire:model="telefono" required>
            @error('telefono') <span>{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label for="rol">Rol</label>
            <select class="c-input" wire:model="rol" id="rol" required>
                <option value="USUARIO">Usuario</option>
                <option value="ADMINISTRADOR">Administrador</option>
                <option value="VETERINARIO">Veterinario</option>
            </select>
            @error('rol') <span>{{ $message }}</span> @enderror
        </div>

        <button class="bg-primary text-white py-1 px-3 rounded" type="button" wire:click.prevent="store()">Guardar</button>
        <button class="bg-danger text-white py-1 px-3 rounded" type="button" wire:click.prevent="closeModal()">Cancelar</button>
    </form>
</div>
