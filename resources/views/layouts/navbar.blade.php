<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home" style="display: flex; alignItems: center">
                NoxGamingQC
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-home"><a href="/{{app()->getLocale()}}/home"><i class="fa fa-home" aria-hidden="true"></i> {{ trans('generic.welcome') }} <span class="sr-only">current</span></a></li>
                <li class="nav-stream"><a href="/{{app()->getLocale()}}/stream"><i class="fa fa-video-camera" aria-hidden="true"></i> {{ trans('generic.streams') }}</a></li>
                <li class="nav-projects"><a href="/{{app()->getLocale()}}/projects"><i class="fa fa-heart" aria-hidden="true"></i> {{ trans('generic.projects') }}</a></li>
                <li class="nav-noxbot"><a href="/{{app()->getLocale()}}/noxbot"><i class="fa fa-user" aria-hidden="true"></i> NoxBOT</a></li>
                <li class="nav-contact"><a href="/{{app()->getLocale()}}/contact"><i class="fa fa-address-book " aria-hidden="true"></i> {{trans('generic.contact_us')}}</a></li>
                @auth
                    @if(Auth::user()->isDev || Auth::user()->isAdmin || Auth::user()->isModerator)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                Management <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/{{app()->getLocale()}}/management/modules">Modules</a>
                                    <a href="/{{app()->getLocale()}}/management/users">Users</a>
                                    <a href="/{{app()->getLocale()}}/management/activities">Bot Activities</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @auth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout', app()->getLocale()) }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-login"><a href="{{ route('login', app()->getLocale()) }}">Login</a></li>
                    <li class="nav-register"><a href="{{ route('register', app()->getLocale()) }}">Register</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
