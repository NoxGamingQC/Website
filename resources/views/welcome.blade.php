@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<div class="row">
    <div class="col-md-12 text-center full-height" id="title">
        <div class="panel panel-block-primary">
            <div class="panel-body" style="padding: 5%">
                <h1 class="raleway-font">NoxGamingQC</h1>
                <br />
                <h5 class="raleway-font" style="font-size: 18px">{{trans('welcome.slogan')}}</h5>
                <br />
            </div>
        </div>
    </div>
     <div class="col-md-12" id="instagram-feed">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div id="curator-feed-default-feed-layout">
                    <a href="" target="_blank" class="crt-logo crt-tag"></a>
                </div>
                <div class="text-center">
                    <a class="btn btn-primary" type="button" href="https://www.instagram.com/noxgamingqc/">{{trans('generic.see_more')}}</a>
                </div>
                <hr />
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center" id="social">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-md-3"></div>
                <div class="col-md-2" id="twitch">
                    <a class="btn btn-twitch btn-lg" href="https://www.twitch.tv/noxgamingqc">
                        <i class="fa fa-twitch fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="youtube">
                    <a class="btn btn-youtube btn-lg" href="https://www.youtube.com/channel/UCytKDUapog2tnJD4XenehiQ">
                        <i class="fa fa-youtube-play fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="twitter">
                    <a class="btn btn-twitter btn-lg" href="https://www.twitter.com/@noxgamingqc">
                        <i class="fa fa-twitter fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    (function(){
        var i, e, d=document, s="script";
        i=d.createElement("script");
        i.async=1;
        i.charset="UTF-8";
        i.src="https://cdn.curator.io/published/e20a68dc-3467-45c4-87cd-dcd6c14a133a.js";
        e=d.getElementsByTagName(s)[0];
        e.parentNode.insertBefore(i, e);
    })();
</script>
@stop
