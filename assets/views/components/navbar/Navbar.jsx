import React from "react";
import "../navbar/navbar.scss";
import "../navbar/menu.js";

function Navbar() {
  return (
    <>
      <header id="header">
        <nav class="nav">
          <button class="toggle-menu">
            <span></span>
          </button>
        </nav>
      </header>

      <div id="menu" class="">
        <nav class="main-nav">
          <ul>
            <li>
              <a href="#">home</a>
            </li>
            <li>
              <a href="#">archives</a>
            </li>
            <li>
              <a href="#">tags</a>
            </li>
            <li>
              <a href="#">categories</a>
            </li>
            <li>
              <a href="#">about</a>
            </li>
          </ul>
        </nav>

        <footer class="menu-footer">
          <div class="menu-social">
            <div class="label">Nous Suivre</div>
            <div class="spacer"></div>
            <div class="item">
              <span>Twitter</span>
            </div>
            <div class="item">
              <span>Instagram</span>
            </div>
            <div class="item">
              <span>Linkedin</span>
            </div>
            <div class="item">
              <span>Facebook</span>
            </div>
          </div>
        </footer>
      </div>
    </>
  );
}

export default Navbar;
