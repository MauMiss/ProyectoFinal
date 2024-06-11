@role('VETERINARIO')
@livewireStyles
<x-admin-layout>
@include('components.nav')
    <div>
        @livewire('mis-clientes')
    </div>

</x-admin-layout>

@livewireScripts
@else
    NO ERES UN VETERINARIO
    @endrole

