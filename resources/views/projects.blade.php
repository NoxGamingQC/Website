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
                            <h4>This website</h4>
                            <hr />
                            <p>{{trans('projects.website_description')}}</p>
                            <a href="https://www.noxgamingqc.ca">noxgamingqc.ca</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            <h4>NoxBOT</h4>
                            <hr />
                            <p>{{trans('projects.noxbot_description')}}</p>
                            <a href="https://github.noxgamingqc.ca/NoxBOT">github.noxgamingqc.ca/NoxBOT</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            <h4>M.R. Liquidations</h4>
                            <hr />
                            <p>{{trans('projects.mrliquidations_website')}}</p>
                            <a href="https://www.mrliquidations.ca">mrliquidations.ca</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
