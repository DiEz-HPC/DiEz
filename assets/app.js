import React from "react";
import {BrowserRouter, Switch, Route} from 'react-router-dom';
import './styles/app.scss';
import './bootstrap';
import Home from "./views/pages/Home";
import About from "./views/pages/About";
import Blog from "./views/pages/Blog";
import Contact from "./views/pages/Contact";
import NotFound from "./views/pages/404";
import SingleBlog from "./views/pages/SingleBlog";

require ('../assets/tools/scrollMenu.js');
require ('../assets/tools/switchColorSocial.js');

require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');



export default function App() {
    return (
        <BrowserRouter>
            <Switch>
                <Route exact path={'/'} component={Home}/>
                <Route exact path={'/qui-sommes-nous'} component={About} />
                <Route exact path={'/blog'} component={Blog} />
                <Route exact path={'/blog/*'} component={SingleBlog} />
                <Route exact path={'/contact'} component={Contact} />
                <Route path="*" component={NotFound}/>
            </Switch>
        </BrowserRouter>
    );
}