import React, {useEffect, useState} from "react";
import {getPost} from "../../queries/posts";
import FeedLine from "../components/feed/FeedLine";

function SingleBlog() {

    const [post, setPost] = useState([])
    useEffect(async () => {
        const query = await getPost('test-bidon');
        const response = await query.json();
        setPost(response);
    }, [])

    return (
        <div className={'blog'}>
            <FeedLine/>
            <h1>{post.title}</h1>
        </div>
    )
}

export default SingleBlog;