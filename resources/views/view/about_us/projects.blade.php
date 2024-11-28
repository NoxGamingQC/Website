@extends('layouts.pages.app')
@section('title', trans('projects.projects'))
@section('slogan', trans('projects.description'))
@section('content')

<div class="container section">
    <div class="row">
        <div class="col-md-12 content-item">
            <div class="col-md-6 text-left">
                <br />
                <br />
                <h4>Our website</h4>
                <br />
                <p>{{trans('projects.website_description')}} <a class="btn btn-primary" href="https://www.noxgamingqc.ca">Visit</a></p>
            </div>
            <div class="col-md-6">
                <img class="text-center" src="/img/Projects/website.png" width="250px" />
            </div>
        </div>
    </div>
</div>
<div class="container section">
    <div class="row">
        <div class="col-md-12 bg-dark content-item">
            <div class="col-md-6">
                <img class="text-center" src="/img/Projects/NoxBOT.png" width="250px" />
            </div>
            <div class="col-md-6 text-right">
                <br />
                <br />
                <br />
                <h4>NoxBOT</h4>
                <br />
                <p><a class="btn btn-primary" href="https://github.noxgamingqc.ca/NoxBOT">Visit</a>  {{trans('projects.noxbot_description')}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
