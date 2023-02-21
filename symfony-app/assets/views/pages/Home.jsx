import React, { Suspense, useState, useEffect } from 'react';
import '../../styles/home.scss';
import pcFirst from '../../images/pc_first.webp';
import Layout from '../components/Layout/Layout';
import Prestations from '../components/Prestations/Prestations';
import { getAllPrestation } from '../../queries/prestations';

function Home() {
    const [prestations, setPrestations] = useState([]);
    useEffect(() => {
        getAllPrestation.then((response) => {
            response.json().then((data) => {
                setPrestations(data);
            });
        });
    }, []);
    const Description = React.lazy(() =>
        import('../components/description/Description')
    );
    const CarouselProjects = React.lazy(() =>
        import('../components/carousels/carouselProjects/CarouselProjects')
    );
    const HomeBlog = React.lazy(() =>
        import('../components/HomeBlog/HomeBlog')
    );
    const WhatWeDo = React.lazy(() =>
        import('../components/WhatWeDo/Whatwedo')
    );
    return (
        <Suspense fallback={<div>Chargement...</div>}>
            <Layout prestations={prestations}>
                <div className={'home'}>
                    <section className="first-view background-blue d-flex flex-column justify-content-between">
                        <div className={'image-pc'}>
                            <img
                                className={'pc'}
                                src={pcFirst}
                                alt="pc en arrière plan"
                            />
                        </div>
                        <Description />
                        <div className={'arrowBox text-center mb-3'}>
                            <a href="#projects">
                                {' '}
                                <i
                                    className="fas fa-angle-double-down arrow"
                                    id={'arrowIcon'}
                                />{' '}
                            </a>
                        </div>
                    </section>

                    <Prestations prestations={prestations} />
                    <section className={'carousel-projects'}>
                        <CarouselProjects />
                    </section>
                    <section className={'HomeBlog mt-md-5 pt-md-5'}>
                        <HomeBlog />
                    </section>
                    <section className={'what-we-do mt-md-5 pt-md-5'}>
                        <WhatWeDo />
                    </section>
                </div>
            </Layout>
        </Suspense>
    );
}

export default Home;
