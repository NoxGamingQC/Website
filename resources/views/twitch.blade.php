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
                        <iframe class="embed-responsive-item" src="https://player.twitch.tv/?channel=noxgamingqc&parent=noxgamingqc.herokuapp.com" frameBorder="0" allowFullScreen="true" scrolling="no"></iframe>
                    </div>
                </div>
                <div class="col-md-5" id="twitchDefinition">
                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            <h3><i class="fa fa-video-camera" aria-hidden="true"></i> {{trans('stream.stream_description_title')}}</h3>
                            <hr />
                            <p>{!!trans('stream.stream_description_text')!!}</a>.</p>
                            <a class="btn btn-primary" href="/stream/commands">{{trans('stream.bot_commands')}}</a>
                            <a class="btn btn-primary" href="https://discord.gg/6DGc24x">{{trans('stream.join_server')}}</a>
                        </div>
                    </div>
               </div>
                <div class="col-md-12">
                    <br />
                </div>
                <div class="col-md-6" id="twitchGoal">
                    <div class="panel panel-primary">
                        <div class="panel-body">
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
                    </div>
                </div>
                <div class="col-md-6" id="subsPerks">
                    <div class="panel panel-primary">
                        <div class="panel-body">
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
                    </div>
                </div>
                <div class="col-md-12">
                    <br />
                </div>
                <div class="col-md-6" id="equipement">
                <div class="panel panel-primary">
                        <div class="panel-body">
                            <h3><i class="fa fa-laptop" aria-hidden="true"></i> {{trans('stream.equipement')}}</h3>
                            <hr />
                            <p>💻 {{trans('stream.motherboard')}}</p>
                            <p>💻 {{trans('stream.os')}}</p>
                            <p>💻 {{trans('stream.cpu')}}</p>
                            <p>💻 {{trans('stream.ram')}}</p>
                            <p>💻 {{trans('stream.gpu')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="console">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h3><i class="fa fa-gamepad" aria-hidden="true"></i> {{trans('stream.video_game_consoles')}}</h3>
                            <hr />
                            <p>🕹 Nintendo Entertainement System (NES)</p>
                            <p>🕹 Nintendo Wii</p>
                            <p>🕹 Playstation 1</p>
                            <p>🕹 Playstation 4</p>
                            <p>🕹 Xbox ({!!trans('stream.first_gen')!!})</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="accessory">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h3><i class="fa fa-headphones" aria-hidden="true"></i> {{trans('stream.accessories')}}</h3>
                            <hr />
                            <p>🎧 {{trans('stream.headset')}}</p>
                            <p>🖱 {{trans('stream.mouse')}}</p>
                            <p>📹 {{trans('stream.camera')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="controllers">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h3><i class="fa fa-gamepad" aria-hidden="true"></i> {{trans('stream.controllers')}}</h3>
                            <hr />
                            <p>🎮 MICROSOFT XBOX ONE wireless controller Gear of War 4 edition</p>
                            <p>🎮 MICROSOFT XBOX ONE wireless controller Ocean Shadow edition</p>
                            <p>🎮 2 DualShock® 4 wireless controller</p>
                            <p>🎮 White Super Smash Bros. classic Nintendo Gamecube controller</p>
                            <p>🎮 Black Super Smash Bros. classic Nintendo Gamecube controller</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
