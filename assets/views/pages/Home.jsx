import React from 'react';
import '../../styles/home.scss';
import Description from '../components/description/Description';
import Social from '../components/Social/Social';
import Navbar from '../components/navbar/Navbar';
import CarouselProjects from '../components/carousels/carouselProjects/CarouselProjects';
import Footer from '../components/footer/Footer';
import wave from '../../images/wave.svg';
import HomeBlog from '../components/HomeBlog/HomeBlog';
import WhatWeDo from '../components/WhatWeDo/Whatwedo';

function Home() {
    return (
        <div className={'home'}>
            <Navbar />
            <Social />
            <section className="first-view background-blue d-flex flex-column justify-content-between">
                <Description />
                <div className={'arrowBox text-center mb-3'} >
                    <i class="fas fa-angle-double-down arrow" id={'arrowIcon'} />
                </div>
            </section>
            <section className={'carousel-projects'}>
                <img id={'wave'} className={'wave'} src={wave} alt="wave" />
                <CarouselProjects />
            </section>
            <section className={'HomeBlog'}>
                <HomeBlog />
            </section>
            <section className={'what-we-do'}>
                <WhatWeDo />
            </section>
            <Footer />
        </div>
    );
}

export default Home;
