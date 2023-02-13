import React, {useEffect, useState} from "react";
import "../navbar/navbar.scss";
import logo from "../../../images/deviteasy.webp";
import {ucFirst} from "../../../tools/ucFirst";

function Navbar(props) {
    const [isActive, setIsActive] = useState(false);
    const [isOpen, setIsOpen] = useState("");
    const body = document.querySelector("body");
    const {socials} = props;

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
                            <img src={logo} alt="logo" className="logo"/>
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
                            <a href="/nos-prestations">Nos préstations</a>
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
                            {socials?.map((social, index) => {
                                return (
                                    <li key={index}>
                                        <a href={social.url}>
                                            <i className={`${social.icon} me-2`}/>
                                            <span>{ucFirst(social.name)}</span>
                                        </a>
                                    </li>
                                );
                            })}
                        </ul>
                    </nav>
                </footer>
            </div>
        </>
    );
}

export default Navbar;
