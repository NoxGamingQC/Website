@extends('layouts.app')
@section('title', trans('projects.projects'))
@section('slogan', trans('projects.description'))
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col" style="overflow:hidden;margin:0px;padding:0px;background-image: url('/img/Projects/website.png');background-size: cover;background-position: center;">
            <div class="card panel" style="overflow:hidden;height:100%;">
                <div class="card-body text-white text-center" style="padding:15%;text-shadow: 2px 0 #252525, -2px 0 #252525, 0 2px #252525, 0 -2px #252525, 1px 1px #252525, -1px -1px #252525, 1px -1px #252525, -1px 1px #252525;">
                    <h5 class="card-title">{{trans('projects.website')}}</h5>
                    <p class="card-text">{{trans('projects.website_description')}}</p>
                    <a href="#" class="btn btn-primary disabled">{{trans('general.not_available')}}</a>
                </div>
            </div>
        </div>
        <div class="col" style="margin:0px;padding:0px;background-image: url('/img/Projects/NoxBOT.png');background-size: cover;background-position: center; border-radius:20px;">
            <div class="card panel" style="overflow:hidden;height:100%;">
                <div class="card-body text-white text-center" style="padding:15%;text-shadow: 2px 0 #252525, -2px 0 #252525, 0 2px #252525, 0 -2px #252525, 1px 1px #252525, -1px -1px #252525, 1px -1px #252525, -1px 1px #252525;">
                    <h5 class="card-title">{{trans('projects.noxbot')}} <span class="badge text-bg-warning" style="text-shadow: none;">{{trans('general.in_development')}}</span></h5>
                    <p class="card-text">{{trans('projects.noxbot_description')}}</p>
                    <a href="https://github.jimmybedard.ca/NoxBOT/" class="btn btn-primary" title="{{trans('general.github_pages')}}"><i class="fa fa-github fa-2x" aria-hidden="true"></i></a>
                    <a href="https://github.com/NoxGamingQC/NoxBOT" title="{{trans('general.visit_source')}}" class="btn btn-primary"><i class="fa fa-code fa-2x" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="col" style="margin:0px;padding:0px;background-image: url('/img/Projects/rcl06101.png');background-size: cover;background-position: center; border-radius:20px;">
            <div class="card panel" style="overflow:hidden;height:100%;">
                <div class="card-body text-white text-center" style="padding:15%;text-shadow: 2px 0 #252525, -2px 0 #252525, 0 2px #252525, 0 -2px #252525, 1px 1px #252525, -1px -1px #252525, 1px -1px #252525, -1px 1px #252525;">
                    <h5 class="card-title">{{trans('projects.rcl06101')}} <span class="badge text-bg-warning" style="text-shadow: none;">{{trans('general.in_development')}}</span></h5>
                    <p class="card-text">{{trans('projects.rcl06101_description')}}</p>
                    <a href="http://rcl.jimmybedard.ca/" title="{{trans('general.website')}}" class="btn btn-primary"><i class="fa fa-external-link fa-2x" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection