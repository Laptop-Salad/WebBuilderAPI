<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WebSculptor</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-900 text-ws-green p-8 md:p-20">
    <header>
        <img src="{{asset('assets/logo.png')}}" alt="WebSculptor logo" class="w-12">
    </header>

    <main class="h-full">
        {{$slot}}
    </main>
</body>
</html>
