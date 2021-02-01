<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand satisfy-font" href="/home" style="display: flex; alignItems: center">
                NoxGamingQC
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-home"><a href="/{{app()->getLocale()}}/home"><i class="fa fa-home" aria-hidden="true"></i> {{ trans('generic.welcome') }} <span class="sr-only">current</span></a></li>
                <li class="nav-stream"><a href="/{{app()->getLocale()}}/stream"><i class="fa fa-video-camera" aria-hidden="true"></i> {{ trans('generic.streams') }}</a></li>
                <li class="nav-projects"><a href="/{{app()->getLocale()}}/projects"><i class="fa fa-heart" aria-hidden="true"></i> {{ trans('generic.projects') }}</a></li> <li class="nav-projects">
                <a href="/{{app()->getLocale()}}/games"><i class="fa fa-gamepad" aria-hidden="true"></i> {{ trans('generic.games_list') }}</a></li>                <li class="nav-contact"><a href="/{{app()->getLocale()}}/contact"><i class="fa fa-address-book " aria-hidden="true"></i> {{trans('generic.contact_us')}}</a></li>
                @auth
                    @if(Auth::user()->isDev || Auth::user()->isAdmin || Auth::user()->isModerator)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{trans("generic.management")}} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/{{app()->getLocale()}}/management/modules">{{trans("generic.modules")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/users">{{trans("generic.users")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/activities">{{trans("generic.bot_status")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/tasks">{{trans("generic.tasks")}}</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{trans("generic.language")}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/language/set/en">English ({{trans("generic.english")}})</a>
                                <a href="/language/set/fr">Français ({{trans("generic.french")}})</a>
                            </li>
                        </ul>
                    </li>
                @auth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/{{app()->getLocale()}}/profile/edit">{{trans('generic.edit_profile')}}</a>
                                <a href="/logout">{{trans('generic.logout')}}</a>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-login"><a href="{{ route('login', app()->getLocale()) }}">{{trans("generic.login")}}</a></li>
                    <li class="nav-register"><a href="{{ route('register', app()->getLocale()) }}">{{trans("generic.register")}}</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
