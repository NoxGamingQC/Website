@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<div class="header" style="position:relative; width: 100vw; height:100vh !important;">
    <div class="row" style="padding-top: 40vh">
        <div class="col-md-12 text-center">
            <h1 class="raleway-font text-highlight" style="font-size:10vh"><img src="/img/NoxGamingQC.png" height="140vh" /><b> NoxGamingQC</b></h1>
        </div>
        <div class="col-md-12 text-center">
            <br />
            <h2 class="raleway-font">{{trans('welcome.slogan')}}</h2>
            <br />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 content-item">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="video-player embed-responsive-item" src="https://player.twitch.tv/?channel=noxgamingqc&parent={{env('APP_URL') == 'http://localhost'? str_replace("http://","",env('APP_URL')) : str_replace("https://","",env('APP_URL'))}}&enableExtensions=true&muted=true&autoplay=true" frameBorder="0" allowFullScreen="true" scrolling="no"></iframe>
                    </div>
                </div>
                <div class="col-md-6 text-center" style="padding-top: 5%">
                    <h3>{{trans('stream.stream_description_title')}}</h3>
                    <p>{!!trans('stream.stream_description_text')!!}</a>.</p>
                    <a class="btn btn-primary" href="https://discord.com/invite/PryKE2Xvrh">{{trans('stream.join_server')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 content-item">
        <div class="container-fluid">
            @include('layouts.contactForm')
        </div>
    </div>
</div>
<script type="text/javascript">
    
</script>
@stop
