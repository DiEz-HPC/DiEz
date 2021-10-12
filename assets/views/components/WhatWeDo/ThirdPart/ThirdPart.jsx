import React from 'react';
import './ThirdPart.scss';
import Button from '../../buttons/links/BtnLinks';
import FotoPc from '../../../../images/Ecranpc.png';

function ThirdPart() {
    return (
        <div className="thirdPart">
            <div className="d-flex justify-content-evenly">
            <div className="col-md-4">
            <img src={FotoPc} alt="Ecran pc" className="img-fluid"/>
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
