<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    </head>
    <body>
        {{ $slot }}

        <script src="{{ asset('assets/bootstrap/bootstrap.min.js') }}"></script>
    </body>
</html>
