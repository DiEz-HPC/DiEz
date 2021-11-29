import React from 'react';
import './Skill.scss';

function SecondPart(props) {
    const {img, title, list} = props;
    return (
        <div className="second-part">
            <div className="container">
                <div className={`row d-flex flex-row${props.reverse}`}>
                    <div className="col-md-6">
                        <img
                            src={img}
                            alt="Snow"
                        />
                    </div>
                    <div className={`col-md-6 d-flex justify-content-center align-items-center ${props.textSide}`}>
                        <div>
                            <h3 className={'text-center'}>{props.title}</h3>
                            <ul>
                                {list?.map((item, index) => {
                                        return (
                                            <li key={index}>{item}</li>
                                        )
                                    }
                                )}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default SecondPart;
