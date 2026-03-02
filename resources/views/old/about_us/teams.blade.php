@extends('layouts.pages.app')
@section('title', trans('teams.teams'))
@section('slogan', trans('teams.description'))
@section('content')

<div class="container section">
    <div class="row">
        <div class="col-md-12 content-item">
            <div class="row">
            <div class="col-md-4">
                    <div class="panel panel-default text-center">
                        <div class="panel-body img" style="background-image: url('/img/Teams/PositivityST.jpg') !important; background-size: cover !important; height: 200px !important; background-position:center center">
                            <h2 class="text-badge"><b>Positivity Stream Team</b></h2>
                            <p class="text-badge"><b>Manager</b></p>
                        </div>
                    </div>
                </div>    
                <div class="col-md-4">
                    <div class="panel panel-default text-center">
                        <div class="panel-body img" style="background-image: url('/img/Teams/LaDreamTeam.png') !important; background-size: cover !important; height: 200px !important; background-position:center center">
                            <h2 class="text-badge"><b>La Dream Team</b></h2>
                            <p class="text-badge"><b>Moderator</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default text-center">
                        <div class="panel-body img" style="background-image: url('/img/Teams/LZB Racing.png') !important; background-size: cover !important; height: 200px !important; background-position:center center">
                            <h2 class="text-badge"><b>Lay-Z-Boy Racing</b></h2>
                            <p class="text-badge"><b>Member</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container section">
    <div class="row">
        <div class="col-md-12 bg-dark content-item">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default text-center">
                        <div class="panel-body  background-position:center centerimg" style="background-image: url('/img/Teams/Irae Gaming.png') !important; background-size: cover !important; height: 200px !important; background-position:center center">
                            <h2 class="text-badge"><b>Irae Gaming</b></h2>
                            <p class="text-badge"><b>Member</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop