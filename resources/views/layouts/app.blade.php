<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NoxGamingQC - @yield('title')</title>
        <link rel="icon" href="/img/Avatar.png" type="image/png">
        <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
    </head>

    <body>
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        @include('layouts.navbar')
        @yield('content')
        @include('layouts.footer')
        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
