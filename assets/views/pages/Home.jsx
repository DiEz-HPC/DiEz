import React from "react";
import '../../styles/home.scss'
import Description from "../components/description/Description";
import Social from "../components/Social/Social";
import CarouselProjects from "../components/carousels/carouselProjects/CarouselProjects";

function Home() {
    return (
        <div className={'home'}>
            <section className="first-view">
                <Description />
                <Social />
            </section>
            <section className={'carousel-projects d-flex justify-content-center'}>
                <CarouselProjects />
            </section>
        </div>
    )
}

export default Home;