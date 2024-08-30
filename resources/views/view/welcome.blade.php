@extends('layouts.pages.app')
@section('title', 'Welcome')
@section('content')

<div class="container-fluid section header" style="width: 100%;height:100% !important;text-align: center;overflow: hidden;z-index: 2;">
    <video autoplay muted loop src="/videos/soldier_static.mp4" style="position: absolute;top: 10%;left: 0;height: 110% !important;min-width: 100%;min-height: 100%;z-index: 0;object-position: center;object-fit: cover;overflow:hidden"></video>
    <div class="row" style="z-index: 1;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <h2 class="raleway-font text-left">{{trans('welcome.slogan')}}</h2>
                    <h1 class="raleway-font text-left"><b>NoxGamingQC</b></h1>
                    <h3  class="raleway-font text-justify">{{trans('welcome.about_me_text')}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-3  col-md-offset-1">
                <img class="img-rounded" src="/img/no-image.png" width="340px">
            </div>
            <div class="col-md-3 text-img-align">
                <h4 class="text-left">Projets récents</h4>
                <p class="text-left">The Elder Quests | PC | In development</p>
                <p class="text-left">Découvrir le projet &nbsp&nbsp&nbsp <button class="btn btn-default disabled" style="padding-top:15px !important;padding-bottom:15px !important;padding-left:20px !important;padding-right:20px !important; border-radius:5000px" disabled><i class="fa fa-arrow-right" aria-hidden="true"></i></button></p>
            </div>
        </div>
    </div>
</div>
<div class="container section" style="margin:20%">
    <div class="row">
        <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="video-player embed-responsive-item" src="https://player.twitch.tv/?channel=noxgamingqc&parent={{env('APP_URL') === 'http://127.0.0.1' ? '127.0.0.1' : str_replace("https://","",env('APP_URL'))}}&enableExtensions=true&muted=true&autoplay=true" frameBorder="0" allowFullScreen="true" scrolling="no"></iframe>
            </div>
        </div>
        <div class="col-md-6 text-center" style="padding-top: 5%">
        
            <h3>{{trans('stream.stream_description_title')}}</h3>
            <p>{!!trans('stream.stream_description_text')!!}</a>.</p>
            <a class="btn btn-primary" href="/discord">{{trans('stream.join_server')}}</a>
        </div>
    </div>
</div>
<div class="container section">
    <div class="row">
        <div class="col-md-12">
            <div class="container-fluid">
                @include('layouts.components.contactForm')
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
</script>
@stop
