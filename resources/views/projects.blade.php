@extends('layouts.app')
@section('title', 'Projects')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>{{trans('projects.projects')}}</h1>
            <hr />
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            <h4>{{trans('projects.apps')}}</h4>
                            <hr />
                            <p>{{trans('projects.apps_description')}}</p>
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
                            <h4>{{trans('projects.websites')}}</h4>
                            <hr />
                            <p>{{trans('projects.websites_description')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
