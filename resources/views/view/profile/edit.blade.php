@extends('layouts.noxgamingqc.app')
@section('title', trans('profile.profile_edit'))
@section('content')

<div class="row">
    <div class="col-md-12 content-item">
        <div class="container">
            <h3>{{trans('profile.profile_info')}} <a href="/{{app()->getLocale()}}/profile/show/{{$id}}" class="push-right btn btn-primary">{{trans('profile.show')}}</a></h3>
            <br />
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">{{trans('profile.username')}}</label>
                        <input type="text" class="form-control" id="username" placeholder="Username" value="{{$username}}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-6">
                        <label for="avatar">{{trans('profile.avatar')}}</label>
                        <input class="form-control" id="selectAvatar" type="file" />
                    </div>
                    <div class="col-md-6 text-center">
                        <img class="img img-circle img-own-avatar user-status status-{{$state}}" id="avatar" src="{{$avatarURL}}" width="100px"/>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">{{trans('profile.email')}}</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" value="{{$email}}" />
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">{{trans('profile.firstname')}}</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Firstname" value="{{$firstname}}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname">{{trans('profile.lastname')}}</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Lastname" value="{{$lastname}}" />
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birthdate">{{trans('profile.birthdate')}}</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="datepicker form-control" id="birthdate" placeholder="Birthdate" value="{{$birthdate}}" />
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">{{trans('profile.gender')}}</label>
                        <br />
                        <select class="selectpicker" id="gender" title="Gender">
                            <option value="1" {{$gender == '1' ? 'selected' : ''}}>{{trans('profile.male')}}</option>
                            <option value="2" {{$gender == '2' ? 'selected' : ''}}>{{trans('profile.female')}}</option>
                            <option value="0" {{$gender == '0' ? 'selected' : ''}}>{{trans('profile.other')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">{{trans('profile.country')}}</label>
                        <input type="text" class="form-control" id="country" placeholder="Country" value="{{$country}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="container">
            <h3>{{trans('profile.about_me')}}</h3>
            <hr />
            <textarea class="form-control" placeholder="{{trans('profile.about_me_placeholder')}}" rows="6" disabled>{{$aboutMe}}</textarea>
        </div>
    </div>
</div>
<div class="row bg-dark">
    <div class="col-md-12 content-item">
        <div class="container">
            <h3>{{trans('profile.preferences')}}</h3>
            <hr />
            <div class="col-md-6">
                <div class="form-group">
                    <label for="theme">{{trans('profile.theme')}}</label>
                    <select class="selectpicker" id="theme" title="Default" {{$mainTheme['force'] === "true" ? 'disabled' : ''}}>
                        <option value="dark" {{($theme === "dark" || !isset($theme)) ? 'selected' : ''}}>{{(trans('profile.theme_dark'))}}</option>
                        <option value="dracula" {{$theme === "dracula" ? 'selected' : ''}}>{{(trans('profile.theme_dracula'))}}</option>
                        <option value="light" {{$theme === "light" ? 'selected' : ''}}>{{(trans('profile.theme_light'))}}</option>
                        <option value="grayscale" {{$theme === "grayscale" ? 'selected' : ''}}>{{(trans('profile.theme_grayscale'))}}</option>
                    </select>
                    @if($mainTheme['force'] === "true")
                        <br />
                        <span class="text-warning">
                            Sorry, but the theme is currently locked by an administrator
                            <br />
                            and can't be changed at this moment. Please try again later.
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="avatar-preference">{{trans('profile.avatar_preference')}}</label>
                    <select class="selectpicker" id="avatarPreference" title="Default" disabled>
                        <option value="picture" {{(!isset($avatarPreference)) ? 'selected' : ''}}>{{(trans('profile.picture'))}}</option>
                        <option value="minecraft" {{$avatarPreference === "minecraft" ? 'selected' : ''}}>{{(trans('profile.minecraft_avatar'))}}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="showFirstname">{{trans('profile.show_firstname')}}</label>
                    <input type="checkbox" id="showFirstname" value="{{$isFirstnameShowned}}" {{ $isFirstnameShowned ? 'checked' : '' }} />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="showLastname">{{trans('profile.show_lastname')}}</label>
                    <input type="checkbox" id="showLastname" value="{{$isLastnameShowned}}" {{ $isLastnameShowned ? 'checked' : '' }} />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="showGender">{{trans('profile.show_gender')}}</label>
                    <input type="checkbox" id="showGender" value="{{$isGenderShowned}}" {{ $isGenderShowned ? 'checked' : '' }} />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="showBirthdate">{{trans('profile.show_birthdate')}}</label>
                    <input type="checkbox" id="showBirthdate" value="{{$isBirthdateShowned}}" {{ $isBirthdateShowned ? 'checked' : '' }} />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="showAge">{{trans('profile.show_age')}}</label>
                    <input type="checkbox" id="showAge" value="{{$isAgeShowned}}" {{ $isAgeShowned ? 'checked' : '' }} />
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button type="submit" id="submit" class="btn btn-primary">{{trans('general.submit')}}</button>
            </div>
        </div>
    </div>
</div>

<div class="row bg-dark">
    <div class="col-md-12 content-item">
        <div class="container">
            <h3>{{trans('profile.linking_code')}}</h3>
            <div class="row">
                <div class="col-md-8">
                    <input type="text" id="accountLinkToken" class="form-control" placeholder="{{trans('profile.linking_token')}}">
                </div>
                <div class="col-md-4">
                    <select class="selectpicker" id="accountLink" title="{{trans('profile.choose_account_to_link')}}">
                        <option value="discord">Discord</option>
                    </select>
                </div>
                <div class="col-md-12 text-right">
                    <br />
                    <button type="submit" id="submitLinking" class="btn btn-primary">{{trans('profile.submit_linking')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

$(document).ready(function() {
    $('#submit').click(function() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/profile/edit',
            method: 'POST',
            data: {
                'username': $('#username').val(),
                'email': $('#email').val(),
                'firstname': $('#firstname').val(),
                'lastname': $('#lastname').val(),
                'birthdate': $('#birthdate').val(),
                'gender': $('#gender').val(),
                'country': $('#country').val(),
                'theme': $('#theme').val(),
                'showFirstname': $('#showFirstname').is(':checked'),
                'showLastname': $('#showLastname').is(':checked'),
                'showGender': $('#showGender').is(':checked'),
                'showBirthdate': $('#showBirthdate').is(':checked'),
                'showAge': $('#showAge').is(':checked'),
                'avatar' : $('#avatar').attr('src'),
            },
            beforeSend: function() {
                $('#submit').addClass('disabled');
                $('#submit').attr('disabled', '');
            },
            success: function() {
                toastr.success('Editing success', 'You\'re profile have been saved successfuly. Please wait while we reload the page.')
                $('#submit').removeClass('disabled');
                $('#submit').removeAttr('disabled', '');
                window.location.reload();
            },
            error: function (error) {
                toastr.error('An error occured', 'An error occured while trying to edit your profile try again later.')
                $('#submit').removeClass('disabled');
                $('#submit').removeAttr('disabled', '');
                console.log(error);
            }
        })
    });

    $('#submitLinking').click(function() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/profile/link',
            method: 'POST',
            data: {
                platform: $('#accountLink').val(),
                link_token: $('#accountLinkToken').val()
            },
            beforeSend: function() {
                $('#submitLinking').addClass('disabled');
                $('#submitLinking').attr('disabled', '');
            },
            success: function() {
                toastr.success('Editing success', 'You\'re profile have been linked successfuly. Please wait while we reload the page.')
                $('#submitLinking').removeClass('disabled');
                $('#submitLinking').removeAttr('disabled', '');
                window.location.reload();
            },
            error: function (error) {
                toastr.error('An error occured', 'An error occured while trying to link your profile try again later.')
                $('#submitLinking').removeClass('disabled');
                $('#submitLinking').removeAttr('disabled', '');
                console.log(error);
            }
        })
    });

const input = document.getElementById("selectAvatar");
const avatar = document.getElementById("avatar");

const convertBase64 = (file) => {
    return new Promise((resolve, reject) => {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(file);

        fileReader.onload = () => {
            resolve(fileReader.result);
        };

        fileReader.onerror = (error) => {
            reject(error);
        };
    });
};

const uploadImage = async (event) => {
    const file = event.target.files[0];
    const base64 = await convertBase64(file);
    avatar.src = base64;
};

input.addEventListener("change", (e) => {
    uploadImage(e);
});
});
</script>
@stop
