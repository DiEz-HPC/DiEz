import React from 'react';
import './Whatwedo.scss';
import BtnLinks from '../buttons/links/BtnLinks';
import FirstPart from './firstpart/FirstPart';
import SecondParts from './SecondPart/SecondPart';

function WhatWeDo() {
    return (
        <div className="whatwedo">
            <h2 className="whatwedo_title">
                What We Do <span> . </span>
            </h2>
           <FirstPart />
            <SecondParts />
            <div className="row">
                <h2>
                    Custom website design & development, for brands of all
                    shapes & sizes
                </h2>
            </div>
        </div>
    );
}

export default WhatWeDo;
