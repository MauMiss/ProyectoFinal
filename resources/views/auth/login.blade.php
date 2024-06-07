<x-guest-layout>
    <div class="flex md:items-center justify-center min-h-screen mt-16 md:mt-0 bg-[#AADAE6]">
        <div class="relative md:bg-[#a9e5f2] dark:bg-[#2d3748] bg-opacity-80 dark:bg-opacity-80 p-6 rounded-lg shadow-lg w-full max-w-md">
            <img src="{{ asset('storage/formg.png') }}" alt="cat" class="absolute -top-16 left-1/2 transform -translate-x-1/2 w-20 h-20 object-cover">
            <h2 class="text-center text-[#545454] dark:text-white text-xl font-semibold mb-4">INICIAR SESIÓN</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-10 border-b border-[#545454] focus:border-none">
                    <div class="flex items-center py-2">
                        <i class="fa-solid fa-envelope mr-3"></i>
                        <x-input
                            id="email"
                            class="w-full p-2 border-none bg-transparent dark:text-white text-[#545454] placeholder-gray-500 focus:outline-none"
                            type="email"
                            name="email"
                            :value="old('email')"
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
                        <x-input
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
        <img class="absolute right-0 bottom-0  w-96 h-[500px]" src="{{ asset('storage/formp.png') }}">
    </div>
</x-guest-layout>

