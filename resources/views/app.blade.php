<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>{{ config('app.name') }} - Starter Boilerplate SPA made with Laravel 5.3, JWT Auth, Vue 2, Vue-router 2, Vuex 2 and <3</title>

        <link href="{{ elixir('/css/app.css') }}" rel="stylesheet">
        <script>
            window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!}
        </script>
    </head>

    <body>

        <div id="app">
            <app></app>
        </div>

        <script src="{{ elixir('/js/app.js') }}"></script>
    </body>
</html>
