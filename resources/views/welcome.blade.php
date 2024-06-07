<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Styles -->


</head>
<body class="">
<header class="">

    <div class="bg-cover bg-center h-screen" style="background-image: url('{{ asset('storage/perritos.jpg') }}');">
        <div class="pt-4">
            @include('components.nav')
        </div>
        <div class="mt-[10%]">
            <div class="px-16 md:w-[40%] w-[100%] md:text-5xl text-3xl text-white">
                <p>Tu mascota, tu fiel amigo, cuídalo como tu propio hijo!</p>
            </div>
        </div>
    </div>
</header>


<div class="bg-cover bg-center h-screen flex items-center" style="background-image: url('{{ asset('storage/gatodef1.jpeg') }}');">

    <div class="flex md:justify-end text-white">
        <div class=" w-[60%] md:p-20 p-0 md:space-y-10">
            <h1 class="text-5xl text-center">"NOSOTROS"</h1>
            <p class="text-3xl">En DINGO, amamos a tus mascotas tanto como tú. Nuestro compromiso es brindarles el mejor cuidado. Tu confianza es nuestra prioridad.</p>
        </div>
    </div>
</div>
@include('components.footer')
</body>
</html>

