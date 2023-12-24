<!doctype html>
<html lang="{{ app()->getLocale() }}" style="background-color:#{{$theme->background}};">
    <head>
        <meta name="google-site-verification" content="D30gPHSCahf2lVeDo0Ndgc8vI1cQvv8d1gXIZa3B2ds" />
        <meta name="facebook-domain-verification" content="uki484ngemqhks0g9endzi9hb1nobp" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property='og:title' content='NoxGamingQC - @yield('title')' />
        <meta property='og:image' content='@yield('thumbnail', env('APP_URL') . '/img/logo.png')' />
        <meta property='og:url' content='{{URL::current()}}' />
        <meta name="description" property='og:description' content="@yield('description', 'NoxGamingQC\'s official website. You can learn about us here and much more.')">
        <meta property='og:image:width' content='500' />
        <meta property='og:image:height' content='500' />
        <meta property="og:type" content='website' />
        <meta name="author" content="NoxGamingQC">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if(env('APP_ENV', 'developement'))
        <title>{{env('APP_ENV') == 'developement' ? 'Dev - ' : ''}}{{env('APP_NAME')}} - @yield('title')</title>
        @else
        <title>{{env('APP_NAME')}} - @yield('title')</title>
        @endif
        <link rel="icon" href="/img/logo.png" type="image/png">
        <link href="{{mix('css/system.css')}}" rel="stylesheet" type="text/css">
        <link href="{{mix('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <script src="{{mix('js/app.js')}}"></script>
    </head>
    <body style="background-color:#{{$theme->background}};">
        <div class="idle-screen" style="position:absolute; width:100%;height:100%;top:0px;bottom:0px;background-color:#000;z-index:99;overflow:hidden" hidden></div>
        <div class="active-screen">
        <input id="websiteLocationID" type="hidden">
        @include('alert.alert')
        @include('layouts.components.cookbook.header')
        @yield('content')
        @include('layouts.components.footer')
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

            var idleTime = 0;
            $(document).ready(function () {
                var idleInterval = setInterval(timerIncrement, 60000);
                $(this).mousemove(function (e) {
                    idleTime = 0;
                    $('.idle-screen').addClass('hidden');
                    $('.active-screen').removeClass('hidden');
                });
                $(this).keypress(function (e) {
                    idleTime = 0;
                    $('.idle-screen').addClass('hidden');
                    $('.active-screen').removeClass('hidden');
                });
            });

            function timerIncrement() {
                idleTime = idleTime + 1;
                if (idleTime > 59) {
                    $('.idle-screen').removeClass('hidden');
                    $('.active-screen').addClass('hidden');
                }
            }
        </script>
    </body>
</html>
