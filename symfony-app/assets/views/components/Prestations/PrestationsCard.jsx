import React from 'react';
import Button from '../buttons/links/BtnLinks';
const PrestationsCard = (props) => {
    const { icon, title, intro, link } = props;
    return (
        <div
            className={
                'prestation-section__item col-10 col-md-5 col-xl-3 m-3 my-5'
            }
        >
            <div className={'prestation-section__item__icon'}>
                <i className={icon}></i>
                <h3 className="prestation-section__item__title">
                    {title.toUpperCase()}
                </h3>
            </div>

            <p className="prestation-section__item__teaser">{intro}</p>
            <Button
                link={link}
                label={'En savoir plus'}
                color={'dark'}
                style={'prestation-button'}
                variant={'outlined'}
            />
        </div>
    );
};

export default PrestationsCard;
