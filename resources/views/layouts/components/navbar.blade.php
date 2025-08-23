<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top p-0 no-print">
  <div class="container-fluid py-0">
     <a class="navbar-brand" href="/">
        <img src="/img/logo.svg" alt="NoxGamingQC" width="50" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="nav nav-pills justify-content-start">
            <li class="nav-item">
                <a class="nav-link {{$currentPage == 'home' ? 'active' : ''}}" href="/"><i class="fa fa-home" aria-hidden="true"></i> {{trans('navigation.welcome')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{$currentPage == 'projects' ? 'active' : ''}}"  href="/{{app()->getLocale()}}/projects"><i class="fa fa-code" aria-hidden="true"></i> {{trans('navigation.projects')}}</a>
            </li>
            <li class="nav-item dropdown" hidden>
                <a class="nav-link dropdown-toggle disabled" data-bs-toggle="dropdown" role="button" aria-expanded="false" aria-disabled="true"><i class="fa fa-video-camera" aria-hidden="true"></i> {{trans('navigation.content')}}</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/{{app()->getLocale()}}/about_us/contact_us"><i class="fa fa-address-card-o" aria-hidden="true"></i> {{trans('navigation.contact_us')}}</a></li>
                    <li><a class="dropdown-item" href="/{{app()->getLocale()}}/about_us/games"><i class="fa fa-gamepad" aria-hidden="true"></i> {{trans('navigation.game_list')}}</a></li>
                    <li><a class="dropdown-item" href="/{{app()->getLocale()}}/about_us/partners"><i class="fa fa-handshake-o" aria-hidden="true"></i> {{trans('navigation.partners')}}</a></li>
                    <li><a class="dropdown-item disabled" href="#" aria-disabled="true"><i class="fa fa-group" aria-hidden="true"></i> {{trans('navigation.teams')}}</a></li>
                    <li><a class="dropdown-item disabled" href="#" aria-disabled="true">{{trans('navigation.twitch')}}</a></li>
                    <li><a class="dropdown-item disabled" href="#" aria-disabled="true">{{trans('navigation.youtube')}}</a></li>
                </ul>
            </li>
            <li class="nav-item" hidden>
                <a class="nav-link disabled hidden" href="#" aria-disabled="true"><i class="fa fa-shopping-cart" aria-hidden="true"></i> {{trans('navigation.store')}}</a>
            </li>
            @auth
                @if(Auth::user()->has_premium)
                    <li class="nav-item">
                        <a class="nav-link" href="/{{app()->getLocale()}}/cookbook"><i class="fa fa-cutlery" aria-hidden="true"></i> {{trans('navigation.cookbook')}}</a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{isset($currentTab) ? ($currentTab == 'tools' ? 'active' : '') : ''}}" data-bs-toggle="dropdown" role="button" aria-expanded="false" aria-disabled="true"><i class="fa fa-user" aria-hidden="true"></i> {{trans('navigation.tools')}}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{$currentPage == 'mensual-budget' ? 'active' : ''}}" href="/{{app()->getLocale()}}/tools/mensual_budget"><i class="fa fa-line-chart" aria-hidden="true"></i> {{trans('navigation.mensual_budget')}}</a></li>
                    </ul>
                </li>
            @endauth
        </ul>
        <ul class="nav nav-pills ms-auto justify-content-end">
            @guest
                <li class="nav-item">
                    <a class="nav-link {{$currentPage == 'login' ? 'active' : ''}}" href="/{{app()->getLocale()}}/login"><i class="fa fa-sign-in" aria-hidden="true"></i> {{trans('navigation.login')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$currentPage == 'register' ? 'active' : ''}}" href="/{{app()->getLocale()}}/register"><i class="fa fa-user-plus" aria-hidden="true"></i> {{trans('navigation.register')}}</a>
                </li>
            @endguest
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{$currentTab == 'user' ? 'active' : ''}}" data-bs-toggle="dropdown" role="button" aria-expanded="false" aria-disabled="true"><img class="rounded-circle" src="{{Auth::user()->avatar_url}}" width="25px" height="25px"> {{Auth::user()->name}}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{$currentPage == 'my-profile' ? 'active' : ''}}" href="/{{app()->getLocale()}}/user/{{strtolower(Auth::user()->name)}}"><i class="fa fa-user" aria-hidden="true"></i> {{trans('navigation.my_profile')}}</a></li>
                        <li><a class="dropdown-item" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> {{trans('navigation.logout')}}</a></li>
                    </ul>
                </li>
            @endauth
        </ul>
    </div>
  </div>
</nav>
