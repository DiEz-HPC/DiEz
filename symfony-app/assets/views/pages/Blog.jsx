import React, { useEffect, useState } from "react";
import FeedLine from "../components/feed/FeedLine";
import Layout from "../components/Layout/Layout";
import CardBlog from "../components/CardBlog/CardBlog";
import Pagination from "../components/Pagination/Pagination";
import { getPosts } from "../../queries/posts";
import Dot from "../components/dot/Dot";
import wave from "../../images/wave.svg";
import "../../styles/blog.scss";

function Blog() {
  const [actus, setActus] = useState([]);
  const [page, setPage] = useState(1);

  useEffect(async () => {
    const query = await getPosts();
    const data = await query.json();
    setActus(data);
  }, []);

  const [articleLimit, setArticleLimit] = useState(6);
  const [articleNumber, setArticleNumber] = useState(0);
  const [articles, setArticles] = useState([]);

  useEffect(() => {
    setArticleNumber(actus.length); // set the number of articles
    setArticles(actus.slice(0, articleLimit)); // set the articles
  }, [actus]);

  useEffect(() => {
    const maxArticle = page * articleLimit;
    const minArticle = maxArticle - articleLimit;
    setArticles(actus.slice(minArticle, maxArticle));
  }, [page]);

  const [pageNumber, setPageNumber] = useState(0);

  useEffect(() => {
    setPageNumber(Math.ceil(articleNumber / articleLimit));
  }, [articleNumber]);

  return (
    <Layout>
      <div className={"blog"}>
        <div className="header">
          <div className="bg-blue">
            <FeedLine title="blog" />
            <h1 className="pageTitle pb-3">
              Blog
              <Dot color="white" />
            </h1>
          </div>
        </div>
        <div className="wave">
          <img id={"wave"} src={wave} alt="wave" />
        </div>
        <div className="container-fluid d-flex justify-content-center row mb-5 mx-auto p-0">
          {articles.map((actu, index) => {
            return <CardBlog key={index} {...actu} />;
          })}
        </div>
        <div className="d-flex justify-content-center mb-5">
          <Pagination setPage={setPage} pageNumber={pageNumber} />
        </div>
      </div>
    </Layout>
  );
}

export default Blog;
