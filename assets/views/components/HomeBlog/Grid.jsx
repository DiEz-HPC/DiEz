import React from 'react';
import './grid.scss';

function Grid(props) {
    return (
        <div class={`grid${props.number}`}>
            <div className="picture">
                <div className="content">
                    <h4 className="title">{props.title}</h4>
                    <p className="description">{props.description}</p>
                </div>
                <img src={props.picture} alt="Image d'arcticle" />
            </div>
        </div>
    );
}

export default Grid;