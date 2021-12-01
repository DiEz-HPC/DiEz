import React from 'react';
import Dot from '../../dot/Dot';
import './FirstPart.scss';


function FirstPart() {
    return (
        <div className="first-part pt-5">
            <div className="container py-5">
                <div className="row d-flex justify-content-center pt-2">
                    <h2 className="text-start">
                        À propos de DevItEasy
                        <Dot/>
                    </h2>
                    <div className="col-md-6">
                        <p>
                            DevItEasy est une société spécialisée dans le développement web et
                            web mobile. Elle a pour vocation de créer des sites web sur les différents supports
                            existants.
                        </p>
                    </div>
                    <div className="col-md-6">
                        <p>
                            DevItEasy est née de l'association de 3 développeurs web passionnés en nouvelles technologies.
                            L'objectif principal de DevItEasy est de rendre réel votre projet. Que ce soit un site vitrine, un site de e-commerce ou bien une application plus complexe (Intranet, Extranet, Web), nous saurons répondre à vos attentes. DevItEasy évolue en restant à la page des nouvelles technologies. Tous nos services évolueront avec le temps et les besoins de chacun.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default FirstPart;
