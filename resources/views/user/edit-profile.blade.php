@extends('layouts.app')

@section('title', $user->name . '\'s profile')
@section('thumbnail', $user->avatar_url ?? '/img/no-avatar.jpg')
@section('description', $user->about_me ?? '')

@section('content')
<input type="hidden" id="userId" value="{{ $user->id }}">

<div class="container-fluid">
    <div class="row">
        {{-- Sidebar / Avatar --}}
        <div class="col-md-3 col-md-offset-1 text-start mb-4">
            <img class="img img-circle status-{{ $user->state ?? 'offline' }}" 
                 src="{{ $user->avatar() ?? '/img/no-avatar.jpg' }}" 
                 alt="{{ $user->name }}" title="{{ $user->name }}" width="100%" />

            {{-- Upload avatar --}}
            <div class="my-3">
                <input class="form-control" type="file" id="image" accept=".jpg,.jpeg,.png" />
                <input type="hidden" id="avatarURL" value="{{ $user->avatar_url ?? '' }}">
            </div>

            {{-- Go back button --}}
            <h1>
                {{ trans('profile.edit_profile') }} &nbsp;&nbsp;
                <a href="/{{ app()->getLocale() }}/user/{{ $user->name }}" class="btn btn-info">{{ trans('profile.go_back') }}</a>
            </h1>

            {{-- Display settings --}}
            <div class="col-md-12 section markdown my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="display-6">{{ trans('profile.display') }}</span>
                    </div>
                    <div class="card-body">
                        @foreach(['firstname','lastname','birthdate','age','gender'] as $field)
                            <div class="input-group mb-3">
                                <span class="input-group-text form-control">{{ trans("profile.show_$field") }}</span>
                                <div class="input-group-text">
                                    <input id="show{{ ucfirst($field) }}" class="form-check-input mt-0" type="checkbox" {{ $user->{'show_'.$field} ? 'checked' : '' }}>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="col-md-7">
            {{-- Personal Information --}}
            <div class="card mb-4">
                <div class="card-header"><span class="display-6">{{ trans('profile.personnal_informations') }}</span></div>
                <div class="card-body row g-3">
                    <div class="col-6">
                        <input type="text" class="form-control" id="username" value="{{ $user->name }}" placeholder="{{ trans('profile.username') }}">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control {{ $user->is_verified ? 'text-success' : 'text-danger' }}" id="email" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="firstname" value="{{ $user->firstname }}" placeholder="{{ trans('profile.firstname') }}">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="lastname" value="{{ $user->lastname }}" placeholder="{{ trans('profile.lastname') }}">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="birthdate" placeholder="YYYY-MM-DD" value="{{ $user->birthdate }}">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="country" value="{{ $user->country }}">
                    </div>
                    <div class="col-6">
                        <select id="gender" class="form-select">
                            <option value="" {{ $user->gender === null ? 'selected' : '' }}>{{ trans('profile.not_specified') }}</option>
                            <option value="1" {{ $user->gender === 1 ? 'selected' : '' }}>{{ trans('profile.male') }}</option>
                            <option value="2" {{ $user->gender === 2 ? 'selected' : '' }}>{{ trans('profile.female') }}</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="pronouns" value="{{ $user->pronouns }}" placeholder="{{ trans('profile.pronouns') }}">
                    </div>
                </div>
            </div>

            {{-- About Me --}}
            <div class="card mb-4">
                <div class="card-header"><span class="display-6">{{ trans('general.about_me') }}</span></div>
                <div class="card-body">
                    <textarea id="aboutMe" class="form-control" rows="4">{{ $user->about_me }}</textarea>
                </div>
            </div>

            {{-- Gaming Profiles --}}
            <div class="card mb-4">
                <div class="card-header"><span class="display-6">{{ trans('profile.gaming_profiles') }}</span></div>
                <div class="card-body row g-3">
                    <div class="col-6">
                        <input type="text" class="form-control" id="xbox" value="{{ $user->xbox_gamertag }}" placeholder="Xbox">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="minecraft" value="{{ $user->minecraft_uuid }}" placeholder="Minecraft UUID">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="roblox" value="{{ $user->roblox }}" placeholder="Roblox">
                    </div>
                </div>
            </div>

            {{-- Preferences --}}
            <div class="card mb-4">
                <div class="card-header"><span class="display-6">{{ trans('profile.preferences') }}</span></div>
                <div class="card-body row g-3">
                    <div class="col-6">
                        <select id="language" class="form-select">
                            <option value="en-ca" {{ $user->preferred_language === 'en-ca' ? 'selected' : '' }}>{{ trans('profile.en_ca') }}</option>
                            <option value="fr-ca" {{ $user->preferred_language === 'fr-ca' ? 'selected' : '' }}>{{ trans('profile.fr_ca') }}</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select id="avatar_preference" class="form-select">
                            <option value="" {{ $user->avatar_preference == null ? 'selected' : '' }}>{{ trans('profile.uploaded_image') }}</option>
                            <option value="minecraft" {{ $user->avatar_preference === 'minecraft' ? 'selected' : '' }}>{{ trans('profile.minecraft') }}</option>
                            <option value="xbox" {{ $user->avatar_preference === 'xbox' ? 'selected' : '' }}>{{ trans('profile.xbox') }}</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select id="theme" class="form-select">
                            <option value="" {{ $user->theme === null ? 'selected' : '' }}>{{ trans('profile.system') }}</option>
                            <option value="light" {{ $user->theme === 'light' ? 'selected' : '' }}>{{ trans('profile.light') }}</option>
                            <option value="dark" {{ $user->theme === 'dark' ? 'selected' : '' }}>{{ trans('profile.dark') }}</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <input type="color" class="form-control form-control-color" id="color" value="{{ $user->color ?? '#880000' }}">
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button id="submit" class="btn btn-success">{{ trans('general.save') }}</button>
            </div>
        </div>
    </div>
</div>

@include('user.edit-profile-scripts')
@endsection