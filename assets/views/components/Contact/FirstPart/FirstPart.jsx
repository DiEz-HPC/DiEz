import React from "react";
import support from "../../../../images/support.png";
import "./FirstPart.scss";
import Dot from "../../dot/Dot";

function FirstPart() {
  return (
    <>
      <div className="contact-first-part d-flex flex-column-reverse flex-xl-row justify-content-center">
        <div className="contact-first-part-text col-12 d-flex flex-column align-items-center justify-content-center col-xl-5 my-4 align-items-xl-start">
          <h2 className="h1 text-md-center text-xl-start mt-4 ps-xl-4 ms-xl-1">Informations<Dot color="#56C6FF"/></h2>
          <div className="d-flex flex-column justify-content-md-center flex-md-row flex-xl-column">
            <div className="contact-describe text-center mx-auto mx-md-1 mt-2 p-4 col-12 col-md-5 col-xl-10 text-md-start">
              <h3 className="my-2">Nous concernant</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Distinctio aut corrupti nobis totam rem repellendus atque ipsa
                molestiae molestias optio omnis culpa corporis a eius, odio
                dicta. Rem, maiores aspernatur!
              </p>
            </div>

            <div className="contact-info col-8 col-md-4 col-xl-5 mx-auto mx-md-1 p-4 mt-2">
              <h3 className="text-center text-md-start my-2">Deviteasy</h3>
              <div className="contact-info-item text-center text-md-start">
                <ul>
                  <li className="d-flex justify-content-center justify-content-md-start me-1">
                    <i className="icon-contact fas fa-map-marker-alt mt-1 me-2 fw-bold"/>
                    <p>45160 Olivet, Loiret</p>
                  </li>
                  <li className="d-flex justify-content-center justify-content-md-start me-1">
                    <i className="icon-contact fas fa-phone-alt mt-1 me-2 fw-bold"/>
                    <p>06.99.99.99.99</p>
                  </li>
                  <li className="d-flex justify-content-center justify-content-md-start me-1">
                    <i className="icon-contact fas fa-envelope mt-1 me-2 fw-bold"/>
                    <p>contact@deviteasy.fr</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div className="contact-image col-10 col-md-6 col-xl-5 mx-auto mx-xl-0">
          <img className="w-100" src={support} alt="support" />
        </div>
      </div>
    </>
  );
}

export default FirstPart;
