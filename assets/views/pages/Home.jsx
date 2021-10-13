import React from "react";
import "../../styles/home.scss";
import Description from "../components/description/Description";
import Social from "../components/Social/Social";
import Navbar from "../components/navbar/Navbar";

function Home() {
  return (
    <div className={"home"}>
      <section className="first-view">
        <Navbar />
        <Description />
        <Social />
      </section>
      <section className={"carousel-projects"}>
        <h2>Nos projets</h2>
      </section>
    </div>
  );
}

export default Home;
