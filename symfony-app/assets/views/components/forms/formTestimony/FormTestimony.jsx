import React, {useState} from 'react';
import BtnLinks from "../../buttons/links/BtnLinks";
import {postTesitimony} from "../../../../queries/testimony";
import './formTestimony.scss';

function FormTestimony(props) {
    const {display, success, cancel} = props;

    const formEmpty = {
        lastName: '',
        firstName: '',
        company: '',
        comment: ''
    };

    const [form, setForm] = useState(formEmpty);

    const [errors, setErrors] = useState({});
    function alertErrors(field) {
        return field.map((error, index) => {
            return (
                <div key={index} className="alert alert-danger bg-transparent border-0 p-0 m-0" role="alert">
                    {error}
                </div>
            );
        });
    }

    const sendFormulae = async (e) => {
        e.preventDefault();
        const query = await postTesitimony(form)
        const status = query.status;
        const response = await query.json();

        if (status !== 201) {
            setErrors(response.errors);
            success("");
        } else {
            setErrors({});
            success(response);
            setForm(formEmpty);
            disableFormulae(e)
        }
    }

    const disableFormulae = (e) => {
        e.preventDefault();
        display('disable');
        setErrors({});
        setForm(formEmpty);
        cancel();
    }

    return (
        <>
            <form className={'testimony'}>
                <div className="mb-3 col-12">
                    <label htmlFor="inputLastName" className="form-label">Nom<span className={'text-light fw-bold'}> *</span></label>
                    <input
                        type="text"
                        className="form-control opacity-50"
                        id="lastname"
                        aria-describedby="lastname"
                        value={form.lastName}
                        onChange={(e) => setForm({...form, lastName: e.target.value})}
                    />
                    {errors?.lastName ? alertErrors(errors.lastName) : ""}
                </div>
                <div className="mb-3 col-12">
                    <label htmlFor="inputfirstName" className="form-label">Prénom<span className={'text-light fw-bold'}> *</span></label>
                    <input
                        type="text"
                        className="form-control opacity-50"
                        id="firstname"
                        aria-describedby="firstname"
                        value={form.firstName}
                        onChange={(e) => setForm({...form, firstName: e.target.value})}
                    />
                    {errors?.firstName ? alertErrors(errors.firstName) : ""}
                </div>
                <div className="mb-3 col-12">
                    <label htmlFor="inputfirstName" className="form-label">Société</label>
                    <input
                        type="text"
                        className="form-control opacity-50"
                        id="company"
                        aria-describedby="company"
                        value={form.company}
                        onChange={(e) => setForm({...form, company: e.target.value})}
                    />
                    {errors?.company ? alertErrors(errors.company) : ""}
                </div>
                <div className="mb-3 col-12">
                    <label htmlFor="floatingTextarea" className={'form-label'}>Témoignages<span className={'text-light fw-bold'}> *</span></label>
                    <textarea
                        className="form-control opacity-50"
                        placeholder="Tapez votre témoignage ici"
                        id="floatingTextarea"
                        value={form.comment}
                        onChange={(e) => setForm({...form, comment: e.target.value})}
                    />
                    {errors?.comment ? alertErrors(errors.comment) : ""}
                </div>
                <span className={'text-light fw-bold'}>* Requis</span>
                <div className="btnsForm d-flex flex-column flex-lg-row align-items-center justify-content-center">
                    <div className={'btnStop d-flex align-items-center me-lg-2'} onClick={e => disableFormulae(e)}>
                        <BtnLinks
                            link={'#'}
                            label={'Annuler'}
                            color={'dark'}
                            style={'mt-4 mt-lg-5'}
                            variant={'contained'}
                        />
                    </div>
                    <div className={'btnStop d-flex align-items-center'} onClick={e => sendFormulae(e)}>
                        <BtnLinks
                            link={'#'}
                            label={'Envoyer le témoignage'}
                            color={'primary'}
                            style={'mt-4 mt-lg-5'}
                            variant={'outlined'}
                        />
                    </div>
                </div>
            </form>
        </>
    )
}

export default FormTestimony;