import {scrollMenu} from "./scrollMenu";
import {initChangeColor} from "./changeColorAccordingBackgroundColor";
import {displayArrow} from "./displayArrow";
import {customCursor} from "./Cursor";

function colors() {
    initChangeColor(document.getElementById('social'), false, [document.getElementById('menu'), document.getElementById('header')]);
    scrollMenu();
}

window.onload = () => {
    const dot = document.querySelector('.cursor-dot');
    const outline = document.querySelector('.cursor-dot-outline');
    customCursor(dot, outline);
    colors()
    window.onscroll = () => {
        colors()
        displayArrow('arrowIcon')
    }
    document.body.onmousemove = () => { 
        const menu = !document.getElementById('menu').classList.contains('open') ? document.getElementById('menu') : document.getElementById('header');
        console.log(menu);
        initChangeColor(document.querySelector('.dot-cursor'), true, [menu, dot, outline]);
    }
    

    const buttonMenu = document.getElementById('buttonMenu');
    buttonMenu.addEventListener('click', (e) => {
        const navbar = document.getElementById('header');
        let currentScrollPos = window.pageYOffset;
        if (currentScrollPos > 0) {
            navbar.classList.toggle('header-dark')
        }
    });
}