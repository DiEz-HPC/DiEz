import React from "react";
import '../../styles/home.scss'
import Description from "../components/description/Description";
import Social from "../components/Social/Social";
import Footer from '../components/footer/Footer'

function Home() {
    return (
        <div className={'home'}>
            <Social />
            <section className="first-view">
                <Description />
            </section>
            <section className={'carousel-projects'}>
                <h2>Nos projets</h2>
            </section>
            <Footer />
        </div>
    )
}

export default Home;