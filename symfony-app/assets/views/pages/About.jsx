import React from "react";
import FirstPart from "../components/About/First-Part/FirstPart";
import FourthPart from "../components/About/Fourth-Part/FourthPart";
import Skill from "../components/About/Skill/Skill";
import Staff from "../components/About/Staff/Staff";
import Layout from "../components/Layout/Layout"

function About() {
    const skillsData = {
        data1: {
            img: "https://www.informatiquenews.fr/wp-content/uploads/2014/05/php-web-development.png",
            title: "Web design & developement",
            list: [
                'Développement de site personnalisé',
                'Optimisation de l\'expérience utilisateur',
                'Optimisation du SEO',
                'Site web performant',
                'Création et déploiement d\'API',
            ]
        },
        data2: {
            img: "https://www.50a.fr/img/upload/react.png",
            title: "Technologies",
            list: [
                'HTML / CSS',
                'PHP > 7.4',
                'Framework SYMFONY > 5',
                'API REST / API Plateform',
                'React JS',
                'Wordpress',
                'Gatsby JS',
            ]
        }
    }

    return (
        <Layout>
            <div className={"about"}>
                <section className={"about-first-part"} id="aboutCompany">
                    <FirstPart/>
                </section>
                <section className={"about-second-part"}>
                    <div className="mb-4">
                        <Skill
                            reverse={"-reverse"}
                            {...skillsData.data1}
                            textSide={"text-right"}
                        />
                        <Skill
                            {...skillsData.data2}
                            textSide={"text-left"}
                        />
                    </div>
                </section>
                <section className={"about-third-part"} id="aboutStaff">
                    <Staff/>
                </section>
                <section className={"about-fourth-part"}>
                    <FourthPart
                        image="https://www.informatiquenews.fr/wp-content/uploads/2014/05/php-web-development.png"/>
                </section>
            </div>
        </Layout>
    );
}

export default About;
