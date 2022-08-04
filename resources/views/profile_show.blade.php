@extends('layouts.app')
@section('title', $username . '\'s profile')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-block-primary">
            <div class="panel-body" style="padding: 20%">
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
    <div class="col-md-12">
        <h3>{{ trans('profile.user_acknowledgement') }}</h3>
        <br />
        <ul>
            <li><b>{{ trans('profile.account_level') }}:</b> {{ trans('profile.' . $grade) }}</li>
            <li><b>{{ trans('profile.premium_user') }}:</b> {{$isPremium ? trans('profile.premium') : trans('profile.not_premium')}}</li>
            @if($gender)<li><b>{{ trans('profile.gender') }}:</b> {{$gender}}</li>@endif
            @if($birthdate)<li><b>{{ trans('profile.birthdate') }}:</b> {{$birthdate}}</li>@endif
            @if($age)<li><b>{{ trans('profile.age') }}:</b> {{$age}}</li>@endif
            <li><b>{{ trans('profile.country') }}:</b> {{$country}}</li>
        </ul>
    </div>
</div>
@stop
