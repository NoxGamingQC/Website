@extends('layouts.noxgamingqc.app')
@section('title', trans('projects.minecraft'))
@section('slogan', trans('projects.minecraft_description'))
@section('content')

<div class="row">
    <div class="col-md-12 content-item bg-dark hidden">
        <div class="container">
            <div class="col-md-6">
                <h4>{{trans('projects.data_pack')}}</h4>
                <br />
                <p>{{trans('projects.data_pack_description')}}</p> 
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
    <div class="col-md-12 content-item hidden">
        <div class="container">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 text-right">
                <h4>{{trans('projects.maps')}}</h4>
                <br />
                <p>{{trans('projects.maps_description')}}</p> 
            </div>
        </div>
    </div>
    <div class="col-md-12 content-item bg-dark">
        <div class="container">
            <div class="col-md-6 text-left">
                <h4>{{trans('projects.ressource_pack')}}</h4>
                <br />
                <p>{{trans('projects.ressource_pack_description')}} <a class="btn btn-primary" href="https://www.noxgamingqc.ca">View</a></p> 
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
</div>
@stop
