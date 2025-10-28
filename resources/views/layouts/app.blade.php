<!doctype html>
<html data-bs-theme="{{!is_null(request('theme')) ? request('theme') : (Auth::check() ? (is_null(Auth::user()->theme) ? 'default' : Auth::user()->theme) : 'default')}}" lang="{{ app()->getLocale() }}" style="overflow-x:hidden">
    <head>
        <meta name="google-site-verification" content="D30gPHSCahf2lVeDo0Ndgc8vI1cQvv8d1gXIZa3B2ds" />
        <meta name="facebook-domain-verification" content="uki484ngemqhks0g9endzi9hb1nobp" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property='og:title' content='NoxGamingQC - @yield('title')' />
        <meta property='og:image' content='@yield('thumbnail', env('APP_URL') . '/img/logo.png')' />
        <meta property='og:url' content='{{URL::current()}}' />
        <meta name="og:description" property='og:description' content="@yield('description', 'NoxGamingQC\'s official website. You can learn about us here and much more.')">
        <meta name="theme-color" property='og:color' content='#880000' />
        <meta property='og:image:width' content='500' />
        <meta property='og:image:height' content='500' />
        <meta property="og:type" content="website">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="NoxGamingQC - @yield('title')">
        <meta name="twitter:description" content="@yield('description', 'NoxGamingQC\'s official website. You can learn about us here and much more.')">
        <meta name="twitter:image" content="@yield('thumbnail', env('APP_URL') . '/img/logo.png')">
        
        <meta name="author" content="NoxGamingQC">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{$appName}} - @yield('title')</title>
        <link rel="icon" href="/img/logo.png" type="image/png">
        <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
        <!--<link href="{mix('css/bootstrap.css')}" rel="stylesheet" type="text/css">-->
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">-->
        <script src="{{mix('js/app.js')}}"></script>
    </head>
    <body style="overflow-x:hidden">
        <input id="websiteLocationID" type="hidden">
        @include('layouts.components.navbar')
        <div id="content" class="my-5 d-flex py-5" style="min-height:60vh;">
            @yield('content')
        </div>
        @include('layouts.components.footer')
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>-->
        <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>-->
        <script type="text/javascript">
            //$.fn.selectpicker.Constructor.BootstrapVersion = "5.3.7"
            //$.fn.datepicker.defaults.format = "yyyy-mm-dd";
            console.log('%c{{trans('general.console_wait')}}', 'color:#F80; font-size:60px; font-weight: bold; -webkit-text-stroke: 1px black;');
            console.log('%c{!!trans('general.console_copy_paste01')!!}', 'color:#FFF; font-size:18px;');
            console.log('%c{{trans('general.console_copy_paste02')}}', 'color:#F00; font-size:18px;');
            console.log('%c{{trans('general.console_close_window')}}', 'color:#FFF; font-size:18px;');
            const darkThemeMq = window.matchMedia("(prefers-color-scheme: dark)");
            if($('html').attr('data-bs-theme') === 'default') {
                if (darkThemeMq.matches) {
                    $('html').attr('data-bs-theme', 'dark');
                } else {
                    $('html').attr('data-bs-theme', 'light');
                }
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', ({ matches }) => {
                    if(matches) {
                        $('html').attr('data-bs-theme', 'dark');
                    } else {
                        $('html').attr('data-bs-theme', 'light');
                    }
                });
            }
        </script>
    </body>
</html>
