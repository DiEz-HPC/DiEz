import {scrollMenu} from "./scrollMenu";
import {initChangeColor} from "./changeColorAccordingBackgroundColor";
import {displayArrow} from "./displayArrow";


function colors() {
    const styleSocial = {
        color: ''
    };
    initChangeColor(document.getElementById('social'), styleSocial, [document.getElementById('menu'), document.getElementById('header')]);
    scrollMenu();
}

window.onload = () => {

    const dot = document.querySelector('.cursor-dot');
    const outline = document.querySelector('.cursor-dot-outline');

    const styleCursor = {
        backgroundColor: ''
    };

    colors()

    window.onscroll = () => {
        const menu = !document.getElementById('menu').classList.contains('open') ? document.getElementById('menu') : document.getElementById('header');
        colors()
        displayArrow('arrowIcon')
       
    }

    document.body.onmousemove = () => {
        const menu = !document.getElementById('menu').classList.contains('open') ? document.getElementById('menu') : document.getElementById('header');
     
    }


    const buttonMenu = document.getElementById('buttonMenu');
    buttonMenu.addEventListener('click', () => {
        const navbar = document.getElementById('header');
        let currentScrollPos = window.pageYOffset;
        if (currentScrollPos > 0) {
            navbar.classList.toggle('header-dark')
        }
    });
}