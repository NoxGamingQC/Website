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
    <link href="{{mix('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
    @guest
        <link href="{{mix('css/queenSkin.css')}}" rel="stylesheet" type="text/css">
        <!--<link href="mix('css/defaultSkin.css')" rel="stylesheet" type="text/css">-->
    @endguest
    @auth
        @if(Auth::user()->theme === 'dracula')
            <!--<link href="mix('css/draculaSkin.css')" rel="stylesheet" type="text/css">-->
        @elseif(Auth::user()->theme === 'light')
            <!--<link href="mix('css/lightSkin.css')" rel="stylesheet" type="text/css">-->
        @else 
            <!--<link href="mix('css/defaultSkin.css')" rel="stylesheet" type="text/css">-->
        @endif
    @endauth
    <link rel="stylesheet" href="/css/font-awesome.min.css">
</head>

<body>
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    @include('layouts.navbar')
    @include('alert.alert')
    @yield('content')
    <div id="root"></div>
    <script src="{{mix('js/app.js')}}"></script>
</body>

</html>
