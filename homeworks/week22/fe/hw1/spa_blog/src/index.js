import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import {HashRouter as Router, Switch, Link, Route} from 'react-router-dom'
import {singlePage, homePage, aboutPage} from './component.js'

class Page extends Component {
    render() {
        return (
            <Router>
                <div className='navBar'>
                    <div className='blogTitle'>TreeHouse</div>
                    <div className='statusBar'>
                        <span><Link to='/'>Home</Link></span>
                        <span><Link to='./about'>About</Link></span>
                    </div>
                </div>
                    <Switch>
                        <Route path='/' exact component={homePage} />
                        <Route path='/about' component={aboutPage} />
                        <Route path='/:id' component={singlePage} />
                    </Switch>
            </Router>

        )
    }
}

ReactDOM.render(<Page/>,document.querySelector('main'))
