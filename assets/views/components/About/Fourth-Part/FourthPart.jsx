import React from 'react';
import TextBox from './Box/TextBox';
import './FourthPart.scss';

function FourthPart(props) {
    return (
        <div className="fourth-part">
            <div className="fourth-part__outer__container">
                <div className="fourth-part__container">
                    <div className="fourth-part__text">
                        <TextBox
                            title="Agency short on resource ?"
                            subtitle="We offer the white-label solution your agency is looking for."
                            text="Duis congue sapien at commodo ullamcorper. Suspendisse potenti. Fusce convallis bibendum ex sed consequat. Donec pulvinar purus aliquet diam consectetur, et molestie quam tempor. Aliquam interdum mollis dui, vitae cursus velit facilisis in. Etiam vitae lectus feugiat, eleifend magna sed, efficitur augue. Vestibulum ipsum arcu, aliquet imperdiet mi vel. "
                        />
                    </div>
                    <div className="fourth-part__image">
                        <img
                            src={props.image}
                            alt=""
                        />
                    </div>
                </div>
            </div>
        </div>
    );
}
export default FourthPart;
