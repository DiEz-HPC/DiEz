import React from 'react';

function Iphone(props) {
    return (
        <div className={`cd-iphone-6 cd-scale-${props.scale}`}>
            <div className="cd-body">
                <div className="cd-sound"></div>
                <div className="cd-sleep"></div>
                <div className="cd-camera"></div>
                <div className="cd-ear"></div>
                <div className="cd-home"></div>
                <div className="cd-screen">
                    <img src={props.picture} alt="FotoPc" />
                </div>
            </div>
        </div>
    );
}

export default Iphone;