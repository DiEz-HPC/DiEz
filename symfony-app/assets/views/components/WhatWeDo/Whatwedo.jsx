import React from 'react';
import './Whatwedo.scss';
import FirstPart from './firstpart/FirstPart';
import SecondParts from './SecondPart/SecondPart';
import ThirdPart from './ThirdPart/ThirdPart';

function WhatWeDo() {
    return (
        <div className="whatwedo">
            <h2 className="whatwedo_title">
                Nos compétences <span> . </span>
            </h2>
            <FirstPart />
            <SecondParts />
            <ThirdPart />
        </div>
    );
}

export default WhatWeDo;
