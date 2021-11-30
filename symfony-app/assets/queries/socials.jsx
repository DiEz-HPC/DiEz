export const getAllSocials = fetch(
    '/api/v2/socials',
    {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            accept: 'application/json',
        },
    }
);