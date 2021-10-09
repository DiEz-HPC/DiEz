import React from "react";
import '../../styles/home.scss'
import BtnLinks from "../components/buttons/links/BtnLinks";

function Home() {
    return (
        <div className={'home'}>
            <h1>DiEz <br/>Dev It Easy</h1>
            <div className="d-flex">
                <BtnLinks link={'/'} label={'Nos Projets'} style={'btnLink-outline'} />
                <BtnLinks link={'/'} label={'Contactez-nous'} style={'btnLink-black'} />
            </div>
        </div>
    )
}

export default Home;