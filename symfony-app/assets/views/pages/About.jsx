import React from "react";
import FirstPart from "../components/About/First-Part/FirstPart";
import FourthPart from "../components/About/Fourth-Part/FourthPart";
import Skill from "../components/About/Skill/Skill";
import Staff from "../components/About/Staff/Staff";
import Layout from "../components/Layout/Layout"

function About() {
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
                            img={
                                "https://www.informatiquenews.fr/wp-content/uploads/2014/05/php-web-development.png"
                            }
                            title={"Web design & developement"}
                            textSide={"text-right"}
                        />
                        <Skill
                            img={"https://www.50a.fr/img/upload/react.png"}
                            title={"Web design & developement"}
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
