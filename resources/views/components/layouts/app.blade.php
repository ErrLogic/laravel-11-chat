<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laravel Reverb</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    {{ $slot }}

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
</body>

</html>
