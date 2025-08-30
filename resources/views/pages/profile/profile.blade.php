@extends('layouts.app')
@section('title', $username . '\'s profile')
@section('thumbnail', $avatarURL)
@section('description', $aboutMe ? $aboutMe : '')
@section('content')

<input type="hidden" id="userId" value="{{$id}}">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
                @if($avatarURL)
                    <img class="img img-circle {{$isCurrentUser ? 'user-status img-own-avatar' : 'img-user-avatar'}} status-{{$state}}" src="{{$avatarURL}}" alt="{{$username}}" title="{{$username}}" width="100%" />
                @else
                    <img class="img img-circle {{$isCurrentUser ? 'user-status img-own-avatar' : 'img-user-avatar'}} status-{{$state}}" src="/img/no-avatar.jpg" alt="{{$username}}" title="{{$username}}" width="100%" />
                @endif
                <h1 class="raleway-font"><b>{{$firstname}} {{$lastname}}</b></h1>
                <h2 class="raleway-font text-muted">{{$username}} {{$pronouns ? '· ' .  $pronouns : ''}}</h2>
                <h3 class="raleway-font">{{ trans('profile.' . $grade) }}</h3>
                @if($badges)
                <hr />
                    <h4 class="raleway-font"><b>{{trans('profile.badges')}}</b></h4>
                    @foreach ($badges as $badge)
                        <img src="/img/Badges/{{$badge}}.png" class="profile-badge" alt="{{ucfirst($badge)}}" title="{{ucfirst($badge)}}" width="75px" />
                    @endforeach
                @endif
                @if($gender || $birthdate || $age || $discordUser || $country || $isPremium || $pointCount)
                <br />
                <h4><b>{{ trans('profile.user_acknowledgement') }}</b></h4>
                <br />
                    @if($gender)<p><b>&nbsp&nbsp{{ trans('profile.gender') }}:</b> {{trans('profile.' . strtolower($gender))}}</p>@endif
                    @if($birthdate)<p><b>&nbsp&nbsp{{ trans('profile.birthdate') }}:</b> {{$birthdate}}</p>@endif
                    @if($age)<p><b>&nbsp&nbsp{{ trans('profile.age') }}:</b> {{$age}}</p>@endif
                    @if($pointCount)<p><b>&nbsp&nbspPoints:</b> {{$pointCount}}</p>@endif
                    @if($discordUser)<p><b>&nbsp&nbsp{{ trans('profile.discord_id') }}:</b> {{$discordUser->discord_id}}</p>@endif
                    @if($discordUser)<p><b>&nbsp&nbsp{{ trans('profile.discord_name') }}:</b> {{$discordUser->name}}</p>@endif
                    @if($country || $isPremium)
                        @if($country)
                            <img class="img img-circle" src="https://cdn.countryflags.com/thumbs/{{str_replace(' ', '-', strtolower($country))}}/flag-square-500.png" alt="{{$country}}" title="{{$country}}" width="60px"  style="padding: 7px 14px" />
                        @endif
                        @if($isPremium)
                            <img src="/img/Badges/premium.png" class="profile-badge" alt="{{trans('profile.premium')}}" title="{{trans('profile.premium')}}" width="75px" />
                        @endif
                    @endif
                @endif
                
        </div>
        <div class="col-md-7">
            @auth
                @if(Auth::user()->id == $id)
                <div class="col-md-3 col-md-offset-9" class="text-right">
                    <a type="button" href="/{{app()->getLocale()}}/user/me/edit" class="btn btn-warning">{{trans('general.edit_profile');}}</a>
                </div>
                <br />&nbsp
                @endif
            @endauth
            @if($aboutMe)
                <div class="col-md-12 section markdown" class="text-right" style="margin-bottom:5%;">
                    <div class="card">
                        <div class="card-header">
                            <span class="display-6">{{trans('general.about_me')}}</span>
                        </div>
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body">
                                    {!! $aboutMe !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="section">
                <div class="row" style="margin-bottom:5%;">
                    @if($xbox_profile)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header" style="{{$xbox_profile->data->account_tier === 'Gold' ? 'background-color:#d48d00' : ''}}">
                                    <span class="display-6">{{$xbox_profile->data->username}}</span> <span class="pull-right display-6">{{$xbox_profile->data->tenure_level->level}}</span>
                                </div>
                                <div class="row g-0" style="height:175px;overflow:hidden">
                                    <div class="col-md-4">
                                        <img src="{{$xbox_profile->data->avatar}}" class="img-fluid rounded-start" alt="" style="height:100%">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Xbox</h5>
                                            <p class="card-text">ID: {{$xbox_profile->data->id}}</p>
                                            <p class="card-text">Réputation: {{$xbox_profile->data->xbox_one_rep}}</p>
                                            <p class="card-text">Score du joueur: {{$xbox_profile->data->gamerscore}} <span class="badge rounded-circle" style="background-color:#000;">G</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($minecraft)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <span class="display-6">{{$minecraft['name']}}</span>
                                </div>
                                <div class="row g-0" style="height:175px;overflow:hidden">
                                    <div class="col-md-4" style="overflow:hidden;">
                                        @if(!empty($minecraft['avatar']))
                                            <img class="img-fluid rounded-start" src="{{$minecraft['avatar']}}" height="100%" alt="avatar" title="avatar">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Minecraft</h5>
                                            <p class="card-text">UUID: {{$minecraft['uuid']}}</p>
                                            @if(!empty($minecraft['cape']))
                                                <img src="{{$minecraft['cape']}}" height="50" alt="cape" title="cape" style="margin-right:5px">
                                            @endif
                                            @if(!empty($minecraft['full_skin']))
                                                <img src="{{$minecraft['full_skin']}}" height="50" alt="full skin" title="full skin" style="margin-right:5px">
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @if($points)
                <div class="section">
                    <div class="row">
                        <h3>{{ trans('profile.points_log') }}</h3>
                        <br />
                        @if($points)
                            <ul>
                                @foreach ($points as $key => $point)
                                    <li>{{$point->quantity . ' ' . trans('profile.points')}} - {{$point->comment}}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>{{trans('profile.no_points')}}</p>
                        @endif
                    </div>
                </div>
            @endif
            </div>
        <div class="col-md-1"></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var theme = $('html').attr('data-bs-theme');
        if (theme === 'light') {
            var backgroundColor = '#f5f5f588';
        } else if(theme === 'dark') {
            var backgroundColor = '#25252588';
        }
        $('body').attr('style', 'background-color: ' + backgroundColor + ';background-image: linear-gradient(105deg, ' + backgroundColor + ', {{$user->color}}88, ' + backgroundColor);
    });
</script>
@stop
