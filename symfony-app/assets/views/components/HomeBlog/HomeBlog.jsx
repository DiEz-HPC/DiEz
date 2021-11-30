import React, {useEffect, useState} from 'react';
import './homeBlog.scss';
import Grid from './Grid';
import Dot from '../dot/Dot';
import {getLastPostByNumber} from "../../../queries/posts";

function HomeBlog() {
    const [actus, setActus] = useState([]);

    useEffect(async () => {
        let isMobile = window.matchMedia("only screen and (max-width: 768px )").matches;
        let number = isMobile ? 3 : 6;
        const query = await getLastPostByNumber(number);
        const data = await query.json();
        setActus(data);
    }, [])

    return (
        <div className="home-blog" id="HomeBlog">
            <h2 className="text-center mb-5 pb-5" data-aos="fade-up"> Nos dernières actualités <Dot/></h2>
            <div className="parent m-auto" data-grid={`${actus.length}`} data-aos="fade-up">
                {actus.map((actu, index) => {
                    const date = new Date(actu?.createdAt?.timestamp * 1000).toLocaleDateString('fr-FR', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    return (<Grid key={index} number={index + 1} title={actu.title} author={actu.author} image={actu.imageName} link={actu.slug} description={actu.article} date={date}/>)
                })}
            </div>
        </div>
    );
}

export default HomeBlog;
