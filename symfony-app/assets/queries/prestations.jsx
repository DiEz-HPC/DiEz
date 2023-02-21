export const getAllPrestation = fetch(
    '/api/v2/prestation/all',
    {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            accept: 'application/json',
        },
    }
);

export const getPrestationById = (id) => {
    return fetch(`/api/v2/prestation/${id}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            accept: 'application/json',
        },
    });
}

export const getFooterPrestation = fetch(
    '/api/v2/prestation/footer',
    {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            accept: 'application/json',
        },
    }
);
