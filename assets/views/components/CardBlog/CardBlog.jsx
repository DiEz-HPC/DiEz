import React from "react";
import "./CardBlog.scss";
import { imageUploadUrl } from "../../../tools/image";
import Button from "../buttons/links/BtnLinks";

function CardBlog(props) {
  const { article, title, imageName, author, slug, date } = props;

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
        className={`post-module col-3 mx-5 ${hover ? "hover" : ""}`}
        onMouseEnter={mouseEnter}
        onMouseLeave={mouseLeave}
      >
        <div class="thumbnail col-12">
          <div class="date">
            <div class="day">27</div>
            <div class="month">Mar</div>
          </div>
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/photo-1429043794791-eb8f26f44081.jpeg" />
        </div>

        <div class="post-content d-flex flex-column justify-content-between col-12">
          <div>
            <div class="category">Photos</div>
            <h1 class="title">{title}</h1>
            <div
              class="description"
              dangerouslySetInnerHTML={{ __html: article }}
            />
          </div>
          <div class="post-meta d-flex flex-column flex-xl-row justify-content-between col-12">
            <div class="user d-flex align-items-center col-12 col-md-3 mb-5 mb-xl-0">
                <i class="fa fa-user icon-user me-2"></i>
                <span>{author}</span>
            </div>
            <div className="d-flex justify-content-center align-items-center col-12 col-md-6">
            <Button
              link={"#"}
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
