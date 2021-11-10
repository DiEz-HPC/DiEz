import React from 'react';

function MacBook(props) {
    return (
        <div className={`cd-mac cd-pro cd-scale-${props.scale}`}>
            <div className="cd-top"></div>
            <div className="cd-bottom"></div>
            <div className="cd-camera"></div>
            <div className="cd-notch"></div>
            <div className="cd-screen">
                <img src={props.picture} alt="FotoPc" />
            </div>
        </div>
    );
}

export default MacBook;