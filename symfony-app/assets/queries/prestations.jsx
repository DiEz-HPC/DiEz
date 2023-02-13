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