import React from "react";
import '../../styles/home.scss'
import BtnLinks from "../components/buttons/links/BtnLinks";

function Home() {
    return (
        <div className={'home'}>
            <h1>DiEz <br/>Dev It Easy</h1>
            <div className="d-flex">
                <BtnLinks link={'/'} label={'View our work'} color={'primary'} variant={'outlined'} />
                <BtnLinks link={'/'} label={'Contact Us'} color={'dark'} variant={'contained'} />
                <BtnLinks link={'/'} label={'Get in touch'} color={'primary'} variant={'contained'} />
                <BtnLinks link={'/'} label={'View Project'} color={'white'} variant={'outlined'} />
                <BtnLinks link={'/'} label={'View all reviews'} color={'dark'} variant={'outlined'} />
            </div>
        </div>
    )
}

export default Home;