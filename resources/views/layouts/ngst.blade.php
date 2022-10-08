<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta name="google-site-verification" content="D30gPHSCahf2lVeDo0Ndgc8vI1cQvv8d1gXIZa3B2ds" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="NGST's Website">
    <meta name="author" content="NoxGamingQC">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(env('APP_ENV', 'developement'))
    <title>{{env('APP_ENV') == 'developement' ? 'Dev - ' : ''}}{{env('APP_NAME')}} - @yield('title')</title>
    @else
    <title>{{env('APP_NAME')}} - @yield('title')</title>
    @endif
    <link rel="icon" href="/img/NoxGamingQC.png" type="image/png">
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
    <link href="{{mix('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    @if($mainTheme['force'] === "true")
        <link href="{{mix('css/'. $mainTheme['themeName'] . 'Skin.css')}}" rel="stylesheet" type="text/css">
    @else
        @guest
            <link href="{{mix('css/'. $mainTheme['themeName'] . 'Skin.css')}}" rel="stylesheet" type="text/css">
        @endguest
        @auth
             @if(Auth::user()->theme)
                <link href="{{mix('css/'. Auth::user()->theme . 'Skin.css')}}" rel="stylesheet" type="text/css">
            @else
                <link href="{{mix('css/'. $mainTheme['themeName'] . 'Skin.css')}}" rel="stylesheet" type="text/css">
            @endif
        @endauth
    @endif
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="{{mix('js/app.js')}}"></script>
</head>

<body>
    @include('layouts.navbar_ngst')
    @include('alert.alert')
    @yield('content')
    @include('layouts.footer_ngst')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
        $.fn.selectpicker.Constructor.BootstrapVersion = "3.3.7"
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
        console.log('%c{{trans('generic.console_wait')}}', 'color:#F80; font-size:60px; font-weight: bold; -webkit-text-stroke: 1px black;');
        console.log('%c{!!trans('generic.console_copy_paste01')!!}', 'color:#FFF; font-size:18px;');
        console.log('%c{{trans('generic.console_copy_paste02')}}', 'color:#F00; font-size:18px;');
        console.log('%c{{trans('generic.console_close_window')}}', 'color:#FFF; font-size:18px;');
    </script>
</body>

</html>
