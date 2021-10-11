import React from "react";
import '../../styles/home.scss'
import Description from "../components/description/Description";
import Social from "../components/Social/Social";
import CarouselProjects from "../components/carousels/carouselProjects/CarouselProjects";
import Footer from '../components/footer/Footer';

function Home() {
    return (
        <div className={'home'}>
            <Social />
            <section className="first-view">
                <Description />
            </section>
            <section className={'carousel-projects d-flex justify-content-center'}>
                <CarouselProjects />
            </section>
            <Footer />
        </div>
    )
}

export default Home;