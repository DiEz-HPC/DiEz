import React, { useEffect, useState } from 'react';
import Layout from '../components/Layout/Layout';
import wave from '../../images/wave.svg';
import FeedLine from '../components/feed/FeedLine';
import { getPrestationById } from '../../queries/prestations';
import "../../styles/single-prestation.scss";

const SinglePrestation = () => {
    const locations = window.location.pathname
        .split('/')
        .filter((link) => link !== '');

    const [prestation, setPrestation] = useState([]);

    useEffect(async () => {
        const query = await getPrestationById(locations[1]);
        const status = query.status;
        if (status === 404) {
            window.location.href = '/404';
        } else {
            const response = await query.json();
            setPrestation(response);
        }
    }, []);

    return (
        <Layout>
            <div className={'single-prestation'}>
                <div className="header-prestation">
                    <div className="bg-blue d-flex flex-column justify-content-center pt-5 ps-sm-4 ps-xl-5">
                        <div className="ms-xl-5 pt-5">
                            <div className="ms-2 my-2 ms-xl-5 ps-xl-5">
                                <FeedLine 
                                    title={prestation?.title}
                                />
                            </div>
                            <h1 className="ms-2 text-light ms-xl-5 ps-xl-5">
                                <i className={prestation.icon}></i>{' '}
                                {prestation?.title}
                            </h1>
                            <div className="mx-2 text-light d-flex mx-xl-5 px-xl-5">
                                <p className={'mt-2'}>{prestation.teaser}</p>
                            </div>
                        </div>
                    </div>
                    <img src={wave} className={'wave'} alt="vague" />
                </div>
                <section className="prestationContainer mb-5">
                    <div
                        dangerouslySetInnerHTML={{
                            __html: prestation?.content,
                        }}
                    />
                </section>
            </div>
        </Layout>
    );
};

export default SinglePrestation;
