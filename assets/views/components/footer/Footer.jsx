import React from 'react';
import './footer.scss';
import logo from '../../../images/logosvg.svg';
import Button from '../buttons/links/BtnLinks';

function Footer() {
    return (
        <footer className="footer">
            <div className="container">
                <div className="footer_header text-center">
                    <img src={logo} alt="logo" className="footer_logo" />
                    <h1 className="footer_title">
                        Vous souhaitez travailler avec nous <span>?</span>
                    </h1>
                    <h5>
                        Nous sommes à votre disposition pour vous accompagner
                        dans vos projets.
                    </h5>
                    <Button
                        link="#"
                        label="Nos projets"
                        color="primary"
                        variant="outlined"
                        style={'my-4'}
                    />
                    <Button
                        link="#"
                        label="Contactez-nous"
                        color="dark"
                        variant="contained"
                        style={'my-4'}
                    />
                </div>
            </div>
            <div className="footer_body container d-flex justify-content-between">
                <div className="col-md-2">
                    <h3 className="footer_section_title">DevItEasy</h3>
                    <p>45000 Orléans</p>
                    <p>Diez.HPC@gmail.com</p>
                </div>
                <div className="col-md-2">
                    <h3 className="footer_section_title">Nos services</h3>
                    <p>Création de site web</p>
                    <p>Thème Wordpress</p>
                    <p>Script sur mesure</p>
                </div>
                <div className="col-md-2">
                    <h3 className="footer_section_title">Qui sommes-nous</h3>
                    <p>
                        <a href=""> À propos de l'entreprise</a>
                    </p>
                    <p>
                        <a href="#">À propos de nous</a>
                    </p>
                </div>
                <div className="col-md-2">
                    <h3 className="footer_section_title">Contact</h3>
                    <p>
                        <a href="#">Blog</a>
                    </p>
                    <p>
                        <a href="#">Nous contacter</a>
                    </p>
                </div>
            </div>
            <div className="footer_copyright text-center">
                <p className="copyright">
                    © 2020 - Tous droits réservés - Dev It Easy
                </p>
            </div>
        </footer>
    );
}

export default Footer;
