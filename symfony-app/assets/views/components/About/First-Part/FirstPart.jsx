import React from 'react';
import Dot from '../../dot/Dot';
import './FirstPart.scss';

function FirstPart() {
    return (
        <div className="first-part pt-5">
            <div className="container py-5">
                <div className="row d-flex justify-content-center pt-2">
                    <h2 className="text-start">
                        À propos de DevItEasy
                        <Dot />
                    </h2>
                    <div className="col-md-6">
                        <p>
                            DevItEasy est une plateforme de développement web et
                            mobile. Elle permet de créer des sites web et des
                            applications mobiles.
                        </p>
                    </div>
                    <div className="col-md-6">
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Architecto obcaecati itaque, dolores atque
                            similique nesciunt nemo tempore modi sequi voluptas
                            eaque deserunt pariatur quod culpa voluptatibus
                            molestiae? Nemo, delectus nobis!
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Architecto obcaecati itaque, dolores atque
                            similique nesciunt nemo tempore modi sequi voluptas
                            eaque deserunt pariatur quod culpa voluptatibus
                            molestiae? Nemo, delectus nobis!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    );
}
export default FirstPart;
