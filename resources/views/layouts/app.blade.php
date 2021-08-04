<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    {{-- tailwindcss --}}
    <link href="{{ asset('tailwind.min.css') }}" rel="stylesheet">

    {{-- alpine js --}}
    <script src="{{ asset('alpine.min.js') }}" defer></script>

</head>
<body class="antialiased">

    {{-- <div x-data="{ open: false }">
        <button @click="open = true">Open Dropdown</button>

        <ul x-show="open" @click.away="open = false">
            Dropdown Body
        </ul>
    </div> --}}

    <x-navbar></x-navbar>

    {{ $slot }}

</body>
</html>