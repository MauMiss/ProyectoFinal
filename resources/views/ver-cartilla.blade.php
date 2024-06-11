

<x-admin-layout>
    @include('components.nav')
    <div>
        @livewire('vacunas', ['id' => $id])
    </div>

</x-admin-layout>
