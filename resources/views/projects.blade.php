@extends('layouts.noxgamingqc.app')
@section('title', trans('projects.projects'))
@section('slogan', trans('projects.description'))
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-body text-center">
                    <h4>This website</h4>
                    <hr />
                    <p>{{trans('projects.website_description')}}</p>
                    <a href="https://www.noxgamingqc.ca">noxgamingqc.ca</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-body text-center">
                    <h4>NoxBOT</h4>
                    <hr />
                    <p>{{trans('projects.noxbot_description')}}</p>
                    <a href="https://github.noxgamingqc.ca/NoxBOT">github.noxgamingqc.ca/NoxBOT</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
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
@stop
