import React from 'react';
import Card from '../card/Card';

function FirstPart() {
    return (
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
    );
}

export default FirstPart;