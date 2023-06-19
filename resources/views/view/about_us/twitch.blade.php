@extends('layouts.noxgamingqc.app')
@section('title', 'Stream')
@section('content')

<div class="row">
    <div class="col-md-12 content-item bg-dark" id="content">
        <div class="container">
            <div class="col-md-6" id="founders">
                <h3>A big thanks to all our founders</h3>
                <hr />
                <ul>
                    <li><a href="https://www.twitch.tv/bucksin6games"><h4 class="raleway-font">bucksin6games - 2019-10-10</h4></a></li>
                    <li><a href="https://www.twitch.tv/tristantt444"><h4 class="raleway-font">tristantt444 - 2019-10-10</h4></a></li>
                    <li><a href="https://www.twitch.tv/debraannmarie"><h4 class="raleway-font">DebraAnnmarie - 2019-10-10</h4></a></li>
                    <li><a href="https://www.twitch.tv/snowykitlock"><h4 class="raleway-font">SnowyKitLock - 2020-04-06</h4></a></li>
                    <li><a href="https://www.twitch.tv/cozy_cat"><h4 class="raleway-font">Cozy_Cat - 2020-05-05</h4></a></li>
                    <li><a href="https://www.twitch.tv/pepitochocolat123"><h4 class="raleway-font">pepitochocolat123 - 2021-06-28</h4></a></li>
                    <li><a href="https://www.twitch.tv/manz007666"><h4 class="raleway-font">manz007666 - 2021-06-30</h4></a></li>
                    <li><a href="https://www.twitch.tv/heliosjinouga"><h4 class="raleway-font">HeliosJinouga - 2022-09-05</h4></a></li>
                    <li><a href="https://www.twitch.tv/xwindsurfx"><h4 class="raleway-font">xWindSurfx - 2022-09-20</h4></a></li>
                </ul>
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
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 content-item" id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{trans('stream.twitch_goal')}}</h3>
                    <hr />
                </div>
                <div class="col-md-4">
                    <p><i class="fa fa-video-camera" aria-hidden="true"></i> {{trans('stream.first_stream')}}: <b>2017-11-14</b></p>
                    <p><i class="fa fa-handshake-o" aria-hidden="true"></i> {{trans('stream.twitch_affiliate')}}: <b>2018-06-16</b></p>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{trans('stream.first_24h')}}: <b>2017-11-04</b></p>
                </div>
                <div class="col-md-4">
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 10 {{trans('stream.followers')}}: <b>2017-11-22</b></p>
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 25 {{trans('stream.followers')}}: <b>2017-12-14</b></p>
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 50 {{trans('stream.followers')}}: <b>2018-02-14</b></p>
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 100 {{trans('stream.followers')}}: <b>2018-07-11</b></p>
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 500 {{trans('stream.followers')}}: <b>N/A</b></p>
                </div>
                <div class="col-md-4">
                    <p><i class="fa fa-star" aria-hidden="true"></i> 10 {{trans('stream.subscribers')}}: <b>N/A</b></p>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-12 content-item bg-dark" id="content">
        <div class="container">    
            <div class="row">            
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
                    <p>🎙️ {{trans('stream.microphone')}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
