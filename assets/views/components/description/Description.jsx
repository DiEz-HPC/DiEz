import React from "react";
import BtnLinks from "../buttons/links/BtnLinks";
import './description.scss';
import Dot from "../dot/Dot";

function Description() {

    const text = {
        description: 'Besoin d’une solution web pour votre entreprise? Dev It Easy est à votre écoute afin de vous proposer non pas «une» mais «votre solution». D’un site web à une demande personnalisée de script, nous étudierons avec vous l’ensemble de vos besoins pour vous apporter la concrétisation de vos idées.',
    }

    return (
        <div className={'description d-flex flex-column justify-content-center align-items-center'}>
            <h1 className={'text-center'}>UNE ÉQUIPE <br/> A VOTRE ECOUTE <Dot /></h1>
            <p className={'text-center col-7 text-light mb-4'}>{text.description}</p>
            <div className="d-flex flex-column justify-content-around flex-md-row align-items-center">
                <BtnLinks link={'/qui-sommes-nous'} label={'Qui sommes nous ?'} color={'primary'} style={'m-1'} variant={'outlined'} />
                <BtnLinks link={'/contact'} label={'Contactez-nous'} color={'dark'} style={'m-1'} variant={'contained'} />
            </div>
        </div>
    )
}

export default Description;