import React from 'react';
import LineIcon from "react-lineicons";
import '../Social/social.scss'

function Social() {
    return (
        <div className="social">
            <p className="text-social m-auto">NOUS SUIVRE</p>
            <hr className="hr-social" />
            <a href="#" className=" m-auto">
            <LineIcon name="facebook"/>
            </a>
            <a href="#" className=" m-auto">
            <LineIcon name="twitter"/>
            </a>
            <a href="#" className=" m-auto">
            <LineIcon name="instagram"/>
            </a>
            <a href="#" className=" m-auto">
            <LineIcon name="linkedin"/>
            </a>
        </div>
    );
}

export default Social;
