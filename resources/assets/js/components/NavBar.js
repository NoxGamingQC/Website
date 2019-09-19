import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import DOMPurify from 'dompurify';

export default class NavBar extends Component {
    constructor(props) {
        super(props);
        this.state = {
            location: props.location,
            authentificationHTML: '',
            navElements: ''
        };
    }

    componentDidMount() {
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


        var navElements = '';
        if (this.state.location.split('/')[0] === 'home') {
            navElements += ('<li className="nav-home active"> <a href="/' + document.documentElement.lang + '/home"><i className="fa fa-home" aria-hidden="true"></i> Welcome <span className="sr-only">current</span></a></li>')
        } else {
            navElements += ('<li className="nav-home"> <a href="/' + document.documentElement.lang + '/home"><i className="fa fa-home" aria-hidden="true"></i> Welcome <span className="sr-only">current</span></a></li>')
        }
        if (this.state.location.split('/')[0] === 'stream') {
            navElements += ('<li className="nav-stream active"><a href="/' + document.documentElement.lang + '/stream"><i className="fa fa-video-camera" aria-hidden="true"></i> Stream</a></li>')
        } else {
            navElements += ('<li className="nav-stream"><a href="/' + document.documentElement.lang + '/stream"><i className="fa fa-video-camera" aria-hidden="true"></i> Stream</a></li>')
        }
        if (this.state.location.split('/')[0] === 'projects') {
            navElements += ('<li className="nav-projects active"><a href="/' + document.documentElement.lang + '/projects"><i className="fa fa-heart" aria-hidden="true"></i> Projects</a></li>')
        } else {
            navElements += ('<li className="nav-projects"><a href="/' + document.documentElement.lang + '/projects"><i className="fa fa-heart" aria-hidden="true"></i> Projects</a></li>')
        }
        if (this.state.location.split('/')[0] === 'noxbot') {
            navElements += ('<li className="nav-noxbot active"><a href="/' + document.documentElement.lang + '/noxbot"><i className="fa fa-user" aria-hidden="true"></i> NoxBOT</a></li>')
        } else {
            navElements += ('<li className="nav-noxbot"><a href="/' + document.documentElement.lang + '/noxbot"><i className="fa fa-user" aria-hidden="true"></i> NoxBOT</a></li>')
        }
        if (this.state.location.split('/')[0] === 'contact') {
            navElements += ('<li className="nav-contact active"><a href="/' + document.documentElement.lang + '/contact"><i className="fa fa-address-book " aria-hidden="true"></i> Contact me</a></li>')
        } else {
            navElements += ('<li className="nav-contact"><a href="/' + document.documentElement.lang + '/contact"><i className="fa fa-address-book " aria-hidden="true"></i> Contact me</a></li>')
        }

        this.setState({
            authentificationHTML: authentificationHTML,
            navElements: navElements
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
                            <img src="/img/Avatar.png" alt="NoxGamingQC" width="70px" height="60px" style={{padding: '7px 14px'}} />NoxGamingQC
                        </a>
                    </div>
                    <div className="collapse navbar-collapse" id="bs-navbar-collapse">
                        <ul className="nav navbar-nav" dangerouslySetInnerHTML={{ __html: DOMPurify.sanitize(this.state.navElements) }}>
                        </ul>
                        <ul className="nav navbar-nav navbar-right" dangerouslySetInnerHTML={{ __html: DOMPurify.sanitize(this.state.authentificationHTML) }}>

                        </ul>
                    </div>
                </div>
            </nav>
        );
    }
}

