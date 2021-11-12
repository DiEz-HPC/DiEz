import {scrollMenu} from "./scrollMenu";
import {initChangeColor} from "./changeColorAccordingBackgroundColor";
import {displayArrow} from "./displayArrow";

function colors() {
    initChangeColor(document.getElementById('social'), [document.getElementById('menu'), document.getElementById('header')]);
    scrollMenu();
}

window.onload = () => {
    const buttonMenu = document.getElementById('buttonMenu');
    buttonMenu.addEventListener('click', (e) => {
        const navbar = document.getElementById('header');
        navbar.style.setProperty("top", "0px");
        let currentScrollPos = window.pageYOffset;
        if (currentScrollPos > 0) {
            navbar.classList.toggle('header-dark')
        }
    });

    colors()

    window.onscroll = () => {
        colors()
        displayArrow('arrowIcon')
    }

}