<x-form-section submit="updatePassword">


    <x-slot name="form" class="w-90">
        <strong class="text-center">CAMBIAR CONTRASEÑA</strong>
        <div class="col-span-6 sm:col-span-4 w-full border-b-2 border-[#545454] mt-2">
            <x-label for="current_password" value="{{ __('Current Password') }}" />
            <input id="current_password" type="password" class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none" wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 w-full border-b-2 border-[#545454] mt-2">
            <x-label for="password" value="{{ __('New Password') }}" />
            <input id="password" type="password" class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none" wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 w-full border-b-2 border-[#545454] mt-2">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <input id="password_confirmation" type="password" class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none" wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
