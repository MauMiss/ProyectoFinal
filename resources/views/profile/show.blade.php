@include('components.nav')
<x-guest-layout>
    <div class="flex flex-wrap justify-center items-start p-10">
        <!-- Mantener todos en una sola fila pero con un diseño que simula dos arriba y dos abajo -->
        <div class="w-full md:w-1/2 lg:w-1/2 px-4 py-2 mb-4">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')
            @endif
        </div>
        <div class="w-full md:w-1/2 lg:w-1/2 px-4 py-2 mb-4">
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                @livewire('profile.update-password-form')
            @endif
        </div>

        <!-- Ajuste para pantallas pequeñas y medianas donde se muestran uno debajo del otro -->
        <div class="w-full md:w-1/2 lg:w-1/2 px-4 py-2 mb-4">
            @livewire('profile.logout-other-browser-sessions-form')
        </div>
        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <div class="w-full md:w-1/2 lg:w-1/2 px-4 py-2 mb-4">
                @livewire('profile.delete-user-form')
            </div>
        @endif
    </div>
</x-guest-layout>
