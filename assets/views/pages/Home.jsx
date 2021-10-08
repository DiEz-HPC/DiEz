import React from "react";
import '../../styles/home.scss'
import Social from "../components/Social/Social";

function Home() {
    return (
        <div className={'home'}>
            <h1>DiEz <br/>Dev It Easy</h1>
            <Social/>
        </div>
    )
}

export default Home;