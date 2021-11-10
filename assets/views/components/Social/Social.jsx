import React from 'react';
import '../Social/social.scss'

function Social() {
    return (
        <div className="social">
            <p className="text-social my-auto mx-1">NOUS SUIVRE</p>
            <hr className="hr-social mx-2" />
            <a href="#" className=" my-auto  mx-1">
            <i className="fab fa-facebook-f"></i>
            </a>
            <a href="#" className=" my-auto  mx-1">
            <i className="fab fa-twitter"></i>
            </a>
            <a href="#" className=" my-auto  mx-1">
            <i className="fab fa-instagram"></i>
            </a>
            <a href="#" className=" my-auto  mx-1">
            <i className="fab fa-linkedin-in"></i>
            </a>
        </div>
    );
}

export default Social;
