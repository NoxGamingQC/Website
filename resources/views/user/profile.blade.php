@extends('layouts.app')

@section('title', $username . '\'s profile')
@section('thumbnail', $avatarURL ?? '/img/no-avatar.jpg')
@section('description', $aboutMe ?? '')

@section('content')
<input type="hidden" id="userId" value="{{ $id }}">

<div class="container-fluid">
    <div class="row">
        {{-- Sidebar / Avatar + Basic Info --}}
        <div class="col-md-3 col-md-offset-1 text-start mb-4">
            <img class="img img-circle {{ $isCurrentUser ? 'user-status img-own-avatar' : 'img-user-avatar' }} status-{{ $state }}"
                 src="{{ $avatarURL ?? '/img/no-avatar.jpg' }}" 
                 alt="{{ $username }}" title="{{ $username }}" width="100%" />

            <h1 class="raleway-font"><b>{{ $firstname ?? '' }} {{ $lastname ?? '' }}</b></h1>
            <h2 class="raleway-font text-muted">{{ $username }}{{ $pronouns ? ' · ' . $pronouns : '' }}</h2>
            <h3 class="raleway-font">{{ trans('profile.' . ($grade ?? 'member')) }}</h3>

            @if(!empty($badges))
                <hr />
                <h4 class="raleway-font"><b>{{ trans('profile.badges') }}</b></h4>
                @foreach($badges as $badge)
                    <img src="/img/Badges/{{ $badge }}.png" class="profile-badge" alt="{{ ucfirst($badge) }}" title="{{ ucfirst($badge) }}" width="75px" />
                @endforeach
            @endif

            @if($gender || $birthdate || $age || $discordUser || $country || $isPremium || $pointCount)
                <br />
                <h4><b>{{ trans('profile.user_acknowledgement') }}</b></h4>
                @if($gender)<p><b>{{ trans('profile.gender') }}:</b> {{ trans('profile.' . strtolower($gender)) }}</p>@endif
                @if($birthdate)<p><b>{{ trans('profile.birthdate') }}:</b> {{ $birthdate }}</p>@endif
                @if($age)<p><b>{{ trans('profile.age') }}:</b> {{ $age }}</p>@endif
                @if($pointCount)<p><b>Points:</b> {{ $pointCount }}</p>@endif
                @if($discordUser)
                    <p><b>{{ trans('profile.discord_id') }}:</b> {{ $discordUser->discord_id ?? '' }}</p>
                    <p><b>{{ trans('profile.discord_name') }}:</b> {{ $discordUser->name ?? '' }}</p>
                @endif
                @if($country)
                    <img class="img img-circle" 
                         src="https://cdn.countryflags.com/thumbs/{{ str_replace(' ', '-', strtolower($country)) }}/flag-square-500.png" 
                         alt="{{ $country }}" title="{{ $country }}" width="60px" style="padding: 7px 14px" />
                @endif
                @if($isPremium)
                    <img src="/img/Badges/premium.png" class="profile-badge" alt="{{ trans('profile.premium') }}" title="{{ trans('profile.premium') }}" width="75px" />
                @endif
            @endif
        </div>

        {{-- Main Content --}}
        <div class="col-md-7">
            {{-- Edit button --}}
            @auth
                @if(Auth::user()->id == $id)
                    <div class="text-end mb-3">
                        <a href="/{{ app()->getLocale() }}/user/me/edit" class="btn btn-warning">{{ trans('general.edit_profile') }}</a>
                    </div>
                @endif
            @endauth

            {{-- About Me --}}
            @if(!empty($aboutMe))
                <div class="col-md-12 section markdown mb-5">
                    <div class="card">
                        <div class="card-header">
                            <span class="display-6">{{ trans('general.about_me') }}</span>
                        </div>
                        <div class="card-body">{!! $aboutMe !!}</div>
                    </div>
                </div>
            @endif

            {{-- Xbox / Minecraft --}}
            <div class="section row mb-5">
                {{-- Xbox --}}
                @if($xbox_profile && is_object($xbox_profile) && isset($xbox_profile->data))
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-header" style="{{ ($xbox_profile->data->account_tier ?? '') === 'Gold' ? 'background-color:#d48d00' : '' }}">
                                <span class="display-6">{{ $xbox_profile->data->username ?? '' }}</span>
                                <span class="float-end display-6">{{ $xbox_profile->data->tenure_level->level ?? '' }}</span>
                            </div>
                            <div class="row g-0" style="height:175px;overflow:hidden">
                                <div class="col-md-4">
                                    <img src="{{ $xbox_profile->data->avatar ?? '' }}" class="img-fluid rounded-start" alt="" style="height:100%">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Xbox</h5>
                                        <p>ID: {{ $xbox_profile->data->id ?? '' }}</p>
                                        <p>Réputation: {{ $xbox_profile->data->xbox_one_rep ?? '' }}</p>
                                        <p>Score: {{ $xbox_profile->data->gamerscore ?? '' }} <span class="badge rounded-circle" style="background-color:#000;">G</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Minecraft --}}
                @if($minecraft && is_array($minecraft) && isset($minecraft['name']))
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <span class="display-6">{{ $minecraft['name'] }}</span>
                            </div>
                            <div class="row g-0" style="height:175px;overflow:hidden">
                                <div class="col-md-4">
                                    @if(!empty($minecraft['avatar']))
                                        <img class="img-fluid rounded-start" src="{{ $minecraft['avatar'] }}" alt="avatar" title="avatar" style="height:100%">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Minecraft</h5>
                                        <p>UUID: {{ $minecraft['uuid'] ?? '' }}</p>
                                        @if(!empty($minecraft['cape']))
                                            <img src="{{ $minecraft['cape'] }}" height="50" alt="cape" style="margin-right:5px">
                                        @endif
                                        @if(!empty($minecraft['full_skin']))
                                            <img src="{{ $minecraft['full_skin'] }}" height="50" alt="full skin" style="margin-right:5px">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Points --}}
            @if(!empty($points) && count($points) > 0)
                <div class="section">
                    <h3>{{ trans('profile.points_log') }}</h3>
                    <ul>
                        @foreach($points as $point)
                            <li>{{ $point->quantity . ' ' . trans('profile.points') }} - {{ $point->comment }}</li>
                        @endforeach
                    </ul>
                </div>
            @elseif(!empty($points))
                <p>{{ trans('profile.no_points') }}</p>
            @endif
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var theme = $('html').attr('data-bs-theme');
    var bg = theme === 'light' ? '#f5f5f588' : '#25252588';
    $('body').attr('style', 'background-color:' + bg + '; background-image: linear-gradient(105deg,' + bg + ', {{$user->color ?? "#000"}}88,' + bg + ')');
});
</script>
@endsection