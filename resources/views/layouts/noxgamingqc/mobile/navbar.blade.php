<nav class="navbar navbar-default" style="position:fixed;padding-top:3vh; width:99vw;">
    <div class="container-fluid">
        <div class="navbar-header" style="margin: 16px;">
            <a class="text-color" style="text-decoration:none;">
                <img class="img" src="/img/NoxGamingQC.png" width="50" height="50" />
                <h3 class="raleway-font" style="display: inline; margin: 5px;">NoxGamingQC</h3>
            </a> 
            <ul class="nav navbar-nav navbar-center" style="font-size:30px">
                <div class="row" style="margin-top:-5%;">
                @auth
                    <div class="col-xs-2 col-xs-offset-1">
                @endauth
                @guest
                    <div class="col-xs-2 col-xs-offset-2">
                @endguest
                        <li id="home" class="nav-home text-center" style="padding:5%"><a href="/{{app()->getLocale()}}/home"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                    </div>
                    <div class="col-xs-2">
                        <li id="about_us" class="nav-about_us text-center" style="padding:5%"><a class="text-color" onclick="openNavMenu('#aboutMeMenu')"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                    </div>
                    @auth
                    <div class="col-xs-2">
                        <li id="premium" class="nav-premium text-center" style="padding:5%"><a class="text-color" onclick="openNavMenu('#premiumMenu')"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                    </div>
                    @endauth
                    <div class="col-xs-2">
                        <li id="language" class="nav-language text-center" style="padding:5%"><a class="text-color" onclick="openNavMenu('#languageMenu')"><i class="fa fa-language" aria-hidden="true"></i></a></li>
                    </div>
                    <div class="col-xs-2">
                        <li id="profile" class="nav-profile text-center" style="padding:5%"><a class="text-color" onclick="openNavMenu('#profileMenu')">
                            @auth
                                @if(Auth::user()->AvatarURL)
                                    <img class="img img-circle status-{{Auth::user()->status}}" src="{{Auth::user()->AvatarURL}}" width="36px" style="border-width: 2px;" />
                                @else
                                    <img class="img img-circle status-{{Auth::user()->status}}" src="/img/no-avatar.jpg" width="36px" style="border-width: 2px;" />
                                @endif
                            @endauth
                            @guest
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            @endguest
                        </a></li>
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
            <div class="col-md-12">
                <ul id="aboutMeMenu" class="text-center hidden" hidden>
                    <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/{{app()->getLocale()}}/about_us/contact" class="{{($page_lists['contact_us']['inMaintenance']) ? 'hidden' : ''}}" style="font-size:14px"><i class="fa fa-address-book " aria-hidden="true"></i> {{trans('general.contact_us')}}</a></li>
                    <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/{{app()->getLocale()}}/about_us/games" class="{{($page_lists['games']['inMaintenance']) ? 'hidden' : ''}}" style="font-size:14px"><i class="fa fa-gamepad" aria-hidden="true"></i> {{ trans('general.games_list') }}</a></li>
                    <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/{{app()->getLocale()}}/about_us/partners" class=""><i class="fa fa-handshake-o" aria-hidden="true" style="font-size:14px"></i> {{ trans('general.partners') }}</a></li>
                    <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/{{app()->getLocale()}}/about_us/projects" class="{{($page_lists['projects']['inMaintenance']) ? 'hidden' : ''}}" style="font-size:14px"><i class="fa fa-heart" aria-hidden="true"></i> {{ trans('general.projects') }}</a></li>
                    <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/{{app()->getLocale()}}/about_us/teams" class="" style="font-size:14px"><i class="fa fa-users" aria-hidden="true"></i> {{ trans('general.teams') }}</a></li>
                    <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/{{app()->getLocale()}}/about_us/twitch" class="{{($page_lists['twitch']['inMaintenance']) ? 'hidden' : ''}}" style="font-size:14px"><i class="fa fa-twitch" aria-hidden="true"></i> {{ trans('general.twitch') }}</a></li>
                    <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/{{app()->getLocale()}}/about_us/youtube" class="{{($page_lists['youtube']['inMaintenance']) ? 'hidden' : ''}}" style="font-size:14px"><i class="fa fa-youtube-play" aria-hidden="true"></i> {{ trans('general.youtube') }}</a></li>
                </ul>
                <ul id="premiumMenu" class="text-center hidden" hidden>
                    <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/{{app()->getLocale()}}/kiosk/cookbook" style="font-size:14px">{{trans('general.cookbook')}}</a></li>
                </ul>
                <ul id="languageMenu" class="text-center hidden" hidden>
                    <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/language/set/en-ca" style="font-size:14px"><img class="img img-circle" src="https://cdn.countryflags.com/thumbs/canada/flag-square-500.png" width="15px" /> English (Canada)</a></li>
                    <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/language/set/fr-ca" style="font-size:14px"><img class="img img-circle" src="https://cdn.countryflags.com/thumbs/canada/flag-square-500.png" width="15px" /> Français (Canada)</a></li>
                </ul>
                <ul id="profileMenu" class="text-center hidden" hidden>
                    @auth
                        @if(Auth::user()->local_mail)
                            <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/{{app()->getLocale()}}/profile/mail" style="font-size:14px"><i class="fa fa-envelope" aria-hidden="true"></i> {{trans('general.mails')}}</a></li>
                        @endif
                        <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/{{app()->getLocale()}}/profile/edit"  class="{{($page_lists['profile_edit']['inMaintenance']) ? 'hidden' : ''}}" style="font-size:14px"><i class="fa fa-wrench" aria-hidden="true"></i> {{trans('general.edit_profile')}}</a></li>
                        <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="/logout" style="font-size:14px"><i class="fa fa-sign-out" aria-hidden="true"></i> {{trans('general.logout')}}</a></li>
                    @endauth
                    @guest
                        <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="{{ route('login', app()->getLocale()) }}" style="font-size:14px"><i class="fa fa-sign-in" aria-hidden="true"></i> {{trans("general.login")}}</a></li>
                        <li class="no-decoration" style="padding:5%;margin:2%;border:2px solid white"><a class="text-color" href="{{ route('register', app()->getLocale()) }}" style="font-size:14px"><i class="fa fa-user-plus" aria-hidden="true"></i> {{trans("general.register")}}</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
<script>
    var language = $('html').attr('lang');
    $('#' + window.location.pathname.split('/' + language + '/')[1].split('/')[0]).addClass('current-page')
    if('#' + window.location.pathname.split('/' + language + '/')[1].split('/')[0] == 'login' || '#' + window.location.pathname.split('/' + language + '/')[1].split('/')[0] == "register") {
        $('#profile').addClass('current-page')
    }

$(document).ready(function () {
    openMenuOnClick('#about_us', '#aboutMeMenu');
});

function openNavMenu(menuContainerSelector) {
    if($(menuContainerSelector).hasClass('hidden')) {
        $('#aboutMeMenu').attr('hidden', true);
        $('#languageMenu').attr('hidden', true);
        $('#profileMenu').attr('hidden', true);
        $('#premiumMenu').attr('hidden', true);
        $(menuContainerSelector).removeAttr('hidden');
        $(menuContainerSelector).removeClass('hidden');
    } else {
        $(menuContainerSelector).attr('hidden', true);
        $(menuContainerSelector).addClass('hidden');
    }
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
