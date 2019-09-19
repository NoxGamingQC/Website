import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import DOMPurify from 'dompurify';

export default class NoxBot extends Component {
    constructor() {
        super();
        this.state = {
            discordButtonHTML: '',
        }
    }

    getDiscordButtonHTML(thisObject) {
        var html = '';
        if (document.getElementById("discordUserID") && !!document.getElementById("discordUserID").value) {
            html += '<a class="btn btn-primary" href="/noxbot/dashboard">Dashboard</a>';
            html += '<a class="btn btn-primary" href="https://discord.gg/KPd4cC4">Join Discord server</a>';
            html += '<a class="btn btn-primary" href="https://discordapp.com/oauth2/authorize?client_id=395657323135238157&scope=bot&permissions=1073048825>Invite NoxBOT</a>';
        } else {
            html += '<a class="btn btn-primary" href="https://discordapp.com/api/oauth2/authorize?client_id=395657323135238157&redirect_uri=' + window.location.href + '/dashboard&response_type=code&scope=identify&guilds&email">Link Discord</a>';
            html += '<a class="btn btn-primary" href="https://discord.gg/KPd4cC4">Join Discord server</a>';
            html += '<a class="btn btn-primary" href="https://discordapp.com/oauth2/authorize?client_id=395657323135238157&scope=bot&permissions=1073048825">Invite NoxBOT</a>';
        }

        thisObject.setState({
            discordButtonHTML: html
        });
    }

    componentDidMount() {
        this.getDiscordButtonHTML(this);
    }

    render() {
        return (
            <div className="container">
                <div className="row">
                    <div className="col-md-12" id="title">
                        <h1>NoxBOT</h1>
                        <hr />
                    </div>
                    <div className="col-md-12" id="content">
                        <div className="invite-buttons" dangerouslySetInnerHTML={{ __html: DOMPurify.sanitize(this.state.discordButtonHTML) }} >
                        </div>
                        <div className="commands">
                            <h3>Commands List</h3>
                            <h5>😎 ​​Avatars Commands</h5>
                            <ul>
                                <li><b>!avatar "@user"</b>: Get user's avatar.</li>
                            </ul>
                            <hr />
                            <h5>​​🎉 Giveaway Commands</h5>
                            <ul>
                                <li>This module is currently under maintenance.</li>
                            </ul>
                            <hr />
                            <h5>❓ ​​Help Command</h5>
                            <ul>
                                <li><b>!help</b>: Get help from NoxBOT.</li>
                            </ul>
                            <hr />
                            <h5>❓ Info Command</h5>
                            <ul>
                                <li><b>!help</b>: Get NoxBOT info.</li>
                            </ul>
                            <hr />
                            <h5>🌎 LMGTFY Command</h5>
                            <ul>
                                <li><b>!lmgtfy "search terms"</b>: Get a 'Let Me Google That For You' link.</li>
                            </ul>
                            <hr />
                            <h5>🎧 Music Commands</h5>
                            <ul>
                                <li><b>!init</b>: Connect NoxBOT to your current vocal room.</li>
                                <li><b>!play "search terms or link"</b>: Play some music.</li>
                                <li><b>!pause</b>: Pause the current song.</li>
                                <li><b>!resume</b>: Resume the current song.</li>
                                <li><b>!stop</b>: Stop the current song.</li>
                                <li><b>!list</b>: Get all the current song in the queue.</li>
                                <li><b>!leave</b>: Leave the current voice room.</li>
                            </ul>
                            <hr />
                            <h5>📡 Ping Command</h5>
                            <ul>
                                <li><b>!ping</b>: Get NoxBOT's ping.</li>
                            </ul>
                            <hr />
                            <h5>🐿 Pokémon Commands</h5>
                            <ul>
                                <li><b>!pokemon "pokémon name or Pokédex Entry"</b>: Get pokémon info.</li>
                                <li><b>!pokemon "pokémon name or Pokédex Entry" shiny</b>: Get the shiny version info.</li>
                            </ul>
                            <hr />
                            <h5>🚀 Warframe Commands</h5>
                            <ul>
                                <li><b>!warframe info "Warframe name"</b>: Get info about a Warframe.</li>
                            </ul>
                            <hr />
                            <h5>⚔ Warning Command</h5>
                            <ul>
                                <li><b>!warn "@User" "MessageID" "Reason"`</b>: Warn a user and delete his message.</li>
                            </ul>
                            <hr />
                            <h5>⚔ Management Commands</h5>
                            <ul>
                                <li><b>!addreactionroles #channel-name MessageID @role Emoji</b>: Add a reaction emoji to give roles to users.</li>
                            </ul>
                            <hr />
                            <div className="contributors">
                                <h3>Creator and contributors</h3>
                                <ul>
                                    <li>NoxGamingQC#3942</li>
                                    <li>Theros#6878</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
