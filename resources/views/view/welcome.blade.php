@extends('layouts.pages.app')
@section('title', 'Welcome')
@section('content')

<div class="container-fluid section header">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="raleway-font headline"><img src="/img/logo.svg" height="140vh" /><b> NoxGamingQC</b></h1>
        </div>
        <div class="col-md-12 text-center">
            <br />
            <h2 class="raleway-font headline">{{trans('welcome.slogan')}}</h2>
            <br />
        </div>
    </div>
</div>
<div class="container section">
    <div class="row">
        <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="video-player embed-responsive-item" src="https://player.twitch.tv/?channel=noxgamingqc&parent={{env('APP_URL') === 'http://localhost:8000' ? 'localhost' : str_replace("https://","",env('APP_URL'))}}&enableExtensions=true&muted=true&autoplay=true" frameBorder="0" allowFullScreen="true" scrolling="no"></iframe>
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
