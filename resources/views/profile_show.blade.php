@extends('layouts.app')
@section('title', $username . '\'s profile')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-block-primary">
            <div class="panel-body" style="padding: 5%">
                @if ($country)
                    @if($isPremium)
                    <div class="col-md-6 text-left">
                    @else
                    <div class="col-md-12 text-left">
                    @endif
                        <img class="img-circle" src="https://cdn.countryflags.com/thumbs/{{str_replace(' ', '-', strtolower($country))}}/flag-square-500.png" alt="{{$country}}" title="{{$country}}" width="40px" />
                    </div>
                @endif
                @if($isPremium)
                    @if($country)
                    <div class="col-md-6 text-right">
                    @else
                    <div class="col-md-12 text-right">
                    @endif
                        <img src="/img/Badges/premium.png" alt="{{trans('profile.premium')}}" title="{{trans('profile.premium')}}" width="40px" />
                    </div>
                @endif
                <div class="col-md-12 text-center">
                    @if($avatarURL)
                        <img class="img-circle" src="{{$avatarURL}}" alt="{{$username}}" title="{{$username}}" width="250px" style="padding: 7px 14px" />
                    @else
                        <img class="img-circle" src="/img/no-avatar.jpg" alt="{{$username}}" title="{{$username}}" width="250px" style="padding: 7px 14px" />
                    @endif
                    <h1>
                        {{$username}}
                        <br />
                        <small style="color: #BBBBBB;">{{$firstname}} {{$lastname}}</small>
                    </h1>
                    <h3>{{ trans('profile.' . $grade) }}</h3>
                    @foreach ($badges as $badge)
                        <img src="/img/Badges/{{$badge}}.png" alt="{{ucfirst($badge)}}" title="{{ucfirst($badge)}}" width="75px" style="padding: 7px 14px" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <h3>{{ trans('profile.user_acknowledgement') }}</h3>
        <br />
        <ul>
            @if($gender)<li><b>{{ trans('profile.gender') }}:</b> {{$gender}}</li>@endif
            @if($birthdate)<li><b>{{ trans('profile.birthdate') }}:</b> {{$birthdate}}</li>@endif
            @if($age)<li><b>{{ trans('profile.age') }}:</b> {{$age}}</li>@endif
        </ul>
    </div>
</div>
@stop
