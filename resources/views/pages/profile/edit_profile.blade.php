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
            <h1>{{trans('profile.edit_profile')}} &nbsp&nbsp<a href="/{{app()->getLocale()}}/user/{{Auth::user()->name}}" class="btn btn-info">{{trans('profile.go_back')}}</a><h1>
            <div class="col-md-12 section markdown my-5" class="text-right">
                <div class="card">
                    <div class="card-header">
                        <span class="display-6">{{trans('profile.display')}}</span>
                    </div>
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text form-control">{{trans('profile.show_firstname')}}</span>
                                        <div class="input-group-text">
                                            <input id="showFirstname" class="form-check-input mt-0" type="checkbox" {{Auth::user()->show_firstname ? 'checked' : ''}}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text form-control">{{trans('profile.show_lastname')}}</span>
                                        <div class="input-group-text">
                                            <input id="showLastname"  class="form-check-input mt-0" type="checkbox" {{Auth::user()->show_lastname ? 'checked' : ''}}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text form-control">{{trans('profile.show_birthdate')}}</span>
                                        <div class="input-group-text">
                                            <input id="showBirthdate"  class="form-check-input mt-0" type="checkbox" {{Auth::user()->show_birthdate ? 'checked' : ''}}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text form-control">{{trans('profile.show_age')}}</span>
                                        <div class="input-group-text">
                                            <input id="showAge"  class="form-check-input mt-0" type="checkbox" {{Auth::user()->show_age ? 'checked' : ''}}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text form-control">{{trans('profile.show_gender')}}</span>
                                        <div class="input-group-text">
                                            <input id="showGender"  class="form-check-input mt-0" type="checkbox" {{Auth::user()->show_gender ? 'checked' : ''}}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="col-12 py-5">
                <div class="card">
                    <div class="card-header">
                        <span class="display-6">{{trans('profile.personnal_informations')}}</span>
                    </div>
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.username')}}</span>
                                            <input type="text" class="form-control" id="username" value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.email')}}</span>
                                            <input type="text" class="form-control" id="email" value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <br />
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.firstname')}}</span>
                                            <input type="text" class="form-control" id="firstname" value="{{Auth::user()->firstname}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.lastname')}}</span>
                                            <input type="text" class="form-control" id="lastname" value="{{Auth::user()->lastname}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <br />
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.birthdate')}}</span>
                                            <input type="text" class="form-control" id="birthdate" value="{{Auth::user()->birthdate}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.country')}}</span>
                                            <input type="text" class="form-control" id="country" value="{{Auth::user()->country}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <br />
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.gender')}}</span>
                                            <input type="text" class="form-control" id="gender" value="{{Auth::user()->gender}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.pronouns')}}</span>
                                            <input type="text" class="form-control" id="pronouns" value="{{Auth::user()->pronouns}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 section markdown" class="text-right" style="margin-bottom:5%;">
                <div class="card">
                    <div class="card-header">
                        <span class="display-6">{{trans('general.about_me')}}</span>
                    </div>
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <textarea class="form-control" rows="4">{{Auth::user()->about_me}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row" style="margin-bottom:5%;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <span class="display-6">{{trans('profile.gaming_profiles')}}</span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">Xbox</span>
                                            <input type="text" class="form-control" id="xbox" value="{{Auth::user()->xbox_gamertag}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">Minecraft UUID</span>
                                            <input type="text" class="form-control" id="xbox" value="{{Auth::user()->minecraft_uuid}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="row" style="margin-bottom:5%;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <span class="display-6">{{trans('profile.preferences')}}</span>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.theme')}}</span>
                                            <input type="text" class="form-control" id="theme" value="{{Auth::user()->theme}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.color')}}</span>
                                            <input type="color" class="form-control form-control-color" id="color" value="#880000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pull-right">
                <input type="button" class="btn btn-success disabled" value="{{trans('general.save')}}" disabled />
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@stop
