import React from "react";
import {BrowserRouter, Switch, Route} from 'react-router-dom';
import Home from "./views/pages/Home";
import About from "./views/pages/About";
import Blog from "./views/pages/Blog";
import Contact from "./views/pages/Contact";
import './styles/app.scss';
import './bootstrap';

export default function App() {
    return (
        <BrowserRouter>
            <Switch>
                <Route exact path={'/'} component={Home}/>
                <Route exact path={'/qui-sommes-nous'} component={About} />
                <Route exact path={'/actualites'} component={Blog} />
                <Route exact path={'/contact'} component={Contact} />
            </Switch>
        </BrowserRouter>
    );
}