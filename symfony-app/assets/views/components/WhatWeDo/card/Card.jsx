import React from 'react';
import BtnLinks from '../../buttons/links/BtnLinks';
import './cardStyle.scss';

function Card(props) {
    return (
        <div className="WWD_card col-10 col-md-12 m-auto" data-aos={props.aos} data-aos-duration={props.duration}>
            <div className="card_icon d-flex">
                <img src={props.icon} alt="icon" />
            </div>
            <div className="card_content">
                <h3 className="card_title">{props.title}</h3>
                <div className="card_text" dangerouslySetInnerHTML={{__html : props.text}}/> 
               
            </div>
                    <BtnLinks
                        link={props.BtnLink}
                        label={props.BtnLabel}
                        color={'white'}
                        style={'me-4 my-4'}
                        variant={'outlined'}
                    />
        </div>
    );
}
export default Card;
