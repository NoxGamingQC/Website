import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import DOMPurify from 'dompurify';
import querystring from 'querystring';

export default class NoxBotDashboard extends Component {
    constructor() {
        super();
        this.state = {
            userHTML: '',
            guildsHTML: '',
            guilds : null,
            user: null
        }
    }
    getUsers(thisObject, token) {
        $.ajax({
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': token.token_type + ' ' + token.access_token
            },
            url: 'https://discordapp.com/api/users/@me',
            success: function (user) {
                if (user.premium_type == 1) {
                    var nitroSubscription = 'Nitro Classic';
                } else if(user.premium_type == 2) {
                    var nitroSubscription = 'Nitro';
                } else {
                    var nitroSubscription = 'You don\'t have Discord Nitro';
                }
                var obtainedBadges = [];
                var userFlags = user.flags;
                var actualFlags = user.flags;

                if((userFlags - 512) >= 0) {
                    obtainedBadges.push('Early Supporter');
                    actualFlags -= 512;
                    userFlags = actualFlags;
                } else {
                    userFlags = actualFlags;
                }

                if ((userFlags - 256) >= 0) {
                    obtainedBadges.push('HypeSquad Balance');
                    actualFlags -= 256;
                    userFlags = actualFlags;
                } else {
                    userFlags = actualFlags;
                }

                if ((userFlags - 128) >= 0) {
                    obtainedBadges.push('HypeSquad Brilliance');
                    actualFlags -= 128;
                    userFlags = actualFlags;
                } else {
                    userFlags = actualFlags;
                }

                if ((userFlags - 64) >= 0) {
                    obtainedBadges.push('HypeSquad Bravery');
                    actualFlags -= 64;
                    userFlags = actualFlags;
                } else {
                    userFlags = actualFlags;
                }

                if ((userFlags - 8) >= 0) {
                    obtainedBadges.push('Bug Hunter');
                    actualFlags -= 8;
                    userFlags = actualFlags;
                } else {
                    userFlags = actualFlags;
                }

                if ((userFlags - 4) >= 0) {
                    obtainedBadges.push('HypeSquad Events');
                    actualFlags -= 4;
                    userFlags = actualFlags;
                } else {
                    userFlags = actualFlags;
                }

                if ((userFlags - 2) >= 0) {
                    obtainedBadges.push('Discord Partner');
                    actualFlags -= 2;
                    userFlags = actualFlags;
                } else {
                    userFlags = actualFlags;
                }

                if ((userFlags - 1) >= 0) {
                    obtainedBadges.push('Discord Employee');
                    actualFlags -= 1;
                    userFlags = actualFlags;
                } else {
                    userFlags = actualFlags;
                }

                $.ajax({
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.getElementById('csrf-token').value
                    },
                    data: {
                        discordID: user.id,
                        discordName: user.username,
                        discordDiscriminator: user.discriminator,
                        discordAvatar: user.avatar,
                        discordEmail: user.email,
                        discordIsUserVerified: user.verified,
                        discordBadges: (obtainedBadges.length ? obtainedBadges.reverse().join(';') : null),
                        mfa_enabled: user.mfa_enabled,
                        discordPremiumType: user.premium_type,
                        discordLanguage: user.locale
                    },
                    url: '/noxbot/data/user/store',
                    success: function () {
                        console.log('You link discord with success');
                    }
                })

                var html = '<div class="col-md-12">';
                html +=     '<div class="col-md-2">';
                html +=         '<image alt="' + user.username + user.discriminator + '" src="https://cdn.discordapp.com/avatars/' + user.id + '/' + user.avatar + '.png" />';
                html +=     '</div>';
                html +=     '<div class="col-md-4">';
                html +=         '<h3> ' + user.username + '#' + user.discriminator + '</h3>';
                html +=         '<p><b> Email: </b>' + user.email + '</p>';
                html +=         '<p><b> Verified: </b>' + user.verified + '</p>';
                html +=     '</div>';
                html +=     '<div class="col-md-4">';
                html +=         '<p><b> ID: </b>' + user.id + '</p>';
                html +=         '<p><b> Discord Nitro Subscription: </b>' + nitroSubscription + '</p>';
                html +=         '<p><b> Discord Badges: </b>' + (obtainedBadges.length ? obtainedBadges.reverse().join(', ') : 'You don\'t have any Discord badges') + '</p>';
                html +=     '</div>';
                html +=     '<div class="col-md-2">';
                html +=     '</div>';
                html +=      '<div class="col-md-12">';
                html +=         '<hr />';
                html +=      '</div>';
                html += '</div>';

                user.userID = user.id;
                thisObject.setState({
                    userHTML: html,
                    user: user
                })
            },
            error: function (error) {
                console.log(error);
            },
        })
    }

    getGuilds(thisObject, token) {
        $.ajax({
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': token.token_type + ' ' + token.access_token
            },
            url: 'https://discordapp.com/api/users/@me/guilds',
            success: function (guilds) {
                var html = '<div class="col-md-12">';
                var serverLists = document.getElementById("root").getAttribute('variables').split(',');
                guilds.forEach(function(guild) {
                    var redirectLink = 'https://discordapp.com/oauth2/authorize?client_id=395657323135238157&scope=identify%20guilds%20email&permissions=1073048825';
                    guild.guildID = guild.id
                    serverLists.forEach(function(serverID) {
                        if(serverID == guild.id) {
                            redirectLink = (window.location.origin + '/noxbot/dashboard/' + guild.id + '?' + querystring.stringify(guild) + '&' + querystring.stringify(thisObject.state.user))
                        }
                    })

                    if((guild.permissions & 0x20) == 0x20) {
                        html += '<div class="col-md-2">';
                        html += '<a class="text-center" href="' + redirectLink + '"><image src="https://cdn.discordapp.com/icons/' + guild.id + '/' + guild.icon + '.png" class="img-circle" width="64" height="64" /></a>'
                        html += '</div>';
                    }
                });
                html += '</div>';
                thisObject.setState({
                    guildsHTML: html,
                    guilds: guilds
                });


            },
            error: function (error) {
                console.log(error);
            },
        })
    }

    getToken(thisObject) {
        if (window.location.search.includes('code')) {
            $.ajax({
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                url: 'https://discordapp.com/api/oauth2/token',
                data: {
                    client_id: '395657323135238157',
                    client_secret: 'QMQDtjOWmYKtNTStrmzHSXIGhPILKXKL',
                    grant_type: 'authorization_code',
                    code: window.location.search.split('?code=')[1],
                    redirect_uri: window.location.origin + '/noxbot/dashboard',
                    scope: 'identify guilds email'
                },
                success: function (token) {
                    thisObject.getUsers(thisObject, token);
                    thisObject.getGuilds(thisObject, token);
                },

                error: function (error) {
                    console.log(error);
                },
            })
        }
    }

    getData() {

    }

    componentDidMount() {
        if(window.location.search.split('?code=')[1]) {
            this.getToken(this);
        } else {
            this.getData(this);
        }
    }

    render() {
        this.getToken(this);
        return (
            <div className="container">
                <div className="row">
                    <div className="col-md-12" id="title">
                        <h1>NoxBOT Dashboard</h1>
                        <hr />
                    </div>
                    <div className="col-md-12" id="content">
                        <div className="invite-buttons">
                            <a className="btn btn-primary" href="https://discord.gg/6DGc24x">Join Discord server</a>
                            <a className="btn btn-primary" href="https://discordapp.com/oauth2/authorize?client_id=395657323135238157&scope=bot&permissions=1073048825">Invite NoxBOT</a>
                            <hr />
                        </div>
                        <div className="discord-user" dangerouslySetInnerHTML={{__html: DOMPurify.sanitize(this.state.userHTML)}}>
                        </div>
                        <div className="discord-guilds" dangerouslySetInnerHTML={{ __html: DOMPurify.sanitize(this.state.guildsHTML) }}>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
