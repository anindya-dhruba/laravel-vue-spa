<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Anindya Dhruba">
        <meta name="description" content="Laravel Vue SPA">

        <title>{{ config('app.name') }} - Starter Boilerplate SPA made with Laravel 5.4, JWT Auth, Vue 2, Vue-router 2, Vuex 2, Axios and <3</title>

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                'siteName'  => config('app.name'),
                'apiDomain' => config('app.url').'/api'
            ]) !!}
        </script>
    </head>

    <body>

        <div id="app">
            <app></app>
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
