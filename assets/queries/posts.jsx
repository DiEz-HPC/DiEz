export const getPost = (slug) => fetch(
    `/api/v2/posts/${slug}`,
    {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            accept: 'application/json',
        },
    }
);