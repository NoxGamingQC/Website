@extends('layouts.app')
@section('title', $username . '\'s profile')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary-red">
            <div class="panel-body">
                <div class="text-center">
                    <img class="img-circle" src="{{$avatarURL}}" alt="{{$discordName}}" width="120px" style="padding: 7px 14px" />
                    <h1>{{$username}} <small style="color: #BBBBBB;">{{$firstname}} {{$lastname}}</small></h1>
                    <h3>{{ trans('profile.' . $grade) }}</h3>
                    @foreach ($discordBadges as $badge)
                    <img src="/img/{{$badge}}.png" alt="{{$badge}}" width="75px" style="padding: 7px 14px" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h4>{{ trans('profile.user_acknowledgement') }}</h4>
                <hr />
                <ul>
                    <li><b>{{ trans('profile.account_level') }}:</b> {{ trans('profile.' . $grade) }}</li>
                    <li><b>{{ trans('profile.premium_user') }}:</b> {{$isPremium}}</li>
                    @if($gender)<li><b>{{ trans('profile.gender') }}:</b> {{$gender}}</li>@endif
                    @if($birthdate)<li><b>{{ trans('profile.birthdate') }}:</b> {{$birthdate}}</li>@endif
                    @if($age)<li><b>{{ trans('profile.age') }}:</b> {{$age}}</li>@endif
                    <li><b>{{ trans('profile.country') }}:</b> {{$country}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h4>{{ trans('profile.discord_user_acknowledgement') }}</h4>
                <hr />
                <ul>
                    <li><b>{{ trans('profile.id') }}:</b> {{$discordID}}</li>
                    <li><b>{{ trans('profile.username') }}:</b> {{$discordName . '#' . $discriminator}}</li>
                    <li><b>{{ trans('profile.language') }}:</b> {{$language}}</li>
                    <li><b>{{ trans('profile.nitro_subscription') }}:</b> {{$nitroSubscription}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop
