export const getAllProjects = fetch(
    '/api/v2/projects',
    {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            accept: 'application/json',
        },
    }
);