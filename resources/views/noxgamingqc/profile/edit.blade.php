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
                        <img class="img img-circle user-status status-{{$state}}" id="avatar" src="{{$avatarURL}}" width="100px"/>
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


<div class="row bg-dark">
    <div class="col-md-12 content-item">
        <div class="container">
            <h3>{{trans('profile.preferences')}}</h3>
            <hr />
            <div class="col-md-12">
                <div class="form-group">
                    <label for="theme">{{trans('profile.theme')}}</label>
                    <select class="selectpicker" id="theme" title="Default">
                        <option value="dark" {{$theme === "dark" ? 'selected' : ''}}>{{(trans('profile.theme_dark'))}}</option>
                        <option value="dracula" {{$theme === "dracula" ? 'selected' : ''}}>{{(trans('profile.theme_dracula'))}}</option>
                        <option value="light" {{$theme === "light" ? 'selected' : ''}}>{{(trans('profile.theme_light'))}}</option>
                        <option value="grayscale" {{$theme === "grayscale" ? 'selected' : ''}}>{{(trans('profile.theme_grayscale'))}}</option>
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
                toastr.success('Editing success', 'You\'re profile have been saved successfuly. If you changed the theme, the change will be applied on the next page you visit.')
                $('#submit').removeClass('disabled');
                $('#submit').removeAttr('disabled', '');
                window.location.reload();
            },
            error: function (error) {
                toastr.error('An error occured', 'An error occured while trying to edit your profil try again later.')
                $('#submit').removeClass('disabled');
                $('#submit').removeAttr('disabled', '');
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
