import React from "react";
import FeedLine from "../components/feed/FeedLine";
import Layout from "../components/layout";

function Blog() {
    return (
        <Layout>
            <div className={'blog'}>
                <FeedLine/>
                <h1>blog</h1>
            </div>
        </Layout>
    )
}

export default Blog;