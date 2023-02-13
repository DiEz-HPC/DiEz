import React from 'react';
import Button from '../buttons/links/BtnLinks';
const PrestationsCard = (props) => {
    const { icon, title, teaser, link } = props;
    return (
        <div
            className={'prestation-section__item col-12 col-md-6 col-xl-3 m-3'}
        >
            <div className={'prestation-section__item__icon'}>
                <i class={icon}></i>
            </div>
            <h3 className="prestation-section__item__title">
                {title.toUpperCase()}
            </h3>
            <p className="prestation-section__item__teaser">
                {teaser}
            </p>
            <Button
                link={link}
                label={'En savoir plus'}
                color={'white'}
                style={'prestation-button'}
                variant={'outlined'}
            />
        </div>
    );
};

export default PrestationsCard;