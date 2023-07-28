@extends('layouts.app')
@section('title', $username . '\'s profile')
@section('content')


<input type="hidden" id="userId" value="{{$id}}">
<div class="row">
    <div class="col-md-12">
        <div class="header" style="margin-top:8%;position:relative; width: 100vw; height:105vh !important;">
            <div class="col-md-12">
                <br />
            </div>
            <div class="col-md-10 col-md-offset-1">
                <h3>Points: {{$pointCount}}</h3>
            </div>
            @if ($country)
                @if($isPremium)
                <div class="col-md-5 col-md-offset-1 text-left">
                @else
                <div class="col-md-11 col-md-offset-1 text-left">
                @endif
                    <img class="img img-circle" src="https://cdn.countryflags.com/thumbs/{{str_replace(' ', '-', strtolower($country))}}/flag-square-500.png" alt="{{$country}}" title="{{$country}}" width="40px" />
                </div>
            @endif
            @if($isPremium)
                @if($country)
                <div class="col-md-5 text-right">
                @else
                <div class="col-md-11 text-right">
                @endif
                    <img src="/img/Badges/premium.png" alt="{{trans('profile.premium')}}" title="{{trans('profile.premium')}}" width="60px" />
                </div>
                <div class="col-md-1">
                </div>
            @endif
            <div class="col-md-12 text-center">
                @if($avatarURL)
                    <img class="img img-circle {{$isCurrentUser ? 'user-status img-own-avatar' : 'img-user-avatar'}} status-{{$state}}" src="{{$avatarURL}}" alt="{{$username}}" title="{{$username}}" width="250px" />
                @else
                    <img class="img img-circle {{$isCurrentUser ? 'user-status img-own-avatar' : 'img-user-avatar'}} status-{{$state}}" src="/img/no-avatar.jpg" alt="{{$username}}" title="{{$username}}" width="250px" />
                @endif
                <h1>
                    <br />
                    {{$username}}
                    <br />
                    <small style="color: #BBBBBB;">{{$firstname}} {{$lastname}}</small>
                </h1>
                <h3>{{ trans('profile.' . $grade) }}</h3>
                @foreach ($badges as $badge)
                    <img src="/img/Badges/{{$badge}}.png" alt="{{ucfirst($badge)}}" title="{{ucfirst($badge)}}" width="100px" style="padding: 7px 14px" />
                @endforeach
                <br />
                @if($discordUser)
                    <img src="/img/Socials/discord.svg" alt="Discord" title="Discord" width="80px" style="padding: 7px 14px" />
                @endif
                @foreach ($socials as $key => $social)
                    @if(!empty($social))
                        <a href="{{$social}}" class="no-decoration"><img src="/img/Socials/{{$key}}.svg" alt="{{ucfirst($key)}}" title="{{ucfirst($key)}}" width="75px" style="padding: 7px 14px" /></a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row bg-dark">
    <div class="col-md-10 col-md-offset-1 content-item">
        <div class="container-fluid">
            <div class="col-md-6">
                <h3>{{ trans('profile.user_acknowledgement') }}</h3>
                <br />
                <ul>
                    @if($premiumTime === 'lifetime')<li><b>{{ trans('profile.premium_time') }}:</b> {{trans('profile.lifetime')}}</li>@endif
                    @if($premiumTime && $premiumTime !== 'lifetime')<li><b>{{ trans('profile.premium_time') }}:</b> {{$premiumTime}}</li>@endif
                    @if($gender)<li><b>{{ trans('profile.gender') }}:</b> {{trans('profile.' . strtolower($gender))}}</li>@endif
                    @if($birthdate)<li><b>{{ trans('profile.birthdate') }}:</b> {{$birthdate}}</li>@endif
                    @if($age)<li><b>{{ trans('profile.age') }}:</b> {{$age}}</li>@endif
                    @if($discordUser)<li><b>{{ trans('profile.discord_id') }}:</b> {{$discordUser->discord_id}}</li>@endif
                    @if($discordUser)<li><b>{{ trans('profile.discord_name') }}:</b> {{$discordUser->name}}</li>@endif
                </ul>
            </div>
            <div class="col-md-6">
                <h3>{{ trans('profile.points_log') }}</h3>
                <br />
                @if($points)
                    <ul>
                        @foreach ($points as $key => $point)
                            <li>{{$point->Quantity . ' ' . trans('profile.points')}} - {{$point->Comment}}</li>
                        @endforeach
                    </ul>
                @else
                <p>{{trans('profile.no_points')}}</p>
                @endif
            </div>
            @if($minecraft)
            <div class="row">
                <div class="col-md-12">
                    <h3>Minecraft</h3>
                    <hr />
                </div>
                <div class="col-md-6">
                    <ul>
                        <li>{{trans('general.username')}}: {{$minecraft['name']}}</li>
                        <li>UUID: {{$minecraft['uuid']}}</li>
                        <li>{{trans('profile.shorten_uuid')}}: {{$minecraft['shorten_uuid']}}</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    @if(!empty($minecraft['avatar']))
                        <img src="{{$minecraft['avatar']}}" width="100" alt="avatar" title="avatar" style="margin-right:5px">
                    @endif
                    @if(!empty($minecraft['cape']))
                    <img src="{{$minecraft['cape']}}" width="75" alt="cape" title="cape" style="margin-right:5px">
                    @endif
                    @if(!empty($minecraft['full_skin']))
                    <img src="{{$minecraft['full_skin']}}" width="100" alt="full skin" title="full skin" style="margin-right:5px">
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-1">
    </div>
</div>
@stop
