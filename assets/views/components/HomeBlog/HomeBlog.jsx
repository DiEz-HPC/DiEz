import React from 'react';
import './homeBlog.scss';
import Grid from './Grid';
import Dot from '../dot/Dot';

function HomeBlog() {
    const actu = {
        title: 'Actualité',
        description:
            'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque odit quasi quisquam ut harum labore, facilis, recusandae saepe laborum nesciunt non sed mollitia impedit perspiciatis. Illo voluptatem labore similique reprehenderit!',
        picture:
            'https://source.unsplash.com/1600x900/?php',
        picture2:
            'https://source.unsplash.com/1600x900/?laptop',
        picture3:
            'https://source.unsplash.com/1600x900/?freelance',
        picture4:
            'https://source.unsplash.com/1600x900/?computer',
        picture5:
            'https://source.unsplash.com/1600x900/?web',
        picture6:
            'https://source.unsplash.com/1600x900/?webdev'
    };

    return (
        <div className="home-blog">
            <h2 className="text-center"> Nos dernières actualités <Dot/></h2>
            <div class="parent m-auto">
                <Grid number={1} title={actu.title} description={actu.description} picture={actu.picture} />
                <Grid number={2} title={actu.title} description={actu.description} picture={actu.picture2} />
                <Grid number={3} title={actu.title} description={actu.description} picture={actu.picture3} />
                <Grid number={4} title={actu.title} description={actu.description} picture={actu.picture4} />
                <Grid number={5} title={actu.title} description={actu.description} picture={actu.picture5} />
                <Grid number={6} title={actu.title} description={actu.description} picture={actu.picture6} />
            </div>
        </div>
    );
}
export default HomeBlog;
