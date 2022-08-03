@extends('layouts.app')
@section('title', 'Contact')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>{{trans('generic.contact_information')}}</h1>
            <hr />
        </div>
        <div class="col-md-12" id="socialNetwork">
            <h3><i class="fa fa-globe" aria-hidden="true"></i> {{trans('generic.social_network')}}</h3>
            <br />
            <div class="row text-center">
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
                    <a class="btn btn-twitter btn-lg" href="https://www.twitter.com/noxgamingqc">
                        <i class="fa fa-twitter fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="instagram">
                    <a class="btn btn-instagram btn-lg" href="https://www.instagram.com/noxgamingqc">
                        <i class="fa fa-instagram fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="steam">
                    <a class="btn btn-steam btn-lg" href="http://steamcommunity.com/id/NoxGamingQC">
                        <i class="fa fa-steam-square fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="github">
                    <a class="btn btn-github btn-lg" href="https://github.com/noxgamingqc">
                        <i class="fa fa-github fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-12">
                    <br />
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-2" id="snapchat">
                    <a class="btn btn-snapchat btn-lg" href="https://www.snapchat.com/add/NoxGamingQC">
                        <i class="fa fa-snapchat-ghost fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="spotify">
                    <a class="btn btn-spotify btn-lg" href="https://open.spotify.com/user/howlnox22607">
                        <i class="fa fa-spotify fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-2" id="reddit">
                    <a class="btn btn-reddit btn-lg" href="https://www.reddit.com/user/NoxRacing">
                        <i class="fa fa-reddit fa-5x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="col-md-12" id="businessInquiries">
            <h3><i class="fa fa-briefcase" aria-hidden="true"></i> {{trans('generic.business_inquiries')}}</h3>
            <br />
            <p>{{trans('generic.business_inquiries_text')}} <a href="mailto:nox@noxgamingqc.ca">nox@noxgamingqc.ca</a>.</p>
        </div>
    </div>
</div>
@stop
