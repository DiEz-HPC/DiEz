import React from "react";
import '../../styles/home.scss'
import Description from "../components/description/Description";
import Social from "../components/Social/Social";
import CarouselProjects from "../components/carousels/carouselProjects/CarouselProjects";
import Footer from '../components/footer/Footer';
import wave from '../../images/wave.svg'

function Home() {
    return (
        <div className={'home'}>
            <Social />
            <section className="first-view">
                <Description />
            </section>
            <section className={'carousel-projects'}>
                <img className={'wave'} src={wave} alt="wave"/>
                <CarouselProjects />
            </section>
            <Footer />
        </div>
    )
}

export default Home;