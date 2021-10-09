import React from "react";
import PropTypes from "prop-types";
import './btnlinks.scss'

function BtnLinks(props) {
    const {link, label, style} = props
    return (
        <div className={'btnLink'}>
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                <defs>
                    <filter id="gooey">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="3" result="blur"/>
                        <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"
                                       result="highContrastGraphic"/>
                        <feComposite in="SourceGraphic" in2="highContrastGraphic" operator="atop"/>
                    </filter>
                </defs>
            </svg>
            <a href={link} id="link-button">
                {label}
                <span className="bubbles">
                    <span className="bubble"/>
                    <span className="bubble"/>
                    <span className="bubble"/>
                    <span className="bubble"/>
                    <span className="bubble"/>
                    <span className="bubble"/>
                    <span className="bubble"/>
                    <span className="bubble"/>
                    <span className="bubble"/>
                    <span className="bubble"/>
                </span>
            </a>
        </div>
    );
}

BtnLinks.propTypes = {
    link: PropTypes.string.isRequired,
    label: PropTypes.string.isRequired,
    style: PropTypes.string.isRequired,
}

export default BtnLinks