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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-user" aria-hidden="true"></i> {{trans("generic.about_me")}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <!--<a href="/{{app()->getLocale()}}/games"><i class="fa fa-gamepad" aria-hidden="true"></i> {{ trans('generic.games_list') }}</a>-->
                            <a href="/{{app()->getLocale()}}/twitch"><i class="fa fa-twitch" aria-hidden="true"></i> {{ trans('generic.twitch') }}</a>
                            <a href="/{{app()->getLocale()}}/youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i> {{ trans('generic.youtube') }}</a>
                            <a href="/{{app()->getLocale()}}/contact"><i class="fa fa-address-book " aria-hidden="true"></i> {{trans('generic.contact_us')}}</a>
                        
                        </li>
                    </ul>
                </li>
                <li class="nav-projects"><a href="/{{app()->getLocale()}}/projects"><i class="fa fa-heart" aria-hidden="true"></i> {{ trans('generic.projects') }}</a></li> <li class="nav-projects">
                @auth
                    @if(Auth::user()->isDev || Auth::user()->isAdmin || Auth::user()->isModerator)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-dashboard" aria-hidden="true"></i> {{trans("generic.management")}} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/{{app()->getLocale()}}/management/modules"><i class="fa fa-cogs" aria-hidden="true"></i> {{trans("generic.modules")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/users"><i class="fa fa-user-circle" aria-hidden="true"></i> {{trans("generic.users")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/activities"><i class="fa fa-bullseye" aria-hidden="true"></i> {{trans("generic.bot_status")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/tasks"><i class="fa fa-tasks" aria-hidden="true"></i> {{trans("generic.tasks")}}</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-language" aria-hidden="true"></i> {{trans("generic.language")}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/language/set/en"><i class="fa fa-language" aria-hidden="true"></i> English ({{trans("generic.english")}})</a>
                            <a href="/language/set/fr"><i class="fa fa-language" aria-hidden="true"></i> Français ({{trans("generic.french")}})</a>
                        </li>
                    </ul>
                </li>
                @auth
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/{{app()->getLocale()}}/profile/edit"><i class="fa fa-wrench" aria-hidden="true"></i> {{trans('generic.edit_profile')}}</a>
                                <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> {{trans('generic.logout')}}</a>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> My profile <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('login', app()->getLocale()) }}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{trans("generic.login")}}</a>
                                <a href="{{ route('register', app()->getLocale()) }}"><i class="fa fa-user-plus" aria-hidden="true"></i> {{trans("generic.register")}}</a>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
            <div class="col-md-3">
                <form id="search" role="search"> 
                    <div class="input-group">
                        <input type="text" class="form-control" id="navSearch" placeholder="{{trans('generic.search')}}...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button"><i id="navSearchButton" class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
                <div id="navSearchResult"></div>
            </div>
        </div>
    </div>
</nav>
<script type="text/javascript">
        var language = $('html').attr('lang');
    $('#search').click(function () {
        $.ajax({
            url: '/' + language +'/search',
            type: 'GET',
            data: {
                'search': $('#navSearch').val()
            },
            beforeSend: function() {
                //$('#navSearchButton').
            },
            complete: function() {
                //$('#navSearchButton').
            },
            success: function (response) {
                var navSearchHTML = '';
                navSearchHTML += '<li class="dropdown open">'
                navSearchHTML +=    '<ul class="dropdown-menu">'
                navSearchHTML +=        '<li>'
                $.each(response, function(key, user) {
                    navSearchHTML += user.username
                    navSearchHTML +=    '<a href="/' + language + '/profile/show/' + user.id + '"> '+ user.username +'</a>'
                })
                navSearchHTML +=        '</li>'
                navSearchHTML +=    '</ul>'
                navSearchHTML += '</li>'
                $("#navSearchResult").empty().append( navSearchHTML );
            }
        })
    });
</script>
