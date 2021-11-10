import React, { useEffect, useState } from 'react';
import Personal from './Personal/Personal';
import './Staff.scss';

function Staff() {
    const [personals, setPersonals] = useState([]);
    useEffect(async () => {
        const query = await fetch('api/v2/users', {
            method: 'POST',
            header: {
                'Content-Type': 'application/json',
            },
        });
        const response = await query.json();
        const shuffled = response.sort(() => 0.5 - Math.random());
        setPersonals(shuffled);
    }, []);

    function isMobile() {
        if (window.innerWidth < 768) {
            return true;
        }
        return false;
    }

    function renderPersonals(id) {
        if (!isMobile()) {
            const allPersonal = document.getElementsByClassName('text-box');
            const AllPersonalArray = [...allPersonal];
            AllPersonalArray.forEach((personal, index) => {
                if (index !== id) {
                    if (personal.classList.contains('text-on')) {
                        personal.classList.remove('text-on');
                    }
                    personal.classList.add('text-off');
                } else {
                    personal.classList.add('text-on');
                    personal.classList.remove('text-off');
                }
            });
        }
    }
    

    return (
        <div className="staff">
            <div className="row">
                <div className="d-flex flex-column flex-lg-row justify-content-end">
                    {personals.map((personal, index) => (
                        <Personal
                            key={index}
                            {...personal}
                            index={index}
                            render={renderPersonals}
                        />
                    ))}
                </div>
            </div>
        </div>
    );
}

export default Staff;
