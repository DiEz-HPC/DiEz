import React from 'react';
import Card from '../card/Card';
import CartLogo from '../../../../images/sac_icon.png'
import PcLogo from '../../../../images/pc_icon.png'
import CoffeeLogo from '../../../../images/cofee_icon.png'
function FirstPart() {
    return (
        <div className="first_part row mb-5 d-flex justify-content-around">
            <Card
                icon={PcLogo}
                title="Web Development"
                text="Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    Aut harum impedit excepturi autem sunt earum quae, ea quo
    fugit, voluptas beatae corrupti odio eaque doloremque illum
    saepe dolorem blanditiis quibusdam?"
                BtnLink="#"
                BtnLabel="Read More"
            />
            <Card
                icon={CartLogo}
                title="Web Development"
                text="Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    Aut harum impedit excepturi autem sunt earum quae, ea quo
    fugit, voluptas beatae corrupti odio eaque doloremque illum
    saepe dolorem blanditiis quibusdam?"
                BtnLink="#"
                BtnLabel="Read More"
            />
            <Card
                icon={CoffeeLogo}
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