@extends('layouts.app')
@section('title', trans('projects.projects'))
@section('slogan', trans('projects.description'))
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col">
            <a class="card card-link py-5" href="https://github.jimmybedard.ca/NoxBOT/" style="height: 100%;">
                <div class="card-body text-white">
                    <h5 class="card-title">{{trans('projects.noxbot')}} <span class="badge text-bg-warning" style="text-shadow: none;">{{trans('general.in_development')}}</span></h5>
                    <p class="card-text">{{trans('projects.noxbot_description')}}</p>
                    <span class="text-primary" href="https://rcl.jimmybedard.ca/">{{trans('general.access_page')}}</span>
                </div>
            </a>
        </div>
        <div class="col">
            <a class="card card-link" href="https://rcl.jimmybedard.ca/" style="height: 100%;">
                <div class="card-body text-white">
                    <h5 class="card-title">{{trans('projects.rcl')}} <span class="badge text-bg-warning" style="text-shadow: none;">{{trans('general.in_development')}}</span></h5>
                    <p class="card-text">{{trans('projects.rcl_description')}}</p>
                    <span class="text-primary" href="https://rcl.jimmybedard.ca/">{{trans('general.access_page')}}</span>
                </div>   
            </a>
        </div>
    </div>
</div>
@endsection