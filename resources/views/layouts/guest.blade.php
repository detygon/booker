<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.2.1/dist/alpine.js" defer></script>
</head>

<body class="antialiased bg-gray-100 font-sans text-gray-900">
    <main class="font-montserrat">
        <header class="h-24 sm:h-32 flex items-center">
            <div class="container mx-auto px-6 sm:px-12 flex items-center justify-between">
                <div class="font-black text-blue-900 text-2xl flex items-start">
                    Indigo Côte d'Ivoire<span class="w-3 h-3 rounded-full bg-purple-600 ml-2"></span>
                </div>
                <div class="flex items-center">
                    <nav class="text-purple-900 text-lg hidden lg:flex items-center">
                        <a href="{{ route('landing') }}" class="py-2 px-8 flex hover:text-purple-700">
                            Acceuil
                        </a>
                        {{-- <a href="{{ route('instructions') }}"
                            class="py-2 px-8 flex hover:text-purple-700">
                            Comment ça marche
                        </a> --}}
                        <a href="{{ route('verification') }}" class="py-2 px-8 flex hover:text-purple-700">
                            Verification
                        </a>
                    </nav>
                </div>
            </div>
        </header>
        <section>
            {{ $slot }}
        </section>
    </main>

    @livewireScripts
</body>

</html>
