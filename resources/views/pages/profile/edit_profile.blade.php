@extends('layouts.app')
@section('title', $user->name . '\'s profile')
@section('thumbnail', $user->avatar_url)
@section('description', $user->about_me ? $user->about_me : '')
@section('content')

<input type="hidden" id="userId" value="{{$user->id}}">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            @if($user->avatar_url)
                <img class="img img-circle status-{{$user->state}}" src="{{$user->avatar_url}}" alt="{{$user->name}}" title="{{$user->name}}" width="100%" />
            @else
                <img class="img img-circle status-{{$user->state}}" src="/img/no-avatar.jpg" alt="{{$user->name}}" title="{{$user->name}}" width="100%" />
            @endif
            <h1>{{trans('profile.edit_profile')}} &nbsp&nbsp<a href="/{{app()->getLocale()}}/user/{{$user->name}}" class="btn btn-info">{{trans('profile.go_back')}}</a><h1>
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
                                            <input id="showFirstname" class="form-check-input mt-0" type="checkbox" {{$user->show_firstname ? 'checked' : ''}}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text form-control">{{trans('profile.show_lastname')}}</span>
                                        <div class="input-group-text">
                                            <input id="showLastname"  class="form-check-input mt-0" type="checkbox" {{$user->show_lastname ? 'checked' : ''}}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text form-control">{{trans('profile.show_birthdate')}}</span>
                                        <div class="input-group-text">
                                            <input id="showBirthdate"  class="form-check-input mt-0" type="checkbox" {{$user->show_birthdate ? 'checked' : ''}}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text form-control">{{trans('profile.show_age')}}</span>
                                        <div class="input-group-text">
                                            <input id="showAge"  class="form-check-input mt-0" type="checkbox" {{$user->show_age ? 'checked' : ''}}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text form-control">{{trans('profile.show_gender')}}</span>
                                        <div class="input-group-text">
                                            <input id="showGender"  class="form-check-input mt-0" type="checkbox" {{$user->show_gender ? 'checked' : ''}}>
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
                                            <input type="text" class="form-control" id="username" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.email')}}</span>
                                            <input type="text" class="form-control disabled" id="email" value="{{$user->email}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <br />
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.firstname')}}</span>
                                            <input type="text" class="form-control" id="firstname" value="{{$user->firstname}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.lastname')}}</span>
                                            <input type="text" class="form-control" id="lastname" value="{{$user->lastname}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <br />
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.birthdate')}}</span>
                                            <input type="text" class="form-control" id="birthdate" value="{{$user->birthdate}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.country')}}</span>
                                            <input type="text" class="form-control" id="country" value="{{$user->country}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <br />
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.gender')}}</span>
                                            <input type="text" class="form-control" id="gender" value="{{$user->gender}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.pronouns')}}</span>
                                            <input type="text" class="form-control" id="pronouns" value="{{$user->pronouns}}">
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
                                <textarea class="form-control" rows="4">{{$user->about_me}}</textarea>
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
                                            <input type="text" class="form-control" id="xbox" value="{{$user->xbox_gamertag}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">Minecraft UUID</span>
                                            <input type="text" class="form-control" id="minecraft" value="{{$user->minecraft_uuid}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <br />
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">Roblox</span>
                                            <input type="text" class="form-control" id="roblox" value="{{$user->roblox}}">
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
                                            <input type="text" class="form-control" id="theme" value="{{$user->theme}}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.color')}}</span>
                                            <input type="color" class="form-control form-control-color" id="color" value="{{$user->color ? $user->color : '#880000'}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pull-right">
                <input type="button" class="btn btn-success" value="{{trans('general.save')}}" />
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@endsection
