
<x-guest-layout>
    @include('components.nav')
    <div class="flex md:items-center justify-center h-full mt-16 md:mt-0 text-[#545454]"">
        <div class="relative bg-[#BFEFFB]  p-6 rounded-lg shadow-lg w-full max-w-md md:translate-y-16 translate-y-20">
            <img src="{{ asset('storage/formg.png') }}" alt="cat" class="absolute -top-16 left-1/2 transform -translate-x-1/2 w-20 h-20 object-cover">
            <h2 class="text-center text-[#545454] dark:text-white text-xl font-semibold mb-4">INICIAR SESIÓN</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-10 border-b border-[#545454] focus:border-none w-full">
                    <div class="flex items-center py-2 w-full">
                        <i class="fa-solid fa-envelope mr-3"></i>
                        <input
                            id="email"
                            class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none"
                            type="email"
                            name="email"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Email"
                        />
                    </div>
                </div>

                <div class="mb-10 border-b border-[#545454] focus:border-none">
                    <div class="flex items-center py-2">
                        <i class="fa-solid fa-lock mr-3"></i>
                        <input
                            id="password"
                            class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Contraseña"
                        />
                    </div>
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-300">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <button class="w-full bg-[#823E70] text-white py-2 rounded mt-16" type="submit">{{ __('Log in') }}</button>
            </form>
        </div>
        <img class="absolute right-0 bottom-0  w-96 h-[500px] md:block hidden" src="{{ asset('storage/formp.png') }}">
    </div>
</x-guest-layout>

