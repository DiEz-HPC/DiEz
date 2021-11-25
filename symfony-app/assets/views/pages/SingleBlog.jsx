import React, { useEffect, useState } from "react";
import { getPost } from "../../queries/posts";
import FeedLine from "../components/feed/FeedLine";
import "../../styles/single-blog.scss";
import wave from "../../images/wave.svg";
import { timeToRead } from "../../tools/timeToRead";
import { ucFirst } from "../../tools/ucFirst";
import Layout from "../components/Layout/Layout";
import { getLastPostByNumber } from "../../queries/posts";
import CardBlog from "../components/CardBlog/CardBlog";

function SingleBlog() {
  const locations = window.location.pathname
    .split("/")
    .filter((link) => link !== "");
  const [post, setPost] = useState([]);
  useEffect(async () => {
    const query = await getPost(locations[1]);
    const status = query.status;
    if (status === 404) {
      window.location.href = "/404";
    } else {
      const response = await query.json();
      setPost(response);
    }
  }, []);

  const [actus, setActus] = useState([]);
  useEffect(async () => {
    const query = await getLastPostByNumber(2);
    const data = await query.json();
    setActus(data);
  }, []);

  const [published, setPublished] = useState("");
  useEffect(() => {
    const date = new Date(post?.createdAt?.timestamp * 1000).toLocaleDateString(
      "fr-FR",
      {
        year: "numeric",
        month: "long",
        day: "numeric",
      }
    );
    setPublished(date);
  }, [post]);

  return (
    <Layout>
      <div className={"blog"}>
        <div className="header-blog mb-5">
          <div className="bg-blue d-flex flex-column justify-content-center pt-5 ps-sm-4 ps-xl-5">
            <div className="ms-xl-5 pt-5">
              <div className="ms-2 my-2 ms-xl-5 ps-xl-5">
                <FeedLine {...post} />
              </div>
              <h1 className="ms-2 text-light ms-xl-5 ps-xl-5">
                {ucFirst(post.title)}
              </h1>
              <div className="ms-2 text-light d-flex ms-xl-5 ps-xl-5">
                <p className={"mt-2"}>Publié le : {published}</p>
                <hr className={"line-dark"} />
                <p className={"mt-2"}>
                  {post?.article ? timeToRead(post?.article) : ""}
                </p>
              </div>
            </div>
          </div>
          <img src={wave} className={"wave"} alt="vague" />
        </div>
        <section className={"mx-2 ps-xl-5 ms-xl-5"}>
          <article
            className={"col-12 col-xl-6 ps-xl-5 ms-xl-5 pt-sm-4 mt-sm-5"}
          >
            <div dangerouslySetInnerHTML={{ __html: post.article }} />
          </article>
        </section>
        <hr className={"my-5 line-blue"} />
        <div className="actus-single_blog d-flex justify-content-center row mx-auto p-0">
          {actus.map((actu, index) => {
            return <CardBlog key={index} {...actu} />;
          })}
        </div>
      </div>
    </Layout>
  );
}

export default SingleBlog;
