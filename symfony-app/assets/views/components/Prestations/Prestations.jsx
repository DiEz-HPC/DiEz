import React, { useEffect, useState } from 'react';
import PrestationsCard from './PrestationsCard';
import './prestation.scss';
import wave from '../../../images/wave.svg';
import { getAllPrestation } from '../../../queries/prestations';
function Prestations() {
    const [prestations, setPrestations] = useState([]);
    useEffect(() => {
        getAllPrestation.then((response) => {
            response.json().then((data) => {
                setPrestations(data);
            });
        });
    }, []);

    return (
        <section className={'prestation-section row'}>
            <div className={'waveBox'}>
                <img id={'wave'} className={'wave'} src={wave} alt="wave" />
            </div>
            <div className={'prestationCardContainer row justify-content-around align-items-center'}>
            {prestations.map((prestation) => (
                <PrestationsCard
                    icon={prestation.icon}
                    title={prestation.title}
                    teaser={prestation.teaser}
                    link={'/prestations/' + prestation.title}
                />
            ))}
            </div>
        </section>
    );
}

export default Prestations;
