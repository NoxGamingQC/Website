@extends('layouts.pages.app')
@section('title', 'Welcome')
@section('content')



<div class="container-fluid" style="z-index: 1; background-image: url('/img/welcome.jpg');background-repeat: no-repeat;background-size: cover;margin:0px; text-shadow: 1px  1px 2px #000, 1px -1px 2px #000, -1px  1px 2px #000, -1px -1px 2px #000;">
    <div class="row text-white py-5">
        <div class="col-12">
            <div class="row">
                <div class="col-5 offset-1">
                    <h4 class="raleway-font text-left">{{trans('welcome.slogan')}}</h4>
                    <h1 class="raleway-font text-left"><b>NoxGamingQC</b></h1>
                    <h5  class="raleway-font text-justify">{{trans('welcome.about_me_text')}}</h5>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-3 offset-1 row justify-content-center align-self-center">
                    <img class="img-rounded" src="/img/no-image.png" width="340px">
                </div>
                <div class="col-3 row justify-content-center align-self-center">
                    <h4 class="">Projets récents</h4>
                    <p class="">The Elder Quests | PC | In development</p>
                    <p class="">Découvrir le projet &nbsp&nbsp&nbsp <button class="btn disabled" style="padding-top:15px !important;padding-bottom:15px !important;padding-left:20px !important;padding-right:20px !important; border-radius:5000px" disabled><i class="fa fa-arrow-right" aria-hidden="true"></i></button></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-6 row justify-content-center align-self-center">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="video-player embed-responsive-item w-100" src="https://player.twitch.tv/?channel=noxgamingqc&parent={{env('APP_URL') === 'http://localhost:8000' ? 'localhost' : str_replace("https://","",env('APP_URL'))}}&enableExtensions=true&muted=true&autoplay=true" frameBorder="0" allowFullScreen="true" scrolling="no" style="min-height:250px"></iframe>
            </div>
        </div>
        <div class="col-6 text-center row justify-content-center align-self-center">
            <h3>{{trans('stream.stream_description_title')}}</h3>
            <p>{!!trans('stream.stream_description_text')!!}</a>.</p>
            <a class="btn btn-primary" href="/discord">{{trans('stream.join_server')}}</a>
        </div>
    </div>
</div>
<div class="container-fluid my-5 py-5 border-top">
    <div class="row">
        <div class="col-12">
            <div class="container-fluid">
                @include('layouts.components.contactForm')
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
</script>
@stop
