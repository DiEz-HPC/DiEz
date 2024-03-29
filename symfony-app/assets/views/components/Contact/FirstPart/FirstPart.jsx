import React from "react";
import support from "../../../../images/support.svg";
import "./FirstPart.scss";
import Dot from "../../dot/Dot";

function FirstPart() {
    return (
        <>
            <div className="contact-first-part d-flex flex-column-reverse flex-xl-row justify-content-center">
                <div
                    className="contact-first-part-text col-12 d-flex flex-column align-items-center justify-content-center col-xl-5 my-4 align-items-xl-start">
                    <h2 className="h1 text-md-center text-xl-start mt-4 ps-xl-4 ms-xl-1" data-aos="fade-down">Informations<Dot
                        color="#56C6FF"/>
                    </h2>
                    <div className="d-flex flex-column justify-content-md-center flex-md-row flex-xl-column">
                        <div
                            className="contact-describe text-center mx-auto mx-md-1 mt-2 p-4 col-12 col-md-5 col-xl-10 text-md-start" data-aos="fade-right">
                            <h3 className="my-2">Nous concernant</h3>
                            <p>
                                <span className={'highlight'}>Deviteasy</span> est une équipe composée de trois <span className={'highlight'}>développeurs passionnés</span> par les nouvelles
                                technologies.
                                <br/>
                                Nous sommes à votre entière disposition pour discuter de vos différents projets.
                                <br/>
                                Toute notre équipe se mobilise pour <span className={'highlight'}>échanger avec vous</span> et vous apporter une réponse
                                sur mesure et adaptée.
                                <br/>
                                N'hésitez plus et <span className={'highlight'}>contactez-nous</span> pour que nous transformions ensemble votre projet en réalité.
                            </p>
                        </div>
                        <div className="contact-info col-8 col-md-4 col-xl-5 mx-auto mx-md-1 p-4 mt-2">
                            <h3 className="text-center text-md-start my-2">Deviteasy</h3>
                            <div className="contact-info-item text-center text-md-start" data-aos="fade-right">
                                <ul>
                                    <li className="d-flex justify-content-center justify-content-md-start me-1">
                                        <i className="icon-contact fas fa-map-marker-alt mt-1 me-2 fw-bold"/>
                                        <p>45000 Orléans, Loiret</p>
                                    </li>
                                    <li className="d-flex justify-content-center justify-content-md-start me-1">
                                        <i className="icon-contact fas fa-phone-alt mt-1 me-2 fw-bold"/>
                                        <p>06.08.61.30.88</p>
                                    </li>
                                    <li className="d-flex justify-content-center justify-content-md-start me-1">
                                        <i className="icon-contact fas fa-envelope mt-1 me-2 fw-bold"/>
                                        <p>contact@deviteasy.fr</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="contact-image col-10 col-md-6 col-xl-5 mx-auto mx-xl-0" data-aos="fade-left">
                    <img className="w-100" src={support} alt="support" loading="lazy"/>
                </div>
            </div>
        </>
    )
        ;
}

export default FirstPart;
