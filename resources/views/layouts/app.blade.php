<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(env('APP_ENV', 'developement'))
    <title>{{env('APP_ENV') == 'developement' ? 'Dev - ' : ''}}{{env('APP_NAME')}} - @yield('title')</title>
    @else
    <title>{{env('APP_NAME')}} - @yield('title')</title>
    @endif
    <link rel="icon" href="/img/Avatar.png" type="image/png">
    @guest
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
    @endguest
    @auth
        @if(Auth::user()->theme === 'dracula')
            <link href="{{mix('css/appDracula.css')}}" rel="stylesheet" type="text/css">
        @else 
            <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
        @endif
    @endauth
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
</head>

<body>
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')
    <script src="{{mix('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
</body>

</html>
