import React from 'react';

function Iphone(props) {
    return (
        <div class={`cd-iphone-6 cd-scale-${props.scale}`}>
            <div class="cd-body">
                <div class="cd-sound"></div>
                <div class="cd-sleep"></div>
                <div class="cd-camera"></div>
                <div class="cd-ear"></div>
                <div class="cd-home"></div>
                <div class="cd-screen">
                    <img src={props.picture} alt="FotoPc" />
                </div>
            </div>
        </div>
    );
}

export default Iphone;