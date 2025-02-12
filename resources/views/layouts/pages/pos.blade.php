<!doctype html>
<html lang="{{ app()->getLocale() }}" style="overflow:hidden;margin:-2px !important;padding:0px !important">
    <head>
        <meta name="google-site-verification" content="D30gPHSCahf2lVeDo0Ndgc8vI1cQvv8d1gXIZa3B2ds" />
        <meta name="facebook-domain-verification" content="uki484ngemqhks0g9endzi9hb1nobp" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property='og:title' content='NoxGamingQC - @yield('title')' />
        <meta property='og:image' content='@yield('thumbnail', env('APP_URL') . '/img/NoxGamingQC.png')' />
        <meta property='og:url' content='{{URL::current()}}' />
        <meta name="description" property='og:description' content="@yield('description', 'Point of sale')">
        <meta property='og:image:width' content='500' />
        <meta property='og:image:height' content='500' />
        <meta property="og:type" content='website' />
        <meta name="author" content="NoxGamingQC">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if(env('APP_ENV', 'developement'))
        <title>{{env('APP_ENV') == 'developement' ? 'Dev - ' : ''}}{{isset($name) ? $name : ' '}} - POS</title>
        @else
        <title>{{isset($name) ? $name : ' '}} - POS</title>
        @endif
        <link rel="icon" href="/img/logo.png" type="image/png">
        <link href="{{mix('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <script src="{{mix('js/app.js')}}"></script>
    </head>
    <body style="overflow:hidden;margin:0px !important;padding:0px !important">
        <input id="websiteLocationID" type="hidden" style="margin:0px !important;padding:0px !important">
        <div id="content" style="margin:0px !important;padding:0px !important">
            @yield('content')
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
