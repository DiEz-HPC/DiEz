import React, { useEffect, useState }from "react";
import "../navbar/navbar.scss";

function Navbar() {

  const [isActive, setIsActive] = useState(false);

  const [isOpen, setIsOpen] = useState('');

  useEffect(() => {
    if(isActive) {
      setIsOpen('open');
    }
    else {
      setIsOpen('');
    }
  },[isActive]);

  const logo = "assets/images/deviteasy.png";

  return (
    <>
      <header id="header">
        <nav class="nav">
          <button class={`toggle-menu ${isOpen}`} onClick = {e => {setIsActive(current => !current)}}>
            <span></span>
          </button>
        </nav>
      </header>

      <div id="menu" class={isOpen}>
        <nav class="main-nav">
          <ul>
            <li>
              <a href="#">Qui sommes-nous ?</a>
            </li>
            <li>
              <a href="#">Blog</a>
            </li>

            <li>
              <a href="#">Contact</a>
            </li>
          </ul>
        </nav>

        <footer class="menu-footer">
          <nav class="footer-nav">
            <ul>
              <li>
                <a href="#">
                  <i class="fa fa-twitter fa-fw"></i>
                  Twitter
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-envelope fa-fw"></i>
                  Subscribe
                </a>
              </li>
            </ul>
          </nav>
        </footer>
      </div>
    </>
  );
}

export default Navbar;
