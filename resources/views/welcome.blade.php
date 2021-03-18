@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="row">
    <div class="col-md-12 text-center" id="title">
        <div class="panel panel-primary-red" style="margin-top: -2%">
            <div class="panel-body">
                <h1 class="lightmode-text satisfy-font">NoxGamingQC</h1>
                <br />
                <h5 class="lightmode-text yellowtail-font" style="font-size: 18px">{{trans('welcome.slogan')}}</h5>
                <br />
            </div>
        </div>
    </div>
    <div class="col-md-6" id="aboutme">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3><i class="fa fa-user" aria-hidden="true"></i> {{trans('welcome.about_me')}}</h3>
                <hr />
                <p>{{trans('welcome.about_me_text')}} <a href="https://discord.gg/6DGc24x">({{trans('welcome.discord_join_here')}})</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6" id="donations">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3><i class="fa fa-money" aria-hidden="true"></i> {{trans('welcome.donation')}}</h3>
                <hr />
                <p>{{trans('welcome.donation_text')}} <a href="https://streamlabs.com/noxgamingqc">{{trans('welcome.click_here')}}</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-12" id="communityRules">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3><i class="fa fa-users" aria-hidden="true"></i> {{trans('welcome.community_rules')}}</h3>
                <hr />
                <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> {{trans('welcome.rule01')}}</p>
                <br />
                <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> {{trans('welcome.rule02')}}</p>
                <br />
                <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> {{trans('welcome.rule03')}}</p>
                <br />
                <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> {{trans('welcome.rule04')}}</p>
                <br />
                <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> {{trans('welcome.rule05')}}</p>
                <br />
                <p><i class="fa fa-check-square success-text" aria-hidden="true"></i> {{trans('welcome.rule06')}}</p>
                <br />
                <p>{!!trans('welcome.rule_text')!!}</p>
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
@stop
