import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Partnership extends Component {
    render() {
        return (
            <div className="container">
                <div className="row">
                    <div id="title">
                        <h1>Affiliation and partnership</h1>
                        <hr />
                    </div>
                    <div className="col-md-12" id="affiliation">
                        <h3><i className="fa fa-handshake-o" aria-hidden="true"></i> Affiliation</h3>
                        <hr />
                        <div className="row">
                            <div className="col-md-3 text-center" id="twitch">
                                <a className="btn btn-twitch btn-lg" href="https://www.twitch.tv/noxracing">
                                    <i className="fa fa-twitch fa-5x" aria-hidden="true"></i>
                                </a>
                                <h5>Twitch</h5>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div className="col-md-12" id="partnership">
                        <h3><i className="fa fa-handshake-o" aria-hidden="true"></i> Partnership</h3>
                        <hr />
                        <div className="row">
                            <div className="col-md-3 text-center" id="HumbleBundle">
                                <a className="btn btn-default btn-lg" href="https://www.humblebundle.com/?partner=noxracing">
                                    <img src="/img/HumblePartner.png" width="100%" />
                                </a>
                                <h5>Humble Bundle</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
