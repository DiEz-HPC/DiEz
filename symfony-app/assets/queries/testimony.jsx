export const getAllTestimony = () => fetch(
    `/api/v2/commentaires`,
    {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            accept: 'application/json',
        },
    }
);

export const postTesitimony = (testimony) => fetch(
    `/api/v2/commentaires`,
    {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            accept: 'application/json',
        },
        body: JSON.stringify(testimony),
    }
);