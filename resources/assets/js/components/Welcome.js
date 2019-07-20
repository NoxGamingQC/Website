import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Welcome extends Component {
    render() {
        return (
            <div className="container">
                <div className="row">
                    <div className="col-md-12 text-center" id="title">
                        <h3>NoxGamingQC</h3>
                        <hr />
                        <p>👨‍💻 Full Stack Dev • 📹 Twitch affiliate • 🎮 Variety streamer • 💖 Positivity Stream Team Lead</p>
                    </div>
                    <div className="col-md-12" id="aboutme">
                        <h3><i className="fa fa-user" aria-hidden="true"></i> About me</h3>
                        <hr />
                        <p>My name is Jimmy. I'm from Québec, Canada. I like music, programming, video games and movies. I like to meet new people if you see me online don't hesitate to dm me 😉. Best way to contact me is trought discord <a href="https://discord.gg/KPd4cC4">(You can join my discord server by clicking here)</a>.</p>
                    </div>
                    <div className="col-md-12" id="donations">
                        <h3><i className="fa fa-money" aria-hidden="true"></i> Donations</h3>
                        <hr />
                        <p>You do not need to make a donation. All donation are really appreciated and will support the stream itself. To make a donation <a href="https://streamlabs.com/noxgamingqc">click here</a>.</p>
                    </div>
                    <div className="col-md-12" id="communityRules">
                        <h3><i className="fa fa-users" aria-hidden="true"></i> Community Rules</h3>
                        <hr />
                        <p><i className="fa fa-window-close" aria-hidden="true" style={{ color: '#F04947' }}></i> No offensive messages or nicknames - Anything that a reasonable person might find offensive.</p>
                        <br />
                        <p><i className="fa fa-window-close" aria-hidden="true" style={{ color: '#F04947' }}></i> No spam - This includes but is not limited too, loud/obnoxious noises in voice chat, @mention spam, character spam, image spam, and message spam.</p>
                        <br />
                        <p><i className="fa fa-window-close" aria-hidden="true" style={{ color: '#F04947' }}></i> No gorey, sexual, or scary content - Screamer links, porn, nudity, death.</p>
                        <br />
                        <p><i className="fa fa-window-close" aria-hidden="true" style={{ color: '#F04947' }}></i> No harassment - Including sexual harassment or encouraging of harassment.</p>
                        <br />
                        <p><i className="fa fa-window-close" aria-hidden="true" style={{ color: '#F04947' }}></i> No advertisements - This includes but is not limited too, Twitch, YouTube, Mixer and Discord servers.</p>
                        <br />
                        <p><i className="fa fa-check-square" aria-hidden="true" style={{ color: '#43B581' }}></i> Swearing is allowed so long as it isn't directed at another member.</p>
                        <br />
                        <p>There may be situations not covered by the rules or times where the rule may not fit the situation. If this happens the moderators are trusted to handle the situation appropriately. If you have a complaint about a staff member you may submit the complaint to NoxGamingQC</p>
                    </div>
                    <div className="col-md-12 text-center" id="twitch">
                        <hr />
                        <div className="col-md-3" id="empty0" />
                        <div className="col-md-2" id="twitch">
                            <a className="btn btn-twitch btn-lg" href="https://www.twitch.tv/noxgamingqc">
                                <i className="fa fa-twitch fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div className="col-md-2" id="youtube">
                            <a className="btn btn-youtube btn-lg" href="https://www.youtube.com/channel/UCytKDUapog2tnJD4XenehiQ">
                                <i className="fa fa-youtube-play fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div className="col-md-2" id="twitter">
                            <a className="btn btn-twitter btn-lg" href="https://www.twitter.com/@noxgamingqc">
                                <i className="fa fa-twitter fa-5x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div className="col-md-3" id="empty1" />
                    </div>
                </div>
            </div>
        );
    }
}
