<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Agrega los estilos de Tailwind CSS si aún no los has incluido -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<x-guest-layout>

    <div class="flex flex-col md:flex-row justify-center items-center md:mt-8">
        <!-- Formulario de Registro -->
        <div class="md:w-[60%] w-[80%] flex justify-center md:order-1 order-2 mt-4 md:mt-0">
            <div class="bg-[#BFEFFB] p-8 rounded-sm shadow-lg w-full md:w-1/2 text-[#545454]">
                <h2 class="text-center text-xl font-semibold mb-6">REGISTRARSE</h2>

                <!-- Mostrar resumen de errores generales -->
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Nombre -->
                    <div class="flex items-center border-b border-zinc-400 py-2">
                        <i class="fa-solid fa-user mr-3"></i>
                        <input
                            class="appearance-none bg-transparent border-none w-full text-zinc-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            placeholder="Nombre"
                            autofocus
                        />
                    </div>
                    @error('name')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    <!-- Email -->
                    <div class="flex items-center border-b border-zinc-400 py-2">
                        <i class="fa-solid fa-envelope mr-3"></i>
                        <input
                            class="appearance-none bg-transparent border-none w-full text-zinc-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            placeholder="Correo"

                        />
                    </div>
                    @error('email')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    <!-- Contraseña -->
                    <div class="flex items-center border-b border-zinc-400 py-2">
                        <i class="fa-solid fa-lock mr-3"></i>
                        <input
                            class="appearance-none bg-transparent border-none w-full text-zinc-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="Contraseña"
                        />
                    </div>
                    @error('password')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    <!-- Confirmar Contraseña -->
                    <div class="flex items-center border-b border-zinc-400 py-2">
                        <i class="fa-solid fa-lock mr-3"></i>
                        <input
                            class="appearance-none bg-transparent border-none w-full text-zinc-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            placeholder="Confirmar Contraseña"
                        />
                    </div>

                    <!-- Dirección -->
                    <div class="flex items-center border-b border-zinc-400 py-2">
                        <i class="fa-solid fa-map-marker-alt mr-3"></i>
                        <input
                            class="appearance-none bg-transparent border-none w-full text-zinc-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                            id="direccion"
                            type="text"
                            name="direccion"
                            value="{{ old('direccion') }}"
                            required
                            placeholder="Dirección"
                        />
                    </div>
                    @error('direccion')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    <!-- Teléfono -->
                    <div class="flex items-center border-b border-zinc-400 py-2">
                        <i class="fa-solid fa-phone mr-3"></i>
                        <input
                            class="appearance-none bg-transparent border-none w-full text-zinc-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                            id="telefono"
                            type="text"
                            name="telefono"
                            value="{{ old('telefono') }}"
                            required
                            placeholder="Teléfono"
                        />
                    </div>
                    @error('telefono')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    <!-- Términos y Condiciones -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <label for="terms" class="flex items-center">
                                <input
                                    type="checkbox"
                                    name="terms"
                                    id="terms"
                                    required
                                    class="mr-2"
                                />
                                <div class="text-sm text-gray-600">
                                    {!! __('Estoy de acuerdo con los :terms_of_service y la :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-gray-600 hover:text-gray-900">'.__('Términos del Servicio').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-gray-600 hover:text-gray-900">'.__('Política de Privacidad').'</a>',
                                    ]) !!}
                                </div>
                            </label>
                        </div>
                    @endif

                    <!-- Botón de Registro -->
                    <div class="flex justify-center">
                        <button class="bg-[#823E70] text-white py-2 px-4 rounded-lg mt-4">Listo</button>
                    </div>
                </form>

                <!-- Enlace para iniciar sesión si ya está registrado -->
                <div class="flex items-center justify-center mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md" href="{{ route('login') }}">
                        {{ __('¿Ya estás registrado?') }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Imagen -->
        <div class="w-[50%] order-1 md:order-2">
            <div class="mt-8 md:mt-0 md:ml-8">
                <img src="{{ asset('storage/ros.png') }}" alt="Imagen decorativa">
            </div>
        </div>
    </div>

</x-guest-layout>

</body>
</html>

