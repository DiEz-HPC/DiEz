import React from "react";
import "./CardBlog.scss";
import { imageUploadUrl } from "../../../tools/image";
import Button from "../buttons/links/BtnLinks";
import {timeToRead} from "../../../tools/timeToRead";

function CardBlog(props) {
  const { article, title, imageName, author, slug, createdAt } = props;

  const fullArticle = article.split(" ");
  const articlePreview = fullArticle.slice(0, 20);
  const articlePreviewString = articlePreview.join(" ") + " [...]";

  console.log(articlePreviewString);

  const day = new Date(createdAt?.timestamp * 1000).toLocaleDateString(
    "fr-FR",
    {
      day: "numeric",
    }
  );

  const month = new Date(createdAt?.timestamp * 1000).toLocaleDateString(
    "fr-FR",
    {
      month: "short",
    }
  );

  const [hover, setHover] = React.useState(false);

  function mouseEnter() {
    setHover(true);
  }

  function mouseLeave() {
    setHover(false);
  }

  return (
    <>
      <div
        className={`post-module col-12 col-md-6 col-lg-3 mx-5 ${hover ? "hover" : ""}`}
        onMouseEnter={mouseEnter}
        onMouseLeave={mouseLeave}
      >
        <div class="thumbnail col-12">
          <div class="date">
            <div class="day">{day}</div>
            <div class="month">{month}</div>
          </div>
          <img className="w-100 h-75" src={imageUploadUrl(imageName)} />
        </div>

        <div class="post-content d-flex flex-column justify-content-between col-12">
          <div>
            <div class="category">{article ? timeToRead(article) : ''}</div>
            <h1 class="title">{title}</h1>
            <div
              class="description"
              dangerouslySetInnerHTML={{ __html: articlePreviewString }}
            />
          </div>
          <div class="post-meta d-flex flex-column flex-xl-row justify-content-between col-12">
            <div class="user d-flex align-items-center col-12 col-md-3 mb-5 mb-xl-0">
              <i class="fa fa-user icon-user me-2"></i>
              <span>{author}</span>
            </div>
            <div className="d-flex justify-content-center align-items-center col-12 col-xl-6 me-xl-3">
              <Button
                link={`/blog/${slug}`}
                label={"Voir plus"}
                color={"white"}
                style={"button-card"}
                variant={"outlined"}
              />
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default CardBlog;
