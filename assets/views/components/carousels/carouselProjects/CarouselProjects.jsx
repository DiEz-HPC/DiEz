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
    useEffect(async () => {
        const query = await getAllProjects;
        const response = await query.json();
        setProjects(response);
    }, [])

    const [project, setProject] = useState([])
    useEffect(async () => {
        await setProject(projects[0])
    }, [projects])

    const [image, setImage] = useState(['test.jpg']);
    useEffect(() => {
        setImage(project?.imageName)
    }, [project])

    const [paginate, setPaginate] = useState(0)
    useEffect(async () => {
        await setProject(projects[paginate])
    }, [paginate])

    function navigationProject(move) {
        const projectNumber = projects.length
        switch (move) {
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
        <div id={'projects'} className={'carouselProjects d-flex flex-column flex-lg-row align-items-center mb-5 col-12'}>
            <div className="blocImages d-flex justify-content-center mb-5 mt-5 col-12 col-lg-2">
                <div className="element1 mt-5 mt-sm-0">
                    <MacbookPro image={imageUrl(image)} alt={''} scale={100}/>
                </div>
                <div className="element2">
                    <IphoneX image={imageUrl(image)} alt={''} scale={100}/>
                </div>
            </div>
            <div className="blocPiloting d-flex flex-column align-items-center col-12 col-md-4 px-5 px-sm-0 mt-5">
                <div className={'block-title'}>
                    <img className={'goutte'} src={goutte} alt="goutte d'eau avec logo"/>
                    <h3 className={'mb-3'}>{project?.name}</h3>
                </div>
                <div className="block-description d-flex align-items-center">
                    <p>{project?.description}</p>
                </div>
                <div className="command d-flex flex flex-column">
                    <div className="col-6">
                        <BtnLinks link={`/projects/${project?.name}`} label={'Voir le projet'} color={'white'}
                                  variant={'outlined'}/>
                    </div>
                    <div className="pagination d-flex justify-content-between col-12">
                        <FontAwesomeIcon onClick={() => navigationProject('backward')} size={'4x'}
                                         icon={faLongArrowAltLeft}/>
                        <FontAwesomeIcon onClick={() => navigationProject('forward')} size={'4x'}
                                         icon={faLongArrowAltRight}/>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default CarouselProjects