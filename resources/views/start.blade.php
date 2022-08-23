<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sonarworks</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script>
            window.locale = "{{ config('app.locale')}}";
            window.translations = {!! cache('translations') !!};
        </script>
    </head>
    <body>
        <div id="app"></div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
