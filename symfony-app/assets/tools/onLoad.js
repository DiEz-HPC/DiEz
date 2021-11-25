import {scrollMenu} from "./scrollMenu";
import {initChangeColor} from "./changeColorAccordingBackgroundColor";
import {displayArrow} from "./displayArrow";
import {customCursor} from "./Cursor";
import $ from 'jquery';

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

    customCursor(dot, outline);
    colors()

    window.onscroll = () => {
        const menu = !document.getElementById('menu').classList.contains('open') ? document.getElementById('menu') : document.getElementById('header');
        colors()
        displayArrow('arrowIcon')
        initChangeColor(document.querySelector('.dot-cursor'), styleCursor, [menu, dot, outline]);
    }

    document.body.onmousemove = () => {
        const menu = !document.getElementById('menu').classList.contains('open') ? document.getElementById('menu') : document.getElementById('header');
        initChangeColor(document.querySelector('.dot-cursor'), styleCursor, [menu, dot, outline]);
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