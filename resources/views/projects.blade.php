@extends('layouts.noxgamingqc.app')
@section('title', trans('projects.projects'))
@section('slogan', trans('projects.description'))
@section('content')

<div class="row">
    <div class="col-md-12 bg-dark content-item">
        <div class="container">
            <div class="col-md-6 text-left">
                <h4>Our website</h4>
                <br />
                <p>{{trans('projects.website_description')}} <a class="btn btn-primary" href="https://www.noxgamingqc.ca">Visit</a></p>
                
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 content-item">
        <div class="container">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 text-right">
                <h4>NoxBOT</h4>
                <br />
                <p><a class="btn btn-primary" href="https://github.noxgamingqc.ca/NoxBOT">Visit</a>  {{trans('projects.noxbot_description')}}</p>
                
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 bg-dark content-item">
        <div class="container">
            <div class="col-md-6 text-left">
                <h4>M.R. Liquidations</h4>
                <br />
                <p>{{trans('projects.mrliquidations_website')}} <a class="btn btn-primary" href="https://www.mrliquidations.ca">Visit</a></p>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
</div>
@stop
