import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Commands extends Component {
    render() {
        return (
            <div className="container">
                <div className="row">
                    <div className="col-md-12" id="title">
                        <h1>Commands</h1>
                        <hr />
                    </div>
                    <div className="col-md-12" id="content">
                        <div className="invite-buttons">
                            <a className="btn btn-primary" href="https://discord.gg/KPd4cC4">Join Discord server</a>
                            <a className="btn btn-primary" href="https://www.twitch.tv/noxracing">Join Twitch channel</a>
                        </div>
                        <div className="commands">
                            <h3>Commands Lists</h3>
                            <h5>​​🌎 General commands</h5>
                            <ul>
                                <li><b>!commands</b>: Get a link to this page</li>
                                <li><b>!extralife</b>: Get NoxRacing ExtraLife's support page link</li>
                                <li><b>!time</b>: Get NoxRacing current time</li>
                            </ul>
                            <hr />
                            <h5>​​🎮 Games commands</h5>
                            <ul>
                                <li><b>!golfwithyourfriends</b>: Get the name and the password of the Golf with your Friends private friends</li>
                                <li><b>!rocketleague</b>: Get the name and the password of the Rocket League private match</li>
                                <li><b>!warframe</b>: Get a referrential link to the game: Warframe</li>
                            </ul>
                            <hr />
                            <h5>​​⚔ Moderators commands</h5>
                            <ul>
                                <li><b>!so <i>name</i></b>: Shoutout a Twitch Streamer</li>
                            </ul>
                            <hr />
                            <h5>​​🎰 Miscs commands</h5>
                            <ul>
                                <li><b>!equipment</b>: Get a link to the NoxRacing's equipment page</li>
                                <li><b>!lenny</b>: ( ͡° ͜ʖ ͡°)</li>
                                <li><b>!nox</b>: "I’m a guy! I’m a guys! Oh fuck that shit I’m a Nox" – NoxRacing, 2017</li>
                                <li><b>!shrug</b>: ¯\_(ツ)_/¯</li>
                                <li><b>!tableflip</b>: (╯°□°）╯︵ ┻━┻</li>
                                <li><b>!unflip</b>: ┬─┬ ノ( ゜-゜ノ)</li>
                            </ul>
                            <hr />
                            <h5>​​👦👧 Socials commands</h5>
                            <ul>
                                <li><b>!curse</b>: Get a link to NoxRacing Curse/Twitch server</li>
                                <li><b>!discord</b>: Get a link to join NoxRacing's Discord server</li>
                                <li><b>!instagram</b>: Get NoxRacing instagram profile link</li>
                                <li><b>!psn</b>: Get NoxRacing's psn id</li>
                                <li><b>!twitter</b>: Get NoxRacing's Twitter profile link</li>
                                <li><b>!website</b>: Get a link to the website home page</li>
                                <li><b>!youtube</b>: Get a link to NoxRacing's YouTube page</li>
                            </ul>
                            <hr />
                            <h5>​​📹 Stream commands</h5>
                            <ul>
                                <li><b>!uptime</b>: Get the streaming total time of the current stream</li>
                            </ul>
                            <hr />
                            <br />
                            <p>P.S. In order to use the bot on Discord please direct message the bot on discord with this command: "!linkdiscord". After that it will ask you to dm again the bot with a command, but this time on Twitch once done you'll be able to use the command from twitch on discord.</p>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
