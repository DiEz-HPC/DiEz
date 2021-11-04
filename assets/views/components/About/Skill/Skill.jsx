import React from 'react';
import './Skill.scss';

function SecondPart(props) {
    
    return (
        <div className="second-part">
            <div className="container">
                <div className={`row d-flex flex-row${props.reverse}`}>
                    <div className="col-md-6">
                        <img
                            src={props.img}
                            alt="Snow"
                        />
                    </div>
                    <div className={`col-md-6 d-flex justify-content-center align-items-center ${props.textSide}`}>
                        <div>
                            <h3>{props.title}</h3>
                            <ul>
                                <li>
                                    <span>Custom website Developement</span>
                                </li>
                                <li>User Experience Design / Ux</li>
                                <li> Website performance optimization</li>
                                <li>Technical SEO optimisation</li>
                                <li>API integration</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default SecondPart;
