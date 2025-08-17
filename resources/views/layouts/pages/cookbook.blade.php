<!doctype html>
<html lang="{{ app()->getLocale() }}">
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
        <title>{{$appName}} - @yield('title')</title>
        <link rel="icon" href="/img/logo.png" type="image/png">
        <link href="{{mix('css/system.css')}}" rel="stylesheet" type="text/css">
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
        <!--<link href="{mix('css/bootstrap.css')}" rel="stylesheet" type="text/css">-->
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">-->
        <script src="{{mix('js/app.js')}}"></script>
    </head>
    <body>
        <div class="idle-screen" style="position:absolute; width:100%;height:100%;top:0px;bottom:0px;background-color:#000;z-index:98;overflow:hidden" hidden>
            <h1 class="current-weekday" style="position:absolute;color: #202020 !important;z-index:99 !important;font-size:60px !important;margin-left:15% !important;margin:5%;"></h1>
            <h1 class="current-date" style="position:absolute;color: #202020 !important;z-index:99 !important;font-size:60px !important;margin:10%;margin-left:15%;margin-top:15%;"></h1>
            <hr style="margin-top:30%" />
            <h1 class="current-time" style="position:absolute;color: #202020 !important;z-index:99 !important;font-size:84px !important;margin:10%;margin-left:15%;margin-top:5%;font-weight:bold;margin-right:5%"></h1>
            <img src="/img/logo.png" width=100px style="position:absolute;bottom: 5%; right: 5%; opacity:25%">
        </div>
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
                idleTime = 0;
                updateClock();
                var idleInterval = setInterval(timerIncrement, 60000);
                $(this).mousemove(function (e) {
                    idleTime = 0;
                    $('.idle-screen').attr('hidden', true);
                    $('.active-screen').attr('hidden', false);
                });
                $(this).keypress(function (e) {
                    idleTime = 0;
                    $('.idle-screen').attr('hidden', true);
                    $('.active-screen').attr('hidden', false);
                });
            });

            function updateClock() {
                var currentTime = new Date();
                $('.current-weekday').html(moment(currentTime).locale('fr').format('dddd')[0].toUpperCase() + moment(currentTime).locale('fr').format('dddd').substring(1));
                $('.current-date').html(moment(currentTime).locale('fr').format('D MMMM YYYY'));
                $('.current-time').html(moment(currentTime).format('h:mm:ss a').toUpperCase());
                setTimeout(updateClock, 1000);
            }

            function timerIncrement() {
                idleTime = idleTime + 1;
                if (idleTime > 9) {
                    $('.idle-screen').attr('hidden', false);
                    $('.active-screen').attr('hidden', true);
                }
            }
        </script>
    </body>
</html>
