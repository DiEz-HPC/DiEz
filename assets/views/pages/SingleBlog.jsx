import React, {useEffect, useState} from "react";
import {getPost} from "../../queries/posts";
import FeedLine from "../components/feed/FeedLine";
import parse from "html-react-parser";

function SingleBlog() {

    const [post, setPost] = useState([])
    useEffect(async () => {
        const query = await getPost('test-bidon');
        const response = await query.json();
        setPost(response);
    }, [])

    const [article, setArticle] = useState('')
    useEffect(() => {
    }, [post])

    console.log(post?.article)

    return (
        <div className={'blog'}>
            <FeedLine/>
            <h1>{post.title}</h1>
            {post.article ? parse(post.article) : ''}
        </div>
    )
}

export default SingleBlog;