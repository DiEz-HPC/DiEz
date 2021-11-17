import React from "react";
import SecondPart from '../components/contact/SecondPart';
import Layout from '../components/layout';

function Contact() {
    return (
        <Layout>
            <div className={'contact'}>
                <h1>Contactez nous</h1>
                <SecondPart/>
            </div>
        </Layout>
    )
}

export default Contact;