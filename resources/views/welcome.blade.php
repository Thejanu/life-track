<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" style="background-image: url('/images/bg.jpeg'); background-size: cover; background-repeat: no-repeat;">
    <div class="min-h-screen">

        <div class="fixed top-0 left-0 p-6 text-left z-10">
            <h1 class="font-semibold text-gray-100 uppercase text-xl">Life Track</h1>
        </div>

        @if (Route::has('login'))
        <div class="fixed top-0 right-0 p-6 text-right z-10">
            @auth
            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-100 hover:text-gray-100  focus:outline focus:outline-2 focus:rounded-sm">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-100 hover:text-gray-100 focus:outline focus:outline-2 focus:rounded-sm ">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="min-h-screen grid grid-cols-1 gap-4 content-center justify-center">
            <div>
                <h2 class="text-center text-gray-100 text-3xl font-semibold uppercase">We provide best healthcare thoughout Sri Lanka</h2>
            </div>
        </div>


        <!-- Page Content -->
        <!-- <main class="min-h-screen flex justify-center content-center">

        </main> -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js" integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

</html>