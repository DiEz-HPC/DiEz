import React, {useEffect, useState} from "react";
import './carouselProjects.scss';
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {
    faLongArrowAltLeft,
    faLongArrowAltRight
} from "@fortawesome/free-solid-svg-icons";
import BtnLinks from "../../buttons/links/BtnLinks";
import {getAllProjects} from "../../../../queries/projects";
import goutte from "../../../../images/logo_goutte.png";

function CarouselProjects() {
    const [projects, setProjects] = useState([])
    useEffect(async () =>{
        const query = await getAllProjects;
        const response = await query.json();
        setProjects(response);
    }, [])

    const [project, setProject] = useState([])
    useEffect(async () => {
        await setProject(projects[0])
    }, [projects])

    const [paginate, setPaginate] = useState(0)
    useEffect(() => {
        setProject(projects[paginate])
    }, [paginate])

    function navigationProject (move) {
        const projectNumber = projects.length
        switch (move){
            case 'backward':
                if (paginate > 0) {
                    setPaginate(paginate - 1)
                }
                break;
            case 'forward':
                if (paginate < projectNumber - 1) {
                    setPaginate(paginate + 1)
                }
                break;
            default:
                break;
        }

    }

    return (
        <div className={'carouselProjects d-flex flex-row align-items-center mb-5 col-12'}>
            <div className="blocPiloting col-2 ms-5">
                <img className={'goutte'} src={goutte} alt="goutte d'eau avec logo"/>
                <h2>{project?.name}</h2>
                <p>{project?.description}</p>
                <BtnLinks link={'#'} label={'Voir le projet'} color={'white'} variant={'outlined'} />
                <div className="pagination d-flex">
                    <FontAwesomeIcon className={'me-5'} onClick={() => navigationProject('backward')} size={'3x'} icon={faLongArrowAltLeft} />
                    <FontAwesomeIcon onClick={() => navigationProject('forward')} size={'3x'} icon={faLongArrowAltRight} />
                </div>
            </div>
            <div className="blocImages">
                <img src="" alt=""/>
                <img src="" alt=""/>
            </div>
        </div>
    );
}

export default CarouselProjects