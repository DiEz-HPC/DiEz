import React from "react";
import '../../styles/home.scss'
import Description from "../components/description/Description";
import Social from "../components/Social/Social";
import CarouselProjects from "../components/carousels/carouselProjects/CarouselProjects";
import Footer from '../components/footer/Footer';
import wave from '../../images/wave.svg';
import HomeBlog from '../components/HomeBlog/HomeBlog';
import WhatWeDo from "../components/WhatWeDo/Whatwedo";

function Home() {
    return (
        <div className={'home'}>
            <Social />
            <section className="first-view">
                <Description />
            </section>
            <section className={'carousel-projects col-12'}>
                <img className={'wave'} src={wave} alt="wave"/>
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
