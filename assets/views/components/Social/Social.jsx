import React from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import {
    faFacebookSquare,
    faTwitterSquare,
    faInstagramSquare,
    faLinkedin,
} from '@fortawesome/free-brands-svg-icons';
import '../Social/social.scss'

function Social() {
    return (
        <div className="social">
            <p className="text-social m-auto">Nous suivre</p>
            <hr className="hr-social m-auto" />
            <a href="#" className=" m-auto">
                <FontAwesomeIcon icon={faFacebookSquare} className="logo-social" />
            </a>
            <a href="#" className=" m-auto">
                <FontAwesomeIcon
                    icon={faInstagramSquare}
                    className="logo-social m-auto"
                />
            </a>
            <a href="#" className=" m-auto">
                <FontAwesomeIcon
                    icon={faLinkedin}
                    className="logo-social m-auto"
                />
            </a>
            <a href="#" className=" m-auto">
                <FontAwesomeIcon
                    icon={faTwitterSquare}
                    className="logo-social m-auto"
                />
            </a>
        </div>
    );
}

export default Social;
