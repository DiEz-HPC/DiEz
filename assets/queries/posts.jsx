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

export const getLastPostByNumber = (number) => fetch(
    `/api/v2/posts/last/${number}`,
    {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            accept: 'application/json',
        },
    }
);