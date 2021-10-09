import React from "react";
import '../../styles/home.scss'
import BtnLinks from "../components/buttons/links/BtnLinks";

function Home() {
    return (
        <div className={'home'}>
            <h1>DiEz <br/>Dev It Easy</h1>
            <div className="d-flex">
                <div className="me-5">
                    <BtnLinks link={'/'} label={'View our work'} style={'btnLink-outlined-primary'} variant={'outlined'} />
                </div>
                <div className="me-5">
                    <BtnLinks link={'/'} label={'Contact Us'} style={'btnLink-contained-black'} variant={'contained'} />
                </div>
                <div className="me-5">
                    <BtnLinks link={'/'} label={'Get in touch'} style={'btnLink-contained-primary'} variant={'contained'} />
                </div>
                <BtnLinks link={'/'} label={'View Project'} style={'btnLink-outlined-white'} variant={'outlined'} />
            </div>
        </div>
    )
}

export default Home;