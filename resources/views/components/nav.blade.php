<x-guest-layout>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @media screen and (max-width: 728px) {
            ul {
                position: absolute;
                flex-direction: column;
                height: 100vh;
                width: 100%;
                text-align: center;
                background-color: #9AE3F7;
                clip-path: circle(20px at 95% 5%);
                -webkit-clip-path: circle(20px at 95% 5%);
                transition: 1s ease-in-out;
                pointer-events: none;
            }

            nav {
                height: 64px;
                width: 100%;
            }

            .line {
                position: relative;
                background-color: #823E70;
                height: 3px;
                width: 30px;
                margin: 5px;
            }

            .burger {
                position: absolute;
                margin-top: 2.5vh;
                right: 10px;
                z-index: 2;
                cursor: pointer;
            }

            ul.open {
                background-color: rgba(154, 227, 247, 0.7);
                clip-path: circle(1000px at 95% 5%);
                -webkit-clip-path: circle(1000px at 95% 5%);
                pointer-events: all;
            }
        }
    </style>

    @if (Route::has('login'))
        <nav>
            <div class="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>

            <ul class="links flex bg-transparent items-center justify-between px-8 md:py-0 py-28 text-center text-[#545454]">
                <img class="md:h-[5%] md:w-[5%] h-[30%] w-[50%]" src="{{ asset('storage/logo.png') }}">
                <div class="md:order-1 order-2 md:flex md:justify-between md:w-[50%] w-[80%] space-y-20 md:space-y-0">
                    <!-- Mostrar el botón HOME solo si el usuario NO está autenticado -->
                    @guest
                        <a href="{{ route('home') }}"
                           class="flex justify-center items-center rounded-full md:w-[33%] w-[100%] h-12 border-2 border-[#545454] bg-transparent hover:bg-gray-200 hover:bg-opacity-50 p-1">
                            HOME
                        </a>
                    @endguest

                    <!-- Mostrar botones específicos según el rol del usuario cuando está autenticado -->
                    @auth
                        <a href="{{ route('home') }}"
                           class="flex justify-center items-center rounded-full md:w-[33%] w-[100%] h-12 border-2 border-[#545454] bg-transparent hover:bg-gray-200 hover:bg-opacity-50 p-1">
                            HOME
                        </a>

                        @if (auth()->user()->rol == 'USUARIO')
                            <a href="{{ route('mis-mascotas') }}"
                               class="flex justify-center items-center rounded-full md:w-[33%] w-[100%] h-12 border-2 border-[#545454] bg-transparent hover:bg-gray-200 hover:bg-opacity-50 p-1">
                                MIS MASCOTAS
                            </a>
                            <a href="{{ route('mascota-virtual') }}"
                               class="flex justify-center items-center rounded-full md:w-[33%] w-[100%] h-12 border-2 border-[#545454] bg-transparent hover:bg-gray-200 hover:bg-opacity-50 p-1">
                                MASCOTA VIRTUAL
                            </a>
                        @elseif (auth()->user()->rol == 'VETERINARIO')
                            <a href="{{ route('mis-clientes') }}"
                               class="flex justify-center items-center rounded-full md:w-[33%] w-[100%] h-12 border-2 border-[#545454] bg-transparent hover:bg-gray-200 hover:bg-opacity-50 p-1">
                                CLIENTES
                            </a>
                            <a href="{{ route('mascota-virtual') }}"
                               class="flex justify-center items-center rounded-full md:w-[33%] w-[100%] h-12 border-2 border-[#545454] bg-transparent hover:bg-gray-200 hover:bg-opacity-50 p-1">
                                MASCOTA VIRTUAL
                            </a>
                        @elseif (auth()->user()->rol == 'ADMINISTRADOR')
                            <a href="{{ route('gestionar-usuarios') }}"
                               class="flex justify-center items-center rounded-full md:w-[33%] w-[100%] h-12 border-2 border-[#545454] bg-transparent hover:bg-gray-200 hover:bg-opacity-50 p-1">
                                GESTIONAR USUARIOS
                            </a>
                            <a href="{{ route('gestionar-mascotas') }}"
                               class="flex justify-center items-center rounded-full md:w-[33%] w-[100%] h-12 border-2 border-[#545454] bg-transparent hover:bg-gray-200 hover:bg-opacity-50 p-1">
                                GESTIONAR MASCOTAS
                            </a>
                        @endif
                    @endauth


                </div>

                @auth



                    <div class="md:order-2 order-1 flex justify-center items-center rounded-full md:w-[15%] w-[80%] h-12 border-2 border-[#823E70] text-[#823E70] bg-transparent relative cursor-pointer"
                         onclick="toggleDropdown(event)">
                        {{ Auth::user()->name }}
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>

                        <div id="userDropdown" class="absolute w-32 mt-40 ml-10 hidden rounded-full border-2 border-[#823E70] text-[#823E70]">
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:bg-opacity-50 rounded-t-full">Perfil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:bg-opacity-50 rounded-b-full">Cerrar sesión</button>
                            </form>
                        </div>
                    </div>




                @else
                    <a href="{{ route('login') }}"
                       class="md:order-2 order-1 flex justify-center items-center rounded-full md:w-[15%] w-[80%] h-12 border-2 border-[#823E70] text-[#823E70] bg-transparent">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="md:order-2 order-1 flex justify-center items-center rounded-full md:w-[15%] w-[80%] h-12 border-2 border-[#823E70] text-[#823E70] bg-transparent">
                            Register
                        </a>
                    @endif
                @endauth
            </ul>
        </nav>


    @endif


    <script>
        const burger = document.querySelector('.burger');
        const links = document.querySelector('.links');

        burger.addEventListener('click', () => {
            links.classList.toggle('open');
        });
    </script>


    <script>
        function toggleDropdown(event) {
            event.stopPropagation(); // Evita que el clic se propague y cierre el menú inmediatamente
            let dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Cierra el menú si se hace clic fuera de él
        window.addEventListener('click', function(e) {
            let dropdown = document.getElementById('userDropdown');
            if (!dropdown.contains(e.target) && !e.target.closest('.cursor-pointer')) {
                dropdown.classList.add('hidden');
            }
        });
    </script>


</x-guest-layout>


