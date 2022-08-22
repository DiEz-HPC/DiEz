import React from 'react'
import './footer.scss'
import logo from '../../../images/deviteasy.webp'
import Button from '../buttons/links/BtnLinks'

function Footer() {
    const creationDate = 2021
    const currentYear = new Date().getFullYear()
    return (
        <footer className="footer background-blue">
            <div className="container">
                <div className="footer_header text-center">
                    <img src={logo} alt="logo" className="footer_logo" loading="lazy"/>
                    <h1 className="footer_title">
                        Vous souhaitez travailler avec nous <span>?</span>
                    </h1>
                    <h5>
                        Nous sommes à votre disposition pour vous accompagner dans vos
                        projets.
                    </h5>
                    <Button
                        link="/contact"
                        label="Contactez-nous"
                        color="dark"
                        variant="contained"
                        style={'my-4'}
                    />
                </div>
            </div>
            <div className="footer_body container d-flex justify-content-between">
                <div className="footer_body_section1 col-md-2">
                    <h3 className="footer_section_title">Deviteasy</h3>
                    <p>45000 Orléans</p>
                    <p>
                        <a
                            href="mailto:
                        contact@deviteasy.fr"
                        >
                            contact@deviteasy.fr
                        </a>
                    </p>
                </div>
                <div className="footer_body_section2 col-md-2">
                    <h3 className="footer_section_title">Nos services</h3>
                    <p>Création de site web</p>
                    <p>Thème Wordpress</p>
                    <p>Script sur mesure</p>
                </div>
                <div className="footer_body_section3 col-md-2">
                    <h3 className="footer_section_title">Qui sommes-nous</h3>
                    <p>
                        <a href="/qui-sommes-nous/#aboutCompany">
                            {' '}
                            À propos du collectif
                        </a>
                    </p>
                    <p>
                        <a href="/qui-sommes-nous/#aboutStaff">À propos de nous</a>
                    </p>
                </div>
                <div className="footer_body_section4 col-md-2">
                    <h3 className="footer_section_title">Contact</h3>
                    <p>
                        <a href="/blog">Blog</a>
                    </p>
                    <p>
                        <a href="/contact">Nous contacter</a>
                    </p>
                </div>
            </div>
            <div>

            </div>
            <div className="footer_copyright text-center">
                <p className="copyright">
                    © {creationDate}{' '}
                    {creationDate !== currentYear ? ' / ' + currentYear : ' '} - Tous
                    droits réservés - Dev It Easy
                </p>
            </div>
        </footer>
    )
}

export default Footer
