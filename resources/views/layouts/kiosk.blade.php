<!doctype html>
<html>
    <head>
        <meta name="google-site-verification" content="D30gPHSCahf2lVeDo0Ndgc8vI1cQvv8d1gXIZa3B2ds" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=800, height=480, initial-scale=1, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{mix('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <script src="{{mix('js/app.js')}}"></script>
        <style>
            @font-face {
                font-family: 'Verdana';
                src: url(/fonts/verdana.ttf);
            }
            html {
                @if($company->haveGradient)
                background: linear-gradient({{$company->color_2}} 1%, {{$company->color_1}} 60%);
                background-repeat: no-repeat;
                background-size: cover;
                @else
                    background-color: {{$company->color_1}};
                @endif
                width: 800px;
                height: 480px;
            }
            body {
                background-color: transparent;
                font-family: 'Verdana';
            }
            body::after {
                content: "";
                background-image: url("{{$company->logoURL}}");
                height: 450px; /* You must set a specified height */
                background-position: center; /* Center the image */
                background-repeat: no-repeat; /* Do not repeat the image */
                background-size: 450px;
                opacity: 0.1;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                position: absolute;
                z-index: -1;   
            }
        </style>
    </head>
    <body>
        <div class="kiosk-content">
            @yield('content')
        </div>
        <script>
            (function refreshKiosk() {
                $.ajax({
                    url: "/company/kiosk/{{$company->id}}/refresh",
                    type: "GET",
                    data: {},
                    success: function (data) {
                        $.each(data.kiosk, function(key, value) {
                            $('#userName'+ key).html(value.Firstname + " " + value.Lastname[0] + ".");
                            $('#userTime'+ key).html(value.time);
                        });
                    },
                    complete: function () {
                        setTimeout(refreshKiosk, 5000);
                    }
                });
            })();
            
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    </body>
</html>
