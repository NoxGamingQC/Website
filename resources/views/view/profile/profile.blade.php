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
            @if($aboutMe)
                <div class="section markdown">
                    {!! $aboutMe !!}
                </div>
            @endif
            @if($xbox_profile)
                <div class="section">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Xbox</h3>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li>ID: {{$xbox_profile->data->id}}</li>
                                <li>{{trans('profile.username')}}: {{$xbox_profile->data->username}}</li>
                                <li>{{trans('profile.gamerscore')}}: {{$xbox_profile->data->gamerscore}}</li>
                                <li>{{trans('profile.xbox_one_rep')}}: {{$xbox_profile->data->xbox_one_rep}}</li>
                                <li>{{trans('profile.account_tier')}}: {{$xbox_profile->data->account_tier}}</li>
                                @if($xbox_profile->data->tenure_level->img)
                                    <br />
                                    <img src="{{$xbox_profile->data->tenure_level->img}}" alt="{{$xbox_profile->data->tenure_level->level}}" width="50px" style="margin:5px" />
                                    @if(!$xbox_profile->data->watermarks)
                                        <br />
                                    @endif
                                @endif
                                @if($xbox_profile->data->watermarks)
                                    @if(!$xbox_profile->data->tenure_level)
                                        <br />
                                    @endif
                                    @foreach($xbox_profile->data->watermarks as $watermark_name => $watermark_img)
                                            <img src="{{$watermark_img}}" alt="{{$watermark_name}}" width="50px" style="margin:5px" />
                                    @endforeach
                                    <br />
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            @if($minecraft)
                <div class="section">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Minecraft</h3>
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
                                <img src="{{$minecraft['avatar']}}" height="75" alt="avatar" title="avatar" style="margin-right:5px">
                            @endif
                            @if(!empty($minecraft['cape']))
                            <img src="{{$minecraft['cape']}}" height="75" alt="cape" title="cape" style="margin-right:5px">
                            @endif
                            @if(!empty($minecraft['full_skin']))
                            <img src="{{$minecraft['full_skin']}}" height="75" alt="full skin" title="full skin" style="margin-right:5px">
                            @endif
                        </div>
                    </div>
                </div>
            @endif
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
@stop
