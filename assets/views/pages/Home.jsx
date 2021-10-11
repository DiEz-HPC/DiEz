import React from "react";
import '../../styles/home.scss'
import Description from "../components/description/Description";
import Social from "../components/Social/Social";

function Home() {
    return (
        <div className={'home'}>
            <Description />
            <Social />
        </div>
    )
}

export default Home;