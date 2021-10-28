import React from 'react';
import BtnLinks from '../../buttons/links/BtnLinks';
import './cardStyle.scss';

function Card(props) {
    return (
        <div className="WWD_card col-10 m-auto">
            <div className="card_icon d-flex">
                <img src={props.icon} alt="icon" />
            </div>
            <div className="card_content">
                <h3 className="card_title">{props.title}</h3>
                <p className="card_text">{props.text}</p>
                <div className="d-flex">
                    <BtnLinks
                        link={props.BtnLink}
                        label={props.BtnLabel}
                        color={'white'}
                        style={'me-4'}
                        variant={'outlined'}
                    />
                </div>
            </div>
        </div>
    );
}
export default Card;
