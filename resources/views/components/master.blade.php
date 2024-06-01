<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Socialite') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        h2 {
            font-family: 'Nunito', sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div id="app">
        <section class="px-8 py-4 mb-6">
            <header class="container mx-auto">
                <h1 class="font-bold    ">
                <a href="{{ route('home') }}">
                    <h2><b>Socialite.</b></h2>
                </a>
                </h1>
                
            </header>
        </section>

        {{$slot}}
    </div>
     <script src="http://unpkg.com/turbolinks"></script>

</body>
</html>
