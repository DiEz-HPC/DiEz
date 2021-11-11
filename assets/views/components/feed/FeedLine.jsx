import React, {useState, useEffect} from "react";
import {ucFirst} from "../../../tools/ucFirst";
import './feedline.scss'

function FeedLine(props) {
    const [feeds, setFeeds] = useState([]);
    const {title} = props;
    useEffect(() => {
        const locations = window.location.pathname.split('/').filter(link => link !== '');
        setFeeds(locations);
    }, []);

    return (
        <div className="feedline d-flex">
            <a href="/">Accueil </a>
            {feeds.map((feed, index) => {
                return (
                    <div key={index} className={'d-flex'}>
                        <span className={'chevron ms-2 me-2'}>>></span>
                        <div className="feedline-item">
                            {index < feeds.length - 1 ? <a href={`/${feed}`}>{ucFirst(feed)}</a> : <span className={'last-feed'}>{ucFirst(title)}</span>}
                        </div>
                    </div>
                )
            })}
        </div>
    )
}

export default FeedLine;