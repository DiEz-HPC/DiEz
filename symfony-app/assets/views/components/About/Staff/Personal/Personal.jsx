import React from 'react';
import './Personal.scss';
import {imageUploadUrl} from "../../../../../tools/image";

function Personal(props) {
    const { index, render, profile, email } = props;
    return (
        <>
            <div className={`text-box ${index === 0 ? 'text-on' : 'text-off'}`}>
                <div className="d-flex flex-column-reverse h-100">
                    <div className="d-flex justify-content-between">
                        <div className="d-flex flex-column-reverse mb-2 staff-info">
                            <p className="px-3 m-0 staff-status">{profile.Status}</p>
                            <p className="px-3 m-0 staff-name">
                                {profile.firstName} {profile.lastName}
                            </p>
                        </div>
                        <div className="mb-2 staff-social">
                            <ul className="m-0 list-unstyled px-4">
                                <li>
                                    <a href={profile.linkedin} target="_blank">
                                        <i className="fab fa-linkedin"/>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href={`mailto:${email}`}
                                        target="_blank"
                                    >
                                        <i className="fas fa-envelope-square"/>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div className="img-box"
                onMouseEnter={() => {
                    render(index);
                }}
                onTouchStart={() => {
                    render(index);
                }}
            >
                <img className={`image de ${profile.firstname}`} src={imageUploadUrl(profile.imageName)} alt="" loading="lazy" />
            </div>
        </>
    );
}

export default Personal;
