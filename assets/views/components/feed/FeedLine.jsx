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
                    <>
                        <span className={'ms-2 me-2'}>>></span>
                        <div key={index} className="feedline-item">
                            <a href={`/${feed}`}>{ucFirst(feed)}</a>
                        </div>
                    </>
                )
            })}
        </div>
    )
}

export default FeedLine;