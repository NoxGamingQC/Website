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
                    <form>
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
                                <input type="text" class="form-control" id="email" placeholder="Firstname" value="{{$firstname}}" />
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
                                <input type="text" class="form-control" id="gender" placeholder="Gender" value="{{$gender}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" placeholder="Country" value="{{$country}}" />
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h3>Profile Preferences</h3>
                    <hr />
                    <form>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="theme">Theme</label>
                                <input type="text" class="form-control" id="theme" placeholder="Default" value="{{$theme}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="isFirstnameShowned">Show Firstname</label>
                                <input type="text" class="form-control" id="isFirstnameShowned" placeholder="Show Firstname" value="{{$isFirstnameShowned}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="isLastnameShowned">Show Lastname</label>
                                <input type="text" class="form-control" id="isLastnameShowned" placeholder="Show Lastname" value="{{$isLastnameShowned}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="isGenderShowned">Show gender</label>
                                <input type="text" class="form-control" id="isGenderShowned" placeholder="Show Gender" value="{{$isGenderShowned}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="isBirthdateShowned">Show birthdate</label>
                                <input type="text" class="form-control" id="isBirthdateShowned" placeholder="Show birthdate" value="{{$isBirthdateShowned}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="isAgeShowned">Show Age</label>
                                <input type="text" class="form-control" id="isAgeShowned" placeholder="Show Age" value="{{$isAgeShowned}}" />
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
