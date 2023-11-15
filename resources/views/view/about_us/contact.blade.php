@extends('layouts.pages.app')
@section('title', trans('contact.contact'))
@section('slogan', trans('contact.description'))
@section('header', false)
@section('content')

<div class="row">
    <div class="col-md-12 content-item" id="socialNetwork">
        <div class="container">
            <h3><i class="fa fa-globe" aria-hidden="true"></i> {{trans('general.social_network')}}</h3>
            <br />
            <div class="row text-center">
                <div class="col-md-2" id="twitch">
                    <a class="btn btn-twitch btn-lg btn-circle" href="https://www.twitch.tv/noxgamingqc">
                        <i class="fa fa-twitch fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="youtube">
                    <a class="btn btn-youtube btn-lg btn-circle" href="https://www.youtube.com/channel/UCytKDUapog2tnJD4XenehiQ">
                        <i class="fa fa-youtube-play fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="twitter">
                    <a class="btn btn-twitter btn-lg btn-circle" href="https://www.twitter.com/noxgamingqc">
                        <i class="fa fa-twitter fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="instagram">
                    <a class="btn btn-instagram btn-lg btn-circle" href="https://www.instagram.com/noxgamingqc">
                        <i class="fa fa-instagram fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="steam">
                    <a class="btn btn-steam btn-lg btn-circle" href="http://steamcommunity.com/id/NoxGamingQC">
                        <i class="fa fa-steam-square fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="github">
                    <a class="btn btn-github btn-lg btn-circle" href="https://github.com/noxgamingqc">
                        <i class="fa fa-github fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-12">
                    <br />
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-2" id="snapchat">
                    <a class="btn btn-snapchat btn-lg btn-circle" href="https://www.snapchat.com/add/NoxGamingQC">
                        <i class="fa fa-snapchat-ghost fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="spotify">
                    <a class="btn btn-spotify btn-lg btn-circle" href="https://open.spotify.com/user/howlnox22607">
                        <i class="fa fa-spotify fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="reddit">
                    <a class="btn btn-reddit btn-lg btn-circle" href="https://www.reddit.com/user/NoxGamingQC">
                        <i class="fa fa-reddit fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 content-item bg-dark" id="businessInquiries">
        <div class="container">
            <h3><i class="fa fa-briefcase" aria-hidden="true"></i> {{trans('general.business_inquiries')}}</h3>
            <br />
            <p>{{trans('general.business_inquiries_text')}} <a href="mailto:jbedard@noxgamingqc.ca">jbedard@noxgamingqc.ca</a>.</p>
        </div>
    </div>
</div>
@stop
