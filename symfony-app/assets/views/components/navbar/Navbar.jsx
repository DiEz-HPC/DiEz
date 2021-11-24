import React, { useEffect, useState } from "react";
import "../navbar/navbar.scss";
import logo from "../../../images/deviteasy.png";

function Navbar() {
  const [isActive, setIsActive] = useState(false);

  const [isOpen, setIsOpen] = useState("");

  const body = document.querySelector("body");

  useEffect(() => {
    if (isActive) {
      setIsOpen("open");
      body.classList.add("overflow-hidden");
    } else {
      setIsOpen("");
      body.classList.remove("overflow-hidden");
    }
  }, [isActive]);

  return (
    <>
      <header id="header">
        <nav className="nav d-flex justify-content-between">
          <div className="full-logo">
            <a className={'d-flex'} href="/">
              <img src={logo} alt="logo" className="logo" />
              <p className="m-auto">DEVITEASY</p>
            </a>
          </div>
          <button
            id="buttonMenu"
            className={`toggle-menu ${isOpen}`}
            onClick={() => {
              setIsActive((current) => !current);
            }}
          >
            <span/>
          </button>
        </nav>
      </header>

      <div id="menu" className={isOpen}>
        <nav className="main-nav">
          <ul>
            <li>
              <a href="/">Accueil</a>
            </li>
            <li>
              <a href="/qui-sommes-nous">Qui sommes-nous ?</a>
            </li>
            <li>
              <a href="/blog">Blog</a>
            </li>

            <li>
              <a href="/contact">Contact</a>
            </li>
          </ul>
        </nav>

        <footer className="menu-footer">
          <nav className="footer-nav">
            <ul>
              <li>
                <a href="#">
                  <i className="fab fa-linkedin-in me-2"/>
                  <span>Linkedin</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i className="fab fa-instagram me-2"/>
                  <span>Instagram</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i className="fab fa-twitter me-2"/>
                  <span>Twitter</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i className="fab fa-facebook-f me-2"/>
                  <span>Facebook</span>
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
