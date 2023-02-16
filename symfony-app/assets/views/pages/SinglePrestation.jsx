import React from "react";
import Layout from "../components/Layout/Layout";
import wave from "../../images/wave.svg";
import FeedLine from "../components/feed/FeedLine";

const SinglePrestation = ({ icon, title, teaser, link }) => {

    return (
        <Layout>
             <div className={"blog"}>
                <div className="header-blog mb-5">
                    <div className="bg-blue d-flex flex-column justify-content-center pt-5 ps-sm-4 ps-xl-5">
                        <div className="ms-xl-5 pt-5">
                            <div className="ms-2 my-2 ms-xl-5 ps-xl-5">
                                <FeedLine />
                            </div>
                                <h1 className="ms-2 text-light ms-xl-5 ps-xl-5">
                                    Développement web
                                </h1>  
                        </div>
                    </div>
                    <img src={wave} className={"wave"} alt="vague"/>
                </div>
                <section>


                </section>
            </div>  
        </Layout>
    )
}

export default SinglePrestation;