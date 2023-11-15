<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="/{{app()->getLocale()}}" class="text-color">
                <img class="img" src="/img/logo.svg" width="50" height="50" />
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li id="home" class="nav-home"><a class="nav-item" href="/{{app()->getLocale()}}/home"><i class="fa fa-home" aria-hidden="true"></i> {{ trans('general.welcome') }} <span class="sr-only">current</span></a></li>
                <li id="about_us" class="dropdown">
                    <a href="#" class="nav-item dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-user" aria-hidden="true"></i> {{trans("general.about_us")}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/{{app()->getLocale()}}/about_us/contact"><i class="fa fa-address-book " aria-hidden="true"></i> {{trans('general.contact_us')}}</a>
                            <!--<a href="/{app()->getLocale()}}/about_us/games"><i class="fa fa-gamepad" aria-hidden="true"></i> { trans('general.games_list') }}</a>-->
                            <a href="/{{app()->getLocale()}}/about_us/partners" class=""><i class="fa fa-handshake-o" aria-hidden="true"></i> {{ trans('general.partners') }}</a>
                            <a href="/{{app()->getLocale()}}/about_us/projects"><i class="fa fa-heart" aria-hidden="true"></i> {{ trans('general.projects') }}</a>
                            <a href="/{{app()->getLocale()}}/about_us/teams" class=""><i class="fa fa-users" aria-hidden="true"></i> {{ trans('general.teams') }}</a>
                            <a href="/{{app()->getLocale()}}/about_us/twitch"><i class="fa fa-twitch" aria-hidden="true"></i> {{ trans('general.twitch') }}</a>
                            <!--<a href="/{app()->getLocale()}}/about_us/youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i> { trans('general.youtube') }}</a>-->
                        
                        </li>
                    </ul>
                </li>
                @if(true == false)
                    @auth
                        @if(Auth::user()->has_premium)
                            <li id="premium" class="dropdown">
                                <a href="#" class="nav-item dropdown-toggle nav" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-star" aria-hidden="true"></i> {{trans('general.premium')}} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/{{app()->getLocale()}}/cookbook" class=""><i class="fa fa-book" aria-hidden="true"></i> {{ trans('cookbook.title') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @endauth
                @endif
                @auth
                    @if(Auth::user()->hasDiscordServer() || Auth::user()->is_management)
                        <li id="noxbot" class="dropdown">
                            <a href="#" class="nav-item dropdown-toggle nav" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-star" aria-hidden="true"></i> {{trans('noxbot.noxbot')}} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/{{app()->getLocale()}}/noxbot/dashboard" class=""><i class="fa fa-book" aria-hidden="true"></i> {{ trans('noxbot.dashboard') }}</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endauth
                @auth
                    @if(Auth::user()->is_management)
                        <li id="management" class="dropdown">
                            <a href="#" class="nav-item dropdown-toggle nav" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-dashboard" aria-hidden="true"></i> {{trans("general.management")}} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <!--<a href="/app()->getLocale()}}/management/pages" class="$page_lists['pages']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-cogs" aria-hidden="true"></i> trans("general.pages")}}</a>-->
                                    <a href="/{{app()->getLocale()}}/management/settings" class=""><i class="fa fa-cogs" aria-hidden="true"></i> {{trans("general.settings")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/modules" ><i class="fa fa-cogs" aria-hidden="true"></i> {{trans("general.modules")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/users"><i class="fa fa-user-circle" aria-hidden="true"></i> {{trans("general.users")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/activities"><i class="fa fa-bullseye" aria-hidden="true"></i> {{trans("general.bot_status")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/tasks"><i class="fa fa-tasks" aria-hidden="true"></i> {{trans("general.tasks")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/logs"><i class="fa fa-tasks" aria-hidden="true"></i> {{trans("general.logs")}}</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="nav-item dropdown-toggle nav" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-language" aria-hidden="true"></i> {{trans("general.language")}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/language/set/en-ca"><img src="https://cdn.countryflags.com/thumbs/canada/flag-400.png" width="25px" /> English (Canada)</a>
                            <a href="/language/set/fr-ca"><img src="https://cdn.countryflags.com/thumbs/canada/flag-400.png" width="25px" /> Français (Canada)</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown mobile-hidden">
                    <a href="#" class="nav-item dropdown-toggle nav" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-bell" aria-hidden="true"><span class="badge-danger raleway-font">0</span></i>
                    </a>
                    <ul id="notificationDropdown" class="dropdown-menu">
                        <li id="NoNotificationText">
                            <span class="text-center">No notification</span>
                        </li>
                    </ul>
                </li>

                @auth
                    <li id="profile" class="dropdown">
                        <a href="#" class="nav-item dropdown-toggle nav" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                             <img class="img img-circle status-{{(Auth::user()->lock_status == 'online') ? Auth::user()->status : Auth::user()->lock_status}}" src="{{App\User::getPicture(Auth::user())}}" width="24px" />
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                @if(Auth::user()->local_mail)
                                    <a href="/{{app()->getLocale()}}/mail"><i class="fa fa-envelope" aria-hidden="true"></i> {{trans('general.mails')}}</a>
                                @endif
                                <a href="/{{app()->getLocale()}}/user/{{Auth::user()->name}}"><i class="fa fa-wrench" aria-hidden="true"></i> {{trans('general.my_profile')}}</a>
                                <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> {{trans('general.logout')}}</a>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li id="profile" class="dropdown">
                        <a href="#" class="nav-item dropdown-toggle nav" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> My profile <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('login', app()->getLocale()) }}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{trans("general.login")}}</a>
                                <a href="{{ route('register', app()->getLocale()) }}"><i class="fa fa-user-plus" aria-hidden="true"></i> {{trans("general.register")}}</a>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<script>
    var language = $('html').attr('lang');
    $('#' + window.location.pathname.split('/' + language + '/')[1].split('/')[0]).addClass('current-page')
    if('#' + window.location.pathname.split('/' + language + '/')[1].split('/')[0] == 'login' || '#' + window.location.pathname.split('/' + language + '/')[1].split('/')[0] == "register") {
        $('#profile').addClass('current-page')
    }

    function checkState() {
        $.ajax({
            url: '/api/check_state',
            type: 'GET',
            success: function (response) {
                $('.img-own-avatar').each(function(key, value) {
                    $(value).removeClass('status-online');
                    $(value).removeClass('status-idle');
                    $(value).removeClass('status-dnd');
                    $(value).removeClass('status-offline');
                    $(value).addClass('status-' + response);
                    checkState();
                })
            }
        })
    }

    function checkUserState() {
        if($('#userId').length > 0) {
            $.ajax({
                url: '/api/check_state/' + $('#userId').val(),
                type: 'GET',
                success: function (response) {
                    $('.img-own-avatar').each(function(key, value) {
                        $(value).removeClass('status-online');
                        $(value).removeClass('status-idle');
                        $(value).removeClass('status-dnd');
                        $(value).removeClass('status-offline');
                        $(value).addClass('status-' + response);
                        checkUserState();
                    })
                }
            })
        }
    }

    checkState();
    checkUserState();

    var typingTimer;                //timer identifier
    var doneTypingInterval = 1000;  //time in ms, 5 seconds for example
    var $input = $('#navSearch');

    //on keyup, start the countdown
    $input.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    $input.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    function doneTyping () {
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
                navSearchHTML += '<ul class="list-unstyled">'
                navSearchHTML += '<li class="dropdown open">'
                navSearchHTML +=    '<ul class="dropdown-menu">'
                navSearchHTML +=        '<li>'
                $.each(response, function(key, user) {
                    navSearchHTML +=    '<a href="/' + language + '/profile/show/' + user.id + '"> '+ user.username +'</a>'
                })
                navSearchHTML +=        '</li>'
                navSearchHTML +=    '</ul>'
                navSearchHTML += '</li>'
                navSearchHTML += '</ul>'
                $("#navSearchResult").empty().append( navSearchHTML );
            }
        })
    }
</script>
