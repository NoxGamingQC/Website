<nav class="navbar navbar-default" style="margin-top: 5%;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div>
                <img class="img" src="/img/NGST.png" width="60" height="60" />
                <h3 class="rochester-font" style="display: inline; margin: 5px; margin-top: 15px; font-stretch: ultra-expanded;">NGST</h3>
                @include('layouts.socials')
            </div>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-home"><a href="/{{app()->getLocale()}}/ngst/home"><i class="fa fa-home" aria-hidden="true"></i> {{ trans('generic.welcome') }} <span class="sr-only">current</span></a></li>
                <li class="dropdown">
                    @if(!$page_lists['about_me']['inMaintenance'])
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-user" aria-hidden="true"></i> {{trans("generic.about_me")}} <span class="caret"></span>
                    </a>
                    @else
                    <a class="disabled">
                        <i class="fa fa-wrench" aria-hidden="true"></i> {{trans("generic.about_me")}} <span class="caret"></span>
                    </a>
                    @endif
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/{{app()->getLocale()}}/ngst/contact" class="{{($page_lists['contact_us']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-address-book " aria-hidden="true"></i> {{trans('generic.contact_us')}}</a>
                            <a href="/{{app()->getLocale()}}/ngst/projects" class="{{($page_lists['projects']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-heart" aria-hidden="true"></i> {{ trans('generic.projects') }}</a>
                        </li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-briefcase" aria-hidden="true"></i> NGST <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/{{app()->getLocale()}}/ngst/services" class=""><i class="fa fa-briefcase" aria-hidden="true"></i> {{ trans('generic.services') }}</a>
                            <a href="/{{app()->getLocale()}}/ngst/store" class=""><i class="fa fa-shopping-cart" aria-hidden="true"></i> {{ trans('generic.store') }}</a>
                        </li>
                    </ul>
                </li>
                <li ><a href="/{{app()->getLocale()}}/home" class=""><i class="fa fa-video-camera" aria-hidden="true"></i> NoxGamingQC</a></li>
                            
                @auth
                    @if(Auth::user()->isDev || Auth::user()->isAdmin || Auth::user()->isModerator)
                        <li class="dropdown">
                        @if(!$page_lists['management']['inMaintenance'])
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-dashboard" aria-hidden="true"></i> {{trans("generic.management")}} <span class="caret"></span>
                            </a>
                        @else
                        <a class="disabled">
                                <i class="fa fa-wrench" aria-hidden="true"></i> {{trans("generic.management")}} <span class="caret"></span>
                            </a>
                        @endif
                            <ul class="dropdown-menu">
                                <li>
                                    <!--<a href="/app()->getLocale()}}/management/pages" class="$page_lists['pages']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-cogs" aria-hidden="true"></i> trans("generic.pages")}}</a>-->
                                    <a href="/{{app()->getLocale()}}/management/settings" class=""><i class="fa fa-cogs" aria-hidden="true"></i> {{trans("generic.settings")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/modules" class="{{($page_lists['modules']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-cogs" aria-hidden="true"></i> {{trans("generic.modules")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/users" class="{{($page_lists['users']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-user-circle" aria-hidden="true"></i> {{trans("generic.users")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/activities" class="{{($page_lists['bot_activities']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-bullseye" aria-hidden="true"></i> {{trans("generic.bot_status")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/tasks" class="{{($page_lists['todolist']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-tasks" aria-hidden="true"></i> {{trans("generic.tasks")}}</a>
                                    <a href="/{{app()->getLocale()}}/management/logs" class="{{($page_lists['logs']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-tasks" aria-hidden="true"></i> {{trans("generic.logs")}}</a>
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
                            <a href="/language/set/en-ca"><i class="fa fa-language" aria-hidden="true"></i> English (Canada)</a>
                            <a href="/language/set/fr-ca"><i class="fa fa-language" aria-hidden="true"></i> Français (Canada)</a>
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
                                <a href="/{{app()->getLocale()}}/profile/edit"  class="{{($page_lists['profile_edit']['inMaintenance']) ? 'hidden' : ''}}"><i class="fa fa-wrench" aria-hidden="true"></i> {{trans('generic.edit_profile')}}</a>
                                <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> {{trans('generic.logout')}}</a>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    @if(!$page_lists['login']['inMaintenance'])
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