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
import IphoneX from "../../edevices/iphoneX/IphoneX";
import MacbookPro from "../../edevices/macbookPro/MacbookPro";
import {imageUrl} from "../../../../tools/image";

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

    const [image, setImage] = useState(['test.jpg']);
    useEffect(() =>{
        setImage(project?.imageName)
    }, [project])

    const [paginate, setPaginate] = useState(0)
    useEffect(async () => {
        await setProject(projects[paginate])
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
        <div id={'projects'} className={'carouselProjects d-flex flex-row align-items-center ms-5 mb-5 col-12'}>
            <div className="blocPiloting col-2">
                <img className={'goutte'} src={goutte} alt="goutte d'eau avec logo"/>
                <h2>{project?.name}</h2>
                <p>{project?.description}</p>
                <div className="command d-flex flex flex-column">
                    <BtnLinks link={`/projects/${project?.name}`} label={'Voir le projet'} color={'white'} variant={'outlined'} />
                    <div className="pagination d-flex justify-content-between">
                        <FontAwesomeIcon onClick={() => navigationProject('backward')} size={'3x'} icon={faLongArrowAltLeft} />
                        <FontAwesomeIcon onClick={() => navigationProject('forward')} size={'3x'} icon={faLongArrowAltRight} />
                    </div>
                </div>

            </div>
            <div className="blocImages d-flex">
                <IphoneX image={imageUrl(image)} alt={''} scale={100} />
                <MacbookPro image={imageUrl(image)} alt={''} scale={100} />
            </div>
        </div>
    );
}

export default CarouselProjects