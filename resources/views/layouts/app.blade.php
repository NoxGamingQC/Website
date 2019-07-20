<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NoxGamingQC</title>
        <link rel="icon" href="/img/Avatar.png" type="image/png">
        <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/home" style="display: flex; alignItems: center">
                        <img src="/img/Avatar.png" alt="NoxGamingQC" width="70px" height="60px" style="padding: 7px 14px" >NoxGamingQC
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li className="nav-home"><a href="/home"><i class="fa fa-home" aria-hidden="true"></i> Welcome <span class="sr-only">current</span></a></li>
                        <li class="nav-stream"><a href="/stream"><i class="fa fa-video-camera" aria-hidden="true"></i> Stream</a></li>
                        <li class="nav-partnership"><a href="/partnership"><i class="fa fa-handshake-o" aria-hidden="true"></i> Affiliates|Partners</a></li>
                        <li class="nav-positivity_stream_team"><a href="/positivity_stream_team"><i class="fa fa-heart" aria-hidden="true"></i> Positivity Stream Team</a></li>
                        <li class="nav-noxbot"><a href="/noxbot"><i class="fa fa-user" aria-hidden="true"></i> NoxBOT</a></li>
                        <li class="nav-contact"><a href="/contact"><i class="fa fa-address-book " aria-hidden="true"></i> Contact me</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-login"><a href="{{ route('login') }}">Login</a></li>
                            <li class="nav-register"><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
