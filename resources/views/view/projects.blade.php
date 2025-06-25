@extends('layouts.pages.app')
@section('title', trans('projects.projects'))
@section('slogan', trans('projects.description'))
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6" style="background-image: url('/img/Projects/website.png');background-size: cover;background-position: center; border-radius:10px;border: 3px solid rgba(255, 255, 255, 0.54);"></div>
                        <div class="col-6">
                            <h5 class="card-title">{{trans('projects.website')}}</h5>
                            <p class="card-text">{{trans('projects.website_description')}}</p>
                            <a href="#" class="btn btn-primary disabled">{{trans('general.not_available')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6"  style="background-image: url('/img/Projects/NoxBOT.png');background-size: cover;background-position: center; border-radius:10px;border: 3px solid rgba(255, 255, 255, 0.54);">
                        </div>
                        <div class="col-6">
                            <h5 class="card-title">{{trans('projects.noxbot')}}</h5>
                            <p class="card-text">{{trans('projects.noxbot_description')}}</p>
                            <a href="#" class="btn btn-primary">{{trans('general.visit')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection