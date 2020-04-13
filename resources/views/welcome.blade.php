@extends('layouts.app')
@section('title', 'Home')
@section('content')

<div class="row">
    <div class="col-md-12 text-center" id="title">
        <div class="panel panel-primary-red">
            <div class="panel-body">
                <h1>NoxGamingQC</h1>
                <br />
                <h5>A Québecois that do videos on Twitch & YT. Speak French & English. Creator of NoxBOT. Part of @iraeGaming & @PositivityST.</h5>
                <br />
            </div>
        </div>
    </div>
    <div class="col-md-6" id="aboutme">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3><i class="fa fa-user" aria-hidden="true"></i> About me</h3>
                <hr />
                <p>My name is Jimmy. I'm from Québec, Canada. I like music, programming, video games and movies. I like to meet new people if you see me online don't hesitate to dm me 😉. Best way to contact me is trought discord <a href="https://discord.gg/6DGc24x">(You can join my discord server by clicking here)</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6" id="donations">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3><i class="fa fa-money" aria-hidden="true"></i> Donations</h3>
                <hr />
                <p>You do not need to make a donation. All donation are really appreciated and will support the stream itself. To make a donation <a href="https://streamlabs.com/noxgamingqc">click here</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-md-12" id="communityRules">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3><i class="fa fa-users" aria-hidden="true"></i> Community Rules</h3>
                <hr />
                <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> No offensive messages or nicknames - Anything that a reasonable person might find offensive.</p>
                <br />
                <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> No spam - This includes but is not limited too, loud/obnoxious noises in voice chat, @mention spam, character spam, image spam, and message spam.</p>
                <br />
                <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> No gorey, sexual, or scary content - Screamer links, porn, nudity, death.</p>
                <br />
                <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> No harassment - Including sexual harassment or encouraging of harassment.</p>
                <br />
                <p><i class="fa fa-window-close error-text" aria-hidden="true"></i> No advertisements - This includes but is not limited too, Twitch, YouTube, Mixer and Discord servers.</p>
                <br />
                <p><i class="fa fa-check-square success-text" aria-hidden="true"></i> Swearing is allowed so long as it isn't directed at another member.</p>
                <br />
                <p>There may be situations not covered by the rules or times where the rule may not fit the situation. If this happens the moderators are trusted to handle the situation appropriately. If you have a complaint about a staff member you may submit the complaint to NoxGamingQC</p>
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
