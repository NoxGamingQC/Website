@extends('layouts.app')
@section('title', trans('projects.projects'))
@section('slogan', trans('projects.description'))
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col">
            <div class="card card-link">
                <a class="card-body text-white text-center" href="#">
                    <h5 class="card-title">{{trans('projects.website')}}</h5>
                    <p class="card-text">{{trans('projects.website_description')}}</p>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card card-link">
                <a class="card-body text-white text-center" href="https://github.jimmybedard.ca/NoxBOT/">
                    <h5 class="card-title">{{trans('projects.noxbot')}} <span class="badge text-bg-warning" style="text-shadow: none;">{{trans('general.in_development')}}</span></h5>
                    <p class="card-text">{{trans('projects.noxbot_description')}}</p>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card card-link">
                <a class="card-body text-white text-center" href="https://rcl.jimmybedard.ca/">
                    <h5 class="card-title">{{trans('projects.rcl')}} <span class="badge text-bg-warning" style="text-shadow: none;">{{trans('general.in_development')}}</span></h5>
                    <p class="card-text">{{trans('projects.rcl_description')}}</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection