<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('title')

        <link href="css/app.css" rel="stylesheet" type="text/css">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">

        <!-- Styles will come here -->

    </head>
    <body>

        <div id="app" class="flex-center position-ref full-height">

            @include('layouts.header')


            @yield('content')

        </div>

        <script src="js/app.js"></script>

    </body>
</html>