import React from "react";
import support from "../../../../images/support.png";
import "./FirstPart.scss";

function FirstPart() {
  return (
    <>
      <div className="contact-first-part">
        <div className="contact-first-part-text">
          <div className="contact-describe">
            <h1>Information</h1>
            <h2>Nous concernant</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Distinctio aut corrupti nobis totam rem repellendus atque ipsa
              molestiae molestias optio omnis culpa corporis a eius, odio dicta.
              Rem, maiores aspernatur!
            </p>
          </div>

          <div className="contact-info">
          <h3>DEVITEASY</h3>
            <div className="contact-info-item">
              <ul>
                <li>
                  <i class="fas fa-map-marker-alt m-1"></i>
                  <p>45160 Olivet, Loiret</p>
                </li>
                <li>
                  <i class="fas fa-phone-alt m-1"></i>
                  <p>06.99.99.99.99</p>
                </li>
                <li>
                  <i class="fas fa-envelope m-1 "></i>
                  <p>nous.contactez@deviteasy.fr</p>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div className="contact-image">
          <img src={support} alt="mail"/>
        </div>
      </div>
    </>
  );
}

export default FirstPart;
