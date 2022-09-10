@extends('layouts.app')
@section('title', 'Teams')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>{{trans('generic.teams')}}</h1>
            <hr />
        </div>
        </div class="col-md-12">
            <div class="row">
            <div class="col-md-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-body img" style="background-image: url('/img/Teams/PositivityST.jpg') !important; background-size: cover !important; height: 380px !important;">
                            <h2 class="title"><b>Positivity Stream Team</b></h2>
                            <p class="title"><b>Manager</b></p>
                        </div>
                    </div>
                </div>    
                <div class="col-md-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-body img" style="background-image: url('/img/Teams/LaDreamTeam.png') !important; background-size: cover !important; height: 380px !important;">
                            <h2 class="title"><b>La Dream Team</b></h2>
                            <p class="title"><b>Moderator</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-body img" style="background-image: url('/img/Teams/LZB Racing.png') !important; background-size: cover !important; height: 380px !important;">
                            <h2 class="title"><b>Lay-Z-Boy Racing</b></h2>
                            <p class="title"><b>Member</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-primary text-center">
                        <div class="panel-body img" style="background-image: url('/img/Teams/Irae Gaming.png') !important; background-size: cover !important; height: 380px !important;">
                            <h2 class="title"><b>Irae Gaming</b></h2>
                            <p class="title"><b>Member</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop