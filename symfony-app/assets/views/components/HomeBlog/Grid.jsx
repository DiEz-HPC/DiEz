import React from 'react';
import './grid.scss';
import {imageUploadUrl} from "../../../tools/image";

function Grid(props) {
    const {number, title, author, image, link, date} = props;
    return (
        <div className={`grid${number}`}>
            <a href={`/blog/${link}`}>
                <div className="picture d-flex justify-content-center">
                    <div className="content col-12">
                        <div className="grid_header d-flex flex-column justify-content-center content-container">
                            <h5 className="title text-center h5">{title}</h5>
                        </div>
                        <div className="grid_footer d-flex justify-content-between">
                            <p className="author">{author}</p>
                            <p className="date">{date}</p>
                        </div>
                    </div>
                    <img src={imageUploadUrl(image)} alt="Image d'arcticle"/>
                </div>
            </a>
        </div>
    );
}

export default Grid;