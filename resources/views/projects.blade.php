@extends('layouts.app')
@section('title', 'Projects')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>Projects</h1>
            <hr />
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            <h4>NoxBOT</h4>
                            <hr />
                            <p>NoxBOT is a multitasking bot for Twitch and Discord.</p>
                            <a href="/{{app()->getLocale()}}/noxbot">Go to his Dashboard here</a>
                            <hr />
                            <p class="warning-text">NoxBOT dashboard is temporarly unavailable for your server. No worry it will be there soon <3</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
