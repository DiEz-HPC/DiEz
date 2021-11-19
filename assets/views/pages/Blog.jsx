import React, { useEffect, useState } from "react";
import FeedLine from "../components/feed/FeedLine";
import Layout from "../components/layout";
import CardBlog from "../components/CardBlog/CardBlog";
import { getLastPostByNumber } from "../../queries/posts";

function Blog() {
  const [actus, setActus] = useState([]);

  useEffect(async () => {
    const query = await getLastPostByNumber(5);
    const data = await query.json();
    setActus(data);
  }, []);

  return (
    <Layout>
      <div className={"blog"}>
        <FeedLine />
        <h1>blog</h1>
        <div className="container">
          {actus.map((actu, index) => {
            const date = new Date(
              actu?.createdAt?.timestamp * 1000
            ).toLocaleDateString("fr-FR", {
              year: "numeric",
              month: "long",
              day: "numeric",
            });

            return (
              <CardBlog
                key={index}
                {...actu}
                date={date}
              />
            );
          })}
        </div>
      </div>
    </Layout>
  );
}

export default Blog;
