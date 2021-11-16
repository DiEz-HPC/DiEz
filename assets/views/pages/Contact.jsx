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
          <img id={"wave"} className={"wave"} src={wave} alt="wave" />
          <div className="feedLineBox">
            
            <h2 className="pageTitle">
              Contact
              <Dot />
              <FeedLine title="contact" />
            </h2>
          </div>
        </div>
      </div>











      <Social />
      <section className={"contact_first_part"}>
        <FirstPart />
      </section>
      <hr className="hr-contact"></hr>

      <Footer />
    </div>
  );
}

export default Contact;
