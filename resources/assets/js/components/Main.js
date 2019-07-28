import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Welcome from './Welcome';
import NavBar from './NavBar';
import Footer from './Footer';
import Projects from './projects';
import Stream from './Stream';
import NoxBot from './NoxBot';
import NoxBotDashboard from './NoxBotDashboard';
import Commands from './Commands';
import Contact from './Contact';

class Main extends Component {
    constructor() {
        super();
        this.state = {
            location: '',
            route: {
                'home': <Welcome />,
                'projects': <Projects />,
                'stream': <Stream />,
                'noxbot': <NoxBot />,
                'noxbot/dashboard': <NoxBotDashboard />,
                'stream/commands': <Commands />,
                'contact': <Contact />,
            }
        };
    }

    componentDidMount() {
        var locationArray = window.location.pathname.split('/');
        var actualLocation = '';
        for (var i = 1; i < locationArray.length - 1; i++) {
            actualLocation += locationArray[i + 1] + '/';
        }
        actualLocation = actualLocation.slice(0, -1);
        this.setState({
            location: actualLocation
        });
    }

    /*<NavBar location={this.state.location} />*/
    render() {
        if (document.getElementById('root') && this.state.location) {
            return (
                <div className="app">
                    {this.state.route[this.state.location]}
                    <Footer />
                </div>
            );
        }
        return null;
    }
}

ReactDOM.render(<Main />, document.getElementById('root'));
