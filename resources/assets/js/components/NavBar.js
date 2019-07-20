import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import DOMPurify from 'dompurify';

export default class NavBar extends Component {
    constructor(props) {
        super(props);
        this.state = {
            location: props.location,
            authentificationHTML: ''
        };
    }

    componentDidMount() {
        var elements = document.getElementsByClassName('nav-' + this.state.location.split('/')[0])[0];
        elements.classList.add("active");

        var authentificationHTML = '';

        if (document.getElementById('isUserLogged').value === 'true') {
            authentificationHTML += '<li class="dropdown">';
            authentificationHTML +=     '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">';
            authentificationHTML +=         document.getElementById('username').value + '<span class="caret"></span>';
            authentificationHTML +=     '</a>';
            authentificationHTML +=      '<ul class="dropdown-menu">';
            authentificationHTML +=          '<li>';
            authentificationHTML +=             '<a href="' + document.getElementById('logoutRoute').value + '" onclick="event.preventDefault(); document.getElementById(\'logout - form\').submit();">Logout</a>';
            authentificationHTML += '<form id="logout-form" action="' + document.getElementById('logoutRoute').value + '" method="POST" style="display: none;">' + document.getElementById('csrf-token').value + '</form>';
            authentificationHTML +=         '</li>';
            authentificationHTML +=     '</ul>';
            authentificationHTML += '</li>';
        } else {
            authentificationHTML += '<li class="nav-login"><a href="' + document.getElementById('loginRoute').value + '">Login</a></li>';
            authentificationHTML += '<li class="nav-register"><a href="' + document.getElementById('registerRoute').value + '">Register</a></li>';
        }

        this.setState({
            authentificationHTML: authentificationHTML
        });
    }

    render() {
        return (
            <nav className="navbar navbar-default">
                <div className="container-fluid">
                    <div className="navbar-header">
                        <button type="button" className="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
                            <span className="sr-only">Toggle navigation</span>
                            <span className="icon-bar"></span>
                            <span className="icon-bar"></span>
                            <span className="icon-bar"></span>
                        </button>
                        <a className="navbar-brand" href="/home" style={{display: 'flex', alignItems: 'center'}}>
                            <img src="/img/Avatar.png" alt="NoxRacing" width="70px" height="60px" style={{padding: '7px 14px'}} />NoxGamingQC
                        </a>
                    </div>
                    <div className="collapse navbar-collapse" id="bs-navbar-collapse">
                        <ul className="nav navbar-nav">
                            <li className="nav-home"><a href="/home"><i className="fa fa-home" aria-hidden="true"></i> Welcome <span className="sr-only">current</span></a></li>
                            <li className="nav-stream"><a href="/stream"><i className="fa fa-video-camera" aria-hidden="true"></i> Stream</a></li>
                            <li className="nav-partnership"><a href="/partnership"><i className="fa fa-handshake-o" aria-hidden="true"></i> Affiliates|Partners</a></li>
                            <li className="nav-positivity_stream_team"><a href="/positivity_stream_team"><i className="fa fa-heart" aria-hidden="true"></i> Positivity Stream Team</a></li>
                            <li className="nav-noxbot"><a href="/noxbot"><i className="fa fa-user" aria-hidden="true"></i> NoxBOT</a></li>
                            <li className="nav-contact"><a href="/contact"><i className="fa fa-address-book " aria-hidden="true"></i> Contact me</a></li>
                        </ul>
                        <ul className="nav navbar-nav navbar-right" dangerouslySetInnerHTML={{ __html: DOMPurify.sanitize(this.state.authentificationHTML) }}>

                        </ul>
                    </div>
                </div>
            </nav>
        );
    }
}

