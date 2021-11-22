import React from "react";
import "./CardBlog.scss";
import { imageUploadUrl } from "../../../tools/image";

function CardBlog(props) {
  const { article, title, author, imageName, slug, createdAt } = props;

  const day = new Date(createdAt?.timestamp * 1000).toLocaleDateString(
    "fr-FR",
    {
      day: "numeric",
    }
  );

  const month = new Date(createdAt?.timestamp * 1000).toLocaleDateString(
    "fr-FR",
    {
      month: "long",
    }
  );

  return (
    <>
      <div class="container">
        <div class="column"></div>
        <div class="post-module">
          <div class="thumbnail">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/photo-1429043794791-eb8f26f44081.jpeg"></img>
          </div>

          <div class="post-content">
            <div class="category">CATEGORY</div>
            <h1 class="title">Title Goes Here</h1>
            <h2 class="sub_title">And Subtitle Goes Here.</h2>
            <p className="description">
              New York, the largest city in the U.S., is an architectural marvel
              with plenty of historic monuments, magnificent buildings and
              countless dazzling skyscrapers.
            </p>
            <div class="post-meta">
              <span class="timestamp">
                <i class="fa fa-clock-">o</i> 6 mins ago
              </span>
              <span class="comments">
                <i class="fa fa-comments"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}

export default CardBlog;
