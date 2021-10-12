import React from 'react';
import './ThirdPart.scss';
import '../../../../styles/device.min.scss';
import Button from '../../buttons/links/BtnLinks';
import PhonePic from '../../../../images/Fiverr.png';
import ComputerPic from '../../../../images/FiverPc.png';
import Iphone from './device/Iphone';
import MacBook from './device/MacBook';

function ThirdPart() {
    return (
        <div className="thirdPart">
            <div className="row d-flex justify-content-evenly">
                <div className="col-md-6 d-flex align-items-center">
                    <Iphone 
                        picture={PhonePic}
                        scale='60'
                        alt="iphone"
                    />
                    <MacBook
                        picture={ComputerPic}
                        scale='100'
                        alt="macbook"
                    />
                </div>
                <div className="col-md-4">
                    <h2>
                        Custom website design & development, for brands of all
                        shapes & sizes
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Nobis fugiat eligendi ex cum velit facere odio
                        natus. Perferendis esse molestiae deleniti, incidunt
                        fugit, aspernatur exercitationem velit necessitatibus
                        minus architecto numquam!
                    </p>
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
                        color={'primary'}
                        style={'me-4'}
                        variant={'outlined'}
                    />
                </div>
            </div>
        </div>
    );
}

export default ThirdPart;
