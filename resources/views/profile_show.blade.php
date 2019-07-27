@extends('layouts.app')
@section('title', $username . '\'s profile')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="text-center">
                    <img class="img-circle" src="{{$avatarURL}}" alt="{{$discordName}}" width="120px" style="padding: 7px 14px" />
                    <h1>{{$username}} <small>{{$firstname}} {{$lastname}}</small></h1>
                    <h3>{{$grade}}</h3>
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
                <h4>User aknowledgement</h4>
                <hr />
                <ul>
                    <li><b>Account Level:</b> {{$grade}}</li>
                    <li><b>Premium User:</b> {{$isPremium}}</li>
                    @if($gender)<li><b>Gender:</b> {{$gender}}</li>@endif
                    @if($birthdate)<li><b>Birthdate:</b> {{$birthdate}}</li>@endif
                    @if($age)<li><b>Age:</b> {{$age}}</li>@endif
                    <li><b>Country:</b> {{$country}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h4>Discord user aknowledgement</h4>
                <hr />
                <ul>
                    <li><b>ID:</b> {{$discordID}}</li>
                    <li><b>Username:</b> {{$discordName . '#' . $discriminator}}</li>
                    <li><b>Language:</b> {{$language}}</li>
                    <li><b>Nitro Subscription:</b> {{$nitroSubscription}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop
