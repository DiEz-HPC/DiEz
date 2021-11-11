import React from 'react';
import '../Social/social.scss';

function Social() {
    const [text, setText] = React.useState([...'nous suivre']);
    return (
        <div id={'social'} className="social">
            <p className="text-social">
                {text.map((letter, index) => {
                    return <span key={index}>{letter}</span>;
                }
                )}
            </p>

            <hr className="hr-social"/>
            <a href="#" className="ms-3">
                <i className="fab fa-facebook-f"></i>
            </a>
            <a href="#" className="ms-4">
                <i className="fab fa-twitter"></i>
            </a>
            <a href="#" className="ms-4">
                <i className="fab fa-instagram"></i>
            </a>
            <a href="#" className="ms-4">
                <i className="fab fa-linkedin-in"></i>
            </a>

        </div>
    );
}

export default Social;
