import React, {useEffect, useState} from 'react';
import {getAllTestimony} from "../../../../queries/testimony";
import BtnLinks from "../../buttons/links/BtnLinks";
import {Carousel} from "react-bootstrap";
import './carouselTestimony.scss';
import FormTestimony from "../../forms/formTestimony/FormTestimony";

function CarouselTestimony() {
    const [testimonies, setTestimonies] = useState([]);
    useEffect(async () => {
        const query = await getAllTestimony();
        setTestimonies(await query.json());
    }, []);

    const [formActive, setFormActive] = useState('disable');

    const formulae = (e) => {
        e.preventDefault();
        if (formActive === 'disable') {
            setFormActive('enable');
        } else {
            setFormActive('disable');
        }
    }

    const[success , setSuccess] = useState({});

    return (
        <>
            {success?.success ? (
                <div className="alert alert-success" role="alert">
                    {success.success}
                </div>
            ) : (
                ""
            )}
            <Carousel variant={'dark'} controls={false} indicators={false}>
                {testimonies.map((testimony, index) => {
                    return (
                        <Carousel.Item key={index}>
                            <Carousel.Caption>
                                <div className="review">
                                    <h4 className="">
                                        {testimony.comment}
                                    </h4>
                                    <br/>
                                    <p className="author">{testimony.fullName}</p>
                                    <p className="author_info">{testimony.company}</p>
                                </div>
                            </Carousel.Caption>
                        </Carousel.Item>
                    )
                })}
            </Carousel>
            <div className={`form ${formActive} d-flex flex-column align-items-center mt-5`}>
                <FormTestimony display={setFormActive} success={setSuccess}/>
            </div>
            <div className={`d-flex justify-content-center ustify-content-center justify-content-lg-end ${formActive === 'enable' ? 'd-none' : 'd-block'}`}>
                <div className="formButton d-flex" onClick={e => {
                    formulae(e);
                }}>
                    <BtnLinks
                        link={'#'}
                        label={'Laisser un témoignage'}
                        color={'dark'}
                        style={'mt-5'}
                        variant={'outlined'}
                    />
                </div>
            </div>
        </>
    )
}

export default CarouselTestimony;