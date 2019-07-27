<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>TechnologyAdvice Test Drive</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!--  Fav Icon -->
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="/imgs/favicon/favicon-32x32.png">
        <link
            rel="icon"
            type="image/png"
            sizes="96x96"
            href="/imgs/favicon/favicon-96x96.png">
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="/imgs/favicon/favicon-16x16.png">

        <!-- Icon font -->
        <script src="https://use.fontawesome.com/f21524db91.js"></script>
    </head>
    <body>
        <div id="app">
            <div class="content-container">
                @yield('content')
            </div>
        </div>

        <!-- Scripts -->
        @stack('scripts')
    </body>
</html>
