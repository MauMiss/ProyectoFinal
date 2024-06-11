@role('VETERINARIO')
@livewireStyles
<x-admin-layout>
    @include('components.nav')
    <div>
        @livewire('ver-mascotas', ['id' => $id])
    </div>
</x-admin-layout>
@livewireScripts
@else
    NO ERES UN VETERINARIO
    @endrole
