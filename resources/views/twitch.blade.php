@extends('layouts.app')
@section('title', 'Stream')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>{{trans("stream.stream")}}</h1>
            <hr />
        </div>
        <div class="col-md-12" id="content">
            <div class="row">
                <div class="col-md-7" id="twitchPlayer">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://player.twitch.tv/?channel=noxgamingqc&parent={{env('APP_URL') == 'http://localhost'? str_replace("http://","",env('APP_URL')) : str_replace("https://","",env('APP_URL'))}}&enableExtensions=true&muted=true&autoplay=true" frameBorder="0" allowFullScreen="true" scrolling="no"></iframe>
                    </div>
                </div>
                <div class="col-md-5 text-center" id="twitchDefinition">
                    <h3><i class="fa fa-video-camera" aria-hidden="true"></i> {{trans('stream.stream_description_title')}}</h3>
                    <hr />
                    <p>{!!trans('stream.stream_description_text')!!}</a>.</p>
                    <a class="btn btn-primary disabled" href="/{{app()->getLocale()}}/stream/commands" disabled>{{trans('stream.bot_commands')}}</a>
                    <a class="btn btn-primary" href="https://discord.com/invite/PryKE2Xvrh">{{trans('stream.join_server')}}</a>
               </div>
                <div class="col-md-12">
                    <br />
                </div>
                <div class="col-md-6" id="twitchGoal">
                    <h3><i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{trans('stream.twitch_goal')}}</h3>
                    <hr />
                    <p><i class="fa fa-video-camera" aria-hidden="true"></i> {{trans('stream.first_stream')}}: <b>2017-11-14</b></p>
                    <p><i class="fa fa-handshake-o" aria-hidden="true"></i> {{trans('stream.twitch_affiliate')}}: <b>2018-06-16</b></p>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{trans('stream.first_24h')}}: <b>2017-11-04</b></p>
                    <br />
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 10 {{trans('stream.followers')}}: <b>2017-11-22</b></p>
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 25 {{trans('stream.followers')}}: <b>2017-12-14</b></p>
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 50 {{trans('stream.followers')}}: <b>2018-02-14</b></p>
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 100 {{trans('stream.followers')}}: <b>2018-07-11</b></p>
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 500 {{trans('stream.followers')}}: <b>N/A</b></p>
                    <br />
                    <p><i class="fa fa-star" aria-hidden="true"></i> 10 {{trans('stream.subscribers')}}: <b>N/A</b></p>
                </div>
                <div class="col-md-6" id="subsPerks">
                    <h3><i class="fa fa-star" aria-hidden="true"></i> {{trans('stream.subscribers_perks')}}</h3>
                    <hr />
                    <ul>
                        <li>{{trans('stream.perk01')}}</li>
                        <li>{{trans('stream.perk02')}}</li>
                        <li>{{trans('stream.perk03')}}</li>
                        <li>{{trans('stream.perk04')}}</li>
                        <li>{{trans('stream.perk05')}}</li>
                    </ul>
                    <br />
                    <a class="btn btn-primary" href="https://subs.twitch.tv/noxgamingqc">{{trans('stream.subscribe_now')}}</a>
                </div>
                <div class="col-md-12">
                    <br />
                </div>
                <div class="col-md-6" id="equipement">
                    <h3><i class="fa fa-laptop" aria-hidden="true"></i> {{trans('stream.equipement')}}</h3>
                    <hr />
                    <p>💻 {{trans('stream.motherboard')}}</p>
                    <p>💻 {{trans('stream.os')}}</p>
                    <p>💻 {{trans('stream.cpu')}}</p>
                    <p>💻 {{trans('stream.ram')}}</p>
                    <p>💻 {{trans('stream.gpu')}}</p>
                </div>
                <div class="col-md-6" id="accessory">
                    <h3><i class="fa fa-headphones" aria-hidden="true"></i> {{trans('stream.accessories')}}</h3>
                    <hr />
                    <p>🎧 {{trans('stream.headset')}}</p>
                    <p>🖱 {{trans('stream.mouse')}}</p>
                    <p>📹 {{trans('stream.camera')}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
