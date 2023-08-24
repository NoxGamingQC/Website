<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta name="google-site-verification" content="D30gPHSCahf2lVeDo0Ndgc8vI1cQvv8d1gXIZa3B2ds" />
    <meta name="facebook-domain-verification" content="uki484ngemqhks0g9endzi9hb1nobp" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="NoxGamingQC">
    <meta property='og:title' content='NoxGamingQC - @yield('title')' />
    <meta property='og:image' content='@yield('thumbnail', env('APP_URL') . '/img/NoxGamingQC.png')' />
    <meta property='og:url' content='{{URL::current()}}' />
    <meta name="description" property='og:description' content="@yield('description', 'NoxGamingQC\'s official website. You can learn about us here and much more.')">
    <meta property='og:image:width' content='500' />
    <meta property='og:image:height' content='500' />
    <meta property="og:type" content='website' />
    @if(isset($kiosk) && $kiosk == true)
        <meta name="viewport" content="width=800, height=480, initial-scale=1, user-scalable=1">
        <meta http-equiv="refresh" content="36000">
    @else
        <meta name="viewport" content="width=device-width, initial-scale=1">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(env('APP_ENV', 'developement'))
    <title>{{env('APP_ENV') == 'developement' ? 'Dev - ' : ''}}{{env('APP_NAME')}} - @yield('title') @yield('name')</title>
    @else
    <title>{{env('APP_NAME')}} - @yield('title') @yield('name')</title>
    @endif
    <link rel="icon" href="/img/NoxGamingQC.png" type="image/png">
    <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
    <link href="{{mix('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    @if($mainTheme['force'] === "true")
        <link href="{{mix('css/'. $mainTheme['themeName'] . 'Theme.css')}}" rel="stylesheet" type="text/css">
    @else
        @guest
            <link href="{{mix('css/'. $mainTheme['themeName'] . 'Theme.css')}}" rel="stylesheet" type="text/css">
        @endguest
        @auth
             @if(Auth::user()->theme)
                <link href="{{mix('css/'. Auth::user()->theme . 'Theme.css')}}" rel="stylesheet" type="text/css">
            @else
                <link href="{{mix('css/'. $mainTheme['themeName'] . 'Theme.css')}}" rel="stylesheet" type="text/css">
            @endif
        @endauth
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="{{mix('js/app.js')}}"></script>
</head>

<body>
<input id="websiteLocationID" type="hidden">
    @if(isset($kiosk) && $kiosk == true)
        <style>
            ::-webkit-scrollbar {
                display:none
            }
            -ms-overflow-style: {
                none;
            }
            html, body {
                max-width: 100vw;
            }
        </style>
        
        @if(isset($header) && $header === 'false')
        @else
            <div class="mobile-hidden">
                @include('layouts.noxgamingqc.desktop.header')
            </div>
            <div class="desktop-hidden">
                @include('layouts.noxgamingqc.mobile.header')
            </div>
        @endif
        <div class="content">
            @yield('content')
        </div>
    @else
        <div class="mobile-hidden">
            @include('layouts.noxgamingqc.desktop.navbar')
        </div>
        <div class="desktop-hidden">
            @include('layouts.noxgamingqc.mobile.navbar')
        </div>
        @include('alert.alert')
        @if(isset($header) && $header === 'false')
        @else
            <div class="mobile-hidden">
                @include('layouts.noxgamingqc.desktop.header')
            </div>
            <div class="desktop-hidden">
                @include('layouts.noxgamingqc.mobile.header')
            </div>
        @endif
        <div class="content">
            @yield('content')
        </div>
        <div class="mobile-hidden">
            @include('layouts.noxgamingqc.desktop.footer')
        </div>
        <div class="desktop-hidden">
            @include('layouts.noxgamingqc.mobile.footer')
        </div>
    @endif
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
        $.fn.selectpicker.Constructor.BootstrapVersion = "3.3.7"
        $.fn.datepicker.defaults.format = "yyyy-mm-dd";
        console.log('%c{{trans('general.console_wait')}}', 'color:#F80; font-size:60px; font-weight: bold; -webkit-text-stroke: 1px black;');
        console.log('%c{!!trans('general.console_copy_paste01')!!}', 'color:#FFF; font-size:18px;');
        console.log('%c{{trans('general.console_copy_paste02')}}', 'color:#F00; font-size:18px;');
        console.log('%c{{trans('general.console_close_window')}}', 'color:#FFF; font-size:18px;');
    </script>
</body>

</html>
