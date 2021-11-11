import React from "react";
import Social from "../components/Social/Social";
import Navbar from "../components/navbar/Navbar";
import Footer from "../components/footer/Footer";
import FirstPart from "../components/About/First-Part/FirstPart";
import FourthPart from "../components/About/Fourth-Part/FourthPart";
import Skill from "../components/About/Skill/Skill";
import Staff from "../components/About/Staff/Staff";

function About() {
  return (
    <div className={"about"}>
      <Navbar />
      <Social />
      <section className={"about-first-part"}>
        <FirstPart />
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
      <section className={"about-third-part"}>
        <Staff />
      </section>
      <section className={"about-fourth-part"}>
        <FourthPart image="https://www.informatiquenews.fr/wp-content/uploads/2014/05/php-web-development.png" />
      </section>
      <Footer />
    </div>
  );
}

export default About;
