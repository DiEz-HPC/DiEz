import React from 'react';

function Ipad(props) {
    return (
        <div className={`cd-ipad cd-scale-${props.scale}`}>
            <div className="cd-body">
                <div className="cd-camera"></div>
                <div className="cd-home"></div>
                <div className="cd-screen">
                    <img src={props.picture} alt="FotoPc" />
                </div>
            </div>
        </div>
    );
}

export default Ipad;