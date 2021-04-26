@extends('layouts.app')
@section('title', 'Coding projects')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>{{trans('projects.coding_projects')}}</h1>
            <hr />
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            <h4>NoxBOT</h4>
                            <hr />
                            <p>{{trans('projects.noxbot_description')}}</p>
                            <a href="/{{app()->getLocale()}}/noxbot">{{trans("projects.noxbot_dashboard")}}</a>
                            <hr />
                            <p class="warning-text"><i>{{trans('projects.noxbot_dashboard_unavailable')}}</i></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            <h4>{{trans('projects.pokemon')}}</h4>
                            <hr />
                            <p>{{trans('projects.pokemon_description')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
