@extends('layouts.app')
@section('title', 'Edit profile')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h1>Profile Edition<a href="/{{app()->getLocale()}}/profile/show/{{$id}}" class="push-right btn btn-primary">{{trans('profile.show')}}</a></h1>
            <hr />
        </div>
        <div class="col-md-12">
            <h3>Profile Information</h3>
            <br />
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Username" value="{{$username}}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" value="{{$email}}" />
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Firstname" value="{{$firstname}}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Lastname" value="{{$lastname}}" />
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birthdate">Birthdate</label>
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
                        <label for="gender">Gender</label>
                        <br />
                        <select class="selectpicker" id="gender" title="Gender">
                            <option value="1" {{$gender == '1' ? 'selected' : ''}}>Male</option>
                            <option value="2" {{$gender == '2' ? 'selected' : ''}}>Female</option>
                            <option value="0" {{$gender == '0' ? 'selected' : ''}}>Other</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" placeholder="Country" value="{{$country}}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <h3>Profile Preferences</h3>
            <hr />
            <div class="col-md-12">
                <div class="form-group">
                    <label for="theme">Theme</label>
                    <select class="selectpicker" id="theme" title="Default">
                        <option value="default" {{$theme == 'default' ? 'selected' : ''}}>Default</option>
                        <option value="dracula" {{$theme == 'dracula' ? 'selected' : ''}}>Dracula</option>
                        <option value="light" {{$theme == 'light' ? 'selected' : ''}}>Light</option>
                    </select>
                    <p class="warning-text"><i>P.S. Theme changes will be applies on reload</i></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="showFirstname">Show Firstname</label>
                    <input type="checkbox" id="showFirstname" value="{{$isFirstnameShowned}}" {{ $isFirstnameShowned ? 'checked' : '' }} />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="showLastname">Show Lastname</label>
                    <input type="checkbox" id="showLastname" value="{{$isLastnameShowned}}" {{ $isLastnameShowned ? 'checked' : '' }} />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="showGender">Show gender</label>
                    <input type="checkbox" id="showGender" value="{{$isGenderShowned}}" {{ $isGenderShowned ? 'checked' : '' }} />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="showBirthdate">Show birthdate</label>
                    <input type="checkbox" id="showBirthdate" value="{{$isBirthdateShowned}}" {{ $isBirthdateShowned ? 'checked' : '' }} />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="showAge">Show Age</label>
                    <input type="checkbox" id="showAge" value="{{$isAgeShowned}}" {{ $isAgeShowned ? 'checked' : '' }} />
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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
            url: '/en/profile/edit',
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
            },
            beforeSend: function() {
                $('#submit').addClass('disabled');
                $('#submit').attr('disabled', '');
            },
            success: function() {
                toastr.success('Editing success', 'You\'re profile have been saved successfuly. If you changed the theme, the change will be applied on the next page you visit.')
                $('#submit').removeClass('disabled');
                $('#submit').removeAttr('disabled', '');
            },
            error: function (error) {
                toastr.error('An error occured', 'An error occured while trying to edit your profil try again later.')
                $('#submit').removeClass('disabled');
                $('#submit').removeAttr('disabled', '');
                console.log(error);
            }
        })
    });
});
</script>
@stop
