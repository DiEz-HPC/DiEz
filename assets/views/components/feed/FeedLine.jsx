import React, {useState, useEffect} from "react";
import {ucFirst} from "../../../tools/ucFirst";

function FeedLine() {

    const [feeds, setFeeds] = useState([]);
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
                        <span className={'ms-2 me-2'}>>></span>
                        <div className="feedline-item">
                            <a href={`/${feed}`}>{ucFirst(feed)}</a>
                        </div>
                    </div>
                )
            })}
        </div>
    )
}

export default FeedLine;