<nav class="navbar navbar-default" style="position:fixed;padding-top:3vh; width:99vw;">
    <div class="container-fluid">
        <div class="navbar-header" style="margin: 16px;">
            <a href="/{{app()->getLocale()}}" class="text-color" style="text-decoration:none;">
                <img class="img" src="/img/NoxGamingQC.png" width="50" height="50" />
                <h3 class="raleway-font" style="display: inline; margin: 5px;">NoxGamingQC</h3>
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false" style="margin-top:-5px;margin-bottom:20px;padding:12px;border-radius:10px;">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
            <ul class="nav navbar-nav navbar-center">
                <li id="home" class="nav-home"><a href="/{{app()->getLocale()}}/home"><i class="fa fa-home" aria-hidden="true"></i> {{ trans('general.welcome') }} <span class="sr-only">current</span></a></li>
                <li id="about_us" class="dropdown">
                    @if(!$page_lists['about_me']['inMaintenance'])
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-user" aria-hidden="true"></i> {{trans("general.about_us")}} <span class="caret"></span>
                    </a>
                    @else
                    <a class="disabled">
                        <i class="fa fa-wrench" aria-hidden="true"></i> {{trans("general.about_us")}} <span class="caret"></span>
                    </a>
                    @endif
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/{{app()->getLocale()}}/about_us/contact" class="{{($page_lists['contact_us']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-address-book " aria-hidden="true"></i> {{trans('general.contact_us')}}</a>
                            <a href="/{{app()->getLocale()}}/about_us/games" class="{{($page_lists['games']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-gamepad" aria-hidden="true"></i> {{ trans('general.games_list') }}</a>
                            <a href="/{{app()->getLocale()}}/about_us/partners" class=""><i class="fa fa-handshake-o" aria-hidden="true"></i> {{ trans('general.partners') }}</a>
                            <a href="/{{app()->getLocale()}}/about_us/projects" class="{{($page_lists['projects']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-heart" aria-hidden="true"></i> {{ trans('general.projects') }}</a>
                            <a href="/{{app()->getLocale()}}/about_us/teams" class=""><i class="fa fa-users" aria-hidden="true"></i> {{ trans('general.teams') }}</a>
                            <a href="/{{app()->getLocale()}}/about_us/twitch" class="{{($page_lists['twitch']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-twitch" aria-hidden="true"></i> {{ trans('general.twitch') }}</a>
                            <a href="/{{app()->getLocale()}}/about_us/youtube" class="{{($page_lists['youtube']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-youtube-play" aria-hidden="true"></i> {{ trans('general.youtube') }}</a>
                        
                        </li>
                    </ul>
                </li>
                @auth
                    @if(Auth::user()->isPremium)
                        <li id="miscs" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-briefcase" aria-hidden="true"></i> {{trans('general.miscs')}} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    @auth
                                    @if(Auth::user()->isPremium)
                                        <a href="/{{app()->getLocale()}}/cookbook" class=""><i class="fa fa-book" aria-hidden="true"></i> {{ trans('cookbook.title') }}</a>
                                    @endif
                                    @endauth
                                    <!--<a href="/{app()->getLocale()}}/store" class=""><i class="fa fa-shopping-cart" aria-hidden="true"></i> { trans('general.store') }}</a>-->
                                </li>
                            </ul>
                        </li>
                    @endif
                @endauth
                @auth
                    @if(Auth::user()->isDev || Auth::user()->isAdmin || Auth::user()->isModerator)
                        <li id="management" class="dropdown">
                        @if(!$page_lists['management']['inMaintenance'])
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-dashboard" aria-hidden="true"></i> {{trans("general.management")}} <span class="caret"></span>
                            </a>
                        @else
                            <a class="disabled">
                                <i class="fa fa-wrench" aria-hidden="true"></i> {{trans("general.management")}} <span class="caret"></span>
                            </a>
                        @endif
                            <ul class="dropdown-menu">
                                <li>
                                    <!--<a href="/app()->getLocale()}}/management/pages" class="$page_lists['pages']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-cogs" aria-hidden="true"></i> trans("general.pages")}}</a>-->
                                    <a href="/{{app()->getLocale()}}/management/settings" class=""><i class="fa fa-cogs" aria-hidden="true"></i> {{trans("general.settings")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/modules" class="{{($page_lists['modules']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-cogs" aria-hidden="true"></i> {{trans("general.modules")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/users" class="{{($page_lists['users']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-user-circle" aria-hidden="true"></i> {{trans("general.users")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/activities" class="{{($page_lists['bot_activities']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-bullseye" aria-hidden="true"></i> {{trans("general.bot_status")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/tasks" class="{{($page_lists['todolist']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-tasks" aria-hidden="true"></i> {{trans("general.tasks")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/logs" class="{{($page_lists['logs']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-tasks" aria-hidden="true"></i> {{trans("general.logs")}}</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endauth
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-language" aria-hidden="true"></i> {{trans("general.language")}} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/language/set/en-ca"><i class="fa fa-language" aria-hidden="true"></i> English (Canada)</a>
                            <a href="/language/set/fr-ca"><i class="fa fa-language" aria-hidden="true"></i> Français (Canada)</a>
                        </li>
                    </ul>
                </li>
                @auth
                    <li id="profile" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                
                                @if(Auth::user()->local_mail)
                                    <a href="/{{app()->getLocale()}}/profile/mail"><i class="fa fa-envelope" aria-hidden="true"></i> {{trans('general.mails')}}</a>
                                @endif
                                <a href="/{{app()->getLocale()}}/profile/edit"  class="{{($page_lists['profile_edit']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-wrench" aria-hidden="true"></i> {{trans('general.edit_profile')}}</a>
                                <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> {{trans('general.logout')}}</a>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    @if(!$page_lists['login']['inMaintenance'])
                        <li id="profile" class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i> My profile <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('login', app()->getLocale()) }}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{trans("general.login")}}</a>
                                    <a href="{{ route('register', app()->getLocale()) }}"><i class="fa fa-user-plus" aria-hidden="true"></i> {{trans("general.register")}}</a>
                                </li>
                            </ul>
                        </li>
                    @else
                    <li class="dropdown">
                            <a class="disabled">
                                <i class="fa fa-wrench" aria-hidden="true"></i> My profile <span class="caret"></span>
                            </a>
                        </li>
                    @endif
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
    $('#submitSearch').click(function () {
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
    });
</script>
