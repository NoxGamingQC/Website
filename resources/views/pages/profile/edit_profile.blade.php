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
                                            <input type="text" class="form-control {{$user->is_verified ? 'text-success' : 'text-danger'}} disabled" id="email" value="{{$user->email}}" disabled>
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
                                            <input type="text" class="form-control" id="birthdate" placeholder="YYYY-MM-DD" value="{{$user->birthdate}}">
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
                                            <select id="gender" class="form-select" aria-label="{{trans('profile.gender')}}">
                                                <option value="" {{$user->gender === null ? 'selected' : ''}}>{{trans('profile.not_specified')}}</option>
                                                <option value="1" {{$user->gender === 1 ? 'selected' : ''}}>{{trans('profile.male')}}</option>
                                                <option value="2" {{$user->gender === 2 ? 'selected' : ''}}>{{trans('profile.female')}}</option>
                                            </select>
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
                                <textarea id="aboutMe" class="form-control" rows="4">{{$user->about_me}}</textarea>
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
                                            <select id="language" class="form-select" aria-label="{{trans('profile.theme')}}">
                                                <option value="en-ca" {{$user->preferred_language === 'en-ca' ? 'selected' : ''}}>{{trans('profile.en_ca')}}</option>
                                                <option value="fr-ca" {{$user->preferred_language === 'fr-ca' ? 'selected' : ''}}>{{trans('profile.fr_ca')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <span class="input-group-text">{{trans('profile.theme')}}</span>
                                            <select id="theme" class="form-select" aria-label="{{trans('profile.theme')}}">
                                                <option value="" {{$user->theme === null ? 'selected' : ''}}>{{trans('profile.system')}}</option>
                                                <option value="light" {{$user->theme === 'light' ? 'selected' : ''}}>{{trans('profile.light')}}</option>
                                                <option value="dark" {{$user->theme === 'dark' ? 'selected' : ''}}>{{trans('profile.dark')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <br />
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
                <button id="submit" type="button" class="btn btn-success">{{trans('general.save')}}</button>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<script>
$('#submit').on('click', function() {
    $.ajax({
            url:  '/' + $('html').attr('lang') + "/user/me/save",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {
                'username': $('#username').val(),
                'firstname': $('#firstname').val(),
                'lastname': $('#lastname').val(),
                'birthdate': $('#birthdate').val(),
                'country': $('#country').val(),
                'gender': $('#gender').val(),
                'pronouns': $('#pronouns').val(),
                'about_me': $('#aboutMe').val(),
                'xbox_gamertag': $('#xbox').val(),
                'minecraft_uuid': $('#minecraft').val(),
                'roblox': $('#roblox').val(),
                'theme': $('#theme').val(),
                'color': $('#color').val(),
                'show_firstname': $('#showFirstname').is(':checked'),
                'show_lastname': $('#showLastname').is(':checked'),
                'show_birthdate': $('#showBirthdate').is(':checked'),
                'show_age': $('#showAge').is(':checked'),
                'show_gender': $('#showGender').is(':checked'),
                'language': $('#language').val()
            },
            beforeSend: function() {
                $('#submit').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
                $('#submit').addClass('disabled');
                $('#submit').attr('disabled', true);
            },
            success: function () {
                window.location.href = '/{{app()->getLocale()}}/user/{{$user->id}}';
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log('Save failed. An error occured.');
            },
            complete: function() {
                $('#submit').html('{{trans('general.save')}}');
                $('#submit').removeClass('disabled');
                $('#submit').attr('disabled', false);
            }
    });
});
</script>
@endsection
