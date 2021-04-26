@extends('layouts.app')
@section('title', 'Projects')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>{{trans('projects.projects')}}</h1>
            <hr />
            <div class="row">
            @auth
                @if(Auth::user()->isDev || Auth::user()->isAdmin || Auth::user()->isModerator)
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-body text-center">
                                <h4>{{trans('projects.cars')}}</h4>
                                <hr />
                                <p>{{trans('projects.cars_description')}}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            <h4>{{trans('projects.coding')}}</h4>
                            <hr />
                            <p>{{trans('projects.coding_description')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            <h4>{{trans('projects.games')}}</h4>
                            <hr />
                            <p>{{trans('projects.games_description')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            <h4>{{trans('projects.pc_building')}}</h4>
                            <hr />
                            <p>{{trans('projects.pc_building_description')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            <h4>{{trans('projects.music')}}</h4>
                            <hr />
                            <p>{{trans('projects.music_description')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
