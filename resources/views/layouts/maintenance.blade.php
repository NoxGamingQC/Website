<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta name="google-site-verification" content="D30gPHSCahf2lVeDo0Ndgc8vI1cQvv8d1gXIZa3B2ds" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="NoxGamingQC's Website">
    <meta name="author" content="NoxGamingQC">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{mix('js/app.js')}}"></script>
    @if(env('APP_ENV', 'developement'))
    <title>{{env('APP_ENV') == 'developement' ? 'Dev - ' : ''}}{{env('APP_NAME')}} - @yield('title')</title>
    @else
    <title>{{env('APP_NAME')}} - @yield('title')</title>
    @endif
    <link rel="icon" href="/img/NoxGamingQC.png" type="image/png">
    <link href="{{mix('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
    @if($mainTheme['force'])
        @if($mainTheme['themeName'] === 'dracula')
            <link href="{{mix('css/draculaTheme.css')}}" rel="stylesheet" type="text/css">
        @elseif($mainTheme['themeName'] === 'light')
            <link href="{{mix('css/lightTheme.css')}}" rel="stylesheet" type="text/css">
        @elseif($mainTheme['themeName'] === 'dark') 
            <link href="{{mix('css/darkTheme.css')}}" rel="stylesheet" type="text/css">
        @elseif($mainTheme['themeName'] === 'queen')
            <link href="{{mix('css/queenTheme.css')}}" rel="stylesheet" type="text/css">
        @endif
    @else
        @guest
            @if($mainTheme['themeName'] === 'dracula')
                <link href="{{mix('css/draculaTheme.css')}}" rel="stylesheet" type="text/css">
            @elseif($mainTheme['themeName'] === 'light')
                <link href="{{mix('css/lightTheme.css')}}" rel="stylesheet" type="text/css">
            @elseif($mainTheme['themeName'] === 'dark') 
                <link href="{{mix('css/darkTheme.css')}}" rel="stylesheet" type="text/css">
            @elseif($mainTheme['themeName'] === 'queen')
                <link href="{{mix('css/queenTheme.css')}}" rel="stylesheet" type="text/css">
            @endif
        @endguest
        @auth
            @if(Auth::user()->theme === 'dracula')
                <link href="{{mix('css/draculaTheme.css')}}" rel="stylesheet" type="text/css">
            @elseif(Auth::user()->theme === 'light')
                <link href="{{mix('css/lightTheme.css')}}" rel="stylesheet" type="text/css">
            @elseif(Auth::user()->theme === 'dark')
                <link href="{{mix('css/darkTheme.css')}}" rel="stylesheet" type="text/css">
            @elseif(Auth::user()->theme === 'queen')
                <link href="{{mix('css/queenTheme.css')}}" rel="stylesheet" type="text/css">
            @else
                @if($mainTheme['themeName'] === 'dracula')
                    <link href="{{mix('css/draculaTheme.css')}}" rel="stylesheet" type="text/css">
                @elseif($mainTheme['themeName'] === 'light')
                    <link href="{{mix('css/lightTheme.css')}}" rel="stylesheet" type="text/css">
                @elseif($mainTheme['themeName'] === 'dark') 
                    <link href="{{mix('css/darkTheme.css')}}" rel="stylesheet" type="text/css">
                @elseif($mainTheme['themeName'] === 'queen')
                    <link href="{{mix('css/queenTheme.css')}}" rel="stylesheet" type="text/css">
                @endif
            @endif
        @endauth
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
</head>

<body>
    @include('alert.alert')
    @yield('content')
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
        console.log('%c{{trans('generic.console_wait')}}', 'color:#F80; font-size:60px; font-weight: bold; -webkit-text-stroke: 1px black;');
        console.log('%c{!!trans('generic.console_copy_paste01')!!}', 'color:#FFF; font-size:18px;');
        console.log('%c{{trans('generic.console_copy_paste02')}}', 'color:#F00; font-size:18px;');
        console.log('%c{{trans('generic.console_close_window')}}', 'color:#FFF; font-size:18px;');
    </script>
</body>

</html>
