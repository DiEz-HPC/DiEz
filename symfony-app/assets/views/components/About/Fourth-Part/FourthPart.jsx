import React from 'react';
import TextBox from './Box/TextBox';
import './FourthPart.scss';

function FourthPart(props) {

    const boxContent = {
        title: "Votre projet n'attend plus que vous !",
        subtitle: "Pourquoi hésiter à vous lancer ?",
        text:"Plus aucune hésitation, DevItEasy vous accueillera et sera à votre écoute pour avancer avec vous. Notre équipe à taille humaine, simple et efficace saura vous accompagner dans la création de votre projet. Nos outils évolutifs et notre soif de connaissance placeront votre application au-devant de la concurrence. Venez vivre avec nous la création, le développement et la mise en route de votre application. Votre projet mérite le meilleur, nous saurons vous satisfaire."
    }

    return (
        <div className="fourth-part">
            <div className="fourth-part__outer__container">
                <div className="fourth-part__container">
                    <div className="fourth-part__text d-flex justify-content-center align-items-center">
                        <TextBox
                            title={boxContent.title}
                            subtitle={boxContent.subtitle}
                            text={boxContent.text}
                        />
                    </div>
                    <div className="fourth-part__image">
                        <img
                            src={props.image}
                            alt=""
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>
        </div>
    );
}
export default FourthPart;
