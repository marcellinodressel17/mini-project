<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Socialite') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <section class="px-8 py-4 mb-6">
            <header class="container mx-auto">
                <h1 class="font-bold    ">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                </h1> 
            </header>
        </section>
    </div>
        <section class="px-8">
            <main class="container mx-auto">
                   <div class="lg:flex lg:justify-between">
        <div class="lg:w-32">
            @include('_sidebar-links')
        </div>
        <div class="lg:flex-1 lg:mx-10" style="max-width:700px">
            @yield('content')
          
        </div>
        <div class="lg: w-1/6  rounded-lg p-4">
            @include('_friends-list')
        </div>
    </div>
            </main>
        </section>

</body>
</html>
