@extends('layouts.pages.app')
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
                <h1 class="raleway-font">
                    <b>
                        <div class="col-md-6">
                            <input id="firstname" class="form-control" type="text" placeholder="Firstname" value="{{$firstname ? $firstname : ''}}"/>
                        </div>
                        <div class="col-md-6">
                            <input id="lastname" class="form-control" type="text" placeholder="Lastname" value="{{$lastname ? $lastname : ''}}" />
                        </div>
                    </b>
                </h1>
                <h2 class="raleway-font text-muted">
                    <b>
                        <div class="col-md-6">
                            <input id="username" class="form-control" type="text" placeholder="Username" value="{{$username}} " />
                        </div>
                        <div class="col-md-6">
                            <input id="pronouns" class="form-control" type="text" placeholder="Pronouns" value="{{$pronouns ? $pronouns : ''}}" />
                        </div>
                     <div class="col-md-12">
                            <input id="email" class="form-control" type="text" placeholder="e-mail" value="{{Auth::user()->email ? Auth::user()->email : null}}" />
                    </div>
                    </b>
                    <div class="col-md-12">
                        <br />
                        <p>Receive our email updates &nbsp&nbsp<input type="checkbox" {{Auth::user()->is_email_subscriber ? 'checked' : ''}} /> </p>
                    </div>
                </h2>
                <div class="col-md-12">
                    <br />
                    <br />
                </div>
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
                @if($xbox_profile)
                    @if($xbox_profile->data->tenure_level->img)
                        <h4><b>{{ trans('profile.xbox_badge') }}</b></h4>
                        <img src="{{$xbox_profile->data->tenure_level->img}}" alt="{{$xbox_profile->data->tenure_level->level}}" width="50px" />
                        @if(!$xbox_profile->data->watermarks)
                            <br />
                        @endif
                    @endif
                    @if($xbox_profile->data->watermarks)
                        @if(!$xbox_profile->data->tenure_level->img)
                            <h4><b>{{ trans('profile.xbox_badge') }}</b></h4>
                            <br />
                        @endif
                        @foreach($xbox_profile->data->watermarks as $watermark_name => $watermark_img)
                                <img src="{{$watermark_img}}" alt="{{$watermark_name}}" width="50px" />
                        @endforeach
                        <br />
                    @endif
                @endif
        </div>
        <div class="col-md-7">
            <div class="col-md-12 section markdown" class="text-right">
                {{Auth::user()->about_me}}
            </div>
            <div class="section">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Xbox</h3>
                    </div>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Xbox username" value="{{Auth::user()->xbox_gamertag ? Auth::user()->xbox_gamertag : null}}" />
                        <br />
                        <span class="text-danger">Using another xbox account then the one that you own, is identity theft. Make sure you write your account actual username. Make sure to check your profile in case you did a typo. If no modification is made and you get reported, it is punishable by our management team.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h3>Account linking</h3>
                <ul>
                    <li class="text-info">The option to link your Discord account is comming back soon. Sorry for any inconveniance.</li>
                    <li class="text-info">The option to link your Minecraft account is comming back soon. Sorry for any inconveniance.</li>
                </ul>
            </div>
        <div class="col-md-1"></div>
    </div>
</div>
@stop
