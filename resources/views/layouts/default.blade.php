<!DOCTYPE html>
<html lang="{{ app()->currentLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page-title', config('app.name'))</title>
    @vite(['resources/css/app.css'])
    @yield('styles')
</head>
<body class="w-screen h-screen pt-16">
<x-navbar/>
{{ @$slot }}
@yield('scripts')
</body>
</html>
