import React from "react";
import '../../styles/home.scss'
import BtnLinks from "../components/buttons/links/BtnLinks";

function Home() {
    return (
        <div className={'home'}>
            <h1>DiEz <br/>Dev It Easy</h1>
            <BtnLinks link={'/'} label={'Accueil'} style={'btn btn-danger'} />
        </div>
    )
}

export default Home;