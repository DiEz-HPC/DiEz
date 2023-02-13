import React from 'react';
import { BrowserRouter, Switch, Route } from 'react-router-dom';
import { AnimatePresence } from 'framer-motion';
import './styles/app.scss';
import './bootstrap';
import Home from './views/pages/Home';
import About from './views/pages/About';
import Blog from './views/pages/Blog';
import Contact from './views/pages/Contact';
import NotFound from './views/pages/404';
import SingleBlog from './views/pages/SingleBlog';
import AOS from 'aos';
import 'aos/dist/aos.css';
import Mention from './views/pages/Mention';
import cookieConsentButton from './js/cookieConsent.js';

require('../assets/tools/onLoad.js');
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

AOS.init();
/* matomo */
var _paq = (window._paq = window._paq || []);
/* tracker methods like "setCustomDimension" should be called before "trackPageView" */
_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);
(function () {
    var u = '//www.matomo.deviteasy.fr/';
    _paq.push(['setTrackerUrl', u + 'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d = document,
        g = d.createElement('script'),
        s = d.getElementsByTagName('script')[0];
    g.type = 'text/javascript';
    g.async = true;
    g.src = u + 'matomo.js';
    s.parentNode.insertBefore(g, s);
})();
/* matomo */

cookieConsentButton();

export default function App() {
    return (
        <BrowserRouter>
            <AnimatePresence>
                <Switch location={location} key={location.pathname}>
                    <Route exact path={'/'} component={Home} />
                    <Route exact path={'/qui-sommes-nous'} component={About} />
                    <Route exact path={'/blog'} component={Blog} />
                    <Route exact path={'/blog/*'} component={SingleBlog} />
                    <Route exact path={'/contact'} component={Contact} />
                    <Route exact path={'/mentions-legales'} component={Mention} />z
                    <Route path="*" component={NotFound} />
                </Switch>
            </AnimatePresence>
        </BrowserRouter>
    );
}
