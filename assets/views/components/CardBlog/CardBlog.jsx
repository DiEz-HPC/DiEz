import React from "react";
import "./CardBlog.scss";
import { imageUploadUrl } from "../../../tools/image";

function CardBlog(props) {
  console.log(props)
  const { article, title, author, image, link, date } = props;
  return (
    <>
        <div className="card m-5">
          <div className="card__header">
            <img
              src={imageUploadUrl(image)}
              alt="card__image"
              className="card__image"
              width="600"
            ></img>
          </div>
          <div className="card__body">
            <span className="tag tag-blue">Technology</span>
            <h4>{title}</h4>
            <p dangerouslySetInnerHTML={{__html: article}}/>
          </div>
          <div className="card__footer">
            <div className="user">
              <img
                src="https://i.pravatar.cc/40?img=1"
                alt="user__image"
                className="user__image"
              ></img>
              <div className="user__info">
                <h5>{author}</h5>
                <small>{date}</small>
              </div>
              <button><a href={`/blog/${link}`}></a></button>
            </div>
          </div>
        </div>
    </>
  );
}

export default CardBlog;
