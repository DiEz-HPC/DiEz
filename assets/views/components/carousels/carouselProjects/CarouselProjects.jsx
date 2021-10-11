import React, {useState} from "react";
import './carouselProjects.scss';
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {
    faLongArrowAltLeft,
    faLongArrowAltRight
} from "@fortawesome/free-solid-svg-icons";
import BtnLinks from "../../buttons/links/BtnLinks";

function CarouselProjects() {
    const goutte = require('../../../../images/logo_goutte.png');
    const projects = [
        {
            name: 'JobPermut',
            description: 'The project of la mort qui tue',
            imageFull: 'src',
            imageMobile: 'src'
        },
        {
            name: 'Fiverr Helper',
            description: 'The first hackathon for ever',
            imageFull: 'src',
            imageMobile: 'src'
        }
    ];
    const [project, setProject] = useState(projects[0] ?? '')

    return (
        <div className={'carouselProjects mb-5 col-2'}>
            <img className={'goutte'} src={goutte} alt="goutte d'eau avec logo"/>
            <div className="blocPiloting">
                <h2>{project.name}</h2>
                <p>{project.description}</p>
                <BtnLinks link={'#'} label={'Voir le projet'} color={'white'} variant={'outlined'} />
                <div className="pagination d-flex">
                    <FontAwesomeIcon className={'me-5'} onClick={() => setProject(projects[0])} size={'3x'} icon={faLongArrowAltLeft} />
                    <FontAwesomeIcon onClick={() => setProject(projects[1])} size={'3x'} icon={faLongArrowAltRight} />
                </div>
            </div>
        </div>
    );
}

export default CarouselProjects