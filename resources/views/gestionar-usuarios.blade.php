@role('ADMINISTRADOR')
@livewireStyles
<x-admin-layout>
    @include('components.nav')
    <div>
        @livewire('usuarios')
    </div>
</x-admin-layout>
@livewireScripts
@else
    NO ERES UN ADMINISTRADOR
    @endrole

