import React from "react";
import "../../styles/contact.scss";
import wave from "../../images/wave.svg";
import Navbar from "../components/navbar/Navbar";
import Social from "../components/Social/Social";
import FeedLine from "../components/feed/FeedLine";
import Dot from "../components/dot/Dot";
import SecondPart from "../components/Contact/SecondPart/SecondPart";
import FirstPart from "../components/Contact/FirstPart/FirstPart";
import Footer from "../components/footer/Footer";

function Contact() {
  return (
    <div className={"contact"}>
      <Navbar />
      <div className="header">
        <div className="bg-blue">
          <FeedLine title="contact" />
          <h1 className="pageTitle">
            Contact
            <Dot color="white"/>
          </h1>
        </div>
      </div>
      <div className="wave">
        <img id={"wave"} src={wave} alt="wave" />
      </div>
      <Social />
      <section className={"contact_first_part"}>
        <FirstPart />
      </section>
      <hr className="hr-contact text-center"/>
      <section className={"contact_second_part"}>
        <SecondPart />
      </section>
      <Footer />
    </div>
  );
}

export default Contact;
