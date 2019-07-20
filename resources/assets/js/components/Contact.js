import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Contact extends Component {
    render() {
        return (
            <div className="container">
                <div className="row">
                    <div className="col-md-12" id="title">
                        <h1>Contact information</h1>
                        <hr />
                    </div>
                    <div className="col-md-12" id="socialNetwork">
                        <h3><i className="fa fa-globe" aria-hidden="true"></i> Social network</h3>
                        <hr />
                        <div className="row text-center">
                            <div className="col-md-2" id="twitch">
                                <a className="btn btn-twitch btn-lg" href="https://www.twitch.tv/noxgamingqc">
                                    <i className="fa fa-twitch fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>NoxGamingQC</p>
                            </div>
                            <div className="col-md-2" id="youtube">
                                <a className="btn btn-youtube btn-lg" href="https://www.youtube.com/channel/UCytKDUapog2tnJD4XenehiQ">
                                    <i className="fa fa-youtube-play fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>NoxRacing</p>
                            </div>
                            <div className="col-md-2" id="facebook">
                                <a className="btn btn-facebook btn-lg" href="https://www.facebook.com/NoxRacingGamingOfficial/">
                                    <i className="fa fa-facebook-official fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>NoxRacingGamingOfficial</p>
                            </div>
                            <div className="col-md-2" id="twitter">
                                <a className="btn btn-twitter btn-lg" href="https://www.twitter.com/@noxgamingqc">
                                    <i className="fa fa-twitter fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>@NoxGamingQC</p>
                            </div>
                            <div className="col-md-2" id="instagram">
                                <a className="btn btn-instagram btn-lg" href="https://www.instagram.com/noxgamingqc/">
                                    <i className="fa fa-instagram fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>@NoxRacingGaming</p>
                            </div>
                            <div className="col-md-2" id="steam">
                                <a className="btn btn-steam btn-lg" href="http://steamcommunity.com/id/NoxGamingQC/">
                                    <i className="fa fa-steam-square fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>NoxGamingQC</p>
                            </div>
                            <div className="col-md-2" id="googlePlus">
                                <a className="btn btn-google-plus btn-lg" href="https://plus.google.com/u/0/114349968576126625828">
                                    <i className="fa fa-google-plus-circle fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>NoxRacing</p>
                            </div>
                            <div className="col-md-2" id="github">
                                <a className="btn btn-github btn-lg" href="https://github.com/noxracing">
                                    <i className="fa fa-github fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>NoxRacing</p>
                            </div>
                            <div className="col-md-2" id="snapchat">
                                <a className="btn btn-snapchat btn-lg" href="https://www.snapchat.com/add/howlnox22607">
                                    <i className="fa fa-snapchat-ghost fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>HowlNox22607</p>
                            </div>
                            <div className="col-md-2" id="spotify">
                                <a className="btn btn-spotify btn-lg" href="https://open.spotify.com/user/howlnox22607">
                                    <i className="fa fa-spotify fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>HowlNox22607</p>
                            </div>
                            <div className="col-md-2" id="reddit">
                                <a className="btn btn-reddit btn-lg" href="https://www.reddit.com/user/NoxRacing">
                                    <i className="fa fa-reddit fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>NoxRacing</p>
                            </div>
                            <div className="col-md-2" id="pinterest">
                                <a className="btn btn-pinterest btn-lg" href="https://www.pinterest.ca/noxracing/">
                                    <i className="fa fa-pinterest fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>NoxRacing</p>
                            </div>
                            <div className="col-md-2" id="skype">
                                <a className="btn btn-skype btn-lg" href="skype:howlnox22607?userinfo">
                                    <i className="fa fa-skype fa-5x" aria-hidden="true"></i>
                                </a>
                                <p>HowlNox22607</p>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-12" id="businessInquiries">
                        <h3><i className="fa fa-briefcase" aria-hidden="true"></i> Business Inquiries</h3>
                        <hr />
                        <p>For buisiness inquiries, please message me on this email address: <a href="mailto:noxracinggaming@gmail.com">noxracinggaming@gmail.com</a>.</p>
                    </div>
                </div>
            </div>
        );
    }
}

