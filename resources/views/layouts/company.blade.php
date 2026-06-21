<?php
if(request()->has('company') && is_null($company)) {
    header("Location: /error-404");
    exit();
}
?>
<!doctype html>
<html lang="{{ app()->getLocale() }}" style="overflow-x:hidden">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property='og:title' content='@yield('title')' />
        <meta property='og:url' content='{{URL::current()}}' />
        <meta property='og:image:width' content='1200' />
        <meta property='og:image:height' content='630' />
        <meta property="og:type" content="website">
        
        <meta name="author" content="Jimmy Béland-Bédard">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="icon" href="" type="image/png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @include('components.company.style')
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
        <!--<link href="{mix('css/bootstrap.css')}" rel="stylesheet" type="text/css">-->
        <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">-->
        <script src="{{mix('js/app.js')}}"></script>
    </head>
    <body class="d-flex flex-column min-vh-100" style="overflow-x:hidden">
        <input id="websiteLocationID" type="hidden">
        @include('components.company.navbar')
        <div class="print-header py-3 px-3">
            <div class="d-flex align-items-center justify-content-center">
            <img class="px-3" src="{{ app()->getLocale() == 'fr-ca' ? $company->logo_fr : $company->logo_en }}" width="100px" />
            <span class="" style="font-size: 16px; font-weight: bold; width: 30%;">@yield('title')</span>
            <input type="text" class="form-control  form-control-lg print-only" placeholder="Sujet:">
            </div>
        </div>
        <div id="content" class=" flex-grow-1" style="min-height:60vh;">
            @yield('content')
        </div>
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
        </script>
    </body>
    @include('components.company.footer')
    <div class="print-footer print-only">
        <div class="footer-left">
            Pour toute question sur ce document, veuillez contacter Jimmy Béland-Bédard.
        </div>

        <div class="footer-right page-number">
        </div>
    </div>
</html>
