import React, {useEffect, useState} from "react";
import {getPost} from "../../queries/posts";
import FeedLine from "../components/feed/FeedLine";
import {imageUploadUrl} from "../../tools/image";
import '../../styles/single-blog.scss';
import wave from '../../images/wave.svg';
import {timeToRead} from "../../tools/timeToRead";
import {ucFirst} from "../../tools/ucFirst";

function SingleBlog() {
    const locations = window.location.pathname.split('/').filter(link => link !== '');
    const [post, setPost] = useState([])
    useEffect(async () => {
        const query = await getPost(locations[1]);
        const status = query.status;
        if (status === 404) {
            window.location.href = '/404';
        } else {
            const response = await query.json();
            setPost(response);
        }
    }, [])

    const [published, setPublished] = useState('');
    useEffect(() => {
        const date = new Date(post?.createdAt?.timestamp * 1000).toLocaleDateString('fr-FR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        setPublished(date);
    }, [post])

    return (
        <div className={'blog'}>
            <div className="header-blog">
                <div className="bg-blue d-flex flex-column justify-content-center py-3">
                    <div className="ms-sm-5 ps-sm-5">
                        <FeedLine {...post} />
                    </div>
                    <h1 className="ms-sm-5 ps-sm-5 text-light">{ucFirst(post.title)}</h1>
                    <p className="ms-sm-5 ps-sm-5 text-light">Publié le {published} | {post?.article ? timeToRead(post?.article) +' minutes de lecture' : '' }</p>
                </div>
                <img src={wave} className={'wave'} alt="vague"/>
            </div>
            <section className={'content pt-sm-5 mt-sm-2'}>
                <div className="block-content d-flex flex-column flex-sm-row-reverse justify-content-between ">
                    <img className={'col-12 col-sm-6 me-sm-5 pe-sm-5'} src={imageUploadUrl(post.imageName)} alt=""/>
                    <article className={'ms-sm-5 ps-sm-5 col-12 col-sm-5'}>
                        <div dangerouslySetInnerHTML={{__html: post.article}}/>
                    </article>
                </div>
            </section>
            <hr className={'my-5'} />
        </div>
    )
}

export default SingleBlog;