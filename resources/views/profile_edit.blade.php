@extends('layouts.app')
@section('title', 'Edit profile')
@section('content')

<h1>Profile Editing Page</h1>
<hr />
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h3>Discord Profile</h3>
                    <hr />
                    <div class="col-md-6">
                        <ul>
                            <li><b>ID: </b> {{$discordID}}</li>
                            <li><b>Username: </b> {{$discordName . '#' . $discriminator}}</li>
                            <li><b>Language: </b> {{$language}}</li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-center">
                        <img class="img-circle" src="{{$avatarURL}}" alt="{{$discordName}}" width="120px" style="padding: 7px 14px" />
                        <p>To change your profile picture you must change it on Discord too</p>
                    </div>
                    <a class="btn btn-primary" href="https://discordapp.com/api/oauth2/authorize?client_id=395657323135238157&redirect_uri={{Request::url()}}&response_type=code&scope=identify&guilds&email">Update Discord information</a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h3>Profile Information</h3>
                    <hr />
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthdate">Birthdate</label>
                            <input type="text" class="form-control" id="birthdate" placeholder="Birthdate" value="{{$birthdate}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="selectpicker" id="gender" title="Gender">
                                <option value="1" {{$gender == '1' ? 'selected' : ''}}>Male</option>
                                <option value="2" {{$gender == '2' ? 'selected' : ''}}>Female</option>
                                <option value="0" {{$gender == '0' ? 'selected' : ''}}>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" placeholder="Country" value="{{$country}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
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
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
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
                $('#submit').removeClass('disabled');
                $('#submit').removeAttr('disabled', '');
            },
            error: function (error) {
                $('#submit').removeClass('disabled');
                $('#submit').removeAttr('disabled', '');
                console.log(error);
            }
        })
    });
</script>
@stop
