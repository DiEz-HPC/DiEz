import React from 'react';
import LineIcon from 'react-lineicons';
import BtnLinks from '../../buttons/links/BtnLinks';
import './cardStyle.scss';

function Card(props) {
    return (
        <div className="WWD_card">
            <div className="card_icon">
                <LineIcon name={props.iconName} />
            </div>
            <div className="card_content">
                <h3 className="card_title">{props.title}</h3>
                <p className="card_text">{props.text}</p>
                <BtnLinks
                    link={props.BtnLink}
                    label={props.BtnLabel}
                    color={'white'}
                    style={'me-4'}
                    variant={'outlined'}
                />
            </div>
        </div>
    );
}
export default Card;
