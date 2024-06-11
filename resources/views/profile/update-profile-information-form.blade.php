<x-form-section submit="updateProfileInformation">

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4 w-full"> <!-- Añade w-full aquí -->
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden w-full" wire:model.live="photo" x-ref="photo"... /> <!-- Ajusta las clases aquí -->

                <!-- Resto del código para la foto del perfil... -->
            </div>
        @endif

<strong class="text-center">INFORMACION DE PERFIL</strong>
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4 w-full border-b-2 border-[#545454] mt-2"> <!-- Añade w-full aquí -->
            <x-label for="name" value="{{ __('Name') }}" />
            <input id="name" type="text" class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none" wire:model="state.name" required autocomplete="name" /> <!-- Ajusta las clases aquí -->
            <x-input-error for="name" class="mt-2" /> <!-- No es necesario ajustar aquí, ya está bien -->
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4 w-full border-b-2 border-[#545454] mt-5"> <!-- Añade w-full aquí -->
            <x-label for="email" value="{{ __('Email') }}" />
            <input id="email" type="email" class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none" wire:model="state.email" required autocomplete="username" /> <!-- Ajusta las clases aquí -->
            <x-input-error for="email" class="mt-2" /> <!-- No es necesario ajustar aquí, ya está bien -->

            <!-- Resto del código para el correo electrónico... -->
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
