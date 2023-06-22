<nav class="navbar navbar-default" style="position:fixed;padding-top:3vh; width:99vw;">
    <div class="container-fluid">
        <div class="navbar-header" style="margin: 16px;">
            <a class="text-color" style="text-decoration:none;">
                <img class="img" src="/img/NoxGamingQC.png" width="50" height="50" />
                <h3 class="raleway-font" style="display: inline; margin: 5px;">NoxGamingQC</h3>
            </a> 
            <ul class="nav navbar-nav navbar-center" style="font-size:30px">
                <div class="row">
                @auth
                    <div class="col-xs-2 col-xs-offset-1">
                @endauth
                @guest
                    <div class="col-xs-2 col-xs-offset-2">
                @endguest
                        <li id="home" class="nav-home"><a href="/{{app()->getLocale()}}/home"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    </div>
                    <div class="col-xs-2">
                        <li id="about_us" class="nav-about_us">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
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
                    </div>
                    @auth
                    <div class="col-xs-2">
                        <li id="miscs" class="nav-miscs">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
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
                    </div>
                    @endauth
                    <div class="col-xs-2">
                        <li id="language" class="nav-language">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-language" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                        <li>
                            <a href="/language/set/en-ca"><i class="fa fa-language" aria-hidden="true"></i> English (Canada)</a>
                            <a href="/language/set/fr-ca"><i class="fa fa-language" aria-hidden="true"></i> Français (Canada)</a>
                        </li>
                    </ul>
                        </li>
                    </div>
                    <div class="col-xs-2">
                        <li id="profile" class="nav-profile">
                            @auth
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                @if(Auth::user()->AvatarURL)
                                    <img class="img img-circle status-{{Auth::user()->status}}" src="{{Auth::user()->AvatarURL}}" width="36px" style="border-width: 2px;" />
                                @else
                                    <img class="img img-circle status-{{Auth::user()->status}}" src="/img/no-avatar.jpg" width="36px" style="border-width: 2px;" />
                                @endif
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
                            @endauth
                            @guest
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('login', app()->getLocale()) }}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{trans("general.login")}}</a>
                                    <a href="{{ route('register', app()->getLocale()) }}"><i class="fa fa-user-plus" aria-hidden="true"></i> {{trans("general.register")}}</a>
                                </li>
                            </ul>
                            @endguest
                        </li>
                    </div>
                    @auth
                        <div class="col-xs-1">
                        </div>
                    @endauth
                    @guest
                        <div class="col-xs-2">
                        </div>
                    @endguest
                </div>
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
