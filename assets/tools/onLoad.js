import {scrollMenu} from "./scrollMenu";
import {initChangeColor} from "./changeColorAccordingBackgroundColor";

function colors() {
    initChangeColor(document.getElementById('social'), [document.getElementById('menu'), document.getElementById('header')]);
    scrollMenu();
}

window.onload = () => {
    colors()
    window.onscroll = () => {
        colors()
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