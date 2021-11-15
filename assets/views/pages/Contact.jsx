import React from "react";
import "../../styles/contact.scss";
import wave from "../../images/wave.svg";
import Navbar from "../components/navbar/Navbar";
import Social from "../components/Social/Social";
import FeedLine from "../components/feed/FeedLine";
import Dot from "../components/dot/Dot";
import SecondPart from "../components/Contact/SecondPart/SecondPart";
import FirstPart from "../components/Contact/FirstPart/FirstPart";
import Footer from '../components/footer/Footer';

function Contact() {
  return (
    <div className={"contact"}>
      <div className="header">
        <img id={"wave"} className={"wave"} src={wave} alt="wave" />
        <Navbar />
        <div className="feedLineBox">
          <FeedLine title="contact" />
          <h2 className="pageTitle mt-2">
            Contact
            <Dot />
          </h2>
        </div>
      </div>
      <Social />
      <section className={"contact_first_part"}>
        <FirstPart />
      </section>
      <hr className="hr-contact mt-5"></hr>
      <section className="contact_second_part">
        <SecondPart />
      </section>
      <Footer />
    </div>
  );
}

export default Contact;
