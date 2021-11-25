import React from 'react';
import './SecondPart.scss'
import CarouselTestimony from "../../carousels/carouselTestimony/CarouselTestimony";
import Dot from "../../dot/Dot";
function SecondParts() {

    return (
        <div className="second_parts background-blue py-5">
            <h3 className={'h2 whatwedo_title mb-5'}>Témoignages<Dot color={"white"}/></h3>
            <div className="col-11 col-md-8 m-auto">
                <CarouselTestimony/>
            </div>
        </div>
    );
}

export default SecondParts;
