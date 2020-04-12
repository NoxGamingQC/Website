@extends('layouts.app')
@section('title', 'Stream')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12" id="title">
            <h1>Stream</h1>
            <hr />
        </div>
        <div class="col-md-12" id="content">
            <div class="row">
                <div class="col-md-7" id="twitchPlayer">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://player.twitch.tv/?channel=noxgamingqc" frameBorder="0" allowFullScreen="true" scrolling="no"></iframe>
                    </div>
                </div>
                <div class="col-md-5 text-center" id="twitchDefinition">
                    <h3><i class="fa fa-video-camera" aria-hidden="true"></i> NoxGamingQC's Twitch Stream</h3>
                    <hr />
                    <p>Hey! I'm NoxGamingQC. But call me Nox it's shorter. Me an my community streams a variety of games on Twitch. You can join us on stream at <a href="https://www.twitch.tv/noxgamingqc">twitch.tv/noxgamingqc</a>.</p>
                    <a class="btn btn-primary" href="/stream/commands">Bot commands</a>
                    <a class="btn btn-primary" href="https://discord.gg/6DGc24x">Join Discord server</a>
                </div>
                <div class="col-md-12">
                    <hr />
                </div>
                <div class="col-md-6" id="twitchGoal">
                    <h3><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Twitch Goal</h3>
                    <hr />
                    <p><i class="fa fa-video-camera" aria-hidden="true"></i> First stream: <b>2017-11-14</b></p>
                    <p><i class="fa fa-handshake-o" aria-hidden="true"></i> Twitch Affiliate: <b>2018-06-16</b></p>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> First 24 hour stream: <b>2017-11-04</b></p>
                    <br />
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 10 followers: <b>2017-11-22</b></p>
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 25 followers: <b>2017-12-14</b></p>
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 50 followers: <b>2018-02-14</b></p>
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 100 followers: <b>2018-07-11</b></p>
                    <p><i class="fa fa-heart" aria-hidden="true"></i> 500 followers: <b>N/A</b></p>
                    <br />
                    <p><i class="fa fa-star" aria-hidden="true"></i> 10 subscribers: <b>N/A</b></p>
                </div>
                <div class="col-md-6" id="subsPerks">
                    <h3><i class="fa fa-star" aria-hidden="true"></i> Subscribers Perks</h3>
                    <hr />
                    <ul>
                        <li>Get a new role on my discord server</li>
                        <li>Ad-free streams (with limited exceptions)</li>
                        <li>Chat during subscriber-only mode</li>
                        <li>Not affected by chat slow mode</li>
                        <li>Access to sub only VODs</li>
                    </ul>
                    <br />
                    <a class="btn btn-primary" href="https://subs.twitch.tv/noxgamingqc">Subscribe now</a>
                </div>
                <div class="col-md-12">
                    <hr />
                </div>
                <div class="col-md-12">
                    <hr />
                </div>
                <div class="col-md-6" id="equipement">
                    <h3><i class="fa fa-laptop" aria-hidden="true"></i> Equipement</h3>
                    <hr />
                    <p>💻 Intel® Z390 AORUS MASTER by Gigabyte</p>
                    <p>💻 Microsoft Windows 10 (64 bits)</p>
                    <p>💻 Intel® Core™ i5-9400F CPU</p>
                    <p>💻 32 GB HyperX Predator DDR4 RAM @ 3200MHz</p>
                    <p>💻 NVIDIA GeForce GTX 1070</p>
                </div>
                <div class="col-md-6" id="console">
                    <h3><i class="fa fa-gamepad" aria-hidden="true"></i> Video games console</h3>
                    <hr />
                    <p>🕹 Nintendo Entertainement System (NES)</p>
                    <p>🕹 Nintendo Wii</p>
                    <p>🕹 Playstation 1</p>
                    <p>🕹 Playstation 4</p>
                    <p>🕹 Xbox (1<em>st</em> Generation)</p>
                </div>
                <div class="col-md-12" id="accessory">
                    <h3><i class="fa fa-headphones" aria-hidden="true"></i> Accessories</h3>
                    <hr />
                    <p>🎧 MSI DS502 Gaming Headset</p>
                    <p>🖱 Mazer - Type-R - E-BLUE</p>
                    <p>📹 Logitech QuickCam® Pro 9000</p>
                </div>
                <div class="col-md-12" id="controllers">
                    <h3><i class="fa fa-gamepad" aria-hidden="true"></i> Controllers</h3>
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
@stop
