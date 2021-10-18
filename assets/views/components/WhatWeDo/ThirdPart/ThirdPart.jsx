import React from 'react';
import './ThirdPart.scss';
import '../../../../styles/device.min.scss';
import Button from '../../buttons/links/BtnLinks';
import PhonePic from '../../../../images/JobPermutMobile.png';
import ComputerPic from '../../../../images/JobPermutPc.png';
import TabletPic from '../../../../images/JobPermutTablet.png';
import Iphone from './device/Iphone';
import MacBook from './device/MacBook';
import Ipad from './device/Ipad';

function ThirdPart() {
    return (
        <div className="thirdPart">
            <div className="inner-container row d-flex justify-content-evenly">
                <div className="device-div col-md-6 row d-flex justify-content-around align-items-center">
                    <MacBook picture={ComputerPic} scale="90" alt="macbook" />
                    <Ipad picture={TabletPic} scale="90" alt="ipad" />
                    <Iphone picture={PhonePic} scale="50" alt="iphone" />
                </div>
                <div className="text-div col-12 col-md-4">
                    <h2 className="text-start">
                        Custom website design & development , for brands of all
                        shapes & sizes
                    </h2>
                    <p className="text-start">
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Nobis fugiat eligendi ex cum velit facere odio
                        natus. Perferendis esse molestiae deleniti, incidunt
                        fugit, aspernatur exercitationem velit necessitatibus
                        minus architecto numquam!
                    </p>
                    <div className="d-flex justify-content-center justify-content-md-start">
                    <Button
                        link={'#'}
                        label={'Nos projets'}
                        color={'white'}
                        style={'me-4'}
                        variant={'outlined'}
                    />
                    <Button
                        link={'#'}
                        label={'Contact'}
                        color={'dark'}
                        style={'me-4'}
                        variant={'contained'}
                    /></div>
                </div>
            </div>
        </div>
    );
}

export default ThirdPart;
