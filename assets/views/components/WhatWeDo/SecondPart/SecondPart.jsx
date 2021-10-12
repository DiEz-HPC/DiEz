import React from 'react';
import BtnLinks from '../../buttons/links/BtnLinks';
import './SecondPart.scss'
function SecondParts() {
    return (
        <div className="row second_parts">
            <div className="col-md-8 m-auto">
                <h2>
                    Great result come from geat relationships
                    <span> . </span>
                </h2>
                <div className="review">
                    <p className="text_review">
                        " Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Aut harum impedit excepturi autem sunt earum quae,
                        ea quo fugit, voluptas beatae corrupti odio eaque
                        doloremque illum saepe dolorem blanditiis quibusdam?"
                    </p>
                    <p className="author">Arthur Moreau</p>
                    <p className="author_info"> Little Society </p>
                    <BtnLinks
                        link={'#'}
                        label={'Commentaires'}
                        color={'primary'}
                        style={'me-4'}
                        variant={'outlined'}
                    />
                </div>
            </div>
        </div>
    );
}

export default SecondParts;
