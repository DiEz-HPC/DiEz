import React from 'react';
import LineIcon from 'react-lineicons';
import './Whatwedo.scss';
import BtnLinks from '../buttons/links/BtnLinks';
import Card from './card/Card';

function WhatWeDo() {
    return (
        <div className="whatwedo">
            <h2 className="whatwedo_title">
                What We Do <span> . </span>
            </h2>
            <div className="first_part mb-5 d-flex justify-content-around">
                <Card
                    iconName="cart-full"
                    title="Web Development"
                    text="Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Aut harum impedit excepturi autem sunt earum quae, ea quo
                    fugit, voluptas beatae corrupti odio eaque doloremque illum
                    saepe dolorem blanditiis quibusdam?"
                    BtnLink="#"
                    BtnLabel="Read More"
                />
                <Card
                    iconName="cart-full"
                    title="Web Development"
                    text="Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Aut harum impedit excepturi autem sunt earum quae, ea quo
                    fugit, voluptas beatae corrupti odio eaque doloremque illum
                    saepe dolorem blanditiis quibusdam?"
                    BtnLink="#"
                    BtnLabel="Read More"
                />
                <Card
                    iconName="cart-full"
                    title="Web Development"
                    text="Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Aut harum impedit excepturi autem sunt earum quae, ea quo
                    fugit, voluptas beatae corrupti odio eaque doloremque illum
                    saepe dolorem blanditiis quibusdam?"
                    BtnLink="#"
                    BtnLabel="Read More"
                />
            </div>
            <div className="row second_parts">
                <div className="col-md-8 m-auto">
                    <h2>
                        Great result come from geat relationships
                        <span> . </span>
                    </h2>
                    <p>
                        " Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Aut harum impedit excepturi autem sunt earum quae,
                        ea quo fugit, voluptas beatae corrupti odio eaque
                        doloremque illum saepe dolorem blanditiis quibusdam?"
                    </p>

                    <BtnLinks
                        link={'#'}
                        label={'Commentaires'}
                        color={'primary'}
                        style={'me-4'}
                        variant={'outlined'}
                    />
                </div>
            </div>
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
