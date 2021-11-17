import React from 'react';
import '../../styles/home.scss';
import Description from '../components/description/Description';
import Social from '../components/Social/Social';
import Navbar from '../components/navbar/Navbar';
import CarouselProjects from '../components/carousels/carouselProjects/CarouselProjects';
import Footer from '../components/footer/Footer';
import wave from '../../images/wave.svg';
import pcFirst from '../../images/pc_first.png';
import HomeBlog from '../components/HomeBlog/HomeBlog';
import WhatWeDo from '../components/WhatWeDo/Whatwedo';
import Cursor from '../components/Cursor/Cursor';

function Home() {
    return (
        <div className={'home'}>
            <Cursor />
            <Navbar/>
            <Social/>
            <section className="first-view background-blue d-flex flex-column justify-content-between">
                <div className={'image-pc'}>
                    <img className={'pc'} src={pcFirst} alt="pc en arrière plan"/>
                </div>
                <Description/>
                <div className={'arrowBox text-center mb-3'}>
                    <i className="fas fa-angle-double-down arrow" id={'arrowIcon'}/>
                </div>
            </section>
            <section className={'carousel-projects'}>
                <img id={'wave'} className={'wave'} src={wave} alt="wave"/>
                <CarouselProjects/>
            </section>
            <section className={'HomeBlog mt-md-5 pt-md-5'}>
                <HomeBlog/>
            </section>
            <section className={'what-we-do mt-md-5 pt-md-5'}>
                <WhatWeDo/>
            </section>
            <Footer/>
        </div>
    );
}

export default Home;
