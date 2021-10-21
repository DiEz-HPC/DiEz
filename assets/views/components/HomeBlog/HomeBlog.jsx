import React from 'react';
import './homeBlog.scss';
import Grid from './Grid';

function HomeBlog() {
    const actu = {
        title: 'Actualité',
        description:
            'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque odit quasi quisquam ut harum labore, facilis, recusandae saepe laborum nesciunt non sed mollitia impedit perspiciatis. Illo voluptatem labore similique reprehenderit!',
        picture:
            'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60',
    };

    return (
        <div className="home-blog">
            <div class="parent m-5">
                <Grid number={1} title={actu.title} description={actu.description} picture={actu.picture} />
                <Grid number={2} title={actu.title} description={actu.description} picture={actu.picture} />
                <Grid number={3} title={actu.title} description={actu.description} picture={actu.picture} />
                <Grid number={4} title={actu.title} description={actu.description} picture={actu.picture} />
                <Grid number={5} title={actu.title} description={actu.description} picture={actu.picture} />
                <Grid number={6} title={actu.title} description={actu.description} picture={actu.picture} />
            </div>
        </div>
    );
}
export default HomeBlog;
