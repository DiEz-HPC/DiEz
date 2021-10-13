import React from "react";
import BtnLinks from "../buttons/links/BtnLinks";
import './description.scss';
import Dot from "../dot/Dot";

function Description() {

    const text = {
        description: 'Besoin d’une solution web pour votre entreprise? Dev It Easy est à votre écoute afin de vous proposer non pas «une» mais «votre solution». D’un site à une demande personnalisée de script, nous étudierons avec vous l’ensemble de vos besoins pour vous apporter la concrétisation de vos idées.',
    }

    return (
        <div className={'description d-flex flex-column justify-content-center align-items-center'}>
            <h1 className={'text-center'}>UNE ÉQUIPE <br/> A VOTRE ECOUTE <Dot /></h1>
            <h5 className={'text-center col-7 text-light mb-4'}>{text.description}</h5>
            <div className="d-flex">
                <BtnLinks link={'#'} label={'Nos projets'} color={'primary'} style={'me-4'} variant={'outlined'} />
                <BtnLinks link={'#'} label={'Contactez-nous'} color={'dark'} variant={'contained'} />
            </div>
        </div>
    )
}

export default Description;