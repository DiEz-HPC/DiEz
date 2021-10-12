import React from 'react';

function MacBook(props) {
    return (
        <div class={`cd-mac cd-pro cd-scale-${props.scale}`}>
            <div class="cd-top"></div>
            <div class="cd-bottom"></div>
            <div class="cd-camera"></div>
            <div class="cd-notch"></div>
            <div class="cd-screen">
                <img src={props.picture} alt="FotoPc" />
            </div>
        </div>
    );
}

export default MacBook;